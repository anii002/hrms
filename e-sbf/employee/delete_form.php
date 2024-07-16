<?php
include('../dbconfig/dbcon.php');
	$ref_id = $_GET['ref'];

	$conn=dbcon();
	$sql_form_fec = "SELECT emp_no FROM tbl_form_details WHERE reference_id = '$ref_id'";
	$result_form_fec = mysqli_query($conn,$sql_form_fec);
	$row_form_fec = mysqli_fetch_assoc($result_form_fec);

	$pf_no = $row_form_fec['emp_no'];

	$sql_form = "DELETE FROM tbl_form_details WHERE reference_id = '$ref_id'";
	$result_form = mysqli_query($conn,$sql_form);

	if($result_form)
	{
		$conn=dbcon();
		$sql_doc = "SELECT files FROM tbl_doc WHERE reference_id = '$ref_id'";
		$result_doc = mysqli_query($conn,$sql_doc);
		while($row_doc = mysqli_fetch_assoc($result_doc))
		{
			unlink('../uploads/$pf_no/'.$row_doc['files']);
		}

		$conn=dbcon();
		$sql_doc_del = "DELETE FROM tbl_doc WHERE reference_id = '$ref_id'";
		mysqli_query($conn,$sql_doc_del);

		
			echo "<script>window.location.href='sub_forms.php';alert('Form has been deleted');</script>";

	}
	else
	{
		echo "<script>window.location.href='sub_forms.php';alert('Not deleted');</script>";
	}


?>