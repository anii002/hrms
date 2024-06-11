<?php 

class DB_Connect 
{ 
private $conn; 

public function hrms_connect() 
{  
define("DB_HOST1","localhost"); 
define("DB_PASS1","root@123"); 
define("DB_USER1","esoluhp6_test"); 
define("DB_NAME1","esoluhp6_hrms");  
$this->conn=@mysql_connect(DB_HOST1,DB_USER1,DB_PASS1); 
mysql_select_db(DB_NAME1); 
return $this->conn; 
} 

public function eApplication_connect() 
{  
define("DB_HOST1","localhost"); 
define("DB_PASS1","root@123"); 
define("DB_USER1","esoluhp6_test"); 
define("DB_NAME1","esoluhp6_eapplication");  
$this->conn=@mysql_connect(DB_HOST1,DB_USER1,DB_PASS1); 
mysql_select_db(DB_NAME1); 
return $this->conn; 
} 

public function feedback_connect() 
{  
define("DB_HOST1","localhost"); 
define("DB_PASS1","root@123"); 
define("DB_USER1","esoluhp6_test"); 
define("DB_NAME1","esoluhp6_feedback");  
$this->conn=@mysql_connect(DB_HOST1,DB_USER1,DB_PASS1); 
mysql_select_db(DB_NAME1); 
return $this->conn; 
} 

public function hrms_eims_connect() 
{  
define("DB_HOST10","localhost"); 
define("DB_PASS10","root@123"); 
define("DB_USER10","esoluhp6_test"); 
define("DB_NAME10","esoluhp6_new_eims");  
$this->conn=@mysql_connect(DB_HOST10,DB_USER10,DB_PASS10); 
mysql_select_db(DB_NAME10); 
return $this->conn; 
} 

public function hrms_sur_connect() 
{  
define("DB_HOST9","localhost"); 
define("DB_PASS9","root@123"); 
define("DB_USER9","esoluhp6_test"); 
define("DB_NAME9","esoluhp6_sur_railway");  
$this->conn=@mysql_connect(DB_HOST9,DB_USER9,DB_PASS9); 
mysql_select_db(DB_NAME9); 
return $this->conn; 
} 


public function railway_master_connect() 
{  
define("DB_HOST7","localhost"); 
define("DB_PASS7","root@123"); 
define("DB_USER7","esoluhp6_test"); 
define("DB_NAME7","esoluhp6_railway_master");  
$this->conn=@mysql_connect(DB_HOST7,DB_USER7,DB_PASS7); 
mysql_select_db(DB_NAME7); 
return $this->conn; 
} 

public function hrms_ta_connect() 
{  
define("DB_HOST8","localhost"); 
define("DB_PASS8","root@123"); 
define("DB_USER8","esoluhp6_test"); 
define("DB_NAME8","esoluhp6_travel_allowance1");  
$this->conn=@mysql_connect(DB_HOST8,DB_USER8,DB_PASS8); 
mysql_select_db(DB_NAME8); 
return $this->conn; 
} 


public function gr_connect() 
{  
define("DB_HOST2","localhost"); 
define("DB_PASS2","root@123"); 
define("DB_USER2","esoluhp6_test"); 
define("DB_NAME2","esoluhp6_e_gr");  
$this->conn=@mysql_connect(DB_HOST2,DB_USER2,DB_PASS2); 
mysql_select_db(DB_NAME2); 
return $this->conn; 
} 
public function apar_connect() 
{  
define("DB_HOST3","localhost"); 
define("DB_PASS3","root@123"); 
define("DB_USER3","esoluhp6_test"); 
define("DB_NAME3","esoluhp6_eapar");  
$this->conn=@mysql_connect(DB_HOST3,DB_USER3,DB_PASS3); 
mysql_select_db(DB_NAME3); 
return $this->conn; 
} 

public function sr_connect()
{
define("DB_HOST4","localhost"); 
define("DB_PASS4","root@123"); 
define("DB_USER4","esoluhp6_test"); 
define("DB_NAME4","esoluhp6_sr");  
$this->conn=@mysql_connect(DB_HOST4,DB_USER4,DB_PASS4); 
mysql_select_db(DB_NAME4); 
return $this->conn; 
}
public function sr_new_connect() 
{  
define("DB_HOST5","localhost"); 
define("DB_PASS5","root@123"); 
define("DB_USER5","esoluhp6_test"); 
define("DB_NAME5","esoluhp6_srnew");  
$this->conn=@mysql_connect(DB_HOST5,DB_USER5,DB_PASS5); 
mysql_select_db(DB_NAME5); 
return $this->conn; 
} 
public function selection_calendar_connect() 
{  
define("DB_HOST6","localhost"); 
define("DB_PASS6","root@123"); 
define("DB_USER6","esoluhp6_test"); 
define("DB_NAME6","esoluhp6_selection");  
$this->conn=@mysql_connect(DB_HOST6,DB_USER6,DB_PASS6); 
mysql_select_db(DB_NAME6); 
return $this->conn; 
} 

} 
 
?>