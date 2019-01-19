<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="userForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Record Date <small>*</small></label>
							<input type="text" class="datepicker form-control" placeholder="Record Date" name="tr_date" value="<?= date('M/d/Y', strtotime(@$tr_date)) ?>" id="daterecord" data-toggle="datetimepicker" data-target="#daterecord" required>
						</div>
						<div class="form-group">
							<label>Company Name <small>*</small></label>
							<select class="form-control" name="tr_company" required>
								<option value="">Choose Company</option>
								<?=$companies?>
							</select>
						</div>
						<div class="form-group">
							<label>Service <small>*</small></label>
							<select class="form-control" name="tr_service" required>
								<option value="">Choose Service</option>
								<?=$services?>
							</select>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>Control By <small>*</small></label>
							<select class="form-control" name="tr_em_id" required>
								<option value="">Select Employee</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="Description" style="height: 125px;" name="tr_description"><?= @$tr_description ?></textarea>
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