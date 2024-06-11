<?php

define('ENCRYPTION_KEY', 'E26C86962EB738FC817A48EF8971B67A9C68DA95B916B8ECFCDD067D3A445E43');

function create_log($action, $action_on)
{
    $conn = dbcon1();

    date_default_timezone_set('Asia/Kolkata');
    $trans_id = date('dmYHis');
    $pf_number = $_SESSION['id'];
    $localIP = getHostByName(getHostName());
    $action_encrypt = mc_encrypt($action, ENCRYPTION_KEY);

    if ($action != "") {
        $stmt = $conn->prepare("INSERT INTO log_history (transaction_id, action_by, action_on, activity_details, ip_address, date_time) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $trans_id, $pf_number, $action_on, $action_encrypt, $localIP);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "<script>alert('Action cannot be empty');</script>";
    }
}

function mc_encrypt($encrypt, $key)
{
    $encrypt = serialize($encrypt);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $key = hex2bin($key);
    $encrypted = openssl_encrypt($encrypt, 'aes-256-cbc', $key, 0, $iv);
    $encoded = base64_encode($encrypted) . '|' . base64_encode($iv);
    return $encoded;
}

function mc_decrypt($decrypt, $key)
{
    $decrypt = explode('|', $decrypt);
    $decoded = base64_decode($decrypt[0]);
    $iv = base64_decode($decrypt[1]);
    $key = hex2bin($key);
    $decrypted = openssl_decrypt($decoded, 'aes-256-cbc', $key, 0, $iv);
    if ($decrypted === false) {
        return false;
    }
    $decrypted = unserialize($decrypted);
    return $decrypted;
}

function dbcon1()
{
    $user1 = "root";
    $pass1 = "";
    $host1 = "localhost";
    $db1 = "drmpsurh_sr";

    $conn1 = new mysqli($host1, $user1, $pass1, $db1);
    if ($conn1->connect_error) {
        die("Connection failed: " . $conn1->connect_error);
    }

    return $conn1;
}