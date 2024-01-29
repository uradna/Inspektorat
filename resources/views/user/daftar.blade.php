<x-user-layout>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Pernyataan Gratifikasi') }}
    </x-slot>

    <x-slot name="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
        <li class="breadcrumb-item active">Dashboard</li> --}}
    </x-slot>

    <x-slot name="header">
        {{ __('Pernyataan Gratifikasi') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data pengisian surat pernyataan </h4>
                        @if ($aktif != '0')
                            <div class="alert alert-primary alert-dismissible bg-dark text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <strong class="font-16">Perhatian!</strong><br>
                                Pengisian surat pernyataaan gratifikasi
                                <b class="text-warning">Tahun {{ $aktif->tahun }} Semester
                                    {{ $aktif->semester }}</b>
                                dibuka hingga tanggal<b class="text-warning">
                                    {{ konversiTanggal($aktif->akhir) }}</b>.<br class="mb-1">
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped mb-0 dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th style="width:2%">#</th> --}}
                                        <th data-priority="1">Tahun</th>
                                        <th data-priority="3">Dibuka hingga</th>
                                        <th>Status</th>
                                        <th data-priority="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwal as $i => $d)
                                        <tr>
                                            {{-- <td>{{ $i + 1 }}</td> --}}
                                            <td>{{ $d->tahun }} /
                                                @desktop
                                                    Semester
                                                @enddesktop
                                                @mobile
                                                    smt
                                                @endmobile
                                                {{ $d->semester }}
                                            </td>
                                            <td>
                                                @if (masihBuka($d->akhir))
                                                    {{ konversiTanggalPendek($d->akhir) }}
                                                @else
                                                    Sudah ditutup
                                                @endif
                                            </td>
                                            <td>{{ statusJadwal($d->status) }}</td>
                                            <td>
                                                @switch($d->status)
                                                    @case('0')
                                                        -
                                                    @break

                                                    @case('1')
                                                        <a href="{{ route('user.pdf', $d->pernyataan_id) }}"
                                                            class="btn btn-info btn-xsm">
                                                            <i class="uil-down-arrow"></i>
                                                            PDF </a>
                                                        {{-- <a class="btn btn-info btn-xsm"
                                                            onclick="window.frames['pact'].print();">
                                                            <i class="uil-print"></i>
                                                            Print </a>
                                                        <iframe name="pact"
                                                            src="{{ route('user.print', $d->pernyataan_id) }}" width="0"
                                                            height="0" frameborder="0"></iframe> --}}
                                                    @break

                                                    @case('2')
                                                        <a href="{{ route('user.pernyataan.biodata', $d->id) }}"
                                                            class="btn btn-success btn-xsm"> <i class="uil-pen"></i>
                                                            Isi pernyataan </a>
                                                    @break

                                                    @case('3')
                                                        -
                                                    @break
                                                @endswitch
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
        {{-- @foreach (session('p') as $x)
            {{ $x }}
        @endforeach --}}
        {{-- {{ dd(session('pernyataan')) }} --}}
        {{-- email = {{ session('p')['email'] }} --}}
        {{-- phone = {{ session('p')['phone'] }} --}}
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
                })
            });
        </script>


    </x-slot>

</x-user-layout>
