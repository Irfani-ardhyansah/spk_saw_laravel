<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anouncement;

class DashboardController extends Controller
{
    public function index()
    {
        $anouncements = Anouncement::where('status', 1)->get();
        return view('dashboard2', compact('anouncements'));
    }
}
