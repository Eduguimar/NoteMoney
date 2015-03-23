<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NoteMaster</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

	<!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    @include('partials.nav')

    <div id="main" class="container">
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
    </div>

    @include('notebooks.create')

	<!-- Scripts -->
    <script src="//cdn.ckeditor.com/4.4.7/basic/ckeditor.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="/js/style.js"></script>
</body>
</html>
