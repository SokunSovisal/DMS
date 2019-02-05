<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=store" class="form-horizontal" id="userForm">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label> ឋានៈ <small>*</small></label>
              <input type="text" class="form-control" placeholder="roles" name="ur_name">
            </div>
					</div> <!-- /.col -->
					<div class="col-sm-6">
            <div class="form-group">
							<label> ពិពណ៌នា </label>
							<textarea class="form-control" rows="1" placeholder="description" name="ur_description"></textarea>
            </div>
					</div> <!-- /.col -->

					<div class="col-sm-12">
						<br/>
						<div class="submit-section float-right">
							<!-- Btn Submit -->
							<?php include('../layout/comps/submit.php'); ?>
						</div>
					</div>
					
				</div> <!-- /.row -->
			</form>
		</div>
	</div>
</div>

<script>
	$('#userForm').validate({
	  rules: {
	      email: {
	          required: true
	      },
	      password: {
	          required: true
	      }
	  },
	  errorElement: 'span',
	  errorPlacement: function (error, element) {
	      error.addClass('invalid-feedback');
	      element.closest('.form-group').append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
	      $(element).addClass('is-invalid');
	  },
	  unhighlight: function (element, errorClass, validClass) {
	      $(element).removeClass('is-invalid');
	  },
	  submitHandler: function (form) {
	      neou_cms.remove_error_messages();
	      var email = form.elements['email'].value;
	      var password = CryptoJS.SHA512(form.elements['password'].value).toString();
	      login.login_user(email, password);
	  }
	});
</script>