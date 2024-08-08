<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "drmpsurh_railway";
$password = "Admin@123";
$db = "drmpsurh_sur_railway";

function createConnection() {
    global $servername, $username, $password, $db;

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

$conn = createConnection();

function user_activity($empid, $file_name, $action, $message, $conn) {
    $date1 = date("Y-m-d H:i:s"); 
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_activity_query = "INSERT INTO audit_table (empid, ip_address, file_name, action, message, created_at) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($user_activity_query);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $empid, $ip_address, $file_name, $action, $message, $date1);

    // if ($stmt->execute() === false) {
    //     echo "Error: " . $stmt->error;
    // } else {
    //     echo "User activity recorded successfully";
    // }

    $stmt->close();
}

$empid = '12345';
$file_name = 'example.php';
$action = 'access';
$message = 'User accessed the file';

user_activity($empid, $file_name, $action, $message, $conn);

// $conn->close();
?>
