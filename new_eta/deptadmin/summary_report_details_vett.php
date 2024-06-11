<?php
$GLOBALS['flag']="2.6";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
?>
	<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
  .show {
	   display : ;
  }
}

.show{
	 display : none !important;
	 display : block;
}
.button.dt-button, div.dt-button, a.dt-button{
	border: none !important;
}

/*.fontcss{*/
/*    font-size:12px !important;*/
/*    //font-weight:bold !important;*/
/*}*/
/*.fontcss1{*/
/*    font-size:8px !important;*/
/*    //font-weight:bold !important;*/
/*}*/
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
            			<a href="#">Summary Report</a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
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
						
	<form action="control/adminProcess.php?action=fwESTCLERK" method="POST">
	    <div class="show">
        	<div class="row text-center">
        		<label class="pull-left" style="font-size:12px;margin-left:100px;padding-top:10px;">Central Railway</label>	
        		<label class="" style="font-size:14px;padding-top:10px;"><b>Personal Department Office</b></label>
        		<label class="pull-right" style="font-size:12px;margin-right:100px;padding-top:10px;">SOLAPUR DIVISION</label>	
        	</div>
        </div>											
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
									<tbody>
										<?php 

										$sql="SELECT * from tasummarydetails,employees where  tasummarydetails.empid=employees.pfno AND summary_id='".$_GET['sum_id']."' AND is_summary_generated='1' order by employees.BU ASC ";
										$res=mysql_query($sql);
										//;
										$total_amt=0;
										$temp=0;
										while($val=mysql_fetch_array($res))
										{
										
                                       // echo "SELECT * from employees where pfno='".$val['empid']."' order by BU ASC";
										$sql1=mysql_query("SELECT * from employees where pfno='".$val['empid']."' order by BU ASC");
										$val1=mysql_fetch_array($sql1);
										echo mysql_error();

										 $level=$val1['level'];
										$sql2="SELECT * from ta_amount where min<='".$level."' AND max>='".$level."' ";
										$res2=mysql_query($sql2);
										$val2=mysql_fetch_array($res2);

										  $val['empid']."_".$amount=$val2['amount'];

										$month_array=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
										$month_array1=array("01"=>"Jan","02"=>"Feb","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aug","09"=>"Sept","10"=>"Oct","11"=>"Nov","12"=>"Dec");
										$mon='';
										$mmon='';
								// 		 $m=$val['month'];
										$mts=explode(",",$val['month']);
									    //print_r($mts);
										$s=$mts[0];
										$y=substr( $val['year'],2);
										// print_r($month_array);
										if($month_array[$s])
										{
											 $mon=$month_array[$s];
										}	


										 $cdate=substr($val['created_at'],3,2);
										 $cyear=substr($val['created_at'],8,2);
										if($month_array1[$cdate])
										{
											 $mmon=$month_array1[$cdate];
										}	
                                        
                                        $query1="SELECT est_approve FROM `taentry_master` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ";
                                        $result1=mysql_query($query1);
                                        $row1=mysql_fetch_array($result1);
                                        
                                        $status=$row1['est_approve'];
                                        
                                        
                                        
										echo "
										<tr class='fontcss1'>";
										if($status == '1'){
                                            echo "<td style='color:#0b10f5;'>Vetted</td>";
                                        }
                                        else{
                                            echo "<td style='color:red;'>Non-Vetted</td>";
                                        }
										 echo "	
											<td>".$val['empid']."</td>
											<td>".$val1['name']."</td>
											<td>".$val1['BU']. "</td>
											<td>".getDesignation($val1['desig'])."</td>
											<td>".$val1['level']."</td>
											<td>".$val1['bp']."</td>
											<td>$amount</td>
											<td>$mon - $y</td>
											<td>$mmon - $cyear</td>";

											if($val['30p_cnt'] == '0' && $val['30p_amt']== '0')
											{
												echo "
												<td>-</td>
											<td>-</td>
												";	
												$t1=0;
											}
											else{
												echo "
												<td>".$val['30p_cnt']."</td>
											<td>".$val['30p_amt']."</td>
												";
												$t1=$val['30p_amt'];

											}
											if($val['70p_cnt'] == '0' && $val['70p_amt']== '0')
											{
												echo "
												<td>-</td>
											<td>-</td>
												";	
												$t2=0;
											}
											else{
												echo "
												<td>".$val['70p_cnt']."</td>
											<td>".$val['70p_amt']."</td>
												";
												$t2=$val['70p_amt'];
											}
											if($val['100p_cnt'] == '0' && $val['100p_amt']== '0')
											{
												echo "
												<td>-</td>
											<td>-</td>
												";
												$t3=0;	
											}
											else{
												echo "
												<td>".$val['100p_cnt']."</td>
											<td>".$val['100p_amt']."</td>
												";
												$t3=$val['100p_amt'];

											}
											
											$total_amt =(int)$t1 + (int)$t2 + (int)$t3;
											$temp=$temp+$total_amt;

											echo "
											<td>$total_amt</td>";

											$sqll=mysql_query("SELECT SUM(amount) as amount FROM `add_cont` WHERE empid='".$val['empid']."' AND reference_no='".$val['reference_no']."' ");
											$ress=mysql_fetch_array($sqll);
											if($ress['amount'] == '0' || $ress['amount'] == null){
												
											echo "<td>-</td>";
											}
											else
											{
												echo "<td>".$ress['amount']."</td>";
											}
											echo "											
											<td class='noprint btnhide'><a  href='show_seperate_approve_1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary btn-sm noprint'>Show</a></td>
										</tr>";}
									
											
										 ?>

										<?php 
											echo "<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td><b>Total</b></td>
											<td>$temp</td>
											<td></td>
											<td></td>
											<td><b></b></td>
											
										</tr>";
										?>
									</tbody>
								</table>
							</div>
							
						</div>
					</div>
					<input type='hidden' name='empid' value='<?php echo $val['empid']; ?>'>
					<input type='hidden' name='refno' value='<?php echo $val['reference_no']; ?>'>
					<input type='hidden' name='sumid' value='<?php echo $val['summary_id']; ?>'>
					
					<input type='hidden' id='summary_month_year' value='<?php echo date('F Y'); ?>'>
				</div>
			</div>
	</div>
</form>				

				</div>
			</div>
		</div>
	</div>
	<div class="show">
	<div class="row">
		<label class="pull-right" style="font-size:12px;margin-right:100px;padding-top:25px;">SR DPO / SUR</label>	
	</div>
 </div>
<?php
	include 'common/footer.php';
?>

<!--<script src="jquery.num2words.js"></script>-->

<script type="text/javascript">
    
    // $(document).ready(function(){
    //     var t_Amt=$("#t_amt").html();
    //     alert(t_Amt);
    //     var words = num2words(t_Amt);
    //     alert(words);
    // });
    
 function print_button()
   {
      $("#example_filter").hide();
      $(".dt-buttons").hide();
      $(".btnhide").hide(); 
	  $(".show").show(); 
	  //$(".table-bordered").hide(); 
	   
	  
      window.print();
    
	// window.location.reload();
   }
	// $(document).on("change","#month",function(){
	// 	var month=$("#month").val();
	// 	alert(month);
	// 	var m=month.split(",");
	// 	console.log(m);
	// });
</script>

<!-- File export script -->
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

    
    
    
    
    
    
    
