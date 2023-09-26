<div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                    style="height: 100%; overflow: hidden scroll;">
                    <div class="simplebar-content" style="padding: 0px;padding-top: 10px;">
                        <ul class="side-nav">
                            <li class="side-nav-title side-nav-item">Navigation Superadmin</li>
                            <li class="side-nav-item">
                                <a href="{{ route('superadmin.dashboard') }}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('superadmin.jadwal') }}" class="side-nav-link">
                                    <i class="uil-schedule"></i>
                                    <span> Jadwal Pengisian</span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('superadmin.pernyataan') }}" class="side-nav-link">
                                    <i class="uil-archive"></i>
                                    <span> Data Pernyataan </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('superadmin.laporan') }}" class="side-nav-link">
                                    <i class="uil-clipboard"></i>
                                    <span> Laporan Gratifikasi </span>
                                </a>
                            </li>

                            <li class="side-nav-title side-nav-item"> </li>
                            <li class="side-nav-title side-nav-item">Kelola User </li>
                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false"
                                    aria-controls="sidebarMultiLevel" class="side-nav-link">
                                    <i class="uil-users-alt"></i>
                                    <span> Data Pegawai

                                    </span>
                                    @if (getHapus() != 0)
                                        <span class="badge bg-danger float-end text-white px-1">!</span>
                                    @else
                                        <span class="menu-arrow"></span>
                                    @endif

                                </a>
                                <div class="collapse" id="sidebarMultiLevel">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{ route('superadmin.pegawai') }}">
                                                Edit User
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('superadmin.hapus') }}">
                                                Hapus Data
                                                @if (getHapus() != 0)
                                                    <sup class="bg-danger text-white rounded"
                                                        style="padding:0.1em 0.4em">{{ getHapus() }}</sup>
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('superadmin.pensiun', '60') }}">
                                                Pegawai Pensiun
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <a href="{{ route('admin.pegawai') }}" class="side-nav-link">
                                    <i class="uil-users-alt"></i>
                                    <span> Data Pegawai </span>
                                </a> --}}
                            </li>

                            <li class="side-nav-item">
                                <a href="{{ route('superadmin.admin') }}" class="side-nav-link">
                                    <i class="uil-constructor"></i>
                                    <span> Data Admin </span>
                                </a>
                            </li>

                            {{-- <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarMultiLevel2" aria-expanded="false"
                                    aria-controls="sidebarMultiLevel2" class="side-nav-link">
                                    <i class="uil-constructor"></i>
                                    <span> Data Admin </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultiLevel2">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{ route('superadmin.admin') }}">
                                                Edit Admin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.pegawai.delete.list') }}">
                                                Edit Superadmin
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}




                            <li class="side-nav-title side-nav-item"> </li>
                            <li class="side-nav-title side-nav-item">Setting</li>

                            {{-- <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarMultiLevel3" aria-expanded="false"
                                    aria-controls="sidebarMultiLevel3" class="side-nav-link">
                                    <i class="uil-palette"></i>
                                    <span>Pengaturan Website </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultiLevel3">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{ route('superadmin.banner') }}">
                                                Edit Banner Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.pegawai.delete.list') }}">
                                                Edit Bantuan
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li> --}}

                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarMultiLevel4" aria-expanded="false"
                                    aria-controls="sidebarMultiLevel4" class="side-nav-link">
                                    <i class="uil-palette"></i>
                                    <span>Pengaturan Website </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultiLevel4">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{ route('superadmin.banner') }}">
                                                Edit Banner Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('superadmin.help', 'user') }}">
                                                Edit Bantuan
                                            </a>
                                        </li>
                                        {{-- <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarSecondLevel"
                                                aria-expanded="false" aria-controls="sidebarSecondLevel">
                                                <span> Edit Bantuan </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarSecondLevel">
                                                <ul class="side-nav-third-level">
                                                    <li>
                                                        <a href="{{ route('superadmin.help', 'user') }}">
                                                            Bantuan Pegawai</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('superadmin.help', 'admin') }}">
                                                            Bantuan Admin</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('superadmin.help', 'superadmin') }}">
                                                            Bantuan Superadmin</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li> --}}

                                    </ul>
                                </div>
                            </li>

                            <li class=" side-nav-item">
                                <a href="{{ route('bantuan') }}" class="side-nav-link">
                                    <i class="uil-comment-alt-question"></i>
                                    <span> Bantuan </span>
                                </a>
                            </li>
                            {{-- <li class=" side-nav-item">
                                <a href="{{ route('superadmin.ajax') }}" class="side-nav-link">
                                    <i class="uil-comment-alt-question"></i>
                                    <span> Test Ajax </span>
                                </a>
                            </li>
                            <li class=" side-nav-item">
                                <a href="{{ route('superadmin.ajax2') }}" class="side-nav-link">
                                    <i class="uil-comment-alt-question"></i>
                                    <span> Test Ajax </span>
                                </a>
                            </li> --}}

                            <li class="side-nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="side-nav-link" onclick="event.preventDefault();
                                this.closest('form').submit();" role="button" target="_blank">
                                        <i class="uil-exit"></i>
                                        <span> Logout </span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="simplebar-placeholder" style="width: auto; height: 2453px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
        <div class="simplebar-scrollbar"
            style="height: 167px; transform: translate3d(0px, 350px, 0px); display: block;"></div>
    </div>
</div>
