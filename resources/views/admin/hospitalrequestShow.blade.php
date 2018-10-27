@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                      <h4 class="text-themecolor">Event Requests</h4>
                    </div>
                  </div>
                   <!-- Content -->
                   <div class="card">
                    <div class="row">
                      <div class="col-lg-12">

                                @if(count($requests) > 0)

                                    @foreach($requests as $request)
                                      <div class="card-body">
                                        <h4 class="card-title m-t-10">Representative Name : {{$request->strRepresentativeFirstName.' '.$request->strRepresentativeLastName}}</h4>
                                        <div class="row">
                                          <div class="col-md-12">
                                          <!-- events div -->
                                            <div id="events">
                                              Date Requested : {{$request->datRequestDate}}</br>
                                
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    @endforeach

                                @else
                                    There are currently no Events.
                                @endif

                      </div>
                    </div>
                  </div>
                </div>

@endsection
