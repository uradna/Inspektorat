<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pernyataan;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userOnly');
        $this->middleware('preventBackHistory');
    }
    public function index()
    {
        $jadwal=Jadwal::latest()->first();
        $p=Pernyataan::where('user_id', Auth::user()->id)->where('jadwal_id', $jadwal->id)->count();
        $aktif=null;
        if (masihBuka($jadwal->akhir)) {
            $aktif=1;
        }
        // dd($jadwal);
        return view('user.index', compact('jadwal', 'aktif', 'p'));
    }
}
