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
                                        <th data-priority="1">Pernyataan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $d)
                                        <tr>
                                            <td>{{ $d->name }}</td>
                                            <td>{{ $d->nip }}‎ </td>
                                            <td>
                                                <a href="https://wa.me/62{{ substr($d->phone, 1) }}?text=Halo Ibu/Bapak {{ $d->name }}"
                                                    target="_blank" class="text-black-50">
                                                    {{ $d->phone }}
                                                </a>
                                            </td>
                                            <td>{{ $d->jabatan }}</td>
                                            <td>{{ $d->satker }}</td>
                                            <td class="text-center">
                                                @if ($d->pernyataan == 0)
                                                    <i class="mdi mdi-close btn btn-xsm btn-danger pe-none fst-normal"> belum </i>
                                                @else
                                                    <i class="mdi mdi-check btn btn-xsm btn-success pe-none fst-normal"> sudah </i>
                                                    {{-- <a class="btn btn-xsm btn-success pe-none"> <i class="mdi mdi-check"></i> sudah </a> --}}
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
    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    order: [
                        [5, 'desc']
                    ],
                    lengthChange: !1,
                    filter: !1,
                    searching: 1,
                    pageLength: 10,
                    info: !0,
                    buttons: [{
                        @desktop()
                        text: '<i class="uil-arrow-left"></i>Kembali',
                        @enddesktop()
                        @mobile()
                        text: '<i class="uil-arrow-left"></i>',
                        className: 'mb-1',
                        @endmobile()
                        action: function(e, dt, node, config) {
                            window.open("{{ route('admin.pernyataan') }}", "_self");
                        }
                    }, {
                        extend: 'print',
                        @mobile()
                        text: '<i class="mdi mdi-printer"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan Tahun {{ $tahun }} - Semester {{ $semester }} - {{ Auth::user()->pd }}',
                    }, {
                        extend: 'excel',
                        @mobile()
                        text: '<i class="mdi mdi-microsoft-excel"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan Tahun {{ $tahun }} - Semester {{ $semester }} - {{ Auth::user()->pd }}',
                    }, {
                        extend: 'colvis',
                        @desktop()
                        text: 'Kolom',
                        @enddesktop()
                        @mobile()
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
</x-adminwide-layout>
