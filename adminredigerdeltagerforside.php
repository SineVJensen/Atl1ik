<?php

// denne PHP sektion er taget fra http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

require_once('include.php');

// is the one accessing this page logged in or not?

if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

// not logged in, move to login page

header('Location: login.php');

exit;

}




	try {
    		$con = new mysqli($host, $username, $password, $db);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}


?>
<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /
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
		<a href="adminforside.php">[Tilbage]
		</a> &nbsp;
<a href="logout.php">[logout]</a>
		</a>
		<center>
			<H1> Administrator </H1>

			Tryk p&aring; en runde for at redigere deltagerlisten.
			<br><br>

			<table>
				<tr>
					<th>
						Runde
					</th>	
					<th>
						Dato
					</th>
					<th>
						Distancer
					</th>
					<th>
						Arrang&oslash;r
					</th>
					<th>
						Tilmeldingsperiode
					</th>
				</tr>
				<?php
				$sql="SELECT * FROM runder";
				$runder = $con->query($sql)->fetchAll();
				foreach($runder as $runde){
				?>
				<tr>
					<td>
						<a href="adminRedigerDeltagereSpecifik.php?rundeNavn=<?php echo $runde['rundeNavn']; ?>">
							<?php echo $runde['rundeNavn']; ?>
						</a>
					</td>
					<td><?php echo $runde['dato']; ?></td>
					<td><?php  
						$sql2="SELECT distance FROM distancer WHERE rundeNavn='".$runde['rundeNavn']."'";
						$distancer = $con->query($sql2)->fetchAll();
						foreach($distancer as $distance){
							echo " ".$distance['distance']."m,"; 
						}?>
					</td>
					<td><?php echo $runde['arrangoer']; ?></td>
					<td><?php echo $runde['tilmeldingsstart']; ?></td>
				</tr>
				<?php
				}
				?>
			</table>
		</center>
	</body>
</HTML>
