<!DOCTYPE html>
<html>
<head>
	<title>Reschedule Appointment</title>
	<style>
		h1, form {
			margin: 20px;
		}
		form label {
			display: block;
			margin-bottom: 10px;
		}
		form input[type="submit"] {
			padding: 5px 10px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		form input[type="submit"]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Reschedule Appointment</h1>
	<?php
		// Retrieve the appointment ID from the form data
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

		// Retrieve the appointment details for the specified ID
		$sql = "SELECT * FROM patient WHERE id='$id'";
		$result = $conn->query($sql);

		// Display the appointment details
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			echo '<form action="reschedule1.php" method="POST">';
			echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
			echo '<label for="date">Date:</label>';
			echo '<input type="date" id="date" name="date" value="' . $row['date'] . '">';
			echo '<label for="time">Time:</label>';
			echo '<input type="time" id="time" name="time" value="' . $row['time'] . '">';
			echo '<input type="submit" value="Reschedule">';
			echo '</form>';
		} else {
			echo "<p>No appointment found for ID: " . $id . "</p>";
		}

		// Close the database connection
		$conn->close();
	?>
</body>
</html>
