<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $GLOBALS['a'] = 'sr_entry';
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php'); 
include('mini_function.php');
error_reporting(0);
?>
<script src="javascript.js"></script>
<style>
/* .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}
 */
 
 /*----- Tabs -----*/
.tab {
    width:100%;
    display:inline-block;
}
 
    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }
 
    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }
 
        .tab-links a {
            padding:9px 15px;
            display:inline-block;
            border-radius:3px 3px 0px 0px;
            background:#7FB5DA;
            font-size:16px;
            font-weight:600;
            color:#4c4c4c;
            transition:all linear 0.15s;
        }
 
        .tab-links a:hover {
            background:#a7cce5;
            text-decoration:none;
        }
 
    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }
 
    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }
 
        .tab {
            display:none;
        }
 
        .tab.active {
            display:block;
        }

.nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
}
 
.lbl_reg{
  display:none;
} 

.lbl_oth{
  display:none;
}
.lbl_oth1{
  display:none;
}


#bio_email{text-transform: none;}

input{text-transform:uppercase;}
textarea{text-transform:uppercase;}

/*Nav bar code*/
/*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
*/

.navbar-brand { position: relative; z-index: 2; }

.navbar-nav.navbar-right .btn { position: relative; z-index: 2; padding: 4px 20px; margin: 10px auto; transition: transform 0.3s; }

.navbar .navbar-collapse { position: relative; overflow: hidden !important; }
.navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 22px; }

