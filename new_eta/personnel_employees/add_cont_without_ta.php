<?php
$GLOBALS['flag']="5.8";
include('common/header.php');
include('common/sidebar.php');
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
            			<a href="#">फुटकर बिल / Contingency Form</a>
            		</li>
            	</ul>
            	
            </div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i> फुटकर बिल / Contingency Form
					</div>
				</div>
				<div class="portlet-body form">
						
				<form  name="TAForm" action="add_cont_ajax_without_ta.php" method="post" enctype="multipart/form-data">										
					<?php 
                  	$query_emp = "select * from employees where id = '".$_SESSION['id']."'";
                  	$result_emp = mysqli_query($conn,$query_emp) or die(mysqli_error($conn));
                  	$value_emp = mysqli_fetch_array($result_emp);
                  ?>
                  	<input type="hidden" name="hide_count" id="hide_count" value="0"/>
                  	<input type="hidden" name="user_ref_no" id="user_ref_no" value="<?php echo $_GET['ref_no']; ?>">	
                  	<input type="hidden" name="empid" id="empid" value="<?php echo $value_emp['pfno'] ?>"/>
                  	<input type="hidden" name="levelTA" id="levelTA" value="<?php echo $value_emp['level'] ?>"/>
                  	<input type="hidden" name="year" id="year"/>
                  	<input type="hidden" name="set" id="set" value="1"/>


					 <div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-4 billunitzindex">
					<div class="form-group">
						<label class="control-label"><h4 class="">For which allowances claimed for</h4></label>
						
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
				</div>
				<div class="col-md-4 billunitzindex">
					<div class="form-group">
						<label class="control-label"><h4 class="">Year</h4></label>
						<select class="form-control select2" data-placeholder="Select a YEAR" name="year" id="year" style="width: 100%" required="required">
                            <option  selected>Select a Year</option> 
                        <?php 
                        $firstYear = (int)date('Y');
                        $lastYear = $firstYear - 5;
                            for($i=$firstYear;$i>=$lastYear;$i--)
                            {
                                echo '<option value='.$i.'>'.$i.'</option>';
                            }
                        ?>                                                      
                    </select>
					</div>
				</div>	
			</div>

			<hr class="colorgrey">

			<div class="row">
			<div class="col-md-12">
				<div class="box-border">
				<div class="" id="new_row">
					<div class="addrow-input">
						<div class="col-lg-2 col-xs-5">
							<div class="form-group">
								<label class="control-label">Date</label>
								<div class="">
									<input class="form-control datepicker_1" type="text" name="date0" id="date0" val='0' autocomplete="off"  placeholder="select date">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-7">
							<div class="form-group">
								<label class="control-label">From
								</label>
								<div class="">
									<input placeholder="Enter from" type="text" name="from0" val='0' id="from0" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-6">
							<div class="form-group">
								<label class="control-label">To</label>
								<input type="text" name="to0" placeholder="Enter to" id="to0" class="form-control" >
							</div>
						</div>
						<div class="col-md-2 col-xs-6">
							<div class="form-group">
								<label class="control-label">K.M.S.
								</label>
								<input type="text" name="kms0" placeholder="Enter k.m.s." val='0' id="kms0" class="form-control kms" placeholder="" atr="0">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Rate per KM</label>
								<input type="text" name="rate0"  val='0' id="rate0" placeholder="Enter rate" class="form-control rate" placeholder=""> 
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label class="control-label">Amount </label>
								<input type="text" name="total0" val='0' id="total0"  class="form-control total" placeholder="">
							</div>
						</div>
						
					</div>
				</div>
				</div> 
					
				  
				<div class="">
					<div class="objcttextarea objcttextarea-fullwidth">
						<div class="form-group">
							<label class="control-label">Objective उद्देश्य</label>
							<textarea class="" placeholder="Enter Objective" name="objective" id="objective" rows="2"></textarea>
						</div>
						<div>				

						
						
						<input type="hidden" name="sr" id="sr" value='0'>
						 
						 		
										
					</div>
					</div>
				</div>
				 
				<div class="form-actions text-left col-md-6">
					<button type="button" class="btn yellow addrowbtn">पंक्ति जोड़े / Add Row <i class="fa fa-plus"></i></button>
					<button type="button" class="btn red removerowbtn">पंक्ति निकालें / Remove Row <i class="fa fa-minus"></i></button>
				</div>
				<div class="form-actions text-right col-md-6">
					<button type="submit" name="submit_btn"  id="submit_btn" class="btn green">जमा करें / Submit</button>
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
	$(document).on('click','.addrowbtn',function(){
		//alert("dd");
		 var sr=$("#sr").val();
		 //alert(sr);
		 sr++;
		 $("#new_row").append('<div class="" id="new_row"><div class="addrow-input"><div class="col-lg-2 col-xs-5"><div class="form-group"><label class="control-label">Date </label>								<div class=""><input class="form-control selectdate" type="text" placeholder="select date" name="date'+sr+'" id="date'+sr+'" val="'+sr+'" autocomplete="off" ></div></div></div><div class="col-md-2 col-xs-7"><div class="form-group">								<label class="control-label">From</label><div class="">									<input placeholder="Enter from" type="text" name="from'+sr+'" val="'+sr+'" id="from'+sr+'" class="form-control" >								</div></div></div><div class="col-md-2 col-xs-6"><div class="form-group">								<label class="control-label">To</label><input type="text" placeholder="Enter to" name="to'+sr+'" id="to'+sr+'" class="form-control" ></div></div><div class="col-md-2 col-xs-6"><div class="form-group">								<label class="control-label">K.M.S.</label><input placeholder="Enter k.m.s" type="text" name="kms'+sr+'" val="'+sr+'" id="kms'+sr+'" class="form-control kms"  atr="'+sr+'"></div></div><div class="col-md-2">							<div class="form-group"><label class="control-label">Rate per KM</label>								<input type="text" name="rate'+sr+'" val="'+sr+'" id="rate'+sr+'" class="form-control rate" placeholder="Enter rate"> </div></div><div class="col-md-2"><div class="form-group"><label class="control-label">Amount </label><input type="text" name="total'+sr+'" val="'+sr+'" id="total'+sr+'" class="form-control total" placeholder=""></div></div></div></div>');

		 $("#sr").val(sr);
		 //alert(sr);

		$('.selectdate').datepicker({
		autoclose: true,
		format:'dd/mm/yyyy',
		});

		

	});
</script>
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
	
		$(document).on("change",".kms",function(){
			var id = $(this).attr('atr');
			var val1 = $(this).val();
			
			var val2 = $("#rate"+id).val();

			// if(val1=="") val1=0;
			// if(val2=="") val2=0;
			var sum = val1 * val2;
			$("#total"+id).val(sum);
		});
		
		$(document).on("change",".rate",function(){
			var id = $(this).attr('val');
			var val1 = $(this).val();
			var val2 = $("#kms"+id).val();

			//alert(val1 + " " +val2);
			// if(val1=="") val1=0;
			// if(val2=="") val2=0;
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
