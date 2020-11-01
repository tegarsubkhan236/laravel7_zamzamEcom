<!doctype html>
<html lang="en">

<head>
<title>Dashboard | ZGraphic</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{{-- Icon --}}
<link rel="apple-touch-icon" sizes="76x76" href="{{asset('klorofil/assets/img/apple-icon.png')}}">
<link rel="icon" type="image/png" sizes="96x96" href="{{asset('klorofil/assets/img/favicon.png')}}">
{{-- Style --}}
<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/linearicons/style.css')}}">
<link rel="stylesheet" href="{{asset('klorofil/assets/vendor/toastr/toastr.min.css')}}">
<link rel="stylesheet" href="{{asset('klorofil/assets/css/main.css')}}">
{{-- <link rel="stylesheet" href="{{asset('klorofil/assets/css/demo.css')}}"> --}}
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

{{-- Datatable Style --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
        @include('admin-base.navbar')
        @include('admin-base.sidebar')
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		@include('admin-base.footer')
	</div>
	<!-- END WRAPPER -->

<!-- Javascript -->
<script src="{{asset('klorofil/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('klorofil/assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('klorofil/assets/scripts/klorofil-common.js')}}"></script>
<script src="{{asset('klorofil/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('klorofil/assets/vendor/toastr/toastr.min.js')}}"></script>

{{-- Datatable --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="{{asset('tabledit/jquery.tabledit.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').DataTable({
			// "scrollX": true
		});
	} );
</script>
</body>

</html>

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script> --}}
