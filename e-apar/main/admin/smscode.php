<?php

////Message integration code starts here......
function send_sms1($data)
{
	print_r($data);
	//Your Username key
	$username = "infores";
	//Your Username key
	$password = "infores@123";
	//Sender ID,While using route4 sender id should be 6 characters long.
	$senderId = "BLKSMS";
	//Multiple mobiles numbers separated by comma
	$mobileNumber = $data["mobile_no"];
	//Your message to send, Add URL encoding here.
	$message = $data["message"];
	//Your Request id to send, Add URL encoding here.
	$fl = "0";

	$postData = array(
		'user' => $username,
		'password' => $password,
		'sid' => "BLKSMS",
		'msisdn' => $mobileNumber,
		'msg' => $message,
		'fl' => "0",
	);

	// http://103.242.119.152/vendorsms/pushsms.aspx?user=abc&password=xyz&msisdn=919898xxxxxx&sid=SenderId& msg=test%20message&fl=0


	//API URL
	$url = "http://103.242.119.152/vendorsms/pushsms.aspx";
	// init the resource
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
	if (curl_errno($ch)) {
		//echo 'error:' . curl_error($ch);
	}
	curl_close($ch);
	//echo $output;
}
