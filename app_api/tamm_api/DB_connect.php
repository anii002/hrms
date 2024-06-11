<?php 

class DB_Connect 
{ 
private $conn; 

// public function connect() 
// {  
// require_once 'config.php'; 

// $this->conn=@mysql_connect(DB_HOST,DB_USER,DB_PASS); 
// mysql_select_db(DB_NAME); 


// return $this->conn; 
// }

public function connect() 
{  
define("DB_HOST","localhost"); 
define("DB_PASS","root@123"); 
define("DB_USER","esoluhp6_test"); 
define("DB_NAME","esoluhp6_travel_allowance1"); 
$this->conn=@mysql_connect(DB_HOST,DB_USER,DB_PASS); 
mysql_select_db(DB_NAME); 
return $this->conn; 
} 

} 
 
?>