.navbar .nav-collapse { position: absolute; z-index: 1; top: 0; left: 0; right: 0; bottom: 0; margin: 0; padding-right: 120px; padding-left: 80px; width: 100%; }
.navbar.navbar-default .nav-collapse { background-color: #f8f8f8; }
.navbar.navbar-inverse .nav-collapse { background-color: lightblue; }
.navbar .nav-collapse .navbar-form { border-width: 0; box-shadow: none; }
.nav-collapse>li { float: right; }

.btn.btn-circle { border-radius: 50px; }
.btn.btn-outline { background-color: transparent; }

.navbar-nav.navbar-right .btn:not(.collapsed) {
    background-color: rgb(111, 84, 153);
    border-color: rgb(111, 84, 153);
    color: rgb(255, 255, 255);
}

.navbar.navbar-default .nav-collapse,
.navbar.navbar-inverse .nav-collapse {
    height: auto !important;
    transition: transform 0.3s;
    transform: translate(0px,-50px);
}
.navbar.navbar-default .nav-collapse.in,
.navbar.navbar-inverse .nav-collapse.in {
    transform: translate(0px,0px);
}


@media screen and (max-width: 767px) {
    .navbar .navbar-collapse .navbar-right > li:last-child { padding-left: 15px; padding-right: 15px; } 
    
    .navbar .nav-collapse { margin: 7.5px auto; padding: 0; }
    .navbar .nav-collapse .navbar-form { margin: 0; }
    .nav-collapse>li { float: none; }
    
    .navbar.navbar-default .nav-collapse,
    .navbar.navbar-inverse .nav-collapse {
        transform: translate(-100%,0px);
    }
    .navbar.navbar-default .nav-collapse.in,
    .navbar.navbar-inverse .nav-collapse.in {
        transform: translate(0px,0px);
    }
    
    .navbar.navbar-default .nav-collapse.slide-down,
    .navbar.navbar-inverse .nav-collapse.slide-down {
        transform: translate(0px,-100%);
    }
    .navbar.navbar-default .nav-collapse.in.slide-down,
    .navbar.navbar-inverse .nav-collapse.in.slide-down {
        transform: translate(0px,0px);
    }
}
</style>
<div class="content-wrapper" style="margin-top: -20px;">
   <section class="content"> 
      <div class="row">
	     <div class="box box-info">
			 
			
			<div class="box box-warning box-solid">
			    <div class="box-header with-border">
					 <ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
						<li class="active"><a href="#bio" data-toggle="tab"><b>Bio Data</b></a></li>
						<li class="medical_initial"><a href="#medical" data-toggle="tab"><b>Medical Details</b></a></li>
						<li class=""><a href="#appointment" data-toggle="tab"><b>Initial Appointment</b></a></li>
						<li class=""><a href="#present_appointment" data-toggle="tab"><b>Present Working Details</b></a></li>					
						<li class=""><a href="#prft" data-toggle="tab"><b>PRFT</b></a></li> 
						<li class=""><a href="#penalty" data-toggle="tab"><b>Penalty</b></a></li> 
						<li class=""><a href="#increment" data-toggle="tab"><b>Increment</b></a></li>	
						<li class=""><a href="#awards" data-toggle="tab"><b>Awards</b></a></li> 
						 <li class=""><a href="#family" data-toggle="tab"><b>Family Composition</b></a></li> 
						
						<li class=""><a href="#nominee" data-toggle="tab"><b>Nominee(s)</b></a></li>
						
						<li class=""><a href="#advance" data-toggle="tab"><b>Advance</b></a></li> 
						<li class=""><a href="#property" data-toggle="tab"><b>Property</b></a></li> 
						<li class=""><a href="#traning" data-toggle="tab"><b>Training</b></a></li>  
						<li class=""><a href="#extra_entry" data-toggle="tab"><b>Last Entry</b></a></li>  
						<li class=""><a href="#leave" data-toggle="tab"><b>Online Office Order</b></a></li>
					 </ul>
               </div>
				
				<div class="box-body"> 
					<div class="tab-content">			
						<?php include('biodata_entry.php');?>
						<?php include('medical_entry.php');?>
						<?php include('init_appo_entry.php');?>
						<?php include('present_work_entry.php');?>
						<?php include('prft_entry.php');?>
						<?php include('penalty_entry.php');?>
						<?php include('increment_entry.php');?>
						<?php include('award_entry.php');?>
						<?php include('family_entry.php');?>
						<?php include('nominee_entry.php');?>
						<?php include('advance_entry.php');?>
						<?php include('property_entry.php');?>
						<?php include('training_entry.php');?>
						<?php include('last_entry.php');?>
			
					   <!--Last Tab Start -->
							<div class="tab-pane" id="leave">
							 <div class="box-header with-border">
										  <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Online Office Order</h3>
										</div><BR>
								  <p>All Office orders are display here</p>
							 
							</div>  
					  <!--Last Tab End -->
				
					</div>
				</div>
				
		</div>
		
      </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal Bill Unit-->
<div id="bill_unit_select" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Deopt and Bill Unit</h4>
      </div>
      <div class="modal-body">
		<input type="hidden" name="got_bill_unit" id="got_bill_unit">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<select class="form-control select2" style="width:100%;" id="modal_zone" name="modal_zone">
					<option value="blank" selected>--Select Zone--</option>
					<?php
						$conn=dbcon();
						$sql=mysqli_query($conn,"select * from aims");
						while($sql_fetch=mysqli_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['RLYCODE']."'>".$sql_fetch['LONGDESC']."</option>";
						}
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Unit</label>
				<select class="form-control select2" style="width:100%;" id="modal_unit" name="modal_unit">
					<option value="" readonly hidden selected>--Select Unit--</option>
					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Bill Unit/Depot</label>
				<select class="form-control select2" style="width:100%;" id="bill_unit_depot" name="bill_unit_depot">
					<option value="" readonly hidden selected>--Bill Unit/Depot--</option>
					
				</select>
			</div>
		</div>
      </div>
      <div class="modal-footer">
		<div class="row pull-left">
			<div class="col-md-12">
			<a href="#" data-toggle='modal' data-target="#extra_billunit" data-dismiss="modal" style="color:red;">In case of Complexities In mapping units click on this link for customise mapping</a>
			</div>
		</div>
		<br>
		<br>
        <button type="button" class="btn btn-primary" id="modal_okay" name="modal_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- bill unit modal ends -->

<!--Extr Modal Bill Unit-->
<div id="extra_billunit" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Deopt and Bill Unit</h4>
      </div>
      <div class="modal-body">
	  <form method="POST" action="process.php?add_deopt_billunit">
		<input type="hidden" name="got_bill_unit" id="got_bill_unit">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<input type="text" class="form-control" id="extra_modal_zone" name="extra_modal_zone">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Unit</label>
				<input type="text" class="form-control" id="extra_modal_unit" name="extra_modal_unit">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Bill Unit</label>
				<input type="text" class="form-control" id="extra_modal_billunit" name="extra_modal_billunit">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Depot</label>
				<input type="text" class="form-control" id="extra_modal_depot" name="extra_modal_depot">
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modal_add_depot_okay" name="modal_add_depot_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
	</form>
  </div>
</div>
<!-- bill unit modal ends -->

 <!-- station Unit-->
<div id="station" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Station</h4>
      </div>
      <div class="modal-body">
	  <div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Zone</label>
				<select class="form-control select2" style="width:100%;" id="modal_zone_station" name="modal_zone_station">
					<option value="blank" selected>--Select Zone--</option>
					<?php
						$conn=dbcon();
						$sql=mysqli_query($conn,"select * from aims");
						while($sql_fetch=mysqli_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['RLYCODE']."'>".$sql_fetch['LONGDESC']."</option>";
						}
					?>
				</select>
			</div>
		</div>
		<input type="hidden" name="got_station" id="got_station">
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Division</label>
				<select class="form-control select2" style="width:100%;" id="modal_division" name="modal_division">
					<option value="" selected>--Select Division--</option>
					<?php
						/* dbcon();
						$sql=mysqli_query("select * from division");
						while($sql_fetch=mysqli_fetch_array($sql))
						{
							echo "<option value='".$sql_fetch['rlycode']."'>".$sql_fetch['longdesc']."</option>";
						} */
					?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12" style="margin-top:20px;">
				<label for="modal_zone">Station</label>
				<select class="form-control select2" style="width:100%;" id="modal_station" name="modal_station">
					<option value="" readonly hidden selected>--Select Station--</option>
					
				</select>
			</div>
		</div>
		<br>
		<div class="row" style="display:none;" id="other_station">
			<div class="col-md-12">
				<label for="modal_zone">Enter Name of Other Station</label>
				<input type="text" class="form-control" id="add_other_station" name="add_other_station">
			</div>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modal_station_okay" name="modal_station_okay" data-dismiss="modal">Okay</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- station modal ends-->

  <!-- add regular medical modal start-->
<div id="add_regular_medical" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Medical</h4>
      </div>
      <div class="modal-body">
			<form action="process_main.php?action=add_initial_medical" method="POST">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary TextNumber common_pf_number" id="medi_pf_no" name="medi_pf_no" readonly required />
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat" id="medi_cat" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value=" " selected></option>
										<?php
												$conn=dbcon();
												$sqlreligion=mysqli_query($conn,"select * from medical_classi");
												while($rwDept=mysqli_fetch_array($sqlreligion))
												{
												?>
												<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
												<?php
												}
											
											?>
											<option value="all class unfit">All Class Unfit</option>
									</select> 
								</div>
                            </div>
						</div>
					</div>
					<br>
					<h3>PME Schedule Defining Parameters</h3>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Birth</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<?php
								$last_pf="";
								if($_SESSION['same_pf_no']!="")
								{	
									$conn=dbcon1();
									$last_pf=$_SESSION['same_pf_no'];
									$sql=mysqli_query($conn,"select dob from biodata_temp where pf_number='$last_pf'");
									
									while($result=mysqli_fetch_array($sql)){
										$last_pf=date('d-m-Y', strtotime($result['dob']));
									}
								}else{
									$last_pf="";
								}
									
								?>
								<input type="text" name="med_dob" id="med_dob" class="form-control"  required readonly value="<?php echo $last_pf;?>">
								
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" name="med_appo_date" id="med_appo_date" class="form-control calender_picker"  required>
								</div>
                            </div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="in_med_desig" name="in_med_desig" style="margin-top:0px; width:100%;" required>
								<option value=" " selected></option>
								<?php
								echo $alldesignations;
									?>
								</select>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<select name="medi_cat_pme" id="medi_cat_pme" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value=" " selected></option>
										<option value="A1/A2/A3">A1/A2/A3</option>
										<option value="B1/B2">B1/B2</option>
										<option value="C1/C2">C1/C2</option>
									</select> 
								</div>
                            </div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Medical Examination</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<select name="medi_exam" id="medi_exam" class="form-control select2" style="margin-top:0px; width:100%;" required>
										<option value=" " selected></option>
										<option value="initial">Initial</option>
										<option value="periodic">Periodic</option>
										<option value="special">Special</option>
									</select> 
								</div>
                            </div>
						</div>
						
					</div>
					<br>
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate No </label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" id="medi_cer_no" name="medi_cer_no" class="form-control" placeholder="Enter If any" required>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="med_cer_date" name="med_cer_date" class="form-control calender_picker" placeholder="Enter If any" required>
							  </div>
							</div>
						</div>
					</div>
					<br>	
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary" id="med_ref" name="med_ref"  placeholder="Enter Medical Reference" ></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="med_ref_date" name="med_ref_date" class="form-control calender_picker" placeholder="Select Date"  required>
							  </div>
							</div>
						</div>
					</div>
					<br>
					<div class="row" >
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-2" >Medical Remarks</label>
						  <div class="col-md-10">
							 <textarea  rows="3" style="resize:none" class="form-control primary description" id="med_remark" name="med_remark"  placeholder="Enter Medical Remarks" ></textarea>
						  </div>
						</div>
					</div>
					</div>	 
			
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success" >ADD</button>
		<button type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>
  </div>
</div>
<!-- bill unit modal ends-->

<script>
jQuery(document).ready(function() {
    jQuery('.tab .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tab ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});



var pf_counter_id = 2;
var gis_counter_id = 2;
var gra_counter_id = 2;

function openCity(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    document.getElementById(cityName).style.display = "block";  
}

  $("#pf_counter_btn").on("click", function(){debugger;
	$("#pf_counter").val(pf_counter_id);
	var pf_counter = pf_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_pf&pf_counter="+pf_counter,
		success:function(data){
			$("#append_PFdata").prepend(data);
			$("#pf_counter").val(pf_counter_id);
			pf_counter_id++;
			//$(".select2").select2();
		}
	});
});

 $("#gis_counter_btn").on("click", function(){debugger;
	$("#gis_counter").val(gis_counter_id);
	var gis_counter = gis_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gis&gis_counter="+gis_counter,
		success:function(data){
			$("#append_GISdata").prepend(data);
			$("#gis_counter").val(gis_counter_id);
			gis_counter_id++;
			//$(".select2").select2();
		}
	});
});

 $("#gra_counter_btn").on("click", function(){debugger;
	$("#gra_counter").val(gra_counter_id);
	var gra_counter = gra_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gra&gra_counter="+gra_counter,
		success:function(data){
			$("#append_GRAdata").prepend(data);
			$("#gra_counter").val(gra_counter_id);
			gra_counter_id++;
			//$(".select2").select2();
		}
	});
});
</script>
 <script>
  
 
