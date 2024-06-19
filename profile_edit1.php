<?php

include_once("common/db.php");
include_once("operations/CommonFunctions.php");

session_start(); // Ensure session is started

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $password = hashPassword($password);
    $pf_num = $_SESSION['pf_num'];

    // Use the connection established in db.php
    global $conn;

    // Secure the input
    $password = $conn->real_escape_string($password);
    $pf_num = $conn->real_escape_string($pf_num);

    $sql_otp = "SELECT emp_id, otp FROM tbl_otp WHERE emp_id = '$pf_num' ORDER BY id DESC LIMIT 1";
    $result_otp = $conn->query($sql_otp);

    if ($result_otp && $result_otp->num_rows == 1) {
        $row_otp = $result_otp->fetch_assoc();
        $pf_num = $row_otp['emp_id'];

        $sql = "UPDATE register_user SET password = '$password' WHERE emp_no = '$pf_num'";
        $result = $conn->query($sql);

        if ($result) {
            echo "<script>alert('Password Changed Successfully!');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed to Change Password! Please try Again');</script>";
            echo "<script>window.location.href = 'Login.php';</script>";
        }
    } else {
        echo "<script>alert('OTP validation failed. Please try again.');</script>";
        echo "<script>window.location.href = 'otp-verify.php';</script>";
    }
}
?>
