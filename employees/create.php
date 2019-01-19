<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="employeeForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Employee Name <small>*</small></label>
							<input type="text" class="form-control" placeholder="employee name" name="em_name" required />
						</div>
						<div class="form-group">
							<label>Gender <small>*</small></label>
							<select class="form-control" name="em_gender">
								<option>Choose Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Other">Other</option>
							</select>
						</div>
						<div class="form-group">
							<label>Phone <small>*</small></label>
							<input type="text" class="form-control" placeholder="Phone" name="em_phone" required />
						</div>
						<div class="form-group">
							<label>E-mail <small>*</small></label>
							<input type="email" class="form-control" placeholder="Email" name="em_email" required />
						</div>
						<div class="form-group">
							<label>Position <small>*</small></label>
							<input type="text" class="form-control" placeholder="Position" name="em_position" required />
						</div>
					</div> <!-- /.col -->


					<div class="col-sm-6">
						<div class="form-group md-form">
							<label>Join Date <small>*</small></label>
							<input type="text" class="form-control datepicker" placeholder="Joining Date" name="em_join_date" id="em_join_date" data-toggle="datetimepicker" data-target="#em_join_date" required />
						</div>
						<div class="form-group">
							<label>Employee Status <small>*</small></label>
							<select class="form-control" name="em_status">
								<option value="">Please Choose</option>
								<option value="1">Active</option>
								<option value="2">Inactive</option>
							</select>
						</div>
						<div class="form-group">
							<label>Description <small>*</small></label>
							<textarea class="form-control" placeholder="Description" style="height: 210px;" name="em_description"></textarea>
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

	// This is Validation script
	function setFormValidation(id) {
		$(id).validate({
			highlight: function(element) {
				$(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
			},
			success: function(element) {
				$(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
			},
			errorPlacement: function(error, element) {
				$(element).closest('.form-group').append(error);
			},
		});
	}

	$(document).ready(function() {
		setFormValidation('#employeeForm');
	});

	md.initFormExtendedDatetimepickers();
</script>