﻿<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="ScriptsBundle">
	<title>@yield('title') | Queen's Community</title>
	<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
	<!-- <link rel="icon" href="{{ asset('front/assets') }}/img/favicon.ico" type="image/x-icon" /> -->
	<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
	<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"  />
	<!-- =-=-=-=-=-=-= Google Fonts =-=-=-=-=-=-= -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/dropify/css/dropify.min.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('front/assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('front/assets') }}/css/custom.css">
    @yield('css')
</head>

<body>
	<!-- =-=-=-=-=-=-= PRELOADER =-=-=-=-=-=-= -->
	{{-- <div class="preloader"><span class="preloader-gif"></span></div> --}}
	<!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
	<div class="top-bar">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="top-nav text-center">
					<li><a href="{{ route('view.blogs') }}">Read |</a>
					</li>
					<li class="hidden-xs"><a href="{{ route('view.videos') }}">Watch |</a>
					</li>
					<li  class="hidden-xs"><a href="{{ route('view.hangout') }}">Hangout</a>
					</li>
				</ul>
			</div>

		</div>
	</div>
</div>
	<!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
	<div class="navbar navbar-expand-lg navbar-light navbar-default">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<!-- header -->
					<div class="navbar-header">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>
						<!-- logo -->
						<a href="{{ route('index') }}" class="navbar-brand">
							<img class="img-responsive" alt="" src="{{ asset('front/assets') }}/img/logo.png">
						</a>
						<!-- header end -->
					</div>
				</div>
				<div class="col-md-9">
					<!-- navigation menu -->
					<div class="navbar-collapse collapse navbar-right" id="navbarSupportedContent">
						<!-- right bar -->
						<ul class="nav navbar-nav">
							<li class="hidden-sm"><a href="#">Fashion</a>
							</li>
							<li><a href="#">Beauty</a>
							</li>
							<li class="hidden-sm"><a href="#">Lifestyle</a>
							</li>
							<li><a href="#">Wedding</a>
							</li>
							<li class="hidden-sm"><a href="#">Wellness</a>
							</li>
							<li><a href="#">Entertainent</a>
							</li>
							<li>

							</li>
						</ul>
					<!-- navigation menu end -->
					</div>
				</div>

				<div class="col-md-1 margin-top-20">

					<div class="btn-nav">
						@if(!Auth::Check())
							<a href="{{ route('user.post.question') }}" class="btn btn-primary btn-sm navbar-btn">Post Question</a>
						@else
							<a href="{{ route('user.dashboard') }}" class="btn btn-primary btn-sm navbar-btn">Dashboard</a>
						@endif
					</div>
				</div>
			</div>
			<!--/.navbar-collapse -->
		</div>
	</div>
	<!-- HEADER Navigation End -->
	<!-- =-=-=-=-=-=-= HOME =-=-=-=-=-=-= -->

	<!-- =-=-=-=-=-=-= HOME END =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
    @yield('content')

	<!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
	<footer class="footer-area">
		<!--Footer Upper-->
		<div class="footer-content">
			<div class="container">
				<div class="row clearfix">
					<div class="col-md-12">
						<div class="footer-content text-center no-padding margin-bottom-40">
							<div class="logo-footer">
								<img id="logo-footer" class="center-block" src="{{ asset('front/assets') }}/img/logo.png" alt="">
							</div>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Lorem ipsum dolor sit amet, illo vel.</p>
						</div>
					</div>
					<!--Two 4th column-->
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="row clearfix">
							<div class="col-lg-7 col-sm-6 col-xs-12 column">
								<div class="footer-widget about-widget">
									<h2>Queen's Community</h2>
									<ul class="contact-info">
										<li><span class="icon fa fa-map-marker"></span> Bahria Town Lahore, Pakistan</li>
										<li><span class="icon fa fa-phone"></span> (042) 1234567890</li>
										<li><span class="icon fa fa-map-marker"></span>info@queenscommunity.com</li>
									</ul>
									<div class="social-links-two clearfix">
										<a href="#" class="facebook img-circle">	<span class="fa fa-facebook-f"></span>
										</a>
										<a href="#" class="twitter img-circle">	<span class="fa fa-twitter"></span>
										</a>
										<a href="#" class="google-plus img-circle">	<span class="fa fa-google-plus"></span>
										</a>
										<a href="#" class="linkedin img-circle"> <span class="fa fa-pinterest-p"></span>
										</a>
										<a href="#" class="linkedin img-circle">	<span class="fa fa-linkedin"></span>
										</a>
									</div>
								</div>
							</div>
							<!--Footer Column-->
							<div class="col-lg-5 col-sm-6 col-xs-12 column">
								<h2>Company</h2>
								<div class="footer-widget links-widget">
									<ul>
										<li><a href="#">About</a>
										</li>
										<li><a href="#">Read</a>
										</li>
										<li><a href="#">Watch</a>
										</li>
										<li><a href="#">Questions</a>
										</li>
										<li><a href="#">Polls</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--Two 4th column End-->
					<!--Two 4th column-->
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="row clearfix">
							<!--Footer Column-->
							<div class="col-lg-7 col-sm-6 col-xs-12 column">
								<div class="footer-widget news-widget">
									<h2>Latest Posts</h2>
									<!--News Post-->
									<div class="news-post">
										<div class="icon"></div>
											<a href="#">If you need a crown or lorem an implant you will pay it gap it</a>
										<div class="time">April 2, 2021</div>
									</div>
									<!--News Post-->
									<div class="news-post">
										<div class="icon"></div>
											<a href="#">If you need a crown or lorem an implant you will pay it gap it</a>
										<div class="time">April 2, 2021</div>
									</div>
								</div>
							</div>
							<!--Footer Column-->
							<div class="col-lg-5 col-sm-6 col-xs-12 column">
								<div class="footer-widget links-widget">
									<h2>Explore</h2>
									<ul>
										<li><a href="#">Login</a>
										</li>
										<li><a href="#">Register</a>
										</li>
										</li>
										<li><a href="#">Contact Us</a>
										</li>
										<li><a href="#">ZachaBacha.com</a>
										</li>
										<li><a href="#">NextMamas.com</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--Two 4th column End-->
				</div>
			</div>
		</div>
		<!--Footer Bottom-->
		<div class="footer-copyright">
			<div class="auto-container clearfix">
				<!--Copyright-->
				<div class="copyright text-center">Copyright 2021 &copy; <a target="_blank" href="#">Queen's Community</a> All Rights Reserved</div>
			</div>
		</div>
	</footer>

	<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
	{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{asset('admin/dropify/js/dropify.min.js') }}"></script>

	<!-- Template Core JS -->
	<script src="{{ asset('front/assets') }}/js/custom.js"></script>
	<script>
		      @if(session('message'))
      toastr.success("{{ session('message') }}");
      @elseif(session('error'))
      toastr.error("{{ session('error') }}");
      @endif
        $('.dropify').dropify();
	</script>
    @yield('js')
</body>
</html>





