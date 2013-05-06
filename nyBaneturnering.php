<?php
	

	try {
    		$con = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

	if(isset($_POST['Ny'])){
		try{
			$con->beginTransaction();
			$con->exec("DROP TABLE deltagerinfoloeb, deltagerinfo, distancer, runder");
			$con->exec(
				"CREATE TABLE `runder` (
				`rundeNavn` varchar(45) not null,
				`dato` date,
				`arrangoer` varchar(45),
				`tilmeldingsstart` date,
				PRIMARY KEY (`rundeNavn`))
			");
			$con->exec("
				CREATE TABLE `distancer`(
				`rundeNavn` varchar(45) REFERENCES `runder`(`rundeNavn`),
				`distance` int(11),
				PRIMARY KEY (rundeNavn, distance))
			");
			$con->exec("
				CREATE TABLE `deltagerinfo` (
				`idDeltagerInfo` int(11) not null auto_increment,
				`fornavn` varchar(45),
				`efternavn` varchar(45),
				`email` varchar(45) not null,
				`klub` varchar(45),
				`aargang` int(11),
				`koen` varchar(1),
				`rundeNavn` varchar(45) REFERENCES `runder`(`rundeNavn`),
				PRIMARY KEY (`idDeltagerInfo`))
			");
			$con->exec("
				CREATE TABLE `deltagerinfoloeb` (
				`idDeltagerInfo` int(11) not null REFERENCES `deltagerinfo`(`idDeltagerInfo`),
				`distance` int(11),
				`tilmeldingstid` time,
				`aarsbedste` time,
				`PR` time,
				PRIMARY KEY (`distance`, `idDeltagerInfo`))
			");
			$con->commit();
		}
		catch(Exception $e) {
			echo $e->getMessage();
			$con->rollback();
		}
	}
?>
<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<head>profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Atle1ik</title>
	
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
		<a href="forside.php">[Log ud]
		</a>
		<center>
			<H1> Start ny Baneturnering </H1>
			Er du sikker p&aring; at du vil starte en ny turnering? <BR>
			Dette vil slette alle gemte deltagere og runder. Handlingen kan ikke fortrydes.

			<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
				<input type="submit" name="Ny" value="Ja, start ny turnering" />
</HTML>
