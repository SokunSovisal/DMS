<?php
	// Basic Variable
	$title = 'Sample';
	$m = 'sample';
	$sm = '';

	// Call Key
	include('config/key.php');
	// include header
	include('layout/header.php');
?>

	<!-- // Content here -->

	<div class="container-fluid">
		<h1>Sample Page</h1>
		<a href="#" class="btn btn-primary wave-effect wave-light">Hello</a>
		<a href="#" class="btn btn-outline-success wave-effect wave-yellow">Hello</a>
		<a href="#" class="btn btn-success btn-round wave-effect wave-red">Hello</a>
		<a href="#" class="btn btn-outline-success btn-round wave-effect wave-teal">Hello</a>
		<a href="#" class="btn btn-success btn-link wave-effect">Hello</a>
		<br/>
		<br/>
		<div class="fileinput fileinput-new text-center" data-provides="fileinput">
			<div class="fileinput-new thumbnail">
				<img src="src/images/users/default_user.png" alt="...">
			</div>
			<div class="fileinput-preview fileinput-exists thumbnail"></div>
			<div>
				<span class="btn btn-rose btn-round btn-file">
					<span class="fileinput-new">Select image</span>
					<span class="fileinput-exists">Change</span>
					<input type="file" name="..." />
				</span>
				<a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
			</div>
		</div>
		<input type="text" class="form-control datetimepicker-input datetimepicker" placeholder="datetimepicker" id="datetimepicker1" data-toggle="datetimepicker" data-target="#datetimepicker1"/>
		<br>
		<input type="text" class="form-control datetimepicker-input datepicker" placeholder="datepicker" id="datetimepicker2" data-toggle="datetimepicker" data-target="#datetimepicker2"/>
		<br>
		<input type="text" class="form-control datetimepicker-input daypicker" placeholder="daypicker" id="datetimepicker3" data-toggle="datetimepicker" data-target="#datetimepicker3"/>
		<br>
		<input type="text" class="form-control datetimepicker-input time24picker" placeholder="time24picker" id="datetimepicker6" data-toggle="datetimepicker" data-target="#datetimepicker6"/>
		<br>
		<input type="text" class="form-control datetimepicker-input time12picker" placeholder="time12picker" id="datetimepicker7" data-toggle="datetimepicker" data-target="#datetimepicker7"/>

		<div class="togglebutton">
			<label>
				<input type="checkbox" checked="">
				<span class="toggle"></span>
				Toggle is on
			</label>
		</div>
		<div class="togglebutton">
			<label>
				<input type="checkbox" checked="">
				<span class="toggle toggle-active"></span>
				Toggle active
			</label>
		</div>
		<label for="">Label Testing</label>
		<input type="text" class="form-control" placeholder="searchPlaceholder">
		<label for="">Label Testing</label>
		<select name="" id="" class="form-control selectpicker" title="Single Select">
			<option value="">Hello</option>
			<option value="">Hello</option>
			<option value="">Hello</option>
			<option value="">Hello</option>
		</select>
		<br/>
		<br/>
		<br/>
		<div class="vs-datatable">
			<table id="datatable" class="table table-striped">
				<thead>
					<tr>
						<th class="text-center disabled-sorting">#</th>
						<th>Name</th>
						<th>Job Position</th>
						<th>Since</th>
						<th class="text-right disabled-sorting">Salary</th>
						<th class="text-right disabled-sorting">Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="text-center">1</td>
						<td>Andrew Mike</td>
						<td>Develop</td>
						<td>2013</td>
						<td class="text-right">&euro; 99,225</td>
						<td class="td-actions text-right">
							<button type="button" rel="tooltip" class="btn btn-info wave-effect wave-light">
								<i class="material-icons">person</i>
							</button>
							<button type="button" rel="tooltip" class="btn btn-success wave-effect wave-light">
								<i class="material-icons">edit</i>
							</button>
							<button type="button" rel="tooltip" class="btn btn-danger wave-effect wave-light">
								<i class="material-icons">close</i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<script type="text/javascript">
		
		$('#datatable').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
				[2, 25, 50, -1],
				[2, 25, 50, "All"]
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search records",
			}
		});
	</script>

<?php
	// include footer
	include('layout/footer.php');
?>