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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/new_style.css">

    <title>Doctor's Overview</title>
    <link rel="icon" href="imgs/drcare.ico" type="image/x-icon">
</head>

<body>
    <?php include('header.php'); ?>
    <script type="text/javascript" src="js/light-dark.js"></script>

    <div class="drCardcontainer">
        <div class="card">
            <div class="imgBx">
                <img src="imgs/Logo.png" alt="Doctor-Image">
            </div>

            <div class="contentBx">

                <h2>Dr. Ranush Vimantha</h2>

                <div class="spec">
                    <h3>Specialist In :</h3>
                    <span>Specialisted Area</span>

                </div>

                <div class="spec">

                    <h3>Hospital :</h3>
                    <span>Ragama District</span>

                </div>
                <a href="#">View Patitents</a>
            </div>

        </div>
        <!-- New Card -->

        <div class="card">
            <div class="imgBx">
                <img src="imgs/Logo.png" alt="Doctor-Image">
            </div>

            <div class="contentBx">

                <h2>Dr. Ranush Vimantha</h2>

                <div class="spec">
                    <h3>Specialist In :</h3>
                    <span>Specialisted Area</span>

                </div>

                <div class="spec">

                    <h3>Hospital :</h3>
                    <span>Ragama District</span>

                </div>
                <a href="#">View Patitents</a>
            </div>

        </div>

                <!-- New Card -->

                <div class="card">
            <div class="imgBx">
                <img src="imgs/Logo.png" alt="Doctor-Image">
            </div>

            <div class="contentBx">

                <h2>Dr. Ranush Vimantha</h2>

                <div class="spec">
                    <h3>Specialist In :</h3>
                    <span>Specialisted Area</span>

                </div>

                <div class="spec">

                    <h3>Hospital :</h3>
                    <span>Ragama District</span>

                </div>
                <a href="#">View Patitents</a>
            </div>

        </div>

                <!-- New Card -->

                <div class="card">
            <div class="imgBx">
                <img src="imgs/Logo.png" alt="Doctor-Image">
            </div>

            <div class="contentBx">

                <h2>Dr. Ranush Vimantha</h2>

                <div class="spec">
                    <h3>Specialist In :</h3>
                    <span>Specialisted Area</span>

                </div>

                <div class="spec">

                    <h3>Hospital :</h3>
                    <span>Ragama District</span>

                </div>
                <a href="#">View Patitents</a>
            </div>

        </div>

                <!-- New Card -->

                <div class="card">
            <div class="imgBx">
                <img src="imgs/Logo.png" alt="Doctor-Image">
            </div>

            <div class="contentBx">

                <h2>Dr. Ranush Vimantha</h2>

                <div class="spec">
                    <h3>Specialist In :</h3>
                    <span>Specialisted Area</span>

                </div>

                <div class="spec">

                    <h3>Hospital :</h3>
                    <span>Ragama District</span>

                </div>
                <a href="#">View Patitents</a>
            </div>

        </div>

    </div>
    <?php include('footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>