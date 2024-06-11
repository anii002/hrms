<?php 
 session_start();
 // if(!isset($_SESSION['SESS_MEMBER_NAME']))
 // {
	 // echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
 // }
 $GLOBALS['a'] = 'sr_view';
include_once('../global/header.php');
include_once('../global/topbar.php');
   include('mini_function.php');

dbcon1();
	$pf=$_GET['pf_no'];
	$id=$_GET['id'];
	
			$cnt=0;
		    $i=0;
			$sql1=mysql_query("select distinct(count) from prft_fixaction_track where fix_pf_no='$pf'");
			if($sql1){
			while($res=mysql_fetch_assoc($sql1))
			{
				$get_cnt=$res['count'];
			    if($get_cnt!=0)
					dbcon1();
					$sql=mysql_query("select * from prft_fixaction_track where fix_pf_no='$pf' and count='$get_cnt' and id!=(SELECT MAX(id) FROM prft_fixaction_track) ORDER by id desc");

					$count_records=mysql_num_rows($sql);
					$sql_last=mysql_query("select * from prft_fixaction_track where fix_pf_no='$pf' and count='$get_cnt' ORDER by id desc limit 1");
										 
					$data_last=[];
					 while($fetch_sql_last=mysql_fetch_array($sql_last))
					{
                       $data_last=$fetch_sql_last;
				    }					 
					$data=[];
		            $npf_diff=[];
			        while($fetch_sql=mysql_fetch_array($sql))
					{
						
						$data[$cnt]=$fetch_sql;
						if($count_records>0)
						 {
							 
							$temp=$cnt;

				if($data[$temp]['fix_order_type']!=$data_last['fix_order_type'])          		$npf_diff[0]=1;
				if($data[$temp]['fix_letter_no']!=$data_last['fix_letter_no'])          		$npf_diff[1]=1;
				if($data[$temp]['fix_letter_date']!=$data_last['fix_letter_date'])            		$npf_diff[2]=1;
				if($data[$temp]['fix_wef']!=$data_last['fix_wef'])  		$npf_diff[3]=1;
				if($data[$temp]['fix_remark']!=$data_last['fix_remark'])				    $npf_diff[4]=1;
				if($data[$temp]['fix_frm_ps_type']!=$data_last['fix_frm_ps_type'])	  		$npf_diff[5]=1;
				if($data[$temp]['fix_frm_scale']!=$data_last['fix_frm_scale'])	$npf_diff[6]=1;
				if($data[$temp]['fix_frm_level']!=$data_last['fix_frm_level'])	 $npf_diff[7]=1;
				if($data[$temp]['fix_frm_rop']!=$data_last['fix_frm_rop'])		 	$npf_diff[8]=1;
				if($data[$temp]['fix_to_ps_type']!=$data_last['fix_to_ps_type'])	  	$npf_diff[9]=1;
				if($data[$temp]['fix_to_scale']!=$data_last['fix_to_scale'])	  		$npf_diff[10]=1;
				if($data[$temp]['fx_to_level']!=$data_last['fx_to_level'])		  		$npf_diff[11]=1;
				if($data[$temp]['fix_to_rop']!=$data_last['fix_to_rop'])	$npf_diff[12]=1;
				if($data[$temp]['fix_carried_out_type']!=$data_last['fix_carried_out_type'])	$npf_diff[13]=1;
				if($data[$temp]['fix_carried_out_type']!=$data_last['fix_carried_out_type'])	$npf_diff[14]=1;
				if($data[$temp]['fix_carri_wef']!=$data_last['fix_carri_wef'])	$npf_diff[15]=1;
				if($data[$temp]['fix_car_re_accept_ltr_no']!=$data_last['fix_car_re_accept_ltr_no'])	$npf_diff[16]=1;
				if($data[$temp]['fix_car_re_accept_ltr_date']!=$data_last['fix_car_re_accept_ltr_date'])	$npf_diff[17]=1;
				if($data[$temp]['fix_car_re_wef_date']!=$data_last['fix_car_re_wef_date'])	$npf_diff[18]=1;
				if($data[$temp]['fix_car_re_remark']!=$data_last['fix_car_re_remark'])	$npf_diff[19]=1;
				
				
							
						 }
						$cnt++;
			 		}
			
					if($count_records==0)
					{
						
						$sql=mysql_query("select * from  prft_fixaction_track where fix_pf_no='$pf'");
						
						if($sql)
						{
						while($result=mysql_fetch_array($sql)){
							
							//$pro_pf_no=$result['pro_pf_no'];
							$fix_order_type=$result['fix_order_type'];
							$fix_letter_no=$result['fix_letter_no'];
							$fix_letter_date=$result['fix_letter_date'];
							$fix_wef=$result['fix_wef'];
							$fix_remark=$result['fix_remark'];
							$fix_frm_ps_type=$result['fix_frm_ps_type'];
							$fix_frm_scale=$result['fix_frm_scale'];
							$fix_frm_level=$result['fix_frm_level'];
							$fix_frm_rop=$result['fix_frm_rop'];
							$fix_to_ps_type=$result['fix_to_ps_type'];
							$fix_to_scale=$result['fix_to_scale'];
							$fx_to_level=$result['fx_to_level'];
							$fix_to_rop=$result['fix_to_rop'];
							$fix_carried_out_type=$result['fix_carried_out_type'];
							$fix_carri_wef=$result['fix_carri_wef'];
							$fix_carri_date_of_incr=$result['fix_carri_date_of_incr'];
							$fix_car_re_accept_ltr_no=$result['fix_car_re_accept_ltr_no'];
							$fix_car_re_accept_ltr_date=$result['fix_car_re_accept_ltr_date'];
							$fix_car_re_wef_date=$result['fix_car_re_wef_date'];
							$fix_car_re_remark=$result['fix_car_re_remark'];
							}
						}
					}

						if($npf_diff[0]==1)
						{
							
							$fix_order_type=get_order_type_fixation($data_last['fix_order_type']).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fix_order_type" class="fa fa-info-circle click_awards" data-toggle="modal" tbl_name="prft_fixaction_track"  col_nm="fix_pf_no" getcount="'.$get_cnt.'" data-target="#delete" ></span>';
						}
						else
						{
							
							$fix_order_type=get_order_type_fixation($data_last['fix_order_type']);
						}
						
						if($npf_diff[1]==1)
						{
							$fix_letter_no=$data_last['fix_letter_no'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fix_letter_no" data-toggle="modal" tbl_name="prft_fixaction_track"  col_nm="fix_pf_no" getcount="'.$get_cnt.'" data-target="#delete" class="fa fa-info-circle click_awards"></span>';
						}
						else
						{
							$fix_letter_no=$data_last['fix_letter_no'];
						}
						
						if($npf_diff[2]==1)
						{
							echo "<script>alert('tjbdjbjdsfb');</script>";
							$fix_letter_date=date('d-m-Y', strtotime($data_last['fix_letter_date'])).'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fix_letter_date" data-toggle="modal" tbl_name="prft_fixaction_track"  col_nm="fix_pf_no" getcount="'.$get_cnt.'"  limit="'.$cnt.'" data-target="#delete" class="fa fa-info-circle click_awards"></span>';
						}
						else
						{
							$fix_letter_date=date('d-m-Y', strtotime($data_last['fix_letter_date']));
						}
						
						
						if($npf_diff[3]==1)
						{
							$fix_wef=date('d-m-Y', strtotime($data_last['fix_wef']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_wef' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_wef=date('d-m-Y', strtotime($data_last['fix_wef']));
						}
						
						if($npf_diff[4]==1)
						{
							$fix_remark=$data_last['fix_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_remark' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_remark=$data_last['fix_remark'];
						}
						
						if($npf_diff[5]==1)
						{
							$fix_frm_ps_type=get_pay_scale_type($data_last['fix_frm_ps_type'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_frm_ps_type' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_frm_ps_type=get_pay_scale_type($data_last['fix_frm_ps_type']);
						}
						
						if($npf_diff[6]==1)
						{
							$fix_frm_scale=$data_last['fix_frm_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_frm_scale' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_frm_scale=$data_last['fix_frm_scale'];
						}
						if($npf_diff[7]==1)
						{
						
							$fix_frm_level=$data_last['fix_frm_level'].'<span style="cursor: pointer;margin-left:6px;color:blue;font-size:20px;" val="fix_frm_level" class="fa fa-info-circle click_awards" data-toggle="modal" tbl_name="prft_fixaction_track"  col_nm="fix_pf_no" getcount="'.$get_cnt.'" data-target="#delete" ></span>';
						}
						else
						{
							$fix_frm_level=$data_last['fix_frm_level'];
						}
						
						if($npf_diff[8]==1)
						{
							$fix_frm_rop=$data_last['fix_frm_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_frm_rop' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_frm_rop=$data_last['fix_frm_rop'];
						}
						
						if($npf_diff[9]==1)
						{
							$fix_to_ps_type=get_pay_scale_type($data_last['fix_to_ps_type'])."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_to_ps_type' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_to_ps_type=get_pay_scale_type($data_last['fix_to_ps_type']);
						}
						
						if($npf_diff[10]==1)
						{
							$fix_to_scale=$data_last['fix_to_scale']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_to_scale' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_to_scale=$data_last['fix_to_scale'];
						}
						
						if($npf_diff[11]==1)
						{
						$fx_to_level=$data_last['fx_to_level']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fx_to_level' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fx_to_level=$data_last['fx_to_level'];
						}
						
						if($npf_diff[12]==1)
						{
						$fix_to_rop=$data_last['fix_to_rop']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_to_rop' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_to_rop=$data_last['fix_to_rop'];
						}
						
						if($npf_diff[13]==1)
						{
						$fix_carried_out_type=$data_last['fix_carried_out_type']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_carried_out_type' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_carried_out_type=$data_last['fix_carried_out_type'];
						}
						
						if($npf_diff[14]==1)
						{
						$fix_carri_wef=date('d-m-Y', strtotime($data_last['fix_carri_wef']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_carri_wef' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_carri_wef=date('d-m-Y', strtotime($data_last['fix_carri_wef']));
						}
						
						if($npf_diff[15]==1)
						{
						$fix_carri_date_of_incr=date('d-m-Y', strtotime($data_last['fix_carri_date_of_incr']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_carri_date_of_incr' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_carri_date_of_incr=date('d-m-Y', strtotime($data_last['fix_carri_date_of_incr']));
						}
						
						if($npf_diff[16]==1)
						{
						$fix_car_re_accept_ltr_no=$data_last['fix_car_re_accept_ltr_no']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_car_re_accept_ltr_no' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_car_re_accept_ltr_no=$data_last['fix_car_re_accept_ltr_no'];
						}
						
						if($npf_diff[17]==1)
						{
						$fix_car_re_accept_ltr_date=date('d-m-Y', strtotime($data_last['fix_car_re_accept_ltr_date']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_car_re_accept_ltr_date' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_car_re_accept_ltr_date=date('d-m-Y', strtotime($data_last['fix_car_re_accept_ltr_date']));
						}
						
						if($npf_diff[18]==1)
						{
						$fix_car_re_wef_date=date('d-m-Y', strtotime($data_last['fix_car_re_wef_date']))."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_car_re_wef_date' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_car_re_wef_date=date('d-m-Y', strtotime($data_last['fix_car_re_wef_date']));
						}
						
						if($npf_diff[19]==1)
						{
						$fix_car_re_remark=$data_last['fix_car_re_remark']."<span style='margin-left:6px;color:blue;font-size:20px;cursor: pointer;' val='fix_car_re_remark' data-toggle='modal' tbl_name='prft_fixaction_track'  col_nm='fix_pf_no' getcount='".$get_cnt."' data-target='#delete' class='fa fa-info-circle click_awards'></span>";
						}
						else
						{
							$fix_car_re_remark=$data_last['fix_car_re_remark'];
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
              <h3 class="box-title"><b>Fixation Details</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
					<div class="table-responsive" style="padding:20px;">
				<table border="1" class="table table-bordered"  style="width:100%">
					<tbody>
						<tr> 
							<input type="hidden" name="hidden_pfno" value='<?php echo $pf; ?>' id="hidden_pfno"/>
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pf ?> </label></td>
							<td><label class="control-label labelhed" >Order Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $fix_order_type ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $fix_letter_no ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="labelhdata"><?php echo $fix_letter_date; ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td colspan="4"><label class="control-label labelhdata"><?php echo $fix_wef; ?></label></td>
						</tr>
						<tr>
							<td colspan="2" ><label class="control-label labelhed" style="font-size:20px"><b>Fixation From</b></label></td>
							
							<td colspan="3" ><label class="control-label labelhed" style="font-size:20px"><b>Fixation To</b></label></td>		
						</tr>
					
						<tr>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_ps_type ?></label></td>
							<td><label class="control-label labelhed" >Pay Scale Type</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_ps_type ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_scale ?></label></td>
							
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_level ?></label></td>
							
						
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $fx_to_level ?></label></td>
							
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_frm_rop ?></label></td>
							
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_to_rop ?></label></td>
							
							</tr>
						
							
							<tr>
							
							<td><label class="control-label labelhed" >Carried Out Type</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $fix_carried_out_type ?></label></td>
						</tr>
						<?php if($fix_carried_out_type=='Yes'){?>
						<tr>
							<td><label class="control-label labelhed" >W.E.F Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo $fix_carri_wef; ?></label></td>
						<td><label class="control-label labelhed" >Date Of Increment</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_carri_date_of_incr; ?></label></td>
						</tr>
						<?php }if($fix_carried_out_type=='No'){?>
						<tr>
							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_car_re_accept_ltr_no; ?></label></td>
							
							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_car_re_accept_ltr_date; ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo $fix_car_re_wef_date; ?></label></td>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td><label class="control-label labelhdata"><?php echo $fix_car_re_remark; ?></label></td>
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
<?php include_once('../global/footer.php'); ?>

<script>
 $(document).on("click",".click_awards",function(){
	 
	var pf = $("#hidden_pfno").val();
	var val = $(this).attr('val');
	var val1 = $(this).attr('tbl_name');
	var val2 = $(this).attr('col_nm');
	var getcount = $(this).attr('getcount');
	$("#col_id_from").text(val);
	$("#col_id_to").text(val);
	  alert(pf);
	 // alert(val);
	 // alert(val1);
	 // alert(val2);
	 // alert(getcount);
	 $.ajax({
		type:"post",
		url:"process_history.php",
		data:"action=fetch_history&pf="+pf+"&val="+val+"&val1="+val1+"&val2="+val2+"&getcount="+getcount,
		success:function(data){
		  alert(data);
		  $(".display_history").html(data);
		  }
	});
});
</script> 