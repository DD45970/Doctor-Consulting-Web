<!DOCTYPE html>
<html>
<head>
	<title>Appointments</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
			margin-bottom: 30px;
		}
		p {
			margin: 0;
			padding: 5px;
			border: 1px solid #ccc;
			border-radius: 5px;
			background-color: #f9f9f9;
		}
		form {
			margin-bottom: 10px;
		}
		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
		button:hover {
			background-color: #3e8e41;
		}
	</style>
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
				
				echo '<form action="cancel3.php" method="POST">';
				echo '<input type="hidden" name="email"  value="' . $row['id'] . '">';
				echo '<button type="submit">Cancel</button>';
				echo '</form>';
				echo '<form action="r3.php" method="POST">';
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
