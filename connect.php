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
	
	<style>
		p {
			font-weight: bold;
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div style="text-align:center; margin-top:50px" class="col-xs-12" id="header">
				<img src="images/logo.png">
				<h1 style="display:inline">FoodDoc</h1>
				<hr>
			</div>
		</div>
	</div>
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