<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$userID= $_SESSION['accNo'];
$name= $_POST['name'];
$bio = $_POST['bio'];
$likes = $_POST['likes'];
$dislikes = $_POST['dislikes'];
$allergies = $_POST['allergies'];



echo '<title>Editting Page</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/registerfinish.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/style.css">';



echo '<header>
        <div class="container">
            <div id="logo" class="container">
                <div class="col-xs-12">
                    <img src="https://raw.githubusercontent.com/ZhiyuanEric/2910MyFoodList/Login-Page/images/logo.png">
                    <h1 class="title"> iPicky </h1>
                </div>
            </div>
        </div>
    </header>';



$sql = "UPDATE details SET name= '$name', bio='$bio' WHERE accNO='$userID'";


//$sql = "UPDATE preference SET likes= '$likes', dislike='$dislikes', allergies='$allergies'";
//mysql_query($sql);
//
//$sql = "UPDATE `preference` SET food='$likes' WHERE foodStatus='like' and accNo='$userID'";
//
//mysql_query($sql);
//
//
//
//$sql = "UPDATE `preference` SET food='$dislikes' WHERE foodStatus='dislike' and accNo='$userID'";
//
//mysql_query($sql);
//
//
//$sql = "UPDATE `preference` SET food='$allergies' WHERE foodStatus='allergies' and accNo='$userID'";
//
//mysql_query($sql);


if (mysql_query($sql)){

    echo '<main>
                <div class="register">
                    Changes saved
                </div> 
              </main>';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=profile.php>';
}
else{
        echo '<main>
                <div class="register">
                    changes are not saved
                </div> 
              </main>';
    echo '<meta http-equiv=REFRESH CONTENT=2;url=profile.php>';



}
?>