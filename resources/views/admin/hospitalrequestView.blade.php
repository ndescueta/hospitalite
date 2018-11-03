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

                              <button class = 'btn btn-danger' data-toggle='modal' data-target='#rejectReasonModal' data-event ='{{$event->intEventId}}'data-request='{{$event->intRequestId}}'>Reject Request</button>

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

                <div class="modal fade" id="rejectReasonModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editdonorinfo">Reason for Rejection</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-close="Close"> <span aria-hidden="true">&times;</span> </button>
                      </div>
                      <form name ='rejectform' id='rejectform' method="POST">
                      <div class="modal-body">
                        <div class="container-fluid">

                            <div class="form-group">
                              <input type="hidden" id ='eventId' name = 'eventId'>
                              <input type="hidden" id ='requestid' name = 'requestid'>
                              <input type="hidden" id ='status' name = 'status'>
                              <input type="hidden" id ='_token' name = '_token' value ='{{csrf_token()}}'>
                                <label for="duepayment">Reason for Rejection</label>
                              <input type ='text' class ='form-control' placeholder="Enter Reason" name = 'txtreason' id ='txtreason' required>

                            </div>

                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-seconday" data-dismiss="modal">Close</button>
                          <button class='btn btn-danger' id='rejectRequest' >Reject Request</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                $("#acceptRequest").click(function(e){
                  var events = $(this).data('event');
                  var request = $(this).data('request');
                  var status = 'Accepted';
                  var confirmaction = confirm("Are you sure?");
                  console.log(request);
                  if(confirmaction == true){
                  $.ajax({

                    type: 'POST',
                    url:'/updateRequest',
                    data:"eventId="+events+"&_token=" + "{{csrf_token()}}"+"&requestid="+request+"&status="+status,
                    success:function(data){
                      console.log(data);
                      if(data == ' error'){
                        alert('Error in transaction, Participants are too many');
                      }else{
                        window.location.href = '/admin/hospitalrequest';
                      }

                    }
                  });
                }else{
                  return false;
                }
                });
                $("#rejectform").submit(function(e){
                  e.preventDefault();
                  var status = 'Rejected';
                  var confirmaction = confirm("Are you sure?");
                  if(confirmaction == true){
                  $.ajax({

                    type: 'POST',
                    url:'/updateRequest',
                    data:$(this).serialize(),
                    success:function(data){
                      //console.log(data);
                      window.location.href = '/admin/hospitalrequest';
                    }
                  });
                }else{
                  return false;
                }
                });

                $('#rejectReasonModal').on('show.bs.modal', function(e) {
                  var events = $(e.relatedTarget).data('event');
                  var request = $(e.relatedTarget).data('request');
                  var status = 'Rejected'
                //  alert(events);

                  $('#eventId').val(events);
                  $('#requestid').val(request);
                  $('#status').val(status);


                });
                </script>

@endsection
