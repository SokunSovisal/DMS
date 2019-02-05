<?php
	
	// Basic Variable
	$title = 'Step';
	$m = '4';
	$sm = '11';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';

	$header ='header.php';
	$footer ='footer.php';
	$s_title = '';
	$s_sql = '';
	$s_id = '';
	$redirect_s_id = '';
	$sub_s_id = '';

	if (isset($_GET['s_id']) && $_GET['s_id']!='') {
		$s_id = $_GET['s_id'];
		$s_name ='';
		$q_service = $db->query("SELECT * FROM tbl_service WHERE s_id=$s_id");
		if ($q_service->num_rows > 0) {
			while ($service = $q_service->fetch_object()) {
				$s_name =$service->s_name;
			}
		}
		$redirect_s_id = '?s_id='.$s_id;
		$sub_s_id = '&s_id='.$s_id;
		$header ='header_frame.php';
		$footer ='footer_frame.php';
		$s_title = "<h3 class='pt-4 pb-3 text-center'>".$s_name."</h3>";
		$s_sql = "WHERE A.step_service=$s_id";
	}

	$btnadd = '<a href="?action=add'.$sub_s_id.'" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;បន្ថែម</a>';
	$btnback = '<a href="index.php'.$redirect_s_id.'" class="btn btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;ត្រលប់ក្រោយ</a>';

	// include header
	include('../layout/'.$header);

	echo $s_title;

	if (@$_GET['action']=='add') {
		// Get Service
		$services = '';
		$q_s_option = $db->query("SELECT s_name,s_id FROM tbl_service ORDER BY s_name");
		while ($row = mysqli_fetch_object($q_s_option)) {
			$services .= '<option value="'.$row->s_id.'" '.(($row->s_id==$s_id)? 'selected':'').'>'.$row->s_name.'</option>';
		}
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$step_name = $db->real_escape_string($_POST['step_name']);
		$step_service = $db->real_escape_string($_POST['step_service']);
		$step_description = $db->real_escape_string($_POST['step_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_step (`step_name`,`step_service`,`step_description`) VALUES('$step_name','$step_service', '$step_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Step has been inserted successfully!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php'.$redirect_s_id);
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_step WHERE step_id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$step_name = $row->step_name;
					$step_service = $row->step_service;
					$step_description = $row->step_description;
				}
				// Get Service
				$services = '';
				$q_s_option = $db->query("SELECT s_name,s_id FROM tbl_service ORDER BY s_name");
				while ($row = mysqli_fetch_object($q_s_option)) {
					$services .= '<option value="'.$row->s_id.'" '.(($row->s_id==$s_id || $row->s_id==$doc_service_id)? 'selected':'').'>'.$row->s_name.'</option>';
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Step not found!</span>
				</div>';
				header ('Location: index.php'.$redirect_s_id);
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$step_name = $db->real_escape_string($_POST['step_name']);
		$step_service = $db->real_escape_string($_POST['step_service']);
		$step_description = $db->real_escape_string($_POST['step_description']);

		$sql = "UPDATE tbl_step SET step_name='$step_name',step_service='$step_service',step_description='$step_description' WHERE step_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Step has been Updated!</span>
			</div>';
			header ('Location: index.php'.$redirect_s_id);
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$step = $db->query("SELECT * FROM tbl_step WHERE step_id=".$_GET['id']);
			if($step->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Step not found!</span>
				</div>';
				header ('Location: index.php'.$redirect_s_id);
			}else{
				if ( $db->query("DELETE FROM tbl_step  WHERE step_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Step has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php'.$redirect_s_id);
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Step not found!</span>
			</div>';
			header ('Location: index.php'.$redirect_s_id);
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_step AS A
			LEFT JOIN tbl_service AS B on A.step_service=B.s_id $s_sql
			ORDER BY A.step_name");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($step = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$step->step_name.'</td>
					<td>'.$step->s_name.'</td>
					<td>'.$step->step_description.'</td>
					<td class="td-actions text-right">
						<a href="?action=edit&id='.$step->step_id.$sub_s_id.'" class="btn btn-success">
								<i class="material-icons">edit</i>
						</a>
						<button type="button" onclick="getId('.$step->step_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" title="Delete">
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
	include('../layout/'.$footer);
?>