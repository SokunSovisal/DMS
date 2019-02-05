<?php
	// Basic Variable
	$title = 'Documents';
	$m = '4';
	$sm = '8';
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
		$s_sql = "WHERE doc_service_id=$s_id";
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
		$doc_name = $db->real_escape_string($_POST['doc_name']);
		$doc_service_id = $_POST['doc_service_id'];
		$doc_description = $db->real_escape_string($_POST['doc_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_document (`doc_name`,`doc_service_id`,`doc_description`) VALUES('$doc_name', '$doc_service_id', '$doc_description')";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>ឯកសារត្រូវបានបញ្ចូល!</span>
			</div>';
			header ('Location: index.php'.$redirect_s_id);
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
					$doc_service_id = $row->doc_service_id;
					$doc_description = $row->doc_description;
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
					<span>រកពុំឃើញឯកសារ!</span>
				</div>';
				header ('Location: index.php'.$redirect_s_id);
			}
		}
	}else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$doc_name = $db->real_escape_string($_POST['doc_name']);
		$doc_service_id = $_POST['doc_service_id'];
		$doc_description = $db->real_escape_string($_POST['doc_description']);

		$sql = "UPDATE tbl_document SET doc_name='$doc_name',doc_service_id='$doc_service_id',doc_description='$doc_description' WHERE doc_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Documents has been Updated!</span>
			</div>';
			header ('Location: index.php'.$redirect_s_id);
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
					<span>រកពុំឃើញឯកសារ!</span>
				</div>';
				header ('Location: index.php'.$redirect_s_id);
			}else{
				if ( $db->query("DELETE FROM tbl_document WHERE doc_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>ឯកសារបានលុបដោយជោគជ័យ!</span>
					</div>';
					header ('Location: index.php'.$redirect_s_id);
				}
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>រកពុំឃើញឯកសារ!</span>
			</div>';
			header ('Location: index.php'.$redirect_s_id);
		}
		
	}else{
		$query = $db->query("SELECT * FROM tbl_document $s_sql ORDER BY doc_name");
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
						<a href="?action=edit&id='.$document->doc_id.$sub_s_id.'" class="btn btn-success">
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
	}
	// include footer
	include('../layout/'.$footer);
?>