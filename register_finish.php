<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$id = $_POST['id'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$likes = $_POST['likes'];
$dislikes = $_POST['dislikes'];
$allergies = $_POST['allergies'];


if($id != null && $pw != null && $pw2 != null && $pw == $pw2)//checking is there empty field and is the password the same
{
        
        $sql = "insert into member_table (username, password, likes, dislikes, allergies) values ('$id', '$pw', '$likes', '$dislikes', '$allergies')";
        if(mysql_query($sql))
        {
                echo 'Registering succeed!';
                $_SESSION["msg"] = 'Registering succeed!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
                echo 'Registering fail!';
                $_SESSION["msg"] = 'Registering fail!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
}
else
{
        echo 'the passwords are different or there is empty field!';
        $_SESSION["msg"] = 'the passwords are different or there is empty field!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
}
?>