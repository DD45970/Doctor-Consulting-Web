<?php
// Retrieve the form data for the updated appointment
$email = $_POST['email'];

$speciality = $_POST['speciality'];
$date = $_POST['date'];
$time = $_POST['time'];

// Connect to the patient database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "askdoc";
$conn_patient = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn_patient->connect_error) {
    die("Connection failed: " . $conn_patient->connect_error);
}

// Update the appointment in the patient database
$sql_patient = "UPDATE patient SET date='$date', time='$time' WHERE email='$email' ";
$result_patient = $conn_patient->query($sql_patient);

// Close the patient database connection
$conn_patient->close();

// Connect to the speciality database based on the given speciality
$servername_speciality = "localhost";
$username_speciality = "root";
$password_speciality = "";
$dbname_speciality = $speciality; // database name based on speciality
$conn_speciality = new mysqli($servername_speciality, $username_speciality, $password_speciality, $dbname_speciality);

// Check if the connection was successful
if ($conn_speciality->connect_error) {
    die("Connection failed: " . $conn_speciality->connect_error);
}

// Update the appointment in the speciality database
$sql_speciality = "UPDATE appointments SET date='$date', time='$time' WHERE email='$email'";
$result_speciality = $conn_speciality->query($sql_speciality);

// Close the speciality database connection
$conn_speciality->close();

// Display a success message to the user
echo "<div style='text-align:center'>";
echo "<p style='color: green;'>Appointment rescheduled successfully!</p>";
echo "</div>";
?>
