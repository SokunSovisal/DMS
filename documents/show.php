<!-- small modal -->
<div class="modal fade modal-mini modal-primary" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				ARE YOU SURE WANT TO DELETE THIS TRANSITION?
			</div>
			<div class="modal-body delete">
				<input type="hidden" id="getid" />
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Never mind</button>
				<button type="button" id="password_submit" class="btn btn-success">Submit</button>
			</div>
		</div>
	</div>
</div>
<!--    end small modal -->

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
							<th>Document Name</th>
							<th>Description</th>
							<th>Created Date</th>
							<th width="10%" class="disabled-sorting text-right">Action</th>
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

		$('#password_submit').click( function () {
			var id = $('#getid').val();
			window.location.replace("?action=delete&id="+id);
		});

		
	});
</script>