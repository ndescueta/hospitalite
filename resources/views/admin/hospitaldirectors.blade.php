@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Hospital Directors</h4>
                  </div>
                </div>
                 <!-- Content -->
                 <div class="card">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card-body">
                        <h4 class="card-title m-t-10">Current Hospital Directors</h4>
                        <div class="row">
                          <div class="col-md-12">
                          <!-- directors table -->
                            <div id="events">
                              @if(count($selectDirectors) > 0)
                                  <table class='table'>
                                  <tr>
                                    <th>Director ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>Action</th>
                                  </tr>
                                  @foreach($selectDirectors as $selectDirector)
                                      <tr onclick='displayEvent()'>
                                        <td>{{$selectDirector->intDirectorId}}</td>
                                        <td>{{$selectDirector->strDirectorFirstName}}</td>
                                        <td>{{$selectDirector->strDirectorLastName}}</td>
                                        <td>{{$selectDirector->stfDirectorContact}}</td>
                                        <td>
                                          <div class='btn-group'>
                                            <button class='btn btn-warning' onclick='editDirector({{$selectDirector->intDirectorId}})' data-toggle="modal" data-target="#directorModal"> Edit </button>
                                            <button class='btn btn-danger' onclick='deleteDirector({{$selectDirector->intDirectorId}})'> Delete </button>
                                          </div>
                                        </td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  There are currently no hospital directors.
                              @endif
                            </div>
                            <a href="#" data-toggle="modal" data-target="#directorModal" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Hospital Director
                            </a>

                            <div class="modal fade" id="directorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" style="width: 90%;">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Hospital Director</h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="form-group form-material p-2" id="directorForm">
                                      <div class="row">
                                        <div class="form-group col-md-12">
                                          <input type="hidden" name="directorID" id="directorID">
                                        </div>

                                        <div class='form-group col-md-4'>
                                          <label for='directorFirstName'>First Name</label>
                                          <input type='text' class='form-control' name='directorFirstName' id='directorFirstName'>
                                        </div>

                                        <div class='form-group col-md-4'>
                                          <label for='directorMiddleName'>Middle Name</label>
                                          <input type='text' class='form-control' name='directorMiddleName' id='directorMiddleName'>
                                        </div>
                                        
                                        <div class='form-group col-md-4'>
                                          <label for='directorLastName'>First Name</label>
                                          <input type='text' class='form-control' name='directorLastName' id='directorLastName'>
                                        </div>

                                        <div class='form-group col-md-6'>
                                          <label for='directorSex'>Sex</label>
                                          <select class='form-control' name='directorSex' id='directorSex'>
                                            <option selected value='' disabled>Select sex</option>
                                            <option value='Male'>Male</option>
                                            <option value='Female'>Female</option>
                                          </select>
                                        </div>
                                        
                                        <div class='form-group col-md-6'>
                                          <label for='directorBirthday'>Birthday</label>
                                          <input type='date' name='directorBirthday' id='directorBirthday' class='form-control'>
                                        </div>
                                        
                                        <div class='form-group col-md-6'>
                                          <label for='directorEmailAddress'>Email Address</label>
                                          <input type='text' class='form-control' name='directorEmailAddress' id='directorEmailAddress'>
                                        </div>
                                        
                                        <div class='form-group col-md-6'>
                                          <label for='directorContact'>Contact Number</label>
                                          <input type='text' class='form-control' name='directorContact' id='directorContact' >
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="hidden" value="add" name="directorMode" id=directorMode>
                                    <button type="button" onclick="saveDirector();" class="btn btn-primary">Save</button>
                                    <button type="button" onclick="clearForm();" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
@endsection

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- SCRIPTS -->
<script>

//Add Event
function clearForm() {
  $('#directorID').val('');
  $('#directorMode').val('');
  $('#directorFirstName').val('');
  $('#directorMiddleName').val('');
  $('#directorLastName').val('');
  $('#directorSex').val('');
  $('#directorBirthday').val('');
  $('#directorEmailAddress').val('');
  $('#directorContact').val('');
}

//Add Director
function saveDirector(mode) {
  var formData = $('#directorForm').serialize();

  if($('#directorMode').val() == 'add'){
    $.ajax({
      url: "<?php echo url('admin/addDirector')?>",
      method: 'post',
      data: formData + "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospitaldirector";
      },
      error: function (error) {
        console.log(error);
      }
    });
  }

  else if($('#directorMode').val() == 'edit'){
    $.ajax({
      url: "<?php echo url('admin/editDirector')?>",
      method: 'post',
      data: formData + "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospitaldirector";
      },
      error: function (error) {
        console.log(error);
      }
    });
  }

}

//Edit Director Info
function editDirector(id) {
  $.ajax({
    url: "/admin/getModalEditDirector/"+ id,
    dataType: 'json',
    method: 'get'
  }).done(function (result) {
    $('#directorID').val(id);
    $('#directorMode').val('edit');
    $('#directorFirstName').val(result[0].strDirectorFirstName);
    $('#directorMiddleName').val(result[0].strDirectorMiddleName);
    $('#directorLastName').val(result[0].strDirectorLastName);
    $('#directorSex').val(result[0].stfDirectorSex);
    $('#directorBirthday').val(result[0].datDirectorBirthday);
    $('#directorEmailAddress').val(result[0].strDirectorEmailAddress);
    $('#directorContact').val(result[0].stfDirectorContact);
  }).fail(function(){
      alert('Something went wrong.');
  });
}

//Delete Director Info
function deleteDirector(id) {
  $.ajax({
      url: "<?php echo url('admin/deleteDirector')?>" + "/" + id,
      method: 'post',
      data: "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospitaldirector";
      },
      error: function (error) {
        console.log(error);
      }
  });
}
</script>
