<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
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
<header class="header">
    <div class="logo-wrapper py-3">
        <a href="index.html" class="logo">
            <img src="{{asset('wafi/img/logo.png')}}" alt="Wafi Admin Dashboard"/>
        </a>
    </div>
</header>
<!-- Header end -->

<!-- Screen overlay start -->
<div class="screen-overlay"></div>
<!-- Screen overlay end -->

<!-- *************
    ************ Header section end *************
************* -->

<!-- Container fluid start -->
<div class="container-fluid">

    <!-- *************
        ************ Main container start *************
    ************* -->
    <div class="main-container">

        <!-- Content wrapper start -->
    @yield('content')
    <!-- Content wrapper end -->

    </div>
    <!-- *************
        ************ Main container end *************
    ************* -->

    <!-- Footer start -->
    <footer class="main-footer d-flex align-content-center">© Blue Planet Distribution 2021</footer>
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
<script src="{{asset('wafi/vendor/slimscroll/slimscroll.min.js')}}"></script>
<script src="{{asset('wafi/vendor/slimscroll/custom-scrollbar.js')}}"></script>

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

</body>
</html>
