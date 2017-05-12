<?php 
	session_start();
	
?>

<html lang="en">
<head>
	<title>FoodDoc</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/header.css">
	
	<style>
		h2 {
			font-weight: bold;
			text-align: center;
			margin-top: 50px;
		}
		.red {
			color: red;
		}
		.green {
			color: green;
		}
	</style>
</head>
<body>
        <header>
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <img src="images/logo.png">
                </div>
            </div>
            <div>
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>
<?php

include("mysql_connect.inc.php");
$user = $_POST['user'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM account where username = '$user'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

    if(empty($user) || empty($pw)) {
		header("Location:index.php?error=1"); die();
	}

if($user != null && $pw != null && $row[1] == $user && $row[2] == $pw)//to check is there empty slot and this member in the database
{
        
        $_SESSION['accNo'] = $row[0];
        echo '<h2 class="green">Login success</h2>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=profile.php>';
}
else
{
        echo '<h2 class="red">Login failed!<h2>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>