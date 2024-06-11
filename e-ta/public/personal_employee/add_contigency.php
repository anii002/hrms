<?php
	require_once("../../global/pemployee_header.php");
  require_once("../../global/pemployee_topbar.php");
  require_once("../../global/pemployee_sidebar.php");
?>
<div class="content-wrapper">
    <section class="content-header" style="background-color:#95e9a7; padding-left:20px;padding-bottom:10px;">
      <span class="col-sm-12">
        <span class="text-left" style="font-family: 'Raleway', sans-serif; font-weight: 600;">
        	Contingency Form
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
            
                  <form class="form-horizontal" name="TAForm" action="add_cont_process.php?setno=<?php echo $_REQUEST['set'];?>&refernce=<?php echo $_REQUEST['claim'] ?>" method="post" enctype="multipart/form-data">
                <div class="tab-pane table-responsive" id="settings">
                	<div class="row">
                		<div class="col-md-12">
                			<!--div class="col-xs-4">For which allowances Claimed for</div-->
                			
								<div class="col-xs-8">
									<!--<div class="form-group">
									  <select name="refernce" id="refernce" class="form-control" required>
										<option selected value="">Select Referencence</option>-->
									<?php 
										 // echo $query="select *from taentryform_master where empid='".$_SESSION['empid']."' AND set_number='".$_REQUEST['setnum']."'";
										// $fetch=mysql_query($query);
										// while($result=mysql_fetch_array($fetch))
										// {
											
										// }
										?>
								<!--</select>
									</div>-->
								</div>
								<div class="col-xs-4">
								<input type="button" value="Add Row" class="btn btn-info" style="float:right;" id="add_row">
							</div>
                		</div>
					</div>
						
							
					<div class="row">
							<div class="col-md-12">
						
                  <?php 
                  	$query_emp = "select * from employees where id = '".$_SESSION['id']."'";
                  	$result_emp = mysql_query($query_emp) or die(mysql_error());
                  	$value_emp = mysql_fetch_array($result_emp);
                  ?>
                  	<input type="hidden" name="empid" id="empid" value="<?php echo $value_emp['pfno'] ?>"/>
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
								<td><input type="date" name="date[0]" class="form-control" id="date0" required></td>
								<td><input type="text" name="from[0]" class="form-control" id="from0" required></td>
								<td><input type="text" name="to[0]" class="form-control" id="to0" required></td>
								<td><input type="text" name="kms[0]" class="form-control kms" id="kms0" atr="0" required></td>
								<td><input type="text" name="rate[0]" class="form-control rate" id="rate0" atr="0" required></td>
								<td><input type="text" name="total[0]" class="form-control total" id="total0"></td>
							</tr>
                  		</tbody>
                  	</table>
                  	</div>
                </div>
                <div class="row">
                  		<div class="col-xs-12">
                  			<input type="submit" value="Submit" name="button" id="submit_btn" class="btn btn-primary" style="float:right;">
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
var cnt = 1;
		$("#add_row").on("click",function(){
		
			var markup = '<tr><td><input type="date" name="date['+cnt+']" class="form-control" id="date'+cnt+'"></td><td><input type="text" name="from['+cnt+']" class="form-control" id="from'+cnt+'"></td><td><input type="text" name="to['+cnt+']" class="form-control" id="to'+cnt+'"></td><td><input type="text" name="kms['+cnt+']" class="form-control kms" atr="'+cnt+'" id="kms'+cnt+'"></td><td><input type="text" name="rate['+cnt+']" atr="'+cnt+'" class="form-control rate" id="rate'+cnt+'"></td><td><input type="text" name="total['+cnt+']" class="form-control total" id="total'+cnt+'"></td></tr>';
			cnt = cnt+1;
	$("table tbody").append(markup);
		});
		
		$(document).on("change",".kms",function(){
			var id = $(this).attr('atr');
			var val1 = $(this).val();
			//alert(id);
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
			if(val1=="") val1=0;
			if(val2=="") val2=0;
			var sum = val1 * val2;
			$("#total"+id).val(sum);
		});
		/*$(document).on("change","#month",function(){
			var months=$(this).val();
			//alert(months);
			
			$.ajax({
			type: "post",
			url: "control/adminProcess.php",
			data: { action: "get_reference",value: months}
			
			})
			.done(function(data){
				alert(data);
				$("#taForMonth").html(data);
			});
			
			
		
		});*/
</script>