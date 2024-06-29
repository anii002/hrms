<?php

include("../dbconfig/dbcon.php");
$conn = dbcon();
$groupid = $_GET["grp"];

$sql_query = mysqli_query($conn, "delete from tbl_finalgroupgrade where groupid=$groupid");
echo "<script>window.location='frmgroupreport.php?gid=$groupid';</script>";
echo mysqli_error($conn);
