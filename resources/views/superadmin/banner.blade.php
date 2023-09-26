<x-superadmin-layout>
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
        {{ __('Dashboard Superadmin - Edit Banner') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit banner</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Edit Banner Login') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar Banner </h4>
                        <div>
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                data-bs-target="#new">
                                <i class="mdi mdi-plus-circle me-2"></i> Tambah Banner
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped mb-0 dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th style="width:2%">#</th>
                                        <th data-priority="0">File</th>
                                        <th data-priority="2">Tampil</th>
                                        <th>Waktu</th>
                                        <th data-priority="1" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $i => $d)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>
                                                @mobile() {{ shortLink($d->img, 23, 10, 5) }} @endmobile()
                                                @desktop() {{ shortLink($d->img, 50, 30, 5) }} @enddesktop()
                                            </td>
                                            <td>
                                                @if ($d->aktif == 1)
                                                    Ya
                                                @else
                                                    Tidak
                                                @endif
                                            </td>
                                            <td> {{ $d->time }} detik</td>
                                            <td class="text-center">
                                                <form action="{{ route('superadmin.banner.delete') }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="button" class="btn btn-info btn-xsm pbutton"
                                                        data-quantity="{{ $d->id }}|{{ $d->img }}"
                                                        data-bs-toggle="modal" data-bs-target="#pdf">
                                                        <i class="mdi mdi-eye"></i>
                                                        @desktop() preview @enddesktop()
                                                        @mobile() lihat @endmobile()

                                                    </button>
                                                    <button type="button" class="btn btn-success btn-xsm ebutton"
                                                        data-quantity="{{ $d->id }}|{{ $d->time }}|{{ $d->aktif }}|{{ $d->img }}"
                                                        data-bs-toggle="modal" data-bs-target="#edit">
                                                        <i class="uil-pen"></i>
                                                        edit
                                                    </button>
                                                    {{--  --}}
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <button class="btn btn-danger btn-xsm yes_alert" type="submit">
                                                        <i class="uil-trash-alt"></i>
                                                        @desktop() hapus @enddesktop()
                                                        @mobile() del @endmobile()
                                                    </button>
                                                </form>

                                                @mobile()
                                                {{-- js harus ikut di looping, kalau terhidden gak aktif, eh... --}}
                                                <script>
                                                    $('.pbutton').click(function() {
                                                        var data = $(this).data('quantity').split('|');
                                                        $('#preview').attr('src', '../upload/' + data[1]);
                                                    });
                                                    //
                                                    $('.ebutton').click(function() {
                                                        var data = $(this).data('quantity').split('|');
                                                        $('#idx').val(data[0]);
                                                        $('.timex').val(data[1]);
                                                        $('#namafile').val(data[3]);
                                                    });
                                                    // 
                                                    $('.yes_alert').on('click', function(e) {
                                                        e.preventDefault();
                                                        var form = $(this).parents('form');
                                                        Swal.fire({
                                                            title: 'Anda yakin?',
                                                            text: "File gambar banner akan dihapus dan tidak tampil kembali.",
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
                                                {{-- js end here --}}
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


        @include('components.superadmin.modal.img_preview')
        @include('components.superadmin.modal.banner-new')
        @include('components.superadmin.modal.banner-edit')

    </x-slot>

    <x-slot name="script">
        <script>
            $(document).ready(function() {
                "use strict";
                var a = $("#datatable-buttons").DataTable({
                    lengthChange: !1,
                    searching: 1,
                    pageLength: 10,
                    // bPaginate: !1,
                    // filter: !1,
                    // info: !1,
                    sDom: '<"top">rt<"bottom"l>p<"clear">',
                    //buttons: ["copy", "print", "excel"],
                    //buttons: ["print", "excel","colvis"],
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
                    columnDefs: [{
                        targets: [0],
                        visible: true
                    }, {
                        targets: [2],
                        visible: true
                    }, {
                        targets: [3],
                        visible: true
                    }],
                    language: {
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
                $(window).on('load', function() {
                    $('#new').modal('show');
                    $('#newform').addClass('was-validated')
                });

            </script>
        @endif

        @desktop() {{-- js harus ikut di looping, kalau terhidden gak aktif, eh... --}}
        <script>
            $('.pbutton').click(function() {
                var data = $(this).data('quantity').split('|');
                $('#preview').attr('src', '../upload/' + data[1]);
            });
            //
            $('.ebutton').click(function() {
                var data = $(this).data('quantity').split('|');
                $('#idx').val(data[0]);
                $('.timex').val(data[1]);
                $('#namafile').val(data[3]);
            });
            // 
            $('.yes_alert').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "File gambar banner akan dihapus dan tidak tampil kembali.",
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
        {{-- js end here --}}
        @enddesktop()
    </x-slot>

</x-superadmin-layout>
