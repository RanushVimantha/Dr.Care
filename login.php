<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Control Panel</h2>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>



<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // TODO: Replace this with actual database validation
    // For security, you should validate credentials from a database
    // and use password hashing.
    if ($username === "your_username" && $password === "your_password") {
        // Authentication successful
        echo "Login successful. Welcome, $username!";
    } else {
        // Authentication failed
        echo "Login failed. Please check your username and password.";
    }
}
?>

</html>