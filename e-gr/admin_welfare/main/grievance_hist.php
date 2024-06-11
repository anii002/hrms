<?php
require_once('Global_data/header.php');
//error_reporting(0);
include('config.php');
?>

	
 <!-- PNotify -->
      <!-- page content -->
        <div class="box container" style="padding:20px;border:1px solid black;">
			<div class="right_col" role="main"style="background-image: url('images/small1.png');repeat:repeat;">
				<div class="">
					<div class="page-title">
						<div style="text-align:center;"> 
						<label style="font-size:20px;"> <i class=""></i><b>Grievance History</b></label><br>
					  </div>
					  <div class="title_right">   
					  </div>
					</div>
				<div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
					<form  method="POST" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<?php
						$cur_user=$_SESSION["user"];
						//echo "<script>alert('$cur_user');</script>";
						$sql="select e.emp_type,e.emp_id,e.emp_name,e.emp_dept,e.emp_desig,e.emp_mob,e.emp_email,e.emp_aadhar,e.office,e.station,g.gri_type,g.gri_desc,g.up_doc,g.gri_upload_date,g.gri_ref_no,g.doc_id from employee e INNER JOIN tbl_grievance g ON e.emp_id=g.emp_id WHERE g.emp_id='$cur_user'";
							
							$exe_query=mysql_query($sql) or die(mysql_error());
						while($result=mysql_fetch_array($exe_query))
						{
							$emp_type=$result['emp_type'];
							$emp_id=$result['emp_id'];
							$emp_name=$result['emp_name'];
							$emp_dept=$result['emp_dept'];
							$emp_desig=$result['emp_desig'];
							$emp_mob=$result['emp_mob'];
							$emp_email=$result['emp_email'];
							$emp_aadhar=$result['emp_aadhar'];
							$office=$result['office'];
							$station=$result['station'];
							$gri_type=$result['gri_type'];
							$gri_desc=$result['gri_desc'];
							$up_doc=$result['up_doc'];
							$gri_upload_date=$result['gri_upload_date'];
							$gri_ref_no=$result['gri_ref_no'];
							$doc_path=$result['doc_id'];
						}
							$fetch_cat=mysql_query("select * from emp_type where id='".$emp_type."'");
							while($cat_fetch=mysql_fetch_array($fetch_cat))
							{
								$e_type=$cat_fetch['type'];
							}
							
							$get_des=mysql_query("select designation from tbl_designation where id='".$emp_desig."'");
							while($fetch_des=mysql_fetch_array($get_des))
							{
								$got_des=$fetch_des['designation'];
							}
							//echo "<script>alert('$got_des');</script>";
						
							$get_off=mysql_query("select office_name from tbl_office where office_id='".$office."'");
							while($fetch_off=mysql_fetch_array($get_off))
							{
								$got_off=$fetch_off['office_name'];
							}
							$got_dept="";
							$get_dept=mysql_query("select deptname from tbl_department where dept_id='".$emp_dept."'");
							while($fetch_dept=mysql_fetch_array($get_dept))
							{
								$got_dept=$fetch_dept['deptname'];
							}
							
							$get_st=mysql_query("select station_name from tbl_station where station_id='".$station."'");
							while($fetch_st=mysql_fetch_array($get_st))
							{
								$got_st=$fetch_st['station_name'];
							}
							
					?>
					
					<div class="row" style="margin-top:10px;">
				  <label style="font-size:16px;padding:5px;">Personal History</label>
					<div class="col-md-12 col-sm-12 col-xs-12" >
						<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Employee Type</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $e_type; ?></span>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Emp-id/PF No</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $emp_id; ?></span>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Employee Name</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $emp_name; ?></span>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Department</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $got_dept; ?></span>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Designation</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $got_des; ?></span>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>mobile Number</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $emp_mob; ?></span>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>E-mail id</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $emp_email; ?></span>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
											<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Aadhar Number</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $emp_aadhar; ?></span>
										</div>
									</div>
								</div> 
								<div class="row">
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>office</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $got_off; ?></span>
										</div>
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<div class="col-md-6 col-sm-6 col-xs-6 ">
											<label>Station</label>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-6">
											<span><?php echo $got_st; ?></span>
										</div>
									</div>
								</div> 
								
								
								
					</div>
				  </div>				
							<div class="row" style="border:1px solid black;margin-top:20px;">
							<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div>
                    <label style="padding:5px;font-size:16px;">Employee Grievance</label>
                 <div class="x_content table-responsive">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Griv. Ref. No.</th>
							<th>Remark</th>
							<th>Date</th>
							<!--th>Action</th-->
							<th>Status</th>
							<th>Document Link</th>
							
						 </tr>
					  </thead>
                      <tbody>
					
						<?php
								function get_status($status){
									$sql1=mysql_query("select status from status where id=$status");
									$status_fetch="";
									while($sql_query1=mysql_fetch_array($sql1))
									{
										$status_fetch=$sql_query1['status'];
									}
									return $status_fetch;
								}
								function get_action($action){
									$f_action=mysql_query("select action from action where id=$action");
									while($action_f=mysql_fetch_array($f_action))
									{
										$a_c=$action_f['action'];
									}
									return $a_c;
								}
								$fire_all=mysql_query("select  * from tbl_grievance where gri_ref_no='".$_GET['griv_no']."'");
								while($all_fetch=mysql_fetch_array($fire_all))
								{
									$gri_ref_no=$all_fetch['gri_ref_no'];
									$forwarded_date=$all_fetch['gri_upload_date'];
									$remark=$all_fetch['gri_desc'];
									//$return_action=get_action($all_fetch['action']);
									$status=get_status($all_fetch['status']);
									$doc_id=$all_fetch['doc_id'];
									echo "<tr>";
									echo "<td>$gri_ref_no</td>";
									echo "<td>$remark</td>";
									echo "<td>$forwarded_date</td>";
								//	echo "<td>$return_action</td>";
									echo "<td>$status</td>";
									$sql_doc_sec=mysql_query("select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$cur_user'");
									//echo "select * from doc where griv_ref_no='$gri_ref_no' and uploaded_by='$cur_user'".mysql_error();
									echo "<td>";
									$count_doc = 1;
									$cnt=0;
									while($doc_fetch=mysql_fetch_array($sql_doc_sec))
									{
										//echo $doc_fetch['doc_path'];
										echo "<a href='admin/main/upload_doc/".$doc_fetch['doc_path']."' target='_blank' id='".$cnt."' name='".$cnt."' >DOC&nbsp;&nbsp;&nbsp;</a>";
										$cnt++;
									}
									if(mysql_num_rows($sql_doc_sec)>0)
									{
										$count_doc++;
									}
										
									echo "</td>";
									echo "</tr>";
								} 
							?>
                         </tbody>
                    </table>
                  </div>             
				  </div>
              </div>

              
            </div>
				<!---------------------------------    table forward       ------------------------------------>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                
                    <label style="padding:5px;font-size:16px;">Grievance History</label>
	<!------------- Reminder Coding---------------------------------------->
					<?php
						$sql_rem=mysql_query("select * from tbl_grievance where gri_ref_no='$gri_ref_no' and status='4'");
						$rem_ref=(int)mysql_num_rows($sql_rem);
						if($rem_ref == 0){
							$sql_inner=mysql_query("select * from reminder where griv_ref_no='$gri_ref_no' ORDER BY rem_id DESC LIMIT 1");
							$inner_sql=mysql_fetch_array($sql_inner);
							$rem_date=$inner_sql['reminder_date'];
							$got_date=date("Y-m-d", strtotime("$rem_date"));
							$cur_date=date("Y-m-d");
							$com_date=date("Y-m-d", strtotime($got_date. ' + 2 days'));	
							
							//echo "<script>alert('$got_date');</script>";
							
								if($cur_date >= $com_date){
									echo "<a class='btn btn-danger pull-right' href='#' data-toggle='modal' data-target='#reminder' id='rem' name='rem'><i class='fa fa-bell-o' aria-hidden='true'></i> Reminder</a>";
								}	
							
							} 
							?>
	<!-------------End Reminder Coding---------------------------------------->
                 <div class="x_content table-responsive">
					<table  class="table table-striped table-bordered display" style="width:100%;"> 
                      <thead>
                         <tr>
							<th>Sr.No</th>
							<th>Date</th>
							<th>Remarks</th>
							<th>Taken Action</th>
							<th>Forwarded To</th>
							<th>Documents Links</th>
						
							
						 </tr>
					  </thead>
                      <tbody>
					  <?php 
						$griv_no=$_GET['griv_no'];
						//echo "<script>alert('$griv_no');</script>";
								function get_user1($first_id){
									$first_user=mysql_query("select user_name from tbl_user where user_id='$first_id'");
									$count_record = mysql_num_rows($first_user);
									if($count_record>0)
									{
										$user_first=mysql_fetch_array($first_user);
										$f_user=$user_first['user_name'];
									}
									else{
										$first_user=mysql_query("select emp_name from employee where emp_id='$first_id'");
										$count_record = mysql_num_rows($first_user);
										$user_first=mysql_fetch_array($first_user);
										$f_user=$user_first['emp_name'];
									}
									return $f_user;
								}
								function get_user2($second_id){
									$second_user=mysql_query("select user_name from tbl_user where user_id='$second_id'");
									while($user_second=mysql_fetch_array($second_user))
									{
										$s_user=$user_second['user_name'];
									}
									return $s_user;
								}
								$fire_all=mysql_query("select  * from tbl_grievance_forward where griv_ref_no='$griv_no'");
								
									$count_doc = 1;
									$cnt=0;
									$sr_no=1;
								while($all_fetch=mysql_fetch_array($fire_all))
								{
									$forwarded_date=$all_fetch['forwarded_date'];
									$remark=$all_fetch['remark'];
									$user_id=get_user1($all_fetch['user_id']);
									$user_id_forwarded=get_user1($all_fetch['user_id_forwarded']);
									//$return_action=get_action($all_fetch['return_action']);
									$status=get_status($all_fetch['status']);
									$doc_id=$all_fetch['doc_id'];
									$status=$all_fetch['status'];
									echo "<tr>";
									echo "<td>$sr_no</td>";
									echo "<td>$forwarded_date</td>";
									echo "<td>$remark</td>";
									echo "<td>$user_id</td>";
									echo "<td>$user_id_forwarded</td>";
									$sql_doc_sec=mysql_query("select * from doc where griv_ref_no='$griv_no' and uploaded_by='".$all_fetch['user_id']."' AND count='".$all_fetch['id']."'");
									$sr_no++;
									echo "<td>";
									while($doc_fetch=mysql_fetch_array($sql_doc_sec))
									{
										if($all_fetch['user_id']=='1'){
											echo "<a href='admin/main/admin_upload/".$doc_fetch['doc_path']."' target='_blank' id='".$cnt."' name='".$cnt."' >DOC&nbsp;&nbsp;&nbsp;</a>";
										} else {
										echo "<a href='admin_user/main/upload_doc/".$doc_fetch['doc_path']."' target='_blank' id='".$cnt."' name='".$cnt."' >DOC&nbsp;&nbsp;&nbsp;</a>";
										}
										$cnt++;
									}
									if(mysql_num_rows($sql_doc_sec)>0)
									{
										$count_doc++;
									}
										
									echo "</td>"; 
									echo "</tr>";
								}
							?>
						<input type="hidden" name="hidden_status" id="hidden_status" value="<?php echo $status;?>">
						<input type="hidden" name="hidden_griv" id="hidden_griv" value="<?php echo $griv_no;?>">
						<?php
							$fetch_satisfy=mysql_query("select * from emp_satisfy where griv_ref_no='$griv_no'");
							$row_count=mysql_num_rows($fetch_satisfy);
							while($satisfy_fetch=mysql_fetch_array($fetch_satisfy)){
								$griv_ref=$satisfy_fetch['griv_ref_no'];
								$emp_no=get_user1($satisfy_fetch['emp_id']);
								$emp_remark=$satisfy_fetch['remark'];
								$emp_feedback=$satisfy_fetch['emp_feedback'];
								$created_at=$satisfy_fetch['created_at'];
								echo "<tr>";
								echo "<td>$sr_no</td>";
								echo "<td>$created_at</td>";
								echo "<td>$emp_remark</td>";
								echo "<td>$emp_no</td>";
								echo "<td>$emp_feedback</td>";
								echo "<td></td>";
								echo "<tr>";
							}
							$x=0;
							if($row_count>0)
							{
								$x++;
							}
						?>
                         </tbody>
                    </table>
                  </div>             
				 
              </div>

              
            </div>
          </div>
		  <?php if($row_count<=0)
		  {
			 ?>
		<div class="user_feedback" id="user_feedback"> 
			<div class="row" style="margin-top:20px;">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-6 col-xs-12" style="margin-left: -50px;" >Your FeedBack</label>
								  <div class="col-md-8 col-sm-6 col-xs-12">
									<select id="emp_react" name="emp_react" class="form-control">
									<option value="" disabled selected>Select Your feedback</option>
									<option value="Satiesfied">Satisfied</option>
									<option value="Not-Satisfied">Not Satisfied</option>
									<option value="Partially-Satisfied">Partially Satisfied</option>
									<option value="Re-Forward">Re-Forward</option>
									</select>
								  </div>
                                </div>
						    </div>
			 </div>
		<div class="row">
						<label class="artperadd">FeedBack</label>
						</div>
						 <div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="form-group">
								
								  <div class="col-md-12 col-sm-12 col-xs-12" >
									<textarea style="resize:none" rows="4"  name="feedback_desc" id="feedback_desc" class=" form-control" ></textarea>
								  </div>
                                </div>
						    </div>
											
						</div>




				  
						
						<div style="float:right;margin-top:10px;" class="col-sm-6 col-xs-6">
							 <button  type="submit" class="btn btn-info" name="satisfy" id="satisfy">Submit</button>
							
						   
						</div>
			</div>
		  <?php } ?>
					</form>
					</div>

                  </div>
				
              </div>
            </div>
          </div>
		  <?php
		  
