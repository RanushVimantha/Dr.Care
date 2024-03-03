<?php
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['DoctorID'])) {
    header("Location: login.php");
    exit();
}
?>

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Patient Info</title>
  <link rel="icon" href="imgs/drcare.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>

<div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>

  <div class="wholeform">
    <form id="PatientInfo" name="PatientInfo" action="process.php" method="post" class="row g-3 needs-validation" novalidate>
      <h1>Patient Info</h1>

        <!-- First Name -->

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="firstname" placeholder="Enter Your First Name" id="validationCustom01" required>
        <label for="floatingInput">First Name</label>
        <div class="invalid-feedback"> Should Enter the First Name! </div>
      </div>

      <!-- Second Name -->


      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="lastname" placeholder="Enter Your Last Name" id="validationCustom02" required>
        <label for="floatingInput">Last Name</label>
        <div class="invalid-feedback"> Should Enter the Last Name! </div>
      </div>

      <!-- Email -->

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email" id="validationCustom03" required>
        <label for="floatingInput">Email address</label>
        <div class="invalid-feedback"> Should be a Valid Email! </div>
      </div>

      <!-- Gender -->

      <div class="form-select">
        <select name="gender" class="form-control" id="validationCustom05" required>
          <option selected disabled value="">Select Gender:</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
          <option value="Other">Other</option>
        </select>
        <div class="invalid-feedback"> Please select a valid Gender. </div>
      </div>

      <!-- Phone Number -->

      <span class="number">

        <label for="floatingInput">Phone Number : </label>
        <input type="tel" id="validationCustom04" name="contactnumber" placeholder="094-778-91-5586" pattern="[0-9]{10}" required>
        <div class="invalid-feedback"> Enter the Phone Number in this format ( 094-778-91-5586 )</div>
      </span>

      <!-- DOB -->

      <span class="DOB">
        <label for="floatingInput">Date Of Birth : </label>
        <input type="date" name="date" id="validationCustom04" required>
        <div class="invalid-feedback"> Birth Date is Required! </div>
      </span>

      <!-- Diagnosis -->

      <div class="form-floating">
        <textarea class="form-control" name="Diagnosis" placeholder="Give the Diagnosis here" style="height: 200px"></textarea>
        <label for="floatingTextarea2">Diagnosis</label>
      </div>

      <!-- Medications -->

      <div class="form-floating">
        <textarea class="form-control" name="Medications" placeholder="Give the Medicationsis here" style="height: 200px"></textarea>
        <label for="floatingTextarea2">Medications</label>
      </div>

      <!-- Submit -->

      <div class="form-element my-4">
                <input type="submit" name="create" value="Add Patient" class="btn btn-primary">
            </div>

    </form>
  </div>
</div>
  <script>
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>

</html>