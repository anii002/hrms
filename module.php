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
        $roles = array(
            "0" => "Super Admin",
            "1" => "Super Account",
            "11" => "Department Admin",
            "12" => "Controlling Incharge",
            "13" => "Controlling Office",
            "5" => "Accountant",
            "4" => "Employee",
            "14" => "Personnel Admin",
            "15" => "Branch Officer",
            "16" => "Personnel Clerk",
            "17" => "APO",
            "21" => "Employee",
            "22" => "SO",
            "23" => "SO Admin",
            "24" => "ADFM"
        );

        foreach ($roles as $value => $label) {
            $checked = (in_array($value, $tamm)) ? 'checked' : '';
?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="tamm" id="<?php echo strtolower(str_replace(' ', '', $label)); ?>" value="<?php echo $value; ?>" <?php echo $checked; ?>>
                        <?php echo $label; ?>
                    </label>
                </div>
            </div>
        <?php
        }
    }


    if ($name == 'e_gr') {
        $e_gr = explode(',', $row['e_grievance']);
        $roles = [
            0 => 'Admin',
            1 => 'Section Officer',
            2 => 'Welfare Inspector',
            3 => 'Branch Officer',
            4 => 'Accountant',
            5 => 'Branch Admin'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $e_gr) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="e_gr" id="<?php echo strtolower(str_replace(' ', '', $roleLabel)); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
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
        $roles = [
            1 => 'Superadmin',
            2 => 'DRM',
            3 => 'Sr. DPO',
            4 => 'DPO',
            5 => 'Welfare Inspector',
            6 => 'Confidential Clerk',
            7 => 'Recruitment Cell',
            8 => 'DAK Clerk',
            0 => 'Applicant'
        ];

        foreach ($roles as $roleId => $roleLabel) {
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="cga" id="<?php echo strtolower(str_replace(' ', '', $roleLabel)); ?>" value="<?php echo $roleId; ?>" <?php if (in_array($roleId, $cga)) echo 'checked'; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
    }


    if ($name == 'itp') {
        $itp = explode(',', $row['it_form']);
        $roles = [
            0 => 'Admin',
            1 => 'Employee'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $itp) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="itp" id="<?php echo strtolower($roleLabel); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
    }

    if ($name == 'sar') {
        $sar = explode(',', $row['e_sar']);
        ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-check">
                <div class="radio-container" style="display: flex; justify-content: space-between;">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sar" id="admin" value="0" <?php if (in_array("0", $sar)) echo 'checked'; ?>>
                        Admin
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sar" id="clerk" value="1" <?php if (in_array("1", $sar)) echo 'checked'; ?>>
                        Clerk
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sar" id="employee" value="2" <?php if (in_array("2", $sar)) echo 'checked'; ?>>
                        Employee
                    </label>
                </div>
            </div>
        </div>
        <?php
    }

    if ($name == 'frm') {
        $forms = explode(',', $row['forms']);
        $roles = [
            0 => 'Admin',
            1 => 'Employee'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $forms) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="forms" id="<?php echo strtolower($roleLabel); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
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
        $roles = [
            0 => 'Admin',
            1 => 'Billunit Clerk',
            2 => 'Chief OS',
            3 => 'Employee'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $e_app) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="e_app" id="<?php echo strtolower(str_replace(' ', '', $roleLabel)); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
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
        $roles = [
            0 => 'Admin',
            1 => 'Control Incharge',
            2 => 'SBF Admin',
            3 => 'CSBF Admin',
            4 => 'Employee'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $sbf) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sbf" id="<?php echo strtolower(str_replace(' ', '', $roleLabel)); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
        <?php
        }
    }

    if ($name == 'dar') {
        $dar = explode(',', $row['dar']);
        $roles = [
            1 => 'Admin',
            2 => 'Clerk',
            3 => 'Discipline Authority',
            4 => 'Inquiry Officer',
            7 => 'Employee'
        ];

        foreach ($roles as $roleId => $roleLabel) {
            $checked = in_array((string)$roleId, $dar) ? 'checked' : '';
        ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="dar" id="<?php echo strtolower(str_replace(' ', '', $roleLabel)); ?>" value="<?php echo $roleId; ?>" <?php echo $checked; ?>>
                        <?php echo $roleLabel; ?>
                    </label>
                </div>
            </div>
<?php
        }
    }
} ?>