<?php
$GLOBALS['flag'] = "1.4";
include_once('../common_files/header.php');
// include_once('../common_files/sidebar.php');
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- 
			<h3 class="page-title">
			Dashboard / डॅशबोर्ड<small>reports & statistics</small>
			</h3> -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.php">Home </a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Current Track of Employee Form </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Current Track of Employee Form 
                    </div>
                </div>
                <div class="portlet-body">
                    <?php 
                        $tbl_master=mysql_query("SELECT * from  tbl_form_master_entry where emp_pf='".$_SESSION['emp_id']."'",$db_edar);
                        $fetch_data=mysql_fetch_array($tbl_master);

                        $mster_current_st=$fetch_data['current_status'];

                        //echo "<h4>Current status: ".get_status($mster_current_st)."</h4>";
                        echo '<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                                <div class="boxtrack">
                                <div class="row">
                                <div class="col-md-4">1</div>
                                <div class="col-md-4">2</div>
                                <div class="col-md-4">3</div>
                                </div>
                                <h4>'.get_status($mster_current_st).'</h4>
                                </div>
                              </div>
                              ';

                        $tbl_fw=mysql_query("SELECT * from tbl_form_forward where emp_pf='".$_SESSION['emp_id']."' and form_reference_id='".$fetch_data['form_ref_id']."' order by id asc ",$db_edar);
                        while ($row=mysql_fetch_array($tbl_fw)) 
                        {

                        
                    ?>
                    
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                        <div class="boxtrack">

                            <?php //print_r($rowt);
                                echo $from=$row['fw_from'];
                                echo $to=$row['fw_to'];
                                echo $current_role=$row['current_role'];
                                echo $status=$row['status'];

                                if($current_role=='2' && $status=='2')
                                {
                                    echo get_emp_name_from_id($from);
                                }

                             ?>
                        </div>
                        <div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>
                    </div>

                <?php } ?>

                    
                </div>
            </div>

        </div>
        <!-- END DASHBOARD STATS -->
        <div class="clearfix">
        </div>
    </div>
</div>

<?php
include_once('../common_files/footer.php');
?>
