
<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<div class="vs-datatable mb-2">
				<br/>
				<table id="datatables" class="table table-hover table-striped" width="100%">
					<thead>
						<tr>
							<th>N&deg;</th>
							<th>Position Name</th>
							<th>Description</th>
							<th class="text-center">Users</th>
							<th class="text-center">Permission</th>
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
<!-- start main modal iframe -->
<div class="modal fade" id="main_modal">
	<div class="modal-dialog" style="min-width: 88%; margin-top: 50px;">
		<div class="modal-content">
			<iframe id="main_frame" frameborder="0" style="width: 100%; min-height: 650px;"></iframe>
		</div>
	</div>
</div>
<script type="text/javascript">
	function set_frame_url(url){
		document.getElementById('main_frame').src='set_permission.php?parent_id='+url;
	}
</script>
<!-- end main modal iframe -->
<script>
	$(document).ready(function() {

		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
				[10, 25, 50, -1],
				[10, 25, 50, "All"]
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search records",
			}
		});

		
	});
</script>