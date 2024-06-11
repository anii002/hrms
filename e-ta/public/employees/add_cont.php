<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>

  <div class="content-wrapper">
     <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        फुटकर बिल / Contingency Form
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
            
                  <form class="form-horizontal" name="TAForm" action="add_cont_ajax.php" method="post" enctype="multipart/form-data">
                <div class="tab-pane table-responsive" id="settings">
                	<div class="row">
                		<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			<div class="col-xs-8">
                				<div class="form-group">
                          <div class="col-md-6">
                              <label>For which allowances Claimed for</label>
                              <select class="form-control select2" multiple="multiple" data-placeholder="Select a Months" name="month[]" id="month" style="width: 80%;" required="required">
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
                          <div class="col-md-4">
                            <label>Year</label>
                          <select class="form-control select2" date-placeholder="Select Year" name="year" id="year" style="width: 100%" required="required">
                            <option disabled>Select Year</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                          </select>    
                          </div>
				                
                        
				              </div>
                      <div class="form-group">

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
								
								<th>From</th>
								<th>To</th>
								<th>K.M.S.</th>
								<th>Rate per KM</th>
								<th>Amount</th>
                  			</tr>
                  		</thead>
                  		<tbody>
							<tr>
								<td><input type="date" name="date[0]" class="form-control selectdate" id="date0" ></td>
								<td><input type="text" name="from[0]" class="form-control" id="from0"></td>
								<td><input type="text" name="to[0]" class="form-control" id="to0"></td>
								<td><input type="text" name="kms[0]" class="form-control kms" id="kms0" atr="0"></td>
								<td><input type="text" name="rate[0]" class="form-control rate" id="rate0" atr="0"></td>
								<td><input type="text" name="total[0]" class="form-control total" id="total0"></td>
							</tr>
                  		</tbody>
                  	</table>
                  	
                </div><br/>
                <div class="row">
                  		<div class="col-xs-12">
                  			<div class="col-md-9">
                  				&nbsp;
                  			</div>
                  			<div class="col-md-3 text-left">
                  				<span class="control-label"><b>Objective</b></span><br/>
                  				<textarea cols="30" rows="5" style="resize: none;" name="objective" id="objective"></textarea>
                  			</div>
                  		</div>
                  </div><br/>
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
    	if(n<10){
	        n='0'+n
	    } 
    	d = year+'-'+n+'-'+daysInMonth(temp_month, year);
    	//alert(n.length);
    	$(".selectdate").attr("max", d);
    	d = "1960-01-30";
    	$(".selectdate").attr("min", d);

	});
	function daysInMonth (month, year) {
    	return new Date(year, month, 0).getDate();
	}
</script>

<script type="text/javascript">
var cnt = 1;
		$("#add_row").on("click",function(){
		
			var markup = '<tr><td><input type="date" name="date['+cnt+']" class="form-control selectdate" id="date'+cnt+'"></td><td><input type="text" name="from['+cnt+']" class="form-control" id="from'+cnt+'"></td><td><input type="text" name="to['+cnt+']" class="form-control" id="to'+cnt+'"></td><td><input type="text" name="kms['+cnt+']" class="form-control kms" atr="'+cnt+'" id="kms'+cnt+'"></td><td><input type="text" name="rate['+cnt+']" atr="'+cnt+'" class="form-control rate" id="rate'+cnt+'"></td><td><input type="text" name="total['+cnt+']" class="form-control total" id="total'+cnt+'"></td></tr>';
			cnt = cnt+1;
	$("table tbody").append(markup);
		});
		
		$(document).on("change",".kms",function(){
			var id = $(this).attr('atr');
			var val1 = $(this).val();
			
			var val2 = $("#rate"+id).val();
			if(val1=="") val1=0;
			if(val2=="") val2=0;
			var sum = val1 * val2;
			$("#total"+id).val(sum);
		});
		$(document).on("change",".rate",function(){
			var id = $(this).attr('atr');
			var val1 = $(this).val();
			var val2 = $("#kms"+id).val();

			//alert(val1 + " " +val2);
			if(val1=="") val1=0;
			if(val2=="") val2=0;
			var sum = val1 * val2;
			$("#total"+id).val(sum);
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
</script>
