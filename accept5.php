<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "neurologist";
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve doctor ID
$doctor_id = 5; // replace with the doctor ID you want to retrieve

// Retrieve patient ID based on doctor ID
$patient_query = "SELECT id FROM patient ";
$patient_result = $conn->query($patient_query);
if ($patient_result->num_rows > 0) {
    $patient_row = $patient_result->fetch_assoc();
    $patient_id = $patient_row['id'];

    // Retrieve patient email
    $patient_query = "SELECT email FROM patient WHERE id = '$patient_id'";
    $patient_result = $conn->query($patient_query);
    if ($patient_result->num_rows > 0) {
        $patient_row = $patient_result->fetch_assoc();
        $patient_email = $patient_row['email'];

        // Retrieve doctor details
        $doctor_query = "SELECT * FROM doctors WHERE doctor_id = '$doctor_id'";
        $doctor_result = $conn->query($doctor_query);
        if ($doctor_result->num_rows > 0) {
            $doctor_row = $doctor_result->fetch_assoc();
            $doctor_name = $doctor_row['name'];
            $doctor_contact = $doctor_row['contact'];
            $doctor_address = $doctor_row['address'];
            $doctor_specialization = $doctor_row['specialization'];
            $doctor_reviews = $doctor_row['reviews'];

            // Send confirmation email to patient
            $to = $patient_email;
            $subject = "Appointment Confirmation";
            $message = "Dear Patient,<br><br>Your appointment with Dr. $doctor_name has been confirmed.<br><br>Doctor details:<br>Name: $doctor_name<br>Phone: $doctor_contact<br>Address: $doctor_address<br>Specialization: $doctor_specialization<br>Reviews: $doctor_reviews<br><br>Thank you for choosing our services.<br><br>Best regards,<br>The Doctor Consulting Team";
            $headers = "From: Your Name <darshandhamode@gmail.com>\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            mail($to, $subject, $message, $headers);
            echo '<div style="background-color: #d4edda; color: #155724; padding: 10px; text-align: center;">Appointment has been successfully accepted.</div>';

        } else {
            echo "Error: Doctor not found.";
        }
    } else {
        echo "Error: Patient email not found.";
    }
} else {
    echo "Error: Patient not found.";
}
