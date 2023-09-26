<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Jadwal;
use App\Models\Pernyataan;
use App\Models\Rekapitulasi;

class SuperadminJadwalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $jadwal = Jadwal::orderByDesc('id')->get();
        $latest = Jadwal::latest()->first();
        $aktif = $latest;
        if ($aktif->semester==2) {
            $aktif->tahun_baru = $aktif->tahun + 1;
            $aktif->semester_baru = 1;
        } else {
            $aktif->tahun_baru = $aktif->tahun;
            $aktif->semester_baru = 2;
        }
        return view('superadmin.jadwal', compact('jadwal', 'aktif'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'semester' => 'required|in:1,2',
            'akhir' => 'required|date|after:tomorrow',
        ]);

        $invalid = Jadwal::where("tahun", $request->tahun)->where("semester", $request->semester)->count();
        $aktif = Jadwal::where("status", "1")->count();
        
        if ($invalid) {
            $error="Gagal...! Jadwal sudah ada.";
            return redirect()->back()->with('fail', $error);
        }
        if ($aktif) {
            $error="Gagal...! Masih ada jadwal berlangsung.";
            return redirect()->back()->with('fail', $error);
        }

        Jadwal::create($request->all());
        return redirect()->route('superadmin.jadwal')->with('success', 'Jadwal baru berhasil disimpan.');
    }

    public function edit(Request $request)
    {
        $request->validate([
            'akhir' => 'required|date|after:tomorrow',
        ]);

        $aktif = Jadwal::where("status", "1");
        if (!$aktif->count()) {
            $error="Gagal...! Tidak ada jadwal aktif.";
            return redirect()->back()->with('fail', $error);
        }

        $input['akhir'] = $request->akhir;

        Jadwal::where("id", $aktif->first()->id)->update($input);
        return redirect()->route('superadmin.jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function close(Request $request)
    {
        $aktif = Jadwal::where("status", "1");
        if (!$aktif->count()) {
            $error="Gagal...! Tidak ada jadwal aktif.";
            return redirect()->back()->with('fail', $error);
        }

        $id = $aktif->first()->id;

        $rekap=DB::select("SELECT ".$id." as jadwal_id, u.pd, COUNT(p.user_id) AS jumlah, COUNT(DISTINCT u.id) AS total
        FROM (SELECT * FROM users WHERE level = 0 AND aktif = 1 AND pd!='') u
        LEFT JOIN (SELECT * FROM pernyataans WHERE jadwal_id = ".$id.") p ON u.id = p.user_id 
        GROUP BY u.pd ORDER BY jumlah DESC");

        $insertData = array_map(function ($rekap) {
            return [
                'jadwal_id' => $rekap->jadwal_id,
                'pd' => $rekap->pd,
                'jumlah' => $rekap->jumlah,
                'total' => $rekap->total,
            ];
        }, $rekap);

        Jadwal::where("id", $id)->update(['akhir'=>date("Y-m-d", strtotime("-1 days")), 'status'=>'0']);
        DB::table('rekapitulasis')->insert($insertData);
        return redirect()->route('superadmin.jadwal')->with('success', 'Jadwal berhasil ditutup. Data rekapitulasi tersimpan.');
    }
}
