<x-user-layout>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Dashboard') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
        <li class="breadcrumb-item active">Dashboard</li> --}}
    </x-slot>

    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">

                <div class="card bg-secondary text-white">
                    <div class=" card-body">
                        <h4 class="header-title">Selamat datang, <i>{{ Auth::user()->name }}</i></h4>

                        Anda login sebagai penggguna.<br /><br />

                        Untuk informasi dan bantuan <a href="{{ route('bantuan') }}" class="text-warning"><b>klik
                                di sini</b></a>, atau hubungi kanal berikut:<br />
                        <i class="uil-phone"></i> 0352 – 2557 8448<br />
                        <i class="uil-envelope "></i> inspektorat@ponorogo.go.id

                    </div>
                </div>
                @if ($aktif == 1 && $p != 1)
                    <div class="alert alert-primary alert-dismissible bg-dark text-white border-0 fade show"
                        role="alert">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                        <strong class="font-16">Perhatian!</strong><br>
                        Pengisian surat pernyataaan gratifikasi
                        <b class="text-warning">Tahun {{ $jadwal->tahun }} Semester
                            {{ $jadwal->semester }}</b>
                        dibuka hingga tanggal<b class="text-warning">
                            {{ konversiTanggal($jadwal->akhir) }}</b>.<br class="mb-1">
                        <a href="{{ route('user.daftar') }}" class="btn btn-warning btn-xsm text-black font-12">Klik
                            di sini</a> untuk
                        mengisi surat pernyataan.
                    </div>
                @endif
            </div>
        </div>
    </x-slot>

    <x-slot name="script">
        @if (Auth::user()->pd == null))
            <script type="text/javascript">
                Swal.fire({
                    title: 'Selamat datang!',
                    html: 'Anda login untuk yang pertama kali.<br>Update data diri anda sebelum melanjutkan pengisian.', //<br><a href="{{ route('user.account') }}">Klik di sini</a> untuk mengupdate data diri.
                    icon: 'info',
                    // showConfirmButton: false,
                    allowOutsideClick: false,
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#39afd1'
                }).then(function() {
                    window.location = "{{ route('user.account') }}";
                });

            </script>
        @endif
    </x-slot>
</x-user-layout>
