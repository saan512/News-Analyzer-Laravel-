<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login page</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link rel="stylesheet" type="text/css" href="{{url('css/material-dashboard.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/card.css')}}">

    <style>
        body {
            background-image: url('{{url('/img/login.jpg')}}');
        }
    </style>
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
			
					<div class="cardx fat mt-5">
						<div class="card-body card">
							<h4 class="card-title">LOGIN</h4>
							<form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                                @csrf
								<div class="form-group">
									<label for="email"></label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="Enter email">
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
								
								{{-- </div> --}}
								{{-- <div class="form-group"> --}}
									<label for="password"></label>		
									
									<input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
									<label for="password">
										<a href="{{route('password.request')}}" class="float-right">
											Forgot Password?
										</a>
									</label>
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Remeber Me</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="{{route('register')}}">Create One</a>
								</div>
							</form>
						</div>
					</div>
				
				</div>
			</div>
		</div>
	</section>


	<script src="bootstrap/js/popper.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
