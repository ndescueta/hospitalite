@extends ('layouts.adminNav')

@section('content')
<div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Hospital Services</h4>
                  </div>
                </div>
                 <!-- Content -->
                 <div class="card">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="card-body">
                        <h4 class="card-title m-t-10">Current Hospital Services</h4>
                        <div class="row">
                          <div class="col-md-12">
                          <!-- directors table -->
                            <div id="events">
                              @if(count($selectServices) > 0)
                                  <table class='table'>
                                  <tr>
                                    <th width="10%">Service ID</th>
                                    <th width="40%">Hospital</th>
                                    <th width="30%">Service</th>
                                    <th width="20%">Action</th>
                                  </tr>
                                  @foreach($selectServices as $service)
                                      <tr onclick='displayEvent()'>
                                        <td>{{$service->intServiceId}}</td>
                                        <td>{{$service->strHospitalName}}</td>
                                        <td>{{$service->strServiceName}}</td>
                                        <td>
                                            <div class='btn-group'>
                                                <button class='btn btn-success'>View</button>
                                                <button class='btn btn-warning' onclick='editService({{$service->intServiceId}})'>Edit</button>
                                                <button class='btn btn-danger' onclick='deleteService({{$service->intServiceId}})'>Delete</button>
                                            </div>
                                        </td>
                                      </tr>
                                  @endforeach
                                  </table>
                              @else
                                  There are currently no hospital services.
                              @endif
                            </div>
                            <a href="#" onclick="addService()" data-target="#add-new-director" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
                              <i class="ti-plus"></i> Add New Hospital Service
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
function addService() {
  $.confirm({
    theme: "bootstrap",
    animateFromElement: false,
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Add Hospital Director</h4>",
    boxWidth: '70%',
    useBootstrap: false,
    content:"<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
                "<div class='form-group col-md-4'>"+
                    "<label for='serviceName'>Service Name</label>"+
                    "<input type='text' class='form-control' name='serviceName' id='serviceName'>"+
                "</div>"+
                "<div class='form-group col-md-8'>"+
                    "<label for='serviceDescription'>Service Description</label>"+
                    "<input type='text' class='form-control' name='serviceDescription' id='serviceDescription'>"+
                "</div>"+
            "</div></form>",
    buttons: {
      save: {
        btnClass: "btn btn-primary",
        action: function () {
          /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/addService')?>",
            method: 'post',
            data: "&strServiceName="+ this.$content.find("#serviceName").val() 
                 +"&strServiceDescription="+this.$content.find("#serviceDescription").val()
                 +"&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              window.location.href = "/admin/services";
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

//Edit Service
function editService(id) {
  $.confirm({
    theme: "bootstrap",
    animation: 'top',
    closeAnimation: 'top',
    backgroundDismiss: true,
    title: "<h4 class='modal-title'>Edit Hospital Director</h4>",
    boxWidth: '60%',
    useBootstrap: false,
    content: function () {
        var self = this;
        return $.ajax({
            url: "/admin/getModalEditService/"+ id,
            dataType: 'json',
            method: 'get'
        }).done(function (response) {
            var result = JSON.parse(JSON.stringify(response));
            self.setContent("<form class='form-group form-material p-2'>"+
            "<div class='row'>"+
                "<div class='form-group col-md-4'>"+
                    "<label for='serviceName'>Service Name</label>"+
                    "<input type='text' class='form-control' name='serviceName' id='serviceName' value='"+result[0].strServiceName+"'>"+
                "</div>"+
                "<div class='form-group col-md-8'>"+
                    "<label for='serviceDescription'>Service Description</label>"+
                    "<input type='text' class='form-control' name='serviceDescription' id='serviceDescription' value='"+result[0].txtServiceDescription+"'>"+
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
          /////////////////AJAXX
          $.ajax({
            url: "<?php echo url('admin/editService')?>",
            method: 'post',
            data: "&intServiceId="+ id 
                 +"&strServiceName="+ this.$content.find("#serviceName").val() 
                 +"&strServiceDescription="+this.$content.find("#serviceDescription").val()
                 +"&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              window.location.href = "/admin/services";
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

//Delete Service
function deleteService(id){
    $.ajax({
            url: "<?php echo url('admin/deleteService')?>",
            method: 'post',
            data: "&intServiceId="+ id 
                 +"&_token=" + "{{csrf_token()}}",
            async: false,
            success: function (data) {
              //LOG RESPONSE
              console.log(data);
              //REFRESH PAGE IF SUCCESS
              window.location.href = "/admin/services";
            },
            error: function (error) {
              console.log(error);
            }
          });
}
</script>