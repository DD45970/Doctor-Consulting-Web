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
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "cardiology";
    $dbname2 = "askdoc";
} elseif ($specialty == "Oncologist") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "oncologist";
    $dbname2 = "askdoc";
} elseif ($specialty == "Pediatrics") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "pediatrics";
    $dbname2 = "askdoc";
} elseif ($specialty == "Dermatologist") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "dermatologist";
    $dbname2 = "askdoc";
}  elseif ($specialty == "Neurologist") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "neurologist";
    $dbname2 = "askdoc";
} elseif ($specialty == "Physiatrists") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "physiatrists";
    $dbname2 = "askdoc";
} elseif ($specialty == "Internal Medicine") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "internalmedicine";
    $dbname2 = "askdoc";
}
elseif ($specialty == "Gynaecologist") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "gynaecologist";
    $dbname2 = "askdoc";

}
elseif ($specialty == "Orthopaedic") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "orthopaedic";
    $dbname2 = "askdoc";

}
elseif ($specialty == "Ophthalmologist") {
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";
    $dbname1 = "ophthalmologist";
    $dbname2 = "askdoc";

}

// Create a new connection to the first database
$conn1 = new mysqli($servername1, $username1, $password1, $dbname1);

// Check if the first connection was successful
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

// Insert the form data into the appropriate table in the first database
$sql1 = "INSERT INTO patient (name, email, date, time, reason) VALUES ('$name', '$email', '$date', '$time', '$reason')";
if ($conn1->query($sql1) === TRUE) {
    echo '<a href="thanku.html"><button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">CONFIRM APPOINTMENT </button></a>';
} else {
    echo "Error: " . $sql1 . "<br>" . $conn1->error;
}

// Close the first database connection
$conn1->close();

// Create a new connection to the second database
$conn2 = new mysqli($servername1, $username1, $password1, $dbname2);

// Check if the second connection was successful
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// Insert the form data into the appropriate table in the second database
$sql2 = "INSERT INTO patient (name, email,phone, date, time, reason) VALUES ('$name', '$email','$phone', '$date', '$time', '$reason')";
if ($conn2->query($sql2) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn2->error;
}

// Close the second database connection
$conn2->close();
?>
