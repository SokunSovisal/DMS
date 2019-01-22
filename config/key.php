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
  // $_SESSION['error'] = [];
  // $_SESSION['success'] = [];
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



  // // prevent from access by url
  // if (@$_GET['action']=='add' OR @$_GET['action']=='store') {
  //   if(!$row_action_permission->p_add){  exit(); }
  // }else if (@$_GET['action']=='edit' OR @$_GET['action']=='update') {
  //   if(!$row_action_permission->p_edit){  exit(); }
  // }else if (@$_GET['action']=='delete') {
  //   if(!$row_action_permission->p_delete){  exit(); }
  // }else{
  //   if(!$row_action_permission->p_view){  exit(); }
  // }

?>