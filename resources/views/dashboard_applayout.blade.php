<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    @yield('additional_links')
  <title>{{ env('APP_NAME') }}</title>
  @if(Auth::user()->roles->pluck('name')->first() == 'user')
    <style>
        .btn-secondary,.btn-primary {
            color: #fff;
            background-color: linear-gradient(to bottom, #4557b3, #5969ff);
            border-color: #324dad;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: linear-gradient(to bottom, #2b3774, #4e5cdf);
            border-color: #293e8a;
        }
        .sidebar-dark {
            background: linear-gradient(to bottom, #4557b3, #5969ff);        }
        .sidebar-dark.nav-left-sidebar .navbar-nav .nav-link.active {
            background-color: #fff;
            color: #7d7d87;
        }
        .navbar-brand {font-size: 22px;
             color: #3f5cc6;}
        .dark.nav-left-sidebar .navbar-nav .nav-link.active {
            background: linear-gradient(to bottom, #9face9, #727aa5);
        }
        .border-top-primary {
            border-top-color: #5969ff !important;
        }
        .border-brand {
            border-color: #ffc750 !important;
        }
    </style>
     @else
    <style>
        .btn-secondary,.btn-primary {
            color: #fff;
            background-color: linear-gradient(to bottom, #7880a7, #171a38);
            border-color: #324dad;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: linear-gradient(to bottom, #2b3774, #4e5cdf);
            border-color: #293e8a;
        }

        .navbar-brand {font-size: 22px;
            color: #7880a7;}
        .border-top-primary {
            border-top-color: #7880a7 !important;
        }
        .border-brand {
            border-color: #ffc750 !important;
        }
        .sidebar-dark {
            background: linear-gradient(to bottom, #0e0c28, #222849);
        }
    </style>

@endif


</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- Include the header partial -->
        @include('layouts.dashboard_partials.header')

        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">

                <!-- Include the navigation -->

                @include('layouts.dashboard_partials.navigation')
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content">
                    <!-- Include the page content -->
                    @yield('content')
                </div>
            </div>

            <!-- Include the footer partial -->
            @include('layouts.dashboard_partials.footer')
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>

    <script src="{{ asset('assets/libs/js/dashboard-ecommerce.js') }}"></script>
    @yield('scripts')
</body>

</html>
