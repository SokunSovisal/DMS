<?php include('../layout/comps/modalDelete.php'); ?>

<!-- start main modal iframe -->
<div class="modal fade" id="main_modal">
	<div class="modal-dialog" style="min-width: 88%; margin-top: 50px;">
		<div class="modal-content">
			<iframe id="main_frame" frameborder="0" style="width: 100%; min-height: 670px;"></iframe>
		</div>
	</div>
</div>

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
							<th width="5%" class="disabled-sorting text-center">ល.រ</th>
							<th>ឈ្មោះសេវាកម្ម</th>
							<th>តម្លៃ</th>
							<th>ពិពណ៌នា</th>
							<th>ឯកសារតម្រូវ</th>
							<th>ជំហាន</th>
							<th width="10%" class="disabled-sorting text-right">សកម្មភាព</th>
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

<script>

	function set_frame_doc(url){
		document.getElementById('main_frame').src='../documents/index.php?s_id='+url;
	}

	function set_frame_step(url){
		document.getElementById('main_frame').src='../steps/index.php?s_id='+url;
	}

	$(document).ready(function() {
		$('#password_submit').click( function () {
			var id = $('#getid').val();
			window.location.replace("?action=delete&id="+id);
		});

		
	});
</script>