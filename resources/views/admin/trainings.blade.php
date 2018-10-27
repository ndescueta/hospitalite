@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Trainings and Seminar</h4>
                  </div>
                </div>
                <!-- Content -->
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
                                        <td><div class='btn-group'><button class='btn btn-success' onclick='viewEvent({{$selectEvent->intEventId}})'>View</button><button class='btn btn-warning' onclick='editEvent({{$selectEvent->intEventId}})'>Edit</button><button class='btn btn-danger' onclick='deleteEvent({{$selectEvent->intEventId}})'>Delete</button></div></td>
                                      </tr>
                                  @endforeach
                                  </table>
                                  <div class='float-right'>
                                  {{$selectEvents->links()}}
                                  </div>
                              @else
                                  There are currently no events.
                              @endif
                            </div>
                            <!-- Add Events -->
                            <a href="trainings/add" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
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





<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- SCRIPTS -->
<script>

  // function geocode(location) {
  //   axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
  //     params: {
  //       address: location,
  //     }
  //   }).then(function (response) {
  //     //KAILANGAN ILOG UNG FULL RESPONSE
  //     console.log(response);

  //     //GET LNG UNG FORMATTED NA ADDRESS
  //     console.log(response.data.results[0].formatted_address);
  //     alert("Full Adress: "+response.data.results[0].formatted_address);
  //     alert("Street: "+response.data.results[0].address_components[1].long_name);
  //     alert("Barangay: "+response.data.results[0].address_components[0].long_name);
  //   }).catch(function (error) {
  //     console.log(error);
  //   });
  // }

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
    content:"<form id='frmAddEvent' class='form-group form-material p-2'>"+
            "<div class='row'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventName'>Event Name <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='strEventName' id='eventName'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventStreet'>Event Street <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtEventStreet' id='eventStreet'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventBarangay'>Event Barangay <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtEventBarangay' id='eventBarangay' >"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventCity'>Event City <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtEventCity' id='eventCity' >"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventZip'>Event Zip Code <small>(Required)</small></label>"+
            "<input type='number' class='form-control' name='intEventZip' id='eventZip' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateStart'>Event Date Start <small>(Required)</small></label>"+
            "<input type='date' name='datDateStart' id='eventDateStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateEnd'>Event Date End <small>(Required)</small></label>"+
            "<input type='date' name='datDateEnd' id='eventDateEnd' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeStart'>Event Time Start <small>(Required)</small></label>"+
            "<input type='time' name='timTimeStart' id='eventTimeStart' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeEnd'>Event Time End <small>(Required)</small></label>"+
            "<input type='time' name='timTimeEnd' id='eventTimeEnd' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventCapacity'>Capacity <small>(Required)</small></label>"+
            "<input type='number' name='intEventCapacity' id='eventCapacity' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventPaymentDue'>Payment Due <small>(Required)</small></label>"+
            "<input type='date' name='datPaymentDue' id='eventPaymentDue' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Bank Account Number <small>(Required)</small></label>"+
            "<input name='stfEventBankAccount' id='eventAccountNo' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Payment Centre <small>(Required)</small></label>"+
            "<input name='strEventPaymentCenter' id='eventPaymentCenter' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Event Price <small>(Required)</small></label>"+
            "<input type='number' name='monEventPrice' id='eventPrice' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDescription'>Description <small>(Required)</small></label>"+
            "<textarea class='form-control' name='txtEventDescription' id='eventDescription' rows='5' ></textarea>"+
            "<input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />"+
            "</div>"+
            "</div>"+
            "</form>",
    buttons: {
      save: {
        text: "Save",
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////VALIDATION

          //CHECK EVENT NAME
          if(this.$content.find("#eventName").val() == "") {
            textEmpasis(document.getElementById("eventName").previousSibling);
            return false;
          }
          if(this.$content.find("#eventStreet").val() == "") {
            textEmpasis(document.getElementById("eventStreet").previousSibling);
            return false;
          }
          if(this.$content.find("#eventBarangay").val() == "") {
            textEmpasis(document.getElementById("eventBarangay").previousSibling);
            return false;
          }
          if(this.$content.find("#eventCity").val() == "") {
            textEmpasis(document.getElementById("eventCity").previousSibling);
            return false;
          }
          if(this.$content.find("#eventZip").val() == "" || this.$content.find("#eventZip").val().length < 3) {
            textEmpasis(document.getElementById("eventZip").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDateStart").val() == "") {
            textEmpasis(document.getElementById("eventDateStart").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDateEnd").val() == "") {
            textEmpasis(document.getElementById("eventDateEnd").previousSibling);
            return false;
          }
          if(this.$content.find("#eventTimeStart").val() == "") {
            textEmpasis(document.getElementById("eventTimeStart").previousSibling);
            return false;
          }
          if(this.$content.find("#eventTimeEnd").val() == "" ) {
            textEmpasis(document.getElementById("eventTimeEnd").previousSibling);
            return false;
          }
          if(this.$content.find("#eventCapacity").val() == "" || this.$content.find("eventCapacity").val() < 1) {
            textEmpasis(document.getElementById("eventCapacity").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPaymentDue").val() == "") {
            textEmpasis(document.getElementById("eventPaymentDue").previousSibling);
            return false;
          }
          if(this.$content.find("#eventAccountNo").val() == "") {
            textEmpasis(document.getElementById("eventAccountNo").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPaymentCenter").val() == "") {
            textEmpasis(document.getElementById("eventPaymentCenter").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPrice").val() == "") {
            textEmpasis(document.getElementById("eventPrice").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDescription").val() == "") {
            textEmpasis(document.getElementById("eventDescription").previousSibling);
            return false;
          }
          
          /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/addEvent')?>",
            method: 'post',
            data: this.$content.find("#frmAddEvent").serialize(),
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
            url: "/admin/viewEvent/"+ id,
            dataType: 'json',
            method: 'get'
        }).done(function (response) {
            var result = JSON.parse(JSON.stringify(response));
            self.setContent("<form id='frmEditEvent'class='form-group form-material p-2'>"+
            "<input type='hidden' name='intEventId' id='intEventId' value='"+id+"' />"+
            "<div class='row'>"+
            "<div class='form-group col-md-12'>"+
            "<label for='eventName'>Event Name</label>"+
            "<input type='text' class='form-control' name='strEventName' id='eventName' value='"+result[0].strEventName+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Street</label>"+
            "<input type='text' class='form-control' name='txtEventStreet' id='eventStreet' value='"+result[0].txtEventStreet+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Barangay</label>"+
            "<input type='text' class='form-control' name='txtEventBarangay' id='eventBarangay' value='"+result[0].txtEventBarangay+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event City</label>"+
            "<input type='text' class='form-control' name='txtEventCity' id='eventCity' value='"+result[0].txtEventCity+"'>"+
            "</div>"+
            "<div class='form-group col-md-3'>"+
            "<label for='eventLocation'>Event Zip Code</label>"+
            "<input type='text' class='form-control' name='intEventZip' id='eventZip' value='"+result[0].intEventZip+"' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateStart'>Event Date Start</label>"+
            "<input type='date' name='datDateStart' id='eventDateStart' class='form-control' value='"+result[0].datDateStart+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDateEnd'>Event Date End</label>"+
            "<input type='date' name='datDateEnd' id='eventDateEnd' class='form-control' value='"+result[0].datDateEnd+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeStart'>Event Time Start</label>"+
            "<input type='time' name='timTimeStart' id='eventTimeStart' class='form-control' value='"+result[0].timTimeStart+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventTimeEnd'>Event Time End</label>"+
            "<input type='time' name='timTimeEnd' id='eventTimeEnd' class='form-control' value='"+result[0].timTimeEnd+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventCapacity'>Capacity</label>"+
            "<input type='text' name='intEventCapacity' id='eventCapacity' class='form-control' value='"+result[0].intEventCapacity+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventPaymentDue'>Payment Due</label>"+
            "<input type='date' name='datPaymentDue' id='eventPaymentDue' class='form-control' value='"+result[0].datPaymentDue+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Bank Account Number</label>"+
            "<input name='stfEventBankAccount' id='eventAccountNo' class='form-control' value='"+result[0].stfEventBankAccount+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Payment Centre</label>"+
            "<input name='strEventPaymentCenter' id='eventPaymentCenter' class='form-control' value='"+result[0].strEventPaymentCenter+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label>Event Price</label>"+
            "<input type='number' name='monEventPrice' id='eventPrice' class='form-control' value='"+result[0].monEventPrice+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='eventDescription'>Description</label>"+
            "<textarea class='form-control' name='txtEventDescription' id='eventDescription' rows='5'>"+result[0].txtEventDescription+"</textarea>"+
            "<input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />"+
            "</div>"+
            "</div></form>");
        }).fail(function(){
            self.setContent('Something went wrong.');
        });
    },
    buttons: {
      save: {
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////VALIDATION

          //CHECK EVENT NAME
          if(this.$content.find("#eventName").val() == "") {
            textEmpasis(document.getElementById("eventName").previousSibling);
            return false;
          }
          if(this.$content.find("#eventStreet").val() == "") {
            textEmpasis(document.getElementById("eventStreet").previousSibling);
            return false;
          }
          if(this.$content.find("#eventBarangay").val() == "") {
            textEmpasis(document.getElementById("eventBarangay").previousSibling);
            return false;
          }
          if(this.$content.find("#eventCity").val() == "") {
            textEmpasis(document.getElementById("eventCity").previousSibling);
            return false;
          }
          if(this.$content.find("#eventZip").val() == "" || this.$content.find("#eventZip").val().length < 3) {
            textEmpasis(document.getElementById("eventZip").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDateStart").val() == "") {
            textEmpasis(document.getElementById("eventDateStart").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDateEnd").val() == "") {
            textEmpasis(document.getElementById("eventDateEnd").previousSibling);
            return false;
          }
          if(this.$content.find("#eventTimeStart").val() == "") {
            textEmpasis(document.getElementById("eventTimeStart").previousSibling);
            return false;
          }
          if(this.$content.find("#eventTimeEnd").val() == "" ) {
            textEmpasis(document.getElementById("eventTimeEnd").previousSibling);
            return false;
          }
          if(this.$content.find("#eventCapacity").val() == "" || this.$content.find("eventCapacity").val() < 1) {
            textEmpasis(document.getElementById("eventCapacity").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPaymentDue").val() == "") {
            textEmpasis(document.getElementById("eventPaymentDue").previousSibling);
            return false;
          }
          if(this.$content.find("#eventAccountNo").val() == "") {
            textEmpasis(document.getElementById("eventAccountNo").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPaymentCenter").val() == "") {
            textEmpasis(document.getElementById("eventPaymentCenter").previousSibling);
            return false;
          }
          if(this.$content.find("#eventPrice").val() == "") {
            textEmpasis(document.getElementById("eventPrice").previousSibling);
            return false;
          }
          if(this.$content.find("#eventDescription").val() == "") {
            textEmpasis(document.getElementById("eventDescription").previousSibling);
            return false;
          }

          // /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/editEvent')?>",
            method: 'post',
            data: this.$content.find("#frmEditEvent").serialize(),
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

//Delete Event
function deleteEvent(id) {
  // /////////////////AJAXX
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    icon: "ti-trash",
    title: "<h4 class='modal-title'></i>Delete Event</h4>",
    useBootstrap: false,
    content: "Are you sure you want to delete this event?",
    buttons: {
      confirm: {
        btnClass: "btn btn-primary",
        action: function () {
          $.ajax({
            url: "<?php echo url('admin/deleteEvent')?>",
            method: 'post',
            data: "intEventId="+id+"&_token=" + "{{csrf_token()}}",
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
      cancel: { }
    }
  });
  
}

//View Event 
function viewEvent(id) {
  var eventDescCont = document.getElementById("eventDescCont");
  eventDescCont.className = "text-center text-muted";
  eventDescCont.innerHTML = "<br><br><div class='spinner'><h1 class='display-2'><span class='ti-reload animated'></span></h1></div><h1>Loading...</h1>";
  $.ajax({
    url: "/admin/viewEvent/"+ id,
    dataType: 'json',
    method: 'get'
    }).done(function (data) {
      eventDescCont.className = "";
      var result = JSON.parse(JSON.stringify(data));
      eventDescCont.innerHTML = "<div><h3>"+result[0].strEventName+"</h3><br>"+
      "<div id='carouselExampleIndicators2' class='carousel slide' data-ride='carousel'>"+
"<ol class='carousel-indicators'>"+
"<li data-target='#carouselExampleIndicators2' data-slide-to='0' class='active'></li>"+
"<li data-target='#carouselExampleIndicators2' data-slide-to='1'></li>"+
"<li data-target='#carouselExampleIndicators2' data-slide-to='2'></li>"+
"</ol>"+
"<div class='carousel-inner' role='listbox'>"+
"<div class='carousel-item active'>"+
"<img class='img-responsive' src='"+ "{{ asset('eventImages/imageName') }}".replace("imageName", result[0].txtEventImage1) +"' alt='First slide'>"+
"</div>"+
"<div class='carousel-item'>"+
"<img class='img-responsive' src='"+ "{{ asset('eventImages/imageName') }}".replace("imageName", result[0].txtEventImage2) +"' alt='Second slide'>"+
"</div>"+
"<div class='carousel-item'>"+
"<img class='img-responsive' src='"+ "{{ asset('eventImages/imageName') }}".replace("imageName", result[0].txtEventImage3) +"' alt='Third slide'>"+
"</div>"+
"</div>"+
"<a class='carousel-control-prev' href='#carouselExampleIndicators2' role='button' data-slide='prev'>"+
"<span class='carousel-control-prev-icon' aria-hidden='true'></span>"+
"<span class='sr-only'>Previous</span>"+
"</a>"+
"<a class='carousel-control-next' href='#carouselExampleIndicators2' role='button' data-slide='next'>"+
"<span class='carousel-control-next-icon' aria-hidden='true'></span>"+
"<span class='sr-only'>Next</span>"+
"</a>"+
"</div><br>"+
      "<h5>"+result[0].txtEventDescription+"</h5><br><p><b>Street:</b> "+result[0].txtEventStreet+"<br><b>Barangay:</b> "+result[0].txtEventBarangay+"<br><b>City:</b> "+result[0].txtEventCity+"<br><b>Zip Code:</b> "+result[0].intEventZip+"</p></div>";
    }).fail(function (data) {
      alert("Something when Wrong");
    });
}

function textEmpasis(elem) {
  elem.focus();
  elem.style.color = "#FB9678";
  elem.className = "animated rubberBand";
  setTimeout(function(){
    elem.style.color = "black";
    elem.className = "";
  },1000);
}
</script>



@endsection