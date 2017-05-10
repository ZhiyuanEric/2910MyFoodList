<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$user = $_POST['user'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$likes = $_POST['likes'];
$dislikes = $_POST['dislikes'];
$allergies = $_POST['allergies'];


if($user != null && $pw != null && $pw2 != null && $pw == $pw2)//checking is there empty field and is the password the same
{
        
        $sql = "INSERT INTO Account (username, accPass) VALUES ('$user', '$pw');";
        if(mysql_query($sql))
        {
                echo 'Registering succeed!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo 'Registering fail!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
}
else
{
        echo 'the passwords are different or there is empty field!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>