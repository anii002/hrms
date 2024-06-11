<?php 
	
	include("dbcon.php");
	session_start();

	date_default_timezone_set('Asia/Kolkata');
	//$date1=date("d/m/Y h:i:s");

	$dir = "control/doc/";
	$file_extension = array('jpg','png','gif','pdf');
	$file_size= array();

	if(isset($_POST['submit']))
	{

		 $order_no 	= $_POST['order_no'];
		 $order_date = $_POST['order_date'];
		 $l_no		= $_POST['l_no'];
		 $department = $_POST['department'];

		//$Date1 = date('m-d-Y',strtotime( $_POST['order_date']));  

		$data = explode(".", $_FILES["attach"]["name"]);
		$file = rand().".".$data[1];
		$PATH = $dir.$_FILES["attach"]["name"];
		$filepath = "http://drmpsur-hrms.in/eims/".$dir.$file;


    	if(move_uploaded_file($_FILES["attach"]["tmp_name"],$dir.$file))
    	{
      
     	 		dbcon1();
      			$query = mysql_query("INSERT INTO `office_order`(`Order No`, `Order Date`, `L No`, `Department`, url) VALUES ('$order_no','$order_date','$l_no','$department' ,'$filepath')");
      			if($query == TRUE)
      			{
      				echo "<script>alert('Order Submitted successfully');window.location='office_order.php';</script>"; 
      			}
      			else
      			{
      				echo "<script>alert('Not Submitted successfully');</script>"; 
      			} 
        	
		}
		else
		{
       	 		echo  "<script>alert('Failed To Upload DOC...');</script>";
		}	
}

?>