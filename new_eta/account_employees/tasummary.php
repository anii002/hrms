<?php
$GLOBALS['flag']="5.3";
include('common/header.php');
include('common/sidebar.php');
?>
<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
  .show {
	   display : 0;
  }

}

.show{
	 display : none !important;
	 display : block;
}
.button.dt-button, div.dt-button, a.dt-button{
	border: none !important;
}
</style>
 

			
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6 btnhide">
						<b>Summary Report</b>
					</div>
					<div class="caption col-md-6 text-right backbtn btnhide">
						<a href="#.">Back</a>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form action="" method="POST">	
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
						<label class="control-label btnhide"><h4 class="btnhide">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label>

						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
											<!-- <th rowspan="2" valign="top">Sr No</th> -->
											<th rowspan="2" valign="top">P.F. No</th>
											<th rowspan="2" valign="top">Name</th>
											<th rowspan="2" valign="top">Design</th>
											<th rowspan="2" valign="top"><center>Basic <br> Pay</center></th> 
											<th rowspan="2" valign="top">Rate</th> 
											<th rowspan="2" valign="top">Travel<br> Month</th>
											<th rowspan="2" valign="top"><center>Claimed <br> Month</center></th>
											<th colspan="2"><center>30% (Days Count)</center></th> 
											<th colspan="2"><center>70% (Days Count)</center></th>
											<th colspan="2"><center>100% (Days Count)</center></th>
											<th colspan="" rowspan=""><center>Total TA<br> Amount</center></th>
											<th rowspan="2">Conti.</th>
											<th class="hidden-print btnhide" rowspan="2">Action</th>
										</tr>
										<tr class="warning">
											<th>Day</th>
											<th>Amount</th>
											<th>Day</th>
											<th>Amount</th>
											<th>Day</th>
											<th>Amount</th>
											
										</tr>
									</thead>
									<tbody>
										<tr>
											<!-- <td>01</td> -->
											<td>00105590980</td>
											<td>H B ARUN, BU: 0107031</td>
											<td>SR DIVL. MATERIAL MANAGER-</td>
											<td>91400</td>
											<td>1000</td>
											<td>Aug-18</td>
											<td>Sep-18</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>3</td>
											<td>2100</td>
											<td>6</td>
											
											<td>8100</td>
											<td>0</td>
											<td><button class="btn green btnhide">Show</button></td>
										</tr>
										<tr>
											<!-- <td>01</td> -->
											<td>00105590980</td>
											<td>H B ARUN, BU: 0107031</td>
											<td>SR DIVL. MATERIAL MANAGER-</td>
											<td>91400</td>
											<td>1000</td>
											<td>Aug-18</td>
											<td>Sep-18</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>3</td>
											<td>2100</td>
											<td>6</td>
											
											<td>8100</td>
											<td>0</td>
											<td><button class="btn green btnhide">Show</button></td>
										</tr>
										<tr>
											<!-- <td>01</td> -->
											<td>00105590980</td>
											<td>H B ARUN, BU: 0107031</td>
											<td>SR DIVL. MATERIAL MANAGER-</td>
											<td>91400</td>
											<td>1000</td>
											<td>Aug-18</td>
											<td>Sep-18</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>3</td>
											<td>2100</td>
											<td>6</td>
											
											<td>8100</td>
											<td>0</td>
											<td><button class="btn green btnhide">Show</button></td>
										</tr>
										<tr>
											<!-- <td>01</td> -->
											<td>00105590980</td>
											<td>H B ARUN, BU: 0107031</td>
											<td>SR DIVL. MATERIAL MANAGER-</td>
											<td>91400</td>
											<td>1000</td>
											<td>Aug-18</td>
											<td>Sep-18</td>
											<td>-</td>
											<td>-</td>
											<td>-</td>
											<td>3</td>
											<td>2100</td>
											<td>6</td>
											
											<td>8100</td>
											<td>0</td>
											<td><button class="btn green btnhide">Show</button></td>
										</tr>
										<tr>
											<!-- <td>01</td> -->
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
										
											<td><b>1,26,780</b></td>
											<td><b>768</b></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="text-right">
								<button class="btn yellow btnhide" onclick="print_button()">Print</button>
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
	<div class="show">
	<div class="row">
		<label class="pull-right" style="font-size:12px;margin-right:100px;padding-top:25px;">SR DPO / SUR</label>	
	</div>
 </div>
<?php
	include 'common/footer.php';
?>

