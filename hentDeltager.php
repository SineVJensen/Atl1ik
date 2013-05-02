<?php


// noget af denne PHP sektion er taget fra http://www.geekpoint.net/threads/php-simple-login-logout-system-with-sessions.2997/

require_once('include.php');

// is the one accessing this page logged in or not?

if ( !isset($_SESSION['logged-in']) || $_SESSION['logged-in'] !== true) {

// not logged in, move to login page

header('Location: login.php');

exit;

}

	// Create connection
	$username = '846259_admin';
	$password = '123456';
	$host = 'baneturnering.zymichost.com';
	$db = 'baneturnering_zymichost_atl1ik';
	try {
    		$con = new PDO('mysql:host=baneturnering_zymichost_atl1ik;dbname='.$db, $username, $password);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}
	//henter deltagerne og laver en csv-fil, hvis der er valgt en runde.
	if(isset($_POST['rundeNavn'])){
		// Finder deltagere i databasen
		try{
			$rundenavn=$_POST['rundeNavn'];
			$sql = "SELECT * 
				FROM deltagerinfo NATURAL JOIN deltagerinfoloeb 
				WHERE rundeNavn=':rundenavn' 
				ORDER BY distance,tilmeldingstid";
			$con->beginTransaction();		
			$result = $con->query($sql);
			$results=$result->execute(array(':rundenavn'=>$rundenavn));
			$con->commit();
		}
		catch(Exception $e) {
			echo $e->getMessage();
			$con->rollback();
		}
	 
		// Sætter navn og placering for cvs-filen
		// lige nu er den i tmp-mappen der tømmes ved sluk af computer
		$filename = "/tmp/deltagere_export_".$rundenavn.".csv";
	 
		// Skaber filen
		// w+ parameteren sletter og overskriver en hver eksisterende fil med samme navn.
		$handle = fopen($filename, 'w+');
	 
		// Laver regnearkets kolonenavne
		fputcsv($handle, array('Efternavn','Fornavn','Klub','Årgang','Køn','Distance','Tilmeldingstid'));
	 
		// Skriver alle deltageroplysningerne i regnearket.
		foreach($results as $row)
		{
			fputcsv($handle, array(
				$row['efternavn'], 
				$row['fornavn'],
				$row['klub'],
				$row['aargang'],
				$row['koen'],
				$row['distance'],
				$row['tilmeldingstid']));
		}
	 
		// Lukker filen igen
		fclose($handle);
	}
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

		<!-- Link så man kan gå tilbage og logge ud -->
		<a href="adminforside.php">[Tilbage]
		</a> &nbsp;
		<a href="forside.php">[Log ud]
		</a>

	<body>
		<center>
			<H1> Administrator </H1>

			Tryk p&aring; en runde for at hente deltagerlisten.
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
				// Henter al data fra rundertabellen
				$sql="SELECT * FROM runder";
				$runder = $con->query($sql)->fetchAll();
				foreach($runder as $runde){
				?>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
				<tr>
					<!-- Viser rundens navn, som en knap der henter deltagerlisten -->
					<td>
						<input type="submit" name="rundeNavn" value="<?php echo $runde['rundeNavn'];?>"/>
					</td>
					<td><?php echo $runde['dato']; ?></td>
					<!-- Henter alle distancer det er muligt at løbe i runden -->
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
				</form>
				<?php
				}
				?>
			</table>
		</center>
	</body>
</HTML>