function fun_call(){
 var value = document.getElementById('reason_desig').value;
 var value1 = document.getElementById('app_olddesig1').value;
	document.getElementById('hide_app_olddesig_reason').value=value;
	document.getElementById('app_olddesig').value=value1;
     //alert($("#hide_app_olddesig").val());	
}
	//$(".common_pf_number").attr('readonly',true);
 $(function(){
	$(".onlyText").on("input change paste", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".onlyNumber", function() {
	    var newVal = $(this).val().replace(/[^0-9]*$/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".TextNumber", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
	    $(this).val(newVal);
 	});
	$(document).on("input change paste", ".description", function() {
	    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.\/\\_]/g, '');
	    $(this).val(newVal);
 	});
	});
	 
		function pf_number(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{11}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bio_pf_no").text("");
				$("#valided_text").val("");
				$(".bio").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				
				
				$(".bio_pf_no").text("PF Number Should be of 11 digits");
				$("#valided_text").val("1");
				$(".bio").addClass("has-error");
				inputtxt.value="";
				
				alert("PF Number Should be of 11 digits");  
				return false;  
				}  
		}
		function old_pf_number(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{8}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".oldpf").text("");
				$("#valided_text").val("");
				$(".old_pf").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".oldpf").text("Old PF Number Should be of 8 digits");
				$("#valided_text").val("1");
				$(".old_pf").addClass("has-error");
				alert("Old PF Number Should be of 8 digits");  
				inputtxt.value="";
				//$("#bio_oldpf_no").val("");
				return false;  
				}  
		}
		function cugnumber(inputtxt)  
		{  
		  var phoneno = /^\d{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".cugnum").text("");
				$("#valided_text").val("");
				$(".cug_num").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".cugnum").text("CUG number must be 10 digits");
				$("#valided_text").val("1");
				$(".cug_num").addClass("has-error");
				alert("CUG number must be 10 digits"); 
				inputtxt.value=""; 
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function email_valid(inputtxt)  
		{  
		  var phoneno = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bioemail").text("");
				$("#valided_text").val("");
				$(".bio_email").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".bioemail").text("Enter Valid Email Address");
				$("#valided_text").val("1");
				$(".bio_email").addClass("has-error");
				alert("Enter Valid Email Address");  
				inputtxt.value="";
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function prannumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{16}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".pranno").text("");
				$("#valided_text").val("");
				$(".pran_no").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".pranno").text("PRAN number must be 12 digits or NPS number must be 16 digits");
				$("#valided_text").val("1");
				$(".pran_no").addClass("has-error");
				alert("PRAN number must be 12 digits or NPS number must be 16 digits"); 
				inputtxt.value=""; 
				//$("#bio_cug").val("");
				return false;  
				}  
		}
		
		function phonenumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".percon").text("");
				$("#valided_text").val("");
				$(".per_con").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".percon").text("Mobile number must be 10 digits");
				$("#valided_text").val("1");
				$(".per_con").addClass("has-error");
				alert("Mobile number must be 10 digits");  
				//$("#bio_mob").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
		function pannumber(inputtxt)
		{  
		  var phoneno = /^[a-zA-Z0-9]{10}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".panno").text("");
				$("#valided_text").val("");
				$(".pan_no").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".panno").text("PAN number must be 10 digits");
				$("#valided_text").val("1");
				$(".pan_no").addClass("has-error");
				alert("PAN number must be 10 digits");  
				//$("#bio_mob").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
		function adharnumber(inputtxt)  
		{  
		  var phoneno = /^\d{12}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".bioadhar").text("");
				$("#valided_text").val("");
				$(".bio_aadhar").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".bioadhar").text("Adhar Card number must be of 12 digits");
				$("#valided_text").val("1");
				$(".bio_aadhar").addClass("has-error");
				alert("Adhar Card number must be of 12 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function ruidnumber(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{7}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".ruid").text("");
				$("#valided_text").val("");
				$(".ru_id").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".ruid").text("RUID number must be of 7 digits");
				$("#valided_text").val("1");
				$(".ru_id").addClass("has-error");
				alert("RUID number must be of 7 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function micrcode(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{9}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".mi_cr").text("");
				$("#valided_text").val("");
				$(".micr").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".mi_cr").text("MICR Code must be of 9 digits");
				$("#valided_text").val("1");
				$(".micr").addClass("has-error");
				alert("MICR Code must be of 9 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		function ifsccode(inputtxt)  
		{  
		  var phoneno = /^[a-zA-Z0-9]{11}$/;  
		  if((inputtxt.value.match(phoneno)))  
				{  
				$(".if_sc").text("");
				$("#valided_text").val("");
				$(".ifsc").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".if_sc").text("IFSC Code must be of 11 digits");
				$("#valided_text").val("1");
				$(".ifsc").addClass("has-error");
				alert("IFSC Code must be of 11 digits"); 
				//$("#bio_adhar").val("");
				inputtxt.value="";
				return false;  
				}  
		}
		
 </script>

  <script>
jQuery(document).ready(function() {
	//$(".hide_make").hide();
	$(document).on("change",".make_modal",function(){
		var cnt=$(this).attr("cnt");
		//alert(cnt);
		var pro_type=$(this).val();
		if(pro_type == '1')
			$(".makemodel"+cnt).show();
		else
			$(".makemodel"+cnt).hide();
		//alert(pro_type);
		$.ajax({
		  type:"post",
		  url:"process.php",
		  data:"action=get_property_item&pro_type="+pro_type,
		  success:function(data){
		  //alert(data);
			$("#pd_item_name").html(data);
		  }
		});
	});
        $("#initial_type").change(function() {

			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			 if($(this).val()== "4" || $(this).val()== "5" || $(this).val()== "6"){
				$(".lbl_oth").hide();
				$(".lbl_reg").show();
				$("#appo_date").show();
		   }else{
				$(".lbl_oth").show();
				$(".lbl_reg").hide();
				$("#appo_date").hide();
			}			
		});
 }); 
