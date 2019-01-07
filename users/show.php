<!-- small modal -->
<div class="modal fade modal-mini modal-primary" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Never mind</button>
				<a href="#" class="btn btn-success" id="deleteYes">Yes</a>
			</div>
		</div>
	</div>
</div>
<!--    end small modal -->

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-icon card-header-info">
				<div class="card-icon">
					<i class="fa fa-users"></i>
				</div>
				<h4 class="card-title ">User Management</h4>
			</div>
			<div class="card-body">
				<?php include('../layout/comps/addNew.php'); ?>
				<div class="table-responsive vs-datatable">
					<table id="datatables" class="table table-hover table-striped">
						<thead>
							<tr>
								<th>N&deg;</th>
								<th>Name</th>
								<th>E-mail</th>
								<th>phone</th>
								<th>Role</th>
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

		var table = $('#datatable').DataTable();

		// Edit record
		table.on('click', '.edit', function() {
			$tr = $(this).closest('tr');
			var data = table.row($tr).data();
			alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
		});

		// Delete a record
		table.on('click', '.remove', function(e) {
			$tr = $(this).closest('tr');
			table.row($tr).remove().draw();
			e.preventDefault();
		});

		//Like record
		table.on('click', '.like', function() {
			alert('You clicked on Like button');
		});
	});
</script>