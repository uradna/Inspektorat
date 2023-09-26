<x-user-layout>
    <x-slot name="style">
        <style>
            /*the container must be positioned relative:*/
            .autocomplete {
                position: relative;
            }

            .autocomplete-items {
                position: absolute;
                border: 1px solid #A0A0A0;
                z-index: 99;
                /*position the autocomplete items to be the same width as the container:*/
                top: 100%;
                left: 0;
                right: 0;
                padding: 4px 0;
                background-color: rgb(255, 255, 255);
                border-radius: 0.25rem;
            }

            .autocomplete-items div {
                padding: 3px 20px;
                line-height: 24px;
                cursor: pointer;
            }

            /*when hovering an item:*/
            .autocomplete-items div:hover {
                background-color: #E0E0E6;
                color: #000;
            }

            /*when navigating through the items using the arrow keys:*/
            .autocomplete-active {
                background-color: DodgerBlue !important;
                color: #ffffff;
            }

            /* swal2 cancel button text color */
            .swal2-styled.swal2-cancel {
                color: #555 !important;
            }

        </style>
    </x-slot>
    <x-slot name="title">
        {{ __('Gratifikasi Online - Lapor Gratifikasi') }}
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">
                            Pernyataan gratifikasi periode
                            {{ $periode = convertPeriode($jadwal->tahun, $jadwal->semester) }}
                        </h4>
                        <div class="mx-3">
                            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-account-box font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Biodata</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 1</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class=" mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 active">
                                        <i class="mdi mdi-book-edit-outline font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Laporan Gratifikasi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content mb-0 b-0">
                            <div>
                                <button type="button" class="btn btn-success mb-1" data-bs-toggle="modal"
                                    data-bs-target="#add">
                                    <i class="mdi mdi-plus-circle me-2"></i> Tambah Laporan
                                </button>

                            </div>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead class="bg-lighter">
                                        <tr>
                                            <th>#</th>
                                            {{-- <th data-priority="1">Tanggal Lapor</th> --}}
                                            <th>Jenis Gratifikasi</th>
                                            <th>Bentuk Gratifikasi</th>
                                            <th>Nilai</th>
                                            <th data-priority="1">Waktu</th>
                                            <th>Nama Pemberi</th>
                                            <th>Hubungan</th>
                                            <th>Alamat</th>
                                            <th>Alasan</th>
                                            <th data-priority="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 1)
                                            @foreach ($lapor as $d)
                                                <tr>
                                                    <td class="text-center">{{ $i++ }}</td>
                                                    {{-- <td>{{ konversiTanggalPendek(dateFromTimestamp($d->created_at)) }}</td> --}}
                                                    <td>{{ $d->jenis }}</td>
                                                    <td>{{ $d->bentuk }}</td>
                                                    <td>{{ number_format($d->nilai, 0, ',', '.') }}</td>
                                                    <td>{{ konversiTanggalPendek($d->tanggal) }}</td>
                                                    <td>{{ $d->pemberi }}</td>
                                                    <td>{{ $d->hubungan }}</td>
                                                    <td>{{ $d->alamat }}</td>
                                                    <td>{{ $d->alasan }}</td>
                                                    <td>
                                                        {{-- <a href="#" class="btn btn-info btn-xsm">
                                                            <i class="uil-pen"></i> @desktop() edit @enddesktop()
                                                        </a> --}}
                                                        <form
                                                            action="{{ route('user.pernyataan.lapor.delete', $jadwal->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $d->id }}">
                                                            <button class="btn btn-danger btn-xsm delete_alert"
                                                                name="archive" type="submit" id="submitForm"><i
                                                                    class=" uil-trash-alt "></i>@desktop() hapus
                                                                @enddesktop()</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <ul class="list-inline wizard mb-0">
                                    <li class="previous list-inline-item disabled">
                                        <a href="{{ route('user.pernyataan.point', [$jadwal->id, '1']) }}"
                                            class="btn btn-light">
                                            <i class="mdi mdi-arrow-left me-1"></i> Kembali
                                        </a>
                                    </li>
                                    <li class="next list-inline-item float-end ">
                                        @if ($count == 0)
                                            <a class="btn bg-light float-end text-secondary"
                                                style="cursor: not-allowed! important;">
                                                Selanjutnya <i class="mdi mdi-arrow-right ms-1"></i>
                                            </a>
                                        @else
                                            <form action="{{ route('user.pernyataan.lapor.selesai', $jadwal->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-info float-end">
                                                    Selanjutnya <i class="mdi mdi-arrow-right ms-1"></i>
                                                </button>
                                            </form>
                                        @endif

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ---------------------------------------------- MODAL-START ---------------------------------------------------- --}}

            <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Laporan Gratifikasi
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                                action="{{ route('user.post.lapor', $jadwal->id) }}">
                                @csrf
                                <div class="fw-bold mb-1 text-dark opacity-65">- Data penerima gratifikasi</div>
                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float type="text" class="bg-white" :value="Auth::user()->name" readonly
                                                disabled />
                                            <x-label-float :value="__('Nama Lengkap')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float type="text" class="bg-white" :value="Auth::user()->nip" readonly
                                                disabled />
                                            <x-label-float :value="__('NIP')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="position-relative mb-2 col-md-6 form-floating">
                                        <div class="form-floating">
                                            <x-input-float :id="__('pd')" type="text"
                                                value="{{ old('pd') ?? Auth::user()->pd }}" required
                                                autocomplete="off" />
                                            <x-invalid :value="__('Pilih perangkat daerah')" />
                                            <x-label-float :value="__('Perangkat daerah')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('satker')" type="text"
                                                value="{{ old('satker') ?? Auth::user()->satker }}" />
                                            <x-invalid :value="__('Pilih Satker / Bidang / UPT')" />
                                            <x-label-float :value="__('Satker / Bidang / UPT')" />
                                        </div>
                                    </div>
                                </div>
                                {{-- <hr class="mt-0 mb-3" /> --}}
                                <div class="fw-bold mb-1 text-dark opacity-65">- Data gratifikasi</div>
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select text-dark" name="jenis" required>
                                                <option selected disabled hidden value="">Pilih jenis gratifikasi</option>
                                                @foreach (getJenis() as $d)
                                                    <option value="{{ $d->nama }}" @if (old('jenis') != null && old('jenis') == $d->nama) selected @endif>{{ $d->nama }}</option>
                                                @endforeach

                                            </select>
                                            <x-invalid :value="__('Pilih jenis gratifikasi yang diterima')" />
                                            <x-label-float :value="__('Jenis gratifikasi')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('bentuk')" type="text"
                                                value="{{ old('bentuk') ?? '' }}" required />
                                            <x-invalid :value="__('Isi bentuk gratifikasi yang diterima')" />
                                            <x-label-float :value="__('Bentuk gratifikasi')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('nilai')" type="number"
                                                value="{{ old('nilai') ?? '' }}" required />
                                            <x-invalid
                                                :value="__('Masukkan nilai gratifikasi dalam rupiah, angka tanpa titik koma')" />
                                            <x-label-float :value="__('Nilai gratifikasi')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('tanggal')" type="date" min="{{ $range[0] }}"
                                                max="{{ $range[1] }}"
                                                value="{{ old('tanggal') ?? date($range[0]) }}" required />
                                            <x-invalid :value="__('Masukkan tanggal penerimaan gratifikasi')"
                                                class="is-invalid" />
                                            <x-label-float :value="__('Tanggal')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('pemberi')" type="text" value=""
                                                value="{{ old('pemberi') ?? '' }}" required />
                                            <x-invalid :value="__('Masukkan nama pemberi gratifikasi')" />
                                            <x-label-float :value="__('Nama pemberi')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('hubungan')" type="text"
                                                value="{{ old('hubungan') ?? '' }}" required />
                                            <x-invalid
                                                :value="__('Masukkan hubungan antara penerima dan pemberi gratifikasi')" />
                                            <x-label-float :value="__('Hubungan dengan pemberi')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('alamat')" type="text"
                                                value="{{ old('alamat') ?? '' }}" required />
                                            <x-invalid :value="__('Masukkan alamat pemberi gratifikasi')" />
                                            <x-label-float :value="__('Alamat pemberi')" />
                                        </div>
                                    </div>
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('alasan')" type="text"
                                                value="{{ old('nilai') ?? '' }}" required />
                                            <x-invalid :value="__('Masukkan alasan pemberian gratifikasi')" />
                                            <x-label-float :value="__('Alasan pemberian')" />
                                        </div>
                                    </div>
                                    {{-- <div class="position-relative mb-2 col-md-6">
                                    <div class="form-floating">
                                        <textarea name="alasan" class="form-control text-dark" placeholder=" "
                                            style="height: 80px;" required></textarea>
                                        <x-invalid :value="__('Masukkan alasan pemberian gratifikasi')" />
                                        <x-label-float :value="__('Alasan pemberian')" />
                                    </div>

                                </div> --}}

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
            {{-- ---------------------------------------------- MODAL-END ---------------------------------------------------- --}}
        </x-slot>

        <x-slot name="script">
            <script>
                $(document).ready(function() {
                    "use strict";
                    var a = $("#datatable-buttons").DataTable({
                        lengthChange: !1,
                        searching: 1,
                        // pageLength: 6,
                        // bPaginate: !1,
                        // filter: !1,
                        // info: !1,
                        sDom: '<"top">rt<"bottom"l><"clear">',
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
                        language: {
                            paginate: {
                                previous: "<i class='mdi mdi-chevron-left'>",
                                next: "<i class='mdi mdi-chevron-right'>"
                            }
                        },
                        drawCallback: function() {
                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                            $(".dataTables_paginate > .pagination > .active > .page-link ").addClass(
                                "bg-dark");
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

            {{-- AUTOCOMPLETE --}}
            <script>
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

            </script>

            @if ($errors->any())
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#add').modal('show');
                    });

                </script>
            @endif

            <script>
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

            </script>


        </x-slot>

    </x-user-layout>
