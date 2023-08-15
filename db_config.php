<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="ics";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);

	// Check connection
	if ($conn->connect_error) {
		die("Error Occurred Please contact site admin: " . $conn->connect_error);
	}
	?>
