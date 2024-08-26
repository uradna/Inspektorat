<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Bantuan;

class UserBantuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('resetAdmin');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $level = Auth::user()->level;

        if ($level == 0) {
            $data = Bantuan::where('for', 'user')->orderBy('order', 'ASC')->get();
            // dd($data->all());
            return view('user.bantuan', compact('data'));
        }
        if ($level == 1) {
            $data = Bantuan::where('for', 'admin')->get();
            // dd($data);
            return view('admin.bantuan', compact('data'));
        }
        if ($level == 2) {
            $data = Bantuan::where('for', 'superadmin')->get();
            // dd($data);
            return view('superadmin.bantuan', compact('data'));
        }
        abort(404);
    }
}
