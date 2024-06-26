<?php
require_once 'common/db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pf_num = $_SESSION['pf_num'];
    $sql = "SELECT * FROM user_permission WHERE pf_num = '$pf_num'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    // echo $result die;
    $name = $_POST['name'];
    //echo $name;exit();
    if ($name == 'tamm') {
        $tamm = explode(',', $row['tamm']);
        for ($i = 0; $i < count($tamm); $i++) {
?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($tamm[$i] == "0") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="superadmin" value="0"> Super Admin
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "1") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="superaccount" value="1"> Super Account
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "11") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="departmentadmin" value="11"> Department Admin
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "12") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="controllingincharge" value="12"> Controlling Incharge
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "13") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="controllingoffice" value="13"> Controlling Office
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "5") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="accountant" value="5"> Accountant
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "4") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="employee" value="4" <?php if ($tamm[$i] == "4") echo 'checked'; ?>> Employee
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "14") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="personneladmin" value="14"> Personnel Admin
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "15") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="branchofficer" value="15"> Branch Officer
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "16") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="personnelclerk" value="16"> Personnel Clerk
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "17") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="apo" value="17"> APO
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "21") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="acc_emp" value="21"> Employee
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "22") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="so" value="22"> SO
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "23") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="soa" value="23"> SO Admin
                        </label>
                    <?php } ?>
                    <?php if ($tamm[$i] == "24") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="tamm" id="adfm" value="24"> ADFM
                        </label>
                    <?php } ?>
                </div>
            </div>
        <?php
        }
    }

    if ($name == 'e_gr') {
        $e_gr = explode(',', $row['e_grievance']);
        for ($i = 0; $i < count($e_gr); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($e_gr[$i] == "0") {
                    ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="e_gr" id="admin" value="0"> Admin</label>
                    <?php }
                    if ($e_gr[$i] == 3) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="e_gr" id="branchofficer" value="3"> Branch Officer</label>
                    <?php }
                    if ($e_gr[$i] == 5) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="e_gr" id="branchadmin" value="5"> Branch Admin</label>
                    <?php }
                    if ($e_gr[$i] == 2) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="e_gr" id="welfareinspector" value="2"> Welfare Inspector</label>
                    <?php }
                    if ($e_gr[$i] == 1) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="e_gr" id="sectionofficer" value="1"> Section Officer</label>
                    <?php }
                    if ($e_gr[$i] == 4) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="e_gr" id="accountant" value="4" checked> Employee</label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }

    if ($name == 'eims') {
        $eims = explode(',', $row['e_notification']);
        // Possible values for radio buttons
        $radioValues = ["0", "1", "2"];
        
        foreach ($radioValues as $value) {
            $checked = in_array($value, $eims) ? 'checked' : '';
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($value == "0") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="eims" id="admin" value="0" <?php echo $checked; ?>> Admin
                        </label>
                    <?php } ?>
                    <?php if ($value == "1") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="eims" id="sectionalincharge" value="1" <?php echo $checked; ?>> Sectional Incharge
                        </label>
                    <?php } ?>
                    <?php if ($value == "2") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="eims" id="employee" value="2" <?php echo $checked; ?>> Employee
                        </label>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }
    



    if ($name == 'cga') {
        $cga = explode(',', $row['cga']);
        for ($i = 0; $i < count($cga); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($cga[$i] == 1) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="cga" id="superadmin" value="1"> Superadmin </label>
                    <?php }
                    if ($cga[$i] == 2) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="drm" value="2"> DRM </label>
                    <?php }
                    if ($cga[$i] == 3) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="srdpo" value="3"> Sr. DPO </label>
                    <?php }
                    if ($cga[$i] == 4) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="dpo" value="4"> DPO </label>
                    <?php }
                    if ($cga[$i] == 5) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="welfareinspector" value="5"> Welfare Inspector </label>
                    <?php }
                    if ($cga[$i] == 6) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="confidentialclerk" value="6"> Confidential Clerk </label>
                    <?php }
                    if ($cga[$i] == 7) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="recruitmentcell" value="7"> Recruitment Cell </label>
                    <?php }
                    if ($cga[$i] == 8) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="dakclerk" value="8"> DAK Clerk </label>
                    <?php }
                    if ($cga[$i] == "0") { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="cga" id="applicant" value="0"> Applicant </label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }


    if ($name == 'itp') {
        $itp = explode(',', $row['it_form']);
        for ($i = 0; $i < count($itp); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($itp[$i] == "0") { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="itp" id="admin" value="0"> Admin </label>
                    <?php }
                    if ($itp[$i] == 1) { ?>
                        <label class="form-check-label"> <input class="form-check-input" type="radio" name="itp" id="employee" value="1" checked> Employee </label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }

    if ($name == 'sar') {
        $sar = explode(',', $row['e_sar']);
        for ($i = 0; $i < count($sar); $i++) {
        ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-check">
                    <div class="radio-container" style="display: flex; justify-content: space-between;">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sar" id="admin" value="0" <?php if ($sar[$i] == "0") echo 'checked'; ?>>
                            Admin
                        </label>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sar" id="clerk" value="1" <?php if ($sar[$i] == "1") echo 'checked'; ?>>
                            Clerk
                        </label>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="sar" id="employee" value="2" <?php if ($sar[$i] == "2") echo 'checked'; ?>>
                            Employee
                        </label>
                    </div>
                </div>
            </div>
        <?php
        }
    }





    if ($name == 'frm') {
        $forms = explode(',', $row['forms']);
        for ($i = 0; $i < count($forms); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($forms[$i] == "0") { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="forms" id="forms" value="0"> Admin </label>
                    <?php }
                    if ($forms[$i] == 1) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="forms" id="forms" value="1"> Employee </label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }


    if ($name == 'apar') {
        $apar = explode(',', $row['e_apar']);
        $options = [
            0 => 'Main Admin',
            1 => 'Admin',
            2 => 'Officer General',
            3 => 'Officer Departmental',
            4 => 'Cadder Cheif Office Superitendent',
            5 => 'Technical',
            6 => 'Employee'
        ];
    
        // Loop through each option and generate radio buttons
        foreach ($options as $key => $label) {
            ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="apar" id="<?= strtolower(str_replace(' ', '', $label)) ?>" value="<?= $key ?>" <?= (in_array($key, $apar)) ? 'checked' : '' ?>>
                        <?= $label ?>
                    </label>
                </div>
            </div>
            <?php
        }
    }
    

    // e-application
    if ($name == 'eapp') {
        $e_app = explode(',', $row['e_app']);
        for ($i = 0; $i < count($e_app); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($e_app[$i] == "0") { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="e_app" id="e_app" value="0"> Admin </label>
                    <?php } ?>
                    <?php if ($e_app[$i] == 1) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="e_app" id="e_app" value="1"> Billunit Clerk </label>
                    <?php } ?>
                    <?php if ($e_app[$i] == 2) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="e_app" id="e_app" value="2"> Chief OS </label>
                    <?php } ?>
                    <?php if ($e_app[$i] == 3) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="e_app" id="e_app" value="3"> Employee </label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }


    if ($name == 'dak') {
        $dak = explode(',', $row['e_dak']);
        // Possible values for radio buttons
        $radioValues = ["0", "1", "2"];

        foreach ($radioValues as $value) {
            $checked = in_array($value, $dak) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($value == "0") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="dak" id="admin" value="0" <?php echo $checked; ?>> Admin
                        </label>
                    <?php } ?>
                    <?php if ($value == "1") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="dak" id="clerk" value="1" <?php echo $checked; ?>> Clerk
                        </label>
                    <?php } ?>
                    <?php if ($value == "2") { ?>
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="dak" id="sectionuser" value="2" <?php echo $checked; ?>> Section User
                        </label>
                    <?php } ?>
                </div>
            </div>
        <?php
        }
    }

    if ($name == 'feed') {
        $feed = explode(',', $row['feedback']);
        for ($i = 0; $i < count($feed); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($feed[$i] == "0") { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="feed" id="admin" value="0"> Admin </label>
                    <?php }
                    if ($feed[$i] == 3) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="feed" id="employee" value="3"> Employee </label>
                    <?php }  ?>
                </div>
            </div>
        <?php }
    }


    if ($name == 'sbf') {
        $sbf = explode(',', $row['sbf']);
        for ($i = 0; $i < count($sbf); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($sbf[$i] == 0) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="sbf" value="0"> Admin</label>
                    <?php }
                    if ($sbf[$i] == 1) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="sbf" value="1"> Control Incharge</label>
                    <?php }
                    if ($sbf[$i] == 2) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="sbf" value="2"> SBF Admin</label>
                    <?php }
                    if ($sbf[$i] == 3) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="sbf" value="3"> CSBF Admin</label>
                    <?php }
                    if ($sbf[$i] == 4) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="sbf" value="4"> Employee</label>
                    <?php } ?>
                </div>
            </div>
        <?php }
    }

    if ($name == 'dar') {
        $dar = explode(',', $row['dar']);
        for ($i = 0; $i < count($dar); $i++) { ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <?php if ($dar[$i] == 1) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="dar" value="1"> Admin</label>
                    <?php }
                    if ($dar[$i] == 2) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="dar" value="2"> Clerk</label>
                    <?php }
                    if ($dar[$i] == 3) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="dar" value="3"> Discipline Authority</label>
                    <?php }
                    if ($dar[$i] == 4) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="dar" value="4"> Inquiry Officer</label>
                    <?php }
                    if ($dar[$i] == 7) { ?>
                        <label class="form-check-label"><input class="form-check-input" type="radio" name="dar" value="7">Employee</label>
                    <?php } ?>
                </div>
            </div>

<?php }
    }
} ?>