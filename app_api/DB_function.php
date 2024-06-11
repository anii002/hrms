<?php
require 'PHPMailer/PHPMailerAutoload.php';
/*define('SALT1', '24859f@#$#@$');
	define('SALT2', '^&@#_-=+Afda$#%');*/
define('SALT1', '2345#$%@3e');
define('SALT2', 'taesa%#@2%^#');
class DB_Function
{
	private $conn;
	private $mail;
	
	function __construct()
	{
		require_once 'DB_connect.php';
		
		$db=new DB_Connect();
		$this -> mail = new PHPMailer;
		$this->conn=$db->hrms_sur_connect();
	}
	function __destruct()
	{
		
	}
	
	 public function fetch_form($emp_id)
 {

 	$data =  array();
 	$purpose =  array();
 	$i=0;
    $db = new DB_connect();
    $db-> eApplication_connect();
 	$q = "select * from purpose";
 	$q_out = mysql_query($q);

    while ($row = mysql_fetch_assoc($q_out)) {
       	$purpose[$i] = $row;
        $i = $i+1;
    }

    $data['purpose'] = $purpose;
    
  // mysql_close();
   
 

    $db = new DB_connect();
    $db-> hrms_sur_connect();
    $q_userdata =  "select * from resgister_user where emp_no='$emp_id'";
    $q_userdata_execute = mysql_query($q_userdata);
 
     if($row = mysql_fetch_assoc($q_userdata_execute))
     {
   //  	$user_details = $row;
      $user_details = new user_details();
      $user_details -> name = $row['name'];
      $user_details -> bill_unit = $row['bill_unit'];
      $user_details -> mobile = $row['mobile'];
      $user_details	-> emp_no = $row['emp_no'];       
    }

   $row_designation = mysql_query("select DESIGLONGDESC from designations where DESIGCODE='".$row['designation']."' ");
   $designation = mysql_fetch_assoc($row_designation);

   $row_department = mysql_query("select DEPTDESC from departments where DEPTNO='".$row['department']."'");
   
   $department = mysql_fetch_assoc($row_department);

    $row_station = mysql_query("select stationdesc from station where stationcode='".$row['station']."'");
   $station = mysql_fetch_assoc($row_station);
  // echo $row['station'];

     $user_details -> designation = $designation['DESIGLONGDESC'];
     $user_details -> department = $department['DEPTDESC'];
     $user_details -> station  = $station['stationdesc'];

    $data['user_details'] = $user_details;

    return $data;

 }
	
