<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand" href="{{ url('/') }}">
					{{ config('app.name', 'Laravel') }}
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto">

					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto">
						<!-- Authentication Links -->
						@guest
						@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('サインイン') }}</a>
						</li>
						@endif

						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('サインアップ') }}</a>
						</li>
						@endif
						@else
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
							</a>

							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('サインアウト') }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			<div class="row justify-content-center align-items-center h-100">
				<div class="col col-lg-6 mb-4 mb-lg-0">
					<div class="card mb-3" style="border-radius: .5rem;">
						<div class="row g-0">

							<div class="col-md-4 gradient-custom text-center" style="border-bottom: 1px solid lightgrey">
								<a href="{{ route('profile') }}">
									<img src="{{ "/storage/avatar/" . (auth()->user()->avatar ? auth()->user()->avatar : "https://cdn-icons-png.flaticon.com/512/4128/4128176.png") }}" alt="Avatar" class="img-fluid my-4"
										style="width: 100px; height: 100px" />
									<h5 style="color: black">{{ auth()->user()->name }}</h5>
								</a>
							</div>

							<div class="col-md-8" style="border-bottom: 1px solid lightgrey">
								<div class="card-body p-4">
									<table class="table table-borderless" style="width:50%">
										<tr>
											<td><strong>ウォレット</strong></td>
											<td>ABC</td>
										</tr>
										<tr>
											<td><strong>総収入</strong></td>
											<td>$$$</td>
										</tr>
										<tr>
											<td><strong>総支出</strong></td>
											<td>$$$</td>
										</tr>
									</table>
								</div>
							</div>
						</div>

						@yield('content')
						<ul class="nav nav-pills nav-fill" style="border: solid 0.5px lightgrey; border-radius: 7px;">
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('home') || request()->is('daily-expense') ) ? 'active' : '' }}"
									aria-current="page" href="{{ route('daily-expense') }}">支出管理</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('monthly-income') ) ? 'active' : '' }}"
									href="{{ route('monthly-income') }}">レポート</a>
							</li>
							<li class="nav-item">
								<a class="nav-link {{ (request()->is('wallet-setting') ) ? 'active' : '' }}"
									href="{{ route('wallet-setting') }}">設定</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</main>
	</div>
</body>

</html>
