<?php
session_start();
include("connect.php");


if(isset($_GET['search'])){
    $from_Date = $_GET['from_date'];
    $to_Date =$_GET['to_date'];


    
    $sql1 = "SELECT * FROM car natural join reservation natural join customer WHERE reservationDate between  '{$from_Date}' and  '{$to_Date}'";
?>


    <table >
    <th style="white-space:nowrap">
        <strong>Car and Customer Info Reservations' Report in Given Period</strong>
    
    </th>
    <tr>
    <th style="white-space:nowrap">
        <strong>Reservation ID</strong>
    
    </th>
        
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
<th style="white-space:nowrap">
    <strong>Plate Number</strong>

</th>

        <th style="white-space:nowrap">
            <strong>Brand</strong>

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
    <strong>Office Location</strong>
</th>

    <?php
    $q=mysqli_query($conn,$sql1) or die (mysqli_error($conn));
    while($row= mysqli_fetch_array($q)){
        ?>


                                            <tr>
                                            <td><?= $row['reservationID']; ?></td>
                                                <td><?= $row['customerID']; ?></td>
                                                <td><?= $row['firstName']; ?></td>
                                                <td><?= $row['lastName']; ?></td>
                                                <td><?= $row['email']; ?></td>
                                                <td><?= $row['dateOfBirth']; ?></td>
                                                <td><?= $row['street']; ?></td>
                                                <td><?= $row['zipCode']; ?></td>
                                                <td><?= $row['city']; ?></td>
                                                <td><?= $row['country']; ?></td>
                                                <td><?= $row['licenseNumber']; ?></td>
                                                <td><?= $row['phoneNumber']; ?></td>
                                                <td><?= $row['plateID']; ?></td>
                                                <td><?= $row['brand']; ?></td>
                                                <td><?= $row['Model']; ?></td>
                                                <td><?= $row['year']; ?></td>
                                                <td><?= $row['type']; ?></td>
                                                <td><?= $row['mileage']; ?></td>
                                                <td><?= $row['pricePerday']; ?></td>
                                                <td><?= $row['location']; ?></td>
                                            </tr>
        <?php
        }?>
        <tr height = 80px></tr>
        <?php
        }

        if(isset($_GET['search'])){
        $from_Date = $_GET['from_date'];
        $to_Date =$_GET['to_date'];
        $valueToSearch = $_GET['valueToSearch'];

        $sql2 = "SELECT * FROM car natural join reservation WHERE reservationDate between '{$from_Date}' and '{$to_Date}' AND plateID = '$valueToSearch'";
        
        ?>
     
            <th style="white-space:nowrap">
                <strong>Reservations of Given Car and it's Information Report</strong>


            </th>
            <tr>
                <th style="white-space:nowrap">
                    <strong>Reservation ID</strong>

                </th>

                <th style="white-space:nowrap">
                    <strong>Plate Number</strong>

                </th>

            <th style="white-space:nowrap">
                <strong>Brand</strong>
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
                    <strong>Office Location</strong>

                </th>

                <?php
                $cars=mysqli_query($conn,$sql2) or die (mysqli_error($conn));
                while($row= mysqli_fetch_array($cars)){
                ?>


            <tr>
                <td><?= $row['reservationID']; ?></td>
                <td><?= $row['plateID']; ?></td>
                <td><?= $row['brand']; ?></td>
                <td><?= $row['Model']; ?></td>
                <td><?= $row['year']; ?></td>
                <td><?= $row['type']; ?></td>
                <td><?= $row['mileage']; ?></td>
                <td><?= $row['pricePerday']; ?></td>
                <td><?= $row['location']; ?></td>
            </tr>

            <?php
            }?>
            <tr height = 80px></tr>
            <?php
            } 




if(isset($_GET['search'])){
       
    $date = $_GET['searchDate'];
    $sql3 = "SELECT * FROM car natural join reservation WHERE pickupDate <= '{$date}' and  returnDate >= '{$date}'";
      
      
        
        ?>
     
            <th style="white-space:nowrap">
                <strong>Reserved Cars in Given Date (Car status: Available) </strong>

            </th>
            <tr>

                <th style="white-space:nowrap">
                    <strong>Plate Number</strong>

                </th>
    <th style="white-space:nowrap">
        <strong>Brand</strong>

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
                    <strong> Office Location</strong>

                </th>

                <?php
                $cars=mysqli_query($conn,$sql3) or die (mysqli_error($conn));
                while($row= mysqli_fetch_array($cars)){
                ?>


            <tr>
              
                <td><?= $row['plateID']; ?></td>
                <td><?= $row['brand']; ?></td>
                <td><?= $row['Model']; ?></td>
                <td><?= $row['year']; ?></td>
                <td><?= $row['type']; ?></td>
                <td><?= $row['mileage']; ?></td>
                <td><?= $row['pricePerday']; ?></td>
                <td><?= $row['location']; ?></td>
            </tr>

            <?php
            }?>
<tr height = 80px></tr>
<?php
            } 





