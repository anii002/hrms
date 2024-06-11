<?php
include_once('../dbconfig/dbcon.php');

function get_dept($id)
	{
		dbcon();
		if (!empty($id))
		{
			$sql = "SELECT * FROM `department` WHERE `id` = '".$id."'";
			$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
			while($res=mysql_fetch_array($query)){
				return $res['dept'];
			}
		}	
	return $id;
	}
	
function get_mod_fill($id)
{
	$sql=mysql_query("select mode_of_filling from excel_table where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['mode_of_filling'];
	}
	return $fetch;
}


function get_cat($id)
{
	$sql=mysql_query("select categary from category where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['categary'];
	}
	return $fetch;
}
	
?>