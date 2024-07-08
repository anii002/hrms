<?php
$GLOBALS['flag']="5.12";
	include('common/header.php');
	include('common/sidebar.php');
	// echo $d=date("d-m-Y h:i:s");
?>
			
			<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home / मुख पृष्ठ</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">सारांश उत्पन्न करें / Generate Summary</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
								<div class="row">
<?php if(isset($_SESSION['empid'])) { 	?>
	<form action="summary_details_cont.php" method="post" id="frm-example">
						<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Generate Summary of continjency
							</div>
							<div class="tools">
								<input type="submit" class="btn btn-warning pull-right " id='gn' name="subtn" value="Generate Summary">
							</div>

						</div>
						<div class="portlet-body">
							<table class="table table-hover table-bordered display" id="tblreport">
							<thead>
							<tr class="warning">
								<th></th>
								<th>Reference / <br> संदर्भ</th>
								<th>Name / <br> नाम</th>
								<th>Year / <br> साल</th>
								<th>Month / <br> महीना</th>
								<th>Total Distance / <br> कुल दूरी</th>
								<th>Total Rate / <br> कुल दर</th>
								<th>Applied Month / <br> महीना लगाया</th>
								<th>Action / <br> कार्य</th>
							</tr>
							</thead>
							<tbody>
								<?php
								function get_employee($id)
								{
									global $conn;
									$query = mysqli_query($conn,"SELECT name from employees where pfno='$id'");
									$result = mysqli_fetch_array($query);
									return $result['name'];
								}
								$cnt=0;

								$query = "SELECT MONTHNAME(str_to_date(continjency_master.created_date,'%d/%m/%Y') ) as created, continjency_master.reference, continjency_master.year,continjency_master.empid as empid, continjency_master.month, SUM(continjency.kms) AS distance, SUM(continjency.total_amount) as rate FROM continjency_master INNER JOIN continjency ON continjency_master.reference = continjency.reference AND continjency_master.generate = 0 WHERE continjency_master.reference IN (select reference_id from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null) group by continjency_master.reference";
									//echo $query;


									
									$result = mysqli_query($conn,$query);
									$count_row = mysqli_num_rows($result);
									if($count_row>0){}else{
										echo "<script>document.getElementById('gn').style.display='none';</script>";
									}
									$cnt=0;
									while($val = mysqli_fetch_array($result))
									{
										if($val['reference']!=null)
										{
											
										echo "
										<tr>
											<td>".$val['reference']."</td>
											<td>".$val['reference']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['year']."</td>
											<td>".$val['month']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$val['created']."</td>
											<td><a href='unclaimed_cont_details.php?ref_no=".$val['reference']."&empid=".$val['empid']."' class='btn btn-primary'>Show</a>
										</tr>
										";
										$cnt++;
										}
									}
								 ?>
							
							
							</tbody>
							</table>
						</div>
					</div>
				
				</div>
			</div>
			</form>
				<?php } ?>
			
		</div>
	</div>
<?php
	include 'common/footer.php';
?>



<script type="text/javascript">
$(document).ready(function(e){
		  var table = $('#tblreport').DataTable({
		    'ajax': '',
		    'columnDefs': [{
		        'targets': 0,
		        'checkboxes': {
		            'selectRow': true
		        }
		    }],
		    'select': {
		        'style': 'multi'
		    },
		    'order': [
		        [1, 'asc']
		    ]
		});

	$('#frm-example').on('submit', function(e) {

        // e.preventDefault();
        var form = this;

        var rows_selected = table.column(0).checkboxes.selected();
        
        console.log(rows_selected);
        
        $.each(rows_selected, function(index, rowId) {
            // Create a hidden element 
            $(form).append(
                $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'selected_list[]')
                .val(rowId)
            );
        });
    });


});

</script>