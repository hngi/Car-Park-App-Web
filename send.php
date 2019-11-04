<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "park";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }else{
// 	echo "success";
// }

// $sql = "SELECT Email FROM add_users";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // while($row = mysqli_fetch_assoc($result)) {
    //     echo "id: " . $row["Email"];
    // }
// } else {
//     echo "0 results";
// }

// mysqli_close($conn);
?>

<?php
require 'PHPMailerAutoload.php';
 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "park";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}else{
			echo "success";
		}
        /*** $message = a message saying we have connected ***/
 
        /*** prepare the select statement ***/
         $sql = "SELECT Email FROM add_users";
		$result = mysqli_query($conn, $sql);

 		 while($row = mysqli_fetch_assoc($result)) {

    		    // echo "id: " . $row["Email"];
    		    $email = $row['Email'];
    		    $name = $row['Name'];	
    		    sendEmail($email, $name);
 		   }
		 
	function sendEmail($email, $name){
 
		$mail = new PHPMailer;
 
		$htmlversion="<p style='color:red;'>Hi ".$name.", <br><br>";
		$textVersion="Hi ".$name.",.\r\n  ";
		$mail->isSMTP();                                     		 // Set mailer to use SMTP
		$mail->Host = 'host Name';  								// Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                                // Enable SMTP authentication
		$mail->Username = 'SMTP username';         			  // SMTP username
		$mail->Password = 'SMTP password';                      // SMTP password
		$mail->Port = 25;                                   // TCP port to connect to
		$mail->setFrom('test@test.com', 'Test Email');
		$mail->addAddress($email);               // Name is optional
		//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->Subject = 'Test Email Subject';
		$mail->Body    = $htmlversion;
		$mail->AltBody = $textVersion;
 
	if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent to User name : '.$name.' Email:  '.$email.'<br><br>';
	}
}

mysqli_close($conn);
?>