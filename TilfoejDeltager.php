<?php

@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");

$query = "SELECT * FROM klubber";
$result = mysql_query($query);

$query2 = "SELECT * FROM aargang";
$result2 = mysql_query($query2);

$query3 = "SELECT rundeNavn, distance FROM runder natural join distancer ORDER BY rundeNavn ASC;";
$result3 = mysql_query($query3);

$query5 = "SELECT * FROM runder ORDER BY rundeNavn ASC";
$result5 = mysql_query($query5);
?>

<HTML xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
	<body>
<script>
function validateForm()
{
var x=document.forms["myForm"]["fornavn", "efternavn", "email"].value;
if (x==null || x=="")
  {
  alert("De er ikke f&aelig;rdig med at udfylde din tilmelding");

  return false;
  }
}


</script>
<script type="text/javascript>">

</script>
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
		
	</style></head></body>
	

		<h1>
			Tilmeld deltager
		</h1>

	<br />
	
	<!-- sender de indtastede info'er videre til deltagerliste som indsætter det i databasen -->
	<form name="myForm" action="deltagerMellem.php" onsubmit="return validateForm();" method="post">
		<center><table width ="200px" border="0">
			<tr><td>Fornavn:</td>
			<tr><td><input type="text" name="fornavn" size="40" ></td></tr></tr>		
			
			<tr><td>Efternavn: <td/>
			<tr><td><input type="text" name="efternavn" size="40" ></td></tr></tr>
			
			<tr><td>E-mail: </td>
			<tr><td><input type="text" name="email" size="40"></td></tr></tr>
			
			<tr><td></tr></td>
			<tr><td>V&aelig;lg Klub: </td>
			<tr><td><select name="klub" >
				<option value="" disabled="disabled">V&aelig;lg klub</option>
				<option value="ingen">ingen klub</option>
				<?php
					while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
				<option value="<?php echo $line['klubnavn'];?>"> <?php echo $line['klubnavn'];?> </option>
				<?php
					}
				?>
			</select></td></tr></tr>
			
			<tr><td></tr></td>			
			
			<tr><td>V&aelig;lg &Aring;rgang: </td>
			<tr><td><select name="aargang" >
			<option value="" disabled="disabled">V&aelig;lg &Aring;rgang</option>
				<?php
					while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)){
				?>
					<option value="<?php echo $line['aargang'];?>"> <?php echo $line['aargang'];?> </option>
				<?php
					}
				?>
			</select></td></tr></tr>
			
			<tr><td></tr></td>
			
			<tr><td>V&aelig;lg k&oslash;n: </td>
			<tr><td><select name="koen" >
			<option value="" disabled="disabled">V&aelig;lg k&oslash;n</option>
				 <option value="m">m</option>
				 <option value="k">k</option>
			</select></td></tr></tr>
			
			<tr><td></tr></td>
			
			<tr><td>Rundenavn </td>
			<tr><td><select name="rundeNavn">
				<option value="" disabled="disabled" >V&aelig;lg rundnavn</option>
				<?php
					while ($line = mysql_fetch_array($result5, MYSQL_ASSOC)) {
				?>
					<option value="<?php echo $line['rundeNavn'];?>"><?php echo $line['rundeNavn'];?> </option>

				<?php
					}
				?>
				</select></td></tr></tr>
			<tr><td></tr></td>
			
			<tr><td>Distance: </td>
			<tr><td><select name="distance">
				<option value="" disabled="disabled" >V&aelig;lg distance</option>
				<?php
					while ($line = mysql_fetch_array($result3, MYSQL_ASSOC)) {
				?>
					<option value="<?php echo $line['distance'];?>"><?php echo $line['distance'];?> </option>

				<?php
					}
				?>
			</select>m</td></tr></tr>
			<tr><td><b>NB! Tiderne udfyldes med min:sek:msek fx. 00:20:13</b></td></tr>
			
			<tr><td></tr></td>
			
			<tr><td>Tilmeldingstid: </td>
			<tr><td><input type="text" name="tilmeldingstid" size="40"></td></tr></tr>
			
			<tr><td></tr></td>
			
			<tr><td>Aarsbedste: </td>
			<tr><td><input type="text" name="aarsbedste" size="40"></td></tr></tr>
			
			<tr><td></tr></td>
			
			<tr><td>pr: </td>
			<tr><td><input type="text" name="pr" size="40" ></td></tr></tr>
		</table></center>

		
	<input type="submit" value = "N&aelig;ste" style="width:190px;" ;>
	</form>

	
