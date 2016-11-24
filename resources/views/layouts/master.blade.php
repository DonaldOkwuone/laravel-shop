<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	@yield('styles')
	<!-- Bootstrap core CSS -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{URL::asset('css/internet_explorer.css')}}" rel="stylesheet">
    <!-- Font Awesome Icons --> 
	<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
</head>
<body>
@include('partials.header')
<div class="container">
@yield('content')
</div> 


<script src="{{URL::asset('js/jquery.min.js.')}}"></script>
<script src="{{URL::asset('js/jquery.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="https://use.fontawesome.com/d6f75a1460.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="{{URL::asset('js/ie10-viewport-bug-workaround.js.download')}}"></script>
@yield('scripts')
</body>	
</html>
