<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

require_once("../../global/ctrl_officer_header.php");
  require_once("../../global/ctrl_officer_topbar.php");
  require_once("../../global/ctrl_officer_sidebar.php");
  require_once("Ago.php");
  error_reporting(0);
  function employee($id)
{
  global $con;
  $query = "select name from employees where pfno='$id'";
  $result = mysql_query($query);
  $value = mysql_fetch_array($result);
  return $value['name'];
}
?>
<style type="text/css">
  .sidebar-mini.sidebar-collapse .content-wrapper{
    /*margin-left: 25px !important;*/
  }
</style>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
          Track TA Claim
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;padding-left:20px;">
            
                  <form class="form-horizontal " action="testData2.php" method="post" enctype="multipart/form-data">
                <div class="tab-pane " id="settings">
                  <div class="row">
                    <div class="col-md-12">
                      <h4>Claim Reference Number : <?php echo $_REQUEST['id'];  ?></h4>
                      <div class="col-xs-offset-0 col-xs-12 col-md-6 col-md-offset-3 text-center" style="background-color: gray; color:white; padding: 20px;">
                    <?php 
                     $approved_status='0';
                    $query = "SELECT * FROM `taentryform_master` INNER JOIN forward_data ON forward_data.reference_id = taentryform_master.reference where taentryform_master.reference='".$_REQUEST['id']."'";
                    $result = mysql_query($query);
                    $temp = 1;
					$cnttt=0;
                    $records = mysql_num_rows($result);
                    $name = explode("/", $_REQUEST['id']);
					$query_summary = mysql_query("SELECT * FROM `tbl_summary` where id in (select summary_id from tbl_summary_details where reference='".$_REQUEST['id']."')");
					$result_forward = mysql_fetch_array($query_summary);
					$forward_status = $result_forward['forward_status'];
                    while($values = mysql_fetch_array($result))
                    {
                       
						// $cnttt++;
                      // echo $cnttt.", ";
                      if($temp==1)
                      {
                          //echo "as";
                          echo "<p>".employee($name[0])." [Employee]</p>
                       <p>".$values['created_at']."</p>
                       <p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                       $temp++;
                      }
                      if($temp!=1)
                      {
                           
                          if($values['forward_status']=="1")
                          {
                                $posted_at1 = $values['arrived_time']; //now()
                                $posted_at2 = $values['depart_time']; //now()
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              $query_user = mysql_query("SELECT * FROM `users` where empid='".$values['fowarded_to']."'");
                            $result_user = mysql_fetch_array($query_user);
							// Rejected 1
                              if($values['empid']==$values['fowarded_to'] and $values['admin_returned']!="0000-00-00 00:00:00")
                           {    
                            // echo "<p>Claim rejected by Establishment Admin";
                            // $posted_at2 = date('Y-m-d H:i:s');
                            // $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            // $date=date_create($values['arrived_time']);
                            // echo "<p>".employee($values['fowarded_to'])."</p>";
                              // echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              // $datetime1 = new DateTime($values['arrived_time']);
                              // $datetime2 = new DateTime($posted_at2);
                              // $interval = $datetime1->diff($datetime2);
                              // $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo " <p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              // echo " <p> Pending from ".$elapsed."</p>";
                            }
						   
							// Pending By CI
                           else if($result_user['role']=='12' and $values['depart_time']==null)
                           {
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Controlling Incharge]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($posted_at2);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                             // // echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Pending from ".$elapsed."</p>";
                              echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
							// Approved By CI
                           else if($result_user['role']=='12' and $values['depart_time']!=null)
                           {
                           $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Controlling Incharge]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $date=date_create($values['depart_time']);
                              echo "<p>Approved - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                               //echo " <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                               echo " <p>Approved after ".$elapsed."</p>";
                               echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
						   
						   // Pending By CO 
                          else if($result_user['role']=='13' and $values['depart_time']==null)
                           {
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Controlling Officer]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";
                           }
						   
						   // Approved  Pending By CO
						   
                          else if($result_user['role']=='13' and $values['depart_time']!=null)
                           {
							   $date="";
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Controlling Officer]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Approved - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              // echo "<p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Approved after ".$elapsed."</p>";
                             // echo "Travelling Allowance Claim Approved successfully";
							  echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
							   $approved_status='1';
                           }
						   // Pending By DA
						   
                          else if($result_user['role']=='11' and $values['depart_time']==null and  $approved_status='0')
                           {
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Departmental Admin]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";
                           } 
                           else if($result_user['role']=='11' and $values['depart_time']==null and  $approved_status='1')
                           {
                           //echo "asdasd";
                           }
						   // Approved By DA
                           else if($result_user['role']=='11' and $values['depart_time']!=null)
                           {
							  
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Departmental Admin]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Approved after ".$elapsed."</p>";
                              //echo "Travelling Allowance Claim Rejected by Clerk";
                              echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
							   
                           }
						   // OK 
                           //est clerk 
                           // else if($values['admin_returned_status']=='1')
                           // {

                            // $date=date_create($values['arrived_time']);
                            // echo "<p>".employee($values['fowarded_to'])." [ESTABLISHMENT CLERK]</p>";
                              // echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                // $date=date_create($values['depart_time']);
                              // echo "<p>Rejected at - ".date_format($date,"d/m/Y H:i")."</p>";
                              // $datetime1 = new DateTime($values['arrived_time']);
                              // $datetime2 = new DateTime($values['depart_time']);
                              // $interval = $datetime1->diff($datetime2);
                              // $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                             // //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              // echo "<p> Rejected after ".$elapsed."</p>";
                              // echo "Travelling Allowance Claim Rejected by Clerk";
                              // echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           // }
						   
						   // Pending By EST CLERK
                          else if($values['depart_time']==null and $values['hold_status']==1)
                           {
                              $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Account]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";
                           }
						   
						   // Approved By EST CLERK
						   else if($values['depart_time']!=null and $values['fowarded_to']=='12212325')
                           {
							  
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [Account]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Approved after ".$elapsed."</p>";
                              echo "Travelling Allowance Claim Approved by Clerk";
                             // echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
							   
                           }
						   // Pending By EST ADMIN
						   // else if($values['depart_time']==null and $values['hold_status']=='1')
                           // {
                              // $posted_at2 = date('Y-m-d H:i:s');
                            // $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            // $date=date_create($values['arrived_time']);
                            // echo "<p>".employee($values['fowarded_to'])." [Final Approval]</p>";
                            // echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            // $datetime1 = new DateTime($values['arrived_time']);
                            // $datetime2 = new DateTime($posted_at2);
                            // $interval = $datetime1->diff($datetime2);
                            // $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                           // //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            // echo "<p> Pending from ".$elapsed."</p>";
                           // }
						   
                           else if($values['admin_approve']=='1' and $values['summary']=='1' and $values['depart_time']!=null)
                           {
                               echo "asdasd";
							$posted_at2 = $values['admin_approved'];
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            echo "<p>".employee($values['fowarded_to'])." [Final Approval]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Approved after ".$elapsed."</p>";
							  echo "<br>[Travelling Allowance Claim Approved successfully]";
                              //echo "<p>forwarded after  ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              // echo "<p>forwarded after  ".$elapsed."</p>";
                               // echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
                            
                          
                        }
                     }
                  }
                  function get_forward_date($count)
                  {
                    $count = $count - 1;
                      $sql = "SELECT forwarded_at FROM `forward_data` WHERE `reference_id` = '".$_REQUEST['id']."' LIMIT ".$count.", 1";
                      $result = mysql_query($sql);
                      $data = mysql_fetch_array($result);
                      return $data['forwarded_at'];
                      //return $sql;
                  }
                  ?>
                </div>
                    
                    </div>
                    
                  </div>
                    
                </div>
                
              </div>
                  </form>
          </div>
        </div>
    </section>
  </div>
 <?php
  require_once("../../global/footer.php");
 ?>