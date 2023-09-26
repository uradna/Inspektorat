<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pernyataan;

class UserDaftarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userOnly');
        $this->middleware('preventBackHistory');
    }
    
    public function index()
    {
        $jadwal = DB::select('SELECT * FROM jadwals ORDER BY id DESC');
        $aktif=0;
        foreach ($jadwal as $i => $d) {
            $s=Pernyataan::where('user_id', Auth::user()->id)->where('jadwal_id', $d->id)->get();
            $jadwal[$i]->status = $s->count();
            if ($s->count()==0 && masihBuka($d->akhir)) {
                $jadwal[$i]->status = 2;
                $jadwal[$i]->pernyataan_id = null;
                $aktif=$jadwal[$i];
            }
            if ($s->count()==1) {
                $jadwal[$i]->pernyataan_id =$s->first()->id;
            }
        }
        // dd($jadwal);
        // dd($jadwal);
        return view('user.daftar', compact('jadwal', 'aktif'));
    }
}
