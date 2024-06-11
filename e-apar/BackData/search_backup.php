<?php 
 session_start();
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

?>
<!--link rel="stylesheet" href="style.css" media="screen"/-->
 <script>

</script> 
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
		  <h1>
			Employee Management
		  </h1>
		  <ol class="breadcrumb">
		   
			<li class="active">
				<a href="frmsample.php"><button type="button" class="btn btn-success" id="#btn1"><i class="fa fa-mail-reply"> Back</i></button></a>
		
		  </li>
		  </ol>
		  <br>
		</section>
	
		<!-- Main content -->
		<section class="content">
		  <!-- Small boxes (Stat box) -->
		
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header">
						  <h3 class="" style="text-align:center;">
						  Employee Report
						  </h3>
						</div>
								<!-- /.box-header -->
						<div class="box-body">
							<form action="" method="GET"  enctype="multipart/form-data" role="form" id="frmemplogindetails">
								<div class="col-md-4">
								<label>Enter Employee PF No:</label>
								</div>
								<div class="col-md-4">
								<div class="form-group">
								<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search..." id="q">
								  <span class="input-group-btn">
									<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
									</button>
								  </span>
								</div>
								</div>
								</div>
								
								
							</form>
						</div>
						<div class="table-responsive"><br>
						<?php
						if(isset($_GET["q"]))
						{
						$getid=$_GET["q"];
						//echo $getid;
						$sql_query=mysql_query("select * from tbl_employee where emplcode='".$getid."'");
						while($rwEmp=mysql_fetch_array($sql_query,MYSQL_ASSOC))
						{
											$empid=$rwEmp["empid"];
											$year=$rwEmp["year"];
											$emppf=$rwEmp["emplcode"];
											$dept=$rwEmp["dept"];
											$design=$rwEmp["design"];
											$station=$rwEmp["station"];
											$payscale=$rwEmp["payscale"];
											$year=$rwEmp["year"];
											$uploadfile=$rwEmp["uploadfile"];
											$empname = $rwEmp["empname"];
											$emppass = $rwEmp["password"];
						?>
						<table class='table table-striped table-bordered table-hover' id='example'>
											<thead>
													<tr class='odd gradeX'>
														<th style='display:none;'> Employee Code</th>
														<th> PF No</th>
														<th> Name </th>
														<th> Design </th>
														<th> Station </th>
														<th> Pay Scale </th>
														<th> Substantive </th>
														<th> STSC </th>
														<th> Edit </th>
														
														
													</tr>
													
											</thead>
									  
										<tbody>
										
										<tr class="headings">	
													<td style="display:none;" id="tdempid$empid"><?php echo $empid; ?></td>
													<td id="tdemppf$empid"><?php echo "<a href='frmshowemployee.php?emppf=".$emppf."'>$emppf</a> "?></td>
													<td id="tddept$empid"><?php echo $empname; ?></td>
													<td id="tddesign$empid"><?php echo $design; ?></td>
													<td id="tdstation$empid"><?php echo $station; ?></td>
													<td id="tdstation$empid"><?php echo $payscale; ?></td>
													<td id="tdstation$empid"><?php echo $rwEmp["substantive"]; ?></td>
													<td id="tdstation$empid"><?php echo $rwEmp["stsc"]; ?></td>
													<td style="font-size:10px;width:3px;"><?php echo '<a href="frmeditemployee.php?emppf=' . $emppf. '" style="font-size:18px"><i class="fa fa-check-square-o"></i></a> '?></td>
												 </tr>
										</tbody>
									</table>
						<?php
						}
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