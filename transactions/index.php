<?php

	
	// Basic Variable
	$title = 'Transactions';
	$m = '4';
	$sm = '9';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		
	// Get Company
		$companies = '';
		$query = $db->query("SELECT co_name,co_id FROM tbl_company ORDER BY co_name");
		while ($row = mysqli_fetch_object($query)) {
			$companies .= '<option value="'.$row->co_id.'">'.$row->co_name.'</option>';
		}

		// Get Service
		$services = '';
		$query = $db->query("SELECT s_name,s_id FROM tbl_service ORDER BY s_name");
		while ($row = mysqli_fetch_object($query)) {
			$services .= '<option value="'.$row->s_id.'">'.$row->s_name.'</option>';
		}

		// Get employee
		$employees = '';
		$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
		while ($row = mysqli_fetch_object($query)) {
			$employees .= '<option value="'.$row->em_id.'">'.$row->em_name.'</option>';
		}
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		
		// Get Value From Posted Form
		$tr_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['tr_date'])));
		$tr_company = $db->real_escape_string($_POST['tr_company']);
		$tr_service = $db->real_escape_string($_POST['tr_service']);
		$tr_em_id = $db->real_escape_string($_POST['tr_em_id']);
		$tr_description = $db->real_escape_string($_POST['tr_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_transaction (`tr_date`,`tr_company`,`tr_service`,`tr_em_id`,`tr_description`) VALUES('$tr_date', '$tr_company', '$tr_service', '$tr_em_id', '$tr_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Transition has been inserted successfully!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_transaction AS A
			LEFT JOIN tbl_company AS B ON A.tr_company=B.co_id
			LEFT JOIN tbl_service AS C ON A.tr_service=C.s_id
			LEFT JOIN tbl_employee AS D ON A.tr_em_id=D.em_id
			WHERE tr_id=".$_GET['id']."
			ORDER BY A.tr_id");
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {

					$tr_date=$row->tr_date;
					$tr_company=$row->tr_company;
					$tr_co_name=$row->co_name_kh;
					$tr_service=$row->tr_service;
					$tr_s_name=$row->s_name;
					$tr_em_id=$row->tr_em_id;
					$tr_em_name=$row->em_name;
					$tr_description=$row->tr_description;

					// Get Company
					$companies = '';
					$query = $db->query("SELECT co_name_kh,co_name_en,co_id FROM tbl_company ORDER BY co_name_en");
					while ($row = mysqli_fetch_object($query)) {
						$companies .= '<option value="'.$row->co_id.'" '.(($row->co_id==$tr_company)?'selected':'').'>'.$row->co_name_en.'</option>';
					}

					// Get Service
					$services = '';
					$query = $db->query("SELECT s_name,s_id FROM tbl_service ORDER BY s_name");
					while ($row = mysqli_fetch_object($query)) {
						$services .= '<option value="'.$row->s_id.'" '.(($row->s_id==$tr_service)?'selected':'').'>'.$row->s_name.'</option>';
					}

					// Get employee
					$employees = '';
					$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
					while ($row = mysqli_fetch_object($query)) {
						$employees .= '<option value="'.$row->em_id.'" '.(($row->em_id==$tr_em_id)?'selected':'').'>'.$row->em_name.'</option>';
					}
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Transition not found!</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$tr_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['tr_date'])));
		$tr_company = $db->real_escape_string($_POST['tr_company']);
		$tr_service = $db->real_escape_string($_POST['tr_service']);
		$tr_em_id = $db->real_escape_string($_POST['tr_em_id']);
		$tr_description = $db->real_escape_string($_POST['tr_description']);

		$sql = "UPDATE tbl_transaction SET tr_date='$tr_date',tr_company='$tr_company',tr_service='$tr_service', tr_em_id='$tr_em_id', tr_description='$tr_description' WHERE tr_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Transition has been Updated!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_transaction = $db->query("SELECT * FROM tbl_transaction WHERE tr_id=".$_GET['id']);
			if($q_transaction->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Transition not found!</span>
				</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_transaction WHERE tr_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Transition has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Transition not found!</span>
			</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_transaction AS A
			LEFT JOIN tbl_company AS B ON A.tr_company=B.co_id
			LEFT JOIN tbl_service AS C ON A.tr_service=C.s_id
			LEFT JOIN tbl_employee AS D ON A.tr_em_id=D.em_id
			ORDER BY A.tr_id");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($transactions = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$transactions->tr_date.'</td>
					<td>'.$transactions->co_name_en.'</td>
					<td>'.$transactions->s_name.'</td>
					<td>'.$transactions->em_name.'</td>
					<td class="td-actions text-right">'.
						buttonEdit($transactions->tr_id).
						buttonDelete($transactions->tr_id).'
					</td>
				</tr>';
				$i++;
			}
		}
		// include Page
		include('show.php');
	}
	// include footer
	include('../layout/footer.php');
?>