<?php
require_once 'list.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HRMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <!-- Custome css -->
    <link rel="stylesheet" href="dist/css/custome.css">
    <link rel="stylesheet" href="dist/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet" />


</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo registerform col-md-12 col-lg-12 col-sm-12 hidden-xs text-center p-b20">
            <div class="col-md-3 col-lg-3 col-sm-3"><img src="dist/img/login/logo.png" alt="E Pension Booklet Logo">
            </div>
            <div class="col-md-9 col-lg-9 col-sm-9 text-left">
                <h3>CENTRAL RAILWAY</h3>
                <h4>SOLAPUR DIVISION</h4>
                <p>Human Resource Management System (HRMS)</p>
            </div>
        </div><!-- /.login-logo -->
        <div class="login-box-body login-form bg-transparent text-left">
            <h2>Register</h2>
            <div class="divider pull-left"></div>
            <div class="clearfix"></div>
            <div class="row">
                <form method="post" class="p-t20" action="reg.php">
                    <div class="form-group col-md-12 col-lg-12 col-sm-12 col-xs-12 employeetype">
                        <label><input type="radio" name="employeetype"> Serving</label>
                        <label><input type="radio" name="employeetype"> Pensioner</label>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <input type="text" class="form-control" placeholder="PF No." id="pf_no" name="pf_no" required>
                    </div>
                    <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                    </div>
                    <div class="form-group col-md-3 col-lg-3 col-sm-3 col-xs-12">
                        <input type="number" class="form-control" placeholder="Mobile No" id="mobile" name="mobile"
                            onkeydown="this.value=this.value.replace(/[^0-9]/g,'');" required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                        <!-- <input type="text" class="form-control" placeholder="Designation">
                     -->
                        <select name="designation" id="designation" class="form-control" required>
                            <option value="none">Choose Designation</option>
                            <?php while ($row_desg = mysqli_fetch_assoc($result_desg)) { ?>
                            <option value="<?php echo $row_desg['DESIGCODE']; ?>">
                                <?php echo $row_desg['DESIGLONGDESC']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12 bgtransparent">
                        <!-- <input type="text" class="form-control" placeholder="Department"> -->
                        <select name="department" id="department" class="form-control" required>
                            <option value="none">Choose Department</option>
                            <?php while ($row_dept = mysqli_fetch_assoc($result_dept)) { ?>
                            <option value="<?php echo $row_dept['DEPTNO']; ?>"><?php echo $row_dept['DEPTDESC']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-6 bgtransparent">
                        <!-- <input type="text" class="form-control" placeholder="Bill Unit"> -->
                        <select name="bill_unit" id="bill_unit" class="form-control" required>
                            <option value="none">Choose Bill Unit</option>
                            <?php while ($row_bill = mysqli_fetch_assoc($result_bill)) { ?>
                            <option value="<?php echo $row_bill['billunit']; ?>"><?php echo $row_bill['billunit']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-6 bgtransparent">
                        <!-- <input type="text" class="form-control" placeholder="Station">-->
                        <select name="station" id="station" class="form-control" required>
                            <option value="none">Choose Station</option>
                            <?php while ($row_station = mysqli_fetch_assoc($result_station)) { ?>
                            <option value="<?php echo $row_station['stationcode']; ?>">
                                <?php echo $row_station['stationdesc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-6">
                        <input type="text" class="form-control" placeholder="Basic Pay" id="basic_pay" name="basic_pay"
                            required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-6">
                        <input type="text" class="form-control" placeholder="7th CPC Pay level" id="pay_level"
                            name="pay_level" required>
                    </div>
                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <!--<label for="txtDateOfAppointment" class="lbl">Date Of Appointment</label>-->
                        <input type="text" class="form-control datepicker replacetext NumberDash" name="doa" id="doa"
                            placeholder="Date Of Appointment" required>
                    </div>

                    <div class="form-group col-md-4 col-lg-4 col-sm-4 col-xs-12">
                        <!--<label for="txtDOB" class="lbl">Date Of Birth</label>-->
                        <input type="text" class="form-control datepicker replacetext NumberDash" id="dob" name="dob"
                            required placeholder="Date Of Birth">
                    </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-md-3 submit-btn text-center">
                    <input type="submit" class="btn btn-info btn-block btn-flat" value="Register">
                </div>
                <!-- <div class="col-xs-12 col-md-12">
                <div class="checkbox icheck forgot-text registerlink">
                    <a href="Login.php">Already have an account Login now</a>
                </div>
            </div> -->
                </form>
            </div>
        </div>
        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/Common.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
        <!-- iCheck -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#pf_no').blur(function() {
                var pf_no = $('#pf_no').val();
                //alert(pf_no);
                $.ajax({
                    url: 'emp_fetch.php',
                    type: 'POST',
                    data: {
                        pf_no: pf_no
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        if (data == "Exist") {
                            alert(data);
                            $('#name').val("");
                            $('#mobile').val("");
                            $('#designation').val("none").trigger("change");
                            $('#department').val("none").trigger("change");
                            $('#bill_unit').val("none").trigger("change");
                            $('#station').val("none").trigger("change");
                            $('#pay_level').val("");
                        } else if (data == "New_User") {

                            $('#name').val("");
                            $('#mobile').val("");
                            $('#designation').val("none").trigger("change");
                            $('#department').val("none").trigger("change");
                            $('#bill_unit').val("none").trigger("change");
                            $('#station').val("none").trigger("change");
                            $('#pay_level').val("");
                        } else {
                            $('#name').val(data.empname);
                            $('#mobile').val(data.mobile);
                            $('#designation').val(data.desigcode);
                            $('#department').val(data.deptcode);
                            $('#bill_unit').val(data.billunit);
                            $('#station').val(data.stationcode);
                            $('#pay_level').val(data.pc7_level);
                        }
                    }
                });

            });
        });
        </script>

</body>

</html>