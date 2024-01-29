<x-adminwide-layout>
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
        {{ __('Admin Gratifikasi Online - Data Pernyataan Tahun ' . $tahun . ' - Semester ' . $semester) }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.pernyataan') }}">Jadwal Pernyataan</a></li>
        <li class="breadcrumb-item active">Tahun {{ $tahun }} - Semester
            {{ $semester }}</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pernyataan - ' . Auth::user()->pd) }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data Pernyataan Tahun {{ $tahun }} - Semester
                            {{ $semester }}</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="0">Nama</th>
                                        <th data-priority="2">NIP</th>
                                        <th data-priority="4">No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Satker</th>
                                        <th data-priority="1">@desktop()Pernyataan @elsedesktop() P @enddesktop()</th>
                                    </tr>
                                </thead>
                                <tbody id="main">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    @php
        $url = route('admin.pernyataan.ajax', [Request()->id, Request()->tahun, Request()->semester]);
    @endphp
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

                    ajax: "{{ $url }}",
                    dataSrc: 'data',
                    columnDefs: [{
                            data: 'name',
                            targets: 0
                        },
                        {
                            data: 'nip',
                            targets: 1,
                            render: function(data, type, row) {
                                return row.nip.substr(0, 8) + " " + row.nip.substr(8, 6) + " " + row.nip.substr(14, 1) + " " + row.nip.substr(15, 3);
                            }
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
                            data: 'pernyataan',
                            targets: 5,
                            render: function(data, type, row) {
                                if (row.pernyataan === "1") {
                                    return '<i class="mdi mdi-check btn btn-xsm btn-success pe-none fst-normal"> @desktop()sudah @enddesktop() </i>';
                                } else {

                                    return '<i class="mdi mdi-close btn btn-xsm btn-danger pe-none fst-normal"> @desktop()belum @enddesktop() </i>';

                                }
                            }
                        }
                    ],
                    order: [
                        [5, 'desc']
                    ],
                    lengthChange: !1,
                    searching: 1,
                    pageLength: 10,
                    info: !0,
                    buttons: [{
                        @notmobile()
                        text: '<i class="uil-arrow-left"></i>Kembali',
                        @elsenotmobile()
                        text: '<i class="uil-arrow-left"></i>',
                        className: 'mb-1',
                        @endnotmobile()
                        action: function(e, dt, node, config) {
                            window.open("{{ route('admin.pernyataan') }}", "_self");
                        }
                    }, {
                        extend: 'excel',
                        @mobile()
                        text: '<i class="mdi mdi-microsoft-excel"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan Tahun {{ $tahun }} - Semester {{ $semester }} - {{ Auth::user()->pd }}',
                    }, {
                        extend: 'colvis',
                        @notmobile()
                        text: 'Kolom',
                        @elsenotmobile()
                        text: '<i class="mdi mdi-table-eye"></i>',
                        className: 'mb-1',
                        @endnotmobile()
                    }],
                    language: {
                        @notmobile()
                        search: "Pencarian",
                        @elsenotmobile()
                        search: "",
                        searchPlaceholder: "Pencarian",
                        @endnotmobile()
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
</x-adminwide-layout>
