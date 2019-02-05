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
							<th width="5%" class="disabled-sorting text-center">ល.រ</th>
							<th>កាបរិច្ឆេទ</th>
							<th>ឈ្មោះក្រុមហ៊ុន</th>
							<th>ប្រភេទសាវាកម្ម</th>
							<th>គ្រប់គ្រងដោយ</th>
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
	$(document).ready(function() {
		$('#password_submit').click( function () {
			var id = $('#getid').val();
			window.location.replace("?action=delete&id="+id);
		});

	});
</script>