<?php

include("mysql_connect.inc.php");

$q = $_GET['q'];


$sql = "SELECT name
        FROM Details
        WHERE name LIKE '%$q%';";
$result = mysqli_query($db_link, $sql);

$return = '';
$resultC = 0;

while($row = mysqli_fetch_row($result)){
    $return .= "$row[0] <br \>";
    $resultC++;
}

if($resultC == 0){
    echo 'None';
} else {
    echo $return;
}

?>