<?php
	// Basic Variable
	$title = 'Transactions';
	$m = '4';
	$sm = '9';

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header.php');
?>
<style type="text/css">
	.actions .btn {
	    margin: 0;
	    padding: 10px 15px;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<h4 class="card-title mb-0">Tracking</h4>
			<br>
			<form action="search.php" style="display: inline;" method="get">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<select class="custom-select" name="co_name_en">
								<option value="">==All Company==</option>
								<?php 
									$get_company = $db->query("SELECT * FROM tbl_company ORDER BY co_name_en ASC");
									while ($row_company = mysqli_fetch_object($get_company)) {
										echo '<option value="'.$row_company->co_id.'" '.(($row_company->co_id==@$_GET['co_name_en'])?'selected':'').'>'.$row_company->co_name_en.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<select class="custom-select" name="s_name">
								<option value="">==All Service==</option>
								<?php 
									$get_service = $db->query("SELECT * FROM tbl_service ORDER BY s_name ASC");
									while ($row_service = mysqli_fetch_object($get_service)) {
										echo '<option value="'.$row_service->s_id.'" '.(($row_service->s_id==@$_GET['s_name'])?'selected':'').'>'.$row_service->s_name.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<select class="custom-select" name="em_name">
								<option value="">==All Employee==</option>
								<?php 
									$get_employee = $db->query("SELECT * FROM tbl_employee ORDER BY em_name ASC");
									while ($row_employee = mysqli_fetch_object($get_employee)) {
										echo '<option value="'.$row_employee->em_id.'" '.(($row_employee->em_id==@$_GET['em_name'])?'selected':'').'>'.$row_employee->em_name.'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<select class="custom-select" name="td_status" id="td_status">
								<option value="">==Choose Status==</option>
								<option value="0" <?=((@$_GET['td_status']=='0')?'selected':'')?>>Not Received</option>
								<option value="2" <?=((@$_GET['td_status']==2)?'selected':'')?>>Received</option>
								<option value="1" <?=((@$_GET['td_status']==1)?'selected':'')?>>Problem</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-1">
						<div class="form-group actions">
							<button type="submit" class="btn btn-success mt-0"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</form>
			<br/>
			<div class="vs-datatable">
				<table id="datatables" class="table table-hover table-striped" width="100%">
					<thead>
						<tr>
							<th width="5%" class="disabled-sorting text-center">N&deg;</th>
							<th>Record Date</th>
							<th>Company Name</th>
							<th>Service Type</th>
							<th>Document Name</th>
							<th>Control By</th>
							<th width="8%" class="disabled-sorting text-center border-lr">Received</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$q_condition = ' 1=1 AND ';
							$co_name = @$_GET['co_name'];
							$s_name = @$_GET['s_name'];
							$em_name = @$_GET['em_name'];
							$td_status = @$_GET['td_status'];
							if($co_name != ''){ $q_condition .= ' TR.tr_company='.$co_name.' AND '; }
							if($s_name != ''){ $q_condition .= ' TR.tr_service='.$s_name.' AND '; }
							if($em_name != ''){ $q_condition .= ' TD.td_control_by='.$em_name.' AND '; }
							if($td_status != ''){ $q_condition .= ' Td.td_status='.$td_status.' AND '; }
							$q_condition = rtrim($q_condition,' AND ');
							echo $q_condition;
							$query = $db->query("SELECT * FROM tbl_transaction_document AS TD
								LEFT JOIN tbl_document AS DOC ON DOC.doc_id = TD.td_document_id
								LEFT JOIN tbl_employee AS EC ON EC.em_id = TD.td_control_by
								LEFT JOIN tbl_transaction AS TR ON TR.tr_id = TD.td_transaction_id
								LEFT JOIN tbl_company AS CO ON CO.co_id = TR.tr_company
								LEFT JOIN tbl_service AS SV ON SV.s_id = TR.tr_service
								WHERE ".$q_condition."
							");
							if (@$query->num_rows > 0) {
								$i =1;
								while ($document = @$query->fetch_object()) {
									echo'<tr>
										<td class="text-center">'.$i.'</td>
										<td>'.$document->tr_date.'</td>
										<td>'.$document->co_name.'</td>
										<td>'.$document->s_name.'</td>
										<td>'.$document->doc_name.'</td>
										<td>'.$document->em_name.'</td>
										<td class="text-center border-lr"><i class="fa fa-'.(($document->td_status == 0) ? 'times-circle text-danger' : (($document->td_status == 1) ? 'exclamation-triangle text-warning' : 'check text-success') ).'"></i></td>
									</tr>';
									$i++;
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
	// include footer
	include('../layout/footer.php');
?>