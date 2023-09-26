<x-user-layout>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Pernyataan Gratifikasi') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
        <li class="breadcrumb-item active">Dashboard</li> --}}
    </x-slot>

    <x-slot name="header">
        {{ __('Pernyataan Gratifikasi') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">
                            Pernyataan gratifikasi periode
                            {{ convertPeriode($jadwal->tahun, $jadwal->semester) }}
                        </h4>
                        <div class="mx-3">
                            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-account-box font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Biodata</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 ">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 ">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-book-edit-outline font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Laporan Gratifikasi</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i
                                            class="mdi mdi-checkbox-marked-circle-outline font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Finish</span>
                                    </a>
                                </li> -->

                            </ul>
                        </div>
                        <div class="tab-content mb-0 b-0">
                            <form class="form-horizontal needs-validation" novalidate="" method="POST"
                                action="{{ route('user.pernyataan.final.post', $jadwal->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">

                                                <h3 class="mt-0">Satu langkah lagi...</h3>

                                                <p class="col-6 mb-3 mx-auto font-14">
                                                    Anda telah mengisi pernyataan gratifikasi untuk periode
                                                    semester 2 tahun 2022.<br><br>
                                                    Dengan menekan tombol <b>SIMPAN</b>, anda menyatakan
                                                    telah mengisi pernyataan dengan sebenar-benarnya dan
                                                    bersedia mempertanggungjawabkannya secara hukum.
                                                </p>

                                                <div class="mb-3 font-18">
                                                    <div class="form-check d-inline-block position-relative">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck4" required="">
                                                        <x-invalid :value="__('Centang pada kotak')"
                                                            style="width:110px !important;max-width:200%;" />
                                                        <label class="form-check-label" for="customCheck4">Ya,
                                                            saya bersedia!</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <ul class="list-inline wizard mb-0">
                                        <li class="previous list-inline-item disabled">
                                            <a href="{{ route('user.pernyataan.lapor', $jadwal->id) }}"
                                                class="btn btn-light">
                                                <i class="mdi mdi-arrow-left me-1"></i> Kembali
                                            </a>
                                        </li>
                                        <li class="next list-inline-item float-end ">
                                            <button type="submit" class="btn btn-info float-end">
                                                <i class="mdi mdi-content-save-outline me-1"></i> SIMPAN
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>



</x-user-layout>
