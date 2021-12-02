<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="CRM">
    <meta name="author" content="Firdovsi Rustamov">
    <link rel="shortcut icon" href="{{asset('wafi/img/fav.png')}}"/>

    <!-- Title -->
    <title>{{ config('app.name', 'Blue Planet Distribution') }}</title>


    <!-- *************
        ************ Common Css Files *************
    ************ -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('wafi/css/bootstrap.min.css')}}">

    <!-- Icomoon Font Icons css -->
    <link rel="stylesheet" href="{{asset('wafi/fonts/style.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('wafi/css/main.css')}}">


    <!-- *************
        ************ Vendor Css Files *************
    ************ -->
    <!-- DateRange css -->
    <link rel="stylesheet" href="{{asset('wafi/vendor/daterange/daterange.css')}}"/>

    <!-- Chartist css -->
    <link rel="stylesheet" href="{{asset('wafi/vendor/chartist/css/chartist.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('wafi/vendor/chartist/css/chartist-custom.css')}}"/>

    @yield('page-level-styles')
</head>
<body>

<!-- Loading starts -->
<div id="loading-wrapper">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Loading ends -->


<!-- *************
    ************ Header section start *************
************* -->

<!-- Header start -->
@include('components.header')
<!-- Header end -->

<!-- Screen overlay start -->
<div class="screen-overlay"></div>
<!-- Screen overlay end -->

<!-- Quicklinks box start -->
<div class="quick-links-box">
    <div class="quick-links-header">
        Quick Links
        <a href="#" class="quick-links-box-close">
            <i class="icon-circle-with-cross"></i>
        </a>
    </div>

    <div class="quick-links-wrapper">
        <div class="fullHeight">
            <div class="quick-links-body">
                <div class="container-fluid p-0">
                    <div class="row less-gutters">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <a href="documents.html" class="quick-tile blue">
                                <i class="icon-documents"></i>
                                Companies
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <a href="crm-dashboard.html" class="quick-tile secondary">
                                <i class="icon-book-open"></i>
                                Employees
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quicklinks box end -->

<!-- *************
    ************ Header section end *************
************* -->

<!-- Container fluid start -->
<div class="container-fluid">

    <!-- Navigation start -->
@include('components.navbar')
<!-- Navigation end -->

    <!-- *************
        ************ Main container start *************
    ************* -->
    <div class="main-container">

    @yield('header')

    <!-- Content wrapper start -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- Content wrapper end -->
    </div>
    <!-- *************
        ************ Main container end *************
    ************* -->

    <!-- Footer start -->
    <footer class="main-footer">© Blue Planet Distribution 2021</footer>
    <!-- Footer end -->

</div>
<!-- Container fluid end -->

<!-- *************
    ************ Required JavaScript Files *************
************* -->
<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="{{asset('wafi/js/jquery.min.js')}}"></script>
<script src="{{asset('wafi/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('wafi/js/moment.js')}}"></script>


<!-- *************
    ************ Vendor Js Files *************
************* -->
<!-- Slimscroll JS -->
{{--<script src="{{asset('wafi/vendor/slimscroll/slimscroll.min.js')}}"></script>--}}
{{--<script src="{{asset('wafi/vendor/slimscroll/custom-scrollbar.js')}}"></script>--}}

<!-- Daterange -->
<script src="{{asset('wafi/vendor/daterange/daterange.js')}}"></script>
<script src="{{asset('wafi/vendor/daterange/custom-daterange.js')}}"></script>

<!-- Apex Charts -->
<script src="{{asset('wafi/vendor/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('wafi/vendor/apex/helpdesk-dashboard/tickets.js')}}"></script>
<script src="{{asset('wafi/vendor/apex/helpdesk-dashboard/support-requests.js')}}"></script>
<script src="{{asset('wafi/vendor/apex/helpdesk-dashboard/complaints.js')}}"></script>
<script src="{{asset('wafi/vendor/apex/helpdesk-dashboard/traffic-analysis.js')}}"></script>
<script src="{{asset('wafi/vendor/apex/helpdesk-dashboard/cost-per-support.js')}}"></script>

<!-- Rating JS -->
<script src="{{asset('wafi/vendor/rating/raty.js')}}"></script>
<script src="{{asset('wafi/vendor/rating/raty-custom.js')}}"></script>

<!-- Main Js Required -->
<script src="{{asset('wafi/js/main.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>
<!-- Container end -->
@yield('page-level-scripts')
</body>
</html>
