<?php
	// Basic Variable
	$title = 'User management';
	$m = 'manage_users';
	$sm = 'users';

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$u_name = $db->real_escape_string($_POST['u_name']);
		$email = $db->real_escape_string($_POST['email']);
		$password = $db->real_escape_string($_POST['password']);
		$confirm_password = $db->real_escape_string($_POST['password_confirmation']);
		$u_phone = $db->real_escape_string($_POST['u_phone']);
		$u_gender = $_POST['u_gender'];
		
		if ($password === $confirm_password) {
			$q_user = $db->query("SELECT * FROM users WHERE email = '$email'");
			if($q_user->num_rows > 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																	<span>E-mail has been taken!</span>
																</div>';
																
				header ('Location: index.php?action=add');
			}else{
				// Sql Statement
				$sql = "INSERT INTO users (`u_name`,`email`,`password`,`u_phone`,`u_gender`) VALUES('$u_name', '$email', '$password', '$u_phone', '$u_gender')";
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																		<span>User has been inserted successfully!</span>
																	</div>';
					@$_SESSION['error'] = '';
					header ('Location: index.php');
					exit();
				}else{
					echo mysqli_error($db);
				}
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>Sorry your confirm password is not matched!</span>
															</div>';
			header ('Location: index.php?action=add');
		}
		
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM users WHERE id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$u_name = $row->u_name;
					$u_phone = $row->u_phone;
					$u_gender = $row->u_gender;
					$email = $row->email;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php');
			}
		}
	}else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$u_name = $db->real_escape_string($_POST['u_name']);
		$email = $db->real_escape_string($_POST['email']);
		$u_phone = $db->real_escape_string($_POST['u_phone']);
		$u_gender = $_POST['u_gender'];
		$id = $_POST['id'];

		$sql = "UPDATE users SET u_name='$u_name', email='$email', u_phone='$u_phone', u_gender='$u_gender' WHERE id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																	<span>User has been Updated!</span>
																</div>';
			header ('Location: index.php?action=edit&id='.$id);
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_user = $db->query("SELECT * FROM users WHERE id=".$_GET['id']);
			if($q_user->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM users WHERE id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>User has been Deleted successfully!</span>
																		</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT users.*,user_roles.ur_name FROM users LEFT JOIN user_roles ON users.u_role_id=user_roles.id ORDER BY users.id");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($user = $query->fetch_object()) {
				$tbody .='<tr>
										<td>'.$i.'</td>
										<td>'.$user->u_name.'</td>
										<td>'.$user->email.'</td>
										<td>'.$user->u_phone.'</td>
										<td>'.$user->ur_name.'</td>
										<td class="td-actions text-right">
											<a href="?action=image&id='.$user->id.'" rel="tooltip" class="btn btn-warning" data-placement="left" data-original-title="Change Image">
												<i class="fa fa-image"></i>
											</a>
											<a href="?action=password&id='.$user->id.'" rel="tooltip" class="btn btn-info" data-placement="left" data-original-title="Edit Password">
												<i class="fa fa-key"></i>
											</a>
											<a href="?action=edit&id='.$user->id.'" rel="tooltip" class="btn btn-success" data-placement="left" data-original-title="Edit info">
												<i class="material-icons">edit</i>
											</a>
											<button type="button" onclick="getUid('.$user->id.')" data-toggle="modal" data-target="#deleteModal" rel="tooltip" class="btn btn-danger" data-placement="left" data-original-title="Delete User" title="Delete">
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