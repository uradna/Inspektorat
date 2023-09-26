<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lapor;

class SuperadminLaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $data=Lapor::all();
        // dd($daftar);
        return view('superadmin.lapor', compact('data'));
    }
}
