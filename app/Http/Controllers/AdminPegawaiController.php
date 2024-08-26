<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

use App\Models\User;
use App\Models\PerangkatDaerah;

class AdminPegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
        $this->middleware('resetAdmin');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $user = Auth::user();
        // $pegawai=User::where('pd', Auth::user()->pd)->where('level', '0')->get();
        // $pegawai=DB::select('SELECT * FROM `users` WHERE `pd` = \''.$user->pd.'\' AND `level` = \'0\' AND `aktif` = \'1\' ');
        return view('admin.pegawai');
    }

    public function ajax()
    {
        $user = Auth::user();
        $pegawai = DB::select('SELECT id AS DT_RowId, id, email, name, nip, phone, jabatan, satker, pd FROM `users` WHERE `pd` = \''.$user->pd.'\' AND `level` = \'0\' AND `aktif` = \'1\' ');
        $data = collect($pegawai);
        return response()->json([
            'data'    => $data->values()
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
        return redirect()->back()->with('success', 'Password a/n '.$user->name.' berhasil diupdate');
    }
}
