<?php
	// Basic Variable
	$title = 'User management';
	$m = 5;
	$sm = 6;

	// Call Key
	include('../config/key.php');
	// include header
	include('../layout/header_frame.php');
?>
 
<!-- small modal -->
<div class="modal fade modal-mini modal-primary" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-small">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
			</div>
			<div class="modal-body">
				<p>Are you sure you want to delete this?</p>
			</div>
			<div class="modal-footer justify-content-center">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Never mind</button>
				<a href="#" class="btn btn-success" id="deleteYes">Yes</a>
			</div>
		</div>
	</div>
</div>
<!--    end small modal -->

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header card-header-icon card-header-info">
				<h4 class="card-title mb-0">Set Permission</h4>
			</div>
			<div class="card-body">
				<form action="<?= $_SERVER['PHP_SELF'] ?>" style="display: inline;" method="get">
					<input type="hidden" name="parent_id" value="<?= @$_GET['parent_id' ] ?>">
					<div class="row col-sm-3">
						<select class="form-control" onchange="form.submit();" name="txt_main_menu">
							<option value="">==all permission==</option>
			                <?php 
			                    $get_main_menu = $db->query("SELECT * FROM tbl_main_menu ORDER BY mm_index_order ASC");
			                    while ($row_main_menu = mysqli_fetch_object($get_main_menu)) {
			                        if($row_main_menu->mm_id == @$_GET['txt_main_menu']){
			                            echo '<option SELECTED value="'.$row_main_menu->mm_id.'">'.$row_main_menu->mm_name.'</option>';
			                            
			                        }else{
			                            echo '<option value="'.$row_main_menu->mm_id.'">'.$row_main_menu->mm_name.'</option>';
			                        }
			                    }
			                ?>
						</select>
						<br/>
						<br/>
					</div>
				</form>
				<div class="vs-datatable">
					<table id="datatables" class="table table-hover table-striped" width="100%">
						<thead>
							<tr>
								<th>N&deg; #</th>
		                        <th>Main Menu</th>
		                        <th>Permission on Module</th>
		                        <th class="text-center">View</th>
		                        <th class="text-center">Add</th>
		                        <th class="text-center">Edit</th>
		                        <th class="text-center">Delete</th>
		                        <th class="text-center">Only Me</th>
							</tr>
						</thead>
						<tbody>
		                    <?php 
		                        if(@$_GET['txt_main_menu'] != ""){
		                            $v_permission = @$_GET['txt_main_menu'];
		                            $get_data = $db->query("SELECT * FROM tbl_left_menu AS A 
		                                LEFT JOIN tbl_main_menu AS B ON B.mm_id=A.lm_main_menu 
		                                WHERE A.lm_main_menu='$v_permission' AND (A.lm_status='1' OR A.lm_status='2')
		                                ORDER BY B.mm_index_order ASC,A.lm_index_order ASC");
		                        }else{
		                            $get_data = $db->query("SELECT * FROM tbl_left_menu AS A 
		                                LEFT JOIN tbl_main_menu AS B ON B.mm_id=A.lm_main_menu 
		                                WHERE (A.lm_status='1' OR A.lm_status='2')
		                                ORDER BY B.mm_index_order ASC,A.lm_index_order ASC");
		                        }
		                        $no = 0;
		                        while ($row = mysqli_fetch_object($get_data)) {
		                            $v_position = @$_GET['parent_id'];
		                            if($row->lm_status==2){
		                              echo '<tr class="menu_title" data-position="'.$v_position.'" data-module="'.$row->lm_id.'">';
		                            }else{
		                              echo '<tr data-position="'.$v_position.'" data-module="'.$row->lm_id.'">';
		                            }
		                                echo "<td>".(++$no)."</td>";
		                                echo '<th>'.$row->mm_name.'</th>';
		                                echo '<td>'.$row->lm_name.'</td>';
		                                if(@$_GET['parent_id'] != ""){
		                                    $get_permission = $db->query("SELECT * FROM tbl_permission WHERE p_position='$v_position' AND p_module=".$row->lm_id);
		                                    if(mysqli_num_rows($get_permission)){
		                                        $row_permission = mysqli_fetch_object($get_permission);
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"  '.(($row_permission->p_view)?('checked'):('')).'> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"  '.(($row_permission->p_add)?('checked'):('')).'> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"  '.(($row_permission->p_edit)?('checked'):('')).'> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"  '.(($row_permission->p_delete)?('checked'):('')).'> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"  '.(($row_permission->p_only_group)?('checked'):('')).'> <span class="toggle toggle-success"></span> </label></div></td>';
		                                    }else{                          
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"> <span class="toggle toggle-success"></span> </label></div></td>';
		                                        echo '<td class="text-center"><div class="togglebutton"><label> <input data-parent-id='.$row->lm_id.' type="checkbox"> <span class="toggle toggle-success"></span> </label></div></td>';
		                                    }
		                                }else{
		                                    echo '<td class="text-center">--</td>';
		                                    echo '<td class="text-center">--</td>';
		                                    echo '<td class="text-center">--</td>';
		                                    echo '<td class="text-center">--</td>';
		                                    echo '<td class="text-center">--</td>';
		                                }
		                            echo '</tr>';
		                        }
		                    ?> 
		                </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  $('input[type="checkbox"]').change(function(){
    v_view = $(this).parents('tr').find('td').eq(2).find('input').prop('checked');
    v_add = $(this).parents('tr').find('td').eq(3).find('input').prop('checked');
    v_edit = $(this).parents('tr').find('td').eq(4).find('input').prop('checked');
    v_delete = $(this).parents('tr').find('td').eq(5).find('input').prop('checked');
    v_group_data = $(this).parents('tr').find('td').eq(6).find('input').prop('checked');

    v_position = $(this).parents('tr').attr('data-position');
    v_module = $(this).parents('tr').attr('data-module');
    $.ajax({url: "ajx_set_permission.php?m="+v_module+"&p="+v_position+"&v="+v_view+"&a="+v_add+"&e="+v_edit+"&d="+v_delete+"&g="+v_group_data, success: function(result){ 
      // alert(result); 
    }});
  });
  
	$(document).ready(function() {

	});
</script>
<?php
	// include footer
	include('../layout/footer_frame.php');
?>