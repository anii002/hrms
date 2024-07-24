<?php

define('ENCRYPTION_KEY', 'E26C86962EB738FC817A48EF8971B67A9C68DA95B916B8ECFCDD067D3A445E43');

function create_log($action, $action_on)
{
    $conn = dbcon1();

    date_default_timezone_set('Asia/Kolkata');
    $trans_id = date('dmYHis');
    $pf_number = $_SESSION['id'];
    $localIP = getHostByName(getHostName());

    if ($action != "") {
        // Encrypt action details
        $action_encrypt = encrypt_data($action, ENCRYPTION_KEY);

        // Prepare statement for insertion
        $stmt = mysqli_prepare($conn, "INSERT INTO `log_history`(`transaction_id`, `action_by`, `action_on`, `activity_details`, `ip_address`, `date_time`) VALUES (?, ?, ?, ?, ?, NOW())");
        
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sssss", $trans_id, $pf_number, $action_on, $action_encrypt, $localIP);
        
        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            // Log successfully created
        } else {
            // Handle insertion failure
            echo "<script>alert('Log creation failed');</script>";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('Action Can not Be Empty');</script>";
    }
}

function encrypt_data($data, $key)
{
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt_data($data, $key)
{
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

// Example usage:
// create_log('User logged in', 'User Management');
// $decrypted_action = decrypt_data($action_encrypt, ENCRYPTION_KEY);
