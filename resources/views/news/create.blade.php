@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
  </div>

  <h1> Add News </h1>

  {!! Form::open(['action' => 'NewsController@store', 'method' => 'POST']) !!}
      <div class = "form-group">
          {{Form::label('NewsTitle', 'Title')}}
          {{Form::text('NewsTitle', '', ['class' => 'form-control', 'placeholder' => 'Title Text Here'])}}
      </div>
      <div class = "form-group">
          {{Form::label('NewsDescription', 'Description')}}
          {{Form::textarea('NewsDescription', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text Here'])}}
      </div>
      <div class = "form-group">
          {{Form::label('NewsReference', 'Reference')}}
          {{Form::text('NewsReference', '', ['class' => 'form-control', 'placeholder' => 'Reference link or Author Here'])}}
      </div>
      {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
  {!! Form::close() !!}

@endsection
