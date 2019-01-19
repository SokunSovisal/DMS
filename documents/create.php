

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="serviceForm">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Document Name <small>*</small></label>
							<input type="text" class="form-control" placeholder="document name" name="doc_name">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" rows="4" placeholder="description" name="doc_description" id="myeditor"></textarea>
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