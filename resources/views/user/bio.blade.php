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
        {{ __('Gratifikasi Online - Biodata') }}
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
                            {{ convertPeriode($jadwal->tahun, $jadwal->semester) }}
                        </h4>
                        <div class="mx-3">
                            <ul class="nav nav-pills nav-justified form-wizard-header mb-3">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 active">
                                        <i class="mdi mdi-account-box font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Biodata</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 ">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1 ">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 2</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-chat-question font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Pernyataan 3</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i class="mdi mdi-book-edit-outline font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Laporan Gratifikasi</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link rounded-0 py-1">
                                        <i
                                            class="mdi mdi-checkbox-marked-circle-outline font-18 align-middle me-1"></i>
                                        <span class="d-none d-sm-inline">Finish</span>
                                    </a>
                                </li> -->

                            </ul>
                        </div>
                        <div class="tab-content mb-0 b-0">
                            <form class="needs-validation @if ($errors->any()) was-validated @endif" novalidate="" method="POST"
                                action="{{ route('user.post.biodata', $jadwal->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('name')" type="text" class="bg-white"
                                                :value="Auth::user()->name" required />
                                            <x-invalid :value="__('Nama harus diisi')" />
                                            <x-label-float :value="__('Nama Lengkap')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float type="text" class="bg-white" :value="Auth::user()->nip"
                                                readonly disabled />
                                            <x-label-float :value="__('NIP')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6 form-floating">
                                        <div class="form-floating">
                                            <x-input-float :id="__('email')" type="email"
                                                value="{{ old('email') ?? Auth::user()->email }}" required />
                                            <x-invalid :value="__('Masukkan alamat email yang benar')" />
                                            <x-label-float :value="__('Alamat email')" />
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('phone')" type="text" pattern="[0-9]{8,14}"
                                                value="{{ old('phone') ?? Auth::user()->phone }}" required />
                                            <x-invalid :value="__('Masukkan nomor HP yang benar, angka tanpa spasi')" />
                                            <x-label-float :value="__('Nomor HP / WA')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row ">
                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('jabatan')" type="text"
                                                value="{{ old('jabatan') ?? Auth::user()->jabatan }}" required />
                                            <x-invalid :value="__('Masukkan jabatan terakhir')" />
                                            <x-label-float :value="__('Jabatan')" />
                                        </div>
                                    </div>


                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select text-dark" name="pangkat" required>
                                                <option selected disabled hidden value="">Pilih pangkat/golongan
                                                </option>
                                                @foreach (getPangkat() as $d)
                                                    <option value="{{ $d->nama }}"
                                                        @if (old('pangkat') != null && old('pangkat') == $d->nama) selected @elseif (old('pangkat') == null && Auth::user()->pangkat == $d->nama) selected @endif>
                                                        {{ $d->nama }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <x-invalid :value="__('Pilih pangkat/golongan terakhir')" />
                                            <x-label-float :value="__('Pangkat/golongan')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="position-relative mb-2 col-md-6 form-floating">
                                        <div class="form-floating">
                                            {{-- <x-input-float :id="__('pd')" type="text"
                                                value="{{ old('pd') ?? Auth::user()->pd }}" required
                                                autocomplete="off" /> --}}
                                            <select class="form-select text-dark" name="pd" required>
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
                                        </div>
                                    </div>

                                    <div class="position-relative mb-2 col-md-6">
                                        <div class="form-floating">
                                            <x-input-float :id="__('satker')" type="text"
                                                value="{{ old('satker') ?? Auth::user()->satker }}" required />
                                            <x-invalid :value="__('Masukkan satker / Unit kerja')" />
                                            <x-label-float :value="__('Satker / Unit kerja')" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info float-end" id="alert1">
                                            Selanjutnya <i class="mdi mdi-arrow-right ms-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- @foreach (session('p') as $x)
            {{ $x }}
        @endforeach --}}
        {{-- {{ dd(session('p')) }} --}}
        {{-- email = {{ session('p')['email'] }} --}}
        {{-- phone = {{ session('p')['phone'] }} --}}
        {{-- {{ dd(session('pernyataan')) }} --}}
    </x-slot>


    <x-slot name="script">

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

        <script>
            $('#alert1').on('click', function(e) {
                e.preventDefault();
                var form = $(this).parents('form');
                let pd = $('#pd').val();
                Swal.fire({
                    title: 'Anda yakin?',
                    text: "Pastikan data Perangkat Daerah sudah benar.",
                    icon: 'warning',
                    iconColor: '#fa5c7c',
                    showCancelButton: true,
                    confirmButtonColor: '#39afd1',
                    cancelButtonColor: '#dadee2',
                    confirmButtonText: 'Ya, lanjutkan!!',
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
