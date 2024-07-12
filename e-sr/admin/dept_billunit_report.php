<?php

$_GLOBALS['a'] = 'reports';

session_start();

//error_reporting(0);

$GLOBALS['a'] = 'reports';

include_once('../global/header.php');

include_once('../global/topbar.php');



include('mini_function.php');

include('fetch_all_column.php');

include_once('../dbconfig/dbcon.php');

dbcon1();

//include_once('../global/header_update.php');
?>

<!--Bio Tab Start -->

<div style="padding:10px;margin:5px;padding-top:20px;margin-top:15px;">

	<div class="row" style="background:#67809f;margin:0px;">

		<span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Department and Billunit Wise Reports</span>

	</div>

	<div style="border:1px solid #67809f;padding:30px;background:#fff;">

		<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Reports Details</h3>

		<div class="box-header with-border">

			<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">

				<li class="active"><a href="#prft" data-toggle="tab"><b>Department and Billunit Wise</b></a></li>

			</ul>

		</div>

		<form method="post" action="">

			<div class="row" style="padding:30px;margin:20px;">

				<div class="col-md-4 col-sm-12 col-xs-12">

					<div class="form-group bio">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">Department</label>

						<div class="col-md-9 col-sm-9 col-xs-12">

							<select name="dept" id="dept" class="form-control select2">

								<option hidden selected disabled></option>

								<?php

								$conn = dbcon();

								$sql = mysqli_query($conn,"select * from department");

								while ($res = mysqli_fetch_array($sql)) {

									echo "<option value='" . $res['id'] . "'>" . $res['DEPTDESC'] . "</option>";
								}

								?>

							</select>

						</div>

					</div>

				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">

					<div class="form-group bio">

						<label class="control-label col-md-3 col-sm-3 col-xs-12">Billunit</label>

						<div class="col-md-9 col-sm-9 col-xs-12">

							<select name="billunit" id="billunit" class="form-control select2">



							</select>

						</div>

					</div>

				</div>



				<br>

				<div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top:10px;">

					<button class="btn btn-primary" type="submit" name="btn_view">View</button>

				</div>

			</div>

		</form>









		<div class="row">

			<div class="col-xs-12">

				<div class="box">

					<div class="box-header">

						<h3 class="box-title">Employee List</h3>

					</div>

					<!-- /.box-header -->

					<div class="box-body table-responsive">

						<table id="exampleprom" class="table table-striped">

							<thead>

								<tr>

									<th>Sr No</th>

									<th>PF Number</th>

									<th>Employee Name</th>



								</tr>

							</thead>

							<tbody>

								<?php

								echo "<script>alert('out');</script>";

								if (isset($_POST['btn_view'])) {

									echo "<script>alert('in');</script>";

									$dept = $_POST['dept'];

									$billunit = $_POST['billunit'];



									$conn1=dbcon1();

									$sql = mysqli_query($conn1,"select * from present_work_temp where preapp_billunit='$billunit'");

									$sr_no = 1;

									while ($res = mysqli_fetch_array($sql)) {

										echo "<tr>";

										echo "<td>$sr_no</td>";

										echo "<td>" . $res['preapp_pf_number'] . "</td>";

										echo "<td>" . get_emp_name($res['preapp_pf_number']) . "</td>";



										echo "</tr>";

										$sr_no++;
									}
								}



								?>

							</tbody>

							<tfoot></tfoot>

						</table>

					</div>

					<!-- /.box-body -->

				</div>

				<!-- /.box -->

			</div>

			<!-- /.col -->

		</div>



		<script>
			$(function() {

				$('#exampleprom').DataTable()

			})
		</script>

	</div>

</div>





<!-- Prft Fixation End  -->

<?php include('modal_js_header.php'); ?>

<?php include_once('../global/footer.php'); ?>

<script>
	$(document).on('change', '#dept', function() {

		var dept = $(this).val();

		$.ajax({

			type: "post",

			url: "process.php",

			data: "action=get_report_billunit&dept=" + dept,

			success: function(data) {

				//alert(data);

				debugger;

				$("#billunit").html(data);

			}

		});

	});

	$(document).on("click", ".info", function() {



		var b_v = $(this).attr('bill_value');

		var f_d = $(this).attr('from_date');

		var t_d = $(this).attr('to_date');

		var f_n = $(this).attr('form_name');



		/* alert($(this).attr('bill_value'));

		alert($(this).attr('from_date'));

		alert($(this).attr('to_date'));

		alert($(this).attr('form_name')); */



		$.ajax({

			type: "post",

			url: "process.php",

			data: "action=get_report&b_v=" + b_v + "&f_d=" + f_d + "&t_d=" + t_d + "&f_n=" + f_n,

			success: function(data) {

				//alert(data);

				debugger;

				$("#info_all").html("");

				$("#info_all").append(data);

			}

		});

	});
</script>