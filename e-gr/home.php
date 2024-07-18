<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php include_once('global/header.php');
include_once('global/model.php');
include_once('fun.php');
?>
<?php
$user_last = $_SESSION['user'];
$fetch = "select * from tbl_grievance where emp_id='$user_last'";

$fetch_result = mysqli_query($db_egr,$fetch) or die(mysqli_error($db_egr));
//echo "select * from tbl_grievance where emp_id='$user_last'";;

//echo "<script>alert(".$user_last.");</script>"

?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css ">

<section class="features-section-1 relative "
    style='background-image: url("images/small1.png");background-repeat:repeat;margin-top:90px;'>
    <div class="container">
        <div class="row section-separator">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Grievance Ref.No</th>
                        <th>Remark</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Document Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <label style="padding:5px;font-size:16px;">Grievance History</label>
                    <?php
					function get_status($status)
					{
						global $db_egr;
						$sql1 = mysqli_query($db_egr,"select status from status where id=$status");
						$status_fetch = "";
						while ($sql_query1 = mysqli_fetch_array($sql1)) {
								$status_fetch = $sql_query1['status'];
							}
						return $status_fetch;
					}

					while ($result_fetched = mysqli_fetch_array($fetch_result)) {
							echo '<tr>';
							echo '<td>' . $result_fetched['gri_ref_no'] . '</td>';
							echo '<td>' . $result_fetched['gri_desc'] . '</td>';
							echo '<td>' . $result_fetched['gri_upload_date'] . '</td>';
							echo '<td>' . get_status($result_fetched['status']) . '</td>';
							echo "<td>";
							while ($doc_fetch = mysqli_fetch_array($sql_doc_sec)) {
									//echo $doc_fetch['doc_path'];
									echo "<a href='admin_user/main/admin_upload/" . $doc_fetch['doc_path'] . "' target='_blank' id='" . $cnt . "' name='" . $cnt . "'>DOC&nbsp;&nbsp;&nbsp;</a>";
									$cnt++;
								}
							if (mysqli_num_rows($sql_doc_sec) > 0) {
									$count_doc++;
								}
							echo '</td>';
							echo "<td><a href='griv_history_detail.php?griv_no=" . $all_fetch['gri_ref_no'] . "' class='btn btn-fill source' style='background:#5bc0de;min-width: 100px;    line-height: 25px;'><i class='fa fa-eye' aria-hidden='true'></i>View</a></td>";
							echo '</tr>';
						} ?>

                </tbody>
            </table>

        </div> <!-- End: .row -->
    </div> <!-- End: .container -->
</section>






<!--section class="features-section-2 relative "style="padding:50px;padding-top:20px;padding-bottom:330px;">
			<div class="table-responsive">
			<h3>List</h3>
				<table width="100%" border="1" >
					<tbody>
						<tr>
							<th>Dummy</th>
							<th>Dummy</th>
							<th>Dummy</th>
							<th>Dummy</th>
							<th>Dummy</th>
						</tr>
						<tr>
							<td>Dummy</td>
							<td>Dummy</td>
							<td>Dummy</td>
							<td>Dummy</td>
							<td>Dummy</td>
						</tr>
						
					</tbody>
				</table>
			
			</div>
		</section-->


<?php include_once('global/footer.php') ?>

<script></script>
<script>
$(document).ready(function() {
    $("#yes").click(function() {
        $("#upfile").show();
    });
    $("#no").click(function() {
        $("#upfile").hide();
    });
});
</script>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>