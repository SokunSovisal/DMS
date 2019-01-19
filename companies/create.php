

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br><br>
			<form method="post" action="?action=store" class="form-horizontal" id="companyForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Company Name <small>*</small></label>
							<input type="text" class="form-control" name="co_name" placeholder="company name" required />
						</div>
						<div class="form-group">
							<label>Company Type <small>*</small></label>
							<input type="text" class="form-control" name="co_type" placeholder="company type" required />
						</div>
						<div class="form-group">
							<label>Phone <small>*</small></label>
							<input type="text" class="form-control" name="co_phone" placeholder="phone" required />
						</div>
						<div class="form-group">
							<label>E-mail <small>*</small></label>
							<input type="email" class="form-control" name="co_email" placeholder="email" required />
						</div>
						<div class="form-group">
							<label>Address</label>
							<input type="text" class="form-control" name="co_address" placeholder="address"/>
						</div>
					</div> <!-- /.col -->


					<div class="col-sm-6">
						<div class="form-group">
							<label>Register Date <small>*</small></label>
							<input type="text" class="form-control datepicker" name="co_register_date" id="registerDate" data-toggle="datetimepicker" data-target="#registerDate" placeholder="register date" required>
						</div>
						<div class="form-group">
							<label>Control By <small>*</small></label>
							<select class="form-control" name="co_em_id" placeholder="control by" required>
								<option>Choose Employee</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>Status <small>*</small></label>
							<select class="form-control" name="co_status" placeholder="status" required>
								<option value=""> Select Status</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
    					</select>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" style="height: 125px;" placeholder="description" name="co_description"></textarea>
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