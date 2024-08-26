<x-admin-layout>
    <x-slot name="style">
        <style>
            .error-bag {
                font-size: .875em;
                color: #ea868f;
            }
        </style>
    </x-slot>

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
        @if ($user->aktif == 2)
            <div class="modal hide fade" id="pass" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Ubah Password
                            </h4>
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                                id="disp"></button> --}}
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate="" method="POST"
                                action="{{ route('adminreset') }}">
                                @csrf
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-12">
                                        <span class="text-muted small">Gunakan password yang baru, tidak boleh menggunakan password lama. </span>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-12">
                                        <div class="form-floating input-group input-group-merge">
                                            <x-input-float :id="__('password')" type="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[a-zA-Z\d\w\W]{8,}$" required />
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <x-invalid :value="__('Password minimal 8 karakter, harus ada huruf dan angka')" />
                                            <x-label-float :value="__('Password baru')" style="z-index: 5 !important;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-12">
                                        <div class="form-floating input-group input-group-merge">
                                            <x-input-float :id="__('password_confirmation')" type="password" required />
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                            <x-invalid :value="__('Password minimal 8 karakter, harus ada huruf dan angka')" />
                                            <x-label-float :value="__('Ulangi password baru')" style="z-index: 5 !important;" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    @if ($errors->any())
                                        {{-- {{ dd($errors) }} --}}
                                        {!! implode('', $errors->all('<div class="error-bag">:message</div>')) !!}
                                    @endif
                                </div>

                                <div class="row g-2 mt-1">
                                    <div class="col-md-12 text-end">
                                        {{-- <button type="button" class="btn btn-lighter me-2"
                                            data-bs-dismiss="modal">Batal</button> --}}
                                        <button type="submit" class="btn btn-info">
                                            SIMPAN
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>

    <x-slot name="script">
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#pass').modal('show');
            });
        </script>
        @if (Auth::user()->name == null)
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
