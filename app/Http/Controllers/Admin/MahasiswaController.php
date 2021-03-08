<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\User;
use Carbon\Carbon;
use Importer;

class MahasiswaController extends Controller
{
    public function index()
    {
        //Mengambil Data Mahasiswa dari DB
        $mahasiswas = Mahasiswa::paginate(10);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function detail($id)
    {
        //Mengambil Data Berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.detail', compact('mahasiswa'));
    }

    public function delete($id)
    {
        //Memilih data Berdasarkan ID dan Menghapusnya
        $mahasiswa = Mahasiswa::findOrFail($id);
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
                for($row=1; $row<sizeof($collection); $row++) {
                    try {
                        // dd($collection[$row][0]);
                        $user = User::create([
                            'npm'       => $collection[$row][0],
                            'email'     => $collection[$row][1],
                            'password'  => bcrypt($collection[$row][2]),
                        ]);

                        Mahasiswa::create([
                            'user_id'   => $user->id,
                            'name'      => $collection[$row][3],
                            'prodi'     => $collection[$row][4],
                            'semester'  => $collection[$row][5],
                            'address'   => $collection[$row][6],
                            'gender'    => $collection[$row][7],
                            'phone'     => $collection[$row][8],
                            'religion'  => $collection[$row][9],
                        ]);
                        return redirect()->back()->with(['success' => 'Berhasil Upload Excel!']);
                    }catch(\Exception $e) {
                        return redirect()->back()->with(['error' => $e->getMessage()]);
                    }
                }
            }

        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }
}
