<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- page css -->
    <link href="{{(asset('assets/node_modules/register-steps/steps.css'))}}" rel="stylesheet">
    <link href="{{asset('dist/css/pages/register3.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!--alerts CSS -->
    <link href="../assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    <style>
        /* XL MODAL HACK */
        @media (min-width: 768px) {
            .modal-xl {
            width: 90%;
            max-width:1200px;
            }
        }
        /*SPIN ELEMENT (USE IN LOADING ICONS)*/
        .spinner {
            -webkit-animation: spin 1000ms infinite linear;
            animation: spin 1000ms infinite linear;
            color: 'red';
        }
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(-359deg);
                transform: rotate(-359deg);
            }
        }
        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(-359deg);
                transform: rotate(-359deg);
            }
        }
    </style>
</style>
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="step-register">
        
        <div class="register-box">
            <div class="">
                <!-- multistep form -->
                @if ($errors->any())
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form id="msform" method='post' action="{{route('hosp.register')}}">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Registration Code</li>
                        <li class=>Basic Information</li>
                        <li>Account Information</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Registration Code</h2>
                        <h3 class="fs-subtitle">Enter the given registration code given by the admin</h3>
                        <input type="text" id='regCode' name="regCode" placeholder="Registration Code"/>
                        <input type="button" name="next" class="action-button" onclick="checkRegCode()" value="Next" />
                        <input type="button" name="next" id='regNext' class="next action-button" value="Next" style='display: none' />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Basic Information</h2>
                        <h3 class="fs-subtitle">Fill up your basic information.</h3>
                        <input type="text" id='hospitalName' disabled/>
                        <input type='hidden' name='hospitalId' id='hospitalId' />
                        <div class='row'>
                            <div class='col-md-4'>
                                <input type="text" name="firstName" placeholder="First Name" />
                            </div>
                            <div class='col-md-4'>
                                <input type="text" name="middleName" placeholder="Middle Name" />
                            </div>
                            <div class='col-md-4'>
                                <input type="text" name="lastName" placeholder="Last Name" />
                            </div>
                        </div>           
                        <input type="text" name="contact" placeholder="Contact" />
                        <input type="email" name="email" placeholder="Email" />
                        <div class="form-group">
                            <label>Gender</label>
                            <div class="row">
                                <div class='col-md-6'>
                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio3" name="gender" class="custom-control-input" value='Male'>
                                    <label class="custom-control-label" for="customRadio3">Male</label>
                                    </div>
                                </div>
                                <div class='col-md-6'>
                                    <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio4" name="gender" class="custom-control-input" value='Female' >
                                    <label class="custom-control-label" for="customRadio4">Female</label>
                                    </div>
                                </div>
                            </div>
                                                     
                        </div>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="button" name="next" class="next action-button" value="Next" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Account Information</h2>
                        <h3 class="fs-subtitle">Fill up your account information</h3>
                        <input type="text" name="username" placeholder="Username" />
                        <input type="password" name="password" placeholder="Password" />
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" />
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="submit" name="submit" class="submit action-button" onclick='submitForm()' value="Submit" />
                    </fieldset>
                    <button id='submitButton'></button>
                    <input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />
                </form>
                
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{asset('assets/node_modules/register-steps/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/register-steps/register-init.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="../assets/node_modules/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/node_modules/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });

    function checkRegCode() {
        swal({
        title: "Validating",
        text: "Please wait while we validate your registration code.",
        icon: "success",
        button: "Aww yiss!",
        allowOutsideClick: false,
        confirmButtonColor: '#E46A76',
        });
        swal.showLoading({});
        // setTimeout(function () {document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0].parentNode.removeChild(document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0])},1000);
        
        
        /////////////////AJAXX
        $.ajax({
            url: "{{route('hosp.checkRegCode')}}",
            method: 'post',
            data: "&regCode=" + $('#regCode').val() + "&_token=" + "{{csrf_token()}}" ,
            async: false,
            success: function (data) {
              if(data != 0) {
                var result = JSON.parse(JSON.stringify(data));
                $('#hospitalName').val(result[0].strHospitalName);
                $('#hospitalId').val(result[0].intHospitalId);
                document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0].parentNode.removeChild(document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0]);            
                  document.getElementById("regNext").click();
              }
              else {
                document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0].parentNode.removeChild(document.getElementsByClassName("swal2-container swal2-center swal2-fade swal2-shown")[0]);
                
                swal({
                    title: 'Registration Code Invalid',
                    text: 'Please check you registration code.',
                    type: 'error',
                    confirmButtonText: 'Back',
                    confirmButtonColor: '#E46A76',
                });
              }
            },
            error: function (error) {
              console.log(error);
            }
          });

    }

    function submitForm() {
        document.getElementById("submitButton").click();
    }
    </script>
</body>

</html>