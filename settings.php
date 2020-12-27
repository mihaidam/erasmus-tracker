<?php
	$host = 'localhost';
	$user = 'travel_tracker';
	$pass = 'travel21';
	$db = 'user_accounts';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>