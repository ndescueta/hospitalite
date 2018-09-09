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
                <div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Trainings and Seminar</h4>
                  </div>
                </div>
                <!-- //////////////////////////////Content -->
                <div class="card">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="card-body">
                        <h4 class="card-title m-t-10">Current Events</h4>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- events table -->
                            <div id="events">

                            </div>
                            <!-- Add Events -->
                            <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Event
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- EVENT DESCRIPTION -->
                    <div class="col-lg-6">
                      <div class="card-body b-l calender-sidebar">
                        <div class='text-center text-muted' id='eventDescCont'>
                        <br><br>
                          <i class='fas fa-calendar-alt fa-5x'></i><br><br>
                          <p>No Event Selected</p>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>
@include('layouts.reqScript')
</body>

</html>
