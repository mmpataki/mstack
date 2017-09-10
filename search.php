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
	
	if(isset($_GET["key"])) {
		$sql = "select * from StackTable where content like \"%".$_GET["key"]."%\"";
		$result = mysqli_query($conn, $sql) or die("");
		$all_results = array();
		while ($row = mysqli_fetch_assoc($result))
			$all_results[] = $row;
		echo json_encode($all_results);
	}
	mysqli_close($conn);
?>























