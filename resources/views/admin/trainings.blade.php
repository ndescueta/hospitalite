@extends ('layouts.adminNav')

@section('content')
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
@endsection
