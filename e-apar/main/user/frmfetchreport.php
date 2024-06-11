<?php

	include('../dbconfig/dbcon.php');
	dbcon(); 
	
	
$cat_id = ($_REQUEST["txtstartyear"] <> "") ? trim($_REQUEST["txtstartyear"] ) : "";
if ($cat_id <> "")
 {
 
	$cat_id=$_POST["txtstartyear"];
	    ?>
		
					<div class="row">
							<table class='table table-striped table-bordered table-hover' id='example'>
											<thead>
													<tr class='odd gradeX'>
														<th style='display:none;'> Employee Code</th>
														<th style=''></th>
														<th> PF No</th>
														<th> Name </th>
														<th> Design </th>
														<th> Station </th>
														<th> Pay Scale </th>
														<?php
														$getyear=$_REQUEST["txtstartyear"];
														$sql=mysql_query("SELECT * FROM year order by id desc limit $cat_id");
														while($rev = mysql_fetch_array($sql))
														{
														?>
														   <th><?php echo $rev['years']; ?></th>
													   <?php
														}
														?>
														
													</tr>
													
											</thead>
									  
										<tbody>
										  <?php
										$sqlemployee=mysql_query("select * from tbl_employee order by empid asc");
										while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
										{
											$empid=$rwEmployee["empid"];
											$year=$rwEmployee["year"];
											$emppf=$rwEmployee["emplcode"];
											$dept=$rwEmployee["dept"];
											$design=$rwEmployee["design"];
											$station=$rwEmployee["station"];
											$payscale=$rwEmployee["payscale"];
											$year=$rwEmployee["year"];
											$uploadfile=$rwEmployee["uploadfile"];
											$empname = $rwEmployee["empname"];
											
										?>
										<tr class="headings">	
													<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
													<td id="tdempid$empid"><input type="checkbox" name="check_list[]" value=<?php echo $empid; ?>/></td>
													<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
													<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
													<td id="tddept$empid"><?php echo $empname; ?></td>
													<td id="tddesign$empid"><?php echo $design; ?></td>
													<td id="tdstation$empid"><?php echo $station; ?></td>
													<td id="tdstation$empid"><?php echo $payscale; ?></td>
													<?php
													$i=0;
													$sql=mysql_query("SELECT * FROM year order by id desc limit $cat_id");
													while($rev = mysql_fetch_array($sql))
													{
														//$sql_query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
														$sql_query = mysql_query("select * from scanned_img where empid='".$emppf."' AND year='".$rev['years']."'");
														$result=mysql_fetch_array($sql_query);
														$demo_year=$rev['years'];
														//$emppf=$rwEmployee["emplcode"];
														
														if($result['image']!="")
														{
															$query = mysql_query("select * from scanned_apr where empid='".$emppf."' AND year='".$rev['years']."'");
															$rwQuery = mysql_fetch_array($query);
															$Rtype = $rwQuery['reporttype'];
															if($rwQuery['reporttype']=='APAR Report')
															{
														?>
														<td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;">AV[AR]</label></td>
														<?php
															}
															else
															{
														?>
															<td><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev["years"]; ?>" ><label style="color:green;">AV[WR]</label></td>
														<?php
															}
														}else
														{
														$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
														$rwReason=mysql_fetch_array($sqlreason);
															
															if(isset($rwReason["reasontype"])!='')
															{
															echo "<td id='tduploadfile$empid'><span>".$rwReason["reasontype"]."</span></td>";
															}else
															{
															echo "<td id='tduploadfile$empid'><span>NA</span></td>";
															
															}
															
														?>
														<?php
														}
													}
													?>
													
												 </tr>
										<?php
										
										}
										?>
										</tbody>
							</table>
					</div>
					
					
					
     
        <?php
   }
?>