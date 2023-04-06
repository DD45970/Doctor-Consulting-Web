<!DOCTYPE html>
<html>
<head>
	<title>Reschedule Appointment</title>
	<style>
		.center {
			margin: auto;
			width: 50%;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="center">
		<h1>Reschedule Appointment</h1>
		<form method="POST" action="reschedule.php">
			<label for="appointment_id">Appointment ID:</label><br>
			<input type="text" id="appointment_id" name="appointment_id" required><br><br>

			<label for="new_date">New Date:</label><br>
			<input type="date" id="new_date" name="new_date" required><br><br>

			<label for="new_time">New Time:</label><br>
			<input type="time" id="new_time" name="new_time" required><br><br>

			<input type="submit" value="Reschedule">
		</form>

		<?php
			// Check if the form was submitted
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				// Retrieve the appointment ID and new date and time values from the form data
				$appointment_id = $_POST["appointment_id"];
				$new_date = $_POST["new_date"];
				$new_time = $_POST["new_time"];

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

				// Update the appointment record with the new date and time values
				$sql = "UPDATE appointments SET date='$new_date', time='$new_time' WHERE id='$appointment_id'";
				$result = $conn->query($sql);

				// Check if the update was successful
				if ($result) {
					echo "<p style='color: green;'>Appointment rescheduled successfully!</p>";
				} else {
					echo "<p style='color: red;'>Error: " . $conn->error . "</p>";
				}

				// Close the database connection
				$conn->close();
			}
		?>
	</div>
</body>
</html>
