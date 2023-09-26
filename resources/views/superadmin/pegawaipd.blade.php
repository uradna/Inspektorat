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
        {{ __('Dashboard Superadmin - Data Pegawai') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pegawai') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active">{{ truncate($pd) }}</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Edit Data Pegawai - {{ $pd }}</h4>


                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="2" width="1%">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th>NIP</th>
                                        <th>No. HP</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Jabatan</th>
                                        <th>Pangkat/golongan</th>
                                        <th>Satker</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
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

        @include('components.superadmin.modal.pegawai-add')
        @include('components.superadmin.modal.pegawai-del')
        @include('components.superadmin.modal.pegawai-password')
        @include('components.superadmin.modal.pegawai-edit')

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
                    ajax: "{{ route('superadmin.pegawai.pd.ajax', $pd) }}",
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
                            data: 'pangkat',
                            targets: 5
                        },
                        {
                            data: 'satker',
                            targets: 6
                        },
                        {
                            data: null,
                            defaultContent: '<button type="button" class="btn btn-success btn-xsm ebutton" data-bs-toggle="modal" data-bs-target="#edit"> <i class="uil-pen"></i> edit </button> <button type="button" class="btn btn-info btn-xsm pbutton" data-bs-toggle="modal" data-bs-target="#pass"><i class="uil-key-skeleton"></i> password </button> <button type="button" class="btn btn-danger btn-xsm dbutton" data-bs-toggle="modal" data-bs-target="#del"> <i class="uil-trash-alt"></i> hapus </button>',
                            targets: 7
                        }
                    ],
                    lengthChange: !1,
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
                        {
                            @desktop()
                            text: '<i class="mdi mdi-plus-circle me-1"></i> Tambah Pegawai',
                            className: 'add-bt ms-2 btn-rounded btn-success',
                            @enddesktop()
                            @mobile()
                            text: '<i class="mdi mdi-plus-circle"></i>',
                            className: 'mb-1 add-bt btn-success',
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
                        paginate: {
                            previous: "<i class='mdi mdi-chevron-left'>",
                            next: "<i class='mdi mdi-chevron-right'>"
                        }
                    },
                    drawCallback: function() {
                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                        $(".dataTables_paginate > .pagination > .active > .page-link ").addClass(
                            "bg-secondary");
                    },
                    deferRender: true,
                });
                a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(
                    "#alternative-page-datatable").DataTable({
                    pagingType: "full_numbers",
                    drawCallback: function() {
                        $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                    }
                });
                a.buttons('.add-bt')
                    .nodes()
                    .attr('data-bs-toggle', 'modal');
                a.buttons('.add-bt')
                    .nodes()
                    .attr('data-bs-target', '#add');

                a.on('click', '.pbutton', function(e) {

                    @notmobile()
                    let id = $(this).closest('tr').attr('id');
                    @elsenotmobile()
                    let id = $(this).closest('tr').prev().attr('id');
                    @endnotmobile()
                    let all_data = a.rows().data();
                    let result = $.grep(all_data, function(e) {
                        return e.DT_RowId == id;
                    });
                    let data = result[0];

                    $('#p-id').val(data['id']);
                    $('#p-name').val(data['name']);
                    $('#p-nip').val(data['nip']);
                    $('#password').val('');
                    $('#confirmPassword').val('');
                });

                a.on('click', '.ebutton', function(e) {

                    @notmobile()
                    let id = $(this).closest('tr').attr('id');
                    @elsenotmobile()
                    let id = $(this).closest('tr').prev().attr('id');
                    @endnotmobile()
                    let all_data = a.rows().data();
                    let result = $.grep(all_data, function(e) {
                        return e.DT_RowId == id;
                    });
                    let data = result[0];

                    $('.e-id').val(data['id']);
                    $('.e-name').val(data['name']);
                    $('.e-nip').val(data['nip']);
                    $('.e-email').val(data['email']);
                    $('.e-phone').val(data['phone']);
                    $('.e-pd').val(data['pd']);
                    $('.e-satker').val(data['satker']);
                });

                a.on('click', '.dbutton', function(e) {

                    @notmobile()
                    let id = $(this).closest('tr').attr('id');
                    @elsenotmobile()
                    let id = $(this).closest('tr').prev().attr('id');
                    @endnotmobile()
                    let all_data = a.rows().data();
                    let result = $.grep(all_data, function(e) {
                        return e.DT_RowId == id;
                    });
                    let data = result[0];

                    $('.d-id').val(data['id']);
                    $('.d-name').val(data['name']);
                    $('.d-nip').val(data['nip']);
                    $('#alasan').val('');
                    $('.d-file').val('');
                });

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
