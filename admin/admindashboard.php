<?php 
 require "includes/query.php";
require_once ("includes/header.php");
if (!$_SESSION['email']) {
  header("location: login.php");
}
?>

<body>
  <h3 class="text-success text-center" id=""><?=$_SESSION['full_name'];?></h3>
</body>
</html>