</script>
 <script>
$('#tr_training_status').change(function () {
	var value = $(this).val(); 
	//alert(value);
	if (value == 5) {
		$('#schedule_id').show();
	}
	else {
		$('#schedule_id').hide();
	}
	 

});

</script>
 <script>
$("#app_bill_unit").on("change", function(){
var app_bill_unit = document.getElementById('app_bill_unit').value;
// alert(app_bill_unit);
$.ajax({
  type:"post",
  url:"process.php",
  data:"action=get_depot&app_bill_unit="+app_bill_unit,
  success:function(data){
  //alert(data);
	var ddd=data;
	var arr=ddd.split('$');
	//alert(arr[0]);
	 $("#app_depot").val(arr[0]);
  }
});
});
</script>
 <script>
$(document).ready(function(){
	
		$("#preapp_desig").change( function(){ 
			var x2 = $(this).val();
			//alert(x2);
			if(x2 == '2031'){	
				 $("#lbl_oth2").show();
			}else{
				 $("#lbl_oth2").hide();
			}	
		 });
	
		$(".lbl_reg").show();
		$('.ps_type').on('change', function() {
			debugger;
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			var value=$(this).val();
			
			if($(this).val() == '1'){
				$("#scale_text_"+got_type).show();
				$("#scale_"+got_type).hide();
				$("#level_"+got_type).hide();
				
			}else if($(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4'){
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".scale_"+got_type).html(data);
				  }
				});
				$("#scale_"+got_type).show();
				$("#scale_text_"+got_type).hide();
				$("#level_"+got_type).hide();
				
			}else if($(this).val() == '5'){
				
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				  //alert(data);
				  $(".level_"+got_type).html(data);
				  }
				});
				$("#level_"+got_type).show();
				$("#scale_text_"+got_type).hide();
				$("#scale_"+got_type).hide();
			}else{
				 
				$("#scale_text_"+got_type).hide();
				$("#scale_"+got_type).hide();
				$("#level_"+got_type).hide();
			  }
		});
		
		$(document).on('change','.ps_type_addnew_row', function() {
			debugger;
			var type=$(this).attr("num");
			//var got_type=type.slice(-1);
			var value=$(this).val();
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".scale_drop_"+type).html(data);
				  }
				});
			$("#scale_row_"+type).show();
			
		  }else{
			  $("#scale_row_"+type).hide();
		  }
		  if($(this).val() == '5')
		  {
				
				$.ajax({
				  type:"post",
				  url:"process.php",
				  data:"action=get_scale_all&value="+value,
				  success:function(data){
				 // alert(data);
				  $(".level_drop_"+type).html(data);
				  }
				});
			$("#level_row_"+type).show();
			
		  }else{
			  $("#level_row_"+type).hide();
		  }
		});
		$(document).on('change','.property', function() {
			var pr_val=$(this).val();
			var count = $(this).attr("count");
			//alert(count);
			if(pr_val==1 || pr_val==2 ){
				$("#prop_detail_area_"+count).show();
				$("#prop_detail"+count).show();
			}else{
				$("#prop_detail_area_"+count).hide();
				$("#prop_detail"+count).hide();
			}
		});
		
			//property javascript
		//alert(pro_count);
		
		
		$(document).on('change','.property', function() {
			var pr_val=$(this).val();
			var p_id=$(this).attr('id');
			var s_pid=p_id.slice(-1);
			if(pr_val==2){
				$("#prop_detail2_"+s_pid).show();
				$("#prop_detail1_"+s_pid).show();
			}else{
				$("#prop_detail2_"+s_pid).hide();
				$("#prop_detail1_"+s_pid).hide();
			}
			
			var pro_type=$(this).val();
			var ss=$(this).attr('id');
			var pp=ss.slice(-1);
			if(pro_type == '1')
				$(".hide_make"+s_pid).show();
			else
				$(".hide_make"+s_pid).hide();
			//alert(pro_type);
			$.ajax({
			  type:"post",
			  url:"process.php",
			  data:"action=get_property_item&pro_type="+pro_type,
			  success:function(data){
			 // alert(data);
				$("#pd_item_name"+pp).html(data);
			  }
			});
		});



		
		
		// officiating and substansive drop down Type hide show code
	$('#preapp_subtype1').on('change', function () {
		// alert ('sdsdadasda');
			if (this.value == '1') {
				$("#show1").show();
				$("#show2").show();
				$("#pwd").hide();
	
				$("#preapp_desig").attr('required',false);
				$("#preapp_group").attr('required',false);
				$("#preapp_rop").attr('required',false);
				$("#station_id6").attr('required',false);
				$("#depot_bill_unit1").attr('required',false);
				$("#ps_type_4").attr('required',false);

				
				$("#preapp_desig").val("");
				$("#preapp_desig").val('blank').trigger('change');
				$("#ps_type_4").val("");
				$("#preapp_otherstation").val("");
				 
				$("#preapp_level").val('blank').trigger('change');
				$("#preapp_scale").val('blank').trigger('change');				
				 			 
				$("#depot_bill_unit1").val("");			
				$("#billunit1").val("");
				
				$("#station_id6").val("");
				$("#station6").val("");
				
				$("#preapp_rop").val("");	
				$("#preapp_group").val("");
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				
				$("#sgd_depot_bill_unit1").val(""); 
				$("#depot1").val(""); 
				$("#station_id4").val(""); 
				
				$("#sgd_preapp_group").val(""); 
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_3").val(""); 
				$("#ogd_depot_bill_unit1").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");

				}
				else {
					 
				$("#show1").hide();
				$("#show2").hide();
				$("#pwd").show();
				
				$("#preapp_sgd_desig").attr('required',false);
				$("#sgd_ps_type_2").attr('required',false);
				$("#sgd_depot_bill_unit1").attr('required',false);
				$("#station_id4").attr('required',false);
				$("#sgd_preapp_group").attr('required',false);
				
				$("#preapp_ogd_desig").attr('required',false);
				$("#ogd_ps_type_3").attr('required',false);
				$("#ogd_depot_bill_unit1").attr('required',false);
				$("#station_id5").attr('required',false);
				$("#preapp_ogd_group").attr('required',false);
				$("#preapp_ogd_rop").attr('required',false);
				
				// $("#preapp_desig").val("");
				// $("#ps_type_2").val("");
				// $("#preapp_otherstation").val("");
				// $("#preapp_level").val("");		
				// $("#preapp_scale").val("");			 
				// $("#depot_bill_unit1").val("");			
				// $("#station_id6").val("");
				// $("#preapp_rop").val("");	
				// $("#preapp_group").val("");
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				$("#preapp_sgd_other_desig").val(""); 
				$("#preapp_sgd_level").val(""); 
				$("#preapp_sgd_scale").val(""); 
				$("#depot_bill_unit2").val(""); 
				$("#station_id4").val(""); 
				$("#sgd_preapp_group").val(""); 
				$("#billunit2").val(""); 
				$("#depot2").val(""); 
				$("#station4").val("");
			
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_3").val(""); 
				$("#preapp_ogd_other_desig").val(""); 
				$("#preapp_ogd_level").val(""); 
				$("#preapp_ogd_scale").val(""); 
				$("#depot_bill_unit3").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");
					$("#billunit3").val(""); 
					$("#depot3").val(""); 
					$("#station5").val(""); 
											
					}
			});
		// officiating and substansive drop down Type hide show code end
	});
