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

    <link rel="stylesheet" href="css/styles.css">';

echo '<header>
        <div class="container">
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <img src="https://raw.githubusercontent.com/ZhiyuanEric/2910MyFoodList/Login-Page/images/logo.png">
                    <h1 class="title"> FoodDoc </h1>
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

$user = $_SESSION['username'];
if($_SESSION['username'] != null)
{

    //showing the profile
    $sql = "SELECT * FROM member_table WHERE username = '$user' LIMIT 1";
    $result = mysql_query($sql);
    while($row = mysql_fetch_row($result))
    {
        
        echo '<main class="container">
                <section class="userInfo">
                    <div class="row contentBox">
                        <h2>';
        echo "$row[1]";
        
        echo '</h2>
                <div class="col-xs-10">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facete M. Frater et T. Quamvis enim depravatae non sint, pravae tamen esse possunt. Sic enim censent, oportunitatis esse beate vivere. Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum. Quod iam a me expectare noli. Duo Reges: constructio interrete. Nec lapathi suavitatem acupenseri Galloni Laelius anteponebat, sed suavitatem ipsam neglegebat;</p>
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
                        <h4> FoodList </h4>
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
        
        echo "<li>$row[3]</li>";
        
        echo '</ul>
                </div>
            </div>
            <div class="foodContainer contentBox">
                <button data-toggle="collapse" data-target="#dislike" class="foodTabBtn">Dislikes</button>
                <div class="collapse" id="dislike">
                    <ul>';
        
        echo "<li>$row[4]</li>";
        
        echo '</ul>
                </div>
            </div>
            <div class="foodContainer contentBox">
                <button data-toggle="collapse" data-target="#allergies" class="foodTabBtn">Allergies</button>
                <div class="collapse" id="allergies">
                    <ul>';
        
        echo "<li>$row[5]</li>";
        
        echo '</ul>
                    </div>
                </div>
            </section>
        </main> ';
    }
}
else
{
        echo 'oops! some error just happened';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>