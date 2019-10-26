<?php

//Block 1
$user = "1rekMHJ7Mr"; //Enter the user name
$password = "Huf14jE5rb"; //Enter the password
$host = "remotemysql.com:3306"; //Enter the host
$dbase = "1rekMHJ7Mr"; //Enter the database
$table = "carparks"; //Enter the table name

//Block 2
$firstname= $_POST['firstName'];
$lastname= $_POST['lastName'];
$email= $_POST['email'];

//Block 3
$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($database, $connection);


//Block 4
$username_table= mysql_query( "SELECT username FROM $table WHERE username= '$username'" ) 
or die("SELECT Error: ".mysql_error()); 


//Block 5
mysql_query("INSERT INTO $table (column1, column2, column3)
VALUES (value1, value2, value 3)");

//Block 6
echo 'You have been added.';

//Block 7
mysql_close($connection);

?>