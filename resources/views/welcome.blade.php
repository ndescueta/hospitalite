<!DOCTYPE html>
	<html lang="{{ app()->getLocale() }}" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Medical</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">=
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
			<!-- Material Design Bootstrap -->
			<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="container">
					<div class="header-wrap">
						<div class="header-top d-flex justify-content-between align-items-center">
							<div class="logo">
							<h4>
								<a href="#home" style='color: #778B94;'><img src="img/logo.png" alt=""><strong style='display:inline'>{{$HomePageTitle[0]->txtDescription}}</strong></a></h4>
							</div>
							<div class="main-menubar d-flex align-items-center">
								<nav class="hide">
									<a href="#home">Home</a>
									<a href="#service">Services</a>
									<a href="#appoinment">Contact Us</a>
									<a href="#TandS">Trainings and Seminars</a>
									<a href="#News">News</a>
									<a href="#">Faqs</a>
									<a href="{{route('hosp.login')}}">Sign Up/Login</a>
								</nav>
								<div class="menu-bar"><span class="lnr lnr-menu"></span></div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container">
						<div class="row fullscreen align-items-center justify-content-center">
							<div class="banner-content col-lg-6 col-md-12">
								<h1 class="text-uppercase">
									{{$bannerTexts[0]->txtDescription}}
								</h1>
								<p>
								{{$bannerTextDescriptions[0]->txtDescription}}
								</p>
							</div>
							<div class="col-lg-6 d-flex align-self-end img-right">
								<img class="img-fluid" src="{{asset('HomeContentImages/'.$bannerImage[0]->txtImageDirectory)}}" alt="">
							</div>
						</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start feature Area -->
			<section class="feature-area section-gap" id="service">
				<div class="container">
					<div class="col-md-12 pb-80 header-text text-center">
						<h1>Services</h1>
						<p>
							{{$ServiceDescriptions[0]->txtDescription}}
						</p>
					</div>

								<div class="row">
				@if(count($Services) >= 0)
        @foreach ($Services as $service)
        <div class="single-feature d-flex flex-row col-md-6 ">
          <div class="icon">
            <span class="lnr lnr-heart-pulse"></span>
          </div>
          <div class="desc">
            <h4 class="text-uppercase">{{$service->strServiceName}}</h4>
            <p>
              {{$service->txtServiceDescription}}
            </p>
          </div>
        </div>
        @endforeach
        @else
        <p>No Services Found</p>
        @endif
			</div>
				</div>
			</section>
			<!-- End feature Area -->


			<!-- Start about Area -->
			<section class="about-area" id="appoinment">
				<div class="container-fluid">
					<div class="row d-flex justify-content-end align-items-center">
						<div class="col-lg-6 col-md-12 about-left no-padding">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-6 col-md-12 about-right no-padding">
							<div class="header">
								<h1>{{$WhoWeAreDesc[0]->txtDescription}}</h1>
							</div>
							
							
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End about Area -->



			<section class="section custom-tabs i" id="TandS">
				<div class="container pb-100 pt-100 mb-50 mt-50">
					<div class="col-md-12 pb-80 header-text text-center">
						<h1>Trainings and Seminars</h1>
						<p>
							{{$EventsDescriptions[0]->txtDescription}}
						</p>
					</div>

					<div class="row">

					<div class="col-md-4 border-right element-animate">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						@php
							$events = \App\tblevent::all();
							foreach($events as $index=>$event) {
								if($index==0) {
									echo "<a class='nav-link active' id='v-pills-home-tab' data-toggle='pill' href='".'#'.$index."event"."' role='tab' aria-controls='v-pills-home' aria-selected='true'><span>".($index+1)."  </span>".$event->strEventName."</a>";
								}
								else {
									echo "<a class='nav-link' id='v-pills-home-tab' data-toggle='pill' href='".'#'.$index."event"."' role='tab' aria-controls='v-pills-home' aria-selected='true'><span>".($index+1)."  </span>".$event->strEventName."</a>";
								}
							}
						@endphp
						</div>
					</div>
					<div class="col-md-1"></div>
					<div class="col-md-7 element-animate text-dark">
						
						<div class="tab-content" id="v-pills-tabContent">

						@php
							$events = \App\tblevent::all();
							foreach($events as $index=>$event) {

								if($index==0) {
									echo "<div class='tab-pane fade show active' id='".$index."event"."' role='tabpanel' aria-labelledby='".$index."event"."'> <span class='icon flaticon-first-aid-kit mb-5'></span> <h2 class='text-dark'>".$event->strEventName."</h2> <p class='muted'>".$event->txtEventDescription."</p> <p></p> </div>";
								}
								else {
									echo "<div class='tab-pane fade' id='".$index."event"."' role='tabpanel' aria-labelledby='".$index."event"."'> <span class='icon flaticon-first-aid-kit mb-5'></span> <h2 class='text-dark'>".$event->strEventName."</h2> <p class='muted'>".$event->txtEventDescription."</p> <p></p> </div>";
								}
							}
						@endphp

						</div>
					</div>
					</div>
				</div>
				</section>
				<!-- END section -->

			<!-- Start blog Area -->
			<section class="blog-area section-gap" id="News">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-8 pb-30 header-text">
							<h1>News and Events</h1>
							<p>
								{{$EventsDescriptions[0]->txtDescription}}
							</p>
						</div>
					</div>
					<div class="row">
						@php
						$news = \App\News::all();
							foreach ($news as $index=>$newss) {
								if($newss->txtNewsImage == "") {
									$image = '/blank.png';
								}
								else {
									$image = '/'. $newss->txtNewsImage;
								}			

								$substrDesc = substr($newss->txtNewsDescription,0,300) . '....';					
								echo "<div class='single-blog col-lg-4 col-md-4'>
								<img class='f-img img-fluid mx-auto' src='".asset('newsImages/').$image."' alt=''>
								<h4>
								<a href='#'>".$newss->strNewsTitle."</a>
								</h4>
								<p>
								".$substrDesc."
								</p>
								<div class='bottom d-flex justify-content-between align-items-center flex-wrap'>
								<div>
								<img class='img-fluid' src='img/user.png' alt=''>
								<a href='#'><span>Mark Wiens</span></a>
								</div>
								<div class='meta'>
								13th Dec
								<span class='lnr lnr-heart'></span> 15
								<span class='lnr lnr-bubble'></span> 04
								</div>
								</div>
								</div>";
							}
						@endphp
					</div>
				</div>
			</section>
			<!-- end blog Area -->


			
