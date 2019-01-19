<?php
	// Call Key
	include('../config/key.php');

	// Basic Variable
	$title = 'User Roles';
	$m = 'User Management';
	$sm = 'User Roles';
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$ur_name = $db->real_escape_string($_POST['ur_name']);
		$ur_description = $db->real_escape_string($_POST['ur_description']);
		
		// Sql Statement
		$sql = "INSERT INTO user_roles (`ur_name`,`ur_description`) VALUES('$ur_name', '$ur_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User Role has been inserted successfully!</span>
															</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM user_roles WHERE id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$ur_name = $row->ur_name;
					$ur_description = $row->ur_description;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User Role not found!</span>
															</div>';
				header ('Location: index.php');
			}
		}
	}else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$ur_name = $db->real_escape_string($_POST['ur_name']);
		$ur_description = $db->real_escape_string($_POST['ur_description']);
		$id = $_POST['id'];

		$sql = "UPDATE user_roles SET ur_name='$ur_name', ur_description='$ur_description' WHERE id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																	<span>User Role has been Updated!</span>
																</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_user_role = $db->query("SELECT * FROM user_roles WHERE id=".$_GET['id']);
			if($q_user_role->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User Role not found!</span>
															</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM user_roles WHERE id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>User Role has been Deleted successfully!</span>
																		</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User Role not found!</span>
															</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT * FROM user_roles ORDER BY id");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($role = $query->fetch_object()) {
				$tbody .='<tr>
										<td class="text-center">'.$i.'</td>
										<td>'.$role->ur_name.'</td>
										<td>'.$role->ur_description.'</td>
										<td class="td-actions text-right">
											<a href="?action=edit&id='.$role->id.'" rel="tooltip" class="btn btn-success" data-placement="left" data-original-title="Edit info">
												<i class="material-icons">edit</i>
											</a>
											<button type="button" onclick="getId('.$role->id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger btndelete" title="Delete">
												<i class="material-icons">close</i>
											</button>
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