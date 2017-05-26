<?php
session_start();
include("mysql_connect.inc.php");
$accNo = $_SESSION['accNo'];

// profile name and bio
$sql = "SELECT d.accNo, d.name, d.bio, d.image
        FROM Details d
	    JOIN Friends f
        ON d.accNo = f.accNo2
        WHERE f.status = '1' AND f.accNo1 = $accNo;";

$friendAccNos = array();
$friendNames = array();
$friendBios = array();
$friendImgs = array();

$result = mysqli_query($db_link, $sql);
while ($row = mysqli_fetch_row($result)) {
    array_push($friendAccNos, $row[0]);
    array_push($friendNames, $row[1]);
    array_push($friendBios, $row[2]);
    array_push($friendImgs, $row[3]);
}
?>


 <!DOCTYPE HTML>
 <html>
     <!-- HEAD -->
     <head>
         <?php include("include/head.inc"); ?>
         <link rel="stylesheet" href="css/friendslist.css"/>
         <link rel="stylesheet" href="css/footerpush.css"/>
     </head>
     
     <body>

        <?php include("include/header.inc"); ?>
         
         
        <h2> Friends List </h2>
         

         <div class="container">
                <?php
                    for ($i = 0; $i < count($friendNames); $i++) {
                        echo
                        '<div class="friend contentBox col-xs-12">
                            <div class="col-xs-2">
                                <img id="' . $friendAccNos[$i] . '" class="friendImg" src="' . $friendImgs[$i] . '" width="128" height="128"/>
                            </div>
                            <div class="col-xs-10">
                                <div id="' . $friendAccNos[$i] . '" class="friendName col-xs-12">' . $friendNames[$i] . '</div>
                                <div class="friendBio col-xs-12">' . $friendBios[$i] . '</div>
                            </div>
                        </div>';
                    }
                ?>
         </div>
     
         <script src=js/friendslist.js></script>
         <?php include("include/footer.inc"); ?>
     </body>
</html>
