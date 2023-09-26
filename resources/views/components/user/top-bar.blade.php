<div class="navbar-custom topnav-navbar">
    <div class="container-fluid detached-nav">

        <x-user.logo-detached></x-user.logo-detached>

        <button class="button-toggle-menu">
            <i class="mdi mdi-menu"></i>
        </button>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ asset('img/user-m.png') }}" alt="user-image" class="rounded-circle">
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name ?? '-' }}</span>
                        <span class="account-position">{{ Auth::user()->nip }}</span>
                    </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        {{-- ------------------------------------------- --}}
                        <a class="dropdown-item notify-item">
                            <input class="form-check-input me-1" type="radio" name="data-layout-mode"
                                id="layout-mode-fluid" value="fluid">
                            <label for="layout-mode-fluid">
                                Fluid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </a>
                        <a class="dropdown-item notify-item">
                            <input class="form-check-input me-1" type="radio" name="data-layout-mode"
                                id="data-layout-detached" value="detached">
                            <label for="data-layout-detached">
                                Detached &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </a>
                        {{-- ------------------------------------------- --}}


                        <a href="{{ route('user.account') }}" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>Kelola akun</span>
                        </a>
                        <a class="dropdown-item notify-item pointer" onclick="event.preventDefault();
                        this.closest('form').submit();" role="button" target="_blank">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>
                    </form>
                </div>
            </li>
        </ul>

    </div>
</div>