</script>

<script>
$(document).ready(function()
{	
	
	

	
	var med_exist=<?php echo $med_exist;?>;
	if(med_exist==1)
	{
		//alert("This Pf Number is Already Registered For Initial Medical Entry");
		$('#form_medical input').attr('disabled',true);
		$('#form_medical textarea').attr('disabled',true);
		$('#form_medical select').attr('disabled',true);
		$('#form_medical button').attr('disabled',true);
	}else{
		$('#form_medical input').attr('disabled',false);
		$('#form_medical textarea').attr('disabled',false);
		$('#form_medical select').attr('disabled',false);
	}
	
	var ini_exist=<?php echo $ini_exist;?>;
	
	if(ini_exist==1)
	{
		//alert("This Pf Number is Already Registered For Initial Appointment Entry");
		$('#initial_app_form input').attr('disabled',true);
		$('#initial_app_form textarea').attr('disabled',true);
		$('#initial_app_form select').attr('disabled',true);
		var pf_number='<?php echo "".$_SESSION['same_pf_no'];?>';
	//alert(pf_number);
	$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_appointment_data&pf_number='+pf_number,
			success:function(data){
			   //alert(data);
			var ddd=data;
			var arr2=ddd.split('$');
			var dt=arr2[3];
			 var newdate = dt.split("/").reverse().join("-");
			 
			 var rdt=arr2[4];
			 var newdate1 = rdt.split("/").reverse().join("-");
			 
			  var lrdt=arr2[15];
			 var newdate2 = lrdt.split("/").reverse().join("-");
			 
			
			 
			$("#app_dept").append(arr2[0]);
			$("#app_desig").append("<option selected>"+arr2[1]+"</option>");
			$('#app_date').val(newdate);
			$('#app_datereg').val(newdate1);
			if(arr2[20]=='1' || arr2[20]=='2' || arr2[20]=='3' || arr2[20]=='4')
			{
				 $("#scale_1").show();
				$("#level_1").hide(); 
			}else{
				 $("#scale_1").hide();
				$("#level_1").show(); 
			}
		    $("#ps_type_1").append("<option selected>"+arr2[5]+"</option>");
		     $("#app_scale").append(arr2[6]);
		     $("#app_level").append(arr2[7]);
		     $("#app_group").append(arr2[8]);
			 $("#station3").val(arr2[9]);
			 $("#app_rop").val(arr2[12]);
			 $("#depot3").val(arr2[13]);
			 $("#app_letterno").val(arr2[14]);
			 $("#app_letterdate").val(newdate2);
			 $("#app_remark").val(arr2[16]);
			  $("#station_id3").val(arr2[18]);
			  $("#depot_bill_unit3").val(arr2[19]);
			  $("#initial_type").append(arr2[17]);
			 // alert(arr2[21]);
			  if(arr2[21]!="4"){
				   $(".lbl_oth").show();
			   $(".lbl_reg").hide();
			   $("#appo_date").hide();
			  }else{
				  $(".lbl_oth").hide();
			   $(".lbl_reg").show();
			  }
			}
		});
	}else{
		$('#initial_app_form input').attr('disabled',false);
		$('#initial_app_form textarea').attr('disabled',false);
		$('#initial_app_form select').attr('disabled',false);
	}
	
	var pre_exist=<?php echo $pre_exist;?>;
	if(pre_exist==1)
	{
		//alert("This Pf Number is Already Registered For Present Working Entry");
		$('#pre_appo input').attr('disabled',true);
		$('#pre_appo textarea').attr('disabled',true);
		$('#pre_appo select').attr('disabled',true);
		
		 
// fetch present work
	var pre_pf=$("#pre_pf_no").val();
	//alert(pre_pf);
	$.ajax({
		type:"POST",
		url:"process.php",
		data:"action=fetch_present_work&pre_pf="+pre_pf,
		success:function(data){
			 // alert(data);
			
			var html = JSON.parse(data);
			// alert(html);
			 $("#preapp_dept").append("<option selected>"+html['preapp_department']+"</option>");
			  
			$("#preapp_sgd_desig").html(html['sgd_designation']);
			$("#preapp_desig").append("<option selected>"+html['preapp_designation']+"</option>");
			$("#preapp_otherstation").val(html['pre_otherdesign']);
			$("#ps_type_4").append("<option selected>"+html['ps_type']+"</option>");
			if(html['ps_type_a']=='1' || html['ps_type_a']=='2' || html['ps_type_a']=='3' || html['ps_type_a']=='4')
			{
				$("#level_4").hide();
				$("#scale_4").show();
			}
			else
			{
				$("#scale_4").hide();
				$("#level_4").show();
			} 
			$("#preapp_scale").append(html['preapp_scale']);
			$("#preapp_group").append(html['preapp_group']);
			$("#station6").val(html['preapp_station']);
			$("#station_id6").val(html['preapp_station']);
			$("#preapp_level").append(html['preapp_level']);
			$("#billunit1").val(html['preapp_billunit']);
			$("#depot_bill_unit1").val(html['preapp_billunit_id']);
			$("#depot1").val(html['preapp_depot']);
			$("#preapp_rop").val(html['preapp_rop']);
			$("#preapp_subtype1").val(html['sgd_dropdwn']);
			if(html['sgd_dropdwn']=='1')
			{	
				$("#show1").show();
				$("#show2").show();
				$("#pwd").hide();
				var val="Yes";
	            $("#preapp_subtype1").html("<option value='1' selected>"+val+"</option><option value='2'>No</option>");
				$("#preapp_desig").attr('  ',false);
				$("#preapp_group").attr('  ',false);
				$("#preapp_rop").attr('  ',false);
				$("#station_id6").attr('  ',false);
				$("#depot_bill_unit1").attr('  ',false);
				$("#ps_type_4").attr('  ',false);

				
				$("#preapp_desig").val("");
				$("#preapp_desig").val('blank').trigger('change');
				$("#ps_type_4").val("");
				$("#preapp_otherstation").val("");
				 
				$("#preapp_level").val('blank').trigger('change');
				$("#preapp_scale").val('blank').trigger('change');				
				 			 
				$("#depot_bill_unit1").val("");			
				$("#billunit1").val("");
				
				$("#station_id6").val("");
				$("#station6").val("");
				
				$("#preapp_rop").val("");	
				$("#preapp_group").val("");
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				
				$("#sgd_depot_bill_unit1").val(""); 
				$("#depot1").val(""); 
				$("#station_id4").val(""); 
				
				$("#sgd_preapp_group").val(""); 
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_2").val(""); 
				$("#ogd_depot_bill_unit1").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");

				}
			else {
					 
				$("#show1").hide();
				$("#show2").hide();
				$("#pwd").show();
				var val="No";
	            $("#preapp_subtype1").html("<option value='2' selected>"+val+"</option><option value='1'>Yes</option>");
				
				$("#preapp_sgd_desig").attr('  ',false);
				$("#sgd_ps_type_2").attr('  ',false);
				$("#sgd_depot_bill_unit1").attr('  ',false);
				$("#station_id4").attr('  ',false);
				$("#sgd_preapp_group").attr('  ',false);
				
				$("#preapp_ogd_desig").attr('  ',false);
				$("#ogd_ps_type_2").attr('  ',false);
				$("#ogd_depot_bill_unit1").attr('  ',false);
				$("#station_id5").attr('  ',false);
				$("#preapp_ogd_group").attr('  ',false);
				$("#preapp_ogd_rop").attr('  ',false);
				
				
			    $("#preapp_sgd_desig").val(""); 
				$("#sgd_ps_type_2").val(""); 
				$("#preapp_sgd_other_desig").val(""); 
				$("#preapp_sgd_level").val(""); 
				$("#preapp_sgd_scale").val(""); 
				$("#depot_bill_unit2").val(""); 
				$("#station_id4").val(""); 
				$("#sgd_preapp_group").val(""); 
				$("#billunit2").val(""); 
				$("#depot2").val(""); 
				$("#station4").val("");
			
				
				$("#preapp_ogd_desig").val(""); 
				$("#ogd_ps_type_2").val(""); 
				$("#preapp_ogd_other_desig").val(""); 
				$("#preapp_ogd_level").val(""); 
				$("#preapp_ogd_scale").val(""); 
				$("#depot_bill_unit3").val(""); 
				$("#station_id5").val(""); 
				$("#ogd_preapp_group").val("");
				$("#preapp_ogd_rop").val("");
					$("#billunit3").val(""); 
					$("#depot3").val(""); 
					$("#station5").val(""); 
											
			}
			$("#preapp_sgd_desig").val(html['sgd_designation']);
			$("#preapp_sgd_other_desig").val(html['presgd_otherdesign']);
			$("#sgd_ps_type_2").append("<option selected>"+html['sgd_pst']+"</option>");
			if(html['sgd_pst_a']=='1' || html['sgd_pst_a']=='2' || html['sgd_pst_a']=='3' || html['sgd_pst_a']=='4')
			{
				$("#level_2").hide();
				$("#scale_2").show();
			}
			else
			{
				$("#scale_2").hide();
				$("#level_2").show();
			} 
			$("#preapp_sgd_scale").append("<option selected>"+html['sgd_scale']+"</option>");
			$("#preapp_sgd_level").append("<option selected>"+html['sgd_level']+"</option>");
			$("#billunit2").val(html['sgd_billunit']);
			$("#depot_bill_unit2").val(html['sgd_billunit_id']);
			$("#depot2").val(html['sgd_depot']);
			$("#station4").val(html['sgd_station']);
			$("#station_id4").val(html['sgd_station']);
			$("#sgd_preapp_group").append("<option selected>"+html['sgd_group']+"</option>");
			$("#preapp_ogd_desig").append("<option selected>"+html['ogd_desig']+"</option>");
			$("#preapp_ogd_other_desig").val(html['preogd_otherdesign']);
			$("#ogd_ps_type_3").append("<option selected>"+html['ogd_pst']+"</option>");
			if(html['ogd_pst_a']=='1' || html['ogd_pst_a']=='2' || html['ogd_pst_a']=='3' || html['ogd_pst_a']=='4')
			{
				$("#level_3").hide();
				$("#scale_3").show();
			}
			else
			{
				$("#scale_3").hide();
				$("#level_3").show();
			} 
			$("#preapp_ogd_scale").append("<option selected>"+html['ogd_scale']+"</option>");
			$("#preapp_ogd_level").append("<option selected>"+html['ogd_level']+"</option>");
			$("#billunit4").val(html['ogd_billunit']);
			$("#depot_bill_unit4").val(html['ogd_billunit_id']);
			$("#depot4").val(html['ogd_depot']);
			$("#station5").val(html['ogd_station']);
			$("#station_id5").val(html['ogd_station']);
			$("#preapp_ogd_group").append("<option selected>"+html['ogd_group']+"</option>");
			$("#preapp_ogd_rop").val(html['ogd_rop']);
			 
				 
		}
	});
      
	}else{
		$('#pre_appo input').attr('disabled',false);
		$('#pre_appo textarea').attr('disabled',false);
		$('#pre_appo select').attr('disabled',false);
	}
	
	
	
    $(".tbl_id").hide();
    $(".show").click(function()
    {
		var show=$(this).attr("id");
		var show_id=show.slice(-1);
        $("#tbl_id"+show_id).show();
             
    });
	function open_modal(){
		$('#old_desg_modal').modal('show');
	}
	 
	

});
</script>					
<script>
var training_count=2;
$("#add_mul_training").click(function(){
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_training&training_count='+training_count,
		success:function(html){
			$("#add_training").prepend(html);
			$("#training_count").val(training_count);
			training_count++;
		}
	 });
});

