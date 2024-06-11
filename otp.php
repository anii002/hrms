<?php

    require_once 'common/db.php';

    function otp($mobile, $pf_num)
    {
                $otp = rand(1000,9999);

              // Code to Send sms starts here

                //Your authentication key
                $authKey = "70302AbSftnyOwtvs53d8e401";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = $mobile;

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "FINSUR";

                //Your message to send, Add URL encoding here.
                $msg = "$otp is the OTP for your HRMS. NEVER SHARE YOUR OTP WITH ANYONE.";
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
                
                else{

                    $sql = "INSERT INTO tbl_otp (emp_id, otp, sent) VALUES ('$pf_num', '$otp', CURRENT_TIMESTAMP)";
                    $result = mysql_query($sql);
                    echo  mysql_error();
                    // exit();
                        
                    if($result)
                    {
                        $_SESSION['pf_num'] = $pf_num;
                        echo "<script>
                        alert('OTP has been sent to registered mobile number. Please enter the otp');
                        window.location='otp-verify.php';
                        </script>";

                    }
                 
                }
                curl_close($ch);

       } 


   function otp1($mobile, $pf_num)
    {

// echo "Venkat";
// exit();
                $otp = rand(1000,9999);

              // Code to Send sms starts here

                //Your authentication key
                $authKey = "70302AbSftnyOwtvs53d8e401";

                //Multiple mobiles numbers separated by comma
                $mobileNumber = $mobile;

                //Sender ID,While using route4 sender id should be 6 characters long.
                $senderId = "FINSUR";

                //Your message to send, Add URL encoding here.
                $msg = "$otp is the OTP for your HRMS. NEVER SHARE YOUR OTP WITH ANYONE.";
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
                else
                {

                    $sql_otp = "INSERT INTO tbl_otp (emp_id, otp, sent) VALUES ('".$pf_num."', '".$otp."', CURRENT_TIMESTAMP)";
                    $result_otp = mysql_query($sql_otp);
                    echo mysql_error();
                    // exit();
                    $_SESSION['pf_num'] = $pf_num;
                    $_SESSION['mobile'] = $mobile;
                    
                    if($result_otp)
                    {
                    //     echo 'OTP SENDED';
                    //   header('Location:otp-verify_user.php');
                    echo "<script>
                          alert('OTP has been sent to registered mobile number. Please enter the otp');
                        window.location='otp-verify1.php';
                        </script>";
                            

                    }
                 
                }
                curl_close($ch);

       }        

?>


