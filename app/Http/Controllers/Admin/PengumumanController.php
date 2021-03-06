<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anouncement;
use App\Period;
use File;

class PengumumanController extends Controller
{
    public function index()
    {
        //Mengambil data pada periode dan pengumuman
        $periods = Period::all();
        $anouncements = Anouncement::all();
        return view('admin.pengumuman.index', compact('periods', 'anouncements'));
    }

    public function save(Request $request)
    {
        try{
            //memvalidasi data
            $this->validate($request,[
                'period_id' => 'unique:anouncements',
                'file'      =>  'mimes:pdf|max:2000|required'
            ], [
                'period_id.unique'  =>  'Periode Sudah Memiliki Pengumuman!',
                'file.mimes'        =>  'File Harus Bertipe PDF',
                'file.max'          =>  'File Maksimal 2MB!',
                'file.required'     =>  'File Harus Diisi!'
            ]);

            $period = Period::where('id', $request->period_id)->first();

            if($request->hasFile('file')){
                $file = $request->file('file'); //memasukkan dalam variable
                $extension = $file->getClientOriginalExtension(); //mengambil ekstensi oroginal dari inputan
                $nama_file = 'Hasil Beasiswa' . '.' . $extension; //merename file
                $request->file('file')->move('periode/' . $period->start . '_' . $period->end . '/pengumuman_beasiswa/', $nama_file); //memasuukkan pada folder pengumuman_periode pada server
                $item = $nama_file; //memasukkan dalam variable
            }

            //lalu menyimpan berdasarkan inputan dari view
            $pengumuman = Anouncement::create([
                'admin_id'      =>  Auth()->user()->id,
                'period_id'     =>  $request->period_id,
                'status'        =>  0,
                'file'          =>  $item
            ]);

            return redirect()->back()->with(['success' => 'Berhasil Membuat Pengumuman ID ' . $pengumuman->period_id]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $anouncement = Anouncement::findOrFail($id); //Mengambil data berdasarkan id
            File::deleteDirectory('periode/' . $anouncement->period->start . '_' . $anouncement->period->end . '/pengumuman_beasiswa'); //melakukan delete file pada server
            $anouncement -> delete(); //menghapus data
            return redirect()->back()->with(['success' => 'Data Pengumuman Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus Data!']);
        }
    }
}
