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
	<title>
		@if (count($HomePageTitle) > 0)
    @foreach ($HomePageTitle as $homecontent)
    {{$homecontent->txtDescription}}
    @endforeach
    @else
    Oof.
    @endif
	</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
	CSS
	============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">=
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<!-- Material Design Bootstrap -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.4/css/mdb.min.css" rel="stylesheet">
</head>
<body>

	<!-- Start Header Area -->
	<header class="default-header">
		<div class="container">
			<div class="header-wrap">
				<div class="header-top d-flex justify-content-between align-items-center">
					<p>
					<div class="logo">
						@if (count($HomePageTitle) > 0)
				    @foreach ($HomePageTitle as $homecontent)
				    {{$homecontent->txtDescription}}
				    @endforeach
				    @else
				    Oof.
				    @endif
					</div>
				</p>
					<div class="main-menubar d-flex align-items-center">
						<nav class="hide">
							<a href="#home">Home</a>
							<a href="#service">Services</a>
							<a href="#appoinment">Contact Us</a>
							<a href="#TandS">Trainings and Seminars</a>
							<a href="#consultant">Members</a>
							<a href="#News">News</a>
							<a href="#">Faqs</a>
							<a href="#" data-toggle="modal" data-target="#mdl_LoginRegistration">Sign Up/Login</a>
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
						@if (count($bannerTexts) >0)
						@foreach ($bannerTexts as $homecontent)
						{{$homecontent->txtDescription}}
						@endforeach
						@else
						Oof.
						@endif
					</h1>
					<p>
						@if (count($bannerTextDescriptions) >0)
						@foreach ($bannerTextDescriptions as $homecontent)
						{{$homecontent->txtDescription}}
						@endforeach
						@else
						Oof.
						@endif
					</p>
				</div>
				<div class="col-lg-6 d-flex align-self-end img-right">
					@if(count($bannerImage) >= 0)
          @foreach ($bannerImage as $homecontent)
          <!--Banner Text Description-->
          <img class="img-fluid" src="/storage/cover_images/{{$homecontent->txtImageDirectory}}" alt="">
          @endforeach
          @else
          <img class="img-fluid" src="img/header-img.png" alt="">
					<!-- <h1>Oof.</h1> -->
          @endif
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
					@if (count($ServiceDescriptions) >0)
					@foreach ($ServiceDescriptions as $homecontent)
					{{$homecontent->txtDescription}}
					@endforeach
					@else
					Oof.
					@endif
				</p>
			</div>

			<div class="row">
				@if(count($Services) >= 0)
        @foreach ($Services as $service)
        <div class="single-feature d-flex flex-row col-md-6">
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
					@if(count($whoWeAreImage) >= 0)
          @foreach ($whoWeAreImage as $homecontent)
          <img class="img-fluid" src="/storage/cover_images/{{$homecontent->txtImageDirectory}}" alt="">
          @endforeach
          @else
          <img class="img-fluid" src="/img/about-img.jpg" alt="">
          @endif
				</div>
				<div class="col-lg-6 col-md-12 about-right no-padding">
					<h1>Who we are</h1>
					<h3 class = "text-white">

						@if (count($WhoWeAreDesc) > 0)
						@foreach ($WhoWeAreDesc as $homecontent)
						{{$homecontent->txtDescription}}
						@endforeach
						@else
						Oof.
						@endif
					</h3>
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
				@if (count($EventsDescriptions) >0)
				@foreach ($EventsDescriptions as $homecontent)
				{{$homecontent->txtDescription}}
				@endforeach
				@else
				Oof.
				@endif
			</p>
		</div>

		<div class="row">

			<div class="col-md-4 border-right element-animate">
				<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">


					@if(count($Events) >= 0)
					@foreach ($Events as $Event)
					<a class="nav-link active" id="{{$Event->intEventId}}" data-toggle="pill" href="{{$Event->intEventId}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{$Event->strEventName}}</a>
					@endforeach
					@else
					<p>No Events Found</p>
					@endif




					<!-- <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span>01</span> Is Health Important?</a>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span>02</span> Medical Training</a>
					<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span>03</span> Patient Guidance</a>
					<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
					aria-selected="false"><span>04</span> Doctors</a> -->

				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-7 element-animate text-dark">

				<div class="tab-content" id="v-pills-tabContent">
					@if(count($Events) >= 0)
					@foreach ($Events as $Event)
					<div class="tab-pane fade show active" id="{{$Event->intEventId}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<span class="icon flaticon-hospital mb-5"></span>
						<h2 class="text-dark">{{$Event->strEventName}}</h2>
						<p class="muted">{{$Event->strEventPaymentCenter}}</p>
					</div>
					@endforeach
					@else
					<p>No Events Found</p>
					@endif
					<!-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<span class="icon flaticon-hospital mb-5"></span>
						<h2 class="text-dark">Is Health Important?</h2>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
						<p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
						<span class="icon flaticon-first-aid-kit mb-5"></span>
						<h2 class="text-dark">Medical Training</h2>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
						<p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
						<span class="icon flaticon-hospital-bed mb-5"></span>
						<h2 class="text-dark">Patient Guidance</h2>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
						<p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div>
					<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
						<span class="icon flaticon-doctor mb-5"></span>
						<h2 class="text-dark">Doctors</h2>
						<p class="muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
						<p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis! Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus quaerat doloremque.</p>
						<p><a href="#" class="btn btn-primary">Learn More</a></p>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END section -->

