<?
	//overflødig fil


	catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
	}


	// Query the database for the users
	$rundenavn=$_GET['rundeNavn'];
	$sql = "SELECT rundeNavn, distance FROM distancer WHERE rundeNavn='".$rundenavn."' ORDER BY rundeNavn";
	$results = $con->query($sql);
 
	// Pick a filename and destination directory for the file
	// Remember that the folder where you want to write the file has to be writable
	$filename = "/tmp/db_distancer_export_".time().".csv";
 
	// Actually create the file
	// The w+ parameter will wipe out and overwrite any existing file with the same name
	$handle = fopen($filename, 'w+');
 
	// Write the spreadsheet column titles / labels
	fputcsv($handle, array('Runde Navn','Distance'));
 
	// Write all the user records to the spreadsheet
	foreach($results as $row)
	{
	    fputcsv($handle, array($row['rundeNavn'], $row['distance']));
	}
 
	// Finish writing the file
	fclose($handle);
?>
