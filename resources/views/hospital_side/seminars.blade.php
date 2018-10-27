@extends('layouts.hospNav')
@section('content')
<div class="container-fluid">
  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">Seminars</h4>
    </div>
  </div>
</div>

@if (count($seminars) > 0)
    @foreach ($seminars as $seminar)
        <div class = "card card-body">
          <div class="row">
            <div class="ml-5">
              <h3><a href = "/hospital_side/{{$seminar->intEventId}}">{{$seminar->strEventName}}</a></h3>
              <small>Slots Left: {{$seminar->intEventCapacity}}</small> <br>
              <small>Event Date: {{$seminar->datDateStart}} to {{$seminar->datDateEnd}}</small> <br>
              <small>Payment Due Date: {{$seminar->datPaymentDue}}</small>
            </div>
          </div>
        </div>
    @endforeach
    {{$seminars->links()}}
@else
    <p> No Events found. </p>
@endif
@endsection
