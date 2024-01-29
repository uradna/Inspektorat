<x-superadmin-layout>
    <x-slot name="title">
        {{ __('Dashboard Superadmin - Jadwal') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Jadwal</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Jadwal Pengisian') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Daftar Jadwal </h4>
                        @if (jadwalStatus($aktif->status))
                            <div class="alert alert-primary alert-dismissible bg-dark text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong class="font-16">Perhatian!</strong><br>
                                Pengisian surat pernyataaan gratifikasi
                                <b class="text-warning">Tahun {{ $aktif->tahun }} Semester
                                    {{ $aktif->semester }}</b>
                                dibuka hingga tanggal<b class="text-warning">
                                    {{ konversiTanggal($aktif->akhir) }}</b>.<br>

                                Jadwal pengisian dapat ditambah jika jadwal pengisian terakhir sudah ditutup.
                                <br class="mb-1">
                            </div>
                        @endif

                        <div>
                            <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                {{-- data-bs-target="#new" @if (jadwalStatus($aktif->status)) disabled @endif> --}}
                                data-bs-target="#new">
                                <i class="mdi mdi-plus-circle me-2"></i> Tambah Jadwal
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped mb-0 dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th style="width:2%">#</th> --}}
                                        <th data-priority="0">Tahun</th>
                                        <th data-priority="2">Dibuka hingga</th>
                                        <th>Status</th>
                                        <th data-priority="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $i => $d)
                                        <tr>
                                            {{-- <td>{{ $i + 1 }}</td> --}}
                                            <td>

                                                {{ $d->tahun }} /
                                                @desktop
                                                    Semester
                                                @enddesktop
                                                @mobile
                                                    smt
                                                @endmobile
                                                {{ $d->semester }}
                                            </td>
                                            <td>
                                                {{-- @if (masihBuka($d->akhir)) --}}
                                                {{ konversiTanggalPendek($d->akhir) }}
                                                {{-- @else
                                                    Sudah ditutup
                                                @endif --}}
                                            </td>
                                            <td>
                                                @if (masihBuka($d->akhir))
                                                    Berlangsung
                                                @else
                                                    @if (jadwalStatus($d->status))
                                                        Berakhir
                                                    @else
                                                        Sudah ditutup
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if (jadwalStatus($d->status))
                                                    <form action="{{ route('superadmin.jadwal.close') }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="button" class="btn btn-success btn-xsm btn_edit"
                                                            data-bs-toggle="modal" data-bs-target="#edit"
                                                            data-id="{{ $d->id }}"
                                                            data-akhir="{{ $d->akhir }}"
                                                            data-tahun="{{ $d->tahun }}"
                                                            data-semester="{{ $d->semester }}">
                                                            <i class="uil-pen"></i>
                                                            Edit
                                                        </button>
                                                        {{--  --}}
                                                        <input type="hidden" name="id" value="{{ $d->id }}">
                                                        <button class="btn btn-danger btn-xsm delete_alert"
                                                            type="submit">
                                                            <i class="uil-folder-lock"></i>
                                                            Tutup
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="{{ route('superadmin.pernyataan.jadwal', [$d->id]) }}"
                                                        class="btn btn-info btn-xsm">
                                                        <i class="mdi mdi-eye"></i>
                                                        Lihat
                                                    </a>
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

        {{-- MODAL NEW JADWAL --}}
        {{-- @if (!jadwalStatus($aktif->status)) --}}
        @include('components.superadmin.modal.jadwal-add')
        {{-- @endif --}}
        {{-- @if (jadwalStatus($aktif->status)) --}}
        @include('components.superadmin.modal.jadwal-edit')
        {{-- @endif --}}
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
                        [0, "desc"]
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
                });

                a.on('click', '.btn_edit', function(e) {
                    // @notmobile()
                    // let id = $(this).closest('tr').attr('id');
                    // @elsenotmobile()
                    // let id = $(this).closest('tr').prev().attr('id');
                    // @endnotmobile()
                    // let all_data = a.rows().data();
                    // let result = $.grep(all_data, function(e) {
                    //     return e.DT_RowId == id;
                    // });
                    // let data = result[0];

                    $('#e-id').val($(this).data('id'));
                    $('#eakhir').val($(this).data('akhir'));
                    $('#etahun').val($(this).data('tahun'));
                    $('#esemester').val($(this).data('semester'));
                    // $('.e-name').val(data['name']);
                    // $('.e-nip').val(data['nip']);
                    // $('.e-email').val(data['email']);
                    // $('.e-phone').val(data['phone']);
                    // $('.e-pd').val(data['pd']);
                    // $('.e-satker').val(data['satker']);
                    // alert($(this).data('id'));
                    // alert($(this).data('id'));
                });
            });
        </script>

        @if ($errors->any())
            <script type="text/javascript">
                $(window).on('load', function() {
                    @if (old('eakhir'))
                        $('#edit').modal('show');
                    @else
                        $('#new').modal('show');
                    @endif

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
    </x-slot>

</x-superadmin-layout>
