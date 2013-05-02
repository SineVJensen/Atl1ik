<?php
mysql_connect("localhost", "atl1ik", "1234") or die("Connection Failed");
mysql_select_db("atl1ik")or die("Connection Failed");

$query = "SELECT * FROM klubber";
$result = mysql_query($query);
$query2 = "SELECT * FROM aargang";
$result2 = mysql_query($query2);
$query3 = "SELECT * FROM distancer";
$result3 = mysql_query($query3);
?>

<html>
  <head>
		<title>Tilfoej Deltager</title>
	</head>
	
	<h1>
		<input name="Tilbage" type="button" value="Tilbage" />&nbsp;<input name="Videre" type="submit" value="Videre" />
	</h1>
	<div style="text-align: center;">
		<h1>
			Tilmeld deltager
		</h1>
	</div>
	<hr />
	<br />
	<center>
	<!-- sender de indtastede info'er videre til deltagerliste som indsætter det i databasen -->
	<form action="TDInsert.php" method="post">
		<table>
			<tr><td>Fornavn: <input type="text" name="fornavn"></td></tr>
			<tr><td>Efternavn: <input type="text" name="efternavn"></td></tr>
			<tr><td>E-mail: <input type="text" name="email"></td></tr>
			<tr><td>Vælg Klub: <select name="klub">
				<option value="ingen">ingen klub</option>
				<?php
					while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				?>
				<option value="<?php echo $line['klubnavn'];?>"> <?php echo $line['klubnavn'];?> </option>
				<?php
					}
				?>
			</select> </td></tr>
			<tr><td>Vælg Årgang: <select name="aargang">
				<?php
					while ($line = mysql_fetch_array($result2, MYSQL_ASSOC)){
				?>
					<option value="<?php echo $line['aargang'];?>"> <?php echo $line['aargang'];?> </option>
				<?php
					}
				?>
			</select></td></tr>
			<tr><td>Vælg køn: <select name="koen">
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
			</select></td></tr>
			<tr><td>Tilmeldingstid: <input type="text" name="tilmeldingstid"></td></tr>
			<tr><td>Aarsbedste: <input type="text" name="aarsbedste"></td></tr>
			<tr><td>pr: <input type="text" name="pr"></td></tr>
		</table>
	<input type="submit">
	</form>
	</center>
</body>
</html>
