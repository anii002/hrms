<?php
$GLOBALS['flag'] = "5.323";
include('common/header.php');
include('common/sidebar.php');
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    .billunitzindex{
        z-index: 1 !important;
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
                    <a href="#">यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form </a>
                </li>
            </ul>

        </div>
        <!-- <h1>ecefce</h1> -->
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-book"></i>यात्रा भत्ता प्रवेश फॉर्म / TA Entry Form
                </div>
            </div>
            <div class="portlet-body form">

                <form action="update_taprocess.php" autocomplete="off" method="POST">

                    <?php
                    // 	 $_SESSION['empid'];
                    $level_q = mysqli_query($conn,"SELECT LEVEL FROM `employees` where pfno='" . $_SESSION['empid'] . "' ");
                    $level_row = mysqli_fetch_array($level_q);

                    $lev = $level_row['LEVEL'];
                    $level_q1 = mysqli_query($conn,"SELECT amount from ta_amount WHERE min<='$lev' AND max>='$lev'");
                    $level_row1 = mysqli_fetch_array($level_q1);
                    echo mysqli_error($conn,);
                    $user_amount = $level_row1['amount'];

                    ?>
                <input type="hidden" name="u_ref_no" id="u_ref_no" value="<?php echo $_GET['ref_no'];?>" class="form-control" > 
                <input type="hidden" name="u_set_no" id="u_set_no" value="<?php echo $_GET['set_no'];?>" class="form-control" > 
                    <input type="hidden" name="u_amount" id="u_amount" value="<?php echo $user_amount; ?>" class="form-control">
                    <input type="hidden" name="u_pfno" id="u_pfno" value="<?php echo $_SESSION['empid']; ?>" class="form-control">

                    <div class="form-body add-train">
                        <div class="row add-train-title ">
                            <div class="col-md-4 billunitzindex">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h4 class="">For which allowances claimed for</h4>
                                    </label>
                                    <select class="form-control select2" name="month" id="month" data-placeholder="माह का चयन करे / Select a Months" required>
                                        <option value="00" selected disabled>माह का चयन करे / Select Month</option>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">
                                        <h4 class="">टोकन / कार्ड पास / Token / Card Pass</h4>
                                    </label>
                                    <input class="form-control" type="text" placeholder="Enter Token / Card Pass" name="cardpass" id="cardpass" required>
                                </div>
                            </div>

                        </div>

                        <div class="add-train">
                            <div class="portlet-body">
                                <div class="table-scrollable table-responsive">
                                    <table class="table table-bordered">
                                        <tbody id="new_row">

                                            

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
                                    <button type="button" class="btn red removerowbtn addbtn">पंक्ति निकालें / Remove
                                        Row <i class="fa fa-minus"></i></button>
                                </div>
                                <div class="text-right col-md-6 col-xs-6">
                                    <button type="submit" name="submit" id="submit" class="btn green savebtn" style="display: none;">जमा करें / Submit</button>
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
<!-- <link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        var ref_no=$("#u_ref_no").val();
        var set_no=$("#u_set_no").val();
        // console.log(ref_no);
        $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'getTAData', ref_no : ref_no, set_no : set_no},
        })
       .done(function(data) 
       {
            // console.log(data);
            var data=JSON.parse(data);
            // console.log(data.j_type);

            $("#new_row").append(data['ta_data']);
            $("#sr1").val(data['sr1']-1);
            $("#object").html(data['objective']);
            $("#month").val(data['ta_month']).trigger("change");
            var month=(data['ta_month']);
            $("#month").attr('disabled', 'disabled');
            $("#cardpass").val(data['cardpass']);

            $(".datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                maxDate: maxdate,
                minDate: mindate,
                changeYear: true,
                changeMonth: true,
            });
            load_data();
            load_stations();
            data.j_type.forEach(function (value, i) {
                // console.log('%d: %s', i, value);
                $("#type"+i).val(value).trigger("change");
            });

            data.j_pur.forEach(function (value, i) {
                // console.log('%d: %s', i, value);
                $("#other"+i).val(value).trigger("change");
            });
            // load_j_type();
        });
        
    });

    function load_stations()
    {
        $.post('control/adminProcess.php',
        {
            action:'get_stations'
        },
          function(data, status){
            // console.log(data);
            var Res=JSON.parse(data);
         
            $(".departClass").autocomplete({
              source: Res.stations
            });
            $(".arrivalstn").autocomplete({
              source: Res.stations
            });
        });
    }


    $(document).on("change", ".dtime_validation", function() {
        var cnt = $(this).attr('val');
        var dtime = $("#dtime" + cnt).val();
        console.log(cnt + dtime)
        if (dtime > "24:00" || dtime <= "00:00")
            console.log("Please Enter Valid time");
    });

    $(document).on("change", "#cardpass", function() {
        var newVal = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
        if (newVal == '')
            $("#cardpass").focus();
        $(this).val(newVal);
    });

    $(document).on("change", "#month", function() {
        // debugger;
        var month = $(this).val();
        var u_pfno = $("#u_pfno").val();

        $.ajax({
            type: "post",
            url: "control/adminProcess.php",
            data: "action=check_date&month=" + month + "&u_pfno=" + u_pfno,
            success: function(data) {
                //   console.log(data);
                if (data == 'claimed') {
                    alert("You are alreday calimed TA for these " + month + " month");
                    window.location = 'index.php';
                } else if (data == 'saved') {
                    alert("You are alreday saved TA for this " + month +
                        " MONTH, Please fill TA from ADD MORE OPTION in Saved TA.");
                    window.location = 'unclaimed_details.php?ref_no=' + data;
                }
            }
        });   

        
        
        
    });

    $(document).on("click", ".removerowbtn", function() {
        var sr = $("#sr1").val();
        console.log(sr);
        if (sr != 0) {
            $("#new_row").children().last().remove();
            sr--;
            $("#sr1").val(sr);
            $("#atime" + sr + "").focus();
            console.log(sr);
        }

    });

    // $(document).on("blur", ".changedtime", function() {
    //     var val = $(this).attr("val");
    //     $("#atime" + val + "").focus();
    // });
    
    $(document).on("change",".changedtime",function(){
            var inputtxt = $(this).val();
            var val=$(this).attr("val");
            var phoneno = /^(0[0-9]|1[0-9]|2[0-3]|[0-9]):[0-5][0-9]$/; 
            if(inputtxt.match(phoneno)){  
                $("#atime"+val+"").focus();
            }  
              else{  
                alert("Enter Valid time");
                $(this).val("");                  
                $(this).focus();    
            }
    	});
    	
    $(document).on("change", ".j_type", function() {
        var val = $(this).val();
        // alert(val);
        if (val == 2) {
            $("#cardpass").removeAttr("required");
        } else {
            $("#cardpass").attr("required", "true");
        }
    });

    $(".addrowbtn").on("click", function() {
    var data = '';
    var sr = $("#sr1").val();
    var prevdate = $("#date" + sr).val();
    sr++;

    data += '<tr class="odd gradeX">';
    data += '<td style="width: 10%">';
    data += '<div class="form-group">';
    data += '<div class="">';
    data += '<input class="form-control datepicker" readonly type="text" name="date' + sr + '" id="date' + sr + '" val=' + sr + ' value=' + prevdate + ' placeholder="dd/mm/yyyy">';
    data += '</div>';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 10%">';
    data += '<div class="form-group">';
    data += '<div class="">';
    data += '<select class="form-control j_type" name="type' + sr + '" id="type' + sr + '" val=' + sr + '>';
    data += '<?php
                $query1 = "SELECT * FROM `journey_type_master`";
                $sql1 = mysqli_query($conn, $query1);
                while ($row1 = mysqli_fetch_array($sql1)) {
                    echo "<option value=\'" . $row1["id"] . "\'>" . $row1["journey_type"] . "</option>";
                }
            ?>';
    data += '</select>';
    data += '</div>';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 10%">';
    data += '<div class="form-group">';
    data += '<input type="text" class="form-control val train_no" placeholder="Train No." name="trainno' + sr + '" id="trainno' + sr + '" val=' + sr + '>';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 10%">';
    data += '<div class="form-group">';
    data += '<div class="">';
    data += '<select class="form-control purpose" val=' + sr + ' name="other' + sr + '" id="other' + sr + '">';
    data += '<?php
                $query2 = "SELECT * FROM `journey_purpose_master`";
                $sql2 = mysqli_query($conn, $query2);
                while ($row2 = mysqli_fetch_array($sql2)) {
                    echo "<option value=\'" . $row2["id"] . "\'>" . $row2["journey_purpose"] . "</option>";
                }
            ?>';
    data += '</select>';
    data += '</div>';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 8%">';
    data += '<div class="form-group">';
    data += '<input type="text" name="dtime' + sr + '" val=' + sr + ' id="dtime' + sr + '" class="form-control changedtime timevalue" placeholder="hh:mm">';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 8%">';
    data += '<div class="form-group">';
    data += '<input type="text" class="form-control ta_calculation time_val timevalue" name="atime' + sr + '" val=' + sr + ' id="atime' + sr + '" placeholder="hh:mm">';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 12%">';
    data += '<div class="form-group">';
    data += '<input type="text" list="dstation' + sr + '" style="text-transform:uppercase" name="dstn' + sr + '" id="dstn' + sr + '" placeholder="select Station" val=' + sr + ' class="departClass form-control">';
    data += '<datalist id="dstation' + sr + '">';
    data += '<?php
                $sql = "SELECT stationdesc FROM station";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value=\'" . $row["stationdesc"] . "\'>";
                }
            ?>';
    data += '</datalist>';
    data += '</div>';
    data += '</td>';
    
    data += '<td style="width: 12%">';
    data += '<div class="form-group">';
    data += '<input type="text" list="astation' + sr + '" style="text-transform:uppercase" name="astn' + sr + '" id="astn' + sr + '" placeholder="select Station" val=' + sr + ' class="form-control arrivalstn">';
    data += '<datalist id="astation' + sr + '">';
    data += '<?php
                $sql = "SELECT stationdesc FROM station";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    echo "<option value=\'" . $row["stationdesc"] . "\'>";
                }
            ?>';
    data += '</datalist>';
    data += '</div>';
    data += '</td>';
    
    data += '<td>';
    data += '<div class="form-group">';
    data += '<input type="text" class="form-control" name="distance' + sr + '" id="distance' + sr + '" placeholder="Distance" val=' + sr + '>';
    data += '</div>';
    data += '</td>';
    
    data += '<td>';
    data += '<div class="form-group">';
    data += '<input type="text" class="form-control changeper" name="per' + sr + '" id="per' + sr + '" placeholder="Percentage" readonly val=' + sr + '>';
    data += '</div>';
    data += '</td>';
    
    data += '<td>';
    data += '<div class="form-group">';
    data += '<input type="text" class="form-control" name="amt' + sr + '" id="amt' + sr + '" placeholder="Amount" readonly val=' + sr + '>';
    data += '</div>';
    data += '</td>';
    data += '</tr>';

    $("#new_row").append(data);
    $("#sr1").val(sr);

    $(".datepicker").datepicker({
        dateFormat: "dd/mm/yy",
        maxDate: maxdate,
        minDate: mindate,
        changeYear: true,
        changeMonth: true,
    });
});



    $(document).on("change", ".purpose", function() {
        var sr = $(this).attr("val");
        // alert(sr);
        var jtype = $("#other" + sr).val();
        // alert(jtype);
        if (jtype == 5) {
            $("#per" + sr).removeAttr('readonly');
        } else {
            $("#per" + sr).attr('readonly', 'readonly');
        }
    });

    $(document).on("blur", ".changeper", function() {
        var val = $(this).attr('val');
        var jtype = $("#other" + val).val();
        // alert("val "+val);

        if (jtype == 5) {
            // alert(jtype);
            var date = $("#date" + val).val();
            // var amount=900;
            var amount = $("#u_amount").val();
            //alert(amount);
            var taamount = 0;
            var per = 0;
            var prev_cnt = (val - 1);
            var prev_date = $("#date" + prev_cnt).val();
            var prev_per = $("#per" + prev_cnt).val();

            //alert(val);

            //alert("Training");

            per = $("#per" + val).val();
            if (prev_per != null) {
                var sum = parseInt(prev_per) + parseInt(per);
                // alert(sum);
                // alert(val);
                $("#per" + val).val(sum);
                if (sum <= 100) {
                    taamount = (amount * (sum / 100));
                    $("#amt" + val + "").val(taamount);
                    removePrevValues1(date, val);
                } else {
                    alert('Percentage going more than 100');
                }
            } else if (per <= 100) {
                taamount = (amount * (per / 100));
                $("#amt" + val + "").val(taamount);

                removePrevValues1(date, val);
            } else {
                alert('Percentage going more than 100');
            }

        }


    });



    $(document).on("blur",".ta_calculation",function(){
        var val=$(this).attr('val');
        var date=$("#date"+val).val();
        var dtime=$("#dtime"+val).val();
        var atime=$("#atime"+val).val();
        
        var ctr=0,ctr1=0;
    	var res=checkForm("atime"+val);
    	if(res == true)
    	{	
    		atime_sec =cal_sec(date,atime);
    		dtime_sec =cal_sec(date,dtime);
    		if(atime_sec < dtime_sec && atime != '') 
    		{
    			alert('Arrival Time should be greater than Depart Time');
    			$("#atime"+val).focus();
    			$("#atime"+val).val('');
    			ctr=1;
    		}
    	}
    	else if(res == false)
    	{
    		alert('Plesae enter valid time ELSE');
    		$("#atime"+val).val('');
    		$("#atime"+val).focus();
    		ctr=1;
    	}
    	if(ctr == 0)
		{

			var date1, dtime1, atime1;
    		// var amount=900;
    		var amount=$("#u_amount").val();
    			// alert(amount);
    			var taamount=0;
    			var prev_cnt=(val-1);
    			var prev_date=$("#date"+prev_cnt).val();
    			var	prev_dtime=$("#dtime"+prev_cnt).val();
    			var	prev_atime=$("#atime"+prev_cnt).val();
    		var	prev_per=$("#atime"+prev_cnt).val();
    			var nr=$("#sr1").val();
    			var nr1=$(this).attr('val');

    			var per=0;
    			var flag='0';

    			var jtype=$("#other"+val).val();
    		// alert(jtype);

    		if(jtype == 1)
    		{   
    			if(val == 0){
    				var prev=(val);
    				var prev_jtype=$("#other"+prev).val();    
    			}
    			else
    			{
    				var prev=(val-1);
    				var prev_jtype=$("#other"+prev).val();
    				var prev_per=$("#per"+prev).val();
    			}

    			if(dtime=='' && prev_jtype != 6)
    			{
    				// debugger;
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
    					for(var s=val; s >= 0; s--){
    						// var x=s-1;
    						var prev_date=$("#date"+s).val();
    						var prev_dtime=$("#dtime"+s).val();
    						var prev_atime=$("#atime"+s).val();
    						var s1=s-1;
    						if($("#date"+s).val() != date1)
    						{
    							dtime1=prev_dtime;

    						}
    						if($("#date"+s).val() == date1 && prev_atime == '' && $("#dtime"+s1).val() != '')
    						{
    							atime1='23:59';
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

    				if(flag == '1' && prev_per != '100%')
    				{
    					$("#per"+val+"").val(per);
    					$("#amt"+val+"").val(taamount);
    				}
    				

    				// removePrevValues(date1,nr);

    				if(prev_date != date && prev_date != null && prev_jtype != 6  && prev_jtype != 2)
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
    				// debugger;
    				var prev=(val-1);
    				var prev_jtype=$("#other"+prev).val();
    				//alert("Cur Date"+date+"Prev Date "+prev_date);	
    				if(prev_date==date)
    				{
    				// 	debugger;
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
    				else if(prev_date != date && prev_date != null && prev_jtype != 2  && prev_jtype != 6)
    				{
    				// 	debugger;
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

    						
    						for(var i=prev; i >=0; i--)
    						{
    							prev1=$("#date"+(i-1)).val();
    							prev_dtime1=$("#dtime"+i).val();
    							prev_atime1=$("#atime"+i).val();
    							prev_per=$("#per"+i).val();
    							if(prev_date != prev1 && prev_per != '100%')
    							{
    								prev_dtime=$("#dtime"+i).val();
    								if(prev_dtime == '' )
    								{
    									prev_dtime='00:00';
    									break;
    								}
    								break;
    							}	
    							else if(prev_date != prev1 && prev_per == '100%')
    							{
    								prev_dtime='00:00';
    								break;
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
    					if(atime === ''){
    						atime="23:59";
    					}
    					if(prev_jtype == '6')
    					{
    						dtime="00:00";
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
    					
    					$("#per"+nr1+"").val(per);
    					$("#amt"+nr1+"").val(taamount);
    					
    					if(prev_jtype != '6')
    						removePrevValues(date,nr1);	

    					if(prev_date != date && prev_date != null && prev_jtype != '6')
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
    						
    						if(prev_jtype != '6')
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
    				// 	debugger;
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

    		 	// debugger;
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

    				// removePrevValues2(date,val);
    			}				
    		}
    		
    		
    		else if(jtype == 6)
    		{
    			//alert("Leave");

    			var val=$(this).attr('val');
    			var val1=val-1;
    			// alert("val"+val);
    			var date=$("#date"+val).val();
    			// var amount=900;
    			var amount=$("#u_amount").val();
    			// alert(amount);
    			var taamount=0;
    			
    			var atime1='23:59';
    			//alert(amount+' '+taamount);
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

    			$("#per"+val1+"").val(per);
    			$("#amt"+val1+"").val(taamount);

    			taamount=0;
    			per="0%";
    			$("#per"+val+"").val(per);
    			$("#amt"+val+"").val(taamount);

    			
    		}
    		
    	}
    
    });


    function checkForm($container)
    {
        // regular expression to match required time format
        re = /^(\d{1,2}):(\d{2})([ap]m)?$/;
        var time_val=$("#"+$container).val();
        if(time_val != ''){
            if(regs = time_val.match(re)){
                if(regs[3]){
                    // 12-hour value between 1 and 12
                    if(regs[1] < 1 || regs[1] > 12) {
                        // alert("Invalid value for hours: " + regs[1]);
                        $("#"+$container).focus();
                        return false;
                    }
                } 
                else {
                    // 24-hour value between 0 and 23
                    if(regs[1] > 23) {
                        // alert("Invalid value for hours: " + regs[1]);
                        $("#"+$container).focus();
                        return false;
                    }
                }
                // minute value between 0 and 59
                if(regs[2] > 59) {
                  // alert("Invalid value for minutes: " + regs[2]);
                  $("#"+$container).focus();
                  return false;
                }
            } 
            else {
                // alert("Invalid time format: " + time_val);
                $("#"+$container).focus();
                return false;
            }
        }
        // alert("All input fields have been validated!");
        return true;
    }


    function cal_sec(date,atime)
	{
		var diff=(new Date(date+' '+atime)) / 1000 / 60;
		var sec=Math.floor(diff / 60);
		return sec;
	}

    function removePrevValues1(date, val) {
        var val = val - 1;
        var jtype = $("#other" + val).val();
        if (jtype == 5) {
            var prev_date = $("#date" + val).val();
            if (prev_date == date) {
                $("#per" + val + "").val("");
                $("#amt" + val + "").val("");
            }
        }
    }

    function removePrevValues(date, nr) {
        var val = nr - 1;
        var jtype = $("#other" + val).val();
        if (jtype != 5) {
            var prev_date = $("#date" + val).val();
            if (prev_date == date) {
                $("#per" + val + "").val("");
                $("#amt" + val + "").val("");
            }
        }

    }

    function removePrevValues2(date, nr) {
        var val = nr - 1;
        // alert(val);
        var per = $("#per" + val).val();
        // alert(date +" = "+per);
        $("#per" + val + "").val("");
        $("#amt" + val + "").val("");
    }

    function time_calculate(date, dtime, atime) {
        var parts = date.split("/");
        var date = parts[1] + "/" + parts[0] + "/" + parts[2];

        var diff = (new Date(date + ' ' + atime) - new Date(date + ' ' + dtime)) / 1000 / 60;
        var hrs = Math.floor(diff / 60);
        var min = diff % 60;
        hrs = hrs < 10 ? '0' + hrs : hrs;
        min = min < 10 ? '0' + min : min;
        var totalminutes = hrs + ':' + min;
        return totalminutes;
    }

    function time_calculate_1(prev_date, date, prev_dtime, atime) {
        var parts1 = prev_date.split("/");
        var prev_date = parts1[1] + "/" + parts1[0] + "/" + parts1[2];

        var parts2 = date.split("/");
        var date = parts2[1] + "/" + parts2[0] + "/" + parts2[2];
        //alert("Date "+date+"_ atime "+atime);
        //alert("Date "+prev_date+"_ dtime "+prev_dtime);
        //alert("Date1 "+new Date(date+' '+atime));
        //alert("Date2 "+new Date(prev_date+' '+prev_dtime));

        var diff = (new Date(date + ' ' + atime) - new Date(prev_date + ' ' + prev_dtime)) / 1000 / 60;
        var hrs = Math.floor(diff / 60);
        var min = diff % 60;
        hrs = hrs < 10 ? '0' + hrs : hrs;
        min = min < 10 ? '0' + min : min;
        var totalminutes = hrs + ':' + min;

        //alert("Diff "+diff+"_ Hrs:Min "+hrs+min+"_ TMin "+totalminutes);
        return totalminutes;
    }
</script>
<script>
   
    // Train Validation
    $(document).on("change", ".val", function() {
        var value = $(this).attr('val');
        //alert(value);
        var type = $("#type" + value).val();
        var trainno = $("#trainno" + value).val();
        //alert(type);
        if (type == '1') {
            var number_match = /^\d{5}$/;
            //alert(trainno) ; 
            if ((trainno.match(number_match))) {
                return true;
            } else {
                alert("Train number must be integer and 5 digits");
                $("#trainno" + value).val("");
                $("#trainno" + value).focus();
                return false;
            }
        }
        //else{
        // 		$("#trainno"+value).removeAttribute('maxLength');
        // }
    });

    // Arrival and Depart station validation
    $(document).on("change", ".departClass", function() {
        var cnt = $(this).attr('val');
        for (var i = 0; i <= cnt; i++) {
            var prev_cnt = (+cnt) - i;
            var arrivalS = $("#astn" + prev_cnt).val();
            var departS = $("#dstn" + cnt).val();
            var arravalStation = arrivalS.toUpperCase();
            var departStation = departS.toUpperCase();
            if (arrivalS != "") {
                if (arravalStation != departStation) {
                    alert('Arrival station and depart station must match');
                    $("#dstn" + cnt).val("");
                    $("#dstn" + cnt).focus();
                    break;
                } else {
                    if (arravalStation == departStation) {
                        break;
                    }
                }
            }
        }
    });
    

    $(document).on("change", ".arrivalstn", function() {
        var cnt = $(this).attr('val');
        var dptstn = $("#dstn0").val();
        var arrstn = $("#astn" + cnt).val();
        var dptstn1 = dptstn.toUpperCase();
        var arrstn1 = arrstn.toUpperCase();
        if (dptstn1 == arrstn1) {
            $(".savebtn").show();
            $(".addbtn").hide();
        } else {
            $(".savebtn").hide();
            $(".addbtn").show();
        }
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //$('#birth-date').mask('00/00/0000');
        $('.timevalue').mask('00:00');
    });
</script>

<script>
    
    var x = 60; //or whatever offset
    var CurrentDate = new Date();
    CurrentDate.setDate(CurrentDate.getDate() - x);
    var mon = CurrentDate.getMonth() + 1;
    var date = CurrentDate.getDate();
    var year = CurrentDate.getFullYear();
    var mindate='01'+"/"+mon+"/"+year;
    
    // max date
    var CurrentDate = new Date();
    CurrentDate.setDate(CurrentDate.getDate());
    var mon1 = CurrentDate.getMonth() + 1;
    var date1 = CurrentDate.getDate();
    var year1 = CurrentDate.getFullYear();
    var maxdate=date1+"/"+mon1+"/"+year1;

    var m_array=[];
    $("#month option").each(function()
    {
        m_array.push($(this).val());
    });

    // console.log(m_array);

    $("#month option").each(function()
    {
        // console.log($(this).val());
        var mth=$(this).val();
        if(mth < mon)
        {
            $(this).attr('disabled','disabled');
        }
    });

     

    $(document).on("change", "#month", function() {
        var month = $(this).val();
        var new_month = "01/" + month + "/2019";

        var dateval = $("#date0").val();
        if (dateval == '') {
            $("#date0").val(new_month);
        }

    });

    function load_data(){
        var cnt=$("#sr1").val();
        var dptstn=$("#dstn0").val();
        var arrstn=$("#astn"+cnt).val();
        var dptstn1 = dptstn.toUpperCase();
        var arrstn1 = arrstn.toUpperCase();
        if(dptstn1 == arrstn1){
            $(".savebtn").show();
            $(".addbtn").hide();
        }else{
            $(".savebtn").hide();
            $(".addbtn").show();
        } 
    }


    $(".datepicker").datepicker({
            dateFormat: "dd/mm/yy",
            minDate: mindate,
            maxDate: maxdate, 
            changeYear: true,
            changeMonth: true,
        });
</script>