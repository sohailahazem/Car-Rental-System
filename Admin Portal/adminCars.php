<html>
<?php
session_start();
include("connect.php");
$sql = "SELECT * FROM car";

if(isset($_POST['search']))
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
$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));

if(isset($_POST['Delete'])){

    $value=$_POST['valueToSearch'];
    $sql2= "SELECT plateID FROM car WHERE plateID= '$value'";
    $sqlquery = mysqli_query($conn, $sql2);
    $numRows=mysqli_num_rows( $sqlquery);
    if($numRows==0){
        echo '<script>window.alert("Car not found.")</script>';
    } else{
        $delete=$_POST['valueToSearch'];
        $delete_Query = "DELETE FROM car  WHERE  plateID  = '$delete'";
        $delete_Result = mysqli_query($conn, $delete_Query);

        header('Refresh:0.1; url=adminCars.php');
        echo '<script>window.alert("Car Deleted Successfully")</script>';
    }


}

if(isset($_POST['update'])){
$value=$_POST['valueToSearch'];
$sql2= "SELECT plateID FROM car WHERE plateID= '$value'";
$sqlquery = mysqli_query($conn, $sql2);
$numRows=mysqli_num_rows( $sqlquery);
if($numRows==0){
    echo '<script>window.alert("Car not found.")</script>';
} else{
    $_SESSION['valueToSearch']= $_POST['valueToSearch'];
    header("Location: updatecars.php");
}
}


if(isset($_POST['add'])){

    header("Location: addCar.php");
}



if(isset($_POST['allCars'])){
    header("Location: adminCars.php");
}



?>

<head>
    <title>Cars</title>
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
 .all{

background: #8B0000;
color: white;
border: none;
width: 90px;
height: 50px;
border-radius: 15px;
}
 .adding{
     background: #8B0000;
     color: white;
     border: none;
     width: 130px;
     height: 50px;
     border-radius: 15px;
 }

table,td,th{
   

    width: 50%;
    padding: 10px;
  
}

td,th{
   
   border-bottom: 1px solid black;
}

td:hover {background-color: #8B0000;}
 .center {
     margin-left: auto;
     margin-right: auto;
 }


</style>
</div>
<form class="search_box" name="search_box" method="post" >

    <input type="text" name="valueToSearch" placeholder="Search">
    <div class="carB">
    <button name="allCars" class ="all" >All Cars</button>
<button name="search" class ="all" >Search</button>
    <button name="Delete" class ="all"   >Delete</button>
    <button name="update" class ="all" >Update</button>
    <button name="add" class ="adding"  >Add New Car</button>
        </div>
</form>
<table class="center">
<tr>
<th style="white-space:nowrap">
    <strong>Plate Number</strong>

</th>
<th>
    <strong>Brand</strong>
    
</th>
    <th>
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
    <th>
        <strong> Availability</strong>

    </th>
</tr>
            <?php while($row= mysqli_fetch_array($q)){?>
                <tr>
                <?php 
                    
    
                     echo "<tr>";
                echo "<td>";
                echo $row['plateID'];
                echo "</td>";
                     echo "<td>";
                     echo $row['brand'];
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
                echo $row['isAvailable'];
                echo "</td>";
                     echo "<td>";
                    ?> <th><a href="updateCarStatus.php? plateID=<?php echo $row['plateID']; ?>" role="button" class="btn btn-primary" style= "background-color: #CD1818"">change car status</a></th>
                   <?php   echo "</td>";
                     echo "</tr>";

                     
                    ?>
                </tr>
            <?php }?>
  


</html>


