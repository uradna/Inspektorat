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

            table.dataTable>tbody>tr.child span.dtr-title {
                min-width: 180px !important;
                max-width: 700px !important;
            }
        </style>
    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin ' . $jadwal->tahun . ' - Semester ' . $jadwal->semester) }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pernyataan') }}">Pernyataan</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pernyataan.jadwal', [$jadwal->id]) }}">Tahun
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
                            {{ $jadwal->semester }} - {{ $pd }}</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th width="1%">#</th> --}}
                                        <th data-priority="0">Nama</th>
                                        <th data-priority="3">NIP</th>
                                        <th data-priority="4">No. HP</th>
                                        <th data-priority="5">Jabatan</th>
                                        <th>Satker</th>
                                        <th>Pernyataan</th>
                                        <th data-priority="2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                    ajax: "{{ route('superadmin.pernyataan.jadwal.pd.ajax', [$jadwal, $pd]) }}",
                    dataSrc: 'data',
                    columnDefs: [{
                           data: 'name',
                            targets: 0,
							render: function(data, type, row) {
                                let text = row.name;
                                if (row.tanya1 !== null && row.tanya2 !== null && row.tanya3 !== null) {
                                    if (row.tanya3 === 1) {
                                        text += '<sup class="bg-danger ms-1 text-white rounded" style="padding:0.1em 0.6em; font-size:0.6rem;"><b>!</b></sup>';
                                    }
                                }
								return text;
                            }
                        },
                        {
                            data: 'nip',
                            targets: 1
                        },
                        {
                            data: 'phone',
                            targets: 2
                        },
                        {
                            data: 'jabatan',
                            targets: 3
                        },
                        {
                            data: 'satker',
                            targets: 4
                        },
                        {
                            data: 'tanya1',
                            // className: "text-end",
                            targets: 5,
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
                            targets: 6,
                            render: function(data, type, row) {
                                let text = "";
                                let url = "../../../pernyataan/pdf/{{ $jadwal->id }}/" + row.id;
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
                        [5, 'asc']
                    ],
                    lengthChange: !1,
                    filter: !1,
                    searching: 1,
                    pageLength: 10,
                    info: !0,
                    buttons: [{
                        @notmobile()
                        text: '<i class="uil-arrow-left"></i>Kembali',
                        @elsenotmobile()
                        text: '<i class="uil-arrow-left"></i>',
                        className: 'mb-1',
                        @endmobile()
                        action: function(e, dt, node, config) {
                            window.open("{{ route('superadmin.pernyataan.jadwal', $id) }}",
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
                        lengthMenu: "Menampilkan _MENU_ pegawai per halaman",
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
