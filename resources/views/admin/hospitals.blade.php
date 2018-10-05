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
                    <div class="col-lg-6">
                      <div class="card-body">
                        <h4 class="card-title m-t-10">Current List of Hospitals</h4>
                        <div class="row">
                          <div class="col-md-12">
                            <!-- hospitals table -->
                            <div id="hospitals">
                              @if(count($selectHospitals) > 0)
                                  <table class='table'>
                                  <tr>
                                    <th>Name</th>
                                    <th>Barangay</th>
                                    <th>Action</th>
                                  </tr>
                                  @foreach($selectHospitals as $selectHospital)
                                      <tr onclick='displayHospital()'>
                                        <td>{{$selectHospital->strHospitalName}}</td>
                                        <td>{{$selectHospital->txtHospitalBarangay}}</td>
                                        <td><div class='btn-group'><button class='btn btn-success' onclick='viewHospital({{$selectHospital->intHospitalId}})'>View</button><button class='btn btn-warning' onclick='editHospital({{$selectHospital->intHospitalId}})'>Edit</button><button class='btn btn-danger' onclick='deleteHospital({{$selectHospital->intHospitalId}})'>Delete</button></div></td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  There are currently no hospitals saved in the database.
                              @endif
                            </div>

                            <!-- Add Hospital -->
                            <a href="#" onclick="addHospital()" data-target="#add-new-hospital" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Hospital
                            </a>
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

//Add Hospital
function addHospital() {
  $.confirm({
    theme: "bootstrap",
    animateFromElement: false,
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Add Hospital</h4>",
    boxWidth: '90%',
    useBootstrap: false,
    content:"<form id='frmAddHospital' class='form-group form-material p-2'>"+
            "<div class='row'>"+

            "<div class='form-group col-md-12'>"+
            "<label for='hospitalName'> Hospital Name <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='strHospitalName' id='hospitalName'>"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalStreet'> Hospital Street <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalStreet' id='hospitalStreet'>"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalBarangay'> Hospital Barangay <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalBarangay' id='hospitalBarangay'>"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalCity'> Hospital City <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalBarangay' id='hospitalBarangay'>"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalZip'> Hospital Zip <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='intHospitalZip' id='hospitalZip'>"+
            "</div>"+

            "</div>"+
            "</form>",
    buttons: {
      save: {
        text: "Save",
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////VALIDATION

          //CHECK Hospital NAME
          if(this.$content.find("#hospitalName").val() == "") {
            textEmpasis(document.getElementById("hospitalName").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalStreet").val() == "") {
            textEmpasis(document.getElementById("hospitalStreet").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalBarangay").val() == "") {
            textEmpasis(document.getElementById("hospitalBarangay").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalCity").val() == "") {
            textEmpasis(document.getElementById("hospitalCity").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalZip").val() == "") {
            textEmpasis(document.getElementById("hospitalZip").previousSibling);
            return false;
          }
          
          /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/addHospital')?>",
            method: 'post',
            data: this.$content.find("#frmAddHospital").serialize() + "&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              //window.location.href = "/admin/hospital";
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}

//Edit Hospital Info
function editHospital(id) {
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Edit Hospital</h4>",
    boxWidth: '90%',
    useBootstrap: false,
    content: function () {
        var self = this;
        return $.ajax({
            url: "/admin/viewHospital/"+ id,
            dataType: 'json',
            method: 'get'
        }).done(function (response) {
            var result = JSON.parse(JSON.stringify(response));
            self.setContent("<form id='frmEditHospital'class='form-group form-material p-2'>"+
            "<input type='hidden' name='intHospitalId' id='intHospitalId' value='"+id+"' />"+
            "<div class='row'>"+

            "<div class='form-group col-md-12'>"+
            "<label for='hospitalName'> Hospital Name <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='strHospitalName' id='hospitalName' value='"+result[0].strHospitalName+">"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalStreet'> Hospital Street <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalStreet' id='hospitalStreet' value='"+result[0].strHospitalStreet+">"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalBarangay'> Hospital Barangay <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalBarangay' id='hospitalBarangay' value='"+result[0].strHospitalBarangay+">"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalCity'> Hospital City <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='txtHospitalCity' id='hospitalCity' value='"+result[0].strHospitalCity+">"+
            "</div>"+

            "<div class='form-group col-md-3'>"+
            "<label for='hospitalZip'> Hospital Zip <small>(Required)</small></label>"+
            "<input type='text' class='form-control' name='intHospitalZip' id='hospitalZip' value='"+result[0].strHospitalZip+">"+
            "</div>"+

            "</div></form>");
        }).fail(function(){
            self.setContent('Something went wrong.');
        });
    },
    buttons: {
      save: {
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////VALIDATION

          //CHECK Hospital NAME
          if(this.$content.find("#hospitalName").val() == "") {
            textEmpasis(document.getElementById("hospitalName").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalStreet").val() == "") {
            textEmpasis(document.getElementById("hospitalStreet").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalBarangay").val() == "") {
            textEmpasis(document.getElementById("hospitalBarangay").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalCity").val() == "") {
            textEmpasis(document.getElementById("hospitalCity").previousSibling);
            return false;
          }
          if(this.$content.find("#hospitalZip").val() == "") {
            textEmpasis(document.getElementById("hospitalZip").previousSibling);
            return false;
          }

          // /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/editHospital')?>",
            method: 'post',
            data: this.$content.find("#frmEditHospital").serialize(),
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
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}

//Delete Hospital
function deleteHospital(id) {
  // /////////////////AJAXX
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    icon: "ti-trash",
    title: "<h4 class='modal-title'></i>Delete Hospital</h4>",
    useBootstrap: false,
    content: "Are you sure you want to delete this hospital?",
    buttons: {
      confirm: {
        btnClass: "btn btn-primary",
        action: function () {
          $.ajax({
            url: "<?php echo url('admin/deleteHospital')?>",
            method: 'post',
            data: "intHospitalId="+id+"&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              window.location.href = "/admin/hospitals";
            },
            error: function (error) {
              console.log(error);
            }
          });
        }
      },
      cancel: { }
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
