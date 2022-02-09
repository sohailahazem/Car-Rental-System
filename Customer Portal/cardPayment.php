<?php
session_start();
include("connect.php");
$reservationID = $_GET['reservationID'];

if(isset($_POST['PayNow'])) {
    $cardNumber = $_POST['cardNumber'];
    $CVV = $_POST['CVV'];
    $CVV = md5($CVV);
    $paymentDate = $_POST['paymentDate'];

    $getPrice= "SELECT * FROM reservation where reservationID= '$reservationID'";
    $price = $conn->query($getPrice);
    $totalPrice = mysqli_fetch_assoc($price);
    $total = $totalPrice['totalPrice'];


    $sql = "INSERT INTO payment (cardNumber, CVV, reservationID,totalPrice,paymentDate)
                 VALUES ('$cardNumber', '$CVV','$reservationID','$total','$paymentDate')";
    $result = $conn->query($sql);

    $update = "UPDATE reservation SET isPaid = 1 WHERE reservationID = '$reservationID'";
    if(mysqli_query($conn, $update))
    {
        header('Refresh:0.1; url = customerReservations.php');
        echo '<script>window.alert("Payment Successful.")</script>';
        die;
    }
    else{
        echo '<script>window.alert("Payment Unsuccessful. Try again later.")</script>';
    }
}



?>
<link rel="stylesheet" href="signupstyle.css">


<header>
    <div class="container">
        <img src = "logo.jpeg" alt="logo" class = "logo">
        <nav>
            <ul>
                <li><a href="rent.php">Rent a Car</a></li>
                <li><a href="customerProfile.php">My Profile</a></li>
                <li><a href="customerReservations.php">My Reservations</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="logout.php">Log out</a></li>

            </ul>
        </nav>
    </div>
</header>



<body>
<title> Complete your Payment </title>
<div class="formLoginContainer">
    <div class="title"><strong>Complete Payment</strong></div>
    <div class="content">
<form name="Payment"  method="post">

        <div class="input-box">
    <input type="text" placeholder="Card Number" name="cardNumber" required><br>
        </div>
        <div class="input-box">
    <input type="password" placeholder="CVV" name="CVV" required><br>
    </div>
    <div class="input-box">
        <input type="date" placeholder="Today's Date" name="paymentDate" required><br>
    </div>
        <div class="button">
            <input type="submit" name='PayNow' value="Pay Now" class="btn btn-primary" style= "background-color: #CD1818">
            <br>
        </div>

</form>
    </div>
</div>
</body>



