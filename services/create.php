

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="serviceForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Service Name <small>*</small></label>
							<input type="text" class="form-control" placeholder="service name" name="s_name">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Price <small>*</small></label>
							<input type="number" class="form-control" placeholder="price" name="s_price">
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-12">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="description" rows="4" name="s_description" id="myeditor"></textarea>
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