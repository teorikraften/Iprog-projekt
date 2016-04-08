<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>@yield('head-title')</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
	   	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />
	    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}" />
		<script src="{{ URL::asset('js/jquery-1.12.0.js') }}"></script>
	  	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"/>
	</head>
	<body>
		<div class="page-wrap">
			<div class="container">
				<div class="header">
					<span id="title"><h1>CheckIt</h1></span>
				</div>
				@include('includes.menu')
				@yield('content')
			</div>
		</div>
	</body>
</html>