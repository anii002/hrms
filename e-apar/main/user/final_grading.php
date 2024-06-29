<?php
session_start();
include("../dbconfig/dbcon.php");
$conn = dbcon();
$groupid = $_GET['hid'];
$session = $_SESSION['SESS_MEMBER_NAME'];
$cmbselect = $_GET["cmbselect"];
$ncmbselect = $_GET["ncmbselect"];
$txtnotifi = $_GET["txtnotifi"];
$cmbselect2 = $_GET["cmbselect2"];
$notifydate = $_GET["notifydate"];
$selectdate = $_GET["selectdate"];

if (mysqli_query($conn, "insert into tbl_header (groupid,selection,postof,department,notification,dated,curdate,createdby) 
		values('$groupid','$ncmbselect','$cmbselect','$cmbselect2','$txtnotifi','$notifydate','$selectdate','$session')")) {
}
?>
<table class='table table-striped table-bordered table-hover' id='example' style="display:none;">
	<thead>
		<th>PF No</th>
		<th>Name</th>
		<th>Designation</th>
		<th>Cast</th>
		<?php
		$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 1,3");
		$yr = array();
		$i = 0;
		while ($rev = mysqli_fetch_array($sql)) {
			//echo "<th>".$rev['years']."</th>";
			$yr[$i++] = $rev['years'];
		}
		?>
		<th>Total</th>
		<th>Remark</th>
		<th></th>
	</thead>
	<tbody>
		<?php
		$num = 1;

		$sql_group = mysqli_query($conn, "select distinct empid from group_details where group_id='$groupid'");
		while ($rwGroup = mysqli_fetch_array($sql_group)) {
			$record = array();
			$j = 0;
			$rowgrpid = $rwGroup["empid"];

			$record[$j++] = $rowgrpid;
			$sqlgroupmaster = mysqli_query($conn, "select * from tbl_employee where emplcode='$rowgrpid'");
			while ($rwGroupMaster = mysqli_fetch_array($sqlgroupmaster)) {
				$year = $rwGroupMaster["year"];
		?>
				<tr>
					<td><?php echo "<input type='text' value=" . $rwGroupMaster["emplcode"] . " style='border:0px;' size='5' readonly>"; ?></td>
					<td><?php echo $rwGroupMaster["empname"]; ?></td>
					<td><?php echo $rwGroupMaster["design"]; ?></td>
					<td><?php echo $rwGroupMaster["stsc"]; ?></td>

					<?php
				}
				$cnt = 0;
				$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 1,3");
				while ($rev = mysqli_fetch_array($sql)) {
					$sqlyear = mysqli_query($conn, "select * from scanned_apr where empid='$rowgrpid' AND year='" . $rev['years'] . "'");
					if ($rwyear = mysqli_fetch_array($sqlyear)) {
						$rowyear = $rwyear["year"];
						//$emid=$rwyear["id"];

					?>

						<td><?php echo "<input type='hidden' size='10' value=" . $rwyear["totalgrade"] . " style='border:0px;' readonly>";
							$cnt = $cnt + $rwyear["totalgrade"]; ?></td>
			<?php
						$record[$j++] = $rwyear["totalgrade"];
					} else {
						$get_id = $_GET["ngrade$num"];
						$record[$j++] = $get_id;
						echo "<td><input type='hidden' style='border:0px' value='" . $_GET["ngrade$num"] . "' ></td>";
						$num++;
					}
				}

				echo "<td><input type='hidden' style='border:none;' size='4' value='" . $_GET["nvalue$rowgrpid"] . "' readonly></td>";
				$record[$j++] = $_GET["nvalue$rowgrpid"];

				$sql_remark = mysqli_query($conn, "select * from tbl_graderemark where groupid='$groupid' AND empid='$rowgrpid'");
				$rwRemark = mysqli_fetch_array($sql_remark);
				$getvar = $rwRemark["graderemark"];
				if ($getvar == '') {
					$record[$j++] = "";
				} else {
					echo "<td><input type='hidden' style='border:0px;' value='$getvar' readonly></td>";
					$record[$j++] = $getvar;
				}
				echo "<td><a class='nbtn' id='$rowgrpid' name='$rowgrpid'><i class='fa fa-check'></i></a></td>";
				echo "</tr>";

				$sql = "insert into tbl_finalgroupgrade(pfno,year1,year2,year3,grade1,grade2,grade3,total,remark,groupid,createdby,createddate
						       ) values ('$rowgrpid','$yr[0]','$yr[1]','$yr[2]','$record[1]','$record[2]','$record[3]','$record[4]','$record[5]','$groupid','$session',NOW())";
				$sql_query = mysqli_query($conn,$sql);
				error_reporting(0);
				if ($sql_query)
					echo "<script>alert('Report saved successfully'); window.location='frmgroupreport.php?gid=$groupid';</script>";
				else
					echo "<script>alert('Report saved unsuccessfully'); window.location='frmgroupreport.php?gid=$groupid	';</script>";
			}

			?>
	</tbody>
</table>