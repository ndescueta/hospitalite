@extends ('layouts.adminNav')

@section('content')
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">News</h4>
    </div>
  </div>
<div class="container-fluid">
  <h1> Add News </h1>

  {!! Form::open(['action' => 'NewsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class = "form-group">
          {{Form::label('NewsTitle', 'Title')}}
          {{Form::text('NewsTitle', '', ['class' => 'form-control', 'placeholder' => 'Title Text Here'])}}
      </div>
      <div class = "form-group">
          {{Form::label('NewsDescription', 'Description')}}
          {{Form::textarea('NewsDescription', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description Text Here'])}}
      </div>
      <div class = "form-group">
          {{Form::label('NewsImage', 'Image')}}
          <input type="file" class="form-control" id='image' name="image" required >
          <!-- <input type = "hidden" id ='newsid_img' name ='newsid_img'> -->
          {{ csrf_field() }}
      </div>
      <div class = "form-group">
          {{Form::label('NewsReference', 'Reference')}}
          {{Form::text('NewsReference', '', ['class' => 'form-control', 'placeholder' => 'Reference link or Author Here'])}}
      </div>
      {{Form::submit('Submit', ['class' => 'btn btn-primary mb-3 float-right'])}}
  {!! Form::close() !!}
  <div style='clear:both'></div>
</div>
@endsection
