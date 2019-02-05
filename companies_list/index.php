<?php
	
	// Basic Variable
	$title = 'Company management';
	$m = '4';
	$sm = '10';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		$employees = '';
		$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
		while ($row = mysqli_fetch_object($query)) {
			$employees .= '<option value="'.$row->em_id.'">'.$row->em_name.'</option>';
		}
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$co_name_en = $db->real_escape_string($_POST['co_name_en']);
		$co_name_kh = $db->real_escape_string($_POST['co_name_kh']);
		$co_type = $db->real_escape_string($_POST['co_type']);
		$co_phone = $db->real_escape_string($_POST['co_phone']);
		$co_email = $db->real_escape_string($_POST['co_email']);
		$co_address = $db->real_escape_string($_POST['co_address']);
		$co_register_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['co_register_date'])));
		$co_vat_no = $db->real_escape_string($_POST['co_vat_no']);
		$co_em_id = $db->real_escape_string($_POST['co_em_id']);
		$co_description = $db->real_escape_string($_POST['co_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_company (`co_name_kh`,`co_name_en`,`co_type`,`co_vat_no`,`co_phone`,`co_email`,`co_address`,`co_register_date`,`co_em_id`,`co_description`) VALUES('$co_name_kh', '$co_name_en', '$co_type', '$co_vat_no', '$co_phone', '$co_email', '$co_address', '$co_register_date', '$co_em_id', '$co_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>ក្រុមហ៊ុនត្រូវបានបញ្ចូលដោយជោជ័យ!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT tbl_company.*,tbl_employee.em_name FROM tbl_company LEFT JOIN tbl_employee ON tbl_company.co_em_id=tbl_employee.em_id WHERE co_id=".$_GET['id']." ORDER BY tbl_company.co_id");
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$co_name_en=$row->co_name_en;
					$co_name_kh=$row->co_name_kh;
					$co_type=$row->co_type;
					$co_phone=$row->co_phone;
					$co_email=$row->co_email;
					$co_address=$row->co_address;
					$co_register_date=$row->co_register_date;
					$co_em_id=$row->co_em_id;
					$em_name=$row->em_name;
					$co_vat_no=$row->co_vat_no;
					$co_description=$row->co_description;
				}

				$employees = '';
				$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
				while ($row = mysqli_fetch_object($query)) {
					$employees .= '<option value="'.$row->em_id.'" '.(($co_em_id==$row->em_id)?'selected':'').'>'.$row->em_name.'</option>';
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$co_name_en = $db->real_escape_string($_POST['co_name_en']);
		$co_name_kh = $db->real_escape_string($_POST['co_name_kh']);
		$co_type = $db->real_escape_string($_POST['co_type']);
		$co_phone = $db->real_escape_string($_POST['co_phone']);
		$co_email = $db->real_escape_string($_POST['co_email']);
		$co_address = $db->real_escape_string($_POST['co_address']);
		$co_register_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['co_register_date'])));
		$co_em_id = $db->real_escape_string($_POST['co_em_id']);
		$co_vat_no = $db->real_escape_string($_POST['co_vat_no']);
		$co_description = $db->real_escape_string($_POST['co_description']);

		$sql = "UPDATE tbl_company SET co_name_en='$co_name_en',co_name_kh='$co_name_kh',co_type='$co_type',co_phone='$co_phone', co_email='$co_email', co_address='$co_address', co_register_date='$co_register_date', co_em_id='$co_em_id', co_vat_no='$co_vat_no', co_description='$co_description' WHERE co_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>ក្រុមហ៊ុនត្រូវបានកែប្រែដោយជោគជ័យ!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_company = $db->query("SELECT * FROM tbl_company WHERE co_id=".$_GET['id']);
			if ($q_company->num_rows > 0) {

				if ( $db->query("DELETE FROM tbl_company WHERE co_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>ក្រុមហ៊ុនត្រូវបានលុបដោយជោគជ័យ!</span>
					</div>';
				}

				$q_transaction = $db->query("SELECT * FROM tbl_transaction WHERE tr_company=".$_GET['id']);
				if ($q_transaction->num_rows > 0) {
					while ($transaction = $q_transaction->fetch_object()) {
						$tr_id = $transaction->tr_id;
						// Delete Checklist
						$db->query("DELETE FROM tbl_transaction_document WHERE td_transaction_id=$tr_id");
						// Delete Step
						$db->query("DELETE FROM tbl_transaction_step WHERE ts_transaction_id=$tr_id");
						// Delete Transaction
						$db->query("DELETE FROM tbl_transaction WHERE tr_id=$tr_id");
					}
					// Redirect
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>ក្រុមហ៊ុនត្រូវបានលុបដោយជោគជ័យ!</span>
					</div>';
					header ('Location: index.php');
				}
				header ('Location: index.php');
			}else{
				// @$_SESSION['error'] = '<div class="alert alert-danger">
				// 													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				// 													<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
				// 												</div>';
				// header ('Location: index.php');
			}
		}else{
			// @$_SESSION['error'] = '<div class="alert alert-danger">
			// 													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
			// 													<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
			// 												</div>';
			// header ('Location: index.php');
		}

		// if(isset($_GET['id']) && $_GET['id']!=''){
		// 	$q_company = $db->query("SELECT * FROM tbl_company WHERE co_id=".$_GET['id']);
		// 	if($q_company->num_rows == 0){
		// 		@$_SESSION['error'] = '<div class="alert alert-danger">
		// 			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
		// 			<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
		// 		</div>';
		// 		header ('Location: index.php');
		// 	}else{
		// 		if ( $db->query("DELETE FROM tbl_company WHERE co_id=".$_GET['id']) == true) {
		// 			@$_SESSION['success'] = '<div class="alert alert-success">
		// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
		// 				<span>ក្រុមហ៊ុនត្រូវបានលុបដោយជោគជ័យ!</span>
		// 			</div>';
		// 			header ('Location: index.php');
		// 		}
		// 	}

		// }else{
		// 	@$_SESSION['error'] = '<div class="alert alert-danger">
		// 		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
		// 		<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
		// 	</div>';
		// 	header ('Location: index.php');
		// }
		
	}else{
		$query = $db->query("SELECT tbl_company.*,tbl_employee.em_name FROM tbl_company LEFT JOIN tbl_employee ON tbl_company.co_em_id=tbl_employee.em_id ORDER BY tbl_company.co_id");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($company = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$company->co_name_en.'</td>
					<td>'.$company->co_type.'</td>
					<td>'.$company->co_register_date.'</td>
					<td>'.$company->co_phone.'</td>
					<td>'.$company->em_name.'</td>
					<td class="td-actions text-right">
						<a href="?action=edit&id='.$company->co_id.'" rel="tooltip" class="btn btn-success" data-placement="left" data-original-title="Edit info">
								<i class="material-icons">edit</i>
						</a>
						<button type="button" onclick="getId('.$company->co_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" title="Delete">
							<i class="material-icons">close</i>
						</button>
					</td>
				</tr>';
				$i++;
			}
		}
		// include Page
		include('show.php');
		// include('detail.php');
	}


	// include footer
	include('../layout/footer.php');
?>