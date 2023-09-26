<x-guest-layout>
    <div class="auth-fluid-form-box">
        <div class="d-flex h-100">
            <div class="card">
                <x-guest-logo> </x-guest-logo>
                <div class="card-body">

                    <h4 class="mt-0">Selamat Datang</h4>
                    <p class="text-muted mb-2 font-12">Masukkan username / NIP dan password untuk mengakses akun
                        anda.</p>

                    <x-auth-validation-errors
                        class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                        role="alert" :errors="$errors" />
                    <form method="POST" action="{{ route('login') }}" class="mb-6">
                        @csrf
                        <div class="mb-2">
                            <div class="form-floating">

                                <input class="form-control" name="username" id="username" required=""
                                    placeholder="Masukkan username/NIP anda"">
                                    <label for=" username" class="form-label">Username / NIP</label>
                            </div>
                        </div>
                        <div class="position-relative mb-4">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('password')" type="password" required />
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <x-invalid :value="__('Masukkan password baru')" />
                                <x-label-float :value="__('Password')" style="z-index: 5 !important;" />
                            </div>
                            <a href="{{ route('password.request') }}" class="text-muted float-end mt-1"><small>Lupa
                                    password? klik di sini</small></a>
                        </div>
                        {{-- <div class="mb-4">
                            <div class="form-floating">
                                <input class="form-control" type="password" name="password" required="" id="password"
                                    placeholder="Masukkan password anda">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            
                        </div> --}}

                        <div class="d-grid mb-3 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Log In
                            </button>
                        </div>
                    </form>
                    <x-guest-footer></x-guest-footer>
                </div>
            </div>
        </div>
    </div>

    <div class="auth-fluid-right" style="padding:50px 50px 50px 0px !important;">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @php($i = 0)
                    @foreach ($banner as $n)
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i++ }}" @if ($i == 1) class="active" @endif>
                        </li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php($i = 0)
                        @foreach ($banner as $x)
                            <div @if ($i == 0) class="carousel-item active" @else class="carousel-item" @endif data-bs-interval="{{ $x->time }}000">
                                <img class="d-block img-fluid" src="{{ asset('upload/' . $x->img) }}"
                                    style="width: auto;height: auto;height: 100%;max-height: 85vh;margin:auto;">
                            </div>
                            @php($i++)
                            @endforeach
                        </div>
                    </div>
                </div>
            </x-guest-layout>
