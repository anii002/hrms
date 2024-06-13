<?php

include_once("../common/db.php");

include_once("CommonFunctions.php");

//dbcon('esoluhp6_sur_railway');

$Flag = $_REQUEST["Flag"];

if ($Flag == "PFNoVerify") {

    $Result = array("res" => "fail");

    $PFNo = $_POST["PFNo"];

    $sql = "SELECT * FROM `prmaemp` where empno='$PFNo'";

    $rstRecords = mysqli_query($conn, $sql);

    if (mysqli_num_rows($rstRecords) > 0) {

        if ($rwRecords = mysqli_fetch_assoc($rstRecords)) {

            

            extract($rwRecords);

            $Data = array("name" => $empname, "dob" => $birthdate, "desigcode" => $desigcode, "billunit" => $billunit, "stationcode" => $stationcode, "phoneno" => $phoneno, "deptcode" => $deptcode);

        }

        $Result["res"] = "success";

        $Result["Data"] = $Data;

    }

    echo json_encode($Result);

} else if ($Flag == "Register") {



    /**

     * Array

(

    [txtPFNo] => 00208260485

    [txtName] => D M RAMPRASAD GUPTA

    [txtMobile] => 1234567890

    [lstDesignation] => AC35000

    [lstDepartment] => 01

    [lstBillUnit] => 0907122

    [lstStation] => SUR

    [txtBasicPay] => 500000

    [txtCpcPayLevel] => 20

    [txtDateOfAppointment] => 2019-03-31

    [txtDOB] => 1997-07-13

    [Flag] => Register

) */

    $Result = array("res" => "success");

    $empno = $_POST["txtPFNo"];

    $name = $_POST["txtName"];

    $mobile = $_POST["txtMobile"];

    $desigation = $_POST["lstDesignation"];

    $department = $_POST["lstDepartment"];

    $station = $_POST["lstStation"];

    $basic_pay = $_POST["txtBasicPay"];

    $bill_unit = $_POST["lstBillUnit"];

    $dob = $_POST["txtDOB"];

    

    $doa = $_POST["txtDateOfAppointment"];

    $pay_level = $_POST["txtCpcPayLevel"];

    $password = hashPassword($dob);

    $empType = "Serving";



    $sql = "INSERT INTO `register_user`(`emp_no`, `name`, `designation`, `department`, `bill_unit`, `station`, `dob`, `doa`, `basic_pay`, `7th_pay_level`, `mobile`, `password`, `empType`) VALUES ('$empno','$name','$desigation','$department','$bill_unit','$station','$dob','$doa','$basic_pay','$pay_level','$mobile','$password','$empType')";

    if (mysqli_query($conn , $sql)) {

        $Result["res"] = "success";

        $Result["message"] = "Successfully Registered!";

    } else {

        $Result["res"] = "fail";

        $Result["message"] = "Please Try Again!";

    }

    echo json_encode($Result);

}