<?php


session_start();
include "connect.php";
$reservation = $_GET['reservationID'];
$query = "SELECT * FROM reservation where reservationID = '$reservation'";
$result1 = $conn->query($query);
$row = mysqli_fetch_assoc($result1);

$status = !$row['isReturned'];

$update_query = "UPDATE reservation SET isReturned ='$status' WHERE reservationID ='$reservation' ";
$result2 = $conn->query($update_query);
header("Location: adminReservations.php");
