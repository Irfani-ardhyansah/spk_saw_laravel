<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Anouncement;

class PengumumanController extends Controller
{
    public function index()
    {
        $anouncements = Anouncement::where('status', 1)->get();
        return view('user.pengumuman', compact('anouncements'));
    }
}
