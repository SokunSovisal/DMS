<style type="text/css">
	tbody tr{
		cursor: pointer;
	}
</style>

<?php include('../layout/comps/modalDelete.php'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/addNew.php'); ?>
			<br/>
			<br/>
			<div class="vs-datatable">
				<table id="datatables" class="table table-hover table-striped" width="100%">
					<thead>
						<tr>
							<th width="5%" class="disabled-sorting text-center">N&deg;</th>
							<th>ឈ្មោះ</th>
							<th>ប្រភេទ</th>
							<th>ថ្ងៃចាប់ផ្ដើម</th>
							<th>លេខទូរស័ព្ទ</th>
							<th>គ្រប់គ្រងដោយ</th>
						</tr>
					</thead>
					<tbody>
						<?= @$tbody ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="transactionModal" tabindex="-1" role="dialog" aria-labelledby="transactionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="min-width: 80%; margin-top: 50px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="transactionModalLabel">ជ្រើសរើសប្រតិបត្តិការ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<a href="#" class="btn btn-block btn-success" id="addTransactoin"><i class="fa fa-plus"></i> &nbsp;&nbsp;បង្កើតប្រតិបត្តិការថ្មី</a>
				<div class="vs-datatable">
					<table id="datatables" class="table table-hover table-striped" width="100%">
						<thead>
							<tr>
								<th width="5%" class="disabled-sorting text-center">ល.រ</th>
								<th>ឈ្មោះ</th>
								<th class="disabled-sorting text-right">សកម្មភាព</th>
							</tr>
						</thead>
						<tbody class="tr_body">

						</tbody>
					</table>
				</div>
      </div>
    </div>
  </div>
</div>	

<script>
	function getCid(id) {
		$('#addTransactoin').attr('href','?action=addtransaction&co_id='+id);
    $.ajax({url: "ajaxgettransaction.php?co_id="+id,
	  	success: function(result){
	  		$('.tr_body').html(result);
    }});
	}
	
	function transaction_detail(id) {
		window.location.replace("?action=detail&tr_id="+id);
	}

	$(document).ready(function() {
		$('#password_submit').click( function () {
			var id = $('#getid').val();
			window.location.replace("?action=deletetransaction&tr_id="+id);
		});
	});

</script>