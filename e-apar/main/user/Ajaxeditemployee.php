  <?php
	session_start();
	include('../dbconfig/dbcon.php');
	$conn = dbcon();


	$year = $_POST["cmbyear"];
	$empid = $_POST["txtempid"];
	$empname = $_POST["txtempname"];
	$empcode = $_POST["txtempcode"];
	$dept = $_POST["cmbdept"];
	$designation = $_POST["cmbdesignation"];
	$station = $_POST["cmbstation"];
	$payscale = $_POST["txtpayscale"];
	$interity = $_POST["txtinterity"];
	$substantive = $_POST["txtsubstantive"];
	$reportingofficer = $_POST["txtreportingofficer"];
	$reviewingofficer = $_POST["txtreviewingofficer"];
	$acceptauthofficer = $_POST["txtacceptauthofficer"];
	$totalgrade = $_POST["txtacceptauthofficer"];
	$stsc = $_POST["txtstsc"];
	$session = $_POST["txtsession"];
	$sevencpcpaylevel = $_POST["txtsevencpcpaylevel"];
	$type = $_POST["txttype"];
	$contact = $_POST["txtcontact"];

	if (isset($_FILES['txtfileappr']['tmp_name'][0]) != '') {
		if (file_exists("../resources/NAME_PFNO/" . $empcode)) {
		} else {
			mkdir("../resources/NAME_PFNO/" . $empcode);
		}
		if (file_exists("../resources/NAME_PFNO/" . $empcode . "/" . $year)) {
		} else {
			mkdir("../resources/NAME_PFNO/" . $empcode . "/" . $year);
		}
		for ($i = 0; $i < count($_FILES['txtfileappr']['tmp_name']); $i++) {
			$fetch = mysqli_query($conn, "select count(id) from scanned_img where empid='$empcode' and year='$year'");
			$rwFetch = mysqli_fetch_array($fetch);
			$cnt = $rwFetch['count(id)'];
			$filename = $empcode . "_" . $year . "_" . $cnt++ . ".jpg";

			mysqli_query($conn, "insert into scanned_img(empid,empname,year,image,uploadedby,uploadeddate) values ('$empcode','$empname','$year','$filename','" . $_SESSION['SESS_MEMBER_NAME'] . "',NOW())");
			move_uploaded_file($_FILES['txtfileappr']['tmp_name'][$i], "../resources/NAME_PFNO/" . $empcode . "/" . $year . "/" . $filename);
			//echo "$filename";
		}
	} else {
		$filename = "file missing";
		mysqli_query($conn, "insert into scanned_img(empid,empname,year,image,uploadedby,uploadeddate) values ('$empcode','$empname','$year','$filename','" . $_SESSION['SESS_MEMBER_NAME'] . "',NOW())");
		echo "$filename";
	}
	if (mysqli_query($conn, "update tbl_employee set contact='$contact', dept='$dept',design='$designation',station='$station',payscale='$payscale',integrity='$interity',empname='$empname',substantive='$substantive',sevencpcpaylevel='$sevencpcpaylevel',stsc='$stsc',modifiedby='$session',modifieddate=NOW() where empid='$empid'") && mysqli_query($conn, "insert into scanned_apr(year,empid,empname,dept,designation,station,payscale,integrity,substantive,sevencpcpaylevel,
			reportinggrade,reviewinggrade,acceptinggrade,totalgrade,reporttype,stsc,updatedby,createddate)values('$year','$empcode','$empname','$dept','$designation','$station','$payscale','$interity','$substantive','$sevencpcpaylevel','$reportingofficer',
			'$reviewingofficer','$acceptauthofficer','$totalgrade','$type','$stsc','" . $_SESSION['SESS_MEMBER_NAME'] . "',NOW())")) {
		mysqli_query($conn, "insert into tbl_audit(message,action,updatePerson,date) values('$empcode Updated succesfully','editing','Super Admin',NOW())");
		echo "<script>
				alert('Record Updated Successfully!!!!');
				window.location='frmsample.php';
				</script>";
	} else {
		echo mysqli_error($conn);
	}
	//}


	?>
