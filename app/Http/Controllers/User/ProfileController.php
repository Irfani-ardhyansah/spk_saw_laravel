<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use Auth;
use File;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('user.profile.index', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('user.profile.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'npm'       => 'required|max:9|unique:users',
            'name'      => 'required',
            'npm'       => 'required',
            'prodi'     => 'required',
            'semester'  => 'required',
            'address'   => 'required',
            'gender'    => 'required',
            'phone'     => 'required',
            'religion'  => 'required',
            'photo'     => 'mimes:jpg,jpeg,png|max:20000'
        ]);

        try {
            $mahasiswa = Mahasiswa::findOrFail($id);
            if($request->file('photo') == "") {
                $mahasiswa->update([
                    'name'      => $request->name,
                    'npm'       => $request->npm,
                    'prodi'     => $request->prodi,
                    'semester'  => $request->semester,
                    'address'   => $request->address,
                    'gender'    => $request->gender,
                    'phone'     => $request->phone,
                    'religion'  => $request->religion,
                ]);
            } else {
                File::delete('public/profile_images/'.$mahasiswa->photo);

                $$extension = $file->getClientOriginalExtension();
                $nama_file = rand(99,999) . '_' . Carbon::now()->format('Y-m-d') . '_' . '_profile' . '.' . $extension;
                $data['photo']->move('profile_images/', $nama_file);
                $profile = $nama_file;

                $mahasiswa->update([
                    'name'      => $request->name,
                    'npm'       => $request->npm,
                    'prodi'     => $request->prodi,
                    'semester'  => $request->semester,
                    'address'   => $request->address,
                    'gender'    => $request->gender,
                    'phone'     => $request->phone,
                    'religion'  => $request->religion,
                    'photo'     => $profile,
                ]);
            }
            return redirect()->route('user.profile')->with(['success' => 'Data Berhasil Diupdate!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
