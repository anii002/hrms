<?php
	require_once("../../global/header.php");
	require_once("../../global/topbar.php");
	require_once("../../global/sidebar.php");
?>
<div class="content-wrapper">
    <section class="content-header" style="background-color:#5be439; padding-left:20px;padding-bottom:10px;">
	  <span style="font-size:20px;font-weight:bold;" class="col-sm-8">
        contigency form
      </span>
	  <span class="text-right col-sm-4">
	  <button class="btn btn-danger" onclick="history.go(-1);">Back</button>
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
                  			<?php 
                  				$query = mysql_query("select * from continjency where cid in(select id from continjency_master where reference='".$_REQUEST['claim']."' and set_number='".$_REQUEST['set']."')");
                  				$cnt =0;
                  				while($result = mysql_fetch_array($query))
                  				{
                  			?>
								<tr>
									<td><input type="date" name="date[<?= $cnt ?>]" value="<?= $result['cntdate'] ?>" class="form-control" id="date<?= $cnt ?>" required></td>
									<td><input type="text" value="<?= $result['cntfrom'] ?>" name="from[<?= $cnt ?>]" class="form-control" id="from<?= $cnt ?>" required></td>
									<td><input type="text" value="<?= $result['cntTo'] ?>" name="to[<?= $cnt ?>]" class="form-control" id="to<?= $cnt ?>" required></td>
									<td><input type="text" value="<?= $result['kms'] ?>" name="kms[<?= $cnt ?>]" class="form-control kms" id="kms<?= $cnt ?>" atr="<?= $cnt ?>" required></td>
									<td><input type="text" value="<?= $result['rate_per_km'] ?>" name="rate[<?= $cnt ?>]" class="form-control rate" id="rate<?= $cnt ?>" atr="<?= $cnt ?>" required></td>
									<td><input type="text" value="<?= $result['total_amount'] ?>" name="total[<?= $cnt ?>]" class="form-control total" id="total<?= $cnt ?>"></td>
								</tr>
							<?php
							$cnt++;
								}
						?>
                  		</tbody>
                  	</table>
                  	</div>
                </div>
                <div class="row">
                  		<div class="col-xs-12">
                  			<input type="submit" value="update" name="button" id="submit_btn" class="btn btn-primary" style="float:right;">
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
var cnt = <?= $cnt ?>;
		$("#add_row").on("click",function(){
		
			var markup = '<tr><td><input type="date" name="date['+cnt+']" class="form-control" id="date'+cnt+'"></td><td><input type="text" name="from['+cnt+']" class="form-control" id="from'+cnt+'"></td><td><input type="text" name="to['+cnt+']" class="form-control" id="to'+cnt+'"></td><td><input type="text" name="kms['+cnt+']" class="form-control kms" atr="'+cnt+'" id="kms'+cnt+'"></td><td><input type="text" name="rate['+cnt+']" atr="'+cnt+'" class="form-control rate" id="rate'+cnt+'"></td><td><input type="text" name="total['+cnt+']" class="form-control total" id="total'+cnt+'"></td></tr>';
			cnt = cnt+1;
	$("table tbody").append(markup);
		});
		
		$(document).on("change",".kms",function(){
			var id = $(this).attr('atr');
			var val1 = $(this).val();
			alert(id);
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