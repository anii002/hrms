<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

  require_once("../../global/pemployee_header.php");
  require_once("../../global/pemployee_topbar.php");
  require_once("../../global/pemployee_sidebar.php");
  require_once("Ago.php");
  error_reporting(0);
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
          Track Claimed Contingency Bill
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    
    <section class="content">

        <div class="box box-info">
       
          <div class="box-body">
            <div class="col-xs-12 table-responsive">
                <h4>Claim Reference Number : <?php echo $_REQUEST['id'];  ?></h4>
            </div>
            <div class="col-xs-12">
                <div class=" col-xs-12 col-md-6 col-md-offset-3 text-center" style="background-color: gray; color:white; padding: 20px;">
                    <?php 
                    $query = "SELECT * FROM `master_cont` INNER JOIN bill_forward ON bill_forward.reference_id = master_cont.reference_no where master_cont.reference_no='".$_REQUEST['id']."'";
                    //echo $query;
                    $result = mysql_query($query);
                    $temp = 1;
                    $records = mysql_num_rows($result);
                    $name = explode("/", $_REQUEST['id']);
					$query_summary = mysql_query("SELECT * FROM `tbl_summary` where id in (select summary_id from tbl_summary_details where reference='".$_REQUEST['id']."')");
					$result_forward = mysql_fetch_array($query_summary);
					$forward_status = $result_forward['forward_status'];
                    while($values = mysql_fetch_array($result))
                    {
                      
                      if($temp==1)
                      {
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
                              //echo $posted_at1." ".$posted_at2;
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
            							    $query_user = mysql_query("SELECT * FROM `users` where empid='".$values['fowarded_to']."'");
            								$result_user = mysql_fetch_array($query_user);

                             if($values['empid']==$values['fowarded_to'] and $values['admin_returned']!="0000-00-00 00:00:00" and $values['admin_returned_status']=='1')
                           {
                            echo "<p>Claim rejected by Establishment Admin";
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])."</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($posted_at2);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo " <p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo " <p> Pending from ".$elapsed."</p>";
                           }

                           else if($result_user['role']=='2' and $values['depart_time']==null)
                           {
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ADFM]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($posted_at2);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              // echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Pending from ".$elapsed."</p>";
                              echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }

                           else if($result_user['role']=='2' and $values['depart_time']!=null)
                           {
                           $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ADFM]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $date=date_create($values['depart_time']);
                              echo "<p>Approved - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo " <p>Summary Report Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo " <p>Summary Report Approved after ".$elapsed."</p>";
                               echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
                          else if($result_user['role']=='2' and $values['depart_time']==null)
                           {
                            $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ADFM]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";
                           }
                          else if($result_user['role']=='5' and $values['depart_time']!=null and $result_forward['est_approved']=='1')
                           {
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ESTABLISHMENT CLERK]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Approved after ".$elapsed."</p>";
                              echo "Contingency Bill Claim Approved successfully";
                           }
                           else if($result_user['role']=='5' and $values['depart_time']!=null and $values['admin_returned_status']=='0')
                           {
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ESTABLISHMENT CLERK]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Rejected at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Rejected after ".$elapsed."</p>";
                              echo "Contingency Bill Claim Rejected by Clerk";
                              echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
                           //est admin 
                           else if($values['admin_returned_status']=='1')
                           {
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ESTABLISHMENT CLERK]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                                $date=date_create($values['depart_time']);
                              echo "<p>Rejected at - ".date_format($date,"d/m/Y H:i")."</p>";
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p> Rejected after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Rejected after ".$elapsed."</p>";
                              echo "Contingency Bill Claim Rejected by Clerk";
                              echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
                          else if($result_user['role']=='5' and $values['depart_time']==null)
                           {
                              $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ESTABLISHMENT CLERK]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";
                           }
                           else if($result_user['role']=='3' and $values['admin_approve']=='1' and $values['summary']=='1' and $values['depart_time']!=null)
                           {
                            $posted_at2 = $values['admin_approved'];
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            echo "<p>".employee($values['fowarded_to'])." [ADMIN SO]</p>";
                            $date=date_create($values['arrived_time']);
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $date=date_create($values['admin_approved']);
                              echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>
                                         <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                               echo "<p>Summary has been generated and forwarded to ADFM</p>";
                               $date=date_create($values['depart_time']);
                              echo "<p>forwarded at - ".date_format($date,"d/m/Y H:i")."</p>";
                               $posted_at2 = $values['depart_time'];
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $posted_at1 = $values['admin_approved'];
                            $unixTimestamp1 = $ago->convertToUnixTimestamp2($posted_at1);
                             $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                              //echo "<p>forwarded after  ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p>forwarded after  ".$elapsed."</p>";
                               echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
          							   else if($result_user['role']=='3' and $values['admin_approve']=='1')
          							   {
                            $posted_at2 = $values['admin_approved'];
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            echo "<p>".employee($values['fowarded_to'])." [ADMIN SO]</p>";
                            $date=date_create($values['arrived_time']);
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $date=date_create($values['admin_approved']);
          								  echo "<p>Approved at - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Approved after ".$elapsed."</p>";
                            echo "<p>Waiting for summary generation</p>";
          							   }
                           
                           else if($result_user['role']=='3' and $values['admin_approve']=='0')
                           {
                              $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [ADMIN SO]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$elapsed."</p>";

                           }
                           else if($result_user['role']=='4' and $values['depart_time']==null)
                           {
                              $posted_at2 = date('Y-m-d H:i:s');
                            $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [SO]</p>";
                            echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                            $datetime1 = new DateTime($values['arrived_time']);
                            $datetime2 = new DateTime($posted_at2);
                            $interval = $datetime1->diff($datetime2);
                            $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                            //echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                            echo "<p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                           }
                           else if($result_user['role']=='4' and $values['depart_time']!=null)
                           {
                            $date=date_create($values['arrived_time']);
                            echo "<p>".employee($values['fowarded_to'])." [SO]</p>";
                              echo "<p>Received - ".date_format($date,"d/m/Y H:i")."</p>";
                              $date=date_create($values['depart_time']);
                              echo "<p>Approved - ".date_format($date,"d/m/Y H:i")."</p>";
                              echo "<p>Forward - ".date_format($date,"d/m/Y H:i")."</p>";
                              //echo $unixTimestamp1;
                              $datetime1 = new DateTime($values['arrived_time']);
                              $datetime2 = new DateTime($values['depart_time']);
                              $interval = $datetime1->diff($datetime2);
                              $elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
                               //echo "<p> Moment verified after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                              echo "<p> Moment verified after ".$elapsed."</p>";
                               echo  "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                           }
                        }
                     }
                  }
                  function get_forward_date($count)
                  {
                    $count = $count - 1;
                      $sql = "SELECT forwarded_at FROM `bill_forward` WHERE `reference_id` = '".$_REQUEST['id']."' LIMIT ".$count.", 1";
                      $result = mysql_query($sql);
                      $data = mysql_fetch_array($result);
                      return $data['forwarded_at'];
                      //return $sql;
                  }
                  ?>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>

    </section>
  </div>
  <!--Content code end here--->
 <?php
  require_once("../../global/footer.php");
 ?>
