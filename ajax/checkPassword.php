<?php
	include_once '../config/key.php';

	$user_password = trim($_POST['user_password']);

	$pass = $db->real_escape_string($user_password);
  $password = md5($pass).'098794286';
  $query = $db->query("SELECT * FROM users WHERE id=".UID);
  if($query->num_rows > 0){
    while ($row = mysqli_fetch_object($query)) {
      $hash_pass = $row->password;
      if (password_verify($password, $hash_pass)) {
        echo 'success;:;avc';
      }else{
        echo 'error;:;<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
	              <span>Incorrect password!</span>
	            </div>';
      }
    }    
  }

?>