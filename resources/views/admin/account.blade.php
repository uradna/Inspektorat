<x-admin-layout>
    <x-slot name="style">
        <style>
            /*the container must be positioned relative:*/
            .autocomplete {
                position: relative;
            }

            .autocomplete-items {
                position: absolute;
                border: 1px solid #A0A0A0;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
                padding: 4px 0;
                background-color: rgb(255, 255, 255);
                border-radius: 0.25rem;
            }

            .autocomplete-items div {
                padding: 3px 20px;
                line-height: 24px;
                cursor: pointer;
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
                background-color: #E0E0E6;
                color: #000;
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
                background-color: DodgerBlue !important;
                color: #ffffff;
            }

            /* swal2 cancel button text color */
            .swal2-styled.swal2-cancel {
                color: #555 !important;
            }

        </style>
    </x-slot>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Dashboard') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Ubah Password Akun</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Kelola akun') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">



                            <ul class="nav nav-tabs nav-bordered mb-3">
                                <li class="nav-item">
                                    <a href="#settings-b1" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link active">
                                        <i class="d-md-none d-block fst-normal">Ubah password</i>
                                        <span class="d-none d-md-block">Ubah password</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active show" id="settings-b1">
                                    <p class="mb-0">
                                    <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                                        action="{{ route('admin.password') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="position-relative mb-2 col-md-6">
                                                <div class="form-floating input-group input-group-merge">
                                                    <x-input-float :id="__('old_password')" type="password" required />
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                    <x-invalid :value="__('Masukkan password lama')" />
                                                    <x-label-float :value="__('Password')"
                                                        style="z-index: 5 !important;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="position-relative mb-2 col-md-6">
                                                <div class="form-floating input-group input-group-merge">
                                                    <x-input-float :id="__('password')" type="password" required />
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                    <x-invalid :value="__('Masukkan password baru')" />
                                                    <x-label-float :value="__('Password baru')"
                                                        style="z-index: 5 !important;" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="position-relative mb-2 col-md-6">
                                                <div class="form-floating input-group input-group-merge">
                                                    <x-input-float :id="__('confirmation_password')" type="password"
                                                        required />
                                                    <div class="input-group-text" data-password="false">
                                                        <span class="password-eye"></span>
                                                    </div>
                                                    <x-invalid :value="__('Ulangi password baru')" />
                                                    <x-label-float :value="__('Ulangi password baru')"
                                                        style="z-index: 5 !important;" />
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-info float-end mt-2">
                                                    <i class="mdi mdi-content-save-outline me-1"></i>Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end row-->
                    </div>
                </div>

            </div>
        </div>
    </x-slot>


</x-admin-layout>
