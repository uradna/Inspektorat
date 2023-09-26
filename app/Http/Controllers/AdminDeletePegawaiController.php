<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Hapus;
use File;

class AdminDeletePegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('adminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $user=Auth::user();
        $pegawai=Hapus::where('pd', Auth::user()->pd)->where('status', '!=', '3')->orderBy('created_at', 'DESC')->get();
        return view('admin.delete', compact('pegawai'));
    }

    public function delete(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'file' => 'required',
        ]);
        if ($request->file->getClientMimeType()!="application/pdf") {
            return redirect()->back()->with('fail', 'Upload gagal. File harus PDF.');
        }
        $user=User::where('id', $request->user_id)->first();

        $input=$request->all();
        $input['pd']=$user->pd;
        $input['status']='0';

        $f = $request->file('file');
        if ($f->getClientOriginalExtension() != "pdf") {
            return redirect()->back()->with('fail', 'Upload gagal. File harus PDF.');
        }
        $nama=explode(' ', $user->name);
        $input['file'] = date("Ymdhis").'-'.$user->nip.'-'.$nama[0].'.'.$f->getClientOriginalExtension();
        $f->move('pdf', $input['file']);
        Hapus::create($input);
        return redirect()->route('admin.pegawai.delete')->with('success', 'Permintaan hapus pegawai berhasil disimpan.');
    }

    public function remove(Request $request)
    {
        $d=Hapus::where('id', $request->id)->first();
        if ($d!=null) {
            if (Auth::user()->pd==$d->pd) {
                $file="pdf/".$d->file;
                // dd($file);
                $d->delete();
                if (File::exists(public_path($file))) {
                    File::delete(public_path($file));
                }
                return redirect()->back()->with('success', 'Permintaan hapus pegawai berhasil dibatalkan');
            }
            return redirect()->back()->with('fail', '403. Forbidden');
        }
        return redirect()->back()->with('fail', '404. Not Found!');

        // dd($d);
    }
}
