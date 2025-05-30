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
        <h2>Log In Here</h2>
        <form method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username"> <!-- Add name attribute here -->
            <p>Password</p>
            <input type="password" name="password" placeholder="********"> <!-- Add name attribute here -->
            <input type="submit" name="submit1" value="Sign In"> <!-- Add name attribute here and set it to "submit1" to match your PHP code -->
            <p>don't have an account? <a href="signup_form.php">Sign UP</a> </p>
        </form>
    </div>
</body>
</html>
<?php
include "conn.php"; // Include database connection parameters

if (isset($_POST['submit1'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL statement to retrieve user from database
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    $num_row = mysqli_num_rows($result);

    if ($num_row > 0) {
        // Start session and store user ID
        session_start();
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['member_id'];
        // Redirect to index.html
        header("Location: home.html");
        exit(); // Make sure to exit after redirect
    } else {
        // Display error message
        echo '<div class="alert alert-danger"><strong>Login Error!</strong>&nbsp;Please check your Username and Password</div>';
    }
}
?>