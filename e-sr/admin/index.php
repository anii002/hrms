<?php 
	$_GLOBALS['a'] = 'index';
session_start();
error_reporting(0);
 if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	// echo "<script>window.location='http://localhost/E-APAR/index.php';</script>";
 }
$GLOBALS['a'] = 'index';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('mini_function.php');
include_once('create_log.php');
//include_once('../global/sidebaradmin.php');

?>
<!-- Left side column. contains the logo and sidebar -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top: -20px;">
    <!-- Content Header (Page header) -->
    <?php if($_SESSION['SESSION_ROLE']=='guest'){?> <h1>&nbsp;&nbsp;&nbsp;Hello Guest</h1> <?php }?>
     <?php if($_SESSION['SESSION_ROLE']=='superadmin'){?> <h1>&nbsp;&nbsp;&nbsp;Admin</h1> <?php }?>
	<div class="row">
	<div class="col-md-12">
	    <!--div class="box box-default">
			   <div class="box-body">
			   <div class="alert alert-success alert-dismissible" style="height: 67px;">
                <h4><i class="icon fa fa-bullhorn"></i> Notification..!</h4>
                <marquee direction="left" onmouseover="this.stop()" onmouseout="this.start();" loop="-1" scroll-delay="10000">
				<?php
					// $sql_helpdesk=mysql_query("select * from tbl_helpdesk where status=0");
					// while($rwHelpdesk=mysql_fetch_array($sql_helpdesk))
					// {
						
				?>
				
				 <label><i class="fa fa-angle-double-right"></i>&nbsp;<?php //echo $rwHelpdesk["subject"]; ?></label>&nbsp;&nbsp;&nbsp;&nbsp;
				<?php
					// }
				?>
				</marquee>
              </div>
			   </div>
		</div>
	</div-->
	</div>
    </section>
	
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
        <div class="row">
		<div class="box box-info">
            <div class="box-header">
             <hr>
			  
			<?php if($_SESSION['SESSION_ROLE']=='user'){ ?>
							
							<div class="col-md-12">
		<h2>Employee Details</h2>
		  <p></p>            
		  <table id="exampleprom" class="table table-striped">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>PF Number</th>
				<th>Employee Name</th>
				<th>Billunit No</th> 
				<th>Action</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
		
			
				$qu=mysql_query('select * from user_login where username="'.$_SESSION['SESS_ADMIN_NAME'].'"');
					$qu=mysql_fetch_array($qu);
					 // echo 'select * from user_login where username="'.$_SESSION['SESS_ADMIN_NAME'].'"'.mysql_error();
						$bill=$qu['multi_bill_unit'];
						 $bill1=explode(',',$bill);
						 // echo $qu['multi_bill_unit']."<br>";
						  // print_r($bill1);
						 
						 
						 $count1=sizeof($bill1);
						 // echo "<br>".$count1."<br>";
						 $cnt=1;
							 for($i=0;$i<$count1;$i++)
							 {	
						
								$billunit=$bill1[$i];
								// echo $billunit."<br>";
							// $bill1=bill_id1($billunit);
								$a=bill_to_id($billunit);
								// echo $a."<br>";
								dbcon1();
								$query2=mysql_query("select * from present_work_temp where preapp_billunit='$a'");
								// echo "select * from present_work_temp where preapp_billunit='$a'".mysql_error()."<br>";
							
								
							// echo "<br>".$bill1;
						// for($i=0;$i<=$count1;$i++)
						// {
						// $data .= $bill."<br>";		
						// }
					// echo $data;
				
				// $count1=sizeof($data);
				
				// echo $count1."<br>";
				
				// for($i=0;$i<=$cnt1;$i++)
				// {
				  // $sql=mysql_query("SELECT * FROM present_work_temp WHERE preapp_billunit IN (SELECT * from user_login WHERE  multi_bill_unit='$data')");
				// }
				// echo "SELECT * FROM present_work_temp WHERE preapp_billunit IN (SELECT * from user_login WHERE  multi_bill_unit='$data')".mysql_error();	
				
				while($res=mysql_fetch_array($query2))
				{	dbcon1();
					$pf=$res['preapp_pf_number'];
					$query=mysql_query("select *  from biodata_temp where pf_number='$pf'");
					$bioq=mysql_fetch_array($query);
					// $billunit=bill_depot1($res['preapp_billunit']);
					$dt=date('d-m-Y', strtotime($res['date_time']));
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>$pf</td>";
					echo "<td>".$bioq['emp_name']."</td>";
					echo "<td>".$billunit."</td>";
					echo "<td><a  href='biodata_update.php?pf=$pf' attr='$pf' class='btn btn-primary pf'>Update</button></td>";
					echo "</tr>";
					
			$cnt++;	}
				}
				
			?>
			  <!--tr>
				<td>John</td>
				<td>Doe</td>
			  </tr-->
			</tbody>
		  </table>
		  <script>
						$(function () {
							$('#exampleprom').DataTable()
						})
						</script>
	</div>	
							
							
							
			<?php }?>
			  
			  <?php if($_SESSION['SESSION_ROLE']=='superadmin' || $_SESSION['SESSION_ROLE']=='guest') {?>
			 
			  <h3 class="" style="margin-left:20px;">Department List    <span class="pull-right"style="margin-right:20px;">Total Serving Employees : <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where serving_status='1'");
			$se=mysql_num_rows($qu);
			?> <?php echo $se;?><br><span ></span></span></h3>  <h3 class="box-title" style="margin-left:20px;"></h3>   
            </div>
			<div class="box-body" style="padding:10px 10px 10px 10px;">
	<!--div class="col-md-3 col-sm-6">
          <!-- small box -->
        <!--div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#ffb366;border-radius:10px;">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p style="font-size:18px;">RRB</p>
			  <?php 		
		//	dbcon1();
		//	$qu=mysql_query("select * from present_work_temp where preapp_department=2 and serving_status='1'");
		//	$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php //echo $se;?></b></span></center> 
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   <!--/div-->
        <!-- ./col -->
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#00b3b3;border-radius:10px;">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p style="font-size:18px;">ACCOUNTS</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=3 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		<!--div class="col-md-3 col-sm-6">
          <!-- small box -->
          <!--div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#bf80ff;border-radius:10px;">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p style="font-size:18px;">AUDIT</p>
			  <?php 		
		//	dbcon1();
		//	$qu=mysql_query("select * from present_work_temp where preapp_department=4 and serving_status='1'");
		//	$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php //echo $se;?></b></span></center> 
            </div>
         
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div-->
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;border-radius:10px;background:#dd4b39">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p style="font-size:18px;">GEN.ADMIN</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=5 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
          
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
        
        	<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box " style="box-shadow:3px 3px 8px #333333ab;border-radius:10px; background:#FF5FC6">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p style="font-size:18px;">COMMERCIAL</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=6 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
   
   <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#ffb366;border-radius:10px;">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p style="font-size:18px;">ENGINEERING</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=7 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
      </div>
	  <div class="box-body" style="padding:10px 10px 10px 10px;">

        <!-- ./col -->
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box"  style="box-shadow:3px 3px 8px #333333ab;background:#00b3b3;border-radius:10px;" >
            <div class="inner">
              <h3>
			 
			  </h3>

              <p style="font-size:18px;">ELECTRICAL</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=8 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
         
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#bf80ff;border-radius:10px;">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p style="font-size:18px;">MECHANICAL</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=9 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
          
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;border-radius:10px;background:#dd4b39">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p style="font-size:18px;">MEDICAL</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=10 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
	
	<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;border-radius:10px; background:#FF5FC6">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p style="font-size:18px;">OPERATING</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=11 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
	
      </div><div class="box-body" style="padding:10px 10px 10px 10px;">
	
        <!-- ./col -->
		
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#ffb366;border-radius:10px;">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p style="font-size:18px;">PERSONAL</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=12 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
         
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#00b3b3;border-radius:10px;">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p style="font-size:18px;">SnT</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=13 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
          
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
        
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#bf80ff;border-radius:10px;">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p style="font-size:18px;">STORES</p>
			   <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=14 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
   
   	<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;border-radius:10px;background:#dd4b39">
            <div class="inner">
              <h3>
			   
			  </h3>
              <p style="font-size:18px;">SECURITY</p>
			  <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=15 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
			  
            </div>
           
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
	
      </div><div class="box-body" style="padding:10px 10px 10px 10px;">
	
        <!-- ./col -->
	
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;border-radius:10px; background:#FF5FC6">
            <div class="inner">
              <h3>
			 
			  </h3>

              <p style="font-size:18px;">RCT</p>
			  <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=16 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
         
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>          </div>
        </div>
		
        <!-- ./col -->
        <div class="col-md-3 col-sm-6">
          <!-- small box -->
          <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#ffb366;border-radius:10px;">
            <div class="inner">
              <h3>
			 
			  </h3>
			  <p style="font-size:18px;">RLY BOARD</p>
			  <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=17 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
          
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
	
	
		<div class="col-md-3 col-sm-6">
          <!-- small box -->
        <div class="small-box" style="box-shadow:3px 3px 8px #333333ab;background:#00b3b3;border-radius:10px;">
            <div class="inner">
              <h3>
			   
			  </h3>

              <p style="font-size:18px;">Not Avaiable</p>
			  <?php 		
			dbcon1();
			$qu=mysql_query("select * from present_work_temp where preapp_department=1 and serving_status='1'");
			$se=mysql_num_rows($qu);
			?>		
			<center><span style="font-size:24px"><b><?php echo $se;?></b></span></center> 
            </div>
            
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
   </div>
	
      </div><div class="box-body" style="padding:10px 10px 10px 10px;">

        <!-- ./col -->
		
		
		
        <!-- ./col -->
        
	
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  </div>
  </div>
	<?php }?>
