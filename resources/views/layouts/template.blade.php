<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}


	<!-- Fonts -->
	<link rel="dns-prefetch" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
	<link rel="stylesheet" type="text/css" href="/css/styles.css">

</head>

<body>
	

	<div id="wrapper" class=toggled>
		<div class="title-container">
            <a class="" href="{{ route('news.index') }}">
                Terrán News
            </a>
        </div>
		<!-- Sidebar -->
		<div class="sidenav">
			<div class="menu-container">
				<ul>
					<li>
						<a @if(strpos(\Request::route()->getName(), 'news') !== false) class="active" @endif href="{{ route('news.index') }}">News</a>
					</li>
					<li>
						<a @if(strpos(\Request::route()->getName(), 'profile') !== false) class="active" @endif href="{{ route('profile.edit') }}">Profile</a>
					</li>
					<li>
						 <a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
					</li>
				</ul>
			</div>
		</div>
		<!-- /#sidebar-wrapper -->

		{{-- navbar on top --}}
		@guest
		<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        {{-- @else --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        {{-- @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>
        @endguest
        {{-- NAVBAR on top END --}}

		<!-- Page Content -->
		<div id="page-content-wrapper" class="main">
			<!-- On site errors -->
			@if (\Session::has('error'))
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{ \Session::get('error') }}
				</div>
			@endif
			<!-- On site success -->
			@if (\Session::has('success'))
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{ \Session::get('success') }}
				</div>
			@endif

			@yield('content')
		</div>
		<!-- /#page-content-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="/js/app.js"></script>
	
	@yield('js')

	@yield('jquery')

</body>

</html>
