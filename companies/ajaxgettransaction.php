<?php


	$m = '2';
	$sm = '2';
	include_once '../config/key.php';

	$co_id = @$_GET['co_id'];
	$query = $db->query("SELECT TR.*,S.s_name
											FROM tbl_transaction AS TR 
											LEFT JOIN tbl_service AS S
											ON S.s_id=TR.tr_service
											WHERE TR.tr_company=$co_id");
	$i = 0;
	if ($query->num_rows > 0) {
		while ($tr = $query->fetch_object()) {
			echo '<tr onclick="transaction_detail('.$tr->tr_id.')">
							<td>'.++$i.'</td>
							<td>'.$tr->s_name.'</td>
							<td class="td-actions text-right">
								<button type="button" onclick="getId('.$tr->tr_id.')" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger"><i class="material-icons">close</i></button>
							</td>
						</tr>';
		}
	}else{
		echo '<tr>
						<td colspan="3" class="text-center">ពុំទាន់មានប្រតិបិត្តការឡើយ!</td>
					</tr>';
	}

?>