<?php
	$GLOBALS['flag']="5.11";
	include('common/header.php');
	include('common/sidebar.php');
	function get_sum_department($id)
    {
      $query = "SELECT `DEPTDESC` FROM `department` WHERE `DEPTNO`='".$id."' ";
      $result = mysql_query($query);
      $value = mysql_fetch_array($result);
      return $value['DEPTDESC'];
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
						<a href="#">प्रत्याशित सारांश रिपोर्ट / Vetted Summary Report</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
		<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption col-md-6">
						<b> प्रत्याशित सारांश रिपोर्ट / Vetted Summary Report</b>
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
										    <th>ID</th>
            								<th>Title</th>
            								<th>Description</th>
            								<th>Action</th>	
										</tr>										
									</thead>
									<tbody>
									   <?php
                                            $query = "SELECT * FROM `master_summary_cont` WHERE forward_status='1' AND pa_status = '1' AND estcrk_status='0' AND dept_id != '01' ";
        									$cnt=1;
        									$result = mysql_query($query);
        									$emp_bu=array();
        								    $cnt_bu=0;
        									while($val = mysql_fetch_array($result))
        									{
        									    $sql1 = "SELECT * from continjency_master,employees where continjency_master.empid=employees.pfno AND continjency_master.is_rejected='0' AND continjency_master.summary_id='" . $val['summary_id'] . "' AND continjency_master.generate='1'";
                                                        $res1 = mysql_query($sql1);
                                                        $data = 0;
                                                while ($val1 = mysql_fetch_array($res1)) {
                                                    
                                                    if ($data == 0) {
                                                        if ($val['title'] != null) {
                                                            echo "
        											<tr>
        												<td>$cnt</td>
        												<td>" . $val['title'] . "</td>
        												<td>" . $val['description'] . "</td>
        												<td><a href='cont_summary_report_details.php?id=" . $val['id'] . "&sum_id=" . $val['summary_id'] . "' class='btn btn-primary'>Show</a>";
                                                            echo "</tr>";
                                                            $cnt++;
                                                        }
                                                        $data++;
                                                    }
                                                }
        									   
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
?><script type="text/javascript">
$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );


</script>