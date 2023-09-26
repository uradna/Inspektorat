<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Pernyataan;
use App\Models\Jadwal;
use App\Models\Rekapitulasi;
use App\Models\User;

class SuperadminPernyataanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $rekap=Rekapitulasi::select('id', 'jadwal_id', \DB::raw("SUM(jumlah) AS jumlah"), \DB::raw("SUM(total) AS total"))->groupBy("jadwal_id")->orderByDesc('jadwal_id')->get();

        $jadwal=0;
        $j = Jadwal::where('status', '1')->get();
        if ($j->isNotEmpty()) {
            $pernyataan = Pernyataan::where('jadwal_id', $j[0]->id)->count();
            $totalPegawai = User::pegawai()->count();
            $jadwal = $j[0];
            $jadwal->pernyataan = $pernyataan;
            $jadwal->totalPegawai = $totalPegawai;
        }
        return view('superadmin.pernyataan', compact('rekap', 'jadwal'));
    }

    public function jadwal($id)
    {
        $jadwal=Jadwal::id($id);

        $cek=Rekapitulasi::where('jadwal_id', $id)->get();
        if ($cek->isEmpty()) {
            return redirect()->route('superadmin.pernyataan');
        }

        $rekap=DB::select("SELECT r.id, r.jadwal_id, r.pd, r.jumlah, r.total, COALESCE(tanya2, 0) AS t2, COALESCE(tanya3,0) as t3
                           FROM rekapitulasis r
                           LEFT JOIN (SELECT jadwal_id, pd, SUM(tanya2) as tanya2, SUM(tanya3) as tanya3 FROM `pernyataans` WHERE jadwal_id = ".$id." ) p ON r.pd = p.pd
                           WHERE r.jadwal_id = ".$id);

        return view('superadmin.perjadwal', compact('rekap', 'jadwal'));
    }

    public function jadwalpd($id, $pd)
    {
        if (!checkPD($pd)) {
            return redirect()->route('superadmin.pernyataan');
        }
        if (!cekJadwal($id)) {
            return redirect()->route('superadmin.pernyataan');
        }
       
        $user=Pernyataan::where('jadwal_id', $id)->where('pd', $pd)->get();
        $jadwal = Jadwal::id($id);
        return view('superadmin.perjadwalpd', compact('user', 'jadwal', 'pd'));
    }

    public function terakhir()
    {
        $j = Jadwal::where('status', '1')->get();
        if ($j->count()==0) {
            dd('kosong');
        }
        $jadwal=$j->first();
        $rekap=DB::select("SELECT u.pd, COUNT(p.user_id) AS jumlah,  COUNT(DISTINCT u.id) AS total, SUM(tanya2) as t2, SUM(tanya3) as t3
        FROM (SELECT * FROM users WHERE level = 0 AND aktif = 1 AND pd!='') u
        LEFT JOIN (SELECT user_id, jadwal_id, pd, tanya2, tanya3 FROM pernyataans WHERE jadwal_id = ".$jadwal->id.") p ON u.id = p.user_id
        GROUP BY u.pd ORDER BY jumlah DESC");

        // dd($rekap);
        return view('superadmin.pernyataanterakhir', compact('rekap', 'jadwal'));
    }

    public function terakhirpd($pd)
    {
        if (!checkPD($pd)) {
            return redirect()->route('superadmin.pernyataan');
        }
        $j = Jadwal::where('status', '1')->get();
        if ($j->count()==0) {
            dd('kosong');
        }
        $jadwal=$j->first();
        // dd($user);
        return view('superadmin.pernyataanterakhirpd', compact('jadwal', 'pd'));
    }

    public function terakhirpdAjax($pd)
    {
        if (!checkPD($pd)) {
            return redirect()->route('superadmin.pernyataan');
        }
        $j = Jadwal::where('status', '1')->get();
        if ($j->count()==0) {
            dd('kosong');
        }
        $jadwal=$j->first();
        
        $user=DB::select('SELECT 
        users.id as DT_RowId,
        users.id, 
        users.name, 
        users.nip, 
        users.phone, 
        users.jabatan, 
        users.satker,  

        pernyataans.tanya1,
        pernyataans.tanya2,
        pernyataans.tanya3,
        
        CASE WHEN pernyataans.id IS NULL THEN 0 ELSE 1 END AS pernyataan
        FROM users
        LEFT JOIN (select * from pernyataans WHERE pernyataans.jadwal_id = "'.$jadwal->id.'") AS pernyataans ON users.id = pernyataans.user_id
        WHERE users.pd = "'.$pd.'" AND users.level = "0" AND users.aktif = "1"');

        $data = collect($user);
        return response()->json([
            'data'    => $data->values()
        ]);
    }

    public function jadwalpdAjax($id, $pd)
    {
        if (!checkPD($pd)) {
            return redirect()->route('superadmin.pernyataan');
        }
        if (!cekJadwal($id)) {
            return redirect()->route('superadmin.pernyataan');
        }

        $user=DB::select('SELECT 
        users.id AS DT_RowId,
        users.id, 
        users.name, 
        users.nip, 
        users.phone, 
        users.jabatan, 
        users.satker,  

        pernyataans.tanya1,
        pernyataans.tanya2,
        pernyataans.tanya3,
        
        CASE WHEN pernyataans.id IS NULL THEN 0 ELSE 1 END AS pernyataan
        FROM users
        JOIN (select * from pernyataans WHERE pernyataans.jadwal_id = "'.$id.'") AS pernyataans ON users.id = pernyataans.user_id
        WHERE users.pd = "'.$pd.'" AND users.level = "0" AND users.aktif = "1"');

        $data = collect($user);
        return response()->json([
            'data'    => $data->values()
        ]);
    }
}
