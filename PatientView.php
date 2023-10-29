<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        .book-details{
            background-color:#f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Patient Details</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="book-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM Patients WHERE PatientID = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>First Name:</h3>
                 <p><?php echo $row["FirstName"]; ?></p>
                 <h3>Last Name:</h3>
                 <p><?php echo $row["LastName"]; ?></p>
                 <h3>Date Of Birth:</h3>
                 <p><?php echo $row["DateOfBirth"]; ?></p>
                 <h3>Gender:</h3>
                 <p><?php echo $row["Gender"]; ?></p>
                 <h3>Contact Number:</h3>
                 <p><?php echo $row["ContactNumber"]; ?></p>
                 <h3>Email:</h3>
                 <p><?php echo $row["Email"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>No Patient found</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>