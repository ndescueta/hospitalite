@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
  </div>
<div class="container-fluid">
  <h1> Edit News </h1>

  {!! Form::open(['action' => ['NewsController@update', $news->intNewsId], 'method' => 'POST']) !!}
  <div class = "form-group">
    {{Form::label('NewsTitle', 'Title')}}
    {{Form::text('NewsTitle', $news->strNewsTitle, ['class' => 'form-control', 'placeholder' => 'Title Text Here'])}}
  </div>
  <div class = "form-group">
    {{Form::label('NewsDescription', 'Description')}}
    {{Form::textarea('NewsDescription', $news->txtNewsDescription, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text Here'])}}
  </div>
  <div class = "form-group">
    {{Form::label('NewsReference', 'Reference')}}
    {{Form::text('NewsReference', $news->txtNewsReference, ['class' => 'form-control', 'placeholder' => 'Reference link or Author Here'])}}
  </div>
  {{Form::hidden('_method', 'PUT')}}
  {{Form::submit('Submit', ['class' => 'btn btn-primary mb-3 float-right'])}}
  {!! Form::close() !!}
  <div style='clear:both'></div>
</div>

@endsection
