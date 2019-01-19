<!-- small modal -->
<div class="modal" tabindex="99" role="dialog" id="showModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Modal title</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<div class="modal-body">
					<?php
						if (@$_GET['action']=='detail') {
							if(isset($_GET['id']) && $_GET['id']!=''){
								$query = $db->query("SELECT tbl_company.*,tbl_employee.em_name FROM tbl_company LEFT JOIN tbl_employee ON tbl_company.co_em_id=tbl_employee.em_id WHERE co_id=".$_GET['id']."");
								$row = mysqli_fetch_object($query);
								$co_name=$row->co_name;
								$co_type=$row->co_type;
								$co_phone=$row->co_phone;
								$co_email=$row->co_email;
								$co_address=$row->co_address;
								$co_register_date=$row->co_register_date;
								$co_em_id=$row->co_em_id;
								$em_name=$row->em_name;
								$co_description=$row->co_description;
								$co_status=$row->co_status;
								
							}
						}
					?>
                    <table class="table table-borderless">
					  <tbody>
					    <tr>
					      <th scope="row">Company Name: </th>
					      <td><?= @$co_name ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Company Type: </th>
					      <td><?= @$co_type ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Phone</th>
					      <td><?= @$co_phone ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Company Name: </th>
					      <td><?= @$co_name ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Company Type: </th>
					      <td><?= @$co_type ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Phone</th>
					      <td><?= @$co_phone ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Company Name: </th>
					      <td><?= @$co_name ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Company Type: </th>
					      <td><?= @$co_type ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Phone</th>
					      <td><?= @$co_phone ?></td>
					    </tr>
					    <tr>
					      <th scope="row">Phone</th>
					      <td><?= @$co_phone ?></td>
					    </tr>
					  </tbody>
					</table>
              </div>
			<div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>