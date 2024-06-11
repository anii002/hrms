<?php
require_once 'common/db.php';

// Create a connection
$conn = createConnection();

// Example of using the user_activity function
$empid = '12345';
$file_name = 'example.php';
$action = 'access';
$message = 'User accessed the file';
user_activity($empid, $file_name, $action, $message, $conn);

// Your SQL queries
$sql_desg = "SELECT * FROM designations";
$result_desg = mysqli_query($conn, $sql_desg);
$row = mysqli_fetch_assoc($result_desg);

$sql_dept = "SELECT * FROM department";
$result_dept = mysqli_query($conn, $sql_dept);

$sql_bill = "SELECT * FROM billunit";
$result_bill = mysqli_query($conn, $sql_bill);

$sql_station = "SELECT * FROM station";
$result_station = mysqli_query($conn, $sql_station);

$sql_pay_level = "SELECT * FROM paylevel";
$result_pay_level = mysqli_query($conn, $sql_pay_level);

// Close the connection
$conn->close();