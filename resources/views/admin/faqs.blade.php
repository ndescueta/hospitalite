@extends('layouts.adminNav')
@section('content')
<style>
.chkGenQue{
  height: 20px;
  width: 20px;
}
</style>
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Frequently Asked Questions</h4>
  </div>
</div>
<div class="card card-body">
  <h3 class="mb-3">Questions</h3>
  @foreach ($questions as $question)
  <div class="input-group mb-1">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <input type="checkbox" name="{{$question->intQuestionId}}" id="{{$question->intQuestionId}}" class="chkQuestions">
      </div>
    </div>
    <input type="text" name="" value="{{$question->txtQuestion}}" class="form-control" readonly>
  </div>
  @endforeach
  <button type="button" name="button" id="btnGenQue" class="btn btn-primary mt-3" data-toggle="modal" data-target="#mdlGeneralizeQuestions">Generalize marked questions</button>
</div>
<div class="card mt-3">
  <div class="card-header">
    <button type="button" name="button" id="btnCreateGenQue" class="btn btn-default float-right" data-toggle="modal" data-target="#mdlCreateGeneralQuestion">Create general question</button>
    <h3 class="mb-3">General Questions</h3>
  </div>
  <div class="card-body">
    <!-- <div class="row">
    @foreach ($generalQuestions as $generalQuestion)
    <div class="col-md-11">
    <h4>Q: <small>{{ $generalQuestion->txtGeneralQuestion }}</small></h4>
    <h4>A: <small>{{ $generalQuestion->txtAnswer }}</small></h4>
  </div>
  <div class="col-md-1">
  <input type="checkbox" id="{{ $generalQuestion->intGeneralQuestionId }}" class="chkGenQue">
</div>
@endforeach
</div> -->
<table class="table color-table info-table">
  <thead class="text-center">
    <tr>
      <th></th>
      <th>Questions</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($generalQuestions as $generalQuestion)
    <tr>
      <td><input type="checkbox" name="{{$generalQuestion->intGeneralQuestionId}}" id="{{$generalQuestion->intGeneralQuestionId}}"></td>
      <td><b>Q: </b>{{$generalQuestion->txtGeneralQuestion}}<br><b>A:  </b>{{$generalQuestion->txtAnswer}}</td>
      <td>
        <div class="btn-group">
          <button type="button" name="btnViewGenQue" id="{{$generalQuestion->intGeneralQuestionId}}" class="btn btn-default"><i class="fas fa-eye"></i> View</button>
          <button type="button" name="btnEditGenQue" id="{{$generalQuestion->intGeneralQuestionId}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
<!-- modal declaration -->
<div class="modal fade" id="mdlGeneralizeQuestions" tabindex="-1" role="dialog" aria-labelledby="modalGeneralizeQuestions" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="hdrGeneralizeQuestions">Generalize Questions</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <h4 class="lblGenQue">General questions</h4>
        <form method="post" name="frmGeneralizeQuestions">
        <input type="hidden" name="hdnSelectedQuestions" id="hdnSelectedQuestions">
        <select class="form-control" name="selGeneralQuestions" id="selGeneralQuestions">
          <option selected disabled>Select general question</option>
          @foreach ($generalQuestions as $generalQuestion)
          <option value="{{$generalQuestion->intGeneralQuestionId}}">{{$generalQuestion->txtGeneralQuestion}}</option>
          @endforeach
        </select>
      </div>
      {{csrf_field()}}
      <div class="modal-footer">
        <button type="submit" name="btnSubmitGenQue" class="btn btn-info">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdlCreateGeneralQuestion" tabindex="-1" role="dialog" aria-labelledby="modalCreateGeneralQuestion" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="hdrCreateGeneralQuestion">Create generalize question</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form class="form-material" method="post" name="frmCreateGeneralQuestion">
        <div class="modal-body">
          <div class="form-group">
            <b class="mb-3">General Question</b>
            <textarea name="txtGeneralQuestion" rows="3" class="form-control" placeholder="Enter general question"></textarea>
          </div>
          <div class="form-group">
            <b class="mb-3">Answer</b>
            <textarea name="txtAnswer" rows="3" class="form-control" placeholder="Enter answer"></textarea>
          </div>
          <!-- <input type="hidden" name="txtSelectedQuestions" id="txtSelectedQuestions"> -->
        </div>
        {{ csrf_field() }}
        <div class="modal-footer">
          <button type="submit" name="btnSubmitGenQue" class="btn btn-info">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="mdlViewGeneralQuestion" tabindex="-1" role="dialog" aria-labelledby="modalViewGeneralQuestion" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
      <div class="modal-body">

      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("show.bs.modal", "#mdlGeneralizeQuestions", function(){
  // get selected question id's
  let selectedQuestions = []
  $(".chkQuestions").each(function(){
    if ($(this).is(":checked")){
      selectedQuestions.push($(this).attr("id"))
    }
  })
  $("#hdnSelectedQuestions").val(selectedQuestions) //pass array to input field
  console.log($("#hdnSelectedQuestions").val())
  // custom message, hide dropdown if array is empty
  if (!selectedQuestions.length){
    $(".lblGenQue").text("No Selected Questions")
    $("#selGeneralQuestions").hide()
  }
  else{
    $(".lblGenQue").text("General questions")
    $("#selGeneralQuestions").show()
  }
})
$(document).on("submit", "form[name='frmGeneralizeQuestions']", function(e){
  e.preventDefault()
  // console.log($(this).serialize())
  //send form via ajax
  $.ajax({
    method: "POST",
    url: "generalizeQuestion",
    data: $(this).serialize(),
    success: function(response){
      console.log(response)
    }
  })
})
$(document).on("submit", "form[name='frmCreateGeneralQuestion']", function(e){
  e.preventDefault()
  let formdata = $(this).serialize()
  console.log(formdata)

  // send data via ajax
  $.ajax({
    method: "POST",
    url: "storeGeneralQuestion",
    data: $(this).serialize(),
    success: function (response){
      console.log(response)
      $("#mdlCreateGeneralQuestion").modal('hide')
      location.reload()
    }
  })
})
$(document).on("hidden.bs.modal", "#mdlCreateGeneralQuestion", function(e){
  $(this).find("textarea").val("")
})
</script>
@endsection
