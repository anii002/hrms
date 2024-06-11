<?php
include('../dbconfig/dbcon.php');
	$ref_id = $_GET['ref'];

	dbcon();
	$sql_form_fec = "SELECT emp_no FROM tbl_form_details WHERE reference_id = '$ref_id'";
	$result_form_fec = mysql_query($sql_form_fec);
	$row_form_fec = mysql_fetch_assoc($result_form_fec);

	$pf_no = $row_form_fec['emp_no'];

	$sql_form = "DELETE FROM tbl_form_details WHERE reference_id = '$ref_id'";
	$result_form = mysql_query($sql_form);

	if($result_form)
	{
		dbcon();
		$sql_doc = "SELECT files FROM tbl_doc WHERE reference_id = '$ref_id'";
		$result_doc = mysql_query($sql_doc);
		while($row_doc = mysql_fetch_assoc($result_doc))
		{
			unlink('../uploads/$pf_no/'.$row_doc['files']);
		}

		dbcon();
		$sql_doc_del = "DELETE FROM tbl_doc WHERE reference_id = '$ref_id'";
		mysql_query($sql_doc_del);

		
			echo "<script>window.location.href='sub_forms.php';alert('Form has been deleted');</script>";

	}
	else
	{
		echo "<script>window.location.href='sub_forms.php';alert('Not deleted');</script>";
	}


?>