<x-superadminwide-layout>
    <x-slot name="style">
        <script src="{{ asset('js/ckeditor.js') }}"></script>
        <style>
            .ck.ck-content:not(.ck-comment__input *) {
                height: 300px;
                overflow-y: auto;
            }

        </style>
        @desktop()
        <style>
            span.dtr-title {
                display: inline-flex !important;
                min-width: 50px !important;
                vertical-align: top !important;
            }

            span.dtr-data {
                display: inline-block;
                /* max-width: 750px; */
                white-space: normal;
                padding-right: 20px;
                /* background-color: black; */
                /* word-break: normal; */

                /* word-break: normal;
                max-width: 250px; */

            }

        </style>
        @enddesktop()
        @mobile()
        <style>
            span.dtr-title {
                display: inline-flex !important;
                min-width: 50px !important;
                vertical-align: top !important;
            }

            span.dtr-data {
                display: inline-block;
                max-width: 250px;
                white-space: normal;
                padding-right: 20px;
            }

        </style>
        @endmobile()
    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin - Edit Bantuan') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Bantuan</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Bantuan') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar Bantuan - User @if ($u == 'user') Pegawai @else {{ $u }} @endif
                        </h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons"
                                class="table table-striped @mobile() dt-responsive nowrap w-100 @endmobile() ">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th data-priority="3" width="1%">#</th>
                                        <th data-priority="0" width="25%">Judul</th>
                                        <th>Isi</th>
                                        {{-- <th data-priority="2" width="15%">Urutan</th> --}}
                                        <th data-priority="1" style="width: 150px" class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($lastid = 0) @php($lastorder = 0)
                                    @foreach ($data as $d)

                                        <tr>
                                            <td class="text-center">{{ $d->order }}</td>
                                            {{-- <td></td> --}}
                                            <td>{{ $d->judul }}</td>
                                            <td>{!! $d->isi !!}</td>
                                            {{-- <td>id: {{ $d->id }}, order: {{ $d->order }}, lastid:
                                                {{ $lastid }}</td> --}}
                                            <td class="text-start">

                                                <form action="{{ route('superadmin.help.delete') }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <a href="{{ route('superadmin.help.edit', $d->id) }}"
                                                        class="btn btn-success btn-xsm ebutton">
                                                        <i class="uil-pen"></i> edit

                                                    </a>

                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <button class="btn btn-danger btn-xsm yes_alert" type="submit">
                                                        <i class="uil-trash-alt"></i>
                                                        hapus
                                                    </button>
                                                </form>
                                                @if ($d->order != 1)
                                                    <a href="{{ route('superadmin.help.up', [$d->id, $lastorder, $lastid, $d->order]) }}"
                                                        class="btn btn-xsm btn-secondary">
                                                        <i class="uil-arrow-up"></i></a>
                                                @endif
                                                @php($lastid = $d->id) @php($lastorder = $d->order)

                                                @mobile()
                                                <script>
                                                    $('.yes_alert').on('click', function(e) {
                                                        e.preventDefault();
                                                        var form = $(this).parents('form');
                                                        Swal.fire({
                                                            title: 'Anda yakin?',
                                                            text: "Data akan dihapus dan tidak akan tampil kembali.",
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

        @include('components.superadmin.modal.bantuan-add')
        @include('components.superadmin.modal.pegawai-edit')

    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    order: [
                        [0, 'asc']
                    ],
                    // buttons: [{
                    //     text: 'Jumlah pegawai saat ini :  pegawai',
                    //     className: 'btn btn-light pe-none',
                    // action: function(e, dt, node, config) {
                    //     window.open("https://www.w3schools.com", "_self");
                    // }
                    // }],

                    lengthChange: !1,
                    filter: !1,
                    searching: 1,
                    pageLength: 5,
                    // bPaginate: !1,
                    // filter: !1,
                    info: !0,
                    // sDom: '<"top">rt<"bottom"l>p<"clear">',
                    //buttons: ["copy", "print", "excel"],
                    // buttons: ["print", "excel", "colvis"],
                    buttons: [{
                            extend: 'collection',
                            text: 'Bantuan Untuk',
                            @desktop()
                            className: 'btn-rounded',
                            @enddesktop()
                            @mobile()
                            className: ' mb-1',
                            @endmobile()
                            buttons: [{
                                    text: 'User Pegawai',
                                    action: function(e, dt, node, config) {
                                        window.open(
                                            "{{ route('superadmin.help', 'user') }}",
                                            "_self");
                                    }
                                },
                                {
                                    text: 'User Admin',
                                    action: function(e, dt, node, config) {
                                        window.open(
                                            "{{ route('superadmin.help', 'admin') }}",
                                            "_self");
                                    }
                                },
                                {
                                    text: 'User Superadmin',
                                    action: function(e, dt, node, config) {
                                        window.open(
                                            "{{ route('superadmin.help', 'superadmin') }}",
                                            "_self");
                                    }
                                },

                            ]
                        },
                        // {
                        //     extend: 'print',
                        //     @mobile()
                        //     text: '<i class="mdi mdi-printer"></i>',
                        //     className: 'mb-1',
                        //     @endmobile()
                        //     title: '',
                        //     exportOptions: {
                        //         columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        //     }
                        // }, {
                        //     extend: 'excel',
                        //     @mobile()
                        //     text: '<i class="mdi mdi-microsoft-excel"></i>',
                        //     className: 'mb-1',
                        //     @endmobile()
                        //     title: '',
                        //     exportOptions: {
                        //         columns: [0, 1, 2, 3, 4, 5, 6, 7]
                        //     }
                        // }, 

                        {
                            @desktop()
                            text: '<i class="mdi mdi-plus-circle me-1"></i> Tambah Bantuan',
                            className: 'add-bt ms-2 btn-rounded btn-success',
                            @enddesktop()
                            @mobile()
                            text: '<i class="mdi mdi-plus-circle"></i>',
                            className: 'mb-1 add-bt btn-success',
                            @endmobile()
                            action: function(e, dt, node, config) {
                                window.open(
                                    "{{ route('superadmin.help.new', $u) }}",
                                    "_self");
                            }
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
                // a.buttons('.add-bt')
                //     .nodes()
                //     .attr('data-bs-toggle', 'modal');
                // a.buttons('.add-bt')
                //     .nodes()
                //     .attr('data-bs-target', '#add');
            });

        </script>
        @desktop()
        <script>
            $('.yes_alert').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Data akan dihapus dan tidak akan tampil kembali.",
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
