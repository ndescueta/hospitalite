@extends('layouts.hospNav')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Events</h4>
  </div>
</div>
<button onclick="location.href = '/hosp/seminars'" class = "btn btn-primary"> Go Back </button>
<div class="card card-body mt-3">
  <h4> Add Participants for: </h4>
  @foreach ($seminars as $seminar)
  <div class="col-md-12">
    <div class="img-fluid">
      <div class="row">
        <div class="col-md-6">
          <h5> Event Name: <b>{{$seminar->strEventName}}</b> </h5>
          <h6> Event Date: From <b>{{$seminar->datDateStart}}</b> to <b>{{$seminar->datDateEnd}} </b></h6>
          <h6> Payment Due <b>{{$seminar->datPaymentDue}}</b></h6>
          <h6> Event Address: <b>{{$seminar->txtEventStreet}} {{$seminar->txtEventBarangay}} {{$seminar->txtEventCity}}</b> Zip Code: <b>{{$seminar->intEventZip}}</b></h6>
        </div>
        <div class="col-md-6">
          <h6>Slots Left: <b>{{$seminar->intEventCapacity}}</b></h6>
          <h6>Payment: <b>{{$seminar->monEventPrice}}</b></h6>
          <h6>Bank Account: <b>{{$seminar->stfEventBankAccount}}</b></h6>
          <h6>Payment Center: <b>{{$seminar->strEventPaymentCenter}}</b></h6>
        </div>
      </div>
    </div>

  </div>
  @endforeach
</div>

<div id="participants">
 <div class='card'>
  <div class='card-body'>
      <form action="" method="post" class='form-group form-material p-2'>
      <div class="row">
        <div class = "form-group col-md-4">
          <label>First Name <small>(Required)</small></label>
          <input type='text' class='form-control' name='strParticipantFirstName' require/>
        </div>
        <div class = "form-group col-md-4">
          <label>Middle Name</label>
          <input type='text' class='form-control' name='strParticipantMiddleName' require/>
        </div>
        <div class = "form-group col-md-4">
          <label>Last Name <small>(Required)</small></label>
          <input type='text' class='form-control' name='strParticipantLastName' require/>
        </div>
      </div>

      <div class="row">
        <div class = "form-group col-md-2">
          <label>Sex <small>(Required)</small></label><br>
          <div class="custom-control custom-radio">
              <input type="radio" value='Male' id="customRadio1" name="stfParticipantSex" class="custom-control-input" require checked>
              <label class="custom-control-label" for="customRadio1">Male</label>
          </div>
          <div class="custom-control custom-radio">
              <input type="radio" value='Female' id="customRadio2" name="stfParticipantSex" class="custom-control-input" require>
              <label class="custom-control-label" for="customRadio2">Female</label>
            </div>

        </div>
        <div class = "form-group col-md-3">
          <label>Birth Date</label>
          <input type='date' name='datParticipantBirthday' class='form-control'/>
        </div>

        <div class = "form-group col-md-3">
          <label>Email Address <small>(Required)</small></label>
          <input type='text' name='txtParticipantEmailAddress' class='form-control'>
        </div>
        <div class = "form-group col-md-3">
          <label>Contact Number <small>(Required)</small></label>
          <input type='text' name='strParticipantContact' class='form-control'>
        </div>
        </div>
        <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />
      </form>
    </div>
  </div>

</div>

<div class='card'>
  <div class='card-body'>
  <button onclick="addParticipant()" class = "btn btn-primary mb-3 float-left"> Add Another Participant </button>
    <button class = "btn btn-primary mb-3 float-right" onclick="submitRequest()"> Submit </button>
  </div>
</div>


<script>
function addParticipant()
{
  var participant = document.getElementById("participants");
  var formParticipant = document.createElement("div");
  formParticipant.className = 'card';
  var radio1Id = makeid();
  var radio2Id = makeid();
  formParticipant.innerHTML = "<button class='btn btn-primary' style='border-radius: 5000px; width:35px;margin-left:-18px;margin-top:-10px;' onclick='removeParticipant(this)'>X</button><div class='card-body'><form action='' method='post' class='form-group form-material p-2'> <div class='row'> <div class = 'form-group col-md-4'> <label>First Name <small>(Required)</small></label> <input type='text' class='form-control' name='strParticipantFirstName' require/> </div> <div class = 'form-group col-md-4'> <label>Middle Name</label> <input type='text' class='form-control' name='strParticipantMiddleName' require/> </div> <div class = 'form-group col-md-4'> <label>Last Name <small>(Required)</small></label> <input type='text' class='form-control' name='strParticipantLastName' require/> </div> </div> <div class='row'> <div class = 'form-group col-md-2'> <label>Sex <small>(Required)</small></label><br> <div class='custom-control custom-radio'> <input type='radio' value='Male' id='"+radio1Id+"' name='stfParticipantSex' class='custom-control-input' checked> <label class='custom-control-label' for='"+radio1Id+"'>Male</label> </div> <div class='custom-control custom-radio'> <input type='radio' value='Female' id='"+radio2Id+"' name='stfParticipantSex' class='custom-control-input'> <label class='custom-control-label' for='"+radio2Id+"''>Female</label> </div> </div> <div class = 'form-group col-md-3'> <label>Birth Date</label> <input type='date' name='datParticipantBirthday' class='form-control'/> </div> <div class = 'form-group col-md-3'> <label>Email Address <small>(Required)</small></label> <input type='text' name='txtParticipantEmailAddress' class='form-control'> </div> <div class= 'form-group col-md-3'> <label>Contact Number <small>(Required)</small></label> <input type='text' name='strParticipantContact' class='form-control'> </div> </div> <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' /> </form> </div>";

  participant.appendChild(formParticipant);
}

function makeid() {
  var text = "";
  var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

  for (var i = 0; i < 5; i++)
    text += possible.charAt(Math.floor(Math.random() * possible.length));

  return text;
}

function removeParticipant(elem) {
  elem.parentNode.parentNode.removeChild(elem.parentNode);
}

function submitRequest() {
    //Validate Participant
    var inputs = document.getElementsByTagName("input");
    for (x=0;x<inputs.length;x++) {
      if(inputs[x].value == "" && inputs[x].name != 'strParticipantMiddleName' && inputs[x].name != 'datParticipantBirthday') {
        inputs[x].previousSibling.previousSibling.style.color = 'red';
        inputs[x].select();
        setTimeout(function(){inputs[x].previousSibling.previousSibling.style.color = '#462529'},1000)
        return;
      }
      else {
        //inputs[x].previousSibling.previousSibling.style.color = '#462529';
      }
    }
    var intEventId = "{{$seminar->intEventId}}";

    //Submit Request
    $.ajax({
        url: "{{ route('hospitalrequestShow.store') }}",
        method: 'post',
        data: "intEventId="+intEventId+"&_token=" + "{{csrf_token()}}",
        async: false,
        success: function (data) {
          //Submit Participant
          // ajax returns latestRequest
          var frmParticipants = document.getElementsByTagName("form");
          for (i=0;i<frmParticipants.length;i++) {
              $.ajax({
              url: "/admin/hospitalrequestShow/storeParticipants",
              method: 'post',
              data: $(frmParticipants[i]).serialize() + "&intRequestId=" + data,
              async: false,
              success: function (data) {
                window.location.href = "/hosp/seminars"
              },
              error: function (error) {
                console.log(error);
              }
            });
          }
        },
        error: function (error) {
          console.log(error);
        }
      });
}


</script>

@endsection
