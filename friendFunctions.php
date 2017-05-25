<?php

session_start();
include("mysql_connect.inc.php");

$accNo = $_POST['userNo']; //other persons acc no
$curNo = $_SESSION['accNo']; //our acc no

    $sql = "SELECT status
            FROM Friends
            WHERE accNo1 = $curNo AND accNo2 = $accNo;";

    $result = mysqli_query($db_link, $sql);
    $row = mysqli_fetch_row($result);

    if ($row[0] == '0' || $row[0] == '1') { //Deleting friend or revoked request
        $sql = "DELETE FROM Friends WHERE accNo1 = $curNo AND accNo2 = $accNo";
        $result = mysqli_query($db_link, $sql);
        if ($result) {
            echo 'deleted';
        }
    } else { //added as friend
        $sql = "INSERT INTO Friends VALUES ($curNo, $accNo, '1');";
        $result = mysqli_query($db_link, $sql);
        if ($result) {
            echo 'inserted';
        }
    }
?>
