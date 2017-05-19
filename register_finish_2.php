<?php
session_start();

include("mysql_connect.inc.php");
$name = $_POST['name'];
$bio = $_POST['bio'];
$likes = $_POST['likes'];
$dislikes = $_POST['dislikes'];
$allergies = $_POST['allergies'];

    $sql = "INSERT INTO Account (username, accPass) VALUES ('$_SESSION[user]', '$_SESSION[pw]');";

    if(mysqli_query($db_link, $sql)) {
        $userID = '';
        // retreive user id
        $sql = "SELECT a.accNo
                FROM Account a
                WHERE a.username IN ('$_SESSION[user]');";

        $result = mysqli_query($db_link, $sql);
        while($row = mysqli_fetch_row($result)) {
            $userID = $row[0];
        }

        // add the details
        $sql = "INSERT INTO Details VALUES ($userID, '$name', '$bio', 'unknown');";
        mysqli_query($db_link, $sql);

        // add the food
        $sql = "INSERT INTO Preference VALUES ($userID, '$likes', 'like');";
        mysqli_query($db_link, $sql);
        $sql = "INSERT INTO Preference VALUES ($userID, '$dislikes', 'dislike');";
        mysqli_query($db_link, $sql);
        $sql = "INSERT INTO Preference VALUES ($userID, '$allergies', 'allergies');";
        mysqli_query($db_link, $sql);

        $_SESSION['accNo'] = $userID;
        echo 'correct';
    } else {
        echo 'error';
    }
?>
