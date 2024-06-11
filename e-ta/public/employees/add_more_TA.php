<?php
date_default_timezone_set("Asia/kolkata");
//echo date_default_timezone_get();

	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>

  <div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        	Add More TA Claim
        </span>
        <span style="float: right">
        <button class=" btn btn-danger" onclick="history.go(-1);">Back</button>
      </span>
    </span>
    <div class="clearfix"></div>
    </section>
    <section class="content">

        <div class="row">
          <div class="col-xs-12">
            <div class="box box-primary" style="padding-top:15px;padding-bottom:10px;padding-right:45px;padding-left:20px;">
            
                  <form class="form-horizontal " action="testData2.php" method="post" enctype="multipart/form-data">
                <div class="tab-pane table-responsive" id="settings">
                	<div class="row">
                		<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			<div class="col-xs-4">
                				<div class="form-group">
				                <label>For which allowances Claimed for : </label>
				                	<div><?php 
				                	$years=["January","February","March","April","May","June","July","August","September","October","November","December"];
				                	$query = "select taentryform_master.TAYear, taentryform_master.TAMonth, MAX(taentryforms.set_number) as set_number from taentryform_master INNER JOIN taentryforms ON taentryforms.reference_id=taentryform_master.reference WHERE taentryform_master.reference='".$_REQUEST['id']."'";
				                	$result = mysql_query($query);
				                	$value = mysql_fetch_array($result);
				                	$expl = explode(",",$value['TAMonth']);
				                	foreach($expl as $val)
				                	{
				                		echo $years[$val-1].", ";
				                	}
				                	echo " - ".$value['TAYear'];
				                  ?>
								</div>
				              </div>
                			</div>
                		<div class="col-xs-4">
                				<div class="form-group">
				                <label>Token / Card Pass</label>
				                <input type="text" name="cardpass" id="cardpass" class="form-control" required="required">
				              </div>
                			</div>
                		</div>
                		<?php 
                			$number = (int)$value['set_number'];
                			$number++;
                		?>
                  		<div class="col-xs-12">
                  			<input type="button" value="Add Row" class="btn btn-info" style="float:right;" id="add_row">
                  		</div>
                  </div>
                  <?php 
                  	$query_emp = "select * from employees where id = '".$_SESSION['id']."'";
                  	$result_emp = mysql_query($query_emp) or die(mysql_error());
                  	$value_emp = mysql_fetch_array($result_emp);
                  ?>
                  	<input type="hidden" name="hide_count" id="hide_count" value="0"/>
					<input type="hidden" name="hide_count_for_time" id="hide_count_for_time" value="0"/>
                  	<input type="hidden" name="empid" id="empid" value="<?php echo $value_emp['pfno'] ?>"/>
                  	<input type="hidden" name="levelTA" id="levelTA" value="<?php echo $value_emp['level'] ?>"/>
                  	<input type="hidden" name="year" id="year"/>
                  	<input type="hidden" name="set" id="set" value="<?php echo $number; ?>"/>
                  	<input type="hidden" name="month" id="month" value="<?php echo $value['TAMonth']; ?>"/>
                  	<input type="hidden" name="reference" id="reference" value="<?php echo $_REQUEST['id']; ?>"/>
                  	<table class="table table-inverse table-condensed">
                  		<thead>
                  			<tr style="font-size: 13px;">
                  				<th>दिनांक<br>Date</th>
								<th>यात्रा प्रकार <br>J.Type</th>
                  				<th>गाड़ी नं <br>Train no.</th>
								
								<th>अन्य <br>Other</th>
                  				<th>प्रस्थान स्टेशन <br>Depart Station</th>
                  				<th>प्रस्थान समय<br>Depart Time</th>
                  				<th>आगमन स्टेशन <br> Arri.Station</th>
                  				<th>आगमन समय <br> Arri.Time</th>
                  				<th> दूरी <br> Distance</th>
                  				<!--th>यात्रा प्रकार <br>J.Type</th>
                  				<th>अन्य <br>Other</th-->
                  				<th>उद्देश<br> Objective</th>
                  			</tr>
                  		</thead>
                  		<tbody>
                  		<?php
                  		$count = 0;$cnt=0; 
                  		echo "<tr>
                  			<td><input type='date' style='width:170px;border:none;' name='date$cnt' id='date$cnt' class='$cnt selectdate'  required></td>
							<td><select class='$cnt' style='width:90px;' name='journey_type$cnt' id='journey_type$cnt'>
									<option selected value='Train'>Train</option>
									<option value='STrain'>Special Train</option>
									<option value='Bus'>By Road</option>
									<option value='none'>None</option>
								</select>
								</td>
                  			<td><input type='text' style='width:70px;' name='train$cnt' placeholder='Train no.' class='$cnt train_no' onChange='trainnumber(this)'></td>
							
                  				<td><select class='$cnt miscthing' style='width:90px;' name='misc$cnt' id='misc$cnt'>
									<option selected value='None'>None</option>
									<option value='Leave'>Leave</option>
									<option value='BD'>Break Down</option>
									<option value='Exam'>Exam</option>
									<option value='training'>Training</option>
								</select></td>
                  			<td><input type='text' list='dstation' required class='$cnt departClass' style='width:100px; text-transform:uppercase' name='departS$cnt' id='departS$cnt' placeholder='Station'><datalist id='dstation'>";
                  			$sql = "SELECT stationdesc FROM station";
                  			$query = mysql_query($sql);
                  			echo mysql_error();
                  			while($row = mysql_fetch_array($query)){
                  				echo "<option value='".$row['stationdesc']."'>";
                  			}
              			echo "</datalist></td>";
                  		?>
                  				<td><input type="text" style='width:60px;' class='dt' name="departT<?php echo $cnt;?>" tempid='<?php echo $cnt;?>' id="departT<?php echo $cnt;?>" data-inputmask ='"mask": "99:99"' data-mask></td>
                  		<?php
                  			echo "<td><input type='text' class='$cnt arrivalClass' style='width:100px; text-transform:uppercase' list='astation' name='arrivalS$cnt' id='arrivalS$cnt' placeholder='Station'><datalist id='astation'>";
                  			$sql = "SELECT stationdesc FROM station";
                  			$query = mysql_query($sql);
                  			echo mysql_error();
                  			while($row = mysql_fetch_array($query)){
                  				echo "<option value='".$row['stationdesc']."'>";
                  			}
              			echo "</datalist></td>";
                  		?>
                  				<td><input type="text" id='<?php echo $cnt."_".$cnt;?>' class='at at_comp attime<?php echo $cnt;?>' style='width:60px;' name="arrivalT<?php echo $cnt;?>" temp='<?php echo $cnt;?>' data-inputmask ='"mask": "99:99"' data-mask></td>
                  		<?php
                  			echo "<td><input type='number' class='$cnt' style='width:100px;' name='distance$cnt' placeholder='Distance'></td>";
                  				if($cnt==0)
                  				{
                  					echo "<td id='dynamic'><textarea name='objective$cnt' class='form-control textare' required></textarea></td></tr>";
                  					$cnt++;
                  				}
                  		?>
                  			
                  		</tbody>
                  	</table>
                  	
                </div>
                <div class="row">
                  		<div class="col-xs-12">
                  			<input type="submit" value="Submit" id="submit_btn" class="btn btn-primary" style="float:right;display: none;">
                  		</div>
                  </div>
              </div>
                  </form>
          </div>
        </div>
        <div class="alert alert-info alert-dismissable" id="alert_message" style="display: none;">

        </div>

    </section>
  </div>
 <?php
	require_once("../../global/footer.php");
 ?>

