<?php
include_once('../dbconfig/dbcon.php');


function get_words($pf_count){
	if($pf_count == 0){
		//$pf_count = 2;
	}else{
		//$pf_count = $pf_count + 2;
	}
	$data = '';
	switch ($pf_count) {
		case '0':
			$data = "Zero";
		break;

		case '1':
			$data = "First";
			break;

		case '2':
			$data = "Second";
			break;

		case '3':
			$data = "Third";
			break;
		case '4':
			$data = "Fourth";
			break;
		case '5':
			$data = "Fifth";
			break;
		case '6':
			$data = "Sixth";
			break;
		case '6':
			$data = "Sixth";
			break;
		case '7':
			$data = "Seventh";
			break;
		case '8':
			$data = "Eighth";
			break;
		case '9':
			$data = "Ninth";
			break;
		case '10':
			$data = "Tenth";
			break;
		default:
			$data = $pf_count;
			break;
	}
	return $data;
}


/*Umesh Code Start Here*/


 function fetchaward($id)
 {
	 $query=mysql_query("select * from awards where id='$id'") or die(mysql_error());
	 $data= [];
	  while($resultset = mysql_fetch_array($query))
	  {
		  $data['awards']= $resultset['awards'];
		  
	  }
	  return json_encode($data);
 }
 
 
 function fetchproperty($id)
 {
	 $query=mysql_query("select * from property_source where id='$id'") or die(mysql_error());
	 $data= [];
	  while($resultset = mysql_fetch_array($query))
	  {
		  $data['property_source']= $resultset['property_source'];
		  
	  }
	  return json_encode($data);
 }
 
 
 
 function fetchrecruitment($id)
 {
	 $query=mysql_query("select * from recruitment_code where id='$id'") or die(mysql_error());
	 $data= [];
	  while($resultset = mysql_fetch_array($query))
	  {
		  $data['recruitment_code']= $resultset['recruitment_code'];
		  
	  }
	  return json_encode($data);
 }
 
 
 
 
 function update_recruitment($hide_field,$update_recruitment)
     {
	 $query = mysql_query("update recruitment_code set recruitment_code.recruitment_code ='$update_recruitment' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
 
 
 
 function delete_recruitment($delete_id)
	{
		$query = mysql_query("delete from recruitment_code where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	
 
 function update_property($hide_field,$update_property)
     {
	 $query = mysql_query("update property_source set property_source.property_source ='$update_property' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	 
 function delete_property($delete_id)
	{
		$query = mysql_query("delete from property_source where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	} 
	 
	 
 function update_award($hide_field,$update_award)
     {
	 $query = mysql_query("update awards set awards.awards ='$update_award' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	 
	 
 function update_penalty($hide_field,$update_penalty)
     {
	 $query = mysql_query("update penalty_effected set penalty_effected.penalty_effected ='$update_penalty' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
	
 
 function delete_penalty_effect($delete_id)
	{
		$query = mysql_query("delete from penalty_effected where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}	 

 function delete_award($delete_id)
	{
		$query = mysql_query("delete from awards where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}
 function fetchpenalty($id)
 {
	 $query=mysql_query("select * from penalty_effected where id='$id'") or die(mysql_error());
	 $data= [];
	  while($resultset = mysql_fetch_array($query))
	  {
		  $data['penalty_effected']= $resultset['penalty_effected'];
		  
	  }
	  return json_encode($data);
 }


 function fetchreligion($id)
 {
	 $query=mysql_query("select * from religion where id='$id'") or die(mysql_error());
	 $data= [];
	  while($resultset = mysql_fetch_array($query))
	  {
		  $data['shortdesc']= $resultset['shortdesc'];
		  $data['longdesc']=$resultset['longdesc'];
	  }
	  return json_encode($data);
 }

 
    function fetchcommunity($id)
     {
	   $query=mysql_query("select * from community where id='$id'") or die(mysql_error());
	   $data= [];
	    while($resultset = mysql_fetch_array($query))
	     {
		   $data['SHORTDESC']=$resultset['SHORTDESC'];
		   $data['LONGDESC']=$resultset['LONGDESC'];
	     }
	       return json_encode($data);
     }


	 
	function update_community($hide_field,$update_community,$update_short)
     {
	 $query = mysql_query("update community set SHORTDESC ='$update_community', LONGDESC='$update_short' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
 
	
	function delete_community($delete_id)
	{
		$query = mysql_query("delete from community where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}
	
	
	
    function update_religion($hide_field,$update_religion,$update_short)
     {
	 $query = mysql_query("update religion set shortdesc='$update_religion', longdesc='$update_short' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
 
 
    function delete_religion($delete_id)
	{
		$query = mysql_query("delete from religion where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}
 
       /* Umesh Code End Here*/



/*Yogesh Code starts Here*/

	function fetchincrement($id)
	 {
		 $query=mysql_query("select * from increment_type where id='$id'") or die(mysql_error());
		 $data= [];
		  while($resultset = mysql_fetch_array($query))
		  {
			  $data['increment_type']= $resultset['increment_type'];
		  }
	 	 return json_encode($data);
	 }

	function fetchpenalty_awarded($id)
 	{
		 $query=mysql_query("select * from penalty_awarded where id='$id'") or die(mysql_error());
		 $data= [];
		  while($resultset = mysql_fetch_array($query))
	  	{	
			  $data['penalty_awarded']= $resultset['penalty_awarded'];
	  	}
	  	return json_encode($data);
 	}
 

	 function fetchinmovableitem($id)
 	{
	 	$query=mysql_query("select * from property_item_inmovable where id='$id'") or die(mysql_error());
	 	$data= [];
	  	while($resultset = mysql_fetch_array($query))
	  	{
		  	$data['property_item_inmovable']= $resultset['property_item_inmovable'];
	  	}
	  	return json_encode($data);
 	}
 
 	 function fetchmovableitem($id)
 	{
	 	$query=mysql_query("select * from property_item_movable where id='$id'") or die(mysql_error());
	 	$data= [];
	  	while($resultset = mysql_fetch_array($query))
	  	{
		  	$data['property_item_movable']= $resultset['property_item_movable'];
	  	}
	  	return json_encode($data);
 	}
 
  function delete_increment($delete_id)
	{
		$query = mysql_query("delete from increment_type where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}

	function delete_penalty($delete_id)
	{
		$query = mysql_query("delete from penalty_awarded where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}



	function delete_inmovable_item($delete_id)
	{
		$query = mysql_query("delete from property_item_inmovable where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}


	function delete_movable_item($delete_id)
	{
		$query = mysql_query("delete from property_item_movable where id='$delete_id'");
		if($query)
			return true;
		else{ 
			return false;
		}
		
	}

    function update_increment($hide_field,$update_increment)
     {
	 $query = mysql_query("update increment_type set increment_type='$update_increment' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }

     function update_penalty_awarded($hide_field,$update_penalty)
     {
	 $query = mysql_query("update penalty_awarded set penalty_awarded='$update_penalty' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }


      function update_inmovable_item($hide_field,$update_inmovable_item)
     {
	 $query = mysql_query("update property_item_inmovable set property_item_inmovable='$update_inmovable_item' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }


      function update_movable_item($hide_field,$update_movable_item)
     {
	 $query = mysql_query("update property_item_movable set property_item_movable='$update_movable_item' where id='$hide_field'");
	 if($query)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
	 }
     }
     
?>