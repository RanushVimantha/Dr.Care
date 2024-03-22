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

                <h2> Piliyandala Medical Center </h2>
                
                <div class="letterhead-info">
                    <div class="doctor-name">
                        <h4>Dr.Ranush Vimantha</h4>
                    </div>

                    <div class="date">
                        <h4>Date: 03/22/2024</h4>
                    </div>
                </div>

                
            </section>


            <section class="info-border">
                <section class ="contact">
                    <h5> Contact: 074-777-2222</h5>
                </section>
                <div class="divider">
                
                </div>
                <section class="email">
                    <h5> Email: deadline24th@gmail.com</h5>
                </section>

            </section>

            <section class="prescription-details">
                <div class="prescription-details-box">
                    <h3>Where is Achira??</h3>
                    <h3>Where is Achira??</h3>
                    <h3>Where is Achira??</h3>
                    <h3>Where is Achira??</h3>
                    <h3>Where is Achira??</h3>
                </div>
            </section>
    

        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>
<?php
ob_end_flush();
?>