@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                      @if(count($hospitals) > 0)
                          @foreach($hospitals as $hospital)
                      <h4 class="text-themecolor">Participants of {{$hospital->strHospitalName}}</h4>
                          @endforeach
                      @else
                    There are currently no hospital name.
                    @endif
                    </div>
                  </div>
                   <!-- Content -->
                   <div class="card">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card-body">
                          <h4 class="card-title m-t-10">Event Participants</h4>
                          <div class="row">
                            <div class="col-md-12">
                            <!-- directors table -->
                              <div id="events">
                                @if(count($participants) > 0)
                                    <table class='table'>
                                    <tr>
                                      <th width="10%">Participant's Name</th>
                                      <th width="40%">Sex</th>
                                      <th width="30%">Email Address</th>
                                      <th width="20%">Contact</th>
                                    </tr>
                                    @foreach($participants as $participant)
                                        <tr>
                                          <td>{{$participant->strParticipantFirstName.' '.$participant->strParticipantMiddleName.' '.$participant->strParticipantLastName}}</td>
                                          <td>{{$participant->stfParticipantSex}}</td>
                                          <td>{{$participant->txtParticipantEmailAddress}}</td>
                                          <td>{{$participant->strParticipantContact}}</td>
                                        </tr>

                                    @endforeach
                                    </table>
                                @else
                                    There are currently no Event Participants.
                                @endif
                              </div>
                                @if(count($events) > 0)
                                  @foreach($events as $event)
                              <button class='btn btn-success' id='acceptRequest' data-event ='{{$event->intEventId}}'data-request='{{$event->intRequestId}}'>Accept Request</button>
                              <button class='btn btn-danger' id='rejectRequest' data-event ='{{$event->intEventId}}'data-request='{{$event->intRequestId}}'>Reject Request</button>
                                  @endforeach
                                @else

                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                $("#acceptRequest").click(function(e){
                  var events = $(this).data('event');
                  var request = $(this).data('request');
                  var status = 'Accepted';
                  console.log(request);
                  $.ajax({

                    type: 'POST',
                    url:'/updateRequest',
                    /*data:{token:'{{csrf_token()}}',
                         events:events,
                         request:request},*/
                    data:"intEventId="+events+"&_token=" + "{{csrf_token()}}"+"&requestid="+request+"&status="+status,
                    success:function(data){
                      //console.log(data);
                      window.location.href = '/admin/hospitalrequest';
                    }
                  });
                })
                $("#rejectRequest").click(function(e){
                  var events = $(this).data('event');
                  var request = $(this).data('request');
                  var status = 'Rejected';
                  console.log(request);
                  $.ajax({

                    type: 'POST',
                    url:'/updateRequest',
                    /*data:{token:'{{csrf_token()}}',
                         events:events,
                         request:request},*/
                    data:"intEventId="+events+"&_token=" + "{{csrf_token()}}"+"&requestid="+request+"&status="+status,
                    success:function(data){
                      //console.log(data);
                    }
                  });
                })
                </script>

@endsection
