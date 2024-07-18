<?php
require_once('Global_Data/header.php');
error_reporting(0);
include('config.php');
include('functions.php');
$Flag = $_REQUEST["Flag"];
if ($Flag == "getList") {
    // print_r($_POST);
    $Table = $_REQUEST["Table"];
    $ValueField = $_REQUEST["ValueField"];
    $DisplayField = $_REQUEST["DisplayField"];
    $rstGetList = mysqli_query($db_egr,"select $ValueField,$DisplayField from $Table");
    if (mysqli_num_rows($rstGetList) != 0) {
        echo "<option value=''>Choose a $DisplayField</option>";
        while ($rwGetList = mysqli_fetch_array($rstGetList)) {
            $Value = $rwGetList[$ValueField];
            $Display = $rwGetList[$DisplayField];
            echo "<option value='$Value'>$Display</option>";
        }
    }
} else if ($Flag == "getCommonList") {
    // print_r($_POST);
    $Table = $_REQUEST["Table"];
    $ValueField = $_REQUEST["ValueField"];
    $DisplayField = $_REQUEST["DisplayField"];
    $rstGetList = mysqli_query($db_common,"select $ValueField,$DisplayField from $Table");
    if (mysqli_num_rows($rstGetList) != 0) {
        echo "<option value=''>Choose a $DisplayField</option>";
        while ($rwGetList = mysqli_fetch_array($rstGetList)) {
            $Value = $rwGetList[$ValueField];
            $Display = $rwGetList[$DisplayField];
            echo "<option value='$Value'>$Display</option>";
        }
    }
} else if ($Flag == "get_common_list_display_more") {
    // print_r($_POST);
    $Table = $_REQUEST["Table"];
    $ValueField = $_REQUEST["ValueField"];
    $DisplayField = $_REQUEST["DisplayField"];
    // var_dump($DisplayField);
    $DisplayFieldArray = $DisplayField;
    $DisplayField = implode(',', $DisplayField);
    $sql = "select $ValueField,$DisplayField from $Table";
    // echo $sql;
    $rstGetList = mysqli_query($db_common,$sql);
    if (mysqli_num_rows($rstGetList) != 0) {
        echo "<option value='' disabled>Choose a $DisplayField</option>";
        while ($rwGetList = mysqli_fetch_array($rstGetList)) {
            $Value = $rwGetList[$ValueField];
            // print_r($DisplayField);

            echo "<option value='$Value'>";
            foreach ($DisplayFieldArray as $key => $value) {
                // echo "Key=>" . $key . "Value=>" . $value;
                // $Display
                $Display = $rwGetList[$value];
                echo "$Display";
                if ($key != count($DisplayField)) {
                    echo " / ";
                }
            }
            echo "</option>";
            // $Display = $rwGetList[$DisplayField];
        }
    }
}
