<?php
$GLOBALS['flag']="2";
require_once 'common/db.php';
require_once 'common/header.php';
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM user_permission WHERE id = '$id'";
$result = mysqli_query($conn ,$sql);
$row = mysqli_fetch_assoc($result);

?>
<div class="content-wrapper bgwhite">

    <section class="content-header">
        <h1>User Permission</h1>
        <ol class="breadcrumb">
            <li><a href="super_admin_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">User Permission</li>
        </ol>
    </section>
    <div class="content userregister">
        <div class="container">
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <h4>User Details</h4>
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-folder-open"></i>
                                </span>
                            </a>
                        </li>

                        <li role="presentation" class="disabled">
                            <h4>User Permission</h4>
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="disabled">
                            <h4>Preview</h4>
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                <span class="round-tab">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <form role="form" method="POST" action="user-permission.php" autocomplete="off">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            <div class="step1">
                                <form role="form">
                                    <div class="row">

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>PF Number</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" placeholder="Enter PF Number"
                                                    id="pf_no" name="pf_no" required autofocus>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Name</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                <input type="text" class="form-control" id="name" name="name" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Department</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"
                                                        aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="department"
                                                    name="department" readonly>
                                            </div>

                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Designation</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"
                                                        aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="designation"
                                                    name="designation" readonly>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="row">

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Bill Unit</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                <input type="text" class="form-control" id="bill_unit" name="bill_unit"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Pay Level</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                                                <input type="text" class="form-control" id="pay_level" name="pay_level"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Mobile No</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    readonly>
                                            </div>
                                        </div>





                                        <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                            <label>Date of Birth</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user"
                                                        aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" id="dob" name="dob" readonly>
                                            </div>
                                        </div>

                                    </div>









                            </div>
                            <ul class="list-inline pull-right col-md-12 m-t30">
                                <li><button type="button" class="btn btn-success next-step" disabled
                                        id="nxt">Next</button></li>
                            </ul>
                        </div>

                        <div class="tab-pane user-permission" role="tabpanel" id="step2">
                            <h2>e-Grievance</h2>
                            <div class="row">
                                <!--<div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">-->
                                <!--  <label>-->
                                <!--    <input type="checkbox" name="e_gr[]" id="gr_ad" value="0">Admin-->
                                <!--  </label>-->
                                <!--</div>-->
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <span class="button-checkbox">
                                        <button type="button" class="btn" data-color="info">Admin</button>
                                        <input type="checkbox" class="hidden" name="e_gr[]" id="gr_ad" value="0" />
                                    </span>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <span class="button-checkbox">
                                        <button type="button" class="btn" data-color="info">Section Officer</button>
                                        <input type="checkbox" class="hidden" name="e_gr[]" id="gr_so" value="1" />
                                    </span>

                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="e_gr[]" id="gr_wi" value="2">Welfare Inspector
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="e_gr[]" id="gr_bo" value="3">Branch Officer
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="e_gr[]" id="gr_ba" value="5">Branch Admin
                                    </label>
                                </div>

                            </div>

                            <div class="row">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="e_gr[]" id="gr_emp" value="4">Employee
                                    </label>
                                </div>
                            </div>



                            <h2>TAMM</h2>
                            <div class="row">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_sad" value="0">Super Admin
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_sac" value="1">Super Accountant
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_da" value="11">Department Admin
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_ci" value="12">Controlling
                                        Incharge
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_co" value="13">Controlling Office
                                    </label>
                                </div>



                            </div>

                            <div class="row">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="tamm[]" id="tamm_ac" value="5">Accountant
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="tamm[]" id="tamm_emp" value="4">Employee
                                    </label>
                                </div>
                            </div>

                            <h2>EIMS</h2>

                            <div class="row">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="eims[]" id="eims_ad" value="0">Admin
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="eims[]" id="eims_si" value="1">Sectional
                                        Incharge </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="eims[]" id="eims_emp" value="2">Employee
                                    </label>
                                </div>

                            </div>

                            <h2>CGA</h2>

                            <div class="row">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="cga[]" id="cga_sa" value="1"> Super Admin
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_drm" value="2"> DRM</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_sdpo" value="3"> Sr. DPO
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_dpo" value="4"> DPO</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_wi" value="5"> Welfare
                                        Inspector</label>
                                </div>

                            </div>

                            <div class="row">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_cc" value="6"> Confidential
                                        Clerk </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_rc" value="7"> Recruitment
                                        Cell</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_dc" value="8"> DAK Clerk</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="cga[]" id="cga_ap" value="0"> Applicant</label>
                                </div>

                            </div>


                            <h2>IT-Perticulars</h2>

                            <div class="row">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="itp[]" id="itp_ad" value="0">Admin
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="itp[]" id="itp_emp" value="1">Employee </label>
                                </div>

                            </div>


                            <h2>e-SAR</h2>

                            <div class="row">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" name="sar[]" id="sar_ad" value="0">Admin
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="sar[]" id="sar_cl" value="1"> Clerk </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" name="sar[]" id="sar_emp" value="2">Employee </label>
                                </div>

                            </div>


                            <ul class="list-inline m-t30">
                                <li><button type="button" class="btn btn-info prev-step">Previous</button></li>
                                <li><button type="button" id="btnSave"
                                        class="btn btn-success btn-info-full next-step">Next</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="step44">
                                <div class="row">

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>PF Number</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter PF Number"
                                                id="pf_no1" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="text" class="form-control" id="name1" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Department</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" id="department1" readonly>
                                        </div>

                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Designation</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-graduation-cap"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" id="designation1" readonly>
                                        </div>
                                    </div>



                                </div>

                                <div class="row">

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Bill Unit</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input type="text" class="form-control" id="bill_unit1" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Pay Level</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-line-chart"></i></span>
                                            <input type="text" class="form-control" id="pay_level1" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Mobile No</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="text" class="form-control" id="mobile1" readonly>
                                        </div>
                                    </div>





                                    <div class="col-md-3 col-lg-3 col-sm-12 form-group">
                                        <label>Date of Birth</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"
                                                    aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" id="dob1" readonly>
                                        </div>
                                    </div>

                                </div>

                                <!-- <div class="col-md-2 col-lg-2 col-sm-2 form-group">
                            <label>PF Number</label>
                            <input type="text" class="form-control" id="pf_num1"  readonly>
                          </div>
                          <div class="col-md-3 col-lg-3 col-sm-3 form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" id="name1" readonly>
                          </div>
                          <div class="col-md-2 col-lg-2 col-sm-2 form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" id="mobile1" readonly>
                          </div>
                          <div class="col-md-3 col-lg-3 col-sm-3 form-group">
                            <label>Email Id</label>
                            <input type="text" class="form-control" id="email1" readonly>
                          </div>
                          <div class="col-md-2 col-lg-2 col-sm-2 form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" id="designation1" readonly>
                          </div>
                          <div class="col-md-2 col-lg-2 col-sm-2 form-group">
                            <label>Employee Pay Level</label>
                            <input type="text" class="form-control" id="pay_level1"  readonly>
                          </div>
                          <div class="col-md-3 col-lg-3 col-sm-3 form-group">
                            <label>Set User Name</label>
                            <input type="email" class="form-control" id="username1"  readonly>
                          </div>
                         
                          <div class="col-md-2 col-lg-2 col-sm-2 form-group">
                            <label>Department</label>
                            <input type="text" class="form-control" id="department1" readonly>
                          </div> -->
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12 user-permission">
                                <h2>e-Grievance</h2>
                            </div>
                            <div class="">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_ad1" value="0">Admin</label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_so1" value="1">Section Officer </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_wi1" value="2">Welfare Inspector </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_bo1" value="3">Branch Officer </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_ba1" value="5">Branch Admin </label>
                                </div>
                            </div>

                            <div class="">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="gr_emp1" value="4">Employee </label>
                                </div>
                            </div>

                            <div class="col-md-12 user-permission">
                                <h2>TAMM</h2>
                            </div>
                            <div class="">
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_sad1" value="0">Super Admin</label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_sac1" value="1">Super Accountant </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_da1" value="11">Department Admin </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_ci1" value="12">Controlling Incharge
                                    </label>
                                </div>
                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_co1" value="13">Controlling Office </label>
                                </div>




                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_ac1" value="5">Accountant </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="tamm_emp1" value="4">Employee </label>
                                </div>

                            </div>

                            <div class="col-md-12 user-permission">
                                <h2>EIMS</h2>
                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="eims_ad1" value="0">Admin </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="eims_si1" value="1">Sectional Incharge </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="eims_emp1" value="2">Employee </label>
                                </div>

                            </div>

                            <div class="col-md-12 user-permission">
                                <h2>CGA</h2>
                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label>
                                        <input type="checkbox" id="cga_sa1" value="1"> Super Admin
                                    </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_drm1" value="2"> DRM</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_sdpo1" value="3"> Sr. DPO </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_dpo1" value="4"> DPO</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_wi1" value="5"> Welfare Inspector</label>
                                </div>

                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_cc1" value="6"> Confidential Clerk </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_rc1" value="7"> Recruitment Cell</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_dc1" value="8"> DAK Clerk</label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="cga_ap1" value="0"> Applicant</label>
                                </div>

                            </div>

                            <div class="col-md-12 user-permission">
                                <h2>IT-Perticulars</h2>
                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="itp_ad1" value="0">Admin </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="itp_emp1" value="1">Employee </label>
                                </div>

                            </div>

                            <div class="col-md-12 user-permission">
                                <h2>e-SAR</h2>
                            </div>

                            <div class="">

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="sar_ad1" value="0"> Admin </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="sar_cl1" value="1"> Clerk </label>
                                </div>

                                <div class="checkbox col-md-2 col-lg-2 col-sm-2 col-xs-12">
                                    <label> <input type="checkbox" id="sar_emp1" value="2"> Employee </label>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <ul class="list-inline m-t30">
                                    <li><button type="button" class="btn btn-info prev-step">Previous</button></li>
                                    <li><button type="submit"
                                            class="btn btn-success btn-info-full next-step">Save</button></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<footer class="main-footer text-center">

    <h5>&copy; Copyright 2019 <a href="http://www.infoigy.com/" target="_blank">Salgem Infoigy Tech Pvt. Ltd.</a> All
        rights
        reserved.</h5>
