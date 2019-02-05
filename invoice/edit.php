<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="invoiceForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>កាលបរិច្ឆេទ​ <small> *</small></label>
							<input type="text" class="form-control datepicker" placeholder="Select Date" name="inv_date"  id="daterecord" data-toggle="datetimepicker" data-target="#daterecord" value="<?=date('d/m/y', strtotime($inv_date));?>" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label>ឈ្មោះអតិថិជន</label>
							<input type="text" class="form-control" placeholder="customer name" name="inv_customer_name" value="<?=$inv_customer?>">
						</div>
						<div class="form-group">
							<label>ឈ្មោះក្រុមហ៊ុនជាភាសាខ្មែរ <small>*</small></label>
							<input type="text" class="form-control" placeholder="company khmer name" name="inv_company_name_kh" value="<?=$inv_company_name_kh?>" required>
						</div>
						<div class="form-group">
							<label>ឈ្មោះក្រុមហ៊ុនជាភាសាអង់គ្លេស <small>*</small></label>
							<input type="text" class="form-control" placeholder="company english name" name="inv_company_name_en" value="<?=$inv_company_name_en?>" required>
						</div>
						<div class="form-group">
							<label>លេខអត្តសញ្ញាណកម្ម</label>
							<input type="text" class="form-control" placeholder="company vat tin" name="inv_company_vat" value="<?=$inv_company_vat?>">
						</div>
						<div class="form-group">
							<label>លេខទូរស័ព្ទ</label>
							<input type="text" class="form-control" placeholder="company phone" name="inv_company_phone" value="<?=$inv_company_phone?>">
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>លេខវិក្កយបត្រ <small>*</small></label>
							<input type="text" class="form-control" placeholder="invoice number" name="inv_number" value="<?=$inv_number?>" required>
						</div>
						<div class="form-group">
							<label>ពន្ធអាករ VAT %​ <small>*</small></label>
							<input type="number" min="1" class="form-control" placeholder="សូមវាយបញ្ចូលជាលេខ" name="inv_vat_percentage" id="inv_vat_percentage" value="<?=$inv_vat_percentage?>" required>
						</div>
						<div class="form-group">
							<label>អ៊ីមែល</label>
							<input type="text" class="form-control" placeholder="company email" name="inv_company_email" value="<?=$inv_company_email?>">
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋានភាសខ្មែរ</label>
							<input type="text" class="form-control" placeholder="company english address" name="inv_company_address_kh" value="<?=$inv_company_address_kh?>">
						</div>
						<div class="form-group">
							<label>អាសយដ្ឋានភាសអង់គ្លេស</label>
							<input type="text" class="form-control" placeholder="company khmer address" name="inv_company_address_en" value="<?=$inv_company_address_en?>">
						</div>
						<div class="form-group">
							<label>ពិពណ៌នា</label>
							<textarea class="form-control" placeholder="ពិពណ៌នា" name="inv_description" style="height: 123px;"><?=$inv_description?></textarea>
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
	$("#inv_qty, #inv_unit_price, #inv_vat").keyup(function() {
		var qty=document.getElementById('inv_qty').value;
		qty=(qty?qty:0);
		var unitprice=document.getElementById('inv_unit_price').value;
		unitprice=(unitprice?unitprice:0);
		var vat=document.getElementById('inv_vat').value;
		vat=(vat?vat:0);

		total=qty*unitprice;
		document.getElementById('inv_sub_total').value=total.toFixed(2);

		grand_total=total+(total*vat/100);
		document.getElementById('inv_grand_total').value=grand_total.toFixed(2);
	});	
	md.initFormExtendedDatetimepickers();
</script>