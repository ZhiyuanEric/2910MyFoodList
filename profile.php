<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

echo '<title>My Profile</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/profile.css">';

echo '<header>
        <div class="container">
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <h1 class="title">iPicky</h1>
                </div>
            </div>
        </div>
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
    </header>';

$accNo = $_SESSION['accNo'];
if($_SESSION['accNo'] != null)
{

    //showing the profile
    
    // for name
    $sql = "SELECT d.name, d.bio
            FROM Details d
            WHERE d.accNo = $accNo;";
    $pName = 'n/a';
    $pBio = 'n/a';
    $result = mysql_query($sql);
    while($row = mysql_fetch_row($result)) {
        $pName = $row[0];
        $pBio = $row[1];
    }
    
    
    echo '<main class="container">
            <section class="userInfo">
                <div class="row contentBox">
                    <h2>'; 
    echo "$pName";
    
    echo '</h2>
            <div class="col-xs-10">
                <p>';
    
    echo "$pBio";
    
    echo '</p>
            </div>
            <div class="col-xs-2 pull-right">
                <img class="img-responsive profileImg" src="images/default.jpg" width=128 height=128/>
            </div>
        </div>
    </section>

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

        <div class="foodContainer contentBox">
            <button data-toggle="collapse" data-target="#like" class="foodTabBtn">Likes</button>
            <div class="collapse" id="like">
                <ul>';

    // for likes
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'like'
                AND p.accNo = $accNo;";
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }

    echo '</ul>
            </div>
        </div>
        <div class="foodContainer contentBox">
            <button data-toggle="collapse" data-target="#dislike" class="foodTabBtn">Dislikes</button>
            <div class="collapse" id="dislike">
                <ul>';

    // for dislikes
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'dislike'
                AND p.accNo = $accNo
            ;";
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }

    echo '</ul>
            </div>
        </div>
        <div class="foodContainer contentBox">
            <button data-toggle="collapse" data-target="#allergies" class="foodTabBtn">Allergies</button>
            <div class="collapse" id="allergies">
                <ul>';

    // for allergies
    $sql = "SELECT p.food
            FROM Preference p
            WHERE p.foodStatus LIKE 'allergies'
                AND p.accNo = $accNo
            ;";
    
    $result = mysql_query($sql);
    
    while($row = mysql_fetch_row($result)) {
         echo "<li>$row[0]</li>";
    }

    echo '</ul>
                </div>
            </div>
        </section>
    </main> ';
    
}
else
{
        echo 'oops! some error just happened';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>