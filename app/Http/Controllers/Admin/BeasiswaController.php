<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_period;
use App\Period;
use App\Mahasiswa;
use App\Value;
use App\Criteria;

class BeasiswaController extends Controller
{
    public function peserta($id)
    {   
        //Mengambil Data Peserta Dari Beasiswa yang dipilih
        $beasiswa = Period::where('id', $id)->first();
        $pendaftar = User_period::where('period_id', $id)->get();
        $period_id = $id;
        return view('admin.period.peserta', compact('pendaftar', 'beasiswa', 'period_id'));
    }

    public function changeStatus(Request $request, $id)
    {
        //Jika method yang dipilih post
        if($request->isMethod('post')) {
            //Maka menjalankan proses update status
            $data = $request->all();
            User_period::where(['id' => $id])->update(['status'=>$data['status']]);
            return redirect()->back()->with(['success' => 'Status Pendaftar Beasiswa Berhasil Diganti!']);
        }
    }

    public function nilai($period_id, $mahasiswa_id)
    {   
        //Mengambil data dari inputan mahasiswa 
        $values = Value::where([
            ['mahasiswa_id', $mahasiswa_id], 
            ['period_id', $period_id] 
            ])->get();
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa_id);
        return view('admin.period.nilai', compact('values', 'mahasiswa'));
    }
    
    public function analisis($period_id)
    {
        //Mengambil Data kriteria, periode beasiswa yang didaftarkan, hasil inputan dari mahasiswa
        $criterias = Criteria::where('status',1)->get();
        $user_periods = User_period::where('period_id', $period_id)->get();
        $values = Value::all();
        return view('admin.period.analisis', compact('criterias', 'user_periods', 'period_id', 'values'));
    }
}
