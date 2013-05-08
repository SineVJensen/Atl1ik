<?php

// Lavet via : http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

require_once('include.php');

$error = '';

$form = $_POST['submit'];

$username = $_POST['username'];

$password = $_POST['password'];

if( isset($form) ) {

if( isset($username) && isset($password) && $username !== '' && $password !== '' ) {


$sql = mysql_query("SELECT * FROM `login` WHERE username='$username' and
password='$password';");

if( mysql_num_rows($sql) != 0 ) { //success

$_SESSION['logged-in'] = true;

header('Location: adminForside.php');

exit;

} else { $error = "Incorrect login info"; }

} else { $error = 'All information is not filled out correctly';}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

			<title>TilmeldingBaneturnering</title>

		<link rel="stylesheet" href="http://www.baneturneringen.dk/wp-content/themes/default/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="http://www.baneturneringen.dk/wp-content/themes/default/style.css" type="text/css" media="screen" />
		<link rel="pingback" href="http://www.baneturneringen.dk/xmlrpc.php" />

		<link rel="alternate" type="application/rss+xml" title="Baneturneringen &raquo; Hjem Comments Feed" href="http://www.baneturneringen.dk/hjem-2/feed/" />
		<script type='text/javascript' src='http://www.baneturneringen.dk/wp-includes/js/jquery/jquery.js?ver=1.4.2'></script>
		<script type='text/javascript' src='http://www.baneturneringen.dk/wp-includes/js/comment-reply.js?ver=20090102'></script>
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.baneturneringen.dk/xmlrpc.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.baneturneringen.dk/wp-includes/wlwmanifest.xml" /> 
		<link rel='index' title='Baneturneringen' href='http://www.baneturneringen.dk/' />
		<link rel='prev' title='21.-22. august' href='http://www.baneturneringen.dk/resultater/21-22-august/' />
		<link rel='next' title='Runder 2012' href='http://www.baneturneringen.dk/runder2012/runder-2012/' />
		<meta name="generator" content="WordPress 3.0" />
		<link rel='canonical' href='http://www.baneturneringen.dk/' />
		<style type="text/css" media="all">
		/* <![CDATA[ */
			@import url("http://www.baneturneringen.dk/wp-content/plugins/wp-table-reloaded/css/plugin.css?ver=1.7");
			@import url("http://www.baneturneringen.dk/wp-content/plugins/wp-table-reloaded/css/datatables.css?ver=1.7");
		/* ]]> */
	</style></head>

<body>
<H1> Login </H1>
<form action="<?php $PHP_SELF; ?>" method="post" >

username<br />

<input name="username" type="text" value="<?php echo "$username";?>" /><br /><br />

Password<br />

<input name="password" type="password" /><br />

<input name="submit" type="submit" value="Log In" />

</form>

<?php

echo "<br /><span style=\"color:red\">$error</span>";

?>

</body>

</html>
