<?php
  require_once("../../global/header.php");
  require_once("../../global/topbar.php");
  require_once("../../global/sidebar.php");
  require_once("Ago.php");
?>
  <div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
      <h1>
        Details of Claimed TA
      </h1>
    </section>
    <section class="content">

        <div class="box box-info">
       
          <div class="box-body">
            <div class="col-xs-12 table-responsive">
                <h4>Claim Reference Number : <?php echo $_REQUEST['id'];  ?></h4>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-offset-4 col-xs-4 text-center" style="background-color: gray; color:white; padding: 20px;">
                  <?php 
                    $query = "SELECT * FROM `taentryform_master` INNER JOIN forward_data ON forward_data.reference_id = taentryform_master.reference where taentryform_master.reference='".$_REQUEST['id']."'";
                    //echo $query;
                    $result = mysql_query($query);
                    $temp = 1;
                    $records = mysql_num_rows($result);
					$query_summary = mysql_query("SELECT * FROM `tbl_summary` where id in (select summary_id from tbl_summary_details where reference='".$_REQUEST['id']."')");
					$result_forward = mysql_fetch_array($query_summary);
					$forward_status = $result_forward['forward_status'];
                    while($values = mysql_fetch_array($result))
                    {
                      if($temp==1)
                      {
                          echo "<p>Employee</p>
                       <p>".$values['arrived_time']."</p>
                       <p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                      }
                      if($temp!=1)
                      {
                          if($values['depart_time']!="")
                          {
                                $posted_at1 = $values['arrived_time']; //now()
                                $posted_at2 = $values['depart_time']; //now()
                              $ago = new Ago();
                              //echo $posted_at1." ".$posted_at2;
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received- ".$values['arrived_time']."</p>";
							    $query_user = mysql_query("SELECT * FROM `users` where empid='".$values['fowarded_to']."'");
								$result_user = mysql_fetch_array($query_user);
							   if($forward_status=='1' && $result_user['role']=='3')
							   {
								    echo "<p>Summary Report has been generated at ".$result_forward['generated_date']." .</p>"; 
							   }
                               echo "<p>Approved : ".$values['depart_time']."</p>
                               <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
							   if($result_user['role']=='5')
								   echo "<p>Claim approved successfully";
                          }else if($values['admin_returned_status']=="1" && $values['depart_time']=='')
                          {
                              $posted_at1 = $values['arrived_time']; //now()
                              $query_time = "select CURRENT_TIMESTAMP;";
                              $result_time = mysql_query($query_time);
                              $value_time = mysql_fetch_array($result_time);
                                $posted_at2 = $value_time["CURRENT_TIMESTAMP"];
								$query_summary_inner = mysql_query("SELECT * FROM `forward_data` WHERE reference_id='".$_REQUEST['id']."' ORDER BY `id` ASC LIMIT 2 ");
							$result_forward_inner = mysql_fetch_array($query_summary_inner);
							$fowarded_to = $result_forward_inner['fowarded_to'];
                              //echo $posted_at2;
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
							  <p>Returned By : ".employee($result_forward_inner['fowarded_to'])."</p>
                               <p>Received - ".$values['arrived_time']."</p>
                               <p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                         }
                          else if($values['admin_approve']=="0" && $values['depart_time']=='')
                          {
                              $posted_at1 = $values['arrived_time']; //now()
                              $query_time = "select CURRENT_TIMESTAMP;";
                              $result_time = mysql_query($query_time);
                              $value_time = mysql_fetch_array($result_time);
                                $posted_at2 = $value_time["CURRENT_TIMESTAMP"];
                              //echo $posted_at2;
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received - ".$values['arrived_time']."</p>
                               <p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                         }else if($values['admin_approve']=="0" && $forward_status=='1')
                          {
                              $posted_at1 = $values['arrived_time']; //now()
                              $query_time = "select CURRENT_TIMESTAMP;";
                              $result_time = mysql_query($query_time);
                              $value_time = mysql_fetch_array($result_time);
                                $posted_at2 = $value_time["CURRENT_TIMESTAMP"];
                              //echo $posted_at2;
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received - ".$values['arrived_time']."</p>
                               <p> Pending from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                         }
						 else if($values['summary']=="0" ){
							 $posted_at1 = $values['arrived_time']; //now()
                                $posted_at2 = $values['admin_approved']; //now()
                              $ago = new Ago();
                              //echo $posted_at1." ".$posted_at2;
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received- ".$values['arrived_time']."</p>
                               <p>Approved : ".$values['admin_approved']."</p>
                               <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
							   echo "<p>Generating Summary.... </p>"; 
						 }
						 else if($values['summary']!="0" && $forward_status=='0'){
							 $posted_at1 = $values['arrived_time']; //now()
                                $posted_at2 = $values['admin_approved']; //now()
                              $ago = new Ago();
                              //echo $posted_at1." ".$posted_at2;
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received- ".$values['arrived_time']."</p>
                               <p>Approved : ".$values['admin_approved']."</p>
                               <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
							   $query_summary = mysql_query("SELECT * FROM `tbl_summary` where id in (select summary_id from tbl_summary_details where reference='".$_REQUEST['id']."')");
							   $query_result = mysql_fetch_array($query_summary);
							   echo "<p>Summary Report has been generated at ".$query_result['generated_date']." .</p>"; 
						 }
						 else if($values['summary']=="1" && $forward_status=='1')
						 {
							 $posted_at1 = $values['arrived_time']; //now()
                              $query_time = "select CURRENT_TIMESTAMP;";
                              $result_time = mysql_query($query_time);
                              $value_time = mysql_fetch_array($result_time);
                                $posted_at2 = $value_time["CURRENT_TIMESTAMP"];
                              //echo $posted_at2;
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received - ".$values['arrived_time']."</p>";
							   $query_user = mysql_query("SELECT * FROM `users` where empid='".$values['fowarded_to']."'");
								$result_user = mysql_fetch_array($query_user);
								if($result_user['role']=='5')
								{
									echo "<p> Waiting for Final approval from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
								}else{
                               echo "<p> Waiting for summary report approval from ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
								}
						 }
                      }
                      else
                      {

                          if($values['depart_time']!="")
                          {
                                $posted_at1 = $values['arrived_time']; //now()
                               // $posted_at1 = $values['created_at']; //now()
                                $posted_at2 = $values['depart_time'];//now()
                              //echo $posted_at1;
                              $ago = new Ago();
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received- ".$values['arrived_time']."</p>
                               <p>Approved at ". $values['depart_time']."</p>
                               <p> Approved after ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                          }
                          else
                          {
                              $posted_at1 = $values['arrived_time']; //now()
                              $query_time = "select CURRENT_TIMESTAMP;";
                              $result_time = mysql_query($query_time);
                              $value_time = mysql_fetch_array($result_time);
                                $posted_at2 = $value_time["CURRENT_TIMESTAMP"];
                              $ago = new Ago();
                              //echo $posted_at1;
                              $unixTimestamp1 = $ago->convertToUnixTimestamp1($posted_at1);
                              $unixTimestamp2 = $ago->convertToUnixTimestamp2($posted_at2);
                              echo "<p>".employee($values['fowarded_to'])."</p>
                               <p>Received - ".$values['arrived_time']."</p>
                               <p> Pending From ".$ago->convertToAgoFormat($unixTimestamp1,$unixTimestamp2)."</p>";
                         }
                      }
                       if($records!=$temp)
                        echo "<p style='background-color: transparent;'> <i class='fa fa-arrow-down fa-2x' aria-hidden='true'></i></p>";
                      $temp =$temp+1;
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
