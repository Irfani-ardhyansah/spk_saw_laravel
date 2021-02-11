<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_period;

class BeasiswaController extends Controller
{
    public function peserta($id)
    {   
        $pendaftar = User_period::where('period_id', $id)->get();
        return view('admin.period.peserta', compact('pendaftar'));
    }
}
