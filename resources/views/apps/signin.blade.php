
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

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
  	.login100-form-avatar{
    	overflow: inherit;
  	}

  	.login100-form-btn.back{
		background-color: #b84646;     
		-webkit-box-shadow: 0 10px 30px 0px rgb(184 70 70 / 50%)
	}
  	.login100-form-btn.back:hover{
		background-color: #333333;
		-webkit-box-shadow: 0 10px 30px 0px rgb(51 51 51 / 50%);
	}

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-20 p-b-20">
				<form class="login100-form validate-form" method="POST" action="{{route('login')}}">
					@csrf
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
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
				<div class="container-login100-form-btn m-t-20">
					<button class="login100-form-btn back" 
						onclick="back()"
						style="">
						Kembali
					</button>
				</div>
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	<script>

		@if(Session::has('error'))
			toastr.options =
			{
				"closeButton" : true,
				"progressBar" : true
			}
			toastr.error("{{ session('error') }}");
		@endif

		const back = () => {
			window.location.href = "{{route('index')}}"
		}
	</script>

</body>
</html>