<x-superadmin-layout>
    <x-slot name="title">
        {{ __('Dashboard Superadmin - Jadwal') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Jadwal Pengisian') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar Jadwal </h4>
                        @if (jadwalStatus($aktif->status))
                            <div class="alert alert-primary alert-dismissible bg-dark text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong class="font-16">Perhatian!</strong><br>
                                Pengisian surat pernyataaan gratifikasi
                                <b class="text-warning">Tahun {{ $aktif->tahun }} Semester
                                    {{ $aktif->semester }}</b>
                                dibuka hingga tanggal<b class="text-warning">
                                    {{ konversiTanggal($aktif->akhir) }}</b>.<br>

                                Jadwal pengisian dapat ditambah jika jadwal pengisian terakhir sudah ditutup.
                                <br class="mb-1">
                            </div>
                        @endif

                        <div>
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                data-bs-target="#new" @if (jadwalStatus($aktif->status)) disabled @endif>
                                <i class="mdi mdi-plus-circle me-2"></i> Tambah Jadwal
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped mb-0 dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th style="width:2%">#</th>
                                        <th data-priority="0">Tahun</th>
                                        <th data-priority="2">Dibuka hingga</th>
                                        <th>Status</th>
                                        <th data-priority="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $i => $d)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $d->tahun }} /
                                                @desktop Semester @enddesktop
                                                @mobile smt @endmobile
                                                {{ $d->semester }}
                                            </td>
                                            <td>
                                                {{-- @if (masihBuka($d->akhir)) --}}
                                                {{ konversiTanggalPendek($d->akhir) }}
                                                {{-- @else
                                                    Sudah ditutup
                                                @endif --}}
                                            </td>
                                            <td>
                                                @if (masihBuka($d->akhir))
                                                    Berlangsung
                                                @else
                                                    @if (jadwalStatus($d->status))
                                                        Berakhir
                                                    @else
                                                        Sudah ditutup
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if (jadwalStatus($d->status))
                                                    <form action="{{ route('superadmin.jadwal.close') }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="button" class="btn btn-success btn-xsm "
                                                            data-bs-toggle="modal" data-bs-target="#new">
                                                            <i class="uil-pen"></i>
                                                            Edit
                                                        </button>
                                                        {{--  --}}
                                                        <button class="btn btn-danger btn-xsm delete_alert"
                                                            type="submit">
                                                            <i class="uil-folder-lock"></i>
                                                            Tutup
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('superadmin.pernyataan.jadwal', [$d->id]) }}"
                                                        class="btn btn-info btn-xsm">
                                                        <i class="mdi mdi-eye"></i>
                                                        Lihat
                                                    </a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL NEW JADWAL --}}
        @if (!jadwalStatus($aktif->status))
            <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Tambah jadwal baru
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                                id="disp"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                                action="{{ route('superadmin.jadwal.create') }}">
                                @csrf

                                {{-- ----- --}}
                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float id="tahun" type="text" value="{{ $aktif->tahun_baru }}"
                                                pattern="\d{4}" required />
                                            <x-invalid :value="__('Tahun harus diisi')" />
                                            <x-label-float :value="__('Tahun')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select text-dark" name="semester" required>

                                                <option value="1" @if (old('semester') != null && old('pangkat') == 1) selected @elseif (old('pangkat') == null && $aktif->semester_baru == 1 ) selected @endif>
                                                    1 (satu)
                                                </option>
                                                <option value="2" @if (old('semester') != null && old('pangkat') == 2) selected @elseif (old('pangkat') == null && $aktif->semester_baru == 2 ) selected @endif>
                                                    2 (dua)
                                                </option>

                                            </select>
                                            <x-invalid :value="__('Semester harus dipilih')" />
                                            <x-label-float :value="__('Semester')" />
                                        </div>
                                    </div>
                                </div>
                                {{-- ----- --}}
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-12">
                                        <div class="form-floating input-group input-group-merge">
                                            <x-input-float :id="__('akhir')" type="date" min="{{ date('Y-m-d') }}"
                                                value="{{ old('akhir') ?? '' }}" required />
                                            <x-invalid :value="__('Tanggal harus dipilih')" />
                                            <x-label-float :value="__('Dibuka hingga')"
                                                style="z-index: 5 !important;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2 mt-1">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-lighter me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info">
                                            SIMPAN
                                        </button>
                                    </div>
                                </div>
                                {{-- {{ dd($errors) }} --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (jadwalStatus($aktif->status))
            <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit jadwal
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                                id="disp"></button>
                        </div>

                        <div class="modal-body">
                            <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                                action="{{ route('superadmin.jadwal.edit') }}">
                                @csrf
                                {{-- ----- --}}
                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float type="text" value="{{ $aktif->tahun }}" disabled
                                                readonly />
                                            <x-label-float :value="__('Tahun')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float type="text" value="{{ $aktif->semester }}" disabled
                                                readonly />
                                            <x-label-float :value="__('Semester')" />
                                        </div>
                                    </div>
                                </div>
                                {{-- ----- --}}
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-12">
                                        <div class="form-floating input-group input-group-merge">
                                            <x-input-float :id="__('akhir')" type="date" min="{{ date('Y-m-d') }}"
                                                value="{{ old('akhir') ?? $aktif->akhir }}" required />
                                            <x-invalid :value="__('Tanggal harus dipilih')" />
                                            <x-label-float :value="__('Dibuka hingga')"
                                                style="z-index: 5 !important;" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2 mt-1">
                                    <div class="col-md-12 text-end">
                                        <button type="button" class="btn btn-lighter me-2"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info">
                                            SIMPAN
                                        </button>
                                    </div>
                                </div>
                                {{-- {{ dd($errors) }} --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    lengthChange: !1,
                    searching: 1,
                    pageLength: 10,
                    // bPaginate: !1,
                    // filter: !1,
                    // info: !1,
                    sDom: '<"top">rt<"bottom"l>p<"clear">',
                    //buttons: ["copy", "print", "excel"],
                    //buttons: ["print", "excel","colvis"],
                    // buttons: [{
                    //     extend: 'print'
                    // }, {
                    //     extend: 'excel'
                    // }, {
                    //     extend: 'colvis',
                    //     text: 'Kolom'
                    // }],
                    order: [
                        [1, "desc"]
                    ],
                    columnDefs: [{
                        targets: [0],
                        visible: true
                    }, {
                        targets: [2],
                        visible: true
                    }, {
                        targets: [3],
                        visible: true
                    }],
                    language: {
                        paginate: {
                            previous: "<i class='mdi mdi-chevron-left'>",
                            next: "<i class='mdi mdi-chevron-right'>"
                        }
                    },
                    drawCallback: function() {
                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                        $(".dataTables_paginate > .pagination > .active > .page-link ").addClass(
                            "bg-secondary");
                    }
                });
                a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(
                    "#alternative-page-datatable").DataTable({
                    pagingType: "full_numbers",
                    drawCallback: function() {
                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                    }
                })
            });

        </script>

        @if ($errors->any())
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#new').modal('show');
                });

            </script>
        @endif

        <script>
            $('.delete_alert').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Jadwal yang ditutup tidak bisa dibuka kembali!",
                    icon: 'warning',
                    iconColor: '#fa5c7c',
                    showCancelButton: true,
                    confirmButtonColor: '#39afd1',
                    cancelButtonColor: '#dadee2',
                    confirmButtonText: 'Ya, Tutup!!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {

                        form.submit();
                    }
                });
            });

        </script>
    </x-slot>

</x-superadmin-layout>