if(isset($_POST['satisfy'])){
	
	$react=$_REQUEST['emp_react'];
	$griv_no=$_REQUEST['hidden_griv'];

	$remark=$_REQUEST['feedback_desc'];
	$_remark=mysql_real_escape_string($remark);
	if($react=='Re-Forward'){
		
		$sql_satisfy=mysql_query("insert into tbl_grievance_forward(griv_ref_no,emp_id,user_id,user_id_forwarded,forwarded_date,remark,status,section_action) values('$griv_no','$cur_user','$cur_user','1',CURRENT_TIMESTAMP,'$_remark','3','4')");
		$last_id=mysql_insert_id();
		if($sql_satisfy){
			$set_zero=mysql_query("update tbl_grievance_forward set status='0' where griv_ref_no='$griv_no' and id < $last_id");
			$status_update=mysql_query("update tbl_grievance set status='3' where gri_ref_no=$griv_no");
			echo "<script>alert('Grievance Forwarded successfully');window.location='griv_history.php';</script>";
		}else{//window.location='griv_history.php';
			echo "<script>alert('failed');</script>";
		}
		
	}else{
		
	/* $remark=$_REQUEST['feedback_desc'];
	$_remark=mysql_real_escape_string($remark); */
	
	$sql_satisfy=mysql_query("insert into emp_satisfy(griv_ref_no,emp_id,remark,emp_feedback) values('$griv_no','$cur_user','$_remark','$react')");
	if($sql_satisfy){
		echo "<script>alert('Feedback has been added successfully ');window.location='griv_history.php';</script>";
	}else{//window.location='griv_history.php';
		echo "<script>alert('failed');</script>";
	}
  }	
}
?>
        </div>
		</div>
