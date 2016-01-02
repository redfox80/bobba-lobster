<?php
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASSWORD = '';
	$DB_NAME = 'crunge';
	
	$dbc = @mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME)
	or die('could not connect to database<br><br>' . mysqli_connect_error());

	mysqli_set_charset($dbc,"utf8");
?>