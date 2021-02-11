<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Admin;
use App\Criteria;
use App\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_count = Admin::all()->count();
        $mahasiswa_count = Mahasiswa::all()->count();
        $criteria_count = Criteria::all()->count();
        $period_count = Period::all()->count();
        return view('admin.index', compact('admin_count', 'mahasiswa_count', 'criteria_count', 'period_count'));
    }
}
