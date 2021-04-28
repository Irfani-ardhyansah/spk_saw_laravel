<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Admin;
use App\Criteria;
use App\Period;
use App\Dashboard;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        ///Mengambil data lalu menghitungnya langsung
        $admin_count = Admin::all()->count();
        $mahasiswa_count = Mahasiswa::all()->count();
        $criteria_count = Criteria::all()->count();
        $period_count = Period::all()->count();
        return view('admin.index', compact('admin_count', 'mahasiswa_count', 'criteria_count', 'period_count'));
    }

    public function user()
    {
        $dashboard = Dashboard::all();
        return view('admin.dashboard_user.index', compact('dashboard'));
    }

    public function save(Request $request) 
    {
        try {
            //melakukan validasi data
            $this->validate($request, [ 
                'title'         => 'required',
                'content'        => 'required'
            ],[
                'title.required'  =>  'Judul harus Diisi!',
                'content.required'  =>  'Konten Harus Diisi!'
            ]);
            //menyimpan data
            Dashboard::create([
                'admin_id'      =>  Auth::user()->id,
                'title'         =>  $request->title,
                'content'       =>  $request->content
            ]);
            return redirect()->back()->with(['success' => 'Berhasil Menambah Konten Dashboard User!']);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id) 
    {
        if($request->isMethod('post')) { //jika method post
            $data = $request->all(); //menyimpan semua inputan dari view
            Dashboard::where(['id'=>$id])->update(['title'=>$data['title'], 'content'=>$data['content']]); //melakukan update pada databse
            return redirect()->back()->with(['success' => 'Update ' . $request->title . ' Berhasil!']);
        }
    }
}
