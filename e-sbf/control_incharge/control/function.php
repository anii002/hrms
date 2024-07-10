<?php
function verify_emp($emp_pf)
{
    // global $db;
    dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $rst_emp = mysql_query($query);
    if (mysql_num_rows($rst_emp) > 0) {
        return true;
    } else {
        return false;
    }
}
function designation($id)
{
    // global $db_common;
    dbcon1();
    $query = "select DESIGSHORTDESC from designations where DESIGCODE='$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
    return $value['DESIGSHORTDESC'];
}
function department($id)
{
    // global $db_common;
    dbcon1();
    $query = "select DEPTDESC from departments where DEPTNO='$id'";
    $result = mysql_query($query);
    $value = mysql_fetch_array($result);
    return $value['DEPTDESC'];
}
function get_emp_info($emp_pf)
{
    // global $db;
    dbcon1();
    $query = "SELECT * FROM `register_user` WHERE `emp_no`='$emp_pf'";
    $emp_name = "";
    $rst_emp = mysql_query($query);
    if (mysql_num_rows($rst_emp) > 0) {
        $rw_emp = mysql_fetch_assoc($rst_emp);
    }
    return $rw_emp;
}
function scheme($id)
{
    dbcon();
    $sql = "SELECT * FROM tbl_form_details WHERE scheme_id = '$id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    return $row;
}
function get_rel($id)
{
    dbcon();
    $sql = "SELECT * FROM tbl_form_details WHERE scheme_id = '$id'";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    return $row;
}

    function sendSMS($mobile, $msg)
    {
        //Your authentication key
                $authKey = "70302AbSftnyOwtvs53d8e401";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = $mobile;

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "FINSUR";

                //Your message to send, Add URL encoding here.
                // $msg = "$otp is the OTP for your HRMS. NEVER SHARE YOUR OTP WITH ANYONE.";
                $message = urlencode("$msg");

                //Define route
                $route = 4;
                //Prepare you post parameters
                $postData = array(
                'authkey' => $authKey,
                'mobiles' => $mobileNumber,
                'message' => $message,
                'sender' => $senderId,
                'route' => $route
                );

                //API URL
                $url="http://smsindia.techmartonline.com/sendhttp.php";

                //init the resource
                $ch = curl_init();
                curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
                ));


                //Ignore SSL certificate verification
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


                //get response
                $output = curl_exec($ch);

                //Print error if any
                
                if(curl_errno($ch))
                {
                echo 'error:' . curl_error($ch);
                }
    }

?>
