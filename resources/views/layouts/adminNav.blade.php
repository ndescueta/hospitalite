<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">
    <title>Elite Hospital Admin Template - Hospital admin dashboard web app kit</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="{{ asset('/assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('/assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('/dist/css/pages/dashboard1.css') }}" rel="stylesheet">
    <!-- JQUERY Confirm -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <!-- Animate CSS -->
    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('/css/all.css')}}">
    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        /* XL MODAL HACK */
        @media (min-width: 768px) {
            .modal-xl {
            width: 90%;
            max-width:1200px;
            }
        }
        /*SPIN ELEMENT (USE IN LOADING ICONS)*/
        .spinner {
            -webkit-animation: spin 1000ms infinite linear;
            animation: spin 1000ms infinite linear;
            color: 'red';
        }
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(-359deg);
                transform: rotate(-359deg);
            }
        }
        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(-359deg);
                transform: rotate(-359deg);
            }
        }
    </style>
</head>

<script src="{{ asset('/assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap popper Core JavaScript -->
<script src="{{ asset('assets/node_modules/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="{{ asset('assets/node_modules/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('assets/node_modules/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Popup message jquery -->
<script src="{{ asset('assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
<!-- jQuery peity -->
<script src="{{ asset('assets/node_modules/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/node_modules/peity/jquery.peity.init.js') }}"></script>
<script src="{{ asset('dist/js/dashboard1.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.dataTables.js')}}"></script>

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
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="{{ asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">
                          Hospitalite
                        </span></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    </ul>
                </div>
                <button type="button" onclick="window.location.href = '{{route('admin.logout')}}'" name="button" class="btn btn-link" style="color: white; margin-right: 30px;"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </nav>
        </header>

        <!-- Sidebar -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- <b>MAINTENANCE</b></li>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/homepage*') ? 'active' : '' }}" href="{{ url('admin/homepage') }}" aria-expanded="false"><i class="ti-world"></i><span class="hide-menu">Homepage</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/services*') ? 'active' : '' }}" href="{{ url('admin/services') }}" aria-expanded="false"><i class="ti-heart"></i><span class="hide-menu">Services</span></a>
                          <li> <a class="waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-thought"></i><span class="hide-menu">Inquiries</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/trainings*') ? 'active' : '' }}" href="{{ url('admin/trainings') }}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">Trainings and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Seminars</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/hospitalrequest*') ? 'active' : '' }}" href="{{ url('admin/hospitalrequest') }}" aria-expanded="false"><i class="ti-heart"></i><span class="hide-menu">Requests</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/hospitaldirector*') ? 'active' : '' }}" href="{{ url('admin/hospitaldirector') }}" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Hospital Directors</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('admin/hospital') ? 'active' : '' }}" href="{{ url('admin/hospital') }}" aria-expanded="false"><i class="ti-user"></i><span class="hide-menu">Hospitals</span></a>
                          <li> <a class="waves-effect waves-dark {{ Request::is('news*') ? 'active' : '' }}" href="{{ url('news') }}" aria-expanded="false"><i class="ti-agenda"></i><span class="hide-menu">News</span></a>
                          <li> <a class="waves-effect waves-dark  {{ Request::is('admin/faqs') ? 'active' : '' }}" href="{{ url('admin/faqs') }}" aria-expanded="false"><i class="ti-help"></i><span class="hide-menu">Faqs</span></a>
                          <li> <a class="waves-effect waves-dark" href="{{ url('adminAccount/edit') }}" aria-expanded="false"><i class="ti-settings"></i><span class="hide-menu">Admin Settings</span></a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>



        <div class="page-wrapper">
            <div class="container-fluid">

                <!-- //////////////////////////////Content -->

                  @yield('content')

                  @include('inc.messages')
                <main>

                </main>
            </div>
        </div>

        <footer class="footer">
            Underdogs - BSIT 4-1 - 2018
        </footer>
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
      CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>

</html>
