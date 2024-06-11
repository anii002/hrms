<?php 

    require_once '../dbconfig/dbcon.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    dbcon1();
	    
        $emp_id = !empty($_POST['emp_id'])?$_POST['emp_id']:"";
        $field_name = !empty($_POST['field_name'])?$_POST['field_name']:"";
        $value = !empty($_POST['value'])?$_POST['value']:"";
        
        $sql = "UPDATE resgister_user SET ".$field_name." = '".$value."' WHERE id = ".$emp_id;
        
        $result = mysql_query($sql);
        
        echo json_encode($result);
	}
?>