<?php
	// Retrieve the appointment ID from the form data
	$id = $_POST['id'];

	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname1 = "speciality1";
	$dbname2 = "speciality2";
	$dbname3 = "speciality3";
	$dbname4 = "speciality4";

	$conn1 = new mysqli($servername, $username, $password, $dbname1);
	$conn2 = new mysqli($servername, $username, $password, $dbname2);
	$conn3 = new mysqli($servername, $username, $password, $dbname3);
	$conn4 = new mysqli($servername, $username, $password, $dbname4);

	// Check if the connection was successful
	if ($conn1->connect_error || $conn2->connect_error || $conn3->connect_error || $conn4->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Delete the appointment with the specified ID from the database
	$sql1 = "DELETE FROM appointments WHERE id='$id'";
	$sql2 = "DELETE FROM appointments WHERE id='$id'";
	$sql3 = "DELETE FROM appointments WHERE id='$id'";
	$sql4 = "DELETE FROM appointments WHERE id='$id'";

	$conn1->query($sql1);
	$conn2->query($sql2);
	$conn3->query($sql3);
	$conn4->query($sql4);

	// Close the database connections
	$conn1->close();
	$conn2->close();
	$conn3->close();
	$conn4->close();

	// Redirect the user back to the appointments page
	header("Location: appointments.php");
?>
