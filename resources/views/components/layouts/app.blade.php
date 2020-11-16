<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }} {{ $subTitle }} | Apps</title>
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
        .left-side-menu {
            position: fixed;
            margin-top: 80px;
        }
    </style>

    @stack('styling')

</head>

<body class="loading" data-layout="detached"
    data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>

    <!-- Topbar Start -->
    <x-includes.header></x-includes.header>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">

            <!-- Sidebar -->
            <x-includes.sidebar></x-includes.sidebar>


            <div class="content-page">
                <div class="content">

                    <!-- main content -->
                      {{ $slot }}
                    <!-- end main content -->

                </div> <!-- End Content -->

              <x-includes.footer></x-includes.footer>
                

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
        $('ul.metismenu side-nav a').filter(function () {
            return this.href == url;
        }).parent().siblings().removeClass('active').end().addClass('active');
        // for treeview which is like a submenu
        $('ul.side-nav-item a').filter(function () {
            return this.href == url;
        }).parentsUntil(".metismenu side-nav > .side-nav-item").siblings().removeClass('active').end().addClass(
            'active');
    </script>
    <!-- External Script -->
    @stack('scripts')

</body>

</html>
