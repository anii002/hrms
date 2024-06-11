<?php
$GLOBALS['flag']="4.10";
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
						<a href="#">शिकायत जोड़ें / Add Grievance</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-book"></i>शिकायत जोड़ें / Add Grievance
					</div>
					
				</div>
				<div class="portlet-body form">
					<!-- BEGIN FORM-->
					<form action="control/adminProcess.php?action=addGrievance" method="post" enctype="multipart/form-data" autocomplete="off" class="horizontal-form">
						<input type="hidden" name="deptid" id="deptid" value="<?php echo $_SESSION['dept']; ?>" />
						<input type="hidden" id="curDate" name="curDate" value="<?php echo date('m/d/Y') ?>">
						<input type="hidden" id="txtpfno" name="txtpfno" value="<?php echo $_SESSION['empid'];  ?>">
						<div class="form-body">
							<!-- <h3 class="form-section">Add User</h3> -->
							<div class="row">

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">शीर्षक / Title</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-pencil-alt"></i>
										</span>
										<input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">विवरण / Description</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-edit"></i>
										</span>
										<textarea rows="2" class="form-control" id="description" name="description" placeholder="Enter Description" required></textarea>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">दस्तावेज़ संलग्न करें / Attach Document</label>
										<div class="input-group">
										<span class="input-group-addon">
										<i class="fas fa-file"></i>
										</span>
										<input type="file" class="form-control imagepdf" id="attach" name="attach" required>
										</div>
									</div>
								</div>
								<!--/span-->
							</div>
							<!--/row-->
							
						</div>
							<!--/row-->
							
						<div class="form-actions right">
							
							<button type="submit" class="btn blue submit_btn" id="submit_btn" name='button'><i class="fa fa-check"></i> प्रस्तुत करे / Submit</button>
						</div>
					</form>
					<!-- END FORM-->
				</div>
			</div>
			
			
				<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b>शिकायत सूची/ Grievance List </b>
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
											<th>अनु क्रमांक<br>ID</th>
            								<th>शीर्षक<br>Title</th>
            								<th>विवरण<br>Description</th>
            								<th>दस्तावेज़ संलग्न<br>Attached Doc</th>
            								<th>टीका<br>Remark</th>
            								<th>रचना दिनांक<br>Created Date</th>
            								<th>अद्यतन दिनांक<br>Updated Date</th>
            								<th>Status</th>
										</tr>										
									</thead>
									<tbody>
										<?php
											$query_emp = "SELECT `id`, `pfno`, `dept_id`, `title`, `description`, `image_path`, `remark`, `status`, `created_date`, `updated_date` FROM `grievance` WHERE  pfno ='".$_SESSION['empid']."' AND dept_id='".$_SESSION['dept']."' ";
                                          $result_emp = mysql_query($query_emp);
                                          $sr=1;
                                          while($value_emp = mysql_fetch_array($result_emp))
                                          {
                                            echo "
                                              <tr>
                                              <td>".$sr++."</td>
                                                <td>".$value_emp['title']."</td>
                                                <td>".$value_emp['description']."</td>
                                                <td><u><a style='color:orange;' href='control/upload_scanned_doc/".$value_emp['pfno']."/".$value_emp['image_path']."' target='_blank'>".$value_emp['image_path']."</a></u> </td>
                                                <td>".$value_emp['remark']."</td>
                                                <td>".$value_emp['created_date']."</td>
                                                <td>".$value_emp['updated_date']."</td>";
                            
                                                // echo "<td><u><a style='color:orange;' href='control/upload_scanned_doc/".$value_emp['pfno']."/".$value_emp['image_path']."' target='_blank'>".$value_emp['image_path']."</a></u> </td>";
                                                 
                                              
                                                if($value_emp['status']=='0')
                                                {
                                                  echo "<td style='color:orange;'>Pending</td>";
                                                }
                                                else
                                                {
                                                  echo "<td  style='color:red;'>Closed</td>";
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
    
    $(".imagepdf").on("change", function(){
		var ext = $(this).val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
			alert('Invalid file type!');
// 			$(this).val("");
		}
	});


	$(document).on("change","#attach",function(){
		var file=$("#attach").val();
// 		alert(file);
	});


  $(document).on("change","#cardpass",function(){
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