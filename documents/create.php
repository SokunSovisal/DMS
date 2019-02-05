

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?=@ERROR?>
			<?php @$_SESSION['error'] = ''; ?>
			<?=@SUCCESS?>
			<?php @$_SESSION['success'] = ''; ?>
			<?= $btnback ?>
			<br/>
			<br/>
			<form method="post" action="?action=store<?=$sub_s_id?>" class="form-horizontal" id="serviceForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ឈ្មោះ <small>*</small></label>
							<input type="text" class="form-control" placeholder="document name" name="doc_name" required>
						</div>
						<div class="form-group">
							<label>សេវាកម្ម <small>*</small></label>
							<select class="custom-select" name="doc_service_id" id="doc_service_id" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?= $services ?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>បរិយាយ</label>
							<textarea class="form-control" style="height: 123px" placeholder="description" name="doc_description" id="myeditor"></textarea>
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