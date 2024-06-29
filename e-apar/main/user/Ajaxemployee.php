<?php
//session_start();
include('../dbconfig/dbcon.php');
$conn = dbcon();

$Flag = $_POST["Flag"];

if ($Flag == "ShowRecordsUser") {
	$sqlemployee = mysqli_query($conn, "select * from tbl_employee order by empid");
	echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th><i class='fa fa-fa'></i><input type='checkbox' name='select_all[]' id='select_all' value='check'>value</input></th>
								<th><i class='fa fa-fa'></i>Empid</th>
								<th><i class='fa fa-gallary'></i> Name </th>
								<th><i class='fa fa-calendar'></i> design </th>
								<th><i class='fa fa-calendar'></i> station </th>
								<th><i class='fa fa-calendar'></i> pay scale </th>
								<!--<th><i class='fa fa-cog'></i> year</th>
								<th><i class='fa fa-cog'></i> Action</th>-->
							";
	$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
	while ($rev = mysqli_fetch_array($sql)) {
		echo "<th>" . $rev['years'] . "</th>";
	}
	echo "</tr>";
	echo "</thead>";
	while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
		$empid = $rwEmployee["emplcode"];
		$year = $rwEmployee["year"];
		$emplcode = $rwEmployee["emplcode"];
		$dept = $rwEmployee["dept"];
		$design = $rwEmployee["design"];
		$station = $rwEmployee["station"];
		$payscale = $rwEmployee["payscale"];
		$year = $rwEmployee["year"];
		$uploadfile = $rwEmployee["uploadfile"];
		$empname = $rwEmployee["empname"];

		//echo $rwEmployee["registerno"];
		//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
		echo "<tr class='headings'>	
							<td style='display:none; id='tdempid$empid'>$empid</td>
							<td id='tdempid$empid'><input type='checkbox' name='select_all[]' id='select_all' value='$empid'/></td>
							<td id='tdemplcode$empid'><a href='show.php?empid='" . $empid . "'>$empid</a></td>
							<td id='tddept$empid'>$empname</td>
							<td id='tddesign$empid'>$design</td>
							<td id='tdstation$empid'>$station</td>
							<td id='tdstation$empid'>$payscale</td>";

		$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
		while ($rev = mysqli_fetch_array($sql)) {
			$sql_query = mysqli_query($conn, "select * from scanned_apr where empid='" . $emplcode . "' AND year='" . $rev['years'] . "'");
			$result = mysqli_fetch_array($sql_query);
			if ($result['image'] == "") {
				echo "<td id='tduploadfile$empid'><a href='Modal_Member.php?empid='" . $empid . "'' data-toggle='modal' data-target='#myModalReason'>NA</a></td>";;
			} else {
				echo "<td><input type='checkbox' name='" . $emplcode . "' ><label style='color:green;'>AV</label></input></td>";
			}
		}



		echo "</tr>";
	}
} else if ($Flag == "ShowRecordsEmployee") {
	$sqlemployee = mysqli_query($conn, "select * from tbl_employee order by empid");
	echo "<table class='table table-striped table-bordered table-hover' id='tbl_employee'>
						<thead>
							<tr class='odd gradeX'>
								<th style='display:none;><i class='fa fa-fa'></i> Employee Code</th>
								<th><i class='fa fa-fa'></i><input type='checkbox' name='select_all' id='select_all'/></th>
								<th><i class='fa fa-fa'></i>empid</th>
								<th><i class='fa fa-gallary'></i> Name </th>
								<th><i class='fa fa-calendar'></i> design </th>
								<th><i class='fa fa-calendar'></i> station </th>
								<th><i class='fa fa-calendar'></i> pay scale </th>
								<!--<th><i class='fa fa-cog'></i> year</th>
								<th><i class='fa fa-cog'></i> Action</th>-->
							";
	$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
	while ($rev = mysqli_fetch_array($sql)) {
		echo "<th>" . $rev['years'] . "</th>";
	}
	echo "</tr>";
	echo "</thead>";
	while ($rwEmployee = mysqli_fetch_array($sqlemployee, MYSQLI_ASSOC)) {
		$empid = $rwEmployee["emplcode"];
		$year = $rwEmployee["year"];
		$emplcode = $rwEmployee["emplcode"];
		$dept = $rwEmployee["dept"];
		$design = $rwEmployee["design"];
		$station = $rwEmployee["station"];
		$payscale = $rwEmployee["payscale"];
		$year = $rwEmployee["year"];
		$uploadfile = $rwEmployee["uploadfile"];
		$empname = $rwEmployee["empname"];

		//echo $rwEmployee["registerno"];
		//<button class='btn btn-xs btn-warning' onclick='MarkPending($empid)'>Pending</button>
		echo "<tr class='headings'>	
							<td style='display:none; id='tdempid$empid'>$empid</td>
							<td id='tdempid$empid'><input type='checkbox' name='select_all' id='select_all' value='$empid'/></td>
							<td id='tdemplcode$empid'><a href='show.php?empid=$empid'>$empid</a></td>
							<td id='tddept$empid'>$empname</td>
							<td id='tddesign$empid'>$design</td>
							<td id='tdstation$empid'>$station</td>
							<td id='tdstation$empid'>$payscale</td>";

		$sql = mysqli_query($conn, "SELECT * FROM year order by id desc limit 7");
		while ($rev = mysqli_fetch_array($sql)) {
			$sql_query = mysqli_query($conn, "select * from scanned_apr where empid='" . $emplcode . "' AND year='" . $rev['years'] . "'");
			$result = mysqli_fetch_array($sql_query);
			if ($result['image'] == "") {
				echo "<td id='tduploadfile$empid'><a href='Modal_Member.php?empid='" . $empid . "'' data-toggle='modal' data-target='#myModalReason'>NA</a></td>";
			} else {
				echo "<td><input type='checkbox' name='" . $emplcode . "' ><label style='color:green;'>AV</label></input></td>";
			}
		}



		echo "</tr>";
	}
} else {
	echo	mysqli_error($conn);
}
