<?php

// denne PHP sektion er taget fra http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

require_once('include.php');

// is the one accessing this page logged in or not?

if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

// not logged in, move to login page

header('Location: login.php');

exit;

}

?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

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


<!-- det mellem <a er et link som skal kunne logge en ud -->
<a href="logout.php">[logout]</a>

<!-- Alt mellem head dog uden <title>Administrator</title> er med at at få det vi har lavet til at ligne den nuværende hjemmeside, det er de samme farver som bruges -->
<body>
	<center>
		<h1>Administrator</h1>
	</center>
	<center>Velkommen <br>
		<form action="hentDeltager.php" method="get">
			<button type="submit" formation="hentDeltager.php" style="width:190px;"> Hent deltageroplysninger 
			</button>
		</form> <!-- action/formation er den side som man kommer til hvis man trykker på knappen -->
		<form action="adminredigerdeltagerforside.php" method="get">
			<button type="submit" formation="adminredigerdeltagerforside.php" style="width:190px;"> Rediger deltageroplysninger 
			</button>
		</form>
		<form action="http://dbw.diku.dk/~kms698/admintilfoj.php" method="get">
			<button type="submit" formation="http://dbw.diku.dk/~kms698/admintilfoj.php" style="width:190px;"> Rediger runder
			</button>
		</form>
		<form action="nyBaneturnering.php" method="get">
			<button type="submit" formation="nyBaneturnering.php" style="width:190px;"> Start ny baneturnering
			</button>
		</form>
	</center>
</body>

		

</html>
