<?php

// lavet via: http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

session_start();


$host = "baneturnering.zymichost.com";

$username = "846259_admin";

$password = "123456";

$db = "baneturnering_zymichost_atl1ik";

@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");

?>
