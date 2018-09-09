<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
@include('layouts.reqScript')
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
                <div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Homepage</h4>
                  </div>
                </div>
                <!-- //////////////////////////////Content -->
                <iframe src="/admin/homepageView" class="container-fluid" style="height: 500px; padding: 0;" >
</iframe>
            </div>
        </div>
        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>
</body>

</html>
