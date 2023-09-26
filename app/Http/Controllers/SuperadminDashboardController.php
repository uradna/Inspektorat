<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Models\Jadwal;

class SuperadminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        // $jadwal=Jadwal::all();
        return view('superadmin.index');
    }
}
