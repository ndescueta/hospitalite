@extends('layouts.hospNav')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Events</h4>
  </div>
</div>
<button onclick="location.href = '/hosp/seminars'" class = "btn btn-primary"> Go Back </button>
<div class="card card-body mt-3">
  @foreach ($seminars as $seminar)
  <div class="col-md-12">
    <div class="img-fluid">
      <h1> {{$seminar->strEventName}} </h1>
      <small>From <b>{{$seminar->datDateStart}}</b> to <b>{{$seminar->datDateEnd}}</b> <br> Payment Due <b>{{$seminar->datPaymentDue}}</b></small> <br>
      <small>In <b>{{$seminar->txtEventStreet}} {{$seminar->txtEventBarangay}} {{$seminar->txtEventCity}} Zip Code: {{$seminar->intEventZip}}</b></small>
    </div>
    <hr class="mr-3">
    <small>Slots Left: {{$seminar->intEventCapacity}}</small> <br>
    <small>Payment: {{$seminar->monEventPrice}}</small> <br>
    <small>Bank Account: {{$seminar->stfEventBankAccount}}</small> <br>
    <small>Payment Center: {{$seminar->strEventPaymentCenter}}</small> <br>
    <hr class="mr-3">
    <p>{!!$seminar->strDateDescription!!}</p>
  </div>
  @endforeach
</div>
@endsection
