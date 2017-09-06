<?php


$name = $_POST['name'];

$email = $_POST['email'];

$messages = $_POST['messages'];

$date = $_POST['date'];

include("db.php");

$sql = mysqli_query($conn, "INSERT INTO `Employee` (`name`, `email`, `message`, `date`) VALUES ('$name','$email','$messages','$date')");

$conn->close();
?>