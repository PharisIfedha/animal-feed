<?php
require "./functions/database_functions.php";
$conn = db_connect();

if ($conn->connect_error){
	die("connection failed" . $conn->connect_error);
}

$name = $_POST ['name'];
$email = $_POST ['email'];
$descr = $_POST ['descr'];

$sql = "INSERT INTO contact (name,email,descr) VALUES ('$name','$email','$descr')";

if ($conn->query($sql) === TRUE){
	echo "SUCCESS! Your request has been received. We'll get back to you shortly :) Redirecting...";
	header('refresh:2; url=index.php');
}else {
	echo "Error." . $sql . "<br>" .$conn->error;
}
$conn->close();
?> 