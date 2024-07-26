<!--nominee Tab Start -->

<?php

$_GLOBALS['a'] = 'nominee';

include_once('../global/header1.php'); ?>

<div style="padding:50px;border:1px solid black;margin:10px;">

    <ul class="tab-links">

        <li class="active"><a href="#tab1">PF Nominee</a></li>

        <li><a href="#tab2">GIS Nominee</a></li>

        <li><a href="#tab3">Gratuity Nominee</a></li>

    </ul>



    <div class="tab-content">

        <div id="tab1" class="tab active">

            <div class="tab-pane city" id="pf_nominee">

                <div class="box-header with-border">

                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;PF Nominee</h3><button type="button" id="pf_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>

                </div><br>

                <form action="process_main.php?action=add_pf_nominee" method="POST" class="apply_readonly">

                    <div class="modal-body">

                        <div id="append_PFdata">

                        </div>

                        <div class="row">

                            <div class='box-header'>
                                <h3 class='box-title'><i class='fa fa-book'></i> 1 PF Nominee</h3>
                                <hr />
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="nom_pf1" name="nom_pf1" readonly required />

                                    </div>

                                </div>

                            </div>



                        </div><br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of Nominee(s)</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="nom_name1" name="nom_name1" style="width:100%;" required>

                                            <option selected value="blank">

                                                <?php

$conn= dbcon1();

                                                $sql = mysqli_query($conn,"select * from family_temp where emp_pf='" . $_SESSION['same_pf_no'] . "'");

                                                //echo "select * from family_temp where emp_pf='".$_SESSION['same_pf_no']."'".mysqli_error();

                                                while ($result = mysqli_fetch_array($sql)) {

                                                    echo "<option value='" . $result['id'] . "'>" . $result['fmy_member'] . "</option>";
                                                }

                                                ?>

                                        </select>

                                        <!--input type="text" class="form-control primary" id="nom_name1" name="nom_name1" placeholder="Enter Name of Nominee" required /-->

                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="nomn_rel1" name="nomn_rel1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Relationship --</option>

                                            <?php

$conn=dbcon();

                                            $sqlDept = mysqli_query($conn,"select * from relation");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="nom_otherrel1" name="nom_otherrel1" placeholder="Enter Relationship" />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary percentage" id="nom_perc1" name="nom_perc1" placeholder="Enter Percentage" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="nom_status1" name="nom_status1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Marital Status --</option>

                                            <?php

$conn= dbcon();

                                            $sqlDept = mysqli_query($conn,"select * from marital_status");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>">

                                                    <?php echo $rwDept["shortdesc"]; ?>

                                                </option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="nom_age1" name="nom_age1" placeholder="Enter Age of Nominee" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary calender_picker" id="nom_dob1" name="nom_dob1" placeholder="Enter Date" required />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee PAN No<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber" id="nom_pan1" name="nom_pan1" maxlength="10" placeholder="Enter Nominee PAN Number" required />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Nominee Aadhar<span class=""></span></label>

                                    <div class="col-md-4 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary onlyNumber" id="nom_adhr1" name="nom_adhr1" placeholder="Enter Nominee Aadhar Number" required maxlength="12" />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Address of Nominee</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="nom_address1" name="nom_address1" placeholder="Enter Address of Nominee"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Contingencies</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="nom_conting1" name="nom_conting1" placeholder="Enter Contingencies"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>

                                    <div class="col-md-10">

                                        <textarea rows="3" style="resize:none;" class="form-control primary description" id="nom_subsciber1" name="nom_subsciber1" placeholder="Enter Name"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div></br>

                        <input type="hidden" id="nominee_type" value="PF">

                        <input type="hidden" id="pf_counter" name="pf_counter" />

                        <br>

                        <div class="form-group">

                            <div class="col-sm-3 col-xs-12 pull-right">

                                <input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

                                <input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />

                                <!--a href="#witness" style="display:none;" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->

                                <br><br><br>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        <div id="tab2" class="tab">

            <div class="tab-pane city active" id="gis_nominee">

                <div class="box-header with-border">

                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;GIS Nominee</h3><button type="button" id="gis_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>

                </div><br>

                <form action="process_main.php?action=add_gis_nominee" method="POST" class="apply_readonly">

                    <div class="modal-body">

                        <div id="append_GISdata">

                        </div><br />

                        <div class='box-header'>
                            <h3 class='box-title'><i class='fa fa-book'></i> First Person GIS Nominee</h3>
                            <hr />
                        </div>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gis_pf1" name="gis_pf1" readonly required />

                                    </div>

                                </div>

                            </div>



                        </div><br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of Nominee(s)</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select name="gis_name1" id="gis_name1" class="form-control select2" style="margin-top:0px; width:100%;" required>

                                            <option selected value="blank">--Select Nominee--</option>

                                            <?php

