<?php
    // Retrieve the email from the form data
    $email = $_POST['email'];
   

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

    // Delete the appointments for the specified email from the patient database
    $sql_patient = "DELETE FROM patient WHERE email='$email'";
    $result_patient = $conn_patient->query($sql_patient);

    // Close the patient database connection
    $conn_patient->close();

    // Connect to the speciality databases
    $servername_speciality1 = "localhost";
    $username_speciality1 = "root";
    $password_speciality1 = "";
    $dbname_speciality1 = "pediatrics";
    $conn_speciality1 = new mysqli($servername_speciality1, $username_speciality1, $password_speciality1, $dbname_speciality1);

    // Check if the connection was successful
    if ($conn_speciality1->connect_error) {
        die("Connection failed: " . $conn_speciality1->connect_error);
    }

    // Delete the appointments for the specified email from the speciality1 database
    $sql_speciality1 = "DELETE FROM patient WHERE email='$email'";
    $result_speciality1 = $conn_speciality1->query($sql_speciality1);

    // Close the speciality1 database connection
    $conn_speciality1->close();

    // Repeat the above steps for the remaining speciality databases

?>
