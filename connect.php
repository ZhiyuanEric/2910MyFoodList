<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

include("mysql_connect.inc.php");
$id = $_POST['id'];
$pw = $_POST['pw'];
$sql = "SELECT * FROM member_table where username = '$id'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

if($id != null && $pw != null && $row[1] == $id && $row[2] == $pw)//to check is there empty slot and this member in the database
{
        
        $_SESSION['username'] = $id;
        echo 'Logging in success';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=member.php>';
}
else
{
        echo 'Login failed!';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>