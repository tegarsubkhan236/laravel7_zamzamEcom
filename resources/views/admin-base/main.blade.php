<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | ZGraphic</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('klorofil/assets/css/main.css')}}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('klorofil/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- DataTable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('klorofil/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('klorofil/assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
        @include('admin-base.navbar')
        @include('admin-base.sidebar')
		
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a></p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="{{asset('klorofil/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('klorofil/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('klorofil/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('klorofil/assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('klorofil/assets/scripts/klorofil-common.js')}}"></script>
	<!-- DataTable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('#datatable').DataTable({
				// "scrollX": true
			});
		} );
	</script>
	
	@stack('script')
</body>

</html>
