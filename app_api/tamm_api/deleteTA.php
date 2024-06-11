<?php
$reference = $_POST['ref_no'];
        $set_no = $_POST['set_no'];
    
        $sql=mysql_query("SELECT DISTINCT(set_number) FROM `taentrydetails` WHERE reference_no='".$reference."' ");
        $total_rows=mysql_num_rows($sql);
        // echo $total_rows;
    
        if($total_rows > 1)
        {
            // echo "<br>"."SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='".$reference."' AND `set_number`='".$set_no."' ";
            $sql1=mysql_query("SELECT `percent`,`amount` FROM `taentrydetails` WHERE `reference_no`='".$reference."' AND `set_number`='".$set_no."' ");
            $amt=0;$Tp_cnt=0;$Sp_cnt=0;$Hp_cnt=0;$Otp_cnt=0;$Tp_amt=0;$Sp_amt=0;$Hp_amt=0;$Otp_amt=0;
            while($result1=mysql_fetch_array($sql1))
            {
              if($result1['percent'] == "30%" )
              {
                $Tp_cnt=$Tp_cnt+1;
                $Tp_amt=$Tp_amt+$result1['amount'];
              }
              else if($result1['percent'] == "70%")
              {
                $Sp_cnt=$Sp_cnt+1;
                $Sp_amt=$Sp_amt+$result1['amount'];
              }
              else if($result1['percent'] == "100%")
              {
                $Hp_cnt=$Hp_cnt+1;
                $Hp_amt=$Hp_amt+$result1['amount'];
              }
              else
              {
                $Otp_cnt=$Otp_cnt+1;
                $Otp_amt=$Otp_amt+$result1['amount'];
              }
            }
            // echo "<br> Tp_cnt ".$Tp_cnt." Tp_amt ".$Tp_amt;
            // echo "<br> Sp_cnt ".$Sp_cnt." Sp_amt ".$Sp_amt;
            // echo "<br> Hp_cnt ".$Hp_cnt." Hp_amt ".$Hp_amt;
            // echo "<br> Otp_cnt ".$Otp_cnt." Otp_amt ".$Otp_amt;
    
            // echo "<br><br>"."SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='".$reference."' AND `empid`='".$_SESSION['empid']."' ";
    
            $sql2=mysql_query("SELECT `30p_cnt`,`30p_amt`,`70p_cnt`,`70p_amt`,`100p_cnt`,`100p_amt`,`otherp_cnt`,`otherp_amt` FROM `tasummarydetails` WHERE `reference_no`='".$reference."' AND `empid`='".$_SESSION['empid']."' ");
            $result2=mysql_fetch_array($sql2);
            // echo "<br> Tp_cnt ".$result2['30p_cnt']." Tp_amt ".$result2['30p_amt'];
            // echo "<br> Sp_cnt ".$result2['70p_cnt']." Sp_amt ".$result2['70p_amt'];
            // echo "<br> Hp_cnt ".$result2['100p_cnt']." Hp_amt ".$result2['100p_amt'];
            // echo "<br> Otp_cnt ".$result2['otherp_cnt']." Otp_amt ".$result2['otherp_amt'];
            // echo "<br><br>";
    
            $total_30p_cnt=$result2['30p_cnt']-$Tp_cnt;
            $total_30p_amt=$result2['30p_amt']-$Tp_amt;
            $total_70p_cnt=$result2['70p_cnt']-$Sp_cnt;
            $total_70p_amt=$result2['70p_amt']-$Sp_amt;
            $total_100p_cnt=$result2['100p_cnt']-$Hp_cnt;
            $total_100p_amt=$result2['100p_amt']-$Hp_amt;
            $total_otherp_cnt=$result2['otherp_cnt']-$Otp_cnt;
            $total_otherp_amt=$result2['otherp_amt']-$Otp_amt;
    
            $sql3=mysql_query("DELETE FROM taentrydetails WHERE reference_no = '".$reference."' AND set_number = '".$set_no."' ");
    
            if(mysql_affected_rows() >= 0)
            {
                $query4="UPDATE `tasummarydetails` SET `30p_cnt`='".$total_30p_cnt."',`30p_amt`='".$total_30p_amt."',`70p_cnt`='".$total_70p_cnt."',`70p_amt`='".$total_70p_amt."',`100p_cnt`='".$total_100p_cnt."',`100p_amt`='".$total_100p_amt."',`otherp_cnt`='".$total_otherp_cnt."',`otherp_amt`='".$total_otherp_amt."' WHERE `reference_no`='".$reference."'  ";
    
                $result4=mysql_query($query4);
    
               echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
            }
            else
            {
               echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
            }
    
        }
        else
        {
          // echo "HI";
            $query_delete = "DELETE from taentry_master where reference_no='".$reference."' AND empid='".$_SESSION['empid']."' ";
    
            $result = mysql_query($query_delete);
            if(mysql_affected_rows() >= 0)
            {
              $taentry_sql = "DELETE FROM taentrydetails WHERE reference_no = '".$reference."' AND empid = '".$_SESSION['empid']."' ";
              $res = mysql_query($taentry_sql);
              $tasummary_sql = "DELETE FROM tasummarydetails WHERE reference_no = '".$reference."' AND empid = '".$_SESSION['empid']."' ";
              $res1 = mysql_query($tasummary_sql);
               echo "<script>alert('Claim deleted successfully'); window.location='../Show_unclaimed_TA.php';</script>";
            }
            else
            {
              echo "<script>alert('Something went wrong');window.location='../Show_unclaimed_TA.php';</script>";
            }
        }
            
?>
    