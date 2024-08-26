<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Lapor;
use App\Models\PerangkatDaerah;
use App\Models\Pernyataan;

class UserPernyataanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userOnly');
        $this->middleware('preventBackHistory');
    }

    public function formBio(Request $request, $id)
    {
        $cek = Pernyataan::where('user_id', Auth::user()->id)->where('jadwal_id', $id)->count();
        if ($cek != 0) {
            abort(404);
        }
        $request->session()->forget('pernyataan');
        $request->session()->forget('step');
        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir)) {
            return view('user.bio', compact('jadwal'));
        }
        abort(404);
    }

    public function postBio(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir)) {
            $request->validate([
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'jabatan' => 'required',
                'pangkat' => 'required',
                'pd' => 'required|exists:App\Models\PerangkatDaerah,nama',
                'satker' => 'required'
            ]);
            $data = $request->all();
            $user = Auth::user();
            $input = $data;
            $input['id'] = Auth::user()->id;
            $user->update($input);

            session(['step' => '1']);
            $request->session()->put('pernyataan', $data);
            $request->session()->put('pernyataan.user_id', $user->id);
            $request->session()->put('pernyataan.jadwal_id', $jadwal->id);


            return redirect()->route('user.pernyataan.point', [$id,'1']);
            // return view('user.point1', compact('jadwal'));
        }
        abort(404);
    }

    public function formPoint(Request $request, $id, $point)
    {
        $jadwal = Jadwal::find($id);
        $step = session('step');
        if (masihBuka($jadwal->akhir) && $step != null) {
            switch ([$point, $step]) {
                case ['1','1']:
                    $request->session()->forget('pernyataan.tanya1');
                    $request->session()->forget('pernyataan.tanya2');
                    $request->session()->forget('pernyataan.tanya3');
                    return view('user.point1', compact('jadwal'));
                    break;
                case ['2','2']:
                    return view('user.point1', compact('jadwal'));
                    break;
                case ['3','3']:
                    return view('user.point1', compact('jadwal'));
                    break;
                default:
                    session(['step' => '1']);
                    return redirect()->route('user.pernyataan.point', [$id,'1']);
            }
        }
        abort(404);
    }

    public function postPoint(Request $request, $id, $point)
    {
        $jadwal = Jadwal::find($id);
        $step = session('step');
        if (masihBuka($jadwal->akhir)) {
            switch ([$point, $step]) {
                case ['1','1']:
                    //--------------------------------------------------------------------
                    $request->validate([
                      'p' => 'required|in:0,1'
                    ]);
                    if ($request->p == 1) {
                        $request->session()->put('pernyataan.tanya1', '0');
                        session(['step' => '2']);
                        return redirect()->route('user.pernyataan.point', [$id, session('step')]);
                    }
                    session(['step' => '5']);
                    $request->session()->put('pernyataan.tanya1', '1');
                    $request->session()->put('pernyataan.tanya2', '0');
                    $request->session()->put('pernyataan.tanya3', '0');
                    return redirect()->route('user.pernyataan.final', [$id]);
                    //--------------------------------------------------------------------
                    break;
                case ['2','2']:
                    //--------------------------------------------------------------------
                    $request->validate([
                      'p' => 'required|in:0,1'
                    ]);
                    session(['step' => '3']);
                    $request->session()->put('pernyataan.tanya2', $request->p);

                    return redirect()->route('user.pernyataan.point', [$id, session('step')]);
                    //--------------------------------------------------------------------
                    break;
                case ['3','3']:
                    //--------------------------------------------------------------------
                    $request->validate([
                      'p' => 'required|in:0,1'
                    ]);

                    if ($request->p == 1) {
                        session(['step' => '4']);
                        $request->session()->put('pernyataan.tanya3', $request->p);
                        return redirect()->route('user.pernyataan.lapor', [$id]);
                    }
                    session(['step' => '5']);
                    $request->session()->put('pernyataan.tanya3', $request->p);
                    return redirect()->route('user.pernyataan.final', $id);
                    //--------------------------------------------------------------------
                    break;
                default:
                    return redirect()->route('user.pernyataan.point', [$id,'1']);
            }
        }
        abort(404);
    }

    public function formLapor(Request $request, $id)
    {
        // dd(session('pernyataan.tanya1'));
        if (session('pernyataan.tanya1') == 1) {
            return redirect()->route('user.pernyataan.point', [$id,'1']);
        }

        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir) && session('step') != null) {
            $d = User::find(Auth::user()->id)->lapor;
            $range = awalAkhir($jadwal->tahun, $jadwal->semester);
            $lapor = $d->whereBetween('tanggal', $range)->sortByDesc('id');
            $count = $lapor->count();
            session(['step' => '4']);
            // dd($count);
            return view('user.lapor2', compact('jadwal', 'lapor', 'range', 'count'));
        }
        abort(404);
    }

    public function doneLapor(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir)) {
            session(['step' => '5']);
            return redirect()->route('user.pernyataan.final', $id);
        }
        abort(404);
    }

    public function formFinal(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir) && session('step') != null) {
            $d = User::find(Auth::user()->id)->lapor;
            $range = awalAkhir($jadwal->tahun, $jadwal->semester);
            $lapor = $d->whereBetween('tanggal', $range)->sortByDesc('id');

            // dd($request);
            return view('user.final', compact('jadwal', 'lapor', 'range'));
        }
        abort(404);
    }

    public function postFinal(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        if (masihBuka($jadwal->akhir) && session('step') != null) {
            $user = Auth::user();
            $range = awalAkhir($jadwal->tahun, $jadwal->semester);
            $pernyataan = Pernyataan::create(session('pernyataan'));
            // dd($pernyataan);
            Lapor::where('user_id', $user->id)->whereBetween('tanggal', $range)->update(['pernyataan_id' => $pernyataan->id]);
            $request->session()->forget('pernyataan');
            $request->session()->forget('step');
            return redirect()->route('user.daftar')->with('success', 'Data pernyataan berhasil disimpan.');
        }
        abort(404);
    }
}
