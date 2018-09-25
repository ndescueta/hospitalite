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
                                        <td>{{$selectDirector->strDirectorContact}}</td>
                                        <td><div class='btn-group'><button class='btn btn-success'>View</button><button class='btn btn-warning' onclick='editDirector({{$selectDirector->intDirectorId}})'>Edit</button><button class='btn btn-danger'>Delete</button></div></td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  There are currently no hospital directors.
                              @endif
                            </div>
                            <a href="#" onclick="addDirector()" data-target="#add-new-director" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Hospital Director
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

//Add Event
function addDirector() {
  $.confirm({
    theme: "bootstrap",
    animateFromElement: false,
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Add Hospital Director</h4>",
    boxWidth: '90%',
    useBootstrap: false,
    content:"<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorFirstName'>First Name</label>"+
            "<input type='text' class='form-control' name='directorFirstName' id='directorFirstName'>"+
            "</div>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorMiddleName'>Middle Name</label>"+
            "<input type='text' class='form-control' name='directorMiddleName' id='directorMiddleName'>"+
            "</div>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorLastName'>Last Name</label>"+
            "<input type='text' class='form-control' name='directorLastName' id='directorLastName' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorSex'>Sex</label>"+
            "<input type='text' class='form-control' name='directorSex' id='directorSex' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorBirthday'>Birthday</label>"+
            "<input type='date' name='directorBirthday' id='directorBirthday' class='form-control'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorEmailAddress'>Email Address</label>"+
            "<input type='text' class='form-control' name='directorEmailAddress' id='directorEmailAddress' >"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorContact'>Contact Number</label>"+
            "<input type='text' class='form-control' name='directorContact' id='directorContact' >"+
            "</div>"+
            "</div></form>",
    buttons: {
      save: {
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////VALIDATION

          //CHECK DIRECTOR NAME

          /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/addDirector')?>",
            method: 'post',
            data: "&strDirectorFirstName="+ this.$content.find("#directorFirstName").val() +"&strDirectorMiddleName="+this.$content.find("#directorMiddleName").val()+"&strDirectorLastName="+this.$content.find("#directorLastName").val()+"&strDirectorSex="+this.$content.find("#directorSex").val()+"&datDirectorBirthday="+this.$content.find("#directorBirthday").val()+"&strDirectorEmailAddress="+this.$content.find("#directorEmailAddress").val()+"&strDirectorContact="+this.$content.find("#directorContact").val()+ "&_token=" + "{{csrf_token()}}",
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
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}

//Edit Director Info
function editDirector(id) {
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Edit Hospital Director</h4>",
    boxWidth: '90%',
    useBootstrap: false,
    content: function () {
        var self = this;
        return $.ajax({
            url: "/admin/getModalEditDirector/"+ id,
            dataType: 'json',
            method: 'get'
        }).done(function (response) {
            var result = JSON.parse(JSON.stringify(response));
            self.setContent("<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorFirstName'>First Name</label>"+
            "<input type='text' class='form-control' name='directorFirstName' id='directorFirstName' value='"+result[0].strDirectorFirstName+"'>"+
            "</div>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorMiddleName'>Middle Name</label>"+
            "<input type='text' class='form-control' name='directorMiddleName' id='directorMiddleName' value='"+result[0].strDirectorMiddleName+"'>"+
            "</div>"+
            "<div class='form-group col-md-4'>"+
            "<label for='directorLastName'>Last Name</label>"+
            "<input type='text' class='form-control' name='directorLastName' id='directorLastName' value='"+result[0].strDirectorLastName+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorSex'>Sex</label>"+
            "<input type='text' class='form-control' name='directorSex' id='directorSex' value='"+result[0].strDirectorSex+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorBirthday'>Birthday</label>"+
            "<input type='date' name='directorBirthday' id='directorBirthday' class='form-control' value='"+result[0].datDirectorBirthday+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorEmailAddress'>Email Address</label>"+
            "<input type='text' class='form-control' name='directorEmailAddress' id='directorEmailAddress' value='"+result[0].strDirectorEmailAddress+"'>"+
            "</div>"+
            "<div class='form-group col-md-6'>"+
            "<label for='directorContact'>Contact Number</label>"+
            "<input type='text' class='form-control' name='directorContact' id='directorContact' value='"+result[0].strDirectorContact+"'>"+
            "</div>"+
            "</div></form>");
        }).fail(function(){
            self.setContent('Something went wrong.');
        });
    },
    buttons: {
      save: {
        btnClass: "btn btn-primary",
      },
      close: {
        btnClass: "btn btn-secondary",
      }
    },
  });
}
</script>