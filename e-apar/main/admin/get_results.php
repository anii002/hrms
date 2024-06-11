<?php


include("../dbconfig/dbcon.php");
dbcon();


?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<table class='table table-striped  table-hover' id='tbl_employee' style="font-size:10px;text-align:left;">
				<tbody>
				<?php
			  if(isset($_POST['getresult']))
		  {
			$no = $_POST['getresult'];
			///$select = mysql_query("select emplcode from tbl_employee limit $no,10");
			$sqlemployee=mysql_query("select * from tbl_employee limit $no,50");
		 
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
							<td id="tdempid$empid" ><input type="checkbox" name="check_list[]" value=<?php echo $emppf; ?> /></td>
							<!--td id="tdemppf$empid"><?php echo $emppf; ?></a></td-->
							<td id="tdemppf$empid" class="rows"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
							<td id="tddept$empid"><?php echo $empname; ?></td>
							<td id="tddesign$empid"><?php echo $design; ?></td>
							<!--td id="tdstation$empid"><?php echo $station; ?></td-->
							<td id="tdstation$empid"><?php echo $payscale; ?></td>
							<?php
							$i=0;
							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
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
								<td  style="font-size:10px;"><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value=<?php echo $rev["years"]; ?> ><label style="color:green;font-size:10px;">AV[AR]</label></td>
								<?php
									
									}
									else
									{
								?>
									<td  ><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><input type="checkbox" name="year_list[<?php echo $emppf; ?>][]" value="<?php echo $rev["years"]; ?>" ><label style="color:green;">AV[WR]</label></td>
								<?php
									}
								}else
								{
								$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emppf' AND financialyear='$demo_year'");
								$rwReason=mysql_fetch_array($sqlreason);
									
									if(isset($rwReason["reasontype"])!='')
									{
									echo "<td id='tduploadfile$empid'><a href='frmshowreasone.php?emppf=$emppf&year=$demo_year&empid=$empid'  id='$empid'>".$rwReason["reasontype"]."</a></td>";
									}else
									{
									echo "<td id='tduploadfile$empid'><a href='frmaddreason.php?emppf=$emppf&year=$demo_year&empid=$empid' role='button' >NA</a></td>";
									
									}
									
								?>
								<?php
								}
							}
							?>
							<td style="font-size:10px;width:3px;"><?php echo '<a href="frmeditemployee.php?emppf=' . $emppf. '"><i class="fa fa-check-square-o"></i></a> '?></td>
							<td style="font-size:10px;width:3px;"><?php echo '<a href="frmviewemployee.php?emppf=' . $emppf. '"><i class="fa fa-eye"></i></a> '?></td>
						
						 </tr>
				<?php
				
				}
  }
				?>