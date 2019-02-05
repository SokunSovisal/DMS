<?php include('../layout/comps/modalDelete.php'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?=@ERROR?>
			<?php @$_SESSION['error'] = ''; ?>
			<?=@SUCCESS?>
			<?php @$_SESSION['success'] = ''; ?>
			<?= @$btnadd ?>
			<br/>
			<br/>
			<div class="vs-datatable">
				<table class="table table-hover table-striped datatables" width="100%">
					<thead>
						<tr>
							<th width="5%" class="disabled-sorting text-center">ល.រ</th>
							<th>ឈ្មោះ</th>
							<th>បរិយាយ</th>
							<th>ថ្ងៃបង្កើត</th>
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

		$('.datatables').DataTable({
		  "language": {
		    "decimal":        "",
		    "emptyTable":     "ពុំមានទិន្នន័យឡើយ",
		    "info":           "បង្ហាញ _START_ ដល់ _END_ នៃ _TOTAL_ ជួរ",
		    "infoEmpty":      "បង្ហាញ 0 ដល់ 0 នៃ 0 ជួរ",
		    "infoFiltered":   "(filtered ពី _MAX_ សរុប ជួរ)",
		    "infoPostFix":    "",
		    "thousands":      ",",
		    "lengthMenu":     "បង្ហាញ _MENU_ ជួរ",
		    "loadingRecords": "កំពុងដំណើរការ...",
		    "processing":     "កំពុងដំណើរការ...",
		    "search":         "ស្វែងរក:",
		    "zeroRecords":    "ពុំមានទិន្នន័យឡើយ",
		    "paginate": {
		        "first":      "ដំបូង",
		        "last":       "ចុងក្រោយ",
		        "next":       "បន្ទាប់",
		        "previous":   "ថយ"
		    },
		    "aria": {
		        "sortAscending":  ": activate to sort column ascending",
		        "sortDescending": ": activate to sort column descending"
		    }
		  }
		});
		$('#password_submit').click( function () {
			var id = $('#getid').val();
			window.location.replace("?action=delete&id="+id+"<?=$sub_s_id?>");
		});

		
	});
</script>