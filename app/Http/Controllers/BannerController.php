<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Banner;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index()
    {
        $banner=Banner::all();
        // dd($banner);
        return view('superadmin.banner', compact('banner'));
        // dd($user);
    }

    public function create(Request $request)
    {
        $file['mime']=$request->img->getClientMimeType();
        $request->validate([
            'img' => 'required|image',
        ]);
        if ($file['mime']!="image/png" and $file['mime']!="image/jpeg") {
            return redirect()->back()->with('fail', 'Gagal. File tidak sesuai.');
        }
        $file['name'] = $request->img->getClientOriginalName();

        $input=$request->all();
        
        $input['img'] = "banner-".Auth::user()->id."-".date("Ymdhis")."-".$file['name'];
        $input['aktif'] = "1";

        $img= $request->file('img');

        $img->move('upload', $input['img']);
        Banner::create($input);
        return redirect()->back()->with('success', 'Banner berhasil diupload.');
        // dd($input['img']);
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $banner=Banner::find($request->id);
        // dd($banner);
        $banner->update($request->all());
        return redirect()->back()->with('success', 'Data banner berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        // dd($request->all());
        $banner=Banner::find($request->id);
        File::delete("upload/".$banner->img);
        $banner->delete();
        return redirect()->back()->with('success', 'Data banner berhasil dihapus.');
    }
}
