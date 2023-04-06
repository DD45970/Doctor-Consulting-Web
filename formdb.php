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
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $reason = $_POST["reason"];
    

    // Insert the form data into the database
    $sql = "INSERT INTO patient (name,email,phone,date,time,reason) VALUES ('$name', '$email','$phone','$date','$time','$reason')";

    if ($conn->query($sql) === TRUE) {
        
        echo '<a href="thanku.html"><button style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">CONFIRM APPOINTMENT </button></a>';
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}



// Close the database connection
$conn->close();
?>
