<header class="header axil-header header-style-2">
    <div id="axil-sticky-placeholder"></div>
    <div class="axil-mainmenu">
        <div class="container-fluid">
            <div class="header-navbar">
                <div class="header-logo">
                    <a href="/"><img class="light-version-logo" src="{{ vite_asset('resources/media/logo.svg') }}"
                                     alt="logo"
                                     style="width:170px;"></a>
                </div>
                <div class="header-main-nav">
                    <!--=====================================-->
                    <!--=             header                =-->
                    <!--=====================================-->
                    <nav class="mainmenu-nav" id="mobilemenu-popup">
                        <div class="d-block d-lg-none">
                            <div class="mobile-nav-header">
                                <div class="mobile-nav-logo">
                                    <a href="{{ route('home') }}">
                                        <img class="light-mode" src="{{ vite_asset('resources/media/logo.svg') }}"
                                             style="width:150px"
                                             alt="Digitization Academy Logo"></a>
                                </div>
                                <button class="mobile-menu-close" data-bs-dismiss="offcanvas"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <!--=====================================-->
                        <!--=             header menu           =-->
                        <!--=====================================-->
                        <ul class="mainmenu">
                            <li><a href="{{ route('course.index') }}">{{ trans('Courses') }}</a></li>
                            <li><a href="{{ route('calendar.index') }}">{{ trans('Calendar') }}</a></li>
                            <li><a href="{{ route('community.index') }}">{{ trans('Community') }}</a></li>
                            <li><a href="{{ route('about.index') }}">{{ trans('About') }}</a></li>
                            <li><a href="{{ route('contact.index') }}">{{ trans('Contact') }}</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-action">
                    <ul class="list-unstyled">
                        @can('access-nova')
                        <!-- button associated with large screen aside -->
                            <li class="sidemenu-btn d-lg-block d-none">
                                <button class="btn-wrap" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasMenuRight">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </li>
                        @endcan
                        <li class="mobile-menu-btn sidemenu-btn d-lg-none d-block">
                            <button class="btn-wrap" data-bs-toggle="offcanvas" data-bs-target="#mobilemenu-popup">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
