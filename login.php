<?php require_once "config/autoconfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./css/login.css" type="text/css" />
    <link
      href="https://fonts.googleapis.com/css?family=Roboto&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <title>LogIn Page</title>
  </head>

  <body>
    <div class="container">
        
      <form class="form" action="#" method="post">
        <h1>Admin Login</h1>
        <br />
        <?php
          if (isset($error)) {
            echo '<div style="color:red; text-align:center; font-weight:bold">'.$error.'</div>';
          }
        ?>
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" class="placeicon" placeholder="&#xf007;  " onblur="validateMail()" required/>
        <b id="emError" style="color:lightcoral; font-size:14px"></b>
        <br />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="placeicon" placeholder="&#xf2bb;  " onblur="validatePasword()" required/>
        <div id="checkitems">
          <div class="div-2">
            <b id="passError" style="color:lightcoral; font-size:14px "></b>
            <a href="" id="forgot-password">Forgot Password?</a>
          </div>
        </div>
        <br />
        <div id="btns" class="btns">
          <button class="btn login" name="login-btn" type="submit" value="Login" onclick="login()">Login</button>
        </div>
      </form>
      <div class="side2">
        <img class="img1" src="map.JPG" alt="map-background" />
        <img class="img2" src="logo.png" alt="car-park-logo" />
      </div>
    </div>
    <script type="text/javascript">
      var evalidated = false;
      var pvalidated = false;
      function validateMail() {
        var em = email.value;
        var check = em.search("@");
        if (check < 0) {
          emError.innerHTML = "You have not entered a valid email";
          evalidated = false;
        } else {
          emError.innerHTML = "";
          evalidated = true;
        }
      }

      function validatePasword() {
        var alphanum = /^[0-9a-zA-Z]+$/;

        if (
          password.value.match(alphanum) &&
          password.value.length > 5 &&
          password.value.length < 15
        ) {
          passError.innerHTML = "";
          pvalidated = true;
        } else {
          passError.innerHTML =
            "Password must incude numbers or characters only (min 5, max 15)";
          pvalidated = false;
        }
      }

      function login() {
        if (evalidated && pvalidated) {
          window.location = "index.php";
        } else {
        }
      }
    </script>
  </body>
</html>
