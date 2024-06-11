<?php
require_once 'DB_connect.php';
		
		$db=new DB_Connect();
		$conn=$db->connect();
		
		
		//$response=array();
		$response1=array();
		
		$temp=[];
		//$query1="SELECT * FROM taentryforms WHERE status=1";
		
		//$fetch_departS =mysql_query("SELECT departS FROM taentryforms GROUP BY reference_id ORDER BY departS DESC limit 1");
		
		$query2="SELECT reference_id FROM taentryforms";
		
		$query = "SELECT taentryform_master.reference, taentryform_master.TAYear, taentryform_master.TAMonth, SUM(taentryforms.distance) AS distance, SUM(taentryforms.amount) as rate FROM taentryform_master INNER JOIN taentryforms ON taentryform_master.reference = taentryforms.reference_id WHERE taentryforms.reference_id in (select taentryform_master.reference from taentryform_master where taentryform_master.empid='".$_SESSION['empid']."') GROUP BY taentryforms.reference_id";
		
		while($ref_ID[]=mysql_fetch_array($query2))
		{
		
		foreach($ref_ID as $value)
		{
			
			$temp1['ref']=$value['reference_id'];
				$selectRef="SELECT departS FROM taentryforms WHERE reference_id='$temp1'";
				
				$resSelect=mysql_fetch_array($selectRef);
				$temp['ref_id']=$resSelect['departS'];
				
				array_push($response1,$temp);
		}
		}
		echo json_encode($response1);
		
		

/*$fetch_departT =mysql_query("SELECT departT FROM taentryforms WHERE taDate='$taDate' AND reference_id='$referenceNo'
ORDER BY departT ASC limit 1");


		$result1=mysql_query($query1);
		
		$data2=mysql_fetch_array($fetch_departT);
			$data3=mysql_fetch_array($fetch_departS);
					
		//$result=mysql_query($query1);
	
		while($value = mysql_fetch_array($result1))
		{
			
			$temp=array();
			
			$temp['reference_id']= $value['reference_id'];
			$temp['jour_date']=$value['taDate'];
			
			
			array_push($response1,$temp);
			
			
			
		
		}
				
				echo json_encode($response1);
			
		
	*/		
			
		

?>