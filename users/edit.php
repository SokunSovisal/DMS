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
							<div class="form-group">
								<input type="text" class="form-control" name="u_name" value="<?=@$u_name?>" placeholder="User Name">
							</div>
							<div class="form-group">
								<select class="form-control selectpicker" data-style="text-light" title="Title">
									<option value="1" <?= ($u_gender==1)?'selected':'' ?>>Male</option>
									<option value="2" <?= ($u_gender==2)?'selected':'' ?>>Female</option>
									<option value="3" <?= ($u_gender==3)?'selected':'' ?>>Other</option>
								</select>
							</div>
						</div> <!-- /.col -->
						

						<div class="col-sm-6">
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="E-mail" value="<?=@$email?>" required="true" aria-required="true" autocomplete="off">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="u_phone" placeholder="Phone"  value="<?=@$u_phone?>">
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
</div>

<script>

</script>