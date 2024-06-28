<?php
require_once 'common/db.php';  // Ensure this path is correct
require_once 'operations/CommonFunctions.php';

// session_start();  // Ensure session is started if not already
$pf_no = $_SESSION['pf_num'];

$action = $_REQUEST['action'];
$conn = createConnection();  // Ensure dbcon function is available

switch ($action) {
    case 'password':
        $password = hashPassword($_POST['password']);

        $sql_pass = "UPDATE register_user SET password = '$password' WHERE emp_no = '$pf_no'";
        $result_pass = mysqli_query($conn, $sql_pass);

        if ($result_pass) {
            if (function_exists('dbcon1')) {
                dbcon1('drmpsurh_travel_allowance1');
                $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($pf_no, $file_name, 'Change Password', 'Employee changed the Password');
            }

            echo "<script>
                alert('Password Changed Successfully!');
                window.location.href = 'index.php';
                </script>";
        } else {
            if (function_exists('dbcon1')) {
                dbcon1('drmpsurh_travel_allowance1');
                $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                user_activity($pf_no, $file_name, 'Change Password', 'Employee unable to change the Password');
            }
            echo "<script>
                alert('Failed to Change Password. Please Try Again!');
                window.location.href = 'profile.php';
                </script>";
        }
        break;

    case 'image':
        if (isset($_FILES['image'])) {
            if (!is_dir('images')) {
                mkdir('images', 0777, true);
            }

            if (!is_dir('images/profile')) {
                mkdir('images/profile', 0777, true);
            }

            $image = $_FILES['image']['name'];
            $ext_arr = explode('/', $_FILES['image']['type']);
            $ext = $ext_arr[1];
            $exti = array('jpg', 'jpeg', 'png');

            if (in_array($ext, $exti)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], 'images/profile/' . $image)) {
                    $sql_img = "UPDATE register_user SET image = '$image' WHERE emp_no = '$pf_no'";
                    $result_img = mysqli_query($conn, $sql_img);

                    if ($result_img) {
                        if (function_exists('dbcon1')) {
                            dbcon1('drmpsurh_travel_allowance1');
                            $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                            user_activity($pf_no, $file_name, 'Change Profile Picture', 'Employee changed the Profile Picture');
                        }
                        echo "<script>
                            alert('Profile Image Updated Successfully!');
                            window.location.href = 'index.php';
                            </script>";
                    } else {
                        if (function_exists('dbcon1')) {
                            dbcon1('drmpsurh_travel_allowance1');
                            $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                            user_activity($pf_no, $file_name, 'Change Profile Picture', 'Employee unable to change the Profile Picture');
                        }
                        echo "<script>
                            alert('Profile Image not Updated Please try Again!');
                            window.location.href = 'profile.php';
                            </script>";
                    }
                } else {
                    if (function_exists('dbcon1')) {
                        dbcon1('drmpsurh_travel_allowance1');
                        $file_name = basename($_SERVER["SCRIPT_FILENAME"], '.php');
                        user_activity($pf_no, $file_name, 'Change Profile Picture', 'Employee unable to change the Profile Picture');
                    }
                    echo "<script>
                        alert('Profile Image not Updated Please try Again!');
                        window.location.href = 'profile.php';
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Invalid Image type!');
                    window.location.href = 'profile.php';
                    </script>";
            }
        } else {
            echo "<script>
                alert('Please Choose Image!');
                window.location.href = 'profile.php';
                </script>";
        }
        break;

    default:
        break;
}
?>
