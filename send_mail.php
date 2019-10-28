<?php
// $user = "root";
// $password = "";
// $host = "localhost";
// $dbase = "park";
// $table = "add-users";

// $connection = mysqli_connect ($host, $user, $password, $dbase);
// if (!$connection)
// {
// die ('Could not connect:' . mysql_error());
// }else{
// 	echo "Success";
// }

$connection = mysql_connect("remotemysql.com:3306", "Ok8zqA11hb", "s0z5X6XgIB") or die("Error connecting to database: " . mysql_error());
mysql_select_db("Ok8zqA11hb", $connection) or die(mysql_error());

$select = mysqli_query($connection, "SELECT Email from $table");
// $row = mysqli_fetch_array($select);
// $row1 = $row['$row'];
// echo $row1;

if (isset($_POST['submit'])) {
		$title= $_POST['title'];
		$body= $_POST['body'];
		$select = mysqli_query($connection, "SELECT Email from $table");


while ($row = mysqli_fetch_array($select)) {
	$title= $_POST['title'];
	$body= $_POST['body'];
	$row1 = $row['Email'];

	function sendmail(){
	$from = 'Car-Pack-App <mailtolulopedavid@gmail.com>';
	$to = $row1;
    $subject = $title ;
    $message = $body;
    $headers = 'From: ' . $from;
 
if (!mail($to, $subject, $message, $headers))
{
    echo "Error.";
}
else
{
    echo "Message sent.";
}

}

}


}


?>