<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transparent Login</title>
    <link rel="stylesheet" href="css\l_r.css">
	<link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
</head>
<body background="image\login.jpg">
    <div class="loginBox">
       <!-- <img src="readme-images\user.png" class="user">-->
        <h2>Sign Up Here</h2>
        <form method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username"> <!-- Add name attribute here -->
            <p>Password</p>
            <input type="password" name="password" placeholder="********"> <!-- Add name attribute here -->
            <input type="submit" name="submit1" value="Sign Up"> <!-- Add name attribute here and set it to "submit1" to match your PHP code -->
            <p>You have an account? <a href="login.html">Sign In</a> </p>
        </form>
    </div>
</body>
</html>
<?php
include "conn.php"; // Include database connection parameters

if (isset($_POST['submit1'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to insert user into database
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if ($result) {
        // Registration successful
        // Redirect to login page or any other page
        header("Location: login.php");
        exit(); // Make sure to exit after redirect
    } else {
        // Display error message if registration fails
        echo '<div class="alert alert-danger"><strong>Error!</strong>&nbsp;Registration failed. Please try again.</div>';
    }
}
?>