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
    </x-slot>

    <x-slot name="title">
        {{ __('Dashboard Superadmin - Data Pernyataan') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('superadmin.pernyataan') }}">Pernyataan</a></li>
        <li class="breadcrumb-item active">Tahun {{ $jadwal->tahun }} Semester {{ $jadwal->semester }}</li>
    </x-slot>

    <x-slot name="header">
        {{ __('Data Pernyataan') }}
    </x-slot>

    <x-slot name="content">
        <div class="row">
            <div class="col-12">
                <div class="card ">
                    <div class=" card-body">
                        <h4 class="header-title mb-3">Data Pernyataan - Tahun {{ $jadwal->tahun }}
                            Semester
                            {{ $jadwal->semester }}</h4>


                        <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                <thead class="bg-lighter">
                                    <tr>
                                        {{-- <th data-priority="0" width="1%">#</th> --}}
                                        <th data-priority="3" width="1%">#</th>
                                        <th data-priority="2">Perangkat Daerah</th>
                                        <th class="text-center">
                                            Jumlah @notmobile()pernyataan @endnotmobile()
                                        </th>
                                        <th class="text-center"> Total pegawai </th>
                                        <th class="text-center"> Persentase </th>
                                        <th class="text-center"> P#1 </th>
                                        <th class="text-center"> P#2 </th>
                                        <th data-priority="1" class="text-center"> @notmobile()Aksi @endnotmobile()</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1)

                                    @foreach ($rekap as $d)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>
                                                @desktop() {{ $d->pd }} @elsedesktop()
                                                {{ str_replace('Dinas', 'Din.', str_replace('Kecamatan', 'Kec.', str_replace('Bagian', 'Bag.', $d->pd))) }}
                                                @enddesktop()
                                            </td>
                                            <td class="text-center"> {{ $d->jumlah }} </td>
                                            <td class="text-center"> {{ $d->total }} </td>
                                            <td class="text-center">
                                                {{ round(($d->jumlah / $d->total) * 100, 1) }}%
                                            </td>
                                            <td class="text-center">{{ $d->t2 }} </td>
                                            <td class="text-center">{{ $d->t3 }} </td>
                                            <td class="text-center">
                                                <a href="{{ route('superadmin.pernyataan.jadwal.pd', [$d->jadwal_id, $d->pd]) }}"
                                                    class="btn btn-info btn-xsm">
                                                    <i class="mdi mdi-eye"></i> @notmobile() Lihat @endnotmobile()

                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                <hr>Keterangan : <br>
                                P#1 : Jumlah pegawai yang MENERIMA gratifikasi dan SUDAH melaporkan ke UPG/KPK<br>
                                P#2 : Jumlah pegawai yang MENERIMA gratifikasi dan BELUM melaporkan ke UPG/KPK<br>
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
                    // buttons: [{
                    //     text: 'Jumlah pegawai saat ini :  pegawai',
                    //     className: 'btn btn-light pe-none',
                    //     // action: function(e, dt, node, config) {
                    //     //     window.open("https://www.w3schools.com", "_self");
                    //     // }
                    // }],

                    lengthChange: !1,
                    filter: 1,
                    // searching: 1,
                    pageLength: 10,
                    // bPaginate: !1,
                    // filter: !1,
                    info: 1,
                    buttons: [{
                            @desktop()
                            text: '<i class="uil-arrow-left"></i> Kembali',
                            @enddesktop()
                            @mobile()
                            text: '<i class="uil-arrow-left"></i>',
                            className: 'mb-1',
                            @endmobile()
                            action: function(e, dt, node, config) {
                                window.open("{{ route('superadmin.pernyataan') }}", "_self");
                            }
                        }, {
                            extend: 'print',
                            @mobile()
                            text: '<i class="mdi mdi-printer"></i>',
                            className: 'mb-1',
                            @endmobile()
                            title: 'Data Pernyataan - Tahun {{ $jadwal->tahun }} Semester {{ $jadwal->semester }}',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6]
                            }
                        }, {
                            extend: 'excel',
                            @mobile()
                            text: '<i class="mdi mdi-microsoft-excel"></i>',
                            className: 'mb-1',
                            @endmobile()
                            title: 'Data Pernyataan - Tahun {{ $jadwal->tahun }} Semester {{ $jadwal->semester }}',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6],
                                format: {
                                    header: function(data, columnIdx) {
                                        if (columnIdx === 5) {
                                            return "Jumlah pegawai yang MENERIMA gratifikasi dan SUDAH melaporkan ke UPG/KPK";
                                        } else if (columnIdx === 6) {
                                            return "Jumlah pegawai yang MENERIMA gratifikasi dan BELUM melaporkan ke UPG/KPK";
                                        } else {
                                            return data;
                                        }
                                    },
                                },
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
                        @if ($count > 0)
                            , {
                                @desktop()
                                text: 'Belum Melaporkan Gratifikasi',
                                className: 'ms-1 btn-danger',
                                @enddesktop()
                                @mobile()
                                text: '<i class="uil-arrow-left"></i>',
                                className: 'mb-1 btn-danger',
                                @endmobile()
                                action: function(e, dt, node, config) {
                                    window.open("{{ route('superadmin.pernyataan.tiga', $jadwal) }}", "_self");
                                }
                            }
                        @endif
                    ],
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
                    html: 'Ada sesuatu yang salah.<br>Pastikan form sudah terisi semua dengan benar.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#fa5c7c'
                })
            </script>
        @endif
    </x-slot>

</x-superadminwide-layout>
