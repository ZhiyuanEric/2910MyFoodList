<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">Logout</a>  <br><br>';
$user = $_SESSION['username'];
if($_SESSION['username'] != null)
{
    
        echo '<a href="updateprof.php">edit</a>  <br><br>  ';
    
        //showing the profile
        $sql = "SELECT * FROM member_table WHERE username = '$user' ";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result))
        {
                 echo "
                 name(account)：$row[1]<br> " .
                 "likes：$row[3]<br>
                 dislike：$row[4]<br> 
                 allergy：$row[5]<br>";
        }
}
else
{
        echo 'oops! some error just happened';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>