<!-- Start consultans Area -->
<section class="consultans-area section-gap" id="consultant">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 pb-80 header-text">
				<h1>Members of the Hospital</h1>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> labore  et dolore magna aliqua.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-3 vol-wrap">
				<div class="single-con">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="img/c1.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h4>Andy Florence</h4>
								<p>
									inappropriate behavior
								</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 vol-wrap">
				<div class="single-con">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="img/c2.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h4>Andy Florence</h4>
								<p>
									inappropriate behavior
								</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 vol-wrap">
				<div class="single-con">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="img/c3.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h4>Andy Florence</h4>
								<p>
									inappropriate behavior
								</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 vol-wrap">
				<div class="single-con">
					<div class="content">
						<a href="#" target="_blank">
							<div class="content-overlay"></div>
							<img class="content-image img-fluid d-block mx-auto" src="img/c4.jpg" alt="">
							<div class="content-details fadeIn-bottom">
								<h4>Andy Florence</h4>
								<p>
									inappropriate behavior
								</p>
							</div>
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End consultans Area -->

<!-- Start fact Area -->
<section class="facts-area pt-100 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 single-fact">
				<h2 class="counter">2536</h2>
				<p class="text-uppercase">Clients Served</p>
			</div>
			<div class="col-lg-3 col-md-6 single-fact">
				<h2 class="counter">6784</h2>
				<p class="text-uppercase">X-rays Done</p>
			</div>
			<div class="col-lg-3 col-md-6 single-fact">
				<h2 class="counter">1059</h2>
				<p class="text-uppercase">Worldwide stuff</p>
			</div>
			<div class="col-lg-3 col-md-6 single-fact">
				<h2 class="counter">2239</h2>
				<p class="text-uppercase">Lives Saved</p>
			</div>
		</div>
	</div>
</section>
<!-- end fact Area -->

<!-- Start blog Area -->
<section class="blog-area section-gap" id="News">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 pb-30 header-text">
				<h1>News</h1>
				<p>

				</p>
			</div>
		</div>
		<div class="row">

			@if(count($News) >= 0)
			@foreach ($News as $New)
			<div class="single-blog col-lg-4 col-md-4">
				<div class="img-fluid text-center">
					<img class="f-img img-fluid mx-auto" src="/newsImages/{{$New->txtNewsImage}}" alt="" style="min-height: 100px; max-height: 200px">
				</div>
				<h4>
					<a href="#">{{$New->strNewsTitle}}</a>
				</h4>
				<p>
					{!!$New->txtNewsDescription!!}
				</p>
			</div>
			@endforeach
			@else
			<p>No News Found</p>
			@endif
		</div>
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
<!-- End footer Area -->


<!-- Modal -->
<div class="modal fade" id="ClassModal" tabindex="-1" role="dialog" aria-labelledby="ClassModal" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ClassModal">Add Class Data</h5>
				<button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="container">


					<div class="col-md-12">
						<label for="ClassName">Class Name</label>
						<input type="text" class="form-control" id="ClassName" placeholder="....">
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline-danger">Confirm</button>
			</div>
		</div>
	</div>
</div>


