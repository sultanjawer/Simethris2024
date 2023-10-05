<!DOCTYPE html>
<html lang="en" class="root-text-sm">
	<head>
		<meta charset="utf-8">
		<title>
			{{ env('APP_NAME')}} | {{ date('Y') }}
		</title>
		<meta name="description" content="Login">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">

		<!-- CSRF Token -->
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

		<!-- Call App Mode on ios devices -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Remove Tap Highlight on Windows Phone IE -->
		<meta name="msapplication-tap-highlight" content="no">
		<!-- base css -->
		<meta name="description" content="Register">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
		<!-- Call App Mode on ios devices -->
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<!-- Remove Tap Highlight on Windows Phone IE -->
		<meta name="msapplication-tap-highlight" content="no">

		<!-- smartadmin base css -->
		<link id="vendorsbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/vendors.bundle.css') }}">
		<link id="appbundle" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/app.bundle.css') }}">
		<link id="mytheme" rel="stylesheet" media="screen, print" href="#">
		<link id="myskin" rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/skins/skin-master.css') }}">

		<!-- Place favicon.ico in the root directory -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{asset('')}}" />
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('')}}" />
		<link rel="mask-icon" href="{{asset('img/safari-pinned-tab.svg')}}" color="#5bbad5" />

		{{-- font awesome --}}

		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-brands.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-duotone.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-light.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-regular.css') }}">
		<link rel="stylesheet" media="screen, print" href="{{ asset('css/smartadmin/fa-solid.css') }}">
	</head>
	<body>
		<script src="{{asset('js/pagesetting.js')}}"></script>

		@php
			use Illuminate\Foundation\Inspiring;
			$quote = Inspiring::quote();
			[$text, $author] = explode('-', $quote);
		@endphp

		<div class="page-wrapper auth">
			<div class="page-inner bg-brand-gradient">
				<div class="page-content-wrapper bg-transparent m-0">
					<div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
						<div class="d-flex align-items-center container p-0">
							<div class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
								<a href="/" class="page-logo-link press-scale-down d-flex align-items-center">
										<img src="{{ asset('img/favicon.png') }}" alt="WebApp" aria-roledescription="logo"  />
									<span class="page-logo-text mr-1">{{ env('APP_NAME')}}{{ date('Y') }}</span>
								</a>
							</div>
						</div>
					</div>
					<div class="flex-1 mt-5 pt-5" style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
						<div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
							<div class="row">
								<div class="col col-md-6 col-lg-7 hidden-sm-down">
									<h2 class="fs-xxl fw-500 mt-4 text-white">
										Selamat Datang Kembali, Sobat!
										<small class="h3 fw-300 mt-3 mb-5 text-white opacity-90">
											<p class="">Silahkan masuk untuk memulai sesi Anda.</p>

											<p class="mb-0 fw-500">{!! trim($text) !!}</p>
											<footer class="blockquote-footer"><cite title="Author">{!! trim($author) !!}</cite></footer>
										</small>
										{{-- <blockquote class="blockquote text-left"> --}}
										{{-- </blockquote> --}}
									</h2>
									<a href="#" class="fs-lg fw-500 text-white opacity-70">Learn more &gt;&gt;</a>
									<div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
										<div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
											Find us on social media
										</div>
										<div class="d-flex flex-row opacity-70">
											<a href="#" class="mr-2 fs-xxl text-white">
												<i class="fab fa-facebook-square"></i>
											</a>
											<a href="#" class="mr-2 fs-xxl text-white">
												<i class="fab fa-twitter-square"></i>
											</a>
											<a href="#" class="mr-2 fs-xxl text-white">
												<i class="fab fa-google-plus-square"></i>
											</a>
											<a href="#" class="mr-2 fs-xxl text-white">
												<i class="fab fa-linkedin"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
									<h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
										Secure login
									</h1>
									<div class="card p-4 rounded-plus bg-faded">
										<div class="text-center mb-5">
											<img src="{{ asset('img/favicon.png') }}" alt="">
										</div>
										<span class="mb-2">Saya Adalah:</span>
										<div class="btn-group mb-3">
											<button type="button" class="btn btn-warning">
												<span class="">
													<i class="fal fa-users-crown"></i>
												</span>
											</button>
											<button type="button" class="btn btn-block btn-warning text-left" data-toggle="modal" data-target="#login1" onclick="loginClick(1)">
												<span class="">
													Direktorat / Sub Direktorat
												</span>
											</button>
										</div>
										<div class="btn-group mb-3">
											<button type="button" class="btn btn-primary">
												<span class="">
													<i class="fal fa-users"></i>
												</span>
											</button>
											<button type="button" class="btn btn-block btn-primary text-left" data-toggle="modal" data-target="#login1" onclick="loginClick(2)">
												<span class="">
													Pelaku Usaha (Wajib Tanam-Produksi)
												</span>
											</button>
										</div>
										<hr>
										<div class="row no-gutters">
											<span class="help-block">
												<p>
													Bagi <span>Pelaku Usaha</span> gunakan Username dan Password yang sama dengan data Kredensial yang digunakan untuk mengakses Aplikasi SIAP RIPH.
												</p>
											</span>
										</div>
									</div>
								</div>
							</div>

		<div class="modal fade" id="login1" tabindex="-1" role="dialog" style="display: none;" aria-modal="true">
			<div class="modal-dialog modal-dialog-right" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="fw-700">Otentikasi Kredensial</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><i class="fal fa-times"></i></span>
						</button>
					</div>
					<div class="modal-body">

						<form id="js-login" novalidate="" method="POST" action="{{ route('login') }}">
							@csrf
							<input id="roleaccess" name="roleaccess" type="hidden" value=""/>
							<div class="form-group">
								<label class="form-label" for="username">Username</label>
								<div class="input-group" data-toggle="tooltip" title data-original-title="Username Anda">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<span class="fal fa-user"></span>
										</div>
									</div>

									<input id="username" name="username" type="text" class="form-control form-control-md {{ $errors->has('username') ? ' is-invalid' : '' }}" required autocomplete="{{ trans('global.login_username') }}" autofocus placeholder="{{ trans('global.login_username') }}" value="{{ old('username', null) }}" />
									@if($errors->has('username'))
									<div class="invalid-feedback">
										{{ $errors->first('username') }}
									</div>
									@endif
								</div>
							</div>
							<div class="form-group">
								<label class="form-label" for="password">Password</label>
								<div class="input-group bg-white shadow-inset-2" data-toggle="tooltip" title data-original-title="Password Anda">
									<div class="input-group-prepend">
										<div class="input-group-text">
											<span class="fal fa-key"></span>
										</div>
									</div>
									<input id="password" name="password" type="password" class="form-control form-control-md border-right-0 bg-transparent pr-0 {{ $errors->has('password') ? ' is-invalid' : '' }}" required autocomplete="{{ trans('global.login_password') }}" autofocus placeholder="{{ trans('global.login_password') }}" value="" />
									@if($errors->has('password'))
									<div class="invalid-feedback">
										{{ $errors->first('password') }}
									</div>
									@endif
									<div class="input-group-append">
										<span class="input-group-text bg-transparent border-left-0">
											<i class="far fa-eye-slash text-muted" id="togglePassword"></i>
										</span>
									</div>
								</div>
							</div>
							<div class="form-group text-left" data-title="Ingat Saya" data-intro="Centang jika Anda ingin langsung masuk jika login berhasil" data-step="5">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="rememberme">
									<label class="custom-control-label" for="rememberme">{{ trans('global.remember_me') }}</label>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-lg-12 pl-lg-1 my-2" data-title="Tombol masuk" data-intro="Klik tombol ini untuk mengakses aplikasi jika seluruh kolom telah terisi" data-step="6">
									<button id="js-login-btn" type="submit" class="btn btn-block btn-info btn-xm">{{ trans('global.login') }}</button>
								</div>
							</div>

							<div class="row no-gutters">
								{{-- <div class="text-center">Belum memiliki akun?</div> --}}
								<div class="col-lg-12 pl-lg-1 my-2">
									<a href="#" id="regbutton" class="btn btn-block btn-outline-danger btn-xm">Daftarkan Akun</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
							<div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
								2020 © simethris by&nbsp;<a href='http://simethris.hortikultura.pertanian.go.id' class='text-white opacity-40 fw-500' title='Direktorat Sayuran dan Tanaman Obat - Direktorat Jenderal Hortikultura' target='_blank'>Direktorat Sayuran dan Tanaman Obat</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('partials.pagesettings')
		<!-- Smartadmin core -->
		<script src="{{ asset('js/vendors.bundle.js') }}"></script>
		<script src="{{ asset('js/app.bundle.js') }}"></script>
		<!-- Smartadmin plugin -->
		<script src="{{ asset('js/moment/moment.min.js') }}"></script>

		<script>
			$(document).ready(function () {
				@if ($errors->any())
					$('#login1').modal('show');
					document.querySelector('#roleaccess').value = {{ $errors->first('roleaccess') }};
				@endif
			})

			const togglePassword = document.querySelector('#togglePassword');
			const password = document.querySelector('#password');

			togglePassword.addEventListener('click', function (e) {
				// toggle the type attribute
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);
				// toggle the eye slash icon\
				if (this.classList.contains('fa-eye')){
					this.classList.remove('fa-eye');
					this.classList.add('fa-eye-slash');
				} else {
					this.classList.remove('fa-eye-slash');
					this.classList.add('fa-eye');
				}

			});

			function loginClick(role_access) {
				const roleaccess = document.querySelector('#roleaccess');
				const regbut = document.querySelector('#regbutton');
				roleaccess.value = role_access;
				if (role_access==1){
					$("#regbutton").hide();
				} else if (role_access==2){
					$("#regbutton").show();
					regbut.href = 'http://riph.pertanian.go.id/';
				} else {
					$("#regbutton").show();
					regbut.href = "{{ route('register') }}";
				}

			}
		</script>
	</body>
</html>
