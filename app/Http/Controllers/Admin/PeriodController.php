<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Period;
use Carbon\Carbon;
use Auth;
use \PDF;
use File;

class PeriodController extends Controller
{
    public function index()
    {
        //Mengambil data periode
        $periods = Period::all();
        return view('admin.period.index', compact('periods'));
    }

    public function save(Request $request)
    {

        try {
            //memvalidasi inputan dari view
            $this->validate($request, [
                'start'  => 'required|unique:periods,end',
                'end'    => 'required|unique:periods,start',
                'file'   => 'required|mimes:pdf|max:2000',
                'status' => 'required'
            ], [
                'start.required'    => 'Tanggal Mulai Harus Diisi!',
                'end.required'      => 'Tanggal Selesai Harus Diisi!',
                'file.required'     => 'File Pengumuman Harus Diisi!',
                'file.mimes'        => 'File Pengumuman Harus Berupa PDF!'
            ]);

                //jika inputan ada file
            if($request->hasFile('file')){
                $file = $request->file('file'); //memasukkan dalam variable
                $extension = $file->getClientOriginalExtension(); //mengambil ekstensi oroginal dari inputan
                $nama_file = 'Pengumuman Pendaftaran PPA' . ' ' . Carbon::now()->format('Y') . '.' . $extension; //merename file
                // $request->file('file')->move('pengumuman_periode/', $nama_file); //memasuukkan pada folder pengumuman_periode pada server
                $request->file('file')->move('periode/' . $request->start . '_' . $request->end . '/pengumuman/', $nama_file);
                $item = $nama_file; //memasukkan dalam variable
            }
    
            if(!empty($item)){  //apabila variable $item ada isinya melakukan proses penyimpanan data
                $periods = Period::create([
                    'admin_id'  =>  Auth::user()->id,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'file'      =>  $item,
                    'status'    =>  $request->status 
                ]);

            } else {
                return redirect()->back()->with(['error' => 'File Jawaban Terlalu Besar.']); //jika tidak ada maka menampilkan pesan error
            }

            return redirect()->back()->with(['success' => 'Berhasil Menambah Periode Pada ' . $periods->start]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $period = Period::findOrFail($id); //Mengambil data berdasarkan id
            File::deleteDirectory('periode/' . $period->start . '_' . $period->end); //melakukan delete file pada server
            $period -> delete(); //menghapus data
            return redirect()->back()->with(['success' => 'Data ' . $period->start . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus Data!']);
        }
    }

    public function update(Request $request, $id)
    {
        $period = Period::findOrFail($id); //mengambil data berdasarkan id
        if($request->isMethod('post')) { //jika method post
            if($request->file('file') == "") { //jika inputan file kosong

                //melakukan validasi data
                $this->validate($request, [
                    'start'  => 'required|unique:periods,end',
                    'end'    => 'required|unique:periods,start',
                ]);

                $data = $request->all(); //mengambil semua inputan dan dimasukkan pada variable
                rename(public_path('periode/' . $period->start . '_' . $period->end), public_path('periode/' . $request->start . '_' . $request->end));
                Period::where(['id'=>$id])->update(['start'=>$data['start'], 'end'=>$data['end']]); //melakukan proses update
                return redirect()->back()->with(['success' => 'Update ' . $request->start . ' Berhasil!']);
            } else { //jika inputan file ada 

                //melakukan validasi
                $this->validate($request, [
                    'start'  => 'required|unique:periods,end',
                    'end'    => 'required|unique:periods,start',
                    'file'   => 'required|mimes:pdf|max:2000',
                ]);

                File::delete('periode/' . $period->start . '_' . $period->end . '/pengumuman/', $period->file); //Menghapus file yang diupdate

                //melakukan proses upload
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $nama_file = 'Pengumuman Pendaftaran PPA' . ' ' . Carbon::now()->format('Y') . '.' . $extension;
                $request->file('file')->move('periode/' . $request->start . '_' . $request->end . '/pengumuman/', $nama_file);
                $item = $nama_file;

                $data = $request->all();
                Period::where(['id'=>$id])->update(['start'=>$data['start'], 'end'=>$data['end'], 'file' => $item]); //menyimpan pada database
                return redirect()->back()->with(['success' => 'Update ' . $request->start . ' Berhasil!']);
            }
        }
    }

    public function changeStatus(Request $request, $id)
    {
        $period = Period::findOrFail($id); //mengambil data berdasarkan id
        if($request->isMethod('post')) { //jika method nya post
            $data = $request->all(); // mengambil semua inputan dari view
            Period::where(['id' => $id])->update(['status'=>$data['status']]); //melakukan update data
            return redirect()->back()->with(['success' => 'Status Periode ' . $request->start . ' Berhasil Diganti!']);
        }
    }
}