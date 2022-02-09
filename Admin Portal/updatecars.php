<html><?php
session_start();
include("connect.php");

if(isset($_POST['update']))
{
    $plate = $_POST['plateID'];
    $brand = $_POST['brand'];
    $model = $_POST['Model'];
    $year =$_POST['year'];
    $type = $_POST['type'];
    $mileage = $_POST['mileage'];
    $isAvailable = $_POST['isAvailable'];
    $price = $_POST['pricePerday'];
    $location = $_POST['location'];
    $plate_id=$_SESSION['valueToSearch'];
    $soora= getimagesize($_FILES["userImage"]["tmp_name"]);
    if($soora!== false) {
        //Get the contents of the image
        $file = $_FILES['userImage']['tmp_name'];
        $image = addslashes(file_get_contents($file));
    }

        $update_query="UPDATE car SET plateID ='$plate' , brand ='$brand', Model='$model', year='$year', type='$type', mileage='$mileage',isAvailable='$isAvailable', pricePerday='$price', location='$location' ,image ='$image' WHERE plateID ='$plate_id' ";
        $result = $conn->query($update_query);
    header('Refresh:0.1; url=adminCars.php');
    echo '<script>window.alert("Car Updated Successfully")</script>';

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
    <button id="myButton"  name="update" class ="all"   >Update Car</button>
</form>
</html>