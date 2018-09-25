@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
  </div>



  @if (count($news) > 0)
      @foreach ($news as $new)
          <div class = "well">
              <h3><a href = "/news/{{$new->intNewsId}}">{{$new->strNewsTitle}}</a></h3>
              <small>From {{$new->txtNewsReference}}</small> <br>
              <small>Written on {{$new->created_at}}</small>
          </div>
      @endforeach
      {{$news->links()}}
  @else
      <p> No Posts found. </p>
  @endif

  <h1><a href = "/news/create" class = "btn btn-default"> Add News </a></h1>

@endsection
