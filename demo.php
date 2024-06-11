<?php
case 'get_summary1':
        
        $data='<table id="example" class="table table-hover table-bordered display" >
					<thead>
					<tr class="warning">
					<th rowspan="2" valign="top">Status</th>
					<th rowspan="2" valign="top">DEPT.</th> 
					<th rowspan="2" valign="top" >P.F. No</th>
					<th rowspan="2" valign="top">Name</th>
					<th rowspan="2" valign="top">BU</th>
					<th rowspan="2" valign="top">Desig.</th>
					<th rowspan="2" valign="top" >P/L</th>
					<th rowspan="2" valign="top"><center>ROP</center></th> 
					<th rowspan="2" valign="top">Rate</th>
					<th rowspan="2" valign="top">Travel<br> Month</th>
					<th rowspan="2" valign="top"><center>Claim <br> Month</center></th>
					<th colspan="2"><center>30% (Days Count)</center></th>
					<th colspan="2"><center>70% (Days Count)</center></th>
					<th colspan="2"><center>100% (Days Count)</center></th>
					<th rowspan="2"><center>TA<br> Amt.</center></th>
					<th rowspan="2">Conti.<br>Amt.</th>
					<th rowspan="2">Action</th>
					</tr>
					<tr class="warning fontcss">
						<th>Day</th>
						<th>Amt</th>
						<th>Day</th>
						<th>Amt</th>
						<th>Day</th>
						<th>Amt</th>
					</tr>
					</thead><tbody>';
					
        $query1="SELECT summary_id FROM master_summary WHERE MONTH(EST_approved_time) ='".$_POST['mon']."' ";
        $result1=mysql_query($query1);
        echo mysql_error();
        $cnt_m=0;
        $count=mysql_num_rows($result1);
        while($row_m=mysql_fetch_array($result1))
        {   
            $cnt_m++;
            // echo "<br>".$row_m['summary_id'];
            $query2="SELECT * from tasummarydetails,employees where  tasummarydetails.empid=employees.pfno AND summary_id='".$row_m['summary_id']."' AND is_summary_generated='1' order by employees.BU ASC ";
    		$result2=mysql_query($query2);
    		
    		$total_amt=0;
    		$temp=0;
    		
    		while($row2=mysql_fetch_array($result2))
    		{
    		  //  echo "<br>---".$row2['empid'];
    		    $result3=mysql_query("SELECT * from employees where pfno='".$row2['empid']."' order by BU ASC");
        		$val1=mysql_fetch_array($result3);
        		
        		$level=$val1['level'];
        		$sql2="SELECT * from ta_amount where min<='".$level."' AND max>='".$level."' ";
        		$res2=mysql_query($sql2);
        		$val2=mysql_fetch_array($res2);
        		
        // 		echo "<br>---".$row2['empid']."_".$amount=$val2['amount'];
        		
        		
        		$month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$month_array1=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
        		$mon='';
        		$mmon='';
        		$mts=explode(",",$row2['month']);
        		$s=$mts[0];
        		$y=substr( $row2['year'],2);
        		if($month_array[$s])
        		{
        			 $mon=$month_array[$s];
        		}	
        		 $cdate=substr($row2['created_at'],3,2);
        		 $cyear=substr($row2['created_at'],8,2);
        		if($month_array1[$cdate])
        		{
        			$mmon=$month_array1[$cdate];
        		}
        		
        		$query4="SELECT est_approve FROM `taentry_master` WHERE empid='".$row2['empid']."' AND reference_no='".$row2['reference_no']."' ";
                $result4=mysql_query($query4);
                $row4=mysql_fetch_array($result4);
                
                $status=$row4['est_approve'];
        		$data.="<tr class='fontcss1'>";
        		if($status == '1'){
                    $data.="<td style='color:#0b10f5;'>Vetted</td>";
                }
                else{
                    $data.= "<td style='color:red;'>Non-Vetted</td>";
                }
                
                $data.= "<td>".$row2['dept']."</td>
		        <td>".$row2['empid']."</td>
        			<td>".$val1['name']."</td>
        			<td>".$val1['BU']. "</td>
        			<td>".getDesignation($val1['desig'])."</td>
        			<td>".$val1['level']."</td>
        			<td>".$val1['bp']."</td>
        			<td>$amount</td>
        			<td>$mon - $y</td>
        			<td>$mmon - $cyear</td>";
        			
        		if($row2['30p_cnt'] == '0' && $row2['30p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t1=0;
    			}
    			else
    			{
    				$data.= "<td>".$row2['30p_cnt']."</td><td>".$row2['30p_amt']."</td>";
    				$t1=$row2['30p_amt'];
    			}
    			if($row2['70p_cnt'] == '0' && $row2['70p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";	
    				$t2=0;
    			}
    			else
    			{
    				$data.= "<td>".$row2['70p_cnt']."</td><td>".$row2['70p_amt']."</td>";
    				$t2=$row2['70p_amt'];
    			}
    			if($row2['100p_cnt'] == '0' && $row2['100p_amt']== '0')
    			{
    				$data.= "<td>-</td><td>-</td>";
    				$t3=0;	
    			}
    			else
    			{
    				$data.= "<td>".$row2['100p_cnt']."</td><td>".$row2['100p_amt']."</td>";
    				$t3=$row2['100p_amt'];
                }
    			
    			$total_amt =(int)$t1 + (int)$t2 + (int)$t3;
    			$temp=$temp+$total_amt;

    			$data.= "<td>$total_amt</td>";
    			
    			$sqll=mysql_query("SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='".$row2['empid']."' AND reference_no='".$row2['reference_no']."' ");
    			$ress=mysql_fetch_array($sqll);
    			if($ress['amount'] == '0' || $ress['amount'] == null)
    			{
			        $data.= "<td>-</td>";
		        }
    			else
    			{
    				$data.= "<td>".$ress['amount']."</td>";
    			}
    			
    			$data.= "<td class='noprint btnhide'><a  href='show_seperate_approve_1.php?ref_no=".$row2['reference_no']."&empid=".$row2['empid']."' class='btn btn-primary btn-sm noprint'>Show</a></td></tr>";
    			
    			$data.= "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    			<td></td><td></td><td><b>Total</b></td><td>$temp</td><td></td><td><b></b></td></tr></tbody></table>";
        	   
        	   // echo "<br>".$cnt_m;
        	    if($count >= 1)
        	    {
        	        echo $data;
        	    }
        	    else{
                    echo "<b>No Data Available</b>";
        	    }
    		}
        }
    break;
?>