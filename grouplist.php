<?php 
session_start();
include("mysql_connect.inc.php");

$accNums = -1;

if (isset($_GET['users'])) {
    if(!empty($_GET['users'][0]))
        $accNums = implode(', ', $_GET['users']);
//    $accNumArray = $_GET['users'];
//    foreach($accNumArray as &$accNum){
//        $accNums .= ", $accNum";
//    }
}

// DB QUERIES

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
	<?php include("include/head.inc"); ?>
    <!-- body -->
    <body>
        <head>
            <?php include("include/logged_in_header.inc"); ?>
            <link rel="stylesheet" href="css/grouplist.css">
        </head>
        <!-- GROUP LISTING -->
        <main class="container">
            <div class="contentBox">
                <h2> GROUP LIST </h2>
            </div>

            <!-- FOOD LISTING -->
            <section class="foodListing">
                <div class="contentBox">
                    <div class="text-center profileBreak">
                        <div class="foodListHeader">
                            <h4> Food List </h4>
                            <?php echo "<p>$accNums</p>"; ?>
                        </div>
                    </div>
                </div>

                <!-- THE ACTUALL LISTING PART :) -->
                
                <!-- Listing for Like -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#like" class="foodTabBtn">Likes</button>
                    <div class="collapse" id="like">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <colgroup>
                                    <col class="colFood" />
                                    <col class="colAmt" />
                                </colgroup>
                                <thread>
                                    <tr>
                                        <th>Food</th>
                                        <th>People</th>
                                    </tr>
                                </thread>
                                <tbody>
                                <?php
                                    while ($row = mysqli_fetch_row($resultLike)) {
                                         echo " <tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>
                                                </tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Listing for dislike -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#dislike" class="foodTabBtn">Dislikes</button>
                    <div class="collapse" id="dislike">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <colgroup>
                                    <col class="colFood" />
                                    <col class="colAmt" />
                                </colgroup>
                                <thread>
                                    <tr>
                                        <th>Food</th>
                                        <th>People</th>
                                    </tr>
                                </thread>
                                <tbody>
                                <?php
                                    while ($row = mysqli_fetch_row($resultDislike)) {
                                         echo " <tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>
                                                </tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Listing for allergies -->
                <div class="foodContainer contentBox">
                    <button data-toggle="collapse" data-target="#allergies" class="foodTabBtn">Allergies</button>
                    <div class="collapse" id="allergies">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <colgroup>
                                    <col class="colFood" />
                                    <col class="colAmt" />
                                </colgroup>
                                <thread>
                                    <tr>
                                        <th>Food</th>
                                        <th>People</th>
                                    </tr>
                                </thread>
                                <tbody>
                                <?php
                                    while ($row = mysqli_fetch_row($resultAllergies)) {
                                         echo " <tr>
                                                    <td>$row[0]</td>
                                                    <td>$row[1]</td>
                                                </tr>";
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of food listing section -->
        </main>
		
		<script>
			$(document).ready(function(){
				$(".nav li:nth-child(2)").addClass("active");
			});
		</script>
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
