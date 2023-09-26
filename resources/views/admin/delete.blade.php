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
        {{ __('Admin Gratifikasi Online - Hapus Pegawai') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Hapus Data Pegawai</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pegawai - ' . Auth::user()->pd) }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">

                        <h4 class="header-title mb-3">Daftar Permintaan Hapus data pegawai</h4>

                        {{-- <a href="{{ route('admin.pegawai') }}" class="btn btn-success float-start">
                            <i class="mdi mdi-account-eye"></i> Lihat data pegawai
                        </a> --}}

                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th data-priority="0" width="1%">#</th> --}}
                                        <th data-priority="3">#</th>
                                        <th data-priority="0">Nama</th>
                                        <th>NIP</th>
                                        <th>Alasan</th>
                                        <th>Balasan</th>
                                        {{-- <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Penempatan</th> --}}
                                        <th data-priority="2">Status</th>
                                        <th data-priority="1" class="text-center">Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)
                                        @foreach ($pegawai as $d)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                {{-- <td>{{ tglFromCreated($d->created_at) }}</td> --}}
                                                <td>{{ $d->user->name }}</td>
                                                <td>{{ $d->user->nip }}</td>
                                                <td>{{ $d->alasan }}</td>
                                                <td>{{ $d->feedback ?? '-' }}</td>
                                                {{-- <td>{{ $d->user->email }}</td>
                                                <td>{{ $d->user->jabatan }}</td>
                                                <td>{{ $d->user->satker }}</td> --}}
                                                <td>
                                                    @if ($d->status == 0)
                                                        <i class="mdi mdi-exclamation"></i> menunggu
                                                    @elseif ($d->status==1)
                                                        <i class="mdi mdi-check"></i> disetujui
                                                    @else
                                                        <i class="mdi mdi-close"></i> ditolak
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($d->status == 0)
                                                        <form action="{{ route('admin.pegawai.remove') }}" method="POST">
                                                            <a href="../../pdf/{{ $d->file }}"
                                                                class="btn btn-info btn-xsm" target="_blank">
                                                                <i class="uil-down-arrow"></i> file
                                                            </a>
                                                            @csrf
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $d->id }}">
                                                            <button class="btn btn-danger btn-xsm delete_alert"
                                                                name="archive" type="submit" id="submitForm"><i
                                                                    class=" uil-trash-alt "></i>
                                                                hapus
                                                            </button>
                                                        </form>
                                                    @else
                                                        -
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



        </x-slot>

        <x-slot name="script">
            <script>
                $(document).ready(function() {
                    "use strict";
                    var a = $("#datatable-buttons").DataTable({
                        // order: [
                        //     [0, 'desc']
                        // ],
                        buttons: [{
                                @desktop()
                                text: '<i class="uil-users-alt"></i> Data pegawai',
                                @enddesktop()
                                @mobile()
                                text: '<i class="uil-users-alt"></i>',
                                className: 'mb-1',
                                @endmobile()
                                action: function(e, dt, node, config) {
                                    window.open("{{ route('admin.pegawai') }}", "_self");
                                }
                            },
                            // {
                            //     extend: 'print',
                            //     @mobile()
                            //     text: '<i class="mdi mdi-printer"></i>',
                            //     className: 'mb-1',
                            //     @endmobile()
                            //     title: 'Data Pernyataan - {{ Auth::user()->pd }}',

                            // },
                            //  {
                            //     extend: 'excel',
                            //     @mobile()
                            //     text: '<i class="mdi mdi-microsoft-excel"></i>',
                            //     className: 'mb-1',
                            //     @endmobile()
                            //     title: 'Data Pernyataan Tahun - {{ Auth::user()->pd }}',

                            // }, 
                            {
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
                        lengthChange: !1,
                        filter: 1,
                        // searching: 1,
                        pageLength: 10,
                        // bPaginate: !1,
                        // filter: !1,
                        info: 1,
                        // sDom: '<"top">rt<"bottom"l>p<"clear">',
                        //buttons: ["copy", "print", "excel"],
                        // buttons: ["print", "excel", "colvis"],
                        // buttons: [{
                        //     extend: 'print'
                        // }, {
                        //     extend: 'excel'
                        // }, {
                        //     extend: 'colvis',
                        //     text: 'Kolom'
                        // }],
                        language: {
                            lengthMenu: "Menampilkan _MENU_ pegawai per halaman",
                            search: "Pencarian",
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

            {{-- <script>
                $('.pbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('#p-id').val(data[0]);
                    $('#p-name').val(data[1]);
                    $('#p-nip').val(data[2]);
                    $('#password').val('');
                    $('#confirmPassword').val('');
                });

                $('#disp').click(function() {
                    $('#p-id').val('');
                    $('#p-name').val('');
                    $('#p-nip').val('');
                    $('#password').val('');
                    $('#confirmPassword').val('');
                });

            </script>

            <script>
                $('.dbutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('.d-id').val(data[0]);
                    $('.d-name').val(data[1]);
                    $('.d-nip').val(data[2]);
                    $('.d-file').val('');
                });

                $('#disd').click(function() {
                    $('.d-id').val('');
                    $('.d-name').val('');
                    $('.d-nip').val('');
                    $('.d-file').val('');
                });

            </script>

            <script>
                $('.ebutton').click(function() {
                    var data = $(this).data('quantity').split('|');
                    $('.e-id').val(data[0]);
                    $('.e-name').val(data[1]);
                    $('.e-nip').val(data[2]);
                    $('.e-email').val(data[3]);
                    $('.e-phone').val(data[4]);
                    $('.e-pd').val(data[5]);
                    $('.e-satker').val(data[6]);
                });
                $('#dise').click(function() {
                    $('.e-id').val('');
                    $('.e-name').val('');
                    $('.e-nip').val('');
                    $('.e-email').val('');
                    $('.e-phone').val('');
                    $('.e-pd').val('');
                    $('.e-satker').val('');
                });

            </script> --}}

            {{-- <script>
                function autocomplete(inp, arr) {
                    var currentFocus;
                    inp.addEventListener("input", function(e) {
                        var a, b, i, val = this.value;
                        var x = 0;
                        closeAllLists();
                        if (!val) {
                            return false;
                        }
                        currentFocus = -1;
                        a = document.createElement("DIV");
                        a.setAttribute("id", this.id + "autocomplete-list");
                        a.setAttribute("class", "autocomplete-items");
                        this.parentNode.appendChild(a);
                        for (i = 0; i < arr.length; i++) {

                            if (arr[i].toUpperCase().includes(val.toUpperCase())) {
                                b = document.createElement("DIV");
                                if (x < 6) {
                                    b.innerHTML = arr[i].substr(0, val.length);
                                    b.innerHTML += arr[i].substr(val.length);
                                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                                    b.addEventListener("click", function(e) {
                                        inp.value = this.getElementsByTagName("input")[0].value;
                                        closeAllLists();
                                    });
                                    a.appendChild(b);
                                }
                                x++;

                            }

                        }
                    });

                    inp.addEventListener("keydown", function(e) {
                        var x = document.getElementById(this.id + "autocomplete-list");
                        if (x) x = x.getElementsByTagName("div");
                        if (e.keyCode == 40) {
                            currentFocus++;
                            addActive(x);
                        } else if (e.keyCode == 38) {
                            currentFocus--;
                            addActive(x);
                        } else if (e.keyCode == 13) {
                            e.preventDefault();
                            if (currentFocus > -1) {
                                if (x) x[currentFocus].click();
                            }
                        }
                    });

                    function addActive(x) {
                        if (!x) return false;
                        removeActive(x);
                        if (currentFocus >= x.length) currentFocus = 0;
                        if (currentFocus < 0) currentFocus = (x.length - 1);
                        x[currentFocus].classList.add("autocomplete-active");
                    }

                    function removeActive(x) {
                        for (var i = 0; i < x.length; i++) {
                            x[i].classList.remove("autocomplete-active");
                        }
                    }

                    function closeAllLists(elmnt) {
                        var x = document.getElementsByClassName("autocomplete-items");
                        for (var i = 0; i < x.length; i++) {
                            if (elmnt != x[i] && elmnt != inp) {
                                x[i].parentNode.removeChild(x[i]);
                            }
                        }
                    }
                    document.addEventListener("click", function(e) {
                        closeAllLists(e.target);
                    });
                }

                var dinas = [
                    @foreach (getPerangkat() as $n => $d)
                        "{{ $d->nama }}",
                    @endforeach
                ];


                /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
                autocomplete(document.getElementById("pd"), dinas);

            </script> --}}

            {{-- AUTOCOMPLETE --}}

            {{-- <script>
                $('.delete_alert').on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: "Laporan yang dihapus tidak bisa dikembalikan lagi!",
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
            </script> --}}

            @if ($errors->any())
                <script type="text/javascript">
                    Swal.fire({
                        title: 'Ops...',
                        text: 'Ada sesuatu yang salah!',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: '#fa5c7c'
                    })

                </script>
            @endif

            <script>
                $('.delete_alert').on('click', function(e) {
                    e.preventDefault();
                    var form = $(this).parents('form');
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: "Permintaan yang dihapus tidak bisa dikembalikan lagi!",
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
        </x-slot>

    </x-adminwide-layout>
