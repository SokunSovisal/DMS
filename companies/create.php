<div style="margin-top: -30px;">
	<a href="index.php" class="btn btn-danger"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp;ត្រលប់ក្រោយ</a>

	<br>
	<br>
</div>
<!--      Wizard container        -->
<div class="wizard-container">
  <div class="card card-wizard active" data-color="blue" id="wizardProfile">
		<form action="?action=store" method="post">
      <div class="card-header text-center">
        <h3 class="card-title mt-2 roboto_r">
          ចុះឈ្មោះក្រុមហ៊ុន
        </h3>
      </div>
      <div class="wizard-navigation">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="#company-info" data-toggle="tab" role="tab">
              ព័ត៌មានក្រុមហ៊ុន
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#service" data-toggle="tab" role="tab">
              សេវាកម្ម
            </a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content">
          <div class="tab-pane active" id="company-info">
            <h5 class="info-text">សូមបំពេញព័ត៌មានក្រុមហ៊ុន (អ្នកណាជាអ្នកទទួលខុសត្រូវ)</h5>
						<?=@ERROR?>
						<?php @$_SESSION['error'] = ''; ?>
						<?=@SUCCESS?>
						<?php @$_SESSION['success'] = ''; ?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>ឈ្មោះជាភាសាខ្មែរ <small>*</small></label>
									<input type="text" class="form-control" name="co_name_kh" placeholder="khmer name" required />
								</div>
								<div class="form-group">
									<label>ឈ្មោះជាភាសាអង់គ្លេស <small>*</small></label>
									<input type="text" class="form-control" name="co_name_en" placeholder="english name" required />
								</div>
								<div class="form-group">
									<label>ប្រភេទក្រុមហ៊ុន</label>
									<input type="text" class="form-control" name="co_type" placeholder="company type" />
								</div>
								<div class="form-group">
									<label>លេខអត្តសញ្ញាណកម្មសារពើពន្ធ</label>
									<input type="text" class="form-control" name="co_vat_no" placeholder="vat number" />
								</div>
								<div class="form-group">
									<label>លេខទូរស័ព្ទ</label>
									<input type="text" class="form-control" name="co_phone" placeholder="phone" />
								</div>
							</div> <!-- /.col -->


							<div class="col-sm-6">
								<div class="form-group">
									<label>ថ្ងៃចុះឈ្មោះ <small>*</small></label>
									<input type="text" class="form-control datepicker" data-mask="99/99/9999" name="co_register_date" id="registerDate" data-toggle="datetimepicker" data-target="#registerDate" placeholder="register date" required>
								</div>
								<div class="form-group">
									<label>គ្រប់គ្រងដោយ <small>*</small></label>
									<select class="form-control" name="co_em_id" placeholder="control by" required>
										<option value="">-- សូមជ្រើសរើស --</option>
										<?=$employees?>
									</select>
								</div>
								<div class="form-group">
									<label>អ៊ីមែល</label>
									<input type="email" class="form-control" name="co_email" placeholder="email" />
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
						</div> <!-- /.row -->
          </div>
          <div class="tab-pane" id="service">
            <h5 class="info-text"> ជ្រើសរើសសេវាកម្ម </h5>

            <select name="tr_service_id" id="tr_service_id" class="custom-select">
            	<option value="">-- សូមជ្រើសរើស --</option>
            	<?= $services ?>
            </select>
            <br/>
            <br/>
            <div class="table-section">
							<div class="row">
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
            	</div>
            </div>
					</div>
        </div>
      </div>
      <div class="card-footer">
        <div class="float-left">
          <input type="button" class="btn btn-previous btn-warning btn-wd disabled" name="previous" value="Previous">
        </div>
        <div class="float-right">
          <input type="button" class="btn btn-next btn-info btn-wd" name="next" value="Next">
          <input type="submit" class="btn btn-finish btn-success btn-wd" name="finish" value="Finish" style="display: none;">
        </div>
        <div class="clearfix"></div>
      </div>
    </form>
  </div>
</div>
<!-- wizard container -->


<script>


  $(document).ready(function() {
	  // Initialise the wizard
	  md.initMaterialWizard();
	});


  $('#tr_service_id').change(function(){
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