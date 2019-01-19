<?php
	// Call Key
	include('config/key.php');

	// Basic Variable
	$title = 'Welcome Dashboard';
	$m = 'Dashboard';
	$sm = '';
	$breadcrumb = '<li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';

	// include header
	include('layout/header.php');
?>

<?php
	// include footer
	include('layout/footer.php');
?>