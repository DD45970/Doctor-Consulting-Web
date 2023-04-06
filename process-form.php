<?php
// get the form data
$patientName = $_POST['patientName'];
$appointmentDate = $_POST['appointmentDate'];
$appointmentTime = $_POST['appointmentTime'];
$reasonForVisit = $_POST['reasonForVisit'];

// validate the form data (e.g. check for empty fields)

// redirect the user to the appointment confirmation page with the form data as URL parameters
header("Location: confirmation.php?patientName=$patientName&appointmentDate=$appointmentDate&appointmentTime=$appointmentTime&reasonForVisit=$reasonForVisit");
exit;
?>
