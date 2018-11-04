@extends ('layouts.adminNav')

@section('content')

  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">Participant List</h4>
    </div>
  </div>

  <div class="card card-body mt-3">
    <div class="col-md-12">
      <div class="img-fluid">
        <h4><b>{{$participants[0]->strEventName}}</b></h4>
      </div>
    </div>
  </div>

  <div class="card card-body mt-3">
    <div class="col-md-12">
      <div class="img-fluid">
        @if(count($participants)>0)


          <table class="table">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Hospital Name</th>
              <th>Sex</th>
              <th>Contact Number</th>
              <th>Email Address</th>
              <th>Birthdate</th>
            </tr>
            @foreach($participants as $key=>$participant)
              <tr>
                <td>{{$key + 1}}.</td>
                <td>{{$participant->strParticipantLastName}}, {{$participant->strParticipantFirstName}} {{$participant->strParticipantMiddleName}}</td>
                <td>{{$participant->strHospitalName}}</td>
                <td>{{$participant->stfParticipantSex}}</td>
                <td>{{$participant->strParticipantContact}}</td>
                <td>{{$participant->txtParticipantEmailAddress}}</td>
                <td>{{$participant->datParticipantBirthday}}</td>
              </tr>
            @endforeach
          </table>

        @endif
      </div>
    </div>
  </div>

@endsection
