<?php
session_start();
include("connect.php");
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header("Location: index.php");
die;
