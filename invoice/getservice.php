<?php
	
	$title = 'Invoice';
	$m = '7';
	$sm = '12';
	// Call Key
	include('../config/key.php');
	$s_id = $_GET['s_id'];

	$query = $db->query("SELECT * FROM tbl_service WHERE s_id=".$_GET['s_id']);
	if($query->num_rows > 0){
		while ($row = mysqli_fetch_object($query)) {
			@$myObj->s_price=$row->s_price;

			@$myJSON = json_encode(@$myObj);
			echo @$myJSON;
		}
		

	}
?>

