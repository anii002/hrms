<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');

include_once('../global/sidebaradmin.php');


function get_user_dept($id)
{
	$fetch="";
	$sql=mysql_query("select * from department where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		//$fetch="<option value='".$query['id']."'>".$query['dept']."</option>";
		$fetch =$query['dept'];
	}
		return $fetch;
		
}
function get_designation($id)
{
	$fetch="";
	$sql=mysql_query("select * from designation where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		//$fetch="<option value='".$query['id']."'>".$query['dept']."</option>";
		$fetch =$query['desg'];
	}
	
	return $fetch;
}

function get_zone($id)
{
	$fetch="";
	$sql=mysql_query("select * from zone where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		//$fetch="<option value='".$query['id']."'>".$query['dept']."</option>";
		$fetch =$query['zone'];
	}
	
	return $fetch;
}

function get_division($id)
{
	$fetch="";
	$sql=mysql_query("select * from division where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		//$fetch="<option value='".$query['id']."'>".$query['dept']."</option>";
		$fetch =$query['division'];
	}
	
	return $fetch;
}






?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
    User Management Page
      </h1>
    </section>
    <section class="content">
        <div class="box">
		<div class="tab-pane" id="postform">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Create Users</h3>
			</div>
			
			

			<form method="post" action="process.php?action=users_form" class="apply_readonly" id="postform">
			
			<div class="modal-body">
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Zone</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control select2" id="user_zone" name="user_zone"  required>
								<option disabled selected >Select Zone</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from zone");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["zone"]; ?></option>
								<?php
								
								}
							?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Division</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control select2" id="user_division" name="user_division"  required>
								<option disabled selected >Select Division</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from division");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["division"]; ?></option>
								<?php
								
								}
							?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					 
					<input type="hidden" name="valided_text" id="valided_text">
					<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group users">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >PF Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="user_pf_no" name="user_pf_no" class="form-control primary onlyNumber" placeholder="Enter PF Number" required onChange="pf_number(this)" maxlength="11">
									<span class="help-block user_pf_no"></span>
								  </div>
								</div>
							</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Employee Name</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="user_emp_name" name="user_emp_name" class="form-control onlyText" placeholder="Enter Employee Name" required>
								  </div>
								</div>
							</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Department</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control select2" id="user_dept" name="user_dept"  required>
								<option disabled selected >Select Department</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from department");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["dept"]; ?></option>
								<?php
								
								}
							?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Designation</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control select2" id="user_desg" name="user_desg"  required>
								<option disabled selected >Select Designation</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from designation");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["desg"]; ?></option>
								<?php
								
								}
							?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group per_con">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Employee Mobile Number</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="user_emp_mobile" name="user_emp_mobile" class="form-control onlyText" placeholder="Enter Mobile Number" onchange="phonenumber(this)" maxlength="10" required>
									<span class="help-block percon"></span>
								  </div>
								</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group email">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Employee E-mail ID</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="user_emp_email" name="user_emp_email" class="form-control onlyText" placeholder="Enter E-mail ID" onblur="email_valid(this)" required>
									<span class="help-block user_emp_email"></span>
								  </div>
								</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Username</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="text" id="user_emp_username" name="user_emp_username" class="form-control onlyText" placeholder="Enter Username" required>
								  </div>
								</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
								<label class="control-label col-md-4 col-sm-3 col-xs-12" >Password</label>
								  <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="password" id="user_emp_password" name="user_emp_password" class="form-control onlyText" placeholder="Enter Password" required>
								  </div>
								</div>
					</div>
				</div>
				<br>	
				
				<div class="col-sm-2 col-xs-12 pull-right">
							 <button  type="submit" class="btn btn-info source" >Save</button>
							 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
            </div>
			
			</form>
		</div>
		
			<div class="tab-pane" id="postform">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Created Users</h3>
			</div>
			
			<div class="modal-body" >
				<div class="row" >
					 <table id="example1" style="background-color:white" class="table table-bordered table-striped">
                <thead>
                <tr>
              
				  <th>Zone</th>
                  <th>Division</th>
                  <th>PF No</th>
                  <th>Emp Name</th>
				  <th>Department</th>
				  <th>Designation</th>
				  <th>Mob No</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
					$sql=mysql_query("select * from users where status='1'");
					if($sql)
					{
					while($result=mysql_fetch_array($sql))
					{
						echo "<tr>";
					
						echo "<td>".get_zone($result['zone'])."</td>";
						echo "<td>".get_division($result['division'])."</td>";
						echo "<td>".$result['pf_no']."</td>";
						echo "<td>".$result['emp_name']."</td>";
						echo "<td>".get_user_dept($result['dept'])."</td>";
						echo "<td>".get_designation($result['desg'])."</td>";
						echo "<td>".$result['mob_no']."</td>";
						echo "<td>
							<button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>Update User</button>
                      <button value='".$result['id']."' data-toggle='modal' data-target='#delete' class='btn btn-danger deleteBtn' style='margin-left:8px;'>Deactivate</button>
						</td>";
						echo "</tr>";
						
					}
					}
				?>
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
				</div>
            </div>
			
			</form>
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
          <h4 class="modal-title" id=""><strong>Update Created User</strong></h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_user">
              <div class="box-body">
			   <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Zone</label>

                  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="update_user_zone" name="update_user_zone" style="margin-top:0px; width:100%;" required>
							
							
							</select>
						  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Division</label>
				  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="update_user_division" name="update_user_division" style="margin-top:0px; width:100%;" required>
							
							
							</select>
						  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">PF No</label>
				  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control" placeholder="Enter PF No" name="user_pfno" id="user_pfno" required maxlength="50" readonly>
                    <!--<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
                
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Employee Name</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Employee Name" name="user_emp" id="user_emp" required maxlength="50">
                    <!--<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Department</label>

                  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="update_user_dept" name="update_user_dept" style="margin-top:0px; width:100%;" required>
							
							
							</select>
						  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Designation</label>

                 <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary select2" id="update_user_desg" name="update_user_desg" style="margin-top:0px; width:100%;" required>
							
							
							</select>
						  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Mobile Number</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Mobile Number" name="user_mob" id="user_mob" required maxlength="50">
                   <!-- <input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-md-3 col-sm-3 col-xs-12 control-label">E-mail ID</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter E-mail ID" name="user_email" id="user_email" required maxlength="50">
                  </div>
                </div>
                
              </div>

	  
	 <!--Umesh Coding End here-->
	 
	 
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		      </div>
      </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>Delete Created User</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="process.php?action=delete_user">

            <div class="form-group">
              Do you really want to Deactivate the specified record?
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
  
   <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>





