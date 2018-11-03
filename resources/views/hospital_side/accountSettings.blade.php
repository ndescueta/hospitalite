@extends('layouts.hospNav')
@section('content')
  <div class="row page-titles">
    <div class="col-md-10 align-self-center">
      <h4 class="text-themecolor">Account Settings</h4>
    </div>
  </div>

  <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hospital Logo</h4>
                    <h6 class="card-subtitle">Add / Edit Hospital Logo</h6>
                    <div id="croppie-wrapper" style='display: none; margin-left: -20px;'>
                    </div>
                    <button class='btn btn-primary btn-block' id="upload-result" style='display: none'>Save</button>
                    <div class='form-group'>
                        <label>Upload Image</label>
                        <input class="form-control" type='file' id="upload"/>
                    </div>
                </div>
            </div>
            <div class='card'>
                <div class='card-body'>
                    <h4 class="card-title">Representative</h4>
                    <h6 class="card-subtitle">Edit representative information.</h6>
                    <form>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control form-control-line" required> 
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control form-control-line" required> 
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control form-control-line" required> 
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="row text-center">
                                <div class='col-md-6'>
                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio2" name="customRadio2" class="custom-control-input">
                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                    </div>
                                </div>
                            </div>                           
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-line" required> 
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <input type="text" class="form-control form-control-line" required> 
                        </div>
                        <button class='btn btn-primary float-right'>Save</button>
                    </form>
                </div>
            </div>
      </div>
      <div class="col-lg-8">
                <div class="card">
                <div class="card-body">
                        <h4 class="card-title">Hospital</h4>
                        <h6 class="card-subtitle">Edit hospital information.</h6>
                        <form class="m-t-40 form-material">
                            <div class="form-group">
                                <label>Hospital Name</label>
                                <input type="text" class="form-control form-control-line" required> 
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" name="example-email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="example-email">Barangay</label>
                                    <input type="text" id="example-email2" name="example-email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="example-email">City</label>
                                    <input type="text" id="example-email2" name="example-email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label for="example-email">Zip</label>
                                    <input type="Number" id="example-email2" name="example-email" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button class='btn btn-primary float-right'>Save</button>
                        </form>
                    </div>
            </div>
            <div class="card">
                <div class='card-body'>
                    <h4 class="card-title">Director</h4>
                    <h6 class="card-subtitle">Edit hospital director information.</h6>
                </div>
            </div>
      </div>
  </div>

<script>
//Add CSRF TO AJAX
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
    }
});

//INITIALIZED CROPPIE
$uploadCrop = $('#croppie-wrapper').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
    boundary: {
        width: 300,
        height: 300
    }
});

//ON UPLOAD
$("#upload").on('change',function () {
    document.getElementById("upload").parentNode.style.display = "none";
    document.getElementById("croppie-wrapper").style.display = "block";
    document.getElementById("upload-result").style.display = "block";
    var reader = new FileReader();
    reader.onload = function (e) {
        $uploadCrop.croppie('bind',{
            url: e.target.result
        }).then(function () {
            console.log("Jquery bind Complete");
        });
    }
    reader.readAsDataURL(this.files[0]);
});

//ON SAVE
$("#upload-result").on('click', function () {
    $uploadCrop.croppie('result',{
        type: 'canvas',
        size: 'viewport',
    }).then(function (resp){
        $.ajax({
            url: "{{route('hosp.settings.uploadLogo')}}",
            type: "POST",
            data: {"image":resp,"id":"{{Auth::id()}}"},
            success: function (e) {
                console.log(e);
                window.location.href = "/hosp/settings";
            },
            failure: function () {
                alert(error);
            }
        });
    })
});
</script>
@endsection