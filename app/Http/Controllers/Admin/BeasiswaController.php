<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_period;
use App\Period;
use App\Mahasiswa;
use App\Value;
use App\Criteria;
use App\Prodi;
use App\User;
use \PDF;
use File;

class BeasiswaController extends Controller
{
    public function peserta($id)
    {   
        // Mengambil Data Peserta Dari Beasiswa yang dipilih
        $beasiswa = Period::where('id', $id)->first();
        // mengambil data user_period berdasarkan id
        $user_period = User_period::where('period_id', $id)->get();
        // mencari data mahasiswa berdasarkan id pada user_period
        $pendaftar = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->orderBy('semester', 'ASC')->paginate(10);
        // memasukkan data kedalam variabel
        $period_id = $id;
        return view('admin.period.peserta', compact('pendaftar', 'beasiswa', 'period_id'));
    }

    public function search($id, Request $request) 
    {
        $beasiswa = Period::where('id', $id)->first();
        $user_period = User_period::where('period_id', $id)->get();
        $period_id = $id;
        $pendaftar = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->where('name', 'like', '%' . $request->input('name') . '%')
        ->orderBy('semester', 'ASC')
        ->paginate(10);

        return view('admin.period.peserta', compact('pendaftar', 'beasiswa', 'period_id'));
    }

    public function delete($id, $mahasiswa_id)
    {
        try {
            //Mengambil data berdasarkan id lalu menghapusnya
            $mahasiswa = Mahasiswa::findOrFail($mahasiswa_id);
            $period = Period::findOrFail($id);
            $user_period = User_period::where('period_id', $id)->where('user_id', $mahasiswa->user->id);
            $values = Value::where('period_id', $period->id)->where('mahasiswa_id', $mahasiswa->id);
            
            // menghapus folder yang menyimpan data terkait periode tersebut
            File::deleteDirectory('periode/' . $period->start . '_' . $period->end . '/' . $mahasiswa->user->npm);

            $user_period->delete();
            $values->delete();

            return redirect()->back()->with(['success' => 'Data Pendaftar ' . $mahasiswa->name . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function kuota($id)
    {
        $prodis = Prodi::orderBy('name', 'ASC')->get();
        $user_period = User_period::where('period_id', $id)->get();
        $period = Period::findOrFail($id);
        //Menghitung Prodi Yang terdaftar
        $mahasiswas = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->whereIn('prodi_id', $prodis->pluck('id'))->get();
        // dd($mahasiswas->where('prodi_id', 10)->count());
        return view('admin.period.kuota', compact('prodis', 'mahasiswas', 'period', 'id'));
    }

    public function analisisProdi($id, $prodi_id)
    {
        $prodi = Prodi::where('id', $prodi_id)->orderBy('name', 'ASC')->first();
        $user_period = User_period::where('period_id', $id)->get();
        $mahasiswas = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->where('prodi_id', $prodi_id)->get();
        $criterias = Criteria::where('status',1)->get();
        $criterias_count = Criteria::where('status',1)->get()->count();
        $values = Value::whereIn('mahasiswa_id', $mahasiswas->pluck('id'))->get();
        return view('admin.period.analisis_prodi', compact('prodi', 'mahasiswas', 'criterias', 'criterias_count', 'values', 'prodi_id'));
    }

    public function analisisFull($id)
    {
        $prodi = Prodi::orderBy('name', 'ASC')->get();
        $user_period = User_period::where('period_id', $id)->get();
        $mahasiswas = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->get();
        $criterias = Criteria::where('status',1)->get();
        $criterias_count = Criteria::where('status',1)->get()->count();
        $values = Value::whereIn('mahasiswa_id', $mahasiswas->pluck('id'))->get();
        $period = Period::findOrFail($id);

        return view('admin.period.analisis_full', compact('prodi', 'mahasiswas', 'criterias', 'criterias_count', 'period', 'values', 'id'));
    }

    public function analisis_cetak_pdf($id)
    {
        $prodi = Prodi::orderBy('name', 'ASC')->get();
        $user_period = User_period::where('period_id', $id)->get();
        $mahasiswas = Mahasiswa::whereIn('user_id', $user_period->pluck('user_id'))->get();
        $criterias = Criteria::where('status',1)->get();
        $criterias_count = Criteria::where('status',1)->get()->count();
        $values = Value::whereIn('mahasiswa_id', $mahasiswas->pluck('id'))->get();
        $period = Period::findOrFail($id);

        $pdf = PDF::loadview('admin.period.perhitungan2', compact('prodi', 'mahasiswas', 'criterias', 'criterias_count', 'values', 'period'));
        return $pdf->download('Hasil Analisis Beasiswa PPA Periode ' . date('Y', strtotime($period->start)) . '.pdf');
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
}
