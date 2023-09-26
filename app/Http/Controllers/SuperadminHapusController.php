<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\PerangkatDaerah;
use App\Models\Hapus;

class SuperadminHapusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $hasil = Hapus::where('status', 0)->get();
        return view('superadmin.hapus', compact('hasil'));
    }

    public function tolak(Request $request)
    {
        // dd($request->all());
        $h=Hapus::where('id', $request->id)->first();
        $update=$request->all();
        $update['status'] = '2';
        // $update['feedback'] = 'Dihapus oleh '.Auth::user()->name;
        $h->update($update);
        // dd($h);
        return redirect()->back()->with('success', 'Permintaan hapus berhasil ditolak');
    }

    public function setuju(Request $request)
    {
        if (Hapus::where('id', $request->id)->count() == '1') {
            $h=Hapus::where('id', $request->id)->first();
            $u=$h->user;
            $update_h['status'] = '1';
            $update_u['aktif'] = '0';
    
            $h->update($update_h);
            $u->update($update_u);
            return redirect()->back()->with('success', 'User a/n '.$u->name.' berhasil dihapus.');
        }
        abort(404);
    }

    public function reject()
    {
        $hasil=Hapus::where('status', '2')->whereHas('user', function ($query) {
            $query->where('aktif', 1);
        })->get();
        // dd($h);
        return view('superadmin.hapusreject', compact('hasil'));
    }

    public function list()
    {
        $hasil=Hapus::where('status', '1')->orWhere('status', '3')->get();
        return view('superadmin.hapuslist', compact('hasil'));
    }

    public function restore(Request $request)
    {
        if (Hapus::where('id', $request->id)->count() == '1') {
            $h=Hapus::where('id', $request->id)->first();
            $u=$h->user;
            $update_h['status'] = '4';
            $update_u['aktif'] = '1';
    
            $h->update($update_h);
            $u->update($update_u);
            return redirect()->back()->with('success', 'Data user a/n '.$u->name.' berhasil dikembalikan.');
        }
        abort(404);
        // dd($request->all());
    }
}
