<?php 
	session_start();
	
?>

<html lang="en">

<?php include("include/head.inc"); ?>
<body>
    <?php include("include/logged_out_header.inc"); ?>
</body>
</html>
<?php

include("mysql_connect.inc.php");
$user = $_POST['user'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM account where username = '$user'";
$result = mysqli_query($db_link, $sql);
$row = @mysqli_fetch_row($result);

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