<?php

namespace App\Http\Controllers\Pimpinan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anouncement;

class PengumumanController extends Controller
{
    public function index()
    {
        $anouncements = Anouncement::all();
        return view('pimpinan.pengumuman.index', compact('anouncements'));
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
