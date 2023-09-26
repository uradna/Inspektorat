<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Db::table('perangkat_daerahs')->insert(['nama' => 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Badan Kesatuan Bangsa Dan Politik']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Badan Penanggulangan Bencana Daerah']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Badan Pendapatan, Pengelolaan Keuangan Dan Asset Daerah']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Badan Perencanaan Pembangunan Daerah, Penelitian Dan Pengembangan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Kebudayaan, Pariwisata, Pemuda Dan Olahraga']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Kependudukan Dan Pencatatan Sipil']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Kesehatan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Komunikasi, Informatika Dan Statistik']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Lingkungan Hidup']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Pekerjaan Umum, Perumahan Dan Kawasan Permukiman']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Pemberdayaan Masyarakat Dan Desa']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Pendidikan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Pengendalian Penduduk Dan Kb']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Perdagangan, Koperasi Dan Usaha Mikro']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Perhubungan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Perpustakaan Dan Kearsipan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Pertanian, Ketahanan Pangan Dan Perikanan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Sosial, Pemberdayaan Perempuan Dan Perlindungan Anak']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Dinas Tenaga Kerja']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Inspektorat']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Rsud Dr. Harjono S']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Satuan Polisi Pamong Praja']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Sekretariat Daerah']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Sekretariat Dprd']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Babadan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Badegan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Balong']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Bungkal']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Jambon']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Jenangan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Jetis']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Kauman']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Mlarak']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Ngebel']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Ngrayun']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Ponorogo']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Pudak']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Pulung']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Sambit']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Sampung']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Sawoo']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Siman']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Slahung']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Sooko']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Kecamatan Sukorejo']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Staf Ahli']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Organisasi']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Perencanaan Dan Keuangan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Protokol Dan Komunikasi Pimpinan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Umum']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Hukum']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Kesejahteraan Rakyat']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Tata Pemerintahan Dan Kerjasama']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Administrasi Pembangunan']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Administrasi Perekonomian Dan Sumber Daya Alam']);
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bagian Pengadaan Barang Dan Jasa']);

        Db::table('jenis_gratifikasis')->insert(['nama' => 'Uang']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Barang']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Rabat']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Komisi']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Pinjaman Tanpa Bunga']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Tiket Perjalanan']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Fasilitas Penginapan']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Perjalanan Wisata']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Pengobatan Cuma-cuma']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Fasilitas']);
        Db::table('jenis_gratifikasis')->insert(['nama' => 'Lain-lain']);
        
        DB::table('users')->insert([
            'name' => 'Andaru Krido Utomo',
            'email' => 'andaru@ponorogo.go.id',
            'username' => '198605242020121004',
            'nip' => '198605242020121004',
            'phone' => '081225181060',
            'pangkat' => 'II/C',
            'jabatan' => 'Pranata Komputer Terampil',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Bidang Aplikasi dan Informatika',
            'password' => Hash::make('password'),
            'level' => '0'
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => null,
            'nip' => 'Admin Dinas Komunikasi Informatika dan Statistik',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'username' => 'admin_kominfo',
            'password' => Hash::make('password'),
            'level' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => null,
            'nip' => '222222222222222222',
            'username' => 'superadmin',
            'password' => Hash::make('password'),
            'level' => '2'
        ]);

        DB::table('jadwals')->insert([
            'tahun' => '2021',
            'semester' => '1',
            'akhir' => '2021-05-18',
            'created_at' => '2021-02-20 01:28:05',
            'status' => '0'
        ]);

        DB::table('jadwals')->insert([
            'tahun' => '2021',
            'semester' => '2',
            'akhir' => '2021-12-25',
            'created_at' => '2021-11-20 01:28:05',
            'status' => '0'
        ]);

        DB::table('jadwals')->insert([
            'tahun' => '2022',
            'semester' => '1',
            'akhir' => '2022-04-25',
            'created_at' => '2022-02-20 01:28:05',
            'status' => '0'
        ]);

        DB::table('jadwals')->insert([
            'tahun' => '2022',
            'semester' => '2',
            'akhir' => '2022-11-05',
            'created_at' => '2022-11-20 01:28:05',
            'status' => '0'
        ]);

        DB::table('jadwals')->insert([
            'tahun' => '2023',
            'semester' => '1',
            'akhir' => '2023-03-25',
            'created_at' => '2023-02-20 01:28:05',
            'status' => '1'
        ]);

        DB::table('lapors')->insert([
            'user_id' => '1',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Bidang Aplikasi Informatika',
            'jenis' => 'Barang',
            'bentuk' => 'Headset',
            'nilai' => '500000',
            'tanggal' => '2023-1-25',
            'pemberi' => 'Pringgo',
            'hubungan' => 'Teman kerja',
            'alamat' => 'Slahung',
            'alasan' => 'Membantu ujian TOELF',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('lapors')->insert([
            'user_id' => '5391',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Bidang PIKP',
            'jenis' => 'Uang',
            'bentuk' => 'Uang',
            'nilai' => '50000',
            'tanggal' => '2023-1-25',
            'pemberi' => 'Agung',
            'hubungan' => 'Masyarakat',
            'alamat' => 'Slahung',
            'alasan' => 'Menerima laporan',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('lapors')->insert([
            'user_id' => '575',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Sekretariat Kominfo',
            'jenis' => 'Barang',
            'bentuk' => 'Makanan',
            'nilai' => '10000',
            'tanggal' => '2023-1-25',
            'pemberi' => 'Yuni',
            'hubungan' => 'Tetangga',
            'alamat' => 'Ponorogo',
            'alasan' => 'Ndak tahu',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('lapors')->insert([
            'user_id' => '2486',
            'pd' => 'Dinas Perhubungan',
            'satker' => 'Sekretariat Dinas',
            'jenis' => 'Barang',
            'bentuk' => 'Makanan',
            'nilai' => '15000',
            'tanggal' => '2023-1-25',
            'pemberi' => 'Pak Roto',
            'hubungan' => 'Teman kerja',
            'alamat' => 'Madiun',
            'alasan' => 'Membuatkan aplikasi untuk diklat PIM',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('bantuans')->insert([
            'for' => 'user',
            'judul' => 'Apa yang dimaksud gratifikasi?',
            'isi' => 'Gratifikasi adalah semua pemberian yang diterima oleh Pegawai Negeri atau Penyelenggara Negara (Pn/PN). Oleh karena itu gratifikasi memiliki arti yang netral, sehingga tidak semua gratifikasi merupakan hal yang dilarang atau sesuatu yang salah.',
            'order' => '1'
        ]);

        DB::table('bantuans')->insert([
            'for' => 'user',
            'judul' => 'Apa kriteria gratifikasi yang dilarang?',
            'isi' => '1. Gratifikasi yang diterima berhubungan dengan jabatan.',
            'order' => '2'
        ]);

        DB::table('bantuans')->insert([
            'for' => 'user',
            'judul' => 'Apa dasar hukum yang mengatur gratifikasi?',
            'isi' => 'Gratifikasi merupakan salah satu jenis tindak pidana korupsi baru yang diatur dalam Pasal 12B dan 12C UU Tipikor sejak tahun 2001.',
            'order' => '3'
        ]);

        DB::table('bantuans')->insert([
            'for' => 'admin',
            'judul' => 'Bagaimana cara mengganti password?',
            'isi' => 'Gratifikasi merupakan salah satu jenis tindak pidana korupsi baru yang diatur dalam Pasal 12B dan 12C UU Tipikor sejak tahun 2001.',
            'order' => '1'
        ]);

        DB::table('bantuans')->insert([
            'for' => 'admin',
            'judul' => 'Bagaimana cara memindah asal Perangkat Daerah pegawai?',
            'isi' => 'Gratifikasi merupakan salah satu jenis tindak pidana korupsi baru yang diatur dalam Pasal 12B dan 12C UU Tipikor sejak tahun 2001.',
            'order' => '2'
        ]);
        DB::table('bantuans')->insert([
            'for' => 'superadmin',
            'judul' => 'Bagaimana cara membuat user admin baru?',
            'isi' => 'Gratifikasi merupakan salah satu jenis tindak pidana korupsi baru yang diatur dalam Pasal 12B dan 12C UU Tipikor sejak tahun 2001.',
            'order' => '1'
        ]);

        DB::table('pangkats')->insert(['nama' => 'Tanpa Pangkat']);
        DB::table('pangkats')->insert(['nama' => 'I/A']);
        DB::table('pangkats')->insert(['nama' => 'I/B']);
        DB::table('pangkats')->insert(['nama' => 'I/C']);
        DB::table('pangkats')->insert(['nama' => 'I/D']);
        DB::table('pangkats')->insert(['nama' => 'II/A']);
        DB::table('pangkats')->insert(['nama' => 'II/B']);
        DB::table('pangkats')->insert(['nama' => 'II/C']);
        DB::table('pangkats')->insert(['nama' => 'II/D']);
        DB::table('pangkats')->insert(['nama' => 'III/A']);
        DB::table('pangkats')->insert(['nama' => 'III/B']);
        DB::table('pangkats')->insert(['nama' => 'III/C']);
        DB::table('pangkats')->insert(['nama' => 'III/D']);
        DB::table('pangkats')->insert(['nama' => 'IV/A']);
        DB::table('pangkats')->insert(['nama' => 'IV/B']);
        DB::table('pangkats')->insert(['nama' => 'IV/C']);
        DB::table('pangkats')->insert(['nama' => 'IV/D']);
        DB::table('pangkats')->insert(['nama' => 'IV/E']);
        
        require __DIR__.'/pegawai.php';
        
        DB::table('hapuses')->insert([
            'user_id' => '5210',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'alasan' => 'pensiun',
            'file' => '20230410062829-196508121992021004-Pri.pdf',
            'status' => '0',
            'created_at' => '2023-02-23 09:45:05',
            'feedback' => null
        ]);

        DB::table('hapuses')->insert([
            'user_id' => '703',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'alasan' => 'pensiun',
            'file' => '20230410055240-196509271993022001-Wiwik.pdf',
            'status' => '0',
            'created_at' => '2023-02-23 09:45:05',
            'feedback' => null
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '1',
            'jadwal_id' => '5',
            'email' => 'andaru@ponorogo.go.id',
            'phone' => '081225181060',
            'pangkat' => 'II/C',
            'jabatan' => 'Pranata Komputer Terampil',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Bidang Aplikasi dan Informatika',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '1',
            'jadwal_id' => '4',
            'email' => 'andaru@ponorogo.go.id',
            'phone' => '081225181060',
            'pangkat' => 'II/C',
            'jabatan' => 'Pranata Komputer Terampil',
            'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
            'satker' => 'Bidang Aplikasi dan Informatika',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '711',
            'jadwal_id' => '5',
            'email' => 'jonis@ponorogo.go.id', 'phone' => '081368668767', 'pangkat' => 'III/C', 'jabatan' => 'Fungsional', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Infrastruktur Dan Teknologi',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '711',
            'jadwal_id' => '4',
            'email' => 'jonis@ponorogo.go.id', 'phone' => '081368668767', 'pangkat' => 'III/C', 'jabatan' => 'Fungsional', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Infrastruktur Dan Teknologi',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '714',
            'jadwal_id' => '4',
            'email' => 'handikominfo@gmail.com', 'phone' => '081225181060', 'pangkat' => 'III/C', 'jabatan' => 'Pranata Komputer Ahli Muda', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Aplikasi Dan Pengembangan Sdm Tik',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '714',
            'jadwal_id' => '3',
            'email' => 'handikominfo@gmail.com', 'phone' => '081225181060', 'pangkat' => 'III/C', 'jabatan' => 'Pranata Komputer Ahli Muda', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Aplikasi Dan Pengembangan Sdm Tik',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '1368',
            'jadwal_id' => '5',
            'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);
        
        DB::table('pernyataans')->insert([
            'user_id' => '1368',
            'jadwal_id' => '4',
            'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        DB::table('pernyataans')->insert([
            'user_id' => '1368',
            'jadwal_id' => '3',
            'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
            'tanya1' => '1',
            'tanya2' => '0',
            'tanya3' => '0',
            'created_at' => '2023-02-23 09:45:05'
        ]);

        $i=1;
        while ($i<=4) {
            DB::table('rekapitulasis')->insert([
                'jadwal_id' => $i,
                'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
                'jumlah' => rand(15, 39),
                'total' => rand(45, 55),
            ]);

            DB::table('rekapitulasis')->insert([
                'jadwal_id' => $i,
                'pd' => 'Dinas Perhubungan',
                'jumlah' => rand(5, 20),
                'total' => rand(55, 65),
            ]);

            DB::table('rekapitulasis')->insert([
                'jadwal_id' => $i,
                'pd' => 'Dinas Lingkungan Hidup',
                'jumlah' => rand(10, 25),
                'total' => rand(35, 45),
            ]);
            $i++;
        }

        DB::table('banners')->insert([
            'img' => 'big-image.png',
            'time' => '10',
            'created_at' => '2023-02-23 09:45:05'
        ]);
        DB::table('banners')->insert([
            'img' => 'kpk1.png',
            'created_at' => '2023-02-23 09:45:05'
        ]);
        DB::table('banners')->insert([
            'img' => 'kpk2.png',
            'created_at' => '2023-02-23 09:45:05'
        ]);
        DB::table('banners')->insert([
            'img' => 'kpk3.png',
            'created_at' => '2023-02-23 09:45:05'
        ]);
    }
}
