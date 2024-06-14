<?php
include_once('../dbconfig/dbcon.php');

error_reporting(0);

function bill_depot1($id) 
	{
		$conn = dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['billunit']."&nbsp;".$res['deopt'];
			}	
		}
		return $id;
	}
	
	
	
	
	
	function bill_depot($id) 
	{
		$conn = dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `billunit` WHERE `billunit` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['billunit']."&nbsp;".$res['deopt'];
			}	
		}
		return $id;
	}
	
	function bill_id($id) 
	{
		$conn = dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['id'];
			}	
		}
		return $id;
	}
	
	
	function bill_to_id($id) 
	{
		dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `billunit` WHERE `billunit` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['id'];
			}	
		}
		return $id;
	}
	


	function get_religion($id) 
	{
		$conn = dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `religion` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}	
		}
		return $id;
	}
	
	function get_community($id)
	{
		$conn = dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `community` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['LONGDESC'];
			}
		}	
	return $id;
	}
	
	function get_depot($id) 
	{
		$conn = dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
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
		$conn = dbcon();
		if (!empty($id))
		{
			$sql=mysql_query($conn,"select * from gender where id='$id'");
			$res=mysql_fetch_assoc($sql);
			$gender=$res['gender'];
			return $gender;
		}
		return $id;
	} 	
	
	
	function get_group($id){
		$conn = dbcon();
		if (!empty($id))
		{
			$sql=mysql_query($conn,"select * from group_col where id='$id'");
			$res=mysql_fetch_assoc($sql);
			$group_col=$res['group_col'];
			return $group_col;
		}
		return $id;
	}
	
	function get_department($id) 
	{
		$conn = dbcon();
		if (!empty($id)) 
		{
			$sql = "SELECT * FROM `department` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['DEPTDESC'];
			}
		}	
		return $id;
	}
	function get_designation($id)
	{
		$conn = dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `designation` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['desiglongdesc'];
			}
		}	
		return $id;
	}
	function get_appointment_type($id)
	{
		$conn = dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `appointment_type` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['type'];
			}
		}	
		return $id;
	}
	function get_medi_category($id)
	{
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `medical_classi` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}
		}	
		return $id;
	}
	
	function get_station($id) 
	{
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `station` WHERE `stationcode` = '".$id."'";
			$query = mysql_query($conn, $sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['stationdesc'];
			}
		}	
		return $id;
	}
	
	function get_billunit($id) 
	{
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `billunit` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
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
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `advance` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['long_desc'];
			}
		}
		return $id;
	}
	
	function get_relation($id) 
	{
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `relation` WHERE `code` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['longdesc'];
			}
		}
		return $id;
	}
	
	function get_nom_type($id) 
	{
		$conn = dbcon();
		if (!empty($id)) {
			$sql = "SELECT * FROM `nomination_type` WHERE `id` = '".$id."'";
			$query = mysql_query($conn,$sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['nomination_type'];
			}
		}
		return $id;
	}
	
	
	function got_mr($mr)
	{
		$conn = dbcon();
		if (!empty($mr)) {
			$marital_status=mysql_query($conn,"select * from marital_status where id='$mr'");
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
		$conn = dbcon();
		if (!empty($mr)) 
		{
			$marital_status=mysql_query($conn,"select * from awards where id='$mr'");
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
		$conn = dbcon();
		if (!empty($user)) 
		{
			$sql=mysql_query($conn,"select * from tbl_login where adminid='$user'");
			while($result=mysql_fetch_array($sql)){
				$username=$result['username'];
			}
			return $username;
		}
		return $user;
	}
	
	function fetch_user_name($user)
	{
		$conn = dbcon();
		if (!empty($user)) 
		{
			$sql=mysql_query($conn,"select * from tbl_login where adminid='$user'");
			while($result=mysql_fetch_array($sql)){
				$username=$result['adminname'];
			}
			return $username;
		}
		return $user;
	}
	
	function get_recruitment_code($user)
	{
		$conn = dbcon();
		if (!empty($user)) 
		{
			$sql=mysql_query($conn,"select * from  recruitment where id='$user'");
			while($result=mysql_fetch_array($sql)){
				$username=$result['shortdesc'];
			}
			return $username;
		}
		return $user;
	}
	
	function get_initial_edu($user)
	{
		$conn = dbcon();
		$data=explode(",",$user);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query($conn,"select education from education where id='$out'");
			while($result=mysql_fetch_array($sql))
			{
				$edu.=" ".$result['education'];
			}
		}
		return $edu;
	}
	function get_source_typ($src)
	{
		$conn = dbcon();
		$data=explode(",",$src);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query($conn,"select property_source from property_source where id='$out'");
			while($result=mysql_fetch_array($sql))
			{
				$edu.=" ".$result['property_source']."<br>";
			}
		}
		return $edu;
	}
	
	function get_sub_edu($user)
	{
		$conn = dbcon();
		$data=explode(",",$user);
		$edu="";
		
		foreach($data as $out)
		{
			$sql=mysql_query($conn,"select education from education where id='$out'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from medical_pme_class where short_desc='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from appointment_type where id='$mr'");
			$fetch_mr=mysql_fetch_array($marital_status);
				return $fetch_mr['type']; 
		}
		return $mr;
	} 
	
	function get_pay_scale_type($mr)
	{
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from  pay_scale_type where id='$mr'");
			
			while($fetch_mr=mysql_fetch_array($marital_status))
			{	
				return $fetch_mr['type'];
			}
		}
		return $mr;
	}
	
	function get_order_type_pro_rev($mr)
	{
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from  order_type_pro_rev where shortdesc='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from  order_type_transfer where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from  order_type_fixation where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from penalty_type where id='$mr'");
			while($fetch_mr=mysql_fetch_array($marital_status))
			{
				return $fetch_mr['type'];
			}
		}
		return $mr;
	}
	
	function get_increment_type($mr)
	{
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from increment_type where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from awarded_by where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from awards where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from property_type where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from property_item where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from property_source where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from training_type where id='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn,"select * from charge_sheet_status where id='$mr'");
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
		$conn1 = dbcon1();
		if(!empty($mr))
		{
			$marital_status=mysql_query($conn1,"select * from biodata_temp where `pf_number`='$mr'");
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
		$conn = dbcon();
		if(!empty($mr))
		{
			$sql=mysql_query($conn,"select * from billunit where billunit='$mr'");
			$f=mysql_fetch_array($sql);
			$ans=$f['id'];
			return $ans;
		}else
		{
			return $ans;
		}
	}
	
	function get_fam_name($id)
	{
		$conn1 = dbcon1();
		if (!empty($id))
		{
			$sql=mysql_query($conn1,"select * from family_temp where id='$id'")or die(mysql_error());
			//echo "select * from nominee_temp where id='$id'";
			$res=mysql_fetch_array($sql);
			$nom_name=$res['fmy_member'];
			return $nom_name;
		}
		return $id;
	} 	
	
	function get_retirement_type($id)
	{
		$conn = dbcon();
		if (!empty($id))
		{
			$sql=mysql_query($conn,"select * from retirement_type where id='$id'")or die(mysql_error());
			$res=mysql_fetch_array($sql);
			$nom_name=$res['retirement_type'];
			return $nom_name;
		}
		return $id;
	}
	
	function get_pf_designation($pf)
	{
		$conn1 = dbcon1();
		$sql=mysql_query($conn1,"select preapp_designation from present_work_temp where preapp_pf_number='$pf'");
		$res=mysql_fetch_array($sql);
		return get_designation($res['preapp_designation']);
	}

	function get_pf_aadhar($pf)
	{
		$conn1 = dbcon1();
		$sql=mysql_query($conn1,"select aadhar_number from biodata_temp where pf_number='$pf_no'");
		$res=mysql_fetch_array($sql);
		return $res['aadhar_number'];
	}

	function get_pf_department($pf)
	{
		$conn1 = dbcon1();
		$sql=mysql_query($conn1,"select preapp_department from present_work_temp where preapp_pf_number='$pf'");
		$res=mysql_fetch_array($sql);
		return $res['preapp_department'];
	}

	function get_pf_billunit($billunit)
	{
		$conn1 = dbcon1();
		$sql=mysql_query($conn1,"select preapp_billunit from present_work_temp where preapp_pf_number='$billunit'");
		echo "select preapp_billunit from present_work_temp where preapp_pf_no='$billunit'".mysql_error();
		$res=mysql_fetch_array($sql);
		return $sql;
	}


?>