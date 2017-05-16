<?php 
session_start();
include("mysql_connect.inc.php");

$accNo = -1;

if($_GET){
    $accNo = $_GET['user'];
} else if ($_SESSION) {
        $accNo = $_SESSION['accNo'];
}

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
	<?php include("include/head.inc"); ?>
	
    <!-- body -->
    <body>
		<?php include("include/logged_in_header.inc"); ?>

        <?PHP
        if($accNo == -1){
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
		
		<script>
			$(document).ready(function(){
				$(".nav li:nth-child(1)").addClass("active");
			});
		</script>
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
