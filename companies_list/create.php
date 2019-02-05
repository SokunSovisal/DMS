

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br><br>
			<form method="post" action="?action=store" class="form-horizontal" id="companyForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>ឈ្មោះជាភាសាខ្មែរ <small>*</small></label>
							<input type="text" class="form-control" name="co_name_kh" placeholder="company name" required />
						</div>
						<div class="form-group">
							<label>ឈ្មោះជាភាសាអង់គ្លេស <small>*</small></label>
							<input type="text" class="form-control" name="co_name_en" placeholder="company name" required />
						</div>
						<div class="form-group">
							<label>ប្រភេទក្រុមហ៊ុន <small>*</small></label>
							<input type="text" class="form-control" name="co_type" placeholder="company type" required />
						</div>
						<div class="form-group">
							<label>លេខអត្តសញ្ញាណកម្មសារពើពន្ធ <small>*</small></label>
							<input type="text" class="form-control" name="co_vat_no" placeholder="company type" required />
						</div>
						<div class="form-group">
							<label>លេខទូរស័ព្ទ <small>*</small></label>
							<input type="text" class="form-control" name="co_phone" placeholder="phone" required />
						</div>
					</div> <!-- /.col -->


					<div class="col-sm-6">
						<div class="form-group">
							<label>ថ្ងៃចុះឈ្មោះ <small>*</small></label>
							<input type="text" class="form-control datepicker" name="co_register_date" id="registerDate" data-toggle="datetimepicker" data-target="#registerDate" placeholder="register date" required>
						</div>
						<div class="form-group">
							<label>គ្រប់គ្រងដោយ <small>*</small></label>
							<select class="form-control" name="co_em_id" placeholder="control by" required>
								<option value="">-- សូមជ្រើសរើស --</option>
								<?=$employees?>
							</select>
						</div>
						<div class="form-group">
							<label>អ៊ីមែល <small>*</small></label>
							<input type="email" class="form-control" name="co_email" placeholder="email" required />
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋាន</label>
							<input type="text" class="form-control" name="co_address" placeholder="address"/>
						</div>
						<div class="form-group">
							<label>បិរយាយ</label>
							<textarea class="form-control" rows="1" placeholder="description" name="co_description"></textarea>
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