<?php
session_start();
include("connect.php");
?>

    <link rel="stylesheet" href="rentcss.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<title> My Reservations </title>
<div style="background-color: white; width: 800px; border: 4px solid #ccc; padding: 50px; border-radius: 60px;margin-top: 20px; margin-left: 550px;">
    <pre>
<?php
$email=$_SESSION['email'];
$queryCustomer="SELECT * FROM Customer where email= '$email'";
$resultCustomer = $conn->query($queryCustomer);
$customerRow = mysqli_fetch_assoc($resultCustomer);
$customerID = $customerRow['customerID'];

$queryResult="SELECT * FROM customer natural join reservation natural join car WHERE customerID = '$customerID'";
$resultReservation = $conn->query($queryResult);


    while($row = mysqli_fetch_array($resultReservation))
    {
        ?>
        <div  style=" font-family: 'Montserrat', sans-serif;">
        <th>  <?php echo "<img src='data:image/jpeg;base64,"
                .base64_encode($row["image"]) . "' style =  height='350' width='450'/>"; ?>  </th>
        <th><?php echo 'Model:    '. $row['Model'];        ?></th>
        <th> <?php echo 'Type:    '.$row['type'];      ?></th>
        <th> <?php echo 'Make Year:    '.$row['year'];         ?></th>
        <th> <?php echo 'Price:    '.$row['pricePerday']; ?></th>
        <th> <?php echo 'Mileage:    '.$row['mileage']; ?></th>
        <th> <?php echo 'Car Location:    '.$row['location']; ?></th>
        <th> <?php echo 'Reservation Number:    '.$row['reservationID']; ?></th>
        <th> <?php echo 'Pickup Date:    '.$row['pickupDate']; ?></th>
        <th> <?php echo 'Return Date:    '.$row['returnDate']; ?></th>
        <th> <?php echo 'Total Price:    $'.$row['totalPrice'];  ?></th>
        <br>
        <?php
        if($row['isPaid']==0)
        {  ?>
        <th><a href="cardPayment.php? reservationID=<?php echo $row['reservationID']; ?>" role="button" class="btn btn-primary" style= "background-color: #CD1818"">PAY</a></th>
            <?php  }?>
        <?php
    }

?>
</div>
</pre>
