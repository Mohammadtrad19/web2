<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Font Awesome CDN Link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS File Link  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- SWIPER -->
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- Custom JS File Link  -->
    
</head>
<body>
<header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="home.html" class="logo">coffee <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="home.html">home</a>
            <a href="about.html">about</a>
            <a href="menu.html">menu</a>
            <a href="feadback.php">Feedback</a>
            <a href="logout.php">Logout</a>
        </nav>

        <a href="#" ></a>
    </header>
    <br><br><br><br><br>
    <section class="book" id="book">
        <h1 class="heading">Feedback <span>put your experience</span></h1>
        <form action="" method="post">
        <input type="text" name="name" placeholder="Name" class="box">
        <input type="email" name="email" placeholder="Email" class="box">

        <textarea name="message" placeholder="Message" class="box" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="send message" class="btn">
    </form>
</section>  
<section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="#"><i class="fas fa-arrow-right"></i> Lebanon</a>
                <a href="#"><i class="fas fa-arrow-right"></i> USA</a>
                <a href="#"><i class="fas fa-arrow-right"></i> france</a>
                <a href="#"><i class="fas fa-arrow-right"></i> africa</a>
                <a href="#"><i class="fas fa-arrow-right"></i> japan</a>
            </div>

           <!-- <div class="box">
                <h3>quick links</h3>
                <a href="home.php"><i class="fas fa-arrow-right"></i> home</a>
                <a href="about.php"><i class="fas fa-arrow-right"></i> about</a>
                <a href="menu.php"><i class="fas fa-arrow-right"></i> menu</a>
                <a href="feadback.php"><i class="fas fa-arrow-right"></i> feedback</a>
            </div> -->

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +96103333555</a>
                <a href="#"><i class="fas fa-phone"></i> +111-222-3333</a>
                <a href="#"><i class="fas fa-envelope"></i> coffee@gmail.com</a>
               
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fab fa-facebook-f"></i> facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> instagram</a>
                <a href="#"><i class="fab fa-linkedin"></i> linkedin</a>
                <a href="#"><i class="fab fa-twitter"></i> twitter</a>
            </div>
        </div>

        
    </section>
</body>
</html>

<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement to prevent SQL injection
    $query = "INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt,"sss", $name, $email, $message);
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        // Error handling
    } else {
        // Success message or redirection can be added here
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>