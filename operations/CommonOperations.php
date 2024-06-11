<?php

include_once("../common/db.php");

//dbcon('esoluhp6_sur_railway');

$Flag = $_REQUEST["Flag"];

if ($Flag == "getList") {

	$Table = $_REQUEST["Table"];

	$ValueField = $_REQUEST["ValueField"];

	$DisplayField = $_REQUEST["DisplayField"];

	$rstGetList = mysqli_query("select $ValueField,$DisplayField from $Table");

	if (mysqli_num_rows($rstGetList) != 0) {

		if ($DisplayField == "stationdesc") {

			$DisplayName = "Station";

		} else if ($DisplayField == "DEPTDESC") {

			$DisplayName = "Department";

		} else if ($DisplayField == "DESIGLONGDESC") {

			$DisplayName = "Designation";

		} else if ($DisplayField == "BILLUNIT") {

			$DisplayName = "Bill Unit";

		} else {

			$DisplayName = $DisplayField;

		}

		echo "<option value=''>Choose a $DisplayName</option>";

		while ($rwGetList = mysqli_fetch_assoc($rwGetList)) {

			$Value = $rwGetList[$ValueField];

			$Display = $rwGetList[$DisplayField];

			echo "<option value='$Value'>$Display</option>";

		}

	}

}