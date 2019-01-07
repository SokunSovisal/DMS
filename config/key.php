<?php
  session_start();
	ob_start();

  // Define User Data
  define('UNAME', @$_SESSION['uname']);
  
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

  // Ridirectback WIth data
  function oldPost($request){
    foreach ($request as $a => $b) {
      @$_SESSION['request'] .= htmlentities($a).":".htmlentities($b);
    }
  }

?>