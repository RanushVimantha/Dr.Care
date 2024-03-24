<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>List of Patients</title>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style="text-align: center; color: white;">Dr. Jayawickrama's Patients</h2>
<link rel="stylesheet" href=styles/patientlist.css>
</head>
<body>
<?php include('header.php'); ?>
    <script type="text/javascript" src="js/light-dark.js"></script>

<button class="add-patient-button" onclick="addPatient()"><img src="https://cdn-icons-png.flaticon.com/512/6620/6620101.png" alt="Logo">Add New Patient </button>

<div class="container" style="height: 600px; overflow-y: auto;">
  <ul>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 1</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 2</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 3</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 4</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 5</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 6</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 7</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 8</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 9</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 10</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 11</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 12</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 13</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  <li><div class="patient-tab" onclick="showPatientDetails('patient1')"><b>Patient 14</b><br><span style="font-size: smaller;">Lorem Ipsum is simply dummy text of the printing and typesetting industry</span><br> <br></div></li>
  


 </ul>
</div>

<script>
  function showPatientDetails(patientId) {
    // Here you can implement functionality to display patient details based on the patientId
    // For now, let's just log the patient id to console
    console.log("Clicked patient: " + patientId);
  }
</script>
<?php include('footer.php'); ?>
</body>
</html>
