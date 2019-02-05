<?php
	// Basic Variable
	$title = 'Transaction Document';
	$m = '6';
	$sm = '9';

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header.php');

	if (isset($_GET['tr_id']) && $_GET['tr_id'] != '') {
		$query1 = $db->query("SELECT * FROM tbl_transaction WHERE tr_id=".$_GET['tr_id']);
		if ($query1->num_rows > 0) {

			$tr_id=@$_GET['tr_id'];

			if (@$_GET['action']=='add') {
				// Get employee
				$employees = '';
				$query = $db->query("SELECT * FROM tbl_employee ORDER BY em_name");
				while ($row = mysqli_fetch_object($query)) {
					$employees .= '<option value="'.$row->em_id.'">'.$row->em_name.'</option>';
				}
				// Get Document
				$documents = '';
				$query = $db->query("SELECT * FROM tbl_document 
					WHERE doc_id NOT IN (SELECT td_document_id FROM tbl_transaction_document WHERE td_transaction_id='$tr_id') 
					ORDER BY doc_name");
				while ($row = mysqli_fetch_object($query)) {
					$documents .= '<option value="'.$row->doc_id.'">'.$row->doc_name.'</option>';
				}
				// include Page
				include('create.php');
			}else if (@$_GET['action']=='store') {
				// Get Value From Posted Form
				$td_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['td_date'])));
				$td_status = $_POST['td_status'];
				$td_document_id = $_POST['td_document_id'];
				$td_control_by = $_POST['td_control_by'];
				$td_approve_by = $_POST['td_approve_by'];
				$td_description = $db->real_escape_string($_POST['td_description']);
				
				// Sql Statement
				$sql = "INSERT INTO tbl_transaction_document (`td_date`,`td_transaction_id`,`td_status`,`td_document_id`,`td_control_by`,`td_approve_by`,`td_description`) VALUES('$td_date',$tr_id,$td_status, $td_document_id, $td_control_by, $td_approve_by, '$td_description')";
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Document has been Updated!</span>
					</div>';
					header ('Location: index.php?tr_id='.$tr_id);
					exit();
				}else{
					echo mysqli_error($db);
				}
			}else if (@$_GET['action']=='checklist') {

				if (count($_POST['d_id']) > 0) {
					$td_date = $_POST['td_date'];
					$td_control_by = $_POST['td_control_by'];
					$td_approve_by = $_POST['td_approve_by'];
					foreach( $_POST['d_id'] as $d_id ) {
						$sql = "INSERT INTO tbl_transaction_document (`td_date`,`td_transaction_id`,`td_document_id`,`td_control_by`,`td_approve_by`) VALUES('$td_date', '$tr_id', '$d_id', '$td_control_by', '$td_approve_by')";
						if ($db->query($sql) == true) {
							@$_SESSION['success'] = '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
								<span>Check has been created successfully!</span>
							</div>';
						}else{
							echo mysqli_error($db);
						}
					}
					header ('Location: index.php?tr_id='.$tr_id);
					exit();
				}else{
					@$_SESSION['error'] = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Please select atleast one document!</span>
					</div>';
					header ('Location: index.php?tr_id='.$tr_id);
				}

			}else if (@$_GET['action']=='edit') {
				if(isset($_GET['id']) && $_GET['id']!=''){
					$query = $db->query("SELECT * FROM tbl_transaction_document WHERE td_id=".$_GET['id']);
					if($query->num_rows > 0){
						while ($row = mysqli_fetch_object($query)) {
							$td_date=$row->td_date;
							$td_status=$row->td_status;
							$td_description=$row->td_description;
							$td_document_id=$row->td_document_id;
							$td_control_by=$row->td_control_by;
							$td_approve_by=$row->td_approve_by;
						}
						// Get employee
						$control_by = '';
						$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
						while ($row = mysqli_fetch_object($query)) {
							$control_by .= '<option value="'.$row->em_id.'" '.(($row->em_id==$td_control_by)?'selected':'').'>'.$row->em_name.'</option>';
						}
						// Get employee
						$approve_by = '';
						$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
						while ($row = mysqli_fetch_object($query)) {
							$approve_by .= '<option value="'.$row->em_id.'" '.(($row->em_id==$td_approve_by)?'selected':'').'>'.$row->em_name.'</option>';
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
			}else if (@$_GET['action']=='update') {
				// Get Value From Posted Form
				$id = $_POST['id'];
				$td_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['td_date'])));
				$td_status = $_POST['td_status'];
				$td_control_by = $_POST['td_control_by'];
				$td_approve_by = $_POST['td_approve_by'];
				$td_description = $db->real_escape_string($_POST['td_description']);

				$sql = "UPDATE tbl_transaction_document SET td_date='$td_date', td_status=$td_status, td_control_by=$td_control_by, td_approve_by=$td_approve_by, td_description='$td_description' WHERE td_id=$id";
				if ($db->query($sql)==true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
						<span>Document has been Updated!</span>
					</div>';
					header ('Location: index.php?tr_id='.$tr_id);
					exit();
				}else{
					echo mysqli_error($db);
				}

			}else if (@$_GET['action']=='delete') {

				if(isset($_GET['id']) && $_GET['id']!=''){
					$q_td = $db->query("SELECT * FROM tbl_transaction_document WHERE td_id=".$_GET['id']);
					if($q_td->num_rows == 0){
						@$_SESSION['error'] = '<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
							<span>Document not found!</span>
						</div>';
						header ('Location: index.php?tr_id='.$tr_id);
					}else{
						if ( $db->query("DELETE FROM tbl_transaction_document WHERE td_id=".$_GET['id']) == true) {
							@$_SESSION['success'] = '<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
								<span>Document has been Deleted successfully!</span>
							</div>';
							header ('Location: index.php?tr_id='.$tr_id);
						}else{
							echo mysqli_error($db);
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
				$query = $db->query("SELECT TD.*, DOC.doc_name AS td_document_id, EC.em_name AS td_control_by, EA.em_name AS td_approve_by
														FROM tbl_transaction_document AS TD
														LEFT JOIN tbl_document AS DOC ON DOC.doc_id = TD.td_document_id
														LEFT JOIN tbl_employee AS EC ON EC.em_id = TD.td_control_by
														LEFT JOIN tbl_employee AS EA ON EA.em_id = TD.td_approve_by
														WHERE TD.td_transaction_id='$tr_id'");
				if ($query->num_rows > 0) {
					$tbody ='';
					$i =1;
					while ($td = $query->fetch_object()) {
						$tbody .='<tr>
							<td class="text-center">'.$i.'</td>
							<td>'.$td->td_date.'</td>
							<td>'.$td->td_document_id.'</td>
							<td class="text-center border-lr"><i class="fa fa-'.(($td->td_status == 0) ? 'times-circle text-danger' : (($td->td_status == 1) ? 'exclamation-triangle text-warning' : 'check text-success') ).'"></i></td>
							<td>&nbsp;'.$td->td_description.'</td>
							<td>'.$td->td_control_by.'</td>
							<td>'.$td->td_approve_by.'</td>
							<td class="td-actions text-right">'.
								buttonEdit($td->td_id).
								buttonDelete($td->td_id).'
							</td>
						</tr>';
						$i++;
					}
					// include Page
					include('show.php');
				}else{
					$employees ='';
					$query = $db->query("SELECT * FROM tbl_employee ORDER BY em_name");
					if ($query->num_rows > 0) {
						while ($em = $query->fetch_object()) {
							$employees .='<option value="'.$em->em_id.'">'.$em->em_name .'</option>';
						}
					}
					$tr_date = '';
					$query = $db->query("SELECT * FROM tbl_transaction WHERE tr_id=$tr_id");
					if ($query->num_rows > 0) {
						while ($tr = $query->fetch_object()) {
							$tr_date = $tr->tr_date;
						}
					}

					$tbody ='';
					$query = $db->query("SELECT * FROM tbl_document ORDER BY doc_name");
					if ($query->num_rows > 0) {
						$i =1;
						while ($document = $query->fetch_object()) {
							$tbody .='<tr>
													<td>'.$i.'</td>
													<td><label>'.$document->doc_name .'</label></td>
													<td>
														<div class="togglebutton">
															<label>
																<input type="checkbox" class="doc_check"/>
																<span class="toggle toggle-active"></span>
																<input type="hidden" class="d_id" name="d_id[]" disabled value="'.$document->doc_id.'" />
															</label>
														</div>
													</td>
												</tr>';
							$i++;
						}
					}
					include('checklist.php');
				}
				
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>Transaction not found!</span>
			</div>';
			header ('Location: '.BASE.'transactions');
		}
	}else{
		@$_SESSION['error'] = '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
			<span>Transaction not found!</span>
		</div>';
		header ('Location: '.BASE.'transactions');
	}


	// include footer
	include('../layout/footer.php');
?>