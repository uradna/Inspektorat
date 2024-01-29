<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;

class SuperadminPensiunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index(Request $request)
    {
        $usia = $request->usia;
        $date = date('Ym', strtotime('-' . $usia . ' year -1 month'));
        // $user = User::where('level', '=', 0)->where('aktif', '=', 1)->whereRaw("nip REGEXP '^[0-9]+$'")->whereRaw('SUBSTRING(nip, 1, 6) < ' . $date)->update(['aktif' => '0']);
        $user = User::where('level', '=', 0)->where('aktif', '=', 1)->whereRaw("nip REGEXP '^[0-9]+$'")->whereRaw('SUBSTRING(nip, 1, 6) < ' . $date)->orderBy('nip')->get();


        return view('superadmin.pensiun', compact('user', 'usia'));
    }
}
