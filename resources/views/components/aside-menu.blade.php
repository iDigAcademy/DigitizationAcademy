<aside class="offcanvas offcanvas-end header-offcanvasmenu" tabindex="-1" id="offcanvasMenuRight">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="row ">
            <div class="col-lg-5 col-xl-6">
                <ul class="main-navigation list-unstyled">
                    <li><a href="{{ route('dashboard') }}" id="dashboard">{{ t('Dashboard') }}</a></li>
                    <li><a href="{{ route('nova.pages.home') }}" target="_blank" id="nova">{{ t('Admin') }}</a></li>
                    <li><a href="{{ route('horizon.index') }}" target="_blank" id="horizon">{{ t('Horizon') }}</a></li>
                    <li><a href="{{ route('logout') }}" id="logout">{{ t('Logout') }}</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                    @guest
                        <li><a href="{{ route('login') }}">{{ t('Login') }}</a></li>
                        @if(\Laravel\Fortify\Features::enabled('register'))
                            <li><a href="{{ route('register') }}">{{ t('Register') }}</a></li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</aside>
