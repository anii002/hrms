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
        	Update Claim TA Details
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
            
                  <form class="form-horizontal " action="testData3.php" method="post" enctype="multipart/form-data">
                <div class="tab-pane table-responsive" id="settings">
                	<div class="row">
                		<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			<div class="col-xs-4">
                				<div class="form-group">
				                <label>For which allowances Claimed for : </label>
				                	<div><?php 
									$id = explode('-',$_REQUEST['claim']);
				                	$years=["January","February","March","April","May","June","July","August","September","October","November","December"];
				                	$query = "select taentryform_master.TAYear, taentryform_master.TAMonth, MAX(taentryforms.set_number) as set_number from taentryform_master INNER JOIN taentryforms ON taentryforms.reference_id=taentryform_master.reference WHERE taentryform_master.reference='".$id[0]."'";
				                	$result = mysql_query($query);
				                	$value = mysql_fetch_array($result);
				                	$expl = explode(",",$value['TAMonth']);
				                	foreach($expl as $val)
				                	{
				                		echo $years[$val-1].", ";
				                	}
				                	echo " - ".$value['TAYear'];
				                	?></div>
				              </div>
                			</div>
                		<div class="col-xs-4">
                				<div class="form-group">
				                <label>Token / Card Pass</label>
								<?php 
									$query = mysql_query("select * from taentryforms where reference_id='$id[0]' AND set_number='$id[1]' ");
									$resultset = mysql_fetch_array($query);
								?>
				                <input type="text" name="cardpass" id="cardpass" class="form-control" required="required" value='<?php echo $resultset['cardpass'] ?>'>
				              </div>
                		</div>
						<div class="col-xs-12">
                  			<input type="button" value="Add Row" class="btn btn-info" style="float:right;" id="add_row">
                  		</div>
                		</div>
                		<?php 
                			$number = (int)$value['set_number'];
                			$number++;
                		?>
                  </div>
                  <?php 
                  	$query_emp = "select * from employees where id = '".$_SESSION['id']."'";
                  	$result_emp = mysql_query($query_emp) or die(mysql_error());
                  	$value_emp = mysql_fetch_array($result_emp);
					
					$query = mysql_query("select count(id) as count from taentryforms where reference_id='$id[0]' AND set_number='$id[1]' ");
									$resultset = mysql_fetch_array($query);
									$rows = $resultset['count'];
									$rows_C = $rows-1;
                  ?>
                  	<input type="hidden" name="hide_count" id="hide_count" value="<?php echo $rows_C; ?>"/>
                  	<input type="hidden" name="empid" id="empid" value="<?php echo $value_emp['pfno'] ?>"/>
                  	<input type="hidden" name="levelTA" id="levelTA" value="<?php echo $value_emp['level'] ?>"/>
                  	<input type="hidden" name="year" id="year"/>
                  	<input type="hidden" name="set" id="set" value="<?php echo $id[1]; ?>"/>
                  	<input type="hidden" name="month" id="month" value="<?php echo $value['TAMonth']; ?>"/>
                  	<input type="hidden" name="reference" id="reference" value="<?php echo $id[0]; ?>"/>
                  	<table class="table table-inverse table-condensed">
                  		<thead>
                  			<tr>
                  				<th>Date</th>
                  				<th>Train no.</th>
                  				<th>Depart Station</th>
                  				<th>Depart Time</th>
                  				<th>Arri. Station</th>
                  				<th>Arri. Time</th>
                  				<th>Distance</th>
                  				<th>J. Type</th>
                  				<th>Other</th>
                  				<th>Objective</th>
                  			</tr>
                  		</thead>
                  		<tbody>
                  		<?php
                  		$count = 0;$cnt=0; 
						$query = mysql_query("select * from taentryforms where reference_id='$id[0]' AND set_number='$id[1]' ");
						while($resultset = mysql_fetch_array($query))
						{
                  		echo "<tr>
                  			<td><input type='date' style='width:130px;border:none;' name='date$cnt' id='date$cnt' class='$cnt selectdate' value='".$resultset['taDate']."'  ></td>
                  			<td><input type='text'  style='width:70px;' name='train$cnt' placeholder='Train no.' class='$cnt train_no' onChange='trainnumber(this)' value='".$resultset['train']."'></td>
                  			<td><input type='text' class='$cnt departClass' style='width:100px; text-transform:uppercase' name='departS$cnt' id='departS$cnt' placeholder='Station' value='".$resultset['departS']."'></td>";
                  		?>
                  				<td><input type="text" style='width:45px;' class='dt' name="departT<?php echo $cnt;?>" tempid='<?php echo $cnt;?>' id="departT<?php echo $cnt;?>" data-inputmask ='"mask": "99:99"' data-mask value='<?php if($resultset['departT']=="00:00:00") echo ""; else echo $resultset['departT'] ;?>'></td>
                  		<?php
                  			echo "<td><input type='text' class='$cnt arrivalClass' style='width:100px; text-transform:uppercase' name='arrivalS$cnt' id='arrivalS$cnt' placeholder='Station' value='".$resultset['arrivalS']."'></td>";
                  		?>
                  				<td><input type="text" id='<?php echo $cnt."_".$cnt;?>' class='at' style='width:45px;' name="arrivalT<?php echo $cnt;?>" temp='<?php echo $cnt;?>' data-inputmask ='"mask": "99:99"' data-mask value='<?php if($resultset['arrivalT']=="00:00:00") echo ""; else echo $resultset['arrivalT'] ;?>'></td>
                  		<?php
                  			echo "<td><input type='number' class='$cnt' style='width:100px;' name='distance$cnt' placeholder='Distance' value='".$resultset['distance']."'></td>
                  				<td><select class='$cnt' style='width:70px;' name='journey_type$cnt' id='journey_type$cnt'>
									<option selected value='Train'>Train</option>
									<option value='Bus'>Bus</option>
									<option value='none'>None</option>
								</select>
								</td>
                  				<td><select class='$cnt miscthing' style='width:90px;' name='misc$cnt' id='misc$cnt'>";
								if($resultset['leave_info']=='training')
								{
									echo "<option selected value='training'>Training</option>
									<option value='None'>None</option>
									<option value='Leave'>Leave</option>
									<option value='BD'>Break Down</option>
									<option value='Exam'>Exam</option>";
								}
								else if($resultset['leave_info']=='Exam')
								{
									echo "<option selected value='Exam'>Exam</option>
									<option value='None'>None</option>
									<option value='Leave'>Leave</option>
									<option value='BD'>Break Down</option>
									<option value='training'>Training</option>";
								}
								else if($resultset['leave_info']=='BD')
								{
									echo "<option selected value='BD'>Break Down</option>
									<option value='None'>None</option>
									<option value='Leave'>Leave</option>
									<option value='Exam'>Exam</option>
									<option value='training'>Training</option>";
								}
								else if($resultset['leave_info']=='Leave')
								{
									echo "<option selected value='Leave'>Leave</option>
									<option value='None'>None</option>
									<option value='BD'>Break Down</option>
									<option value='Exam'>Exam</option>
									<option value='training'>Training</option>";
								}
								else{
									echo "<option selected value='None'>None</option>
									<option value='Leave'>Leave</option>
									<option value='BD'>Break Down</option>
									<option value='Exam'>Exam</option>
									<option value='training'>Training</option>";
								}
								if($resultset['leave_info']=='training')
								{
									echo "</select><input type='number' name='percentage$cnt' id='percentage$cnt' placeholder='दावा%' max='100' min='0' value='".(int)$resultset['percent']."' style='width:40%'></td>";
								}
								echo "</select></td>";
                  				if($count==0)
                  				{
                  					echo "<td id='dynamic' rowspan='$rows'><textarea name='objective$cnt' class='form-control textare' required>".$resultset['Objective']."</textarea></td></tr>";
                  					$count++;
                  				}
								$cnt++;
						}
                  		?>
                  			
                  		</tbody>
                  	</table>
                  	
                </div>
                <div class="row">
                  		<div class="col-xs-12">
                  			<input type="submit" value="Submit" id="submit_btn" class="btn btn-primary" style="float:right;">
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
						var cnt = parseInt(<?php echo $cnt; ?>);
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
							debugger;
						var id = $(this).attr('class');
								var data = id.split(" ");
								id = data[0];
								cnt1 = id-1;
									if(id!=0)
									{
									var arrivalStation = $("#arrivalS"+cnt1).val();
									arrivalStation = arrivalStation.toLowerCase();
									var deptstation = $("#departS"+id).val();
									deptstation = deptstation.toLowerCase();
									if(deptstation===arrivalStation)
									{
										
									}
									else
									{
										if(cnt!=1)
										{
											alert('Arrival station and depart station must match');
											$(this).val("");
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
									debugger;
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
							var markup = "<tr><td><input type='date' style='width:130px;border:none;' name='date"+cnt+"' id='date"+cnt+"' value='"+newmonth+"' class='"+cnt+" selectdate' required></td>                  			<td><input type='text' style='width:70px;' name='train"+cnt+"' placeholder='Train no.' class='"+cnt+" train_no' value='"+journey_type+"' onChange='trainnumber(this)'></td>                  			<td><input type='text' class='"+cnt+" departClass' style='width:100px; text-transform:uppercase' name='departS"+cnt+"' id='departS"+cnt+"' placeholder='Station'></td>                  				<td><input type='text' style='width:45px;' class='dt' name='departT"+cnt+"' tempid='"+cnt+"' id='departT"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td><td><input type='text' class='"+cnt+" arrivalClass' style='width:100px; text-transform:uppercase' name='arrivalS"+cnt+"' id='arrivalS"+cnt+"' placeholder='Station'></td>                  				<td><input type='text' id='"+cnt+"_"+cnt+"' class='at' style='width:45px;' name='arrivalT"+cnt+"' temp='"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td>                  		<td><input type='number' class='"+cnt+"' style='width:100px;' name='distance"+cnt+"' placeholder='Distance'></td>                  				<td><select class='"+cnt+"' style='width:70px;' name='journey_type"+cnt+"' id='journey_type"+cnt+"'><option selected value='Train'>Train</option><option value='Bus'>Bus</option><option value='none'>None</option>							</select></td>                  				<td><select class='"+cnt+" miscthing' style='width:90px;' name='misc"+cnt+"' id='misc"+cnt+"'>	<option selected value='None'>None</option><option value='Leave'>Leave</option><option value='BD'>Break Down</option><option value='Exam'>Exam</option><option value='training'>Training</option></select></td></tr>";
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
					
					$(document).on("change",'.miscthing',function(){
						if($(this).val()=='training'){
							var con = $(this).attr('class');
							var data = con.split(' ');
						$(this).after("<input type='number' name='percentage"+data[0]+"' id='percentage"+data[0]+"' placeholder='दावा%' max='100' min='0' value='00' style='width:40%'>");
						}
						else{
							var con = $(this).attr('class');
							var data = con.split(' ');
							$("#percentage"+data[0]).remove();
						}
					});
					
                     </script>

