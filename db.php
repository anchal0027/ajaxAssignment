<?php
$servername = 'localhost';
$username   = 'root';
$password   = 'java@123';
$dbname     = 'Employee_Details';

// Create connection
$conn = mysqli_connect($servername, $username, $password) or die("mysql not connect");
mysqli_select_db($conn, $dbname) or die("db not connect");
?>