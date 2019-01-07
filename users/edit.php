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
				<form method="post" action="?action=update" class="form-horizontal" id="userForm">
					<input type="hidden" name="id" value="<?=@$_GET['id']?>">
					<div class="row">
						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-2 col-form-label">User Name</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="u_name" value="<?=@$u_name?>" placeholder="username">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row mt-1">
								<label class="col-sm-2 col-form-label">Gender</label>
								<div class="col-sm-10">
									<select class="selectpicker" data-size="8" name="u_gender" data-style="btn btn-primary" title="Choose Gender">
										<option value="1" <?= ($u_gender==1)?'selected':'' ?>>Male</option>
										<option value="2" <?= ($u_gender==2)?'selected':'' ?>>Female</option>
										<option value="3" <?= ($u_gender==3)?'selected':'' ?>>Other</option>
									</select>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
						</div> <!-- /.col -->
						

						<div class="col-sm-6">
							<div class="row">
								<label class="col-sm-2 col-form-label">E-mail</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="email" class="form-control" name="email" placeholder="email" value="<?=@$email?>" required="true" aria-required="true" autocomplete="off">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
							<div class="row">
								<label class="col-sm-2 col-form-label">Phone</label>
								<div class="col-sm-10">
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="u_phone" placeholder="phone"  value="<?=@$u_phone?>">
									</div>
								</div> <!-- /.col -->
							</div> <!-- /.row -->
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
</div>

<script>

</script>