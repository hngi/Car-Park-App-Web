<?php
 //Database connection

  define('DB_HOST','localhost');
  define('DB_USER','root');
  define('DB_PASSWORD','');
  define('DB_NAME','cark_park');

  $db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

  if (mysqli_connect_errno()) {
    echo 'not connected with the following error: '.mysqli_connect_error();
    die();
  } else{
    //echo 'Connected  to database';
  }
  session_start();

  //success message
  if (isset($_SESSION['success_flash'])) {
    echo '<div class="message"><h5 class="alert alert-success text-center " id="message">'.$_SESSION['success_flash'].'</h6></div>';
    unset($_SESSION['success_flash']);
  }
  //erro message
  if (isset($_SESSION['error_flash'])) {
    echo '<div class="message"><h5 class="alert alert-danger text-center ">'.$_SESSION['error_flash'].'</h5></div>';
    unset($_SESSION['error_flash']);
  }

 