<script type="text/javascript">
	$(document).ready(function(){
	//	$("select option:contains('L')").attr("disabled","disabled");
	var d = new Date();
	var n = d.getMonth();
	var year = d.getFullYear();
	var temp_month = n;
	n = temp_month;
	//alert(temp_month);
	if(n<10){
        n='0'+n;
    } 
	d = year+'-'+n+'-'+daysInMonth(temp_month, year);
	//alert(n.length);
	$(".selectdate").attr("max", d);
	d = "2000-01-30";
	$(".selectdate").attr("min", d);
});
$(document).on("change", ".at_comp", function(){
	   var cnt=$("#hide_count_for_time").val();
				  var dpt_time=$("#departT"+cnt).val();
				  var arr_time=$(".attime"+cnt).val();
				  
				var prev_cnt=(+cnt)-1;
				var misc_count=$("#misc"+prev_cnt).val();
				if(misc_count=="Leave"){
					prev_cnt=cnt;
				} 
				var prv_arr_time=$(".attime"+prev_cnt).val();
				var date = new Date($("#date"+prev_cnt).val());
				 // alert(cnt);	  
				 // alert(prev_cnt);	  
				 //alert(cnt1);	
				if(prv_arr_time==''){
					   //alert('called right fun');
					var cnt1=(cnt);
					var date1 = new Date($("#date"+cnt1).val());
					  // alert(date1);
					if(date!=date1){
						// alert('i am called');
						dpt_time=$("#departT"+prev_cnt).val();
						//dpt_time=$("#departT"+cnt).val();
						arr_time=$(".attime"+cnt1).val();
						// alert(dpt_time);
						// alert(arr_time);
						if(dpt_time<=arr_time){
							alert('Arrival time must be greater than Depart time');
							$(".attime"+cnt1).val("");
							$(".attime"+cnt1).focus();
						} 
					}
				}
				else{
			   if(dpt_time>=arr_time){
				alert('Arrival time must be greater than Depart time');
					$(".attime"+cnt).val("");
					$(".attime"+cnt).focus();
				} 
				}
	});
	$(document).on("click", ".selectdate", function(){
		var d = new Date();debugger;
		var n = d.getMonth();
		var year = d.getFullYear();
		var temp_month = n;
		n = temp_month;
		//alert(temp_month);
		if(n<10){
	        n='0'+n;
	    } 
		d = year+'-'+n+'-'+daysInMonth(temp_month, year);
		//alert(n.length);
		$(".selectdate").attr("max", d);
		d = "2000-01-30";
		$(".selectdate").attr("min", d);
	});
	function daysInMonth (month, year) {
    	return new Date(year, month, 0).getDate();
	}

						var cnt = 1;
						var journey=false;
						var temp = true;
						var journey_end = false;
						var journey_type = "";
						var monthdays = ["0","31", "28", "31", "30", "31", "30",
						  "31", "31", "30", "31", "30", "31"
						];
						
						$(document).on("change",".dt",function(){
							var value = $(this).val();
							var array = value.split(":");
							var first = parseInt(array[0]);
							var second = parseInt(array[1]);
							var data = "";
							if(first>23 || first<0 || second>60 || second<0)
							{
								alert("Invalid time");
								$(this).val("");
							}
						});
						$(document).on("change",".at",function(){
							var value = $(this).val();
							var array = value.split(":");
							var first = parseInt(array[0]);
							var second = parseInt(array[1]);
							var data = "";
							if(first>23 || first<0 || second>60 || second<0)
							{
								alert("Invalid time");
								$(this).val("");
							}
						});
						
						$(document).on("change",".departClass",function(){
							 //var cnt=$("#hide_count_for_arrstn").val();
							var cnt=$("#hide_count_for_time").val();
							 //alert(cnt);
							// if(cnt>=1){
								 debugger;
								for(var i=1; i<=cnt; i++){
								var prev_cnt=(+cnt)-i; 
									var arrivalS=$("#arrivalS"+prev_cnt).val();
									var departS=$("#departS"+cnt).val();
									// alert(arrivalS);
									// alert(departS);
									if(arrivalS != ""){
										if(arrivalS!=departS){
											alert('Arrival station and depart station must match');
											$("#departS"+cnt).val("");
											$("#departS"+cnt).focus();
											break;
										}
										else{
											if(arrivalS==departS){
												break;
											}
										}
									}
							     }
							});
						var arrivalStation = "";
						$(document).on("change",".arrivalClass",function(){
								debugger;
								var classVal = $(this).attr('class');
								classVal1 = classVal.split(" ");
								var cnt1 = classVal1[0];
								arrivalStation = $("#arrivalS"+cnt1).val();
								arrivalStation = arrivalStation.toLowerCase();
								var deptstation = $("#departS"+cnt1).val();
								deptstation = deptstation.toLowerCase();
								if(deptstation == arrivalStation)
								{
									alert('invalid Arrival Station');
									$("#departS"+cnt1).val("");
									$("#arrivalS"+cnt1).val("");
								}
								else
								{
									
									var departStation = $("#departS0").val();
									departStation = departStation.toLowerCase();
									
								var cnt1 = cnt-1;
									 arrivalStation = $("#arrivalS"+cnt1).val();
									 arrivalStation = arrivalStation.toLowerCase();
									if(departStation==arrivalStation)
									{
										$("#submit_btn").show();
										$("#add_row").hide();
									}
									else
									{
										$("#submit_btn").hide();
										$("#add_row").show();
									}
								}
								
								
							});
						$(document).on("change","#month",function(){
							debugger;
							var month = $(this).val();
							var lengths = month.length;
							lengths = lengths - 1;
							var max_val = monthdays[month[lengths]];
							if(month[0]<=9)
								month[0] = "0"+month[0];
							var today = new Date();
							var year = today.getFullYear();
							$("#year").val(year);
							$("#date0").attr('value',year+'-'+month+'-01');
						});
						
						$(document).on("change",".selectdate",function(){
							var ncnt = cnt - 2;
							var day = new Date($(this).val());
							var year = day.getFullYear();
							$("#year").val(year);
							//alert(year);
							//alert($("#date"+ncnt).val());
							month = new Date($("#date"+ncnt).val());
                         		month.setDate(month.getDate()+1);
                         		var tempmon = parseInt(month.getMonth()+1);
                         		if(tempmon<10)
                         			tempmon = "0"+tempmon;
                         		var tempdate = parseInt(month.getDate());
                         		if(tempdate<10)
                         			tempdate = "0"+tempdate;
                         		month = [month.getFullYear(), tempmon, tempdate].join('-');
                         		newmonth = ""+month;
								var begin_Date = $(this).val();
								$.ajax({
								url: 'control/adminProcess.php',
								type: 'POST',
								data: {action : 'validate_date',date: begin_Date },
								})
								.done(function(data) {
									debugger;
									if(data!="0")
									{
										var message = "You already filled data for "+begin_Date+" date<br>";
										message += "Last claim percent on this date is "+data;
										$("#alert_message").html(message);
										$("#alert_message").show();
									}
									else
									{
										$("#alert_message").html("");
										$("#alert_message").hide();
									}
								});
						});
                         	

					$(document).ready(function(){
						$("#add_row").on("click",function(){
							
							// Validation for train time
							var cnt_time=$("#hide_count_for_time").val();
							cnt_time =(+cnt_time)+1;
							$("#hide_count_for_time").val(cnt_time);
							
							
							
							$("#hide_count").val(cnt);
							var ncnt = cnt - 1;
								month = new Date($("#date"+ncnt).val());
                         		month.setDate(month.getDate()+1);
                         		var tempmon = parseInt(month.getMonth()+1);
                         		if(tempmon<10)
                         			tempmon = "0"+tempmon;
                         		var tempdate = parseInt(month.getDate());
                         		if(tempdate<10)
                         			tempdate = "0"+tempdate;
                         		month = [month.getFullYear(), tempmon, tempdate].join('-');
								newmonth = ""+month;
								
								month1 = new Date($("#date"+ncnt).val());
                         		var tempmon1 = parseInt(month1.getMonth()+1);
                         		if(tempmon1<10)
                         			tempmon1 = "0"+tempmon1;
                         		var tempdate1 = parseInt(month1.getDate());
                         		if(tempdate1<10)
                         			tempdate1 = "0"+tempdate1;
                         		month1 = [month1.getFullYear(), tempmon1, tempdate1].join('-');
								newmonth1 = ""+month1;
								
								//alert(newmonth1);
								if(newmonth == 'NaN-NaN-NaN')
								{
									alert('Please select Date');
								}
								else
								{
								 $.ajax({
								url: 'control/adminProcess.php',
								type: 'POST',
								data: {action : 'validate_date',date: newmonth },
								})
								.done(function(data) {
									
									if(data!="0")
									{
										var message = "You already filled data for "+newmonth+" date<br>";
										message += "Last claim percent on this date is "+data;
										$("#alert_message").html(message);
										$("#alert_message").show();
									}
									else
									{
										$("#alert_message").html("");
										$("#alert_message").hide();
									}
								}); 
								
							
							
							var markup = "<tr><td><input type='date' style='width:170px;border:none;' name='date"+cnt+"' id='date"+cnt+"' value='"+newmonth+"' class='"+cnt+" selectdate' min='"+newmonth1+"' required></td>        <td><select class='"+cnt+"' style='width:90px;' name='journey_type"+cnt+"' id='journey_type"+cnt+"'><option selected value='Train'>Train</option><option value='STrain'>Special Train</option><option value='Bus'>By Road </option><option value='none'>None</option>							</select></td> <td><input type='text' style='width:70px;' name='train"+cnt+"' id='train"+cnt+"' placeholder='Train no.' class='"+cnt+" train_no' value='"+journey_type+"' onChange='trainnumber(this)'></td>                 				<td><select class='"+cnt+" miscthing' style='width:90px;' name='misc"+cnt+"' id='misc"+cnt+"'>	<option selected value='None'>None</option><option value='Leave'>Leave</option><option value='BD'>Break Down</option><option value='Exam'>Exam</option><option value='training'>Training</option></select></td><td><input type='text' class='"+cnt+" departClass' style='width:100px; text-transform:uppercase' list='dstation'"+cnt+"' name='departS"+cnt+"' id='departS"+cnt+"' placeholder='Station'><datalist id='dstation'"+cnt+"'>";
							 
							markup += "<?php
			                  			$sql = "SELECT stationdesc FROM station";
			                  			$query = mysql_query($sql);
			                  			echo mysql_error();
			                  			while($row = mysql_fetch_array($query)){
			                  				echo "<option value='".$row['stationdesc']."'>";
			                  			}?>
			              			";
							markup += " </datalist></td><td><input type='text' style='width:60px;' class='dt' name='departT"+cnt+"' tempid='"+cnt+"' id='departT"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td><td><input type='text' class='"+cnt+" arrivalClass' style='width:100px; text-transform:uppercase' list='astation'"+cnt+"' name='arrivalS"+cnt+"' id='arrivalS"+cnt+"' placeholder='Station'><datalist id='astation'"+cnt+"'>";
							markup += "<?php
			                  			$sql = "SELECT stationdesc FROM station";
			                  			$query = mysql_query($sql);
			                  			echo mysql_error();
			                  			while($row = mysql_fetch_array($query)){
			                  				echo "<option value='".$row['stationdesc']."'>";
			                  			}?>
			              			";
							markup += "</datalist></td><td><input type='text' id='"+cnt+"_"+cnt+"'   class='at at_comp attime"+cnt+" ' style='width:60px;' name='arrivalT"+cnt+"' temp='"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td>                  		<td><input type='number' class='"+cnt+"' style='width:100px;' name='distance"+cnt+"' id='distance"+cnt+"' placeholder='Distance'></td></tr>";
							$(".textare").attr("rows",cnt+2);
							$("#dynamic").attr("rowspan",cnt+2);
							$("table tbody").append(markup);
							 $("[data-mask]").inputmask();
							 cnt = cnt+1;
							}
						});
					});
					
					function trainnumber(inputtxt)  
					{  
						var cnt=$("#hide_count_for_time").val();
						var value = $("#journey_type"+cnt).val();
						if(value!='STrain')
						{
							var number_match = /^\d{5}$/;  
							if((inputtxt.value.match(number_match)))  
								{  
								  return true;  
								}  
							else  
								{  
								alert("Train number must be integer and 5 digits");  
								inputtxt.value = "";
								return false;  
								}  
						}
					}
					
					$(document).on("change",'.miscthing',function(){
						if($(this).val()=='training'){
							var con = $(this).attr('class');
							var data = con.split(' ');
						$(this).after("<input type='number' name='percentage"+data[0]+"' id='percentage"+data[0]+"' placeholder='%' max='100' min='0' value='00' style='width:40%'>");
						}
						else{
							var con = $(this).attr('class');
							var data = con.split(' ');
							$("#percentage"+data[0]).remove();
						}
					});
					
                     </script>

