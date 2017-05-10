<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("mysql_connect.inc.php");
$user = $_POST['user'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM account where username = '$user'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

if($user != null && $pw != null && $row[1] == $user && $row[2] == $pw)//to check is there empty slot and this member in the database
{
        
        $_SESSION['accNo'] = $row[0];
        echo 'Logging in success';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else
{
        echo 'Login failed!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>