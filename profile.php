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

<script>
    function editing() {
        var hid = document.getElementsByClassName("hiddens");
        for (var i = 0; i < hid.length; i++) {
            hid[i].style = "";
        }

    }
</script>

<!DOCTYPE HTML>
<html>
    <!-- HEAD -->
    <head>
        <?php include("include/head.inc"); ?>
        <link rel="stylesheet" href="css/profile.css" />
    </head>
        
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


        <main>
            <div class="container">
                <div class="row">
                    <!-- profile details -->
                    <section class="contentBox col-md-4" id="profileOuter">
                        <div class="row" id="profileUpper">
                            <div class="col-xs-5">
                                <img class="profileImg" src="images/default.jpg" width="128" height="128">
                            </div>
                            <div class="col-xs-7">
                                <p id="profileName">
                                    <?php echo "$pName"; ?>
                                </p>
                                <button onclick="editing()" class="btn btn-default editBtn">Edit</button>
                            </div>
                        </div>
                        <div id="profileLower">
                            <p class="profileDesc">
                                <?php echo "$pBio"; ?>
                            </p>
                        </div>
                    </section>

                    <!-- food listing -->
                    <section class="col-md-8">
                        <div class="contentBox">
                            <div class="row foodListHeader">
                                <h2> Food Preferences </h2>
                            </div>
                            <div class="foodList">

                                <!-- likes -->
                                <form name="form" method="post">
                                <div class="foodListSection">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#like">Foods I like</button>
                                    <div id="like" class="collapse">
                                        <ul class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultLike)) {
                                                 echo "<li class=\"list-group-item\">$row[0]</li>";
                                            }
                                            ?>
                                            <li id="hidden" class="hiddens" style="display:none">
                                                <input type="text" class="form-control" id="likes" name="likes" placeholder="More Likes">
                                            </li>
                                        </ul>
                                   </div>
                                </div>

                                <!-- dislikes -->
                                <div class="foodListSection">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#dislike">Foods I don't like</button>
                                    <div id="dislike" class="collapse">
                                        <ul class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultDislike)) {
                                                 echo "<li class=\"list-group-item\">$row[0]</li>";
                                            }
                                            ?>
                                            <li id="hidden" class="hiddens" style="display:none">
                                                <input type="text" class="form-control" id="dislikes" name="dislikes" placeholder="More Dislikes">
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- allergies -->
                                <div class="foodListSection">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#allergies">Foods I'm allergic to</button>
                                    <div id="allergies" class="collapse">
                                        <ul class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultAllergies)) {
                                                 echo "<li class=\"list-group-item\">$row[0]</li>";
                                            }
                                            ?>
                                              <li id="hidden" class="hiddens" style="display:none">
                                                  <input type="text" class="form-control" id="allergies" name="allergies" placeholder="More Allergies">
                                              </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class = "hiddens" style = "display: none">
                                  <button type="submit">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
      </main>
        <!-- end of profile content -->

        <!-- scripts -->
		<script>
			$(document).ready(function(){
				$(".nav li:nth-child(1)").addClass("active");
			});
		</script>
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
