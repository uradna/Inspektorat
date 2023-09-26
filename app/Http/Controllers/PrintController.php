<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Pernyataan;
use App\Models\User;
use App\Models\Lapor;
use PDF;

class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('preventBackHistory');
    }

    public function pdf($id)
    {
        $p=Pernyataan::find($id);

        if (!$p) {
            abort(404);
        }

        $u=User::find(Auth::user()->id);
        $lapor=$p->lapor;

        $periode=convertPeriode($p->jadwal->tahun, $p->jadwal->semester);
        $tg_ttd=konversiTanggal(dateFromTimestamp($p->created_at));
        $range=awalAkhir($p->jadwal->tahun, $p->jadwal->semester);
       

        if ($p->user_id==$u->id) {
            $pdf = PDF::loadView('print', [
                'title' => 'Surat Pernyataan Gratifikasi',
                'description' => 'Surat Pernyataan Gratifikasi.',
                'name' => $u->name,
                'nip' => $u->nip,
                'pangkat' => $p->pangkat,
                'jabatan' => $p->jabatan,
                'pd' => $u->pd,
                'email' => $u->email,
                'phone' => $u->phone,
                'periode' => $periode,
                'lapor' => $lapor,
                'point'=>[$p->tanya1, $p->tanya2, $p->tanya3],
                'tg_ttd' => $tg_ttd,
            ]);
            
            return $pdf->download('Surat Pernyataan - '.$u->name.' - '.$u->nip.'.pdf');
        }
        abort(404);
    }

    public function print($id)
    {
        $p=Pernyataan::find($id);
        $u=User::find(Auth::user()->id);

        $periode=convertPeriode($p->jadwal->tahun, $p->jadwal->semester);
        $tg_ttd=konversiTanggal(dateFromTimestamp($p->created_at));
        $range=awalAkhir($p->jadwal->tahun, $p->jadwal->semester);
        $lapor=$u->lapor->whereBetween('tanggal', $range);

        if ($p->user_id==$u->id) {
            $title= 'Surat Pernyataan Gratifikasi';
            $description= 'Surat Pernyataan Gratifikasi';
            $name= $u->name;
            $nip= $u->nip;
            $pangkat= $p->pangkat;
            $jabatan= $p->jabatan;
            $pd= $u->pd;
            $email= $u->email;
            $phone= $u->phone;
            $periode= $periode;
            $lapor= $lapor;
            $point=array($p->tanya1, $p->tanya2, $p->tanya3);
            $tg_ttd= $tg_ttd;
            $print=true;
            
            return view('print', compact('print', 'title', 'description', 'name', 'nip', 'pangkat', 'jabatan', 'pd', 'email', 'phone', 'periode', 'lapor', 'point', 'tg_ttd'));
        }
        abort(404);
    }

    public function laporprint($id)
    {
        $u=Lapor::find($id);

        if (!$u) {
            abort(404);
        }

        $title= 'Laporan Gratifikasi #'.$id;
        $description= 'Laporan Gratifikasi #'.$id;

        $id=$u->id;
        $name= $u->user->name;
        $nip= $u->user->nip;
        $email= $u->user->email;
        $phone= $u->user->phone;
        $pangkat= $u->user->pangkat;
        $jabatan= $u->user->jabatan;
        $pd= $u->user->pd;
        $satker= $u->user->satker;

        $pemberi= $u->pemberi;
        $alamat= $u->alamat;
        $hubungan= $u->hubungan;
        $tanggal= $u->tanggal;
        $pd2=$u->pd;
        $satker2=$u->satker;
        $jenis= $u->jenis;
        $bentuk= $u->bentuk;
        $nilai= $u->nilai;
        $alasan= $u->alasan;


        $tg_laporan= $u->created_at;


        $print=true;
            
        return view('laporan', compact('print', 'title', 'description', 'id', 'name', 'nip', 'email', 'phone', 'pangkat', 'jabatan', 'pd', 'satker', 'pemberi', 'alamat', 'hubungan', 'tanggal', 'pd2', 'satker2', 'jenis', 'bentuk', 'nilai', 'alasan', 'tg_laporan'));
    }

    public function laporpdf($id)
    {
        $p=Lapor::find($id);
        if (!$p) {
            abort(404);
        }
        // dd($p);
        $pdf = PDF::loadView('laporan', [
                'title' => 'Laporan Gratifikasi #'.$id,
                'description' => 'Laporan Gratifikasi #'.$id,
                'id' => $id,
                'tg_laporan' => $p->created_at,
                'name' => $p->user->name,
                'nip' => $p->user->nip,
                'phone' => $p->user->phone,
                'email' => $p->user->email,
                'pangkat' => $p->user->pangkat,
                'jabatan' => $p->user->jabatan,
                'pd' => $p->user->pd,
                'satker' => $p->user->satker,

                'pemberi' => $p->pemberi,
                'hubungan' => $p->hubungan,
                'alamat' => $p->alamat,
                'tanggal' => $p->tanggal,
                'pd2' => $p->pd,
                'satker2' => $p->satker,
                'jenis' => $p->jenis,
                'bentuk' => $p->bentuk,
                'alasan' => $p->alasan,
                'nilai' => $p->nilai,
            ]);
            
        return $pdf->download('Laporan Gratifikasi - id.'.$id.' - '.$p->user->name.' - '.$p->user->nip.'.pdf');
        // abort(404);
    }

    public function ppdf($id, $user)
    {
        $p=Pernyataan::where('jadwal_id', $id)->where('user_id', $user)->first();
        
        if (!$p) {
            abort(404);
        }

        $u=User::find($user);



        $lapor=$p->lapor;

        $periode=convertPeriode($p->jadwal->tahun, $p->jadwal->semester);
        $tg_ttd=konversiTanggal(dateFromTimestamp($p->created_at));
        $range=awalAkhir($p->jadwal->tahun, $p->jadwal->semester);

        
        if ($p->user_id==$u->id) {
            $pdf = PDF::loadView('print', [
                'title' => 'Surat Pernyataan Gratifikasi',
                'description' => 'Surat Pernyataan Gratifikasi.',
                'name' => $u->name,
                'nip' => $u->nip,
                'pangkat' => $p->pangkat,
                'jabatan' => $p->jabatan,
                'pd' => $u->pd,
                'email' => $u->email,
                'phone' => $u->phone,
                'periode' => $periode,
                'lapor' => $lapor,
                'point'=>[$p->tanya1, $p->tanya2, $p->tanya3],
                'tg_ttd' => $tg_ttd,
            ]);
            
            return $pdf->download('Surat Pernyataan - '.$u->name.' - '.$u->nip.'.pdf');
        }
        abort(404);
    }

    public function pprint($id, $user)
    {
        $p=Pernyataan::where('jadwal_id', $id)->where('user_id', $user)->first();
        $u=User::find($user);
        // dd($p);
        // dd([$p->user_id,$u->id]);

        $periode=convertPeriode($p->jadwal->tahun, $p->jadwal->semester);
        $tg_ttd=konversiTanggal(dateFromTimestamp($p->created_at));
        $range=awalAkhir($p->jadwal->tahun, $p->jadwal->semester);
        $lapor=$u->lapor->whereBetween('tanggal', $range);

        if ($p->user_id==$u->id) {
            $title= 'Surat Pernyataan Gratifikasi';
            $description= 'Surat Pernyataan Gratifikasi';
            $name= $u->name;
            $nip= $u->nip;
            $pangkat= $p->pangkat;
            $jabatan= $p->jabatan;
            $pd= $u->pd;
            $email= $u->email;
            $phone= $u->phone;
            $periode= $periode;
            $lapor= $lapor;
            $point=array($p->tanya1, $p->tanya2, $p->tanya3);
            $tg_ttd= $tg_ttd;
            $print=true;
            
            return view('print', compact('print', 'title', 'description', 'name', 'nip', 'pangkat', 'jabatan', 'pd', 'email', 'phone', 'periode', 'lapor', 'point', 'tg_ttd'));
        }
        abort(404);
    }
}
