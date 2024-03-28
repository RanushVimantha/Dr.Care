<?php
// Start a session
ob_start();
session_start();

// Check if the user is not logged in, redirect to login.php
if (!isset($_SESSION['DoctorID'])) {
    header("Location: login.php");
    exit();
}

// Linking Database.php
require "db/DataBase.php";
$database = new DataBase();
$conn = $database->dbConnect();
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMS</title>
    <link rel="stylesheet" href="styles/doctordescription.css">
</head>

<body>
    <?php include('header.php'); ?>
    <div class="detail-container">
        <header>Doctor Details</header>
        <form action="#" class="form">
            <div class="input-box">
                <label>First Name* :</label>
                <input type="text" placeholder="Enter First Name" />
            </div>
            <div class="input-box">
                <label>Last Name* :</label>
                <input type="text" placeholder="Enter Last Name" />
            </div>

            <div class="img-button">
                <label for="imageInput">Select your profile pricture:</label>
                <div class="img-option">
                    <input type="file" id="imageInput" name="imageInput" accept="image/*">
                </div>

            </div>

            <div class="gender-box">
                <label>Gender</label>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" checked />
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" />
                        <label for="check-other">Prefer not to say</label>
                    </div>
                </div>
            </div>


            <div class="input-box">
                <label>Hospital that you are asigned to* :</label>
                <input type="text" placeholder="Working Hospital" required />
            </div>
            <div class="input-box">
                <label>The Clinic That you are treating your patitents* :</label>
                <input type="text" placeholder="Clinic Name" required />
            </div>
            <div class="input-box">
                <label>A small description about yourself* :</label>
                <input type="text" placeholder="Working Hospital" required />
            </div>
            <div class="input-box">
                <label>Specialized In: (This will be Displayed)*</label>
                <input type="text" placeholder="Specialized In" required />
            </div>
            <div class="input-box">
                <label>Specialized In:</label>
                <input type="text" placeholder="Specialized In" />
            </div>
            <div class="input-box">
                <label>Specialized In:</label>
                <input type="text" placeholder="Specialized In" />
            </div>
            <div class="input-box">
                <label>Working Experience:</label>
                <input type="text" placeholder="Experience" />
            </div>
            <div class="input-box">
                <label>Contact* :</label>
                <input type="text" placeholder="Contact Number" pattern="[0-9]{10}" minlength="10" maxlength="10" required />
            </div>

            <button>Sumbit</button>


        </form>



    </div>
    
    <?php include('footer.php'); ?>
</body>

</html>