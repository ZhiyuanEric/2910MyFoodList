<?php 
session_start();
include("mysql_connect.inc.php");
$accNo = $_SESSION['accNo'];

// DB QUERIES

// profile name and bio
$sql = "SELECT d.name, d.bio
        FROM Details d
        WHERE d.accNo = $accNo;";
$pName = 'n/a';
$pBio = 'n/a';
$result = mysqli_query($db_link, $sql);
while ($row = mysqli_fetch_row($result)) {
    $pName = $row[0];
    $pBio = $row[1];
}

// food listing - like
$sql = "SELECT p.food
        FROM Preference p
        WHERE p.foodStatus = 'like'
            AND p.accNo = $accNo;";

$resultLike = mysqli_query($db_link, $sql);

// food listing - dislike
$sql = "SELECT p.food
        FROM Preference p
        WHERE p.foodStatus = 'dislike'
            AND p.accNo = $accNo;";

$resultDislike = mysqli_query($db_link, $sql);

// food listing - allergies
$sql = "SELECT p.food
        FROM Preference p
        WHERE p.foodStatus = 'allergies'
            AND p.accNo = $accNo;";

$resultAllergies = mysqli_query($db_link, $sql);
?>


<!DOCTYPE HTML>
<html>
    <!-- HEAD -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>My Profile</title> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <!-- body -->
    <body>
        <!-- HEADER -->
        <header>
            <!-- logo -->
            <div class="container">
                <div id="logo" class="container">
                    <div class="col-xs-12">
                        <img src="images/logo.png">
                    </div>
                </div>
            </div>
            
            <!-- nav bar -->
            <nav class="navbar">
                <div class="container">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Profile</a></li>
                            <li><a href="#">Group List</a></li>
                            <li><a href="affiliated.php">Affiliated Sites</a></li>
                            <li class="logout"><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- END OF HEADER -->

        <?PHP
        if($_SESSION['accNo'] == null){
            echo '<h1 class="container">oops! some error just happened</h1>';
            echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
            exit();
        }
        ?>

        <!-- PROFILE CONTENT -->
        <main class="container">
            <section class="userInfo">
                <div class="row contentBox">
                    <h2> <?PHP echo "$pName"?> </h2>
                    <div class="col-xs-10">
                        <p> <?PHP echo "$pBio"?> </p>
                    </div>
                    <div class="col-xs-2 pull-right">
                        <img class="img-responsive profileImg" src="images/default.jpg" width=128 height=128/>
                    </div>
                </div>
            </section>

            <!-- FOOD LISTING -->
            <section class="foodListing">
                <div class="contentBox">
                    <div class="row text-center profileBreak">
                        <div class="col-xs-10 foodListHeader">
                            <h4> Food List </h4>
                        </div>
                        <div class="col-xs-2">
                            <button class="editBtn">
                                <a href="#">Edit</a>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- THE ACTUALL LISTING PART :) -->
                
                <!-- Listing for Like -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#like" class="foodTabBtn">Likes</button>
                    <div class="collapse" id="like">
                        <ul>
                            <?php
                                while ($row = mysqli_fetch_row($resultLike)) {
                                     echo "<li>$row[0]</li>";
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Listing for dislike -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#dislike" class="foodTabBtn">Dislikes</button>
                    <div class="collapse" id="dislike">
                        <ul>
                           <?php
                            while ($row = mysqli_fetch_row($resultDislike)) {
                                 echo "<li>$row[0]</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
                <!-- Listing for allergies -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#allergies" class="foodTabBtn">Allergies</button>
                    <div class="collapse" id="allergies">
                        <ul>
                            <?php
                            while ($row = mysqli_fetch_row($resultAllergies)) {
                                 echo "<li>$row[0]</li>";
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- end of food listing section -->
        </main>
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
