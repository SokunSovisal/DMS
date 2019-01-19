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
							<label> User Name <small>*</small></label>
              <input type="text" class="form-control" placeholder="username" name="u_name">
            </div>
		<div class="form-group">
			<label> Gender <small>*</small></label>
			<select class="form-control selectpicker" name="u_gender">
				<option value="">-- Please choose --</option>
				<option value="1">Male</option>
				<option value="2">Female</option>
				<option value="3">Other</option>
			</select>
		</div>
		<div class="form-group">
			<label> Phone <small>*</small></label>
			<input type="text" placeholder="phone" class="form-control" name="u_phone" >
		</div>
	</div> <!-- /.col -->
	

	<div class="col-sm-6">
		<div class="form-group">
			<label> E-mail <small>*</small></label>
              <input type="email" class="form-control" placeholder="email"  name="email">
            </div>

						<div class="form-group">
							<label> Password <small>*</small></label>
              <input type="password" class="form-control" placeholder="password" id="password" minlength="6" name="password" required="true" >
            </div>

            <div class="form-group">
							<label> Confirm-Password <small>*</small></label>
              <input type="password" class="form-control"  placeholder="confirm-password" equalTo="#password" name="password_confirmation" required="true" >
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