<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criteria;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::where('status', 1)->get();
        $files = Criteria::where('status', 0)->get();
        return view('user.kriteria', compact('criterias', 'files'));
    } 
}
