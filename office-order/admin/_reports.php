<?php 
 session_start();
$GLOBALS['a'] = 'reports';
include_once('../global/header.php');
include_once('../global/topbar.php');
//include_once('../global/sidebaradmin.php');
// include('get_func.php');
//error_reporting(0);
include('mini_function.php');
include('fetch_all_column.php');
include_once('../dbconfig/dbcon.php');
dbcon1();


?>
<style>
table {text-transform:uppercase;}
h1{text-transform:uppercase;}
h2{text-transform:uppercase;}
h3{text-transform:uppercase;}
h4{text-transform:uppercase;}
h5{text-transform:uppercase;}

.box.box-solid.box-warning>.box-header {
    color: #131212;
    background: #3c8dbcbd;
    border: solid 1px blue;
}
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	//paste this code under head tag or in a seperate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
<div class="se-pre-con"></div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<div style="margin:10px;margin-top:20px;border:2px solid #f39c12;background-color:#FFF;">
		<form method="post" action="">
			<div class="row" style="padding:30px;margin:20px;">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="form-group bio">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" >From Date</label>
				  <div class="col-md-9 col-sm-9 col-xs-12" >
					<input type="date" id="from_date" name="from_date" class="form-control form-text" placeholder="Enter Date" required>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="form-group bio">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" >To Date</label>
				  <div class="col-md-9 col-sm-9 col-xs-12" >
					<input type="date" id="to_date" name="to_date" class="form-control form-text calender_picker" placeholder="Enter Date" required>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<button class="btn btn-primary" type="submit" name="btn_view">View</button>
			</div>
			
		</div>
		</form>
		</div>
<!---------------------------Tab View-------------------------->

    <section class="content-header" style="display:none">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class="active"><a href="#bio" data-toggle="tab"><b>Bio-Data</b></a></li>
					<li class=""><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>
					<li class=""><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>
					<li class=""><a href="#present_appointment" data-toggle="tab"><b>Present Appointment</b></a></li>	
					<li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li>  
					<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>
				</ul>     	 
			</div>	 
			<div class="modal-body" >
				<div class="row">
					<div class="box-body"> 
						<div class="tab-content">
			      <!--Bio Tab Start -->
		<?php
			if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
				$from_date=$_POST['from_date'];
				$to_date=$_POST['to_date'];
		?>
	<div class="tab-pane active in" id="bio"> 		 
		<div class="table-responsive" style="padding:20px;">
			<h3>&nbsp;&nbsp;Biodata Details</h3>
				<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
				<?php
					 dbcon1();
					$sql=mysql_query("select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'");
					$f_c=mysql_num_rows($sql);
					//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
				?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group bio">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
							</div>
						</div>
					</div>
				</div>
				<div class="table-responsive" style="padding:20px;">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
						  <th>Sr No</th>
						  <th>PF Number</th>
						  <th>Employee Name</th>
						  <th>Date Of Updation</th>
						</tr>
					</thead>
                <tbody>
               <?php 
					$cnt=1;
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>$cnt</td>";
						echo "<td>".$result['pf_number']."</td>";
						echo "<td>".$result['emp_name']."</td>";
						echo "<td>".date('Y-m-d', strtotime($result['date_time']))."</td>";
						echo "</tr>";
						$cnt++;
					} 
				?>
                </tbody>
              </table>
			</div>
			<!-- /.box-header -->
            <!-- /.box-body -->
		</div>
		<script>
						$(function () {
							$('#exampleprom').DataTable()
						})
						</script>
		<div class="pull-right col-md-7 col-sm-12 col-xs-12">
			
		</div>						  
    </div>
	<?php }?>
	<!----Medical Details------>
	<div class="tab-pane" id="medical">
		<h3>&nbsp;&nbsp;Medical Details</h3>
		<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">				 		 
		<?php
		if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
		?>
		<?php
					 dbcon1();
					$sql=mysql_query("select * from medical_temp where datetime between '$from_date' and '$to_date'");
					$f_c=mysql_num_rows($sql);
					//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
				?>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group bio">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
							<div class="col-md-9 col-sm-9 col-xs-12" >
								<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
							</div>
						</div>
					</div>
				</div>
				<div class="table-responsive" style="padding:20px;">
				<table id="example1" class="table table-striped">
					<thead>
						<tr>
						  <th>Sr No</th>
						  <th>PF Number</th>
						  <th>Employee Name</th>
						  <th>Date Of Updation</th>
						</tr>
					</thead>
                <tbody>
               <?php 
					$cnt=1;
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
						echo "<td>$cnt</td>";
						echo "<td>".$result['medi_pf_number']."</td>";
						echo "<td>".get_emp_name($result['medi_pf_number'])."</td>";
						echo "<td>".date('d-m-Y', strtotime($result['datetime']))."</td>";
						echo "</tr>";
						$cnt++;
					} 
				?>
                </tbody>
              </table>
			</div>
		<?php }?>
    </div>
