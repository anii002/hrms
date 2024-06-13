<?php 

	require_once 'common/db.php';
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "esoluhp6_travel_allowance1";
	mysqli_connect($host,$user,$pass);
	mysqli_select_db($db); 


	$con1=mysqli_connect($host, $user, $pass, $db);


	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		
		$pf_num = $_POST['pf_num'];
		
		$tamm1 = $_POST['tamm'];
		
		
	    if (isset($_POST['e_gr'])) 
        {
            $e_gr = implode(',',$_POST['e_gr']);	
        }
        else
        {
            $e_gr = NULL;
        }
        
        if (isset($_POST['tamm'])) 
        {
            $tamm = implode(',', $_POST['tamm']);	
        }
        else
        {
            $tamm = NULL;
        }
        
        if (isset($_POST['eims'])) 
        {
            $eims = implode(',', $_POST['eims']);	
        }
        else
        {
            $eims = NULL;
        }
        
        if (isset($_POST['cga'])) 
        {
            $cga = implode(',', $_POST['cga']);
        }
        else
        {
            $cga = NULL;
        }
        
        if (isset($_POST['itp'])) 
        {
             $itp = implode(',', $_POST['itp']);
        }
        else
        {
            $itp = NULL;
        }
        
        if(isset($_POST['app']))
        {
            $app = implode(',', $_POST['app']);
        }
        else
        {
            $app = NULL;	
        }

        if(isset($_POST['frm']))
        {
            $frm = implode(',', $_POST['frm']);
        }
        else
        {
            $frm = NULL;	
        }

				
		if(isset($_POST['sar']))
		{
			$sar = implode(',', $_POST['sar']);
		}
		else
		{
			$sar = NULL;	
		}
		
		if (isset($_POST['apar'])) 
		{
			$apar = implode(',', $_POST['apar']);
		}
		else
		{
			$apar = NULL;
		}
		
		if (isset($_POST['dak'])) 
		{
			$dak = implode(',', $_POST['dak']);
		}
		else
		{
			$dak = NULL;
		}

		if (isset($_POST['feed'])) 
		{
			$feed = implode(',', $_POST['feed']);
		}
		else
		{
			$feed = NULL;
		}

        if (isset($_POST['sbf'])) 
        {
            $sbf = implode(',', $_POST['sbf']);
        }
        else
        {
            $sbf = NULL;
        }

        if (isset($_POST['dar'])) 
        {
            $dar = implode(',', $_POST['dar']);
        }
        else
        {
            $dar = NULL;
        }
        
        $date = date('Y-m-d H:i:s');
    
    
 $sql = "UPDATE user_permission SET tamm = '$tamm', e_grievance = '$e_gr', e_notification = '$eims', cga = '$cga', it_form = '$itp', e_app = '$app', forms = '$frm', e_sar = '$sar', e_apar = '$apar', e_dak = '$dak', feedback = '$feed', sbf = '$sbf', dar = '$dar' WHERE pf_num = '$pf_num'";

	$result = mysqli_query($sql);
	if($result)
	{
		echo "<script>alert('User Permission Updated Successfully')</script>";
		echo "<script>window.location.href = 'show-user.php'</script>";
	}

	}

?>