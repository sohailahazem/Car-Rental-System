<?php
session_start();
include("connect.php");

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass= $_POST['password'];
    $encryptedPass = md5( $_POST['password']);
    $query = "select * from admin where email = '$email' and password = '$encryptedPass' ";
    $result = $conn->query($query);

    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data = mysqli_fetch_assoc($result); // fetches the data associated with the entry
        if($user_data['password'] == $encryptedPass)
        {
            $_SESSION['email'] = $user_data['email'];
            header("Location:adminReservations.php");
        }
        else
        {
            echo '<script>window.alert("Wrong Password")</script>';
        }
    }
    else
    {
        echo '<script>window.alert("Wrong Email or Password")</script>';
    }


}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="with-device-width, initial-scale=1.0">
<link rel="stylesheet" href="admin.css">
<title> Welcome Back! </title

<body style=" background-size: cover;
        background-repeat: no-repeat;
        background-color: blue;">

<div class="formLoginContainer" style="left: 800px;  top:300px;">
    <div class="title"><strong>Log in</strong></div>
    <div class="content" >
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

        </form>
    </div>
</div>
</body>
</html>