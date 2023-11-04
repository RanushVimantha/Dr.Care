<?php
if (isset($_GET['id'])) {
    include("connect.php");
    $id = $_GET['id'];

    // Get patient details before deleting
    $select_Patientsquery = "SELECT * FROM Patients WHERE PatientID='$id'";
    $Patientsresult = mysqli_query($conn, $select_Patientsquery);
    $patient_data = mysqli_fetch_assoc($Patientsresult);

    if ($patient_data) {
        // Insert patient details into DeletedPatients table
        $insert_query = "INSERT INTO DeletedPatients (PatientID, FirstName, LastName, DateOfBirth, Gender, ContactNumber, Email) 
                        VALUES ('$patient_data[PatientID]', '$patient_data[FirstName]', '$patient_data[LastName]', 
                                '$patient_data[DateOfBirth]', '$patient_data[Gender]', '$patient_data[ContactNumber]', 
                                '$patient_data[Email]')";
        mysqli_query($conn, $insert_query);

        // Delete the patient record from Patients table
        $delete_patient_query = "DELETE FROM Patients WHERE PatientID='$id'";
        mysqli_query($conn, $delete_patient_query);

        // Now, let's handle MedicalRecords
        $select_MedicalRecordsquery = "SELECT * FROM MedicalRecords WHERE PatientID='$id'";
        $MedicalRecordsresult = mysqli_query($conn, $select_MedicalRecordsquery);
        
        while ($MedicalRecords_data = mysqli_fetch_assoc($MedicalRecordsresult)) {
            // Insert MedicalRecords details into DeletedPatients table for each record
            $insert_medical_query = "INSERT INTO DeletedPatients (PatientID, RecordID, Diagnosis, Medications) 
            VALUES ('$MedicalRecords_data[PatientID]', '$MedicalRecords_data[RecordID]', '$MedicalRecords_data[Diagnosis]', '$MedicalRecords_data[Medications]')";
            mysqli_query($conn, $insert_medical_query);
        }

        // Delete all related records in MedicalRecords table for this patient
        $delete_medicalrecords_query = "DELETE FROM MedicalRecords WHERE PatientID='$id'";
        mysqli_query($conn, $delete_medicalrecords_query);

        session_start();
        $_SESSION["delete"] = "Deleted!";
        header("Location:index.php");
    } else {
        echo "Patient does not exist";
    }
} else {
    echo "Invalid request";
}
?>
