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
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<!--   Core JS Files   -->
	<script src="<?=@BASE?>dist/js/core/jquery.min.js"></script>
	<script src="<?=@BASE?>dist/js/core/popper.min.js"></script>
	<script src="<?=@BASE?>dist/js/core/bootstrap-material-design.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/bootstrap-selectpicker.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jquery.validate.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?=@BASE?>dist/js/default.min.js" type="text/javascript"></script>

	<!-- CSS Files -->
	<link href="<?=@BASE?>dist/css/all.min.css" rel="stylesheet" />
	<link href="<?=@BASE?>dist/css/default.min.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<form id="loginForm" action="index.php" method="post">
						<div class="card" style="margin-top: 28vh;">
							<div class="card-header card-header-rose card-header-icon">
								<div class="card-icon">
									<i class="fa fa-lock"></i>
								</div>
								<h4 class="card-title">User Login</h4>
							</div>
							<div class="card-body ">
								<?=@ERROR?>
								<?php @$_SESSION['error'] = ''; ?>
								<div class="form-group mt-4 mb-4">
									<label for="exampleEmails" class="bmd-label-floating"> Email Address *</label>
									<input type="email" class="form-control" id="email" required="true" name="email">
								</div>
								<div class="form-group">
									<label for="examplePasswords" class="bmd-label-floating"> Password *</label>
									<input type="password" class="form-control" id="password" required="true" name="password">
								</div>
							</div>
							<div class="card-footer ml-auto mr-auto">
								<button type="submit" name="signin" class="btn btn-success"><i class="material-icons">input</i> &nbsp;&nbsp;Login</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
  <script>
    function setFormValidation(id) {
      $(id).validate({
        highlight: function(element) {
          $(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
        },
        success: function(element) {
          $(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
        },
        errorPlacement: function(error, element) {
          $(element).closest('.form-group').append(error);
        },
      });
    }

    $(document).ready(function() {
			setFormValidation('#loginForm');
    });
  </script>
</body>

</html>