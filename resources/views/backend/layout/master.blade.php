<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css')}} " rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css')}} backend/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css')}} " />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css')}} backend/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css')}}" />
	<title>Rukada - Responsive Bootstrap 5 Admin Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('backend.pages.saidbar')
		<!--end sidebar wrapper -->
		<!--start header -->
@include('backend.pages.header')
		<!--end header -->


		<!--start page wrapper -->
		<div class="page-wrapper">
			@yield('content')
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->





	<!--start switcher-->
	@include('backend.pages.switcher')
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src=" {{asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{asset('backend/assets/js/jquery.min.js') }} "></script>
	<script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }} "></script>
	<script src=" {{asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src=" {{asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
	<script src=" {{asset('backend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
	  <script>
		  $(function() {
			  $(".knob").knob();
		  });
	  </script>
	  <script src="{{asset('backend/assets/js/index.js') }} "></script>
	<!--app JS-->
	<script src="{{asset('backend/assets/js/app.js') }} "></script>
</body>

</html>