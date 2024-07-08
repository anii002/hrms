<?php
$GLOBALS['flag']="2.5";
include('common/header.php');
include('common/sidebar.php');
$date=date('d/m/Y');
$y=date('Y');
$m=date('m');
$cur_date='14/'.$m.'/'.$y;
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
						<a href="#">सारांश उत्पन्न करें / Generate Summary</a>
					</li>
				</ul>
				
			</div>
			<!-- <h1>ecefce</h1> -->
			
												<!-- <h3 class="form-section">Add User</h3> -->
								<div class="row">
<?php if(isset($_SESSION['empid'])) { 	?>
	<form id="frm-example" action="summary_details.php" method="post">
						<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>सारांश उत्पन्न करें / Generate Summary
							</div>
							<div class="tools">
							    <?php if($cur_date <= $date) { ?>
								<input type="submit" class="btn btn-warning pull-right " id='gn' name="subtn" value="Generate Summary">
								<?php } ?>
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
								<th style="width:145px;">Action / <br> कार्य</th>
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
									 $query = "SELECT MONTHNAME(str_to_date(taentry_master.created_date,'%d/%m/%Y') ) as created, taentry_master.reference_no, taentry_master.TAYear,taentry_master.empid as empid, taentry_master.TAMonth, SUM(taentrydetails.distance) AS distance, SUM(taentrydetails.amount) as rate FROM taentry_master INNER JOIN taentrydetails ON taentry_master.reference_no = taentrydetails.reference_no WHERE taentry_master.reference_no IN (select reference_id  from forward_data where forward_data.fowarded_to='".$_SESSION['empid']."' AND forward_data.depart_time is null AND summary='0') group by taentry_master.reference_no";
									//echo $query;
									
									$result = mysqli_query($conn,$query);
									$count_row = mysqli_num_rows($result);
									if($count_row>0){}else{
										echo "<script>document.getElementById('gn').style.display='none';</script>";
									}
									$cnt=0;
									while($val = mysqli_fetch_array($result))
									{
									   
										if($val['reference_no']!=null)
										{
										    $date_query=mysqli_query($conn,"SELECT arrived_time FROM `forward_data` WHERE fowarded_to='".$_SESSION['empid']."' AND reference_id='".$val['reference_no']."' ");
                                            $row_date=mysqli_fetch_array($date_query);	
										echo "
										<tr>
											<td>".$val['reference_no']."</td>
											<td>".$val['reference_no']."</td>
											<td>".get_employee($val['empid'])."</td>
											<td>".$val['TAYear']."</td>
											<td>".$val['TAMonth']."</td>
											<td>".$val['distance']."</td>
											<td>".$val['rate']."</td>
											<td>".$row_date['arrived_time']."</td>
											<td><a href='show_seperate_claim1.php?ref_no=".$val['reference_no']."&empid=".$val['empid']."' class='btn btn-primary'>Show</a>
											<a href='emp-track-modul.php?ref_no=".$val['reference_no']."' class='btn green btn_action'>Track</a></td>
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
        
        // console.log(rows_selected);
        
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