<header class="app-bar fixed-top navy" data-role="appbar">
    <div class="container">
        <a href="/" class="app-bar-element branding"><span class="mif-heart mif-ani-heartbeat mif-ani-fast" style="font-size: 20pt;"></span> Metro UI CSS</a>

        <ul class="app-bar-menu small-dropdown">
          @if(Auth::check())
            <li>
                <a href="#" class="dropdown-toggle"><span class="mif-database">&nbsp;</span>Master</a>
                <ul class="d-menu" data-role="dropdown" data-no-close="true">
                    <li>
                        <a href="" class="dropdown-toggle">Semua Artikel</a>
                        <ul class="d-menu" data-role="dropdown">
                            <li><a href="{{ url('/artikel')}}"><span class="mif-folder">&nbsp;</span>Semua Artikel</a></li>
                            <li><a href="{{ url('/artikel/add') }}"><span class="mif-plus">&nbsp;</span>Tambah Artikel</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ url('/auth/logout') }}"><span class="mif-exit">&nbsp;</span>Logout</a>
            </li>
          @else
            <li>
                <a href="{{ url('/auth/login') }}"><span class="mif-enter">&nbsp;</span>Login</a>
            </li>
            <li>
                <a href="{{ url('auth/register') }}"><span class="mif-user-plus">&nbsp;</span>Register</a>
            </li>
          @endif
        </ul>
        <span class="app-bar-pull"></span>
    </div>
</header>
