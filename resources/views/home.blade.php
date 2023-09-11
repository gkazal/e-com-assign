<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="    {{ asset('dashboard/assets') }}" data-template="vertical-menu-template-free">

<head>



    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="    {{ asset('dashboard/assets/img/favicon/favicon.ico') }}
" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="    {{ asset('dashboard/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="    {{ asset('dashboard/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />

    <link rel="stylesheet" href="    {{ asset('dashboard/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />

    <link rel="stylesheet" href="    {{ asset('dashboard/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="    {{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="    {{ asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css') }} " />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="    {{ asset('dashboard/assets/vendor/js/helpers.js') }} "></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="    {{ asset('dashboard/assets/js/config.js') }}
                                                                                        "></script>
</head>
<?php
$currentControllerName = Request::segment(2);
// dd($currentControllerName);
?>


<body>


    <div class="layout-wrapper layout-content-navbar">


        <div class="layout-container">
            <!-- Menu -->


            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">

                        <span class="app-brand-text demo menu-text fw-bolder ms-2">E-Com</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                {{-- Sidebar --}}

                <ul class="menu-inner py-1">
                    <!-- User Login Dashboard -->

                    {{-- @if (Auth::check() && Auth::user()->user_type == 'user')
                        <li class="menu-item {{ $currentControllerName == 'dashboard' || '' ? 'active' : '' }}">
                            <a href="{{ route('frontend.homepage') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics"> Dashboard</div>
                            </a>
                        </li>
 --}}


                        <!-- Admin Login Dashboard -->
                    @if (Auth::check() && Auth::user()->user_type == 'admin')
                        <li class="menu-item {{ $currentControllerName == 'dashboard' || '' ? 'active' : '' }}">
                            <a href="" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">  Dashboard</div>
                            </a>
                        </li>
                        <li class="menu-item  {{ $currentControllerName == 'user' ? 'active' : '' }}">
                            <a href="{{ route('admin.user.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Users</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $currentControllerName == 'product' ? 'active' : '' }}">
                            <a href="{{ route('admin.product.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Products</div>
                            </a>
                        </li>

                        <li class="menu-item {{ $currentControllerName == 'category' ? 'active' : '' }}">
                            <a href="{{ route('admin.category.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">Categories</div>
                            </a>
                        </li>
                        <li class="menu-item {{ $currentControllerName == 'pending-orders' ? 'active' : '' }}">
                            <a href="{{ route('admin.order.pendingorders') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                                <div data-i18n="Analytics">pending orders</div>
                            </a>
                        </li>
                    @endif

                    {{-- Sidebar --}}



                    <!-- Components -->

                </ul>
            </aside>
            <!-- / Menu -->



            <div class="layout-page">


                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                                    aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">
                                <a class="github-button"
                                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                            </li>

                            <!-- User -->
                            {{-- @if (Auth::check()) --}}
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="    {{ asset('dashboard/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('dashboard/assets/img/avatars/1.png') }}"
                                                            alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                {{-- check user or admin --}}
                                                @if (Auth::check() && Auth::user()->user_type == 'admin')
                                                    <div class="flex-grow-1">
                                                        <h6>Hello, {{ Auth::user()->name }}</h6>
                                                        <p class="text-muted">Your are
                                                            {{ Auth::user()->user_type }}
                                                        </p>
                                                    </div>
                                                {{-- @elseif (Auth::check() && Auth::user()->user_type == 'admin')
                                                    <div class="flex-grow-1">
                                                        <h6>Hello, {{ Auth::user()->name }}</h6>
                                                        <p class="text-muted">Your are
                                                            {{ Auth::user()->user_type }}
                                                        </p>
                                                    </div> --}}
                                                @endif


                                            </div>
                                        </a>
                                    </li>

                                    {{-- <li>
                                        <div class="dropdown-divider"></div>
                                    </li> --}}

                                    <li>
                                        {{-- @if (Auth::check() && Auth::user()->user_type == 'user')
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form> --}}
                                        @if (Auth::check() && Auth::user()->user_type == 'admin')
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                        @else
                                            @csrf
                                            <a class="dropdown-item " href="{{ route('login') }}">LogIn</a>
                                        @endif
                                    </li>
                                </ul>

                            </li>

                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->



                <!-- content wrapper -->

                <div class="content-wrapper">
                    @yield('user')
                    @yield('products')
                    @yield('category')
                    @yield('homepage')
                    @yield('orders')

                </div>



                <!-- content wrapper -->

            </div>



            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->


        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script
            src="    {{ asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}
                                                                                                                                                        ">
        </script>
        <script
            src="    {{ asset('dashboard/assets/vendor/libs/popper/popper.js') }}
                                                                                                                                                        ">
        </script>
        <script
            src="    {{ asset('dashboard/assets/vendor/js/bootstrap.js') }}
                                                                                                                                                        ">
        </script>
        <script
            src="    {{ asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}
                                                                                                                                                        ">
        </script>

        <script
            src="    {{ asset('dashboard/assets/vendor/js/menu.js') }}
                                                                                                                                                        ">
        </script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script
            src="    {{ asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}
                                                                                                                                                        ">
        </script>

        <!-- Main JS -->
        <script
            src="    {{ asset('dashboard/assets/js/main.js') }}
                                                                                                                                                        ">
        </script>

        <!-- Page JS -->
        <script
            src="    {{ asset('dashboard/assets/js/dashboards-analytics.js') }}
                                                                                                                                                        ">
        </script>

        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
