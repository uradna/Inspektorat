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
        <h4 align="center"><u>LAPORAN GRATIFIKASI</u></h4>
    </div>



    <table style="margin-left:10px;width:100%;">
        <tbody>
            <tr>
                <td style="vertical-align: top;width: 32%;">Laporan Gratifikasi #id</td>
                <td style="vertical-align: top;width:1%;">:</td>
                <td style="vertical-align: top;">{{ $id }}</td>
            </tr>
            <tr>
                <td style="vertical-align: top;">Tanggal Lapor</td>
                <td style="vertical-align: top;">:</td>
                <td style="vertical-align: top;">{{ konversiTanggal(dateFromTimestamp($tg_laporan)) }}</td>
            </tr>
        </tbody>
        <tr>
            <td colspan="3" style="padding-bottom: 5px;padding-top:22px;">
                <b style="font-size: 17px;">DATA PELAPOR</b>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Nama</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $name }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">NIP</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ konversiNIP($nip) }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Nomor HP</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $phone }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Alamat Email</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $email }}</td>
        </tr>

        <tr>
            <td style="vertical-align: top;">Jabatan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $jabatan }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Pangkat/Golongan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $pangkat }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Perangkat Daerah </td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $pd }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Satuan Kerja/Bidang</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $satker }}</td>
        </tr>

        <tr>
            <td colspan="3" style="padding-bottom: 5px;padding-top:22px;">
                <b style="font-size: 17px;">DATA GRATIFIKASI</b>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Tanggal Penerimaan</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ konversiTanggal($tanggal) }}</td>
        </tr>

        <tr>
            <td style="vertical-align: top;">PD Saat Menerima</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $pd2 }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Satker Saat Menerima</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $satker2 }}</td>
        </tr>

        <tr>
            <td style="vertical-align: top;">Nama Pemberi</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $pemberi }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;" style="vertical-align: top;">Alamat Pemberi</td>
            <td style="vertical-align: top;" style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $alamat }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Hubungan Penerima-Pemberi</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $hubungan }}</td>
        </tr>

        <tr>
            <td style="vertical-align: top;" style="vertical-align: top;">Jenis Gratifikasi</td>
            <td style="vertical-align: top;" style="vertical-align: top;">:</td>
            <td style="vertical-align: top;" style="vertical-align: top;">{{ $jenis }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Bentuk Gratifikasi</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $bentuk }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Nilai Gratifikasi</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">Rp. {{ number_format($nilai, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Alasan Gratifikasi</td>
            <td style="vertical-align: top;">:</td>
            <td style="vertical-align: top;">{{ $alasan }}</td>
        </tr>
        </tbody>
    </table>






</body>

</html>
