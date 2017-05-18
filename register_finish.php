<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
$user = $_POST['user'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$name= $_POST['name'];
$bio = $_POST['bio'];
$likes = $_POST['likes'];
$dislikes = $_POST['dislikes'];
$allergies = $_POST['allergies'];


include("include/head.inc");
include("include/logged_in_header.inc");
if($user != null && $pw != null && $pw2 != null && $pw == $pw2)//checking is there empty field and is the password the same
{
        
    $sql = "INSERT INTO Account (username, accPass) VALUES ('$user', '$pw');";

    if(mysqli_query($db_link, $sql))
    {
        $userID = '';
        // retreive user id
        $sql = "SELECT a.accNo
                FROM Account a
                WHERE a.username IN ('$user');";
    
        $result = mysqli_query($db_link, $sql);
        while($row = mysqli_fetch_row($result)) {
            $userID = $row[0];
        }
        
        // add the details
        $sql = "INSERT INTO Details VALUES ($userID, '$name', '$bio', 'unknown');";
        mysqli_query($db_link, $sql);
        
        
        // add the food
        $sql = "INSERT INTO Preference VALUES ($userID, '$likes', 'like');";
        mysqli_query($db_link, $sql);
        $sql = "INSERT INTO Preference VALUES ($userID, '$dislikes', 'dislike');";
        mysqli_query($db_link, $sql);
        $sql = "INSERT INTO Preference VALUES ($userID, '$allergies', 'allergies');";
        mysqli_query($db_link, $sql);

        echo '<main>
                <div class="register">
                    Registration Success!
                </div> 
              </main>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
    }
    else
    {
        echo '<main>
                  <div class="failed">
                      Registration failed! Account already exists!
                  </div>
              </main>';
        echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';
    }
}
else
{
    echo '<main>
              <div class="failed">
                  Registration failed. The passwords are different 
                  or there are empty fields.
              </div>
          </main>';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=register.php>';
}
?>