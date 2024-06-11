<?php 
 session_start();
 
include_once('../global/header.php');
include_once('../global/topbar.php');
include_once('../global/sidebaradmin.php');
error_reporting(0);
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
              <h3 class="box-title">Date-Wise Report</h3>
            </div>
			<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Department</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
						  <select class="form-control primary select2" id="select_dept" name="select_dept" style="margin-top:0px; width:100%;" required >
						  		<option value="0">select department</option>
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
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Category</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<select class="form-control primary select2" id="select_cat" name="select_cat" style="margin-top:0px; width:100%;" required >
								<option value="0">select department</option>
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
				
				</div><br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Date Of Assessment</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
						  <input type="month" class="form-control primary " id="date_assess" name="date_assess" style="margin-top:0px; width:100%;"/>
						       

							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Date Of examination</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="month" class="form-control primary " id="date_exam" name="date_exam" style="margin-top:0px; width:100%;"/>
												
			
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
				<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Date Of panel</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
						  <input type="month" class="form-control primary " id="date_panel" name="date_panel" style="margin-top:0px; width:100%;"/>
						       
				
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 col-xs-12">
						<div class="form-group">
						<label class="control-label col-md-4 col-sm-3 col-xs-12" >Select Date Of Notification</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="month" class="form-control primary " id="date_noti" name="date_noti" style="margin-top:0px; width:100%;"/>
												
	
							</div>
						</div>
					</div>
						<div class="form-group">
							<div class="col-md-8 col-sm-8 col-xs-12" style="float:right">								
							<button type="button" class="btn btn-primary send_dt2"   name="display_record">View</button>
							</div>
							
						</div>
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
				  <th>Date of Notice</th>
				  <th>Inserted-Date</th>
				  <th>Updated By</th>
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
		   
          <h4 class="modal-title" id=""><strong><center>Custom-Report</center></strong></h4>
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
							<td width="20%" class="font_report">Vac In Higher Grade</td>
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
							<td width="20%" class="font_report">Date Of Notification</td>
							<td width="30%" id="post_datenot"></td>
							<td width="20%" class="font_report">Completed Date Of Notification</td>
							<td width="30%" id="post_cdon"></td>					
					     </tr>
						 <tr>
						    <td width="20%" class="font_report">Notification Reference</td>
							<td colspan="3" width="30%" id="noti_ref"></td>							
						</tr>
						 <tr>
						    <td width="20%" class="font_report">Date Of Examination</td>
							<td width="30%" id="post_dateexam"></td>
							<td width="20%" class="font_report">Completed Date Of Examination</td>
							<td width="30%" id="post_cdoe"></td>
						 </tr>
						 <tr>						 
						     <td width="20%" class="font_report">Date Of Panel</td>
							 <td width="30%" id="post_datepanel"></td>
							 <td width="20%" class="font_report">Completed Date Of Panel</td>
							 <td width="30%" id="post_cdop"></td>
						 </tr>
						  <tr>
						    <td width="20%" class="font_report">Panel Reference</td>
							<td colspan="3" width="30%" id="panel_ref"></td>							
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
  
  
  // $("#post_category").attr('disabled',true);
  $("#post_dept").change(function(){
	  $("#post_category").attr('disabled',false);
	    });
		
  $(document).on("click",".send_dt2",function(){
	  var sel1=$("#select_dept").val();
	 var sel2=$("#select_cat").val();
	  var sel31=$("#date_assess").val();
	   var sel41=$("#date_exam").val();
	    var sel51=$("#date_panel").val();
		 var sel61=$("#date_noti").val();
		 
		 var sel3 = sel31.replace('-', '');
		 var sel4 = sel41.replace('-', '');
		 var sel5 = sel51.replace('-', '');
		 var sel6 = sel61.replace('-', '');
		
		
		//alert(sel3);


	$.ajax({
		type:"POST",
		url:"process.php",
		data: "action=get_custom_rpt&sel1="+sel1+"&sel2="+sel2+"&sel3="+sel3+"&sel4="+sel4+"&sel5="+sel5+"&sel6="+sel6,
		success:function(data){
	//alert(data);
			$(".fill_dt").html(data);
		
		}
	});
});
</script>

   <script>
  $(function () {
    $('#example1').DataTable()
  });
  $(document).on("click",".update_btn",function(){
	 var values = $(this).val();
	// alert(values);
			$.ajax({
                url: 'process.php',
                type: 'POST',
                data: {action: 'fetchpostschedule1', id: values}
              })
              .done(function(html) {
		////debugger;
                var data = JSON.parse(html);
                $("#post_dept").html(data.dept);
               // alert(data.dept);
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
						$("#noti_ref").html(data.noti_ref);	
						$("#post_dateexam").html(data.date_of_exam);
						$("#post_cdoe").html(data.completed_date_exam);
						$("#post_datepanel").html(data.date_of_panel);
						$("#post_cdop").html(data.completed_date_panel);
						$("#panel_ref").html(data.panel_ref);
						   $("#post_plan").html(data.action_plan);
                $("#hide_field").html(values);
				
//alert(data);
              });
  });
  
    
   $(".select2").select2();
   //$("#post_dept").select2();
   //$("#post_category").select2();
   //$("#post_fill").select2();
   //$("#post_gradepay").select2();
  
  $(document).on("click", ".deleteBtn", function(){
            debugger;
              var id = $(this).val();
                $("#delete_id").val(id);
          });
		  
		document.getElementById("print_page").onclick = function () {
    var html = $("#printArea").html();
	newwindow = window.open();
	newwindow.document.write(html);
	newwindow.print();
}
</script>