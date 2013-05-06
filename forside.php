<?php
 /* Dokumentation: http://www.killersites.com/community/index.php?/topic/3064-basic-php-system-view-edit-add-delete-records-with-mysqli/ */
session_start();
$host = "baneturnering.zymichost.com";
$username = "846259_admin";
$password = "123456";
$db = "baneturnering_zymichost_atl1ik";

// connect to the database
$mysqli = new mysqli($host, $username, $password, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

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
                
                <h1>Runder</h1>
                
 <center>               
                <?php
                        // connect to the database
                        
                        // get the records from the database
                        if ($result = $mysqli->query("SELECT t1.*, t2.distance FROM runder t1 INNER JOIN distancer t2 ON t2.rundeNavn = t1.rundeNavn"))
                        {
                                // display records if there are records to display
                                if ($result->num_rows > 0)
                                {
                                        // display records in a table
                                        echo "<table border='1' cellpadding='10'>";
                                        
                                        // set table headers
                                        echo "	<tr><th>Navn</th>
												<th>Dato</th>
												<th>Arrangoer</th>
												<th>Distancer</th>
												<th>Tilmeldingsstart</th> ";
                                        
                                        while ($row = $result->fetch_object())
                                        {
                                                // set up a row for each record
                                                echo "<tr>";
                                                echo "<td>" . $row->runder.rundeNavn. "</td>";
                                                echo "<td>" . $row->dato. "</td>";
                                                echo "<td>" . $row->arrangoer . "</td>";
                                                echo "<td>" . $row->distance . "</td>";
												echo "<td>" . $row->tilmeldingsstart . "</td>";
                                                echo "</tr>";
                                        }
                                        
                                        echo "</table>";
                                }
                                // if there are no records in the database, display an alert message
                                else
                                {
                                        echo "Ingen informationer tilgaengelige!";
                                }
                        }
                        // show an error if there is an issue with the database query
                        else
                        {
                                echo "Error: " . $mysqli->error;
                        }
                        
                        // close database connection
                        $mysqli->close();
                
                ?>
                </center>
        </body>
</html>
