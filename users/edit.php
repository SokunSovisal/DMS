<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?php include('../layout/comps/back.php'); ?>
			<br/>
			<br/>
			<form method="post" action="?action=update" class="form-horizontal" id="userForm">
				<input type="hidden" name="id" value="<?=@$_GET['id']?>">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>User Name <small>*</small></label>
							<input type="text" class="form-control" name="u_name" value="<?=@$u_name?>" placeholder="username">
						</div>
						<div class="form-group">
							<label>Gender <small>*</small></label>
							<select class="form-control" name="u_gender">
								<option value="">-- Please choose --</option>
								<option value="1" <?= ($u_gender==1)?'selected':'' ?>>Male</option>
								<option value="2" <?= ($u_gender==2)?'selected':'' ?>>Female</option>
								<option value="3" <?= ($u_gender==3)?'selected':'' ?>>Other</option>
							</select>
						</div>
					</div> <!-- /.col -->
					

					<div class="col-sm-6">
						<div class="form-group">
							<label>E-mail <small>*</small></label>
							<input type="email" class="form-control" name="email" placeholder="email" value="<?=@$email?>" required="true" aria-required="true" autocomplete="off" readonly>
						</div>
						<div class="form-group">
							<label>Phone <small>*</small></label>
							<input type="text" class="form-control" name="u_phone" placeholder="phone"  value="<?=@$u_phone?>">
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

</script>