<?php if($_SESSION['SESSION_ROLE']=='superadmin'){?>
	<div class="col-md-12">
		<h2>Log Details</h2>
		  <p>All Log Activity Details</p>            
		  <table id="exampleprom" class="table table-striped">
			<thead>
			  <tr>
				<th>Sr No</th>
				<th>Log</th>
				<th>Action On</th>
				<th>Ip Address</th> 
				<th>Date and Time</th>
			  </tr>
			</thead>
			<tbody>
			<?php
			$i=1;
			dbcon1();
				$sql=mysql_query("select * from log_history order by id desc limit 50");
				while($res=mysql_fetch_array($sql))
				{	$dt=date('d-m-Y', strtotime($res['date_time']));
						 echo "<tr>";
					 echo "<td>$i</td>";
					 echo "<td>".fetch_user_name($res['action_by'])." ".mc_decrypt($res['activity_details'],ENCRYPTION_KEY)."</td>";
					 echo "<td>".$res['action_on']."</td>";
					 echo "<td>".$res['ip_address']."</td>";
					echo "<td>$dt".substr($res['date_time'],10)."</td>";
					 echo "</tr>";
					$i++;
				}
			?>
			  <!--tr>
				<td>John</td>
				<td>Doe</td>
			  </tr-->
			</tbody>
		  </table>
		  <script>
						$(function () {
							$('#exampleprom').DataTable()
						})
						</script>
	</div>	
	
	
			  <?php }?>
	
  </div>
<?php
 include_once('../global/footer.php');
 ?> 
 
 
 <script>
$(document).on("click",".pf",function(){
	var attr=$(this).attr('attr');
	//alert(attr);
		if($("attr").text()==""){
			var bio_pf_no=$(this).val();
			
			$.ajax({
				type:'POST',
				url:'set_session.php',
				data:'action=set_two_session&bio_pf_no='+attr,
				success:function(html){
					 window.location='biodata_update.php';
				} 
			});
		}else{
			alert("Enter Correct PF Format");
		}
	});
</script>
<script>
	$(document).on("click",".pf1",function(){
		
		
		
	});
</script>