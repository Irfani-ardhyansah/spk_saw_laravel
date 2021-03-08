<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anouncement;
use App\Period;

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
                'file'      =>  'mimes:pdf|max:20000'
            ], [
                'period_id.unique'  =>  'Periode Sudah Memiliki Pengumuman!',
                'file.mimes'        =>  'File Harus Bertipe PDF',
                'file.max'          =>  'File Maksimal 2MB!'
            ]);

            //lalu menyimpan berdasarkan inputan dari view
            $pengumuman = Anouncement::create([
                'admin_id'      =>  Auth()->user()->id,
                'period_id'     =>  $request->period_id,
                'status'        =>  $request->status,
                'file'          =>  $request->file
            ]);

            return redirect()->back()->with(['success' => 'Berhasil Membuat Pengumuman ID ' . $pengumuman->period_id]);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function changeStatus(Request $request, $id)
    {
        //jika inputan post
        if($request->isMethod('post')) {
            //mengambil data lalu mengupdate pada kolom status
            $data = $request->all();
            Anouncement::where(['id' => $id])->update(['status'=>$data['status']]);
            return redirect()->back()->with(['success' => 'Status Pengumuman Berhasil Diganti!']);
        }
    }
}