$conn=dbcon1();

                                            $sql = mysqli_query($conn,"select * from family_temp where emp_pf='" . $_SESSION['same_pf_no'] . "'");

                                            echo "select * from family_temp where emp_pf='" . $_SESSION['same_pf_no'] . "'" . mysqli_error($conn);

                                            while ($result = mysqli_fetch_array($sql)) {

                                                echo "<option value='" . $result['id'] . "'>" . $result['fmy_member'] . "</option>";
                                            }

                                            ?>

                                        </select>

                                        <!--input type="text" class="form-control primary" id="gis_name1" name="gis_name1" placeholder="Enter Name of Nominee" required /-->

                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="gis_rel1" name="gis_rel1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Relationship --</option>

                                            <?php

                                            dbcon();

                                            $sqlDept = mysqli_query($conn,"select * from relation");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="gis_otherrel1" name="gis_otherrel1" placeholder="Enter Relationship" />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary percentage2" id="gis_perc1" name="gis_perc1" placeholder="Enter Percentage" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="gis_status1" name="gis_status1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Marital Status --</option>

                                            <?php

                                            $sqlDept = mysqli_query($conn,"select * from marital_status");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>">

                                                    <?php echo $rwDept["shortdesc"]; ?>

                                                </option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="gis_age1" name="gis_age1" placeholder="Enter Age of Nominee" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary calender_picker" id="gis_dob1" name="gis_dob1" placeholder="Enter Name of Nominee" required />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee PAN No<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber" id="gis_pan1" name="gis_pan1" placeholder="Enter Nominee PAN Number" maxlength="10" required />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Nominee Aadhar<span class=""></span></label>

                                    <div class="col-md-4 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary onlyNumber" id="gis_adhr1" name="gis_adhr1" placeholder="Enter Nominee Aadhar Number" required maxlength="12" />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Address of Nominee</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="gis_address1" name="gis_address1" placeholder="Enter Address of Nominee"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Contingencies</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="gis_conting1" name="gis_conting1" placeholder="Enter Contingencies"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>

                                    <div class="col-md-10">

                                        <textarea rows="3" style="resize:none;" class="form-control primary description" id="gis_subsciber1" name="gis_subsciber1" placeholder="Enter Name"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <input type="hidden" id="nominee_type_gis" name="nominee_type_gis" value="GIS">

                        <input type="hidden" id="gis_counter" name="gis_counter" />

                        <br>

                        <div class="form-group">

                            <div class="col-sm-3 col-xs-12 pull-right">

                                <input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

                                <input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />

                                <!--a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->

                                <br><br><br>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>



        <div id="tab3" class="tab">

            <div class="tab-pane city" id="gra_nominee">

                <div class="box-header with-border">

                    <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Gratuity Nominee</h3><button type="button" id="gra_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>

                </div><br>

                <form action="process_main.php?action=add_gra_nominee" method="POST" class="apply_readonly">

                    <div class="modal-body">

                        <div id="append_GRAdata">



                        </div>

                        <div class="row">

                            <div class='box-header'>
                                <h3 class='box-title'><i class='fa fa-book'></i> First Person Gratuity Nominee</h3>
                                <hr />
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gra_pf1" name="gra_pf1" readonly required />

                                    </div>

                                </div>

                            </div>



                        </div><br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Name of Nominee(s)</label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select name="gra_name1" id="gra_name1" class="form-control select2" style="margin-top:0px; width:100%;" required>

                                            <option selected value="blank">--Select Nominee--</option>

                                            <?php

$conn=dbcon1();

                                            $sql = mysqli_query($conn,"select * from family_temp where emp_pf='" . $_SESSION['same_pf_no'] . "'");

                                            echo "select * from family_temp where emp_pf='" . $_SESSION['same_pf_no'] . "'" . mysqli_error($conn);

                                            while ($result = mysqli_fetch_array($sql)) {

                                                echo "<option value='" . $result['id'] . "'>" . $result['fmy_member'] . "</option>";
                                            }

                                            ?>

                                        </select>

                                        <!--input type="text" class="form-control primary" id="gra_name1" name="gra_name1" placeholder="Enter Name of Nominee" required /-->

                                    </div>

                                </div>

                            </div>



                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="gra_rel1" name="gra_rel1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Relationship --</option>

                                            <?php

