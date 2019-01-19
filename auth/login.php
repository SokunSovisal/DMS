<?php
  // Basic Variable
	$title = 'Login';

  // Call Key
  include('../config/key.php');

	if (@VSLOGGL ==true) {
		header('Location: ../index.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Material Dashboard PRO by Creative Tim</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />


	<!--     Fonts and icons     -->
	<link rel="shortcut icon" type="image/png" href="<?=@BASE?>dist/img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	<!-- Script -->
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/jquery.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/popper.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/bootstrap.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/js.cookie.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/jquery.validate.min.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/default.css">
	<style type="text/css">
		input,button{ border-radius: 0px!important; }
		body{ background: #ccc; }
		.effect2
		{
		  position: relative;
		  margin-top: 11vh;
		}
		.effect2:before, .effect2:after
		{
		  z-index: -1;
		  position: absolute;
		  content: "";
		  bottom: 15px;
		  left: 10px;
		  width: 50%;
		  top: 80%;
		  max-width:300px;
		  background: #777;
		  -webkit-box-shadow: 0 15px 10px #777;
		  -moz-box-shadow: 0 15px 10px #777;
		  box-shadow: 0 15px 10px #777;
		  -webkit-transform: rotate(-3deg);
		  -moz-transform: rotate(-3deg);
		  -o-transform: rotate(-3deg);
		  -ms-transform: rotate(-3deg);
		  transform: rotate(-3deg);
		}
		.effect2:after
		{
		  -webkit-transform: rotate(3deg);
		  -moz-transform: rotate(3deg);
		  -o-transform: rotate(3deg);
		  -ms-transform: rotate(3deg);
		  transform: rotate(3deg);
		  right: 10px;
		  left: auto;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row justify-content-center">

				<div class="col-sm-4 effect2" style="background: #f5f5f5; padding: 25px;">
					<center>
						<figure>
							<img src="../dist/img/login.png" width="125" class="effect4">
						</figure>
						<h4 class="text-primary">Login to Database System</h4>
					</center>
					<br>
					<form id="loginForm" action="index.php" method="post">
						<?=@ERROR?>
						<?php @$_SESSION['error'] = ''; ?>
						<div class="form-group mb-4">
							<label> Email Address <small>*</small></label>
							<input type="email" class="form-control" id="email" required="true" name="email">
						</div>
						<div class="form-group">
							<label> Password <small>*</small></label>
							<input type="password" class="form-control" id="password" minlength="6" required="true" name="password">
						</div>
						<!-- <label class="pull-right"><input type="checkbox"> Stay sign in</label> -->
						<hr>
						<button type="submit" name="signin" class="btn btn-success btn-block"><i class="material-icons">input</i> &nbsp;&nbsp;Login</button>
					</form>
				</div>
			</div>


				<!-- <div class="col-md-4">
					<form id="loginForm" action="index.php" method="post">
						<div class="card" style="margin-top: 27vh;">
							<div class="card-header card-header-rose card-header-icon">
								<h4 class="card-title"><i class="fa fa-lock"></i> User Login</h4>
							</div>
							<div class="card-body ">
								<?=@ERROR?>
								<?php @$_SESSION['error'] = ''; ?>
								<div class="form-group mt-1 mb-4">
									<label> Email Address *</label>
									<input type="email" class="form-control" id="email" required="true" name="email">
								</div>
								<div class="form-group">
									<label for="examplePasswords" class="bmd-label-floating"> Password *</label>
									<input type="password" class="form-control" id="password" required="true" name="password">
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="signin" class="btn btn-success btn-block"><i class="material-icons">input</i> &nbsp;&nbsp;Login</button>
							</div>
						</div>
					</form>
				</div>
			</div> -->

		</div>
	</div>
	
  <script>
		$('#loginForm').validate({
		  rules: {
		      email: {
		          required: true
		      },
		      password: {
		          required: true
		      }
		  },
		  errorElement: 'span',
		  errorPlacement: function (error, element) {
		      error.addClass('invalid-feedback');
		      element.closest('.form-group').append(error);
		  },
		  highlight: function (element, errorClass, validClass) {
		      $(element).addClass('is-invalid');
		  },
		  unhighlight: function (element, errorClass, validClass) {
		      $(element).removeClass('is-invalid');
		  },
		  submitHandler: function (form) {
		      neou_cms.remove_error_messages();
		      var email = form.elements['email'].value;
		      var password = CryptoJS.SHA512(form.elements['password'].value).toString();
		      login.login_user(email, password);
		  }
		});
  </script>
</body>

</html>