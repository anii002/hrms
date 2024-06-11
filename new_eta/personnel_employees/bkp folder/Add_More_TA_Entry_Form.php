<?php
	$GLOBALS['flag']="5.3_1";
	include('common/header.php');
	include('common/sidebar.php');

	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
	$mon='';
	$m=str_pad($_GET['month'], 2, '0', STR_PAD_LEFT);
	$y=$_GET['year'];
	// print_r($month_array);
	if($month_array[$m])
	{
		$mon=$month_array[$m];
	}
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
            			<a href="#">यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form</a>
            		</li>
            	</ul>
            	
            </div>

			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<i class="fa fa-book"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<button class="btn btn-danger" onclick="history.go(-1);">Back</button>
					</div>
				</div>
				<div class="portlet-body form">
					
				<form action="taprocess_more.php" method="POST">	

				<?php 
					 $_SESSION['empid'];
					$level_q=mysql_query("SELECT LEVEL FROM `employees` where pfno='".$_SESSION['empid']."' ");
					$level_row=mysql_fetch_array($level_q);
					
					$lev= $level_row['LEVEL'];
					$level_q1=mysql_query("SELECT amount from ta_amount WHERE min<=$lev AND max>=$lev");
					$level_row1=mysql_fetch_array($level_q1);
					$user_amount= $level_row1['amount'];

				?>										
				<input type="hidden" name="u_amount" id="u_amount" value="<?php echo $user_amount;?>" class="form-control" >
				<input type="hidden" name="user_ref_no" id="user_ref_no" value="<?php echo $_GET['reference_no']; ?>">	

		 <div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label"><h4 class="">For which allowances claimed for</h4></label>						
						<input type="text" class="form-control" name="month" id="month" readonly value="<?php echo $mon." / ".$y; ?>">				
						<input type="hidden" class="form-control" name="user_month" id="user_month" readonly value="<?php echo $m; ?>">				
						<input type="hidden" class="form-control" name="user_year" id="user_year" readonly value="<?php echo $y; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label class="control-label"><h4 class="">टोकन / कार्ड पास / Token / Card Pass</h4></label>
						<input type="text" placeholder="Enter Token / Card Pass" name="cardpass" id="cardpass" class="form-control" value="<?php echo $_GET['cardpass']; ?>" required>
					</div>
				</div>
				
			</div>

			<div class="add-train">				
			<div class="portlet-body">
				<div class="table-scrollable table-responsive">
				<table class="table table-bordered">
					<tbody id="new_row">
						
				<tr class="odd gradeX">
					<td style="width: 10%">
						<div class="form-group">	
							<label class="control-label">Date <br> दिनांक </label>
							<div class="">
								<input class="form-control datepicker" type="text" name="date0" id="date0" val='0' placeholder ="dd/mm/yyyy">
							</div>
						</div>
					</td>
					<td style="width: 10%">
						 <div class="form-group">
							<label class="control-label">Journey Type <br> यात्रा का प्रकार
							</label>
							<div class="">
								<select class="form-control j_type" name="type0" id="type0" val="0">
											<option value="0" selected disabled>Select...</option>
											<?php 
											$query2="SELECT * FROM `journey_type_master`";
											$sql2=mysql_query($query2);

											while ($row2 = mysql_fetch_array($sql2)) {
												echo "<option value='".$row2['id']."' >".$row2['journey_type']."  </option>";
											}
										?>
										</select>
							</div>
						</div>
					</td>
					<td style="width: 10%">
						<div class="form-group">
							<label class="control-label">Train No. <br> गाडी नं.</label>
							<input type="text" class="form-control val train_no" name="trainno0" id="trainno0" placeholder="Train No." val="0">
							
						</div>
					</td>
					<td style="width: 10%">
						<div class="form-group">
							<label class="control-label">Other <br> अन्य
							</label>
							<div class="">
								<select class="form-control purpose" val="0" name="other0" id="other0">
										<option value="0" selected disabled>Select...</option>
										<?php 
											$query2="SELECT * FROM `journey_purpose_master`";
											$sql2=mysql_query($query2);

											while ($row2 = mysql_fetch_array($sql2)) {
												echo "<option value='".$row2['id']."' >".$row2['journey_purpose']."  </option>";
											}
										?>
										
									</select>
							</div>
						</div>
					</td>
					
					<td style="width: 8%">
						<div class="form-group">
							<label class="control-label">Depart Time <br> प्रस्थान समय </label>
							<input type="text" name="dtime0" val='0' id="dtime0" class="form-control changedtime timevalue" placeholder="hh:mm">
						</div>
					</td>
					<td style="width: 8%">
						<div class="form-group">
							<label class="control-label">Arri. Time <br> आगमन समय </label>
							<input type="text" class="form-control ta_calculation time_val timevalue" name="atime0" val='0' id="atime0"  placeholder="hh:mm">
						</div>
					</td>
					
					
					<td style="width: 12%">
						<div class="form-group">
							<label class="control-label">Depart Station <br> प्रस्थान स्टेशन</label>
							<input type='text' list='dstation0' style='text-transform:uppercase' name='dstn0' id='dstn0' placeholder='select Station' val="0" class="departClass form-control">
									 <datalist id='dstation0'>
									 <?php
			                  			$sql = "SELECT stationdesc FROM station";
			                  			$query = mysql_query($sql);
			                  			 while($row = mysql_fetch_array($query)){
			                  				echo "<option value='".$row['stationdesc']."'>";
			                  			}
			                  			?>
		          					</datalist> 
						</div>
					</td>
					
					<td style="width: 12%">
						<div class="form-group">
							<label class="control-label">Arri. Station <br> आगमन स्टेशन</label>
							<input type='text' list='astation0' style='text-transform:uppercase' name='astn0' id='astn0' placeholder='select Station' val="0" class="form-control arrivalstn">
									 <datalist id='astation0'>
									 <?php
			                  			$sql = "SELECT stationdesc FROM station";
			                  			$query = mysql_query($sql);
			                  			 while($row = mysql_fetch_array($query)){
			                  				echo "<option value='".$row['stationdesc']."'>";
			                  			}
			                  			?>
		          					</datalist>
						</div>
					</td>
					
					<td>
						<div class="form-group">
							<label class="control-label">Distance <br> दुरी</label>
							<input type="text" class="form-control"  name="distance0" id="distance0" placeholder="Distance" val="0">
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label">Percentage <br> प्रतिशत</label>
							<input type="text" class="form-control changeper"  name="per0" id="per0" placeholder="Percentage" readonly  onkeyup="this.value=this.value.replace(/[^\d]/,'')" val="0">
						</div>
					</td>
					<td>
						<div class="form-group">
							<label class="control-label">Amount <br> राशि</label>
							<input type="text" class="form-control" name="amt0" id="amt0" placeholder="Amount"  readonly onkeyup="this.value=this.value.replace(/[^\d]/,'')" val="0">
						</div>
					</td>
				</tr>
				
				</tbody>
				</table>
			</div>
			<div class="objcttextarea objcttextarea-fullwidth">
				<div class="form-group">
				    <label class="control-label">Objective उद्देश्य</label>
					<textarea class="" name="object" id="object" rows="2" required></textarea>
				</div>
					<input type="hidden" name="sr" id="sr" value='0'>
					<input type="hidden" name="sr1" id="sr1" value='0'>
					<input type="hidden" name="nr" id="nr" value='0'>	
			</div>
		</div>
	</div>

	<div class="row">
		<div class="">
			<div class="text-left col-md-6 col-xs-6">
				<button type="button" class="btn yellow addrowbtn addbtn">पंक्ति जोड़े / Add Row <i class="fa fa-plus"></i></button>
				<button type="button" class="btn red removerowbtn addbtn">पंक्ति निकालें / Remove Row <i class="fa fa-minus"></i></button>
			</div>
			<div class="text-right col-md-6 col-xs-6">
				<button type="submit" name="submit"  id="submit" class="btn green savebtn" style="display: none;">जमा करें / Submit</button>
			</div>
		</div>
	</div>			
