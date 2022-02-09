<?php
set_include_path(get_include_path().PATH_SEPARATOR.'C:\xampp\htdocs');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CarRentalCompany";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
