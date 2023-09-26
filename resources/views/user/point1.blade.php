<x-user-layout>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Pernyataan') }}
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
                            {{ $periode = convertPeriode($jadwal->tahun, $jadwal->semester) }}
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
                                    <a class="nav-link rounded-0 py-1 
                                    @if (session('step')=='1' ) active @endif">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 
                                    @if (session('step')=='2' ) active @endif">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 
                                    @if (session('step')=='3' ) active @endif">
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
                            </ul>
                        </div>
                        <div class="tab-content mb-0 b-0">
                            <form id="question1"
                                action="{{ route('user.post.point', [$jadwal->id, session('step')]) }}"
                                class="form-horizontal needs-validation" novalidate="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12 text-center font-18 mt-2 mb-3">
                                        @switch(session('step'))
                                            @case('1')
                                                Apakah anda pernah menerima gratifikasi
                                                pada periode {{ $periode }}?
                                            @break
                                            {{--  --}}
                                            @case('2')
                                                Apakah anda pernah menerima gratifikasi dan melaporkannya kepada UPG/KPK
                                                pada periode {{ $periode }}?
                                            @break
                                            {{--  --}}
                                            @case('3')
                                                Apakah anda pernah menerima gratifikasi dan belum melaporkannya
                                                pada periode {{ $periode }}?
                                            @break
                                            {{--  --}}
                                            @default

                                        @endswitch

                                        <div class="mt-4 font-22 mb-4">
                                            <div class="form-check form-check-inline position-relative">
                                                <input type="radio" id="r1" name="p" class="form-check-input" value="1"
                                                    required @if (session('step') == 3 && session('pernyataan.tanya2') == 0) checked @endif>
                                                <x-invalid :value="__('Pilih salah satu jawaban')"
                                                    style="width:110px !important;max-width:200%;" />
                                                <label class="form-check-label" for="r1">YA</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" id="r2" name="p" class="form-check-input" value="0"
                                                    required @if (session('step') == 3 && session('pernyataan.tanya2') == 0) disabled @endif>
                                                <label class="form-check-label" for="r2">TIDAK</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-inline wizard mb-0">
                                    <li class="previous list-inline-item disabled">
                                        <a href="{{ route('user.pernyataan.biodata', $jadwal->id) }}"
                                            class="btn btn-light">
                                            <i class="mdi mdi-arrow-left me-1"></i> Kembali
                                        </a>
                                    </li>
                                    <li class="next list-inline-item float-end ">
                                        <button type="submit" class="btn btn-info float-end">
                                            Selanjutnya <i class="mdi mdi-arrow-right ms-1"></i>
                                        </button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @foreach (session('p') as $x)
            {{ $x }}
        @endforeach --}}
        {{-- {{ dd(session('p')) }} --}}
        {{-- email = {{ session('p')['email'] }} --}}
        {{-- phone = {{ session('p')['phone'] }} --}}
        {{-- {{ dd(session('pernyataan')) }} --}}
    </x-slot>



</x-user-layout>
