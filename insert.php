<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "StackDB";

	header("Access-Control-Allow-Origin: *\r\n");

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) die("");

	if(isset($_GET["from"])) { $start = $_GET["from"]; }
	$obj = json_decode($_GET["obj"], true);

	$sql = "insert into StackTable values(0, '" . $obj["timestamp"] . "',\"" . $obj["content"] . "\");";
	if(mysqli_query($conn, $sql)) {
		$res = mysqli_query($conn, "select max(id) as mid from StackTable");
		echo mysqli_fetch_assoc($res)["mid"];
	}
	mysqli_close($conn);
?>

