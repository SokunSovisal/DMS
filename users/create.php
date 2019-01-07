

<div class="row">
	<div class="col-sm-12">
		<div class="card ">
			<div class="card-header card-header-info card-header-text">
				<div class="card-icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<h4 class="card-title ">Create new user</h4>
			</div>
			<div class="card-body ">
				<?php include('../layout/comps/back.php'); ?>
				<form method="post" action="?action=store" class="form-horizontal" id="userForm">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-2 col-form-label">User Name</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="u_name" placeholder="username">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row mt-1">
								<label class="col-sm-2 col-form-label">Gender</label>
								<div class="col-sm-10">
									<select class="selectpicker" data-size="8" name="u_gender" data-style="btn btn-primary" title="Choose Gender">
										<option value="1">Male</option>
										<option value="2">Female</option>
										<option value="3">Other</option>
									</select>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row">
								<label class="col-sm-2 col-form-label">Phone</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="u_phone" placeholder="phone">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
						</div> <!-- /.col -->
						

						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-2 col-form-label">E-mail</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="email" class="form-control" name="email" placeholder="email" required="true" aria-required="true" autocomplete="off">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row">
								<label class="col-sm-2 col-form-label">Password</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="password" class="form-control" minlength="6" id="password" required="true" name="password" autocomplete="off">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row">
								<label class="col-sm-2 col-form-label">Confirm-Password</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="password" class="form-control" required="true" equalTo="#password" name="password_confirmation" autocomplete="off">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
						</div> <!-- /.col -->

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
</div>

<script>
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
		setFormValidation('#userForm');
	});
</script>