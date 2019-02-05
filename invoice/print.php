
<style type="text/css">
	img{
		max-width: 100%;
	}
	body{
		margin: 0;
	}
	.print{
		padding: 0 50px;
	}
	.print header{
		margin-top: -20px;
	}
	.print table.invoice-detail{
		margin-top: 20px;
	}
	.print table.invoice-detail td{
		border: 0.5px dotted #999 !important;
		padding: 8px 10px;
	}
	.print table.invoice-detail .invoice-detail-item td{
		padding: 7px 10px 15px 10px;
	}
	.sign-box{
		height: 80px;
	}
	.grand-total{
		background: #aaa;
	}
	@media print
	{    
    .navbar{
    	display: none;
    }
		.print table.invoice-detail td{
			border: 0.5px dotted #999 !important;
		}
		.grand-total{
  		-webkit-print-color-adjust: exact !important;
  		-moz-print-color-adjust: exact !important;
  		-ms-print-color-adjust: exact !important;
  		-o-print-color-adjust: exact !important;
			background: #aaa;
		}
	}
</style>
<input type="hidden" id="detail" value="<?=$_GET['detail']?>">
<div class="print">
	<header class="mb-2">
		<img src="<?=BASE?>dist/img/invoice_header.png" alt="..." />
	</header>

	<table>
		<tr>
			<td width="18%">អតិថិជន/Customer</td>
			<td width="40%">: TAX INVOICE</td>
			<td width="15%">លេខរៀងវិក្កយបត្រ</td>
			<td width="27%">:  G.GGO-TR-<?= $inv_number ?></td>
		</tr>
		<tr>
			<td width="18%">ឈ្មោះ​</td>
			<td width="40%" valign="top">: <?= $inv_company_name_kh ?></td>
			<td width="15%">Invoice No. </td>
			<td width="27%"></td>
		</tr>
		<tr>
			<td width="18%">Name</td>
			<td width="40%" valign="top">: <?= $inv_company_name_en ?></td>
			<td width="15%">កាលបរិច្ឆេទ/ Date</td>
			<td width="27%">: <?=date('d/M/Y',strtotime($inv_date))?></td>
		</tr>
		<tr>
			<td width="18%">
				<div>អាសយដ្ឋាន</div>
				<div>Address</div>
			</td>
			<td width="40%" valign="top">: <?= $inv_company_address_kh ?></td>
			<td width="15%"></td>
			<td width="27%"></td>
		</tr>
		<tr>
			<td width="18%">ទូរស័ព្ទ/Telephone</td>
			<td width="40%" valign="top">: <?= $inv_company_phone ?></td>
			<td width="15%"></td>
			<td width="27%"></td>
		</tr>
		<tr>
			<td width="18%">
				<div>លេខអត្តសញ្ញាណកម្ម</div>
				<div>អតប(VATTIN)</div>
			</td>
			<td width="40%" valign="top">: <?= $inv_company_vat ?></td>
			<td width="10%"></td>
			<td width="27%"></td>
		</tr>
	</table>

	<table class="invoice-detail">
		<tr>
			<td class="text-center" width="6%">
				<div>ល.រ</div>
				<div>No.</div>
			</td>
			<td class="text-center" width="45%">
				<div>បរិយាយមុខទំនិញ</div>
				<div>Description</div>
			</td>
			<td class="text-center" width="9%">
				<div>បរិមាណ</div>
				<div>Quantity</div>
			</td>
			<td class="text-center" width="20%">
				<div>ថ្លៃឯកតា</div>
				<div>Unit Price</div>
			</td>
			<td class="text-center" width="20%">
				<div>ថ្លៃសរុប</div>
				<div>Total Amount</div>
			</td>
		</tr>

		<?=$invoice_details?>

		<tr>
			<td class="text-right" colspan="4">សរុប/Sub-Total</td>
			<td class="text-right"><span class="float-left">$</span> <?=number_format(@$sub_total, 2)?></td>
		</tr>
		<tr>
			<td class="text-right" colspan="4">អាករលើតម្លៃបន្ថែម/VAT <?=@$inv_vat_percentage?>% </td>
			<td class="text-right"><span class="float-left">$</span> <?=number_format(@$vat_total, 2)?></td>
		</tr>
		<tr>
			<td class="text-right" colspan="4">សរុបរួម/Grand Total</td>
			<td class="text-right grand-total"><span class="float-left">$</span> <?=number_format(@$grand_total, 2)?></td>
		</tr>
	</table>

	<table>
		<tr>
			<td width="30%" class="text-center">
				<div class="sign-box"></div>
				<div>________________________</div>
				<div>ហត្ថលេខា និងត្រាអតិថិជន</div>
				<div>Customer's Signature & Stamp</div>
			</td>
			<td width="40%"></td>
			<td width="30%" class="text-center">
				<div class="sign-box"></div>
				<div>________________________</div>
				<div>ហត្ថលេខា និងត្រាអតិថិជន</div>
				<div>Customer's Signature & Stamp</div>
			</td>
		</tr>
	</table>
	
</div>



<script type="text/javascript">
  window.print();
  setTimeout(function() {
  	if ($('#detail').val()==1) {
    	document.location.href = "index.php?action=detail&inv_id=<?=$_GET['inv_id']?>"; 
  	}else{
    	document.location.href = "index.php"; 
  	}
	}, 1000);
</script>