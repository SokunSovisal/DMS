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
							<label> ឋានៈ <small>*</small></label>
              <input type="text" class="form-control" placeholder="roles" name="ur_name" value="<?=$ur_name?>">
            </div>
					</div> <!-- /.col -->
	
					<div class="col-sm-6">
            <div class="form-group">
							<label> ពិណ៌នា </label>
							<textarea class="form-control" rows="1" placeholder="description" name="ur_description"><?=$ur_description?></textarea>
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