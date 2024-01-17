<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\PerangkatDaerah;
use App\Models\Hapus;

class SuperadminPegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $perangkat = DB::select('SELECT p.nama, count(u.id) AS total 
                           FROM `perangkat_daerahs` p 
                           LEFT JOIN (SELECT * FROM users WHERE level = 0 AND aktif = 1) u ON p.nama = u.pd
                           GROUP BY p.nama');
        // dd($pd);
        return view('superadmin.pegawai', compact('perangkat'));
    }

    public function pd($pd)
    {
        if (PerangkatDaerah::Cek($pd)) {
            $user = User::where('pd', $pd)->where('level', '0')->where('aktif', '1')->orderBy('name')->get();
            // dd($user);
            return view('superadmin.pegawaipd', compact('user', 'pd'));
        }
        abort(404);
    }

    public function pegawaiAjax($pd)
    {
        $user = Auth::user();
        $pegawai = DB::select('SELECT `id` AS `DT_RowId`, `id`, `email`, `name`, `nip`, `phone`, `jabatan`, `pangkat`, `satker`, `pd` FROM `users` WHERE `pd` = \'' . $pd . '\' AND `level` = \'0\' AND `aktif` = \'1\' ');
        $data = collect($pegawai);
        return response()->json([
            'data' => $data->values()
        ]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'pd' => 'required',
        ]);
        if (PerangkatDaerah::Cek($request->pd)) {
            $user = User::where('id', $request->id)->first();
            $user->update($request->all());
            return redirect()->back()->with('success', 'Data pegawai berhasil diupdate');
        }
        return redirect()->back()->with('fail', 'Perangkat daerah tidak ditemukan');
    }

    public function password(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);
        $input['password'] = Hash::make($request->password);
        $user->update($input);
        return redirect()->back()->with('success', 'Password a/n ' . $user->name . ' berhasil diupdate');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'alasan' => 'required',
        ]);

        if (User::where('id', $request->user_id)->count()) {
            $user = User::find($request->user_id);
            $update['aktif'] = '0';
            $user->update($update);
            $hapus = array('user_id' => $user->id, 'pd' => $user->pd, 'alasan' => $request->alasan, 'status' => '3', 'feedback' => 'Dihapus oleh ' . Auth::user()->name);
            Hapus::create($hapus);
            return redirect()->back()->with('success', 'User a/n ' . $user->name . ' berhasil dihapus');
        }
        return redirect()->back()->with('fail', 'User tidak ditemukan');
    }

    public function add(Request $request)
    {
        if ($request->pd == "Bupati dan Wakil Bupati") {

        } else {
            $request->validate([
                'name' => 'required',
                'nip' => 'required|digits:18'
            ]);

            if (!User::where('nip', $request->nip)->count()) {
                if ($request->pd != null) {
                    if (PerangkatDaerah::where('nama', $request->pd)->count() != 1) {
                        return redirect()->back()->with('fail', 'Gagal. Perangkat daerah tidak ditemukan.');
                    }
                }
                $input = $request->all();
                $input['username'] = $request->nip;
                $input['password'] = Hash::make($request->nip);

                $input['level'] = '0';
                $input['aktif'] = '1';
                // dd($input);
                User::create($input);
                return redirect()->back()->with('success', 'User a/n ' . $request->name . ' berhasil ditambahkan');
            }
            return redirect()->back()->with('fail', 'Gagal membuat user baru. NIP sudah terdaftar.');
        }

    }

    public function search(Request $request)
    {
        if ($request->name != null) {
            $like = "name LIKE '%" . $request->name . "%'";
            $key = array('Nama :',$request->name);
        } elseif ($request->nip != null) {
            $like = "nip LIKE '%" . $request->nip . "%'";
            $key = array('NIP :',$request->nip);
        } else {
            return redirect()->back()->with('fail', 'Pencarian gagal. Masukkan nama atau NIP.');
        }
        $query = "SELECT * FROM users WHERE " . $like . " AND level = '0' AND aktif = '1'";
        $hasil = DB::select($query);
        // dd($hasil);
        return view('superadmin.pegawaipencarian', compact('hasil', 'key'));
    }
}
