@extends('layouts.hospNav')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor col-md-10">Events</h4>

  </div>
  <div class="col-md-6 align-self-center"></div>
  <button onclick="location.href = '/hosp/seminars'" class = "btn btn-primary col-md-1"> Go Back </button>
</div>

<div class="card card-body mt-3">
  @foreach ($seminars as $seminar)
  <div class="col-md-12">
    <div class="img-fluid">
      <div class="row">
        <div class="col-md-3">
          <h5>Event Name: <b>{{$seminar->strEventName}}</b> </h5>
          <h6>From <b>{{$seminar->datDateStart}}</b> to <b>{{$seminar->datDateEnd}}</b></h6>
          <h6>Payment Due <b>{{$seminar->datPaymentDue}}</b></h6>
          <h6>In <b>{{$seminar->txtEventStreet}}, {{$seminar->txtEventBarangay}}, {{$seminar->txtEventCity}} Zip Code: {{$seminar->intEventZip}}</b></h6>
        </div>
        <div class="col-md-3">
          <h6>Slots Left: <b>{{$seminar->intEventCapacity}}</b></h6>
          <h6>Payment: <b>{{$seminar->monEventPrice}}</b></h6>
          <h6>Bank Account: <b>{{$seminar->stfEventBankAccount}}</b></h6>
          <h6>Payment Center: <b>{{$seminar->strEventPaymentCenter}}</b></h6>
        </div>
        <div class="col-md-3">
        @if (isset($requests))
          @foreach($requests as $request)
          <h6>Request Status: {{$request->stfRequestStatus}}</h6>
          <h6>Date Requested: {{$request->datRequestDate}}</h6>
          <h6>Date Accepted/Rejected: {{$request->datRequestUpdate}}</h6>
          <h6>Reason for Rejection: </h6>
          @endforeach
          </div>
        @endif
        @if(isset($participantCounts))
          <div class="col-md-3">
          @foreach($participantCounts as $participantCount)
          <h6>Number of Participants: {{$participantCount->participantCount}}</h6>
          @endforeach
        @endif
        @if(isset($totalCosts))
          @foreach($totalCosts as $totalCost)
          <h6>Total Cost: {{$totalCost->totalCost}}</h6>
          @endforeach
        @endif
        @if(isset($requests))
          @foreach($requests as $request)
          <h6>Payment Status: {{$request->stfIsPaid}}</h6>
          <h6>Payment Date: {{$request->dtmDatePaid}}</h6>
          @endforeach
        @endif
        </div>
      </div>
    </div>

    <hr class="mr-3">

    <p>{!!$seminar->txtEventDescription!!}</p>
  </div>



    @if($yo != 'Unnotified')
    <div class="float right">
      <a href = "{{route('create', $seminar->intEventId)}}" class = "btn btn-primary"> Add Participants </a>
    </div>
    @endif




  @endforeach

</div>
@endsection
