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
				<form method="post" action="?action=update_image" class="form-horizontal" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?=@$_GET['id']?>">
					<input type="hidden" name="oldimg" value="<?=@$u_image?>">
					<div class="row justify-content-center">
						<div class="col-sm-3">
              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                <div class="fileinput-new thumbnail">
                  <img src="<?=@BASE?>src/images/users/<?=@$u_image?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                <div>
                  <span class="btn btn-rose btn-round btn-file">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="u_image" />
                  </span>
                  <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                </div>
              </div>
						</div>
						
						<div class="col-sm-12">
							<br/>
							<div class="submit-section float-right">
								<!-- Btn Submit -->
								<?php include('../layout/comps/submit.php'); ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>

</script>