var penalty_count=2;
$("#add_mul_penalty").click(function(){
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_penalty&penalty_count='+penalty_count,
		success:function(html){
			$("#add_penalty").prepend(html);
			$("#penalty_count").val(penalty_count);
			penalty_count++;
		}
	 });
});

var incr_count=2;
$("#add_mul_incr").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_increment&incr_count='+incr_count,
		success:function(html){
			//alert(html);
			$("#add_increment").prepend(html);
			$("#incr_count").val(incr_count);
			incr_count++;
		}
	 });
});

var award_count=2;
$("#add_mul_award").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_award&award_count='+award_count,
		success:function(html){
			//alert(html);
			$("#add_award").prepend(html);
			$("#award_count").val(award_count);
			award_count++;
		}
	 });
});

var adv_count=2;
$("#add_mul_adv").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_advance&adv_count='+adv_count,
		success:function(html){
			//alert(html);
			$("#add_advance").prepend(html);
			$("#adv_count").val(adv_count);
			adv_count++;
		}
	 });
});

var pro_count=2;
$("#add_mul_pro").click(function(){
	$.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_property&pro_count='+pro_count,
		success:function(html){
			//alert(html);
			$("#add_property").prepend(html);
			$("#pro_count").val(pro_count);
			pro_count++;
		}
	 });
});
var pr_min=pro_count-1;
$(".hide_make"+pr_min).hide();
</script>		
<script>
		 
		 
		 
