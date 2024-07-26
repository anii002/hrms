<?php

$_GLOBALS['a'] = 'leave_upload';

include_once('../global/header_update.php');
include('create_log.php');

$action = "Visited Leave Account page";

$action_on = $_SESSION['set_update_pf'];

create_log($action, $action_on);



?>

<div class="row" style="background:#67809f;margin:0px">

	<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Upload Leave Document</span>

</div>

<div style="border:1px solid #67809f;padding:30px;">

	<div class="box-header with-border">

		<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Upload Document</h3>

	</div>



	<form method="POST" action="process_main.php?action=upload_leave_doc" class="apply_readonly" enctype="multipart/form-data">

		<?php

		$conn = dbcon1();

		$sql = mysqli_query($conn, "select * from biodata_temp where pf_number='" . $_SESSION['set_update_pf'] . "'");

		$result = mysqli_fetch_array($sql);

		?>

		<div class="modal-body">

			<div class="row" style="margin-top:10px;margin-bottom:10px;">

				<div class="col-md-6 col-sm-12 col-xs-12">

					<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">PF No</label>

						<div class="col-md-8 col-sm-8 col-xs-12">

							<input type="text" id="doc_pf_no" name="doc_pf_no" class="form-control TextNumber common_pf_number" readonly value="<?php echo $result['pf_number']; ?>">

						</div>

					</div>

				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">

					<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>

						<div class="col-md-8 col-sm-8 col-xs-12">

							<input type="text" id="doc_emp_name" name="doc_emp_name" class="form-control TextNumber " value="<?php echo $result['emp_name']; ?>" readonly>

						</div>

					</div>

				</div>

			</div>



			<div class="row" style="margin-top:10px;margin-bottom:10px;">

				<div class="col-md-6 col-sm-12 col-xs-12">

					<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">Year</label>

						<div class="col-md-8 col-sm-8 col-xs-12">

							<input type="text" id="year" name="year" class="form-control onlyNumber">

						</div>

					</div>

				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">

					<div class="form-group">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Scanned Document</label>

						<div class="col-md-8 col-sm-8 col-xs-12">

							<input type="file" id="doc_file" name="doc_file" class="form-control" accept="application/pdf">

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="col-sm-2 col-xs-12 pull-right">

			<button type="submit" class="btn btn-info source">Save</button>

			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

		</div>

		<br>

	</form>

	<h3>Document Details</h3>

	<div class="row">

		<table class="table table-striped" id="exampleprom">

			<tr>

				<th>SR NO</th>

				<th>Year</th>

				<th>Document Name</th>

			</tr>

			<?php

			//echo "<script>alert('".$_SESSION['set_update_pf']."');</script>";

			$conn=dbcon1();

			$sql = mysqli_query($conn,"select * from leave_account where pf_number='" . $_SESSION['set_update_pf'] . "'");

			$sr_no = 1;



			while ($res = mysqli_fetch_array($sql)) {

				echo "<tr>";

				echo "<td>$sr_no</td>";

				echo "<td>" . $res['year'] . "</td>";

				echo "<td><a href='upload_scanned_doc/" . $_SESSION['set_update_pf'] . "/leave_account/" . $res['doc_name'] . "' target='_blank'>" . $res['doc_name'] . "</a></td>";

				echo "</tr>";

				$sr_no++;
			}

			?>

		</table>

		<script>
			$(function() {

				$('#exampleprom').DataTable()

			})
		</script>

	</div>

</div>





<?php include('modal_js_header.php'); ?>

<?php

if (isset($_SESSION['set_update_pf'])) {

	echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
}

?>

<?php include_once('../global/footer.php'); ?>