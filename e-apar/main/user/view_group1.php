<?php
session_start();
if (!isset($_SESSION['SESS_MEMBER_NAME'])) {
	echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
}
include_once('../global/header.php');
include_once('../global/topbaruser.php');
include_once('../global/sidebaruser.php');

?>
<!-- Left side column. contains the logo and sidebar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			User Management
		</h1>
		<ol class="breadcrumb">

			<li class="active">
				<a href="show_group.php"><button class="btn btn-success btn-flat btn-sm"><i class="fa fa-mail-reply"></i> Back</button></a>

			</li>
		</ol>
		<br>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->

		<div class="row">
			<form method="POST" action="ajaxassign.php">
				<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
					<thead>
						<tr>
							<th>PF NO</th>
							<th>Name</th>
							<th>Years</th>
						</tr>
					</thead>


					<?php
					$G_id = $_GET['id'];
					echo "<input type='hidden' value='$G_id' name='groupid'/>";
					$sql = mysqli_query($conn,"select DISTINCT empid from group_details where group_id=$G_id") or die(mysqli_error($conn));
					while ($result = mysqli_fetch_array($sql)) {
						echo "<tbody><td><a href='frmshowemployee.php?emppf=" . $result['empid'] . "'>" . $result['empid'] . "</a></td>";
						$sqlemployee = mysqli_query($conn,"select * from tbl_employee where emplcode='" . $result['empid'] . "'") or die(mysqli_error($conn));

						$rwEmploye = mysqli_fetch_array($sqlemployee);

						echo "<td>" . $rwEmploye['empname'] . "</td><td>";

						$sql1 = mysqli_query($conn,"select * from group_details where empid = '" . $result['empid'] . "' AND group_id=$G_id");
						while ($fetch = mysqli_fetch_array($sql1)) {
							echo "" . $fetch['year'] . " | ";
						}
						echo "</td></tbody>";
					}
					echo "</table><table class='table table-striped table-bordered table-hover' id='tbl_employee'>";
					$query = mysqli_query($conn,"select * from group_master where group_id=$G_id");
					$result_set = mysqli_fetch_array($query);
					echo "<tbody><td width='350px'>Group Name : </td><td>" . $result_set['group_name'] . "</td></tbody>";
					echo "<tbody><td>Description : </td><td>" . $result_set['group_desc'] . "</td></tbody>";
					echo "<input type='hidden' value='" . $result_set['group_desc'] . "' name='descr'/>";
					//echo "<tbody><td>Department : </td><td>".$result_set['dept_name']."</td></tbody>";
					$deptname = $result_set['dept_name'];
					echo "<input type='hidden' value='$deptname' name='dept'/>";
					$query = mysqli_query($conn,"select * from tbl_assignto where groupid = '$G_id'");
					if ($fetch = mysqli_fetch_array($query)) {
						echo "<td><a href='show_assign.php?gid=$G_id'>Assigned</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href='frmgroupreport.php?gid=$G_id' class='btn btn-primary btn-flat'>
				<i class='fa fa-user-plus'></i>&nbsp;&nbsp;&nbsp;Generate Report</a></td></tbody>";
					} else {
					?>
						<tbody>
							<?php
							$sqlaccess = mysqli_query($conn,"select * from tbl_accesspermission where accesslevel='" . $_SESSION['Access_level'] . "'");
							$rwUser = mysqli_fetch_array($sqlaccess);
							$user = $rwUser["assigning_group"];
							if ($user == "on") {
							?>
								<td width='350px'>Select Users</td>
								<td>

									<select multiple="multiple" class="form-control" name="selection[]" id="selection">
										<?php
										$query = mysqli_query($conn,"select * from tbl_user");
										while ($result_set = mysqli_fetch_array($query)) {
											echo "<option value='" . $result_set['userid'] . "'>" . $result_set['fullname'] . "</option>";
										}
										?>

									</select>
								</td>
						</tbody>
						<tbody>
							<td></td>
							<td><input type="submit" value="Send" name="sub"></td>
					<?php
							}
						}
					?>
						</tbody>
				</table>
			</form>

		</div>

		<!-- /.row -->
	</section>
	<!-- /.content -->
</div>


<?php
include_once('../global/footer.php');
?>