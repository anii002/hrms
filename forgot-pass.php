<?php

require_once 'common/db.php'; // Ensure this file path is correct.
require_once 'otp.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pf_no = $_POST['pf_no'];

    // Use the connection established in db.php
    global $conn;

    // Secure the input
    $pf_no = $conn->real_escape_string($pf_no);

    $sql = "SELECT mobile FROM register_user WHERE emp_no = '$pf_no'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $mobile = $row['mobile'];
        otp($mobile, $pf_no);
    } else {
        echo "<script>
            alert('Your PF Number is not Registered');
            window.location.href = 'forgot.php';
            </script>";
    }

    $conn->close();
}
?>
