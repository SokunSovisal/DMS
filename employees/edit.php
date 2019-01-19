<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="employeeForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Employee Name <small>*</small></label>
							<input type="text" class="form-control" placeholder="Employee Name" name="em_name" required="required" value="<?= @$em_name ?>">
						</div>
						<div class="form-group">
							<label>Gender <small>*</small></label>
							<select class="form-control" name="em_gender">
								<option value="">Please Choose</option>
								<option value="1" <?= ((@$em_gender==1)?'selected':'') ?>>Male</option>
								<option value="2" <?= ((@$em_gender==2)?'selected':'') ?>>Female</option>
								<option value="3" <?= ((@$em_gender==3)?'selected':'') ?>>Other</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone <small>*</small></label>
							<input type="text" class="form-control" placeholder="Phone" name="em_phone" required="required" value="<?= @$em_phone ?>">
						</div>
						<div class="form-group">
							<label>E-mail <small>*</small></label>
							<input type="email" class="form-control" placeholder="Email" name="em_email" required="required" value="<?= @$em_email ?>">
						</div>
						<div class="form-group">
							<label>Position <small>*</small></label>
							<input type="text" class="form-control" placeholder="Position" name="em_position" required="required" value="<?= @$em_position ?>">
						</div>
					</div> <!-- /.col -->


					<div class="col-sm-6">
						<div class="form-group md-form">
							<label>Join Date <small>*</small></label>
							<input type="text" class="form-control datepicker" placeholder="Joining Date" name="em_join_date" value="<?= date('M/d/Y', strtotime(@$em_join_date)) ?>" id="em_join_date" data-toggle="datetimepicker" data-target="#em_join_date" required>
						</div>
						<div class="form-group">
							<label>Employee Status <small>*</small></label>
							<select class="form-control" name="em_status">
								<option value="">Please Choose</option>
								<option value="1" <?= ((@$em_status==1)?'selected':'') ?>>Active</option>
								<option value="2" <?= ((@$em_status==2)?'selected':'') ?>>Inactive</option>
							</select>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="Description" style="height: 210px;" name="em_description"><?= @$em_description ?></textarea>
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