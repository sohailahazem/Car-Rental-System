 <?php
            session_start();
            include("connect.php");
            if(isset($_GET['search'])){
                $_SESSION['pickupDate'] = $_GET['pickupDate'];
                $_SESSION['returnDate'] = $_GET['returnDate'];
            }
?>
 <div>
<link rel="stylesheet" href="rentcss.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

<title> Rent Now! </title>
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



<div class = "master">
    <form action = "" method = "GET" style="width: 600px;">
        <div class = "first">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group" style="margin-bottom:25px;">
                        <label>Pick-up Date</label>
                        <input type="date" style="width: 175px; height: 60px" name="pickupDate" required value="<?php if(isset($_GET['pickupDate'])){ echo $_GET['pickupDate']; } ?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group"  style="margin-left: 30px; margin-bottom:25px;">
                        <label>Return Date</label>
                        <input type="date" style="width: 175px; height: 60px" name="returnDate" required value="<?php if(isset($_GET['returnDate'])){ echo $_GET['returnDate']; } ?>" class="form-control">
                    </div>
                </div>

            </div>
            <h1 style="font-size: 18px;">Brand<hr></h1>
            <tr>
                <td>
                    <?php
                    $brand_query = "SELECT  distinct brand FROM car";
                    $brand_query_run  = mysqli_query($conn, $brand_query);

                    if(mysqli_num_rows($brand_query_run) > 0)
                    {
                        foreach($brand_query_run as $list1)
                        {
                            $brandsChecked = [];

                            if(isset($_GET['brands']))
                            {
                                $brandsChecked = $_GET['brands'];
                            }
                            ?>
                            <div>
                                <input type="checkbox" name="brands[]" value="<?= $list1['brand']; ?>"
                                    <?php if(in_array($list1['brand'], $brandsChecked)){ echo "checked"; } ?>
                                />
                                <?= $list1['brand']; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <td>
            </tr>
            <br>
            <h2 style="font-size: 18px;">Type<hr></h2>
            <tr>
                <td>
                    <?php
                    $type_query = "SELECT distinct type FROM car";
                    $type_query_run  = mysqli_query($conn, $type_query);

                    if(mysqli_num_rows($type_query_run) > 0)
                    {
                        foreach($type_query_run as $list2)
                        {
                            $typesChecked = [];

                            if(isset($_GET['types']))
                            {
                                $typesChecked = $_GET['types'];
                            }
                            ?>
                            <div>
                                <input type="checkbox" name="types[]" value="<?= $list2['type']; ?>"
                                    <?php if(in_array($list2['type'], $typesChecked)){ echo "checked"; } ?>
                                />
                                <?= $list2['type']; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <td>
            </tr>
            <br>
            <h3 style="font-size: 18px;">Pick-up Location<hr></h3>
            <tr>
                <td>
                    <?php
                    $loc_query = "SELECT distinct location FROM car";
                    $loc_query_run  = mysqli_query($conn, $loc_query);

                    if(mysqli_num_rows($loc_query_run) > 0)
                    {
                        foreach($loc_query_run as $list3)
                        {
                            $locationsChecked = [];

                            if(isset($_GET['locations']))
                            {
                                $locationsChecked = $_GET['locations'];
                            }
                            ?>
                            <div>
                                <input type="checkbox" name="locations[]" value="<?= $list3['location']; ?>"
                                    <?php if(in_array($list3['location'], $locationsChecked)){ echo "checked"; } ?>
                                />
                                <?= $list3['location']; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <td>
            </tr>
            <br>
            <h4 style="font-size: 18px;">Make Year<hr></h4>
            <tr>
                <td>
                    <?php
                    $year_query = "SELECT distinct year FROM car order by year ASC ";
                    $year_query_run  = mysqli_query($conn, $year_query);

                    if(mysqli_num_rows($year_query_run) > 0)
                    {
                        foreach($year_query_run as $list4)
                        {
                            $yearsChecked = [];

                            if(isset($_GET['years']))
                            {
                                $yearsChecked = $_GET['years'];
                            }
                            ?>
                            <div>
                                <input type="checkbox" name="years[]" value="<?= $list4['year']; ?>"
                                    <?php if(in_array($list4['year'], $yearsChecked)){ echo "checked"; } ?>
                                />
                                <?= $list4['year']; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                <td>
            </tr>
            <br>
            <h5 style="font-size: 18px;">Price Range<hr></h5>
            <tr>
                <td>
                    <div>
                        <input type="checkbox" value="50" name="price_range[]"> Less than $50<br/>
                        <input type="checkbox" value="60" name="price_range[]"> Less than $60<br/>
                        <input type="checkbox" value="70" name="price_range[]"> Less than $70<br/>
                        <input type="checkbox" value="80" name="price_range[]"> Less than $80<br/>
                        <input type="checkbox" value="90" name="price_range[]"> Less than $90<br/>
                    </div>
                <td>
            </tr>

            <br>
            <div class="col-md-4"  style="margin-left: 180px;">
                <div class="form-group" style=" margin-top: 25px;">
                    <button type="submit" name = "search" class="btn btn-primary" style= "background-color: #CD1818; "">Find Your Car</button>
                </div>
            </div>
        </div>
    </form>
    <center>

        <div class="second">
                <pre>
<?php
if(isset($_GET['returnDate']) && isset($_GET['pickupDate']) && !(isset($_GET['brands']) || isset($_GET['types']) || isset($_GET['locations']) || isset($_GET['years']) || isset($_GET['price_range'])))
{
    $time_query = "SELECT * FROM reservation";
    $time_query_run  = mysqli_query($conn, $time_query);
    $check = 0;
    $notAvailable = array();
    while ($reservation = mysqli_fetch_array($time_query_run))
    {
        $check = ((($_SESSION['pickupDate'] < $reservation['pickupDate'])  &&  ($_SESSION['returnDate'] < $reservation['pickupDate'])) || (($_SESSION['pickupDate'] > $reservation['returnDate'])  && ($_SESSION['returnDate'] > $reservation['returnDate'])));
        if($check == 0)
        {
            array_push($notAvailable,$reservation['plateID']);
        }
    }

    $str = "'" . implode ( "', '",  $notAvailable) . "'";
    $availableCars = "Select * from car where plateID not in ($str) and isAvailable = 1";
    $availableCars_run  = mysqli_query($conn, $availableCars);

    if(mysqli_num_rows($availableCars_run) > 0)
    {
        while($row = mysqli_fetch_array($availableCars_run))
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
                    <br>
            <th><a href="makeReservation.php? plateID=<?php echo $row['plateID']; ?>" role="button" class="btn btn-primary" style= "background-color: #CD1818"">Reserve</a></th>
            <?php

        }
    }
    ?>
   <pre>
    <?php
        }
         else if((isset($_GET['returnDate']) && isset($_GET['pickupDate'])) && (isset($_GET['brands']) || isset($_GET['types']) || isset($_GET['locations'])|| isset($_GET['years']) || isset($_GET['price_range'])))
            {
                $time_query = "SELECT * FROM reservation";
                $time_query_run  = mysqli_query($conn, $time_query);
                $check = 0;
                $notAvailable = array();
                while ($reservation = mysqli_fetch_array($time_query_run))
                {
                    $check = ((($_GET['pickupDate'] < $reservation['pickupDate'])  &&  ($_GET['returnDate'] < $reservation['pickupDate'])) || (($_GET['pickupDate'] > $reservation['returnDate'])  && ($_GET['returnDate'] > $reservation['returnDate'])));
                    if($check == 0)
                    {
                        array_push($notAvailable,$reservation['plateID']);
                    }
                }

                $str = "'" . implode ( "', '",  $notAvailable) . "'";
                $typeFlag = 0; $yearFlag = 0; $brandFlag = 0; $locationFlag = 0;
                if(!empty($_GET['price_range']))
                {
                    $price = $_GET['price_range'];
                }
                else
                {
                    $price[0] = 1000;
                }

                if(!empty($_GET['brands']))
                {
                    $brandsChecked = $_GET['brands'];
                    $brandFlag = 1;
                }
                else
                {
                    $brandsChecked = $brand_query_run;
                }

                if(!empty($_GET['years']))
                {
                    $yearsChecked = $_GET['years'];
                    $yearFlag = 1;

                }
                else
                {
                    $yearsChecked = $year_query_run;
                }
                if(!empty($_GET['types']))
                {
                    $typeFlag = 1;
                    $typesChecked= $_GET['types'];

                }
                else
                {
                    $typesChecked = $type_query_run;
                }

                if(!empty($_GET['locations']))
                {
                    $locationsChecked = $_GET['locations'];
                    $locationFlag = 1;

                }
                else
                {
                    $locationsChecked = $loc_query_run;
                }

                foreach($typesChecked as $rowTypes)
                {
                    foreach($yearsChecked as $rowYears)
                    {
                        foreach ($locationsChecked  as $rowLocations)
                        {
                            foreach ($brandsChecked as $rowBrands)
                            {

                                if($locationFlag == 0)
                                    $rL = $rowLocations['location'];
                                else
                                    $rL = $rowLocations;
                                if($brandFlag == 0)
                                    $rB = $rowBrands['brand'];
                                else
                                    $rB = $rowBrands;
                                if($typeFlag == 0)
                                    $rT = $rowTypes['type'];
                                else
                                    $rT = $rowTypes;
                                if($yearFlag == 0)
                                    $rY = $rowYears['year'];
                                else
                                    $rY = $rowYears;

                                $products = "SELECT * FROM car WHERE type = '$rT' and year ='$rY' and location ='$rL' and brand = '$rB' and plateID not in ($str) and pricePerday < $price[0]";   //and not in str array not available cars
                                $products_run = mysqli_query($conn, $products);

                                if(mysqli_num_rows($products_run) > 0)
                                {
                                    while($r = mysqli_fetch_array($products_run))
                                    {
                                        ?>
                                        <div class="box" style=" font-family: 'Montserrat', sans-serif;">
                                        <th>  <?php echo "<img src='data:image/jpeg;base64," .base64_encode($r["image"]) . "' style =  height='350' width='450'/>"; ?>  </th>
                                        <th><?php echo 'Model:    '. $r['Model'];        ?></th>
                                        <th> <?php echo 'Type:    '.$r['type'];      ?></th>
                                        <th> <?php echo 'Make Year:    '.$r['year'];         ?></th>
                                        <th> <?php echo 'Price:    '.$r['pricePerday']; ?></th>
                                        <th> <?php echo 'Mileage:    '.$r['mileage']; ?></th>
                                        <th> <?php echo 'Car Location:    '.$r['location']; ?></th>
                                        <br>
                                        <th><a href="makeReservation.php? plateID=<?php echo $r['plateID']; ?>" role="button" class="btn btn-primary" style= "background-color: #CD1818"">Reserve</a></th>
                                        <?php
                                    }
                                }
                            }
                        }
                    }
                }
            }


else
{

    $query = "Select * from car where isAvailable = 1";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {

        while($r = mysqli_fetch_array($query_run))
        {
            ?>


<div  style=" font-family: 'Montserrat', sans-serif;">

            <th>  <?php echo "<img src='data:image/jpeg;base64," .base64_encode($r["image"]) . "' style =  height='350' width='450'/>"; ?>  </th>
            <th><?php echo 'Model:    '. $r['Model'];        ?></th>
            <th> <?php echo 'Type:    '.$r['type'];      ?></th>
            <th> <?php echo 'Make Year:    '.$r['year'];         ?></th>
            <th> <?php echo 'Price:    '.$r['pricePerday']; ?></th>
            <th> <?php echo 'Mileage:    '.$r['mileage']; ?></th>
            <th> <?php echo 'Car Location:    '.$r['location']; ?></th>
            <?php
        }

    }}?>

                </pre>

    </center>



</div>
</div>

 </html>