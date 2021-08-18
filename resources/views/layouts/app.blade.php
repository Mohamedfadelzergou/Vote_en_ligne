<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>@yield("title")</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('../../assets/images/favicon.ico') }}">
        <!-- twitter-bootstrap-wizard css -->
        <link rel="stylesheet" href="{{ URL::asset('../../assets/libs/twitter-bootstrap-wizard/prettify.css') }}">

        <!-- plugin css -->
        <link href="{{ URL::asset('../../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="{{ URL::asset('../../assets/css/preloader.min.css') }}" type="text/css" />
        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('../../assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ URL::asset('../../assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ URL::asset('../../assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> 
        @if (App::getLocale() == 'ar')
        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('../../assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('../../assets/css/bootstrap-rtl.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('../../assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> 
        <link href="{{ URL::asset('../../assets/css/app-rtl.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        @else
        <link href="{{ URL::asset('../../assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> 
        <!-- Bootstrap Css -->
        <link href="{{ URL::asset('../../assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        @endif
        @toastr_css
    </head>

    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            @if (auth()->user()->hasRole('user'))
                                <a href="{{route('user')}}" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vote En Ligne</span>
                                    </span>
                                </a>
    
                                <a href="{{route('user')}}" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vote En Ligne</span>
                                    </span>
                                </a>
                                @else
                                <a href="{{route('admin')}}" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vote En Ligne</span>
                                    </span>
                                </a>
    
                                <a href="{{route('admin')}}" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="../../assets/images/logo-sm.svg" alt="" height="24"> <span class="logo-txt">Vote En Ligne</span>
                                    </span>
                                </a>
                                @endif
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ms-2">
                            <button type="button" class="btn header-item" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="search" class="icon-lg"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
        
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">

                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (App::getLocale() == 'ar')
                            <img id="header-lang-img" src="{{ URL::asset('../../assets/images/flags/ar.jpg') }}" alt="Header Language" height="16">
                            @endif
                            @if(App::getLocale() == 'fr')
                            <img id="header-lang-img" src="{{ URL::asset('../../assets/images/flags/fr.jpg') }}" alt="Header Language" height="16">
                            @endif
                            @if(App::getLocale() == 'en')
                            <img id="header-lang-img" src="{{ URL::asset('../../assets/images/flags/us.jpg') }}" alt="Header Language" height="16">
                            @endif
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}" class="dropdown-item notify-item language" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            @if ($properties['native']=='English')
                                            <img src="../../assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                            @endif
                                            @if ($properties['native']=='français')
                                            <img src="../../assets/images/flags/fr.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Français</span>
                                            @endif
                                            @if ($properties['native']=='العربية')
                                            <img src="../../assets/images/flags/ar.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">العربية</span>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="../../{{ Auth::user()->profile->picture }}"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> {{trans('main_trans.Profile')}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> {{trans('main_trans.Logout')}}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            @endguest
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">{{trans('main_trans.Menu')}}</li>
                            <li>
                                @if (auth()->user()->hasRole('user'))
                                <a href="{{route('user')}}">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">{{trans('main_trans.Dashboard')}}</span>
                                </a>
                                @else
                                <a href="{{route('admin')}}">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">{{trans('main_trans.Dashboard')}}</span>
                                </a>
                                @endif
                                
                            </li>
                            <li>
                                <a href="{{route('votes')}}">
                                    <i data-feather="file-text"></i>
                                    <span data-key="t-pages">{{trans('main_trans.Votes')}}</span>
                                </a>
                            </li>

                            @if (auth()->user()->hasRole('superadministrator'))
                            <li class="menu-title mt-2" data-key="t-components">{{trans('main_trans.CRM')}}</li>
                            <li>
                                <a href="{{route('voters')}}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">{{trans('main_trans.Voters')}}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('candidats')}}">
                                    <i data-feather="users"></i>
                                    <span data-key="t-authentication">{{trans('main_trans.Candidats')}}</span>
                                </a>
                            </li>
                            @endif
                            
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="share-2"></i>
                                    <span data-key="t-multi-level">{{trans('main_trans.Settings')}}</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="{{route('profile')}}" data-key="t-level-1-1">{{trans('main_trans.Profile')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->


                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © {{trans('main_trans.copywrite')}}.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    {{trans('main_trans.urlcopywrite')}}
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        
        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title d-flex align-items-center bg-dark p-3">

                    <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

                    <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                </div>

                <!-- Settings -->
                <hr class="m-0" />

                <div class="p-4">
                    <h6 class="mb-3">Layout</h6>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-vertical" value="vertical">
                        <label class="form-check-label" for="layout-vertical">Vertical</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout"
                            id="layout-horizontal" value="horizontal">
                        <label class="form-check-label" for="layout-horizontal">Horizontal</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Mode</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-light" value="light">
                        <label class="form-check-label" for="layout-mode-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-mode"
                            id="layout-mode-dark" value="dark">
                        <label class="form-check-label" for="layout-mode-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Width</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-fuild" value="fuild" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
                        <label class="form-check-label" for="layout-width-fuild">Fluid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-width"
                            id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Layout Position</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
                        <label class="form-check-label" for="layout-position-fixed">Fixed</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-position"
                            id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
                        <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Topbar Color</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
                        <label class="form-check-label" for="topbar-color-light">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="topbar-color"
                            id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
                        <label class="form-check-label" for="topbar-color-dark">Dark</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Size</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                        <label class="form-check-label" for="sidebar-size-default">Default</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                        <label class="form-check-label" for="sidebar-size-compact">Compact</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-size"
                            id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                        <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2 sidebar-setting">Sidebar Color</h6>

                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                        <label class="form-check-label" for="sidebar-color-light">Light</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                        <label class="form-check-label" for="sidebar-color-dark">Dark</label>
                    </div>
                    <div class="form-check sidebar-setting">
                        <input class="form-check-input" type="radio" name="sidebar-color"
                            id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                        <label class="form-check-label" for="sidebar-color-brand">Brand</label>
                    </div>

                    <h6 class="mt-4 mb-3 pt-2">Direction</h6>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-ltr" value="ltr">
                        <label class="form-check-label" for="layout-direction-ltr">LTR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="layout-direction"
                            id="layout-direction-rtl" value="rtl">
                        <label class="form-check-label" for="layout-direction-rtl">RTL</label>
                    </div>

                </div>

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        <!-- JAVASCRIPT -->
        <script src="{{ URL::asset('../../assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/feather-icons/feather.min.js') }}"></script>
        <!-- pace js -->
        <script src="{{ URL::asset('../../assets/libs/pace-js/pace.min.js') }}"></script>

        <!-- twitter-bootstrap-wizard js -->
        <script src="{{ URL::asset('../../assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

        <!-- form wizard init -->
        <script src="{{ URL::asset('../../assets/js/pages/form-wizard.init.js') }}"></script>

        <script src="{{ URL::asset('../../assets/js/app.js') }}"></script>
        <!-- apexcharts -->
        <script src="{{ URL::asset('../../assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <!-- Plugins js-->
        <script src="{{ URL::asset('../../assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ URL::asset('../../assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
        <!-- dashboard init -->
        <script src="{{ URL::asset('../../assets/js/pages/dashboard.init.js') }}"></script>
        @if (App::getLocale() == 'ar')
        <script>document.getElementById('layout-direction-rtl').click();</script>
        @else
        <script>document.getElementById('layout-direction-ltr').click();</script>
        @endif
        @toastr_js
        @toastr_render
    </body>


</html>