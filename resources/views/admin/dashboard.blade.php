<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="skin-megna fixed-layout">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite Hospital</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- topbar -->
        @include('layouts.topbar')
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
            <!-- //////////////////////////////Content -->
            </div>
        </div>
        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>
@include('layouts.reqScript')
</body>

</html>