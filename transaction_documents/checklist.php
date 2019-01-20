<?=@ERROR?>
<?php @$_SESSION['error'] = ''; ?>
<div class="row">
	<div class="col-sm-12">
		<!--      Wizard container        -->
	  <div class="wizard-container">
	    <div class="card card-wizard" data-color="blue" id="wizardProfile">
				<form action="?action=checklist&tr_id=<?=@$tr_id?>" method="post">
	        <!-- You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue" -->
	        <div class="card-header text-center">
	          <h3 class="card-title mt-2 roboto_r">
	            REGISTER CHECK LIST
	          </h3>
	          <!-- <h5 class="card-description">This information will let us know more about you.</h5> -->
	        </div>
	        <div class="wizard-navigation">
	          <ul class="nav nav-pills">
	            <li class="nav-item">
	              <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
	                Responsible
	              </a>
	            </li>
	            <li class="nav-item">
	              <a class="nav-link" href="#account" data-toggle="tab" role="tab">
	                Check List
	              </a>
	            </li>
	          </ul>
	        </div>
	        <div class="card-body">
	          <div class="tab-content">
	            <div class="tab-pane active" id="about">
	              <h5 class="info-text">Let's start with the basic information (Who will responsible for this transaction?)</h5>
	              <div class="row justify-content-center">

	                <div class="col-sm-6">
	                	<div class="responsible-section text-center">
	                		<i class="material-icons text-info">how_to_reg</i>
	                	</div>
	                </div>

	                <div class="col-sm-6">
	                	<div class="form-group">
	                		<label>Date Record </label>
		                	<div class="input-group">
											  <div class="input-group-prepend">
											    <span class="input-group-text"><i class="material-icons">calendar_today</i></span>
											  </div>
												<input type="text" class="form-control datepicker" placeholder="register date" name="td_date" value="<?= date('m/d/Y', strtotime(@$tr_date)) ?>" id="td_date" data-toggle="datetimepicker" data-target="#td_date" required>
											</div>
										</div>
	                	<div class="form-group">
	                		<label>Control By</label>
		                	<div class="input-group">
											  <div class="input-group-prepend">
											    <span class="input-group-text"><i class="material-icons">face</i></span>
											  </div>
											  <select class="custom-select" name="td_control_by" id="td_control_by" required>
											  	<option value="">-- Please Choose --</option>
											  	<?= @$employees ?>
											  </select>
											</div>
										</div>
	                	<div class="form-group">
	                		<label>Approved By</label>
		                	<div class="input-group mb-3">
											  <div class="input-group-prepend">
											    <span class="input-group-text"><i class="material-icons">face</i></span>
											  </div>
											  <select class="custom-select" name="td_approve_by" id="td_approve_by" required>
											  	<option value="">-- Please Choose --</option>
											  	<?= @$employees ?>
											  </select>
											</div>
	                	</div>
	                </div>
	            	</div>
	            </div>
	            <div class="tab-pane" id="account">
	              <h5 class="info-text"> Select require documents </h5>
	              <div class="table-section" style="overflow-y: auto; max-height: 255px;">
									<table id="datatables" class="table table-hover table-striped">
										<thead>
											<tr>
												<th>N&deg;</th>
												<th>Document Name</th>
												<th width="15%">SELECT</th>
											</tr>
										</thead>
										<tbody>
											<?=$tbody?>
										</tbody>
									</table>
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
	  <br/>
	</div>
</div>
<script type="text/javascript">
  $("input.doc_check").change(function () {
  	if ($(this).prop("checked")) {
  		$(this).nextAll('.d_id').removeAttr('disabled');
  	}else{
  		$(this).nextAll('.d_id').attr('disabled','disabled');
  	}
  });

  $(document).ready(function() {
    // Initialise the wizard
    md.initMaterialWizard();
    setTimeout(function() {
      $('.card.card-wizard').addClass('active');
    }, 600);
  });

</script>