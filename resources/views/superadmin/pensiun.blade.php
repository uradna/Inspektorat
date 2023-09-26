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
        @desktop()
        <style>
            table.dataTable>tbody>tr.child span.dtr-title {
                min-width: 180px !important;
                max-width: 700px !important;
            }

        </style>
        @enddesktop()
    </x-slot>

    <x-slot name="title">
        {{ __(' Dashboard Superadmin - Pegawai Pensiun') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pegawai') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active">Pensiun</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Pegawai dengan usia {{ $usia }}+ tahun</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="2" width="1%">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th>Umur</th>
                                        <th>NIP</th>
                                        <th>No. HP</th>

                                        <th>Jabatan</th>
                                        <th>Pangkat/golongan</th>
                                        <th>Satker</th>
                                        <th>Perangkat Daerah</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                        @foreach ($user as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ umur($d->nip) }}</td>
                                                <td>{{ konversiNIP($d->nip) }}</td>
                                                <td>
                                                    <a href="https://wa.me/62{{ substr($d->phone, 1) }}?text=Halo Ibu/Bapak {{ $d->name }}"
                                                        target="_blank" class="text-black-50">
                                                        {{ $d->phone }}
                                                    </a>
                                                </td>

                                                <td>{{ $d->jabatan }}</td>
                                                <td>{{ $d->pangkat }}</td>
                                                <td>{{ $d->satker }}</td>
                                                <td>{{ $d->pd }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-danger btn-xsm dbutton"
                                                        data-quantity="{{ $d->id }}|{{ $d->name }}|{{ $d->nip }}"
                                                        data-bs-toggle="modal" data-bs-target="#del">
                                                        <i class="uil-trash-alt"></i> hapus
                                                    </button>
                                                    @mobile()
                                                    <script>
                                                        $('.dbutton').click(function() {
                                                            var data = $(this).data('quantity').split('|');
                                                            $('.d-id').val(data[0]);
                                                            $('.d-name').val(data[1]);
                                                            $('.d-nip').val(data[2]);
                                                            $('#alasan').val('Pensiun');
                                                        });

                                                    </script>
                                                    @endmobile()
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

            @include('components.superadmin.modal.pegawai-del')

        </x-slot>

        <x-slot name="script">
            <script>
                $(document).ready(function() {
                    "use strict";
                    var a = $("#datatable-buttons").DataTable({
                        order: [
                            [0, 'asc']
                        ],
                        lengthChange: !1,
                        filter: !1,
                        searching: 1,
                        pageLength: 20,
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
                                    window.open(
                                        "{{ route('superadmin.pegawai') }}",
                                        "_self");
                                }
                            },
                            {
                                extend: 'collection',
                                text: 'Usia',
                                buttons: [{
                                        text: '58 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '58') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '59 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '59') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '60 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '60') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '61 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '61') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '62 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '62') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '63 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '63') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '64 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '64') }}",
                                                "_self");
                                        }
                                    },
                                    {
                                        text: '65 Tahun',
                                        action: function(e, dt, node, config) {
                                            window.open(
                                                "{{ route('superadmin.pensiun', '65') }}",
                                                "_self");
                                        }
                                    },
                                ]
                            },

                            {
                                extend: 'colvis',
                                @desktop()
                                text: 'Kolom',
                                className: 'btn-rounded-e',
                                @enddesktop()
                                @mobile()
                                text: '<i class="mdi mdi-table-eye"></i>',
                                className: 'mb-1',
                                @endmobile()
                            },
                        ],
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
                            infoFiltered: "(dari total _MAX_ data)",
                            infoEmpty: "Data tidak ditemukan",
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
                    });
                    a.buttons('.searchbt')
                        .nodes()
                        .attr('data-bs-toggle', 'modal');
                    a.buttons('.searchbt')
                        .nodes()
                        .attr('data-bs-target', '#search');
                });

            </script>
            @desktop()
            <script>
                $('.dbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('.d-id').val(data[0]);
                    $('.d-name').val(data[1]);
                    $('.d-nip').val(data[2]);
                    $('#alasan').val('Pensiun');
                });

            </script>
            @enddesktop()

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
            <script>
                function success() {
                    if (document.getElementById("name").value === "" && document.getElementById("nip" === "")) {
                        document.getElementById('cari').disabled = true;
                    } else {
                        document.getElementById('cari').disabled = false;
                    }
                }

                function onlyName() {
                    document.getElementById("nip").value = null;
                    document.getElementById("name").required = true;
                    document.getElementById("nip").required = false;
                }

                function onlyNip() {
                    document.getElementById("name").value = null;
                    document.getElementById("nip").required = true;
                    document.getElementById("name").required = false;
                }

            </script>
        </x-slot>

    </x-superadminwide-layout>
