@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Admin Settings</h4>
  </div>
</div>

<div class="container-fluid">
  <h1> Admin Account Configurations </h1>
  @foreach ($admin as $admins)
  {!! Form::open(['action' => ['AdminAccountController@update', $admins->intUserId], 'method' => 'PUT']) !!}
  <div class = "form-group">
    {{Form::label('AdminUsername', 'Username')}}
    {{Form::text('AdminUsername', $admins->strUserName, ['class' => 'form-control', 'placeholder' => 'Username Here'])}}
  </div>
  <div class = "form-group">
    {{Form::label('NewAdminPassword', 'New Password')}}
    {{Form::password('NewAdminPassword', ['class' => 'form-control awesome', 'placeholder' => 'New Password Here'])}}
  </div>
  <div class = "form-group">
    {{Form::label('ConfirmNewAdminPassword', 'Confirm New Password')}}
    {{Form::password('ConfirmNewAdminPassword', ['class' => 'form-control awesome', 'placeholder' => 'Confirm New Password Here'])}}
  </div>
  <div class = "form-group">
    {{Form::label('CurrentAdminPassword', 'Current Password')}}
    {{Form::password('CurrentAdminPassword', ['class' => 'form-control awesome', 'placeholder' => 'Current Password Here'])}}
  </div>
  {{Form::submit('Submit', ['class' => 'btn btn-primary mb-3 float-right'])}}
  {!! Form::close() !!}
  @endforeach
</div>
@endsection
