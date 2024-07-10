<?php
$GLOBALS['flag'] = "1.8";
include('common/header.php');
include('common/sidebar.php');
?>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Forworded & Approved Application List
                        </div>
                        <div class="tools">
                        </div>
                    </div>

                    <div class="portlet-body">
                        <br>
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable"
                                id="DataTables_Table_1" role="grid" aria-describedby="DataTables_Table_1_info">
                                <thead>
                                    <tr>
                                        <th>SR No</th>
                                        <th>Ex. Employee PFno</th>
                                        <th>Ex. Employee Name</th>
                                        <th>Applicant Name</th>
                                        <!-- <th>Applicant Userame</th> -->
                                        <th>Category</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$con = dbcon1();
									// $query_emp1 = mysqli_query("SELECT * FROM `forward_application` where   forward_from_pfno='".$_SESSION['pf_number']."'   ");
									// 	$res=mysqli_fetch_array($query_emp1);

									// 	$qq=mysqli_query("SELECT pf_number from login where pf_number='".$res['forward_to_pfno']."' and role='7' ");
									// 	$res1=mysqli_fetch_array($qq);
									// 	//print_r($res);
									// 	// echo "<br>";
									// 	// print_r($res1);
									// 	$query_emp="";
									// 	if($res['forward_to_pfno']==$res1['pf_number'] && $res['forward_from_pfno']==$_SESSION['pf_number'] && $res['hold_status']==1 && $res['rcc_note_status']==1 && $res['dak_status']==0 ){
									// 		//echo "working";
									// 	}else{



									// 		$query_emp = "SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_from_pfno='".$_SESSION['pf_number']."' group by forward_application.ex_emp_pfno  order by forward_application.id desc ";



									// $query_emp;
									// $result_emp = mysqli_query($query_emp);
									// echo mysqli_error();
									// $sr=1;
									// while($value_emp = mysqli_fetch_array($result_emp))
									// {
									// 	//echo $value_emp['fid'];
									// 	if($value_emp['hold_status']==1 || $value_emp['hold_status']==0)
									// 	{
									// echo "
									// <tr>
									// <td>".$sr++."</td>
									// <td>".$value_emp['ex_emp_pfno']."</td>
									// <td>".$value_emp['ex_empname']."</td>
									// <td>".$value_emp['applicant_name']."</td>

									// <td>".getcase($value_emp['category'])."</td>
									// <td><a class='btn btn-primary btnn'  href='submit.php?id=".$value_emp['id']."&ex_emp_pfno=".$value_emp['ex_emp_pfno']."&username=".$value_emp['username']."&case=".$value_emp['category']."'>Show</a></td>";

									// echo "</tr>";
									// 	}
									// } 

									// 	}
									$query_emp1 = mysqli_query($con, "SELECT * FROM `forward_application` where   forward_from_pfno='" . $_SESSION['pf_number'] . "'   ");
									$res = mysqli_fetch_array($query_emp1);

									$qq = mysqli_query($con, "SELECT pf_number from login where pf_number='" . $res['forward_to_pfno'] . "' and role='7' ");
									$res1 = mysqli_fetch_array($qq);
									//print_r($res);
									// echo "<br>";
									// print_r($res1);

									$query_emp = "";
									if ($res['forward_to_pfno'] == $res1['pf_number'] && $res['forward_from_pfno'] == $_SESSION['pf_number'] && ($res['hold_status'] == 1 && $res['rcc_note_status'] == 1 && $res['dak_status'] == 0)) {
										//echo "working";
									} else {
										$query_emp1 = mysqli_query($con, "SELECT * FROM `forward_application` where forward_to_pfno='" . $_SESSION['pf_number'] . "' and dak_status=1 and hold_status=1");
										$res = mysqli_fetch_array($query_emp1);
										
										if ($res) {
											$qq = mysqli_query($con, "SELECT pf_number from login where pf_number='" . $res['forward_from_pfno'] . "' and role='7'");
											$res1 = mysqli_fetch_array($qq);
										
											if ($res1 && $res['forward_from_pfno'] == $res1['pf_number'] && $res['forward_to_pfno'] == $_SESSION['pf_number'] && $res['hold_status'] == 1 && $res['rcc_note_status'] == 0 && $res['dak_status'] == 1) {
												// Your code logic here
											}
										}  else {
											// 	$query_emp1 = mysqli_query("SELECT * FROM `forward_application` where   forward_from_pfno='".$_SESSION['pf_number']."'   ");
											// $res=mysqli_fetch_array($query_emp1);

											// $qq=mysqli_query("SELECT pf_number from login where pf_number='".$res['forward_to_pfno']."' and role='3' ");
											// $res1=mysqli_fetch_array($qq);

											$query_emp = ("SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status,forward_application.ex_emp_pfno as pf FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and (hold_status=0 or hold_status=1) and rcc_note_status=0 and drm_approve=0 and dak_status=0  AND forward_from_pfno='" . $_SESSION['pf_number'] . "' and forward_application.forward_to_pfno in(SELECT pf_number from login,forward_application where login.pf_number=forward_application.forward_to_pfno AND role='3' ORDER BY forward_application.id )order by forward_application.id desc ");
											//$f_q=mysqli_fetch_array($query_emp11);

											//$query_emp = "SELECT forward_application.id as fid,forward_application.*,applicant_registration.*,hold_status,dak_status,rcc_note_status FROM `forward_application`,applicant_registration where forward_application.ex_emp_pfno=applicant_registration.ex_emp_pfno and forward_to_pfno='".$_SESSION['pf_number']."'  group by forward_application.ex_emp_pfno ";




											$result_emp = mysqli_query($con, $query_emp);
											echo mysqli_error($con);
											$sr = 1;
											while ($value_emp = mysqli_fetch_array($result_emp)) {
												//echo $value_emp['fid'];
												//if($value_emp['hold_status']==1 || $value_emp['hold_status']==0)
												{
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
									}



									?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>

        </div>

    </div>
</div>
<?php
include 'common/footer.php';
?>

<script type="text/javascript">
$('#DataTables_Table_22').DataTable({
    dom: 'Bfrtip',
    "pageLength": 5,
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
</script>