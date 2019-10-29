<?php

// $user = "1rekMHJ7Mr";
// $password = "Huf14jE5rb";
// $host = "remotemysql.com:3306";
// $dbase = "1rekMHJ7Mr";
// $table = "add-users";

// $user = "root";
// $password = "";
// $host = "localhost";
// $dbase = "park";
// $table = "add-users";


$connection = mysql_connect("remotemysql.com:3306", "Ok8zqA11hb", "s0z5X6XgIB") or die("Error connecting to database: " . mysql_error());
mysql_select_db("Ok8zqA11hb", $connection) or die(mysql_error());



// $connection= mysql_connect ('localhost', 'root', '', 'class_db');
$connection= mysqli_connect ($host, $user, $password, $dbase);
if (!$connection)
{
die ('Could not connect:' . mysqli_error());
}
// mysqli_select_db($dbase, $connection);

// $username_table= mysqli_query( "SELECT username FROM $table WHERE username= '$username'" ) 
// or die("SELECT Error: ".mysql_error()); 

// mysqli_query("INSERT INTO $table (Name, Email) VALUES ('$name', '$email')");

// echo 'You have been added.';

// mysqli_close($connection);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Park Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <style>
         @media only screen and (max-width:800px) {
        body{}}
        #body-row {
            margin-left:0;
            margin-right:0;
        }
        #sidebar-container {
            min-height: 100vh;   
            background-color: #0049B5;
            
        }

        /* Sidebar sizes when expanded and expanded */
        .sidebar-expanded {
            width: 230px;
        }
        .sidebar-collapsed {
            width: 60px;
        }

        /* Menu item*/
        #sidebar-container .list-group a {
            height: 50px;
            color: white;
        }

        /* Submenu item*/
        #sidebar-container .list-group .sidebar-submenu a {
            height: 45px;
            
        }
        .sidebar-submenu {
            font-size: 0.9rem;
        }

        /* Separators */
        .sidebar-separator-title {
            background-color: #0049B5;
            height: 35px;
        }
        .sidebar-separator {
            background-color: #0049B5;
            height: 25px;
        }
        .logo-separator {
            background-color: #0049B5;    
            height: 60px;
        }

        /* Closed submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
        content: " \f0d7";
        font-family: FontAwesome;
        display: inline;
        text-align: right;
       
        }
        /* Opened submenu icon */
        #sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
        content: " \f0da";
        font-family: FontAwesome;
        display: inline;
        text-align: right;
        
        }
        
#submenu{
    background: #1A73E8;
}
li{
    list-style-type: none;
    color:#FFFFFF;
}
li, img{
    margin:10px;
}
#row-1, #row-2{
    background: #FFFFFF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 3px;
margin:5px;
display:flex;
}
#user-profile{
    display: flex;
    border-radius: 50%;
    height:80px;
    width:80px;
    background: #FFB800;
    margin-top:7px;
    margin-left:7px;
}
#initial{
    font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 50px;
line-height: 59px;
margin:auto;
color: #FFFFFF;
}
#user-profile-2{
    display: flex;
    border-radius: 50%;
    height:5rem;
    width:5rem;
    background: #BD03C0;
    margin-top:7px;
    margin-left:7px;
}

#msg-h{
    font-family: Roboto;
font-style: normal;
font-weight: 500;
font-size: 14px;
line-height: 16px;
color: #000000;
}
#date, #time{
    font-family: Roboto;
font-style: normal;
font-weight: normal;
font-size: 10px;
line-height: 12px;
/* identical to box height */

color: #0049B5;

}
textarea{
    background: #F6F6F6;
    display:flex;
}
#btn-send{
    margin-top:-50px;
    background: #0049B5;
    color:#F6F6F6;
    float:right;
}
#time, #date{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 12px;
        color: #0049B5;
        float:center;
        margin:4px;
}
        hr{
        border: 1px solid rgba(119, 119, 119, 0.2);
} 
        #user-name{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        line-height: 12px;
        color: #0049B5; 
        }
        #message{
        margin-left:130px;
        height:auto;
        margin-top: -70px;
}  

        #message, p{
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 16px;
        color: #000000;
} #row-1-1{
        background: #FFFFFF;
        border-radius: 3px;
        height:auto;
        margin:2px;
}
        #user-name-col-2{
        margin-top:30px;
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        color: #1A73E8;
}
        #drop-down-icon{
        float:center;
}
        #icon-link{
        font-family: Roboto;
        font-style: normal;
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        margin-top:40px;
        float:center;
        color: rgba(119, 119, 119, 0.3);
}
        #icon{
        color: #777777;
        margin-top:40px;
        float:left;
}
#user-1{
        border-radius: 50%;
        width: 80px;
        height: 80px;
        margin:1%;
        background: #FFB800;
        display:flex;
   }
        #name{
        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 50px;
        color: #FFFFFF;
        margin:auto;
        text-align: center
   }
   #msg-area{
       margin:30px;
       font-family: Roboto;
font-style: normal;
font-weight: 300;
font-size: 14px;
line-height: 140.7%;
/* or 20px */

color: #000000;
   }
   #compose{
    background: #5CB5FF;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
border-radius: 0px 25px 25px 0px;
height: 50px;
color:#FFFFFF;
margin:20px;
outline: none;
   }
   #plus{
       float:right;
font-size: 24px;
line-height: 28px;

color: #FFFFFF;
   }

    </style>
</head>
<body>
    <div class="container-fluid p-0" style="background-color: #F6F6F6">
        <div class="row " id="body-row">
            <!--For main content area -->
            <div class="col p-0 w-25">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="d-flex">
                        <span id="collapse-menu" data-toggle="sidebar-container" class="fa mr-3 text-muted" style="font-size: 22px; cursor: pointer;"></span>
                    </div>
                    <div class="col-7 p-2 mb-0">  
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="col-8 pt-3 d-flex">
                                <i class="fa fa-user pr-1" aria-hidden="true"></i>
                                <p class="text-muted">John Travolta</p>
                        </div>
                        <div class="col-4  d-flex border-left justify-content-end">
                                <img src="https://res.cloudinary.com/benjee/image/upload/v1571821721/Rectangle_15_cj6nwd.svg" alt="EN" width="25" height="25">
                                <span class="text-muted pl-2">EN</span>
                        </div>
                    </div>
                </nav>
               
                <div class="col shadow">
                     
        </div>
    </div>
  </div>

</div>
<center>
	<div class="row mt-5">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="post" action="send_mail.php">
				<input type="text" name="title" class="form-control" placeholder="title"><br>
				<textarea placeholder="Email content here" class="form-control" name="body"></textarea><br>
				<input type="submit" name="submit" value="send mail">
			</form>
		</div>
		<div class="col-md-3"></div>
		<!-- <form>
			<label>Title</label>
			<input class="form-control" type="" name="">
		</form> -->
	</div>
</center>
    
</body>
</html>

