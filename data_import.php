<?php

    include('common/db.php');
    
    $user_r_query="SELECT emp_no FROM `resgister_user` WHERE emp_no NOT IN (SELECT pf_num FROM user_permission)";
    $user_r_result=mysql_query($user_r_query);
    
    $cnt = 0;
    while($user_r_row = mysql_fetch_array($user_r_result))
    {
        // $user_r_pfno=
        $user_p_query="INSERT INTO `user_permission`(`pf_num`,`e_sar`, `tamm`, `e_grievance`,  `e_notification`,`it_form`) VALUES('".$user_r_row['emp_no']."','2','4','4','2','1') ";
        // $cnt++;
        $user_p_result=mysql_query($user_p_query);
        
        if($user_p_result)
        {
            $cnt++;
        }
        
    }
    
    echo "Rows Inserted ".$cnt;

?>