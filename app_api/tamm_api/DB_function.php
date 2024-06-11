<?php
require 'PHPMailer/PHPMailerAutoload.php';
define('SALT1', '24859f@#$#@$');
	define('SALT2', '^&@#_-=+Afda$#%');
//require 'dbcon.php';
class DB_Function
{
	private $conn;
	private $mail;
	
	function __construct()
	{
		require_once 'DB_connect.php';
		
		$db=new DB_Connect();
		$this -> mail = new PHPMailer;
		$this->conn=$db->connect();
	}
	function __destruct()
	{
		
	}
	
	public function storeTA($userid,$referenceNo,$taDate,$trainNo,$dStation,$dTime,$aStation,$aTime,$distance,$claimPercentage,$claimAmount)
	{
		
		
		
		
		$stmt=mysql_query("INSERT INTO taentryforms(empid,reference_id,taDate,train,departS,departT,arrivalS,arrivalT,distance,percent,amount,status,created_at,set_number) VALUES('".$userid."','".$referenceNo."','".$taDate."','".$trainNo."','".$dStation."','".$dTime."','".$aStation."','".$aTime."','".$distance."','".$claimPercentage."','".$claimAmount."',1,NOW(),1)");
		
		if($stmt)
		{
			$fetch=mysql_query("SELECT * FROM taentryforms WHERE taDate='$taDate' AND reference_id='$referenceNo' ");
			
			$fetch_arrivalT =mysql_query("SELECT arrivalT,percent FROM taentryforms WHERE taDate='$taDate' AND reference_id='$referenceNo'
ORDER BY arrivalT DESC limit 1");

$fetch_departT =mysql_query("SELECT departT FROM taentryforms WHERE taDate='$taDate' AND reference_id='$referenceNo'
ORDER BY departT ASC limit 1");

			
			
			$data1=mysql_fetch_array($fetch);
			
			$data2=mysql_fetch_array($fetch_departT);
			$data3=mysql_fetch_array($fetch_arrivalT);
			
			
			$data["dT"]=$data2["departT"];
			$data["aT"]=$data3["arrivalT"];
			$data["reference_id"]=$data1["reference_id"];
			$data["taDate"]=$data1["taDate"];
			$data["percent"]=$data1["percent"];
			$data["departS"]=$data1["departS"];
			$data["percentOfDay"]=$data3["percent"];
				

					
			
			
			
			return $data;
		}
		else
		{
			return false;
		}
		
		
		
		
	}
	/*get user by email id and password*/
	public function getUserByEmailAndPassword($email,$password)
	{
		//$stmt=$this->conn->prepare("SELECT * FROM customer WHERE email_id=?");
		//$stmt->bind_param("s",$email);
		
		$stmt=mysql_query("SELECT * FROM customer WHERE email_id='$email'");
		$user=mysql_fetch_array($stmt);
		if($user)
		{
			//$user=$stmt->get_result()->fetch_assoc();
			//$stmt->close();
			
			//$user=mysql_fetch_array($stmt);
			
			
			//verifying User Password
				$salt=$user['salt'];
				$encrypted_password=$user['password'];
				$hash=$this->checkhashSSHA($salt,$password);
				//check for password Equality
				if($encrypted_password==$hash)
				{
					//User Authentication detail are correct
					return $user;
				}
				
		}
		else{
			return NULL;
		}
	}
	/*get user by username and password*/
	public function getUserByUserIdAndPassword($userid,$password)
	{
		
		
		$stmt=mysql_query("SELECT * FROM employees WHERE pfno='$userid'");
		$user=mysql_fetch_array($stmt);
		
		
		if($user)
		{
			
			//verifying User Password
				
				$db_password=$user['psw'];
				
				$hash_pass=$this->hashPassword($password,SALT1,SALT2);
				
				
				//check for password Equality
				if($db_password==$password)
				{
					//User Authentication detail are correct
					return $user;
				}
				else
					if($db_password==$hash_pass)
				{
					return $user;
				}else
				{
					return null;
				}
				/*else
				{
					$update=mysql_query("UPDATE allocate_stall_tbl set password='$encrypt_password'");
				}*/ 
				
		}else
		{
			$stmt1=mysql_query("SELECT * FROM users WHERE username='$userid'");
		$user1=mysql_fetch_array($stmt1);
		if($user1)
			{
				//verifying User Password
				
				$db_password=$user1['password'];
				$pf=$user1['username'];
				$pf1=substr($pf,5);
				$stmt3=mysql_query("SELECT * FROM employees WHERE pfno='$pf1' AND desig='Sr.SO(A\/c)'");
				$user3=mysql_fetch_array($stmt3);
				
				$hash_pass=$this->hashPassword($password,SALT1,SALT2);
				
				
				//check for password Equality
				if($db_password==$password)
				{
					//User Authentication detail are correct
					return $user3;
				}
				else
					if($db_password==$hash_pass)
				{
					return $user3;
				}else
				{
					return null;
				}
				/*else
				{
					$update=mysql_query("UPDATE allocate_stall_tbl set password='$encrypt_password'");
				}*/ 
			}
		}
			
			// else
			// {
			// return NULL;
			// }
	}
	
	/*Check user is existed or not*/
	public function isUserExisted($userid)
	{
		//$stmt=$this->conn->prepare("SELECT email_id FROM customer WHERE email_id=?");
		
		$stmt=mysql_query("SELECT pfno FROM employees WHERE pfno='$userid'");
		
		//$stmt->bind_param("s",$email);
		
		//$result=mysql_fetch_assoc($stmt);
		
		$count=mysql_num_rows($stmt);
		//$stmt->execute();
		
		//$stmt->store_result();
		
		if(!$count>0)
		{
						$stmt1=mysql_query("SELECT username FROM users WHERE username='$userid'");
					
					$count1=mysql_num_rows($stmt1);
					if(!$count1>0)
					{
						return false;
					}else
					{
						return true;
					}
						//user Existed	
						//$stmt->close();
						 return false;
		}else{
			// User Not Existed
			//$stmt->close();
			return true;
		}
	}
	
	
	public function changePass($pass,$empid)
{
  //global $con;
  
  $query = "update employees set psw='".$this->hashPassword($pass)."' where pfno='".$empid."'";
  
  $result = mysql_query($query);
  
  if($result){
    return true;
  }
  else
  {
    return false;
  }
}
	/*Encrypting Password @param password returns salt encrypted_password*/
	public function hashSSHA($password)
	{
		$salt=sha1(rand());
		$salt=substr($salt,0,10);
		$encrypted=base64_encode(sha1($password.$salt,true).$salt);
		$hash=array("salt"=>$salt,"encrypted"=>$encrypted);
		return $hash;
		
	}
	
	public function hashPassword($pPassword, $pSalt1="2345#$%@3e", $pSalt2="taesa%#@2%^#")
{
	return sha1(md5($pSalt2 . $pPassword . $pSalt1));
}
	
	/*Decrypting password @param salt,password return hash String*/
	
	public function checkhashSSHA($salt,$password)
	{
		$hash=base64_encode(sha1($password.$salt,true).$salt);
		return $hash;
	}
	/*public function hashPassword($pPassword)
	{
		$pSalt1="2345#$%@3e";
		$pSalt2="taesa%#@2%^#";
		return sha1(md5($pSalt2.$pPassword.$pSalt1));
	}*/
	
	 /*public function passwordResetRequest($email)
	 {

    $random_string = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
    $hash = $this->getHash($random_string);
    $encrypted_temp_password = $hash["encrypted"];
    $salt = $hash["salt"];

    //$sql = 'SELECT COUNT(*) from user WHERE email =:email';
	$stmt=$this->conn->prepare("SELECT email FROM user WHERE email=?");
		
		$stmt->bind_param("s",$email);
		
		$stmt->execute();
		
		$stmt->store_result();
   // $query = $this -> conn -> prepare($sql);
    //$query -> execute(array('email' => $email));

    if($stmt->num_rows==1){

        //$row_count = $query -> fetchColumn();

        //if ($row_count == 0){


            $update_sql = "UPDATE user SET encrypted_temp_password=$encrypted_temp_password,salt=$salt,created_at=NOW() WHERE email=$email";
            /*$update_query = $this ->conn ->prepare($update_sql);
			$update_query->bind_param("sss",$email,$encrypted_temp_password,$salt)
            $update_query->execute();
			$insert_query->close();*/
			/*if($this->conn->query($update_sql)===TRUE)
			{
			
            
					
                $user["email"] = $email;
                $user["temp_password"] = $random_string;

                return $user;

            } else {

                return false;

            }
			


       // }
		/*else {

            $update_sql = 'UPDATE user SET email =:email,encrypted_password =:encrypted_temp_password,
                    salt =:salt,created_at = :created_at';
            $update_query = $this -> conn -> prepare($update_sql);
            $update_query -> execute(array(':email' => $email, ':encrypted_password' => $encrypted_temp_password, 
            ':salt' => $salt, ':created_at' => date("Y-m-d H:i:s")));

            if ($update_query) {
        
                $user["email"] = $email;
                $user["temp_password"] = $random_string;
                return $user;

            } else {

                return false;

            }

        }*/
    /*} else {

        return false;
    }


 }*/
  public function getHash($password) {

     $salt = sha1(rand());
     $salt = substr($salt, 0, 10);
     $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
     $hash = array("salt" => $salt, "encrypted" => $encrypted);

     return $hash;
	 /*$salt=sha1(rand());
		$salt=substr($salt,0,10);
		$encrypted=base64_encode(sha1($password.$salt,true).$salt);
		$hash=array("salt"=>$salt,"encrypted"=>$encrypted);
		return $hash;*/

}



public function verifyHash($password, $hash) {

    return password_verify ($password, $hash);
	//$hash=base64_encode(sha1($password.$salt,true).$salt);
		//return $hash;
}

public function sendSMS($mobile,$refNo,$name)
{
	
	// Code to Send sms starts here
				  				  
				  //Your authentication key
					$authKey = "70302AbSftnyOwtvs53d8e401";
					
					//Multiple mobiles numbers separated by comma
					//$mobileNumber = $result_set['mobile'];
					
					//Sender ID,While using route4 sender id should be 6 characters long.
					$senderId = "FINSUR";
					
					//Your message to send, Add URL encoding here.
					$msg = "Hi, <b>'.$name.'</b>.<br>Your grievance has been submitted successfully with Ref No-'".$refNo."'";
					$message = urlencode("$msg");
					
					//Define route 
					$route = 4;
					//Prepare you post parameters
					$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobile,
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
						return false;
						
					}
					else{
						//echo "<script>alert('OTP has been sent on your registered mobile //".$result_set['mobile'].".');window.location='forgotpass.php?q=otp';</script>";
						return true;
					}
					//$_SESSION['empid']=$_REQUEST['empid'];
					curl_close($ch);
				return null;
	
	
}
function sendEmail($name,$email,$password){

        $mail =$this->mail;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dk.dishank123@gmail.com';
        $mail->Password = 'Shree@1s';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'dk.dishank123@gmail.com';
        $mail->FromName = 'Dishank';
        $mail->addAddress($email, $email);

        $mail->addReplyTo('dk.dishank123@gmail.com', 'Dishank Kadam');

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = 'Registration Completed..';
        $mail->Body    = 'Hi,<b>'.$name.'</b>.<br><br> You Have SuccessFully Registered with Email:- <b>'.$email.'</b><br> and <br><br>Password:-<b>'.$password.'</b><br><br>Thanks,<br>Dishank.';

        if(!$mail->send()) {

            return $mail->ErrorInfo;

        } else {

            return true;

        }
    }

	function sendChangePasswordEmail($name,$email,$password){

        $mail =$this->mail;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dk.dishank123@gmail.com';
        $mail->Password = 'Shree@1s';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'dk.dishank123@gmail.com';
        $mail->FromName = 'Dishank';
        $mail->addAddress($email, $email);

        $mail->addReplyTo('dk.dishank123@gmail.com', 'Dishank Kadam');

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = 'Password Changed..';
        $mail->Body    = 'Hi,<b>'.$name.'</b>.<br><br> Your Password is SuccessFully Changed:- <b>'.$email.'</b><br> and <br><br> Your New Password is:-<b>'.$password.'</b><br><br>Thanks,<br>Dishank.';

        if(!$mail->send()) {

            return $mail->ErrorInfo;

        } else {

            return true;

        }
    }

     function sendPHPMail($name,$email,$password){

        $subject = 'Registration Successfull';
        $message = 'Hi,<b>'.$name.'</b>.<br><br> Your have SuccessFully Registered.';
        $from = "dk.dishank123@gmail.com";
        $headers = "From:" . $from;

        return mail($email,$subject,$message,$headers);

    }
	public function changePassword($email,$password)
	{
		$hash=$this->hashSSHA($password);
		$encrypted_password=$hash["encrypted"];//encrypted_password
		$salt=$hash["salt"];//salt
		
		$stmt=$this->conn->prepare("UPDATE user set encrypted_password=?,salt=?,updated_at=NOW() WHERE email=?");
		$stmt->bind_param("sss",$encrypted_password,$salt,$email);
		$result=$stmt->execute();
		$stmt->close();
		if($result)
		{
			$stmt=$this->conn->prepare("SELECT * FROM user WHERE email=?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();
			
			$user["name"]=$user["name"];
			$user["email"] = $email;
            $user["password"] = $encrypted_password;
			
			return $user;
		}
		else
		{
			return false;
			
		}
	}
		 function forgotPassword($email,$code,$password)
	{
		
		$stmt=$this->conn->prepare("SELECT encrypted_temp_password from user WHERE email=?");
		$stmt->bind_param("s",$email);
		$result1=$stmt->execute();
		$user = $stmt->get_result()->fetch_assoc();
		$stmt->close();
		if($result1)
		{
		
		if(strcmp($code,$user["encrypted_temp_password"])==0)
		{
			$hash=$this->hashSSHA($password);
			$encrypted_password=$hash["encrypted"];//encrypted_password
			$salt=$hash["salt"];//salt
		
			$stmt=$this->conn->prepare("UPDATE user set encrypted_password=?,salt=?,updated_at=NOW() WHERE email=?");
			$stmt->bind_param("sss",$encrypted_password,$salt,$email);
			$result2=$stmt->execute();
			$stmt->close();
		if($result2)
		{
			$stmt=$this->conn->prepare("SELECT * FROM user WHERE email=?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();
			
			$user["name"]=$user["name"];
			$user["email"] = $email;
            $user["password"] = $encrypted_password;
			
			return $user;
		}
		else
		{
			return false;
			
		}
			
		}else{
			return false;
			
		}
		}
		else{
			return false;
			
		}
		
	}
		
		 function forgotPasswordRequest($email)
		{
		  //$random_string = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 6)), 0, 6);
		//$hash = $this->getHash($random_string);
		//$encrypted_t_password = $hash["encrypted"];
		//$salt = $hash["salt"];
		
		
		//$stmt=$this->conn->prepare("UPDATE user set encrypted_temp_password=? WHERE email=?");
		//$stmt->bind_param("ss",$random_string,$email); 
		//$result=$stmt->execute();
		//$stmt->close();
		
		$stmt=mysql_query("SELECT * FROM customer WHERE email_id='$email'");
		$user=mysql_fetch_array($stmt);
		if($user)
		{
			
			
			/*$stmt=$this->conn->prepare("SELECT * FROM user WHERE email=?");
			$stmt->bind_param("s",$email);
				$stmt->execute();
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();*/
			
			
            
			$username=$user['username'];
			$random_string=substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz",6)),0,6);
			$name=substr($username,0,1);
			
			
			$newPass=ucfirst($name)."".$random_string;
			
			$hash=$this->hashSSHA($newPass);
			$encrypted_password=$hash["encrypted"];//encrypted_password
			$salt=$hash["salt"];
			
			$stmt1=mysql_query("UPDATE customer set password='$encrypted_password',salt='$salt' WHERE email_id='$email'");
			if($stmt1)
			{
			$user["username"]=$user["username"];
			$user["email_id"] = $user['email_id'];
			$user["password"] =$newPass;
			
			
			return $user;
				
			}else
			{
				return false;
			}
			
		}
		else
		{
			return false;
			
		}
		
	}
	function sendForgotPasswordRequestEmail($name,$email,$password){

        $mail =$this->mail;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dk.dishank123@gmail.com';
        $mail->Password = 'Shree@1s';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'dk.dishank123@gmail.com';
        $mail->FromName = 'Dishank';
        $mail->addAddress($email, $email);

        $mail->addReplyTo('dk.dishank123@gmail.com', 'Dishank Kadam');

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = 'Forgot Password Request';
        $mail->Body    = 'Hi,<b>'.$name.'</b>.<br><br> Your Password Reset Code is:- <b>'.$password.'</b><br>Enter This code into App<br><br>Thanks,<br>Dishank.';

        if(!$mail->send()) {

            return $mail->ErrorInfo;

        } else {

            return true;

        }
    }
	function sendForgotPasswordEmail($name,$email,$password){

        $mail =$this->mail;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dk.dishank123@gmail.com';
        $mail->Password = 'Shree@1s';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->From = 'dk.dishank123@gmail.com';
        $mail->FromName = 'Dishank';
        $mail->addAddress($email, $email);

        $mail->addReplyTo('dk.dishank123@gmail.com', 'Dishank Kadam');

        $mail->WordWrap = 50;
        $mail->isHTML(true);

        $mail->Subject = 'Mahalaxmi Saras: New Password';
        $mail->Body    = 'Hi,<b>'.$name.'</b>.<br><br> Your New Password is:- <b>'.$password.'</b><br>Use This Password for Login<br><br>Thanks,<br>MSRLM.';

        if(!$mail->send()) {

            return $mail->ErrorInfo;

        } else {

            return true;

        }
    }

}

?>