<!---------Initial Appointment------------>
<div class="tab-pane" id="appointment">
		<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no_mul">
			<h3>&nbsp;&nbsp;Initial Appointment</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
		</div>
		<?php
		if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
		?>
		<?php
				 dbcon1();
				$sql=mysql_query("select * from  appointment_temp where DATE(date_time) between '$from_date' and '$to_date'");
				$f_c=mysql_num_rows($sql);
				//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
						<div class="col-md-9 col-sm-9 col-xs-12" >
							<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="padding:20px;">
			<table id="example1" class="table table-striped">
				<thead>
					<tr>
					  <th>Sr No</th>
					  <th>PF Number</th>
					  <th>Employee Name</th>
					  <th>Date Of Updation</th>
					</tr>
				</thead>
			<tbody>
		   <?php 
				$cnt=1;
				while($result=mysql_fetch_array($sql))
				{
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>".$result['app_pf_number']."</td>";
					echo "<td>".get_emp_name($result['app_pf_number'])."</td>";
					echo "<td>".date('d-m-Y', strtotime($result['date_time']))."</td>";
					echo "</tr>";
					$cnt++;
				} 
			?>
			</tbody>
		  </table>
		</div>
	<?php }?>		
</div>
<!---------End of Initial Appointment------------>

	
	<div class="tab-pane" id="present_appointment">
		<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no_mul">
			<h3>&nbsp;&nbsp;Present Working Details</h3>
			<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
		</div>		
		<?php
		if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
		?>
			<?php
				 dbcon1();
				$sql=mysql_query("select * from  present_work_temp where DATE(date_time) between '$from_date' and '$to_date'");
				$f_c=mysql_num_rows($sql);
				//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
						<div class="col-md-9 col-sm-9 col-xs-12" >
							<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="padding:20px;">
			<table id="example1" class="table table-striped">
				<thead>
					<tr>
					  <th>Sr No</th>
					  <th>PF Number</th>
					  <th>Employee Name</th>
					  <th>Date Of Updation</th>
					</tr>
				</thead>
			<tbody>
		   <?php 
				$cnt=1;
				while($result=mysql_fetch_array($sql))
				{
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>".$result['preapp_pf_number']."</td>";
					echo "<td>".get_emp_name($result['preapp_pf_number'])."</td>";
					echo "<td>".date('d-m-Y', strtotime($result['date_time']))."</td>";
					echo "</tr>";
					$cnt++;
				} 
			?>
			</tbody>
		  </table>
		</div>
	<?php }?>				 
    </div>				
<!-- family composition -->
<div class="tab-pane" id="family">
	<div class="table-responsive" style="padding:20px;">
	<h3>&nbsp;&nbsp;Family Composition Details</h3>
	<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">	
	<?php
		if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
		?>
			<?php
				 dbcon1();
				$sql=mysql_query("select * from family_temp where DATE(date_time) between '$from_date' and '$to_date'");
				$f_c=mysql_num_rows($sql);
				//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
						<div class="col-md-9 col-sm-9 col-xs-12" >
							<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="padding:20px;">
			<table id="example1" class="table table-striped">
				<thead>
					<tr>
					  <th>Sr No</th>
					  <th>PF Number</th>
					  <th>Employee Name</th>
					  <th>Date Of Updation</th>
					</tr>
				</thead>
			<tbody>
		   <?php 
				$cnt=1;
				while($result=mysql_fetch_array($sql))
				{
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>".$result['emp_pf']."</td>";
					echo "<td>".get_emp_name($result['emp_pf'])."</td>";
					echo "<td>".date('d-m-Y', strtotime($result['date_time']))."</td>";
					echo "</tr>";
					$cnt++;
				} 
			?>
			</tbody>
		  </table>
		</div>
	<?php }?>				 
	</div>
</div>
<!-- nominee -->
	<div class="tab-pane" id="nominee">
		<div  class="tab-pane" id="nominee" style="padding:10px;">
			<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>	
		</div>			 					 
		<?php
		if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){
			$from_date=$_POST['from_date'];
			$to_date=$_POST['to_date'];
		?>
			<?php
				 dbcon1();
				$sql=mysql_query("select * from  nominee_temp where DATE(date_time) between '$from_date' and '$to_date'");
				$f_c=mysql_num_rows($sql);
				//echo "select * from biodata_temp where DATE(date_time) between '$from_date' and '$to_date'".mysql_error();
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group bio">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Total Count</label>
						<div class="col-md-9 col-sm-9 col-xs-12" >
							<label class="control-label " style="font-size:20px;"><?php echo $f_c;?></label>
						</div>
					</div>
				</div>
			</div>
			<div class="table-responsive" style="padding:20px;">
			<table id="example1" class="table table-striped">
				<thead>
					<tr>
					  <th>Sr No</th>
					  <th>PF Number</th>
					  <th>Employee Name</th>
					  <th>Date Of Updation</th>
					</tr>
				</thead>
			<tbody>
		   <?php 
				$cnt=1;
				while($result=mysql_fetch_array($sql))
				{
					echo "<tr>";
					echo "<td>$cnt</td>";
					echo "<td>".$result['nom_pf_number']."</td>";
					echo "<td>".get_emp_name($result['nom_pf_number'])."</td>";
					echo "<td>".date('d-m-Y', strtotime($result['date_time']))."</td>";
					echo "</tr>";
					$cnt++;
				} 
			?>
			</tbody>
		  </table>
		</div>
	<?php }?>				 
    </div> 		 
		    </div>
        </div>
      </div>
  </div>
   </div>
	  </section>
	 </div>	
	
   <?php
 include_once('../global/footer.php');
 //include('modal_js_header.php');
 ?>
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

<script>
 $(document).ready(function(){
	 $('.content-header').show(); 	
});
 </script>
 <script>
  
$(".tab_view").click(function(){
		  $('.content-header').show();
		   $('#singles').hide();
			 
	 });
	 $(".tab_single").click(function(){
		  $('#singles').show();
		  $('.content-header').hide();
			 
	 });
 </script> 