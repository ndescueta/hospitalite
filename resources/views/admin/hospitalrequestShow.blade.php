@extends ('layouts.adminNav')

@section('content')
<div>
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
              There are currently no Event Requests.
          @endif
</div>
<!--Paid/unoaid-------------------------------------------------------------------------------------------------------------->
<div>
  <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                      @if(count($events) > 0)

                          @foreach($events as $event)
                      <h4 class="text-themecolor">Accepted Requests for {{$event->strEventName}}</h4>
                    @endforeach

                @else
                    There are currently no Events.
                @endif
                    </div>
                  </div>
                  <!-- Content -->
                  <div class="card">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card-body">
                          <h4 class="card-title m-t-10">Accepted Requests</h4>
                          <div class="row">
                            <div class="col-md-12">
                              <!-- events table -->
                              <div id="events">
                   @if(count($acceptedRequests) > 0)
                     <table class='table'>
                     <tr>
                       <th>Representative's Name</th>
                       <th>Date Requested</th>
                       <th>Payment Due</th>
                       <th>Action</th>
                     </tr>
                       @foreach($acceptedRequests as $acceptedRequest)
                         <tr>
                           <td style='display: none'>{{$acceptedRequest->intRequestId}}</td>
                           <td>{{$acceptedRequest->strRepresentativeFirstName.' '.$acceptedRequest->strRepresentativeMiddleName.' '.$acceptedRequest->strRepresentativeLastName}}</td>
                           <td>{{$acceptedRequest->datRequestDate}}</td>
                           <td>{{$acceptedRequest->decTotalPaymentDue}}</td>
                           <td><div class='btn-group'><button class='btn btn-success' id ='setaspaid' data-repname=  '{{$acceptedRequest->strRepresentativeFirstName.' '.$acceptedRequest->strRepresentativeMiddleName.' '.$acceptedRequest->strRepresentativeLastName}}' data-update='{{$acceptedRequest->datRequestUpdate}}' data-duepayment ='{{$acceptedRequest->decTotalPaymentDue}}' data-requestid='{{$acceptedRequest->intRequestId}}'  data-toggle='modal' data-target='#setaspaidModal' >View</button></div></td>
                         </tr>
                       @endforeach
                     </table>
                     <div class='float-right'>
                     {{$acceptedRequests->links()}}
                     </div>
                  @else
                    There are currently no Accepted Requests.
                  @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>

<div class="modal fade" id="setaspaidModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editdonorinfo">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-close="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <form name ='setpaidform' id='setpaidform' method="POST">
      <div class="modal-body">
        <div class="container-fluid">

            <div class="form-group">
              <input type="hidden" id ='_token' name = '_token' value ='{{csrf_token()}}'>
              <input type="hidden" id ='requestid' name = 'requestid'>
                <label for="repname">Representative's Name</label>
              <input type="text" class='form-control' id='repname' name='repname' readonly></br>
                <label for="updateDate">Date Accepted</label>
              <input type="text" class='form-control' id='update' name='update' readonly></br>
                <label for="duepayment">Total Payment Due</label>
              <input type="text" class='form-control' id='duepayment' name='duepayment' readonly></br>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-seconday" data-dismiss="modal">Close</button>
          <button class='btn btn-success' id='paidrequest' >Set as Paid</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$('#setaspaidModal').on('show.bs.modal', function(e) {
  var repname = $(e.relatedTarget).data('repname');
  var update = $(e.relatedTarget).data('update');
  var duepayment = $(e.relatedTarget).data('duepayment');
  var requestid = $(e.relatedTarget).data('requestid');
//  alert(events);
//console.log(update);
  $('#repname').val(repname);
  $('#update').val(update);
  $('#duepayment').val(duepayment);
  $('#requestid').val(requestid);


});

$("#setpaidform").submit(function(e){
  e.preventDefault();
  var confirmaction = confirm("Are you sure?");
  if(confirmaction == true){
    console.log($(this).serialize());
  $.ajax({

    type: 'POST',
    url:'/updatePayment',
    data:$(this).serialize(),
    success:function(data){
      console.log(data);
      window.location.href = '/admin/hospitalrequest';
    }
  });
}else{
  return false;
}
});

</script>

@endsection
