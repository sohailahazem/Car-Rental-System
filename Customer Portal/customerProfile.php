
 <html>
 <head>
     <link rel="stylesheet" href="stylecustomer.css">
     <title>Profile</title>
 </head>
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

 <body style="background-color: white; ">
 <div class="formContainer">
     <div class="title"><strong>MY PROFILE</strong></div>

     <?php
     session_start();
     include "connect.php";

     $newEmail=$_SESSION['email'];
     $query="SELECT * FROM Customer where email= '$newEmail'";
     $result = $conn->query($query);
     $row=mysqli_fetch_assoc($result);


     echo "<b>";
     echo "<table class='table'>";
     echo "<tr>";
     echo "<td>";
     echo "<b> First Name: </b>";
     echo "</td>";

     echo "<td>";
     echo $row['firstName'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b> Last Name: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['lastName'];
     echo "</td>";
     echo "</tr>";


     echo "<tr>";
     echo "<td>";
     echo "<b> Email: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['email'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b> Date of Birth : </b>";
     echo "</td>";
     echo "<td>";
     echo $row['dateOfBirth'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b> Street: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['street'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b> City: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['city'];
     echo "</td>";
     echo "</tr>";


     echo "<tr>";
     echo "<td>";
     echo "<b> Country: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['country'];
     echo "</td>";
     echo "</tr>";


     echo "<tr>";
     echo "<td>";
     echo "<b> Zip Code: </b>";
     echo "</td>";
     echo "<td>";
     echo $row['zipCode'];
     echo "</td>";
     echo "</tr>";


     echo "<tr>";
     echo "<td>";
     echo "<b> License Number  </b>";
     echo "</td>";
     echo "<td>";
     echo $row['licenseNumber'];
     echo "</td>";
     echo "</tr>";

     echo "<tr>";
     echo "<td>";
     echo "<b>  Phone Number </b>";
     echo "</td>";
     echo "<td>";
     echo $row['phoneNumber'];
     echo "</td>";
     echo "</tr>";


     echo "</table>";
     echo "</b>";
     ?>

 </div>
 </body>
 </html>