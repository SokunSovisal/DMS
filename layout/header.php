<?php
	if (@VSLOGGL !=true) {
		header('location: '.BASE.'auth/login.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title><?=@$title?></title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

	
	<!--   Core JS Files   -->
	<script src="<?=@BASE?>dist/js/core/jquery.min.js"></script>
	<script src="<?=@BASE?>dist/js/core/popper.min.js"></script>
	<script src="<?=@BASE?>dist/js/core/bootstrap-material-design.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/bootstrap-selectpicker.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jasny-bootstrap.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jquery.validate.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jquery.dataTables.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script src="<?=@BASE?>dist/js/default.min.js" type="text/javascript"></script>
	<script src="<?=@BASE?>dist/js/javascript.js" type="text/javascript"></script>

	<!-- Optional Script -->
	<!-- <script src="<?=@BASE?>dist/js/core.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/moment.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/sweetalert2.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jquery.bootstrap-wizard.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/bootstrap-datetimepicker.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/fullcalendar.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/jquery-jvectormap.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/nouislider.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/arrive.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/chartist.min.js"></script>
	<script src="<?=@BASE?>dist/js/plugins/bootstrap-notify.js"></script> -->

	<!-- CSS Files -->
	<link href="<?=@BASE?>dist/css/all.min.css" rel="stylesheet" />
	<link href="<?=@BASE?>dist/css/default.min.css" rel="stylesheet" />
</head>

<body>
	<div class="wrapper ">

    <!-- Include Side Left Bar -->
    <?php include('sidenav.php'); ?>

    <!-- Main Content -->
		<div class="main-panel">
      
      <!-- Include Top Bar -->
      <?php include('topnav.php'); ?>

      <!-- Content -->
			<div class="content">
				<div class="container-fluid">