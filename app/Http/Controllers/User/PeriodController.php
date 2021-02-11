<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Period;
use App\Criteria;
use App\Weight;

class PeriodController extends Controller
{
    public function index()
    {
        $periods = Period::where('status', 1)->get();
        return view('user.period.index', compact('periods'));
    }

    public function create()
    {
        $criterias = Criteria::all();
        $weight = Weight::first();
        return view('user.period.daftar', compact('criterias', 'weight'));
    }

    public function save(Request $request)
    {
        $request->all();
        dd($request->all());
    }
}
