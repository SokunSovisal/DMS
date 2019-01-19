<?php
	// Basic Variable
	$title = 'Transaction Document';
	$m = 'transactions';
	$sm = 'transactions';

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header.php');

	$tr_id=@$_GET['tr_id'];

	if (@$_GET['action']=='add') {
		
		// Get Company
		$documents = '';
		$query = $db->query("SELECT doc_name,doc_id FROM tbl_document WHERE s_id='$s_id' ORDER BY doc_name");
		while ($row = mysqli_fetch_object($query)) {
			$documents .= '<option value="'.$row->doc_id.'">'.$row->doc_name.'</option>';
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
		$td_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['td_date'])));
		$d_id = $db->real_escape_string($_POST['d_id']);
		$em_id = $db->real_escape_string($_POST['em_id']);
		$td_approve_by = $db->real_escape_string($_POST['td_approve_by']);
		$td_description = $db->real_escape_string($_POST['td_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_transaction_document (`tr_id`,`s_id`,`d_id`,`td_file`,`td_date`,`em_id`,`td_approve_by`,`td_description`) VALUES('$tr_id','$s_id', '$d_id', '$td_file', '$td_date','$em_id','$td_approve_by', '$td_description')";
		if ($db->query($sql)==true) {
			if (is_uploaded_file($_FILES['td_file']['tmp_name']) && $_FILES['td_file']['error'] == 0) {
			$td_file = time()."_".rand(1111,9999).".png";
			move_uploaded_file($_FILES['td_file']['tmp_name'], '../src/images/documents/'.$td_file);
				@$_SESSION['success'] = '<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Document has been inserted successfully!</span>
				</div>';
				@$_SESSION['error'] = '';
				echo "string";
				exit();
			}else{
				echo mysqli_error($db);
			}
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='checklist') {

		if (count($_POST['d_id']) > 0) {
			foreach( $_POST['d_id'] as $d_id ) {
				echo $tr_id;

				$sql = "INSERT INTO tbl_transaction_document (`tr_id`,`d_id`,`td_file`,`td_description`) VALUES('$td_date', '$td_company', '$tr_service', '$tr_em_id', '$tr_description')";
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Transition has been inserted successfully!</span>
					</div>';
					header ('Location: index.php');
					exit();
				}else{
					echo mysqli_error($db);
				}
			}
		}else{

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
					$tr_co_name=$row->co_name;
					$tr_service=$row->tr_service;
					$tr_s_name=$row->s_name;
					$tr_em_id=$row->tr_em_id;
					$tr_em_name=$row->em_name;
					$tr_description=$row->tr_description;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Document not found!</span>
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
				<span>Document has been Updated!</span>
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
					<span>Document not found!</span>
				</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_transaction WHERE tr_id=".$_GET['id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Document has been Deleted successfully!</span>
					</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Document not found!</span>
			</div>';
			header ('Location: index.php');
		}
		
	}else{
		if (isset($_GET['tr_id']) && $_GET['tr_id'] != '') {
			$query = $db->query("SELECT *,C.em_name as em_id, D.em_name as td_approve_by FROM tbl_transaction_document AS A
			LEFT JOIN tbl_document AS B ON A.d_id=B.doc_id
			LEFT JOIN tbl_employee AS C ON A.em_id=C.em_id 
			LEFT JOIN tbl_employee AS D ON A.td_approve_by=D.em_id 
			WHERE A.tr_id='$tr_id' ORDER BY A.td_id");
			if ($query->num_rows > 0) {
				$tbody ='';
				$i =1;
				while ($td = $query->fetch_object()) {
					$tbody .='<tr>
						<td class="text-center">'.$i.'</td>
						<td>'.$td->doc_name.'</td>
						<td>'.$td->td_file.'</td>
						<td>'.$td->td_date.'</td>
						<td>'.$td->em_id.'</td>
						<td>'.$td->td_approve_by.'</td>
						<td class="td-actions text-right">
							<a href="?action=edit&id='.$td->td_id.'" class="btn btn-success" titile="edit">
									<i class="material-icons">edit</i>
							</a>
							<button type="button" onclick="getId('.$td->td_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger" transactions" title="Delete">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>';
					$i++;
				}
				// include Page
				include('show.php');
			}else{
				include('checklist.php');
			}
		}else{

		}
		
	}


	// include footer
	include('../layout/footer.php');
?>