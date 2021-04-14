<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\User;
use Auth;
use File;
use Carbon\Carbon;

class ProfileController extends Controller
{
    // method untuk menampilkan halaman profile
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('user.profile.index', compact('mahasiswa'));
    }

    // method untuk mengedit profile
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('user.profile.edit', compact('mahasiswa'));
    }

    //method untuk mengupdate profile berdasarkan inputan edit
    public function update(Request $request, $id)
    {

        try {
            $this->validate($request, [
                'npm'       => 'required|digits:9|unique:users,npm,' . auth()->user()->id . ',id',
                'name'      => 'required',
                'prodi'     => 'required',
                'semester'  => 'required',
                'address'   => 'required',
                'gender'    => 'required',
                'phone'     => 'required',
                'religion'  => 'required',
                'photo'     => 'nullable|mimes:jpg,jpeg,png|max:20000'
            ],[
                'npm.unique'        => 'NPM Sudah Terdaftar!',
                'npm.digits'        => 'NPM Harus 9!',
                'name.required'     => 'Nama Harus Diisi!',
                'email.required'    => 'Email Harus Diisi!',
                'phone.required'    => 'No Hp Harus Diisi!',
                'address.required'  => 'Alamt Harus Diisi!',
            ]);

            $mahasiswa = Mahasiswa::findOrFail($id);
            $user = User::where('id', $mahasiswa->user_id)->first();
            if($request->file('photo') == "") {
                $mahasiswa->update([
                    'name'      => $request->name,
                    'prodi'     => $request->prodi,
                    'semester'  => $request->semester,
                    'address'   => $request->address,
                    'gender'    => $request->gender,
                    'phone'     => $request->phone,
                    'religion'  => $request->religion,
                ]);

                $user->update([
                    'npm'       => $request->npm,
                    'email'     => $request->email
                ]);
            } else {
                File::delete('profile_images/'. $mahasiswa->user->npm . '/' .$mahasiswa->photo);
                
                $file = $request->file('photo');
                $extension = $file->getClientOriginalExtension();
                $nama_file = 'profile' . '.' . $extension;
                $request->file('photo')->move('profile_images/'. $mahasiswa->user->npm . '/', $nama_file);
                $profile = $nama_file;

                $mahasiswa->update([
                    'name'      => $request->name,
                    'prodi'     => $request->prodi,
                    'semester'  => $request->semester,
                    'address'   => $request->address,
                    'gender'    => $request->gender,
                    'phone'     => $request->phone,
                    'religion'  => $request->religion,
                    'photo'     => $profile,
                ]);

                $user->update([
                    'npm'       => $request->npm,
                    'email'     => $request->email
                ]);
            }
            return redirect()->route('user.profile')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
