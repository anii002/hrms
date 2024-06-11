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
  			TA Entry Form
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
            
                  <form class="form-horizontal" name="TAForm" action="control/adminProcess.php?action=claimTA" method="post" enctype="multipart/form-data">
                <div class="tab-pane table-responsive" id="settings">
                	<div class="row">
                		<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			<div class="col-xs-8">
                				<div class="form-group">
				                <label>For which allowances Claimed for</label>
				                <select class="form-control select2" multiple="multiple" data-placeholder="Select a Months" name="month[]" id="month" style="width: 100%;" required="required">
				                  <option value="1">January</option>
				                  <option value="2">February</option>
				                  <option value="3">March</option>
				                  <option value="4">April</option>
				                  <option value="5">May</option>
				                  <option value="6">June</option>
				                  <option value="7">July</option>
				                  <option value="8">August</option>
				                  <option value="9">September</option>
				                  <option value="10">October</option>
				                  <option value="11">November</option>
				                  <option value="12">December</option>
				                </select>
				              </div>
                			</div>
                		</div>
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
                  	<input type="hidden" name="empid" id="empid" value="<?php echo $value_emp['pfno'] ?>"/>
                  	<input type="hidden" name="levelTA" id="levelTA" value="<?php echo $value_emp['level'] ?>"/>
                  	<input type="hidden" name="year" id="year"/>
                  	<input type="hidden" name="set" id="set" value="1"/>
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
                  				<th>Claim %</th>
                  				<th>Amount</th>
                  				<th>Objective</th>
                  			</tr>
                  		</thead>
                  		<tbody>
                  		<?php
                  		$count = 0;$cnt=0; 
                  		echo "<tr>
                  			<td><input type='date' style='width:130px;border:none;' name='date$cnt' id='date$cnt' class='$cnt selectdate' required></td>
                  			<td><input type='number' required style='width:70px;' name='train$cnt' placeholder='Train no.' class='$cnt'></td>
                  			<td><input type='text' required class='departClass' style='width:100px;' name='departS$cnt' id='departS$cnt' placeholder='Station'></td>";
                  		?>
                  				<td><input type="text" style='width:45px;' class='dt' name="departT<?php echo $cnt;?>" tempid='<?php echo $cnt;?>' id="departT<?php echo $cnt;?>" data-inputmask ='"mask": "99:99"' data-mask></td>
                  		<?php
                  			echo "<td><input type='text' class='$cnt arrivalClass' style='width:100px;' name='arrivalS$cnt' placeholder='Station'></td>";
                  		?>
                  				<td><input type="text" id='<?php echo $cnt."_".$cnt;?>' class='at' style='width:45px;' name="arrivalT<?php echo $cnt;?>" temp='<?php echo $cnt;?>' data-inputmask ='"mask": "99:99"' data-mask></td>
                  		<?php
                  			echo "<td><input type='number' class='$cnt' style='width:70px;' name='distance$cnt' placeholder='Distance'></td>
                  				<td><input type='number' class='$cnt' style='width:50px;' readonly name='percent$cnt' id='percent$cnt' placeholder='%'></td>
                  				<td><input type='number' class='$cnt' style='width:90px;' name='amount$cnt' id='amount$cnt' placeholder='amount'></td>";
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
                  			<input type="submit" value="Submit" class="btn btn-primary" style="float:right;" onsubmit="return validateForm()">
                  		</div>
                  </div>
              </div>
                  </form>
          </div>
        </div>

    </section>
  </div>
 <?php
	require_once("../../global/footer.php");
 ?>


                     <script type="text/javascript">

						var cnt = 1;
						var journey=false;
						var temp = true;
						var journey_end = false;
						var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
						  "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
						];
						var newmonth = "";
                     	$(document).ready(function() {
                     		
                     		function validateForm() {
							    var x = document.forms["TAForm"]["departT0"].value;
							    //alert(cnt);
							    if (x == "") {
							        alert("Name must be filled out");
							        return false;
							    }
							    return false;
							}
							$(document).on("change",".arrivalClass",function(){
								debugger;
								var departStation = $("#departS0").val();
								var cnt1 = cnt-1;
								var arrivalStation = $("#arrivalS"+cnt1).val();
								if(departStation==arrivalStation)
								{
									journey = false;
									temp = true;
									journey_end = true;
								}
								else
								{
									journey = true;
									temp = false;
									journey_end = false;
								}
							});
                     	});
                     		var level = "";
                     		var amount = 0;
                         $(document).ready(function() {
                         	var test = 1;
                         	var month = "";
                         	$(document).on("change","#date0",function(){
                         		var year = new Date($(this).val());
                         		$("#year").val(year.getFullYear());
                         		
                         		level = $("#levelTA").val();
                         		$.ajax({
                         			url: 'control/adminProcess.php?action=getTaAmount',
                         			type: 'POST',
                         			data: {level: level},
                         		})
                         		.done(function(data) {
                         			amount = parseInt(data);
                         			//alert(amount);
                         			$("#amount0").val(amount);
                         		});
                         		
                         	});
                           
						$(document).on("change",".dt",function(){
							debugger;
							var beginT = $(this).val();
							var endT = "24:00";
							var id = $(this).attr('tempid');
							var flag=1;
							var begin_Date = $("#date"+id).val();
							var end_Date = $("#date"+id).val();
							var temp_id = id-1;
							var i=0;
							var ii=0;
							if(temp_id!=-1)
							{
								while($("#date"+temp_id).val()==begin_Date)
								{
									beginT = $("#departT"+temp_id).val();
									endT = $("#departT"+id).val();
									//if(beginT=="")
										$("#percent"+temp_id).val("");
										$("#amount"+temp_id).val("");
									temp_id = temp_id-1;
									test=1;
								}
							}
							if(beginT=="")
								beginT="00:00";
							if(journey_end==true)
								beginT="00:00";

							var newdate2 = begin_Date+" "+beginT;
							var newdate1 = begin_Date+" "+endT;
							var d2= new Date(newdate2);
								 var d1= new Date(newdate1);
								 var sec = (d1-d2)/1000;
								 var min = parseInt(sec/60);
								 var hr = parseInt(min/60);
								 if(hr<6)
								 {
									$("#percent"+id).val("30");
									var cal = (amount*30)/100;
									$("#amount"+id).val(cal);
								}
								else if(hr>=6 && hr<12)
								{
									$("#percent"+id).val("70");
									var cal = (amount*70)/100;
									$("#amount"+id).val(cal);
								}
								else
								{
									$("#percent"+id).val("100");
									var cal = amount;
									$("#amount"+id).val(cal);
								}

							if(journey==true)
							{
								$("#percent"+id).val("100");
								var cal = amount;
								$("#amount"+id).val(cal);
							}
							 	 
						});
						$(document).on("change",".at",function(){
							debugger;
							var endT = $(this).val();
							var id = $(this).attr('temp');
							var beginT = $("#departT"+id).val();
								var begin_Date = $("#date"+id).val();
								var temp_id = id-1;
								if(beginT=="")
								{
									beginT="00:00";
								}

								if(test==1)
								{
									test=0;
									while($("#date"+temp_id).val()==begin_Date)
									{
										beginT = $("#departT"+temp_id).val();
										endT = $(this).val();
										temp_id = temp_id-1;
										test=0;
									}
								}
								if(beginT=="")
									beginT="00:00";

							if(journey_end==true)
								beginT="00:00";
								var newdate2 = begin_Date+" "+beginT;
								var newdate1 = begin_Date+" "+endT;
								var d2= new Date(newdate2);
								 var d1= new Date(newdate1);
								 var sec = (d1-d2)/1000;
								 var min = parseInt(sec/60);
								 var hr = parseInt(min/60);
								 if(hr<6)
								 {
									$("#percent"+id).val("30");
									var cal = (amount*30)/100;
									$("#amount"+id).val(cal);
								}
								else if(hr>=6 && hr<12)
								{
									$("#percent"+id).val("70");
									var cal = (amount*70)/100;
									$("#amount"+id).val(cal);
								}
								else
								{
									$("#percent"+id).val("100");
									var cal = amount;
									$("#amount"+id).val(cal);
								}
							if(journey==true && temp==false)
							{
								$("#percent"+id).val("100");
								var cal = amount;
								$("#amount"+id).val(cal);
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
							var markup = "<tr><td><input type='date' style='width:130px;border:none;' name='date"+cnt+"' id='date"+cnt+"' value='"+newmonth+"' class='"+cnt+" selectdate'></td>                  			<td><input type='number' style='width:70px;' name='train"+cnt+"' placeholder='Train no.' class='"+cnt+"'></td>                  			<td><input type='text' class='"+cnt+" departClass' style='width:100px;' name='departS"+cnt+"' placeholder='Station'></td>                  				<td><input type='text' style='width:45px;' class='dt' name='departT"+cnt+"' tempid='"+cnt+"' id='departT"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td><td><input type='text' class='"+cnt+" arrivalClass' style='width:100px;' name='arrivalS"+cnt+"' id='arrivalS"+cnt+"' placeholder='Station'></td>                  				<td><input type='text' id='"+cnt+"_"+cnt+"' class='at' style='width:45px;' name='arrivalT"+cnt+"' temp='"+cnt+"' data-inputmask ='\"mask\": \"99:99\"' data-mask></td>                  		<td><input type='number' class='"+cnt+"' style='width:70px;' name='distance"+cnt+"' placeholder='Distance'></td>                  				<td><input type='number' class='"+cnt+"' style='width:50px;' readonly name='percent"+cnt+"' id='percent"+cnt+"' placeholder='%' value='100'></td>                  				<td><input type='number' class='"+cnt+"' style='width:90px;' name='amount"+cnt+"' id='amount"+cnt+"' placeholder='amount' value='"+amount+"'></td></tr>";
							$(".textare").attr("rows",cnt+2);
							$("#dynamic").attr("rowspan",cnt+2);
							$("table tbody").append(markup);
							 $("[data-mask]").inputmask();
							 cnt = cnt+1;
						});
					});
                     </script>
