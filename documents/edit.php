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
			<form method="post" action="?action=update<?=$sub_s_id?>" class="form-horizontal" id="serviceForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ឈ្មោះ <small>*</small></label>
							<input type="text" class="form-control form-label1" name="doc_name" value="<?= @$doc_name ?>">
						</div>
						<div class="form-group">
							<label>សេវាកម្ម <small>*</small></label>
							<select class="custom-select" name="doc_service_id" id="doc_service_id" required>
								<option value="">-- សូមជ្រើសរើ --</option>
								<?= $services ?>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>បរិយាយ</label>
							<textarea class="form-control" style="height: 124px" name="doc_description" id="myeditor"><?= @$doc_description ?></textarea>
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