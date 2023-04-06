<?php
	// Retrieve the email and appointment id from the form data
	$email = $_POST['email'];
	$id = $_POST['id'];

	// Connect to the database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "askdoc";
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Delete the appointment from the patient table
	$sql = "DELETE FROM patient WHERE email='$email' AND id='$id'";
	if ($conn->query($sql) === TRUE) {
		echo "Appointment deleted from patient table successfully.<br>";
	} else {
		echo "Error deleting appointment from patient table: " . $conn->error . "<br>";
	}

	// Delete the appointment from each of the speciality tables
	$specialities = array("cardiology", "dermatologist", "neurology", "oncology", "ophthalmology", "orthopedics", "pediatrics", "psychiatry", "urology");
	foreach ($specialities as $speciality) {
		$sql = "DELETE FROM $speciality WHERE email='$email' AND id='$id'";
		if ($conn->query($sql) === TRUE) {
			echo "Appointment deleted from $speciality table successfully.<br>";
		} else {
			echo "Error deleting appointment from $speciality table: " . $conn->error . "<br>";
		}
	}

	// Close the database connection
	$conn->close();
?>
