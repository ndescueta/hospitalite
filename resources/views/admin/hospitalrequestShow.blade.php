@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                      @if(count($events) > 0)

                          @foreach($events as $event)
                      <h4 class="text-themecolor">Event Requests for {{$event->strEventName}}</h4>
                    @endforeach

                @else
                    There are currently no Events.
                @endif
                    </div>
                  </div>
                   <!-- Content -->
                   @if(count($requests) > 0)

                       @foreach($requests as $request)

                   <div class="card">
                    <div class="row">
                      <div class="col-lg-12">


                                      <div class="card-body">
                                        <h4 class="card-title m-t-10">Representative Name : {{$request->strRepresentativeFirstName.' '.$request->strRepresentativeLastName}}</h4>
                                        <div class="row">
                                          <div class="col-md-12">
                                          <!-- events div -->
                                            <div id="events">
                                              Date Requested : {{$request->datRequestDate}}
                                              <a href="/admin/hospitalrequestShow/{{$request->intRequestId}}"><button class = "btn btn-primary float-right"> View Details </button></a>
                                            </div>

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
