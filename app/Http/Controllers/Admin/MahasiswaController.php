<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\User;
use App\Prodi;
use Carbon\Carbon;
use Importer;
use \PDF;
use File;
use Illuminate\Support\Facades\Crypt;
use DB;

class MahasiswaController extends Controller
{

    public function index()
    {
        // //Mengambil Data Mahasiswa dari DB
        $mahasiswas = Mahasiswa::orderBy('semester', 'ASC')->paginate(10);
        // $mahasiswas = User::orderBy('npm', 'ASC')->paginate(10);
        $prodis = Prodi::orderBy('name', 'ASC')->get();
        return view('admin.mahasiswa.index', compact('mahasiswas', 'prodis'));
    }

    public function search(Request $request) 
    {
        if($request->input('prodi_id') != 'All') {
            $mahasiswas = Mahasiswa::where('prodi_id', 'like', '%' . $request->input('prodi_id') . '%')
            ->orderBy('semester', 'ASC')
            ->paginate(10);
        } else {
            $mahasiswas = Mahasiswa::orderBy('semester', 'ASC')->paginate(10);
        }
        $prodis = Prodi::orderBy('name', 'ASC')->get();
        return view('admin.mahasiswa.index', compact('mahasiswas', 'prodis'));
    }

    public function cetak_pdf()
    {
        $mahasiswas = Mahasiswa::orderBy('semester', 'ASC')->get();
        $now = Carbon::now();
        $pdf = PDF::loadview('admin.mahasiswa.mahasiswa_pdf', compact('mahasiswas', 'now'));
        return $pdf->download('Data Mahasiswa Tahun '.$now->year.'.pdf');
    }

    public function detail($id)
    {
        //Mengambil Data Berdasarkan ID
        $id = Crypt::decrypt($id);
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.detail', compact('mahasiswa'));
    }

    public function delete($id)
    {
        //Memilih data Berdasarkan ID dan Menghapusnya
        $mahasiswa = Mahasiswa::findOrFail($id);
        File::delete('profile_images/'. $mahasiswa->user->npm . '/' .$mahasiswa->photo);
        User::where('id', $mahasiswa->user_id)->delete();
        $mahasiswa -> delete();
        return redirect()->back()->with(['success' => 'Data ' . $mahasiswa->name . ' Berhasil Dihapus!' ]);
    }

    public function store(Request $request)
    {

        try {
            //Validaso File Upload
            $this->validate($request, [
                'file'          => 'required|max:5000|mimes:xlsx,xls,csv',
            ], [
                'file.required' =>  'File Harus Diisi!',
                'file.max'      =>  'File Max 5MB!',
                'file.mimes'    =>  'File Harus Bertipe xlsx,xls,csv'
            ]);

            //Upload File Excel Ke Server
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $nama_file = Carbon::now()->format('Y-m-d') . '_' . 'data_mahasiswa' . '.' . $extension;
            $request->file('file')->move('data_mahasiswa/', $nama_file);

            //Mengambil Data Dari Excel
            $excel = Importer::make('Excel');
            $excel->load('data_mahasiswa/'.$nama_file);
            $collection = $excel->getCollection();

            //Memecah Data Dari Excel Kedalam Array Dan Menyimpan Ke DB
            if(sizeof($collection[1]) == 10) {

                try { 
                    foreach($collection as $key => $value) {9
                        if($key > 0){ 
                            $user = User::create([
                                'npm'       => $value[0],
                                'email'     => $value[1],
                                'password'  => bcrypt($value[2]),
                            ]);

                            Mahasiswa::create([
                                'user_id'   => $user->id,
                                'name'      => $value[3],
                                'prodi_id'  => Prodi::where('name', $value[4])->first()->id,
                                'semester'  => $value[5],
                                'address'   => $value[6],
                                'gender'    => $value[7],
                                'phone'     => $value[8],
                                'religion'  => $value[9],
                            ]);
                        }
                    }
                    return redirect()->back()->with(['success' => 'Berhasil Upload Excel!']);
                } catch(\Exception $e) {
                    $user1 = User::findOrFail($user->id);
                    
                    $user1->delete();
                    return dd($e);
                }
            }

        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}
