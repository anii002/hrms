<?php
// include_once("db.php");
require_once('config.php');
$Flag = $_REQUEST["Flag"];
if ($Flag == "getList") {
    // print_r($_POST);
    $Table = $_REQUEST["Table"];
    $ValueField = $_REQUEST["ValueField"];
    $DisplayField = $_REQUEST["DisplayField"];
    $rstGetList = mysql_query("select $ValueField,$DisplayField from $Table", $db_egr);
    if (mysql_num_rows($rstGetList) != 0) {
        echo "<option value=''>Choose a $DisplayField</option>";
        while ($rwGetList = mysql_fetch_array($rstGetList)) {
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
    $rstGetList = mysql_query("select $ValueField,$DisplayField from $Table", $db_common);
    if (mysql_num_rows($rstGetList) != 0) {
        echo "<option value=''>Choose a $DisplayField</option>";
        while ($rwGetList = mysql_fetch_array($rstGetList)) {
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
    $rstGetList = mysql_query($sql, $db_common);
    if (mysql_num_rows($rstGetList) != 0) {
        echo "<option value='' disabled>Choose a $DisplayField</option>";
        while ($rwGetList = mysql_fetch_array($rstGetList)) {
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