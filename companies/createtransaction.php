<div style="margin-top: -30px;">
	<a href="index.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;ត្រលប់ក្រោយ</a>

	<br>
	<br>
</div>
            
  <div class="bg-white-content">

		<form action="?action=storetransaction" method="post">
			<input type="hidden" value="<?= $_GET['co_id'] ?>" name="co_id">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>ថ្ងៃចុះឈ្មោះ <small>*</small></label>
						<input type="text" class="form-control datepicker" data-mask="99/99/9999" name="tr_date" id="tr_date" data-toggle="datetimepicker" data-target="#tr_date" placeholder="date record" required>
					</div>
	  		</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>គ្រប់គ្រងដោយ <small>*</small></label>
						<select class="form-control" name="tr_em_id" placeholder="control by" required>
							<option value="">-- សូមជ្រើសរើស --</option>
							<?=$employees?>
						</select>
					</div>
	  		</div>
				<div class="col-sm-12">
					<div class="form-group">
						<label>សេវាកម្ម</label>
				    <select name="tr_service" id="tr_service" class="custom-select">
				    	<option value="">-- សូមជ្រើសរើស --</option>
				    	<?= $services ?>
				    </select>
					</div>
	  		</div>
				<div class="col-sm-6">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>ល.រ</th>
								<th>ឈ្មោះ</th>
								<th width="20%">បានទទួល</th>
							</tr>
						</thead>
						<tbody id="checklist_tbody">
							
						</tbody>
					</table>
	  		</div>
				<div class="col-sm-6">
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>ល.រ</th>
								<th>ជំហាន</th>
								<th>បរិយាយ</th>
							</tr>
						</thead>
						<tbody id="step_tbody">
							
						</tbody>
					</table>
	  		</div>
				<div class="col-sm-12">
					<div class="float-right">
						<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> &nbsp;&nbsp;រក្សាទុក</button>
					</div>
	  		</div>
  		</div>
  	</form>
  </div>


<script>


  $(document).ready(function() {
	  // Initialise the wizard
	  md.initMaterialWizard();
	});


  $('#tr_service').change(function(){
  	var s_id = $(this).val();
  	if (s_id!='') {
	    $.ajax({url: "ajaxchecklist.php?s_id="+s_id,
		  	success: function(result){
		  		$('#checklist_tbody').html(result);
				  $("input.doc_check").change(function () {
				  	if ($(this).prop("checked")) {
				  		$(this).nextAll('.d_id').removeAttr('disabled');
				  	}else{
				  		$(this).nextAll('.d_id').attr('disabled','disabled');
				  	}
				  });
	    }});

	    $.ajax({url: "ajaxstep.php?s_id="+s_id,
		  	success: function(result){
		  		$('#step_tbody').html(result);
	    }});
  	}else{
  		$('#checklist_tbody').html('');
		  		$('#step_tbody').html('');
  	}
  });
  

</script>