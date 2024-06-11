<?php
include_once("common/headerlogin.php");
require_once 'list.php';
?>
<style>
.toggle {
    color: #888;
    font-size: 15px;
    font-weight: 600;
}

.toggle input[type="checkbox"],
.toggle input[type="radio"] {
    position: absolute;
    right: 9000px;
}

.toggle input[type="radio"]+.label-text:before {
    /* position: absolute; */
    /* right: 9000px; */
    content: "\f204";
    font-family: "FontAwesome";

    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    width: 1em;
    display: inline-block;
    margin-right: 10px;
}

.toggle input[type="radio"]:checked+.label-text:before {
    content: "\f205";
    color: #ed1d24;
    animation: effect 250ms ease-in;
}

.toggle input[type="radio"]:disabled+.label-text {
    color: #aaa;
}

.toggle input[type="radio"]:disabled+.label-text:before {
    content: "\f204";
    color: #ccc;
}


@keyframes effect {
    0% {
        transform: scale(0);
    }

    25% {
        transform: scale(1.3);
    }

    75% {
        transform: scale(1.4);
    }

    100% {
        transform: scale(1);
    }
}
</style>
<div class="registration-sec">
    <div class="row">
        <!--<div class="login-logo registerform col-md-4 col-lg-4 col-sm-4 hidden-xs text-center p-b20">
			<img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
			<h3>CENTRAL RAILWAY</h3>
			<div class="divider"></div>
			<h4>SOLAPUR DIVISION</h4>
			<p><b>RailSathi</b></p>
			<p>Human Resource Management System</p>
		</div>-->
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="login-box registration-box">
                <div class="login-box-body login-form bg-transparent text-left">
                    <h2>Register</h2>
                    <div class="divider"></div>
                    <div class="clearfix"></div>
                    <form method="POST" action="reg.php" class="p-t20" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" id="curDate1" value="
						<?php echo date('d/m/Y') ?>">
                        <!-- <div class="row">-->
                        <!--   <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12 employeetype">-->
                        <!--     <label><input type="radio" name="emp_type" id="emp_type" value="Serving" checked> Serving</label>-->
                        <!--     <label><input type="radio" name="emp_type" id="emp_type" value="Pensioner"> Pensioner</label> -->
                        <!-- </div> -->
                        <!--</div> -->
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="emp_type" value='Serving' checked>
                                        <span class="label-text">Serving</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6">
                                <div class="form-check">
                                    <label class="toggle">
                                        <input type="radio" name="emp_type" value='Pensioner'>
                                        <span class="label-text">Pensioner</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="PF No." id="pf_no" name="pf_no"
                                    required autofocus>
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" placeholder="Name" id="name" name="name"
                                    onkeydown="this.value=this.value.replace(/[^a-zA-Z ]/g,'');" required>
                            </div>
                            <div class="form-group col-md-3 col-lg-3 col-sm-6 col-xs-12">
                                <input type="number" class="form-control" placeholder="Mobile No" id="mobile"
                                    name="mobile" onkeydown="this.value=this.value.replace(/[^0-9]/g,'');"
                                    onChange="phonenumber(this);" maxlength="10" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                                <select name="designation" id="designation" class="form-control select2" required>
                                    <option value="none">Choose Designation</option>
                                    <?php while ($row_desg = mysqli_fetch_assoc($result_desg)) { ?>
                                    <option value="<?php echo $row_desg['DESIGCODE']; ?>">
                                        <?php echo $row_desg['DESIGLONGDESC']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                                <select name="department" id="department" class="form-control select2" required>
                                    <option value="none">Choose Department</option>
                                    <?php while ($row_dept = mysqli_fetch_assoc($result_dept)) { ?>
                                    <option value="<?php echo $row_dept['DEPTNO']; ?>">
                                        <?php echo $row_dept['DEPTDESC']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                                <select name="bill_unit" id="bill_unit" class="form-control select2" required>
                                    <option value="none">Choose Bill Unit</option>
                                    <?php while ($row_bill = mysqli_fetch_assoc($result_bill)) { ?>
                                    <option value="<?php echo $row_bill['billunit']; ?>">
                                        <?php echo $row_bill['billunit']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                                <select name="station" id="station" class="form-control select2" required>
                                    <option value="none">Choose Station</option>
                                    <?php while ($row_station = mysqli_fetch_assoc($result_station)) { ?>
                                    <option value="<?php echo $row_station['stationcode']; ?>">
                                        <?php echo $row_station['stationdesc']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <input type="text" class="form-control" placeholder="Basic Pay" id="basic_pay"
                                    name="basic_pay" required>
                            </div>
                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <select class="form-control select2" name="pay_level" id="pay_level" required>
                                    <option value="none">Choose 7th CPC Pay Level</option>
                                    <?php while ($row_pay_level = mysqli_fetch_assoc($result_pay_level)) { ?>
                                    <option value="<?php echo $row_pay_level['num']; ?>">
                                        <?php echo $row_pay_level['pay_text']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <!--<label for="txtDateOfAppointment" class="lbl">Date Of Appointment</label>-->
                                <input type="text" class="form-control datepicker replacetext NumberDash" name="doa"
                                    id="doa" placeholder="Date Of Appointment" required>
                            </div>

                            <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <!--<label for="txtDOB" class="lbl">Date Of Birth</label>-->
                                <input type="text" class="form-control datepicker replacetext NumberDash" id="dob"
                                    name="dob" required placeholder="Date Of Birth">
                            </div>

                            <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <input type="file" class="form-control-file" id="signature" name="signature" required>
                            </div>

                        </div>
                        <div class="row">
                            <!-- <input type="hidden" name="station" id="station"><input type="hidden" name="doa" id="doa"><input type="hidden" name="basic_pay" id="basic_pay"><input type="hidden" name="emp_type" id="emp_type"> -->
                            <input type="hidden" name="add1" id="add1">
                            <input type="hidden" name="add2" id="add2">
                            <input type="hidden" name="email" id="email">
                            <input type="hidden" name="aad" id="aad">
                            <input type="hidden" name="state" id="state">
                            <input type="hidden" name="city" id="city">
                            <input type="hidden" name="pincode" id="pincode">
                            <input type="hidden" name="office" id="office">
                            <input type="hidden" name="off_state" id="off_state">
                            <input type="hidden" name="off_city" id="off_city">
                            <input type="hidden" name="off_add1" id="off_add1">
                            <input type="hidden" name="off_add2" id="off_add2">
                            <input type="hidden" name="off_pin" id="off_pin">
                            <input type="hidden" name="community" id="community">
                            <input type="hidden" name="handi" id="handi">
                            <input type="hidden" name="gender" id="gender">
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-md-3 submit-btn text-center">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Register">
                            </div>
                            <div class="col-xs-12 col-md-12">
                                <div class="checkbox icheck forgot-text registerlink">
                                    <p class="text-white">Already have an account?
                                        <a href="index.php"> Login now</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copyrighttext">
                <p class="text-white">Design &amp; Developed by <a href="http://infoigy.com" target="_blank">Infoigy</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include_once("common/footerlogin.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Include Select2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!--<script type="text/javascript" src="new_eta/assets/global/plugins/select2/select2.min.js"></script>-->
<script>
$(document).ready(function() {
    $(".select2").select2();
});
$(document).on("input change paste", ".NumberDash", function() {
    var newVal = $(this).val().replace(/[^0-9/\s]/g, '');
    $(this).val(newVal);
});
</script>