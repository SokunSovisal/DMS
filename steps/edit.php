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
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Step Name <small>*</small></label>
									<input type="text" class="form-control" placeholder="Step name" name="step_name" value="<?= @$step_name?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Service Type <small>*</small></label>
									<select class="custom-select" name="step_service" required>
										<option value="">Choose Service</option>
										<?=$services?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" rows="4" placeholder="description" name="step_description" id="myeditor"><?= @$step_description?></textarea>
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