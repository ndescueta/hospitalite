@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Hospitals</h4>
                  </div>
                </div>
                <!-- Content -->
                <div class="card">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card-body">
                        <h4 class="card-title m-t-10">Current List of Hospitals</h4>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- hospitals table -->
                            <div id="hospitals">
                              @if(count($selectHospitals) > 0)
                                  <table class='table'>
                                  <tr>
                                    <th>Hospital Name</th>
                                    <th>Hospital Director</th>
                                    <th>City</th>
                                    <th>Action</th>
                                  </tr>
                                  @foreach($selectHospitals as $selectHospital)
                                      <tr onclick='displayHospital()'>
                                        <td>{{$selectHospital->strHospitalName}}</td>
                                        <td>{{$selectHospital->strDirectorName}}</td>
                                        <td>{{$selectHospital->txtHospitalCity}}</td>
                                        <td>
                                          <div class='btn-group'>
                                            <button class='btn btn-warning' onclick='editHospital({{$selectHospital->intHospitalId}})' data-toggle="modal" data-target="#hospitalModal"> Edit </button>
                                            <button class='btn btn-danger' onclick='deleteHospital({{$selectHospital->intHospitalId}})' > Delete </button>
                                          </div>
                                        </td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  There are currently no hospitals saved in the database.
                              @endif
                            </div>

                            <!-- Add Hospital -->
                            <a href="#" data-toggle="modal" data-target="#hospitalModal" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Hospital
                            </a>

                            <div class="modal fade" id="hospitalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog" style="width: 90%;">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Hospital</h4>
                                  </div>

                                  <div class="modal-body">
                                    <form class="form-group form-material p-2" id="hospitalForm">
                                      <div class="row">
                                        <div class="form-group col-md-12">
                                          <input type="hidden" name="hospitalID" id="hospitalID">
                                        </div>

                                        <div class='form-group col-md-12'>
                                          <label for='hospitalName'>Hospital Name</label>
                                          <input type='text' class='form-control' name='hospitalName' id='hospitalName'>
                                        </div>

                                        <div class='form-group col-md-12'>
                                          <label for='hospitalDirector'>Director Name</label>
                                          <select class='form-control' name='hospitalDirector' id='hospitalDirector'>
                                            <option selected value='' disabled>Select director</option>
                                            @foreach($directorList as $director)
                                              <option value='{{$director->intDirectorId}}'>{{$director->strDirectorName}}</option>
                                            @endforeach
                                          </select>
                                        </div>

                                        <div class='form-group col-md-6'>
                                          <label for='hospitalStreet'> Hospital Street <small>(Required)</small></label>
                                          <input type='text' class='form-control' name='hospitalStreet' id='hospitalStreet'>
                                        </div>

                                        <div class='form-group col-md-6'>
                                          <label for='hospitalBarangay'> Hospital Barangay <small>(Required)</small></label>
                                          <input type='text' class='form-control' name='hospitalBarangay' id='hospitalBarangay'>
                                        </div>

                                        <div class='form-group col-md-6'>
                                          <label for='hospitalCity'> Hospital City <small>(Required)</small></label>
                                          <input type='text' class='form-control' name='hospitalCity' id='hospitalCity'>
                                        </div>

                                        <div class='form-group col-md-6'>
                                          <label for='hospitalZip'> Hospital Zip <small>(Required)</small></label>
                                          <input type='text' class='form-control' name='hospitalZip' id='hospitalZip'>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <input type="hidden" value="add" name="hospitalMode" id=hospitalMode>
                                    <button type="button" onclick="saveHospital();" class="btn btn-primary">Save</button>
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

function clearForm() {
  $('#hospitalID').val('');
  $('#hospitalMode').val('');
  $('#hospitalName').val('');
  $('#hospitalDirector').val('');
  $('#hospitalStreet').val('');
  $('#hospitalBarangay').val('');
  $('#hospitalCity').val('');
  $('#hospitalZip').val('');
}

//Add Hospital
function saveHospital() {
  var formData = $('#hospitalForm').serialize();

  if($('#hospitalMode').val() == 'add'){  
    $.ajax({
      url: "<?php echo url('admin/addHospital')?>",
      method: 'post',
      data: formData + "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospital";
      },
      error: function (error) {
        console.log(error);
      }
    });
  }

  else if($('#hospitalMode').val() == 'edit'){
    $.ajax({
      url: "<?php echo url('admin/editHospital')?>",
      method: 'post',
      data: formData + "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospital";
      },
      error: function (error) {
        console.log(error);
      }
    });
  }
}

//Edit Hospital Info
function editHospital(id) {
  $.ajax({
    url: "/admin/getModalEditHospital/"+ id,
    dataType: 'json',
    method: 'get'
  }).done(function (result) {
    $('#hospitalID').val(id);
    $('#hospitalMode').val('edit');
    $('#hospitalName').val(result[0].strHospitalName);
    $('#hospitalDirector').val(result[0].intDirectorId);
    $('#hospitalStreet').val(result[0].txtHospitalStreet);
    $('#hospitalBarangay').val(result[0].txtHospitalBarangay);
    $('#hospitalCity').val(result[0].txtHospitalCity);
    $('#hospitalZip').val(result[0].intHospitalZip);
  }).fail(function(){
      alert('Something went wrong.');
  });
}

//Delete Hospital
function deleteHospital(id) {
  // /////////////////AJAXX
  $.ajax({
      url: "<?php echo url('admin/deleteHospital')?>" + "/" + id,
      method: 'post',
      data: "&_token=" + "{{csrf_token()}}",
      async: false,
      success: function (data) {
        //LOG RESPONSE
        console.log(data);
        //REFRESH PAGE IF SUCCESS
        window.location.href = "/admin/hospital";
      },
      error: function (error) {
        console.log(error);
      }
  });
}

function textEmpasis(elem) {
  elem.focus();
  elem.style.color = "#FB9678";
  elem.className = "animated rubberBand";
  setTimeout(function(){
    elem.style.color = "black";
    elem.className = "";
  },1000);
}
</script>
