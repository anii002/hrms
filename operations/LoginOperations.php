<?php
header('Content-Type: application/json');
include_once("../common/db.php");
include_once("./CommonFunctions.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
// ini_set('display_errors', 1);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/php-error.log');

// Start output buffering to prevent any unexpected output
ob_start();

// Initialize response array
$response = array();

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get username and password from the POST data
    $email = $_POST['username'];
    $loginpassword = hashPassword($_POST['password']); // Ensure this function is defined securely

    // Establish database connection
    $conn = createConnection(); // Ensure this function securely creates a database connection

    // Check if connection was successful
    if ($conn->connect_error) {
        // Log the error and set the response
        error_log("Connection failed: " . $conn->connect_error);
        $response['res'] = 'db_error';
    } else {
        // Prepare SQL statement based on the username
        if ($email == 'superadmin') {
            $sql = "SELECT * FROM user_permission WHERE pf_num = ? AND password = ?";
        } else {
            $sql = "SELECT * FROM register_user WHERE emp_no = ? AND password = ?";
        }

        // Prepare and execute SQL statement
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $email, $loginpassword);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a row was found
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                // Set session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['UserName'] = ($email == 'superadmin') ? 'superadmin' : 'Employee';
                $_SESSION['profile_image'] = $row['image'];
                $_SESSION['pf_num'] = ($email == 'superadmin') ? $row['pf_num'] : $row['emp_no'];
                $response['res'] = ($email == 'superadmin') ? 'superadmin' : 'success';
            } else {
                $response['res'] = 'not_found';
            }

            // Close statement
            $stmt->close();
        } else {
            // SQL statement preparation failed
            error_log("SQL statement preparation failed: " . $conn->error);
            $response['res'] = 'sql_error';
        }

        // Close database connection
        $conn->close();
    }
} else {
    // Set response for invalid request method
    $response['res'] = 'invalid_request';
}

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);