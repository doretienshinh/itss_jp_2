<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="/img/logo.png">
	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
		}

		input:focus {
			outline: none;
		}

		.table td {
			border-top: 0;
		}

		#app {
			height: 100vh;
			display: flex;
			flex-flow: column;
		}

		#app>nav {
			flex: 0 1 auto;
		}

		#app>main {
			flex: 1 1 auto;
		}

		.nav-app {
			min-width: 33%;
			border: 1pt solid grey;
			color: grey !important;
		}

		.nav-app {
			padding: 5pt 5pt;
		}

		.nav-app.active,
		.nav-app:hover {
			border: 1pt solid black;
			background-color: #F5F5F5 !important;
			color: black !important;
			font-weight: bold !important;
		}

		@media only screen and (max-width: 800px) {
			#content_body {
				height: 50vh !important;
			}
		}
	</style>
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<a class="navbar-brand mx-auto" href="{{ url('/') }}">
					SPENDEE
				</a>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ms-auto">
						<!-- Left Side Of Navbar -->
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav me-auto me-md-5">
						<li class="nav-item nav-app {{ (request()->is('/home') || request()->is('/') || request()->is('home-page') ) ? 'active' : '' }}">
							<a class="nav-link" aria-current="page" href="{{ route('home-page') }}">
								Thu chi
							</a>
						</li>
						<li class="nav-item nav-app {{ (request()->is('monthly-income') ) ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('monthly-income') }}">
								Báo cáo
							</a>
						</li>
						<li class="nav-item nav-app {{ (request()->is('wallet-setting') ) ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('wallet-setting') }}">
								Thiết lập
							</a>
						</li>
						<li class="nav-item nav-app">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
								{{ __('Đăng xuất') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			<div class="d-flex justify-content-center align-items-center h-100">
				<div class="w-100 h-100">
					<div class="mb-3 h-100" style="border-radius: .5rem;">
						<div class="row g-0 flex-grow-0 flex-shrink-1">

							<div class="col-md-4 gradient-custom text-center" style="border-bottom: 1px solid lightgrey">
								<a href="{{ route('profile') }}">
									<img src="{{ (auth()->user()->avatar ? "/storage/avatar/" . auth()->user()->avatar : "https://cdn-icons-png.flaticon.com/512/4128/4128176.png") }}" alt="Avatar" class="img-fluid my-4" style="width: 100px; height: 100px; border-radius: 50%;" />
									<h5 style="color: black">{{ auth()->user()->name }}</h5>
								</a>
							</div>

							<div class="col-md-8" style="border-bottom: 1px solid lightgrey">
								<div class="card-body p-4">
									<table class="table table-borderless" style="width:75%; margin: auto !important;">
										<tr>
											<td><strong>Ví</strong></td>
											<td>{{ $walletUsing->name }}</td>
										</tr>
										<tr>
											<td><strong>Tiền trong ví</strong></td>
											<td>{{ number_format($walletUsing->amount) }}đ</td>
										</tr>
										{{-- <tr>
											<td><strong>総支出</strong></td>
											<td>$$$</td>
										</tr> --}}
									</table>
								</div>
							</div>
						</div>

						<div class="flex-grow-0 flex-shrink-1" style="height: 68vh; overflow-y: auto; overflow-x: hidden" id="content_body">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