<!--Modal: Login / Register Form-->
<div class="modal fade" id="mdl_LoginRegistration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog cascading-modal modal-lg" role="document">
		<!--Content-->
		<div class="modal-content">

			<!--Modal cascading tabs-->
			<div class="modal-c-tabs">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs tabs-2 blue-grey darken-3" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class=""></i> Login</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class=""></i> Register</a>
					</li>
				</ul>

				<!-- Tab panels -->
				<div class="tab-content">
					<!--Panel 7-->
					<div class="tab-pane fade in show active" id="panel7" role="tabpanel">

						<!--Body-->
						<div class="modal-body mb-1">
							<form method="post" name="frm_Login">
								<div class="md-form form-sm mb-5">
									<i class="prefix"></i>
									<input type="email" id="repEmail" name="repEmail" class="form-control form-control-sm validate">
									<label data-error="wrong" data-success="right" for="repEmail">Email</label>
								</div>

								<div class="md-form form-sm mb-4">
									<i class="prefix"></i>
									<input type="password" id="repPassword" name="repPassword" class="form-control form-control-sm validate">
									<label data-error="wrong" data-success="right" for="repPassword">Password</label>
								</div>
								{{ csrf_field() }}
								<div class="text-center mt-2">
									<button type="submit" class="btn btn-elegant waves-light">Log in <i class="fa fa-sign-in ml-1  text-light"></i></button>
								</div>
							</form>
						</div>
						<!--Footer-->
						<div class="modal-footer">
							<div class="options text-center text-md-right mt-1">
								<p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
								<p>Forgot <a href="#" class="blue-text">Password?</a></p>
							</div>
							<button type="button" class="btn btn-outline-elegant waves-effect ml-auto" data-dismiss="modal">Close</button>
						</div>

					</div>
					<!--/.Panel 7-->

					<!--Panel 8-->
					<div class="tab-pane fade" id="panel8" role="tabpanel">

						<!--Body-->
						<div class="modal-body">
							<h6 style="margin-top: -15px; color:rgb(110,110,110); font-weight: bold;">Representative</h6> <span><br><small>Fields with <span style="color:red">(*)</span> are required</small></span>

							<form method="post" name="frm_repRegister">
								<div class="row">
									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_firstname">First Name</label>
										<input type="text" id="rep_firstname" name="rep_firstname" class="form-control form-control-sm validate" required>
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="rep_middlename">Middle Name</label>
										<input type="text" id="rep_middlename" name="rep_middlename" class="form-control form-control-sm validate">
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_lastname">Last Name</label>
										<input type="text" id="rep_lastname" name="rep_lastname" class="form-control form-control-sm validate" required>
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_sex">Sex</label>
										<select class="form-control" name="rep_sex" id="rep_sex" required>
											<option selected disabled>Select appropriate sex</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_bday">Birth Date</label>
										<input type="text" id="rep_bday" name="rep_bday" class="form-control form-control-sm validate" required>
									</div>

									<div class="mb-5 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_contact">Contact</label>
										<input type="text" id="rep_contact" name="rep_contact" class="form-control form-control-sm validate">
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_regcode">Registration Code</label>
										<input type="text" id="rep_regcode" name="rep_regcode" class="form-control form-control-sm validate" required>
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_email">Email</label>
										<input type="email" id="rep_email" name="rep_email" class="form-control form-control-sm validate" required>
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix" style="color:red">*</i>
										<label data-error="wrong" data-success="right" for="rep_password">Password</label>
										<input type="password" id="rep_password" name="rep_password" class="form-control form-control-sm validate" required>
										<!-- <small id="letter">Lower case</small><br>
										<small id="capital">Upper case</small><br>
										<small id="number">Number</small><br>
										<small id="length">Must be 8 characters or longer</small> -->
									</div>

									<!-- <div class="mb-5 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="modalLRInput14">Repeat password</label>
										<input type="password" id="modalLRInput14" class="form-control form-control-sm validate">
									</div> -->
									{{ csrf_field() }}
									<div class="text-center col-md-6 mx-auto form-sm mt-2">
										<button class="btn btn-elegant btn-block">Sign up <i class="fa fa-sign-in text-light ml-1"></i></button>
									</div>
								</div>
							</form>
								<!-- <h6 style="margin-top: -15px; color:rgb(110,110,110); font-weight: bold;">Hospital</h6>
								<div class="row border-bottom">
									<div class="mb-3 col-md-12">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="hospName">Hospital Name</label>
										<input type="text" name="hospName" id="hospName" class="form-control form-control-sm">
									</div>
									<h6 class="col-md-12" style="color: rgb(40,40,40); margin-bottom: 0px">Hospital Address</h6>
									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="hospStreet">Street</label>
										<input type="text" name="hospStreet" id="hospStreet" class="form-control form-control-sm">
									</div>
									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="hospBrgy">Barangay</label>
										<input type="text" name="hospBrgy" id="hospBrgy" class="form-control form-control-sm">
									</div>
									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="hospCity">City</label>
										<input type="text" name="hospCity" id="hospCity" class="form-control form-control-sm">
									</div>
									<div class="mb-5 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="hospZcode">Zip Code</label>
										<input type="text" name="hospZcode" id="hospZcode" class="form-control form-control-sm">
									</div>
								</div>
								<h6 style="margin-top: -15px; color:rgb(110,110,110); font-weight: bold;">Hospital Director</h6>
								<div class="row">
									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="dir_firstname">First Name</label>
										<input type="text" id="dir_firstname" name="dirp_firstname" class="form-control form-control-sm validate">
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="dir_middlename">Middle Name</label>
										<input type="text" id="dir_middlename" name="dir_middlename" class="form-control form-control-sm validate">
									</div>

									<div class="mb-3 col-md-4">
										<i class="prefix"></i>
										<label data-error="wrong" data-success="right" for="dir_lastname">Last Name</label>
										<input type="text" id="dir_lastname" name="dirdir_lastname" class="form-control form-control-sm validate">
									</div>
								</div> -->
						</div>
						<!--Footer-->
						<div class="modal-footer">
							<div class="options text-right">
								<p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
							</div>
							<button type="button" class="btn btn-outline-elegant waves-effect ml-auto" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!--/.Panel 8-->
				</div>

			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!--Modal: Login / Register Form-->

<div class="text-center">
	<a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#mdl_LoginRegistration">Launch Modal LogIn/Register</a>
</div>





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
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/notify.min.js"></script>
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
// $(document).on("submit", "form[name='frmQuestion']", function(e){
// 	e.preventDefault();
// 	let formdata = $(this).serialize();
// 	console.log(formdata);
// });
</script>
</body>
</html>
