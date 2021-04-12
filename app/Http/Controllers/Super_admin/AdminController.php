<?php

namespace App\Http\Controllers\Super_admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::where('role' ,'!=', '0')->get();
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

    public function update(Request $request, $id)
    {
        $period = Admin::findOrFail($id); //mengambil data berdasarkan id
        try {
            if($request->isMethod('post')) { //jika method post
                //melakukan validasi data
                $this->validate($request, [
                    'name'      =>  'required',
                    'email'     =>  'required',
                ], [
                    'name.required'     =>  'Nama Harus Diisi!',
                    'email.required'    =>  'Email Harus Diisi!',
                ]);

                $data = $request->all(); //mengambil semua inputan dan dimasukkan pada variable
                Admin::where(['id'=>$id])->update(['name'=>$data['name'], 'email'=>$data['email']]); //melakukan proses update
                return redirect()->back()->with(['success' => 'Update ' . $request->name . ' Berhasil!']);
                
            }
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Update ' . $request->name . ' Gagal!']);
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
