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

                <!-- //////////////////////////////Content -->
                  @include('inc.messages')
                  @yield('content')
                <main>

                </main>
            </div>
        </div>

        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>

</html>
