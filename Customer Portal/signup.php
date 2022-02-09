<?php
session_start();
include("connect.php");
if(isset($_POST['signup'])) {
    $FirstName = $_POST['firstName'];
    $LastName = $_POST['lastName'];
    $email = $_POST['email'];
    $pass= $_POST['password'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $licenseNo = $_POST['licenseNo'];
    $phoneNumber = $_POST['phoneNumber'];
    $encryptedPass = md5( $_POST['password']);
    $query = "select * from Customer where email = '$email'";
    $result = $conn->query($query);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Email already exists.")</script>';

    } else {
        $sql = "INSERT INTO Customer (firstName, lastName, email, password,
                      dateOfBirth, street, city, country, zipcode, licenseNumber, phoneNumber)
                 VALUES ('$FirstName', '$LastName', '$email', '$encryptedPass',
                      '$dateOfBirth', '$street', '$city', '$country', '$zipcode', '$licenseNo', '$phoneNumber')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['email'] = $email;
            header("Location: rent.php");
            die;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error; //error
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="signupstyle.css">
    <title>Create an Account!</title>
    <script>
        function validatePass() {
            let pass = document.forms["signupForm"]["password"].value;
            let pass2 = document.forms["signupForm"]["confirmPassword"].value;
            if(pass !== pass2) {
                alert("Passwords do not match.");
                return false
            }
        }
    </script>
</head>

<header>
    <div class="container">
        <img src = "logo.jpeg" alt="logo" class = "logo">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<body>

<div class="formContainer">
    <div class="title"><strong>Sign Up</strong></div>
    <div class="content">
        <form name="signupForm" onsubmit= "return validatePass();" method="post">

            <div class="user-details">


                <div class="input-box">
                    <span class="details">Fist Name</span>
                    <input type="text" placeholder="First Name" name="firstName" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="Last Name" name="lastName" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Email Address</span>
                    <input type="email" placeholder="E-mail Address" name="email" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="tel" placeholder="Phone Number" name="phoneNumber" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Licence Number</span>
                    <input type="text" placeholder="A valid License Number" name="licenseNo" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Birth Date</span>
                    <input type="date" name="dateOfBirth" required><br>
                </div>


                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Street Name" name="street" required><br>
                </div>

                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" placeholder="City" name="city" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Country</span>
                    <input type="text" placeholder="Country" name="country" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Zip Code</span>
                    <input type="text" placeholder="Zip code if available" name="zipcode"><br>
                </div>


                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Create password" name="password" required><br>
                </div>

                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm password" name="confirmPassword" required><br>
                </div>
            </div>

            <div class="button">
                <input type="submit" name='signup' value="Register"><br>
            </div>
            <p class="acc">Already a user? <a class="click" href="login.php"> Log in</a></p><br>
        </form>
    </div>
</div>
</body>
</html>