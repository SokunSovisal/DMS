<div class="row">
	<div class="col-sm-12">
		<div class="card ">
			<div class="card-header card-header-info card-header-text">
				<div class="card-icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<h4 class="card-title ">Create new user</h4>
			</div>
			<div class="card-body ">
				<?php include('../layout/comps/back.php'); ?>
        <br/>
        <br/>
				<form method="post" action="?action=update_password" class="form-horizontal" id="userForm">
					<input type="hidden" name="id" value="<?=@$_GET['id']?>">
					<div class="row">
						<div class="col-sm-6">
              <div class="form-group">
                <input type="email" class="form-control" placeholder="email" readonly value="<?=@$email?>">
              </div>
						</div> <!-- /.col -->
						

						<div class="col-sm-6">
            
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Current-Password" name="current_password" required="true" >
              </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="New-Password" minlength="6" name="password" required="true" >
              </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Cofirm-Password"  equalTo="#password" name="password_confirmation" required="true" >
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
</div>

<script>

</script>