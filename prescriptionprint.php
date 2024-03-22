<?php
// Start a session
ob_start();
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['DoctorID'])) {
    header("Location: login.php");
    exit();
}

// Function to generate PDF from HTML content
function generatePDF($html)
{
    require_once 'vendor/autoload.php'; // Adjust the path if necessary

    $dompdf = new Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    return $dompdf->output();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions</title>
    <link rel="icon" href="imgs/drcare.ico" type="image/x-icon">
</head>

<body style="color: white; background-color: #2C2842;">
    <div class="container" style="box-shadow: rgba(29, 29, 31, 0.25) 0 10px 60px; display: flex; height: auto; max-width: 900px; margin: 2.5em auto; margin-top: 150px; margin-bottom: 30px;">
        <div class="main main--team" style="width: 100%; height: auto;">
            <?php
            // Linking Database.php
            require "db/DataBase.php";
            $database = new DataBase();
            $conn = $database->dbConnect();
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $id = $_GET['id'];

            if ($id) {
                $sql = "SELECT 
                            D.FirstName AS DoctorFirstName, 
                            D.LastName AS DoctorLastName, 
                            P.*, 
                            MR.DateAdded,
                            TIMESTAMPDIFF(YEAR, P.DateOfBirth, CURDATE()) AS Age
                        FROM 
                            Appointments A
                        INNER JOIN 
                            MedicalRecords MR ON A.RecordID = MR.RecordID
                        INNER JOIN 
                            Doctors D ON A.DoctorID = D.DoctorID
                        INNER JOIN 
                            Patients P ON A.PatientID = P.PatientID
                    
                        WHERE 
                            A.RecordID = $id";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <section class="prescription-letterhead" style="background-color: #433F57; overflow: hidden; white-space: nowrap; height: 200px; margin: 20px; border-radius: 10px; text-align: center;">
                        <h2> Piliyandala Medical Center </h2>
                        <div class="letterhead-info" style="display: flex; height: 180px; align-items: center; justify-content: space-between;">
                            <div class="doctor-name">
                                <h4>Dr. <?php echo $row["DoctorFirstName"]; ?> <?php echo $row["DoctorLastName"]; ?></h4>
                            </div>
                            <div class="date">
                                <h4><?php echo $row['DateAdded']; ?></h4>
                            </div>
                        </div>
                    </section>
                    <section class="info-border" style="background-color: #433F57; display: flex; justify-content: center; align-items: center; overflow: hidden; white-space: nowrap; height: 70px; margin: 20px auto; width: 85%; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                        <section class="contact">
                            <h5> Contact: 074-777-2222</h5>
                        </section>
                        <div class="divider" style="background-color: white; width: 0.185rem; height: 2.5rem; margin-right: 30px;"></div>
                        <section class="email">
                            <h5> Email: <?php echo $row['Email']; ?></h5>
                        </section>
                    </section>
                    <section class="prescription-details" style="background-color: #433F57; height: auto; margin: 20px auto; width: 85%; border-radius: 10px;">
                        <div class="prescription-details-box" style="background-color: white; color: black; padding: 1.2em; height: auto; margin: 20px auto; width: 100%; border-radius: 10px;">
                            <div class="patient" style="display: flex; width: 100%;">
                                <div class="patientName" style="width: 100%; margin: 0;">
                                    <h4><?php echo $row["FirstName"]; ?> <?php echo $row["LastName"]; ?></h4>
                                </div>
                                <div class="patientName"></div>
                                <div class="patientAge" style="text-align: right; width: 50%; margin: 0;">
                                    <h5>Age: <?php echo $row['Age']; ?> Years</h5>
                                </div>
                            </div>
                            <?php
                            $prescription_sql = "SELECT * FROM PrescriptionDetails WHERE RecordID = $id";
                            $prescription_result = mysqli_query($conn, $prescription_sql);
                            while ($prescription_row = mysqli_fetch_array($prescription_result)) {
                            ?>
                                <div class="Meds" style="background-color: #5d6091; border-radius: 15px; margin: 10px 0; padding: 1.5em; display: flex; width: 100%;">
                                    <div class="MedName" style="width: 100%; margin: 0;">
                                        <h5><?php echo $prescription_row['MedName']; ?></h5>
                                        <p><?php echo $prescription_row['ScTime']; ?></p>
                                    </div>
                                    <div class="MedName"></div>
                                    <div class="Meal" style="text-align: right; width: 50%; margin: 0;">
                                        <h6><?php echo $prescription_row['Meal']; ?></h6>
                                        <p><?php echo $prescription_row['MedPeriod']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </section>
            <?php
                }
            }
            ?>
            <form method="post" action="">
                <button type="submit" name="print_pdf" class="button button--add" style="background: #14BDCB; align-self: flex-end; box-shadow: rgba(29, 29, 31, 0.2) 0 10px 60px; color: var(--white); margin-top: 10px; margin-bottom: 30px; margin-right: 65px;">Print PDF</button>
            </form>
        </div>
    </div>

    <?php
    // Check if print button is clicked
    if (isset($_POST['print_pdf'])) {
        // Generate PDF from HTML content
        $pdf_content = ob_get_clean();
        $pdf = generatePDF($pdf_content);

        // Send PDF file to browser for download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="prescription.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        echo $pdf;
        exit;
    }
    ob_end_flush();
    ?>
</body>

</html>