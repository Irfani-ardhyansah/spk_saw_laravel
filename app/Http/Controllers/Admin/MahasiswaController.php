<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\User;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(2);
        return view('admin.mahasiswa.index', compact('mahasiswas'));
    }

    public function detail($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.detail', compact('mahasiswa'));
    }

    public function delete($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        User::where('id', $mahasiswa->user_id)->delete();
        $mahasiswa -> delete();
        return redirect()->back()->with(['success' => 'Data ' . $mahasiswa->name . ' Berhasil Dihapus!' ]);
    }
}
