
<?php require "includes/query.php";?>
<?php include ("includes/header.php"); ?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10 offset=md-1" id="main">
        <div class="row">
          <div class="colmd-5 register-left">
            <img src="img/md_5a9bf38b75c51.png" alt="">
            <h3>Join Us</h3>
            <p>SignUp or LognIn for Free Here</p>
            <button class="btn btn-primary"><a href="sign_up.php">Sign Up</a></button>
          </div>
          <div class="colmd-7 register-right">
            <?php
              if (isset($error)) {
                echo '<div class="text-warning text-center font-weight-bold">'.$error.'</div>';
              }
            ?>
            <h2>LogIn</h2>
            <form action="" method="post">
              <div class="register-form">
                <div class="form-group"><input type="email" class="form-control" placeholder="Email" name="email"></div>
              </div>
              <div class="register-form">
                <div class="form-group"><input type="password" class="form-control" placeholder="Password" name="password"></div>
              </div>
              <button class="btn btn-success" type="submit" name="login-btn">LogIn</button>
              <p class="reset">Did You Forgot Your Password <br> <span><a href="reset_password.php">Re-set password Here</a></span>.</p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>