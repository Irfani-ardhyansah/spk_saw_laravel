<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mahasiswa;
use App\Admin;
use App\Criteria;

class DashboardController extends Controller
{
    public function index()
    {
        $admin_count = Admin::all()->count();
        $mahasiswa_count = Mahasiswa::all()->count();
        $criteria_count = Criteria::all()->count();
        return view('admin.index', compact('admin_count', 'mahasiswa_count', 'criteria_count'));
    }
}
