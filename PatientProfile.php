<?php
// Start a session
ob_start();
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['DoctorID'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/patientprofile.css">
    <title>Prescriptions</title>
    <link rel="icon" href="imgs/drcare.ico" type="image/x-icon">

    <style>
        body {
            color: white;
        }

        table td,
        table th {
            vertical-align: middle;
            text-align: right;
            padding: 20px !important;
            color: white;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <script type="text/javascript" src="js/light-dark.js"></script>

    <div class="container">

        <div class="main main--team">

                    <section class="prescription-letterhead">
                    <?php
                    
                        // Linking Database.php
                        require "db/DataBase.php";
                        $database = new DataBase();
                        $conn = $database->dbConnect();
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Get the DoctorID from $_SESSION['DoctorID']
                        $doctorID = $_SESSION['DoctorID'];
                        // Showing All the Diagnosis and Medications relavant to the Patient

                        $sql = "SELECT * FROM Doctors WHERE DoctorID = $doctorID";
                        $result = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                        
                        <div class="letter-head-buttons">
                            <a class="info-button" href="">
                                <div class="button button--add2">
                                    <h6>Edit Info<h6>
                                </div>
                             </a>

                             <a class="delete-button" href="">
                                <div class="button button--add3">
                                    <h6>Delete Profile</h6>
                                </div>
                             </a>
                        </div>



                            <!-- Profile Image !-->
                            <div class="dpfp">
                                <img src="imgs/Logo.png" alt="Profile Image">
                            </div>
                            <!-- End of Profile Image -->
                            <div class="h3sb">
                                <h3>Dr. <?php echo $data['FirstName']; ?> <?php echo $data['LastName']; ?></h3>
                            </div>
                        <?php
                        }
                    ?>

                    </section>


                    <section class="info-border">
                        <section class="contact">
                            <h5> Contact: 074-777-2222</h5>
                        </section>
                        <div class="divider">

                        </div>
                        <section class="email">
                            <h5> Email: Email</h5>
                        </section>

                    </section>

                    <section class="add-record">
                        <a class="add-record-button" href="AddRecord.php">
                            <h5> Add Record</h5>
                        </a>
                    </section>

                    <section class="prescription-details">

                        <div class="patient-container">
                            <ul>
                            <?php
                            // Fetch patients treated by the logged-in doctor
                                        $sqlPatients = "SELECT p.*, m.* 
                                                    FROM patients p 
                                                    LEFT JOIN MedicalRecords m ON p.PatientID = m.PatientID 
                                                    WHERE m.RecordID IN (SELECT MAX(RecordID) FROM MedicalRecords GROUP BY PatientID) 
                                                    AND p.PatientID IN (SELECT PatientID FROM Appointments WHERE DoctorID = $doctorID)
                                                    ORDER BY m.DateAdded DESC";

                                        $resultPatients = mysqli_query($conn, $sqlPatients);
                                        $prevPatientID = null; // Variable to keep track of the previous patient ID

                                        while ($row = mysqli_fetch_assoc($resultPatients)) {
                                            // Check if it's a new patient
                                            if ($row['PatientID'] != $prevPatientID) {
                                            // Truncate the Diagnosis text if it's longer than 50 characters
                                            $diagnosis = strlen($row['Diagnosis']) > 50 ? substr($row['Diagnosis'], 0, 200) . "...read more" : $row['Diagnosis'];
                                        ?>
                                            <a href="PatientView.php?id=<?php echo $row['PatientID']; ?>" style="text-decoration: none;">
                                                <li>
                                                <div class="patient-tab" onclick="showPatientDetails('patient1')"><b><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></b>
                                                    <br>
                                                    <span style="font-size: 15px;"><?php echo $row['Gender']; ?></span> <br>
                                                    <span style="font-size: 13px;"><?php echo $diagnosis; ?></span>
                                                    <br> <br>
                                                </div>
                                                </li>
                                            </a>
                                        <?php
                                            // Update the previous patient ID
                                            $prevPatientID = $row['PatientID'];
                                            }
                                        }
                                        ?>
                                </ul>
                        </div>

                    </section>

        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>