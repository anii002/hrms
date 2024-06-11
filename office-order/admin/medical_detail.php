<?php 
 session_start();
 /* if(!isset($_SESSION['SESS_MEMBER_NAME']))
 {
	 echo "<script>window.location='http://localhost/SR/index.php';</script>";
 } */
 $_GLOBALS['a'] ='medical';
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
  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
        Medical Details
      </h1>
    </section>
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Medical Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			
			<?php 
				dbcon1();
				$pf_no_id=$_GET['pf'];
				$page=$_GET['page'];
				//echo "<script>alert('$page');</script>";
				$sql=mysql_query("select * from medical_temp where medi_pf_number='$pf_no_id'");
				//echo "select * from medical_temp where medi_pf_number='$pf_no_id'".mysql_error();
				while($result=mysql_fetch_array($sql)){
					
					$medi_pf_number=$result['medi_pf_number'];
					$medi_examtype=$result['medi_examtype'];
					$medi_cate=get_medi_category($result['medi_cate']);
					$medi_dob=$result['medi_dob'];
					$date=date_create($medi_dob);
				    $medi_dob = date_format($date,"d-m-Y");
					$medi_appo_date=$result['medi_appo_date'];
					$date=date_create($medi_appo_date);
				    $medi_appo_date = date_format($date,"d-m-Y");
					$medi_class=$result['medi_class'];
					$medi_design=get_designation($result['medi_design']);
					$medi_certino=$result['medi_certino'];
					$medi_certidate=$result['medi_certidate'];
					$date=date_create($medi_certidate);
				    $medi_certidate = date_format($date,"d-m-Y");
					$medi_refno=$result['medi_refno'];
					$medi_refdate=$result['medi_refdate'];
					$date=date_create($medi_refdate);
				    $medi_refdate = date_format($date,"d-m-Y");
					$medi_remark=$result['medi_remark'];
					$datetime=$result['datetime'];
					$date=date_create($datetime);
				    $datetime = date_format($date,"d-m-Y");
					$updated_by=fetch_user($result['updated_by']);
				}
			?>
            <div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number<span class=""></span></label>
							  <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="text" class="form-control primary" value="<?php echo $medi_pf_number;?>" readonly />
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Category</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" class="form-control" value="<?php echo $medi_cate;?>" readonly> 
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
								<input type="text" name="last_med_dob" id="last_med_dob" class="form-control" value="<?php echo $medi_dob;?>" readonly>
								</div>
                            </div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Date Of Appointment</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" name="last_med_dob" id="last_med_dob" class="form-control" value="<?php echo $medi_appo_date;?>" readonly>
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
									<input type="text" class="form-control" id="last_desig" name="last_desig" value="<?php echo $medi_design;?>" readonly> 
								  </div>
                                </div>
						    </div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Class For PME</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control" id="last_class" name="last_class" value="<?php echo $medi_class;?>" readonly> 
								</div>
                            </div>
						</div>
					</div>
					<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
					<br>
					
					<div class="row">	
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Type of Medical Examination</label>
								<div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" class="form-control" id="last_exam" name="last_exam" value="<?php echo $medi_examtype;?>" readonly> 
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
								<input type="text" id="last_cer_no" name="last_cer_no" class="form-control" value="<?php echo $medi_certino;?>" readonly>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Medical Certificate Date</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="last_cer_date" name="last_cer_date" class="form-control" value="<?php echo $medi_certidate;?>"   readonly>
							  </div>
							</div>
						</div>
						
					</div>
					<br>
					<div class="row" >
					
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference </label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								 <textarea  rows="2" style="resize:none;" class="form-control primary" id="last_ref" name="last_ref" readonly><?php echo $medi_refno;?></textarea>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Medical Reference Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="last_ref_date" name="last_ref_date" class="form-control" value="<?php echo $medi_refdate;?>" readonly >
							  </div>
							</div>
						</div>
						 
					</div><br>
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group">
							<label class="control-label col-md-4 col-sm-3 col-xs-12" >Updated By</label>
							  <div class="col-md-8 col-sm-8 col-xs-12" >
								<input type="text" id="last_update" name="last_update" class="form-control" value="<?php echo $updated_by;?>"  readonly>
							  </div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="form-group" >
							<label class="control-label col-md-4 col-sm-1 col-xs-12">Updated Date</label>
							  <div class="col-md-8 col-sm-12 col-xs-12">
								<input type="text" id="last_update_date" name="last_update_date" class="form-control" value="<?php echo $datetime;?>"  readonly >
							  </div>
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-6 col-xs-12 pull-right">
						<br>	
						<a href="medical_update.php?pf=<?php echo $_GET['pf'];
						//echo "<script>alert('".$_GET['pf']."');</script>";
						?>" class="btn btn-primary" <?php if($page=='update'){echo "style=''";}else{echo "style='display:none;'";}?>>Back</a>
						<a href="display_sr_tab.php?pf=<?php echo $_GET['pf']; 
							//echo "<script>alert('".$_GET['pf']."');</script>";
						?>" class="btn btn-primary" <?php if($page=='display'){echo "style=''";}else{echo "style='display:none;'";}?>>Back</a>
						<br>
						</div>
						
					</div>
    </section>
  </div>
  <!--Content code end here--->

  
  <!-- Umesh Coding Here-->
  
  
  <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Update Awards</strong></h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_award">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Award Name</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Award Name" name="update_awr" id="update_awr" required maxlength="50">
					<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">
                  </div>
                </div>
                
                  
                 
                </div>
                <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
              </div>
      </div>
	  
	 <!--Umesh Coding End here-->
	 
	 
        
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Delete Awards</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="process.php?action=delete_award">

            <div class="form-group">
              Do you really want to delete the specified record?
              <div class="col-sm-10">
                <input type="hidden" class="form-control" id="delete_id" name="delete_id">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>
   <?php
 include_once('../global/footer.php');
 ?>