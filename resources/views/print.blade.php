<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>{{ $title }}</title>
    <meta content="{{ $description }}" name="description" />
    <style>
        @page {
            margin: 25px 35px;
        }

        body {
            margin: 25px 35px;
        }

        table {
            margin-top: 10px;
            margin-bottom: 20px;
        }

        h4 {
            font-size: 1.2rem;
            margin-bottom: 45px;
        }

        td,
        th {
            padding: 3px;
        }

        .tabel,
        .tabel>tbody>tr>th,
        .tabel>tbody>tr>td {
            border: solid 1px #000;
        }
    </style>
</head>

<body>
    <div>
        <h4 align="center"><u>SURAT PERNYATAAN GRATIFIKASI</u></h4>
    </div>
    <div> Yang bertanda tangan di bawah ini: </div>
    <table style="margin-left:30px;">
        <tbody>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $name }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td>{{ $nip }}</td>
            </tr>
            <tr>
                <td>Pangkat</td>
                <td>:</td>
                <td>{{ $pangkat }}</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>{{ $jabatan }}</td>
            </tr>
            <tr>
                <td>Asal Perangkat Daerah </td>
                <td>:</td>
                <td>{{ $pd }}</td>
            </tr>
            <tr>
                <td>Alamat Email</td>
                <td>:</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td>{{ $phone }}</td>
            </tr>
        </tbody>
    </table>

    <div>Menyatakan bahwa pada periode {{ $periode }}, saya:</div>
    {{-- {{ dd($point) }} --}}
    <table style="margin-left:30px">
        <tbody>
            <tr>
                <td><strong>
                        <input type="checkbox" {{ $point[0] == '1' ? 'checked="checked"' : '' }} />
                    </strong></td>
                <td><strong>Tidak pernah menerima gratifikasi</strong></td>
            </tr>
            <tr>
                <td><strong>
                        <input type="checkbox" {{ $point[1] == '1' ? 'checked="checked"' : '' }} />
                    </strong></td>
                <td><strong>Menerima gratifikasi dan telah melaporkannya kepada UPG/KPK</strong></td>
            </tr>
            <tr>
                <td><strong>
                        <input type="checkbox" {{ $point[2] == '1' ? 'checked="checked"' : '' }} />
                    </strong></td>
                <td><strong>Menerima gratifikasi namun belum melaporkannya kepada UPG/KPK</strong></td>
            </tr>
        </tbody>
    </table>
    @if ($lapor->count() != 0)
        <div>Rincian penerimaan gratifikasi yang belum dilaporkan ke UPG/KPK</div>
        <table class="tabel" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th>Jenis</th>
                    <th>Bentuk</th>
                    <th>Nilai</th>
                    <th width="15%">Waktu</th>
                    <th>Nama Pemberi</th>
                    <th>Hubungan</th>
                    <th>Alasan</th>
                </tr>
                @foreach ($lapor as $l)
                    <tr>
                        <td align="center">{{ $l->jenis }}</td>
                        <td align="center">{{ $l->bentuk }}</td>
                        <td align="center">{{ number_format($l->nilai, 0, ',', '.') }} </td>
                        <td align="center">{{ konversiTanggalPendek($l->tanggal) }}</td>
                        <td align="center">{{ $l->pemberi }}</td>
                        <td align="center">{{ $l->hubungan }}</td>
                        <td align="center">{{ $l->alasan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div>
        Demikian Surat Pernyataan ini saya buat dengan sebenar-benarnya, apabila dikemudian hari ada penerimaan
        gratifikasi yang sengaja tidak saya laporkan atau dilaporkan tidak benar maka saya bersedia
        mempertanggungjawabkan secara hukum sesuai dengan peraturan perundang-undangan yang berlaku.</div>

    <table width="100%">
        <tbody>
            <tr>
                <td> </td>
                <td width="40%">
                    <div align="center">
                        <p>&nbsp;</p>
                        <p>Ponorogo, {{ $tg_ttd }}<br />
                            Yang Membuat Pernyataan<br />
                            <br />
                            <span style="color:#BBB">TTD</span><br />
                            <br />
                            <u><strong>{{ strtoupper($name) }}</strong>
                            </u>
                        </p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
