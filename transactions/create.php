

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="transactionForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ការបរិច្ឆេទ <small>*</small></label>
							<input type="text" class="form-control datepicker" placeholder="record date" name="tr_date"  id="daterecord" data-toggle="datetimepicker" data-target="#daterecord" required>
						</div>
						<div class="form-group">
							<label>ឈ្មោះក្រុមហ៊ុន <small>*</small></label>
							<select class="form-control" name="tr_company" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?=$companies?>
							</select>
						</div>
						<div class="form-group">
							<label>សេវាកម្ម <small>*</small></label>
							<select class="form-control" name="tr_service" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?=$services?>
							</select>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>គ្រប់គ្រងដោយ <small>*</small></label>
							<select class="form-control" name="tr_em_id" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>បរិយាយ</label>
							<textarea class="form-control" placeholder="Description" style="height: 125px;" name="tr_description"></textarea>
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
	md.initFormExtendedDatetimepickers();
</script>