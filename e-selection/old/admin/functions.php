<?php
include_once('../dbconfig/dbcon.php');




/*Umesh Code Start Here*/

function fetchdepartment($id) 
	{
		dbcon();
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `department` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query))
			{
				$data['zone']=get_user_zone($res['zone']);
				$data['dept']=$res['dept'];
			}	
			
		}
	return json_encode($data);
	}

	
	
	
	
function get_dept_update($id)
{
	$fetch="";
	$sql=mysql_query("select * from department where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['dept'];
		//$fetch =$query['dept'];
	}
	// $sql1=mysql_query("select * from department where id<>'".$id."'");
	
	// while($query1=mysql_fetch_array($sql1))
	// {
		// $fetch .="<option value='".$query1['id']."'>".$query1['dept']."</option>";
		//$fetch .=$query1['dept'];
	// }
	return $fetch;
}
	
	
	
	function fetchpostschedule($id) 
	{
	//echo "<script>alert('$data')</script>";	
		dbcon();
	
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `post_schedule` WHERE `id` = '".$id."'";
			//echo "SELECT * FROM `post_schedule` WHERE `id` = '".$id."'".mysql_error();
			
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			if($sql)
			{
			while($res=mysql_fetch_array($query))
			{
				$data['dept']=get_dept_value($res['dept']);
				$data['category']=get_cat_value($res['category']);
			    $data['level_of_pay']=get_level_value($res['level_of_pay']);
				$data['mode_of_filling']=get_mod_fill_value($res['mode_of_filling']);
				$data['ss']=$res['ss'];
				$data['mor']=$res['mor'];
				$data['vac']=$res['vac'];
				$data['vac_in_hg']=$res['vac_in_hg'];
				$data['utrg']=$res['utrg'];
				$data['netvac']=$res['netvac'];
				
				$check1=$res['date_of_ass'];
				if($check1!='0000-00-00')
				{
				$data['date_of_ass']=date('d-m-Y',strtotime($res['date_of_ass']));
				}
				else
				{
					$data['date_of_ass']='-';
				}
				$check2=$res['completed_ass_date'];
				if($check2!='0000-00-00')
				{
				$data['completed_ass_date']=date('d-m-Y',strtotime($res['completed_ass_date']));
				}
				else
				{
					$data['completed_ass_date']='-';
				}
				$check3=$res['date_of_noti'];
				if($check3!='0000-00-00')
				{
				
				$data['date_of_noti']=date('d-m-Y',strtotime($res['date_of_noti']));
				}else
				{
					$data['date_of_noti']='-';
				}
				$check4=$res['completed_date_of_noti'];
				if($check4!='0000-00-00')
				{									
				 $data['completed_date_of_noti']=date('d-m-Y',strtotime($res['completed_date_of_noti']));
				}else
				{
					 $data['completed_date_of_noti']='-';
				}
				$check5=$res['date_of_exam'];
				if($check5!='0000-00-00')
				{	
				$data['date_of_exam']=date('d-m-Y',strtotime($res['date_of_exam']));
				}
				else
				{
						$data['date_of_exam']='-';
				}
				$check6=$res['completed_date_exam'];
				if($check6!='0000-00-00')
				{	
				$data['completed_date_exam']=date('d-m-Y',strtotime($res['completed_date_exam']));
				}
				else
				{
				$data['completed_date_exam']='-';
				}
				$check7=$res['date_of_panel'];
				if($check7!='0000-00-00')
				{	

				$data['date_of_panel']=date('d-m-Y',strtotime($res['date_of_panel']));
				}
				else
				{
					$data['date_of_panel']='-';
				}
				$check8=$res['completed_date_panel'];
				if($check8!='0000-00-00')
				{	

				$data['completed_date_panel']=date('d-m-Y',strtotime($res['completed_date_panel']));
				}
				else
				{
				  $data['completed_date_panel']='-';
				}				  
				$data['action_plan']=$res['action_plan'];
			}
				
			
			}
			else
	echo "<script>'alert($data)'</script>";			
			
		}
	return json_encode($data);
	}
	
