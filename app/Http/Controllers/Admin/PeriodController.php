<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;
use Auth;

class PeriodController extends Controller
{
    public function index()
    {
        return view('admin.period.index');
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'start'  => 'required',
            'end'    => 'required',
            'file'   => 'required|mimes:pdf|max:2000',
            'status' => 'required'
        ]);
        dd($request->all());

        try {
            $periods = Period::create([
                'admin_id'  =>  Auth::user()->id,
                'start'     =>  $request->start,
                'end'       =>  $request->end,
                'file'      =>  $request->file,
                'status'    =>  $request->status 
            ]);

            return redirect()->back()->with(['success' => 'Berhasil Menambah Periode ' . $periods->start]);
        } catch(\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
