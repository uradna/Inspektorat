<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Rekapitulasi;
use App\Models\Pernyataan;

class AdminPernyataanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $pd=Auth::user()->pd;

        $jadwal_aktif = Jadwal::where('status', 1);
        $aktif = null;
        if ($jadwal_aktif->count()==1) {
            $aktif=DB::select('SELECT j.id, j.tahun, j.semester, j.akhir, COUNT(pernyataans.id) AS jumlah
                               FROM (select * from jadwals where status = 1) j
                               LEFT JOIN (select * from pernyataans WHERE pernyataans.pd = "'.$pd.'") AS pernyataans ON j.id = pernyataans.jadwal_id  
                               GROUP BY j.id
                               ORDER BY j.id DESC');
            $aktif=$aktif[0];
            $aktif->total = getTotalPegawai(Auth::user()->pd);
        }

        $daftar=Rekapitulasi::orderByDesc('id')->where('pd', $pd)->get();

        $status = "Sudah berakhir";
        if (masihBuka($jadwal_aktif->first()->akhir)) {
            $status = "Masih berlangsung ";
        }
       
        return view('admin.pernyataan', compact('aktif', 'daftar', 'status'));
    }
    
    public function latest()
    {
        $j=Jadwal::where('status', '1')->first();
        $user=DB::select('SELECT 
        users.id, 
        users.name, 
        users.nip, 
        users.phone, 
        users.jabatan, 
        users.satker,  
        CASE WHEN pernyataans.id IS NULL THEN "0" ELSE "1" END AS pernyataan
        FROM users
        LEFT JOIN (select * from pernyataans WHERE pernyataans.jadwal_id = "'.$j->id.'") AS pernyataans ON users.id = pernyataans.user_id
        WHERE users.pd = "'.Auth::user()->pd.'" AND users.level = "0" AND users.aktif = "1" ORDER BY pernyataan DESC');

        $tahun = $j->tahun;
        $semester = $j->semester;
        // dd($user);
        return view('admin.detail', compact('user', 'tahun', 'semester'));
    }

    public function detail($id, $tahun, $semester)
    {
        $j=Jadwal::where('id', $id)->first();
        $tahun = $j->tahun;
        $semester = $j->semester;
        return view('admin.detail', compact('tahun', 'semester'));
    }

    public function ajaxLatest()
    {
        $j=Jadwal::where('status', '1')->first();
        $user=DB::select('SELECT 
        users.id AS DT_RowId,
        users.id, 
        users.name, 
        CONCAT(users.nip,"‎ ") as nip, 
        CONCAT(users.phone,"‎ ") as phone, 
        users.jabatan, 
        users.satker,  
        CASE WHEN pernyataans.id IS NULL THEN "0" ELSE "1" END AS pernyataan
        FROM users
        LEFT JOIN (select * from pernyataans WHERE pernyataans.jadwal_id = "'.$j->id.'") AS pernyataans ON users.id = pernyataans.user_id
        WHERE users.pd = "'.Auth::user()->pd.'" AND users.level = "0" AND users.aktif = "1"
        ORDER BY pernyataan DESC');
        $data = collect($user);
        return response()->json([
            'data'    => $data->values()
        ]);
    }

    public function ajax($id, $tahun, $semester)
    {
        $user=DB::select('SELECT u.name, u.nip, u.email, u.phone, u.jabatan, u.satker, "1" as pernyataan 
                          FROM users u 
                          INNER JOIN (SELECT * FROM pernyataans WHERE pd = "'.Auth::user()->pd.'") p ON u.id = p.user_id
                          WHERE p.jadwal_id = "'.$id.'"');
        $data = collect($user);
        return response()->json([
            'data'    => $data->values()
        ]);
    }
}
