<?=@ERROR?>
<?php @$_SESSION['error'] = ''; ?>
<?=@SUCCESS?>
<?php @$_SESSION['success'] = ''; ?>
<?php 
    if(@$row_action_permission->p_add){
        echo '<a href="?action=add" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;&nbsp;បន្ថែមថ្មី</a>';
    }
?>
