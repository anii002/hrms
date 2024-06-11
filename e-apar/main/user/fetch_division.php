<?php

	include('../dbconfig/dbcon.php');
	dbcon(); 
	
$country_id = ($_REQUEST["cmbdept"] <> "") ? trim($_REQUEST["cmbdept"]) : "";
if ($country_id <> "")
 {
 
	$country_id=$_POST["cmbdept"];
		//echo $country_id;
        ?>
		
		<div class="row">
			<label class="col-md-4">&nbsp;&nbsp;&nbsp;User Type :</label>
					<div class="col-md-8">
					<div class="input-group">
					<div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
						 <select name="cmbusertype" id="cmbusertype" onchange=""  class="form-control primary" style="width: 320px;" required >
						<option value="" selected disabled hidden>--Please Select Division--</option>
						<?php 
						 $sqlDept=mysql_query("select * from tbl_department where deptname='$country_id'");
						 $rwDept=mysql_fetch_array($sqlDept);
						 
						 $dept=$rwDept["dept_id"];
						 $dname=$rwDept["deptname"];
						 echo "$dept";
						 
					$sql2=mysql_query("SELECT * FROM tbl_usertype WHERE deptid ='$dept'");
					while($rwClassid=mysql_fetch_array($sql2,MYSQL_ASSOC))
						{
						?>
							<option value="<?php echo $rwClassid["usertype"]; ?>"><?php echo $rwClassid["usertype"]; ?></option>
					<?php } ?>
					</select>
					</div><br>
					</div>
		</div>
					
					
					
     
        <?php
    }
?>