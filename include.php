<?php

// lavet via: http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

session_start();



@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");

?>
