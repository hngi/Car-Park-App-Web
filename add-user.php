<?php

$user = "1rekMHJ7Mr";
$password = "Huf14jE5rb";
$host = "remotemysql.com:3306";
$dbase = "1rekMHJ7Mr";
$table = "add-users";

$firstname= $_POST['firstName'];
$lastname= $_POST['lastName'];
$name= '$firstname '.'$lastname';
$email= $_POST['email'];

$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($database, $connection);

$username_table= mysql_query( "SELECT username FROM $table WHERE username= '$username'" ) 
or die("SELECT Error: ".mysql_error()); 

mysql_query("INSERT INTO $table (Name, Email) VALUES ('$name', '$email')");

echo 'You have been added.';

mysql_close($connection);

?>