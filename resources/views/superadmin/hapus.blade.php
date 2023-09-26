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
        {{ __('Permintaan Penghapusan Pegawai') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pegawai') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item active">Permintaan Penghapusan</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Permintaan Penghapusan Data Pegawai</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th width="1%">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th>NIP</th>
                                        <th>No. HP</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Jabatan</th>
                                        <th>Pangkat/golongan</th>
                                        <th>Satker</th>
                                        <th data-priority="3">Perangkat Daerah</th>
                                        <th data-priority="2">Alasan</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                        @foreach ($hasil as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td>{{ $d->user->name }}</td>
                                                <td>{{ konversiNIP($d->user->nip) }}</td>
                                                <td>
                                                    <a href="https://wa.me/62{{ substr($d->user->phone, 1) }}?text=Halo Ibu/Bapak {{ $d->user->name }}"
                                                        target="_blank" class="text-black-50">
                                                        {{ $d->user->phone }}
                                                    </a>
                                                </td>
                                                {{-- <td>{{ $d->user->email }}</td> --}}
                                                <td>{{ $d->user->jabatan }}</td>
                                                <td>{{ $d->user->pangkat }}</td>
                                                <td>{{ $d->user->satker }}</td>
                                                <td>{{ $d->user->pd }}</td>
                                                <td>{{ $d->alasan }}</td>
                                                <td class="text-center">
                                                    <form action="{{ route('superadmin.hapus.setuju') }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        <button type="button" class="btn btn-info btn-xsm pbutton"
                                                            data-quantity="{{ $d->file }}|{{ $d->user->name }}"
                                                            data-bs-toggle="modal" data-bs-target="#pdf">
                                                            <i class="mdi mdi-eye"></i>
                                                            file
                                                        </button>

                                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                                        <button type="button" class="btn btn-success btn-xsm yes_alert">
                                                            <i class="mdi mdi-check"></i>
                                                            @desktop() setuju @enddesktop() @mobile() ok @endmobile()
                                                        </button>

                                                        <button type="button" class="btn btn-danger btn-xsm dbutton"
                                                            data-quantity="{{ $d->id }}|{{ $d->user->name }}|{{ $d->user->nip }}"
                                                            data-bs-toggle="modal" data-bs-target="#del">
                                                            <i class="mdi mdi-close"></i>
                                                            tolak
                                                        </button>
                                                    </form>
                                                    @mobile()

                                                    <script>
                                                        $('.pbutton').click(function() {
                                                            var data = $(this).data('quantity').split('|');
                                                            $('#file').attr('data', '../pdf/' + data[0]);
                                                            $('#link').attr('href', '../pdf/' + data[0]);
                                                            $('#pdftitle').html(
                                                                'File Permintaan Penghapusan Pegawai : ' + data[
                                                                    1]);
                                                        });
                                                        $('.dbutton').click(function() {
                                                            var data = $(this).data('quantity').split('|');
                                                            $('.d-id').val(data[0]);
                                                            $('.d-name').val(data[1]);
                                                            $('.d-nip').val(data[2]);
                                                            $('.d-file').val('');
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

            @include('components.superadmin.modal.pegawai-hapus')
            @include('components.superadmin.modal.pdf')

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
                                text: '<i class="mdi mdi-file-remove-outline"></i> Permintaan Ditolak',
                                className: '',
                                @enddesktop()
                                @mobile()
                                text: '<i class="mdi mdi-file-remove-outline"></i>',
                                className: 'mb-1',
                                @endmobile()
                                action: function(e, dt, node, config) {
                                    window.open("{{ route('superadmin.hapus.reject') }}",
                                        "_self");
                                }
                            },
                            {
                                @desktop()
                                text: '<i class="mdi mdi-account-multiple-remove"></i> User Terhapus',
                                className: '',
                                @enddesktop()
                                @mobile()
                                text: '<i class="mdi mdi-account-multiple-remove"></i>',
                                className: 'mb-1',
                                @endmobile()
                                action: function(e, dt, node, config) {
                                    window.open("{{ route('superadmin.hapus.user') }}",
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
                $('.pbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('#file').attr('data', '../pdf/' + data[0]);
                    $('#link').attr('href', '../pdf/' + data[0]);
                    $('#pdftitle').html(
                        'File Permintaan Penghapusan Pegawai : ' + data[
                            1]);
                });
                $('.dbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('.d-id').val(data[0]);
                    $('.d-name').val(data[1]);
                    $('.d-nip').val(data[2]);
                    $('.d-file').val('');
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
