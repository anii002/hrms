<?php 

class DB_Connect 
{ 
private $conn; 

public function hrms_connect() 
{  
define("DB_HOST1","localhost"); 
define("DB_PASS1",""); 
define("DB_USER1","root"); 
define("DB_NAME1","hrms");  
$this->conn=mysql_connect(DB_HOST1,DB_USER1,DB_PASS1); 
mysql_select_db(DB_NAME1); 
return $this->conn; 
} 

public function gr_connect() 
{  
define("DB_HOST2","localhost"); 
define("DB_PASS2",""); 
define("DB_USER2","root"); 
define("DB_NAME2","e_gr");  
$this->conn=mysql_connect(DB_HOST2,DB_USER2,DB_PASS2); 
mysql_select_db(DB_NAME2); 
return $this->conn; 
} 
public function apar_connect() 
{  
define("DB_HOST3","localhost"); 
define("DB_PASS3",""); 
define("DB_USER3","root"); 
define("DB_NAME3","e-apar");  
$this->conn=mysql_connect(DB_HOST3,DB_USER3,DB_PASS3); 
mysql_select_db(DB_NAME3); 
return $this->conn; 
} 
} 
 
?>