@extends('dashboard_applayout')
@section('additional_links')

@endsection
@section('content')
<div class="container-fluid dashboard-content ">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h3 class="mb-2">Task Management Dashboard </h3>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Stats</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- profile -->
        <!-- ============================================================== -->
        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- card profile -->
            <!-- ============================================================== -->
            <div class="card">
                <div class="card-body">
                    <div class="user-avatar text-center d-block">
                        <img src="assets/images/avatar.png" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                    </div>
                    <div class="text-center">
                        <h2 class="font-24 mb-0">{{Auth()->user()->name}}</h2>
                        <p>Adminastration of the System</p>
                    </div>
                </div>
                <div class="card-body border-top">
                    <h3 class="font-16">Contact Information</h3>
                    <div class="">
                        <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i>{{ Auth()->user()->email }}</li>
                        <li class="mb-0"><i class="fas fa-fw fa-phone mr-2"></i>(900) 123 4567</li>
                    </ul>
                    </div>
                </div>

                <div class="card-body border-top">
                    <h3 class="font-16">Social Channels</h3>
                    <div class="">
                        <ul class="mb-0 list-unstyled">
                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-facebook-square mr-1 facebook-color"></i>fb.me/michaelchristy</a></li>
                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-twitter-square mr-1 twitter-color"></i>twitter.com/michaelchristy</a></li>
                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-instagram mr-1 instagram-color"></i>instagram.com/michaelchristy</a></li>
                        <li class="mb-1"><a href="#"><i class="fas fa-fw fa-rss-square mr-1 rss-color"></i>michaelchristy.com/blog</a></li>
                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-pinterest-square mr-1 pinterest-color"></i>pinterest.com/michaelchristy</a></li>
                        <li class="mb-1"><a href="#"><i class="fab fa-fw fa-youtube mr-1 youtube-color"></i>youtube/michaelchristy</a></li>
                    </ul>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- end card profile -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end profile -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- campaign data -->
        <!-- ============================================================== -->
        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
            <!-- ============================================================== -->
            <!-- campaign tab one -->
            <!-- ============================================================== -->
            <div class="influence-profile-content pills-regular">

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block">
                                    <h3 class="section-title">Task Management Dashboard</h3>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="mb-1">11</h1>
                                        <p>Total Users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="mb-1">10</h1>
                                        <p>Templates Project</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="mb-1">8</h1>
                                        <p>Project Tasks</p>
                                    </div>
                                </div>
                            </div>

                        </div>


                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end campaign tab one -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end campaign data -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection
