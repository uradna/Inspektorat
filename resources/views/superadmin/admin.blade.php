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

            select option:first-child {
                display: none;
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
        {{ __('Dashboard Superadmin - Data Admin') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit User Admin</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Admin') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar User Admin</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="2" width="1%">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th>Username</th>
                                        <th>Perangkat Daerah</th>
                                        <th>Hak Akses</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                        @foreach ($user as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $d->name }}</td>
                                                <td>{{ $d->username }}</td>
                                                <td>{{ $d->pd }}</td>
                                                <td>
                                                    @if ($d->level == 1)
                                                        Admin
                                                    @elseif ($d->level == 2)
                                                        Superadmin
                                                    @endif
                                                </td>
                                                <td class="text-center">

                                                    <button type="button" class="btn btn-info btn-xsm pbutton"
                                                        data-quantity="{{ $d->id }}|{{ $d->name }}|{{ $d->pd }}|{{ $d->username }}"
                                                        data-bs-toggle="modal" data-bs-target="#pass">
                                                        <i class="uil-key-skeleton"></i> password
                                                    </button>

                                                    <form action="{{ route('superadmin.admin.del') }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                                        <button type="submit" class="btn btn-danger btn-xsm yes_alert">
                                                            <i class="uil-trash-alt"></i> hapus
                                                        </button>
                                                    </form>

                                                    @mobile()
                                                    <script>
                                                        $('.pbutton').click(function() {
                                                            var data = $(this).data('quantity').split('|');
                                                            $('#p-id').val(data[0]);
                                                            $('#p-name').val(data[1]);
                                                            $('#p-pd').val(data[2]);
                                                            $('#p-user').val(data[3]);
                                                            $('#password').val('');
                                                        });

                                                        $('.yes_alert').on('click', function(e) {
                                                            e.preventDefault();
                                                            var form = $(this).parents('form');
                                                            Swal.fire({
                                                                title: 'Anda yakin?',
                                                                text: "Data user akan terhapus dan tidak bisa login kembali!",
                                                                icon: 'warning',
                                                                iconColor: '#fa5c7c',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#39afd1',
                                                                cancelButtonColor: '#dadee2',
                                                                confirmButtonText: 'Ya, hapus!!',
                                                                cancelButtonText: 'Batal',
                                                                reverseButtons: true
                                                            }).then((result) => {
                                                                if (result.value) {

                                                                    form.submit();
                                                                }
                                                            });
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

            @include('components.superadmin.modal.admin-add')
            @include('components.superadmin.modal.admin-password')

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
                            text: '<i class="mdi mdi-plus-circle me-1"></i> Tambah Admin',
                            className: 'add-bt btn-rounded btn-success',
                            @enddesktop()
                            @mobile()
                            text: '<i class="mdi mdi-plus-circle"></i>',
                            className: 'mb-1 add-bt btn-success',
                            @endmobile()
                        }, ],
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
                    a.buttons('.add-bt')
                        .nodes()
                        .attr('data-bs-toggle', 'modal');
                    a.buttons('.add-bt')
                        .nodes()
                        .attr('data-bs-target', '#add');
                });

            </script>
            @desktop()
            <script>
                $('.pbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('#p-id').val(data[0]);
                    $('#p-name').val(data[1]);
                    $('#p-pd').val(data[2]);
                    $('#p-user').val(data[3]);
                    $('#password').val('');
                });

                $('.yes_alert').on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: "Data user akan terhapus dan tidak bisa login kembali!",
                        icon: 'warning',
                        iconColor: '#fa5c7c',
                        showCancelButton: true,
                        confirmButtonColor: '#39afd1',
                        cancelButtonColor: '#dadee2',
                        confirmButtonText: 'Ya, hapus!!',
                        cancelButtonText: 'Batal',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {

                            form.submit();
                        }
                    });
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
        </x-slot>

    </x-superadminwide-layout>
