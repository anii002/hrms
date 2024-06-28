 <?php
	// include('../dbconfig/dbcon.php');
	// dbcon();


	//Autogenerate User Name
	$id = 000;
	$resultid = mysqli_query($conn, "select userid from tbl_user");
	while ($rowid = mysqli_fetch_array($resultid)) {
		$id = $rowid['userid'];
	}
	$id = $id + 1;
	$usercode = 'EAPAR-00' . sprintf("%02d", $id); //generate_id(1);

	//-----------Ticket Id------------//
	$t_id = 000;
	$resultticket = mysqli_query($conn, "select HLP_id from tbl_helpdesk");
	while ($rowticket = mysqli_fetch_array($resultticket)) {
		$t_id = $rowticket['HLP_id'];
	}
	$t_id = $t_id + 1;
	$ticketcode = 'TICKETNO-0' . sprintf("%02d", $t_id); //generate_id(1);

	//--------------Employee Username Autogenerate--------------------//
	$emp_id = 000;
	$resultid = mysqli_query($conn, "select * from tbl_employee");
	$rowid = mysqli_fetch_array($resultid);
	$id = $rowid['empid'];
	$pfid = $rowid['emplcode'];
	$pfid = $pfid + 1;
	$employee = 'India@0' . sprintf("%02d", $pfid); //generate_id(1);


	?>