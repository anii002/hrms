<?php
$GLOBALS['flag']="1.3";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
			
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
			<div class="portlet box blue">
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
                							<option value="05">May</option>
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
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>Summary Report</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						 <a class="btn btn-danger" onclick="history.go(-1);">Back</a> 
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
								<table id="ta_report" class="table table-hover table-bordered display" >
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
											<th rowspan="2">Action</th>
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
            $("#ta_report").dataTable("destroy");

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
<script type="text/javascript">
	$(document).ready(function() {
	    var summary_month_year=$("#summary_month_year").val();
		   // alert(summary_month_year);
    // $('#example').DataTable( {

    //     dom: 'Bfrtip',
    //     ordering: false,
    //     // buttons: [
    //     //     'copyHtml5',
    //     //     'excelHtml5',
    //     //     'csvHtml5',
    //     //     'pdfHtml5'
    //     // ]
    //     buttons: [
    //   {
    //       extend: 'pdf',
    //       title: 'TA Summary',
    //       text: 'Print',
    //       footer: true,
    //       orientation: 'landscape',
    //             pageSize: 'A4',
    //             exportOptions: {
    //             columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
    //         }
    //   },
    //   {
    //       extend: 'csv',
    //       footer: false
          
    //   },
    //   {
    //       extend: 'excel',
    //       footer: false,
    //       // exportOptions: {
    //       //      columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
    //       //  }
    //   },
       
       
    // ]
    // } );
    
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
					filename: 'TA Summary for month of '+summary_month_year,
					orientation: 'landscape', //portrait
					pageSize: 'A4', //A3 , A5 , A6 , legal , letter
					exportOptions: {
						columns:  [ 0, 1, 2, 3, 5, 6, 7, 8 ,9 ,10 ,11 ,12 ,13 ,14,15,16],
						search: 'applied',
						order: 'applied'
					},
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
						doc['header']=(function() {
							return {
								columns: [
									
									{
										alignment: 'left',
										italics: true,
										text: 'CENTRAL RAILWAY',
										fontSize: 10,
										margin: [10,0]
									},
									{
										alignment: 'center',
										italics: true,
										text: 'DRM OFFICE',
										fontSize: 10,
										margin: [10,0]
									},
									{
										alignment: 'right',
										fontSize: 10,
										text: 'SOLAPUR DIVISION'
									}
								],
								margin: 20
							}
						});
						// Create a footer object with 2 columns
						// Left side: report creation date
						// Right side: current page and total pages
						doc['footer']=(function(page, pages) {
							return {
								columns: [
								// 	{
								// 		alignment: 'left',
								// 		text: ['Date: ', { text: jsDate.toString() }]
								// 	},
									{
										alignment: 'right',
										text:'SR DPO/SUR',
										width:300
									}
								],
								margin: [520,0]
							}
						});
						// Change dataTable layout (Table styling)
						// To use predefined layouts uncomment the line below and comment the custom lines below
						// doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
						var objLayout = {};
						objLayout['hLineWidth'] = function(i) { return .5; };
						objLayout['vLineWidth'] = function(i) { return .5; };
						objLayout['hLineColor'] = function(i) { return '#aaa'; };
						objLayout['vLineColor'] = function(i) { return '#aaa'; };
						objLayout['paddingLeft'] = function(i) { return 4; };
						objLayout['paddingRight'] = function(i) { return 4; };
						doc.content[0].layout = objLayout;
				}
				},
				   {
          extend: 'excel',
          footer: false,
          
      }]
		});
} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<!--<script src="../assets/jquery.dataTables.min.js" type="text/javascript"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
