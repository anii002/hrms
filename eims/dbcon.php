<?php
// dbcon.php

// Check if dbcon2 function is already defined
if (!function_exists('dbcon2')) {
    function dbcon2()
    {
        $user  = "root";
        $pass  = "";
        $host  = "localhost";
        $db    = "drmpsurh_sur_railway";
        $conn = @mysqli_connect($host, $user, $pass);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_select_db($conn, $db);
        return $conn;
    }
}

// Check if dbcon1 function is already defined
if (!function_exists('dbcon1')) {
    function dbcon1()
    {
        $user1  = "root";
        $pass1  = "";
        $host1  = "localhost";
        $db1    = "drmpsurh_new_eims";
        $conn1 = @mysqli_connect($host1, $user1, $pass1);
        if (!$conn1) {
            die("Connection failed: " . mysqli_connect_error());
        }
        mysqli_select_db($conn1, $db1);
        return $conn1;
    }
}

// Constants
if (!defined('SALT1')) {
    define('SALT1', '2345#$%@3e');
}

// Define SALT2 if not already defined
if (!defined('SALT2')) {
    define('SALT2', 'taesa%#@2%^#');
}

// Function to hash password
if (!function_exists('hashPassword')) {
    function hashPassword($pPassword, $pSalt1 = "2345#$%@3e", $pSalt2 = "taesa%#@2%^#")
    {
        return sha1(md5($pSalt2 . $pPassword . $pSalt1));
    }
}

// Set default timezone
date_default_timezone_set('Asia/Kolkata');

// Additional constants and functions related to your application
if (!defined('MAX_LOGIN_ATTEMPTS')) {
    define('MAX_LOGIN_ATTEMPTS', 5);
}

if (!function_exists('isMaxLoginAttemptsReached')) {
    function isMaxLoginAttemptsReached($username)
    {
        // Logic to check if maximum login attempts for a user have been reached
        // Return true or false
        return false;
    }
}

// Example of another function related to your application
if (!function_exists('getEmployeeDetails')) {
    function getEmployeeDetails($empId)
    {
        $conn = dbcon1(); // Assuming dbcon1() is for drmpsurh_new_eims database

        // Example query to fetch employee details
        $query = "SELECT * FROM employees WHERE emp_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $empId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        $employeeDetails = mysqli_fetch_assoc($result);

        mysqli_close($conn);

        return $employeeDetails;
    }
}

// Additional functions related to your application

?>
