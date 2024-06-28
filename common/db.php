<?php
session_start();
// header('Content-Type: application/json');
$servername = "localhost";
$username = "root";
$password = "";
$db = "drmpsurh_sur_railway";

$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("error in connection" . $conn->connect_error);
}

function createConnection()
{
    global $servername, $username, $password, $db;

    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function user_activity($empid, $file_name, $action, $message, $conn)
{
    $date1 = date("Y-m-d H:i:s");
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $user_activity_query = "INSERT INTO audit_table (empid, ip_address, file_name, action, message, created_at) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($user_activity_query);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $empid, $ip_address, $file_name, $action, $message, $date1);

    if ($stmt->execute() === false) {
        echo "Error: " . $stmt->error;
    } else {
        // echo "User activity recorded successfully";
    }

    $stmt->close();
}