if(isset($_GET['search'])){
       
       $date = $_GET['searchDate'];
         
           $sql4 = "SELECT * FROM CAR WHERE plateID not in ( SELECT plateID FROM car natural join reservation WHERE pickupDate <= '{$date}' and  returnDate >= '{$date}' )";
           
           ?>
        
               <th style="white-space:nowrap">
                   <strong>Car Status of Not Reserved Cars in Given Date </strong>
   
               </th>
               <tr>
                  


                   <th style="white-space:nowrap">
                       <strong>Plate Number</strong>
   
                   </th>
    <th>
        <strong>Available/Out of service</strong>

    </th>
    <th style="white-space:nowrap">
        <strong>Brand</strong>

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
                       <strong>Office Location</strong>
   
                   </th>
   
                   <?php
                   $cars=mysqli_query($conn,$sql4) or die (mysqli_error($conn));
                   while($row= mysqli_fetch_array($cars)){
                   ?>
   
   
               <tr>
                   <td><?= $row['plateID']; ?></td>
                   <td><?= $row['isAvailable']; ?></td>
                   <td><?= $row['brand']; ?></td>
                   <td><?= $row['Model']; ?></td>
                   <td><?= $row['year']; ?></td>
                   <td><?= $row['type']; ?></td>
                   <td><?= $row['mileage']; ?></td>
                   <td><?= $row['pricePerday']; ?></td>
                   <td><?= $row['location']; ?></td>

               </tr>
   
   
               <?php
               }?>
<tr height = 80px></tr>
   <?php
               } 



if(isset($_GET['search'])){
       
       $customer= $_GET['searchCustomer'];
         
           $sql4 = "SELECT * FROM customer natural join reservation natural join car WHERE customerID ='{$customer}'";
           
           ?>
        
               <th style="white-space:nowrap">
                   <strong>Customer Information </strong>
   
               </th>
               <tr>
                  
               <th style="white-space:nowrap">
                       <strong>Reservation ID</strong>
               </th>
              <th style="white-space:nowrap">
                       <strong>Customer ID</strong>

</th>
    <th style="white-space:nowrap">
        <strong>Car Model</strong>
    </th>
    <th style="white-space:nowrap">
        <strong>Plate Number</strong>
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
   
                   <?php
                   $cars=mysqli_query($conn,$sql4) or die (mysqli_error($conn));
                   while($row= mysqli_fetch_array($cars)){
                   ?>
   
   
               <tr>
                   <td><?= $row['reservationID']; ?></td>
                   <td><?= $row['customerID']; ?></td>
                   <td><?= $row['Model']; ?></td>
                   <td><?= $row['plateID']; ?></td>
                   <td><?= $row['firstName']; ?></td>
                   <td><?= $row['lastName']; ?></td>
                   <td><?= $row['email']; ?></td>
                   <td><?= $row['dateOfBirth']; ?></td>
                   <td><?= $row['street']; ?></td>
                   <td><?= $row['zipCode']; ?></td>
                   <td><?= $row['city']; ?></td>
                   <td><?= $row['country']; ?></td>
                   <td><?= $row['licenseNumber']; ?></td>
                   <td><?= $row['phoneNumber']; ?></td>

               </tr>

               <?php

               }?>
             <tr height = 80px></tr>
    <?php
               }


if(isset($_GET['search'])){
    $from_Date = $_GET['from_date'];
    $to_Date =$_GET['to_date'];

    $sql6 = "SELECT * FROM car natural join reservation natural join payment WHERE paymentDate between  '{$from_Date}' and  '{$to_Date}' and isPaid=1 ";
?>

    <th style="white-space:nowrap">
        <strong>Payment Details Report for Given Period</strong>

    </th>
    <tr>
    <th style="white-space:nowrap">
        <strong>Payment Date</strong>

    </th>

    <th style="white-space:nowrap">
        <strong>Reservation Number</strong>

    </th>
    <th style="white-space:nowrap">
        <strong>Payment</strong>

    </th>

    <?php
    $q=mysqli_query($conn, $sql6) or die (mysqli_error($conn));
    while($row= mysqli_fetch_array($q)){
        ?>


                                            <tr>
                                            <td><?= $row['paymentDate']; ?></td>
                                                <td><?= $row['reservationID']; ?></td>
                                                <td><?= $row['totalPrice']; ?></td>
                                            </tr>
                                            <?php
    }

} ?>



<html>
    
<head>
    <title>Customers</title>
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
<style>
    body {
        background-image: url("adminback.jpg");

        background-size: cover;

    }
 .all{

background: #8B0000;
color: white;
border: none;
width: 90px;
height: 70px;
border-radius: 15px;
}
.alla{

background: #8B0000;
color: white;
border: none;
width: 170px;
height: 70px;
border-radius: 15px;
}

table,td,th{
   

    width: 70%;
    padding: 10px;
  
}

td,th{
   
   border-bottom: 1px solid black;
}

td:hover {background-color: #8B0000;}

</style>


<div class="allofit" style="margin-left: 450px;">
    <div class="col-md-12">
        <div class="card-group" style="margin-top: 50px; width: 1600px; padding-left: 20px;">
            <div class="card-body">
                <form class="dates" action="" method="GET" class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group" style="padding-left: 50px">
                                <label><strong>From Date</strong></label>
                                <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"  style="padding-left: 50px">
                                <label><strong>To Date</strong></label>
                                <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                            </div>
                        </div>
<div style="margin-top: 40px;">


                        <div class="input-box" >
                            <input type="text" style="width: 40%"name = "valueToSearch" placeholder="Plate Number for Car information Report" required>

                        </div>
                        <div class="input-box">
                            <input type="text"style="width: 40%" name = "searchCustomer" placeholder="Customer ID for Customer's Reservations Reports"required>
                        </div>
                        <div class="input-box">
                            <input type="text" style="width: 40%" name = "searchDate" placeholder="Specific Date for Car status Reports" required>

                        </div>
</div>
                        <div class="col-md-4">
                            <div class="form-group" style="margin-left:550px; margin-top: 25px;">
                                <button type="submit" class="btn btn-primary" name="search" style= "background-color: #CD1818">Generate Reports</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</html>