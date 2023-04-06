<?php
// Change these settings to match your XAMPP database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "askdoc";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    

    // Insert the form data into the database
    $sql = "INSERT INTO doctors (user,pass) VALUES ('$user', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Form data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
