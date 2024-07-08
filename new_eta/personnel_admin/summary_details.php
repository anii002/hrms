<?php
session_start();
include('../dbconfig/dbcon.php');
$date = date("Y-m-d h:i:s");
$cnt = 0;

if (isset($_POST['selected_summary']) && is_array($_POST['selected_summary'])) {
    $flag = count($_POST['selected_summary']);
    foreach($_POST['selected_summary'] as $sumid) {
        $u_query = "UPDATE master_summary SET pa_status='1', PA_approved_time='$date' WHERE summary_id='$sumid'";

        $result = mysqli_query($conn, $u_query);

        if ($result) {
            $cnt++;
        }
    }

    if ($flag == $cnt) {
        $empid = $_SESSION['empid'];
        $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg = 'PA forward ' . implode(', ', $_POST['selected_summary']) . ' summaries to Account dept';
        user_activity($empid, $file_name, 'Forward Summaries', $msg);
        echo "<script>alert('Successfully forwarded to accountant..');window.location='approve_list.php';</script>";
    } else {
        $empid = $_SESSION['empid'];
        $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
        $msg = 'PA unable to forward ' . implode(', ', $_POST['selected_summary']) . ' summaries to Account dept';
        user_activity($empid, $file_name, 'Forward Summaries', $msg);
        echo "<script>alert('Failed to Forward...');window.location='approve_summary.php';</script>";
    }
} else {
    echo "<script>alert('No summaries selected.');window.location='approve_summary.php';</script>";
}
?>
