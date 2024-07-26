<?php 

 session_start();

 // if(!isset($_SESSION['SESS_MEMBER_NAME']))

 // {

	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";

 // }

 $GLOBALS['a'] = 'sr_view';

include_once('../global/header.php');

include_once('../global/topbar.php');

//include_once('../global/sidebaradmin.php');

  include('mini_function.php');



  $conn=dbcon1();

$pf=$_GET['pf_no'];

$id=$_GET['id'];



			$cnt=0;

		    $i=0;

			$sql1=mysqli_query($conn,"select distinct(count) from prft_reversion_track where rev_pf_no='$pf'");

			if($sql1){

			while($res=mysqli_fetch_assoc($sql1))

			{

				$get_cnt=$res['count'];

			    if($get_cnt!=0)

				$conn=dbcon1();

					$sql=mysqli_query($conn,"select * from prft_reversion_track where rev_pf_no='$pf' and count='$get_cnt' and id!=(SELECT MAX(id) FROM prft_reversion_track) ORDER by id desc");



					$count_records=mysqli_num_rows($sql);

					$sql_last=mysqli_query($conn,"select * from  prft_reversion_track where rev_pf_no='$pf' and count='$get_cnt' ORDER by id desc limit 1");

				 

					$data_last=[];

					 while($fetch_sql_last=mysqli_fetch_array($sql_last))

					{

                       $data_last=$fetch_sql_last;

				    }					 

					$data=[];

		            $npf_diff=[];

			        while($fetch_sql=mysqli_fetch_array($sql))

					{

						$data[$cnt]=$fetch_sql;

						if($count_records>0)

						 {

							$temp=$cnt;



				if($data[$temp]['rev_order_type']!=$data_last['rev_order_type'])          		$npf_diff[0]=1;

				if($data[$temp]['rev_letter_no']!=$data_last['rev_letter_no'])          		$npf_diff[1]=1;

				if($data[$temp]['rev_letter_date']!=$data_last['rev_letter_date'])            		$npf_diff[2]=1;

				if($data[$temp]['rev_wef']!=$data_last['rev_wef'])  		$npf_diff[3]=1;

				if($data[$temp]['rev_frm_dept']!=$data_last['rev_frm_dept'])				    $npf_diff[4]=1;

				if($data[$temp]['rev_frm_desig']!=$data_last['rev_frm_desig'])	  		$npf_diff[5]=1;

				if($data[$temp]['rev_frm_othr_desig']!=$data_last['rev_frm_othr_desig'])	$npf_diff[6]=1;

				if($data[$temp]['rev_frm_pay_scale_type']!=$data_last['rev_frm_pay_scale_type'])	 $npf_diff[7]=1;

				if($data[$temp]['rev_frm_scale']!=$data_last['rev_frm_scale'])		 	$npf_diff[8]=1;

				if($data[$temp]['rev_frm_level']!=$data_last['rev_frm_level'])	  	$npf_diff[9]=1;

				if($data[$temp]['rev_frm_group']!=$data_last['rev_frm_group'])	  		$npf_diff[10]=1;

				if($data[$temp]['rev_frm_station']!=$data_last['rev_frm_station'])		  		$npf_diff[11]=1;

				if($data[$temp]['rev_frm_othr_station']!=$data_last['rev_frm_othr_station'])	$npf_diff[12]=1;

				if($data[$temp]['rev_frm_billunit']!=$data_last['rev_frm_billunit'])	$npf_diff[13]=1;

				if($data[$temp]['rev_frm_depot']!=$data_last['rev_frm_depot'])	$npf_diff[14]=1;

				if($data[$temp]['rev_frm_rop']!=$data_last['rev_frm_rop'])	$npf_diff[15]=1;

				if($data[$temp]['rev_to_dept']!=$data_last['rev_to_dept'])	$npf_diff[16]=1;

				if($data[$temp]['rev_to_desig']!=$data_last['rev_to_desig'])	$npf_diff[17]=1;

				if($data[$temp]['rev_to_othr_desig']!=$data_last['rev_to_othr_desig'])	$npf_diff[18]=1;

				if($data[$temp]['rev_to_pay_scale_type']!=$data_last['rev_to_pay_scale_type'])	$npf_diff[19]=1;

				if($data[$temp]['rev_to_scale']!=$data_last['rev_to_scale'])	$npf_diff[20]=1;

				if($data[$temp]['rev_to_level']!=$data_last['rev_to_level'])	$npf_diff[21]=1;

				if($data[$temp]['rev_to_group']!=$data_last['rev_to_group'])	$npf_diff[22]=1;

				if($data[$temp]['rev_to_station']!=$data_last['rev_to_station'])	$npf_diff[23]=1;

				if($data[$temp]['rev_to_othr_station']!=$data_last['rev_to_othr_station'])	$npf_diff[24]=1;

				if($data[$temp]['rev_to_rop']!=$data_last['rev_to_rop'])	$npf_diff[25]=1;

				if($data[$temp]['rev_to_billunit']!=$data_last['rev_to_billunit'])	$npf_diff[26]=1;

				if($data[$temp]['rev_to_depot']!=$data_last['rev_to_depot'])	$npf_diff[27]=1;

				if($data[$temp]['rev_carried_out_type']!=$data_last['rev_carried_out_type'])	$npf_diff[28]=1;

				if($data[$temp]['rev_carri_wef']!=$data_last['rev_carri_wef'])	$npf_diff[29]=1;

				if($data[$temp]['rev_carri_date_of_incr']!=$data_last['rev_carri_date_of_incr']) $npf_diff[30]=1;

				if($data[$temp]['rev_car_re_accept_ltr_no']!=$data_last['rev_car_re_accept_ltr_no']) $npf_diff[31]=1;

				if($data[$temp]['rev_car_re_accept_ltr_date']!=$data_last['rev_car_re_accept_ltr_date'])	$npf_diff[32]=1;

				if($data[$temp]['rev_car_re_wef_date']!=$data_last['rev_car_re_wef_date'])	$npf_diff[33]=1;

				if($data[$temp]['rev_car_re_remark']!=$data_last['rev_car_re_remark'])	$npf_diff[34]=1;

							

						 }

						$cnt++;

			 		}

			

					if($count_records==0)

					{

						$sql=mysqli_query($conn,"select * from  prft_reversion_track where rev_pf_no='$pf'");

						if($sql)

						{

						while($result=mysqli_fetch_array($sql)){

							

							//$pro_pf_no=$result['pro_pf_no'];

							$rev_order_type=$result['rev_order_type'];

							$rev_letter_no=$result['rev_letter_no'];

							$rev_letter_date=$result['rev_letter_date'];

							$rev_wef=$result['rev_wef'];

							$rev_frm_dept=$result['rev_frm_dept'];

							$rev_frm_desig=$result['rev_frm_desig'];

							$rev_frm_othr_desig=$result['rev_frm_othr_desig'];

							$rev_frm_pay_scale_type=$result['rev_frm_pay_scale_type'];

							$rev_frm_scale=$result['rev_frm_scale'];

							$rev_frm_level=$result['rev_frm_level'];

							$rev_frm_group=$result['rev_frm_group'];

							$rev_frm_station=$result['rev_frm_station'];

							$rev_frm_othr_station=$result['rev_frm_othr_station'];

							$rev_frm_billunit=$result['rev_frm_billunit'];

							$rev_frm_depot=$result['rev_frm_depot'];

							$rev_frm_rop=$result['rev_frm_rop'];

							$rev_to_dept=$result['rev_to_dept'];

							$rev_to_desig=$result['rev_to_desig'];

							$rev_to_othr_desig=$result['rev_to_othr_desig'];

							$rev_to_pay_scale_type=$result['rev_to_pay_scale_type'];

							$rev_to_scale=$result['rev_to_scale'];

							$rev_to_level=$result['rev_to_level'];

							$rev_to_group=$result['rev_to_group'];

							$rev_to_station=$result['rev_to_station'];

							$rev_to_othr_station=$result['rev_to_othr_station'];

							$rev_to_rop=$result['rev_to_rop'];

							$rev_to_billunit=$result['rev_to_billunit'];

							$rev_to_depot=$result['rev_to_depot'];

							$rev_carried_out_type=$result['rev_carried_out_type'];

							$rev_carri_wef=$result['rev_carri_wef'];

							$rev_carri_date_of_incr=$result['rev_carri_date_of_incr'];

							$rev_car_re_accept_ltr_no=$result['rev_car_re_accept_ltr_no'];

							$rev_car_re_accept_ltr_date=$result['rev_car_re_accept_ltr_date'];

							$rev_car_re_wef_date=$result['rev_car_re_wef_date'];

							$rev_car_re_remark=$result['rev_car_re_remark'];

							

							}

						}

					}



						if($npf_diff[0]==1)

						{

							$rev_order_type=$data_last['rev_order_type'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="rev_order_type" class="fa fa-info-circle click_awards" data-toggle="modal" tbl_name="prft_reversion_track"  col_nm="rev_pf_no" getcount="'.$get_cnt.'" data-target="#delete"></span>';

						}

						else

						{

							$rev_order_type=$data_last['rev_order_type'];

						}

						

						if($npf_diff[1]==1)

						{

							$rev_letter_no=$data_last['rev_letter_no'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="rev_letter_no" data-toggle="modal" tbl_name="prft_reversion_track"  col_nm="rev_pf_no" getcount="'.$get_cnt.'" data-target="#delete" class="fa fa-info-circle click_awards"></span>';

						}

						else

						{

							$rev_letter_no=$data_last['rev_letter_no'];

						}

						

						if($npf_diff[2]==1)

						{

							$rev_letter_date=date('d-m-Y', strtotime($data_last['rev_letter_date'])).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="rev_letter_date" data-toggle="modal" tbl_name="prft_reversion_track"  col_nm="rev_pf_no" getcount="'.$get_cnt.'"  limit="'.$cnt.'" data-target="#delete" class="fa fa-info-circle click_awards"></span>';

						}

						else

						{

							$rev_letter_date=date('d-m-Y', strtotime($data_last['rev_letter_date']));

						}

						

						

						if($npf_diff[3]==1)

						{

							$rev_wef=date('d-m-Y', strtotime($data_last['rev_wef']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_wef' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_wef=date('d-m-Y', strtotime($data_last['rev_wef']));

						}

						

						if($npf_diff[4]==1)

						{

							$rev_frm_dept=get_department($data_last['rev_frm_dept'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_dept' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_dept=get_department($data_last['rev_frm_dept']);

						}

						

						if($npf_diff[5]==1)

						{

							$rev_frm_desig=get_designation($data_last['rev_frm_desig'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_desig' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_desig=get_designation($data_last['rev_frm_desig']);

						}

						

						if($npf_diff[6]==1)

						{

							$rev_frm_othr_desig=$data_last['rev_frm_othr_desig']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_othr_desig' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_othr_desig=$data_last['rev_frm_othr_desig'];

						}

						if($npf_diff[7]==1)

						{

							$rev_frm_pay_scale_type=$data_last['rev_frm_pay_scale_type'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="rev_frm_pay_scale_type" class="fa fa-info-circle click_awards" data-toggle="modal" tbl_name="prft_promotion_track"  col_nm="pro_pf_no" getcount="'.$get_cnt.'" data-target="#delete" ></span>';

						}

						else

						{

							$rev_frm_pay_scale_type=$data_last['rev_frm_pay_scale_type'];

						}

						

						if($npf_diff[8]==1)

						{

							$rev_frm_scale=$data_last['rev_frm_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_scale' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_scale=$data_last['rev_frm_scale'];

						}

						

						if($npf_diff[9]==1)

						{

							$rev_frm_level=$data_last['rev_frm_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_level' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_level=$data_last['rev_frm_level'];

						}

						

						if($npf_diff[10]==1)

						{

							$rev_frm_group=get_group($data_last['rev_frm_group'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_group' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_group=get_group($data_last['rev_frm_group']);

						}

						

						if($npf_diff[11]==1)

						{

							$rev_frm_station=$data_last['rev_frm_station']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_station' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_station=$data_last['rev_frm_station'];

						}

						

						if($npf_diff[12]==1)

						{

							$rev_frm_othr_station=$data_last['rev_frm_othr_station']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_othr_station' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_othr_station=$data_last['rev_frm_othr_station'];

						}

						

						if($npf_diff[13]==1)

						{

							$rev_frm_billunit=get_billunit($data_last['rev_frm_billunit'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_billunit' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_billunit=get_billunit($data_last['rev_frm_billunit']);

						}

						

						if($npf_diff[14]==1)

						{

							$rev_frm_depot=get_depot($data_last['rev_frm_depot'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_depot' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_depot=get_depot($data_last['rev_frm_depot']);

						}

						

						if($npf_diff[15]==1)

						{

							$rev_frm_rop=$data_last['rev_frm_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_frm_rop' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_frm_rop=$data_last['rev_frm_rop'];

						}

						

						if($npf_diff[16]==1)

						{

							$rev_to_dept=get_department($data_last['rev_to_dept'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_dept' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_dept=get_department($data_last['rev_to_dept']);

						}

						

						if($npf_diff[17]==1)

						{

							$rev_to_desig=get_designation($data_last['rev_to_desig'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_desig' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_desig=get_designation($data_last['rev_to_desig']);

						}

						

						if($npf_diff[18]==1)

						{

							$rev_to_othr_desig=$data_last['rev_to_othr_desig']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_othr_desig' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_othr_desig=$data_last['rev_to_othr_desig'];

						}

						

						if($npf_diff[19]==1)

						{

							$rev_to_pay_scale_type=$data_last['rev_to_pay_scale_type']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_pay_scale_type' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_pay_scale_type=$data_last['rev_to_pay_scale_type'];

						}

						

						if($npf_diff[20]==1)

						{

							$rev_to_scale=$data_last['rev_to_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_scale' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_scale=$data_last['rev_to_scale'];

						}

						

						if($npf_diff[21]==1)

						{

							$rev_to_level=$data_last['rev_to_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_level' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_level=$data_last['rev_to_level'];

						}

						

						if($npf_diff[22]==1)

						{

							$rev_to_group=get_group($data_last['rev_to_group'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_group' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_group=get_group($data_last['rev_to_group']);

						}

						if($npf_diff[23]==1)

						{

							$rev_to_station	=$data_last['rev_to_station']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_station' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_station	=$data_last['rev_to_station'];

						}

						

						if($npf_diff[24]==1)

						{

							$rev_to_othr_station=$data_last['rev_to_othr_station']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_othr_station' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_othr_station=$data_last['rev_to_othr_station'];

						}

						

						if($npf_diff[25]==1)

						{

							$rev_to_rop=$data_last['rev_to_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_rop' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_rop=$data_last['rev_to_rop'];

						}

						

						if($npf_diff[26]==1)

						{

							$rev_to_billunit=get_billunit($data_last['rev_to_billunit'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_billunit' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_billunit=get_billunit($data_last['rev_to_billunit']);

						}

						

						if($npf_diff[27]==1)

						{

							$rev_to_depot=get_depot($data_last['rev_to_depot'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_to_depot' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_to_depot=get_depot($data_last['rev_to_depot']);

						}

						

						if($npf_diff[28]==1)

						{

							$rev_carried_out_type=$data_last['rev_carried_out_type']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_carried_out_type' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_carried_out_type=$data_last['rev_carried_out_type'];

						}

						

						if($npf_diff[29]==1)

						{

							$rev_carri_wef=date('d-m-Y', strtotime($data_last['rev_carri_wef']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_carri_wef' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_carri_wef=date('d-m-Y', strtotime($data_last['rev_carri_wef']));

						}

						

						if($npf_diff[30]==1)

						{

							$rev_carri_date_of_incr=date('d-m-Y', strtotime($data_last['rev_carri_date_of_incr']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_carri_date_of_incr' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_carri_date_of_incr=date('d-m-Y', strtotime($data_last['rev_carri_date_of_incr']));

						}

						

						if($npf_diff[31]==1)

						{

							$rev_car_re_accept_ltr_no=$data_last['rev_car_re_accept_ltr_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_car_re_accept_ltr_no' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_car_re_accept_ltr_no=$data_last['rev_car_re_accept_ltr_no'];

						}

						

						if($npf_diff[32]==1)

						{

							$rev_car_re_accept_ltr_date=date('d-m-Y', strtotime($data_last['rev_car_re_accept_ltr_date']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_car_re_accept_ltr_date' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_car_re_accept_ltr_date=date('d-m-Y', strtotime($data_last['rev_car_re_accept_ltr_date']));

						}

						

						if($npf_diff[33]==1)

						{

							$rev_car_re_wef_date=date('d-m-Y', strtotime($data_last['rev_car_re_wef_date']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_car_re_wef_date' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_car_re_wef_date=date('d-m-Y', strtotime($data_last['rev_car_re_wef_date']));

						}

						

						if($npf_diff[34]==1)

						{

							$rev_car_re_remark=$data_last['rev_car_re_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='rev_car_re_remark' data-toggle='modal' tbl_name='prft_reversion_track'  col_nm='rev_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";

						}

						else

						{

							$rev_car_re_remark=$data_last['rev_car_re_remark'];

						}

				}

			}



?>

<style>

.table tbody tr td {

    border: 1px solid black;

    border-collapse: collapse;

}

.labelhed{

	font-size:17px;

	font-weight:400;

}

.labelhdata{

	font-size:17px;

	

}

</style>



<div class="content-wrapper" style="margin-top: -20px;">

   <section class="content"> 

      <div class="row">

	     <div class="box box-info">

			<div class="box box-warning box-solid">

			    

				

		<div class="box-body"> 

			<div class="tab-content">

			

			     <!--Bio Tab Start -->

				 <div class="tab-pane active in" id="bio">

				          

	<section class="content">

      <div class="row">

        <div class="col-xs-12">

          <div class="box">

            <div class="box-header">

              <h3 class="box-title"><b>Reversion Details</b></h3>

            </div>

            <!-- /.box-header -->

            <div class="box-body">

					<div class="table-responsive" style="padding:20px;">

				<table border="1" class="table table-bordered"  style="width:100%">

					<tbody>

						<tr> 

						<input type="hidden" name="hidden_pfno" value='<?php echo $pf; ?>' id="hidden_pfno"/>

							<td><label class="control-label labelhed " >PF Number</label></td>

							<td> <label class="control-label labelhdata"> <?php echo $pf; ?> </label></td>

							<td><label class="control-label labelhed" >Order Type</label></td>

							<td><label class="labelhdata labelhdata"><?php echo $rev_order_type; ?></label></td>

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>

							<td><label class="labelhdata"><?php  echo $rev_letter_no; ?></label></td>

							<td><label class="control-label labelhed" >Letter Date</label></td>

							<td><label class="labelhdata"><?php echo $rev_letter_date; ?></label></td>

						</tr>

						

						<tr>

							<td><label class="control-label labelhed" >WEF Date</label></td>

							<td colspan="4"><label class="control-label labelhdata"><?php echo $rev_wef; ?></label></td>

							

						</tr>

						<tr>

							<td colspan="2" ><label class="control-label labelhed"style="font-size:20px" ><b>Reversion From</b></label></td>

							

							<td colspan="2" ><label class="control-label labelhed" style="font-size:20px"><b>Reversion To</b></label></td>

							

							

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Department</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_dept ?></label></td>

							

							<td><label class="control-label labelhed" >Department</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_dept ?></label></td>

						</tr>

							

						<tr>

							<td><label class="control-label labelhed" >Designation</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_desig ?></label></td>

							

							<td><label class="control-label labelhed" >Designation</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_desig ?></label></td>

						</tr>

						

						<tr>

							<td><label class="control-label labelhed" >Other Designation</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_othr_desig ?></label></td>

							

							<td><label class="control-label labelhed" >Other Designation</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_othr_desig ?></label></td>

							

						</tr>

						<tr>

							<td><label class="control-label labelhed" > Scale</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_scale ?></label></td>

							

							<td><label class="control-label labelhed" > Scale</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_scale ?></label></td>

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Level</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_level ?></label></td>

							

							<td><label class="control-label labelhed" >Level</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_level ?></label></td>

							

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Group</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_group ?></label></td>

							<td><label class="control-label labelhed" >Group</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_group ?></label></td>

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Station</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_station ?></label></td>

							

							<td><label class="control-label labelhed" >Station</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_station ?></label></td>

							</tr>

							

							<tr>

							<td><label class="control-label labelhed" >Other Station</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_othr_station ?></label></td>

							

							<td><label class="control-label labelhed" >Other Station</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_othr_station ?></label></td>

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Rate Of Pay</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_rop ?></label></td>

							

							<td><label class="control-label labelhed" >Rate Of Pay</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_rop ?></label></td>

							</tr>

						<tr>	

							<td><label class="control-label labelhed" >Bill Unit</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_billunit ?></label></td>

							<td><label class="control-label labelhed" >Bill Unit</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_billunit ?></label></td>

						</tr>

						<tr>

							<td><label class="control-label labelhed" >Depot</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_frm_depot ?></label></td>

							

							<td><label class="control-label labelhed" >Depot</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_to_depot ?></label></td>

							</tr>

							

							<tr>

							<td><label class="control-label labelhed" >Carried Out Type</label></td>

							<td colspan="5"><label class="control-label labelhdata"><?php echo $rev_carried_out_type ?></label></td>

						</tr>

						<?php if($rev_carried_out_type=='Yes'){?>

						<tr>

							<td><label class="control-label labelhed" >W.E.F Date</label></td>

							<td><label class="control-label labelhdata"><?php  echo $rev_carri_wef; ?></label></td>

						<td><label class="control-label labelhed" >Date Of Increment</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_carri_date_of_incr; ?></label></td>

						</tr>

						<?php }if($rev_carried_out_type=='No'){?>

						<tr>

							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_car_re_accept_ltr_no; ?></label></td>

							

							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_car_re_accept_ltr_date; ?></label></td>

						</tr>

						

						<tr>

							<td><label class="control-label labelhed" >WEF Date</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_car_re_wef_date; ?></label></td>

							<td><label class="control-label labelhed" >Remarks</label></td>

							<td><label class="control-label labelhdata"><?php echo $rev_car_re_remark; ?></label></td>

						</tr>

						<?php }?>

						

					</tbody>

				</table>

			</div>

			<div class="pull-right col-md-7 col-sm-12 col-xs-12">

			

				<a href="transaction_history.php?pf=<?php echo $_GET['pf_no']; ?>" class="btn btn-primary">Back</a>

			</div>	

            </div>

            <!-- /.box-body -->

          </div>

          <!-- /.box -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>	 

		        </div>	

			     <!--Bio Tab End -->

	<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content" style="width:160%; margin-left:-10%" >

			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				<h4 class="modal-title" id=""><strong>Transaction History</strong></h4>

			</div>

			<div class="modal-body">

				<form class="form-horizontal" method="POST" >



				<div style="padding: 10px" class="form-group table-responsive">

            		<table border="1" class="table table-bordered"  style="width:100%">

            			<thead>

							<tr>

								<th>Sr. No.</th>

								<th>Transaction ID</th>

								<th>Letter No</th>

								<th> <label id="col_id_from"></label> From</th>

								<th> <label id="col_id_to"></label> To</th>

								<th>Updated On</th>	 

								<th>Updated By</th>

							</tr>

            			</thead>

            			<tbody class="display_history">

            			</tbody>

              		</table>

					<div class="col-sm-10">

						<input type="hidden" class="form-control" id="delete_id" name="delete_id">

					</div>

				</div>

			</div>

			<div class="modal-footer">

			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

			</div>

			</form>

		</div>

	</div>

</div>	 

				 

						 

<script>

  $(function () {

    $('#example1').DataTable()

    $('#example2').DataTable()

  })

</script>

 </div>

		  

        </div>

			

			

		</div>

      </div>

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

  </div>

   <?php

 include_once('../global/footer.php');

 

 ?> 

  <script>

  

 $(document).on("click",".click_awards",function(){

	 

	var pf = $("#hidden_pfno").val();

	var val = $(this).attr('val');

	var val1 = $(this).attr('tbl_name');

	var val2 = $(this).attr('col_nm');

	var getcount = $(this).attr('getcount');

	$("#col_id_from").text(val);

	$("#col_id_to").text(val);

	  /* alert(pf);

	  alert(val);

	  alert(val1);

	  alert(val2);

	  alert(getcount); */

	 $.ajax({

		type:"post",

		url:"process_history.php",

		data:"action=fetch_history&pf="+pf+"&val="+val+"&val1="+val1+"&val2="+val2+"&getcount="+getcount,

		success:function(data){

		 // alert(data);

		  $(".display_history").html(data);

		  }

	});

});

 </script>