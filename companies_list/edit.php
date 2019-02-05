<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="userForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ឈ្មោះជាភាសាខ្មែរ <small>*</small></label>
							<input type="text" class="form-control" name="co_name_kh" placeholder="company name" value="<?= @$co_name_kh ?>" required />
						</div>
						<div class="form-group">
							<label>ឈ្មោះជាភាសាអង់គ្លេស <small>*</small></label>
							<input type="text" class="form-control" name="co_name_en" placeholder="company name" value="<?= @$co_name_en ?>" required />
						</div>
						<div class="form-group">
							<label>ប្រភេទក្រុមហ៊ុន</label>
							<input type="text" class="form-control" placeholder="company type" name="co_type" value="<?= @$co_type ?>">
						</div>
						<div class="form-group">
							<label>លេខអត្តសញ្ញាណកម្មសារពើពន្ធ</label>
							<input type="text" class="form-control" name="co_vat_no" placeholder="company type" value="<?= @$co_vat_no ?>" />
						</div>
						<div class="form-group">
							<label>លេខទូរស័ព្ទ</label>
							<input type="text" class="form-control" placeholder="phone" name="co_phone" value="<?= @$co_phone ?>">
						</div>
					</div> <!-- /.col -->


					<div class="col-sm-6">
						<div class="form-group">
							<label>ថ្ងៃចុះឈ្មោះ <small>*</small></label>
							<input type="text" class="form-control datepicker" placeholder="register date" name="co_register_date" value="<?= date('m/d/Y', strtotime(@$co_register_date)) ?>" id="registerDate" data-toggle="datetimepicker" data-target="#registerDate" required>
						</div>
						<div class="form-group">
							<label>គ្រប់គ្រងដោយ <small>*</small></label>
							<select class="form-control" name="co_em_id" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>អ៊ីមែល</label>
							<input type="email" class="form-control" placeholder="email" name="co_email" value="<?= @$co_email ?>">
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋាន</label>
							<input type="text" class="form-control" placeholder="address" name="co_address" value="<?= @$co_address ?>">
						</div>
						<div class="form-group">
							<label>បរិយាយ</label>
							<textarea class="form-control form-label0" placeholder="Description" rows="1" name="co_description"><?= @$co_description ?></textarea>
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