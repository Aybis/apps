<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | Apps</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Aybis" name="description" />
        <meta content="Kontrak" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/logo-trans-min.png') }}">
        <!-- App css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
        <link href="{{ asset('assets/css/app-modern-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
        <style>
           .left-side-menu{
               position: fixed;
               margin-top: 80px;
           }
        </style>
        @yield('stylesheet')

    </head>

    <body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>

        <!-- Topbar Start -->
        @include('layouts.incl-admin.header')
        <!-- end Topbar -->

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                @include('layouts.incl-admin.sidebar')

                <div class="content-page">
                    <div class="content">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="form-inline">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb bg-light-lighten p-2 mb-0">
                                                    <li class="breadcrumb-item"><a href="#"><i class="uil-home-alt"></i> Home</a></li>
                                                    @yield('breadcumb')
                                                </ol>
                                            </nav>
                                        </form>
                                    </div>
                                    <h4 class="page-title">@yield('pageTitle')</h4>
                                </div>
                            </div>
                        </div>  <!-- end page title -->

                        <!-- main content -->
                            @yield('contents')
                        <!-- end main content -->

                    </div> <!-- End Content -->

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    2018 © Kontrak - GloryHorsePower
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right footer-links d-none d-md-block">
                                        <a href="javascript: void(0);">About</a>
                                        <a href="javascript: void(0);">Support</a>
                                        <a href="javascript: void(0);">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer> <!-- end Footer -->

                </div> <!-- content-page -->

            </div> <!-- end wrapper-->
        </div>
        <!-- END Container -->



        <!-- Script  -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        <script>
            let urlWindow = window.location;
            // for sidebar menu but not for treeview submenu
            $('ul.metismenu side-nav a').filter(function() {
                return this.href == url;
            }).parent().siblings().removeClass('active').end().addClass('active');
            // for treeview which is like a submenu
            $('ul.side-nav-item a').filter(function() {
                return this.href == url;
            }).parentsUntil(".metismenu side-nav > .side-nav-item").siblings().removeClass('active').end().addClass('active');


        </script>
        <!-- External Script -->
        @yield('scripts')

    </body>
</html>
