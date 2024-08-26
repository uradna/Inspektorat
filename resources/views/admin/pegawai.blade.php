<x-adminwide-layout>
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
        {{ __('Admin Gratifikasi Online - Edit Pegawai') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Data Pegawai</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai - ' . Auth::user()->pd) }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Edit Data Pegawai</h4>


                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        <th data-priority="1">Nama</th>
                                        <th data-priority="3">NIP</th>
                                        <th data-priority="4">No. HP</th>
                                        <th>Jabatan</th>
                                        <th>Penempatan</th>
                                        <th data-priority="2" class="text-center">Aksi</th>
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

        {{-- ---------------------------------------------- MODAL-START ---------------------------------------------------- --}}

        {{-- MODAL delete --}}
        <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Hapus data pegawai
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            id="disd"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" method="POST"
                            action="{{ route('admin.pegawai.delete') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="d-id" name="user_id">
                            <div class="row">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating">
                                        <x-input-float :id="__('name')" type="text" class="d-name" readonly disabled />
                                        <x-label-float :value="__('Nama Lengkap')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating">
                                        <x-input-float :id="__('nip')" type="text" class="d-nip" readonly disabled />
                                        <x-label-float :value="__('NIP')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating">
                                        <x-input-float :id="__('alasan')" type="text" class="bg-white" required />
                                        <x-label-float :value="__('Alasan')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating mb-1">
                                        <x-input-float :id="__('file')" type="file" value=""
                                            class="file-custom form-control-sm d-file" accept=".pdf" required />
                                        <x-invalid :value="__('Masukkan dokumen')" />
                                        <x-label-float :value="__('Dokumen pendukung')" />
                                    </div>
                                    <small class="text-muted">Upload scan dokumen pendukung, seperti SK, dalam bentuk
                                        file PDF.</small><br>
                                    <hr>
                                    <small class="text-muted">Fitur ini untuk pegawai yang <b>pensiun</b>,
                                        <b>meninggal dunia</b> atau <b>mutasi ke luar daerah</b>.</small> <br>
                                    <small class="text-muted">Untuk pegawai yang mutasi antar perangkat daerah, gunakan
                                        fitur <b>Edit</b>.</small><br>
                                </div>
                            </div>
                            <div class="row g-2 mt-1">
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn-lighter me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-info">
                                        SIMPAN
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{-- MODAL PASSWORD --}}
        <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Ubah password pegawai
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            id="disp"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" method="POST"
                            action="{{ route('admin.pegawai.password') }}">
                            @csrf
                            <input type="hidden" id="p-id" name="id">
                            <div class="row">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating">
                                        <x-input-float id="p-name" name="name" type="text" readonly disabled />
                                        <x-label-float :value="__('Nama Lengkap')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating">
                                        <x-input-float id="p-nip" name="nip" type="text" readonly disabled />
                                        <x-label-float :value="__('NIP')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="position-relative mb-2 col-md-12">
                                    <div class="form-floating input-group input-group-merge">
                                        <x-input-float :id="__('password')" type="password" required />
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                        <x-invalid :value="__('Password harus diisi, minimal 8 karakter')" />
                                        <x-label-float :value="__('Password baru')" style="z-index: 5 !important;" />
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 mt-1">
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn-lighter me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-info">
                                        SIMPAN
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL EDIT --}}
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">
                            Ubah data pegawai
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"
                            id="dise"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate="" method="POST"
                            action="{{ route('admin.pegawai.edit') }}">
                            @csrf
                            <input type="hidden" class="e-id" name="id" value="">
                            <div class="row">
                                <div class="position-relative mb-2 col-md-6">
                                    <div class="form-floating">
                                        <x-input-float :id="__('name')" type="text" class="e-name" required />
                                        <x-invalid :value="__('Nama harus diisi')" />
                                        <x-label-float :value="__('Nama Lengkap')" />
                                    </div>
                                </div>

                                <div class="position-relative mb-2 col-md-6">
                                    <div class="form-floating">
                                        <x-input-float type="text" class="e-nip" readonly disabled />
                                        <x-label-float :value="__('NIP')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative mb-2 col-md-6 form-floating">
                                    <div class="form-floating">
                                        <x-input-float :id="__('email')" type="email" class="e-email" required />
                                        <x-invalid :value="__('Masukkan alamat email yang benar')" />
                                        <x-label-float :value="__('Alamat email')" />
                                    </div>
                                </div>

                                <div class="position-relative mb-2 col-md-6">
                                    <div class="form-floating">
                                        <x-input-float :id="__('phone')" type="text" pattern="[0-9]{8,14}"
                                            class="e-phone" required />
                                        <x-invalid :value="__('Masukkan nomor HP yang benar, angka tanpa spasi')" />
                                        <x-label-float :value="__('Nomor HP / WA')" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="position-relative mb-2 col-md-6 form-floating">
                                    <div class="form-floating">
                                        {{-- <x-input-float :id="__('pd')" type="text" class="e-pd" required list="listPD"
                                            autocomplete="off" /> --}}
                                        <select class="form-select text-dark" name="pd" required class="e-pd">
                                            <option selected disabled hidden value="">Pilih perangkat daerah
                                            </option>
                                            @foreach (getPerangkat() as $d)
                                                <option value="{{ $d->nama }}"
                                                    @if (old('pd') != null && old('pd') == $d->nama) selected @elseif (old('pd') == null && Auth::user()->pd == $d->nama) selected @endif>
                                                    {{ $d->nama }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <x-invalid :value="__('Pilih perangkat daerah')" />
                                        <x-label-float :value="__('Perangkat daerah')" />
                                        {{-- <datalist id="listPD">
                                            @foreach (getPerangkat() as $n => $d)
                                                <option value="{{ $d->nama }}"></option>
                                            @endforeach
                                        </datalist> --}}
                                    </div>
                                </div>

                                <div class="position-relative mb-2 col-md-6">
                                    <div class="form-floating">
                                        <x-input-float :id="__('satker')" type="text" class="e-satker" />
                                        <x-invalid :value="__('Masukkan satker / Unit kerja')" />
                                        <x-label-float :value="__('Satker / Unit kerja')" />
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn-lighter me-2"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-info">
                                        SIMPAN
                                    </button>
                                </div>
                            </div>
                        </form>
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
                    ajax: "{{ route('admin.ajax') }}",
                    dataSrc: 'data',
                    columnDefs: [{
                            data: 'name',
                            targets: 0
                        },
                        {
                            data: 'nip',
                            targets: 1
                        },
                        {
                            data: 'phone',
                            targets: 2
                        },
                        {
                            data: 'jabatan',
                            targets: 3
                        },
                        {
                            data: 'satker',
                            targets: 4
                        },
                        {
                            data: null,
                            defaultContent: '<button type="button" class="btn btn-success btn-xsm ebutton" data-bs-toggle="modal" data-bs-target="#edit"> <i class="uil-pen"></i> edit </button> <button type="button" class="btn btn-info btn-xsm pbutton" data-bs-toggle="modal" data-bs-target="#pass"><i class="uil-key-skeleton"></i> password </button> <button type="button" class="btn btn-danger btn-xsm dbutton" data-bs-toggle="modal" data-bs-target="#del"> <i class="uil-trash-alt"></i> hapus </button>',
                            targets: 5,
                            @desktop() className: 'text-center',
                            @enddesktop()
                        }
                    ],
                    lengthChange: !1,
                    buttons: [{
                        extend: 'colvis',
                        @desktop()
                        text: 'Kolom',
                        @enddesktop()
                        @mobile()
                        text: '<i class="mdi mdi-table-eye"></i>',
                        className: 'mb-1',
                        @endmobile()
                    }],
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

</x-adminwide-layout>
