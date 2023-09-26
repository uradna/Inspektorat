<x-superadminwide-layout>
    <x-slot name="style">
        <style>
            .file-custom {
                padding-top: 2.4rem !important;
                padding-bottom: 2.3rem !important;
                padding-left: 1.8rem !important;
            }

            .file-custom:focus {
                outline: none;
            }

        </style>
    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin - Data Pernyataan') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pernyataan') }}">Pernyataan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pernyataan.terakhir') }}">Tahun
                {{ $jadwal->tahun }} Semester {{ $jadwal->semester }}</a></li>
        <li class="breadcrumb-item active">{{ truncate($pd) }}</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pernyataan') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data Pernyataan - Tahun {{ $jadwal->tahun }} Semester
                            {{ $jadwal->semester }} - {{ $pd }} xxx</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                {{-- <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped  nowrap w-100"> --}}
                                <thead class="bg-lighter">
                                    <tr>
                                        <th width="1%">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th data-priority="3">NIP</th>
                                        <th>No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Satker</th>
                                        <th>Pernyataan</th>
                                        <th data-priority="1">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($user as $d)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->nip }}</td>
                                            <td>
                                                <a href="https://wa.me/62{{ substr($d->phone ?? $d->phone2, 1) }}?text=Halo Ibu/Bapak {{ $d->name }}"
                                                    target="_blank" class="text-black-50">
                                                    {{ $d->phone ?? $d->phone2 }}
                                                </a>
                                            </td>
                                            <td>{{ $d->jabatan ?? $d->jabatan2 }}</td>
                                            <td>{{ $d->satker ?? $d->satker2 }}</td>
                                            <td>
                                                @if ($d->pernyataan == 1)
                                                    {{ konversiPilihan($d->tanya1, $d->tanya2, $d->tanya3) }}
                                                @else ()
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ($d->pernyataan == 0)
                                                    <a class="btn btn-xsm btn-danger">
                                                        <i class="mdi mdi-close"></i>
                                                        @notmobile() belum @endnotmobile()

                                                    @else
                                                        <a class="btn btn-xsm btn-success">
                                                            <i class="mdi mdi-check"></i>
                                                            @notmobile() sudah @endnotmobile()
                                                        </a>
                                                        <a href="{{ route('pernyataan.pdf', [$jadwal->id, $d->id]) }}"
                                                            class="btn btn-xsm btn-secondary">
                                                            <i class="uil-down-arrow"></i>
                                                            @notmobile() pdf @endnotmobile()
                                                        </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    @notmobile()
                    dom: '<"container-fluid"<"row"<"col ps-0"B><"col pe-0"f>>>rtip',
                    @elsenotmobile()
                    dom: 'Bfrtip',
                    @endnotmobile()
                    ajax: "{{ route('superadmin.pernyataan.terakhir.pd.ajax', $pd) }}",
                    dataSrc: 'data',
                    columnDefs: [{
                            data: 'DT_RowId',
                            targets: 0
                        },
                        {
                            data: 'name',
                            targets: 1
                        },
                        {
                            data: 'nip',
                            targets: 2
                        },
                        {
                            data: 'phone',
                            targets: 3
                        },
                        {
                            data: 'jabatan',
                            targets: 4
                        },
                        {
                            data: 'satker',
                            targets: 5
                        },
                        {
                            data: 'tanya1',
                            targets: 6,
                            render: function(data, type, row) {
                                let text = "";
                                if (row.tanya1 !== null && row.tanya2 !== null && row.tanya3 !== null) {
                                    if (row.tanya1 === 0) {
                                        text += '<i class="uil-times-square text-danger">Tidak</i> ';
                                    } else {
                                        text += '<i class="uil-check-square text-success">Ya</i> ';
                                    }
                                    if (row.tanya2 === 0) {
                                        text += '<i class="uil-times-square text-danger">Tidak</i> ';
                                    } else {
                                        text += '<i class="uil-check-square text-success">Ya</i> ';
                                    }
                                    if (row.tanya3 === 0) {
                                        text += '<i class="uil-times-square text-danger">Tidak</i> ';
                                    } else {
                                        text += '<i class="uil-check-square text-success">Ya</i> ';
                                    }
                                    return text;
                                } else {
                                    return "-";
                                }
                            }
                        },
                        {
                            data: 'pernyataan',
                            targets: 7,
                            render: function(data, type, row) {
                                let text = "";
                                let url = "../../pernyataan/pdf/{{ $jadwal->id }}/" + row.id;
                                if (row.pernyataan === 1) {
                                    text +=
                                        '<i class="mdi mdi-check btn btn-xsm btn-success pe-none fst-normal"> sudah  </i>';
                                    text +=
                                        ' <a href="' + url +
                                        '" class="btn btn-xsm btn-secondary"><i class="uil-down-arrow"></i> pdf </a> ';

                                    return text;
                                } else {
                                    return '<i class="mdi mdi-close btn btn-xsm btn-danger pe-none fst-normal"> @desktop()belum @enddesktop() </i>';
                                }
                            }
                        }
                    ],
                    order: [
                        [0, 'asc']
                    ],
                    lengthChange: !1,
                    filter: !1,
                    searching: 1,
                    pageLength: 20,
                    info: !0,
                    buttons: [{
                        @notmobile()
                        text: '<i class="uil-arrow-left"></i>Kembali',
                        @elsenotmobile()
                        text: '<i class="uil-arrow-left"></i>',
                        className: 'mb-1',
                        @endmobile()
                        action: function(e, dt, node, config) {
                            window.open("{{ route('superadmin.pernyataan.terakhir') }}",
                                "_self");
                        }
                    }, {
                        extend: 'excel',
                        @mobile()
                        text: '<i class="mdi mdi-microsoft-excel"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan - Tahun {{ $jadwal->tahun }} Semester {{ $jadwal->semester }} - {{ $pd }}',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        }
                    }, {
                        extend: 'colvis',
                        @notmobile()
                        text: 'Kolom',
                        @elsenotmobile()
                        text: '<i class="mdi mdi-table-eye"></i>',
                        className: 'mb-1',
                        @endmobile()
                    }],
                    language: {
                        @desktop()
                        search: "Pencarian",
                        @enddesktop()
                        @mobile()
                        search: "",
                        searchPlaceholder: "Pencarian",
                        @endmobile()
                        info: "Menampilkan data ke _START_ sampai _END_ dari _TOTAL_ total data",
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
                Swal.fire({
                    title: 'Ops...',
                    html: 'Ada sesuatu yang salah.<br>Pastikan form sudah terisi semua dengan benar.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#fa5c7c'
                })

            </script>
        @endif
    </x-slot>

</x-superadminwide-layout>
