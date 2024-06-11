<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://drmpsur-hrms.in/e-apar/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<!--link rel="stylesheet" href="style.css" media="screen"/-->
 <script> </script> 
<style>
	.primary
	{
		box-shadow: none;
		border-color: #337AB7;
	} 
</style>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		    <h1 class="pull-left"> Employee Management </h1>
		    <a href="frmsample.php" class="pull-right"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> </i> Back</button></a>
		    <!--<ol class="breadcrumb"> -->
			   <!-- <li class="active">-->
				  <!--  <a href="frmsample.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> </i> Back</button></a>-->
		    <!--    </li>-->
		    <!--</ol> -->
		    <br><br>
		</section>
	
		<!-- Main content -->
		<section class="content"> 
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
						  <h3 class="" style="text-align:center;margin-top:0px;"> Employee Report </h3>
						  <hr>
						</div> 
						<div class="box-body">
							<form action="" method="GET"  enctype="multipart/form-data" role="form" id="frmemplogindetails">
								<div class="col-md-4">
								    <label>Enter Employee PF No:</label>
								</div>
								<div class="col-md-4">
    								<div class="form-group">
        								<div class="input-group">
        								    <input type="text" name="q" class="form-control" placeholder="Search..." id="q" required>
        								    <span class="input-group-btn">
        									    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i> </button>
        								    </span>
        								</div>
    								</div>
								</div> 
							</form>
						</div>
						<div class="table-responsive"> 
                			<?php
                			if(isset($_GET["q"]))
                			{
                			$getid=$_GET["q"];
                			$sqlemployee=mysql_query("select * from tbl_employee where emplcode like '%$getid%' or empname like '%$getid%'");
                				echo "<table class='table table-striped table-bordered table-hover' style='font-size:11px;' id='tbl_employee'>
                						<thead>
                							<tr class='odd gradeX'>
                								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
                								<th>empid</th>
                								<th> Name </th>
                								<th> design </th>
                								<th> station </th>
                								<th> pay scale </th>
                								<!--<th><i class='fa fa-cog'></i> year</th>
                								<th> Action</th>-->
                							";
                							
                							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
                							while($rev = mysql_fetch_array($sql))
                							{
                							   echo "<th>".$rev['years']."</th>";
                							}
                							echo "<th> Edit </th>";
                							echo"</tr>";
                							
                						   echo"</thead>";
                				while($rwEmployee=mysql_fetch_array($sqlemployee,MYSQL_ASSOC))
                				{
                					$empid=$rwEmployee["empid"];
                					$year=$rwEmployee["year"];
                					$emplcode=$rwEmployee["emplcode"];
                					$dept=$rwEmployee["dept"];
                					$design=$rwEmployee["design"];
                					$station=$rwEmployee["station"];
                					$payscale=$rwEmployee["payscale"];
                					$year=$rwEmployee["year"];
                					$uploadfile=$rwEmployee["uploadfile"];
                					$empname = $rwEmployee["empname"];
                					
                					//echo $rwEmployee["registerno"];
                					//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
                						echo "<tr class='headings'>	
                							<td style='display:none; id='tdempid$empid'>$empid</td>
                							<td id='tdemplcode$empid'><a href='frmshowemployee.php?emppf=$emplcode'>$emplcode</a></td>
                							<td id='tddept$empid'>$empname</td>
                							<td id='tddesign$empid'>$design</td>
                							<td id='tdstation$empid'>$station</td>
                							<td id='tdstation$empid'>$payscale</td>";
                							$i=0;
                							$sql=mysql_query("SELECT * FROM year order by id desc limit 7");
                						
                							while($rev = mysql_fetch_array($sql))
                							{
                								//$sql_query = mysql_query("select * from scanned_apr where empid='".$empid."' AND year='".$rev['years']."'");
                								$sql_query = mysql_query("select * from scanned_img where empid='".$emplcode."' AND year='".$rev['years']."'");
                								$result=mysql_fetch_array($sql_query);
                								$demo_year=$rev['years'];
                								//$emppf=$rwEmployee["emplcode"];
                								
                								if($result['image']!="")
                								{
                								$query = mysql_query("select * from scanned_apr where empid='".$emplcode."' AND year='".$rev['years']."'");
                									$rwQuery = mysql_fetch_array($query);
                									$Rtype = $rwQuery['reporttype'];
                									if($rwQuery['reporttype']=='APAR Report')
                									{
                										
                								?>
                								<td  style="font-size:10px;"><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><label style="color:green;font-size:10px;">AV[AR]</label></td>
                								<?php
                									
                									}
                									else
                									{
                								?>
                									<td  ><input type="hidden" value="<?php echo $rwQuery['reporttype'];?>"><label style="color:green;">AV[WR]</label></td>
                								<?php
                									}
                								}else
                								{
                								$sqlreason=mysql_query("select * from tbl_reason where  empcode='$emplcode' AND financialyear='$demo_year'");
                								$rwReason=mysql_fetch_array($sqlreason);
                									
                									if(isset($rwReason["reasontype"])!='')
                									{
                									echo "<td id='tduploadfile$empid'>".$rwReason["reasontype"]."</td>";
                									}else
                									{
                									echo "<td id='tduploadfile$empid'>NA</td>";
                									
                									}
                									
                								?>
                								
                								<?php
                								}
                							}
                							echo "<td style='font-size:10px;width:3px;'><a href='frmeditemployee.php?emppf=" . $emplcode. "' style='font-size:18px'><i class='fa fa-check-square-o'></i></a><a href='frmviewemployee.php?emppf=" . $emplcode. "' style='font-size:18px'><i class='fa fa-user'></i></a></td>";
                						 echo "</tr>";
                						 
                				}
                				echo "</table>";
                			}
                				?>
            			 </div>	
					</div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
 	
   <?php
 include_once('../global/footer.php');
 ?> 