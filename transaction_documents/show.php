<?php include('../layout/comps/modalDelete.php'); ?>

<div class="row">
	<div class="col-sm-12">
		<div class="bg-white-content">
			<?=@ERROR?>
			<?php @$_SESSION['error'] = ''; ?>
			<?=@SUCCESS?>
			<?php @$_SESSION['success'] = ''; ?>
			<a href="?action=add&tr_id=<?=@$tr_id?>" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;Add New</a>
			<br/>
			<br/>
			<div class="vs-datatable">
				<table id="datatables" class="table table-hover table-striped" width="100%">
					<thead>
						<tr>
							<th width="5%" class="disabled-sorting text-center">N&deg;</th>
							<th>Record Date</th>
							<th>Document Name</th>
							<th width="8%" class="disabled-sorting text-center border-lr">Received</th>
							<th width="25%">&nbsp;Note</th>
							<th>Control By</th>
							<th>Approve By</th>
							<th width="8%" class="disabled-sorting text-right">Action</th>
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

		
	});
</script>