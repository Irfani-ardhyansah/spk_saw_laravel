<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_period;
use App\Period;
use App\Mahasiswa;
use App\Value;

class BeasiswaController extends Controller
{
    public function peserta($id)
    {   
        $beasiswa = Period::where('id', $id)->first();
        $pendaftar = User_period::where('period_id', $id)->get();
        return view('admin.period.peserta', compact('pendaftar', 'beasiswa'));
    }

    public function changeStatus(Request $request, $id)
    {
        $period = User_period::findOrFail($id);
        if($request->isMethod('post')) {
            $data = $request->all();
            User_period::where(['id' => $id])->update(['status'=>$data['status']]);
            return redirect()->back()->with(['success' => 'Status Pendaftar Beasiswa Berhasil Diganti!']);
        }
    }

    public function nilai($id)
    {   
        $values = Value::where('mahasiswa_id', $id)->get();
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.period.nilai', compact('values', 'mahasiswa'));
    }
}
