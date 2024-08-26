<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class SuperadminAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $user = User::admin()->get();
        return view('superadmin.admin', compact('user'));
        // dd($user);
    }

    public function add(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'pd' => 'required',
            'password' => 'required',
        ]);
        if (checkPD($request->pd)) {
            if (!User::cekUser($request->username)) {
                $input = $request->all();
                $input['nip'] = $input['username'];
                $input['password'] = Hash::make($input['password']);
                $input['aktif'] = '1';
                User::create($input);
                return redirect()->back()->with('success', 'Admin '.$request->name.' berhasil ditambahkan. Password: '.$request->password);
            }
            return redirect()->back()->with('fail', 'Gagal. Username sudah dipakai.');
        }
        return redirect()->back()->with('fail', 'Gagal. Perangkat daerah tidak ditemukan.');
    }

    public function pass(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($request->id);
        $i['password'] = Hash::make($request->password);
        $i['aktif'] = 2;
        $user->update($i);
        return redirect()->back()->with('success', 'Password berhasil diupdate. Password baru: '.$request->password);
        // dd($i);
    }

    public function del(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::find($request->id);
        // dd($user);
        $user->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
