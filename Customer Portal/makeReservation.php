<?php
session_start();
include "connect.php";

$car = $_GET['plateID'];
$pickupDate= $_SESSION['pickupDate'];
$returnDate= $_SESSION['returnDate'];

$queryCar="SELECT * FROM car where plateID= '$car'";
$resultCar = $conn->query($queryCar);
$carRow=mysqli_fetch_assoc($resultCar);


$email=$_SESSION['email'];
$queryCustomer="SELECT * FROM Customer where email= '$email'";
$resultCustomer = $conn->query($queryCustomer);
$customerRow=mysqli_fetch_assoc($resultCustomer);

$customerID=$customerRow['customerID'];
$plateID=$carRow['plateID'];
$price=$carRow['pricePerday'];

function dateDiff($date1, $date2)
{
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400) + 1;
}

$total=dateDiff($pickupDate, $returnDate)*$price;


$sql = "INSERT INTO reservation (customerID, plateID, pickupDate,
 returnDate, totalPrice,isPickedUp, isReturned, isPaid)  VALUES ('$customerID', '$plateID', '$pickupDate', '$returnDate', '$total', 0, 0, 0)";

if ($conn->query($sql) === TRUE) {
    header("Location: customerReservations.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; //error
}
?>