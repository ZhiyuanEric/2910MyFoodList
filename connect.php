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
		p {
			font-weight: bold;
			text-align: center;
		}
	</style>
</head>
<body>
        <header>
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <img src="https://raw.githubusercontent.com/ZhiyuanEric/2910MyFoodList/Login-Page/images/logo.png">
                    <h1 class="title"> FoodDoc </h1>
                </div>
            </div>
            <div class="container">
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
$id = $_POST['id'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM member_table where username = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

    if(empty($id) || empty($pw)) {
		header("Location:index.php?error=1"); die();
	}

if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)//to check is there empty slot and this member in the database
{
        
        $_SESSION['username'] = $id;
        echo '<p class="green">Logging in success</p>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=profile.php>';
}
else
{
        echo '<p class="red">Login failed!<p>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>