<?php
session_start();
include("connect.php");

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass= $_POST['password'];
    $encryptedPass = md5( $_POST['password']);
    $query = "select * from Customer where email = '$email' and password = '$encryptedPass' ";
    $result = $conn->query($query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data = mysqli_fetch_assoc($result); // fetches the data associated with the entry
        if($user_data['password'] == $encryptedPass)
        {
            $_SESSION['email'] = $user_data['email'];
            header("Location:rent.php");
        }
        else
        {
            echo '<script>window.alert("Wrong Password")</script>';
        }
    }
    else
    {
        echo '<script>window.alert("Wrong E-mail Address")</script>';
    }
   
       
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="with-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signupstyle.css">
    <title> Welcome Back! </title>

    <header>
        <div class="container">
            <img src = "logo.jpeg" alt="logo" class = "logo">
            <nav>
                <ul>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="signup.php">Sign Up</a></li>

                </ul>
            </nav>
        </div>
    </header>

<body>

<div class="formLoginContainer">
    <div class="title"><strong>Log in</strong></div>
    <div class="content">
<form name="loginForm" method="post">


        <div class="input-box">
    <input type="email" placeholder="Email Address" name="email" required><br>
        </div>
        <div class="input-box">
    <input type="password" placeholder="Password" name="password" required><br>
    </div>

        <div class="button">
            <input type="submit" name='login' value="Login"><br>
        </div>
    <p class="acc">New User? <a class="click" href="signup.php"> Sign Up Now</a></p><br>
</form>
    </div>
</div>
</body>
</html>