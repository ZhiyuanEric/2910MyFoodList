<?php
session_start();
?userList = $_SESSION['mergeNos'];
?>

<!DOCTYPE HTML>
<html>
    <head>
        <?php include("include/head.inc"); ?>
    </head>
    <body>
        <?php include("include/logged_in_header.inc"); ?>
        
        
        <main class="container">
            <div class="contentBox">
                <form name="form" method="get" action="grouplist.php">
                    <button type"submit">Go</button>
                    <input type="text" name="users[]" />
                    <?php
                    for($userList as &$userNo){
                        echo "<input type=\"text\" name=\"users[]\" value=\"$userNo\"/>";
                    }
                    unset($userNo);
                    ?>
                </form>
            </div>
        </main>
    </body>
</html>