<?php

require_once 'common/db.php';
session_start(); // Ensure session is started

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = $_POST['otp'];
    $pf_no = $_SESSION['pf_num'];

    // Use the connection established in db.php
    global $conn;

    // Secure the input
    $otp = $conn->real_escape_string($otp);
    $pf_no = $conn->real_escape_string($pf_no);

    $sql = "SELECT emp_id, otp FROM tbl_otp WHERE emp_id = '$pf_no' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if ($row['otp'] == $otp) {
            echo "<script>
            window.location.href = 'new-pass.php';
            </script>";
        } else {
            echo "<script>
            alert('Please Enter Correct OTP');
            window.location.href = 'otp-verify.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('OTP not found. Please try again.');
        window.location.href = 'otp-verify.php';
        </script>";
    }
}
?>
