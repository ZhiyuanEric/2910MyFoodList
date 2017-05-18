<?php
	session_start();
?>
<?php

if (!isset($_GET['reg'])) {
	include("gplus.php");
}

include("mysql_connect.inc.php");

if (isset($_SESSION['user']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {
	$user = $_SESSION['user'];
	$pw = $_SESSION['user'];
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
} else {
	$user = $_POST['user'];
	$pw = $_POST['pw'];
}
$sql = "SELECT * FROM Account where username = '$user'";
$result = mysqli_query($db_link, $sql);
$row = mysqli_fetch_row($result);

//If google account doesn't exist in database
if (($row[1] != $user) && isset($_SESSION['user']) && isset($_SESSION['name']) && isset($_SESSION['email'])) {

	$sql = "INSERT INTO Account (username, accPass) VALUES ('$user', '$pw');";
	$result = mysqli_query($db_link, $sql);

	$userID = '';
	// retreive user id
	$sql = "SELECT a.accNo
			FROM Account a
			WHERE a.username IN ('$user');";

	$result = mysqli_query($db_link, $sql);
	while($row = mysqli_fetch_row($result)) {
		$userID = $row[0];
	}

	$sql = "INSERT INTO Details VALUES ($userID, '$name', '$email', 'unknown');";
	mysqli_query($db_link, $sql);
}

//If google user is signing in
if (!isset($_GET['reg']) && $row[1] == $user && $row[2] == $pw) {
	$_SESSION['accNo'] = $row[0];
	header("Location:profile.php"); die();
}

//If regular user is signing in
if ($row[1] == $user && $row[2] == $pw) {
	$_SESSION['accNo'] = $row[0];
	echo $user;
}

/*
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
}*/
?>
