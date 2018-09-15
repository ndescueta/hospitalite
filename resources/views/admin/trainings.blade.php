@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Trainings and Seminar</h4>
    </div>
<<<<<<< HEAD
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
                              @if(count($selectEvents) > 0) 
                                  <table class='table'>
                                  <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                  @foreach($selectEvents as $selectEvent)
                                      <tr onclick='displayEvent()'>
                                        <td style='display: none'>{{$selectEvent->intEventId}}</td>
                                        <td>{{$selectEvent->strEventName}}</td>
                                        <td>{{$selectEvent->datPaymentDue}}</td>
                                        <td>In {{$selectEvent->status}} days</td>
                                        <td><div class='btn-group'><button class='btn btn-success'>View</button><button class='btn btn-warning' onclick='editEvent({{$selectEvent->intEventId}})'>Edit</button><button class='btn btn-danger'>Delete</button></div></td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  no records    
                              @endif
                            </div>
                            <!-- Add Events -->
                            <a href="#" onclick="addEvent()" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
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
=======
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
>>>>>>> 1cd5744fc11a4f36eadcaafc4d8b264868f0ed12

              </div>
              <!-- Add Events -->
              <a href="#" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                <i class="ti-plus"></i> Add New Event
              </a>
            </div>
          </div>
        </div>
<<<<<<< HEAD
        <footer class="footer">
            @include('layouts.footer')
        </footer>
    </div>
@include('layouts.reqScript')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- SCRIPTS -->
<script>

  function geocode(location) {
    axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
      params: {
        address: location,
      }
    }).then(function (response) {
      //KAILANGAN ILOG UNG FULL RESPONSE
      console.log(response);

      //GET LNG UNG FORMATTED NA ADDRESS
      console.log(response.data.results[0].formatted_address);
      alert("Full Adress: "+response.data.results[0].formatted_address);
      alert("Street: "+response.data.results[0].address_components[1].long_name);
      alert("Barangay: "+response.data.results[0].address_components[0].long_name);
    }).catch(function (error) {
      console.log(error);
    });
  }

//Display Event Info
function displayEvent() {
  
}

