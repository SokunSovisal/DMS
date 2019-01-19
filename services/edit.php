<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="serviceForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Service Name <small>*</small></label>
							<input type="text" class="form-control" placeholder="service name" name="s_name" value="<?= @$s_name ?>">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Service Name <small>*</small></label>
							<input type="number" class="form-control" placeholder="price" name="s_price" value="<?= @$s_price ?>">
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-12">
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="description" rows="4" name="s_description" id="myeditor"><?= @$s_description ?></textarea>
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