<!-- start footer Area -->
<footer class="footer-area section-gap" id="foot">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single-footer-widget mail-chimp">
					<h1 class="text-white">Contact Us</h1>
					<h5 class="mb-20 text-default mt-1">

						@if (count($ContactDescriptions) >0)
						@foreach ($ContactDescriptions as $homecontent)
						{{$homecontent->txtDescription}}
						@endforeach
						@else
						Oof.
						@endif
					</h5>

					<h3>
						@if (count($Contacts) >0)
						@foreach ($Contacts as $homecontent)
						{{$homecontent->txtDescription}}
						@endforeach
						@else
						Oof.
						@endif
					</h3>
				</div>
			</div>
			<div class="col-lg-8 col-md-12 about-right no-padding">
				<div class="header">
					<h1>Send us questions!</h1>
					<div class="muted small">
					</div>
				</div>

				<form class="booking-form" id="myForm" action="#">
					<div class="row">
						<form method="post" name="frmQuestion">
							<!--div class="col-lg-12 d-flex flex-column">
								<input name="inqName" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" class="form-control mt-20" type="text" required>
							</div>
							<div class="col-lg-6 d-flex flex-column">
								<input name="inqPhone" placeholder="Phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone'" class="form-control mt-20" required="" type="text" required>
							</div>
							<div class="col-lg-6 d-flex flex-column">
								<input name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="form-control mt-20" required="" type="text" required>
							</div-->
							<div class="col-lg-12 flex-column">
								<textarea class="form-control mt-20" name="inqQuestion" placeholder="Question" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter question here'" required=""></textarea>
							</div>
							{{ csrf_field() }}
							<div class="col-lg-12 d-flex justify-content-end send-btn">
								<button class="submit-btn primary-btn mt-20 text-uppercase" type="submit">Send Question<span class="lnr lnr-arrow-right"></span></button>
							</div>
							<div class="alert-msg"></div>
						</form>
					</div>
				</form>
			</div>
		</div>

		<div class="row footer-bottom d-flex justify-content-between">
			<p class="col-lg-8 col-sm-12 footer-text m-0">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
		</div>
	</div>
</footer>
<section>
	<div class="container-fluid card card-body">
		<div class="row">
			<div class="col-md-4 text-center align-self-center">
				<i class="fas fa-question fa-10x" style="color: black;"></i>
			</div>
			<div class="col-md-8">
				<h1>Frequently Asked Questions</h1>
				@if(count($generalQuestions) > 0)
				@foreach($generalQuestions as $generalQuestion)
				<h3>Q: <small>{{$generalQuestion->txtGeneralQuestion}}</small></h3>
				<h3>A: <small>{{$generalQuestion->txtAnswer}}</small></h3><br>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</section>



			<!-- SCRIPTS-->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/parallax.min.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>
			<script src="js/main.js"></script>
			<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/js/mdb.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#rep_bday').datepicker({
		maxDate: 0
	});
});
$(document).on("submit", "form[name='frm_repRegister']", function(e){
	e.preventDefault();
	let formdata = $(this).serialize()
	console.log(formdata)
	let firstName = $('#rep_firstname').val()
	let middleName = $('#rep_middlename').val()
	let lastName = $('#rep_lastname').val()
	let sex = $('#rep_sex').val()
	let bDay = $('#rep_bday').val()
	let contact = $('#rep_contact').val()
	let regCode = $('#rep_regcode').val()
	let email = $('#rep_email').val()
	let password = $('#rep_password').val()

	$.ajax({
		type: "POST",
		url: "/register",
		data: $(this).serialize(),
		success: function (data){
			console.log(data)
			if (data == 1){
				swal({
					title:"Err",
					text:"Registration not successful",
					icon: "success",
					buttons:{text:"Okay"},
				})
				.then((willApprove) => {
					if (willApprove){
						$('#mdl_LoginRegistration').modal('hide');
					}
				});
			}
			else if (data == 2){
				swal({
					title: "Registration Success!",
					text: "You can now login!",
					icon: "success",
					buttons: false,
					timer: 1000
				})
			}
			else if (data == 3){
				$.notify("Username already exists!", "error");
			}
		}
	});
});
$(document).on("submit", "form[name='frm_Login']", function(e){
	e.preventDefault();

	let formdata = $(this).serialize()
	$.ajax({
		type: "POST",
		url: "/login",
		data: $(this).serialize(),
		success: function(result){

		}
	});
});
$(document).on("submit", "form[name='frmQuestion']", function(e){
	e.preventDefault();
	let formdata = $(this).serialize();
	console.log(formdata);
});
</script>
		</body>
	</html>