$conn= dbcon();

                                            $sqlDept = mysqli_query($conn,"select * from relation");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="gra_otherrel1" name="gra_otherrel1" placeholder="Enter Relationship" />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary percentage3" id="gra_perc1" name="gra_perc1" placeholder="Enter Percentage" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <select class="form-control primary select2" id="gra_status1" name="gra_status1" style="width:100%;" required>

                                            <option value="" selected hidden disabled>-- Select Marital Status --</option>

                                            <?php

                                            $sqlDept = mysqli_query($conn,"select * from marital_status");

                                            while ($rwDept = mysqli_fetch_array($sqlDept)) {

                                            ?>

                                                <option value="<?php echo $rwDept["id"]; ?>">

                                                    <?php echo $rwDept["shortdesc"]; ?>

                                                </option>

                                            <?php

                                            }



                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary" id="gra_age1" name="gra_age1" placeholder="Enter Age of Nominee" required />

                                    </div>

                                </div>

                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary calender_picker" id="gra_dob1" name="gra_dob1" placeholder="Enter Name of Nominee" required />

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Nominee PAN No<span class=""></span></label>

                                    <div class="col-md-8 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary TextNumber" id="gra_pan1" name="gra_pan1" placeholder="Enter Nominee PAN Number" maxlength="10" required />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 col-sm-3 col-xs-12">Nominee Aadhar<span class=""></span></label>

                                    <div class="col-md-4 col-sm-8 col-xs-12">

                                        <input type="text" class="form-control primary onlyNumber" id="gra_adhr1" name="gra_adhr1" placeholder="Enter Nominee Aadhar Number" maxlength="12" required />

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Address of Nominee</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="gra_address1" name="gra_address1" placeholder="Enter Address of Nominee"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Contingencies</label>

                                    <div class="col-md-10">

                                        <textarea rows="2" style="resize:none;" class="form-control primary description" id="gra_conting1" name="gra_conting1" placeholder="Enter Contingencies"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="form-group">

                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>

                                    <div class="col-md-10">

                                        <textarea rows="3" style="resize:none;" class="form-control primary description" id="gra_subsciber1" name="gra_subsciber1" placeholder="Enter Name"></textarea>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <input type="hidden" id="nominee_type_gra" name="nominee_type_gra" value="GRA">

                        <input type="hidden" id="gra_counter" name="gra_counter" />

                        <br>

                        <div class="form-group">

                            <div class="col-sm-3 col-xs-12 pull-right">

                                <input type="hidden" id="txtsession" name="txtsession" class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>" />

                                <input type="submit" id="btnSave" name="btnSave" value="Save" class="btn btn-success" />

                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />

                                <!--a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->

                                <br><br><br>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
    jQuery(document).ready(function() {

        jQuery('.tab .tab-links a').on('click', function(e) {

            var currentAttrValue = jQuery(this).attr('href');



            // Show/Hide Tabs

            jQuery('.tab ' + currentAttrValue).show().siblings().hide();



            // Change/remove current tab to active

            jQuery(this).parent('li').addClass('active').siblings().removeClass('active');



            e.preventDefault();

        });

    });



    $(function() {

        $('.calender_picker').datepicker({

            format: 'dd-mm-yyyy',

            autoclose: true,

            forceParse: false



        });



    });



    var pf_counter_id = 2;

    var gis_counter_id = 2;

    var gra_counter_id = 2;



    function openCity(cityName) {

        var i;

        var x = document.getElementsByClassName("city");

        for (i = 0; i < x.length; i++) {

            x[i].style.display = "none";

        }

        document.getElementById(cityName).style.display = "block";

    }



    $("#pf_counter_btn").on("click", function() {
        debugger;

        $("#pf_counter").val(pf_counter_id);

        var pf_counter = pf_counter_id;

        $.ajax({

            type: "GET",

            url: "process.php",

            data: "action=get_pf&pf_counter=" + pf_counter,

            success: function(data) {

                $("#append_PFdata").prepend(data);

                $("#pf_counter").val(pf_counter_id);

                pf_counter_id++;

                //$(".select2").select2();

            }

        });

    });



    $("#gis_counter_btn").on("click", function() {
        debugger;

        $("#gis_counter").val(gis_counter_id);

        var gis_counter = gis_counter_id;

        $.ajax({

            type: "GET",

            url: "process.php",

            data: "action=get_gis&gis_counter=" + gis_counter,

            success: function(data) {

                $("#append_GISdata").prepend(data);

                $("#gis_counter").val(gis_counter_id);

                gis_counter_id++;

                //$(".select2").select2();

            }

        });

    });



    $("#gra_counter_btn").on("click", function() {
        debugger;

        $("#gra_counter").val(gra_counter_id);

        var gra_counter = gra_counter_id;

        $.ajax({

            type: "GET",

            url: "process.php",

            data: "action=get_gra&gra_counter=" + gra_counter,

            success: function(data) {

                $("#append_GRAdata").prepend(data);

                $("#gra_counter").val(gra_counter_id);

                gra_counter_id++;

                //$(".select2").select2();

            }

        });

    });
</script>

<?php include_once('../global/footer.php'); ?>

<!--nominee Tab End -->