</script>
<script>
$(document).ready(function(){
	
	$("#app_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth1").show();
          
	}else{
		 $(".lbl_oth1").hide();
	}	
});	

$("#preapp_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_predesig").show();
          
	}else{
		 $(".lbl_oth_predesig").hide();
	}	
});
$("#preapp_sgd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_sgd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_sgd_desig").hide();
	}	
});
$("#preapp_ogd_desig").change( function(){
	var x = $(this).val();
	if(x == '2029'){	
		  $(".lbl_oth_preapp_ogd_desig").show();
          
	}else{
		 $(".lbl_oth_preapp_ogd_desig").hide();
	}	
});

var r=0;
$(document).on("click",".add_source",function(){
	debugger;
	r++;
	
	var pt=$(this).attr('id');
	var t=pt.slice(-1);
	//alert(t);
	
	
	var source="<br><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group'><label class='control-label col-md-4 col-sm-3 col-xs-12' >Source Type</label><div class='col-md-8 col-sm-8 col-xs-12' ><select name='pd_sourcr_type"+t+"["+r+"]' id='pd_sourcr_type"+r+"' class='form-control select2' style='margin-top:0px; width:100%;' required><option disabled selected >Select Source Type</option><?php dbcon(); $sqlreligion=mysqli_query($conn,"select * from property_source") or die(mysqli_error($conn)); while($rwDept=mysqli_fetch_array($sqlreligion)){echo "<option value='".$rwDept['id']."'>".$rwDept['property_source']."</option>";}?></select></div></div></div><div class='col-md-6 col-sm-12 col-xs-12'><div class='form-group' ><label class='control-label col-md-4 col-sm-1 col-xs-12'>Amount</label><div class='col-md-8 col-sm-12 col-xs-12'><input type='text' id='pd_source_amt"+r+"' name='pd_source_amt"+t+"["+r+"]' class='form-control TextNumber' placeholder='Enter Source Amount' required></div></div></div><br>";

	
	$("#add_source_div"+t).append(source);
	//$(".select2").select2();
});


$("#remove_source").click(function(){
		 if(r>0)
		 {
			 $("#"+r).remove();
			 $("#desc_"+x).remove();
			 x--;
		 }else{
			 alert("No TextBox To Remove");
		 }
			 
	 });


 

var ad=1;
$("#incr_add_row").click(function(){
	debugger;
	ad++;
	var add_new_row="<tr><td>"+ad+"</td><td><select class='form-control primary select2' id='incr_type"+ad+"' name='incr_type"+ad+"' style='width:100%;' required><option value='blank' selected>-- Select Type --</option><option value='blank' ></option><?php $sqlDept=mysqli_query($conn,'select * from increment_type');while($rwDept=mysqli_fetch_array($sqlDept)){echo "<option value=' ".$rwDept["id"]."'> ".$rwDept["increment_type"]."</option>";}?></select></td><td><select class='form-control primary ps_type_addnew_row select2' id='ps_type_row_"+ad+"' name='ps_type_row_"+ad+"' style='margin-top:0px; width:100%;' num='"+ad+"' required><option value='' selected hidden disabled>-- Select PC Type --</option><?php echo $pay_scale_type;?></select></td><td><div class='col-md-12 col-sm-12 col-xs-12' id='scale_row_"+ad+"' num='"+ad+"' style='display:none;'><div class='form-group'> <div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 scale_drop_"+ad+"' id='scale_drop_"+ad+"' name='scale_drop_"+ad+"' style='width:100%;'></select></div></div></div><div class='col-md-12 col-sm-12 col-xs-12' id='level_row_"+ad+"' num='"+ad+"' style='display:none;'><div class='form-group'><div class='col-md-12 col-sm-8 col-xs-12'><select class='form-control primary select2 level_drop_"+ad+"' id='level_drop_"+ad+"' name='level_drop_"+ad+"' style='width:100%;'></select></div></div></div></td><td><input type='text' style='width:100%' id='incr_add_row_rop_"+ad+"' placeholder='enter rop' name='incr_add_row_rop"+ad+"'></td><td><input type='text' class='form-control primary calender_picker'placeholder='enter date' id='incr_date"+ad+"' name='incr_date"+ad+"' required/></td><td><textarea style='resize:none;width:100%' id='incr_row_reason_"+ad+"'name='incr_row_reason"+ad+"' placeholder='enter reason'> </textarea></td></tr>";
	
	$("#ad_row_incr").append(add_new_row);
	$("#row_count").val(ad);
	$(".select2").select2();
	$('.calender_picker').datepicker({
			format:'dd-mm-yyyy',
			autoclose:true,
			forceParse:false
			
		});
	
});
	
});

</script>
<?php include_once('../global/footer.php');?>  
<script>

 
</script>

<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<script>
 $("#modal_zone_station").select2();
 $("#modal_zone").select2();
 $("#modal_unit").select2();
 $("#bill_unit_depot").select2();
 $("#modal_station").select2();
 $("#modal_division").select2();
 $(".select2").select2();
	var bill_unit="";
	var deopt="";
	var station="";
	$(".bill_unit").click(function(){
			$('#modal_zone').val('blank').trigger('change'); 
			 $('#modal_unit').html("");
			 $('#bill_unit_depot').html("");
			 bill_unit=$(this).attr("id");
			 //alert(bill_unit);
		 });
	$(".station").click(function(){
		//alert('data');
		 $('#modal_zone_station').val('blank').trigger('change'); 
		$("#modal_station").html("");
		$("#modal_division").html("");
		station=$(this).attr("id");
		//$('#modal_zone').select2("val", null); 
		//alert(station);
		$(this).val("");
		
	});
	// Stations
	$("#modal_zone_station").change(function(){
	
	 //$('#modal_division').html("");
	 
	 var zone=$(this).val();
	   //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_division&zone='+zone,
		success:function(html){
			 //alert(html);
			$("#modal_division").html(html);
		}
		 
	 });
 });
	
	$("#modal_division").change(function(){
		var division=$(this).val();
		//alert(division);
		$("#modal_station").html("");
		$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_station&division='+division,
			success:function(html){
			// alert(html);
			$("#modal_station").html(html);
			}
		});
	});
	
	$("#modal_station_okay").click(function(){
		var station_name=$("#modal_station option:selected").text();
		var station_id=$("#modal_station").val();
		//alert(station_id);
		$("#"+station).val(station_name);
		var hidden_station=station.slice(-1);
		$("#station_id"+hidden_station).val(station_id);
		
		if($("#add_other_station").val()!="")
		{
			var new_station=$("#add_other_station").val();
			var new_div=$("#modal_division").val();
			//alert(new_station);
			//alert(new_div);
			$.ajax({
				type:'POST',
				url:'process.php',
				data:'action=add_new_station&new_station='+new_station+'&new_div='+new_div,
				success: function (html) {
				  $("#station_id"+hidden_station).val("");
				  $("#station3").val(new_station);
				  
				}
				
			});
		}
		
	});
	$("#bill_unit_depot").change(function(){
		
	});
	
 
 $("#modal_zone").change(function(){
	
	 $('#modal_unit').html("");
	 $('#bill_unit_depot').html("");
	 var zone=$(this).val();
	 //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_division1&zone='+zone,
		success:function(html){
			//alert(html);
			$("#modal_unit").html(html);
		}
		 
	 });
 });
 
 $("#modal_unit").change(function(){
	$('#bill_unit_depot').html("");
	 var unit=$(this).val();
	 //alert(zone);
	 $.ajax({
		type:'POST'	,
		url:'process.php',
		data:'action=get_bill_unit_depot&unit='+unit,
		success:function(html){
			//alert(html);
			$("#bill_unit_depot").html(html);
		}
		 
	 });
 });
 $("#modal_okay").click(function(){
		var got_billunit=$("#bill_unit_depot").val();
		//alert(got_billunit);
		$.ajax({
			type:'POST',
			url:'process.php',
			data:'action=get_separate&got_billunit='+got_billunit,
				success:function(html){
				//alert(html);
				var data=JSON.parse(html);
				var deopt=bill_unit.slice(-1);
				$("#"+bill_unit).val(data['billunit']);
				$("#depot"+deopt).val(data['deopt']);	
				$("#depot_bill_unit"+deopt).val(got_billunit);
			}
		});
		
		//alert(bill_unit);
		if(got_billunit=='not_available'){
			//alert('jdd');
			var got=bill_unit.slice(-1);
			$("#depot"+got).attr('readonly',false);
		}
});
/* $("#modal_biodata_okay").click(function(){
		 $("form").removeClass("apply_readonly");
	});  */
