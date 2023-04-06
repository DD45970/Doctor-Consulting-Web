<!-- confirmation.php -->

<!-- display the appointment details -->
<h1>Appointment Details</h1>
<p><strong>Patient Name:</strong> <span id="patientName"></span></p>
<p><strong>Appointment Date:</strong> <span id="appointmentDate"></span></p>
<p><strong>Appointment Time:</strong> <span id="appointmentTime"></span></p>
<p><strong>Reason for Visit:</strong> <span id="reasonForVisit"></span></p>

<!-- add accept and reject buttons -->
<button id="acceptButton">Accept Appointment</button>
<button id="rejectButton">Reject Appointment</button>

<script>
// retrieve the form data from the URL parameters
const urlParams = new URLSearchParams(window.location.search);
const patientName = urlParams.get('patientName');
const appointmentDate = urlParams.get('appointmentDate');
const appointmentTime = urlParams.get('appointmentTime');
const reasonForVisit = urlParams.get('reasonForVisit');

// display the form data on the page
document.getElementById('patientName').textContent = patientName;
document.getElementById('appointmentDate').textContent = appointmentDate;
document.getElementById('appointmentTime').textContent = appointmentTime;
document.getElementById('reasonForVisit').textContent = reasonForVisit;

// add event listeners to the accept and reject buttons
document.getElementById('acceptButton').addEventListener('click', function() {
  alert('Appointment accepted!');
  // redirect to a success page or perform other actions
});

document.getElementById('rejectButton').addEventListener('click', function() {
  alert('Appointment rejected!');
  // redirect to a failure page or perform other actions
});
</script>
