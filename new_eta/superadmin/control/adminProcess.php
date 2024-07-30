<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

include('adminFunction.php');

switch($_REQUEST['action'])
  {
	  case 'changeimg':
		if(changeimg($_FILES["profile"]["name"],$_FILES["profile"]["tmp_name"]))
		{
			echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
		}
		else
		{
			echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
		}
	break;
    case 'updateUser':
        $fname = $_REQUEST['fname'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $design = $_REQUEST['design'];
        if(updateUser($fname,$email,$mobile,$design))
          echo "<script>alert('User details updated successfully');window.location='../profile.php';</script>";
        else
          echo "<script>alert('User details not updated');window.location='../profile.php';</script>";
    break;
    case 'changePass':
        $pass = $_REQUEST['pass'];
        $confirm = $_REQUEST['confirm'];
        if($pass==$confirm)
        {
          if(changePass($pass,$confirm))
            echo "<script>alert('User Password changed successfully');window.location='../profile.php';</script>";
          else
            echo "<script>alert('User Password not changed');window.location='../profile.php';</script>";
        }
        else {
          echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
        }
    break;
    case 'AddDesign':
        $design = $_REQUEST['design'];
          if(AddDesign($design))
            echo "<script>alert('Designation Added successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;
    
    
    case 'fetchDesign':
        $id = $_REQUEST['id'];
          echo fetchDesign($id);
    break;
    
     case 'already':
                
                $id=$_POST['id'];
                $sql=mysqli_query($conn,"Select empid from users where empid='".$id."'");
                echo mysqli_num_rows($sql);
               
        break;
    
    case 'UpdateDesign':
        $update_design = $_REQUEST['update_design'];
        $update_id = $_REQUEST['update_id'];
          if(UpdateDesign($update_design,$update_id))
            echo "<script>alert('Designation Updated successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;
    case 'DeleteDesign':
        $delete_id = $_REQUEST['delete_id'];
          if(DeleteDesign($delete_id))
            echo "<script>alert('Designation Deleted successfully');window.location='../Designation.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../Designation.php';</script>";
    break;

    case 'addEmployee':
        $empid = $_REQUEST['empid'];
        $gradepay = $_REQUEST['gradepay'];
        $fullname = $_REQUEST['fullname'];
        $dept = $_REQUEST['dept'];
        $billunit = $_REQUEST['billunit'];
        $design = $_REQUEST['design'];
        $mobile = $_REQUEST['mobile'];
        $station = $_REQUEST['station'];
        $email = $_REQUEST['email'];
        $address = $_REQUEST['address'];
          if(addEmployee($empid,$gradepay,$fullname,$dept,$billunit,$design,$mobile,$station,$email,$address))
            echo "<script>alert('Employee Added successfully');window.location='../user_registration.php';</script>";
          else
            echo "<script>alert('Failed to add employee');window.location='../user_registration.php';</script>";
    break;
    case 'FetchEmployee':
        $id = $_REQUEST['id'];
          echo FetchEmployee($id);
    break;
    case 'fetchEmployee1':
        $id = $_REQUEST['id'];
          echo fetchEmployee1($id);
    break;
    case 'deleteEmployee':
        $delete_id = $_REQUEST['id'];
          if(deleteEmployee($delete_id))
            echo "Employee Details Deleted successfully";
          else
            echo "Failed to delete employee";
    break;
    case 'claimTA':
        $cnt = $_REQUEST['hide_count'];
        $empid = $_REQUEST['empid'];
        $year = $_REQUEST['year'];
        $set = $_REQUEST['set'];
        $months = implode(",",$_REQUEST['month']);
        $ref = rand(10000,999999);
        $reference = $empid."/".$year."/".$ref;
        $data = [];
        for($i=0;$i<=$cnt;$i++)
        {
          $data['date'][$i] =  $_REQUEST["date$i"];
          $data['train'][$i] =  $_REQUEST["train$i"];
          $data['departS'][$i] =  $_REQUEST["departS$i"];
          $data['departT'][$i] =  $_REQUEST["departT$i"];
          $data['arrivalS'][$i] =  $_REQUEST["arrivalS$i"];
          $data['arrivalT'][$i] =  $_REQUEST["arrivalT$i"];
          $data['distance'][$i] =  $_REQUEST["distance$i"];
          $data['percent'][$i] =  $_REQUEST["percent$i"];
          $data['amount'][$i] =  $_REQUEST["amount$i"];
          $data['objective'][$i] =  $_REQUEST["objective0"];
        }
        if(claimTA($data,$reference,$empid,$year,$months,$cnt,$set))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;
    case 'addclaimTA':
        $cnt = $_REQUEST['hide_count'];
        $empid = $_REQUEST['empid'];
        $year = $_REQUEST['year'];
        $months = $_REQUEST['month'];
        $set = $_REQUEST['set'];
        $reference = $_REQUEST['reference'];
        $data = [];
        for($i=0;$i<=$cnt;$i++)
        {
          $data['date'][$i] =  $_REQUEST["date$i"];
          $data['train'][$i] =  $_REQUEST["train$i"];
          $data['departS'][$i] =  $_REQUEST["departS$i"];
          $data['departT'][$i] =  $_REQUEST["departT$i"];
          $data['arrivalS'][$i] =  $_REQUEST["arrivalS$i"];
          $data['arrivalT'][$i] =  $_REQUEST["arrivalT$i"];
          $data['distance'][$i] =  $_REQUEST["distance$i"];
          $data['percent'][$i] =  $_REQUEST["percent$i"];
          $data['amount'][$i] =  $_REQUEST["amount$i"];
          $data['objective'][$i] =  $_REQUEST["objective0"];
        }
        if(addclaimTA($data,$reference,$empid,$year,$months,$cnt,$set))
          echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        else
          echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";

    break;

    case 'getTaAmount':
        $level = $_REQUEST['level'];
          echo getTaAmount($level);
    break;

    case 'approveAndForward':
      $empid = $_REQUEST['empid'];
      $ref = $_REQUEST['ref'];
      $forwardName = $_REQUEST['forwardName'];
      $original_id = $_REQUEST['original_id'];
      //echo $original_id;
      if(approveAndForward($empid,$ref,$forwardName,$original_id))
      {
        echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
      }
      else
      {
        echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
      }
    break;

    case 'AddEmployee':
        $empid = $_REQUEST['empid'];
        $pannumber = $_REQUEST['pannumber'];
        $empname = $_REQUEST['empname'];
        $billunit = $_REQUEST['billunit'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $design = $_REQUEST['design'];
        $paylevel = $_REQUEST['paylevel'];
        $button = $_REQUEST['button'];
        $update_id = $_REQUEST['update_id'];
        if($button=="update")
        {
          if(updateEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel,$update_id))
            echo "<script>alert('Employee Updated successfully');window.location='../employee_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
        }
        else
        {
          if(AddEmployee($empid,$pannumber,$empname,$billunit,$mobile,$email,$design,$paylevel))
            echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
          else
            echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
        }
    break;
    case 'fetchEmployee':
      $id = $_REQUEST['id'];
      $result = fetchEmployee($id);
      echo $result; 
    break;
    case 'AddDeptAdmin':
        $empid = $_REQUEST['empid'];
        $username = $_REQUEST['username'];
        // $psw = $_REQUEST['psw'];
        $mobile = $_REQUEST['mobile'];
        $dept = $_REQUEST['dept'];
        if(AddAdmin($empid,$username,$dept,$mobile))
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin add the '.$empid.' DA';
            user_activity($empid1,$file_name,'Add DA',$msg);
            echo "<script>alert('Department Admin Added successfully');window.location='../add_user.php';</script>";    
        }
        else
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin unable to add the '.$empid.' DA';
            user_activity($empid1,$file_name,'Add DA',$msg);
            echo "<script>alert('Failed to add department admin');window.location='../add_user.php';</script>";
        }
    break;
    
    case 'AddAcctAdmin':
        $empid = $_POST['empid'];
        $username = $_POST['username'];
        $psw = $_POST['psw'];
        $bu = implode(",",$_POST['bu']);
        // print_r($bu);
        // echo "<br>".sizeof($_POST['bu']);
          if(AddAcctAdmin($empid,$username,$psw,$bu))
            echo "<script>alert('Accountant Admin Added successfully');window.location='../add_account.php';</script>";
          else
            echo "<script>alert('Something Went wrong...');window.location='../add_account.php';</script>";
    break;
    
    
    case 'get_summary1':
        
        $data='';
        $query1="SELECT summary_id FROM master_summary WHERE MONTH(EST_approved_time) ='".$_POST['mon']."' ";
        $result1=mysqli_query($conn,$query1);
        echo mysqli_error($conn);
        $cnt_m=0;
        
        $emp_cnt=1;
        $count=mysqli_num_rows($result1);
        while($row_m=mysqli_fetch_array($result1))
        {  
             $cnt_m++;
            $data.= get_summary($row_m['summary_id']);
        }
        
        if($cnt_m == 0)
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin getting TA summary Report BUT data not found';
            user_activity($empid,$file_name,'TA Summary Report',$msg);
            echo "<tr> <td colspan='17'>No Data Found.</td></tr>";
        }
        else
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin getting TA summary Report';
            user_activity($empid,$file_name,'TA Summary Report',$msg);
            echo $data;
        }

    break;
    
    
    case 'get_all_summary':
        
        $dept_no=$_POST['dept_no'];
        $mon=date('m',strtotime($_POST['mon']));
        $year=date('Y',strtotime($_POST['mon']));
        // exit();
        $data='';
        
        // $query1="SELECT DISTINCT(DEPTNO) FROM `department` WHERE DEPTNO NOT IN(01) ORDER BY DEPTNO ASC";
        // $result1=mysqli_query($query1);
        // echo mysqli_error();
        $count=mysqli_num_rows($result1);
        
        $data.="<tr class='fontcss1' style='text-align: center;'>";
       
        $data.= get_all_summary($dept_no,$mon,$year);
        
        if($data == '')
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin getting All TA summary Report BUT data not found';
            user_activity($empid,$file_name,'All TA Summary Report',$msg);
            echo "<tr> <td colspan='5'>No Data Found.</td></tr>";
        }
        else
        {
            $empid=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin getting All TA summary Report';
            user_activity($empid,$file_name,'All TA Summary Report',$msg);
            echo $data;
        }

    break;
        
        
    case 'get_summary':
        // echo $_REQUEST['mon'];
		
		$data='<table id="example" class="table table-hover table-bordered display" >
					<thead><tr class="warning"><th rowspan="2" valign="top">Status</th><th rowspan="2" valign="top">DEPT.</th> <th rowspan="2" valign="top" >P.F. No</th>
					<th rowspan="2" valign="top">Name</th><th rowspan="2" valign="top">BU</th><th rowspan="2" valign="top">Desig.</th>
					<th rowspan="2" valign="top" >P/L</th><th rowspan="2" valign="top"><center>ROP</center></th> 
					<th rowspan="2" valign="top">Rate</th> <th rowspan="2" valign="top">Travel<br> Month</th><th rowspan="2" valign="top"><center>Claim <br> Month</center></th>
					<th colspan="2"><center>30% (Days Count)</center></th> <th colspan="2"><center>70% (Days Count)</center></th>
					<th colspan="2"><center>100% (Days Count)</center></th><th rowspan="2"><center>TA<br> Amt.</center></th>
					<th rowspan="2">Conti.<br>Amt.</th><th rowspan="2">Action</th></tr><tr class="warning fontcss"><th>Day</th><th>Amt</th>
					<th>Day</th><th>Amt</th><th>Day</th><th>Amt</th></tr></thead><tbody>';
			
        echo $query1="SELECT summary_id FROM master_summary WHERE MONTH(EST_approved_time) ='".$_POST['mon']."' ";
        $result1=mysqli_query($conn,$query1);
        echo mysqli_error($conn);
        $cnt_m=0;
        $count=mysqli_num_rows($result1);
        while($row_m=mysqli_fetch_array($result1))
        {   
            $cnt_m++;
            echo $row_m['summary_id'];
            $sql="SELECT * from tasummarydetails,employees where  tasummarydetails.empid=employees.pfno AND summary_id='".$row_m['summary_id']."' AND is_summary_generated='1' order by employees.BU ASC ";
    		$res=mysqli_query($conn,$sql);
    	
    		$total_amt=0;
    		$temp=0;
    		
    		while($val=mysqli_fetch_array($res))
    		{
        		$sql1=mysqli_query($conn,"SELECT * from employees where pfno='".$val['empid']."' order by BU ASC");
        		$val1=mysqli_fetch_array($sql1);
        		echo mysqli_error($conn);
        
    		    $level=$val1['level'];
        		$sql2="SELECT * from ta_amount where min<='".$level."' AND max>='".$level."' ";
        		$res2=mysqli_query($conn,$sql2);
        		$val2=mysqli_fetch_array($res2);

		        $val['empid']."_".$amount=$val2['amount'];

        		$month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$month_array1=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$mon='';
        		$mmon='';
        		$mts=explode(",",$val['month']);
        		$s=$mts[0];
        		$y=substr( $val['year'],2);
        		if($month_array[$s])
        		{
        			 $mon=$month_array[$s];
        		}	
        		 $cdate=substr($val['created_at'],3,2);
        		 $cyear=substr($val['created_at'],8,2);
        		if($month_array1[$cdate])
        		{
        	       // echo $month_array1[$cdate];
        			$mmon=$month_array1[$cdate];
        		}	
        
                $query1="SELECT est_approve FROM `taentry_master` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ";
                $result1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_array($result1);
        
                $status=$row1['est_approve'];
        		$data.="<tr class='fontcss1'>";
        		if($status == '1'){
                    $data.="<td style='color:#0b10f5;'>Vetted</td>";
                }
                else{
                    $data.= "<td style='color:red;'>Non-Vetted</td>";
                }
		        $data.= "<td>".$val['dept']."</td>
		        <td>".$val['empid']."</td>
        			<td>".$val1['name']."</td>
        			<td>".$val1['BU']. "</td>
        			<td>".getDesignation($val1['desig'])."</td>
        			<td>".$val1['level']."</td>
        			<td>".$val1['bp']."</td>
        			<td>$amount</td>
        			<td>$mon - $y</td>
        			<td>$mmon - $cyear</td>";

    			if($val['30p_cnt'] == '0' && $val['30p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t1=0;
    			}
    			else
    			{
    				$data.= "<td>".$val['30p_cnt']."</td><td>".$val['30p_amt']."</td>";
    				$t1=$val['30p_amt'];
    			}
    			if($val['70p_cnt'] == '0' && $val['70p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t2=0;
    			}
    			else
    			{
    				$data.= "<td>".$val['70p_cnt']."</td><td>".$val['70p_amt']."</td>";
    				$t2=$val['70p_amt'];
    			}
    			if($val['100p_cnt'] == '0' && $val['100p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";
    				$t3=0;	
    			}
    			else
    			{
    				$data.= "<td>".$val['100p_cnt']."</td><td>".$val['100p_amt']."</td>";
    				$t3=$val['100p_amt'];
                }
		
    			$total_amt =(int)$t1 + (int)$t2 + (int)$t3;
    			$temp=$temp+$total_amt;

    			$data.= "<td>$total_amt</td>";

    			$sqll=mysqli_query($conn,"SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ");
    			$ress=mysqli_fetch_array($sqll);
    			if($ress['amount'] == '0' || $ress['amount'] == null)
    			{
			        $data.= "<td>-</td>";
		        }
    			else
    			{
    				$data.= "<td>".$ress['amount']."</td>";
    			}
		        $data.= "<td class='noprint btnhide'><a  href='show_seperate_approve_1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary btn-sm noprint'>Show</a></td></tr>";
	        }
        }

            
        $data.= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    			<td></td><td></td><td><b>Total</b></td><td>$temp</td><td></td><td><b></b></td></tr></tbody></table>";
	    echo "<br>".$cnt_m;
	    if($count >= 1)
	    {
	        echo $data;
	    }
	    else{
            echo "<b>No Data Available</b>";
	    }
		
		
    break;
    
    case 'get_all_summary':
        
        $data='<table id="example" class="table table-hover table-bordered display" >
					<thead><tr class="warning">
					<th rowspan="2" valign="top">Status</th> <th rowspan="2" valign="top">Dept.</th>
					<th rowspan="2" valign="top" >P.F. No</th>
					<th rowspan="2" valign="top">Name</th><th rowspan="2" valign="top">BU</th><th rowspan="2" valign="top">Desig.</th>
					<th rowspan="2" valign="top" >P/L</th><th rowspan="2" valign="top"><center>ROP</center></th> 
					<th rowspan="2" valign="top">Rate</th> <th rowspan="2" valign="top">Travel<br> Month</th><th rowspan="2" valign="top"><center>Claim <br> Month</center></th>
					<th colspan="2"><center>30% (Days Count)</center></th> <th colspan="2"><center>70% (Days Count)</center></th>
					<th colspan="2"><center>100% (Days Count)</center></th><th rowspan="2"><center>TA<br> Amt.</center></th>
					<th rowspan="2">Conti.<br>Amt.</th><th rowspan="2">Action</th></tr><tr class="warning fontcss"><th>Day</th><th>Amt</th>
					<th>Day</th><th>Amt</th><th>Day</th><th>Amt</th></tr></thead><tbody>';
									
        $query1="SELECT summary_id FROM master_summary WHERE MONTH(EST_approved_time) ='".$_POST['mon']."' ";
        $result1=mysqli_query($conn,$query1);
        echo mysqli_error($conn);
        $count=mysqli_num_rows($result1);
        while($row1=mysqli_fetch_array($result1))
        {
            // echo $row1['summary_id'];
            $sql="SELECT * from tasummarydetails,employees where  tasummarydetails.empid=employees.pfno AND summary_id='".$row1['summary_id']."' AND is_summary_generated='1' order by employees.BU ASC ";
    		$res=mysqli_query($conn,$sql);
    	
    		$total_amt=0;
    		$temp=0;
    		
    		while($val=mysqli_fetch_array($res))
    		{
		
        		$sql1=mysqli_query($conn,"SELECT * from employees where pfno='".$val['empid']."' order by BU ASC");
        		$val1=mysqli_fetch_array($sql1);
        		echo mysqli_error($conn);
        
    		    $level=$val1['level'];
        		$sql2="SELECT * from ta_amount where min<='".$level."' AND max>='".$level."' ";
        		$res2=mysqli_query($conn,$sql2);
        		$val2=mysqli_fetch_array($res2);

		        $val['empid']."_".$amount=$val2['amount'];

        		$month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$month_array1=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$mon='';
        		$mmon='';
        		$mts=explode(",",$val['month']);
        		$s=$mts[0];
        		$y=substr( $val['year'],2);
        		if($month_array[$s])
        		{
        			 $mon=$month_array[$s];
        		}	
        		 $cdate=substr($val['created_at'],3,2);
        		 $cyear=substr($val['created_at'],8,2);
        		if($month_array1[$cdate])
        		{
        	       // echo $month_array1[$cdate];
        			$mmon=$month_array1[$cdate];
        		}	
        
                $query1="SELECT est_approve FROM `taentry_master` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ";
                $result1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_array($result1);
        
                $status=$row1['est_approve'];
        		$data.="<tr class='fontcss1'>";
        		if($status == '1'){
                    $data.="<td style='color:#0b10f5;'>Vetted</td>";
                }
                else{
                    $data.= "<td style='color:red;'>Non-Vetted</td>";
                }
		        $data.= "<td>".getdepartment($val['dept'])."</td>
		            <td>".$val['empid']."</td>
        			<td>".$val1['name']."</td>
        			<td>".$val1['BU']. "</td>
        			<td>".getDesignation($val1['desig'])."</td>
        			<td>".$val1['level']."</td>
        			<td>".$val1['bp']."</td>
        			<td>$amount</td>
        			<td>$mon - $y</td>
        			<td>$mmon - $cyear</td>";

    			if($val['30p_cnt'] == '0' && $val['30p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t1=0;
    			}
    			else
    			{
    				$data.= "<td>".$val['30p_cnt']."</td><td>".$val['30p_amt']."</td>";
    				$t1=$val['30p_amt'];
    			}
    			if($val['70p_cnt'] == '0' && $val['70p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t2=0;
    			}
    			else
    			{
    				$data.= "<td>".$val['70p_cnt']."</td><td>".$val['70p_amt']."</td>";
    				$t2=$val['70p_amt'];
    			}
    			if($val['100p_cnt'] == '0' && $val['100p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";
    				$t3=0;	
    			}
    			else
    			{
    				$data.= "<td>".$val['100p_cnt']."</td><td>".$val['100p_amt']."</td>";
    				$t3=$val['100p_amt'];
                }
		
    			$total_amt =(int)$t1 + (int)$t2 + (int)$t3;
    			$temp=$temp+$total_amt;

    			$data.= "<td>$total_amt</td>";

    			$sqll=mysqli_query($conn,"SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ");
    			$ress=mysqli_fetch_array($sqll);
    			if($ress['amount'] == '0' || $ress['amount'] == null)
    			{
			        $data.= "<td>-</td>";
		        }
    			else
    			{
    				$data.= "<td>".$ress['amount']."</td>";
    			}
		        $data.= "<td class='noprint btnhide'><a  href='show_seperate_approve_1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary btn-sm noprint'>Show</a></td></tr>";
	        }
        }

            
        $data.= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    			<td></td><td></td><td><b>Total</b></td><td>$temp</td><td></td><td><b></b></td></tr></tbody></table>";
	    
	    if($count >= 1)
	    {
	        echo $data;
	    }
	    else{
            echo "<b>No Data Available</b>";
	    }
    
    break;
    
    case 'activeUser':
      $active = '1';
      $pfno = $_REQUEST['id'];
      $role = $_REQUEST['role'];
      if(activeUser($pfno,$active,$role))
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin active the '.$pfno.' User';
            db_connect("drmpsurh_travel_allowance1");
            user_activity($empid1,$file_name,'Active DA',$msg);
            echo "User Activated successfully";
        }
        else
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin unable to active the '.$pfno.' User';
            db_connect("drmpsurh_travel_allowance1");
            user_activity($empid1,$file_name,'Active DA',$msg);
            echo "Something went wrong";
        }
    break;
    case 'deactiveUser':
      $active = '0';
      $pfno = $_REQUEST['id'];
      $role = $_REQUEST['role'];
      if(deactiveUser($pfno,$active,$role))
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin deactive the '.$pfno.' DA';
            user_activity($empid1,$file_name,'Deactive DA',$msg);
            echo "User Deactivated successfully";
        }
        else
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin unable to deactive the '.$pfno.' DA';
            user_activity($empid1,$file_name,'Deactive DA',$msg);
            echo "Something went wrong";
        }
    break;
    
    case 'deleteUser':
      $pfno = $_REQUEST['id'];
          
        $query1="DELETE * FROM users WHERE username='".$pfno."' ";
        $result1=mysqli_query($conn,$query1);
        
        if($result1)
        {
            echo "1";
        }
        else
        {
            echo "0";
        }    
    break;
    
    
    case 'fetchEmployeeUpdated':
        $id = $_REQUEST['id'];
          echo fetchEmployeeUpdated($id);
    break;
    
    case 'role_transfer':
        $pfno=$_POST['emp_pfno1'];
        $transfer_emp_id=$_POST['transfer_emp_id'];
        $date=date("Y-m-d H:i:s");
        $sql_role_transfer_select = "UPDATE `forward_data` SET `fowarded_to`='".$transfer_emp_id."', `arrived_time`='".$date."' WHERE `fowarded_to`='".$pfno."' AND hold_status='1' ";  
         
        $rst_role_transfer = mysqli_query($conn,$sql_role_transfer_select);
        if($rst_role_transfer)
        {
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Sueradmin role transfer of '.$pfno.' user to '.$transfer_emp_id.' user';
            user_activity($pfno,$file_name,'Role Transfer Of user',$msg);
            echo "<script>alert(Role Transfer successfully');window.location='../add_user.php';</script>";
        }
        else
        {
            $empid1=$_SESSION['empid'];
            $file_name=basename($_SERVER["SCRIPT_FILENAME"], '.php');
            $msg='Superadmin unable to role transfer of '.$pfno.' user to '.$transfer_emp_id.' user';  
            user_activity($pfno,$file_name,'Role Transfer Of user',$msg);
            echo "<script>alert('Something went wrong');window.location='../add_user.php';</script>";
        }
    break;
    
    case 'view_conti':
        $data='';

        $query = "SELECT * FROM `master_cont` WHERE reference_no = '".$_POST['ref_no']."' AND set_no='".$_POST['set_no']."' ";

        $result=mysqli_query($conn,$query);
        echo mysqli_error($conn);

        $row_data=mysqli_num_rows($result);        
        if($row_data == 1)
        {
            $query1 = "SELECT * FROM `add_cont` WHERE reference_no = '".$_POST['ref_no']."' AND set_no='".$_POST['set_no']."' ";
            $result1=mysqli_query($conn,$query1);
            $cnt= 1;$sum = 0;$obj='';
            $data.='<table class="table table-inverse " style="font-size: 15px" id="" border="1">
                    <thead>
                      <tr>
                        <th >Sr. No.</th>
                        <th >Date</th>
                        <th >From</th>
                        <th >To</th>
                        <th >KM Rate</th>
                        <th >KM</th>
                        <th >Amount</th>            
                      </tr> 
                    </thead><tbody>';
            while($sql_res=mysqli_fetch_array($result1)){
              $data .= "<tr>
              <td>".$cnt."</td>
              <td>".$sql_res['cont_date']."</td>
              <td>".$sql_res['from_place']."</td>
              <td>".$sql_res['to_place']."</td>
              <td>".$sql_res['rate']."</td>
              <td>".$sql_res['kms']."</td>
              <td>".$sql_res['amount']."</td>
              </tr>
              ";
              $obj=$sql_res['objective'];
              $cnt++;
              $sum = $sum + (int)$sql_res['amount'];
            }
            $data .= "<tr><td colspan='1' class='text-left' style='text-align:right'><b>Objective</b></td><td colspan='6'>$obj</td></tr><tr><td colspan='1' class='text-left' style='text-align:right'><b>Total</b></td><td colspan='6'>$sum</td></tr></tbody></table>";
        }
        else
        {
          $data.="0";
        }
      
        echo $data;
    break;
    
    
    case 'view_contingency':
        $data='';
        $sql="select * from continjency_master inner join continjency on continjency_master.id=continjency.cid where reference='".$_REQUEST['ref']."' and continjency.set_number='".$_REQUEST['set']."'";
         $raw_data=mysqli_query($conn,$sql);
         echo mysqli_error($conn);
         if($raw_data){
          $cnt = 0;
            while($sql_res=mysqli_fetch_assoc($raw_data)){
              $data .= "
                <tr>
                  <td>".$sql_res['cntdate']."</td>
                  <td>".$sql_res['cntfrom']."</td>
                  <td>".$sql_res['cntTo']."</td>
                  <td>".$sql_res['kms']."</td>
                  <td>".$sql_res['rate_per_km']."</td>
                  <td>".$sql_res['total_amount']."</td>
                </tr>
              ";
              $cnt += (int)$sql_res['total_amount'];
          }
          $data .= "
                <tr>
                  <td colspan='5' style='text-align:right;'>Total Amount</td>
                  <td>".$cnt."</td>
                </tr>
              ";
        }
        else{
          $data .= 0;
        }
        echo $data;
        break;
		
		case "applybillunit":
        $billunit = implode(",", $_POST['billunit']);
        if(applybillunit($_REQUEST['empid'],$billunit))
        {
             echo "<script>alert('Bill Unit applied to User');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;

    case "deletebillunitemp":
        $query = mysqli_query($conn,"delete from sep_billunit where employee_id='".$_REQUEST['deleteemp']."'");
        if($query)
        {
             echo "<script>alert('User removed successfully');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;

    case "updatebillemp":
        $billunit = implode(",", $_REQUEST['updatebill']);
        $update_sql = "update sep_billunit set billunit='".$billunit."' where employee_id='".$_REQUEST['updateemp']."'";
        $query = mysqli_query($conn,$update_sql);
        echo mysqli_error($conn);
        if($query)
        {
             echo "<script>alert('User bill unit applied successfully');window.location='../apply_billunit.php';</script>";
        }
        else
        {
            echo "<script>alert('Something Went Wrong');window.location='../apply_billunit.php';</script>";
        }
    break;

    default:
      echo "Invalid option";
    break;
  }
 ?>