	public function storeUser($name,$pfno,$mobile_no,$desig,$dept, $billunit,$station,$dob,$doa,$basicpay,$seventhpay,$pass,$empType)
	{
		date_default_timezone_set("Asia/Kolkata");
		$now=Date('d-m-Y h:i:sa');

		// $uuid=uniqid('',true);
// 		$hash=$this->hashSSHA($password);
// 		$encrypted_password=$hash["encrypted"];//encrypted_password
// 		$salt=$hash["salt"];//salt
		
// 		echo $password;
		$hash=$this->hashPassword($pass,SALT1,SALT2);
// 		$encrypted_password=$hash["encrypted"];//encrypted_password
// 		$salt=$hash["salt"];//salt
		// $encrypt_password=$this->hashPassword($password);
		
	
	
	$selInfo=mysql_query("select permaddress1,resaddress1,email,permstate,permcity,permpincode,office,handicapflag,sex,community from prmaemp where empno='$pfno'");
	
	$resInfo=mysql_fetch_array($selInfo);
	
	$permAddress=$resInfo['permaddress1'];
	$resAddress=$resInfo['resaddress1'];
	$email=$resInfo['email'];
	$permState=$resInfo['permstate'];
	$permCity=$resInfo['permcity'];
	$permPincode=$resInfo['permpincode'];
	$officer=$resInfo['office'];
	$handicapflag=$resInfo['handicapflag'];
	$sex=$resInfo['sex'];
	$community=$resInfo['community'];
	
						
		$stmt=mysql_query("INSERT INTO `resgister_user` (`emp_no`, `name`, `designation`, `department`, `bill_unit`, `station`, `dob`, `doa`, `basic_pay`,`7th_pay_level`, `mobile`, `password`,`empType`,`emp_address1`,`emp_address2`,`emp_email`,`emp_state`,`emp_city`,`emp_pincode`,`office`,`handicap_status`,`gender`,`community`)
		VALUES ('$pfno', '$name', '$desig', '$dept', '$billunit', 'SUR', '$dob', '$doa', '$basicpay', '$seventhpay', '$mobile_no', '$hash','$empType','$permAddress','$resAddress','$email','$permState','$permCity','$permPincode','$officer','$handicapflag','$sex','$community')");
		

	
		//check for successfull store
		if($stmt)
		{
			// echo "INSERTed";
			/*$stmt=$this->conn->prepare("SELECT * FROM customer WHERE email_id=?");
			$stmt->bind_param("s",$email);
			$stmt->execute();
			$user = $stmt->get_result()->fetch_assoc();
			$stmt->close();*/
			
// 			$stmt1=mysql_query("SELECT * FROM registration WHERE pfno='$pfno'");
// 			$user=mysql_fetch_array($stmt1);

 $db = new DB_connect();
    $db-> hrms_sur_connect();
			//$sql_user = "INSERT INTO user_permission (pf_num, e_sar, tamm, e_grievance, e_notification, it_form, e_app, forms, e_apar) VALUES ('$pfno', 2, 3, 4, 2, 1, 3, 1, 6)";
			$sql_user = "INSERT INTO user_permission (pf_num, e_sar, tamm, e_grievance, e_notification, it_form, e_app, forms, e_apar, feedback) VALUES ('$pfno', 2, 4, 4, 2, 1, 3, 1, 6, 3)";
$result_user = mysql_query($sql_user);
if($result_user)
{
// mysql_connect('localhost','esoluhp6_test','root@123');
// mysql_select_db('esoluhp6_travel_allowance1');$db = new DB_connect();

$db = new DB_connect();
    $db-> hrms_ta_connect();
$sql_ta = "SELECT pfno, mobile FROM employees WHERE pfno = '$pfno'";
$result_ta = mysql_query($sql_ta);
$count_ta = mysql_num_rows($result_ta);
if($count_ta == 1)
{
   $sql_taup = "UPDATE employees SET mobile = '$mobile_no' WHERE pfno = '$pfno'";
   $result_taup = mysql_query($sql_taup);
}
    
}
			
			return true;
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
		
		
		$stmt=mysql_query("SELECT * FROM resgister_user WHERE emp_no='$userid'");
		
// 		echo "error".mysql_error();
		
		$user=mysql_fetch_array($stmt);
		if($user)
		{
			
			
			
			
			
			//verifying User Password
				
				$db_password=$user['password'];
				
				$hash_pass=$this->hashPassword($password,SALT1,SALT2);
				
				
				//check for password Equality
				if($db_password==$password)
				{
					//User Authentication detail are correct
				// 	echo "db match";
					return $user;
				}
				else
					if($db_password==$hash_pass)
				{
				    
				    // echo "hash match";
					return $user;
				}else
				{
					return null;
				}
				/*else
				{
					$update=mysql_query("UPDATE allocate_stall_tbl set password='$encrypt_password'");
				}*/ 
				
		}
		else{
			return NULL;
		}
	}
	
	/*Check user is existed or not*/
	public function isUserExisted($userid)
	{
		//$stmt=$this->conn->prepare("SELECT email_id FROM customer WHERE email_id=?");
		
		$stmt=mysql_query("SELECT emp_no FROM resgister_user WHERE emp_no='$userid'");
		
		//$stmt->bind_param("s",$email);
		
		//$result=mysql_fetch_assoc($stmt);
		
		$count=mysql_num_rows($stmt);
		//$stmt->execute();
		
		//$stmt->store_result();
		
		if(!$count>0)
		{
			//user Existed	
			//$stmt->close();
			 return false;
		}else{
			// User Not Existed
			//$stmt->close();
			return true;
		}
	}
	public function isSHGUserExisted($username)
	{
		//$stmt=$this->conn->prepare("SELECT email_id FROM customer WHERE email_id=?");
		
		$stmt=mysql_query("SELECT username FROM allocate_stall_tbl WHERE username='$username'");
		
		//$stmt->bind_param("s",$email);
		
		//$result=mysql_fetch_assoc($stmt);
		
		$count=mysql_num_rows($stmt);
		//$stmt->execute();
		
		//$stmt->store_result();
		
		if(!$count>0)
		{
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
  
  $query = "update resgister_user set password='".$this->hashPassword($pass,SALT1,SALT2)."' where emp_no='".$empid."'";
  
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
	
	/*Decrypting password @param salt,password return hash String*/
	
	public function checkhashSSHA($salt,$password)
	{
		$hash=base64_encode(sha1($password.$salt,true).$salt);
		return $hash;
	}
	public function hashPassword($pPassword)
	{
		$pSalt1="2345#$%@3e";
		$pSalt2="taesa%#@2%^#";
		return sha1(md5($pSalt2.$pPassword.$pSalt1));
	}
	
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

Class user_details {

	public $name;
	public $bill_unit;
	public $mobile;
	public $designation;
	public $department;
	public $station;
	public $emp_no;


}

?>