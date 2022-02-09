<html>
<?php
session_start();
include("connect.php");
$sql = "SELECT * FROM car natural join reservation natural join customer";
if(isset($_POST['searchByCar']))

{

    $search_term = mysqli_real_escape_string($conn,$_POST['valueToSearch']);
     
    $sql .=" where Model = '{$search_term}'";
    $sql .=" OR plateID = '{$search_term}'";
    $sql .=" OR year = '{$search_term}'";
    $sql .=" OR type = '{$search_term}'";
    $sql .=" OR mileage = '{$search_term}'";
    $sql .=" OR pricePerday = '{$search_term}'";
    $sql .=" OR location = '{$search_term}'";


}

if(isset($_POST['searchByCustomer']))

{

    $search_term = mysqli_real_escape_string($conn,$_POST['valueToSearch']);
    $sql .=" where customerID = '{$search_term}'";
    $sql .=" OR firstName = '{$search_term}'";
    $sql .=" OR lastName = '{$search_term}'";
    $sql .=" OR email = '{$search_term}'";
    $sql .=" OR dateOfBirth = '{$search_term}'";
    $sql .=" OR city = '{$search_term}'";
    $sql .=" OR country = '{$search_term}'";
    $sql .=" OR zipCode = '{$search_term}'";
    $sql .=" OR phoneNumber = '{$search_term}'";
    $sql .=" OR licenseNumber = '{$search_term}'";
    $sql .=" OR street = '{$search_term}'";


}

if(isset($_POST['searchByDate']))
{
     
    $search_term = mysqli_real_escape_string($conn,$_POST['valueToSearch']);
     
    $sql .=" where reservationDate= '{$search_term}'";


} 


$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>

<head>
    <title>Customer Reservations</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<header>
    <div class="container">
        <img src = "admin.png" alt="logo" class = "logo">
        <nav>
            <ul>
                <li><a href="adminReservations.php">Reservations</a></li>
                <li><a href="adminCars.php"> Cars</a></li>
                <li><a href="adminCustomers.php"> Customers </a></li>
                <li><a href="adminReports.php"> Reports</a></li>
                <li><a href="adminMessages.php"> Feedbacks</a></li>
                <li class="log"><a href="adminLogout.php">Log out</a></li>
            </ul>
        </nav>
    </div>
</header>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        "window.location='adminCustomers.php"
    };
</script>
<style>
    body{
        background-image: url(adminback.jpg);
        background-repeat:repeat-x;
    }
 .all{

background: #8B0000;
color: white;
border: none;
width: 90px;
height:70px;
border-radius: 15px;

}
.customer{

background: #8B0000;
color: white;
border: none;
width: 170px;
height: 70px;
border-radius: 15px;
    margin-bottom: 10px;

}

table,td,th{
   

    width: 70%;
    padding: 10px;

  
}

td,th{
   
   border-bottom: 1px solid black;
}

td:hover {background-color: #8B0000;}
.value{
    width: 65%;
    margin-left: 420px;
    margin-top: 50px;
    margin-bottom: 20px;

}

</style>
</div>
<form name="search_box" method="post" action="">
    <input class ="value" type="text" name="valueToSearch" placeholder="Search">
<button id="myButton" class ="customer">All  Reservations</button><br>
<button id="myButton"  name="searchByDate" class ="customer"   >Search By Reservation date</button>
<button id="myButton"  name="searchByCustomer" class ="customer"   >Search By Customer Information</button>
<button id="myButton"  name="searchByCar" class ="customer"   >Search By Car Information</button>
</form>
<table >
<tr>
<th style="white-space:nowrap">
    <strong>Customer ID</strong>

</th>
<th style="white-space:nowrap">
    <strong>First Name</strong>

</th>
<th>
    <strong>Last Name</strong>
    
</th>
<th>
    <strong>Email</strong>
    
</th>
<th style="white-space:nowrap">
    <strong>Date of birth</strong>
    
</th>
<th>
    <strong>Street</strong>
    
</th>
<th style="white-space:nowrap">
    <strong>Zip Code</strong>
    
</th>
<th>
    <strong>City</strong>
    
</th>
<th>
    <strong>Country</strong>
    
</th>
<th style="white-space:nowrap"> 
    <strong>License Number</strong>
    
</th>
<th style="white-space:nowrap">
    <strong>Phone Number</strong>
    
</th>
<th>
    <strong>Plate ID</strong>
    
</th>

<th>
<strong>Reservation ID</strong>

</th>

<th>
    <strong>Reservation Date</strong>
    
</th>
<th>
<strong>Pick up date</strong>

</th>
<th>
    <strong>Return Date</strong>
    
</th>
<th>
<strong>Total Price</strong>

</th>
<th>
    <strong>Picked Up</strong>
    
</th>
    <br>
<th>
<strong>Returned</strong>

</th>
<th>
    <strong>Paid</strong>
    
</th>


<th style="white-space:nowrap">
    <strong>Model</strong>

</th>
<th>
    <strong>Year</strong>
    
</th>
<th style="white-space:nowrap">
    <strong>Type</strong>
    
</th>
<th>
    <strong>Mileage</strong>
    
</th>
<th style="white-space:nowrap">
    <strong>Price Per Day</strong>
    
</th>
<th>
    <strong>Location</strong>
    
</th>
</tr>
            <?php while($row= mysqli_fetch_array($q)){?>
                <tr>
                <?php 
                    
    
                     echo "<tr>";
                     echo "<td>";
                     echo $row['customerID'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['firstName'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['lastName'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['email'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['dateOfBirth'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['street'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['zipCode'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['city'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['country'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['licenseNumber'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['phoneNumber'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['plateID'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['reservationID'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['reservationDate'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['pickupDate'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['returnDate'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['totalPrice'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['isPickedup'];
                     echo "<br>";
                     echo "</td>";
                     echo "<td>";
                     echo $row['isReturned'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['isPaid'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['Model'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['year'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['type'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['mileage'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['pricePerday'];
                     echo "</td>";
                     echo "<td>";
                     echo $row['location'];
                     echo "</td>";
                     echo "<td>";
                     ?> <th><a href="updatePickupStatus.php? reservationID=<?php echo $row['reservationID']; ?>" role="button"  class="btn btn-primary" style= "background-color: #CD1818">Change Pick-up Status</a></th>
                    <?php
                    echo "</td>";
                     echo "<td>";
                     ?> <th><a href="updateReturnStatus.php? reservationID=<?php echo $row['reservationID']; ?>" role="button"  class="btn btn-primary" style= "background-color: #CD1818">Change Return Status</a></th>
                    <?php
                    echo "</td>";
                    echo "</tr>";
         
         
                    
                     
                    ?>
                </tr>
            <?php }?>
  


</html>