<!---------------------- Reminder Modal --------------------------------->
 <div id="reminder" class="modal fade" role="dialog">
  <div class="modal-dialog">

  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reminder</h4>
      </div>
	  <form action="process.php?action=add_rem" method="POST">
      <div class="modal-body">
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
				<label class="control-label col-md-4 col-sm-3 col-xs-12">Emp Id</label>
				  <div class="col-md-8 col-sm-8 col-xs-12">
				  <input type="hidden" id="hidden_date" name="hidden_date">
					<input type="text" class="form-control" id="rem_emp_id" name="rem_emp_id" value="" readonly>
				  </div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-12 col-sm-12 col-xs-12" >
				<div class="form-group">
				<label class="control-label col-md-4 col-sm-3 col-xs-12" >Grievance Ref. Number</label>
				  <div class="col-md-8 col-sm-8 col-xs-12">
					<input type="text" class="form-control" id="rem_griv_no" name="rem_griv_no" readonly>
				  </div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:20px;">
			<div class="col-md-12 col-sm-12 col-xs-12" >
				<div class="form-group">
				<label class="control-label col-md-4 col-sm-3 col-xs-12" >Remark</label>
				  <div class="col-md-8 col-sm-8 col-xs-12">
					<textarea class="form-control" col="7" rows="5" id="rem_remark" name="rem_remark" style="resize:none;"></textarea>
				  </div>
				</div>
			</div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>
