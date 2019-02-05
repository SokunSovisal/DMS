<?php
  session_start();
	ob_start();

  // Define User Data
  define('UID', @$_SESSION['uid']);
  define('UNAME', @$_SESSION['uname']);
  define('UROLE', @$_SESSION['urole']);
  define('UIMG', @$_SESSION['uimg']);
  
  // Define Language
  define('LANG', @$_SESSION['lang']);
  
  // Define Message
  define('ERROR', @$_SESSION['error']);
  define('SUCCESS', @$_SESSION['success']);
  @$_SESSION['request'] = [];
  
  // Define BASE URL
  define('BASE','/');
  define('ADMIN','/admin');

  // Default Time zone
  date_default_timezone_set('Asia/Phnom_Penh');

  // Define Log Check
  if (@$_SESSION['vsloggl']==true) {
    define('VSLOGGL', @$_SESSION['vsloggl']);
  }else {
    define('VSLOGGL', false);
  }

  // DATABASE Connection
  $db = new mysqli("localhost", "root", "", "DMS");
  if(mysqli_connect_errno($db)){
    echo "<h1 style='color: red !important;'> Connection Fail! </h1>".$db->connect_error;
    exit();
  }else{
    if (!$db->set_charset('utf8')) {
      echo "Cannot set default! Charset to UTF8";
      exit();
    }
  }

  if (isset($_SESSION['urole']) && $_SESSION['urole']!='') {
    
    // permission
    @$get_action_permission = $db->query("SELECT * FROM tbl_permission WHERE p_position=".$_SESSION['urole']." AND p_module='$sm'");
    @$row_action_permission = mysqli_fetch_object($get_action_permission);
    // var_dump($row_action_permission);
    // button add
    function buttonEdit($edit_id){
      global $row_action_permission;
      if(@$row_action_permission->p_edit){
        return ' <a href="?action=edit&id='.$edit_id.'" rel="tooltip" class="btn btn-success" data-placement="left" data-original-title="Edit info">
            <i class="material-icons">edit</i>
        </a> ';
      }else{
        return ' <a href="#" rel="tooltip" class="btn btn-success disabled" data-placement="left" data-original-title="Edit info">
            <i class="material-icons">edit</i>
        </a> ';
      }
    }
    // button delete
    function buttonDelete($delete_id){
      global $row_action_permission;
      if(@$row_action_permission->p_delete){
        return '<button type="button" onclick="getId('.$delete_id.')" data-toggle="modal" data-target="#deleteModal" rel="tooltip" class="btn btn-danger" data-placement="left" data-original-title="Delete transactions" title="Delete">
          <i class="material-icons">close</i>
        </button>';
      }else{
        return '<button type="button" rel="tooltip" class="btn btn-danger disabled" data-placement="left">
          <i class="material-icons">close</i>
        </button>';
      }
    }
    // prevent from access by url
    if (@$_GET['action']=='add' OR @$_GET['action']=='store') {
      if(!$row_action_permission->p_add){  exit(); }
    }else if (@$_GET['action']=='edit' OR @$_GET['action']=='update') {
      if(!$row_action_permission->p_edit){  exit(); }
    }else if (@$_GET['action']=='delete') {
      if(!$row_action_permission->p_delete){  exit(); }
    }else{
      if(!$row_action_permission->p_view){  exit(); }
    }

  }
?>