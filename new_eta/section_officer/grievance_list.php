<?php
$GLOBALS['flag']="5.1";
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
						<a href="#">शिकायत सूची / Grievance List</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
		   	<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>शिकायत सूची / Grievance List</b>
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
											<th>अनु क्रमांक / <br> ID</th>
            				              	<th>कर्मचारी  आईडी  / <br> Empid</th>
            								<th>शीर्षक / <br> Title</th>
            								<th>विवरण / <br> Description</th>
            								<th>दस्तावेज़ संलग्न / <br> Attached Doc</th>
            								<th>रचना दिनांक / <br> Created Date</th>
            								<th>टीका / <br> Remark</th>
            								<th>कार्य  / <br> Action</thh>
										</tr>										
									</thead>
									<tbody>
										<?php
											$query_emp = "SELECT `id`, `pfno`, `dept_id`, `title`, `description`, `image_path`, `remark`, `status`, `created_date`, `updated_date` FROM `grievance` WHERE  dept_id='".$_SESSION['dept']."'";
                                            $result_emp = mysqli_query($conn,$query_emp);
                                            $sr=1;
                                            while($value_emp = mysqli_fetch_array($result_emp))
                                            {
                                                echo "
                                                  <tr>
                                                  <td> ".$sr++."</td>
                                                    <td>".$value_emp['pfno']."</td>
                                                    <td>".$value_emp['title']."</td>
                                                    <td>".$value_emp['description']."</td>
                                                    <td><u><a style='color:orange;' href='../personnel_employees/control/upload_scanned_doc/".$value_emp['pfno']."/".$value_emp['image_path']."' target='_blank'>".$value_emp['image_path']."</a></u> </td>
                                                    <td>".$value_emp['created_date']."</td>";
                                                    
                                
                                                    if($value_emp['status'] == '0')
                                                    {
                                                    	echo "<td><textarea rows='2' class='form-control' id='description_".$value_emp['id']."' name='description' placeholder='".$value_emp['remark']."' required></textarea></td>";
                                                    	echo "<td><a id='".$value_emp['id']."' class='btn btn-primary action_btn'>Submit</a></td>";
                                                    }
                                                    else
                                                    {
                                                    	echo "<td><textarea rows='2' class='form-control' id='description_".$value_emp['id']."' name='description' placeholder='".$value_emp['remark']."' readonly></textarea></td>";
                                                    	echo "<td><a class='btn btn-danger'>Closed</a></td>";
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

<script type="text/javascript">


  $(document).on("click",".action_btn",function(){
  		// var id=$("#gid").val();
  		var id=$(this).attr('id');
  		var description=$("#description_"+id).val();
  		// alert(id+description);

  		$.ajax({
			type:"post",
			url:"control/adminProcess.php",
			data:{action: 'updateGrievance', id : id,description : description},
			success:function(data){
				// alert(data);
				if(data=="1"){
					alert("Updated success..."); window.location='grievance_list.php';
				}
				else{
					alert("Failed...");
				}
			}
		});
  });

$(document).on("change","#title",function(){
      var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
      if(newVal == '')
          $("#title").focus();  
        $(this).val(newVal);
  });


  $(document).on("change","#description",function(){
      var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
      if(newVal == '')
          $("#description").focus();  
        $(this).val(newVal);
  });

</script>