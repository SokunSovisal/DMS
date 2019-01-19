

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="transactionForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Date Record <small>*</small></label>
							<input type="text" class="form-control datepicker" name="td_date" placeholder="date record" id="td_date" data-toggle="datetimepicker" data-target="#td_date" required>
						</div>
						<div class="form-group">
							<label>Document Name <small>*</small></label>
							<select class="form-control" name="d_id">
								<option> Choose Document</option>
								<?=$documents?>
							</select>
						</div>
						<div class="form-group">
							<label>Control By <small>*</small></label>
							<select class="form-control" name="em_id">
								<option> Choose Employee</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>Approve By <small>*</small></label>
							<select class="form-control" name="tr_em_id">
								<option> Select Employee</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>Description <small>*</small></label>
							<textarea class="form-control form-label" placeholder="description" rows="4" name="tr_description"></textarea>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group text-center">
							<h4 class="title">Select Document file <small>*</small></h4>
							<div class="fileinput fileinput-new text-center" data-provides="fileinput">
								<div class="fileinput-new thumbnail">
									<img src="<?=@BASE?>src/images/placeholder_img/placeholder_img.jpg" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail"></div>
								<div>
									<span class="btn btn-rose btn-round btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="td_file[]" multiple=""/>
									</span>
									<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
								</div>
							</div>
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