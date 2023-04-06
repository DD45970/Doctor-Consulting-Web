<?php
// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$reason = $_POST['reason'];
$specialty = $_POST['specialty'];
$phone = $_POST['phone'];


// Connect to the appropriate database based on the selected doctor specialty
if ($specialty == "Cardiologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cardiology";
} elseif ($specialty == "Oncologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "oncologist";
} elseif ($specialty == "Pediatrics") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pediatrics";
} elseif ($specialty == "Dermatologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dermatologist";
} elseif ($specialty == "Neurologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "neurologist";
} elseif ($specialty == "Physiatrists") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "physiatrists";
} elseif ($specialty == "Internal Medicine") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "internalmedicine";
}
elseif ($specialty == "Gynaecologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gynaecologist";

}
elseif ($specialty == "Orthopaedic") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "orthopaedic";

}
elseif ($specialty == "Ophthalmologist") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ophthalmologist";

}
else {
    die("Invalid specialty selected");
}

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the form data into the appropriate database table
$sql = "INSERT INTO patient (name, email, phone,date, time, reason) VALUES ('$name', '$email','$phone', '$date', '$time', '$reason')";
if ($conn->query($sql) === TRUE) {
        
    echo '<a href="thanku.html"><button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">CONFIRM APPOINTMENT </button></a>';
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
