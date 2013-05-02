<?php
	// Create connection
	$username = 'atl1ik';
	$password = '1234';
	$host = 'localhost';
	$db = 'atl1ik';

	try {
    		$con = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}


?>
<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<head>profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>Skal hente runde navn </title>
		
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
	<center>
		<H1>Rundenavn</H1>
		<form action="insert.php" method="post">
			<table>
				<tr>
					<td>Navn
					</td>
					<td> <input type="text" name="navn">
					</td>
				</tr>
				<tr>
					<td>E-mailadresse:
					</td>
					<td> <input type="text" name="email">
					</td>
				</tr>
				<tr>
				<td>
					<input type="checkbox" name="jatak" value="yes"> Jeg &oslash;nsker at modtage informationer om fremtidige st&aelig;vner fra KIF-Atletik, pr. Email.
				</td>
				</tr>
				<tr>
					<td colspan=2 align= center>
						<input type="button" value="Send tilmelding" style="width:190px;">
					</td>
				</tr>
			</table>
		</form> 
	</center>
	</body>
</html>
