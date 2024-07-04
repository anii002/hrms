<?php
include('../dbconfig/dbcon.php');

$abc = mysqli_query($conn, "SELECT * FROM `tasummarydetails` WHERE month = '11' AND year = '2020' AND is_summary_generated = '1' AND summary_id = '0'");
$abcd = mysqli_num_rows($abc);
while ($row = mysqli_fetch_array($abc)) {

    $res = "UPDATE tasummarydetails SET summary_id = '17181' WHERE id = '" . $row['id'] . "'";
    $res1 = mysqli_query($conn, $res);
    if ($res === true) {
        echo "<pre>";
        echo "success";
    } else {
        echo "<pre>";
        echo "false";
    }
}
exit();
