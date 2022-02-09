<html>
<?php
session_start();
include("connect.php");
$sql = "SELECT * FROM customer";
if(isset($_POST['search']))
{
    $search_term = mysqli_real_escape_string($conn,$_POST['valueToSearch']);
     
    $sql .=" where firstName = '{$search_term}'";
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
$q=mysqli_query($conn,$sql) or die (mysqli_error($conn));
?>

<head>
    <title>Customers</title>
    <link rel="stylesheet" href="admin.css">
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
 .all{

background: #8B0000;
color: white;
border: none;
width: 90px;
height: 50px;
border-radius: 15px;
}

table,td,th{

margin-left: 420px;
    width: 50%;
    padding: 10px;

}

td,th{
   
   border-bottom: 1px solid black;
}

td:hover {background-color: #8B0000;}


</style>
</div>
<form name="search_box" style="padding-top: 50px;" method="post" action="adminCustomers.php">
    <input type="text" style="width: 80%" name="valueToSearch" placeholder="Search">
    <br>
<button id="myButton" class ="all"   >All</button>
<button id="myButton"  name="search" class ="all"   >Search</button>
</form>
<br>
<table >
<tr>
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
</tr>
            <?php while($row= mysqli_fetch_array($q)){?>
                <tr>
                <?php 
                    
    
                     echo "<tr>";
         
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
                     echo "</tr>";
         
         
                    
                     
                    ?>
                </tr>
            <?php }?>
  


</html>







