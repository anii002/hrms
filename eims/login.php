<?php
session_start();

include('dbcon.php');

if (isset($_POST['action']) && $_POST['action'] === 'user_login') {
    $username = $_POST['txtuser'];
    $password = $_POST['txtpass'];
    $data = '';

    $conn1 = dbcon1();
    $stmt = mysqli_prepare($conn1, "SELECT * FROM users1 WHERE username = ? AND password = ? AND status = 1");
    $hashedPassword = hashPassword($password, SALT1, SALT2);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);
    mysqli_stmt_close($stmt);

    if ($count == 1) {
        $_SESSION['user'] = $username;
        $data = "dashboard";
    } else {
        mysqli_close($conn1);
		$user = "root";
		$pass = "";
		$host = "localhost";
		$db = "drmpsurh_sur_railway";
		$conn = mysqli_connect($host, $user, $pass, $db);
       
        $stmt2 = mysqli_prepare($conn, "SELECT * FROM prmaemp WHERE empno = ? AND psw = ?");
        mysqli_stmt_bind_param($stmt2, "ss", $username, $hashedPassword);
        mysqli_stmt_execute($stmt2);
        $result2 = mysqli_stmt_get_result($stmt2);
        $count2 = mysqli_num_rows($result2);
        mysqli_stmt_close($stmt2);

        if ($count2 == 1) {
            $_SESSION['user'] = $username;
            $data = "emp_dashboard";
        } else {
            $data = "denied";
        }

        mysqli_close($conn2);
    }

    echo $data;
}
?>
