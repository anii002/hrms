<?php
// print_r($_REQUEST);
/**Array ( [txt_emp_pf] => 00512206892 [txt_no] => SUR/01 [txt_rail_board] => Central [txt_place_of_issue] => Solapur [txt_dated] => 06-08-2019 [txt_memo_dated] => 01-07-2019 [txt_for] => Something Goes Here!!!. [lst_penalty_type] => 1 [txt_memo_one] => 1 [txt_ack_two] => 2 [txt_reply_three] => 3 to 6 [txt_apoint_four] => 7 [txt_equiry_five] => 8 [txt_finding_six] => 9 [txt_defence_seven] => 10 [txt_eo_eight] => 11 [txt_guilty] => 12 [txt_rate_nine] => 4500 [txt_grade_ten] => 4500 [txt_inc_eleven] => 01-07-2019 [txt_from_date] => 01-07-2019 [txt_to_date] => 01-08-2019 [txt_total_days] => 31 [txt_imposing_penalty] => SR.DPO/SUR [txt_appointing_auth] => SR.DPO/SUR )
 * 
 */
$emp_pf = $_REQUEST["txt_emp_pf"];
$reg_no = $_REQUEST["txt_no"];
$rail_board = $_REQUEST["txt_rail_board"];
$place_of_issue = $_REQUEST["txt_place_of_issue"];
$dated = date("d-m-Y ", strtotime($_REQUEST["txt_dated"]));
$db_dated = date("Y-m-d", strtotime($_REQUEST["txt_dated"]));
$for_text = $_REQUEST["txt_for"];
$penalty_type = $_REQUEST["lst_penalty_type"];
$memo_one = $_REQUEST["txt_memo_one"];
$ack_two = $_REQUEST["txt_ack_two"];
$reply_three = $_REQUEST["txt_reply_three"];
$apoint_four = $_REQUEST["txt_apoint_four"];
$enquiry_five = $_REQUEST["txt_equiry_five"];
$finding_six = $_REQUEST["txt_finding_six"];
$defence_seven = $_REQUEST["txt_defence_seven"];
$eo_eight = $_REQUEST["txt_eo_eight"];
$rate_nine = $_REQUEST["txt_rate_nine"];
$grade_ten = $_REQUEST["txt_grade_ten"];
$guilty_text = $_REQUEST["txt_guilty"];
$inc_eleven = date("d-m-Y", strtotime($_REQUEST["txt_inc_eleven"]));
$db_inc_eleven =  date("Y-m-d", strtotime($_REQUEST["txt_inc_eleven"]));
$suspension_from = date("d-m-Y", strtotime($_REQUEST["txt_from_date"]));
$suspension_to = date("d-m-Y", strtotime($_REQUEST["txt_to_date"]));
$db_suspension_from = date("Y-m-d", strtotime($_REQUEST["txt_from_date"]));
$db_suspension_to = date("Y-m-d", strtotime($_REQUEST["txt_to_date"]));
$total_days = $_REQUEST["txt_total_days"];
$imposing_penalty = $_REQUEST["txt_imposing_penalty"];
$apponting_auth = $_REQUEST["txt_appointing_auth"];
$db_memo_even_dated = date("Y-m-d", strtotime($_REQUEST["txt_memo_dated"]));
$memo_even_dated = date("d-m-Y", strtotime($_REQUEST["txt_memo_dated"]));

echo "<input type='hidden' value='$emp_pf' name='hd_emp_pf' id='hd_emp_pf'>";
echo "<input type='hidden' value='$reg_no' name='hd_no' id='hd_no'>";
echo "<input type='hidden' value='$rail_board' name='hd_rail_board' id='hd_rail_board'>";
echo "<input type='hidden' value='$place_of_issue' name='hd_place_of_issue' id='hd_place_of_issue'>";
echo "<input type='hidden' value='$db_dated' name='hd_dated' id='hd_dated'>";
echo "<input type='hidden' value='$for_text' name='hd_for' id='hd_for'>";
echo "<input type='hidden' value='$penalty_type' name='hd_penalty_type' id='hd_penalty_type'>";
echo "<input type='hidden' value='$memo_one' name='hd_memo_one' id='hd_memo_one'>";
echo "<input type='hidden' value='$ack_two' name='hd_ack_two' id='hd_ack_two'>";
echo "<input type='hidden' value='$reply_three' name='hd_reply_three' id='hd_reply_three'>";
echo "<input type='hidden' value='$apoint_four' name='hd_apoint_four' id='hd_apoint_four'>";
echo "<input type='hidden' value='$enquiry_five' name='hd_enquiry_five' id='hd_enquiry_five'>";
echo "<input type='hidden' value='$finding_six' name='hd_finding_six' id='hd_finding_six'>";
echo "<input type='hidden' value='$defence_seven' name='hd_defence_seven' id='hd_defence_seven'>";
echo "<input type='hidden' value='$eo_eight' name='hd_eo_eight' id='hd_eo_eight'>";
echo "<input type='hidden' value='$rate_nine' name='hd_rate_nine' id='hd_rate_nine'>";
echo "<input type='hidden' value='$grade_ten' name='hd_grade_ten' id='hd_grade_ten'>";
echo "<input type='hidden' value='$guilty_text' name='hd_guilty_text' id='hd_guilty_text'>";
echo "<input type='hidden' value='$db_inc_eleven' name='hd_db_inc_eleven' id='hd_db_inc_eleven'>";
echo "<input type='hidden' value='$db_suspension_from' name='hd_db_suspension_from' id='hd_db_suspension_from'>";
echo "<input type='hidden' value='$db_suspension_to' name='hd_db_suspension_to' id='hd_db_suspension_to'>";
echo "<input type='hidden' value='$total_days' name='hd_total_days' id='hd_total_days'>";
echo "<input type='hidden' value='$imposing_penalty' name='hd_imposing_penalty' id='hd_imposing_penalty'>";
echo "<input type='hidden' value='$apponting_auth' name='hd_apponting_auth' id='hd_apponting_auth'>";
echo "<input type='hidden' value='$db_memo_even_dated' name='hd_db_memo_even_dated' id='hd_db_memo_even_dated'>";


include_once("load_office_note.php");