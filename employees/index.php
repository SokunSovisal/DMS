<?php
	// Call Key
	include('../config/key.php');
	
	// Basic Variable
	$title = 'Employee management';
	$m = 'Employee';
	$sm = '';
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$em_name = $db->real_escape_string($_POST['em_name']);
		$em_gender = $db->real_escape_string($_POST['em_gender']);
		$em_phone = $db->real_escape_string($_POST['em_phone']);
		$em_email = $db->real_escape_string($_POST['em_email']);
		$em_position = $db->real_escape_string($_POST['em_position']);
		$em_join_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['em_join_date'])));
		$em_description = $db->real_escape_string($_POST['em_description']);
		$em_status = $db->real_escape_string($_POST['em_status']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_employee (`em_name`,`em_gender`,`em_phone`,`em_email`,`em_position`,`em_join_date`,`em_status`,`em_description`) VALUES('$em_name', '$em_gender', '$em_phone', '$em_email', '$em_position', '$em_join_date', '$em_status', '$em_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Employee has been inserted successfully!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_employee WHERE em_id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$em_name = $row->em_name;
					$em_gender = $row->em_gender;
					$em_phone = $row->em_phone;
					$em_email = $row->em_email;
					$em_position = $row->em_position;
					$em_join_date = $row->em_join_date;
					$em_description = $row->em_description;
					$em_status = $row->em_status;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Employee not found!</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$em_name = $db->real_escape_string($_POST['em_name']);
		$em_gender = $db->real_escape_string($_POST['em_gender']);
		$em_phone = $db->real_escape_string($_POST['em_phone']);
		$em_email = $db->real_escape_string($_POST['em_email']);
		$em_position = $db->real_escape_string($_POST['em_position']);
		$em_join_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['em_join_date'])));
		$em_description = $db->real_escape_string($_POST['em_description']);
		$em_status = $db->real_escape_string($_POST['em_status']);

		$sql = "UPDATE tbl_employee SET em_name='$em_name',em_gender='$em_gender',em_phone='$em_phone', em_email='$em_email', em_position='$em_position', em_join_date='$em_join_date', em_status='$em_status', em_description='$em_description' WHERE em_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Employee has been Updated!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_employee = $db->query("SELECT * FROM tbl_employee WHERE em_id=".$_GET['id']);
			if($q_employee->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Employee not found!</span>
				</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_employee WHERE em_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Employee has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Employee not found!</span>
			</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_employee ORDER BY em_name");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($employee = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$employee->em_name.'</td>
					<td>'.$employee->em_gender.'</td>
					<td>'.$employee->em_phone.'</td>
					<td>'.$employee->em_email.'</td>
					<td>'.$employee->em_position.'</td>
					<td>'.$employee->em_join_date.'</td>
					<td class="td-actions text-right">
						<a href="?action=edit&id='.$employee->em_id.'" class="btn btn-success" title="Edit">
								<i class="material-icons">edit</i>
						</a>
						<button type="button" onclick="getId('.$employee->em_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" title="Delete">
							<i class="material-icons">close</i>
						</button>
					</td>
				</tr>';
				$i++;
			}
		}
		// include Page
		include('show.php');
		include('detail.php');
	}


	// include footer
	include('../layout/footer.php');
?>