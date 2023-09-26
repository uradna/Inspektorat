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

            table.dataTable>tbody>tr.child span.dtr-title {
                min-width: 180px !important;
                max-width: 700px !important;
            }

        </style>
    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin - Laporan Gratifikasi') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan Gratifikasi</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Laporan Gratifikasi') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data Laporan Gratifikasi</h4>

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th width="1%">#id</th>
                                        <th data-priority="2">Tanggal Lapor</th>
                                        <th data-priority="0">Nama</th>
                                        <th>NIP</th>
                                        <th data-priority="3">No. HP</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Pangkat/Golongan</th>
                                        <th data-priority="4">Perangkat Daerah</th>
                                        <th>Satker</th>
                                        <th>Nama Pemberi</th>
                                        <th>Alamat Pemberi</th>
                                        <th>Hubungan Pemberi</th>
                                        <th>Tanggal Penerimaan</th>
                                        <th>PD Saat Menerima</th>
                                        <th>Satker Saat Menerima</th>
                                        <th>Jenis Gratifikasi</th>
                                        <th>Bentuk Gratifikasi</th>
                                        <th>Nilai Gratifikasi</th>
                                        <th>Alasan Gratifikasi</th>
                                        <th data-priority="1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @php($i = 1) --}}
                                    @foreach ($data as $d)
                                        <tr>
                                            <td class="text-center">{{ $d->id }}</td>
                                            <td>{{ dateFromTimestamp($d->created_at) }}</td>
                                            <td>{{ $d->user->name }}</td>

                                            <td>{{ $d->user->nip }}</td>

                                            <td>
                                                <a href="https://wa.me/62{{ substr($d->user->phone, 1) }}?text=Halo Ibu/Bapak {{ $d->user->name }}"
                                                    target="_blank" class="text-black-50">
                                                    {{ $d->user->phone }}
                                                </a>
                                            </td>
                                            <td>{{ $d->user->email }}</td>
                                            <td>{{ $d->user->jabatan }}</td>
                                            <td>{{ $d->user->pangkat }}</td>
                                            <td>{{ $d->user->pd }}</td>
                                            <td>{{ $d->user->satker }}</td>
                                            <th>{{ $d->pemberi }}</th>
                                            <th>{{ $d->alamat }}</th>
                                            <th>{{ $d->hubungan }}</th>
                                            <th>{{ $d->tanggal }}</th>
                                            <th>{{ $d->pd }}</th>
                                            <th>{{ $d->satker }}</th>
                                            <th>{{ $d->jenis }}</th>
                                            <th>{{ $d->bentuk }}</th>
                                            <th>Rp. {{ number_format($d->nilai, 0, ',', '.') }}</th>


                                            <th>{{ $d->alasan }} </th>
                                            <td width="10%">
                                                <button type="button" class="btn btn-info btn-xsm ebutton"
                                                    data-quantity="{{ $d->id }}|{{ $d->user->name }}|{{ konversiNIP($d->user->nip) }}|{{ $d->user->email }}|{{ $d->user->phone }}|{{ $d->user->pd }}|{{ $d->user->satker }}|{{ $d->user->jabatan }}|{{ $d->user->pangkat }}|{{ $d->pemberi }}|{{ $d->alamat }}|{{ $d->hubungan }}|{{ konversiTanggal($d->tanggal) }}|{{ $d->jenis }}|{{ $d->bentuk }}|{{ number_format($d->nilai, 0, ',', '.') }}|{{ $d->alasan }}|{{ route('lapor.pdf', $d->id) }}|{{ $d->pd }}|{{ $d->satker }}"
                                                    data-bs-toggle="modal" data-bs-target="#edit">
                                                    <i class="mdi mdi-eye"></i> @desktop() detail @enddesktop()
                                                </button>
                                                <a href="{{ route('lapor.pdf', $d->id) }}"
                                                    class="btn btn-xsm btn-secondary">
                                                    <i class="uil-down-arrow"></i> @desktop() pdf @enddesktop()
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

        {{--  --}}
        {{-- MODAL EDIT --}}
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header"
                        style="border-bottom:  1px solid #dee2e6; margin-bottom:5px; padding-bottom:10px;">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Detail Laporan Gratifikasi
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            id="dise"></button>
                    </div>
                    <div class="modal-body">

                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="py-0">
                                    <h5 class="mt-0 pt-0">Data Pegawai</h5>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%" class=" py-0">Nama Lengkap</td>
                                <td width="1%" class="px-0 mx-0 py-0">:</td>
                                <td id="name" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">NIP</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="nip" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Nomor Telepon / HP</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="phone" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Alamat E-mail</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="email" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Perangkat Daerah</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="pd" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Satuan Kerja / Bidang</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="satker" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Jabatan</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="jabatan" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Pangkat / Golongan</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="pangkat" class="ms-0 ps-1  py-0"></td>
                            </tr>
                        </table>


                        <table class="table table-borderless">
                            <tr>
                                <td colspan="2" class="py-0">
                                    <h5 class="mt-0 pt-0">Data Gratifikasi</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class=" py-0">Tanggal Penerimaan</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="tanggal" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">PD Saat Menerima</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="pd2" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Satker Saat Menerima</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="satker2" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td width="35%" class=" py-0">Nama Pemberi</td>
                                <td width="1%" class="px-0 mx-0 py-0">:</td>
                                <td id="pemberi" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Alamat Pemberi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="alamat" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Hubungan Penerima-Pemberi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="hubungan" class="ms-0 ps-1  py-0"></td>
                            </tr>

                            <tr>
                                <td class=" py-0">Jenis Gratifikasi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="jenis" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Bentuk Gratifikasi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="bentuk" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Nilai Gratifikasi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="nilai" class="ms-0 ps-1  py-0"></td>
                            </tr>
                            <tr>
                                <td class=" py-0">Alasan Gratifikasi</td>
                                <td class="px-0 mx-0  py-0">:</td>
                                <td id="alasan" class="ms-0 ps-1  py-0"></td>
                            </tr>
                        </table>

                        <div class="row g-2">
                            <div class="col-md-12 text-end">
                                <a id="printbutton" href="" class="btn btn-success me-2">
                                    <i class="mdi mdi-printer"></i> Print
                                </a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    <i class="uil-multiply"></i> Tutup
                                </button>
                            </div>
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
                    pageLength: 10,
                    // bPaginate: !1,
                    // filter: !1,
                    info: !0,
                    // sDom: '<"top">rt<"bottom"l>p<"clear">',
                    //buttons: ["copy", "print", "excel"],
                    // buttons: ["print", "excel", "colvis"],
                    buttons: [
                        //     {
                        //     @desktop()
                        //     text: '<i class="mdi mdi-menu-left"></i>Kembali',
                        //     @enddesktop()
                        //     @mobile()
                        //     text: '<i class="mdi mdi-step-backward"></i>',
                        //     className: 'mb-1',
                        //     @endmobile()
                        //     action: function(e, dt, node, config) {
                        //         window.open(
                        //             "{{ route('superadmin.dashboard') }}",
                        //             "_self");
                        //     }
                        // }, 
                        {
                            extend: 'print',
                            @mobile()
                            text: '<i class="mdi mdi-printer"></i>',
                            className: 'mb-1',
                            @endmobile()
                            title: 'Data Laporan Gratifikasi',
                            // exportOptions: {
                            //     columns: ':visible'
                            // }
                        }, {
                            extend: 'excel',
                            @mobile()
                            text: '<i class="mdi mdi-microsoft-excel"></i>',
                            className: 'mb-1',
                            @endmobile()
                            title: 'Data Laporan Gratifikasi',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16,
                                    17, 18
                                ]
                            }
                        }, {
                            extend: 'colvis',
                            @desktop()
                            text: 'Kolom',
                            @enddesktop()
                            @mobile()
                            text: '<i class="mdi mdi-table-eye"></i>',
                            className: 'mb-1',
                            @endmobile()
                        }
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

        <script>
            $('.ebutton').click(function() {
                var data = $(this).data('quantity').split('|');
                $('#id').html(data[0]);
                $('#name').html(data[1]);
                $('#nip').html(data[2]);
                $('#email').html(data[3]);
                $('#phone').html(data[4]);
                $('#pd').html(data[5]);
                $('#satker').html(data[6]);
                $('#jabatan').html(data[7]);
                $('#pangkat').html(data[8]);
                $('#pemberi').html(data[9]);
                $('#alamat').html(data[10]);
                $('#hubungan').html(data[11]);
                $('#tanggal').html(data[12]);
                $('#jenis').html(data[13]);
                $('#bentuk').html(data[14]);
                $('#nilai').html(data[15]);
                $('#alasan').html(data[16]);
                $('#printbutton').attr('href', data[17]);
                $('#pd2').html(data[18]);
                $('#satker2').html(data[19]);
            });
            // $('#dise').click(function() {
            //     $('.e-id').val('');
            //     $('.e-name').val('');
            //     $('.e-nip').val('');
            //     $('.e-email').val('');
            //     $('.e-phone').val('');
            //     $('.e-pd').val('');
            //     $('.e-satker').val('');
            // });

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
