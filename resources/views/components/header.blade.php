<header class="header">
    <div class="logo-wrapper">
        <a href="index.html" class="logo">
            <img src="/wafi/img/logo.png" alt="Wafi Admin Dashboard"/>
        </a>
        <a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title=""
           data-original-title="Quick Links">
            <i class="icon-menu1"></i>
        </a>
    </div>

    <div class="header-items">
        <!-- Header actions start -->
        <ul class="header-actions">
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{auth()->user()->name}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <h5>{{auth()->user()->name}}</h5>
                        </div>

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-log-out1"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>
        </ul>
        <!-- Header actions end -->
    </div>
</header>
