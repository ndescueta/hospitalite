@extends('layouts.adminNav')
@section('content')
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">View Questions</h4>
  </div>
</div>
<div class="card card-body">
  @if (count($questions) > 0)
  @foreach($questions as $question)
  <h4>Question #{{$question->intQuestionId}}</h4>
  <p>{{$question->txtQuestion}}</p>
  @endforeach
  @else
  <div class="text-center">
    <h3 class="mb-5">No questions found under this general question</h3>
    <i class="fas fa-question fa-10x mb-5"></i>
  </div>
  @endif
</div>
@endsection
