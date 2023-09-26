<x-superadmin-layout>
    <x-slot name="title">
        {{ __('Dashboard Superadmin - Pegawai') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pegawai</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar Perangkat Daerah </h4>


                        {{-- <div>
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                data-bs-target="#search">
                                <i class="mdi mdi-plus-circle me-2"></i> Tambah Jadwal
                            </button>
                        </div> --}}
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped mb-0 dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="3" style="width:2%">#</th>
                                        <th data-priority="0">Perangkat Daerah</th>
                                        @mobile() <th>Nama</th> @endmobile()

                                        <th class="text-center">Jumlah Pegawai</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($perangkat as $i => $d)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>@desktop() {{ $d->nama }} @elsedesktop()
                                                {{ str_replace('Dinas', 'Din.', str_replace('Kecamatan', 'Kec.', str_replace('Bagian', 'Bag.', $d->nama))) }}
                                                @enddesktop() </td>
                                            @mobile() <td>{{ $d->nama }}</td> @endmobile()
                                            <td class="text-center">{{ $d->total }} </td>
                                            <td class="text-center">
                                                <a href="{{ route('superadmin.pegawai.pd', $d->nama) }}"
                                                    class="btn btn-info btn-xsm">
                                                    <i class="mdi mdi-eye"></i>
                                                    @desktop() Lihat @enddesktop()
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

        @include('components.superadmin.modal.pegawai-search')
        @include('components.superadmin.modal.pegawai-add')

    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    @mobile()
                    columnDefs: [{
                        targets: 1,
                        render: function(data, type, row) {
                            return data.length > 20 ?
                                data.substr(0, 20) + '…' :
                                data;
                        }
                    }],
                    @endmobile()
                    lengthChange: !1,
                    searching: 1,
                    pageLength: 20,
                    buttons: [{
                            @desktop()
                            text: '<i class="mdi mdi-account-search"></i> Pencarian Pegawai',
                            className: 'searchbt btn-rounded-e',
                            @enddesktop()
                            @mobile()
                            text: '<i class="mdi mdi-account-search"></i>',
                            className: 'mb-1 searchbt',
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
                        // {
                        //     extend: 'collection',
                        //     text: 'Table control',
                        //     buttons: [{
                        //             text: 'Toggle start date',
                        //             action: function(e, dt, node, config) {
                        //                 window.open(
                        //                     "{{ route('superadmin.pegawai') }}",
                        //                     "_self");
                        //             }
                        //         },
                        //         {
                        //             text: 'Toggle salary',
                        //             action: function(e, dt, node, config) {
                        //                 window.open(
                        //                     "{{ route('superadmin.pegawai') }}",
                        //                     "_self");
                        //             }
                        //         }
                        //     ]
                        // }
                    ],
                    // bPaginate: !1,
                    // filter: !1,
                    info: !1,
                    // sDom: '<"top">rt<"bottom"l>p<"clear">',
                    // buttons: ["copy", "print", "excel"],
                    // buttons: ["print", "excel", "colvis"],
                    // buttons: [{
                    //     extend: 'print'
                    // }, {
                    //     extend: 'excel'
                    // }, {
                    //     extend: 'colvis',
                    //     text: 'Kolom'
                    // }],
                    order: [
                        [0, "asc"]
                    ],
                    // columnDefs: [{
                    //     targets: [0],
                    //     visible: true
                    // }, {
                    //     targets: [2],
                    //     visible: true
                    // }, {
                    //     targets: [3],
                    //     visible: true
                    // }],
                    language: {
                        paginate: {
                            previous: "<i class='mdi mdi-chevron-left'>",
                            next: "<i class='mdi mdi-chevron-right'>"
                        }
                    },
                    language: {
                        // lengthMenu: "Menampilkan _MENU_ pegawai per halaman",
                        @desktop()
                        search: "Pencarian",
                        @enddesktop()
                        @mobile()
                        search: "",
                        searchPlaceholder: "Pencarian",
                        @endmobile()
                        info: "Menampilkan data ke _START_ sampai _END_ dari _TOTAL_ total data",
                        infoFiltered: "(dari total _MAX_ data)",
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
                a.buttons('.add-bt')
                    .nodes()
                    .attr('data-bs-toggle', 'modal');
                a.buttons('.add-bt')
                    .nodes()
                    .attr('data-bs-target', '#add');
            });

        </script>

        @if ($errors->any())
            <script type="text/javascript">
                $(window).on('load', function() {
                    $('#new').modal('show');
                });

            </script>
        @endif

        <script>
            $('.delete_alert').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Jadwal yang ditutup tidak bisa dibuka kembali!",
                    icon: 'warning',
                    iconColor: '#fa5c7c',
                    showCancelButton: true,
                    confirmButtonColor: '#39afd1',
                    cancelButtonColor: '#dadee2',
                    confirmButtonText: 'Ya, Tutup!!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {

                        form.submit();
                    }
                });
            });

        </script>

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

</x-superadmin-layout>
