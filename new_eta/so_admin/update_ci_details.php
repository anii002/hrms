<?php
$GLOBALS['flag']="2.8";
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
						<a href="#">कर्मचारी के विवरण का अनुमोदन करें / Approve the Details of Employee</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="row">
				<div class="col-md-12">
					 <div class="portlet box blue">
				        <div class="portlet-title">
				          <div class="caption col-md-6">
				            <b>कर्मचारी के विवरण का अनुमोदन करें / Approve the Details of Employee</b>
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
						           
						            <div class="portlet-body">
						                <div class="table-scrollable summary-table">
						                <table id="example1" class="table table-hover table-bordered display">
						                  <thead>
						                        <tr  class="warning"> 
                    								<th>अनु क्रमांक<br>ID</th>
                    					              <th>कर्मचारी  आईडी <br>Empid</th>
                    					              <th>नाम<br>Name</th>
                    					              <th>मोबाइल<br>Mobile</th>
                    					              <th>कार्रवाई / Action</th>
                    							</tr>                
						                  </thead>
						                  <tbody>
                                    		<?php
                                                // echo $dep=getdepartment($_SESSION['dept']);
                                				$dep=$_SESSION['dept'];     
                                				$result_emp = mysqli_query($conn,"SELECT `id`,`pfno`, `name`, `desig`,`station`, `mobile`, `email`,`dept`, `depot_id`,`status` FROM `employees_update` WHERE dept='".$dep."' AND isupdated='1' AND CI_PF='".$_SESSION['empid']."' ORDER BY id desc limit 1");
                                	            
                                	              $sr=1;
                                	              while($value_emp = mysqli_fetch_array($result_emp))
                                	              {
                                	                echo "
                                	                  <tr>
                                	                  <td>".$sr++."</td>
                                	                    <td>".$value_emp['pfno']."</td>
                                	                    <td>".$value_emp['name']."</td>
                                	                    <td>".$value_emp['mobile']."</td>				                    
                                	                    <td><a  href='update_emp_approve.php?empid=".$value_emp['pfno']."&id=".$value_emp['id']." ' id='".$value_emp['id']."' value='".$value_emp['pfno']."' class='btn blue btn_action' case='view'>Show</a>";
                                
                                	                  echo "</td></tr>
                                	                ";
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
			
			
		</div>
	</div>


<?php
	include 'common/footer.php';
?>


<script>
    $(document).on("click",".btn_action",function(){
      var value = $(this).attr('id');
      // alert(value);
      $.ajax({
        url: 'control/adminProcess.php',
        type: 'POST',
        data: {action: 'fetchEmployeeUpdated', id : value},
      })
      .done(function(html) {
         // alert(html);
        var data = JSON.parse(html);
        $("#id").val(data.id);
        $("#txtpfno").val(data.pfno);
        $("#billunit").val(data.billunit);
        $("#panno").val(data.panno);
        $("#name").val(data.empname);
        $("#name1").text(data.empname);
        $("#designation_id").val(data.designation_id);
        $("#designation").val(data.designation);
        $("#station_id").val(data.station_id);
        $("#station").val(data.station);
        $("#mobile").val(data.mobile);
        $("#email").val(data.email);
        $("#catg").val(data.catg);
        $("#dept_id").val(data.dept_id);
        $("#dept").val(data.dept);
        $("#depot_id1").val(data.depot_id1);
        $("#depot").val(data.depot_id);
        $("#bp").val(data.bp);
        $("#gp").val(data.gp);
        $("#bdate").val(data.bdate);
        $("#apdate").val(data.apdate);
        $("#level").val(data.level);
      });
      
    });
</script>