<!-------------------------Reminder modal end----------------------------------------->
<?php
require_once('global/footer.php');
?>
<link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
<script>
$("#emp_dept").select2();
$("#emp_desig").select2();
$("#emp_state").select2();
$("#emp_city").select2();
$("#office_emp_state").select2();
$("#office_emp_city").select2();
</script>
<script>
debugger;
		var row_num=<?php echo $x;?>;
		var status=$("#hidden_status").val();
		if(status=="4")
		{
			$("#user_feedback").show();
		}else {
			$("#user_feedback").hide();
		}
		var status=$("#hidden_status").val();
		if(status=="4")
		{
			$("#user_feedback").show();
		}else{
			$("#user_feedback").hide();
		}

 $('#emp_state').on('change',function(){
        var stateID = $(this).val();
		//alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'statechange.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#emp_city').html(html);
                }
            }); 
        }else{
            $('#emp_city').html('<option value="">Select state first</option>'); 
        }
    });	
	$('#office_emp_state').on('change',function(){
		//debugger;
        var stateID = $(this).val();
		//alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'statechange.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#office_emp_city').html(html);
                }
            }); 
        }else{
            $('#office_emp_city').html('<option value="">Select state first</option>'); 
        }
    });
	//reminder code
	debugger;
	 $("#rem").click(function(){
		var rem_emp_id= "<?php echo $emp_id; ?>";
		var upload_date = "<?php echo $gri_upload_date; ?>";
		var rem_griv = <?php echo $gri_ref_no; ?>;
		
		$("#rem_emp_id").val(rem_emp_id);
		$("#rem_griv_no").val(rem_griv);
		$("#hidden_date").val(upload_date);
		
	}); 
</script>


