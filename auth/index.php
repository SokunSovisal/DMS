<?php

  // Basic Variable
  $title = '';

  // Call Key
  include('../config/key.php');

  if (isset($_POST['signin'])) {

    $pass = $db->real_escape_string($_POST['password']);
    $password = md5($pass).'098794286';
    
    $email = $db->real_escape_string(@$_POST['email']);
    

    $query = $db->query("SELECT * FROM users WHERE email='$email'");
    if($query->num_rows > 0){
      while ($row = mysqli_fetch_object($query)) {
        $hash_pass = $row->password;
        if (password_verify($password, $hash_pass)) {
          if ($row->u_status==1) {
            $_SESSION['uid'] = $row->id;
            $_SESSION['uname'] = $row->u_name;
            $_SESSION['uimg'] = $row->u_image;
            $_SESSION['urole'] = $row->u_role;
            $_SESSION['vsloggl'] = true;
            header('location: ../index.php');
          }else{
            @$_SESSION['error'] = '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
                                    <span>Sorry, your account has been suspended!</span>
                                  </div>';
            $_SESSION['vsloggl'] = false;
            header('location: login.php');
          }
        }else{
          @$_SESSION['error'] = '<div class="alert alert-danger">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
                                  <span>Sorry, your password dosen\'t match with email!</span>
                                </div>';
          $_SESSION['vsloggl'] = false;
          header('location: login.php');
        }
      }    
    }else{
      @$_SESSION['error'] = '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button>
                              <span>Sorry, your email dosen\'t match our record!</span>
                            </div>';
      $_SESSION['vsloggl'] = false;
      header('location: login.php');
    }
    // password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
    // bool password_verify ( string $password_outside , string $hash_in_db )
  }

?>