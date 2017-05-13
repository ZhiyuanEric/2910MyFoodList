<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
<?php

$db_server = "localhost";

$db_name = "2910db";

$db_user = "root";

$db_passwd = "";

$db_link = mysqli_connect($db_server, $db_user, $db_passwd);

if(!$db_link)
    die("<p class=\"red\">Can not link to database for whatever reason</p>");

mysqli_query($db_link, "SET NAMES utf8");

if(!mysqli_select_db($db_link, $db_name))
    die("<p class=\"red\">Can not access database<p>");
?>