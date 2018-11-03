@extends ('layouts.adminNav')

@section('content')

  <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                      <h4 class="text-themecolor">Event Requests</h4>
                    </div>
                  </div>
                   <!-- Content -->


                                @if(count($events) > 0)

                                    @foreach($events as $event)
                                      <div class="card">
                                       <div class="row">
                                         <div class="col-lg-12">

                                      <div class="card-body">
                                        <h4 class="card-title m-t-10">Event Name : {{$event->strEventName}}</h4>
                                        <div class="row">
                                          <div class="col-md-12">
                                          <!-- events div -->
                                            <div id="events">
                                              Description : {{$event->txtEventDescription}}</br>
                                              Payment Due: {{$event->datPaymentDue}}</br>
                                              Capacity: {{$event->intEventCapacity}}</br>
                                              Price: {{$event->monEventPrice}}
                                            </div>
                                            <a href="/admin/hospitalrequest/{{$event->intEventId}}" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                                               Show Requests
                                            </a>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                    @endforeach

                                @else
                                    There are currently no Events.
                                @endif



@endsection
