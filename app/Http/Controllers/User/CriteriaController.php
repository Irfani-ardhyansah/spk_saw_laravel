<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criteria;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('user.kriteria', compact('criterias'));
    } 
}
