<?php
include('connect.php');
if (isset($_POST["create"])) {
    $FirstName = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $LastName = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $DateOfBirth = date('Y-m-d', strtotime($_POST['date']));
    $Gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $ContactNumber = mysqli_real_escape_string($conn, $_POST["contactnumber"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Diagnosis = $_POST["Diagnosis"];
    $Medications = $_POST["Medications"];

    // Check if the patient already exists
    $existingPatientID = 0;
    $checkStmt = $conn->prepare("SELECT PatientID FROM Patients WHERE FirstName = ? AND LastName = ?");
    $checkStmt->bind_param("ss", $FirstName, $LastName);
    $checkStmt->execute();
    $checkStmt->bind_result($existingPatientID);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($existingPatientID) {
        // If the patient already exists, insert a new record in MedicalRecords with the same PatientID
        $stmt = $conn->prepare("INSERT INTO MedicalRecords (PatientID, Diagnosis, Medications) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $existingPatientID, $Diagnosis, $Medications);
        if ($stmt->execute()) {
            session_start();
            $_SESSION["create"] = "Medical Records Inserted Successfully!";
            header("Location:index.php");
        } else {
            die("Something went wrong with inserting medical records.");
        }
    } else {
        // If the patient doesn't exist, insert a new patient and their MedicalRecords
        $stmt = $conn->prepare("INSERT INTO Patients (FirstName, LastName, DateOfBirth, Gender, ContactNumber, Email) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $FirstName, $LastName, $DateOfBirth, $Gender, $ContactNumber, $Email);
        // Start a transaction
        $conn->begin_transaction();

        if ($stmt->execute()) {
            // Retrieve the generated PatientID
            $patientID = $conn->insert_id;

            // Insert patient succeeded, now insert medical records with the new PatientID
            $stmt = $conn->prepare("INSERT INTO MedicalRecords (PatientID, Diagnosis, Medications) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $patientID, $Diagnosis, $Medications);

            if ($stmt->execute()) {
                // Both inserts successful, commit the transaction
                $conn->commit();
                session_start();
                $_SESSION["create"] = "Patient Recorded Successfully!";
                header("Location:index.php");
            } else {
                // Medical records insertion failed, roll back the transaction
                $conn->rollback();
                die("Something went wrong with medical records insertion.");
            }
        } else {
            // Patient insertion failed
            die("Something went wrong with patient insertion.");
        }
    }
}


// OLD CODE

/* include('connect.php');
if (isset($_POST["create"])) {
    $FirstName = mysqli_real_escape_string($conn, $_POST["firstname"]);
    $LastName = mysqli_real_escape_string($conn, $_POST["lastname"]);
    $DateOfBirth = date('Y-m-d', strtotime($_POST['date']));
    $Gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $ContactNumber = mysqli_real_escape_string($conn, $_POST["contactnumber"]);
    $Email = mysqli_real_escape_string($conn, $_POST["email"]);
    $Diagnosis = mysqli_real_escape_string($conn, $_POST["Diagnosis"]);
    $Medications = mysqli_real_escape_string($conn, $_POST["Medications"]);

    $sqlInsert = "INSERT INTO patients(FirstName , LastName , DateOfBirth , Gender , ContactNumber , Email) VALUES ('$FirstName','$LastName','$DateOfBirth','$Gender','$ContactNumber','$Email')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Patitent Recorded Sucessfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }

    $sqlInsert = "INSERT INTO medicalrecords(Diagnosis , Medications) VALUES ('$Diagnosis','$Medications')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Patitent Recorded Sucessfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }

} */


// CODE FOR EDITING (HAVE TO MAKE)


/* if (isset($_POST["edit"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
} */
?>