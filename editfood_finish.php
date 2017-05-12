<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- stick header here -->


<?php
include("mysql_connect.inc.php");

// field extraction
$accNo = $_SESSION['accNo']; // account number / id
$foodItem = $_POST['foodItem']; // apple, star fruit, frog legs
$foodItemNew = $_POST['foodItemNew']; // new name

if ($foodItemNew != null) {
    
    // change
    $sql = "UPDATE Preference 
            SET food = '$foodItemNew'
            WHERE accNo = $accNo
                AND food = '$foodItem';";

    if (mysql_query($sql)) {
        echo "<h1> $foodItem changed to $foodItemNew </h1>";
    } else {
        echo "<h1> unable to change $foodItem to $foodItemNew </h1>";
    }
    
} else {
    
    // remove
    $sql = "DELETE FROM preference 
            WHERE accNo = $accNo
                AND food = '$foodItem';";
        
    if (mysql_query($sql)) {
        echo "<h1> Removed $foodItem from your list </h1>";
    } else {
        echo "<h1> Unable to remove $foodItem from your list </h1>";
    }
}

?>


<meta http-equiv=REFRESH CONTENT=2;url=profile.php>