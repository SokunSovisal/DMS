<?php
	// Call Key
	include('../config/key.php');
	
	// Basic Variable
	$title = 'Documents';
	$m = 'Data List';
	$sm = 'Document';
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$doc_name = $db->real_escape_string($_POST['doc_name']);
		$doc_description = $db->real_escape_string($_POST['doc_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_document (`doc_name`,`doc_description`) VALUES('$doc_name', '$doc_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Documents has been inserted successfully!</span>
			</div>';
			@$_SESSION['error'] = '';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_document WHERE doc_id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$doc_name = $row->doc_name;
					$doc_description = $row->doc_description;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Documents not found!</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}
	else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$doc_name = $db->real_escape_string($_POST['doc_name']);
		$doc_description = $db->real_escape_string($_POST['doc_description']);

		$sql = "UPDATE tbl_document SET doc_name='$doc_name',doc_description='$doc_description' WHERE doc_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Documents has been Updated!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='delete') {

		if(isset($_GET['id']) && $_GET['id']!=''){
			$q_service = $db->query("SELECT * FROM tbl_document WHERE doc_id=".$_GET['id']);
			if($q_service->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Documents not found!</span>
				</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_document WHERE doc_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Documents has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Documents not found!</span>
			</div>';
			header ('Location: index.php');
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_document ORDER BY doc_name");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($document = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.$i.'</td>
					<td>'.$document->doc_name.'</td>
					<td>'.$document->doc_description.'</td>
					<td>'.date('d/M/Y',strtotime($document->created_at)).'</td>
					<td class="td-actions text-right">
						<a href="?action=edit&id='.$document->doc_id.'" class="btn btn-success">
								<i class="material-icons">edit</i>
						</a>
						<button type="button" onclick="getId('.$document->doc_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" title="Delete">
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