</div> 
</form>			
						

				</div>
			</div>
		</div>
	</div>
<?php
	include 'common/footer.php';
?>

<script type="text/javascript">


    $(document).on("click",".removerowbtn",function(){
    	var sr=$("#sr1").val();
    	console.log(sr);
    	if(sr != 0){
    		$("#new_row").children().last().remove();
	    	sr--;
	    	$("#sr1").val(sr);
	    	$("#atime"+sr+"").focus();
	    	console.log(sr);
    	}

    });

	$(document).on("blur",".changedtime",function(){
		var val=$(this).attr("val");
		$("#atime"+val+"").focus();
	});

	$(document).on("change",".j_type",function(){
		var val=$(this).val();
		// alert(val);
		if(val == 2)
		{
			$("#cardpass").removeAttr("required");
		}
		else
		{
			$("#cardpass").attr("required", "true");
		}
	});

	$(".addrowbtn").on("click",function(){
		var data='';
		var sr=$("#sr1").val();
		var prevdate=$("#date"+sr).val();
		sr++;

		data+='<tr class="odd gradeX"><td style="width: 10%"><div class="form-group">						    <label class="control-label">Date <br> दिनांक </label><div class="">								<input class="form-control datepicker" type="text" value='+prevdate+' name="date'+sr+'" id="date'+sr+'" val='+sr+' placeholder ="dd/mm/yyyy"></div></div></td><td style="width: 10%"><div class="form-group">			<label class="control-label">Journey Type <br> यात्रा का प्रकार</label><div class="">				   <select class="form-control j_type" name="type'+sr+'" id="type'+sr+'" val='+sr+'>		<option value="0" selected disabled>Select...</option><?php $query1="SELECT * FROM `journey_type_master`"; $sql1=mysql_query($query1);while ($row1 = mysql_fetch_array($sql1)) {echo '<option value='.$row1['id'].' >'.$row1['journey_type'].'  </option>';}?>
			</select></div></div></td><td style="width: 10%"><div class="form-group"><label class="control-label">Train No. <br> गाडी नं.</label><input type="text" class="form-control val train_no" placeholder="Train No." name="trainno'+sr+'" id="trainno'+sr+'" val='+sr+'></div></td> <td style="width: 10%"><div class="form-group"><label class="control-label">Other <br> अन्य	</label><div class=""><select class="form-control purpose" val='+sr+' name="other'+sr+'" id="other'+sr+'">	<option value="0" selected disabled>Select...</option> <?php $query2="SELECT * FROM `journey_purpose_master`"; $sql2=mysql_query($query2);while ($row2 = mysql_fetch_array($sql2)) {echo '<option value='.$row2['id'].' >'.$row2['journey_purpose'].'  </option>';}?>	</select></div></div></td>      <td style="width: 8%"><div class="form-group"> <label class="control-label">Depart Time <br> प्रस्थान समय </label>   <input type="text" name="dtime'+sr+'" val='+sr+' id="dtime'+sr+'" class="form-control changedtime timevalue" placeholder="hh:mm"></div></td>       <td style="width: 8%"><div class="form-group"><label class="control-label">Arri. Time <br> आगमन समय </label><input type="text" class="form-control ta_calculation time_val timevalue"  name="atime'+sr+'" val='+sr+' id="atime'+sr+'"  placeholder="hh:mm"></div></td>    <td style="width: 12%"><div class="form-group">	  <label class="control-label">Depart Station <br> प्रस्थान स्टेशन</label>	<input type="text" list="dstation'+sr+'" style="text-transform:uppercase" name="dstn'+sr+'" id="dstn'+sr+'" placeholder="select Station" val='+sr+' class="departClass form-control"><datalist id="dstation'+sr+'">';
		data+="<?php
          			$sql = "SELECT stationdesc FROM station";
          			$query = mysql_query($sql);
          			 while($row = mysql_fetch_array($query)){
          				echo "<option value='".$row['stationdesc']."'>";
          			}
          			?>";
		data+='</datalist> </div></td><td style="width: 12%"><div class="form-group"><label class="control-label">Arri. Station <br> आगमन स्टेशन</label><input type="text" list="astation'+sr+'" style="text-transform:uppercase" name="astn'+sr+'" id="astn'+sr+'" placeholder="select Station" val='+sr+' class="form-control arrivalstn"><datalist id="astation'+sr+'">';
		data+="<?php
          			$sql = "SELECT stationdesc FROM station";
          			$query = mysql_query($sql);
          			 while($row = mysql_fetch_array($query)){
          				echo "<option value='".$row['stationdesc']."'>";
          			}
          			?>";
		data+='</datalist></div></td><td><div class="form-group">				<label class="control-label">Distance <br> दुरी</label><input type="text" class="form-control"  name="distance'+sr+'" id="distance'+sr+'" placeholder="Distance" val='+sr+'></div></td><td>		 <div class="form-group"><label class="control-label">Percentage <br> प्रतिशत</label>				<input type="text" class="form-control changeper"  name="per'+sr+'" id="per'+sr+'" placeholder="Percentage" readonly val='+sr+'></div></td><td><div class="form-group"><label class="control-label">Amount <br> राशि</label>	<input type="text" class="form-control" name="amt'+sr+'" id="amt'+sr+'" placeholder="Amount"  readonly val='+sr+'></div></td></tr>';

		  
			$("#new_row").append(data);
				$("#sr1").val(sr);
			    $( ".datepicker" ).datepicker({
     				dateFormat: "dd/mm/yy",  
			     //maxDate: "19/04/2019", 
			     changeYear: true,
			     changeMonth:true,
			   });
	});



	$(document).on("change",".purpose",function(){
		var sr=$(this).attr("val");
		// alert(sr);
		var jtype=$("#other"+sr).val();
		// alert(jtype);
		if(jtype == 5){
			$("#per"+sr).removeAttr('readonly');
		}
		else
		{
			$("#per"+sr).attr('readonly','readonly');
		}
	});

	$(document).on("blur",".changeper",function(){
		var val=$(this).attr('val');		
		var jtype=$("#other"+val).val();
		// alert("val "+val);

		if(jtype == 5)
		{
			// alert(jtype);
			var date=$("#date"+val).val();
			var amount=900;
			var amount=$("#u_amount").val();
			var per=0;
			var prev_cnt=(val-1);
			var prev_date=$("#date"+prev_cnt).val();
			var prev_per=$("#per"+prev_cnt).val();

			//alert(val);

			//alert("Training");

			per =$("#per"+val).val();
			if(prev_per != null)
			{
				var sum=parseInt(prev_per) + parseInt(per);
				// alert(sum);
				// alert(val);
				$("#per"+val).val(sum);
				if(sum <=100){
					taamount=(amount * (sum / 100 ));
					$("#amt"+val+"").val(taamount);
					removePrevValues1(date,val);
				}
				else
				{
					alert('Percentage going more than 100');
				}
			}
			else if(per <=100)
			{
				taamount=(amount * (per / 100 ));
				$("#amt"+val+"").val(taamount);

				removePrevValues1(date,val);
			}
			else
			{
				alert('Percentage going more than 100');
			}

		}
			

	});

  
    $(document).on("blur",".ta_calculation",function(){
		var val=$(this).attr('val');
		var date=$("#date"+val).val();
		var dtime=$("#dtime"+val).val();
		var atime=$("#atime"+val).val();
		var date1, dtime1, atime1;
		// var amount=900;
		var amount=$("#u_amount").val();
			// alert(amount);
		var taamount=0;
		var prev_cnt=(val-1);
		var prev_date=$("#date"+prev_cnt).val();
		var	prev_dtime=$("#dtime"+prev_cnt).val();
		var	prev_atime=$("#atime"+prev_cnt).val();
		//alert("Cur date " +date+"Cur dtime "+ dtime+"Cur atime "+ atime);
		//alert("prev_date " +prev_date+"prev_dtime "+ prev_dtime+"prev_atime "+ prev_atime);
		var nr=$("#sr1").val();
		var nr1=$(this).attr('val');

		var per=0;
		var flag='0';

		var jtype=$("#other"+val).val();
		// alert(jtype);

		if(jtype == 1)
		{
			if(dtime=='')
			{
				debugger;
				val=(val-1);
				date1=$("#date"+val).val();
				dtime1=$("#dtime"+val).val();


				if(date1 != date)
				{
					for(var i=val; i > 0; i--)
					{

						console.log(flag);
						var x=i-1;
						//alert(x);
						var prev_date=$("#date"+x).val();
						var prev_dtime=$("#dtime"+x).val();
						if(prev_dtime == "")
						{
							prev_dtime="00:00";
						}
						if(atime == "")
						{
							atime="24:00";
						}
						//alert("Cur Date"+date+"Prev Date "+prev_date+'+'+prev_dtime);
						if(prev_date==date)
						{	
							c_time=time_calculate_1(prev_date,date,prev_dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100% "+prev_dtime+"="+date);
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
						}
						else if(prev_date != date)
						{
							flag='1';
							//alert("Flag");
							dtime="00:00";
							c_time=time_calculate(date,dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100%");
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
							
						}


					}
				}
				if(flag == '1'){
					//atime1="00:00";
					//val=(val-1);
					date1=$("#date"+val).val();
					dtime1=$("#dtime"+val).val();
					for(var s=val; s > 0; s--){
						// var x=s-1;
						var prev_date=$("#date"+s).val();
						var prev_dtime=$("#dtime"+s).val();
						if($("#date"+s).val() != date1)
						{
							 dtime1=prev_dtime;

						}
					}
				}
				else
				{
					atime1="23:59";
				}

				//if Curent Date
				c_time=time_calculate(date1,dtime1,atime1);
				if(c_time <= '06:00')
				{
					//alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					//alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					//alert("100%");
					per ="100%";
					taamount=amount;
					//alert(amount+' '+taamount);
				}
				// nr1=nr1-1;
				$("#per"+val+"").val(per);
				$("#amt"+val+"").val(taamount);

				// removePrevValues(date1,nr);

				if(prev_date != date && prev_date != null)
				{
					//alert("ATIME IS LESS");
					dtime1="00:00";
						//alert(prev_date+"_"+prev_dtime+"_"+atime1);
					c_time=time_calculate(prev_date,dtime1,atime);
					if(c_time <= '06:00')
					{
						//alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						//alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						//alert("100%");
						per ="100%";
						taamount=amount;
						//alert(amount+' '+taamount);
					}

					// var prev_nr=nr-1;	
						// nr=nr+1;
					//alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
					$("#per"+nr+"").val(per);
					$("#amt"+nr+"").val(taamount);

					// removePrevValues2(date,val);
				}	
				
			}
			else
			{	
				debugger;
				var prev=(val-1);
				var prev_jtype=$("#other"+prev).val();
				//alert("Cur Date"+date+"Prev Date "+prev_date);	
				if(prev_date==date)
				{
					debugger;
					for(var i=val; i > 0; i--)
					{

						console.log(flag);
						var x=i-1;
						//alert(x);
						var prev_date=$("#date"+x).val();
						var prev_dtime=$("#dtime"+x).val();
						if(prev_dtime == "")
						{
							prev_dtime="00:00";
						}
						if(atime == "")
						{
							atime="24:00";
						}
						//alert("Cur Date"+date+"Prev Date "+prev_date+'+'+prev_dtime);
						if(prev_date==date)
						{	
							c_time=time_calculate_1(prev_date,date,prev_dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100% "+prev_dtime+"="+date);
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
						}
						else if(prev_date != date)
						{
							flag='1';
							//alert("Flag");
							dtime="00:00";
							c_time=time_calculate(date,dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100%");
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
							
						}


					}
					$("#per"+nr1+"").val(per);
					$("#amt"+nr1+"").val(taamount);

					removePrevValues(date,nr1);	

					if(prev_date != date && prev_date != null)
					{
						// alert("ATIME IS LESS");
						atime1="23:59";

						//alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							//alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							//alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							//alert("100%");
							per ="100%";
							taamount=amount;
							//alert(amount+' '+taamount);
						}

						var prev_nr=nr-1;	
						// nr=nr+1;
						//alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues2(date,val);
					}	


				}
				else if(prev_date != date && prev_date != null && prev_jtype != 2)
				{
					debugger;
					//alert("NULL");
					dtime="00:00";
					if(atime==""){
						atime="23:59";
					}
					c_time=time_calculate(date,dtime,atime);
					if(c_time <= '06:00')
					{
						//alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						//alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						//alert("100%");
						per ="100%";
						taamount=amount;
						//alert(amount+' '+taamount);
					}
					
					$("#per"+nr+"").val(per);
					$("#amt"+nr+"").val(taamount);

					removePrevValues(date,nr);	
					
					if(prev_date != date && prev_date != null)
					{
					 	// alert("ATIME IS LESS");
						atime1="23:59";
						// alert(prev_date+"_"+prev_dtime+"_"+atime1);
  						// c_time=time_calculate(prev_date,prev_dtime,atime1);

						var prev=(val-1);
						var prev_jtype=$("#other"+prev).val();
						var prev_dtime1,prev_atime1,prev1;
						//alert("Cur Date"+date+"Prev Date "+prev_date);	
						for(var i=prev; i >0; i--)
						{
							prev1=$("#date"+(i-1)).val();
							prev_dtime1=$("#dtime"+i).val();
							prev_atime1=$("#atime"+i).val();
							if(prev_date != prev1)
							{
								prev_dtime=$("#dtime"+i).val();
							}		
							else
							{
								prev_dtime=$("#dtime"+i).val();
							}					
						}
  						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							//alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							//alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							//alert("100%");
							per ="100%";
							taamount=amount;
							//alert(amount+' '+taamount);
						}
						
						var prev_nr=nr-1;
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);
					}	
				}

				else
				{	
					//alert(flag);
					if(flag === '1'){
						dtime="00:00";
					}
					// // dtime="00:00";
					c_time=time_calculate(date,dtime,atime);
					if(c_time <= '06:00')
					{
						//alert("30%");
						per ="30%";
						taamount=(amount * 0.3);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '06:00' && c_time <= '12:00')
					{
						//alert("70%");
						per ="70%";
						taamount=(amount * 0.7);
						//alert(amount+' '+taamount);
					}
					else if(c_time > '12:00')
					{
						//alert("100%");
						per ="100%";
						taamount=amount;
						//alert(amount+' '+taamount);
					}
					
					$("#per"+nr1+"").val(per);
					$("#amt"+nr1+"").val(taamount);

					removePrevValues(date,nr1);	

					if(prev_date != date && prev_date != null)
					{
						//alert("ATIME IS LESS");
						atime1="23:59";

						//alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							//alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							//alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							//alert("100%");
							per ="100%";
							taamount=amount;
							//alert(amount+' '+taamount);
						}
						
						var prev_nr=nr-1;
						// nr=nr+1;
						//alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues2(date,val);
					}
				}		
			}
		}

		else if(jtype == 4)
		{
			//alert("Exam");	

			if(dtime=='')
			{
				//alert('exam dtime1=00:00');
				dtime1="00:00";

				//if Curent Date
				c_time=time_calculate(date,dtime1,atime);
				if(c_time <= '06:00')
				{
					//alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					//alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					//alert("100%");
					per ="100%";
					taamount=amount;
					//alert(amount+' '+taamount);
				}
				
				$("#per"+nr1+"").val(per);
				$("#amt"+nr1+"").val(taamount);				
			}
			else if(atime=='')
			{
				//alert('exam');
				atime1="23:59";

				c_time=time_calculate(date,dtime,atime1);
				if(c_time <= '06:00')
				{
					//alert("30%");
					per ="30%";
					taamount=(amount * 0.3);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '06:00' && c_time <= '12:00')
				{
					//alert("70%");
					per ="70%";
					taamount=(amount * 0.7);
					//alert(amount+' '+taamount);
				}
				else if(c_time > '12:00')
				{
					//alert("100%");
					per ="100%";
					taamount=amount;
					//alert(amount+' '+taamount);
				}
				
				$("#per"+nr1+"").val(per);
				$("#amt"+nr1+"").val(taamount);
				
			}
			else
			{
				// debugger;
				var prev=(val-1);
				var prev_jtype=$("#other"+prev).val();
				//alert("Cur Date"+date+"Prev Date "+prev_date);	
				if(prev_date==date)
				{
					debugger;
					for(var i=val; i > 0; i--)
					{

						console.log(flag);
						var x=i-1;
						//alert(x);
						var prev_date=$("#date"+x).val();
						var prev_dtime=$("#dtime"+x).val();
						if(prev_dtime == "")
						{
							prev_dtime="00:00";
						}
						if(atime == "")
						{
							atime="24:00";
						}
						//alert("Cur Date"+date+"Prev Date "+prev_date+'+'+prev_dtime);
						if(prev_date==date)
						{	
							c_time=time_calculate_1(prev_date,date,prev_dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100% "+prev_dtime+"="+date);
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
						}
						else if(prev_date != date)
						{
							flag='1';
							//alert("Flag");
							dtime="00:00";
							c_time=time_calculate(date,dtime,atime);
							if(c_time <= '06:00')
							{
								//alert("30%");
								per ="30%";
								taamount=(amount * 0.3);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '06:00' && c_time <= '12:00')
							{
								//alert("70%");
								per ="70%";
								taamount=(amount * 0.7);
								//alert(amount+' '+taamount);
							}
							else if(c_time > '12:00')
							{
								//alert("100%");
								per ="100%";
								taamount=amount;
								//alert(amount+' '+taamount);
							}
							
						}


					}
					$("#per"+nr1+"").val(per);
					$("#amt"+nr1+"").val(taamount);

					removePrevValues(date,nr1);	

					if(prev_date != date && prev_date != null)
					{
						// alert("ATIME IS LESS");
						atime1="23:59";

						//alert(prev_date+"_"+prev_dtime+"_"+atime1);
						c_time=time_calculate(prev_date,prev_dtime,atime1);
						if(c_time <= '06:00')
						{
							//alert("30%");
							per ="30%";
							taamount=(amount * 0.3);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '06:00' && c_time <= '12:00')
						{
							//alert("70%");
							per ="70%";
							taamount=(amount * 0.7);
							//alert(amount+' '+taamount);
						}
						else if(c_time > '12:00')
						{
							//alert("100%");
							per ="100%";
							taamount=amount;
							//alert(amount+' '+taamount);
						}

						var prev_nr=nr-1;	
						// nr=nr+1;
						//alert("2-PREV "+prev_date+"PREV"+prev_nr+"date"+date+" NR "+val);		
						$("#per"+prev_nr+"").val(per);
						$("#amt"+prev_nr+"").val(taamount);

						removePrevValues2(date,val);
					}	


				}
				
			}
// 			else
// 			{
// 				c_time=time_calculate(date,dtime,atime);
// 				if(c_time <= '06:00')
// 				{
// 					//alert("30%");
// 					per ="30%";
// 					taamount=(amount * 0.3);
// 					//alert(amount+' '+taamount);
// 				}
// 				else if(c_time > '06:00' && c_time <= '12:00')
// 				{
// 					//alert("70%");
// 					per ="70%";
// 					taamount=(amount * 0.7);
// 					//alert(amount+' '+taamount);
// 				}
// 				else if(c_time > '12:00')
// 				{
// 					//alert("100% "+prev_dtime+"="+date);
// 					per ="100%";
// 					taamount=amount;
// 					//alert(amount+' '+taamount);
// 				}

// 				var prev_cnt=(nr-1);
// 				// var prev_date=$("#date"+prev_cnt).val();
// 				var prev_per=$("#per"+prev_cnt).val();
// 				var prev_amt=$("#amt"+prev_cnt).val();
// 				if(per == "100%")
// 				{
// 					$("#per"+prev_cnt+"").val("");
// 					$("#amt"+prev_cnt+"").val("");

// 					$("#per"+nr1+"").val(per);	
// 					$("#amt"+nr1+"").val(taamount);
// 				}
// 				else
// 				{
// 					$("#per"+nr1+"").val(per);	
// 					$("#amt"+nr1+"").val(taamount);
// 				}
				
// 			}
						
		}

		else if(jtype == 3)
		{
			//alert("Break down");

			//alert("Cur Date"+date+"Prev Date "+prev_date);	
			if(prev_date==date)
			{		
				//alert("SAME DATE"+prev_cnt);
				$("#per"+prev_cnt+"").val("");
				$("#amt"+prev_cnt+"").val("");

			}
			
				per ="100%";
				taamount=amount;
				//alert(amount+' '+taamount);

				$("#per"+val+"").val(per);
				$("#amt"+val+"").val(taamount);
			
		}

		else if(jtype == 2)
		{
			//alert("Leave");

			var val=$(this).attr('val');
			// alert("val"+val);
			var date=$("#date"+val).val();
			// var amount=900;
			var amount=$("#u_amount").val();
			// alert(amount);
			var taamount=0;
			    
			taamount=0;
			per="0%";
			//alert(amount+' '+taamount);

			$("#per"+val+"").val(per);
			$("#amt"+val+"").val(taamount);

			
		}
		
		else if(jtype == 6)
		{
			//alert("Leave");

			var val=$(this).attr('val');
			// alert("val"+val);
			var date=$("#date"+val).val();
			// var amount=900;
			var amount=$("#u_amount").val();
			// alert(amount);
			var taamount=0;
			
			taamount=0;
			per="0%";
			//alert(amount+' '+taamount);

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
	
	function removePrevValues2(date,nr)
	{
		var val=nr-1;
		// alert(val);
		var per=$("#per"+val).val();
		// alert(date +" = "+per);
		$("#per"+val+"").val("");
		$("#amt"+val+"").val("");		
	}

	function time_calculate(date,dtime,atime)
	{
	      var parts=date.split("/");
		var date=parts[1]+"/"+parts[0]+"/"+parts[2];
		
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
	     var parts1=prev_date.split("/");
		var prev_date=parts1[1]+"/"+parts1[0]+"/"+parts1[2];

        var parts2=date.split("/");
		var date=parts2[1]+"/"+parts2[0]+"/"+parts2[2];
		
		var diff=(new Date(date+' '+atime) - new Date(prev_date+' '+prev_dtime)) / 1000 / 60;
		var hrs=Math.floor(diff / 60);
		var min=diff % 60;
		hrs=hrs < 10 ? '0' + hrs : hrs;
		min=min < 10 ? '0' + min : min;
		var totalminutes=hrs+':'+min;
		return totalminutes;
	}


</script>


<script>

	// Validation for selected month date
	function daysInMonth (month, year) {
    	return new Date(year, month, 0).getDate();
	}
	
	$(document).on("change","#month",function(){
		var monthdays = ["0","31", "28", "31", "30", "31", "30",
						  "31", "31", "30", "31", "30", "31"
						];
				var month = $(this).val()+'';
			// alert(month);
			var lengths = month.length;
			lengths = lengths - 1;
			var max_val = monthdays[month[lengths]];
			var beg_month = month[0];
			if(month[0]<=9)
				month[0] = "0"+month[0];
			var today = new Date();
			var year = today.getFullYear();
			var mon = today.getMonth();
			var beg_year = year;
			var temp_month = month.split(',');
			var new_month = temp_month;
			var restrict_date = year+"-"+temp_month[temp_month.length-1]+"-"+daysInMonth(temp_month[temp_month.length-1], year);
			
			var n_yr=restrict_date.substr(0, 4);
			var n_mon=restrict_date.substr(5, 1);
			if(n_mon!='n')
			var today11="01"+"/0"+n_mon+"/"+n_yr;
			 // alert(today11);
			$('#date0').val(today11);
			
			// $(".selectdate").attr('max', restrict_date);
			// $("#year").val(year);
			//$("#date0").attr('value',year+'-'+month+'-01');
			if(month=="")
				 $('#date0').val("");
		});


	// Train Validation
	 $(document).on("change", ".val", function(){
		var value=$(this).attr('val');
		//alert(value);
		var type = $("#type"+value).val();
		var trainno = $("#trainno"+value).val();
		//alert(type);
		if(type=='1')
		{	
		  var number_match = /^\d{5}$/;
		  //alert(trainno) ; 
		  if((trainno.match(number_match)))  
			{  
			  return true;  
			}  
		  else  
			{  
				alert("Train number must be integer and 5 digits");  
				$("#trainno"+value).val("");
				$("#trainno"+value).focus();
				return false;  
			}  
		}
		   //else{
		  // 		$("#trainno"+value).removeAttribute('maxLength');
		  // }
		});

	  // Arrival and Depart station validation
	$(document).on("change",".departClass",function(){
		var cnt=$(this).attr('val');
			for(var i=0; i<=cnt; i++){
				var prev_cnt=(+cnt)-i; 
				var arrivalS=$("#astn"+prev_cnt).val();
				var departS=$("#dstn"+cnt).val();
				var arravalStation=arrivalS.toUpperCase();
				var departStation=departS.toUpperCase();
				//alert(arrivalS+"   "+departS);
				//alert(arravalStation+"   "+departStation);
				if(arrivalS != ""){
					if(arravalStation!=departStation){
						alert('Arrival station and depart station must match');
						$("#dstn"+cnt).val("");
						$("#dstn"+cnt).focus();
						break;
					}
					else{
						if(arravalStation==departStation){
							break;
						}
					}
				}
		     }
		});
	// Depart time and arrival time vaidation
// 	$(document).on("blur", ".time_val", function(){
// 				var cnt=$(this).attr('val');
// 				var dpt_time=$("#dtime"+cnt).val();
// 				var arr_time=$("#atime"+cnt).val();
// 				// alert(dpt_time);
// 				// alert(arr_time);
// 				var prev_cnt=(+cnt)-1;
// 				var jtype=$("#other"+prev_cnt).val();
// 				if(jtype=="2"){
// 					prev_cnt=cnt;
// 				} 
// 				var prv_arr_time=$("#atime"+prev_cnt).val();
// 				var date = $("#date"+prev_cnt).val();
// 				 // alert(cnt);	  
// 				 // alert(prev_cnt);	  
// 				 //alert(cnt1);	
// 				if(prv_arr_time==''){
// 					   //alert('called right fun');
// 					var cnt1=(cnt);
// 					var date1 =$("#date"+cnt1).val();
// 					  // alert(date1);
// 					if(date!=date1){
// 					}
// 				}
// 				else{
// 			   if(dpt_time>=arr_time){
// 				alert('Arrival time must be greater than Depart time');
// 					$("#atime"+cnt).val("");
// 					$("#per"+cnt).val("");
// 					$("#amt"+cnt).val("");
// 					$("#atime"+cnt).focus();
// 					//alert(cnt);
// 					} 
// 				}
				 				
			
// 	});


$(document).on("change", ".arrivalstn", function(){
		var cnt=$(this).attr('val');
		var dptstn=$("#dstn0").val();
		var arrstn=$("#astn"+cnt).val();
		var dptstn1 = dptstn.toUpperCase();
		var arrstn1 = arrstn.toUpperCase();
	//	alert("DPT "+dptstn1+arrstn1);
		if(dptstn1 == arrstn1){
			$(".savebtn").show();
			$(".addbtn").hide();
		}else{
			$(".savebtn").hide();
			$(".addbtn").show();
		} 
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    var month=$("#user_month").val();
	    var year=$("#user_year").val();
        var new_date="01/"+month+"/"+year;
        //alert(new_date);
        $("#date0").val(new_date);
  $('.timevalue').mask('00:00');
});
</script>
<script>
  $( function() {
      
   // var mindate="01/01/2019";
    $( ".datepicker" ).datepicker({
     dateFormat: "dd/mm/yy",  
     //minDate: mindate,
     //maxDate: "19/04/2019", 
     changeYear: true,
     changeMonth:true,
    });
  });
  </script>