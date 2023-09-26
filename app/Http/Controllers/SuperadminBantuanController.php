<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Bantuan;

class SuperadminBantuanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadminOnly');
        $this->middleware('preventBackHistory');
    }

    public function index(Request $request)
    {
        $u=$request->for;
        $data=Bantuan::where('for', $u)->orderBy('order', 'ASC')->get();
        
        return view('superadmin.bantuan-list', compact('data', 'u'));
        // dd($d);
    }

    public function new(Request $request)
    {
        $u=$request->for;
        return view('superadmin.bantuan-new', compact('u'));
        // dd($d);
    }

    public function create(Request $request)
    {
        $lastOrder = Bantuan::lastOrder($request->for);
        $input=$request->all();
        $input['order'] = $lastOrder+1;
        Bantuan::create($input);
        return redirect()->route('superadmin.help', $input['for'])->with('success', 'Data berhasil disimpan');
        // dd($input);
        // dd($request->all());
    }

    public function edit(Request $request)
    {
        if (Bantuan::find($request->id)) {
            $data=Bantuan::find($request->id);
            return view('superadmin.bantuan-edit', compact('data'));
        }
        abort(404);
    }

    public function update(Request $request)// todo. Cek for, next order if changed
    {
        if (Bantuan::find($request->id)) {
            $data=Bantuan::find($request->id);
            $data->update($request->all());
            return redirect()->route('superadmin.help', $data['for'])->with('success', 'Data berhasil disimpan');
        }
        abort(404);
    }

    public function delete(Request $request)
    {
        if (Bantuan::find($request->id)) {
            $data=Bantuan::find($request->id);
            $data->delete();
            return redirect()->route('superadmin.help', $data['for'])->with('success', 'Data berhasil dihapus');
        }
        abort(404);
    }

    public function up(Request $request)
    {
        // dd($request->id);
        if (Bantuan::find($request->a) && Bantuan::find($request->c)) {
            $data1=Bantuan::find($request->a);
            $data2=Bantuan::find($request->c);
            $order1['order']=$request->b;
            $order2['order']=$request->d;

            $data1->update($order1);
            $data2->update($order2);
            return redirect()->back();
        }
        abort(404);
    }
}
