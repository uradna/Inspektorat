<x-guest-layout>
    <div class="auth-fluid-form-box">
        <div class="d-flex h-100">
            <div class="card">
                <x-guest-logo> </x-guest-logo>
                <div class="card-body">

                    <h4 class="mt-0">Reset password</h4>
                    <p class="text-muted mb-2 font-12">Masukkan email anda, link untuk mereset password akan dikirimkan
                        ke email anda.<br><br>Bila anda lupa alamat email atau tidak bisa masuk ke email, hubungi admin
                        OPD untuk mengubah password anda.</p>
                    @if (Session::has('status'))
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    @endif
                    @if (Session::has('reset'))
                        <x-auth-session-reset class=" mt-3" :reset="session('reset')['email']" />
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="mb-6">
                        @csrf
                        <div class="mb-3">
                            <div class="form-floating">

                                <input class="form-control" name="email" id="emailaddress" required=""
                                    placeholder="Enter your email">
                                <label for="emailaddress" class="form-label">Alamat email</label>
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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
