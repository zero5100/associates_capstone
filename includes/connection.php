<?php
	$dbhost = 'localhost';
	$dbuser = 'lab2';
	$dbpass = 'capstone';
	$db = 'capstone';

	$connect = mysql_connect($dbhost, $dbuser, $dbpass);
	mysql_select_db($db);
?>