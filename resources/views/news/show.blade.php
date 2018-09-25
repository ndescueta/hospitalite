@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
  </div>

  <a href = "/news" class = "btn btn-default"> Go Back </a>

  <h1> {{$news->strNewsTitle}} </h1>

  <div> {!!$news->txtNewsDescription!!} </div>
  <hr> <small> From {{$news->txtNewsReference}}</small> <hr>
  <hr> <small> Written on {{$news->created_at}}</small> <hr>
  <hr> <small> Updated Last {{$news->updated_at}}</small> <hr>

  <a href = "/news/{{$news->intNewsId}}/edit" class = "btn btn-default"> Edit </a>

  {!!Form::open(['action' => ['NewsController@destroy', $news->intNewsId], 'method' => 'POST', 'class' => 'pull-right'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
