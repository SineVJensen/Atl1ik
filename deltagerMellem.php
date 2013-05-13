<?php
	// Create connection

	
$con = new mysqli($host, $username, $password, $db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if(!mysqli_query($con,"INSERT INTO deltagerinfo (fornavn, efternavn, email, klub, aargang, koen, rundenavn)
VALUES
('$_POST[fornavn]','$_POST[efternavn]','$_POST[email]','$_POST[klub]','$_POST[aargang]','$_POST[koen]','$_POST[rundenavn]')"))
{
die('Error: ' . mysqli_error($con));
}
@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");

if(!mysqli_query($con,"INSERT INTO deltagerinfoloeb (iddeltagerinfo, distance, tilmeldingstid, aarsbedste, pr)
VALUES
(". mysqli_insert_id($con) . ",'$_POST[distance]','$_POST[tilmeldingstid]','$_POST[aarsbedste]','$_POST[pr]')"))
{
die('Error: ' . mysqli_error($con));
}



mysqli_close($con);

?>
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

<center>
<br><br><br><br><br><br><br><br> <h1>Vil du tilmelde flere deltagere eller vil du afslutte din tilmelding?</h1> <br>
	Hvis du vil tilmelde endnu deltager til denne runde. Tryk her <br> <br>
		<form action="TilfoejDeltager.php" method="get">
			<button type="submit" formation="TilfoejDeltager.php" style="height: 50px; width: 190px;font-size:20px;"> Gå til tilmelding
			</button>
		</form>
		<br> <br>
	Hvis du vil gå videre til bekræftigelse, hvor du også kan redigere og slette indtastet data. Tryk her <br> <br>
		<form action="bekraft.php" method="get">
			<button type="submit" formation="bekraft.php" style="height: 50px; width: 190px;font-size:20px;"> Gå til bekræftelse
			</button>
		</form>
		</center>
	</body>
</HTML>
