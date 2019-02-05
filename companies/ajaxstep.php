<?php


	$m = '2';
	$sm = '2';
	include_once '../config/key.php';

	$s_id = @$_GET['s_id'];
	$query = $db->query("SELECT * FROM tbl_step WHERE step_service=$s_id ORDER BY step_name");
	if ($query->num_rows > 0) {
		$i =1;
		while ($step = $query->fetch_object()) {
			echo '<tr>
							<td>'.$i.'</td>
							<td>'.$step->step_name .'</td>
							<td>'.$step->step_description .'</td>
						</tr>';
			$i++;
		}
	}

	 ?>