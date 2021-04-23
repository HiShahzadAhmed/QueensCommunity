<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<title>@yield('title') | Queen's Community</title>
    	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">

		<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"  />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{asset('admin/dropify/css/dropify.min.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<link rel="stylesheet" href="{{ asset('front/assets') }}/css/style.css">
		<link rel="stylesheet" href="{{ asset('front/assets') }}/css/custom.css">
		@yield('css')
	</head>
	<body>

	<div class="top-bar p-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="top-nav text-center">
						<li><a href="{{ route('view.blogs') }}">Read |</a></li>
						<li class="hidden-xs"><a href="{{ route('view.videos') }}">Watch |</a></li>
						<li  class="hidden-xs"><a href="{{ route('view.hangout') }}">Hangout</a></li>
						@if(Auth::check())
							<li  class="hidden-xs"><a href="{{ route('logout') }}">| Logout</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light">

		<a href="{{ route('index') }}" class="navbar-brand">
			<img class="img-responsive main-logo" alt="" src="{{ asset($setting['logo'] ?? '')  }}">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">

				@foreach(categories() as $category)

					@if($category->sub_category == '')
						<li class="nav-item"><a class="nav-link" href="{{ route('search.category', ['type' => 'main', 'keyword' => $category->category]) }}">{{ $category->category }}</a></li>
					@else

					<li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          {{ $category->category }}
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				          @foreach(subcategories($category->category) as $sub)
						    	<a class="dropdown-item" href="{{ route('search.category', ['type' => 'sub', 'keyword' => $sub]) }}">{{ $sub }}</a>
						    @endforeach
				        </div>
				      </li>

					@endif

				@endforeach

			</ul>
			<span class="navbar-text">
				<a href="#" class="btn btn-primary btn-sm navbar-btn text-white">PWL</a>
			</span>
		</div>
	</nav>
</div>
</div>
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
			<div class="col-md-6 col-sm-12 col-xs-12">
				<div class="row clearfix">
					<div class="col-lg-7 col-sm-6 col-xs-12 column">
						<div class="footer-widget about-widget">
							<div class="logo-footer">
						<img id="logo-footer" class="center-block" src="{{ asset($setting['logo'] ?? '')  }}" alt="">
					</div>
					<p>{{$setting['footer_description'] ?? ''}}</p>
						</div>
					</div>
	<!--Footer Column-->
	<div class="col-lg-5 col-sm-6 col-xs-12 column">
		<h2>Company</h2>
		<div class="footer-widget links-widget">
			<ul>
				<li><a href="{{ route('view.blogs') }}">Read</a></li>
				<li><a href="{{ route('view.videos') }}">Watch</a></li>
				<li><a href="{{ route('view.question') }}">Questions</a></li>
				<li><a href="{{ route('view.polls') }}">Polls</a></li>
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
		<div class="col-lg-5 col-sm-6 col-xs-12 column">
			<div class="footer-widget links-widget">
				<h2>Explore</h2>
				<ul>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('contact') }}">Contact Us</a></li>
					<li><a href="https://zachabacha.com/" target="_blank">ZachaBacha.com</a></li>
					<li><a href="https://nextmamas.com/" target="_blank">NextMamas.com</a></li>
				</ul>
			</div>
		</div>
		<!--Footer Column-->
		<div class="col-lg-7 col-sm-6 col-xs-12 column">
			<div class="footer-widget about-widget">
							<h2>Queen's Community</h2>

							<div>
								<p><span class="icon fa fa-map-marker"></span> {{$setting['address'] ?? ''}}</p>
								<p><span class="icon fa fa-phone"></span> {{$setting['phone'] ?? ''}}</p>
								<p><span class="icon fa fa-map-marker"></span> {{$setting['email'] ?? ''}}</p>
							</div>

							<div class="footer-social-links">
								<a href="{{$setting['facebook'] ?? ''}}" target="_blank">	<span class="fa fa-facebook-f"></span></a>
											<a href="{{$setting['twitter'] ?? ''}}" target="_blank">	<span class="fa fa-twitter"></span></a>
										<a href="{{$setting['instagram'] ?? ''}}" target="_blank"> <span class="fa fa-instagram"></span>
									</a>
									<a href="{{$setting['linkedin'] ?? ''}}" target="_blank">	<span class="fa fa-linkedin"></span>
								</a>
							</div>
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
<div class="copyright text-center">Copyright {{ date('Y') }} &copy; <a target="_blank" href="{{ route('index') }}">Queen's Community</a> {{ $setting['copyright'] ?? '' }}</div>
</div>
</div>
</footer>

        <a class="quiz-float" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="fas fa-plus my-float"></i>
        </a>

<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">What you want to Post?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a href="" class="btn btn-sm btn-block btn-site btn-quiz"><i class="fas fa-poll"></i> Create a poll</a>
        <a href="" class="btn btn-sm btn-block btn-site btn-quiz"><i class="fas fa-question-circle"></i> Post a question</a>
      </div>
    </div>
  </div>
</div>



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
