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
					<input type="password" class="form-control" placeholder="បញ្ចូលពាក្យសម្ងាត់របស់អ្នក" required="true" name="user_password" id="user_password" autocomplete="off" />
				</div>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">អត់ទេ</button>
				<button type="button" id="delete_user" class="btn btn-success">យល់ព្រម</button>
				<button type="button" id="status_user" class="btn btn-success">យល់ព្រម</button>
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
					<th width="6%" class="disabled-sorting text-center">ល.រ</th>
					<th>ឈ្មោះ</th>
					<th>អ៊ីមែល</th>
					<th>លេទូរស័ព្ទ</th>
					<th>ឋានៈ</th>
					<th width="10%" class="disabled-sorting text-center">ដំណើរការ</th>
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

		$('.toggle-status').change(function () {
			$('#delete_user').addClass('sr-only');
			$('#status_user').removeClass('sr-only');
		});
		$('.btndelete').click(function () {
			$('#delete_user').removeClass('sr-only');
			$('#status_user').addClass('sr-only');
		});


		$('#delete_user').click( function () {
			var user_password = $('#user_password').val();
			var user_id = $('#getid').val();
			$.ajax({
				url: '../ajax/checkPassword.php',
				type: 'post',
				data: {method: 'fetch', user_password: user_password},
				success: function(dataReturn){
					alert(dataReturn);
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

		$('#status_user').click( function () {
			var user_password = $('#user_password').val();
			var user_id = $('#getid').val();
			$.ajax({
				url: '../ajax/checkPassword.php',
				type: 'post',
				data: {method: 'fetch', user_password: user_password},
				success: function(dataReturn){
					var data = dataReturn.split(";:;");
					if (data[0]=='success') {
						window.location.replace("?action=status&id="+user_id);
					}else{
						if ($('.modal-body.delete').find('div.alert-danger').length == 0) {
							$('.modal-body.delete').prepend(data[1]);
						}
					}
				}
			});
		});

		$('#deleteModal').on('hidden.bs.modal', function () {
			if ($('#delete_user').hasClass('sr-only')) {
				window.location.replace("index.php");
			}
		})
	});
</script>