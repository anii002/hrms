<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();
include("function.php");
session_start();
//adminProcee requests
function AddAdmin($empid, $username, $psw, $role, $dept, $station)
{
  global $con;
  $conn1 = dbcon1();
  $hashed_password = hashPassword($psw, SALT1, SALT2);
  $query = "INSERT INTO users1 (empid, username, password, role, dept, station) 
              VALUES (?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn1, $query);
  mysqli_stmt_bind_param($stmt, "ssssss", $empid, $username, $hashed_password, $role, $dept, $station);
  $result = mysqli_stmt_execute($stmt);

  if ($result) {
    mysqli_stmt_close($stmt); // Close prepared statement
    mysqli_close($conn1); // Close database connection
    return true;
  } else {
    $error_message = mysqli_error($conn1);
    mysqli_stmt_close($stmt); // Close prepared statement
    mysqli_close($conn1); // Close database connection
    die("Error: " . $error_message); // Die or handle the error as per your application's error handling strategy
  }
}
function activeUser1($pfno, $active)
{
  $conn = dbcon1();
  $query = "UPDATE users1 SET status='$active' WHERE empid='$pfno'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    die("Error: " . mysqli_error($conn));
  }
}

function deactiveUser1($pfno, $active)
{
  $conn = dbcon1();
  $query = "UPDATE users1 SET status='$active' WHERE empid='$pfno'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    die("Error: " . mysqli_error($conn));
  }
}

function updateUser($fname, $email, $mobile, $design)
{
  $conn = dbcon1();
  $query = "UPDATE users1 SET fname='$fname', designation='$design', mobile='$mobile', email='$email' WHERE id='" . $_SESSION['admin_id'] . "'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    die("Error: " . mysqli_error($conn));
  }
}

function activeUser2($pfno, $active)
{
  $conn = dbcon1();
  $query = "UPDATE users1 SET status='$active' WHERE username='$pfno'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    die("Error: " . mysqli_error($conn));
  }
}

function deactiveUser2($pfno, $active)
{
  $conn = dbcon1();
  $query = "UPDATE users1 SET status='$active' WHERE username='$pfno'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    die("Error: " . mysqli_error($conn));
  }
}

// Image Handling Function
function changeimg($name, $tmp_name)
{
  dbcon2();
  $upload_dir = "../profile/" . $_SESSION['empid'] . ".jpg";
  $dir = "profile/" . $_SESSION['empid'] . ".jpg";
  if (move_uploaded_file($tmp_name, $upload_dir)) {
    $conn = dbcon1();
    $query = "UPDATE employees SET img='$dir' WHERE pfno='" . $_SESSION['empid'] . "'";
    $result = mysqli_query($conn, $query);
    if ($result) {
      mysqli_close($conn);
      return true;
    } else {
      mysqli_close($conn);
      return false;
    }
  } else {
    return false;
  }
}

// Other Database Operation Functions
function deleteOffice($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM office_order WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deletenotification($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM `e-notification1` WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deleteseniority($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM seniority_list WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deletecircular($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM circular WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deletechecklist($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM checklist WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deletetransfer($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM transfer_registration WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}

function deletePhoto_Gallary($id)
{
  $conn = dbcon1();
  $query = "DELETE FROM photo_gallary WHERE id='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
    mysqli_close($conn);
    return true;
  } else {
    mysqli_close($conn);
    return false;
  }
}
