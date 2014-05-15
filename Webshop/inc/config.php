<?php
	const DB_HOST = 'getinfo.dk';
	const DB_USER = 'webshop';
	const DB_PASS = '123123';
	const DB_NAME = 'webshop_webshop';
	
	// CONNECT
	
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	

	if($mysqli->connect_errno) {
		echo "<p>MYSQL ERROR NO $mysqli->connect_errno : $mysqli->connect_error";
		exit();
	}
	
	error_reporting(E_ERROR | E_PARSE);