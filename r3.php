<!DOCTYPE html>
<html>
<head>
	<title>Reschedule Appointment</title>
	<style type="text/css">
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			padding: 0;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			border: 2px solid #ccc;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px 0px #ccc;
			width: 400px;
			max-width: 100%;
			margin: auto;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 10px;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		label {
			font-weight: bold;
			margin-top: 10px;
			margin-bottom: 5px;
		}
		input[type="datetime-local"], select {
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			width: 100%;
			margin-top: 5px;
			margin-bottom: 10px;
			box-sizing: border-box;
		}
	</style>
</head>
<body bgcolor="#483D8B">

<style>
.form-container {
  background-color: white;
  border: 2px solid rgba(0, 255, 0, 0.5);
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
  padding: 20px;
  margin: auto;
  max-width: 500px;
  text-align: center;
}
</style>

<div class="form-container">
	<form action="reschedule5.php" method="post" style="background-color: white;">
        
		<h2 style="text-align: center;">Reschedule Appointment</h2>
		<label for="email">Email:</label>
		<input type="email" name="email" required>
		<label for="speciality">Speciality:</label>
		<select name="speciality" required>
			<option value="pediatrics">Pediatrics</option>
			<option value="cardiology">Cardiology</option>
			<option value="neurology">Neurology</option>
			<option value="dermatology">Dermatology</option>
			<option value="ophthalmology">Ophthalmology</option>
			<option value="orthopedics">Orthopedics</option>
			<option value="psychiatry">Psychiatry</option>
			<option value="urology">Urology</option>
			<option value="oncology">Oncology</option>
		</select>
		<label for="date">New Date and Time:</label>
		<input type="date" name="date" required>
        <label for="time">Preferred Time</label>
			<input type="time" id="time" name="time" required>
		<input type="submit" value="Reschedule Appointment">
	</form>
    </div>
</body>
</html>
