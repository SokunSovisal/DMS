
<!-- small modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header">
        តើអ្នកពឹតជាចង់ធ្វើសកម្មភាពមួយនេះមែនទេ?
      </div>
      <div class="modal-body delete">
        <div class="form-group mt-2">
          <input type="text" id="getid" value="<?= $getid ?>" />
          <label for="">បញ្ចាក់ពាក្យសម្ងាត់!</label>
          <input type="password" class="form-control" placeholder="បញ្ចូលពាក្យសម្ងាត់របស់អ្នក" required="true" name="user_password" id="user_password" autocomplete="off" />
        </div>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">អត់ទេ</button>
        <button type="button" id="password_submit" class="btn btn-success">យល់ព្រម</button>
      </div>
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
							<th width="5%" class="disabled-sorting text-center">N&deg;</th>
							<th>ឈ្មោះ</th>
							<th>ប្រភេទ</th>
							<th>ថ្ងៃចាប់ផ្ដើម</th>
							<th>លេខទូរស័ព្ទ</th>
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
			var user_password = $('#user_password').val();
			var id = $('#getid').val();
			$.ajax({
				url: '../ajax/checkPassword.php',
				type: 'post',
				data: {method: 'fetch', user_password: user_password},
				success: function(dataReturn){
					var data = dataReturn.split(";:;");
					if (data[0]=='success') {
						window.location.replace("?action=delete&id="+id);
					}else{
						if ($('.modal-body.delete').find('div.alert-danger').length == 0) {
							$('.modal-body.delete').prepend(data[1]);
						}
						$('#user_password').val('')
					}
				}
			});
		});
	});
</script>