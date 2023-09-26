<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Lapor;
use App\Models\Pernyataan;
use App\Models\PerangkatDaerah;

class UserLaporController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $d=User::find(Auth::user()->id)->lapor;
        $lapor=$d->sortByDesc('id');
        // dd($lapor);
        return view('user.lapor', compact('lapor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pd' => 'required|exists:App\Models\PerangkatDaerah,nama',
            'satker' => 'required',
            'jenis' => 'required',
            'bentuk' => 'required',
            'nilai' => 'required|numeric',
            'tanggal' => 'required|date',
            'pemberi' => 'required',
            'hubungan' => 'required',
            'alamat' => 'required',
            'alasan' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Lapor::create($input);
        return redirect()->route('user.lapor')->with('success', 'Laporan gratifikasi berhasil disimpan.');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'pd' => 'required|exists:App\Models\PerangkatDaerah,nama',
            'satker' => 'required',
            'jenis' => 'required',
            'bentuk' => 'required',
            'nilai' => 'required|numeric',
            'tanggal' => 'required|date',
            'pemberi' => 'required',
            'hubungan' => 'required',
            'alamat' => 'required',
            'alasan' => 'required',
        ]);
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        Lapor::create($input);
        return redirect()->back()->with('success', 'Laporan gratifikasi berhasil disimpan.');
    }

    public function delete(Request $request)
    {
        $d=Lapor::find($request->id);
        if (Auth::user()->id!=$d->user_id or $d->pernyataan_id!=null) {
            return redirect()->back()->with('fail', 'Data gratifikasi gagal dihapus.');
            abort(403);
        }
        $d->delete();
        return redirect()->route('user.lapor')->with('success', 'Data gratifikasi berhasil dihapus.');
    }

    public function hapus(Request $request)
    {
        $d=Lapor::find($request->id);
        if (Auth::user()->id!=$d->user_id or $d->pernyataan_id!=null) {
            abort(403);
        }
        $d->delete();
        return redirect()->back()->with('success', 'Data gratifikasi berhasil dihapus.');
    }
}
