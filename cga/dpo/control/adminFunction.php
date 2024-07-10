<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include("../../dbconfig/dbcon.php");
include("function.php");
session_start();
//adminProcee requests



function changeimg($name, $tmp_name)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function

    $upload_dir = "../profile/" . $_SESSION['pf_number'] . ".jpg";
    $dir = "profile/" . $_SESSION['pf_number'] . ".jpg";

    if (move_uploaded_file($tmp_name, $upload_dir)) {
        $query = "UPDATE login SET img=? WHERE pf_number=?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $dir, $_SESSION['pf_number']);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        return $success;
    } else {
        mysqli_close($con);
        return false;
    }
}

function changePass($pass, $confirm)
{
    $con = dbcon1(); // Assuming dbcon1() is your mysqli connection function

    $hashedPassword = hashPassword($pass, SALT1, SALT2);
    $query = "UPDATE login SET password=? WHERE pf_number=?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "ss", $hashedPassword, $_SESSION['pf_number']);
    $success = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $success;
}

