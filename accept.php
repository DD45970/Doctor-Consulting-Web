<?php
// Retrieve data from database
$doctor_id = $_POST['doctor_id'];
$patient_id = $_POST['patient_id'];
$appointment_date = $_POST['appointment_date'];

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "askdoc";
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve doctor information
$doctor_query = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";
$doctor_result = $conn->query($doctor_query);
$doctor_row = $doctor_result->fetch_assoc();
$doctor_name = $doctor_row['name'];
$doctor_phone = $doctor_row['phone'];
$doctor_address = $doctor_row['address'];
$doctor_specialization = $doctor_row['specialization'];

// Retrieve patient information
$patient_query = "SELECT * FROM patient WHERE id = '$patient_id'";
$patient_result = $conn->query($patient_query);
$patient_row = $patient_result->fetch_assoc();
$patient_name = $patient_row['name'];
$patient_email = $patient_row['email'];
$patient_reason = $patient_row['reason'];

// Send confirmation email to patient
$to = $patient_email;
$subject = "Appointment Confirmation";
$message = "Dear $patient_name,<br><br>Your appointment with Dr. $doctor_name on $appointment_date has been confirmed.<br><br>Doctor details:<br>Name: $doctor_name<br>Phone: $doctor_phone<br>Address: $doctor_address<br>Specialization: $doctor_specialization<br><br>Reason for appointment: $patient_reason<br><br>Thank you for choosing our clinic.<br><br>Best regards,<br>The Doctor Consulting Team";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Doctor Consulting <info@doctorconsulting.com>" . "\r\n";
mail($to,$subject,$message,$headers);



// Close database connection
$conn->close();

// Redirect doctor to appointment list
header("Location: appointment_list.php");
?>
