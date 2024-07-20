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
            <div class="col-md-12">
                <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-book"></i> Current Track of Employee Form 
                    </div>
                </div>
                <div class="portlet-body">
                    <?php 
                        $tbl_master=mysqli_query($db_edar,"SELECT * from  tbl_form_master_entry where emp_pf='".$_SESSION['emp_id']."'");
                        $fetch_data=mysqli_fetch_array($tbl_master);

                        $mster_current_st=$fetch_data['current_status'];

                        //echo "<h4>Current status: ".get_status($mster_current_st)."</h4>";
                        echo '<div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                                <div class="boxtrack">
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                    <h4 class="text-center">Current Status:  <u>'.get_status($mster_current_st).' </u></h4>';
                                    if($fetch_data['status']=='1')
                                    {
                                        echo '<a href="view.php?emp_pf='.$fetch_data['emp_pf'].'&reference_id='.$fetch_data['form_ref_id'].'" class="btn btn-info" >Click to View Forms</a>';
                                    }
                                    else
                                    {
                                         echo '<a href="closed_views.php?emp_pf='.$fetch_data['emp_pf'].'&reference_id='.$fetch_data['form_ref_id'].'" class="btn btn-info" >Click to View Forms</a>';
                                    }
                                    
                                  echo  '</div>
                                    <div class="col-md-4">
                                    </div>
                               </div>
                               </div>
                              </div>
                              ';
                    ?>
                     <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 col-md-offset-2 col-lg-offset-2">
                        <div class="boxtrack">
                    <?php

                        $tbl_fw=mysqli_query($db_edar,"SELECT * from tbl_form_forward where emp_pf='".$_SESSION['emp_id']."' and tbl_form_forward.form_reference_id='".$fetch_data['form_ref_id']."' order by tbl_form_forward.id asc ");
                        while ($row=mysqli_fetch_array($tbl_fw)) 
                        {

                    ?>
                    
                   

                            <?php 
                                 //print_r($row);
                                 $from=$row['fw_from'];
                                 $to=$row['fw_to'];
                                 $current_role=$row['current_role'];
                                 $status=$row['status'];

                                if($current_role=='2' && $status=='2')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>Created Forms & Forward to DA</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }
                                else if($current_role=='3' && $status=='4')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";

                                    echo "<p class='text-center'><u>Rejected By DA</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }
                                else if($current_role=='3' && $status=='3' && $row['approved_date']==null)
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>Accepted By DA & send to Clerk</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';

                                }
                                else if($current_role=='3' && $status=='3' && $to==$_SESSION['emp_id'] )
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>DA send forms to Employee   </u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';

                                }                               
                                else if($current_role=='7' && $status=='5')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name($_SESSION['emp_id'])."   (".get_emp_designation($_SESSION['emp_id']).")</b></p>";
                                    echo "<p class='text-center'><u>Employee replied acknowledgement and explanation to DA</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }                               
                                else if($current_role=='3' && $status=='7')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>DA Forwards forms as well as employee acknowledgement to Inquiry Officer   </u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }
                                 else if($current_role=='4' && $status=='8')
                                {
                                   echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>Inquiry Officer Forwards Notes to DA   </u></p>";
                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }
                                 else if($current_role=='3' && $status=='11')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'>DA Rejectes IO Notes Reason is: <u>".$row['rejected_reason']."</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                }
                                 else if($current_role=='3' && $status=='10')
                                {
                                    echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>DA Accepts Inquiry Officer Reports</u></p>";

                                    echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                    if($mster_current_st=='9' && $fetch_data['status']=='2')
                                    {
                                         echo "<p class='text-center'><b>".get_emp_name_from_id($from)."   (".get_emp_desig_from_id($from).") / (".getrole($current_role).")</b></p>";
                                    echo "<p class='text-center'><u>DA Close the File..</u></p>";
                                    }
                                }
                                
                                    
                                   

                                    //echo '<div class="downarrow"><i class="fas fa-long-arrow-alt-down"></i></div>';
                                //}

                               


                             ?>
                       

                <?php } ?>
                 </div>
                        
                    </div>

                    
                </div>
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
