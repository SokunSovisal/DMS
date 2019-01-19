<!-- small modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				ARE YOU SURE WANT TO DO THIS ACTION?
			</div>
			<div class="modal-body delete">
				<div class="form-group mt-2">
					<input type="hidden" id="getid" />
					<label for="">Please confirm your password!</label>
					<input type="password" class="form-control" placeholder="input your password" required="true" name="user_password" id="user_password" autocomplete="off" />
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Never mind</button>
				<button type="button" id="delete_user" class="btn btn-success">Submit</button>
			</div>
		</div>
	</div>
</div>
<!--    end small modal -->
<div class="bg-white-content">
	<?php include('../layout/comps/addNew.php'); ?>
	<br/>
	<br/>
	<div class="vs-datatable">
		<table id="datatables" class="table table-hover table-striped" width="100%">
			<thead>
				<tr>
					<th width="6%" class="disabled-sorting text-center">N&deg;</th>
					<th>Roles</th>
					<th>Description</th>
					<th width="15%" class="disabled-sorting text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				<?= @$tbody ?>
			</tbody>
		</table>
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

		$('#delete_user').click( function () {
			var user_password = $('#user_password').val();
			var user_id = $('#getid').val();
			$.ajax({
				url: '../ajax/checkPassword.php',
				type: 'post',
				data: {method: 'fetch', user_password: user_password},
				success: function(dataReturn){
					var data = dataReturn.split(";:;");
					if (data[0]=='success') {
						window.location.replace("?action=delete&id="+user_id);
					}else{
						if ($('.modal-body.delete').find('div.alert-danger').length == 0) {
							$('.modal-body.delete').prepend(data[1]);
						}
					}
				}
			});
		});
	});
</script>