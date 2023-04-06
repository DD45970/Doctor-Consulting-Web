<!DOCTYPE html>
<html>
<head>
	<title>Doctor Portal</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			text-align: left;
			padding: 8px;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		.accept-btn, .reject-btn {
			background-color: #4CAF50;
			border: none;
			color: white;
			padding: 8px 16px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 4px;
		}

		.accept-btn:hover, .reject-btn:hover {
			background-color: #3e8e41;
		}
	</style>
</head>
<body>
	<h1>Welcome Dr. Rakesh Kumar</h1>

	<table>
		<tr>
			<th>Patient Name</th>
			<th>Appointment Date</th>
			<th>Appointment Time</th>
            <th>Reason </th>
			<th>Actions</th>
		</tr>

		<?php
			// Connect to the database
			$conn = mysqli_connect("localhost", "root", "", "neurologist");

			// Check connection
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}

			// Select all patients from the database
			$sql = "SELECT * FROM patient";
			$result = mysqli_query($conn, $sql);

			// Check if any patients were found
			if (mysqli_num_rows($result) > 0) {
				// Output data of each patient
				while($row = mysqli_fetch_assoc($result)) {
					// Display the patient details in a table row
					echo "<tr>";
					echo "<td>" . $row["name"] . "</td>";
					echo "<td>" . $row["date"] . "</td>";
					echo "<td>" . $row["time"] . "</td>";
					
					echo "<td>" . $row["reason"] . "</td>";
					echo "<td>";
					// Display accept and reject buttons
					echo '<a href="accept5.php?id=' . $row["id"] . '"><button class="accept-btn">Accept</button></a>';
					echo '<a href="reject.php?id=' . $row["id"] . '"><button class="reject-btn">Reject</button></a>';
					echo "</td>";
					echo "</tr>";
				}
			} else {
				echo "<tr><td colspan='6'>No patients found</td></tr>";
			}

			// Close the database connection
			mysqli_close($conn);
		?>
	</table>
</body>
</html>
