<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\PerangkatDaerah;
use App\Models\Pangkat;
use App\Models\JenisGratifikasi;
use App\Models\Jadwal;
use App\Models\Hapus;

if (!function_exists('cekJadwal')) {
    function cekJadwal($id)
    {
        $t = Jadwal::where('id', $id)->count();
        if ($t == '1') {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('getTotalPegawai')) { //2023-04-10
    function getTotalPegawai($pd)
    {
        $t = User::where('pd', $pd)->where('level', '0')->where('aktif', '1')->count();
        return $t;
    }
}

if (!function_exists('tglFromCreated')) { //2023-04-10
    function tglFromCreated($t)
    {
        $f = explode(' ', $t);
        $data = explode('-', $f[0]);
        switch ($data[1]) {
            case "01":
                $b = "Jan";
                break;
            case "02":
                $b = "Feb";
                break;
            case "03":
                $b = "Mar";
                break;
            case "04":
                $b = "Apr";
                break;
            case "05":
                $b = "Mei";
                break;
            case "06":
                $b = "Jun";
                break;
            case "07":
                $b = "Jul";
                break;
            case "08":
                $b = "Agt";
                break;
            case "09":
                $b = "Sep";
                break;
            case "10":
                $b = "Okt";
                break;
            case "11":
                $b = "Nov";
                break;
            case "12":
                $b = "Des";
                break;
            default:
                $b = "Not Defined";
        }
        return $data[2] . " " . $b . " " . $data[0];
    }
}
if (!function_exists('konversiTanggal')) {
    function konversiTanggal($tanggal)
    {
        // 2021-11-09
        $data = explode('-', $tanggal);
        switch ($data[1]) {
            case "01":
                $b = "Januari";
                break;
            case "02":
                $b = "Februari";
                break;
            case "03":
                $b = "Maret";
                break;
            case "04":
                $b = "April";
                break;
            case "05":
                $b = "Mei";
                break;
            case "06":
                $b = "Juni";
                break;
            case "07":
                $b = "Juli";
                break;
            case "08":
                $b = "Agustus";
                break;
            case "09":
                $b = "September";
                break;
            case "10":
                $b = "Oktober";
                break;
            case "11":
                $b = "November";
                break;
            case "12":
                $b = "Desember";
                break;
            default:
                $b = "Not Defined";
        }
        return $data[2] . " " . $b . " " . $data[0];
    }
}

if (!function_exists('konversiTanggalPendek')) {
    function konversiTanggalPendek($tanggal)
    {
        // 2021-11-09
        $data = explode('-', $tanggal);
        switch ($data[1]) {
            case "01":
                $b = "Jan";
                break;
            case "02":
                $b = "Feb";
                break;
            case "03":
                $b = "Mar";
                break;
            case "04":
                $b = "Apr";
                break;
            case "05":
                $b = "Mei";
                break;
            case "06":
                $b = "Jun";
                break;
            case "07":
                $b = "Jul";
                break;
            case "08":
                $b = "Agt";
                break;
            case "09":
                $b = "Sep";
                break;
            case "10":
                $b = "Okt";
                break;
            case "11":
                $b = "Nov";
                break;
            case "12":
                $b = "Des";
                break;
            default:
                $b = "Not Defined";
        }
        return $data[2] . " " . $b . " " . $data[0];
    }
}

if (!function_exists('jadwalAktif')) {
    function jadwalAktif($start, $end)
    {
        $t = new DateTime();
        $s = new DateTime($start);
        $e = new DateTime($end);
        if ($t->getTimestamp() > $s->getTimestamp() && $t->getTimestamp() < $e->getTimestamp()) {
            return 1;//aktif
        } elseif ($t->getTimestamp() < $s->getTimestamp() && $t->getTimestamp() < $e->getTimestamp()) {
            return 2;//belum mulai
        } else {
            return false;
        }
    }
}

if (!function_exists('masihBuka')) {
    function masihBuka($d)
    {
        $now = date("Y-m-d");
        $t = new DateTime($now);
        $e = new DateTime($d);
        if ($t->getTimestamp() <= $e->getTimestamp()) {
            return true;//masih buka
        } else {
            return false;
        }
    }
}

if (!function_exists('statusJadwal')) {
    function statusJadwal($d)
    {
        switch ($d) {
            case "0":
                $b = "Tidak mengisi";
                break;
            case "1":
                $b = "Mengisi";
                break;
            case "2":
                $b = "Belum mengisi";
                break;
            case "3":
                $b = "Belum dimulai";
                break;
        }
        return $b;
    }
}

if (!function_exists('jadwalStatus')) {
    function jadwalStatus($d)
    {
        if ($d == '1') {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('konversiNIP')) {
    function konversiNIP($d)
    {
        $r = substr($d, 0, 8) . ' ' . substr($d, 8, 6) . ' ' . substr($d, 14, 1) . ' ' . substr($d, 15);
        return $r;
    }
}

if (!function_exists('getPerangkat')) {
    function getPerangkat()
    {
        $d = PerangkatDaerah::get();
        return $d;
    }
}

if (!function_exists('checkPD')) {
    function checkPD($pd)
    {
        $d = PerangkatDaerah::where('nama', $pd)->count();
        if ($d == 1) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('shortLink')) {
    function shortLink($string, $a, $b, $c)
    {
        $arr = explode(".", $string);
        $name = $arr[0];
        $ext = $arr[1];
        $l = strlen($name);
        if ($l > $a) {
            $front = substr($name, 0, $b);
            $back = substr($name, -$c);
            $short = $front . "..." . $back . "." . $ext;
            // dd($name);
            return $short;
        } else {
            return $string;
        }
    }
}


if (!function_exists('umur')) {
    function umur($nip)
    {
        $dob = substr($nip, 0, 4) . "-" . substr($nip, 4, 2) . "-" . substr($nip, 6, 2);

        $today = new DateTime();
        $birthDate = new DateTime($dob);

        $diff = date_diff($birthDate, $today);

        $years = $diff->y;

        $umur =  $years . " tahun";
        return $umur;
    }
}
if (!function_exists('getJenis')) {
    function getJenis()
    {
        $d = JenisGratifikasi::get();
        return $d;
    }
}

if (!function_exists('getPangkat')) {
    function getPangkat()
    {
        $d = Pangkat::get();
        return $d;
    }
}


if (!function_exists('dateFromTimestamp')) {
    function dateFromTimestamp($data)
    {
        $a = explode(" ", $data);
        return $a[0];
    }
}

if (!function_exists('convertPeriode')) {
    function convertPeriode($t, $s)
    {
        // 1 Januari 2022 s.d. 30 Juni 2022
        switch ($s) {
            case "1":
                $tgl_1 = "1 Januari";
                $tgl_2 = "30 Juni";
                break;
            case "2":
                $tgl_1 = "1 Juli";
                $tgl_2 = "31 Desember";
                break;
        }
        $periode = $tgl_1 . ' ' . $t . ' s.d. ' . $tgl_2 . ' ' . $t;
        return $periode;
    }
}

if (!function_exists('awalAkhir')) {
    function awalAkhir($t, $s)
    {
        // date(2020-12-31);
        switch ($s) {
            case "1":
                $d[0] = date($t . "-01-01");
                $d[1] = date($t . "-06-30");
                break;
            case "2":
                $d[0] = date($t . "-07-01");
                $d[1] = date($t . "-12-31");
                break;
        }
        return $d;
    }
}

if (!function_exists('konversiPilihan')) {
    function konversiPilihan($a, $b, $c)
    {
        switch ($a) {
            case "1":
                $d[0] = "<i class=\"uil-times-square text-danger\">Tidak</i>";
                break;
            case "0":
                $d[0] = "<i class=\"uil-check-square text-success\">Ya</i> ";
                break;
        }
        switch ($b) {
            case "1":
                $d[1] = "<i class=\"uil-check-square text-success\">Ya</i>";
                break;
            case "0":
                $d[1] = "<i class=\"uil-times-square text-danger\">Tidak</i> ";
                break;
        }
        switch ($c) {
            case "1":
                $d[2] = "<i class=\"uil-check-square text-success\">Ya</i>";
                break;
            case "0":
                $d[2] = "<i class=\"uil-times-square text-danger\">Tidak</i> ";
                break;
        }
        echo $d[0] . " - " . $d[1] . " - " . $d[2];
    }
}

function truncate(string $text, int $length = 20): string
{
    if (strlen($text) <= $length) {
        return $text;
    }
    $text = substr($text, 0, $length);
    $text = substr($text, 0, strrpos($text, " "));
    $text .= "...";
    return $text;
}

if (!function_exists('getHapus')) {
    function getHapus()
    {
        $d = Hapus::where('status', 0)->count();
        return $d;
    }
}

// if (!function_exists('pdInArray')) {
//     function pdInArray()
//     {
//         $pd=PerangkatDaerah::all();
//         $data=[];
//         foreach ($pd as $d) {
//             array_push($data, $d->nama);
//         }
//         return $data;
//     }
// }



// if (!function_exists('cekPengirim')) {
//     function cekPengirim($nama)
//     {
//         $i=Pengirim::where('nama', $nama)->get()->first();
//         if ($i==null) {
//             $input['nama']=$nama;
//             Pengirim::create($input);
//         }
//     }
// }

// if (!function_exists('cekPenerimaDisposisi')) {
//     function cekPenerimaDisposisi($nama)
//     {
//         $i=PenerimaDisposisi::where('nama', $nama)->get()->first();
//         if ($i==null) {
//             $input['nama']=$nama;
//             PenerimaDisposisi::create($input);
//         }
//     }
// }

// if (!function_exists('cekBidang')) {
//     function cekBidang($nama)
//     {
//         $i=Bidang::where('nama', $nama)->get()->first();
//         if ($i==null) {
//             $input['nama']=$nama;
//             Bidang::create($input);
//         }
//     }
// }
