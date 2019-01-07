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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

	<!-- CSS Files -->
	<link href="<?=@BASE?>css/material-dashboard.min.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper ">
  
  </div>
  <!--   Core JS Files   -->
  <script src="js/core/jquery.min.js"></script>
  <script src="js/core/popper.min.js"></script>
  <script src="js/core/bootstrap-material-design.min.js"></script>
  <script src="js/plugins/jquery.validate.min.js"></script>
  <script src="js/material-dashboard.min.js" type="text/javascript"></script>
</body>

</html>