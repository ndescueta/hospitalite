@extends('layouts.adminNav')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">View General Questions</h4>
  </div>
</div>
<div class="card card-body">
  @if (count($generalQuestions) > 0 )
  @foreach($generalQuestions as $generalQuestion)
  <h4>Q: <small>{{$generalQuestion->txtGeneralQuestion}}</small></h4>
  <h4>A: <small>{{$generalQuestion->txtAnswer}}</small></h4>
  @endforeach
  @else
  <div class="text-center">
    <h3 class="mb-5">No general questions found under this category</h3>
    <i class="fas fa-question fa-10x mb-5"></i>
  </div>
  @endif
</div>
@endsection
