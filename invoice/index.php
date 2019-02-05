<?php
	
	// Basic Variable
	$title = 'Invoice';
	$m = '7';
	$sm = '12';
	// Call Key
	include('../config/key.php');
	$breadcrumb = '<li class="breadcrumb-item"><a href="'.BASE.'">Dashboard</a></li>
						    <li class="breadcrumb-item active" aria-current="page">'.$sm.'</li>';

	// include header
	include('../layout/header.php');

	if (@$_GET['action']=='add') {

		$query = $db->query("SELECT * FROM tbl_invoice ORDER BY inv_number DESC LIMIT 1");
		if ($query->num_rows > 0) {
			while ($row = mysqli_fetch_object($query)) {
				$inv_number = str_pad($row->inv_number+1, 3, '0', STR_PAD_LEFT);
			}
		}else{
			$inv_number = '1901001';
		}

		// Get Service
		$companies = '';
		$query = $db->query("SELECT * FROM tbl_company");
		while ($row = mysqli_fetch_object($query)) {
			$companies .= '<option value="'.$row->co_id.'">'.$row->co_name_en.'</option>';
		}
		// include Page
		include('create.php');
	}else if (@$_GET['action']=='store') {
		// Get Value From Posted Form
		$inv_date = $db->real_escape_string($_POST['inv_date']);
		$inv_number = $db->real_escape_string($_POST['inv_number']);
		$inv_customer = $db->real_escape_string($_POST['inv_customer_name']);
		$inv_company_name_en = $db->real_escape_string($_POST['inv_company_name_en']);
		$inv_company_name_kh = $db->real_escape_string($_POST['inv_company_name_kh']);
		$inv_company_vat = $db->real_escape_string($_POST['inv_company_vat']);
		$inv_company_phone = $db->real_escape_string($_POST['inv_company_phone']);
		$inv_company_email = $db->real_escape_string($_POST['inv_company_email']);
		$inv_vat_percentage = $db->real_escape_string($_POST['inv_vat_percentage']);
		$inv_company_address_kh = $db->real_escape_string($_POST['inv_company_address_kh']);
		$inv_company_address_en = $db->real_escape_string($_POST['inv_company_address_en']);
		$inv_description = $db->real_escape_string($_POST['inv_description']);
		
		// Sql Statement
		$sql = "INSERT INTO tbl_invoice (
						`inv_date`,
						`inv_number`,
						`inv_customer`,
						`inv_company_name_en`,
						`inv_company_name_kh`,
						`inv_company_vat`,
						`inv_company_phone`,
						`inv_company_email`,
						`inv_vat_percentage`,
						`inv_company_address_kh`,
						`inv_company_address_en`,
						`inv_description`
						) 
						VALUES(
						'$inv_date',
						'$inv_number',
						'$inv_customer',
						'$inv_company_name_en',
						'$inv_company_name_kh',
						'$inv_company_vat',
						'$inv_company_phone',
						'$inv_company_email',
						'$inv_vat_percentage',
						'$inv_company_address_kh',
						'$inv_company_address_en',
						'$inv_description'
						)";
		if ($db->query($sql)==true) {
			$inv_id = mysqli_insert_id($db);
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>វិក្កយបត្រត្រូវាបនបន្ថែមថ្មី</span>
			</div>';
			header ('Location: index.php?action=detail&inv_id='.$inv_id);
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='edit') {
		if(isset($_GET['id']) && $_GET['id']!=''){
			$query = $db->query("SELECT * FROM tbl_invoice WHERE inv_id=".$_GET['id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$inv_date=$row->inv_date;
					$inv_number=$row->inv_number;
					$inv_customer=$row->inv_customer;
					$inv_company_name_kh=$row->inv_company_name_kh;
					$inv_company_name_en=$row->inv_company_name_en;
					$inv_company_address_kh=$row->inv_company_address_kh;
					$inv_company_address_en=$row->inv_company_address_en;
					$inv_company_phone=$row->inv_company_phone;
					$inv_company_email=$row->inv_company_email;
					$inv_company_vat=$row->inv_company_vat;
					$inv_vat_percentage=$row->inv_vat_percentage;
					$inv_description=$row->inv_description;
				}
				// include Page
				include('edit.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
					<span>វិក្កយបត្ររកពុំឃើញឡើយ</span>
				</div>';
				header ('Location: index.php');
			}
		}
	}else if (@$_GET['action']=='update') {
		// Get Value From Posted Form
		$id = $_POST['id'];
		$inv_date = $db->real_escape_string($_POST['inv_date']);
		$inv_number = $db->real_escape_string($_POST['inv_number']);
		$inv_customer = $db->real_escape_string($_POST['inv_customer_name']);
		$inv_company_name_en = $db->real_escape_string($_POST['inv_company_name_en']);
		$inv_company_name_kh = $db->real_escape_string($_POST['inv_company_name_kh']);
		$inv_company_vat = $db->real_escape_string($_POST['inv_company_vat']);
		$inv_company_phone = $db->real_escape_string($_POST['inv_company_phone']);
		$inv_company_email = $db->real_escape_string($_POST['inv_company_email']);
		$inv_vat_percentage = $db->real_escape_string($_POST['inv_vat_percentage']);
		$inv_company_address_kh = $db->real_escape_string($_POST['inv_company_address_kh']);
		$inv_company_address_en = $db->real_escape_string($_POST['inv_company_address_en']);
		$inv_description = $db->real_escape_string($_POST['inv_description']);

		$sql = "UPDATE tbl_invoice SET 
		inv_date='$inv_date',
		inv_number='$inv_number',
		inv_customer='$inv_customer',
		inv_company_name_en='$inv_company_name_en',
		inv_company_name_kh='$inv_company_name_kh',
		inv_company_vat='$inv_company_vat',
		inv_company_phone='$inv_company_phone',
		inv_company_email='$inv_company_email',
		inv_vat_percentage='$inv_vat_percentage',
		inv_company_address_kh='$inv_company_address_kh',
		inv_company_address_en='$inv_company_address_en',
		inv_description='$inv_description'
		WHERE inv_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>វិក្កយបត្រត្រូវាបនកែប្រែ!</span>
			</div>';
			header ('Location: index.php');
			exit();
		}else{
			echo mysqli_error($db);
		}

	}else if (@$_GET['action']=='print') {
		$i=1;
		if(isset($_GET['inv_id']) && $_GET['inv_id']!=''){
			$query = $db->query("SELECT * FROM tbl_invoice WHERE inv_id=".$_GET['inv_id']);
			if($query->num_rows > 0){
				while ($row = mysqli_fetch_object($query)) {
					$i=0;
					$sub_total =0;
					$vat_total =0;
					$grand_total =0;
					$invoice_details ='';
					$inv_date=$row->inv_date;
					$inv_number=$row->inv_number;
					$inv_customer=$row->inv_customer;
					$inv_company_name_kh=$row->inv_company_name_kh;
					$inv_company_name_en=$row->inv_company_name_en;
					$inv_company_address_kh=$row->inv_company_address_kh;
					$inv_company_address_en=$row->inv_company_address_en;
					$inv_company_phone=$row->inv_company_phone;
					$inv_company_email=$row->inv_company_email;
					$inv_company_vat=$row->inv_company_vat;
					$inv_vat_percentage=$row->inv_vat_percentage;
					$inv_description=$row->inv_description;

					$q_invd = $db->query("SELECT * FROM tbl_invoice_detail AS INVD
																LEFT JOIN tbl_invoice AS INV ON INV.inv_id = INVD.invd_invoice_id
																LEFT JOIN tbl_service AS S ON S.s_id = INVD.invd_service_id
																WHERE INVD.invd_invoice_id=".$_GET['inv_id']);
					if($q_invd->num_rows > 0){
						while ($invd = mysqli_fetch_object($q_invd)) {
							$invoice_details .='<tr class="invoice-detail-item">
																		<td class="text-center" valign="top">
																			'.++$i.'
																		</td>
																		<td class="text-left">
																			<strong>
																				&nbsp;'.$invd->s_name.'
																			</strong>
																			<div class="inv_detail">
																				&nbsp;'.$invd->invd_description.'
																			</div>
																		</td>
																		<td valign="top" class="text-center">'.$invd->invd_qty.'</td>
																		<td class="text-right" valign="top">
																			<span class="float-left">$</span>
																			'.number_format($invd->invd_unit_price, 2).'
																		</td>
																		<td class="text-right" valign="top">
																			<span class="float-left">$</span>
																			'.number_format($invd->invd_qty*$invd->invd_unit_price, 2).'
																		</td>
																	</tr>';
							$sub_total += $invd->invd_qty*$invd->invd_unit_price;
						}
						$vat_total += $sub_total * ($inv_vat_percentage/100);
						$grand_total += $sub_total * (($inv_vat_percentage/100)+1);
					}
				}
			}
		}

		// include Page
		include('print.php');
	}else if (@$_GET['action']=='detail') {

		if(isset($_GET['inv_id']) && $_GET['inv_id']!=''){
			$query = $db->query("SELECT * FROM tbl_invoice WHERE inv_id=".$_GET['inv_id']);
			if($query->num_rows > 0){

				$invoice_details = '';
				$q_invd = $db->query("SELECT * FROM tbl_invoice_detail WHERE invd_invoice_id=".$_GET['inv_id']);
				if($q_invd->num_rows > 0){
					while ($row = mysqli_fetch_object($q_invd)) {

						// Get Service
						$services = '';
						$query = $db->query("SELECT * FROM tbl_service");
						while ($service = mysqli_fetch_object($query)) {
							$services .= '<option value="'.$service->s_id.'" '.(($service->s_id==$row->invd_service_id)? 'selected' : '' ).' >'.$service->s_name.'</option>';
						}

						$invoice_details .= '<div class="bg-white-content">
																	<form method="post" action="?action=updatedetail" class="form-horizontal" id="transactionForm" autocomplete="off">
																		<input type="hidden" name="invd_invoice_id" value="'.$row->invd_invoice_id.'">
																		<input type="hidden" name="id" value="'.$row->invd_id.'">
																		<div class="row">
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>សេវាកម្ម <small> *</small></label>
																					<select class="custom-select" name="invd_service_id">
																						<option value="">-- ជ្រើសរើស --</option>
																						'.$services.'
																					</select>
																				</div>
																				<div class="row">
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>តម្លៃ/ឯកតា <small>*</small></label>
																							<input type="number" min="1" class="form-control" placeholder="0.00" name="invd_unit_price" value="'.$row->invd_unit_price.'" required>
																						</div>
																					</div>
																					<div class="col-sm-6">
																						<div class="form-group">
																							<label>ចំនួន <small>*</small></label>
																							<input type="number" min="1" class="form-control" placeholder="សូមវាយបញ្ចូលជាលេខ" name="invd_qty" value="'.$row->invd_qty.'" required>
																						</div>
																					</div>
																				</div>
																			</div> <!-- /.col -->
																			<div class="col-sm-6">
																				<div class="form-group">
																					<label>ពិពណ៌នា</label>
																					<textarea class="form-control" placeholder="ពិពណ៌នា" name="invd_description" style="height: 124px;">'.$row->invd_description.'</textarea>
																				</div>
																			</div>
																			<div class="col-sm-12">
																				<div class="submit-section float-right">
																					<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> &nbsp;&nbsp;កែប្រែ</button>
																				</div>
																			</div>
																		</div> <!-- /.row -->
																	</form>
																</div>
																<br/>';
					}
				}

				// Get Service
				$services = '';
				$query = $db->query("SELECT * FROM tbl_service");
				while ($row = mysqli_fetch_object($query)) {
					$services .= '<option value="'.$row->s_id.'">'.$row->s_name.'</option>';
				}

				$query = $db->query("SELECT * FROM tbl_invoice WHERE inv_id=".$_GET['inv_id']);
				if($query->num_rows > 0){
					while ($row = mysqli_fetch_object($query)) {
						$inv_number=$row->inv_number;
					}
				}
				// include Page
				include('detail.php');
			}else{
				@$_SESSION['error'] = '<div class="alert alert-danger">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
																<span>វិក្កយបត្ររកពុំឃើញឡើយ!</span>
															</div>';
				header ('Location: index.php');
			}
		}else{
			@$_SESSION['error'] = '<div class="alert alert-danger">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
															<span>វិក្កយបត្ររកពុំឃើញឡើយ!</span>
														</div>';
			header ('Location: index.php');
		}

	}else if (@$_GET['action']=='storedetail') {
		// Get Value From Posted Form
		$invd_invoice_id = $db->real_escape_string($_POST['invd_invoice_id']);
		$invd_service_id = $db->real_escape_string($_POST['invd_service_id']);
		$invd_unit_price = $db->real_escape_string($_POST['invd_unit_price']);
		$invd_qty = $db->real_escape_string($_POST['invd_qty']);
		$invd_description = $db->real_escape_string($_POST['invd_description']);

		// Sql Statement
		$sql = "INSERT INTO tbl_invoice_detail (
						`invd_invoice_id`,
						`invd_service_id`,
						`invd_unit_price`,
						`invd_qty`,
						`invd_description`
						) 
						VALUES(
						'$invd_invoice_id',
						'$invd_service_id',
						'$invd_unit_price',
						'$invd_qty',
						'$invd_description'
						)";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>សេវាកម្មត្រូវាបនបន្ថែមថ្មីក្នុងវិក្កយបត្រ</span>
			</div>';
			header ('Location: index.php?action=detail&inv_id='.$invd_invoice_id);
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else if (@$_GET['action']=='updatedetail') {
		// Get Value From Posted Form
		$id = $db->real_escape_string($_POST['id']);
		$invd_invoice_id = $db->real_escape_string($_POST['invd_invoice_id']);
		$invd_service_id = $db->real_escape_string($_POST['invd_service_id']);
		$invd_unit_price = $db->real_escape_string($_POST['invd_unit_price']);
		$invd_qty = $db->real_escape_string($_POST['invd_qty']);
		$invd_description = $db->real_escape_string($_POST['invd_description']);

		// Sql Statement
		$sql = "UPDATE tbl_invoice_detail
						SET invd_invoice_id='$invd_invoice_id',
								invd_service_id='$invd_service_id',
								invd_unit_price='$invd_unit_price',
								invd_qty='$invd_qty',
								invd_description='$invd_description'
						WHERE invd_id=$id";
		if ($db->query($sql)==true) {
			@$_SESSION['success'] = '<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
				<span>សេវាកម្មត្រូវាបនបន្ថែមថ្មីក្នុងវិក្កយបត្រ</span>
			</div>';
			header ('Location: index.php?action=detail&inv_id='.$invd_invoice_id);
			exit();
		}else{
			echo mysqli_error($db);
		}
	}else{
		$query = $db->query("SELECT * FROM tbl_invoice ORDER BY inv_number DESC");
		if ($query->num_rows > 0) {
			$tbody ='';
			$i =0;
			while ($inv = $query->fetch_object()) {
				$tbody .='<tr>
					<td class="text-center">'.++$i.'</td>
					<td>'.$inv->inv_number.'</td>
					<td>'.(date('d/m/Y',strtotime($inv->inv_date))).'</td>
					<td>'.$inv->inv_company_name_kh.'<br>'.$inv->inv_company_name_en.'</td>
					<td>'.$inv->inv_description.'</td>
					<td class="td-actions text-right">
						<a href="?action=detail&inv_id='.$inv->inv_id.'" class="btn btn-info">
							<i class="fa fa-info-circle"></i>
						</a>
						<a href="?action=print&inv_id='.$inv->inv_id.'" class="btn btn-warning">
							<i class="fa fa-print"></i>
						</a>
						<a href="?action=edit&id='.$inv->inv_id.'" class="btn btn-success">
								<i class="material-icons">edit</i>
						</a>
					</td>
				</tr>';
			}
		}
		// include Page
		include('show.php');
	}


	// include footer
	include('../layout/footer.php');
?>