<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "StackDB";

	header("Access-Control-Allow-Origin: *\r\n");

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) die("failed");

	if(isset($_GET["id"])) {
		$sql = "delete from StackTable where id=" . $_GET["id"];
		if(mysqli_query($conn, $sql)) {
			echo "success";
		} else {
			echo "failed";
			echo mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>

