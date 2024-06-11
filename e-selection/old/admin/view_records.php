<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');

error_reporting(0);

function get_level($id)
{
	$fetch="";
	$sql=mysql_query("select * from seventh where id='".$id."'");
	
	while($query=mysql_fetch_array($sql))
	{
		//$fetch="<option value='".$query['id']."'>".$query['dept']."</option>";
		$fetch =$query['level'];
	}
	
	return $fetch;
}

function get_dept($id)
{
	$sql=mysql_query("select * from department where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['dept'];
	}
	return $fetch;
}


function get_mod_fill($id)
{
	$sql=mysql_query("select mode_of_filling from excel_table where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['mode_of_filling'];
	}
	return $fetch;
}


function get_cat($id)
{
	$sql=mysql_query("select categary from category_new where id='".$id."'");
	$fetch="";
	while($query=mysql_fetch_array($sql))
	{
		$fetch=$query['categary'];
	}
	return $fetch;
}



?>
  <div class="content-wrapper">
    <section class="content-header" style=" padding-left:20px;padding-bottom:10px;">
      <h1>
      View Post Schedule
      </h1>
    </section>
    <section class="content">
       
	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Department</th>
                  <th>Category</th>
				  <th>Date of Assessment</th>
				  <th>Date of Exam</th>
				  <th>Date of Panel</th>
				  <th>Date of Notification</th>
				  <th>In-Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php 
					$sql=mysql_query("select * from post_schedule where updated_by='Admin'");
               			
					
				if($sql)
				{
					while($result=mysql_fetch_array($sql))
					{
						$conv=$result['date_of_ass'];
					    if($conv!='0000-00-00')
					{
						$con1=date('d-m-Y',strtotime($conv));
					}
					else
					{
						$con1=$result['date_of_ass'];
					}
					
					 $con_exam1=$result['date_of_exam'];
					 if($con_exam1!='0000-00-00')
					{
						$con_exam=date('d-m-Y',strtotime($con_exam1));
					}
					else
					{
						$con_exam=$result['date_of_exam'];
					}
					
					$con_date_pan1=$result['date_of_panel'];
					if($con_date_pan1!='0000-00-00')
					{
				    $con_date_pan=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_pan=$result['date_of_panel'];
					}
					
					$con_date_noti1=$result['date_of_noti'];
					if($con_date_noti1!='0000-00-00')
					{
				    $con_date_not=date('d-m-Y',strtotime($con_date_pan1));
					}
					else
					{
						$con_date_not=$result['date_of_noti'];
					}
					
					$in_date=$result['date_time'];
					//echo $in_date1;
					if($in_date!='0000-00-00')
					{
				    $in_date1=date('d-m-Y',strtotime($in_date));
					}
					else
					{
						$in_date1=$result['date_time'];
					}
						
						echo "<tr>";
						echo "<td>".get_dept($result['dept'])."</td>";
						echo "<td>".get_cat($result['category'])."</td>";
						echo "<td>".$con1."</td>";
						echo "<td>".$con_exam1."</td>";
						echo "<td>".$con_date_pan."</td>";
						echo "<td>".$con_date_not."</td>";
						echo "<td>".$in_date1."</td>";
						echo "<td>
						
							<button type='button' value='".$result['id']."' data-target='#update' data-toggle='modal' class='btn btn-primary update_btn'>View</button>
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
		 <!--Umesh Code end here-->
		 <script>
		 
  $(function () {
    $('#example1').DataTable()
    /* $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    }) */
  })
</script> 
    </section>
  </div>
  <!--Content code end here--->

  
  <!-- Umesh Coding Here-->
  
  <!--Update Post Schedule Code here-->
  
  <div class="modal fade" style="width:100%;" id="update" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog" style="width:80%; height:800px;">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=""><strong>View Post Schedule Entries</strong></h4>
        </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="process.php?action=update_postschedule">
             <div class="modal-body">
				<div class="row">
				   <div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Department</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="form-control primary select2" id="post_dept" name="post_dept" style="margin-top:0px; width:100%;" readonly >
						  </div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Category</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="form-control primary select2" id="post_category" name="post_category" style="margin-top:0px; width:100%;" readonly>
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12" id="">
				<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Level</label>
							<div class="col-md-8 col-sm-8 col-xs-12" id="">
								<input type="text" class="form-control primary select2" id="post_level" name="post_level" style="margin-top:0px; width:100%;" readonly>
							</div>
							</div>
				</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Mode of Fill</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							<input type="text" class="form-control primary select2" id="post_fill" name="post_fill" style="margin-top:0px; width:100%;" readonly>
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
									<input type="text" class="form-control onlyNumber" id="post_ss" name="post_ss" readonly/>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg" >MOR</label>
						<div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="text" class="form-control onlyNumber" id="post_mor"  onkeypress="temp()" onkeydown="temp()" name="post_mor" readonly />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12" id="">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" class="form-control onlyNumber" id="post_vac" name="post_vac" readonly />
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">VAC In Hand<span class=""></span></label>
							<div class="col-md-8 col-sm-8 col-xs-12">
							 <input type="text" class="form-control onlyNumber" id="post_vacinhg" name="post_vacinhg" readonly />	
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
							 <input type="text" class="form-control onlyNumber" id="post_trg" name="post_trg" readonly />	
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">NET VAC<span class=""></span></label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12">
							  <input type="text" class="form-control onlyNumber" id="post_netvac" name="post_netvac" readonly />
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
								<input type="date" class="form-control primary" id="post_dateass" name="post_dateass" readonly>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Completed date of Assessment<span class=""></span></label>
						<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="date" class="form-control primary" id="post_dateass2" name="post_dateass2" readonly>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Notice<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="date" class="form-control primary " id="post_datenot" name="post_datenot" readonly />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Completed date of Notice</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="post_datenot2" name="post_datenot2" readonly />
						  </div>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Exam<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="date" class="form-control primary " id="post_exam" name="post_exam" readonly />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Completed date of Exam</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="post_dateexam" name="post_dateexam" readonly />
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Date of Panel<span class=""></span></label>
					     <div class="col-md-8 col-sm-8 col-xs-12">
								 <input type="date" class="form-control primary " id="post_dateofpanel" name="post_dateofpanel" readonly />
							</div>
                        </div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12 lbl_reg">Completed date of Panel</label>
						
						  <div class="col-md-8 col-sm-8 col-xs-12" >
							  <input type="date" class="form-control primary" id="post_dateofpanel2" name="post_dateofpanel2" readonly />
						  </div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="form-group">
						 <label class="control-label col-md-2 col-sm-3 col-xs-12" >Action Plan</label>
						  <div class="col-md-10 col-sm-9 col-xs-12">
							<textarea  rows="2" style="resize:none;" class="form-control primary description" id="post_plan" name="post_plan"  placeholder="Enter Action Plan" readonly></textarea>
							<input type="hidden" class="form-control"  placeholder="Enter Department Name" name="hide_field" id="hide_field"  maxlength="50">
					  </div>
					</div>
				</div>
				</div>
				<br><br>
				
            </div>
      </div>
	  <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
	  
	 <!--Umesh Coding End here-->
	 
	 
        <div class="modal-footer">
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
          <h4 class="modal-title" id=""><strong>Delete Post Schedule</strong></h4>
        </div>
        <div class="modal-body">
           <form class="form-horizontal" method="POST" action="process.php?action=delete_postschedule">

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
  
  <!-- Update Department Code Here -->
 
  <!-- Update Code End here -->
  
  
   <?php
 include_once('../global/footer.php');
 ?>

   <script>
  $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	 //alert(values);
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchpostschedule1', id: values}
              })
              .done(function(html) {
			
                var data = JSON.parse(html);
                $("#post_dept").val(data.dept);;
                $("#post_category").val(data.category);
			    $("#post_level").val(data.level_of_pay);
			    $("#post_fill").val(data.mode_of_filling);
			    $("#post_ss").val(data.ss);
				$("#post_mor").val(data.mor);
				$("#post_vac").val(data.vac);
				$("#post_vacinhg").val(data.vac_in_hg);
				$("#post_trg").val(data.utrg);
				$("#post_netvac").val(data.netvac);
			    $("#post_dateass").val(data.date_of_ass);
				$("#post_dateass2").val(data.completed_ass_date);
				$("#post_datenot").val(data.date_of_noti);
				$("#post_datenot2").val(data.completed_date_of_noti);
				$("#post_exam").val(data.date_of_exam);
				$("#post_dateexam").val(data.completed_date_exam);
			    $("#post_dateofpanel").val(data.date_of_panel);
				$("#post_dateofpanel2").val(data.completed_date_panel);
				$("#post_plan").val(data.action_plan);
                $("#hide_field").val(values);

              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });

		  
   
	$(".select2").select2();	  
		  
		  
</script>
