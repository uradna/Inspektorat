<x-admin-layout>
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
        {{ __('Admin Gratifikasi Online - Data Pernyataan') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal Pernyataan</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pernyataan - ' . Auth::user()->pd) }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data Jadwal Pernyataan</h4>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="3" width="1%">#</th>
                                        <th data-priority="0">Tahun</th>
                                        <th data-priority="4">Semester</th>
                                        <th>Dibuka hingga</th>
                                        <th>Status pengisian</th>
                                        <th data-priority="2">
                                            Total @notmobile()pernyataan @endnotmobile()
                                        </th>
                                        <th data-priority="1" class="text-center"> @notmobile()Aksi @endnotmobile()</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                    @if ($aktif != null)
                                        @foreach ($aktif as $a)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $a->tahun }}</td>
                                                <td>Semester {{ $a->semester }}</td>
                                                <td>{{ konversiTanggalPendek($a->akhir) }}</td>
                                                <td>
                                                    @if (masihBuka($a->akhir))
                                                        Masih berlangsung
                                                    @else
                                                        Sudah berakhir
                                                    @endif
                                                    <sup class="bg-danger ms-1 text-white rounded" style="padding:0.1em 0.6em; font-size:0.6rem;"><b>!</b></sup>
                                                </td>
                                                <td><b>{{ $a->jumlah }}</b> /
                                                    {{ round(($a->jumlah / $total_pegawai) * 100, 1) }}%
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.pernyataan.latest', $a->id) }}"
                                                        class="btn btn-info btn-xsm">
                                                        <i class="mdi mdi-eye"></i> @notmobile() lihat @endnotmobile()

                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    @foreach ($daftar as $d)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $d->jadwal->tahun }}</td>
                                            <td>Semester {{ $d->jadwal->semester }}</td>
                                            <td>{{ konversiTanggalPendek($d->jadwal->akhir) }}</td>
                                            <td>Sudah ditutup</td>
                                            <td><b>{{ $d->jumlah }}</b> /
                                                {{ round(($d->jumlah / $d->total) * 100, 1) }}%
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.pernyataan.detail', [$d->jadwal->id, $d->jadwal->tahun, $d->jadwal->semester]) }}"
                                                    class="btn btn-info btn-xsm">
                                                    <i class="mdi mdi-eye"></i> @notmobile() lihat @endnotmobile()
                                                </a>
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
                    lengthChange: !1,
                    filter: 1,
                    pageLength: 10,
                    info: !0,
                    buttons: [{
                        extend: 'print',
                        @mobile()
                        text: '<i class="mdi mdi-printer"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan - {{ Auth::user()->pd }}',
                    }, {
                        extend: 'excel',
                        @mobile()
                        text: '<i class="mdi mdi-microsoft-excel"></i>',
                        className: 'mb-1',
                        @endmobile()
                        title: 'Data Pernyataan Tahun - {{ Auth::user()->pd }}',
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

</x-admin-layout>
