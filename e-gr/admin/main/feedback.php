<?php
require_once('Global_Data/header.php');
error_reporting(0);
$userrole = $_SESSION["SESSION_ROLE"];
?>

<!-- PNotify -->
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <h2>Feedback <small>List</small></h2>
                        <?php /*print_r($_SESSION);*/ ?>
                        <hr>
                        <div class="x_content">
                            <table class="table table-striped table-bordered display" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>Employee PF No</th>
                                        <th>Employee Name</th>
                                        <th>Employee Email</th>
                                        <th>Employee Mobile</th>
                                        <!-- <th>Grievance Ref.No.</th> -->
                                        <th>Date</th>
                                        <!-- <th>Emp Reaction</th> -->
                                        <th>Feedback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    $sql = "select * from tbl_feedback where (griv_ref_id is null or griv_ref_id='' or griv_ref_id=0) and (emp_reaction is null or emp_reaction='') order by created_date_time desc";
                                    $query = mysql_query($sql, $db_egr);
                                    while ($rw_data = mysql_fetch_array($query)) {
                                        // print_r($rw_data);
                                        extract($rw_data);
                                        echo "<tr>";
                                        echo "<td>$cnt</td>";
                                        echo "<td>$emp_id</td>";
                                        echo "<td>$name</td>";
                                        echo "<td>$email</td>";
                                        echo "<td>$mob_no</td>";
                                        echo "<td>$created_date_time</td>";
                                        echo "<td>$remark</td>";
                                        echo "</tr>";
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <h2>Feedback<small> Added for perticular E-Grievance List</small></h2>
                                <hr>
                                <div class="x_content">
                                    <table class="table table-striped table-bordered display" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Employee PF No</th>
                                                <th>Employee Name</th>
                                                <th>Employee Email</th>
                                                <th>Employee Mobile</th>
                                                <th>Date</th>
                                                <th>Feedback</th>
                                                <th>Grievance Ref.No.</th>
                                                <th>Emp Reaction</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cnt = 1;
                                            // $sql = "select * from tbl_feedback where (griv_ref_id is not null or griv_ref_id!='' or griv_ref_id>0) and (emp_reaction is not null or emp_reaction!='') order by created_date_time desc";
                                            $sql="SELECT * FROM `tbl_feedback` where (griv_ref_id like 'WEL%' or griv_ref_id>0) and (emp_reaction!='')";
                                            $query = mysql_query($sql, $db_egr);
                                            while ($rw_data = mysql_fetch_array($query)) {
                                                // print_r($rw_data);
                                                extract($rw_data);
                                                echo "<tr>";
                                                echo "<td>$cnt</td>";
                                                echo "<td>$emp_id</td>";
                                                echo "<td>$name</td>";
                                                echo "<td>$email</td>";
                                                echo "<td>$mob_no</td>";
                                                echo "<td>$created_date_time</td>";
                                                echo "<td>$remark</td>";
                                                echo "<td>$griv_ref_id</td>";
                                                echo "<td>$emp_reaction</td>";
                                                echo "</tr>";
                                                $cnt++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('Global_Data/footer.php');
?>
<script>
/* $(document).on("click",".btn1",function(){
	    var g_id=$(this).attr('id');
	    alert(g_id);
	    $.ajax({
		    type:"post",
		    url:"gri_comp_detail.php",
		    data:{'g_id':g_id},
		    success: function (data) {
			    alert;
		    }
	    });
    }); */
</script>