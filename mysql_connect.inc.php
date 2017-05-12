<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
<?php

$db_server = "localhost";

$db_name = "2910db";

$db_user = "root";

$db_passwd = "";

if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("<p class=\"red\">Can not link to database for whatever reason</p>");

mysql_query("SET NAMES utf8");

if(!@mysql_select_db($db_name))
        die("<p class=\"red\">Can not access database<p>");
?>