</footer>

<aside class="control-sidebar control-sidebar-dark">

    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>

    <div class="tab-content">

        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-user bg-yellow"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>
                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>
            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript::;">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <h3 class="control-sidebar-heading">Chat Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</aside>

<div class="control-sidebar-bg"></div>
</div>
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="dist/js/app.min.js"></script>

<script src="dist/js/demo.js"></script>

<script>
$(document).ready(function() {

    $('.nav-tabs > li a[title]').tooltip();


    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        var $target = $(e.target);

        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });
    $(".next-step").click(function(e) {
        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);
    });
    $(".prev-step").click(function(e) {
        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);
    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

$(document).ready(function() {

    $('.accordion-header').toggleClass('inactive-header');


    var contentwidth = $('.accordion-header').width();
    $('.accordion-content').css({});


    $('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
    $('.accordion-content').first().slideDown().toggleClass('open-content');


    $('.accordion-header').click(function() {
        if ($(this).is('.inactive-header')) {
            $('.active-header').toggleClass('active-header').toggleClass('inactive-header').next()
                .slideToggle().toggleClass('open-content');
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        } else {
            $(this).toggleClass('active-header').toggleClass('inactive-header');
            $(this).next().slideToggle().toggleClass('open-content');
        }
    });

    return false;
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#pf_no').change(function() {
        var pf_no = $('#pf_no').val();
        //alert(pf_no);
        //console.log(pf_no);
        $.ajax({
            url: 'emp_fetch.php',
            type: 'POST',
            data: {
                pf_no: pf_no
            },
            dataType: 'JSON',
            success: function(data) {
                //alert(data);
                //console.log(data);
                if (data == "User is Not Registered") {
                    alert(data);
                    $('#pf_no').val("").focus();
                    $('#name').val("");
                    $('#department').val("");
                    $('#designation').val("");
                    $('#bill_unit').val("");
                    $('#pay_level').val("");
                    $('#mobile').val("");
                    $('#dob').val("");
                } else if (data == "Permission Already Given!") {
                    alert(data);
                    $('#pf_no').val("").focus();
                    $('#name').val("");
                    $('#department').val("");
                    $('#designation').val("");
                    $('#bill_unit').val("");
                    $('#pay_level').val("");
                    $('#mobile').val("");
                    $('#dob').val("");
                } else {
                    $('#name').val(data.name);
                    $('#department').val(data.dept);
                    $('#designation').val(data.desig);
                    $('#bill_unit').val(data.bill_unit);
                    $('#pay_level').val(data.pay_level);
                    $('#mobile').val(data.mobile);
                    $('#dob').val(data.dob);
                    $('#nxt').removeAttr('disabled');
                }
            }
        });

    });
});

