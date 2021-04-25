<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $prodis = Prodi::orderBy('name', 'ASC')->paginate(10);
        return view('admin.prodi.index', compact('prodis'));
    }

    public function save(Request $request)
    {
        try {
            //melakukan validasi data
            $this->validate($request, [ 
                'name'          => 'required|unique:prodis',
                'total'         => 'required|numeric'
            ],[
                'name.required'     =>  'Nama Prodi harus Diisi!',
                'name.unique'       =>  'Nama Prodi Tidak Boleh Sama',
                'total.required'    =>  'Total Mahasiswa Harus Diisi!',
                'total.numeric'     =>  'Total Mahasiswa Harus Berbentuk Angka'
            ]);
            //menyimpan data
            $prodi = Prodi::create([
                'name'  =>  $request->name,
                'total' =>  $request->total
            ]);
            return redirect()->back()->with(['success' => 'Berhasil Menambah Prodi ' . $prodi->name]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        if($request->isMethod('post')) { //jika method post
            $data = $request->all(); //menyimpan semua inputan dari view
            Prodi::where(['id'=>$id])->update(['name'=>$data['name'], 'total'=>$data['total']]); //melakukan update pada databse
            return redirect()->back()->with(['success' => 'Update ' . $request->name . ' Berhasil!']);
        }
    }

    public function delete($id)
    {
        //Memilih data Berdasarkan ID dan Menghapusnya
        $prodi = Prodi::findOrFail($id);
        $prodi -> delete();
        return redirect()->back()->with(['success' => 'Data ' . $prodi->name . ' Berhasil Dihapus!' ]);
    }

}
