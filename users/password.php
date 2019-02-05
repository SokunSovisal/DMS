<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
      <br/>
      <br/>
			<form method="post" action="?action=update_password" class="form-horizontal" id="userForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
            <div class="form-group">
              <label> អ៊ីមែល </label>
              <input type="email" class="form-control" placeholder="email" readonly value="<?=@$email?>">
            </div>
					</div> <!-- /.col -->
					

					<div class="col-sm-6">
          
            <div class="form-group">
            <label> ពាក្យសម្ងាត់បច្ចុប្បន្ន <small>*</small></label>
              <input type="password" class="form-control" placeholder="current-password" name="current_password" required="true" autocomplete="off">
            </div>

            <div class="form-group">
              <label> ពាក្យសម្ងាត់ថ្មី <small>*</small></label>
              <input type="password" class="form-control" placeholder="new-password" minlength="6" name="password" required="true" autocomplete="off">
            </div>

            <div class="form-group">
              <label> ពាក្យសម្ងាត់ថ្មីម្ដងទៀត <small>*</small></label>
              <input type="password" class="form-control" placeholder="cofirm-password"  equalTo="#password" name="password_confirmation" required="true" autocomplete="off">
            </div>

          </div> <!-- /.row -->
          <div class="col-sm-12">
            <br/>
            <div class="submit-section float-right">
              <!-- Btn Submit -->
              <?php include('../layout/comps/submit.php'); ?>
            </div>
          </div>
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