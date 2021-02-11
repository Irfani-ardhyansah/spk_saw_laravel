<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;
use Auth;
use File;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::all();

        foreach($periods as $row) {
            $count_peserta = $row -> user_periods->count();
        }

        return view('admin.period.index', compact('periods', 'count_peserta'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'start'  => 'required|unique:periods,end',
            'end'    => 'required|unique:periods,start',
            'file'   => 'required|mimes:pdf|max:2000',
            'status' => 'required'
        ]);

        try {

            if($request->hasFile('file')){
                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $nama_file = $request->start . '_' . $request->end .'_' . 'pengumumanPeriodeBeasiswa' . '.' . $extension;
                $request->file('file')->move('pengumuman_periode/', $nama_file);
                $item = $nama_file;
            }
    
            if(!empty($item)){
                $periods = Period::create([
                    'admin_id'  =>  Auth::user()->id,
                    'start'     =>  $request->start,
                    'end'       =>  $request->end,
                    'file'      =>  $item,
                    'status'    =>  $request->status 
                ]);
            } else {
                return redirect()->back()->with(['error' => 'File Jawaban Terlalu Besar.']);
            }

            return redirect()->back()->with(['success' => 'Berhasil Menambah Periode Pada ' . $periods->start]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            // $soal = Soal::where('id',$id)->first();
            $period = Period::findOrFail($id);
            File::delete('pengumuman_periode/'.$period->file);
            $period -> delete();
            return redirect()->back()->with(['success' => 'Data ' . $period->start . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus Data!']);
        }
    }

    public function update(Request $request, $id)
    {
        $period = Period::findOrFail($id);
        // dd($request->all());
        if($request->isMethod('post')) {
            if($request->file('file') == "") {

                $this->validate($request, [
                    'start'  => 'required|unique:periods,end',
                    'end'    => 'required|unique:periods,start',
                    'status' => 'required'
                ]);

                $data = $request->all();
                Period::where(['id'=>$id])->update(['start'=>$data['start'], 'end'=>$data['end'], 'status'=>$data['status']]);
                return redirect()->back()->with(['success' => 'Update ' . $request->start . ' Berhasil!']);
            } else {

                $this->validate($request, [
                    'start'  => 'required|unique:periods,end',
                    'end'    => 'required|unique:periods,start',
                    'file'   => 'required|mimes:pdf|max:2000',
                    'status' => 'required'
                ]);

                File::delete('pengumuman_periode/'.$period->file);

                $file = $request->file('file');
                $extension = $file->getClientOriginalExtension();
                $nama_file = $request->start . '_' . $request->end .'_' . 'pengumumanUpdatePeriodeBeasiswa' . '.' . $extension;
                $request->file('file')->move('pengumuman_periode/', $nama_file);
                $item = $nama_file;

                $data = $request->all();
                Period::where(['id'=>$id])->update(['start'=>$data['start'], 'end'=>$data['end'], 'status'=>$data['status'], 'file' => $item]);
                return redirect()->back()->with(['success' => 'Update ' . $request->start . ' Berhasil!']);
            }
        }
    }
}