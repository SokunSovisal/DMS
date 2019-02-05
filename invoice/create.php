<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="transactionForm" autocomplete="off">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>កាលបរិច្ឆេទ​ <small> *</small></label>
							<input type="text" class="form-control datepicker" placeholder="Select Date" name="inv_date"  id="daterecord" data-toggle="datetimepicker" data-target="#daterecord" value="<?=date('d/m/y');?>" required>
						</div>
						<div class="form-group">
							<label>ឈ្មោះអតិថិជន</label>
							<input type="text" class="form-control" placeholder="customer name" name="inv_customer_name">
						</div>
						<div class="form-group">
							<label>ក្រុមហ៊ុន <small> *</small></label>
							<select class="custom-select" name="inv_company_id" id="inv_company_id">
								<option value="">-- ជ្រើសរើស --</option>
								<?= $companies ?>
							</select>
						</div>
						<div class="form-group">
							<label>ឈ្មោះក្រុមហ៊ុនជាភាសាខ្មែរ <small>*</small></label>
							<input type="text" class="form-control" placeholder="company khmer name" name="inv_company_name_kh" required>
						</div>
						<div class="form-group">
							<label>ឈ្មោះក្រុមហ៊ុនជាភាសាអង់គ្លេស <small>*</small></label>
							<input type="text" class="form-control" placeholder="company english name" name="inv_company_name_en" required>
						</div>
						<div class="form-group">
							<label>លេខអត្តសញ្ញាណកម្ម</label>
							<input type="text" class="form-control" placeholder="company vat tin" name="inv_company_vat">
						</div>
						<div class="form-group">
							<label>លេខទូរស័ព្ទ</label>
							<input type="text" class="form-control" placeholder="company phone" name="inv_company_phone">
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>លេខវិក្កយបត្រ <small>*</small></label>
							<input type="text" class="form-control" placeholder="invoice number" name="inv_number" value="<?=$inv_number?>" required>
						</div>
						<div class="form-group">
							<label>អ៊ីមែល</label>
							<input type="text" class="form-control" placeholder="company email" name="inv_company_email">
						</div>
						<div class="form-group">
							<label>ពន្ធអាករ VAT %​ <small>*</small></label>
							<input type="number" min="1" value="10" class="form-control" placeholder="សូមវាយបញ្ចូលជាលេខ" name="inv_vat_percentage" id="inv_vat_percentage" required>
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋានភាសខ្មែរ</label>
							<input type="text" class="form-control" placeholder="company english address" name="inv_company_address_kh">
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋានភាសអង់គ្លេស</label>
							<input type="text" class="form-control" placeholder="company khmer address" name="inv_company_address_en">
						</div>
						<div class="form-group">
							<label>ពិពណ៌នា</label>
							<textarea class="form-control" placeholder="ពិពណ៌នា" name="inv_description" style="height: 123px;"></textarea>
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

	$('#inv_company_id').change(function () {
		
    $.ajax({url: "getcompany.php?co_id="+$(this).val(),
    success: function(result){ 
      // alert(result);
      var company = JSON.parse(result);
      $('input[name=inv_company_name_kh]').val(company.co_name_kh);
      $('input[name=inv_company_name_en]').val(company.co_name_en);
      $('input[name=inv_company_vat]').val(company.co_vat_no);
      $('input[name=inv_company_phone]').val(company.co_phone);
      $('input[name=inv_company_email]').val(company.co_email);
      $('input[name=inv_company_address_kh]').val(company.co_address);
    }});

	});

</script>