<script>
 
</script>


   <script>

   
  
   
   
   
    $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
//	 alert(values);
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchuser', id: values}
              })
              .done(function(html) {debugger;
				 // alert(html);
                var data = JSON.parse(html);
				$("#update_user_zone").html(data.zone);
				$("#update_user_division").html(data.division);
				$("#user_pfno").val(data.pf_no);
                $("#user_emp").val(data.emp_name);
			    $("#update_user_dept").html(data.dept);
				$("#update_user_desg").html(data.desg);
				$("#user_mob").val(data.mob_no);
				$("#user_email").val(data.user_email);
                $("#hide_field").val(values);
              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
   
   
   
   
   $("#post_dept").select2();
   $("#post_category").select2();
   $("#post_fill").select2();
   $("#post_gradepay").select2();
 
   
$(document).ready(function(){
		$("#post_mor").on("change", function(){debugger;
		
			var ss=document.getElementById("post_ss").value;
			var mor=document.getElementById("post_mor").value;
			var voc=ss-mor;
    		document.getElementById("post_vac").value=voc;
		});
});

$(".select2").select2();



function pf_number(inputtxt)  
		{  
		  var pfno = /^[a-zA-Z0-9]{11}$/;  
		  if((inputtxt.value.match(pfno)))  
				{  
				$(".user_pf_no").text("");
				$("#valided_text").val("");
				$(".users").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				
				
				$(".user_pf_no").text("PF Number Should be of 11 digits");
				$("#valided_text").val("1");
				$(".users").addClass("has-error");
				
				alert("PF Number Should be of 11 digits");  
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
				
				return false;  
				}  
		}
				
		
function email_valid(inputtxt)  
		{  
		  var email = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
		  if((inputtxt.value.match(email)))  
				{  
				$(".user_emp_email").text("");
				$("#valided_text").val("");
				$(".email").removeClass("has-error");
			  return true;  
				}  
			  else  
				{  
				$(".user_emp_email").text("Enter Valid Email Address");
				$("#valided_text").val("1");
				$(".email").addClass("has-error");
				alert("Enter Valid Email Address");  
				//$("#bio_cug").val("");
				return false;  
				}  
		}
				


</script>
   <?php
 include_once('../global/footer.php');
 ?>


  