<?php

// fra http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

session_start();

// if the user is logged in, unset the session

if (isset($_SESSION['logged-in'])) {

unset($_SESSION['logged-in']);

}

// now that the user is logged out,

// go to login page

header('Location: index.html');

?>
