<?php

	// Basic Variable
	$title = 'User management';
	$m = '5';
	$sm = '5';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$u_name = $db->real_escape_string($_POST['u_name']);
		$email = $db->real_escape_string($_POST['email']);
		$pass = md5($db->real_escape_string($_POST['password'])).'098794286';
		$password = password_hash($pass, PASSWORD_BCRYPT);
		$confirm_password = $db->real_escape_string($_POST['password_confirmation']);
		$u_phone = $db->real_escape_string($_POST['u_phone']);
		$u_gender = $_POST['u_gender'];
		
		if ($db->real_escape_string($_POST['password']) === $confirm_password) {
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
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='status') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM users WHERE id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$u_status = $row->u_status;
				}
				if ($u_status==1) {
					$u_status=0;
				}else{
					$u_status=1;
				}
				$sql = "UPDATE users SET u_status='$u_status' WHERE id=".$_GET['id'];
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>User has been Updated!</span>
																		</div>';
					header ('Location: index.php');
					exit();
				}else{
					echo mysqli_error($db);
				}
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php');
			}
		}

	}else if (@$_GET['action']=='password') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM users WHERE id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$email = $row->email;
				}
				// include Page
				include('password.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php');
			}
		}
	}else if (@$_GET['action']=='update_password') {
		// Get Value From Posted Form
		$current_password = md5($db->real_escape_string($_POST['current_password'])).'098794286';
		$pass = md5($db->real_escape_string($_POST['password'])).'098794286';
		$password = password_hash($pass, PASSWORD_BCRYPT);
		$confirm_password = $db->real_escape_string($_POST['password_confirmation']);
		$id = $_POST['id'];
		$hash_pass = '';
		$query = $db->query("SELECT * FROM users WHERE id=".$id);
		if($query->num_rows > 0){
			while ($row = mysqli_fetch_object($query)) {
				$hash_pass = $row->password;
			}
		}
		if (password_verify($current_password, $hash_pass)) {
			if ($db->real_escape_string($_POST['password']) === $confirm_password) {
				$sql = "UPDATE users SET password='$password' WHERE id=$id";
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>User has been Updated!</span>
																		</div>';
					header ('Location: index.php');
					exit();
				}else{
					echo mysqli_error($db);
				}
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																	<span>Sorry your confirm password is not matched!</span>
																</div>';
				header ('Location: index.php?action=password&id='.$id);
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>Sorry your current password is not correct!</span>
															</div>';
			header ('Location: index.php?action=password&id='.$id);
		}

	}else if (@$_GET['action']=='image') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM users WHERE id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$u_name = $row->u_name;
					$u_image = $row->u_image;
				}
				// include Page
				include('image.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php');
			}
		}
	}else if (@$_GET['action']=='update_image') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		if (is_uploaded_file($_FILES['u_image']['tmp_name']) && $_FILES['u_image']['error'] == 0) {
			$oldimg = $_POST['oldimg'];
			$u_image = time()."_".rand(1111,9999).".png";

			$query = $db->query("SELECT * FROM users WHERE id=".$id);
			if($query->num_rows > 0){
				$sql = "UPDATE users SET u_image='$u_image' WHERE id=$id";
				if ($db->query($sql)==true) {

					if ($oldimg!='default_user.png') {
						unlink('../src/images/users/'.$oldimg);
					}
					move_uploaded_file($_FILES['u_image']['tmp_name'], '../src/images/users/'.$u_image);

					if ($id==UID){
						@$_SESSION['uimg'] = $u_image;
					}

					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>User has been Updated!</span>
																		</div>';
					header ('Location: index.php');
					exit();
				}else{
					echo mysqli_error($db);
				}
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>User not found!</span>
															</div>';
				header ('Location: index.php?action=image&id='.$id);
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
															<span>File is not upload!</span>
														</div>';
			header ('Location: index.php?action=image&id='.$id);
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
					if (UIMG!='default_user.png') {
						unlink('../src/images/users/'.UIMG);
					}
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
										<td class="text-center">'.$i.'</td>
										<td>'.$user->u_name.'</td>
										<td>'.$user->email.'</td>
										<td>'.$user->u_phone.'</td>
										<td>'.$user->ur_name.'</td>
										<td class="text-center">
											<div class="togglebutton">
												<label>
													<input type="checkbox" '.(($user->u_status==1)?'checked':'').' onchange="getId('.$user->id.')" data-toggle="modal" data-target="#deleteModal" class="toggle-status" />
													<span class="toggle toggle-active"></span>
												</label>
											</div>
										</td>
										<td class="td-actions text-right">
											<a href="?action=image&id='.$user->id.'" rel="tooltip" class="btn btn-warning" data-placement="left" data-original-title="Change Image">
												<i class="fa fa-image"></i>
											</a>
											<a href="?action=password&id='.$user->id.'" rel="tooltip" class="btn btn-info" data-placement="left" data-original-title="Edit Password">
												<i class="fa fa-key"></i>
											</a>'.
											buttonEdit($user->id).'
											<button type="button" onclick="getId('.$user->id.')" data-toggle="modal" data-target="#deleteModal" rel="tooltip" class="btn btn-danger btndelete" data-placement="left" data-original-title="Delete transactions" title="Delete">
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