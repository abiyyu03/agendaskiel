<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('masuk/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ url('masuk/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{ url('masuk/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('masuk/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ url('masuk/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('masuk/assets/img/logo-web.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('masuk/assets/img/logo-web.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
				<div class="header">
                	<div class="logo text-center">
                  		<a href="/"><img src="{{ url('masuk/assets/img/logo-app.png')}}" alt="Logo Agenda" height="50px"></a>
						<p class="lead">Login</p>
                	</div>
				</div>
                  <form class="form-auth-small" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="email" class="control-label sr-only">Email</label>
                      <input name="email" type="email" class="form-control" id="email" value="{{old('email')}}" placeholder="Email">
                      @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
						</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password" class="control-label sr-only is-invalid">Password</label>
                      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="" placeholder="Password">
                      @error('password')
                        <div class="alert alert-danger invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
						</div>
                      @enderror
                    </div>
                    <!-- <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>   --> 
					<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
						<div class="bottom">
							@if (Route::has('password.request')) 
								<span class="help-texter"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Lupa password?</a></span>
							@endif
						</div>
                    <!-- <div class="bottom">
                      <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">Lupa password?</a></span>
                    </div> -->
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						{{-- <div class="content text">
							<h1 class="heading">Aplikasi AGENDA ONLINE</h1>
							<p>SMA Negeri 2 Gunung Putri</p>
						</div> --}}
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
