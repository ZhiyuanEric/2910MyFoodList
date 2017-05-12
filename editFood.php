<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form name="form" method="post" action="editfood_finish.php">
    <label> Select a food item from your list </label><br />
    <select name="foodItem" id="foodItem">
    <?php
        session_start();
        include("mysql_connect.inc.php");
        
        $accNo = $_SESSION['accNo'];
        $sql = "SELECT *
                FROM Preference
                WHERE accNo = $accNo;";
        $result = mysql_query($sql);
        while($row = mysql_fetch_row($result)) {
            echo "<option value=\"$row[1]\">$row[1]</option>";
        }
    ?>
    </select><br />
    <label> Enter a value to change or leave blank to remove </label><br />
    <input type="text" name="foodItemNew" id="foodItemNew"/> <br />
    <input type="submit" name="button" value="Submit" />
</form>