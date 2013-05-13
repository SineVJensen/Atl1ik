<?php


@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");


$query = "SELECT * FROM klubber";
$result = mysql_query($query);
$query2 = "SELECT * FROM aargang";
$result2 = mysql_query($query2);
$query3 = "SELECT * FROM distancer";
$result3 = mysql_query($query3);
?>

<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<body>

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
	

		<h1>
			Tilmeld deltager
		</h1>

	<br />
	<center>
	<!-- sender de indtastede info'er videre til deltagerliste som indsætter det i databasen -->
	<form action="deltagerMellem.php" method="post">
		<table>
			<tr><td>Fornavn: <input type="text" name="fornavn"></td></tr>
			<tr><td>Efternavn: <input type="text" name="efternavn"></td></tr>
			<tr><td>E-mail: <input type="text" name="email"></td></tr>
			
			<tr><td>V&aelig;lg Klub: <select name="klub">
				<option value="ingen">ingen klub</option>
				<?php
					while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
				<option value="<?php echo $line['klubnavn'];?>"> <?php echo $line['klubnavn'];?> </option>
				<?php
					}
				?>
			</select> </td></tr>
			
			<tr><td>V&aelig;lg &Aring;rgang: 
			<select name="aargang">
				<?php
					while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)){
				?>
					<option value="<?php echo $line['aargang'];?>"> <?php echo $line['aargang'];?> </option>
				<?php
					}
				?>
			</select></td></tr>
			
			<tr><td>V&aelig;lg k&oslash;n: 
			<select name="koen">
				 <option value="m">m</option>
				 <option value="k">k</option>
			</select></td></tr>
			
			<tr><td>Rundenavn: <input type="text" name="rundenavn"></td></tr>

			<tr><td>Distance:
					<select name="distance">
				<?php
					while ($line = mysql_fetch_array($result3, MYSQL_ASSOC)) {
				?>
					<option value="<?php echo $line['distance'];?>"> <?php echo $line['distance'];?> </option>

				<?php
					}
				?>
			</td></tr>

			
			<tr><td>Tilmeldingstid: <input type="text" name="tilmeldingstid"></td></tr>
			
			<tr><td>Aarsbedste: <input type="text" name="aarsbedste"></td></tr>
			
			<tr><td>pr: <input type="text" name="pr"></td></tr>
		</table>
		
	<input type="submit" value = "N&aelig;ste" style="width:190px;" ;>
	</form>
	</center>
