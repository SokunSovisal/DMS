<?php
	
	$title = 'Invoice';
	$m = '7';
	$sm = '12';
	// Call Key
	include('../config/key.php');
	$co_id = $_GET['co_id'];

	$query = $db->query("SELECT * FROM tbl_company WHERE co_id=".$_GET['co_id']);
	if($query->num_rows > 0){
		while ($row = mysqli_fetch_object($query)) {
			@$myObj->co_name_en=$row->co_name_en;
			@$myObj->co_name_kh=$row->co_name_kh;
			@$myObj->co_phone=$row->co_phone;
			@$myObj->co_email=$row->co_email;
			@$myObj->co_address=$row->co_address;
			@$myObj->co_vat_no=$row->co_vat_no;

			@$myJSON = json_encode(@$myObj);
			echo @$myJSON;
		}
		

	}
?>

