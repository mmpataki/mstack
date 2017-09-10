<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "StackDB";
	$limit = 10;

	header("Access-Control-Allow-Origin: *\r\n");

	$conn = mysqli_connect($servername, $username, $password);
	if(!$conn) die("connection failed");
	mysqli_query($conn, "create database StackDB");
	mysqli_close($conn);

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) die("Connection failed: " . mysqli_connect_error());
	mysqli_query($conn, "create table StackTable(id int auto_increment primary key, timestamp varchar(30), content varchar(1000))");

	$start = 0;
	if(isset($_GET["from"])) { $start = $_GET["from"]; }
	
	$sql = "select * from StackTable order by id desc limit " .  $start . ", " . ($start + $limit) . ";";
	$result = mysqli_query($conn, $sql) or die("");
	$all_results = array();
	while ($row = mysqli_fetch_assoc($result))
		$all_results[] = $row;
	echo json_encode($all_results);

	mysqli_close($conn);
?>























