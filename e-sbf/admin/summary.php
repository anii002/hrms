<?php

	$GLOBALS['flag']="1.7";
	require_once 'common/header.php';
	require_once 'common/sidebar.php';
	require_once '../dbconfig/dbcon.php';
	dbcon();
	$sql_sch = "SELECT id, scheme_name, scheme_title FROM tbl_master_form";
	$result_sch = mysql_query($sql_sch);

 ?>
<style type="text/css" media="screen">  
@media print {
  .btnhide {
    display : none !important;
	display : block;
  }
}
</style>
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<!-- BEGIN PAGE HEADER-->
		<h3 class="page-title">
		Summary
		</h3>
		<div class="page-bar">
			<ul class="page-breadcrumb">
				<li>
					<i class="fa fa-home"></i>
					<a href="index.php">Home / मुख पृष्ठ</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a href="summary.php">Submitted Forms / प्रस्तुत फॉर्म</a>
				</li>
			</ul>
			<div class="page-toolbar">
				<div id="" class="pull-right tooltips btn btn-fit-height grey-salt">
					<i class=""></i> <span><?php echo date('d-m-Y h:i A'); ?></span>
					
				</div>
			</div>
		</div>

		<div class="row" id="scheme_hide">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="form-group">
					<select class="form-control" name="scheme" id="scheme">
						<option value="none">Choose Scheme</option>
				<?php 
				while ($row_sch = mysql_fetch_assoc($result_sch)) { 
					extract($row_sch);
					?>		
		<option value="<?php echo $id; ?>" data-form-name="<?php echo $scheme_title; ?>"><?php echo $scheme_name; ?></option>
				<?php } ?>		
					</select>
				</div>
			</div>
		</div>
		<!-- END PAGE HEADER-->
		<!-- BEGIN DASHBOARD STATS -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<table id="example1" class="table table-striped table-bordered table-hover">
					<thead>
						<tr>
							<th>Sr No</th>
							<th>Dt of App</th>
							<th>Pf No</th>
							<th>Employee Name</th>
							<th>Designation</th>
							<th>Station</th>
							<th>Child Name</th>
							<th>Course Name</th>
							<th>Child Dob</th>
							<th>Present Year</th>
							<!-- <th>Action</th> -->	
						</tr>
					</thead>
					<tbody id="tb_body">
						
						<!-- <tr class="odd gradeX">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr> -->
						
					</tbody>
				</table>
			</div>
		</div>
		<div class="text-right">
			<button class="btn green btnhide" onclick="print_button()">Print</button>
		</div>
		<!-- END DASHBOARD STATS -->
		<div class="clearfix">
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->


<?php require_once 'common/footer.php';  ?>


<script type="text/javascript">
		$(document).ready(function() {
			$('#scheme').change(function() {
				var id = $(this).val();
				var action = 'get_data';
				$.ajax({
					url: 'control/adminProcess.php',
					type: 'POST',
					data: {id:id, action:action},
					success: function(data)
					{
						console.log(data);
						$('#tb_body').html(data);
						$('.btnhide').val(id);
					}
				});
			});
		});
		function print_button()
   		{
//       		$(".btnhide").hide(); 
//       		$("#scheme_hide").hide();
//       		window.print();
// 			window.location.reload();	
            var id = $('.btnhide').val();
           window.open('http://drmpsur-hrms.in/e-sbf/admin/reports.php?id='  + id, '_blank');
   		}
   		
   		

</script>