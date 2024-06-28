<?php
session_start();

// Database connection
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "drmpsurh_eapar");

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$databasetable = "tbl_employee";

// Include PHPExcel library
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');
include 'PHPExcel/IOFactory.php';

// File path to be uploaded
$FILENAME = $_GET['txtfile'];
echo "File name: $FILENAME";

try {
    $objPHPExcel = PHPExcel_IOFactory::load($FILENAME);
} catch(Exception $e) {
    die('Error loading file "' . pathinfo($FILENAME, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
$arrayCount = count($allDataInSheet); // Get total count of rows in the Excel sheet

for ($i = 2; $i <= $arrayCount; $i++) {
    $emplcode = addslashes(trim($allDataInSheet[$i]["A"]));
    $PAN = addslashes(trim($allDataInSheet[$i]["C"]));

    $query = $link->prepare("UPDATE tbl_employee SET pan = ? WHERE emplcode = ?");
    $query->bind_param("ss", $PAN, $emplcode);
    
    if ($query->execute()) {
        echo "Record updated for emplcode: $emplcode<br>";
    } else {
        echo "Error updating record for emplcode: $emplcode - " . $query->error . "<br>";
    }

    $query->close();
}

$link->close();
?>
