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
  @if (count($questions) > 0)
  @foreach ($questions as $question)
  <div class="input-group mb-1">
    <div class="input-group-prepend">
      <div class="input-group-text">
        <input type="checkbox" name="{{$question->intQuestionId}}" id="{{$question->intQuestionId}}" class="chkQuestions">
      </div>
    </div>
    <input type="text" name="" value="{{$question->txtQuestion}}" class="form-control" readonly>
    <div class="input-group-append">
      <div class="input-group-text">
        <button type="button" class="btn btn-danger btnDeleteQuestion" id="{{$question->intQuestionId}}"><i class="fas fa-times"></i></button>
      </div>
    </div>
  </div>
  @endforeach
  @else
  <p>No Questions Found</p>
  @endif
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
          <button type="button" name="btnViewGenQue" id="{{$generalQuestion->intGeneralQuestionId}}" class="btn btn-default" onclick=" location.href='viewQuestions/{{$generalQuestion->intGeneralQuestionId}}' "><i class="fas fa-eye"></i> View</button>
          <button type="button" name="btnEditGenQue" id="{{$generalQuestion->intGeneralQuestionId}}" class="btn btn-primary" data-toggle="modal" data-target="#mdlEditGeneralQuestion"><i class="fas fa-edit"></i> Edit</button>
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
<div class="modal fade" id="mdlEditGeneralQuestion" tabindex="-1" role="dialog" aria-labelledby="modalViewGeneralQuestion" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit general question</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form class="form-material" method="post" name="frmEditGeneralQuestion">
      <div class="modal-body">
        <input type="hidden" name="hdnGenQueID" id="hdnGenQueID">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Q:</span>
          </div>
          <textarea name="editQuestion" rows="3" id="editQuestion" class="form-control"></textarea>
          <!-- <input type="text" name="editQuestion" id="editQuestion" class="form-control"> -->
        </div>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">A:</span>
          </div>
          <textarea name="editAnswer" rows="3" id="editAnswer" class="form-control"></textarea>
          <!-- <input type="text" name="editAnswer" id="editAnswer" class="form-control"> -->
        </div>
      </div>
      <div class="modal-footer">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".btnDeleteQuestion", function(e){
  let questionID = $(this).attr("id")
  // console.log(questionID)
  swal({
    title: "Are you sure?",
    text: "You are about to delete this question",
    icon: "info",
    buttons: true,
  })
  .then((willApprove) => {
    if (willApprove){
      $.ajax({
        method: "POST",
        url: "deleteQuestion",
        data: {id: questionID, _token: "{{csrf_token()}}"},
        success: function (response){
          swal({
            title: "",
            text: "Question deleted",
            icon: "success",
            buttons: {text:"Okay"},
          })
          .then((willApprove) => {
            if (willApprove) {
              location.reload()
            }
          })
        }
      })
    }
    else {
      swal("","Cancelled")
    }
  })
})
$(document).on("submit", "form[name='frmEditGeneralQuestion']", function(e){
  e.preventDefault()
  // console.log($(this).serialize())

  $.ajax({
    method: "POST",
    url: "saveEditedQuestion",
    data: $(this).serialize(),
    success: function(response){
      console.log(response)
      if (response == " 1"){
        // alert("error")
        swal({
          title: "",
          text: "General question successfully edited!",
          icon: "success",
          buttons: {text:"Okay"},
        })
        .then((willApprove) => {
          if (willApprove){
            location.reload()
          }
        })
      }
      else if (response == "2"){
        swal("Err","Error updating general question.", "error")
      }
    }
  })
})
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
$(document).on("show.bs.modal", "#mdlEditGeneralQuestion", function(evt){
  let genQID = $(evt.relatedTarget).attr("id")
  $("#hdnGenQueID").val(genQID)
  console.log(genQID)

  $.ajax({
    method: "POST",
    url: "showQuestionandAnswer",
    data: {id: genQID, _token: "{{csrf_token()}}"},
    dataType: "json",
    success: function(response){
      console.log(response.length)
      for (var i = 0; i < response.length; i++) {
        let genque = response[i].txtGeneralQuestion
        let genans = response[i].txtAnswer

        $("#editQuestion").val(genque)
        $("#editAnswer").val(genans)
        // console.log(genque+" "+genans)
      }
      // $("#editQuestion").val(response.txtGeneralQuestion)
      // $("#editAnswer").val(response.txtAnswer)
    }
  })
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
      // console.log(response)
      swal({
        title: "",
        text: "Success!",
        icon: "success",
        buttons: {text:"Okay"}
      })
      .then((willApprove) => {
        if (willApprove) {
          location.reload()
        }
      })
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
