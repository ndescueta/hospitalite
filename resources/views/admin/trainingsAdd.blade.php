@extends ('layouts.adminNav')

@section('content')
<style>
  .uploadImage {
    border: 1px dashed gray;
    height: 200px;
    align-content: "center";
    position: relative; 
  }
.uploadImage .center-icon {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) 
    }


</style>

<div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Trainings and Seminar</h4>
                  </div>
                </div>
                <!-- Content -->
                <div class='card'>
                <div class='card-body'>               
                <form id='frmAddEvent' class='form-group form-material p-2' method='post' enctype="multipart/form-data" action="<?php echo url('admin/addEvent')?>">
                <label>Event Images</label>
                <div class="row">
                <div class='col-md-4'>
                <img id='img1' width='100%'/>
                <br>
                <input type='file' name='file1' id='file1' required/>
                </div>
                <div class='col-md-4'>
                <img id='img2' width='100%'/>
                <br>
                <input type='file' name='file2' id='file2' required/>
                </div>
                <div class='col-md-4'>
                <img id='img3' width='100%'/>
                <br>
                <input type='file' name='file3' id='file3' required/>
                </div>
                </div>
                <br>
<div class='row'>
<div class='form-group col-md-12'>
<label for='eventName'>Event Name <small>(Required)</small></label>
<input type='text' class='form-control' name='strEventName' id='eventName' required>
</div>
<div class='form-group col-md-3'>
<label for='eventStreet'>Event Street <small>(Required)</small></label>
<input type='text' class='form-control' name='txtEventStreet' id='eventStreet' required>
</div>
<div class='form-group col-md-3'>
<label for='eventBarangay'>Event Barangay <small>(Required)</small></label>
<input type='text' class='form-control' name='txtEventBarangay' id='eventBarangay' required>
</div>
<div class='form-group col-md-3'>
<label for='eventCity'>Event City <small>(Required)</small></label>
<input type='text' class='form-control' name='txtEventCity' id='eventCity' required>
</div>
<div class='form-group col-md-3'>
<label for='eventZip'>Event Zip Code <small>(Required)</small></label>
<input type='number' class='form-control' name='intEventZip' id='eventZip' required>
</div>
<div class='form-group col-md-6'>
<label for='eventDateStart'>Event Date Start <small>(Required)</small></label>
<input type='date' name='datDateStart' id='eventDateStart' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventDateEnd'>Event Date End <small>(Required)</small></label>
<input type='date' name='datDateEnd' id='eventDateEnd' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventTimeStart'>Event Time Start <small>(Required)</small></label>
<input type='time' name='timTimeStart' id='eventTimeStart' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventTimeEnd'>Event Time End <small>(Required)</small></label>
<input type='time' name='timTimeEnd' id='eventTimeEnd' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventCapacity'>Capacity <small>(Required)</small></label>
<input type='number' name='intEventCapacity' id='eventCapacity' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventPaymentDue'>Payment Due <small>(Required)</small></label>
<input type='date' name='datPaymentDue' id='eventPaymentDue' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label>Bank Account Number <small>(Required)</small></label>
<input name='stfEventBankAccount' id='eventAccountNo' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label>Payment Centre <small>(Required)</small></label>
<input name='strEventPaymentCenter' id='eventPaymentCenter' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label>Event Price <small>(Required)</small></label>
<input type='number' name='monEventPrice' id='eventPrice' class='form-control' required>
</div>
<div class='form-group col-md-6'>
<label for='eventDescription'>Description <small>(Required)</small></label>
<textarea class='form-control' name='txtEventDescription' id='eventDescription' rows='5' require></textarea>
<input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />
</div>
</div>
<button class='btn btn-primary float-right'>Add</button>
</form>
                </div>
                </div>

<!-- SCRIPTS -->

<script>

    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img1').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img2').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img3').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#file1").change(function(){
        readURL1(this);
    });

    $("#file2").change(function(){
        readURL2(this);
    });

    $("#file3").change(function(){
        readURL3(this);
    });

</script>


@endsection