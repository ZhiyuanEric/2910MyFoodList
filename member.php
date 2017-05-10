<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">Logout</a>  <br><br>';

$accNo = $_SESSION['accNo'];
if($_SESSION['accNo'] != null) {
    
    echo '<a href="updateprof.php">edit</a>  <br><br>';

    
    // for user id
    echo "<h2>UserID:</h2> $accNo<br>";
    
    
    // for likes
    $sql = "SELECT d.name
            FROM Details d
            WHERE d.accNo = $accNo
            ;";
    
    echo '<h2>Name:</h2>';
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
        echo "$row[0]<br>";
    }
    
    
    // for likes
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'like'
                AND p.accNo = $accNo
            ;";
    
    echo '<h2>Likes:</h2><ul>';
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }
    
    // for dislikes
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'dislike'
                AND p.accNo = $accNo
            ;";
    
    echo '</ul><h2>Dislikes:</h2><ul>';
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }
    
    // for allergies
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'allergies'
                AND p.accNo = $accNo
            ;";
    
    echo '</ul><h2>Allergies:</h2><ul>';
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }
    
    echo '</ul>';
    
} else {
    echo 'oops! some error just happened';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>