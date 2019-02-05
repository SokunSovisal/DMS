<!-- small modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				តើអ្នកពឹតជាចង់ធ្វើសកម្មភាពមួយនេះមែនទេ?
			</div>
			<div class="modal-body delete">
				<div class="form-group mt-2">
					<input type="hidden" id="getid" />
					<label for="">បញ្ចាក់ពាក្យសម្ងាត់!</label>
					<input type="password" class="form-control" placeholder="input your password" required="true" name="user_password" id="user_password" autocomplete="off" />
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">អត់ទេ</button>
				<button type="button" id="delete_user" class="btn btn-success">យល់ព្រម</button>
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
					<th>ឋានៈ</th>
					<th>ពិពណ៌នា</th>
					<th width="15%" class="disabled-sorting text-right">សកម្មភាព</th>
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