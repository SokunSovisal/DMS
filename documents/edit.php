<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="serviceForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Document Name <small>*</small></label>
							<input type="text" class="form-control form-label1" name="doc_name" value="<?= @$doc_name ?>">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" rows="4" name="doc_description" id="myeditor"><?= @$doc_description ?></textarea>
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