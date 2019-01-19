<?php
	// Call Key
	include('../config/key.php');

	// Basic Variable
	$title = 'Service management';
	$m = 'Data List';
	$sm = 'Services';
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';


	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$s_name = $db->real_escape_string($_POST['s_name']);
		$s_price = $db->real_escape_string($_POST['s_price']);
		$s_description = $db->real_escape_string($_POST['s_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_service (`s_name`,`s_price`,`s_description`) VALUES('$s_name', '$s_price', '$s_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Service has been inserted successfully!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_service WHERE s_id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$s_name = $row->s_name;
					$s_price = $row->s_price;
					$s_description = $row->s_description;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Service not found!</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$s_name = $db->real_escape_string($_POST['s_name']);
		$s_price = $db->real_escape_string($_POST['s_price']);
		$s_description = $db->real_escape_string($_POST['s_description']);

		$sql = "UPDATE tbl_service SET s_name='$s_name',s_price='$s_price',s_description='$s_description' WHERE s_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Service has been Updated!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_service = $db->query("SELECT * FROM tbl_service WHERE s_id=".$_GET['id']);
			if($q_service->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Service not found!</span>
				</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_service WHERE s_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Service has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Service not found!</span>
			</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_service ORDER BY s_name");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($service = $query->fetch_object()) {
				$tbody .='<tr>
										<td class="text-center">'.$i.'</td>
										<td>'.$service->s_name.'</td>
										<td>'.$service->s_price.'</td>
										<td>'.$service->s_description.'</td>
										<td class="td-actions text-right">
											<a href="?action=edit&id='.$service->s_id.'" class="btn btn-success" title="edit">
													<i class="material-icons">edit</i>
											</a>
											<button type="button" onclick="getId('.$service->s_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" title="Delete">
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