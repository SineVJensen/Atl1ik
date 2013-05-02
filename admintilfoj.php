<?php
	$username = 'atl1ik';
	$password = '1234';
	$host = 'localhost';


  // Check connection
  if (mysqli_connect_errno($con)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else { 
    echo "Connection was OK!\n";
  }
  
	try {
		$conn = new PDO($host, $username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
	
	$klubnavn = $_REQUEST['klubnavn'];
	
	function getKlub() {
		global $conn;
		$stmt = $conn->prepare("select klubnavn from klubber");
		$stmt->execute();
		return $stmt->fetchAll();
	}

?>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

	<a 
		href="ADMINRUNDE 1 !!!!">[Tilbage]
	</a> &nbsp;
	<a 
		href="forside.php">[Log ud]
	</a>

	<head> profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Tilf&oslash;j deltager til runde</title>
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
<center><h1>Funktion som giver runde navn</h1></center>
<center>
<br>

<?php 
	if($_REQUEST['cmd']) {
		try {
			$conn->beginTransaction();
			$conn->exec("LOCK TABLE klubber IN EXCLUSIVE MODE NOWAIT");
			$stmt = $conn->query("select nvl(max(klubnavn), 0) + 1 from klubber");
			$res = $stmt->fetchAll(); 
			$newid = $res[0][0];
			$stmt = $conn->prepare("insert into klubber values(?,?)");
			$values = array($newid, 
							$_REQUEST['klubnavn']);			
			$stmt->execute($values);
			$conn->commit();
			echo "klubnavn added<br>";
			print_r($values);
		}catch(Exception $e) {
			echo $e->getMessage();
			$conn->rollback();
		}
		echo "</body></html>";
		exit();
	}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="cmd" value="addklubnavn">
	<table>
<!--		<tr>
			<td>Fornavn
			</td>
			<td> <input type="text" name="fornavn">
			</td>
		</tr>
		<tr>
			<td>Efternavn
			</td>
			<td> <input type="text" name="efternavn">
			</td>
		</tr>
		<tr>
			<td>Klub
			</td> -->
			<td>
				<select name="klubnavn">
					<option value="0">v&aelig;lg klub</option>
					<?php>
						foreach(getKlub() as $klub) {
							echo '<option value="' . 
									$klub[1] . '">' .
									$klub[1] . '</option>';
					?>
				</select>
			</td>
			<td>
				<input type="checkbox" name="ingenklub" value="yes"> Ingen klub 
			</td>
				<! Her er det vigtigt at man ikke kan vælge ingen klub og klub samtidig !>
		</tr>
		<tr>
			<td>&Aring;rgang
			</td>
			<td>
				<select name="select">
					<option value="red">v&aelig;lg</option>
					<option value="green">Skal &aelig;ndres</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>K&oslash;n
			</td>
			<td>
				<input type="checkbox" name="option1" value="mand"> M &nbsp; 
				<input type="checkbox" name="option1" value="kvinde"> K
			</td>
		</tr>
		<tr>
			<td>Distance
			</td>
			<td>
				<select name="select">
					<option value="red">v&aelig;lg</option>
					<option value="green">Skal &aelig;ndres</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tilmeldingstid 
			</td>
			<td>
				<input type="text" name="tilmeldtid"> 
			</td>
			<td>
				<input type="checkbox" name="option1" value="kvinde"> Ingen tilmeldingstid 
			</td>
		</tr>
		<tr>
			<td>&Aring;rsbedste 
			</td>
			<td>
				<input type="text" name="aarstid"> 
			</td>
			<td>
				<input type="checkbox" name="option1" value="kvinde"> Ingen  &aring;rsbedste 
			</td>
		</tr>
		<tr>
			<td>Personligrekord 
			</td>
			<td>
				<input type="text" name="pr"> 
			</td>
			<td>
				<input type="checkbox" name="option1" value="kvinde"> Ingen personligrekord 
			</td>
		</tr>
		<tr>
			<td colspan=3 align= center>
				<input type="button" value="Tilmeld endnu en distance" style="width:190px;">
			</td>
		</tr>
		<tr>
			<td colspan=3 align=center>
				<input type="submit" value="F&aelig;rdig">
			</td>
		</tr>

</table></form></center>


</body>


</html>
