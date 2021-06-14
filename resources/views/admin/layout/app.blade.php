<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>SISTEMA DE PEDIDOS</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon"/> --}}

	<!-- Fonts and icons -->
	<script src="{{ url(mix('admin/vendor/js/webfont.min.js')) }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{ url(mix('admin/vendor/css/fonts.min.css')) }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
    <link rel="stylesheet" href="{{ url(mix('admin/vendor/css/vendor.css')) }}"/>
    
	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url(mix('admin/vendor/css/demo.css')) }}"/>
</head>
<body>
	<div class="wrapper">

        <!-- MainHeader -->
        @include('admin.includes.header')
		<!-- End MainHeader -->
        
		<!-- Sidebar -->
        @include('admin.includes.sidebar')
		<!-- End Sidebar -->
        
        <div class="main-panel">
			@hasSection ('content')
            	@yield('content')
			@endif
        </div>

	</div>
    
	<!--   Core JS Files   -->
    <script src="{{ url(mix('admin/vendor/js/core.js')) }}"></script>

    <script src="{{ url(mix('admin/vendor/js/jquery-ui.min.js')) }}"></script>

    <script src="{{ url(mix('admin/vendor/js/jquery.scrollbar.min.js')) }}"></script>
	
	<!-- Libs JS -->
    <script src="{{ url(mix('admin/vendor/js/libs.js')) }}"></script>

	<!-- Atlantis JS -->
    <script src="{{ url(mix('admin/vendor/js/atlantis.min.js')) }}"></script>

	@stack('script')

</body>
</html>