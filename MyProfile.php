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
    <link rel="stylesheet" href="styles/myprofile.css">
    <title>My Profile - DrCare</title>
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
        <div class="sidebar sidebar--admin">
            <a href="#" class="sidebar-button">
                <span class="icon">&#128101;</span> My Patients</a>      
            <a href="#" class="sidebar-button">
                <span class="icon">&#128100;</span> My Profile </a>
            <a href="#" class="sidebar-button">
                <span class="icon">&#128274;</span> Logout</a>                
        </div>
        
        <div class="main main--team">          
            <section class="Doctor-Details">
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
            <div class="doctor-hospital">
                <h5>Asiri Hospital</h5>
            </div>
            <div class="doctor-description">
                28 Years Old Doctor with PHD Degree and A Specialist on Mental Disorder
            </div>
            <div class="experience">
                Experience: 20+ Years 
            </div>
            <div class="doctor-contact">
                Contact: 0777-222-3333
            </div>

            <div class="doctor-category">
                <div class="category-list">
                    <h6> Esports</h6>
                </div>
                <div class="category-list">
                    <h6> Gaming</h6>
                </div>
                <div class="category-list">
                    <h6> Content</h6>
                </div>

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