<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	@include('partials._head')
</head>
<body class="is-loading">
	<div id="wrapper" class="fade-in">
		@include('partials._header')
		<div id="main">
			@include('partials._message')
			@yield('content')
		</div>
		@include('partials._footer')
	</div>
</body>
</html>