<?php
if (isset($_POST["edit"])) {
    $id = $_POST["id"];
    $FirstName = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $LastName = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $DateOfBirth = date('Y-m-d', strtotime($_POST['date']));
    $Gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $ContactNumber = mysqli_real_escape_string($conn, $_POST["contactnumber"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Diagnosis = $_POST["Diagnosis"];
    $Medications = $_POST["Medications"];

    // Update patient's information
    $sqlUpdate = "UPDATE Patients SET FirstName = '$FirstName', LastName = '$LastName', DateOfBirth = '$DateOfBirth', Gender = '$Gender', ContactNumber = '$ContactNumber', Email = '$Email' WHERE PatientID='$id'";
    
    if (mysqli_query($conn, $sqlUpdate)) {
        // Patient information updated successfully

        // Fetch all record IDs for the same patient
        $recordIDs = array();
        $sqlFetchRecordIDs = "SELECT RecordID FROM MedicalRecords WHERE PatientID='$id'";
        $result = mysqli_query($conn, $sqlFetchRecordIDs);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $recordIDs[] = $row['RecordID'];
            }

            // Loop through the record IDs and update each record
            foreach ($recordIDs as $recordID) {
                $sqlUpdateRecords = "UPDATE MedicalRecords SET Diagnosis = '$Diagnosis', Medications = '$Medications' WHERE RecordID='$recordID'";
                mysqli_query($conn, $sqlUpdateRecords);
            }

            session_start();
            $_SESSION["update"] = "Patient Updated Successfully!";
            header("Location:index.php");
        } else {
            die("Error fetching record IDs: " . mysqli_error($conn));
        }
    } else {
        die("Something went wrong with updating patient information: " . mysqli_error($conn));
    }
}
?>