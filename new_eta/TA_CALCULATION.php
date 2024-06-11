<!DOCTYPE html>
<html>
<head>
	<title>TA CALCULATION</title>
</head>
<body>
		<h3> TA CALCULATION </h3> 
		<form action="taprocess.php" method="POST">
		<table border="1px">
			<thead>
			<th>Sr.No</th>
			<th>Date</th>
			<th>J-Type</th>
			<th>Train No</th>
			<th>Other</th>
			<th>D-stn</th>
			<th>D-time</th>
			<th>A-stn</th>
			<th>A-time</th>
			<th>Distance</th>
			<th>Percentage</th>
			<th>Amount</th>
		</thead>
			<tbody id="new_row">
				<tr>
					<td>0</td>
				<td> <input type="date" name="date0" id="date0" val='0' value="<?php echo date('dd-mm-Y') ?>"> </td>
				<td> <select name="type0" id="type0">
					<option value="Train"> Train</option>
					<option value="By Road"> By Road</option>
					<option value="Special Train"> Special Train</option>
				
				</select> 
			</td>
			<td> <input type="text" name="trainno0" id="trainno0"> </td>
			<td> <select name="other0" id="other0">
					
					<option value="1">On Duty</option>
					<option value="2">Leave</option>
					<option value="3">Break down</option>
					<option value="4">Exam</option>
					<option value="5">Training</option>
				</select> 
			</td>
			<td>
				<select name="dstn0" id="dstn0">
					<option value=""></option>
					<option value="SUR"> SUR </option>
					<option value="MUM"> MUM </option>
					<option value="PUNE"> PUNE </option>
					<option value="DND"> DND </option>
					<option value="KRD"> KRD </option>
				</select> 
			</td>
			<td><input type="time" name="dtime0" val='0' id="dtime0"> </td>
			<td>
				<select name="astn0" id="astn0" class="astn">
					<option value=""></option>
					<option value="SUR"> SUR </option>
					<option value="MUM"> MUM </option>
					<option value="PUNE"> PUNE </option>
					<option value="DND"> DND </option>
					<option value="KRD"> KRD </option>
				</select> 
			</td>
			<td><input type="time" name="atime0" val='0' id="atime0" class="ta_calculation"> </td>
			<td> <input type="text" name="distance0" id="distance0"> </td>
			<td > <input type="text" class="changeper" val="0" name="per0" id="per0" > </td>
			<td><input type="text" name="amt0" id="amt0" >  </td>
			</tr>
			</tbody> 	
		</table>
			<input type="submit" value="Submit" class="btn btn-info" name="submit" id="submit" style="float:right;">
		

		 
			<input type="hidden" name="sr" id="sr" value='0'>
			 <input type="hidden" name="sr1" id="sr1" value='0'>
			 <input type="hidden" name="nr" id="nr" value='0'>
			 </form>	
			<input type="button" value="Add Row" class="btn btn-info" style="float:right;" id="add_row">
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/af.js"></script> -->

<script type="text/javascript">

	$("#add_row").on("click",function(){
		var sr=$("#sr1").val();
		sr++;
		$("#new_row").append('<tr><td>'+sr+'</td><td><input type="date" name="date'+sr+'" val='+sr+' id="date'+sr+'"> </td><td> <select name="type'+sr+'" id="type'+sr+'"><option> Train</option><option> By Road</option><option> Spetial Train</option></select> </td><td> <input type="text" name="trainno'+sr+'" id="trainno'+sr+'"> </td><td> <select name="other'+sr+'" id="other'+sr+'"><option value="1"> On Duty</option><option value="2"> Leave</option><option value="3"> Break down</option><option value="4">Exam</option><option value="5">Training</option></select> </td><td><select name="dstn'+sr+'" id="dstn'+sr+'"><option value=""></option><option> SUR</option><option> MUM</option><option> PUNE</option><option>DND</option><option>KRD</option></select> </td><td><input type="time"  val='+sr+'  name="dtime'+sr+'" id="dtime'+sr+'"> </td><td><select name="astn'+sr+'" id="astn'+sr+'"><option value=""></option><option> SUR</option><option> MUM</option><option> PUNE</option><option>DND</option><option>KRD</option></select> </td><td><input type="time" name="atime'+sr+'" id="atime'+sr+'"  val='+sr+'  class="astn ta_calculation"> </td><td> <input type="text" name="distance'+sr+'" id="distance'+sr+'"> </td> <td><input type="text" class="changeper" val='+sr+' name="per'+sr+'" id="per'+sr+'"></td><td><input type="text" name="amt'+sr+'" id="amt'+sr+'">  </td></tr>');
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
						// nr=nr+1;
					alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
					$("#per"+prev_nr+"").val(per);
					$("#amt"+prev_nr+"").val(taamount);

					removePrevValues2(date,val);
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
						// nr=nr+1;
						alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues2(date,val);
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
					
					// if(prev_date != date && prev_date != null)
					// {
					// 	alert("ATIME IS LESS");
					// 	atime1="23:59";
					// 	alert(prev_date+"_"+prev_dtime+"_"+atime1);
					// 	c_time=time_calculate(prev_date,prev_dtime,atime1);
					// 	if(c_time <= '06:00')
					// 	{
					// 		alert("30%");
					// 		per ="30%";
					// 		taamount=(amount * 0.3);
					// 		alert(amount+' '+taamount);
					// 	}
					// 	else if(c_time > '06:00' && c_time <= '12:00')
					// 	{
					// 		alert("70%");
					// 		per ="70%";
					// 		taamount=(amount * 0.7);
					// 		alert(amount+' '+taamount);
					// 	}
					// 	else if(c_time > '12:00')
					// 	{
					// 		alert("100%");
					// 		per ="100%";
					// 		taamount=900;
					// 		alert(amount+' '+taamount);
					// 	}
						
					// 	var prev_nr=nr-1;
					// 	$("#per"+prev_nr+"").val(per);
					// 	$("#amt"+prev_nr+"").val(taamount);
					// }	
				}

				else
				{	
					alert(flag);
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
						// nr=nr+1;
						alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues2(date,val);
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
		alert(val);
		var jtype=$("#other"+val).val();
		if(jtype != 5)
		{
			var prev_date=$("#date"+val).val();
			alert(prev_date +" = "+date);

			if(prev_date == date)
			{
				$("#per"+val+"").val("");
				$("#amt"+val+"").val("");
			}
		}
		
	}

	function removePrevValues2(date,nr)
	{
		var val=nr-1;
		alert(val);
		var per=$("#per"+val).val();
		alert(date +" = "+per);
		$("#per"+val+"").val("");
		$("#amt"+val+"").val("");		
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