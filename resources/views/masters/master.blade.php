<!doctype html>
<html class="fixed">
	<head>
		<meta charset="UTF-8">

		<title>@yield('title')</title>
		<meta name="keywords" content="Inventory Management System" />
		<meta name="description" content="StoreTally">
		<meta name="authors" content="StoreTally">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="{{url('http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light')}}" rel="stylesheet" type="text/css">
		
		@section('css')
		@show

	</head>
	<body>

		<section class="body">

			@include('includes.widgets.nav')

			<div class="inner-wrapper">
				@include('includes.widgets.sidebar')
				@yield('content')
			</div>

			@include('includes.widgets.rsidebar')

		</section>
		
		@section('js')
		@show

	</body>
</html>