<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "StackDB";

	header("Access-Control-Allow-Origin: *\r\n");

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) die("");

	if(isset($_GET["from"])) { $start = $_GET["from"]; }
	$obj = json_decode($_GET["obj"], true);

	$stmt = $conn->prepare("insert into StackTable values(0,?,?)");
	$stmt->bind_param("ss", $obj["timestamp"], $obj["content"]);

	$stmt->execute();
	$res = mysqli_query($conn, "select max(id) as mid from StackTable");
	echo mysqli_fetch_assoc($res)["mid"];

	$stmt->close();
	$conn->close();
?>

