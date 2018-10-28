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

    <div id="participants">
      <hr class="mr-3">
      {!! Form::open(['action' => 'HospitalController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="row">
        <div class = "form-group col-md-4">
          {{Form::label('ParticipantFirstName', 'First Name')}}
          {{Form::text('ParticipantFirstName', '', ['class' => 'form-control', 'placeholder' => 'Participant First Name'])}}
        </div>
        <div class = "form-group col-md-4">
          {{Form::label('ParticipantMiddleName', 'Middle Name')}}
          {{Form::text('ParticipantMiddleName', '', ['class' => 'form-control', 'placeholder' => 'Participant Middle Name'])}}
        </div>
        <div class = "form-group col-md-4">
          {{Form::label('ParticipantLastName', 'Last Name')}}
          {{Form::text('ParticipantLastName', '', ['class' => 'form-control', 'placeholder' => 'Participant Last Name'])}}
        </div>
      </div>

      <div class="row">
        <div class = "form-group col-md-6">
          {{Form::label('ParticipantSex', 'Sex')}} <br>
          {{Form::label('ParticipantSex', 'Male')}}
          {!! Form::radio('ParticipantSex', 'Sex', true) !!}
          {{Form::label('ParticipantSex', 'Female')}}
          {!! Form::radio('ParticipantSex', 'Sex', false) !!}
        </div>
        <div class = "form-group col-md-6">
          {{Form::label('ParticipantBirthDate', 'Birth Date')}} <br>
          {{Form::date('ParticipantBirthDate', \Carbon\Carbon::now())}}
        </div>
      </div>

      <div class="row">
        <div class = "form-group col-md-6">
          {{Form::label('ParticipantEmailAddress', 'Email Address')}}
          {{Form::text('ParticipantEmailAddress', '', ['class' => 'form-control', 'placeholder' => 'Participant Email Address'])}}
        </div>
        <div class = "form-group col-md-6">
          {{Form::label('ParticipantContact', 'Contact Number')}}
          {{Form::text('ParticipantContact', '', ['class' => 'form-control', 'placeholder' => 'Participant Contact Number'])}}
        </div>
      </div>

      <hr class="mr-3">
      {!! Form::close() !!}
    </div>

    <button onclick="addParticipant()" class = "btn btn-primary mb-3 float-left"> Add Another Participant </button>
    <button onclick="#" class = "btn btn-primary mb-3 float-right"> Submit </button>


  </div>
  @endforeach
</div>
@endsection


<script>
function addParticipant()
{
  var participant = document.getElementById("participants");
  var formParticipant = document.createElement("form");
  formParticipant.innerHTML = "{!! Form::open(['action' => 'HospitalController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}"+
  "<div class='row'>"+
  "<div class = 'form-group col-md-4'>"+
  "{{Form::label('ParticipantFirstName', 'First Name')}}"+
  "{{Form::text('ParticipantFirstName', '', ['class' => 'form-control', 'placeholder' => 'Participant First Name'])}}"+
  "</div>"+
  "<div class = 'form-group col-md-4'>"+
  "{{Form::label('ParticipantMiddleName', 'Middle Name')}}"+
  "{{Form::text('ParticipantMiddleName', '', ['class' => 'form-control', 'placeholder' => 'Participant Middle Name'])}}"+
  "</div>"+
  "<div class = 'form-group col-md-4'>"+
  "{{Form::label('ParticipantLastName', 'Last Name')}}"+
  "{{Form::text('ParticipantLastName', '', ['class' => 'form-control', 'placeholder' => 'Participant Last Name'])}}"+
  "</div>"+
  "</div>"+
  ""+
  "<div class='row'>"+
  "<div class = 'form-group col-md-6'>"+
  "{{Form::label('ParticipantSex', 'Sex')}} <br>"+
  "{{Form::label('ParticipantSex', 'Male')}}"+
  "{!! Form::radio('ParticipantSex', 'Sex', true) !!}"+
  "{{Form::label('ParticipantSex', 'Female')}}"+
  "{!! Form::radio('ParticipantSex', 'Sex', false) !!}"+
  "</div>"+
  "<div class = 'form-group col-md-6'>"+
  "{{Form::label('ParticipantBirthDate', 'Birth Date')}} <br>"+
  "{{Form::date('ParticipantBirthDate', \Carbon\Carbon::now())}}"+
  "</div>"+
  "</div>"+
  ""+
  "<div class='row'>"+
  "<div class = 'form-group col-md-6'>"+
  "{{Form::label('ParticipantEmailAddress', 'Email Address')}}"+
  "{{Form::text('ParticipantEmailAddress', '', ['class' => 'form-control', 'placeholder' => 'Participant Email Address'])}}"+
  "</div>"+
  "<div class = 'form-group col-md-6'>"+
  "{{Form::label('ParticipantContact', 'Contact Number')}}"+
  "{{Form::text('ParticipantContact', '', ['class' => 'form-control', 'placeholder' => 'Participant Contact Number'])}}"+
  "</div>"+
  "</div>"+
  ""+
  "<hr class='mr-3'>"+
  "{!! Form::close() !!}";
  participant.appendChild(formParticipant);
}
</script>
