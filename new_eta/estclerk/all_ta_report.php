<?php
$GLOBALS['flag']="1.5";
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
    a[href]:after {
    content: none !important;
  }
}

.input[type=date], input[type=time], input[type=datetime-local], input[type=month]{
    line-height:22px;
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
                						<label class="control-label"><h4 class="">Select Department</h4></label>						
                						<select class="form-control select2" name="dept_no" id="dept_no" data-placeholder="विभाग का चयन करें / Select Department" required>
                							<option value="0" selected>विभाग का चयन करें / Select Department</option>
                							<?php
                							    $dept_query=mysql_query("SELECT DEPTNO,DEPTDESC FROM department order by DEPTDESC ASC");
                							    
                							    while($dept_row = mysql_fetch_array($dept_query))
                							    {
                							        echo "<option value='".$dept_row['DEPTNO']."'>".$dept_row['DEPTDESC']."</option>";
                							    }
                							?>
                							
                						</select>
                					</div>
                				</div>
                				
                				<div class="col-md-4">
            				    	<div class="form-group">
            						    <label class="control-label"><h4 class="">Claimed for the month of</h4></label><br>
            						    <input type="month" name="month" id="month" required>
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
			<div class="row">
			    <!--style="display: none;"-->
				<div class="portlet box blue">
				<div class="portlet-title no-print">
					<div class="caption col-md-6">
						<b>Summary Report</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						 <a class="btn btn-warning no-print" onclick="window.print();">Print</a> 
						 <!--<a class="btn btn-danger" onclick="history.go(-1);">Back</a> -->
					</div>
				</div>
				<div class="portlet-body form">
						
	<form >
	    										
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
											<th rowspan="2" valign="top" style="text-align: center;">DEPT.</th> 
											<th rowspan="2" valign="top" style="text-align: center;">BU</th>
											<th rowspan="2" valign="top" style="text-align: center;">Claimed TA's</th>
											<th rowspan="2" valign="top" style="text-align: center;">Received To PA</th>
											<th rowspan="2" valign="top" style="text-align: center;">Forwarded To Acc.</th>
											<th rowspan="2" valign="top" style="text-align: center;">Vetted By Acc.</th> 
											<th rowspan="2" valign="top" style="text-align: center;">Rejected TA's</th> 
											<!--<th rowspan="2">Action</th>-->
										</tr>
									</thead>
									<tbody id="report_ta">
									    
									</tbody>
								</table>
								
							</div>
							
						</div>
					</div>

				</div>
			</div>
	</div>
</form>				

				</div>
			</div>
			</div>

			
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>
<script>
    
    $(document).ready(function(){
        $('#example').DataTable(
		{
			"dom": '<"dt-buttons"Bf><"clear">lirtp',
			"ordering" : false,
			"paging": false,
			"autoWidth": true,
			"buttons": [
				{
					text: 'Print',
					extend: 'pdfHtml5',
					filename: 'TA Summary for month of',
					orientation: 'landscape', //portrait
					pageSize: 'A4', //A3 , A5 , A6 , legal , letter
					
					customize: function (doc) {
						//Remove the title created by datatTables
						doc.content.splice(0,1);
						//Create a date string that we use in the footer. Format is dd-mm-yyyy
						var now = new Date();
						var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
						// Logo converted to base64
						// var logo = getBase64FromImageUrl('https://datatables.net/media/images/logo.png');
						// The above call should work, but not when called from codepen.io
						// So we use a online converter and paste the string in.
						// Done on http://codebeautify.org/image-to-base64-converter
						// It's a LONG string scroll down to see the rest of the code !!!
						//var logo = 'data:image/jpeg;base64,/logo.p;
						// A documentation reference can be found at
						// https://github.com/bpampuch/pdfmake#getting-started
						// Set page margins [left,top,right,bottom] or [horizontal,vertical]
						// or one number for equal spread
						// It's important to create enough space at the top for a header !!!
						doc.pageMargins = [20,60,20,30];
						// Set the font size fot the entire document
						doc.defaultStyle.fontSize = 11;
						// Set the fontsize for the table header
						doc.styles.tableHeader.fontSize = 11;
						// Create a header object with 3 columns
						// Left side: Logo
						// Middle: brandname
						// Right side: A document title
						
						// Create a footer object with 2 columns
						// Left side: report creation date
						// Right side: current page and total pages
						
						// Change dataTable layout (Table styling)
						// To use predefined layouts uncomment the line below and comment the custom lines below
						// doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
						
				}
				},
				   {
          extend: 'excel',
          footer: false,
          
      }]
		});    
    });
    
    $(document).on("click",".submit_btn",function(){
        var mon=$("#month").val();
        var deptno=$("#dept_no").val();
        // alert(mon);
        
        if(mon != '0' && deptno != '0')
        {
            $("#otp_loader").show();
            $.ajax({
                url: 'control/adminProcess.php',
                type: 'POST',
                data: {action: 'get_all_summary', mon : mon,dept_no : deptno},
            })
            .done(function(html) {
                $("#otp_loader").hide();
                $("#report_ta").html(html);
            });
        }
        else
        {
            alert("Please select month to process.");
        }
    });

</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<!--<script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
