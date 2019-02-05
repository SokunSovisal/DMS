<?php
	$m = '2';
	$sm = '2';
	include_once '../config/key.php';

	$s_id = @$_GET['s_id'];
	$query = $db->query("SELECT * FROM tbl_document WHERE doc_service_id=$s_id ORDER BY doc_name");
	if ($query->num_rows > 0) {
		$i =1;
		while ($document = $query->fetch_object()) {
			echo '<tr>
							<td>'.$i.'</td>
							<td><label>'.$document->doc_name .'</label></td>
							<td>
								<div class="togglebutton">
									<label>
										<input type="checkbox" class="doc_check"/>
										<span class="toggle toggle-active"></span>
										<input type="hidden" disabled class="d_id" name="d_id[]" value="'.$document->doc_id.'" />
									</label>
								</div>
							</td>
						</tr>';
			$i++;
		}
	}

	 ?>