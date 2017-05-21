<?php 
session_start();
include("mysql_connect.inc.php");

$accNums = -1;

if (isset($_GET['users'])) {
//    if(!empty($_GET['users'][0]))
//        $accNums = implode(', ', $_GET['users']);
    $accNumArray = $_GET['users'];
    foreach($accNumArray as &$accNum){
        if(!empty($accNum))
            $accNums .= ", $accNum";
    }
}

// DB QUERIES

// all names
$sql = "SELECT accNo, name
        FROM Details
        WHERE accNo IN ($accNums);";
$resultName = mysqli_query($db_link, $sql);

// food listing - like
$sql = "SELECT food, COUNT(*) amt
        FROM Preference 
        WHERE foodStatus = 'like'
            AND accNo IN ($accNums)
        GROUP BY food
        ORDER BY amt DESC;";

$resultLike = mysqli_query($db_link, $sql);

// food listing - dislike
$sql = "SELECT food, COUNT(*) amt
        FROM Preference 
        WHERE foodStatus = 'dislike'
            AND accNo IN ($accNums)
        GROUP BY food
        ORDER BY amt DESC;";

$resultDislike = mysqli_query($db_link, $sql);

// food listing - allergies
$sql = "SELECT food, COUNT(*) amt
        FROM Preference 
        WHERE foodStatus = 'allergies'
            AND accNo IN ($accNums)
        GROUP BY food
        ORDER BY amt DESC;";

$resultAllergies = mysqli_query($db_link, $sql);
?>


<!DOCTYPE HTML>
<html>
    <!-- HEAD -->
    <head>
        <?php include("include/head.inc"); ?>
    </head>
    <!-- body -->
    <body>
        <head>
            <?php include("include/header.inc"); ?>
            <link rel="stylesheet" href="css/grouplist.css">
        </head>
        <!-- GROUP LISTING -->
        <main class="container">
                

            <!-- FOOD LISTING -->
            <section class="foodListing">
                <div class="contentBox">
                    <div class="page-header">
                        <h2> Group List </h2>
                    </div>
                    
                    <div class="panel-group">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <button type="button" class="btn btn-primary btn-block btn-sm" data-toggle="collapse" data-target="#people">People</button>
                            </div>
                            <div id="people" class="collapse">
                                <div class="panel-body">
                                <?php
                                while ($row = mysqli_fetch_row($resultName)) {
                                    echo "<a href=\"profile.php?user=$row[0]\" class=\"btn btn-default btn-sm\">$row[1]</a>, ";
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- THE ACTUALL LISTING PART :) -->
                
                <!-- Listing for Like -->
                <div class="foodContainer contentBox">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#like">Foods we like</button>
                    <div id="like" class="collapse">
                        <ul id="likesList" class="list-group">
                            
                            <li class="list-group-item disabled">
                                <div class="row">
                                    <div class="col-xs-8 foodName">
                                        Food Name
                                    </div>
                                    <div class="col-xs-4">
                                        People
                                    </div>
                                </div>
                            </li>
                            
                            <?php
                            while ($row = mysqli_fetch_row($resultLike)) {
                                echo " <li class=\"list-group-item\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                $row[0]
                                            </div>
                                            <div class=\"col-xs-4\">
                                                $row[1]
                                            </div>
                                        </div>
                                    </li>";
                            }
                            ?>
                        </ul>
                   </div>
                </div>
                
                <!-- Listing for dislike -->
                <div class="foodContainer contentBox">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#dislike">Foods we dislike</button>
                    <div class="collapse" id="dislike">
                        <ul id="likesList" class="list-group">
                            
                            <li class="list-group-item disabled">
                                <div class="row">
                                    <div class="col-xs-8 foodName">
                                        Food Name
                                    </div>
                                    <div class="col-xs-4">
                                        People
                                    </div>
                                </div>
                            </li>
                            
                            <?php
                            while ($row = mysqli_fetch_row($resultDislike)) {
                                echo " <li class=\"list-group-item\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                $row[0]
                                            </div>
                                            <div class=\"col-xs-4\">
                                                $row[1]
                                            </div>
                                        </div>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Listing for allergies -->
                <div class="foodContainer contentBox">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#allergies">Foods we're allergic to</button>
                    <div class="collapse" id="allergies">
                       <ul id="likesList" class="list-group">
                            
                            <li class="list-group-item disabled">
                                <div class="row">
                                    <div class="col-xs-8 foodName">
                                        Food Name
                                    </div>
                                    <div class="col-xs-4">
                                        People
                                    </div>
                                </div>
                            </li>
                            
                            <?php
                            while ($row = mysqli_fetch_row($resultAllergies)) {
                                echo " <li class=\"list-group-item\">
                                        <div class=\"row\">
                                            <div class=\"col-xs-8\">
                                                $row[0]
                                            </div>
                                            <div class=\"col-xs-4\">
                                                $row[1]
                                            </div>
                                        </div>
                                    </li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- end of food listing section -->
        </main>
		
        <?php include("include/footer.inc"); ?>
        
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