function fetchpostschedule1($id) 
	{
		dbcon();
	
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `post_schedule` WHERE `id` = '".$id."'";
			$query = mysql_query($sql);
			echo mysql_error();
			if(mysql_affected_rows() > 0)
			{
				while($res=mysql_fetch_array($query))
				{
					$data['dept']=get_dept_value($res['dept']);
					$data['category']=get_cat_value($res['category']);
					$data['level_of_pay']=get_level_value($res['level_of_pay']);
					$data['mode_of_filling']=get_mod_fill_value($res['mode_of_filling']);
					$data['ss']=$res['ss'];
					$data['mor']=$res['mor'];
					$data['vac']=$res['vac'];
					$data['vac_in_hg']=$res['vac_in_hg'];
					$data['utrg']=$res['utrg'];
					$data['netvac']=$res['netvac'];
					$data['date_of_ass']=$res['date_of_ass'];
					$data['completed_ass_date']=$res['completed_ass_date'];
					$data['date_of_noti']=$res['date_of_noti'];
					$data['completed_date_of_noti']=$res['completed_date_of_noti'];
					$data['date_of_exam']=$res['date_of_exam'];
					$data['completed_date_exam']=$res['completed_date_exam'];
					$data['date_of_panel']=$res['date_of_panel'];
					$data['completed_date_panel']=$res['completed_date_panel'];
					$data['action_plan']=$res['action_plan'];
				}
			}
			
			return json_encode($data);
		}
	}
	
	function fetchpostschedule_update($id) 
	{
		dbcon();
	
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `post_schedule` WHERE `id` = '".$id."' AND updated_by='Admin'";
	        $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			if($sql)
			{
			while($res=mysql_fetch_array($query))
			{
				$data['dept']=get_dept($res['dept']);
				$data['category']=get_cat($res['category']);
				$data['level_of_pay']=get_level($res['level_of_pay']);
				$data['mode_of_filling']=get_mod_fill($res['mode_of_filling']);
				$data['ss']=$res['ss'];
				$data['mor']=$res['mor'];
				$data['vac']=$res['vac'];
				$data['vac_in_hg']=$res['vac_in_hg'];
				$data['utrg']=$res['utrg'];
				$data['netvac']=$res['netvac'];
				$data['date_of_ass']=$res['date_of_ass'];
				$data['completed_ass_date']=$res['completed_ass_date'];
				$data['date_of_noti']=$res['date_of_noti'];
				$data['completed_date_of_noti']=$res['completed_date_of_noti'];
				$data['date_of_exam']=$res['date_of_exam'];
				$data['completed_date_exam']=$res['completed_date_exam'];
				$data['date_of_panel']=$res['date_of_panel'];
				$data['completed_date_panel']=$res['completed_date_panel'];
				$data['action_plan']=$res['action_plan'];
			}
			
			}
			else
	echo "<script>'alert($data)'</script>";			
			
		}
	return json_encode($data);
	}
	
	
	
	function update_postschedule($hide_field,$post_dept,$post_category,$post_level,$post_fill,$post_ss,$post_mor,$post_vac,$post_vacinhg,$post_trg,$post_netvac,$post_dateass,$post_dateass2,$post_datenot,$post_datenot2,$noti_ref,$post_exam,$post_dateexam,$post_dateofpanel,$post_dateofpanel2,$panel_ref,$post_plan)
     {
	 $query = mysql_query("update post_schedule set dept='$post_dept',category='$post_category',level_of_pay='$post_level',mode_of_filling='$post_fill',ss='$post_ss',mor='$post_mor',vac='$post_vac',vac_in_hg='$post_vacinhg',utrg='$post_trg',netvac='$post_netvac',date_of_ass='$post_dateass',completed_ass_date='$post_dateass2',date_of_noti='$post_datenot',completed_date_of_noti='$post_datenot2',notification_ref='$noti_ref',date_of_exam='$post_exam',completed_date_exam='$post_dateexam',date_of_panel='$post_dateofpanel',completed_date_panel='$post_dateofpanel2',panel_ref='$panel_ref',action_plan='$post_plan' where id='$hide_field'");
	  
	  
	 
	  // echo "update post_schedule set dept='$post_dept',category='$post_category',grade_pay='$post_gradepay',mode_of_filling='$post_fill',ss='$post_ss',mor='$post_mor',vac='$post_vac',vac_in_hg='$post_vacinhg',utrg='$post_trg',netvac='$post_netvac',date_of_ass='$post_dateass',date_of_noti='$post_datenot',date_of_exam='$post_dateexam',date_of_panel='$post_datepanel',action_plan='$post_plan' where id='$hide_field'".mysql_error();
	  
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	 
	 
	 
	

	  function update_department($hide_field,$update_dept,$update_dept2)
     {
	 $query = mysql_query("update department set zone ='$update_dept',dept='$update_dept2' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	
	function update_designation($hide_field,$update_desg,$update_dept)
     {
	 $query = mysql_query("update category set categary='$update_desg',dept='$update_dept' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	 
	 
	 
	 function update_mode_of_fill($hide_field,$update_modefill)
	 {
		  $query = mysql_query("update mode_of_fill set mode_of_fill ='$update_modefill' where id='$hide_field'");
		  
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
	 }
	 
	 
	 
	 function delete_user($delete_id)
	{
		$query = mysql_query("update users set status='0' where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	 
	 
	 
	 
	 function delete_modeoffill($delete_id)
	 {
		 $query = mysql_query("delete from mode_of_fill where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
	 }
	 
	 
	 
	 
	 
	
	function delete_designation($delete_id)
	{
		$query = mysql_query("delete from category where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	
	
	function delete_postschedule($delete_id)
	{
		$query = mysql_query("delete from post_schedule where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	
	
	
	
	
	function delete_department($delete_id)
	{
		$query = mysql_query("delete from department where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	
	
 
 function fetchmodefill($id) 
	{
		dbcon();
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `mode_of_fill` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query))
			{
				$data['mode_of_fill']=$res['mode_of_fill'];
				
			}	
			
		}
	return json_encode($data);
	}
    
 
 
 
 
	
	function fetchdesignation($id) 
	{
		dbcon();
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `category_new` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query))
			{
				
				$data['categary']=($res['categary']);
				$data['dept']=get_deptumesh($res['dept']);
			}	
			
		}
	return json_encode($data);
	}
	
	
	function get_grade_pay_value($id)
{
	$sql=mysql_query("select * from grade_pay where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['grade_pay'];
	
	}
	return $fetch;
}
	
	
	function get_dept_value($id)
{
	$fetch="";
	$sql=mysql_query("select * from department where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['dept'];
	
	}
	return $fetch;
}

function get_desg_value($id)
{
	$fetch="";
	$sql=mysql_query("select * from designation where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['desg'];
	
	}
	return $fetch;
}
function get_cat_value($id)
{
	$sql=mysql_query("select * from category_new where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['categary'];
	
		
	}
	return $fetch;
}
function get_mod_fill_value($id)
{
	$sql=mysql_query("select * from mode_of_fill where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['mode_of_fill'];
	

	}
	return $fetch;
}
function get_level_value($id)
{
	$sql=mysql_query("select * from seventh where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['level'];
	

	}
	return $fetch;
}



function get_level($id)
{
	$fetch="";
	$sql=mysql_query("select * from seventh where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch .="<option value='".$query['id']."'>".$query['level']."</option>";

	}
	 $sql1=mysql_query("select * from seventh where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['level']."</option>";
		$fetch .=$query1['level'];
	 }
	return $fetch;
}



	
	function get_dept($id)
{
	$fetch="";
	$sql=mysql_query("select * from department where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch .="<option value='".$query['id']."'>".$query['dept']."</option>";

	}
	 $sql1=mysql_query("select * from department where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['dept']."</option>";
		$fetch .=$query1['dept'];
	 }
	return $fetch;
}


	function get_desi($id)
{
	$fetch="";
	$sql=mysql_query("select * from designation where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		 $fetch .="<option value='".$query['id']."'>".$query['desg']."</option>";
	}
	 $sql1=mysql_query("select * from designation where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['desg']."</option>";
		$fetch .=$query1['desg'];
	 }
	return $fetch;
}



function get_mod_fill($id)
{
	$sql=mysql_query("select * from mode_of_fill where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
	$fetch .="<option value='".$query['id']."'>".$query['mode_of_fill']."</option>";

	}
	$sql1=mysql_query("select * from mode_of_fill where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['mode_of_fill']."</option>";
		$fetch .=$query1['mode_of_fill'];
	 }
	return $fetch;
}


function get_cat($id)
{
	$sql=mysql_query("select * from category_new where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
			 $fetch .="<option value='".$query['id']."'>".$query['categary']."</option>";

	}
	$sql1=mysql_query("select * from category_new where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['categary']."</option>";
		$fetch .=$query1['categary'];
	 }
	return $fetch;
}


function get_grade_pay($id)
{
	$sql=mysql_query("select * from grade_pay where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		 $fetch .="<option value='".$query['id']."'>".$query['grade_pay']."</option>";
			
	}
	$sql1=mysql_query("select * from grade_pay where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['grade_pay']."</option>";
		$fetch .=$query1['grade_pay'];
	 }
	return $fetch;
}
	function fetchuser($id)
	{
	   dbcon();
	
		$data=[];
		if (!empty($id)) 
		{
			
			$sql = "SELECT * FROM `users` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			if($sql)
			{
			while($res=mysql_fetch_array($query))
			{
				$data['zone']=get_user_zone($res['zone']);
				$data['division']=get_user_division($res['division']);
				$data['pf_no']=$res['pf_no'];
				$data['emp_name']=$res['emp_name'];
				$data['dept']=get_dept($res['dept']);
				$data['desg']=get_desi($res['desg']);
				$data['mob_no']=$res['mob_no'];
				$data['user_email']=$res['user_email'];
			}
			}
			else
			{
	echo "<script>'alert($data)'</script>";	
			}
			}
	return json_encode($data);	
	}
	
	
	
	
	
	function get_user_zone($id)
{
	$fetch="";
	$sql=mysql_query("select * from zone where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch .="<option value='".$query['id']."'>".$query['zone']."</option>";

	}
	 $sql1=mysql_query("select * from zone where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['zone']."</option>";
		$fetch .=$query1['zone'];
	 }
	return $fetch;
}
	
	function get_user_division($id)
{
	$fetch="";
	$sql=mysql_query("select * from division where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch .="<option value='".$query['id']."'>".$query['division']."</option>";

	}
	 $sql1=mysql_query("select * from division where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['division']."</option>";
		$fetch .=$query1['division'];
	 }
	return $fetch;
}
	
	
	
	
		function get_deptumesh($id)
{
	$fetch="";
	$sql=mysql_query("select * from department where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		$fetch .="<option value='".$query['id']."'>".$query['dept']."</option>";

	}
	 $sql1=mysql_query("select * from department where id<>'".$id."'");
	
	 while($query1=mysql_fetch_array($sql1))
	{
		 $fetch .="<option value='".$query1['id']."'>".$query1['dept']."</option>";
		$fetch .=$query1['dept'];
	 }
	return $fetch;
}
	function checkpassword($pass,$user)
	{
		$query =  mysql_query("select * from login_table where password='$pass' AND id='$user'");
		$count = mysql_num_rows($query);
		if($count>0)		
			
			return true;
		else
			return false;
	}
	
	
?>