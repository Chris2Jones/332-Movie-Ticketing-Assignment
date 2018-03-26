<?php
DEFINE ('dbUser','Chris');
DEFINE ('dbPassword','Liam');
DEFINE ('dbHost','localhost');
DEFINE ('dbName', 'Main_DB');

$dbc = @mysqli_connect(dbHost,dbUser,dbPassword,dbName)
OR die('ERROR - could not connect to mySQL' .
	mysqli_connect_error());
?>