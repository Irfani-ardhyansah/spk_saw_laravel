<?php

namespace App\Http\Controllers\Super_admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('super_admin.data_admin.index', compact('admins'));
    }

    public function save(Request $request)
    {
        try {
            $this->validate($request, [
                'name'      =>  'required',
                'email'     =>  'required',
                'password'  =>  'required|min:6|confirmed'
            ], [
                'name.required'     =>  'Nama Harus Diisi!',
                'email.required'    =>  'Email Harus Diisi!',
                'password.required' =>  'Password Harus Diisi!',
                'password.min'      =>  'Password Minimal 6 Digit!',
                'password.confirmed'=>  'Confirmasi Password Harus Sama!'
            ]);

            $admin = Admin::create([
                'name'      => $request->name,
                'email'     =>  $request->email,
                'password'  =>  bcrypt($request->password),
                'role'      =>  1
            ]);

            return redirect()->back()->with(['success' => 'Berhasil Menambah Akun ' . $admin->name]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin -> delete();
            return redirect()->back()->with(['success' => 'Akun ' . $admin->name . ' Berhasil Dihapus!' ]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Gagal Menghapus akun karena ' . $e->getMessage()]);
        }
    }
}
