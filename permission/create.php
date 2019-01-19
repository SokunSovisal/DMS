

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
							<div class="form-group">
                <input type="text" class="form-control" placeholder="User Name" name="u_name">
              </div>
							<div class="form-group">
								<select class="form-control selectpicker" data-style="text-light" title="Title">
									<option value="1">Male</option>
									<option value="2">Female</option>
									<option value="3">Other</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" placeholder="Phone" class="form-control" name="u_phone" >
							</div>
						</div> <!-- /.col -->
						

						<div class="col-sm-6">
							<div class="form-group">
                <input type="email" class="form-control" placeholder="E-mail"  name="email">
              </div>

							<div class="form-group">
                <input type="password" class="form-control" placeholder="Password" id="password" minlength="6" name="password" required="true" >
              </div>

              <div class="form-group">
                <input type="password" class="form-control"  placeholder="Confirm-Password" equalTo="#password" name="password_confirmation" required="true" >
              </div>
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