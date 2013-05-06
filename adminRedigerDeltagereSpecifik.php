<?php
	

	try {
    		$con = new PDO('mysql:host=localhost;dbname='.$db, $username, $password);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}

	$rundenavn=$_GET['rundeNavn'];


	if(isset($_POST['sletID'])){
		try{
			$con->beginTransaction();
			$stmt1=$con->prepare("DELETE FROM deltagerinfoloeb WHERE idDeltagerInfo=:sletID");
			$stmt1->execute(array(':sletID'=>$_POST['sletID']));
			$stmt2=$con->prepare("DELETE FROM deltagerinfo WHERE idDeltagerInfo=:sletID");
			$stmt2->execute(array(':sletID'=>$_POST['sletID']));
			$con->commit();
		}
		catch(Exception $e) {
			echo $e->getMessage();
			$con->rollback();
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
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
		<a href="adminredigerdeltagerforside.php">[Tilbage]
		</a> &nbsp;
		<a href="forside.php">[Log ud]
		</a>
		<center>
			<H1> RUNDENAVN </H1>

			<input type="button" value="Tilf&oslash;j deltager" style="width:190px;"> <br>
			<table>
				<tr>
					<th>
						Fornavn
					</th>
					<th>
						Efternavn
					</th>
					<th>
						Klub
					</th>
					<th>
						&Aring;rgang
					</th>
					<th>
						K&oslash;n
					</th>
					<th>
						Distance
					</th>
					<th>
						Tilmeldingstid
					</th>
					<th>
						&Aring;rsbedste
					</th>
					<th>
						PR
					</th>
				</tr>
				<?php
				$sql="SELECT * FROM deltagerinfo WHERE rundeNavn=:navn ORDER BY efternavn";
				$deltagere = $con->prepare($sql);
				$deltagere->execute(array(':navn'=>$rundenavn));
				foreach($deltagere as $deltager){
					?>
					<form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?rundeNavn='.$rundenavn; ?>" method="post">
					<tr>
						<td><?php echo $deltager['fornavn']; ?></td>
						<td><?php echo $deltager['efternavn']; ?></td>
						<td><?php echo $deltager['klub']; ?></td>
						<td><?php echo $deltager['aargang']; ?></td>
						<td><?php echo $deltager['koen']; ?></td>
					<?php
							$id=$deltager['idDeltagerInfo'];
							$sql2="SELECT * FROM deltagerinfoloeb WHERE idDeltagerInfo=:id";
							$distancer = $con->prepare($sql2);
							$distancer -> execute(array(':id'=>$id));
					?>
						<td>
					<?php
							foreach($distancer as $distance){
							echo $distance['distance']."m, ";
							}
					?>
						</td>
						<td>
					<?php		$distancer -> execute(array(':id'=>$id));
							foreach($distancer as $distance){
								echo $distance['tilmeldingstid']."s, ";
							}
					?>
						</td>
						<td>
					<?php		$distancer -> execute(array(':id'=>$id));
							foreach($distancer as $distance){
								echo $distance['aarsbedste']."s, ";
							}
					?>
						</td>
						<td>
					<?php		$distancer -> execute(array(':id'=>$id));
							foreach($distancer as $distance){
								echo $distance['PR']."s, ";
							}
					?>
						</td>
						<td>
							<input type="submit" name="Slet" value="slet" style="width:40px;"/>
							<input type="hidden" name="sletID" value="<?php echo $id;?>"/>
						</td>
					</tr>
					</form>
					<?php
				}
				?>
			</table>
</HTML>
