
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V6</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{{URL::asset('template/assets/images/logo.png')}}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/bootstrap/css/bootstrap.min.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/fonts/iconic/css/material-design-iconic-font.min.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/animate/animate.css')}}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/css-hamburgers/hamburgers.min.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/animsition/css/animsition.min.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/select2/select2.min.css')}}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/vendor/daterangepicker/daterangepicker.css')}}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/css/util.css')}}}">
	<link rel="stylesheet" type="text/css" href="{{{URL::asset('login/css/main.css')}}}">
<!--===============================================================================================-->

<style>
  .login100-form-avatar{
    overflow: inherit;
  }
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="{{route('dashboard')}}">
					{{-- <span class="login100-form-title p-b-70">
						Welcome
					</span> --}}
					<span class="login100-form-avatar">
						<img src="{{{URL::asset('template/assets/images/logo.png')}}}" alt="AVATAR">
            <img
                      src="{{{URL::asset('template/assets/images/logo-text.png')}}}"
                      alt="homepage"
                      class="dark-logo"
                  />
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<ul class="login-more p-t-190">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</li>

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="#" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/jquery/jquery-3.2.1.min.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/animsition/js/animsition.min.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/bootstrap/js/popper.js')}}}"></script>
	<script src="{{{URL::asset('login/vendor/bootstrap/js/bootstrap.min.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/select2/select2.min.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/daterangepicker/moment.min.js')}}}"></script>
	<script src="{{{URL::asset('login/vendor/daterangepicker/daterangepicker.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/vendor/countdowntime/countdowntime.js')}}}"></script>
<!--===============================================================================================-->
	<script src="{{{URL::asset('login/js/main.js')}}}"></script>

</body>
</html>