// Checkbox Style
$(function() {
    $('.button-checkbox').each(function() {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function() {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function() {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            } else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon +
                    '"></i> ');
            }
        }
        init();
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#btnSave').click(function() {
        var pf_no = $('#pf_no').val();
        // console.log(pf_no);
        $.ajax({
            url: 'emp_fetch.php',
            type: 'POST',
            data: {
                pf_no: pf_no
            },
            dataType: 'JSON',
            success: function(data) {
                $('#pf_no1').val(pf_no);
                $('#name1').val(data.name);
                $('#department1').val(data.dept);
                $('#designation1').val(data.desig);
                $('#bill_unit1').val(data.bill_unit);
                $('#pay_level1').val(data.pay_level);
                $('#mobile1').val(data.mobile);
                $('#dob1').val(data.dob);
            }
        });
    });
})
$(document).ready(function() {

    $('#gr_ad').on('click', function() {
        if ($('#gr_ad').val() == 0) {
            $('#gr_ad1').attr('checked', true);
        }
    });

    $('#gr_so').on('click', function() {
        if ($('#gr_so').val() == 1) {
            $('#gr_so1').attr('checked', true);
        }
    });

    $('#gr_bo').on('click', function() {
        if ($('#gr_bo').val() == 3) {
            $('#gr_bo1').attr('checked', true);
        }
    });

    $('#gr_wi').on('click', function() {
        if ($('#gr_wi').val() == 2) {
            $('#gr_wi1').attr('checked', true);
        }
    });

    $('#gr_ba').on('click', function() {
        if ($('#gr_ba').val() == 5) {
            $('#gr_ba1').attr('checked', true);
        }
    });

    $('#gr_emp').on('click', function() {
        if ($('#gr_emp').val() == 4) {
            $('#gr_emp1').attr('checked', true);
        }
    });

    $('#tamm_sad').on('click', function() {
        if ($('#tamm_sad').val() == 0) {
            $('#tamm_sad1').attr('checked', true);
        }
    });

    $('#tamm_sac').on('click', function() {
        if ($('#tamm_sac').val() == 1) {
            $('#tamm_sac1').attr('checked', true);
        }
    });

    $('#tamm_da').on('click', function() {
        if ($('#tamm_da').val() == 11) {
            $('#tamm_da1').attr('checked', true);
        }
    });

    $('#tamm_ci').on('click', function() {
        if ($('#tamm_ci').val() == 12) {
            $('#tamm_ci1').attr('checked', true);
        }
    });

    $('#tamm_co').on('click', function() {
        if ($('#tamm_co').val() == 13) {
            $('#tamm_co1').attr('checked', true);
        }
    });

    $('#tamm_ac').on('click', function() {
        if ($('#tamm_ac').val() == 5) {
            $('#tamm_ac1').attr('checked', true);
        }
    });

    $('#tamm_emp').on('click', function() {
        if ($('#tamm_emp').val() == 4) {
            $('#tamm_emp1').attr('checked', true);
        }
    });

    $('#eims_ad').on('click', function() {
        if ($('#eims_ad').val() == 0) {
            $('#eims_ad1').attr('checked', true);
        }
    });

    $('#eims_si').on('click', function() {
        if ($('#eims_si').val() == 1) {
            $('#eims_si1').attr('checked', true);
        }
    });

    $('#eims_emp').on('click', function() {
        if ($('#eims_emp').val() == 2) {
            $('#eims_emp1').attr('checked', true);
        }
    });

    $('#cga_sa').on('click', function() {
        if ($('#cga_sa').val() == 1) {
            $('#cga_sa1').attr('checked', true);
        }
    });

    $('#cga_drm').on('click', function() {
        if ($('#cga_drm').val() == 2) {
            $('#cga_drm1').attr('checked', true);
        }
    });

    $('#cga_sdpo').on('click', function() {
        if ($('#cga_sdpo').val() == 3) {
            $('#cga_sdpo1').attr('checked', true);
        }
    });

    $('#cga_dpo').on('click', function() {
        if ($('#cga_dpo').val() == 4) {
            $('#cga_dpo1').attr('checked', true);
        }
    });

    $('#cga_wi').on('click', function() {
        if ($('#cga_wi').val() == 5) {
            $('#cga_wi1').attr('checked', true);
        }
    });

    $('#cga_cc').on('click', function() {
        if ($('#cga_cc').val() == 6) {
            $('#cga_cc1').attr('checked', true);
        }
    });

    $('#cga_rc').on('click', function() {
        if ($('#cga_rc').val() == 7) {
            $('#cga_rc1').attr('checked', true);
        }
    });

    $('#cga_dc').on('click', function() {
        if ($('#cga_dc').val() == 8) {
            $('#cga_dc1').attr('checked', true);
        }
    });

    $('#cga_ap').on('click', function() {
        if ($('#cga_ap').val() == 0) {
            $('#cga_ap1').attr('checked', true);
        }
    });


    $('#itp_ad').on('click', function() {
        if ($('#itp_ad').val() == 0) {
            $('#itp_ad1').attr('checked', true);
        }
    });

    $('#itp_emp').on('click', function() {
        if ($('#itp_emp').val() == 1) {
            $('#itp_emp1').attr('checked', true);
        }
    });

    $('#sar_ad').on('click', function() {
        if ($('#sar_ad').val() == 0) {
            $('#sar_ad1').attr('checked', true);
        }
    });

    $('#sar_cl').on('click', function() {
        if ($('#sar_cl').val() == 1) {
            $('#sar_cl1').attr('checked', true);
        }
    });

    $('#sar_emp').on('click', function() {
        if ($('#sar_emp').val() == 2) {
            $('#sar_emp1').attr('checked', true);
        }
    });

});
</script>

</body>

</html>