<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
    POST SCHEDULE
      </h1>
    </section>
    <section class="content">
        <div class="box">
		<div class="tab-pane" id="postform">
			<div class="box-header with-border">
				<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Post Schedule Entry Page</h3>
			</div>
			
			

			<form method="post" action="process.php?action=post_form" class="apply_readonly" id="postform">
			
			<div class="modal-body">
			
				<br>
				<div class="row">
					 
					
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Department</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<select class="form-control primary" id="post_dept" name="post_dept" style="margin-top:0px; width:100%;" required>
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
						 <label class="control-label col-md-4 col-sm-3 col-xs-12" >Category</label>
						  <div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="post_category" name="post_category"  required>
								<option disabled selected >Select Category</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from category_new");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["categary"]; ?></option>
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
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Level</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="post_gradepay" name="post_gradepay"  required>
								<option disabled selected >Select Level of Pay</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from seventh");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["level"]; ?></option>
								<?php
								
								}
							?>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Mode of Fill</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="post_fill" name="post_fill"  required>
								<option disabled selected >Select Mode of Filling</option>
									<?php
								dbcon();
								$sqlDept=mysql_query("select * from mode_of_fill");
								if (! $sqlDept){
								   echo 'Database error: ' . mysql_error();
								}
								while($rwDept=mysql_fetch_array($sqlDept))
								{
								?>
								<option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["mode_of_fill"]; ?></option>
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
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >SS</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
									<input type="text" class="form-control onlyNumber" id="post_ss" onchange="cal_vac()" name="post_ss" required/>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >MOR</label>
						<div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="number" class="form-control" id="post_mor" onchange="cal_vac()"  onkeypress="temp()" onkeydown="temp()" name="post_mor" required />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="number" class="form-control" id="post_vac" onchange="cal_vac()"  name="post_vac" readonly required />
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC IN Hand<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="number" class="form-control" id="post_vacinhg" onchange="cal_netvac()" name="post_vacinhg" required />	
							</div>
						</div>
					</div>
				</div>
				<br>	
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Under TRG<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="number" class="form-control" id="post_trg" onchange="cal_netvac()"	 name="post_trg" required />	
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">NET VAC<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="number" class="form-control" id="post_netvac" name="post_netvac" readonly />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
			 	<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Assessment<span class=""></span></label>
						<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="date" class="form-control primary" id="post_dateass" name="post_dateass" required>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Notification<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="date" class="form-control primary " id="post_datenot" name="post_datenot"/>
							</div>
                        </div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Exam</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="post_dateexam" name="post_dateexam" required />
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Panel<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="date" class="form-control primary " id="post_datepanel" name="post_datepanel" required />
							</div>
                        </div>
					</div>
			
				</div>
				<br>
				 <div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						 <label class="control-label col-md-2 col-sm-3 col-xs-12" >Action Plan</label>
						  <div class="col-md-10 col-sm-9 col-xs-12">
							<textarea  rows="2" style="resize:none;" class="form-control primary description" id="post_plan" name="post_plan"  placeholder="Enter Action Plan" ></textarea>
							<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">
					  </div>
					</div>
				</div>
				</div>
				<br>
				<div class="form-group">
				<div class="row">
					<div class="col-sm-12 col-md-3 col-xs-12 pull-right">
					<input type="submit" id="btnSave" name="btnSave" value="Add Record"  class="btn btn-success" />
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<br>
					</div>
					</div>
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
          <h4 class="modal-title" id=""><strong>Update Post Schedule</strong></h4>
        </div>
       <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_postschedule">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Department Name</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Department Name" name="update_dept" id="update_dept" required maxlength="50">
                    <input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Category Name</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Category Name" name="update_cat" id="update_cat" required maxlength="50">
                    <!--<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Grade Pay</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Grdae Pay" name="update_grade" id="update_grade" required maxlength="50">
                    <!--<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Date of Ass</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Date of Ass" name="update_ass" id="update_ass" required maxlength="50">
                    <!--<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
				<div class="form-group">
                  <label for="inputEmail3" class="col-md-3 col-sm-3 col-xs-12 control-label">Date of Exam</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Date of Exam" name="update_exam" id="update_exam" required maxlength="50">
                   <!-- <input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field" required maxlength="50">-->
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-md-3 col-sm-3 col-xs-12 control-label">Date of Panel</label>

                  <div class="col-md-8 col-sm-10 col-xs-12">
                    <input type="text" class="form-control"  placeholder="Enter Date of Panel" name="update_panel" id="update_panel" required maxlength="50">
                  </div>
                </div>
                
              </div>
      </div>
	  
	 <!--Umesh Coding End here-->
	 
	 
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
          <h4 class="modal-title" id=""><strong>Delete Religion</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="process.php?action=delete_religion">

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
  
   <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
   <script>

   
  
   
   
   
    $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchdesignation', id: values}
              })
              .done(function(html) {
				
                var data = JSON.parse(html);
                $("#update_zone").val(data.zone);
                $("#update_dept").val(data.dept);
				$("#update_desg").val(data.desg);
                $("#hide_field").val(values);
              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
   
   
   
   $(".select2").select2();
   $("#post_dept").select2();
   $("#post_category").select2();
   $("#post_fill").select2();
   $("#post_gradepay").select2();
 
   
function cal_vac()
		{
			var ss=parseInt(document.getElementById("post_ss").value);
			var mor=parseInt(document.getElementById("post_mor").value);
			
			var voc=ss-mor;
    		document.getElementById("post_vac").value=voc;
			cal_netvac();
		}
 function cal_netvac()
 {
			var vac=parseInt(document.getElementById("post_vac").value);
		    var  vacin=parseInt(document.getElementById("post_vacinhg").value);
			var utrg=parseInt(document.getElementById("post_trg").value);
			var netvac1=vac+vacin;
			var netvac=netvac1-utrg;
    		document.getElementById("post_netvac").value=netvac;
		}
</script>
   <?php
 include_once('../global/footer.php');
 ?>


  