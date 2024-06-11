<?php
$GLOBALS['flag']="4.3";
include('common/header.php');
include('common/sidebar.php');
include('control/function.php');
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
						<a href="#">कर्मचारी को सत्यापित करें / Verify Employee</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>कर्मचारी को सत्यापित करें / Verify Employee</b>
					</div>
					<div class="caption col-md-6 text-right backbtn">
						<a href="#."></a>
					</div>
				</div>
				<div class="portlet-body form">
						
	<form method="POST">										
		<div class="form-body add-train">
			<div class="row add-train-title">
				<div class="col-md-12">
					<div class="form-group">
						<!-- <label class="control-label"><h4 class="">Statement Showing the summery of TA & Contingency Bills For the Month of September-2018 </h4></label> -->
						<div class="portlet-body">
								<div class="table-scrollable summary-table">
								<table id="example1" class="table table-hover table-bordered display">
									<thead>
										<tr class="warning">
									    	<th>अनु क्रमांक / ID</th>
    					                    <th>कर्मचारी  आईडी  / Empid</th>
    					                    <th>नाम / Name</th>
        					                <th>मोबाइल / Mobile</th>
        					                <th>कार्रवाई / Action</th>
										</tr>										
									</thead>
									<tbody>
										<?php
											$dep=$_SESSION['dept'];            				
        				                    $result_emp = mysql_query("SELECT `id`,`pfno`, `name`, `desig`,`station`, `mobile`, `email`,`dept`, `depot_id`,`status` FROM `employees` WHERE dept='".$dep."' AND status='0' ORDER BY id desc");
        				                    // $result_emp = mysql_query("SELECT `id`,`pfno`, `name`, `desig`,`station`, `mobile`, `email`,`dept`, `depot_id`,`status` FROM `employees` WHERE dept='".$dep."' AND BU='' AND unit=''  ORDER BY id desc");
            				            
            				                $sr=1;
            				                while($value_emp = mysql_fetch_array($result_emp))
            				                {
                				                echo "
                				                  <tr>
                				                  <td>".$sr++."</td>
                				                    <td>".$value_emp['pfno']."</td>
                				                    <td>".$value_emp['name']."</td>
                				                    <td>".$value_emp['mobile']."</td>				                    
                				                    <td>";
                				                    if($value_emp['status']=='0')
                				                    {
                				                      echo "<button value='".$value_emp['pfno']."' class='btn btn-warning activeUser' style='margin-left:10px;'>Active</button></td>";
                				                    }
                				                    else
                				                    {
                				                      echo "<button value='".$value_emp['pfno']."' class='btn btn-danger deactiveUser' style='margin-left:10px;'>Deactive</button></td>";
                				                    }
    				                            echo "</tr>";
        				                    }
										?>
									</tbody>
								</table>
							</div>
							<div class="text-right">
								<!-- <button class="btn yellow">Print</button> -->
							</div>
						</div>
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

<script>
    // $(document).on("change","#empid",function(){
    //   var value = $(this).val();
    //   $.ajax({
    //     url: 'control/adminProcess.php',
    //     type: 'POST',
    //     data: {action: 'fetchEmployee1', id : value},
    //   })
    //   .done(function(html) {
    //     var data = JSON.parse(html);
    //     $("#empid").val(data.empid);
    //     $("#empname").val(data.empname);
    //     $("#mobile").val(data.mobile);
    //     $("#design").val(data.designation);
    //     $("#email").val(data.email);
    //     $("#paylevel").val(data.level);
    //     var val = Math.floor(1000 + Math.random() * 9000);
    //     $("#psw").val(val);
    //     $("#username").val("USER_"+data.empid);
    //   });
      
    // });
    $(document).on("click",".activeUser",function(){
        var id = $(this).val();
        // alert(id);
        var result = confirm("Confirm!!! proceed for employee activation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'activeUser', id : id},
          })
          .done(function(html) {
              alert(html);
	           window.location="verify_emp.php";
          });
        }
    });
    $(document).on("click",".deactiveUser",function(){
        var id = $(this).val();
        // alert(id);
        var result = confirm("Confirm!!! proceed for employee deactivation?");
        if(result == true)
        {
            $.ajax({
            url: 'control/adminProcess.php',
            type: 'POST',
            data: {action: 'deactiveUser', id : id},
          })
          .done(function(html) {
                
              alert(html);
	           window.location="verify_emp.php";         
          });
        }
    });
</script>
