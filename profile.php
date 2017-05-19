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
    <link rel="stylesheet" href="css/profile.css" />

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
                            <div id="imgdiv" class="col-xs-5 col-sm-3 col-md-6 col-lg-5">
                                <img class="profileImg" src="images/default.jpg" width="128" height="128">
                            </div>
                            <div id="namediv" class="col-xs-7 col-sm-9 col-md-6 col-lg-7">
                                <p id="profileName">
                                    <?php echo "$pName"; ?>
                                </p>
								<?php if (isset($_SESSION['accNo']) && $_SESSION['accNo'] == $accNo) {
									echo '<button onclick="editing()" class="btn btn-default editBtn">Edit</button>';
								}
                               	?>
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
                                <div class="foodListSection row">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#like">Foods I like</button>
                                    <div id="like" class="collapse">
                                        <ul id="likesList" class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultLike)) {
                                                echo "<div class=\"likesDiv\">";
                                                echo "<li class=\"list-group-item\">$row[0]</li>";
                                                echo "</div>";
                                            }
                                            ?>
                                        <li id="likesHidden" class="hiddens" style="display:none">
                                            <input type="text" class="col-xs-10 list-group-item" id="likes" name="likes" placeholder="More Likes">
                                            <button style="margin-bottom:10px;" type="button" id="moreLikes" class="btn btn-primary col-xs-2">+</button>
                                            <div style="text-align:center" id="likesError" class="col-xs-12 row"></div>
                                        </li>
                                        </ul>
                                   </div>
                                </div>

                                <!-- dislikes -->
                                <div class="foodListSection row">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#dislike">Foods I don't like</button>
                                    <div id="dislike" class="collapse">
                                        <ul id="dislikesList" class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultDislike)) {
                                                 echo "<div class=\"dislikesDiv\">";
                                                 echo "<li class=\"list-group-item\">$row[0]</li>";
                                                 echo "</div>";
                                            }
                                            ?>
                                            <li id="dislikesHidden" class="hiddens" style="display:none">
                                                <input type="text" class="col-xs-10 list-group-item" id="dislikes" name="dislikes" placeholder="More Dislikes">
                                                <button style="margin-bottom:10px;" type="button" id="moreDislikes" class="btn btn-primary col-xs-2">+</button>
                                                <div style="text-align:center" id="dislikesError" class="col-xs-12 row"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- allergies -->
                                <div class="foodListSection row">
                                    <button type="button" class="foodBtn btn btn-default" data-toggle="collapse" data-target="#allergy">Foods I'm allergic to</button>
                                    <div id="allergy" class="collapse">
                                        <ul id="allergiesList" class="list-group">
                                            <?php
                                            while ($row = mysqli_fetch_row($resultAllergies)) {
                                                 echo "<div class=\"allergiesDiv\">";
                                                 echo "<li class=\"list-group-item\">$row[0]</li>";
                                                 echo "</div>";
                                            }
                                            ?>
                                          <li id="allergiesHidden" class="hiddens" style="display:none">
                                              <input type="text" class="col-xs-10 list-group-item" id="allergies" name="allergies" placeholder="More Allergies">
                                              <button type="button" id="moreAllergies" class="btn btn-primary col-xs-2">+</button>
                                              <div style="text-align:center" id="allergiesError" class="col-xs-12 row"></div>
                                          </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="hiddens" style="display:none;">
                                  <button class="btn btn-default" type="submit">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
      </main>
        <!-- end of profile content -->

            <?php include("include/footer.inc"); ?>

        <!-- scripts -->
        <script src="js/profile.js"></script>
    </body>
    <!-- END OF PROFILE CONTENT -->
</html>
