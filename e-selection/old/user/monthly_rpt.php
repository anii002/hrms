<?php 
 session_start();
 
include_once('/global/header.php');
include_once('/global/topbar.php');
include_once('/global/sidebaradmin.php');

error_reporting(0);


function get_dept($id)
{
	$sql=mysql_query("select dept from department where id='".$id."'");
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
	$sql=mysql_query("select categary from category where id='".$id."'");
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
      Post Schedule Entries Report
      </h1>
    </section>
    <section class="content">
       
	 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Monthly Report</h3>
            </div>
		
			<div class="row">
			
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Month</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="select_month" name="select_month"   required>
									
								<option value="1">january</option>
							    <option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">Octomber</option>
								<option value="11">Novembner</option>
								<option value="12">December</option>

								</select>
							
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Year</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control" id="select_year" name="select_year"   required>
									
								<option value="2012">2012</option>
							    <option value="2013">2013</option>
								<option value="2014">2014</option>
								<option value="2015">2015</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								
								
								
						
								</select>
							
							</div>
						</div>
						<div class="form-group">
					  
							<div class="col-md-8 col-sm-8 col-xs-12">								
							<button type="button" class="btn btn-primary send_dt"   name="display_record">View</button>
							</div>
							
						</div>
					</div>
				</div>
			<br/>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Department</th>
				  <th>Date of Assessment</th>
				  <th>Date of Exam</th>
				  <th>Date of Panel</th>
				  <th>Date of Notification</th>
				   <th>Inserted-Date</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody class="fill_dt">
              
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
    $('#example1').DataTable();
   
  })
</script> 
    </section>
  </div>
  <!--Content code end here--->

  
  <!-- Umesh Coding Here-->
  
  <!--Update Post Schedule Code here-->
 <div class="modal fade" style="width:auto; " id="update" role="dialog" aria-labelledby="" aria-hidden="true" style="border:none;">
    <div class="modal-dialog" style="width:auto;">
      <div class="modal-content">  
	 <form class="form-horizontal"  id="printArea" method="POST" action="process.php?action=update_postschedule">
	 <style>
@media print{
	#close_model
	{
		display:none;
		
}
#print_page
	{
		display:none;
		
}
}
</style>
	  
        <div class="modal-header" >
          <button type="button" id="close_model" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
		   
          <h4 class="modal-title" id=""><strong><center>Monthly-Report</center></strong></h4>
        </div>
		 <div id="printThis" >
       <div class="modal-body" >
       
             <div class="modal-body">
				<div class="row">
			
					<div class="table-responsive" style="page-break-before:avoid">
						<table class="table" border="1" width="100%" style="border-collapse:collapse;line-height:30px;">
					
						<tbody>
						<tr>
							<td width="20%" class="font_report" >Department</td>
							<td width="30%" id="post_dept"></td>
							<td width="20%" class="font_report">Category</td>
							<td width="30%" id="post_category"></td>
						</tr>
						<tr>
						     <td width="20%" class="font_report">Level Of Pay</td>
							 <td width="30%" id="post_gradepay"></td>
							 <td width="20%" class="font_report">Mode Of Filling</td>
							 <td width="30%" id="post_fill"></td>
						</tr>
						<tr>
						     <td width="20%" class="font_report">SS</td>
							 <td width="30%" id="post_ss"></td>
							 <td width="20%" class="font_report">MOR</td>
							 <td width="30%" id="post_mor"></td>
						
						</tr>
						<tr>						
							<td width="20%" class="font_report">VAC</td>
							<td width="30%" id="post_vac"></td>
							<td width="20%" class="font_report">Vac In Hand</td>
							<td width="30%" id="post_vacinhg"></td>	
						</tr>
						<tr>							
							<td width="20%" class="font_report">Under Training</td>
							<td width="30%" id="post_trg"></td>
							<td width="20%" class="font_report">Net Vac</td>
							<td width="30%" id="post_netvac"></td>					
						</tr>
						<tr>							
							<td width="20%" class="font_report">Date Of Assessment</td>
							<td width="30%" id="post_dateass"></td>
							<td width="20%" class="font_report">Completed Date Of Assessment</td>
							<td width="30%" id="post_cdoa"></td>					
						</tr>
						<tr>
							<td width="20%" class="font_report">Date Of Notice</td>
							<td width="30%" id="post_datenot"></td>
							<td width="20%" class="font_report">Completed Date Of Notice</td>
							<td width="30%" id="post_cdon"></td>					
					     </tr>
						 <tr>
						    <td width="20%" class="font_report">Date Of Exam</td>
							<td width="30%" id="post_dateexam"></td>
							<td width="20%" class="font_report">Completed Date Of Exam</td>
							<td width="30%" id="post_cdoe"></td>
						 </tr>
						 <tr>						 
						     <td width="20%" class="font_report">Date Of Panel</td>
							 <td width="30%" id="post_datepanel"></td>
							 <td width="20%" class="font_report">Completed Date Of Panel</td>
							 <td width="30%" id="post_cdop"></td>
						 </tr>
						 <tr>
						    <td width="20%" class="font_report">Action Plan</td>
							<td colspan="3" width="30%" id="post_plan"></td>							
						</tr>
					</tbody>
				</table>
			   </div>
		    </div>
	      </div>
        </div>
	
	 <!--Umesh Coding End here-->
	    </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" id="print_page">Print</button>
        </div>
			 </form>

      
   
    </div>
  </div>
  </div>
  <!--div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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
  </div-->
  
  <!-- Update Department Code Here -->
 
  <!-- Update Code End here -->
    <link href="select2/select2.min.css" rel="stylesheet"/>
<script src="select2/select2.min.js"> </script>
	  
  <script>
  $(document).on("click",".send_dt",function(){
	  var mnt=$("#select_month").val();
	 var yr=$("#select_year").val();

	$.ajax({
		type:"POST",
		url:"process.php",
		data: "action=get_dt&sm="+mnt+"&sy="+yr,
		success:function(data){
	
			$(".fill_dt").html(data);
			$('#example1').DataTable();
		}
	});
});
</script>
  
   <?php
 include_once('/global/footer.php');
 ?>

   <script>
  $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchpostschedule', id: values}
              })
              .done(function(html) {
			
                var data = JSON.parse(html);
                $("#post_dept").html(data.dept);
				  $("#post_category").html(data.category);
				    $("#post_gradepay").html(data.level_of_pay);
					  $("#post_fill").html(data.mode_of_filling);
					   $("#post_ss").html(data.ss);
					    $("#post_mor").html(data.mor);
						 $("#post_vac").html(data.vac);
						  $("#post_vacinhg").html(data.vac_in_hg);
						   $("#post_trg").html(data.utrg);
						    $("#post_netvac").html(data.netvac);
					    $("#post_dateass").html(data.date_of_ass);
						$("#post_cdoa").html(data.completed_ass_date);						
						$("#post_datenot").html(data.date_of_noti);
						$("#post_cdon").html(data.completed_date_of_noti);
						$("#post_dateexam").html(data.date_of_exam);
						$("#post_cdoe").html(data.completed_date_exam);
						$("#post_datepanel").html(data.date_of_panel);
						$("#post_cdop").html(data.completed_date_panel);
						   $("#post_plan").html(data.action_plan);
                $("#hide_field").html(values);
			

              });
  });
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });

		  
   
	$(".select2").select2();
	
	
	document.getElementById("print_page").onclick = function () {
    var html = $("#printArea").html();

	newwindow = window.open();
	newwindow.document.write(html);
	newwindow.print();
}
	

</script>
