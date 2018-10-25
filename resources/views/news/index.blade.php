@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
	<div class="col-md-2">
	<h1><button onclick="location.href='/news/create'" class = "btn btn-primary float-right"> Add News </button></h1>
	</div>
  </div>



  @if (count($news) > 0)
      @foreach ($news as $new)
          <div class = "card card-body">
            <div class="row">
              <img src="/storage/cover_images/{{$new->txtNewsImage}}" style="width: 200px; clear:both">
              <div class="ml-5">
                <h3><a href = "/news/{{$new->intNewsId}}">{{$new->strNewsTitle}}</a></h3>
                <small>From {{$new->txtNewsReference}}</small> <br>
                <small>Written: {{$new->created_at}}</small> <br>
                <small>Updated: {{$new->updated_at}}</small>
              </div>
            </div>
          </div>
      @endforeach
      {{$news->links()}}
  @else
      <p> No Posts found. </p>
  @endif

@endsection
