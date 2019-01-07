<?php

  // Basic Variable
  $title = '';

  // Call Key
  include('../config/key.php');

  if (isset($_POST['signin'])) {

    $pass = $db->real_escape_string($_POST['password']);
    $password = md5($pass).'098794286';
    
    $email = $db->real_escape_string(@$_POST['email']);
    
    $stm = "SELECT * FROM users WHERE email='$email'";

    if(mysqli_num_rows($db->query($stm)) > 0){
      $hash_pass = $row['password'];
      if (password_verify($password, $hash_pass)) {
        if ($row['status']==1) {
          $_SESSION['uid'] = $row['id'];
          $_SESSION['uname'] = $row['u_name'];
          $_SESSION['uimg'] = $row['u_image'];
          $_SESSION['urole'] = $row['u_role_id'];
          $_SESSION['vsloggl'] = true;
          header('location: ../dashboard.php');
        }else{
          $_SESSION['error'] = "Sorry, your account has been suspended!";
          $_SESSION['vsloggl'] = false;
          header('location: login.php');
        }
      }else{
        $_SESSION['error'] = "Sorry, your password dosen't match with email!";
        $_SESSION['vsloggl'] = false;
        header('location: login.php');
      }
    }else{
      $_SESSION['error'] = "Sorry, your email dosen't match our record!";
      $_SESSION['vsloggl'] = false;
      header('location: login.php');
    }
    
    // password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
    // bool password_verify ( string $password_outside , string $hash_in_db )
  }

?>