<x-guest-layout>
    <div class="auth-fluid-form-box">
        <div class="d-flex h-100">
            <div class="card">
                <x-guest-logo> </x-guest-logo>
                <div class="card-body">

                    <h4 class="mt-0">Reset password</h4>
                    <p class="text-muted mb-2 font-12">Masukkan password baru anda. Reset password pada aplikasi
                        ini tidak akan mengubah password SimasHebat.</p>
                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" />

                    <x-auth-session-reset class=" mt-3" :reset="session('reset')['email']" /> --}}

                    <x-auth-password-errors
                        class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                        role="alert" :errors="$errors" />

                    <form method="POST" action="{{ route('password.update') }}" class="mb-6">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <input type="hidden" name="email" value="{{ $request->email }}">

                        <div class="position-relative mb-3">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('password')" type="password" required />
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <x-invalid :value="__('Masukkan password baru')" />
                                <x-label-float :value="__('Password')" style="z-index: 5 !important;" />
                            </div>
                        </div>

                        <div class="position-relative mb-3">
                            <div class="form-floating input-group input-group-merge">
                                <x-input-float :id="__('password_confirmation')" type="password" required />
                                <div class="input-group-text" data-password="false">
                                    <span class="password-eye"></span>
                                </div>
                                <x-invalid :value="__('Masukkan password baru')" />
                                <x-label-float :value="__('Ulangi password')" style="z-index: 5 !important;" />
                            </div>
                        </div>

                        <div class="d-grid mb-3 text-center">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-email-send-outline"></i>
                                Reset Password
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
            {{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
