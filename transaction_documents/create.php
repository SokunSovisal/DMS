<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?=@ERROR?>
			<?php @$_SESSION['error'] = ''; ?>
			<a href="index.php?tr_id=<?=@$tr_id?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;Back</a>
			<br/>
			<br/>
			<form method="post" action="?action=store&tr_id=<?=@$tr_id?>" class="form-horizontal" id="transactionForm" autocomplete="off">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Date Record <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
							  </div>
								<input type="text" class="form-control datepicker" placeholder="record date" name="td_date" id="td_date" data-toggle="datetimepicker" data-target="#td_date" required>
						  </div>
						</div>
						<div class="form-group">
							<label>Document<small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">description</i></span>
							  </div>
								<select class="custom-select" name="td_document_id">
									<option>-- Please Choose --</option>
									<?=$documents?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Control By <small>*</small></label>
	          	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">face</i></span>
							  </div>
								<select class="custom-select" name="td_control_by">
									<option>-- Please Choose --</option>
									<?=$employees?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Approve By <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">face</i></span>
							  </div>
								<select class="custom-select" name="td_approve_by">
									<option>-- Please Choose --</option>
									<?=$employees?>
								</select>
							</div>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>Received Status <small>*</small></label>
            	<div class="input-group">
							  <div class="input-group-prepend">
							    <span class="input-group-text"><i class="material-icons">assignment_turned_in</i></span>
							  </div>
								<select class="custom-select" name="td_status" id="td_status">
									<option value="">-- Please Choose --</option>
									<option value="0">Not Received</option>
									<option value="2">Received</option>
									<option value="1">Problem</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label>Note *</label>
							<textarea class="form-control" placeholder="note" style="height: 210px;" name="td_description"><?= @$td_description ?></textarea>
						</div>
					</div>
					<div class="col-sm-12">
						<br/>
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
	$('#td_status').change(function () {
		switch($(this).val()) {
		  case '0':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-times-circle text-danger"></i>');
		    break;
		  case '1':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-exclamation-triangle text-warning"></i>');
		    break;
		  case '2':
				$(this).prev().find('.input-group-text').html('<i class="fa fa-check text-success"></i>');
		    break;
		  default:
				$(this).prev().find('.input-group-text').html('<i class="material-icons">assignment_turned_in</i>');
		}
	});
</script>