<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NoteMoney</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datepicker.css') }}" rel="stylesheet">

	<!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

@if(Auth::guest())
    <body class="notemaster-guest">
@else
    <body>
@endif

    @if(Auth::user())
        @include('partials.nav')
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info">
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif
    @if ($errors->any())
        <div class='alert alert-danger'>
            @foreach ( $errors->all() as $error )
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @yield('content')

    @include('notebooks.create')

	<!-- Scripts -->
    <script src="//cdn.ckeditor.com/4.4.7/basic/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/jquery.charactercounter.js"></script>
    <script src="/js/bootstrap-datepicker.js"></script>
    <script src="/js/jquery.maskMoney.js"></script>
    <script src="/js/style.js"></script>

</body>
</html>
