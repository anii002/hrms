<?php
include_once('../dbconfig/dbcon.php');
error_reporting(0);
	function get_religion($id) 
	{
		dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `religion` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}	
		}
		return $id;
	}
	
	function get_community($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `community` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['LONGDESC'];
			}
		}	
	return $id;
	}
	
	function get_depot($id) 
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['deopt'];
			}
		}	
		return $id;
	}
	function get_ps($id) 
	{
		if($id==1)
				return 'Scale';
          else
		return 'Level';
	}
	function get_gender($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql=mysql_query("select * from gender where id='$id'");
			$res=mysql_fetch_assoc($sql);
			$gender=$res['gender'];
			return $gender;
		}
		return $id;
	} 	
	
	
	function get_group($id){
		dbcon();
		if (!empty($id))
		{
			$sql=mysql_query("select * from group_col where id='$id'");
			$res=mysql_fetch_assoc($sql);
			$group_col=$res['group_col'];
			return $group_col;
		}
		return $id;
	}
	
	function get_department($id) 
	{
		dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `department` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['DEPTDESC'];
			}
		}	
		return $id;
	}
	function get_designation($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `designation` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['desiglongdesc'];
			}
		}	
		return $id;
	}
	function get_appointment_type($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `appointment_type` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['type'];
			}
		}	
		return $id;
	}
	
	function get_order_type($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `office_order_typ` WHERE `short_name` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['type_order'];
			}
		}	
		return $id;
	}
	
	function get_medi_category($id)
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `medical_classi` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}
		}	
		return $id;
	}
	
	function get_station($id) 
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `station` WHERE `stationcode` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['stationdesc'];
			}
		}	
		return $id;
	}
	
	function get_billunit($id) 
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['billunit'];
			}
		}	
		return $id;
	}
	
	function get_prtf_type($id)
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `prtf_type` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['prtf_type'];
			}
		}
		return $id;
	}
	
	function get_advance($id) 
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `advance` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['long_desc'];
			}
		}
		return $id;
	}
	
	function get_relation($id) 
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `relation` WHERE `code` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}
		}
		return $id;
	}
	
	function get_nom_type($id) 
	{
		dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `nomination_type` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['nomination_type'];
			}
		}
		return $id;
	}
	
	
	function got_mr($mr)
	{
		dbcon();
		if (!empty($mr)) {
			$marital_status=mysql_query("select * from marital_status where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['shortdesc'];
				return $g_mr;
			}
			 
		}
		return $mr; 
	}
	function got_award($mr)
	{
		dbcon();
		if (!empty($mr)) 
		{
			$marital_status=mysql_query("select * from awards where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['awards'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	function fetch_user($user)
	{
		dbcon();
		if (!empty($user)) 
		{
			$sql=mysql_query("select * from tbl_login where adminid='$user'");
			while($result=mysql_fetch_array($sql)){
				$username=$result['username'];
			}
			return $username;
		}
		return $user;
	}
	
	function get_recruitment_code($user)
	{
		dbcon();
		if (!empty($user)) 
		{
			$sql=mysql_query("select * from  recruitment where id='$user'");
			while($result=mysql_fetch_array($sql)){
				$username=$result['shortdesc'];
			}
			return $username;
		}
		return $user;
	}
	
	function get_initial_edu($user)
	{
		dbcon();
		$data=explode(",",$user);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query("select education from education where id='$out'");
			while($result=mysql_fetch_array($sql))
			{
				$edu.=" ".$result['education'];
			}
		}
		return $edu;
	}
	function get_source_typ($src)
	{
		dbcon();
		$data=explode(",",$src);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query("select property_source from property_source where id='$out'");
			while($result=mysql_fetch_array($sql))
			{
				$edu.=" ".$result['property_source']."<br>";
			}
		}
		return $edu;
	}
	
	function get_sub_edu($user)
	{
		dbcon();
		$data=explode(",",$user);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query("select education from education where id='$out'");
			while($result=mysql_fetch_array($sql))
			{
				$edu.=" ".$result['education'];
			}
		}
		return $edu;
	}
	//22th jan 2018
	
	function get_pme($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from medical_pme_class where short_desc='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['short_desc'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	 function get_appo_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from appointment_type where id='$mr'");
			$fetch_mr=mysql_fetch_array($marital_status);
				return $fetch_mr['type']; 
		}
		return $mr;
	} 
	
	function get_pay_scale_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from  pay_scale_type where id='$mr'");
			
			while($fetch_mr=mysql_fetch_array($marital_status))
			{	
				return $fetch_mr['type'];
			}
		}
		return $mr;
	}
	
	function get_order_type_pro_rev($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from  order_type_pro_rev where shortdesc='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['longdesc'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_order_type_transfer($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from  order_type_transfer where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['type'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_order_type_fixation($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from  order_type_fixation where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['type'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_penalty_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from penalty_type where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				return $fetch_mr['type'];
			}
		}
		return $mr;
	}
	
	function get_increment_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from increment_type where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['increment_type'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_awarded_by($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from awarded_by where id='$mr'");
			//echo "select * from awarded_by where id='$mr'".mysql_error();
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['awarded_by'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_awards($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from awards where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['awards'];
			}
			return $g_mr;
		}
		return $mr; 
	}
	
	
	function get_property_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from property_type where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['type'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_property_item($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from property_item where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['item'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	
	function get_property_source($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from property_source where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['property_source'];
			}
			return $g_mr; 
		}
		return $mr;
	}
	function get_training_type($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from training_type where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['type'];
			}
			return $g_mr;
		}
		return $mr;
	}
	function get_charge_sheet_status($mr)
	{
		dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from charge_sheet_status where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['charge_sheet_status'];
			}
			return $g_mr;
		}
		return $mr;
	}
	
	function get_emp_name($mr)
	{
		dbcon1();
		if(!empty($mr))
		{
			$marital_status=mysql_query("select * from biodata_temp where `pf_number`='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				$g_mr=$fetch_mr['emp_name'];
			}
			return $g_mr;
		}
		return $mr;
	}


             function get_billunit_report($mr)
	      {
		dbcon();
		if(!empty($mr))
		{
			$sql=mysql_query("select * from billunit where billunit='$mr'");
			$f=mysql_fetch_array($sql);
			$ans=$f['id'];
			return $ans;
		}else
		{
			return $ans;
		}
		
	      }
	
	


?>