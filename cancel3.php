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

    // Connect to the speciality databases and delete records from each one
    $speciality_databases = array(
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"pediatrics"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"cardiology"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"neurologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"dermatologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"oncologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"orthopaedic"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"gynaecologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"ophthalmologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"oncologist"),
        array("servername"=>"localhost", "username"=>"root", "password"=>"", "dbname"=>"internalmedicine")
    );

    foreach ($speciality_databases as $database) {
        // Connect to the speciality database
        $conn_speciality = new mysqli($database["servername"], $database["username"], $database["password"], $database["dbname"]);

        // Check if the connection was successful
        if ($conn_speciality->connect_error) {
            die("Connection failed: " . $conn_speciality->connect_error);
        }

        // Delete the appointments for the specified email from the speciality-specific database
        $sql_speciality = "DELETE FROM " . $database["dbname"] . ".patient WHERE email='$email'";
        $result_speciality = $conn_speciality->query($sql_speciality);

        // Close the speciality database connection
        $conn_speciality->close();
    }

     // Display a success message
     echo '<div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 10px;">';
     echo 'Your appointment has been cancelled successfully.';
     echo '</div>';
 ?>
 
 <style>
     div {
         border: 1px solid #ccc;
         border-radius: 3px;
     }
 </style>

