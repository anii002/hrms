<?php
$con = dbcon1();
$query_emp1 = mysqli_query($con, "SELECT * FROM `forward_application` where   forward_from_pfno='" . $_SESSION['pf_number'] . "'   ");
$res = mysqli_fetch_array($query_emp1);

$qq = mysqli_query($con, "SELECT pf_number from login where pf_number='" . $res['forward_to_pfno'] . "' and role='7' ");
$res1 = mysqli_fetch_array($qq);
//print_r($res);
// echo "<br>";
// print_r($res1);
$query_emp = "";
if ($res['forward_to_pfno'] == $res1['pf_number'] && $res['forward_from_pfno'] == $_SESSION['pf_number'] && $res['hold_status'] == 1 && $res['rcc_note_status'] == 1 && $res['dak_status'] == 0) {
	//echo "working";
} else {



	echo	$query_emp = "SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_from_pfno='" . $_SESSION['pf_number'] . "' group by forward_application.ex_emp_pfno,forward_application.id ";



	$query_emp;
	$result_emp = mysqli_query($con, $query_emp);
	echo mysqli_error($con);
	$sr = 1;
	while ($value_emp = mysqli_fetch_array($result_emp)) {
		echo $value_emp['fid'];
		if ($value_emp['hold_status'] == 1 || $value_emp['hold_status'] == 0) {
			echo "
								<tr>
								<td>" . $sr++ . "</td>
								<td>" . $value_emp['ex_emp_pfno'] . "</td>
								<td>" . $value_emp['ex_empname'] . "</td>
								<td>" . $value_emp['applicant_name'] . "</td>
								
								<td>" . getcase($value_emp['category']) . "</td>
								<td><a class='btn btn-primary btnn'  href='submit.php?id=" . $value_emp['id'] . "&ex_emp_pfno=" . $value_emp['ex_emp_pfno'] . "&username=" . $value_emp['username'] . "&case=" . $value_emp['category'] . "'>Show</a></td>";

			echo "</tr>";
		}
	}
}
