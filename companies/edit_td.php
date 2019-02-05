<?php
	// Basic Variable
	$title = 'Transaction Document';
	$m = '6';
	$sm = '9';

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header_frame.php');

	if (@$_GET['action']=='update_td') {
			// Get Value From Posted Form
			$tr_id = $_GET['tr_id'];
			$id = $_POST['id'];
			$td_date = $db->real_escape_string(date('Y-m-d', strtotime($_POST['td_date'])));
			$td_date_alert = $db->real_escape_string(date('Y-m-d', strtotime($_POST['td_date_alert'])));
			$td_status = $_POST['td_status'];
			$td_control_by = $_POST['td_control_by'];
			$td_description = $db->real_escape_string($_POST['td_description']);

			// echo ($td_date_alert);

			$sql = "UPDATE tbl_transaction_document SET td_date='$td_date', td_date_alert='$td_date_alert', td_status=$td_status, td_control_by=$td_control_by, td_description='$td_description' WHERE td_id=$id";
			if ($db->query($sql)==true) {
				@$_SESSION['success'] = '<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>Document has been Updated!</span>
				</div>';
				header ('Location: edit_td.php?td_id='.$id.'&tr_id='.$tr_id);
				exit();
			}else{
				echo mysqli_error($db);
			}

	}else{

		if(isset($_GET['td_id']) && $_GET['td_id']!=''){
			$query = $db->query("SELECT TD.*,D.doc_name AS td_document_id
													FROM tbl_transaction_document AS TD
													LEFT JOIN tbl_document AS D ON D.doc_id=TD.td_document_id
													WHERE TD.td_id=".$_GET['td_id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$td_date=$row->td_date;
					$td_date_alert=$row->td_date_alert;
					$td_status=$row->td_status;
					$td_description=$row->td_description;
					$td_document_id=$row->td_document_id;
					$td_control_by=$row->td_control_by;
				}
			}
		}

		$status = '';
		$query = $db->query("SELECT * FROM tbl_td_status");
		while ($row = mysqli_fetch_object($query)) {
			$status .= '<option value="'.$row->tds_id.'" '.(($row->tds_id==$td_status)? 'selected':'' ).'>'.$row->tds_name.'</option>';
		}

		$employees = '';
		$query = $db->query("SELECT * FROM tbl_employee");
		while ($row = mysqli_fetch_object($query)) {
			$employees .= '<option value="'.$row->em_id.'" '.(($row->em_id==$td_control_by)? 'selected':'' ).'>'.$row->em_name.'</option>';
		}


?>

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content mt-1">
			<h3 class="text-center mb-4"><?=$td_document_id?></h3>
			<form method="post" action="?action=update_td&tr_id=<?=@$_GET['tr_id']?>" class="form-horizontal" autocomplete="off">
				<input type="hidden" name="id" value="<?=@$_GET['td_id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ការបរិច្ឆេទ <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
							  </div>
								<input type="text" class="form-control datepicker" placeholder="record date" name="td_date" value="<?= date('m/d/Y', strtotime(@$td_date)) ?>" id="td_date" data-toggle="datetimepicker" data-target="#td_date" required>
							</div>
						</div>
						<div class="form-group">
							<label>គ្រប់គ្រងដោយ <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">face</i></span>
							  </div>
								<select class="custom-select" name="td_control_by">
									<option>-- សូមជ្រើសរើស --</option>
									<?= $employees ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>ការទទួលឯកសារ <small>*</small></label>
						  <div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="fa fa-<?=(($td_status == 0) ? 'times-circle text-danger' : (($td_status == 2) ? 'exclamation-triangle text-warning' : 'check text-success') )?>"></i></span>
							  </div>
								<select class="custom-select" name="td_status" id="td_status">
									<option value="">-- សូមជ្រើសរើស --</option>
									<?= $status ?>
								</select>
							</div>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>ថ្ងៃជូនដំណឹង <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
							  </div>
								<input type="text" class="form-control datepicker" placeholder="alert date" name="td_date_alert" id="td_date_alert" data-toggle="datetimepicker" data-target="#td_date_alert"  value="<?= ((isset($td_date_alert))? date('m/d/Y', strtotime(@$td_date_alert)) : '') ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label>Note *</label>
							<textarea class="form-control" placeholder="note" style="height: 126px;" name="td_description"><?= @$td_description ?></textarea>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="submit-section float-right">
							<!-- Btn Submit -->
							<?php include('../layout/comps/submit.php'); ?>
						</div>
					</div>
				</div> <!-- /.row -->
			</form>
		</div>
	</div>
</div>
<script>

	$('.datepicker').datetimepicker({
	    format: 'L'
	});

	$('#td_status').change(function () {
		switch($(this).val()) {
		  case '0':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-times-circle text-danger"></i>');
		    break;
		  case '1':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-check text-success"></i>');
		    break;
		  case '2':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-exclamation-triangle text-warning"></i>');
		    break;
		  default:
				$(this).prev().find('.input-group-text').html('<i class="material-icons">assignment_turned_in</i>');
		}
	});
</script>

<?php
		
	}
	// include footer
	include('../layout/footer_frame.php');
?>