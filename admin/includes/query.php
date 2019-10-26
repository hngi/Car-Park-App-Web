<?php
require "autoConn.php";
  //login
  if (isset($_POST['login-btn'])) {
    $error = '';
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);
  
    if (empty($email)) {
      
      $error = 'email is required..';
    }
    if (empty($password)) {
      
      $error = 'password is required..';
    }
  
    //check if email/username exist
    $userExist = mysqli_query($db,"SELECT * FROM admin WHERE email = '$email'");
    $userCount = mysqli_num_rows($userExist);
    $userFetch = mysqli_fetch_assoc($userExist);  
    if ($userCount == 0 || !password_verify($password, $userFetch['user_password'])) {
      $error = 'Invalid credential try again..';
    }
  
    //login user
    if (empty($error)) {
      $_SESSION['full_name'] = $userFetch['full_name'];
      $_SESSION['email'] = $userFetch['email'];
      $user_id = $userFetch['full_name'];
      // login($user_id);
      $_SESSION['success_flash'] = "<h3 class='text-center text-success'>You are now logged in</h3>";
      header('location: admindashboard.php');
    }
  }

?>