<?php
session_start();
include "connect.php";
$car = $_GET['plateID'];
$queryCar="SELECT * FROM car where plateID= '$car'";
$resultCar = $conn->query($queryCar);
$carRow=mysqli_fetch_assoc($resultCar);

$availability=!$carRow['isAvailable'];

$update_query="UPDATE car SET isAvailable ='$availability' WHERE plateID ='$car' ";
$result = $conn->query($update_query);
header("Location: adminCars.php");
?>