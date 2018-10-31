@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">News</h4>
  </div>
</div>
<button onclick="location.href = '/news'" class = "btn btn-primary"> Go Back </button>
<div class="card card-body mt-3">
  <div class="col-md-12">
    <div class="img-fluid">
      <img src="/newsImages/{{$news->txtNewsImage}}" class="float-right" style="width: 400px; clear:both">
      <h1> {{$news->strNewsTitle}} </h1>
      <small>From <b>{{$news->txtNewsReference}}</b> • Written on <b>{{$news->created_at}}</b> • Updated Last <b>{{$news->updated_at}}</b></small>
    </div>
    <hr class="mr-3">
    <p>{!!$news->txtNewsDescription!!}</p>
  </div>
</div>
<div class="col-md-12 mb-5">
  {!!Form::open(['action' => ['NewsController@destroy', $news->intNewsId], 'method' => 'DELETE', 'class' => 'float-right mr-3'])!!}
  <!-- {{Form::hidden('_method', 'DELETE')}} -->
  {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
  {!!Form::close()!!}
  <button onclick='location.href = "/news/{{$news->intNewsId}}/edit"' class = "btn btn-primary mr-1 float-right"> Edit </button>
</div>
@endsection
