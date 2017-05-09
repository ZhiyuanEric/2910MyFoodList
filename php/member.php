<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<title>My Profile</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';

echo '<header>
        <div class="container">
            <div id="logo">LOGO</div>
        </div>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Page 1</a></li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
      </header>';

$user = $_SESSION['username'];
if ($_SESSION['username'] != null)
{
    echo '<main class="container">';
    
        //showing the profile
        $sql = "SELECT * FROM member_table WHERE username = '$user' ";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result))
        {
                echo '<section class="userInfo"><h2>';
                    echo "Name：$row[1]";
                    echo '</h2>
                        <div class="col-xs-9">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Facete M. Frater et T. Quamvis enim depravatae non sint, pravae tamen esse possunt. Sic enim censent, oportunitatis esse beate vivere. Habes, inquam, Cato, formam eorum, de quibus loquor, philosophorum. Quod iam a me expectare noli. Duo Reges: constructio interrete. Nec lapathi suavitatem acupenseri Galloni Laelius anteponebat, sed suavitatem ipsam neglegebat;</p>
                        </div>
                        <div class="col-xs-3">
                            <img src="images/default.jpg" width=128 height=128/>
                            <button>
                                <a href="#">Edit</a>
                            </button>
                        </div>
                      </section>';
                echo  
                    "Likes：$row[3]<br>
                    Dislikes：$row[4]<br> 
                    Allergies：$row[5]<br>";
        }
}
else
{
        echo 'oops! some error just happened';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>