@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">News</h4>
  </div>
</div>
<button onclick="location.href = '/news'" class = "btn btn-primary"> Go Back </button>
<div class="card card-body mt-3">
  <h1> {{$news->strNewsTitle}} </h1>
  <p><small> From <b>{{$news->txtNewsReference}}</b> • Written on <b>{{$news->created_at}}</b> • Updated Last <b>{{$news->updated_at}}</b></small></p>
  <hr>
  <div> {!!$news->txtNewsDescription!!} </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      {!!Form::open(['action' => ['NewsController@destroy', $news->intNewsId], 'method' => 'POST', 'class' => 'float-right'])!!}
      {{Form::hidden('_method', 'DELETE')}}
      {{Form::submit('Delete', ['class' => 'btn btn-danger float-right'])}}
      {!!Form::close()!!}
      <button onclick='location.href = "/news/{{$news->intNewsId}}/edit"' class = "btn btn-primary mr-1 float-right"> Edit </button>
    </div>
  </div>
</div>
@endsection
