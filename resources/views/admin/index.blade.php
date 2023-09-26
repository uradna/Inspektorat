<x-admin-layout>
    <x-slot name="title">
        {{ __('Dashboard Admin - Gratifikasi Online') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
        <li class="breadcrumb-item active">Dashboard</li> --}}
    </x-slot>

    <x-slot name="header">
        {{ __('Dashboard Admin') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">

                <div class="card bg-secondary text-white">
                    <div class=" card-body">
                        <h4 class="header-title">Selamat datang, <i>{{ Auth::user()->name }}</i></h4>

                        Anda login sebagai <b class="text-warning"> Admin {{ Auth::user()->pd }}</b><br /><br />

                        Untuk informasi dan bantuan <a href="{{ route('bantuan') }}" class="text-warning"><b>klik
                                di sini</b></a>, atau hubungi kanal berikut:<br />
                        <i class="uil-phone"></i> 0352 – 2557 8448<br />
                        <i class="uil-envelope "></i> inspektorat@ponorogo.go.id

                    </div>
                </div>


            </div>
        </div>
    </x-slot>

    <x-slot name="script">
        @if (Auth::user()->name == null))
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
</x-admin-layout>
