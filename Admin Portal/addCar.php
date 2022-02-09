<html><?php
session_start();
include("connect.php");

if(isset($_POST['insert']))
{

    $p = $_POST['plateID'];
    $b = $_POST['brand'];
    $m = $_POST['Model'];
    $y =$_POST['year'];
    $t = $_POST['type'];
    $mi = $_POST['mileage'];
    $i = $_POST['isAvailable'];
    $pr = $_POST['pricePerday'];
    $l = $_POST['location'];
    $soora = getimagesize($_FILES["userImage"]["tmp_name"]);
    if ($soora !== false) {
        //Get the contents of the image
        $file = $_FILES['userImage']['tmp_name'];
        $image = addslashes(file_get_contents($file));
    }

    $sql2= "SELECT plateID FROM car WHERE plateID= '$p'";
    $sqlquery = mysqli_query($conn, $sql2);
    $numRows=mysqli_num_rows( $sqlquery);
    if($numRows>0){
        echo '<script>window.alert("Car Already Exists.")</script>';
    }

    else{
        $query = "INSERT INTO car (plateID, brand, Model, year, type, mileage,isAvailable, pricePerday, location,image ) VALUES ('$p','$b','$m','$y','$t','$mi','$i', '$pr','$l','$image')";
        $result = $conn->query($query);
        header('Refresh:0.1; url=adminCars.php');
        echo '<script>window.alert("Car Added Successfully")</script>';
        }
    }


?>


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
</div>
<style>
    .value{
        width: 30%;
        margin-left: 700px;
        margin-bottom: -30px;


    }
    .all{

        background: #8B0000;
        color: white;
        border: none;
        width: 90px;
        height:70px;
        border-radius: 15px;
        margin-top: 40px;


    }


</style>
<form style="margin-top: 30px;" method="post" class = addCars" enctype="multipart/form-data">
    <input class="value" type="text" name="plateID" placeholder=" Plate Number" required><br><br>
    <input class="value"type="text" name="brand" placeholder="Brand" required><br><br>
    <input class="value"type="text" name="Model" placeholder="Model" required><br><br>
    <input class="value"type="text" name="year" placeholder="Year" required><br><br>
    <input class="value"type="text" name="type" placeholder="Type" required><br><br>
    <input class="value"type="text" name="mileage" placeholder="Mileage" required><br><br>
    <input class="value"type="text" name="isAvailable" placeholder="Availability" required><br><br>
    <input class="value"type="text" name="pricePerday" placeholder="Price Per Day" required><br><br>
    <input class="value"type="text" name="location" placeholder=" Office Location" required><br><br>
    <input class="value"type="file" name="userImage" Required/>
    <button id="myButton"  name="insert" class ="all"   >Add Car</button>
</form>
</html>
