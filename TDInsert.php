<?php
$con=mysqli_connect("localhost","atl1ik","1234","atl1ik");
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
mysql_connect("localhost", "atl1ik", "1234") or die("Connection Failed");
mysql_select_db("atl1ik")or die("Connection Failed");

if(!mysqli_query($con,"INSERT INTO deltagerinfoloeb (iddeltagerinfo, distance, tilmeldingstid, aarsbedste, pr)
VALUES
(". mysqli_insert_id($con) . ",'$_POST[distance]','$_POST[tilmeldingstid]','$_POST[aarsbedste]','$_POST[pr]')"))
{
die('Error: ' . mysqli_error($con));
}



mysqli_close($con);
?>