//Add Event
function addEvent() {
  $.confirm({
    theme: "bootstrap",
    animateFromElement: false,
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Add Event</h4>",
    boxWidth: '90%',
    useBootstrap: false,  
    content:"<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventName'>Event Name</label>"+
            "<input type='text' class='form-control' name='eventName' id='eventName'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Street</label>"+
            "<input type='text' class='form-control' name='eventStreet' id='eventStreet'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Barangay</label>"+
            "<input type='text' class='form-control' name='eventBarangay' id='eventBarangay' >"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event City</label>"+
            "<input type='text' class='form-control' name='eventCity' id='eventCity' >"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Zip Code</label>"+
            "<input type='text' class='form-control' name='eventZip' id='eventZip' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateStart'>Event Date Start</label>"+
            "<input type='date' name='eventDateStart' id='eventDateStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateEnd'>Event Date End</label>"+
            "<input type='date' name='eventDateEnd' id='eventDateEnd' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeStart'>Event Time Start</label>"+
            "<input type='time' name='eventTimeStart' id='eventTimeStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeEnd'>Event Time Start</label>"+
            "<input type='time' name='eventTimeEnd' id='eventTimeEnd' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventCapacity'>Capacity</label>"+
            "<input type='text' name='eventCapacity' id='eventCapacity' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventPaymentDue'>Payment Due</label>"+
            "<input type='date' name='eventPaymentDue' id='eventPaymentDue' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Bank Account Number</label>"+
            "<input name='eventAccountNo' id='eventAccountNo' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Payment Centre</label>"+
            "<input name='eventPaymentCenter' id='eventPaymentCenter' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Event Price</label>"+
            "<input name='eventPaymentCenter' id='eventPrice' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDescription'>Description</label>"+
            "<textarea class='form-control' name='eventDescription' id='eventDescription' rows='5' ></textarea>"+
            "</div>"+
            "</div></form>", 
    buttons: {
      save: {
        btnClass: "btn btn-primary",
        action: function () {
          $.ajax({
            url: "<?php echo url('admin/addEvent')?>",
            method: 'post',
            data: "strEventName="+ this.$content.find("#eventName").val() +"&txtEventStreet="+this.$content.find("#eventStreet").val()+"&txtEventBarangay="+this.$content.find("#eventBarangay").val()+"&txtEventCity="+this.$content.find("#eventCity").val()+"&intEventZip="+this.$content.find("#eventZip").val()+"&txtEventDescription="+this.$content.find("#eventDescription").val()+"&intEventCapacity="+this.$content.find("#eventCapacity").val()+"&monEventPrice="+this.$content.find("#eventPrice").val()+ "&stfEventBankAccount="+this.$content.find("#eventAccountNo").val()+"&strEventPaymentCenter="+this.$content.find("#eventPaymentCenter").val()+"&datPaymentDue=" + this.$content.find("#eventPaymentDue").val()+"&datDateStart="+this.$content.find("#eventDateStart").val()+"&datDateEnd="+this.$content.find("#eventDateEnd").val()+"&timTimeStart="+this.$content.find("#eventTimeStart").val()+"&timTimeEnd="+this.$content.find("#eventTimeEnd").val()+"&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              window.location.href = "/admin/trainings";
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}

//Edit Event Info
function editEvent(id) {
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Edit Event</h4>",
    boxWidth: '90%',
    useBootstrap: false,
    content: function () {
        var self = this;
        return $.ajax({
            url: "/admin/getModalEditEvent/"+ id,
            dataType: 'json',
            method: 'get'
        }).done(function (response) {
            var result = JSON.parse(JSON.stringify(response));
            self.setContent("<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventName'>Event Name</label>"+
            "<input type='text' class='form-control' name='eventName' id='eventName' value='"+result[0].strEventName+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Street</label>"+
            "<input type='text' class='form-control' name='eventStreet' id='eventStreet' value='"+result[0].txtEventStreet+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Barangay</label>"+
            "<input type='text' class='form-control' name='eventBarangay' id='eventBarangay' value='"+result[0].txtEventBarangay+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event City</label>"+
            "<input type='text' class='form-control' name='eventCity' id='eventCity' value='"+result[0].txtEventCity+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Zip Code</label>"+
            "<input type='text' class='form-control' name='eventZip' id='eventZip' value='"+result[0].intEventZip+"' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateStart'>Event Date Start</label>"+
            "<input type='date' name='eventDateStart' id='eventDateStart' class='form-control' value='"+result[0].datDateStart+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateEnd'>Event Date End</label>"+
            "<input type='date' name='eventDateEnd' id='eventDateEnd' class='form-control' value='"+result[0].datDateEnd+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeStart'>Event Time Start</label>"+
            "<input type='time' name='eventTimeStart' id='eventTimeStart' class='form-control' value='"+result[0].timTimeStart+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeEnd'>Event Time End</label>"+
            "<input type='time' name='eventTimeEnd' id='eventTimeEnd' class='form-control' value='"+result[0].timTimeEnd+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventCapacity'>Capacity</label>"+
            "<input type='text' name='eventCapacity' id='eventCapacity' class='form-control' value='"+result[0].intEventCapacity+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventPaymentDue'>Payment Due</label>"+
            "<input type='date' name='eventPaymentDue' id='eventPaymentDue' class='form-control' value='"+result[0].datPaymentDue+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Bank Account Number</label>"+
            "<input name='eventAccountNo' id='eventAccountNo' class='form-control' value='"+result[0].stfEventBankAccount+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Payment Centre</label>"+
            "<input name='eventPaymentCenter' id='eventPaymentCenter' class='form-control' value='"+result[0].strEventPaymentCenter+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Event Price</label>"+
            "<input type='number' name='eventPrice' id='eventPrice' class='form-control' value='"+result[0].monEventPrice+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDescription'>Description</label>"+
            "<textarea class='form-control' name='eventDescription' id='eventDescription' rows='5'>"+result[0].txtEventDescription+"</textarea>"+
            "</div>"+
            "</div></form>");
        }).fail(function(){
            self.setContent('Something went wrong.');
        });
    },  
    buttons: {
      save: {
        btnClass: "btn btn-primary",
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}
</script>


</body>
=======
      </div>
      <!-- EVENT DESCRIPTION -->
      <div class="col-lg-6">
        <div class="card-body b-l calender-sidebar">
          <div class='text-center text-muted' id='eventDescCont'>
          <br><br>
            <i class='fas fa-calendar-alt fa-5x'></i><br><br>
            <p>No Event Selected</p>
>>>>>>> 1cd5744fc11a4f36eadcaafc4d8b264868f0ed12

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
