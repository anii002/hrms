<?php
$GLOBALS['flag']="5.3";
include('common/header.php');
include('common/sidebar.php');
$ci=0;
$da=0;
?>

<div class="page-content-wrapper">
    <div class="page-content">

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home / मुख पृष्ठ</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">यात्रा भत्ता स्थिति विवरण / TA Tracking</a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption col-md-6 col-xs-6">
                    <b>यात्रा भत्ता स्थिति विवरण / TA Tracking </b>
                </div>
                <div class="caption col-md-6 text-right backbtn">
                    <button class=" btn btn-danger print btnhide" onclick="history.go(-1);">Back</button>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="add-train-title track">
                    <label>
                        <h4>Claim Reference Number - <?php echo $_GET['ref_no']; ?></h4>
                    </label>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                    <div class="boxtrack">

                        <?php
						$qry = mysqli_query($conn, "SELECT created_date,empid,is_rejected,rejected_by,reason FROM `taentry_master` WHERE reference_no='".$_GET['ref_no']."'");
						$row = mysqli_fetch_array($qry);
						
						$qry2 = mysqli_query($conn,$conn, "SELECT `name` FROM `employees` WHERE pfno = '".$row['empid']."' and dept='".$_SESSION['dept']."' ");
						$row2 = mysqli_fetch_array($qry2);
						
						$history_row = array();
						$qry1 = mysqli_query($conn, "SELECT * FROM `forward_data` WHERE reference_id='".$_GET['ref_no']."' ORDER BY id ASC");
						while($row1 = mysqli_fetch_assoc($qry1))
						{
							array_push($history_row, $row1);
						}
						$count = count($history_row);	
						
					?>
                        <div class="text-center">
                            <h5><?php echo $row2['name']; ?>(TA Claimant)</h5>
                            <p><?php echo $row['created_date'];?></p>
                            <?php
						 		if($row['is_rejected'] == 1)
						 		{
						 			$qry_rej = mysqli_query($conn, "SELECT `name` FROM `employees` WHERE pfno = '".$row['rejected_by']."'");
									$row_rej = mysqli_fetch_array($qry_rej);
									echo "Rejected By -".$row_rej['name']."<br>";
									echo "Reason is -".$row['reason'];
						 		}
						 		?>
                        </div>

                        <?php
							if($count != null)
							{	
							    
							for($i = 0; $i < $count; $i++)
							{

								$arrived_time = $history_row[$i]['arrived_time'];
								$depart_time=$history_row[$i]['depart_time'];
								//$history_row[$i]['fowarded_to'];
								//echo "SELECT employees.name as name,role FROM employees,users WHERE users.empid=employees.pfno and pfno = '".$history_row[$i]['fowarded_to']."' and employees.dept='".$_SESSION['dept']."'";
								$qry3 = mysqli_query($conn, "SELECT employees.name as name,role FROM employees,users WHERE users.empid=employees.pfno and pfno = '".$history_row[$i]['fowarded_to']."' and employees.dept='".$_SESSION['dept']."'");
								$row3 = mysqli_fetch_array($qry3);
								
								$curr = date("Y-m-d h:i:sa");
								$date1 = new DateTime($history_row[$i]['arrived_time']);
								$date2 = $date1->diff(new DateTime($curr));
								$d1 = $date2->d.' days'."\n";
								$d2 = $date2->h.' hours'."\n";
								$d3 = $date2->i.' minutes'."\n";
								$d4 = $date2->s.' seconds'."\n";
								
								$datetime1 = new DateTime($history_row[$i]['arrived_time']);
								$datetime2 = new DateTime($depart_time);
								$interval = $datetime1->diff($datetime2);
								$elapsed = $interval->format('%a days %h hours %i minutes %s seconds');
								//echo $history_row[$i]['hold_status'];
								if($history_row[$i]['hold_status'] == 0)
								{
								//echo $row3['name'];	
							?>
                        <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                        <div class="text-center">
                            <h5>
                                <?php
										// echo "ROLE ".$row3['role'];
										if($ci==0){
										   // if($row3['role']==12){
										   //      echo $row3['name']."(Controlling Incharge)";
										   //      $ci++;
										   //  } 
										    
										}
										
										else if($row3['role']=13){
										 echo $row3['name']."(Controlling Officer)";
										}
										?>
                            </h5>

                            <p>Received - <?php echo $arrived_time;?></p>
                            <p>Pending time - <?php echo $elapsed; ?></p>
                            <?php
									echo "<p>Approved - $depart_time </p>";
								} 
								else
								{ 
								    //echo "ROLE ".$row3['role'];
									if($row3['role']!='11'){
										?>

                            <div class="text-center">
                                <h5><?php
									
										if($row3["role"]==13){
										 echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>'.$row3["name"]."(Controlling Officer)";
										 
										 echo "</h5><p>Received - $arrived_time</p>";
										 echo "<p>Pending time - $elapsed</p>";
										}
								// 		else if($row3["role"]==12 && $ci==0){
								// 		 echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div><h5>'.$row3["name"]."(Controlling Incharge)"."</h5>";
								// 		  echo "<p>Received - $arrived_time</p>";
								// 		 echo "<p>Pending time - $elapsed</p>";
								// // 		 echo "<p>Pending from $d1.$d2.$d3.$d4</p>";
								// 		}
										
										?>



                                    <?php 
									//echo "<p>Pending from $d1.$d2.$d3.$d4</p>";
									}
									?>
                            </div>



                            <?php }
						if($i==1 && $da==0){
						    $da++;
						    $qry51 = mysqli_query($conn, "SELECT summary_id FROM `tasummarydetails` WHERE `reference_no`='".$_GET['ref_no']."'");
								$row51 = mysqli_fetch_array($qry5);
								//echo ("SELECT forward_status,estcrk_status,generated_date,DA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'");
								$qry61 = mysqli_query($conn, "SELECT forward_status,estcrk_status,pa_status,generated_date,DA_approved_time,PA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row51['summary_id']."'");
								$row61 = mysqli_fetch_array($qry61);
							if($history_row[$i]['hold_status'] == 1 && $row61['forward_status'] == "")
									{ 
									?>
                            <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                            <div class="text-center">
                                <h5><?php
											echo $row3['name']."(Departmental Admin)";	
											 ?></h5>
                                <p>Received - <?php echo $arrived_time;?></p>
                                <p>Pending time - <?php echo $elapsed; ?></p>
                                <?php 
									//	echo "<p>Pending from $d5.$d6.$d7.$d8</p>";
									}
						}
						
						}?>

                                <?php
								$qry9 = mysqli_query($conn, "SELECT arrived_time FROM `forward_data` WHERE `reference_id`='".$_GET['ref_no']."' ORDER BY id DESC LIMIT 1");
								$row9 = mysqli_fetch_array($qry9);

								$qry5 = mysqli_query($conn, "SELECT summary_id FROM `tasummarydetails` WHERE `reference_no`='".$_GET['ref_no']."'");
								$row5 = mysqli_fetch_array($qry5);
								//echo ("SELECT forward_status,estcrk_status,generated_date,DA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'");
							//	echo "SELECT forward_status,estcrk_status,generated_date,DA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'";
								$qry6 = mysqli_query($conn, "SELECT forward_status,estcrk_status,generated_date,DA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'");
								$row6 = mysqli_fetch_array($qry6);
								$dacount=mysqli_num_rows($qry6);
								//echo $row6['estcrk_status'];
								$qry7 = mysqli_query($conn, "SELECT `empid`,role FROM `users` WHERE role = '11' AND dept = '".$_SESSION['dept']."'");
								$row7 = mysqli_fetch_array($qry7);
								
								$qry8 = mysqli_query($conn,"SELECT name FROM `employees` WHERE pfno = '".$row7['empid']."'");
								$row8 = mysqli_fetch_array($qry8);
								
								$curr = date("Y-m-d h:i:sa");
								$date1 = new DateTime($row9['arrived_time']);
								$date2 = $date1->diff(new DateTime($curr));
								$d5 = $date2->d.' days'."\n";
								$d6 = $date2->h.' hours'."\n";
								$d7 = $date2->i.' minutes'."\n";
								$d8 = $date2->s.' seconds'."\n";
								
								$datetime1 = new DateTime($row9['arrived_time']);
								$datetime2 = new DateTime($row6['DA_approved_time']);
								$interval = $datetime1->diff($datetime2);
								$elapsed1 = $interval->format('%a days %h hours %i minutes %s seconds');
								//echo $history_row[$count-1]['hold_status'];
								 
							?>
                                <?php
									//echo "bgbg".$row6['forward_status'];
									//echo "ROLE ".$row3['role'];
									//if($i==3){
									if($row6['forward_status'] == 1)
									{
									    
									?>
                                <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                                <div class="text-center">
                                    <h5><?php
										// echo $row6['estcrk_status'];
											if($row7['role']==11)
											{
												echo $row8['name']."(Departmental Admin)";	
											} ?></h5>
                                    <p>Received - <?php echo $row9['arrived_time'];?></p>
                                    <p>Pending time - <?php echo $elapsed1; ?></p>
                                    <?php
										echo "<p>Approved - ".$row6['DA_approved_time']."</p>";
									} 
								
							//	}
									?>

                                    <!-- Personal Admin -->
                                    <?php
								$qry9 = mysqli_query($conn, "SELECT arrived_time FROM `forward_data` WHERE `reference_id`='".$_GET['ref_no']."' ORDER BY id DESC LIMIT 1");
								$row9 = mysqli_fetch_array($qry9);

								$qry5 = mysqli_query($conn, "SELECT summary_id FROM `tasummarydetails` WHERE `reference_no`='".$_GET['ref_no']."'");
								$row5 = mysqli_fetch_array($qry5);
								//echo ("SELECT forward_status,estcrk_status,generated_date,DA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'");
								$qry6 = mysqli_query($conn, "SELECT forward_status,estcrk_status,pa_status,generated_date,DA_approved_time,PA_approved_time,EST_approved_time FROM `master_summary` WHERE `summary_id`='".$row5['summary_id']."'");
								$row6 = mysqli_fetch_array($qry6);
								$dacount=mysqli_num_rows($qry6);
								//echo $row6['estcrk_status'];
								// echo $_SESSION['dept'];
								$qry7 = mysqli_query($conn, "SELECT `empid` FROM `users` WHERE role = '14' AND dept = '".$_SESSION['dept']."'");
								$row7 = mysqli_fetch_array($qry7);
								
								$qry8 = mysqli_query($conn, "SELECT name FROM `employees` WHERE pfno = '".$row7['empid']."'");
								//echo "SELECT `empid` FROM `users` WHERE role = '14' AND dept = '".$_SESSION['dept']."'"";
								$row8 = mysqli_fetch_array($qry8);
								
								$curr = date("Y-m-d h:i:sa");
								$date1 = new DateTime($row6['DA_approved_time']);
								$date2 = $date1->diff(new DateTime($curr));
								$d5 = $date2->d.' days'."\n";
								$d6 = $date2->h.' hours'."\n";
								$d7 = $date2->i.' minutes'."\n";
								$d8 = $date2->s.' seconds'."\n";
								
								$datetime1 = new DateTime($row6['DA_approved_time']);
								$datetime2 = new DateTime($row6['PA_approved_time']);
								$interval = $datetime1->diff($datetime2);
								$elapsed1 = $interval->format('%a days %h hours %i minutes %s seconds');
								//echo $history_row[$count-1]['hold_status'];
								 
							?>
                                    <?php
								//echo $row6['forward_status'];
								 if($row6['forward_status'] == 1)
								 {
									if($row6['pa_status'] == 1)
									{
									?>
                                    <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                                    <div class="text-center">
                                        <h5><?php
										// echo $row6['estcrk_status'];
											// if($row3['role']==14)
											// {
												echo $row8['name']."(Personnel Admin)";	
											// } ?></h5>
                                        <p>Received - <?php echo $row6['DA_approved_time'];?></p>
                                        <p>Pending time - <?php echo $elapsed1; ?></p>
                                        <?php
										echo "<p>Approved - ".$row6['PA_approved_time']."</p>";
									} 
									else
									{ 
									?>
                                        <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                                        <div class="text-center">
                                            <h5><?php
											echo $row8['name']."(Personal Admin)";	
											 ?></h5>
                                            <p>Received - <?php echo $row6['DA_approved_time'];?></p>
                                            <p>Pending time - <?php echo $elapsed1; ?></p>
                                            <?php 
										echo "<p>Pending from $d5.$d6.$d7.$d8</p>";
									}
								}
									?>
                                            <!-- Personal Admin -->

                                            <!-- ESTCLERK -->
                                            <?php
									//echo $row['empid'];
									$query_bu = mysqli_query($conn, "SELECT `BU` FROM `employees` WHERE pfno = '".$row['empid']."'");
									$row_bu = mysqli_fetch_array($query_bu);

									$query_bu_users = mysqli_query($conn, "SELECT `empid`,`billunit` FROM `users` WHERE role = '5'");
									while($row_bu_users = mysqli_fetch_array($query_bu_users))
									{
										$b=array();
										// echo $b=$row_bu_users['billunit']."<br>";
						    			 $b=explode(",",$row_bu_users['billunit']);
						    			  // print_r($b);
						    			 if(in_array($row_bu['BU'], $b))
						    			 {
						    			 	//echo $row_bu_users['empid'];
						    			 	$q_name = mysqli_query($conn, "SELECT `name` FROM `employees` WHERE pfno = '".$row_bu_users['empid']."'");
						    			 	$row_name_emp = mysqli_fetch_array($q_name);
						    			 	// echo $row_name_emp['name'];
						    			 }
									}
								
									// $query_name = mysqli_query("SELECT name FROM employees WHERE pfno = '".$row_bu_users['empid']."'");
									// $row_name = mysqli_fetch_array($query_name);
									// echo $row_name['name'];

									$curr = date("Y-m-d h:i:sa");
									$date1 = new DateTime($row6['PA_approved_time']);
									$date2 = $date1->diff(new DateTime($curr));
									$d5 = $date2->d.' days'."\n";
									$d6 = $date2->h.' hours'."\n";
									$d7 = $date2->i.' minutes'."\n";
									$d8 = $date2->s.' seconds'."\n";
									
									$datetime1 = new DateTime($row6['PA_approved_time']);
									$datetime2 = new DateTime($row6['EST_approved_time']);
									$interval = $datetime1->diff($datetime2);
									$elapsed1 = $interval->format('%a days %h hours %i minutes %s seconds');
									//echo $row6['forward_status'];
									if($row6['pa_status'] == 1)
									{	

									if($row6['estcrk_status'] == 1)
									{
									?>
                                            <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                                            <div class="text-center">
                                                <h5><?php
											// if($row3['role']==8)
											// {
											// 	echo $row8['name']."(ESTCLERK)";	
											// }
											echo $row_name_emp['name']."(ESTCLERK)"; 
											?></h5>
                                                <p>Received - <?php echo $row6['PA_approved_time'];?></p>
                                                <p>Pending time - <?php echo $elapsed1; ?></p>
                                                <?php
										echo "<p>Approved - ".$row6['EST_approved_time']."</p>";
									} 
									else
									{ 
									?>
                                                <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                                                <div class="text-center">
                                                    <h5><?php
											// if($row3['role']==8)
											// {
											// 	echo $row8['name']."(ESTCLERK)";	
											// }	
										echo $row_name_emp['name']."(ESTCLERK)";
									
											 ?></h5>
                                                    <p>Received - <?php echo $row6['PA_approved_time'];?></p>
                                                    <p>Pending time - <?php echo $elapsed1; ?></p>
                                                    <?php 
										echo "<p>Pending from $d5.$d6.$d7.$d8</p>";
									}
								}
									?>
                                                </div>

                                                <!-- ESTCLERK -->

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
	include 'common/footer.php';
?>



                        <!-- File export script -->
                        <script type="text/javascript">
                        $(document).ready(function() {
                            $('#example').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copyHtml5',
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
                                ]
                            });
                        });
                        </script>

                        <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"
                            type="text/javascript"></script>
                        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"
                            type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"
                            type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"
                            type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"
                            type="text/javascript"></script>
                        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"
                            type="text/javascript"></script>