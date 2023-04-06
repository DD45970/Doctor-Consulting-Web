<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
</head>
<body>
	<h1>Your Appointments</h1>
	<?php
		// Retrieve the email from the form data
		$email = $_POST['email'];

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

		// Retrieve the appointments for the specified email
		$sql = "SELECT * FROM patient WHERE email='$email'";
		$result = $conn->query($sql);

		// Display the appointments
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				
				echo "<p>Date: " . $row['date'] . "</p>";
				echo "<p>Time: " . $row['time'] . "</p>";
				echo "<p>Reason: " . $row['reason'] . "</p>";
				
				echo '<form action="cancel.php" method="POST">';
				echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
				echo '<button type="submit">Cancel</button>';
				echo '</form>';
				echo '<form action="reschedule.php" method="POST">';
				echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
				echo '<button type="submit">Reschedule</button>';
				echo '</form>';
				echo "<hr>";
			}
		} else {
			echo "<p>No appointments found for email: " . $email . "</p>";
		}

		// Close the database connection
		$conn->close();
	?>
</body>
</html>