$("#modal_station").change(function(){
	//var p=$(this).attr("id");
	//var q =$("#"+p).val();
	//alert($(this).val());
	if($(this).val() == 'other_station'){
			//alert($(.other).attr("id"));
			$("#other_station").show();
		}  
});



 </script>
 <script>

</script>
<script>



$(".medical_initial").click(function(){
	debugger;
	<?php 
	if(isset($_SESSION['same_pf_no']))
	{
	?>
	if (<?php echo $_SESSION['same_pf_no'];?>!=""){
      var session=<?php echo $_SESSION['same_pf_no'];?>;
	  //alert(session);
	  $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_medical_detail&session="+session,
		success:function(data){
		 // alert(data);
		  var html=JSON.parse(data);
		 // alert(html['medi_pf_number']);
		 $("#medi_pf_no").val(html['medi_pf_number']);
		 $("#medi_exam").html("<option>"+html['medi_examtype']+"</option>");
		 $("#medi_cat").html("<option>"+html['medi_cate']+"</option>");
		  $("#medi_cat_pme").html("<option>"+html['medi_class']+"</option>");
		  $("#in_med_desig").html("<option>"+html['medi_design']+"</option>");
		  $("#medi_cer_no").val(html['medi_certino']);
		  $("#med_cer_date").val(html['medi_certidate']);
		  $("#med_ref").val(html['medi_refno']);
		  $("#med_ref_date").val(html['medi_refdate']);
		  $("#med_remark").val(html['medi_remark']);
		  }
	});
    } 
	<?php 
	}
	?>
});

$(document).on("change","#newpfnumber",function(){
	$.ajax({
		type:'POST'	,
		url:'set_session.php',
		data:'action=set_new_pf',
		success:function(html){
			  alert(html);
			  window.location='sr_entry.php';
		} 
	 });
});

var family_counter=2;
$("#add_member").click(function(){
	//alert("this"); 
	 $.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_family_form&family_counter="+family_counter,
		success:function(data){
		  //alert(data);
		  $("#add_member_div").prepend(data);
		  $("#hidden_fc_count").val(family_counter);
		  family_counter++;
		  //$(".select2").select2();
		  }
	});
	
});
$(document).on("change",".percentage",function(){
	var sum = 0; var amt =0;
	$( ".percentage" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 
$(document).on("change",".percentage2",function(){
	var sum = 0; var amt =0;
	$( ".percentage2" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 
$(document).on("change",".percentage3",function(){
	var sum = 0; var amt =0;
	$( ".percentage3" ).each(function( index ) {
			amt = 	parseInt($(this).val()) || 0;
		sum = sum + amt;
		if(sum>100)
		{
			alert("Percentage sum must be less than or equal to 100");
			$(this).val("");
		}
});
}); 

$('#rep_from_rev_carried').on('change', function() {
	 
		  if ($(this).val() == 'Yes')
		  {
			   $("#return2").hide();
			  $("#notreturn2").show(); 
			$("#prtf_rev_acc_ltr_no").val('');
			$("#prtf_rev_acc_ltr_date").val('');
			$("#rev_carr_wef_date").val('');
			$("#rev_carr_remark").val('');
		  }
		  else{
			$("#return2").show();
			$("#notreturn2").hide();
			  	$('#rep_rev_wefdate').val('');
       	        $('#rep_rev_incrdate').val('');
		  }
		   
		});
$('#prtf_carried').on('change', function() {
		  if ($(this).val() == 'Yes')
		  {
			$("#prtf_acc_ltr_no").val('');
			$("#prtf_acc_ltr_date").val('');
			$("#prtf_carr_wef_date").val('');
			$("#prtf_carr_remark").val('');
		  }
		  else{
			  	$('#prtf_wefdate').val('');
       	        $('#prtf_incrdate').val('');
		  }
		   
		});
		
		$('#prtf_rev_carried').on('change', function() {
	 
		  if ($(this).val() == 'Yes')
		  {
			   $("#return3").hide();
			  $("#notreturn3").show(); 
			$("#prtf_rev_acc_ltr_no1").val('');
			$("#prtf_rev_acc_ltr_date1").val('');
			$("#prtf_rev_carr_wef_date").val('');
			$("#prtf_rev_carr_remark").val('');
		  }
		  else{
			$("#return3").show();
			$("#notreturn3").hide();
			  	$('#prtf_rev_wefdate').val('');
       	        $('#prtf_rev_incrdate').val('');
		  }
		   
		});
		
		$('#fx_carried').on('change', function() {
	 alert('df');
		  if ($(this).val() == 'Yes')
		  {
			   $("#return4").hide();
			  $("#notreturn4").show(); 
			$("#fx_acc_ltr_no").val('');
			$("#fx_acc_ltr_date").val('');
			$("#fx_carr_wef_date").val('');
			$("#fx_carr_remark").val('');
		  }
		  else{
			$("#return4").show();
			$("#notreturn4").hide();
			  	$('#fx_wefdate').val('');
       	        $('#fx_incrdate').val('');
		  }
		   
		});
</script>