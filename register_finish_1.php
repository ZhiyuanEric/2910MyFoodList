<?php
session_start();

include("mysql_connect.inc.php");
$user = htmlspecialchars($_POST['user']);
$pw = htmlspecialchars($_POST['pw']);
$pw2 = htmlspecialchars($_POST['pw2']);

$pw = md5($pw);
$pw2 = md5($pw2);

$_SESSION['user'] = $user;
$_SESSION['pw'] = $pw;

//Check if fields are empty
if($user != null && $pw != null && $pw2 != null) {
    //Check if passwords are the same
    if ($pw == $pw2) {

    //check if account already exists
    $sql = "SELECT username FROM Account WHERE username = ('$user')";
    $result = mysqli_query($db_link, $sql);
    $row = mysqli_fetch_row($result);
    //$sql = "INSERT INTO Account (username, accPass) VALUES ('$user', '$pw');";

        if($row == 0) {
            $userID = '';
            // retreive user id
            $sql = "SELECT a.accNo
                    FROM Account a
                    WHERE a.username IN ('$user');";

            $result = mysqli_query($db_link, $sql);
            while($row = mysqli_fetch_row($result)) {
                $userID = $row[0];
            }
            echo 'correct';
        }
        else {
            echo 'exists';
        }
    } else {
        echo 'diffpw';
    }
}
?>
