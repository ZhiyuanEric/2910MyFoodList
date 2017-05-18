<?php 
session_start();
include("mysql_connect.inc.php");

$name = ' ';

if(isset($_GET['user'])){
    $name = $_GET['user'];
}

// DB QUERIES

$sql = "SELECT accNo, name
        FROM Details
        WHERE name LIKE '%$name%';";

$result = mysqli_query($db_link, $sql);

$sql = "SELECT COUNT(*) amt
        FROM Details
        WHERE name LIKE '%$name%';";

$resultCount = mysqli_fetch_row(mysqli_query($db_link, $sql))[0];
?>


<!DOCTYPE HTML>
<html>
    <!-- HEAD -->
	<?php include("include/head.inc"); ?>
    <link rel="stylesheet" href="css/result.css">
	
    <!-- body -->
    <body>
        <!-- header -->
        <?php include("include/logged_in_header.inc"); ?>
        
        <!-- result listing  -->
        <main>
            <div class="container">
                <ul class="list-group">
                    <?php 
                    echo "<li class=\"list-group-item active\">Result: $resultCount found</li>";
                    while ($row = mysqli_fetch_row($result)) {
                        echo "<li><a href=\"profile.php?user=$row[0]\" class=\"list-group-item list-group-item-action\">$row[1]</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </main>
        <!-- end of result listing -->
        
        <!-- footer -->
        <!-- <?php include("include/footer.inc"); ?> -->
        
    </body>
    
</html>
