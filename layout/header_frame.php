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
	
	<!-- Script -->
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/jquery.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/popper.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/bootstrap.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/core/moment.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/js.cookie.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/bootstrap-select.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/jasny-bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/plugins/jquery.bootstrap-wizard.js"></script>
	<script type="text/javascript" src="<?=@BASE?>dist/js/default.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/bootstrap-select.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" type="text/css" href="<?=@BASE?>dist/css/default.css">
	<style type="text/css">
		.content{ background: #f5f5f5; }
		.content > div > div.col-sm-12{ padding-left: 5px!important; padding-right: 5px!important; }
		.content .card{ border-radius: 0px!important; }
/*		.card{ margin-top: 5px; margin-bottom: 5px; }
		.card-title{ text-align:center; position: absolute; width: 100%; top: 0px; left: 0px; }
		.card-body{ height: 640px; max-height: 640px; overflow: auto; }*/
	</style>
</head>

<body>
	<div class="wrapper">
		<div class="container-fluid content">