<script type="text/javascript">

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

	$("#add_row").on("click",function(){
		var sr=$("#sr1").val();
		sr++;
		$("#new_row").append('<div class="addrow-input"><div class="box-border"><div class="col-md-10 row"><div class="col-md-2 col-xs-5"><div class="form-group"><label class="control-label">Date दिनांक</label><div class="">						<input class="form-control" type="date" name="date'+sr+'" id="date'+sr+'" val='+sr+' value="DD-MM-YYYY">			</div></div></div><div class="col-md-3 col-xs-7"><div class="form-group"><label class="control-label">Journey Type यात्रा का प्रकार</label><select class="form-control select2" name="type'+sr+'" id="type'+sr+'"><option value="">Select...</option><option value="Train">Train</option><option value="By Road">By Road</option><option value="Special Train">Special Train</option></select></div></div><div class="col-md-2 col-xs-6"><div class="form-group"><label class="control-label">Train No. गाडी नं.</label><input type="text" name="trainno'+sr+'" id="trainno'+sr+'" class="form-control" placeholder="Train No." ></div></div><div class="col-md-2 col-xs-6"><div class="form-group"><label class="control-label">Other / अन्य	</label><select class="form-control select2" name="other'+sr+'" id="other'+sr+'"><option value="">Select...</option>	<option value="1">None</option><option value="2">Leave</option><option value="3">Break Down</option>				<option value="4">Exam</option><option value="5">Training</option><option value="6">No Claim</option></select>	</div></div><div class="col-md-3 col-xs-7"><div class="form-group"><label class="control-label">Depart Station / प्रस्थान स्टेशन</label><select name="dstn'+sr+'" id="dstn'+sr+'" class="form-control select2"><option value=""></option>	<option value="SUR"> SUR </option><option value="MUM"> MUM </option><option value="PUNE"> PUNE </option><option value="DND"> DND </option><option value="KRD"> KRD </option></select> </div></div><div class="col-md-3 col-xs-7">	<div class="form-group"><label class="control-label">Depart Time प्रस्थान समय </label><input type="time" name="dtime'+sr+'" val='+sr+' id="dtime'+sr+'" class="form-control"></div></div><div class="col-md-3 col-xs-7"><div class="form-group"><label class="control-label">Arri. Station आगमन स्टेशन</label><select name="astn'+sr+'" id="astn'+sr+'" class="form-control select2"><option value=""></option><option value="SUR"> SUR </option><option value="MUM"> MUM </option><option value="PUNE"> PUNE </option><option value="DND"> DND </option><option value="KRD"> KRD </option></select> </div></div><div class="col-md-3 col-xs-7"><div class="form-group"><label class="control-label">Arri. Time आगमन समय </label><input type="time" name="atime'+sr+'" val='+sr+' id="atime'+sr+'" class="form-control ta_calculation" placeholder=""></div></div><div class="col-md-3 col-xs-7"><div class="form-group"><label class="control-label">Distance दुरी</label><input type="text"  name="distance'+sr+'" id="distance'+sr+'" class="form-control" placeholder="Distance"></div></div></div></div><div class="col-md-2"><div class="objcttextarea"><div class="form-group"><label class="control-label">Objective उद्देश्य</label><textarea class="" rows="2" cols="15"></textarea></div></div><div><input type="text" class="form-control" class="changeper" val='+sr+' name="per'+sr+'" id="per'+sr+'"><input type="text" class="form-control" name="amt'+sr+'" id="amt'+sr+'">	</div></div></div>');
		$("#sr1").val(sr);
	});


	$(document).on("blur",".changeper",function(){
		var val=$(this).attr('val');		
		var jtype=$("#other"+val).val();
		alert(jtype);

		if(jtype == 5)
		{
			var date=$("#date"+val).val();
			var amount=900;
			var taamount=0;
			var per=0;
			var prev_cnt=(val-1);
			var prev_date=$("#date"+prev_cnt).val();

			alert(val);

			alert("Training");

			per =$("#per"+val).val();
			taamount=(amount * (per / 100 ));
			alert(amount+' '+taamount);

			$("#amt"+val+"").val(taamount);

			removePrevValues1(date,val);
		}
			

	});



	$(document).on("blur",".ta_calculation",function(){
		var val=$(this).attr('val');
		var date=$("#date"+val).val();
		var dtime=$("#dtime"+val).val();
		var atime=$("#atime"+val).val();
		var date1, dtime1, atime1;
		var amount=900;
		var taamount=0;
		var prev_cnt=(val-1);
		var prev_date=$("#date"+prev_cnt).val();
		var	prev_dtime=$("#dtime"+prev_cnt).val();
		var	prev_atime=$("#atime"+prev_cnt).val();
		alert("Cur date " +date+"Cur dtime "+ dtime+"Cur atime "+ atime);
		alert("prev_date " +prev_date+"prev_dtime "+ prev_dtime+"prev_atime "+ prev_atime);
		var nr=$("#sr1").val();
		var per=0;
		var flag='0';

		var jtype=$("#other"+val).val();
		alert(jtype);

		if(jtype == 1)
		{
			if(dtime=='')
			{
				val=(val-1);
				date1=$("#date"+val).val();
				dtime1=$("#dtime"+val).val();
				atime1="23:59";

				//if Curent Date
				c_time=time_calculate(date1,dtime1,atime1);
				if(c_time <= '06:00')
				{
					alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					alert("100%");
					per ="100%";
					taamount=900;
					alert(amount+' '+taamount);
				}
				
				$("#per"+nr+"").val(per);
				$("#amt"+nr+"").val(taamount);

				removePrevValues(date1,nr);

				if(prev_date != date && prev_date != null)
				{
					alert("ATIME IS LESS");
					atime1="23:59";
						alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
					if(c_time <= '06:00')
					{
						alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						alert("100%");
						per ="100%";
						taamount=900;
						alert(amount+' '+taamount);
					}
					var prev_nr=nr-1;
					$("#per"+prev_nr+"").val(per);
					$("#amt"+prev_nr+"").val(taamount);

					removePrevValues(prev_date,prev_nr);

				}	
				
			}
			else
			{	
				var prev=(val-1);
				var prev_jtype=$("#other"+prev).val();
				alert("Cur Date"+date+"Prev Date "+prev_date);	
				if(prev_date==date)
				{
					for(var i=val; i > 0; i--)
					{

						console.log(flag);
						var x=i-1;
						alert(x);
						var prev_date=$("#date"+x).val();
						var prev_dtime=$("#dtime"+x).val();
						alert("Cur Date"+date+"Prev Date "+prev_date+'+'+prev_dtime);
						if(prev_date==date)
						{	
							c_time=time_calculate_1(prev_date,date,prev_dtime,atime);
							if(c_time <= '06:00')
							{
								alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								alert("100% "+prev_dtime+"="+date);
								per ="100%";
								taamount=900;
								alert(amount+' '+taamount);
							}
						}
						else if(prev_date != date)
						{
							flag='1';
							alert("Flag");
							dtime="00:00";
							c_time=time_calculate(date,dtime,atime);
							if(c_time <= '06:00')
							{
								alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								alert("100%");
								per ="100%";
								taamount=900;
								alert(amount+' '+taamount);
							}
							
						}


					}
					$("#per"+nr+"").val(per);
					$("#amt"+nr+"").val(taamount);

					removePrevValues(date,nr);	

					if(prev_date != date && prev_date != null)
					{
						alert("ATIME IS LESS" +date+"_"+nr);
						atime1="23:59";
						alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							alert("100%");
							per ="100%";
							taamount=900;
							alert(amount+' '+taamount);
						}

						var prev_nr=nr-1;						
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues(date,nr);

					}	


				}

				else if(prev_date != date && prev_date != null && prev_jtype != 2)
				{
					alert("NULL");
					dtime="00:00";
					c_time=time_calculate(date,dtime,atime);
					if(c_time <= '06:00')
					{
						alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						alert("100%");
						per ="100%";
						taamount=900;
						alert(amount+' '+taamount);
					}
					
					$("#per"+nr+"").val(per);
					$("#amt"+nr+"").val(taamount);

					removePrevValues(date,nr);

					if(prev_date != date && prev_date != null)
					{
						alert("ATIME IS LESS");
						atime1="23:59";
						alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							alert("100%");
							per ="100%";
							taamount=900;
							alert(amount+' '+taamount);
						}
						
						var prev_nr=nr-1;
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);
					}	
				}

				else
				{	
					alert("flag: "+flag);
					if(flag === '1'){
						dtime="00:00";
					}
					// // dtime="00:00";
					c_time=time_calculate(date,dtime,atime);
					if(c_time <= '06:00')
					{
						alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						alert("100%");
						per ="100%";
						taamount=900;
						alert(amount+' '+taamount);
					}
					
					$("#per"+nr+"").val(per);
					$("#amt"+nr+"").val(taamount);

					removePrevValues(date,nr);	

					if(prev_date != date && prev_date != null)
					{
						alert("ATIME IS LESS");
						atime1="23:59";
						alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							alert("100%");
							per ="100%";
							taamount=900;
							alert(amount+' '+taamount);
						}
						
						var prev_nr=nr-1;
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);
					}	
				}		
			}
		}

		else if(jtype == 4)
		{
			alert("Exam");	

			if(dtime=='')
			{
				dtime1="00:00";

				//if Curent Date
				c_time=time_calculate(date,dtime1,atime);
				if(c_time <= '06:00')
				{
					alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					alert("100%");
					per ="100%";
					taamount=900;
					alert(amount+' '+taamount);
				}
				
				$("#per"+nr+"").val(per);
				$("#amt"+nr+"").val(taamount);				
			}
			else if(atime=='')
			{
				atime1="23:59";

				c_time=time_calculate(date,dtime,atime1);
				if(c_time <= '06:00')
				{
					alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					alert("100%");
					per ="100%";
					taamount=900;
					alert(amount+' '+taamount);
				}
				
				$("#per"+nr+"").val(per);
				$("#amt"+nr+"").val(taamount);
				
			}
			else
			{
				c_time=time_calculate(date,dtime,atime);
				if(c_time <= '06:00')
				{
					alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					alert("100% "+prev_dtime+"="+date);
					per ="100%";
					taamount=900;
					alert(amount+' '+taamount);
				}

				var prev_cnt=(nr-1);
				// var prev_date=$("#date"+prev_cnt).val();
				var prev_per=$("#per"+prev_cnt).val();
				var prev_amt=$("#amt"+prev_cnt).val();
				if(per == "100%")
				{
					$("#per"+prev_cnt+"").val("");
					$("#amt"+prev_cnt+"").val("");

					$("#per"+nr+"").val(per);	
					$("#amt"+nr+"").val(taamount);
				}
				else
				{
					$("#per"+nr+"").val(per);	
					$("#amt"+nr+"").val(taamount);
				}
				
			}
						
		}

		else if(jtype == 3)
		{
			alert("Break down");

			alert("Cur Date"+date+"Prev Date "+prev_date);	
			if(prev_date==date)
			{		
				alert("SAME DATE"+prev_cnt);
				$("#per"+prev_cnt+"").val("");
				$("#amt"+prev_cnt+"").val("");

			}
			
				per ="100%";
				taamount=900;
				alert(amount+' '+taamount);

				$("#per"+val+"").val(per);
				$("#amt"+val+"").val(taamount);
			
		}

		else if(jtype == 2)
		{
			alert("Leave");

			var val=$(this).attr('val');
			var date=$("#date"+val).val();
			var amount=900;
			var taamount=0;
			
			taamount=0;
			per="0%";
			alert(amount+' '+taamount);

			$("#per"+val+"").val(per);
			$("#amt"+val+"").val(taamount);

			
		}
	
	});

	function removePrevValues1(date,val)
	{
		var val=val-1;
		var jtype=$("#other"+val).val();
		if(jtype == 5)
		{
			var prev_date=$("#date"+val).val();
			if(prev_date == date)
			{
				$("#per"+val+"").val("");
				$("#amt"+val+"").val("");
			}
		}
		
	}

	function removePrevValues(date,nr)
	{
		var val=nr-1;
		var jtype=$("#other"+val).val();
		if(jtype != 5)
		{
			var prev_date=$("#date"+val).val();
			if(prev_date == date)
			{
				$("#per"+val+"").val("");
				$("#amt"+val+"").val("");
			}
		}
		
	}

	function time_calculate(date,dtime,atime)
	{
		var diff=(new Date(date+' '+atime) - new Date(date+' '+dtime)) / 1000 / 60;
		var hrs=Math.floor(diff / 60);
		var min=diff % 60;
		hrs=hrs < 10 ? '0' + hrs : hrs;
		min=min < 10 ? '0' + min : min;
		var totalminutes=hrs+':'+min;
		return totalminutes;
	}

	function time_calculate_1(prev_date,date,prev_dtime,atime)
	{
		var diff=(new Date(date+' '+atime) - new Date(prev_date+' '+prev_dtime)) / 1000 / 60;
		var hrs=Math.floor(diff / 60);
		var min=diff % 60;
		hrs=hrs < 10 ? '0' + hrs : hrs;
		min=min < 10 ? '0' + min : min;
		var totalminutes=hrs+':'+min;
		return totalminutes;
	}
</script>

<!-- File export script -->
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>

    
    
    
    
    
    
    
