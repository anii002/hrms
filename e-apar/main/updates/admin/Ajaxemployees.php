<?php
 
		include('../dbconfig/dbcon.php');
		dbcon();
		
	$Flag=$_POST["Flag"];

	if($Flag=="Save")
	{
		
		$staffrole=$_POST["staffrole"];
		$staffjoiningdate=$_POST["txtstaffjoiningdate"];
		$stafffullname=$_POST["txtstafffullname"];
		$staffgender= $_POST["cmbstaffgender"];
		$staffcontactno=$_POST["txtstaffcontactno"];
		$stafflandlline=$_POST["txtstafflandlineno"];
		$stafffemailid=$_POST["txtstaffemailid"];
		$atpost=$_POST["txtatpost"];
		$taluka=$_POST["txttaluka"];
		$district=$_POST["txtdistrict"];
		$staffaddress2=$_POST["txtstaffaddress2"];
		$remark=$_POST["txtremark"];
		$status=$_POST["sltstatus"];
		$aadharcardno=$_POST["txtaadharcardno"];
		$pancardnumber=$_POST["txtstaffpancardno"];
		$staffaccholername=$_POST["txtstaffaccholername"];
		$accountnumber=$_POST["txtstaffaccountno"];
		$bankname=$_POST["txtstaffbankname"];
		$bankbranch=$_POST["txtstaffbankbranch"];
		$ifsccode=$_POST["txtifsccode"];
		
		$staffusername=$_POST["txtstaffusername"];
		$staffpassword=$_POST["txtstaffpassword"];
		$sessionperson=$_POST["txtsessionperson"];
		
		  $fllogo=$_FILES['fllogo']['name'];
		  $size=$_FILES['fllogo']['size'];
		  $type=$_FILES['fllogo']['type'];
		  $temp=$_FILES['fllogo']['tmp_name'];
		  
		  move_uploaded_file($temp,"resources/staff/".$fllogo);
		
		
		$query = mysql_query("select * from tbl_staff where STAFF_emailid = '$stafffemailid' ")or die(mysql_error());
		$count = mysql_num_rows($query);

		if ($count > 0)
		{ 
			echo "error";

		}else
		{
			mysql_query("insert into tbl_staff (STAFF_role,STAFF_image,STAFF_joiningdate,STAFF_fullname,STAFF_contactno,STAFF_landlineno,STAFF_emailid,STAFF_gender,STAFF_atpost,STAFF_taluka,STAFF_district,STAFF_address2,STAFF_aadharcard,STAFF_pancard,STAFF_acholdername,STAFF_bankname,STAFF_accountnumber,STAFF_ifsccode,STAFF_username,STAFF_password,STAFF_status,STAFF_createdby,STAFF_createddate) values('$staffrole','$fllogo','$staffjoiningdate','$stafffullname','$staffcontactno','$stafflandlline','$stafffemailid','$staffgender','$atpost','$taluka','$district','$staffaddress2','$aadharcardno','$pancardnumber','$staffaccholername','$bankname','$accountnumber','$ifsccode','$staffusername','$staffpassword','$status','$sessionperson',NOW())");
			
			echo "insert";
		} 
		echo "insert";
	}elseif($Flag=="Update")
	{
		$staffid=$_POST["txtstaffid"];
		$staffrole=$_POST["staffrole"];
		$staffjoiningdate=$_POST["txtstaffjoiningdate"];
		$stafffullname=$_POST["txtstafffullname"];
		$staffcontactno=$_POST["txtstaffcontactno"];
		$stafflandlline=$_POST["txtstafflandlineno"];
		$stafffemailid=$_POST["txtstaffemailid"];
		$staffgender= $_POST["cmbstaffgender"];
		$staffaddress1=$_POST["txtstaffaddress1"];
		$staffaddress2=$_POST["txtstaffaddress2"];
		$remark=$_POST["txtremark"];
		$status=$_POST["sltstatus"];
		$pancardnumber=$_POST["txtstaffpancardno"];
		$accountnumber=$_POST["txtstaffaccountno"];
		$bankname=$_POST["txtstaffbankname"];
		$bankbranch=$_POST["txtstaffbankbranch"];
		$sessionperson=$_POST["txtsessionperson"];
		
		  $fllogo=$_FILES['fllogo']['name'];
		  $size=$_FILES['fllogo']['size'];
		  $type=$_FILES['fllogo']['type'];
		  $temp=$_FILES['fllogo']['tmp_name'];
		  
		  move_uploaded_file($temp,"resources/staff/".$fllogo);
	
		
		$query_bankdetails = mysql_query("select * from tbl_staffbankdetails where STFBNK_staffid='$staffid'");
		$count_bankdetails = mysql_num_rows($query_bankdetails);

		if ($count_bankdetails > 0)
		{ 
			mysql_query("update tbl_staff set STAFF_joiningdate='$staffjoiningdate',STAFF_fullname='$stafffullname',STAFF_address1='$staffaddress1',STAFF_address2='$staffaddress2',STAFF_contactno='$staffcontactno',STAFF_landlineno='$stafflandlline',STAFF_emailid='$stafffemailid',STAFF_gender='$staffgender',STAFF_remark='$remark',STAFF_status='$status',STAFF_image='$fllogo',STAFF_modifiedby='$sessionperson',STAFF_modifieddate=NOW() where STAFF_id='$staffid'");
			
			mysql_query("update tbl_staffbankdetails set STFBNK_bankname='$bankname',STFBNK_acc_no='$accountnumber',STFBNK_IFSCcode='$pancardnumber',STFBNK_branch='$bankbranch',STFBNK_modifiedby='$sessionperson',STFBNK_modifieddate=NOW() where STFBNK_staffid='$staffid'");
			
			echo "Successfully Record Updated";

		}else{
		
			mysql_query("insert into tbl_staffbankdetails (STFBNK_staffid,STFBNK_bankname,STFBNK_acc_no,STFBNK_IFSCcode,STFBNK_branch,STFBNK_createdby,STFBNK_createddate) values('$staffid','$bankname','$accountnumber','$pancardnumber','$bankbranch','$sessionperson',NOW())");
			
			mysql_query("update tbl_staff set STAFF_joiningdate='$staffjoiningdate',STAFF_fullname='$stafffullname',STAFF_address1='$staffaddress1',STAFF_address2='$staffaddress2',STAFF_contactno='$staffcontactno',STAFF_landlineno='$stafflandlline',STAFF_emailid='$stafffemailid',STAFF_gender='$staffgender',STAFF_remark='$remark',STAFF_image='$fllogo',STAFF_modifiedby='$sessionperson',STAFF_modifieddate=NOW() where STAFF_id='$staffid'");
				
				echo "Successfully Record Inserted";

			}
	}else if($Flag=="Delete")
	{
		$EMPholderid=$_POST["EMPholderid"];
		if(mysql_query("delete from tbl_staff where STAFF_id= $EMPholderid"))
		{
		
			echo "Successfully Record Deleted";
		}
		else
		{
			echo "delete from tbl_staff where STAFF_id=$EMPholderid";
		}
	}else if($Flag=="ShowRecords")
	{
		$rstEmployee=mysql_query("select * from tbl_staff order by STAFF_id ASC");
		echo "<table class='table table-striped table-bordered table-hover'>
				<thead>
					<tr class='odd gradeX'>
						<th><i class='fa fa-fa'></i> Sr.</th>
						<th><i class='fa fa-gallary'></i> Image/Photo</th>
						<th><i class='fa fa-user'></i>  Staff Full Name </th>
						<th style='display:none;><i class='fa fa-user'></i>  Staff role </th>
						<th><i class='fa fa-font'></i> Role</th>
						<th style='display:none;'><i class='fa fa-user'></i> Staff Work Under</th>
						<th><i class='fa fa-calendar'></i> Joining Date</th>
						<th><i class='fa fa-mobile'></i> Mobile No.</th>
						<th><i class='fa fa-phone'></i> Landline No.</th>
						<th style='background:yellow;><i class='fa fa-fa'></i> Staff ID/User Name</th>
						<th style='background:yellow;><i class='fa fa-font'></i> Password</th>
						<th><i class='fa fa-envelope'></i> Email ID.</th>
						<th><i class='fa fa-map'></i> Full Address</th>
						<th><i class='fa fa-calendar'></i> Status</th>
						<th style='display:none;'><i class='fa fa-calendar'></i> Address2 </th>
						<th style='display:none;'><i class='fa fa-calendar'></i> Gender</th>
						<th style='display:none;'><i class='fa fa-calendar'></i> Ac No</th>
						<th style='display:none;'><i class='fa fa-calendar'></i> Pancard</th>
						<th style='display:none;'><i class='fa fa-calendar'></i> bank</th>
						<th style='display:none;'><i class='fa fa-calendar'></i> branch</th>
						
						<th><i class='fa fa-calendar'></i> Created By</th>
						<th><i class='fa fa-calendar'></i> Modified By</th>
						<th><i class='fa fa-cog'></i> Actions</th>
					</tr>
				</thead>";

		while($rwSTAFF=mysql_fetch_array($rstEmployee,MYSQL_ASSOC))
		{	
			$STAFFid=$rwSTAFF["STAFF_id"];
			$STAFFusername=$rwSTAFF["STAFF_username"];
			$STAFFrole=$rwSTAFF["STAFF_role"];
			$STAFFworksunder=$rwSTAFF["STAFF_worksunder"];
			$STAFFimage=$rwSTAFF["STAFF_image"];
			$STAFFjoiningdate=$rwSTAFF["STAFF_joiningdate"];
			$STAFFfullname=$rwSTAFF["STAFF_fullname"];
			$STAFFcontactno=$rwSTAFF["STAFF_contactno"];
			$STAFFgender=$rwSTAFF["STAFF_gender"];
			$STAFFlandlineno=$rwSTAFF["STAFF_landlineno"];
			$STAFFemailid=$rwSTAFF["STAFF_emailid"];
			$STAFFatpost=$rwSTAFF["STAFF_atpost"];
			$STAFFtaluka=$rwSTAFF["STAFF_taluka"];
			$STAFFdistrict=$rwSTAFF["STAFF_district"];
			$STAFFaddress1=$rwSTAFF["STAFF_address1"];
			$STAFFaddress2=$rwSTAFF["STAFF_address2"];
			$STAFFcreatedby=$rwSTAFF["STAFF_createdby"];
			$STAFFcreateddate=date("Y-m-d | h:i:m",strtotime($rwSTAFF["STAFF_createddate"]));		
			$STAFFmodifiedby=$rwSTAFF["STAFF_modifiedby"];
			$STAFFmodifieddate=date("d-m-Y | h:i:m",strtotime($rwSTAFF["STAFF_modifieddate"]));	
			$STAFFstatus=$rwSTAFF["STAFF_status"];
			$STAFFpassword=$rwSTAFF["STAFF_password"];
		

			$rststaff=mysql_query("select * from tbl_staff_category where STFCAT_name='$STAFFrole'");
			$rwstaffcat=mysql_fetch_array($rststaff,MYSQL_ASSOC);
				$STFCAT_id=$rwstaffcat["STFCAT_id"];
				$STFCAT_name=$rwstaffcat["STFCAT_name"];
			
			$rstEmployeeDetails=mysql_query("select * from tbl_staffbankdetails where STFBNK_staffid='$STAFFid'");
			$rwStaffdetails=mysql_fetch_array($rstEmployeeDetails,MYSQL_ASSOC);
				$STFBNKstaffid=$rwStaffdetails["STFBNK_staffid"];
				$STFBNKacc_no=$rwStaffdetails["STFBNK_acc_no"];
				$STFBNKIFSCcode=$rwStaffdetails["STFBNK_IFSCcode"];
				$STFBNKbankname=$rwStaffdetails["STFBNK_bankname"];
				$STFBNKbranch=$rwStaffdetails["STFBNK_branch"];
			
			echo "<tr class='headings'>	
					<td id='tdSTAFFid$STAFFid'>$STAFFid</td>";
					if(empty($STAFFimage) and $STAFFgender=='Female')
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/avatar3.png'></td>";
					}elseif(empty($STAFFimage) and $STAFFgender=='Male')
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/avatar5.png'></td>";
					}else
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/$STAFFimage'></td>";
					}

					echo"<td id='tdSTAFFfullname$STAFFid'>$STAFFfullname</td>
					<td id='tdSTFCAT_id$STAFFid'>$STFCAT_name</td>
					<td style='display:none;' id='tdSTAFFworksunder$STAFFid'>$STAFFworksunder</td>
					<td id='tdSTAFFjoiningdate$STAFFid'>$STAFFjoiningdate</td>
					<td id='tdSTAFFcontactno$STAFFid'>$STAFFcontactno</td>
					<td id='tdSTAFFlandlineno$STAFFid'>$STAFFlandlineno</td>			
					<td style='background:orange; id='tdSTAFFusername$STAFFid'>$STAFFusername</td>
					<td style='background:orange; id='tdSTAFFpassword$STAFFid'>$STAFFpassword</td>
					<td id='tdSTAFFemailid$STAFFid'>$STAFFemailid</td>
					<td id='tdSTAFFatpost$STAFFid'>$STAFFatpost, $STAFFtaluka, $STAFFdistrict</td>";
					if($STAFFstatus==1)	
					{
						echo "<td><button class='btn btn-xs btn-success'>Active</button></td>";
					}else{
						echo "<td><button class='btn btn-xs btn-danger'>DeActive</button></td>";
					}						
					echo"<td style='display:none;' id='tdSTAFFaddress2$STAFFid'>$STAFFaddress2</td>
					<td style='display:none;' id='tdSTAFFgender$STAFFid'>$STAFFgender</td>
					<td style='display:none;' id='tdSTFBNKacc_no$STAFFid'>$STFBNKacc_no</td>
					<td style='display:none;' id='tdSTFBNKIFSCcode$STAFFid'>$STFBNKIFSCcode</td>
					<td style='display:none;' id='tdSTFBNKbankname$STAFFid'>$STFBNKbankname</td>
					<td style='display:none;' id='tdSTFBNKbranch$STAFFid'>$STFBNKbranch</td>
					<td id='tdSTAFFcreatedby$STAFFid'>$STAFFcreatedby $STAFFcreateddate</td>
					<td id='tdSTAFFmodifiedby$STAFFid'>$STAFFmodifiedby $STAFFmodifieddate</td>


					<td>
					<button data-toggle='modal' data-target='#myModalStaff' name='btnUpdate$STAFFid' id='btnUpdate$STAFFid' type='button' class='btn btn-info btn-flat btn-sm' onclick='ShowInEditor($STAFFid);' title='Click To Edit Member Data'><i class='fa fa-fw fa-pencil'></i></button>
					<!--button name='btnDelete$STAFFid' id='btnDelete$STAFFid' type='button' class='btn btn-danger btn-flat btn-sm' onclick='DeleteRecord($STAFFid);' title='Click To Delete Member Data'><i class='fa fa-fw fa-trash '></i></button-->
					</td>
				  </tr>";
		
	}
		echo "</table>";
	}elseif($Flag=="ShowRecordsApproval")
	{

		echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
				<thead>
					<tr class='odd gradeX'>
						<th style='display:none;'><i class='fa fa-fa'></i> Staff ID</th>
						<th><i class='fa fa-fa'></i> Staff ID/User Name</th>
						<th><i class='fa fa-gallary'></i> Image/Photo</th>
						<th><i class='fa fa-user'></i>  Staff Full Name </th>
						<th style='display:none;><i class='fa fa-user'></i>  Staff role </th>
						<th><i class='fa fa-font'></i> Role</th>
						<th><i class='fa fa-user'></i> Staff Work Under</th>
						<th><i class='fa fa-calendar'></i> Joining Date</th>
						<th><i class='fa fa-mobile'></i> Mobile No.</th>
						<th><i class='fa fa-phone'></i> Landline No.</th>
						<th><i class='fa fa-font'></i> Password</th>
						<th><i class='fa fa-envelope'></i> Email ID.</th>
						<th><i class='fa fa-calendar'></i> Status</th>
						<th style='display:none;><i class='fa fa-cog'></i> Actions</th>
					</tr>
				</thead>";
		$rstEmployee=mysql_query("select * from tbl_staff order by STAFF_id ASC");
		while($rwSTAFF=mysql_fetch_array($rstEmployee,MYSQL_ASSOC))
		{	
			$STAFFid=$rwSTAFF["STAFF_id"];
			$STAFFusername=$rwSTAFF["STAFF_username"];
			$STAFFrole=$rwSTAFF["STAFF_role"];
			$STAFFworksunder=$rwSTAFF["STAFF_worksunder"];
			$STAFFimage=$rwSTAFF["STAFF_image"];
			$STAFFjoiningdate=$rwSTAFF["STAFF_joiningdate"];
			$STAFFfullname=$rwSTAFF["STAFF_fullname"];
			$STAFFgender=$rwSTAFF["STAFF_gender"];
			$STAFFcontactno=$rwSTAFF["STAFF_contactno"];
			$STAFFlandlineno=$rwSTAFF["STAFF_landlineno"];
			$STAFFemailid=$rwSTAFF["STAFF_emailid"];
			$STAFFaddress1=$rwSTAFF["STAFF_address1"];
			$STAFFaddress2=$rwSTAFF["STAFF_address2"];
			$STAFFstatus=$rwSTAFF["STAFF_status"];
			$STAFFpassword=$rwSTAFF["STAFF_password"];
		

			$rststaff=mysql_query("select * from tbl_staff_category where STFCAT_name='$STAFFrole'");
			$rwstaffcat=mysql_fetch_array($rststaff,MYSQL_ASSOC);
				$STFCAT_id=$rwstaffcat["STFCAT_id"];
				$STFCAT_name=$rwstaffcat["STFCAT_name"];
			
			
			echo "<tr class='headings' >	
					<td style='display:none; id='tdSTAFFid$STAFFid'>$STAFFid</td>
					<td id='tdSTAFFusername$STAFFid'>$STAFFusername</td>";
					if($STAFFimage=='' and $STAFFgender=='Female')
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/avatar3.png'></td>";
					}elseif($STAFFimage=='' and $STAFFgender=='Male')
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/avatar5.png'></td>";
					}else
					{
					echo"<td id='tdSTAFFimage$STAFFid'><img  style='border-radius: 3px;box-shadow: 3px 2px 2px #cccccc;height: 50px;width: 50px; class='img-responsive' src='../resources/staff/$STAFFimage'></td>";
					}
					echo"<td id='tdSTAFFfullname$STAFFid'>$STAFFfullname</td>
					<td id='tdSTAFFrole$STAFFid'>$STFCAT_name</td>
					<td id='tdSTAFFworksunder$STAFFid'>$STAFFworksunder</td>
					<td id='tdSTAFFjoiningdate$STAFFid'>$STAFFjoiningdate</td>
					<td id='tdSTAFFcontactno$STAFFid'>$STAFFcontactno</td>
					<td id='tdSTAFFlandlineno$STAFFid'>$STAFFlandlineno</td>
					<td id='tdSTAFFpassword$$STAFFid'>$STAFFpassword</td>
					<td id='tdSTAFFemailid$STAFFid'>$STAFFemailid</td>";
					if($STAFFstatus==1)	
					{
						echo "<td><button class='btn btn-xs btn-success' onclick='MarkActive($STAFFid)'>Active</button></td>";
					}else{
						echo "<td ><button class='btn btn-xs btn-danger' onclick='MarkDeactive($STAFFid)'>DeActive</button></td>";
					}						
			
			// }
		
	}
		echo "</table>";
}elseif($Flag=="Active")
{	
	$staffid=$_POST["StaffId"];
	$sessionperson=$_POST['SessionPerson'];
	
	$rstDate=mysql_query("select * from tbl_staff where STAFF_id='$staffid' AND STAFF_status=1");
	if(mysql_num_rows($rstDate)==1)
	{
		mysql_query("update tbl_staff set STAFF_status=0,STAFF_modifiedby='$sessionperson',STAFF_modifieddate=NOW() where STAFF_id='$staffid'");
		echo "Active";
	}else
		{
			echo "AlreadyMarked";
		}
}elseif($Flag=="DeActive")
{
	$staffid=$_POST["StaffId"];
	$sessionperson=$_POST['SessionPerson'];
	
	$rstDate=mysql_query("select * from tbl_staff where STAFF_id='$staffid' AND STAFF_status=0");
	if(mysql_num_rows($rstDate)==1)
	{
		mysql_query("update tbl_staff set STAFF_status=1,STAFF_modifiedby='$sessionperson',STAFF_modifieddate=NOW() where STAFF_id='$staffid'");
		echo "DeActive";
	}else
		{
			echo "AlreadyMarked";
		}
}elseif($Flag=="ShowReports")
	{
			$FromDate=$_POST["FromDate"];
			$ToDate=$_POST["ToDate"];
			$TotalAmount=0;
			$TotalDepositAmount=0;
			
			echo "FromDate :$FromDate - &nbsp;";
			echo "ToDate :$ToDate";
			$rstEmployees=mysql_query("select * from tbl_staff where Date(STAFF_joiningdate) between '$FromDate' and '$ToDate'");
			echo mysql_error();
			echo "<table class='table table-striped responsive-utilities  dataTable'>
					<tr>
					<thead>
						<th><i class='fa fa-fa'></i> A/C. Holder ID</th>
						<th><i class='fa fa-user'></i>  EMP Holder</th>
						<th><i class='fa fa-font'></i> Group</th>
						<th><i class='fa fa-calendar'></i>Joining Date</th>
						<th><i class='fa fa-phone'></i> ContEMPt Details</th>
						<th><i class='fa fa-rupee'></i> Deposit Amount</th>				
						<th><i class='fa fa-rupee'></i> Loan Amount</th>				
					</thead>
				</tr>";
					
			while($rwEmployees=mysql_fetch_array($rstEmployees,MYSQL_ASSOC))
			{
			
				
			$STAFFid=$rwSTAFF["STAFF_id"];
			$STAFFcode=$rwSTAFF["STAFF_code"];
			$STAFFrole=$rwSTAFF["STAFF_role"];
			$STAFFimage=$rwSTAFF["STAFF_image"];
			$STAFFjoiningdate=$rwSTAFF["STAFF_joiningdate"];
			$STAFFfullname=$rwSTAFF["STAFF_fullname"];
			$STAFFcontactno=$rwSTAFF["STAFF_contactno"];
			$STAFFlandlineno=$rwSTAFF["STAFF_landlineno"];
			$STAFFemailid=$rwSTAFF["STAFF_emailid"];
			$STAFFaddress1=$rwSTAFF["STAFF_adddress1"];
			$STAFFaddress2=$rwSTAFF["STAFF_address2"];
			$STAFFcreatedby=$rwSTAFF["STAFF_createdby"];
			$STAFFcreateddate=date("Y-m-d | h:i:m",strtotime($rwEmployee["STAFF_createddate"]));		
			$STAFFmodifiedby=$rwSTAFF["STAFF_modifiedby"];
			$STAFFmodifieddate=date("d-m-Y | h:i:m",strtotime($rwEmployee["STAFF_modifieddate"]));	
			$STAFFstatus=$rwSTAFF["STAFF_status"];
			$STAFFpassword=$rwSTAFF["STAFF_password"];
			

				$rstGroup=mysql_query("select * from tbl_group where GRP_id='$groupid'");	
				$rwGroup=mysql_fetch_array($rstGroup);				
					$ggroupid=$rwGroup["GRP_id"];
					$groupcode=$rwGroup["GRP_code"];
					
					
				$rstEmployeeSavingDetails=mysql_query("SELECT sum(`SVG_depositamount`) AS SVG_depositamount FROM `tbl_saving_details` WHERE `SVG_EMPholderid`='$EMPholderid' AND `SVG_groupid`='$groupid'");	
				$rwEmployeeSavingDetails=mysql_fetch_assoc($rstEmployeeSavingDetails);				
				$depositamount=$rwEmployeeSavingDetails["SVG_depositamount"];
				$TotalDepositAmount=$TotalDepositAmount+$depositamount;
				
				$rstEmployeeLoanDetails=mysql_query("SELECT sum(`LOAN_loanamt`) AS LOAN_loanamt FROM `tbl_loan` WHERE `LOAN_memberid`='$EMPholderid' AND `LOAN_groupmember`='$groupid'");	
				$rwEmployeeLoanDetails=mysql_fetch_assoc($rstEmployeeLoanDetails);				
				$loanamt=$rwEmployeeLoanDetails["LOAN_loanamt"];
					
					
				$query_EMPholders = mysql_query("select * from tbl_employee");
				$rwEMPholders = mysql_num_rows($query_EMPholders);
				
				$TotalEMPholders=$rwEMPholders;
			
				// $TotalGrandTotalAmount=$TotalGrandTotalAmount+$LOAN_grandtotal;
					
			echo "<tr class='headings'>
					<td id='tdEMPhid$EMPholderid'>$EMPhid</td>
					<td id='tdimage$EMPholderid'>
					<img  style='border-radius: 3px;box-shadow: 2px 2px 2px #eee; height: 50px;width: 50px; class='img-responsive' src='resources/EMPholders/$image'> $fullname</td>
					<td id='tdgroupcode$EMPholderid'>$groupcode</td>
					<td id='tdjoiningdate$EMPholderid'>$joiningdate</td>
					<td id='tdcontEMPtno$EMPholderid'><i class='fa fa-mobile'></i> $contEMPtno / <br><i class='fa fa-phone'></i> $landlineno / <br><i class='fa fa-envelope'></i> $emailid</td>
					<td id='tddepositamount$EMPholderid'><center><i class='fa fa-rupee'></i> $depositamount</center></td>
					<td id='tdloanamt$EMPholderid'><center><i class='fa fa-rupee'></i> $loanamt</center></td>
				</tr>";
			}
			echo "</table>";
			
			echo"<hr>";
			echo "<b style='float:left'>Total A/C.Holders : $TotalEMPholders </b>";	
			echo "<b style='float:right'>Deposit Amount : $TotalDepositAmount </b>";	
	}else
	{
		echo "No Records Found";
	}
	

	

?>