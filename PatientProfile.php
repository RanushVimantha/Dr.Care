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
    <link rel="stylesheet" href="styles/prescriptionoutput.css">
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

                        <h2> Medical Prescription </h2>

                        <div class="letterhead-info">
                            <div class="doctor-name">
                                <h4>Dr. Name</h4>
                            </div>

                            <div class="date">
                                <h4>Date</h4>
                            </div>
                        </div>
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

                    <section class="prescription-details">
                        <div class="prescription-details-box">
                            <!--  Patient Information -->
                            <div class="patient">
                                <div class="patientName">
                                    <h4>Name</h4>
                                </div>
                                <div class="patientName"></div>
                                <div class="patientAge">
                                    <h5>Age: age Years</h5>
                                </div>
                            </div>

                            
                                <div class="Meds">
                                    <div class="MedName">
                                        <h5>Name</h5>
                                        <p>Time</p>
                                    </div>
                                    <div class="MedName"></div>
                                    <div class="Meal">
                                        <h6>Meal</h6>
                                        <p>Period</p>
                                    </div>
                                </div>
                        </div>
                    </section>


            <a class="print-button" href="prescriptionprint.php?id=<?php echo $id; ?>">
                <div class="button button--add">
                    Print
                </div>
            </a>


        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>