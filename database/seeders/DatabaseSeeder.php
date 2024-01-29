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
        Db::table('perangkat_daerahs')->insert(['nama' => 'Bupati dan Wakil Bupati']);
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
            'name' => 'Sugiri Sancoko',
            'email' => 'sugirisancoko@ponorogo.go.id',
            'username' => 'bupati_ponorogo',
            'pangkat' => '-',
            'jabatan' => 'Bupati',
            'pd' => 'Bupati dan Wakil Bupati',
            'satker' => '-',
            'password' => Hash::make('password'),
            'level' => '0'
        ]);
        DB::table('users')->insert([
            'name' => 'Lisdyarita',
            'email' => 'lisdyarita@ponorogo.go.id',
            'username' => 'wakilbupati_ponorogo',
            'pangkat' => '-',
            'jabatan' => 'Wakil Bupati',
            'pd' => 'Bupati dan Wakil Bupati',
            'satker' => '-',
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

        // DB::table('users')->insert([
        //     'name' => 'Superadmin',
        //     'email' => null,
        //     'nip' => '222222222222222222',
        //     'username' => 'superadmin',
        //     'password' => Hash::make('password'),
        //     'level' => '2'
        // ]);

        // DB::table('jadwals')->insert([
        //     'tahun' => '2021',
        //     'semester' => '1',
        //     'akhir' => '2021-05-18',
        //     'created_at' => '2021-02-20 01:28:05',
        //     'status' => '0'
        // ]);

        // DB::table('jadwals')->insert([
        //     'tahun' => '2021',
        //     'semester' => '2',
        //     'akhir' => '2021-12-25',
        //     'created_at' => '2021-11-20 01:28:05',
        //     'status' => '0'
        // ]);

        // DB::table('jadwals')->insert([
        //     'tahun' => '2022',
        //     'semester' => '1',
        //     'akhir' => '2022-04-25',
        //     'created_at' => '2022-02-20 01:28:05',
        //     'status' => '0'
        // ]);

        // DB::table('jadwals')->insert([
        //     'tahun' => '2022',
        //     'semester' => '2',
        //     'akhir' => '2022-11-05',
        //     'created_at' => '2022-11-20 01:28:05',
        //     'status' => '0'
        // ]);

        // DB::table('jadwals')->insert([
        //     'tahun' => '2023',
        //     'semester' => '1',
        //     'akhir' => '2023-03-25',
        //     'created_at' => '2023-02-20 01:28:05',
        //     'status' => '1'
        // ]);

        // DB::table('lapors')->insert([
        //     'user_id' => '1',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'satker' => 'Bidang Aplikasi Informatika',
        //     'jenis' => 'Barang',
        //     'bentuk' => 'Headset',
        //     'nilai' => '500000',
        //     'tanggal' => '2023-1-25',
        //     'pemberi' => 'Pringgo',
        //     'hubungan' => 'Teman kerja',
        //     'alamat' => 'Slahung',
        //     'alasan' => 'Membantu ujian TOELF',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('lapors')->insert([
        //     'user_id' => '5391',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'satker' => 'Bidang PIKP',
        //     'jenis' => 'Uang',
        //     'bentuk' => 'Uang',
        //     'nilai' => '50000',
        //     'tanggal' => '2023-1-25',
        //     'pemberi' => 'Agung',
        //     'hubungan' => 'Masyarakat',
        //     'alamat' => 'Slahung',
        //     'alasan' => 'Menerima laporan',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('lapors')->insert([
        //     'user_id' => '575',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'satker' => 'Sekretariat Kominfo',
        //     'jenis' => 'Barang',
        //     'bentuk' => 'Makanan',
        //     'nilai' => '10000',
        //     'tanggal' => '2023-1-25',
        //     'pemberi' => 'Yuni',
        //     'hubungan' => 'Tetangga',
        //     'alamat' => 'Ponorogo',
        //     'alasan' => 'Ndak tahu',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('lapors')->insert([
        //     'user_id' => '2486',
        //     'pd' => 'Dinas Perhubungan',
        //     'satker' => 'Sekretariat Dinas',
        //     'jenis' => 'Barang',
        //     'bentuk' => 'Makanan',
        //     'nilai' => '15000',
        //     'tanggal' => '2023-1-25',
        //     'pemberi' => 'Pak Roto',
        //     'hubungan' => 'Teman kerja',
        //     'alamat' => 'Madiun',
        //     'alasan' => 'Membuatkan aplikasi untuk diklat PIM',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

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

        require __DIR__ . '/pegawai.php';

        // DB::table('hapuses')->insert([
        //     'user_id' => '5210',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'alasan' => 'pensiun',
        //     'file' => '20230410062829-196508121992021004-Pri.pdf',
        //     'status' => '0',
        //     'created_at' => '2023-02-23 09:45:05',
        //     'feedback' => null
        // ]);

        // DB::table('hapuses')->insert([
        //     'user_id' => '703',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'alasan' => 'pensiun',
        //     'file' => '20230410055240-196509271993022001-Wiwik.pdf',
        //     'status' => '0',
        //     'created_at' => '2023-02-23 09:45:05',
        //     'feedback' => null
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '1',
        //     'jadwal_id' => '5',
        //     'email' => 'andaru@ponorogo.go.id',
        //     'phone' => '081225181060',
        //     'pangkat' => 'II/C',
        //     'jabatan' => 'Pranata Komputer Terampil',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'satker' => 'Bidang Aplikasi dan Informatika',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '1',
        //     'jadwal_id' => '4',
        //     'email' => 'andaru@ponorogo.go.id',
        //     'phone' => '081225181060',
        //     'pangkat' => 'II/C',
        //     'jabatan' => 'Pranata Komputer Terampil',
        //     'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //     'satker' => 'Bidang Aplikasi dan Informatika',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '711',
        //     'jadwal_id' => '5',
        //     'email' => 'jonis@ponorogo.go.id', 'phone' => '081368668767', 'pangkat' => 'III/C', 'jabatan' => 'Fungsional', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Infrastruktur Dan Teknologi',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '711',
        //     'jadwal_id' => '4',
        //     'email' => 'jonis@ponorogo.go.id', 'phone' => '081368668767', 'pangkat' => 'III/C', 'jabatan' => 'Fungsional', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Infrastruktur Dan Teknologi',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '714',
        //     'jadwal_id' => '4',
        //     'email' => 'handikominfo@gmail.com', 'phone' => '081225181060', 'pangkat' => 'III/C', 'jabatan' => 'Pranata Komputer Ahli Muda', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Aplikasi Dan Pengembangan Sdm Tik',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '714',
        //     'jadwal_id' => '3',
        //     'email' => 'handikominfo@gmail.com', 'phone' => '081225181060', 'pangkat' => 'III/C', 'jabatan' => 'Pranata Komputer Ahli Muda', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Bidang Aplikasi Dan Informatika - Seksi Aplikasi Dan Pengembangan Sdm Tik',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '1368',
        //     'jadwal_id' => '5',
        //     'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '1368',
        //     'jadwal_id' => '4',
        //     'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // DB::table('pernyataans')->insert([
        //     'user_id' => '1368',
        //     'jadwal_id' => '3',
        //     'email' => 'Bambangsuhendro42@gmail.com', 'phone' => '081259993357', 'pangkat' => 'IV/B', 'jabatan' => 'Kepela Dinas', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => 'Dinas Komunikasi Informatika Dan Statistik',
        //     'tanya1' => '1',
        //     'tanya2' => '0',
        //     'tanya3' => '0',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);

        // $i = 1;
        // while ($i <= 4) {
        //     DB::table('rekapitulasis')->insert([
        //         'jadwal_id' => $i,
        //         'pd' => 'Dinas Komunikasi, Informatika Dan Statistik',
        //         'jumlah' => rand(15, 39),
        //         'total' => rand(45, 55),
        //     ]);

        //     DB::table('rekapitulasis')->insert([
        //         'jadwal_id' => $i,
        //         'pd' => 'Dinas Perhubungan',
        //         'jumlah' => rand(5, 20),
        //         'total' => rand(55, 65),
        //     ]);

        //     DB::table('rekapitulasis')->insert([
        //         'jadwal_id' => $i,
        //         'pd' => 'Dinas Lingkungan Hidup',
        //         'jumlah' => rand(10, 25),
        //         'total' => rand(35, 45),
        //     ]);
        //     $i++;
        // }

        // DB::table('banners')->insert([
        //     'img' => 'big-image.png',
        //     'time' => '10',
        //     'created_at' => '2023-02-23 09:45:05'
        // ]);
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

        DB::table('users')->insert([ 'username' => 'kec_sawoo', 'password' => Hash::make('kec_sawoo#876'), 'name' => 'Admin Kec Sawoo', 'nip' => 'kec_sawoo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sawoo', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_sukorejo', 'password' => Hash::make('kec_sukorejo#416'), 'name' => 'Admin Kec Sukorejo', 'nip' => 'kec_sukorejo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sukorejo', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_sooko', 'password' => Hash::make('kec_sooko#236'), 'name' => 'Admin Kec Sooko', 'nip' => 'kec_sooko', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sooko', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_slahung', 'password' => Hash::make('kec_slahung#545'), 'name' => 'Admin Kec Slahung', 'nip' => 'kec_slahung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Slahung', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_siman', 'password' => Hash::make('kec_siman#618'), 'name' => 'Admin Kec Siman', 'nip' => 'kec_siman', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Siman', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_pulung', 'password' => Hash::make('kec_pulung#425'), 'name' => 'Admin Kec Pulung', 'nip' => 'kec_pulung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Pulung', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_sampung', 'password' => Hash::make('kec_sampung#206'), 'name' => 'Admin Kec Sampung', 'nip' => 'kec_sampung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sampung', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_sambit', 'password' => Hash::make('kec_sambit#923'), 'name' => 'Admin Kec Sambit', 'nip' => 'kec_sambit', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sambit', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_pudak', 'password' => Hash::make('kec_pudak#123'), 'name' => 'Admin Kec Pudak', 'nip' => 'kec_pudak', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Pudak', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_ponorogo', 'password' => Hash::make('kec_ponorogo#640'), 'name' => 'Admin Kec Ponorogo', 'nip' => 'kec_ponorogo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ponorogo', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_ngrayun', 'password' => Hash::make('kec_ngrayun#651'), 'name' => 'Admin Kec Ngrayun', 'nip' => 'kec_ngrayun', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ngrayun', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'rsud_png', 'password' => Hash::make('rsud_png#818'), 'name' => 'Admin Rsud', 'nip' => 'rsud_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Rsud Dr. Harjono S', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_ngebel', 'password' => Hash::make('kec_ngebel#932'), 'name' => 'Admin Kec Ngebel', 'nip' => 'kec_ngebel', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ngebel', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_admpersda', 'password' => Hash::make('bag_admpersda#557'), 'name' => 'Admin Bagian Admpersda', 'nip' => 'bag_admpersda', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Administrasi Perekonomian Dan Sumber Daya Alam', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'satpolpp_png', 'password' => Hash::make('satpolpp_png#876'), 'name' => 'Admin Satpolpp', 'nip' => 'satpolpp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Satuan Polisi Pamong Praja', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'setda_png', 'password' => Hash::make('setda_png#958'), 'name' => 'Admin Setda', 'nip' => 'setda_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Sekretariat Daerah', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'setwan_png', 'password' => Hash::make('setwan_png#165'), 'name' => 'Admin Setwan', 'nip' => 'setwan_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Sekretariat Dprd', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_tapem', 'password' => Hash::make('bag_tapem#530'), 'name' => 'Admin Bagian Tapem', 'nip' => 'bag_tapem', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Tata Pemerintahan Dan Kerjasama', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_kesra', 'password' => Hash::make('bag_kesra#146'), 'name' => 'Admin Bagian Kesra', 'nip' => 'bag_kesra', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Kesejahteraan Rakyat', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_hukum', 'password' => Hash::make('bag_hukum#427'), 'name' => 'Admin Bagian Hukum', 'nip' => 'bag_hukum', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Hukum', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_adbang', 'password' => Hash::make('bag_adbang#903'), 'name' => 'Admin Bagian Adbang', 'nip' => 'bag_adbang', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Administrasi Pembangunan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_pbj', 'password' => Hash::make('bag_pbj#890'), 'name' => 'Admin Bagian Pbj', 'nip' => 'bag_pbj', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Pengadaan Barang Dan Jasa', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_umum', 'password' => Hash::make('bag_umum#949'), 'name' => 'Admin Bagian Umum', 'nip' => 'bag_umum', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Umum', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_organisasi', 'password' => Hash::make('bag_organisasi#147'), 'name' => 'Admin Bagian Organisasi', 'nip' => 'bag_organisasi', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Organisasi', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_protokol', 'password' => Hash::make('bag_protokol#662'), 'name' => 'Admin Bagian Protokol', 'nip' => 'bag_protokol', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Protokol Dan Komunikasi Pimpinan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bag_perkeu', 'password' => Hash::make('bag_perkeu#923'), 'name' => 'Admin Bagian Perkeu', 'nip' => 'bag_perkeu', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Perencanaan Dan Keuangan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'staf_ahli', 'password' => Hash::make('staf_ahli#449'), 'name' => 'Admin Staf Ahli', 'nip' => 'staf_ahli', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Staf Ahli', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_kauman', 'password' => Hash::make('kec_kauman#359'), 'name' => 'Admin Kec Kauman', 'nip' => 'kec_kauman', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Kauman', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_mlarak', 'password' => Hash::make('kec_mlarak#837'), 'name' => 'Admin Kec Mlarak', 'nip' => 'kec_mlarak', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Mlarak', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dindik_png', 'password' => Hash::make('dindik_png#536'), 'name' => 'Admin Dindik', 'nip' => 'dindik_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pendidikan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_jetis', 'password' => Hash::make('kec_jetis#351'), 'name' => 'Admin Kec Jetis', 'nip' => 'kec_jetis', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jetis', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dpmd_png', 'password' => Hash::make('dpmd_png#794'), 'name' => 'Admin Pemdes', 'nip' => 'dpmd_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pemberdayaan Masyarakat Dan Desa', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'admin_non_pns', 'password' => Hash::make('admin_non_pns#962'), 'name' => 'Admin Pejabat Non-pns', 'nip' => 'admin_non_pns', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Pejabat Non-pns', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bkpsdm_png', 'password' => Hash::make('bkpsdm_png#968'), 'name' => 'Admin Bkpsdm', 'nip' => 'bkpsdm_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bakesbang_png', 'password' => Hash::make('bakesbang_png#410'), 'name' => 'Admin Bakesbang', 'nip' => 'bakesbang_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Kesatuan Bangsa Dan Politik', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bpbd_png', 'password' => Hash::make('bpbd_png#750'), 'name' => 'Admin Bpbd', 'nip' => 'bpbd_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Penanggulangan Bencana Daerah', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bppkad_png', 'password' => Hash::make('bppkad_png#785'), 'name' => 'Admin Bppkad', 'nip' => 'bppkad_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Pendapatan, Pengelolaan Keuangan Dan Asset Daerah', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'bappeda_png', 'password' => Hash::make('bappeda_png#781'), 'name' => 'Admin Bappeda', 'nip' => 'bappeda_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Perencanaan Pembangunan Daerah, Penelitian Dan Pengembangan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'disbudparpora_png', 'password' => Hash::make('disbudparpora_png#152'), 'name' => 'Admin Disbudparpora', 'nip' => 'disbudparpora_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kebudayaan, Pariwisata, Pemuda Dan Olahraga', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'disdukcapil_png', 'password' => Hash::make('disdukcapil_png#802'), 'name' => 'Admin Dukcapil', 'nip' => 'disdukcapil_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kependudukan Dan Pencatatan Sipil', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dinkes_png', 'password' => Hash::make('dinkes_png#702'), 'name' => 'Admin Dinkes', 'nip' => 'dinkes_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kesehatan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'diskominfo_png', 'password' => Hash::make('diskominfo_png#585'), 'name' => 'Admin Kominfo', 'nip' => 'diskominfo_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dlh_png', 'password' => Hash::make('dlh_png#614'), 'name' => 'Admin Lh', 'nip' => 'dlh_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Lingkungan Hidup', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dpupkp_png', 'password' => Hash::make('dpupkp_png#100'), 'name' => 'Admin Dpupkp', 'nip' => 'dpupkp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pekerjaan Umum, Perumahan Dan Kawasan Permukiman', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dpmptsp_png', 'password' => Hash::make('dpmptsp_png#954'), 'name' => 'Admin Dpmptsp', 'nip' => 'dpmptsp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_jenangan', 'password' => Hash::make('kec_jenangan#928'), 'name' => 'Admin Kec Jenangan', 'nip' => 'kec_jenangan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jenangan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dppkb_png', 'password' => Hash::make('dppkb_png#311'), 'name' => 'Admin Dppkb', 'nip' => 'dppkb_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pengendalian Penduduk Dan Kb', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'perdagkum_png', 'password' => Hash::make('perdagkum_png#492'), 'name' => 'Admin Perdagkum', 'nip' => 'perdagkum_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perdagangan, Koperasi Dan Usaha Mikro', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dishub_png', 'password' => Hash::make('dishub_png#732'), 'name' => 'Admin Dishub', 'nip' => 'dishub_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perhubungan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'perpusip_png', 'password' => Hash::make('perpusip_png#820'), 'name' => 'Admin Perpusip', 'nip' => 'perpusip_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perpustakaan Dan Kearsipan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dipertahankan_png', 'password' => Hash::make('dipertahankan_png#715'), 'name' => 'Admin Dipertahankan', 'nip' => 'dipertahankan_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pertanian, Ketahanan Pangan Dan Perikanan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'dinsosp3a_png', 'password' => Hash::make('dinsosp3a_png#763'), 'name' => 'Admin Dinsosp3a', 'nip' => 'dinsosp3a_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Sosial, Pemberdayaan Perempuan Dan Perlindungan Anak', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'disnaker_png', 'password' => Hash::make('disnaker_png#447'), 'name' => 'Admin Disnaker', 'nip' => 'disnaker_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Tenaga Kerja', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'inspektorat_png', 'password' => Hash::make('inspektorat_png#664'), 'name' => 'Admin Inspektorat', 'nip' => 'inspektorat_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Inspektorat', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_babadan', 'password' => Hash::make('kec_babadan#885'), 'name' => 'Admin Kec Babadan', 'nip' => 'kec_babadan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Babadan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_badegan', 'password' => Hash::make('kec_badegan#681'), 'name' => 'Admin Kec Badegan', 'nip' => 'kec_badegan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Badegan', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_balong', 'password' => Hash::make('kec_balong#934'), 'name' => 'Admin Kec Balong', 'nip' => 'kec_balong', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Balong', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_bungkal', 'password' => Hash::make('kec_bungkal#176'), 'name' => 'Admin Kec Bungkal', 'nip' => 'kec_bungkal', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Bungkal', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'kec_jambon', 'password' => Hash::make('kec_jambon#254'), 'name' => 'Admin Kec Jambon', 'nip' => 'kec_jambon', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jambon', 'satker' => '', 'level' => '1' ]);
        DB::table('users')->insert([ 'username' => 'SUPERADMINKOMINFO', 'password' => Hash::make('Kolokulokelas2'), 'name' => 'Superadmin Kominfo', 'nip' => 'SUPERADMINKOMINFO', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Superadmin Kominfo', 'satker' => '', 'level' => '2' ]);
        DB::table('users')->insert([ 'username' => 'SUPERADMININSPEKTORAT', 'password' => Hash::make('Super4dminINSPEKTOR4T'), 'name' => 'Superadmin', 'nip' => 'SUPERADMININSPEKTORAT', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Superadmin Inspektorat', 'satker' => '', 'level' => '2' ]);



        // DB::table('users')->insert([ 'username' => 'kec_sawoo', 'password' => Hash::make('password'), 'name' => 'Admin Kec Sawoo', 'nip' => 'kec_sawoo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sawoo', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_sukorejo', 'password' => Hash::make('password'), 'name' => 'Admin Kec Sukorejo', 'nip' => 'kec_sukorejo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sukorejo', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_sooko', 'password' => Hash::make('password'), 'name' => 'Admin Kec Sooko', 'nip' => 'kec_sooko', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sooko', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_slahung', 'password' => Hash::make('password'), 'name' => 'Admin Kec Slahung', 'nip' => 'kec_slahung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Slahung', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_siman', 'password' => Hash::make('password'), 'name' => 'Admin Kec Siman', 'nip' => 'kec_siman', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Siman', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_pulung', 'password' => Hash::make('password'), 'name' => 'Admin Kec Pulung', 'nip' => 'kec_pulung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Pulung', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_sampung', 'password' => Hash::make('password'), 'name' => 'Admin Kec Sampung', 'nip' => 'kec_sampung', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sampung', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_sambit', 'password' => Hash::make('password'), 'name' => 'Admin Kec Sambit', 'nip' => 'kec_sambit', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Sambit', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_pudak', 'password' => Hash::make('password'), 'name' => 'Admin Kec Pudak', 'nip' => 'kec_pudak', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Pudak', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_ponorogo', 'password' => Hash::make('password'), 'name' => 'Admin Kec Ponorogo', 'nip' => 'kec_ponorogo', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ponorogo', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_ngrayun', 'password' => Hash::make('password'), 'name' => 'Admin Kec Ngrayun', 'nip' => 'kec_ngrayun', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ngrayun', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'rsud_png', 'password' => Hash::make('password'), 'name' => 'Admin Rsud', 'nip' => 'rsud_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Rsud Dr. Harjono S', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_ngebel', 'password' => Hash::make('password'), 'name' => 'Admin Kec Ngebel', 'nip' => 'kec_ngebel', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Ngebel', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_admpersda', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Admpersda', 'nip' => 'bag_admpersda', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Administrasi Perekonomian Dan Sumber Daya Alam', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'satpolpp_png', 'password' => Hash::make('password'), 'name' => 'Admin Satpolpp', 'nip' => 'satpolpp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Satuan Polisi Pamong Praja', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'setda_png', 'password' => Hash::make('password'), 'name' => 'Admin Setda', 'nip' => 'setda_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Sekretariat Daerah', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'setwan_png', 'password' => Hash::make('password'), 'name' => 'Admin Setwan', 'nip' => 'setwan_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Sekretariat Dprd', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_tapem', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Tapem', 'nip' => 'bag_tapem', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Tata Pemerintahan Dan Kerjasama', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_kesra', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Kesra', 'nip' => 'bag_kesra', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Kesejahteraan Rakyat', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_hukum', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Hukum', 'nip' => 'bag_hukum', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Hukum', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_adbang', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Adbang', 'nip' => 'bag_adbang', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Administrasi Pembangunan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_pbj', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Pbj', 'nip' => 'bag_pbj', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Pengadaan Barang Dan Jasa', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_umum', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Umum', 'nip' => 'bag_umum', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Umum', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_organisasi', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Organisasi', 'nip' => 'bag_organisasi', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Organisasi', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_protokol', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Protokol', 'nip' => 'bag_protokol', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Protokol Dan Komunikasi Pimpinan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bag_perkeu', 'password' => Hash::make('password'), 'name' => 'Admin Bagian Perkeu', 'nip' => 'bag_perkeu', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Bagian Perencanaan Dan Keuangan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'staf_ahli', 'password' => Hash::make('password'), 'name' => 'Admin Staf Ahli', 'nip' => 'staf_ahli', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Staf Ahli', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_kauman', 'password' => Hash::make('password'), 'name' => 'Admin Kec Kauman', 'nip' => 'kec_kauman', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Kauman', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_mlarak', 'password' => Hash::make('password'), 'name' => 'Admin Kec Mlarak', 'nip' => 'kec_mlarak', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Mlarak', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dindik_png', 'password' => Hash::make('password'), 'name' => 'Admin Dindik', 'nip' => 'dindik_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pendidikan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_jetis', 'password' => Hash::make('password'), 'name' => 'Admin Kec Jetis', 'nip' => 'kec_jetis', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jetis', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dpmd_png', 'password' => Hash::make('password'), 'name' => 'Admin Pemdes', 'nip' => 'dpmd_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pemberdayaan Masyarakat Dan Desa', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'admin_non_pns', 'password' => Hash::make('password'), 'name' => 'Admin Pejabat Non-pns', 'nip' => 'admin_non_pns', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Pejabat Non-pns', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bkpsdm_png', 'password' => Hash::make('password'), 'name' => 'Admin Bkpsdm', 'nip' => 'bkpsdm_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Kepegawaian Dan Pengembangan Sumber Daya Manusia', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bakesbang_png', 'password' => Hash::make('password'), 'name' => 'Admin Bakesbang', 'nip' => 'bakesbang_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Kesatuan Bangsa Dan Politik', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bpbd_png', 'password' => Hash::make('password'), 'name' => 'Admin Bpbd', 'nip' => 'bpbd_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Penanggulangan Bencana Daerah', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bppkad_png', 'password' => Hash::make('password'), 'name' => 'Admin Bppkad', 'nip' => 'bppkad_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Pendapatan, Pengelolaan Keuangan Dan Asset Daerah', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'bappeda_png', 'password' => Hash::make('password'), 'name' => 'Admin Bappeda', 'nip' => 'bappeda_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Badan Perencanaan Pembangunan Daerah, Penelitian Dan Pengembangan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'disbudparpora_png', 'password' => Hash::make('password'), 'name' => 'Admin Disbudparpora', 'nip' => 'disbudparpora_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kebudayaan, Pariwisata, Pemuda Dan Olahraga', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'disdukcapil_png', 'password' => Hash::make('password'), 'name' => 'Admin Dukcapil', 'nip' => 'disdukcapil_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kependudukan Dan Pencatatan Sipil', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dinkes_png', 'password' => Hash::make('password'), 'name' => 'Admin Dinkes', 'nip' => 'dinkes_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Kesehatan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'diskominfo_png', 'password' => Hash::make('password'), 'name' => 'Admin Kominfo', 'nip' => 'diskominfo_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Komunikasi, Informatika Dan Statistik', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dlh_png', 'password' => Hash::make('password'), 'name' => 'Admin Lh', 'nip' => 'dlh_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Lingkungan Hidup', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dpupkp_png', 'password' => Hash::make('password'), 'name' => 'Admin Dpupkp', 'nip' => 'dpupkp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pekerjaan Umum, Perumahan Dan Kawasan Permukiman', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dpmptsp_png', 'password' => Hash::make('password'), 'name' => 'Admin Dpmptsp', 'nip' => 'dpmptsp_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_jenangan', 'password' => Hash::make('password'), 'name' => 'Admin Kec Jenangan', 'nip' => 'kec_jenangan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jenangan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dppkb_png', 'password' => Hash::make('password'), 'name' => 'Admin Dppkb', 'nip' => 'dppkb_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pengendalian Penduduk Dan Kb', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'perdagkum_png', 'password' => Hash::make('password'), 'name' => 'Admin Perdagkum', 'nip' => 'perdagkum_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perdagangan, Koperasi Dan Usaha Mikro', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dishub_png', 'password' => Hash::make('password'), 'name' => 'Admin Dishub', 'nip' => 'dishub_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perhubungan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'perpusip_png', 'password' => Hash::make('password'), 'name' => 'Admin Perpusip', 'nip' => 'perpusip_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Perpustakaan Dan Kearsipan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dipertahankan_png', 'password' => Hash::make('password'), 'name' => 'Admin Dipertahankan', 'nip' => 'dipertahankan_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Pertanian, Ketahanan Pangan Dan Perikanan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'dinsosp3a_png', 'password' => Hash::make('password'), 'name' => 'Admin Dinsosp3a', 'nip' => 'dinsosp3a_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Sosial, Pemberdayaan Perempuan Dan Perlindungan Anak', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'disnaker_png', 'password' => Hash::make('password'), 'name' => 'Admin Disnaker', 'nip' => 'disnaker_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Dinas Tenaga Kerja', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'inspektorat_png', 'password' => Hash::make('password'), 'name' => 'Admin Inspektorat', 'nip' => 'inspektorat_png', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Inspektorat', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_babadan', 'password' => Hash::make('password'), 'name' => 'Admin Kec Babadan', 'nip' => 'kec_babadan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Babadan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_badegan', 'password' => Hash::make('password'), 'name' => 'Admin Kec Badegan', 'nip' => 'kec_badegan', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Badegan', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_balong', 'password' => Hash::make('password'), 'name' => 'Admin Kec Balong', 'nip' => 'kec_balong', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Balong', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_bungkal', 'password' => Hash::make('password'), 'name' => 'Admin Kec Bungkal', 'nip' => 'kec_bungkal', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Bungkal', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'kec_jambon', 'password' => Hash::make('password'), 'name' => 'Admin Kec Jambon', 'nip' => 'kec_jambon', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Kecamatan Jambon', 'satker' => '', 'level' => '1' ]);
        // DB::table('users')->insert([ 'username' => 'SUPERADMINKOMINFO', 'password' => Hash::make('Kolokulokelas2'), 'name' => 'Superadmin Kominfo', 'nip' => 'SUPERADMINKOMINFO', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Superadmin Kominfo', 'satker' => '', 'level' => '2' ]);
        // DB::table('users')->insert([ 'username' => 'SUPERADMININSPEKTORAT', 'password' => Hash::make('Super4dminINSPEKTOR4T'), 'name' => 'Superadmin', 'nip' => 'SUPERADMININSPEKTORAT', 'email' => '', 'phone' => '', 'pangkat' => '', 'jabatan' => '', 'pd' => 'Superadmin Inspektorat', 'satker' => '', 'level' => '2' ]);

    }
}
