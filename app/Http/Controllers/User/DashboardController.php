<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $beasiswa = Dashboard::first();
        return view('user.index', compact('beasiswa'));
    }
}
