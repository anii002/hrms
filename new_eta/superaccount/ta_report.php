<?php
$GLOBALS['flag']="1.3";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
<style>
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>
			
	<div class="page-content-wrapper">
		<div class="page-content">

			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.php">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#"> Report / रिपोर्ट </a>
					</li>
				</ul>
													
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue no-print">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>  Report / रिपोर्ट
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form class="horizontal-form">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">
								<div class="col-md-4 billunitzindex">
                					<div class="form-group">
                						<label class="control-label"><h4 class="">For which month allowances claimed for</h4></label>						
                						<select class="form-control select2" name="month" id="month" data-placeholder="माह का चयन करे / Select a Months" required>
                							<option value="0" selected>माह का चयन करे / Select Month</option>
                							<option value="01">January</option>
                							<option value="02">February</option>
                							<option value="03">March</option>
                							<option value="04">April</option>
                							<option value="05" >May</option>
                							<option value="06">June</option>
                							<option value="07">July</option>
                							<option value="08">August</option>
                							<option value="09">September</option>
                							<option value="10">October</option>
                							<option value="11">November</option>
                							<option value="12">December</option>
                						</select>
                					</div>
                				</div>
								
							</div>
							<!--/row-->
							
							
												
						</div>
						<div class="form-actions right">
							<button type="reset" class="btn default">Cancel</button>
							<button type="button" class="btn blue submit_btn" id='submit_btn' name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>

            
            
            
            
            <div class="portlet box blue">
				<div class="portlet-title no-print" >
					<div class="caption col-md-6">
						<b>Summary Report</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						 <a class="btn btn-warning no-print" onclick="window.print();">Print</a> 
						 <!--<a class="btn btn-danger no-print" onclick="history.go(-1);">Back</a> -->
					</div>
					
				</div>
				<div class="portlet-body form">
																
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
					<label class="control-label btnhide"><h4 class="btnhide">Statement Showing the summery of TA & Contingency Bills </h4></label>
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display" >
									<thead>
										<tr class="warning">
											<th rowspan="2" valign="top">Status</th> 
											<th rowspan="2" valign="top" >DEPT.</th>
											<th rowspan="2" valign="top" >P.F. No</th>
											<th rowspan="2" valign="top">Name</th>
											<th rowspan="2" valign="top">BU</th>
											<th rowspan="2" valign="top">Desig.</th>
											<th rowspan="2" valign="top" >P/L</th>
											<th rowspan="2" valign="top"><center>ROP</center></th> 
											<th rowspan="2" valign="top">Rate</th> 
											<th rowspan="2" valign="top">Travel<br> Month</th>
											<th rowspan="2" valign="top"><center>Claim <br> Month</center></th>
											<th colspan="2"><center>30% (Days Count)</center></th> 
											<th colspan="2"><center>70% (Days Count)</center></th>
											<th colspan="2"><center>100% (Days Count)</center></th>
											<th rowspan="2"><center>TA<br> Amt.</center></th>
											<th rowspan="2">Conti.<br>Amt.</th>
											<th rowspan="2" class="no-print">Action</th>
										</tr>
										<tr class="warning fontcss">
											<th>Day</th>
											<th>Amt</th>
											<th>Day</th>
											<th>Amt</th>
											<th>Day</th>
											<th>Amt</th>
											
										</tr>
									</thead>
									<tbody  id="report_ta">
										<!--<div ></div>-->
										
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
	</div>			

				</div>
			</div>
			
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>
<script>

    $(document).on("click",".submit_btn",function(){
        var mon=$("#month").val();
        // alert(mon);
        $("#otp_loader").show();
         $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'get_summary1', mon : mon},
          })
          .done(function(html) {
            $("#otp_loader").hide();
            //  alert(html);
            // console.log(html);
            // $(".report_table").show();
            $("#report_ta").html(html);
            //$("#ta_report").dataTable("destroy");

          });
    });
    
    $(document).on("change","#empid",function(){
      var value = $('#empid').val();
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployee1', id : value},
      })
      .done(function(html) {
        var data = JSON.parse(html);
        if(data==1)
          {
            alert("Already Exists");
            $("#empid").val('');
            $("#empid").focus();
          }
          else if(data.fl==0)
          {
            alert("Employee Not Authorized...");
            $("#empid").val('');
            $("#empid").focus();
          }
          
           else if(data.empid==null)
          {
              alert("PF Number Not Found..");
				// $.jGrowl('PF Number Not Found..', { header: 'Add User' });

          }
          else
          {
            $("#empid").val(data.empid);
            $("#empname").val(data.empname);
            $("#mobile").val(data.mobile);
            $("#design").val(data.designation);
            $("#email").val(data.email);
            $("#paylevel").val(data.level);
            var val = Math.floor(1000 + Math.random() * 9000);
            $("#psw").val(val);
            $("#username").val(data.empid);
          }
      });
    });
    
    $(document).on("click",".activeUser",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
    $(document).on("click",".deactiveUser",function(){
        var id = $(this).val();
        var result = confirm("Confirm!!! Proceed for user deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveUser', id : id},
          })
          .done(function(html) {
            alert(html);
            window.location="add_user.php";
          });
        }
    });
</script>
