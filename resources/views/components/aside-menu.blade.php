<aside class="offcanvas offcanvas-end header-offcanvasmenu" tabindex="-1" id="offcanvasMenuRight">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="#" class="side-nav-search-form">
            <div class="form-group">
                <input type="text" class="search-field" name="search-field" placeholder="Search...">
                <button class="side-nav-search-btn"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div class="row ">
            <div class="col-lg-5 col-xl-6">
                <ul class="main-navigation list-unstyled">
                    @auth
                        <li><a href="{{ route('logout') }}" id="logout">{{ t('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                        <li><a href="{{ route('dashboard') }}" id="logout">{{ t('Dashboard') }}</a></li>
                        @can('accessNova')
                            <li><a href="{{ route('nova.pages.home') }}" id="logout">{{ t('Admin') }}</a></li>
                        @endcan
                    @endauth
                    @guest
                        <li><a href="{{ route('login') }}">{{ t('Login') }}</a></li>
                        @if(\Laravel\Fortify\Features::enabled('register'))
                            <li><a href="{{ route('register') }}">{{ t('Register') }}</a></li>
                        @endif
                    @endguest
                </ul>
            </div>
            <div class="col-lg-7 col-xl-6">
                <div class="contact-info-wrap">
                    <div class="contact-inner">
                        <address class="address">
                            <span class="title">Contacts</span>
                            <p>Austin Mast, PHD, MPH <br> Department of Biological Sciences, FSU</p>
                            <p>Erica Krimmel, PHD, MPH <br> Department of Biological Sciences, FSU</p>
                            <p>Lauren Hall, MS, MPH <br> Department of Biological Sciences, FSU</p>
                        </address>
                        <address class="address">
                            <span class="title">Numbers</span>
                            <a class="tel" href="tel:8884562790"><i class="fas fa-phone"></i>(888)
                                456-2790</a>
                            <a class="tel" href="tel:12125553333"><i class="fas fa-fax"></i>(121)
                                255-53333</a>
                        </address>
                    </div>
                    <div class="contact-inner">
                        <h5 class="title">Socials</h5>
                        <div class="contact-social-share">
                            <ul class="social-share list-unstyled">
                                <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
