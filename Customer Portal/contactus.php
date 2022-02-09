<?php
session_start();
include("connect.php");
if(isset($_SESSION['email']))
    $currentEmail =  $_SESSION['email'];
else
    $currentEmail = NULL;

if(isset($_POST['sendMessage']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if(mysqli_query($conn, $sql))
    {
        header('Refresh:0.1; url=contactus.php');
        echo '<script>window.alert("Your message has been sent! thank you for staying in touch.")</script>';
        die;
    }
    else{
        echo '<script>window.alert("Failed to add to database")</script>';
    }
}

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="contactstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<header>
    <div class="headerContainer">
        <img src = "logo.jpeg" alt="logo" class = "logo">
        <nav>
            <ul>
                <?php if($currentEmail === NULL) : ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                <?php elseif(!empty($currentEmail)) : ?>
                    <li><a href="rent.php">Rent a Car</a></li>
                    <li><a href="customerProfile.php">My Profile</a></li>
                    <li><a href="customerReservations.php">My Reservations</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="logout.php">Log out</a></li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</header>

<body>


<div class="container">
    <div class="content">
        <div class="contactInfo">
            <h2>Get in touch </h2>
            <div class="box">
                <div class="icon"> <i class="material-icons"> location_on</i>
                </div>
                <div class="txt">
                    <h3>Address</h3>
                    <p>
                        266 Abd El-Salam Aref St. El-Saraya <br> Alexandria <br>
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="icon"> <i class="material-icons"> phone</i>
                </div>
                <div class="txt">
                    <h3>Phone</h3>
                    <p>
                        01010877633
                    </p>
                </div>
            </div>
            <div class="box">
                <div class="icon"><i class="material-icons"> email</i>
                </div>
                <div class="txt">
                    <h3>Email</h3>
                    <p>
                        rentalcarcompany@temporary-mail.net
                    </p>
                </div>
            </div>
        </div>
        <form method = "POST">
            <div class="topic">Send us a message</div>
            <div class="input-box">
                <input type="text" name = "name" required>
                <label>Enter your name</label>
            </div>
            <div class="input-box">
                <input type="text" name = "email" required>
                <label>Enter your email</label>
            </div>
            <div class="input-box">
                <input type="text" name = "message" required>
                <label>Enter your message</label>
            </div>
            <div class="input-box">
                <input type="submit" name = "sendMessage" value="Send Message">
            </div>
        </form>
    </div>
</div>

</body>
</html>
