<?php 
$GLOBALS['flag'] = "1.3"; 
include_once('common/header.php'); 
include_once('common/sidebar.php'); 
include_once('control/function.php'); 
?>

<link rel="stylesheet" href="../common_print_files/modal.css">
 
<?php

    $emp_pf = $_SESSION["username"];
    $dept = $_SESSION["dept"]; 
        $emp = get_emp_info($emp_pf);

        $emp_desig = designation($emp['designation']);

        $emp_dept = department($emp['department']);

        ?>

    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper"> 
        <div class="page-content"> 
            <div class="page-bar"> 
                <ul class="page-breadcrumb"> 
                    <li> 
                        <i class="fa fa-home"></i> 
                        <a href="index.php">Home </a> 
                        <i class="fa fa-angle-right"></i> 
                    </li> 
                    <li> 
                        <a href="#.">Add Forms to Employee</a> 
                    </li> 
                </ul> 
            </div> 
            <div class="row"> 
                <div class="col-md-12">
                    <div class="portlet box blue"> 
                        <div class="portlet-title"> 
                            <form  method="POST" action="control/adminProcess.php?action=saveData" enctype="multipart/formdata" autocomplete="off">
                                <div class="caption"> 
                                    <i class="fa fa-book"></i> Add Forms to Employee 
                                </div> 
                        </div> 
                        <div class="portlet-body"> 
                            <div class="form-body"> 
                                <div class="row"> 
                                    <div class="col-md-2"> 
                                        <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                        <p>Employee Name</p>
                                    </div>
                                    <div class="col-md-2">
                                        <?php if(!empty($emp['name'])) { ?>
                                        <p><?php echo $emp['name']; ?></p>
                                        <?php } else { ?>
                                        <input type="text" class="form-control name" placeholder="Enter Name">
                                        <a href="#." class="name1" onclick="editEmp('name');"><i class="fa fa-edit"></i></a>
                                        <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Employee Designation</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp_desig)) { ?>
                                        <p><?php echo $emp_desig; ?></p>
                                    <?php } else { 
                                    $conn=dbcon1();
                                    $sql = "SELECT ID, DESIGCODE, DESIGLONGDESC FROM designations";
                                    $result = mysqli_query($conn,$sql);
                                    ?>
                                    <select class="form-control designation">
                                        <option value="" selected disabled>Select Designation</option>
                                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo !empty($row['DESIGCODE'])?$row['DESIGCODE']:""; ?>"><?php echo !empty($row['DESIGLONGDESC'])?$row['DESIGLONGDESC']:""; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a href="#." class="designation1" onclick="editEmp('designation');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Railway Telephone No.</p> 
                                    </div> 
                                    <div class="col-md-2">
                                        <?php if(!empty($emp['railway_tele_phone'])) { ?> 
                                        <p><?php echo $emp['railway_tele_phone']; ?></p> 
                                        <?php } else { ?>
                                        <input type="text" class="form-control railway_tele_phone" placeholder="Enter Railway Telephone No">
                                        <a href="#." class="railway_tele_phone1" onclick="editEmp('railway_tele_phone');"><i class="fa fa-edit"></i></a>
                                        <?php } ?>
                                    </div> 
                                </div> 
                                <hr> 
                                <div class="row"> 
                                    <div class="col-md-2"> 
                                        <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                        <p>Place of work & Office </p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                        <?php if(!empty($emp['station'])) { ?>
                                        <p><?php echo $emp['station']; ?></p>
                                        <?php } else { ?>
                                        <input type="text" class="form-control office" placeholder="Enter Office">
                                        <a href="#." class="office1" onclick="editEmp('office');"><i class="fa fa-edit"></i></a>
                                        <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Bill Unit No. </p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp['bill_unit'])) { ?>
                                        <p><?php echo $emp['bill_unit']; ?></p> 
                                    <?php } else { 
                                       $conn= dbcon1();
                                        $sql = "SELECT billunit FROM billunit";
                                        $result = mysqli_query($conn,$sql);
                                    ?>
                                    <select class="form-control bill_unit">
                                        <option value="" selected disabled>Select Bill Unit</option>
                                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo !empty($row['billunit'])?$row['billunit']:""; ?>"><?php echo !empty($row['billunit'])?$row['billunit']:""; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a href="#." class="bill_unit1" onclick="editEmp('bill_unit');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-1"> 
                                        <p>Mobile No.</p> 
                                    </div> 
                                    <div class="col-md-1"> 
                                    <?php if(!empty($emp['mobile'])) { ?>
                                        <p><?php echo $emp['mobile']; ?></p>
                                    <?php } else { ?>
                                    <input type="text" class="form-control mobile" placeholder="Enter Mobile No">
                                    <a href="#." class="mobile1" onclick="editEmp('mobile');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div>
                                    <div class="col-md-1"> 
                                        <p>Alternate Mobile No.</p> 
                                    </div> 
                                    <div class="col-md-1"> 
                                    <?php if(!empty($emp['alt_mobile_no'])) { ?>
                                        <p><?php echo $emp['alt_mobile_no']; ?></p>
                                    <?php } else { ?>
                                    <input type="text" class="form-control alt_mobile_no" placeholder="Enter Alternate Mobile No">
                                    <a href="#." class="alt_mobile_no1" onclick="editEmp('alt_mobile_no');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div>
                                </div> 
                                <hr> 
                                <div class="row"> 
                                    <div class="col-md-2"> 
                                        <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>">
                                        <p>Staff No.</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp['emp_no'])) { ?>
                                        <p><?php echo $emp['emp_no']; ?></p>
                                    <?php } else { ?>
                                    <input type="text" class="form-control emp_no" placeholder="Enter Staff No">
                                    <a href="#." class="emp_no1" onclick="editEmp('emp_no');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Date of Appointment</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp['doa'])) { ?>
                                        <p><?php echo $emp['doa']; ?></p>
                                    <?php } else { ?>
                                    <input type="text" class="form-control datepicker doa" placeholder="Choose Date of Appointment">
                                    <a href="#." class="doa1" onclick="editEmp('doa');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Pay Band</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                        <!-- <p><?php  ?></p> --> 
                                        <!--<input type="text" name="payband" id="payband" required="">--> 
                                    </div> 
                                </div> 
                                <hr> 
                                <div class="row"> 
                                    <div class="col-md-2"> 
                                        <input type="hidden" name="txt_emp_pf" id="txt_emp_pf" value="<?php echo $emp_pf; ?>"> 
                                        <p>Basic</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp['basic_pay'])) { ?>
                                        <p><?php echo $emp['basic_pay']; ?></p>
                                    <?php } else { ?>
                                    <input type="text" class="form-control basic_pay" placeholder="Enter Basic Pay">
                                    <a href="#." class="basic_pay1" onclick="editEmp('basic_pay');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>Grade Pay/Pay Level</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                    <?php if(!empty($emp['7th_pay_level'])) { ?>
                                        <p><?php echo $emp['7th_pay_level']; ?></p>
                                    <?php } else {
                                       $conn= dbcon1();
                                        $sql = "SELECT num, pay_text FROM paylevel";
                                        $result = mysqli_query($conn,$sql);
                                    ?>
                                    <select class="form-control 7th_pay_level">
                                        <option value="" selected disabled>Select Pay Level</option>
                                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value="<?php echo !empty($row['num'])?$row['num']:""; ?>"><?php echo !empty($row['pay_text'])?$row['pay_text']:""; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a href="#." class="7th_pay_level1" onclick="editEmp('7th_pay_level');"><i class="fa fa-edit"></i></a>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-md-2"> 
                                        <p>MACP Grade Pay</p> 
                                    </div> 
                                    <div class="col-md-2"> 
                                        <!-- <p><?php  ?></p> --> 
                                        <!--<input type="text" name="macp_grade_pay" id="macp_grade_pay" required="">--> 
                                    </div> 
                                </div> 
                                <hr> 
                                <div class="row"> 
                                    <div class="col-md-2"> 
                                        <label for="lst_forms">Select Scheme</label> 
                                    </div> 
                                    <div class="col-md-4"> 
                                        <select class="form-control" name="scheme_id" id="lst_forms" class=" billunitindex" style="width:100%" required> 
                                            <option value="0" selected disabled>Select Scheme</option> 
                                            <?php 
                                                    $conn=dbcon(); 
                                                    // if($emp['7th_pay_level'] <= 4)
                                                    // {
                                                    //     $sql = "SELECT `id`,`scheme_name`,`scheme_title` FROM `tbl_master_form` WHERE `pay_level` IN ('4','7','')";
                                                    // }
                                                    // if($emp['7th_pay_level'] >= 5 && $emp['7th_pay_level'] <= 7)
                                                    // {
                                                    //     $sql = "SELECT `id`,`scheme_name`,`scheme_title` FROM `tbl_master_form` WHERE `pay_level` IN ('5','7','')";
                                                    // }
                                                    // if($emp['7th_pay_level'] >= 5)
                                                    // {
                                                    //     $sql = "SELECT `id`,`scheme_name`,`scheme_title` FROM `tbl_master_form` WHERE pay_level IN ('5','')";
                                                    // } 
                                                    
                                                    // st
                                                    $sql = "SELECT `id`,`scheme_name`,`scheme_title` FROM `tbl_master_form` WHERE `status`=1";
                                                    $rst_forms = mysqli_query($conn,$sql); 
                                                    while ($rw_forms = mysqli_fetch_assoc($rst_forms)) { 
                                                        extract($rw_forms); 
                                                        echo "<option value='$id' data-form-name='$scheme_title'>$scheme_name</option>"; 
                                                    } 
                                                    ?> 
                                        </select> 
                                    </div> 
                                </div> 
                                <hr> 
                                <div class="row"> 
                                    <div id="form"></div> 
                                </div>  
                            </div> 
                        </div> 
                        </form> 
                    </div> 
                </div>
            </div> 
            <!-- END DASHBOARD STATS --> 
            <div class="clearfix"> </div> 
        </div> 
    </div> 
    <!-- END CONTENT --> 
</div> 
<!-- END CONTAINER -->

<input type="hidden" id="emp_id" value="<?php echo !empty($emp['id'])?$emp['id']:""; ?>" >

<?php

include_once('common/footer.php');

?>

<script>

        $(document).ready(function(){



  $('#lst_forms').change(function() {

    var frm_id = $('#lst_forms').val();

    // var payband = $('#payband').val();

    // var macp = $('#macp_grade_pay').val();

    //alert(frm_id+"_"+payband+"_"+macp);



    $.ajax({

        url: 'form_fetch.php',

        type: 'POST',

        data: {id:frm_id},

        success: function(data)

        {

            $('#form').html(data);

        }

    })

  })

});

$(".imagepdf").on("change", function(){

    var ext = $(this).val().split('.').pop().toLowerCase();

        if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {

            alert('Invalid file type!');

            $(this).val("");

        }

    });

$(function() {

            $( ".datepicker" ).datepicker({

            dateFormat: "dd/mm/yy",  

            changeYear: true,

            changeMonth:true,

            }); 

        });
        
        

</script>

<script>
        
        function editEmp(field_name)
        {
            var emp_id = $('#emp_id').val();
            
            var value = $('.'+field_name).val();
            
            $.ajax({
               url: 'edit_emp.php',
               type: 'POST',
               data:{emp_id: emp_id, field_name: field_name, value: value},
               dataType: 'JSON',
               success:function(data)
               {
                   console.log(data);
                   $('.'+field_name).attr('disabled', 'true');
                   $('.'+field_name+1).hide();
               }
            });
        }
</script>