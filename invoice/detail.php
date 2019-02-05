<div class="row">
	<div class="col-sm-12">
			<?php include('../layout/comps/back.php'); ?>
			<div class="float-right">
				<a href="?action=print&inv_id=<?=$_GET['inv_id']?>&detail=1" class="btn btn-info"><i class="fa fa-print"></i> &nbsp;&nbsp;បោះពុម្ភ</a>
			</div>
			<br/>
			<h3 class="mt-3">សេវាកម្មលម្អិតក្នុងវិក្កយប័ត្រលេខ: <span style="color: red;" class="roboto_r">G.GGO-TR-<?=$inv_number?></span></h3>
			<br/>

		<?= $invoice_details ?>

		<button type="button" class="btn btn-success" id="show-add"><i class="fa fa-plus"></i> &nbsp;&nbsp; បន្ថែមសេវាកម្ម</button>

		<div class="bg-white-content sr-only" id="add-invoice-detail">
			<form method="post" action="?action=storedetail" class="form-horizontal" id="transactionForm" autocomplete="off">
				<input type="hidden" name="invd_invoice_id" value="<?= $_GET['inv_id'] ?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>សេវាកម្ម <small> *</small></label>
							<select class="custom-select" name="invd_service_id" id="invd_service_id">
								<option value="">-- ជ្រើសរើស --</option>
								<?= $services ?>
							</select>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>តម្លៃ/ឯកតា <small>*</small></label>
									<input type="number" min="1" class="form-control" id="invd_unit_price" placeholder="0.00" name="invd_unit_price" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>ចំនួន <small>*</small></label>
									<input type="number" min="1" class="form-control" placeholder="សូមវាយបញ្ចូលជាលេខ" name="invd_qty" id="invd_qty" value="1" required>
								</div>
							</div>
						</div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
						<div class="form-group">
							<label>ពិពណ៌នា</label>
							<textarea class="form-control" placeholder="ពិពណ៌នា" name="invd_description" style="height: 124px;"></textarea>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="submit-section float-right">
							<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;&nbsp;បន្ថែមថ្មី</button>
						</div>
					</div>
				</div> <!-- /.row -->
			</form>
		</div>
	</div>
</div>

<script>

	$('select[name=invd_service_id]').change(function () {
		if ($(this).val() != '') {
	    $.ajax({url: "getservice.php?s_id="+$(this).val(),
	    success: function(result){
	      var service = JSON.parse(result);
	      $('input[name=invd_unit_price]').val(service.s_price);
	    }});
		}else{
      $('input[name=invd_unit_price]').val('');
		}

	});

	$('#show-add').click( function () {
		$('#add-invoice-detail').removeClass('sr-only');
		$('#show-add').addClass('sr-only');
	});

</script>