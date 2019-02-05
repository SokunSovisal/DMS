<?php
	
	// Basic Variable
	$title = 'Company management';
	$m = '2';
	$sm = '2';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$m.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {

		$employees = '';
		$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
		while ($row = mysqli_fetch_object($query)) {
			$employees .= '<option value="'.$row->em_id.'">'.$row->em_name.'</option>';
		}

		$services = '';
		$query = $db->query("SELECT s_id,s_name FROM tbl_service ORDER BY s_name");
		while ($row = mysqli_fetch_object($query)) {
			$services .= '<option value="'.$row->s_id.'">'.$row->s_name.'</option>';
		}

		// include Page
		include('create.php');

	}if (@$_GET['action']=='addtransaction') {
		if(isset($_GET['co_id']) && $_GET['co_id']!=''){

			$query = $db->query("SELECT * FROM tbl_company WHERE co_id=".$_GET['co_id']);
			if($query->num_rows > 0){
				$employees = '';
				$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
				while ($row = mysqli_fetch_object($query)) {
					$employees .= '<option value="'.$row->em_id.'">'.$row->em_name.'</option>';
				}
				
				$services = '';
				$query = $db->query("SELECT s_id,s_name FROM tbl_service ORDER BY s_name");
				while ($row = mysqli_fetch_object($query)) {
					$services .= '<option value="'.$row->s_id.'">'.$row->s_name.'</option>';
				}
				// include Page
				include('createtransaction.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ក្រុមហ៊ុនរកពុំឃើញឡើយ!</span>
															</div>';
				header ('Location: index.php');
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
															<span>ក្រុមហ៊ុនរកពុំឃើញឡើយ!</span>
														</div>';
			header ('Location: index.php');
		}

	}else if (@$_GET['action']=='detail'){
		if(isset($_GET['tr_id']) && $_GET['tr_id']!=''){
			$query = $db->query("SELECT TR.*,C.* FROM tbl_transaction AS TR LEFT JOIN tbl_company AS C ON C.co_id=TR.tr_company WHERE TR.tr_id=".$_GET['tr_id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$tr_id = $row->tr_id;
					$tr_company = $row->tr_company;
					$co_name_kh = $row->co_name_kh;
					$tr_service = $row->tr_service;
					$tr_em_id = $row->tr_em_id;
					$tr_description = $row->tr_description;
					$co_id = $row->co_id;
					$co_name_en = $row->co_name_en;
					$co_name_kh = $row->co_name_kh;
					$co_type = $row->co_type;
					$co_vat_no = $row->co_vat_no;
					$co_phone = $row->co_phone;
					$co_email = $row->co_email;
					$co_vat_no = $row->co_vat_no;
					$co_address = $row->co_address;
					$co_register_date = $row->co_register_date;
					$co_em_id = $row->co_em_id;
					$co_description = $row->co_description;
				}

				$tbody ='';
				$i =0;
				// Get Checklist
				$q_tr = $db->query("SELECT TD.*,ST.tds_name,ST.tds_icon,ST.tds_color, DOC.doc_name AS td_document_id, EC.em_name AS td_control_by
														FROM tbl_transaction_document AS TD
														LEFT JOIN tbl_document AS DOC ON DOC.doc_id = TD.td_document_id
														LEFT JOIN tbl_employee AS EC ON EC.em_id = TD.td_control_by
														LEFT JOIN tbl_td_status AS ST ON ST.tds_id = TD.td_status
														WHERE TD.td_transaction_id='$tr_id'");
				if ($q_tr->num_rows > 0) {
					while ($td = mysqli_fetch_object($q_tr)) {
						$tbody .='<tr>
							<td class="text-center">'.++$i.'</td>
							<td>'.$td->td_date.'</td>
							<td>'.$td->td_document_id.'</td>
							<td class="text-center border-lr"><i class="fa fa-'.$td->tds_icon.' text-'.$td->tds_color.'"></i></td>
							<td>&nbsp;'.$td->td_description.'</td>
							<td>'.$td->td_control_by.'</td>
							<td class="td-actions text-right">
								<button type="button" class="btn btn-success" onclick="getTdid('.$td->td_id.')" data-toggle="modal" data-target="#main_modal"><i class="material-icons">edit</i></button> 
							</td>
						</tr>';
					}
				}

				$steps ='';
				$j =0;
				// Get Checklist
				$q_ts = $db->query("SELECT TS.*, st.step_name, EC.em_name
														FROM tbl_transaction_step AS TS
														LEFT JOIN tbl_step AS st ON st.step_id = TS.ts_step_id
														LEFT JOIN tbl_employee AS EC ON EC.em_id = TS.ts_control_by
														WHERE TS.ts_transaction_id='$tr_id'");


				if ($q_ts->num_rows > 0) {
					while ($ts = mysqli_fetch_object($q_ts)) {

						$employees = '';
						$query = $db->query("SELECT em_name,em_id FROM tbl_employee ORDER BY em_name");
						while ($row = mysqli_fetch_object($query)) {
							$employees .= '<option value="'.$row->em_id.'" '.(($row->em_id==$ts->ts_control_by)? 'selected':'' ).'>'.$row->em_name.'</option>';
						}

						$steps .='<li class="timeline-inverted">
							          <div class="timeline-badge warning">
							            '.++$j.'
							          </div>
								          <div class="timeline-panel">
								            <div class="timeline-heading">
								              <span class="badge badge-pill badge-info">'.$ts->step_name.'</span>
								            </div>
								            <div class="timeline-body">
								          		<form action="?action=update_ts" method="post">
								          			<input type="hidden" name="tr_id" value="'.$ts->ts_transaction_id.'"/>
								          			<input type="hidden" name="ts_id" value="'.$ts->ts_id.'"/>
								          			<div class="row">
								          				<div class="col-sm-6">
											              <div class="form-group">
																			<label>ការបរិច្ឆេទ <small>*</small></label>
												            	<div class="input-group">
																			  <div class="input-group-prepend">
																			    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
																			  </div>
												              	<input class="form-control datepicker" autocomplete="off" name="ts_date" id="ts_date-'.$ts->ts_id.'" data-toggle="datetimepicker" data-target="#ts_date-'.$ts->ts_id.'" placeholder="record date" value="'.( ($ts->ts_date!='')? date('m/d/Y', strtotime($ts->ts_date)) : '' ).'" required/>
																			</div>
											              </div>
											              <div class="form-group">
																			<label>ថ្ងៃជូនដំណឹង <small>*</small></label>
												            	<div class="input-group">
																			  <div class="input-group-prepend">
																			    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
																			  </div>
												              	<input class="form-control datepicker" autocomplete="off" name="ts_date_alert" autocomplete="off" id="ts_date_alert-'.$ts->ts_id.'" data-toggle="datetimepicker" data-target="#ts_date_alert-'.$ts->ts_id.'" placeholder="date alert" value="'.( ($ts->ts_date_alert!='')? date('m/d/Y', strtotime($ts->ts_date_alert)) : '' ).'" required/>
																			</div>
											              </div>
											              <div class="form-group">
											              	<label>គ្រប់គ្រងដោយ <small>*</small></label>
												            	<div class="input-group">
																			  <div class="input-group-prepend">
																			    <span class="input-group-text"><i class="material-icons">face</i></span>
																			  </div>
																				<select class="custom-select" name="ts_control_by" required>
																					<option value="">-- ជ្រើសរើស --</option>
																					'.$employees.'
																				</select>
											              	</div>
											              </div>
								          				</div>
								          				<div class="col-sm-6">
											              <div class="form-group">
											              	<label>បរិយាយ</label>
												              <textarea class="form-control" style="height: 210px;" placeholder="description" name="ts_description">'.$ts->ts_description.'</textarea>
											              </div>
								          				</div>
								          				<div class="col-sm-12">
											              <div class="form-group float-right">
											              	<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;រក្សាទុក</button>
											              </div>
										              </div>
								          			</div>
									       			</form>
								            </div>
								          </div>
							        </li>';
					}
				}

				// include Page
				include('detail.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ប្រតិបត្តិការរកពុំឃើញឡើយ!</span>
															</div>';
				header ('Location: index.php?action=detail&id='.$_GET['co_id']);
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
															<span>ប្រតិបត្តិការរកពុំឃើញឡើយ!</span>
														</div>';
			header ('Location: index.php?action=detail&id='.$_GET['co_id']);
		}

	}else if (@$_GET['action']=='store'){
		// Get Value From Posted Form
		$co_name_kh = $db->real_escape_string($_POST['co_name_kh']);
		$co_name_en = $db->real_escape_string($_POST['co_name_en']);
		$co_type = $db->real_escape_string($_POST['co_type']);
		$co_vat_no = $db->real_escape_string($_POST['co_vat_no']);
		$co_phone = $db->real_escape_string($_POST['co_phone']);
		$co_email = $db->real_escape_string($_POST['co_email']);
		$co_address = $db->real_escape_string($_POST['co_address']);
		$co_register_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['co_register_date'])));
		$co_em_id = $db->real_escape_string($_POST['co_em_id']);
		$co_description = $db->real_escape_string($_POST['co_description']);
		$tr_service_id = $db->real_escape_string($_POST['tr_service_id']);
		$created_by = UID;
		$updated_by = UID;

		// // Sql Statement
		$sql = "INSERT INTO tbl_company (`co_name_kh`,`co_name_en`,`co_type`,`co_vat_no`,`co_phone`,`co_email`,`co_address`,`co_register_date`,`co_em_id`,`co_description`) VALUES('$co_name_kh', '$co_name_en', '$co_type', '$co_vat_no', '$co_phone', '$co_email', '$co_address', '$co_register_date', '$co_em_id', '$co_description')";
		if ($db->query($sql)==true) {
			$co_id = $db->insert_id;

			// Create transaction
			$sql_tr = "INSERT INTO tbl_transaction (`tr_date`,`tr_company`,`tr_service`,`tr_em_id`,`created_by`,`updated_by`) VALUES('$co_register_date', '$co_id', '$tr_service_id', '$co_em_id', $created_by, $updated_by)";
			if ($db->query($sql_tr)==true) {
				$tr_id = $db->insert_id;

				// Create Checklist
				$query = $db->query("SELECT * FROM tbl_document WHERE doc_service_id=$tr_service_id ORDER BY doc_name");
				if ($query->num_rows > 0) {
					$i =1;
					while ($document = $query->fetch_object()) {
						$doc_id = $document->doc_id;
						$td_status = 0;

						if ( isset($_POST['d_id']) && (count($_POST['d_id']) > 0)) {
							foreach( $_POST['d_id'] as $d_id ) {
								if ($doc_id==$d_id) {
									$td_status = 1;
								}
							}
						}

						$sql = "INSERT INTO tbl_transaction_document (`td_date`,`td_transaction_id`,`td_document_id`,`td_control_by`,`td_status`,`created_by`,`updated_by`) VALUES('$co_register_date', '$tr_id', '$doc_id', '$co_em_id', '$td_status',$created_by,$updated_by)";
						if ($db->query($sql) == true) {
							echo "transaction Document successfully!";
						}else{
							echo mysqli_error($db);
						}
					}
				}

				// Create Steps
				$q_step = $db->query("SELECT * FROM tbl_step WHERE step_service=$tr_service_id ORDER BY step_name");
				if ($q_step->num_rows > 0) {
					$i =1;
					while ($step = $q_step->fetch_object()) {
						$step_id = $step->step_id;

						$sql = "INSERT INTO tbl_transaction_step (`ts_transaction_id`,`ts_step_id`,`ts_control_by`,`created_by`,`updated_by`) VALUES('$tr_id', '$step_id', '$co_em_id',$created_by,$updated_by)";
						if ($db->query($sql) == true) {
							echo "transaction step successfully!";
						}else{
							echo mysqli_error($db);
						}
					}
				}

				echo "<br/> Transaction successfully!";
			}else{
				echo mysqli_error($db);
			}

			header ('Location: index.php?action=detail&tr_id='.$tr_id);
			exit();
			echo "<br/> Company successfully!";
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='storetransaction'){
		// Get Value From Posted Form
		$tr_date = $db->real_escape_string($_POST['tr_date']);
		$co_id = $db->real_escape_string($_POST['co_id']);
		$tr_service = $db->real_escape_string($_POST['tr_service']);
		$tr_em_id = $db->real_escape_string($_POST['tr_em_id']);
		$created_by = UID;
		$updated_by = UID;
		// Create transaction
		$sql_tr = "INSERT INTO tbl_transaction (`tr_date`,`tr_company`,`tr_service`,`tr_em_id`,`created_by`,`updated_by`) VALUES('$tr_date', '$co_id', '$tr_service', '$tr_em_id', $created_by, $updated_by)";
		if ($db->query($sql_tr)==true) {
			$tr_id = $db->insert_id;

			// Create Checklist
			$query = $db->query("SELECT * FROM tbl_document WHERE doc_service_id=$tr_service ORDER BY doc_name");
			if ($query->num_rows > 0) {
				$i =1;
				while ($document = $query->fetch_object()) {
					$doc_id = $document->doc_id;
					$td_status = 0;

					if ( isset($_POST['d_id']) && (count($_POST['d_id']) > 0)) {
						foreach( $_POST['d_id'] as $d_id ) {
							if ($doc_id==$d_id) {
								$td_status = 1;
							}
						}
					}

					$sql = "INSERT INTO tbl_transaction_document (`td_date`,`td_transaction_id`,`td_document_id`,`td_control_by`,`td_status`,`created_by`,`updated_by`) VALUES('$tr_date', '$tr_id', '$doc_id', '$tr_em_id', '$td_status',$created_by,$updated_by)";
					if ($db->query($sql) == true) {
						echo "transaction Document successfully!";
					}else{
						echo mysqli_error($db);
					}
				}
			}

			// Create Steps
			$q_step = $db->query("SELECT * FROM tbl_step WHERE step_service=$tr_service ORDER BY step_name");
			if ($q_step->num_rows > 0) {
				$i =1;
				while ($step = $q_step->fetch_object()) {
					$step_id = $step->step_id;

					$sql = "INSERT INTO tbl_transaction_step (`ts_transaction_id`,`ts_step_id`,`ts_control_by`,`created_by`,`updated_by`) VALUES('$tr_id', '$step_id', '$tr_em_id',$created_by,$updated_by)";
					if ($db->query($sql) == true) {
						echo "transaction step successfully!";
					}else{
						echo mysqli_error($db);
					}
				}
			}

			header ('Location: index.php?action=detail&tr_id='.$tr_id);
			exit();
			echo "<br/> Transaction successfully!";
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='update_ts'){
		// Get Value From Posted Form
		$tr_id = $db->real_escape_string($_POST['tr_id']);
		$ts_id = $db->real_escape_string($_POST['ts_id']);
		$ts_date = $db->real_escape_string($_POST['ts_date']);
		$ts_date_alert = $db->real_escape_string($_POST['ts_date_alert']);
		$ts_control_by = $db->real_escape_string($_POST['ts_control_by']);
		$ts_description = $db->real_escape_string($_POST['ts_description']);
		$updated_by = UID;
		// Create transaction
		$sql = "UPDATE tbl_transaction_step SET ts_id='$ts_id',ts_date='$ts_date',ts_date_alert='$ts_date_alert', ts_control_by='$ts_control_by', ts_description='$ts_description' WHERE ts_id=$ts_id";
		if ($db->query($sql)==true) {

			header ('Location: index.php?action=detail&tr_id='.$tr_id.'&tab=step');
			exit();
			echo "<br/> Transaction successfully!";
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='deletetransaction'){

		if(isset($_GET['tr_id']) && $_GET['tr_id']!=''){
			$q_transaction = $db->query("SELECT * FROM tbl_transaction WHERE tr_id=".$_GET['tr_id']);
			if($q_transaction->num_rows == 0){
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ពុំមានប្រតិបត្តិការនេះឡើយ!</span>
															</div>';
				header ('Location: index.php');
			}else{
				if ( $db->query("DELETE FROM tbl_transaction WHERE tr_id=".$_GET['tr_id']) == true) {
					@$_SESSION['success'] = '<div class="alert alert-success">
																			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																			<span>ប្រតិបត្តិការបាលុបដោយជោគជ័យ!</span>
																		</div>';
					header ('Location: index.php');
				}
			}

		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ពុំមានប្រតិបត្តិការនេះឡើយ!</span>
															</div>';
			header ('Location: index.php');
		}

	}else if (@$_GET['action']=='deletecompany'){

		if(isset($_GET['co_id']) && $_GET['co_id']!=''){
			$q_transaction = $db->query("SELECT * FROM tbl_transaction WHERE tr_company=".$_GET['co_id']);
			if ($q_transaction->num_rows > 0) {
				while ($company = $q_transaction->fetch_object()) {
					$tr_id = $company->tr_id;
					// Delete Checklist
					$db->query("DELETE FROM tbl_transaction_document WHERE td_transaction_id=$tr_id");
					// Delete Step
					$db->query("DELETE FROM tbl_transaction_step WHERE ts_transaction_id=$tr_id");
					// Delete Transaction
					$db->query("DELETE FROM tbl_transaction WHERE tr_id=$tr_id");
				}
				// Delete Company
				$db->query("DELETE FROM tbl_company WHERE co_id=".$_GET['co_id']);
				// Redirect
				@$_SESSION['success'] = '<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>ក្រុមហ៊ុនត្រូវបានលុបដោយជោគជ័យ!</span>
				</div>';
				header ('Location: index.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
															</div>';
				header ('Location: index.php');
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>ពុំមានក្រុមហ៊ុននេះឡើយ!</span>
															</div>';
			header ('Location: index.php');
		}

	}else if(!isset($_GET['action'])){

		$query = $db->query("SELECT tbl_company.*,tbl_employee.em_name FROM tbl_company LEFT JOIN tbl_employee ON tbl_company.co_em_id=tbl_employee.em_id ORDER BY tbl_company.co_id");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =1;
			while ($company = $query->fetch_object()) {
				$tbody .='<tr onclick="getCid('.$company->co_id.')" data-toggle="modal" data-target="#transactionModal">
										<td class="text-center">'.++$i.'</td>
										<td>'.$company->co_name_en.'</td>
										<td>'.$company->co_type.'</td>
										<td>'.$company->co_register_date.'</td>
										<td>'.$company->co_phone.'</td>
										<td>'.$company->em_name.'</td>
									</tr>';
			}
		}
		// include Page
		include('show.php');
	}


	// include footer
	include('../layout/footer.php');
?>