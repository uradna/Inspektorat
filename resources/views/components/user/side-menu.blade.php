<div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
    <div class="simplebar-wrapper" style="margin: 0px;">
        <div class="simplebar-mask">
            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content"
                    style="height: 100%; overflow: hidden scroll;">
                    <div class="simplebar-content" style="padding: 0px;padding-top: 10px;">
                        <ul class="side-nav">
                            <li class="side-nav-title side-nav-item">Navigation</li>
                            <li class="side-nav-item">
                                <a href="{{ route('user.dashboard') }}" class="side-nav-link">
                                    <i class="uil-home-alt"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('user.daftar') }}" class="side-nav-link">
                                    <i class="uil-check-square"></i>
                                    <span> Pernyataan Gratifikasi </span>
                                </a>
                            </li>
                            <li class="side-nav-item">
                                <a href="{{ route('user.lapor') }}" class="side-nav-link">
                                    <i class="uil-clipboard "></i>
                                    <span> Lapor Gratifikasi </span>
                                </a>
                            </li>

                            <li class="side-nav-title side-nav-item"> </li>
                            <li class="side-nav-title side-nav-item">Setting</li>

                            <li class="side-nav-item">
                                <a href="{{ route('user.account') }}" class="side-nav-link">
                                    <i class="uil-user"></i>
                                    <span> Kelola akun </span>
                                </a>
                            </li>

                            <li class="side-nav-item">
                                <a href="{{ route('bantuan') }}" class="side-nav-link">
                                    <i class="uil-comment-alt-question"></i>
                                    <span> Bantuan </span>
                                </a>
                            </li>

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
