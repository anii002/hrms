<?php
date_default_timezone_set("Asia/kolkata");
include('../dbcon.php');
include('adminFunction.php');

// Helper function to sanitize input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Switch case to handle various actions
switch ($_REQUEST['action']) {
    case 'fetchEmployee1':
        $id = sanitize($_REQUEST['id']);
        echo fetchEmployee1($id);
        break;

    case 'changeimg':
        if (isset($_FILES["profile"]) && changeimg($_FILES["profile"]["name"], $_FILES["profile"]["tmp_name"])) {
            echo "<script>alert('Profile photo uploaded successfully');window.location='../profile.php';</script>";
        } else {
            echo "<script>alert('Failed to upload');window.location='../profile.php';</script>";
        }
        break;

    case 'admincancel':
        $empid = sanitize($_REQUEST['empid']);
        $ref = sanitize($_REQUEST['ref']);
        $original_id = sanitize($_REQUEST['original_id']);
        if (admincancel($empid, $ref, $original_id)) {
            echo "<script>alert('Travelling Allowance Claim returned');window.location='../Show_claimed_TA.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
        }
        break;

    case 'changePass':
        $pass = sanitize($_REQUEST['pass']);
        $confirm = sanitize($_REQUEST['confirm']);
        if ($pass == $confirm) {
            if (changePass($pass, $confirm))
                echo "<script>alert('User Password changed successfully'); window.location='../profile.php';</script>";
            else
                echo "<script>alert('User Password not changed'); window.location='../profile.php';</script>";
        } else {
            echo "<script>alert('Confirm password must match with password');window.location='../profile.php';</script>";
        }
        break;

    case 'addEmployee':
        $empid = sanitize($_REQUEST['empid']);
        $pan = sanitize($_REQUEST['pannumber']);
        $fullname = sanitize($_REQUEST['empname']);
        $billunit = sanitize($_REQUEST['billunit']);
        $mobile = sanitize($_REQUEST['mobile']);
        $gradepay = sanitize($_REQUEST['gradepay']);
        $design = sanitize($_REQUEST['design']);
        $level = sanitize($_REQUEST['paylevel']);

        if (isset($_POST['submit'])) {
            if (addEmployee($empid, $pan, $fullname, $billunit, $mobile, $gradepay, $design, $level)) {
                echo "<script>alert('Employee Added successfully');window.location='../employee_registration.php';</script>";
            } else {
                echo "<script>alert('Something went wrong');window.location='../employee_registration.php';</script>";
            }
        } else {
            if (updateEmployee($empid, $pan, $fullname, $billunit, $mobile, $gradepay, $design, $level, $_POST['update_id'])) {
                echo "<script>alert('Employee data updated successfully...');window.location='../employee_registration.php';</script>";
            } else {
                echo "<script>alert('Failed to update employee data...');window.location='../employee_registration.php';</script>";
            }
        }
        break;

    case 'FetchEmployee':
        $id = sanitize($_REQUEST['id']);
        echo FetchEmployee($id);
        break;

    case 'deleteEmployee':
        $delete_id = sanitize($_REQUEST['delete_id']);
        if (deleteEmployee($delete_id)) {
            echo "<script>alert('Employee Details Deleted successfully');window.location='../user_registration.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../user_registration.php';</script>";
        }
        break;

    case 'claimTA':
        $cnt = sanitize($_REQUEST['hide_count']);
        $empid = sanitize($_REQUEST['empid']);
        $year = sanitize($_REQUEST['year']);
        $journey_type = sanitize($_REQUEST['journey_type']);
        $cardpass = addslashes(sanitize($_REQUEST['cardpass']));
        $set = sanitize($_REQUEST['set']);
        $months = implode(",", array_map('sanitize', $_REQUEST['month']));
        $ref = rand(10000, 999999);
        $reference = $empid . "/" . $year . "/" . $ref;
        $objective = sanitize($_REQUEST["objective0"]);
        $data = [];

        for ($i = 0; $i <= $cnt; $i++) {
            $data['date'][$i] = sanitize($_REQUEST["date$i"]);
            $data['train'][$i] = sanitize($_REQUEST["train$i"]);
            $data['departS'][$i] = sanitize($_REQUEST["departS$i"]);
            $data['departT'][$i] = sanitize($_REQUEST["departT$i"]);
            $data['arrivalS'][$i] = sanitize($_REQUEST["arrivalS$i"]);
            $data['arrivalT'][$i] = sanitize($_REQUEST["arrivalT$i"]);
            $data['distance'][$i] = sanitize($_REQUEST["distance$i"]);
            $data['percent'][$i] = sanitize($_REQUEST["percent$i"]);
            $data['amount'][$i] = sanitize($_REQUEST["amount$i"]);
        }

        if (claimTA($data, $reference, $empid, $year, $months, $cnt, $set, $objective, $journey_type, $cardpass)) {
            echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";
        }
        break;

    case 'addclaimTA':
        $cnt = sanitize($_REQUEST['hide_count']);
        $empid = sanitize($_REQUEST['empid']);
        $year = sanitize($_REQUEST['year']);
        $months = sanitize($_REQUEST['month']);
        $journey_type = sanitize($_REQUEST['journey_type']);
        $cardpass = addslashes(sanitize($_REQUEST['cardpass']));
        $set = sanitize($_REQUEST['set']);
        $reference = sanitize($_REQUEST['reference']);
        $objective = sanitize($_REQUEST["objective0"]);
        $data = [];

        for ($i = 0; $i <= $cnt; $i++) {
            $data['date'][$i] = sanitize($_REQUEST["date$i"]);
            $data['train'][$i] = sanitize($_REQUEST["train$i"]);
            $data['departS'][$i] = sanitize($_REQUEST["departS$i"]);
            $data['departT'][$i] = sanitize($_REQUEST["departT$i"]);
            $data['arrivalS'][$i] = sanitize($_REQUEST["arrivalS$i"]);
            $data['arrivalT'][$i] = sanitize($_REQUEST["arrivalT$i"]);
            $data['distance'][$i] = sanitize($_REQUEST["distance$i"]);
            $data['percent'][$i] = sanitize($_REQUEST["percent$i"]);
            $data['amount'][$i] = sanitize($_REQUEST["amount$i"]);
        }

        if (addclaimTA($data, $reference, $empid, $year, $months, $cnt, $set, $objective, $journey_type, $cardpass)) {
            echo "<script>alert('User Claim added successfully');window.location='../Show_claimed_TA.php?ref=$reference';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../TA_Entry_Form.php';</script>";
        }
        break;

    case 'getTaAmount':
        $level = sanitize($_REQUEST['level']);
        echo getTaAmount($level);
        break;

    case 'forward_TA':
        $empid = sanitize($_REQUEST['empid']);
        $ref = sanitize($_REQUEST['ref']);
        $forwardName = sanitize($_REQUEST['forwardName']);

        if (forward_TA($empid, $ref, $forwardName)) {
            echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
        }
        break;

    case 'approveAndForward':
        $empid = sanitize($_REQUEST['empid']);
        $ref = sanitize($_REQUEST['ref']);
        $forwardName = sanitize($_REQUEST['forwardName']);
        $original_id = sanitize($_REQUEST['original_id']);

        if (approveAndForward($empid, $ref, $forwardName, $original_id)) {
            echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../Show_claimed_TA.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../Show_claimed_TA.php';</script>";
        }
        break;

    case 'forward_bill':
        $empid = sanitize($_REQUEST['empid']);
        $ref = sanitize($_REQUEST['ref']);
        $original_id = sanitize($_REQUEST['original_id']);

        if (forward_bill($empid, $ref, $original_id)) {
            echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../ta_bill_register.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location='../ta_bill_register.php';</script>";
        }
        break;

    // case 'admincancel_bill':
    //     $empid = sanitize($_REQUEST['empid']);
    //     $ref = sanitize($_REQUEST['ref']);
    //     $original_id = sanitize($_REQUEST['original_id']);

    //     if (admincancel_bill($empid, $ref, $original_id)) {
    //         echo "<script>alert('Travelling Allowance Claim forwarded');window.location='../ta_bill_register.php';</script>";
    //     } else {
    //         echo "<script>alert('Something went wrong');window.location='../ta_bill_register.php';</script>";
    //     }
    //     break;

    // case 'deleteClaim':
    //     $ref = sanitize($_REQUEST['ref']);
    //     if (deleteClaim($ref)) {
    //         echo "<script>alert('Travelling Allowance Claim deleted successfully');window.location='../Show_claimed_TA.php';</script>";
    //     } else {
    //         echo "<script>alert('Failed to delete the claim');window.location='../Show_claimed_TA.php';</script>";
    //     }
    //     break;

    default:
        echo "Invalid action";
        break;
}

?>
