<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style>
        table td,
        table th {
            vertical-align: middle;
            text-align: right;
            padding: 20px !important;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Patient List</h1>
            <div>
                <a href="patientInfoIn.php" class="btn btn-primary">Add New Patient</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["create"];
                ?>
            </div>
        <?php
            unset($_SESSION["create"]);
        }
        ?>
        <?php
        if (isset($_SESSION["update"])) {
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["update"];
                ?>
            </div>
        <?php
            unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
            <div class="alert alert-success">
                <?php
                echo $_SESSION["delete"];
                ?>
            </div>
        <?php
            unset($_SESSION["delete"]);
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PatientID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('connect.php');
                $sqlSelect = "SELECT * FROM patients";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['PatientID']; ?></td>
                        <td><?php echo $data['FirstName']; ?></td>
                        <td><?php echo $data['LastName']; ?></td>
                        <td><?php echo $data['Gender']; ?></td>
                        <td>
                            <a href="PatientView.php?id=<?php echo $data['PatientID']; ?>" class="btn btn-info">Read More</a>
                            <a href="PatientInfoEdit.php?id=<?php echo $data['PatientID']; ?>" class="btn btn-warning">Edit</a>
                            <a href="PatientDelete.php?id=<?php echo $data['PatientID']; ?>" class="btn btn-danger" id="delete">Delete Medical Record</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <script>
        var link = document.getElementById("delete");
        var initialName = "Delete Patient";
        var changedName = "Delete Medical Records";

        if (localStorage.getItem("linkName") === changedName) {
            link.innerText = initialName;
            localStorage.setItem("linkName", initialName);
        } else {
            link.innerText = changedName;
            localStorage.setItem("linkName", changedName);
        }
    </script>

</body>

</html>