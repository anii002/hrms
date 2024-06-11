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
include('create_log.php');

dbcon1();
$pf=$_GET['pf_no'];
$id=$_GET['id'];
$print=$_GET['print'];

// echo "<script>alert('$print');</script>";
			if($print=='print')
			{	
			 $action="Visited PRFT Promotion single record of SR $pf";	
			}
			$action_on=$_SESSION['set_update_pf'];
			create_log($action,$action_on);

 $query=mysql_query("Select * from prft_promotion_temp where pro_pf_no='$pf' and id='$id'");
// echo "Select * from prft_promotion_temp where pro_pf_no='$pf'".mysql_error();
					 while($result=mysql_fetch_assoc($query))		
						
						{
							$pro_pf_no=$result['pro_pf_no'];
							$pro_order_type=$result['pro_order_type'];
							$pro_letter_no=$result['pro_letter_no'];
							$pro_letter_date=$result['pro_letter_date'];
							$pro_wef=$result['pro_wef'];
							
							$pro_frm_dept=get_department($result['pro_frm_dept']);
							$pro_frm_desig=get_designation($result['pro_frm_desig']);
							$pro_frm_othr_desig=($result['pro_frm_othr_desig']);
							$pro_frm_pay_scale_type=$result['pro_frm_pay_scale_type'];
							$pro_frm_scale=$result['pro_frm_scale'];
							$pro_frm_level=$result['pro_frm_level'];							 
							$pro_frm_group=get_group($result['pro_frm_group']);
							$pro_frm_station=get_station($result['pro_frm_station']);
							$pro_frm_othr_station=$result['pro_frm_othr_station'];
							$pro_frm_rop=$result['pro_frm_rop'];
							$pro_frm_billunit=get_billunit($result['pro_frm_billunit']);
							$pro_frm_depot=get_depot($result['pro_frm_depot']);
							
							
							$pro_to_dept=get_department($result['pro_to_dept']);
							$pro_to_desig=get_designation($result['pro_to_desig']);
							$pro_to_othr_desig=$result['pro_to_othr_desig'];
							$pro_to_pay_scale_type=$result['pro_to_pay_scale_type'];
							$pro_to_scale=$result['pro_to_scale'];
							$pro_to_level=$result['pro_to_level'];
							$pro_to_group=get_group($result['pro_to_group']);
							$pro_to_station=get_station($result['pro_to_station']);
							$pro_to_othr_station=$result['pro_to_othr_station'];
							$rop_to=$result['rop_to'];
							$pro_to_billunit=get_billunit($result['pro_to_billunit']);
							$pro_to_depot=get_depot($result['pro_to_depot']);
							
							$pro_carried_out_type=$result['pro_carried_out_type'];
							$pro_carri_wef=$result['pro_carri_wef'];
							$pro_carri_date_of_incr=$result['pro_carri_date_of_incr'];
							$pro_car_re_accept_ltr_no=$result['pro_car_re_accept_ltr_no'];
							$pro_car_re_accept_ltr_date=$result['pro_car_re_accept_ltr_date'];
							$pro_car_re_wef_date=$result['pro_car_re_wef_date'];
							$pro_car_re_remark=$result['pro_car_re_remark'];
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


@media print {
	
  body * {
    visibility: hidden;
  }
  #section-to-print, #section-to-print * {
    visibility: visible;
	
  }
  #section-to-print {
   
   margin:-70px;
   margin-top:-110px;
  }
  #lablshow
	{
	  visibility: visible;
	}
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
              <h3 class="box-title"><b>Promotion Details</b></h3>
            </div>
			
			<div align='center'><!--button  class='btn btn-info'onclick='print_page()' id='p1'>Print this page</button-->
					<a href='display_sr_tab.php?pf=<?php echo $pf; ?>' class='btn btn-primary'>Back</a></div>
		
			
		</center>
	<script type="text/javascript">
		function print_page() {
		window.print();
		var ButtonControl = document.getElementById("p1");
		ButtonControl.style.visibility = "hidden";
		window.location.assign('display_sr_tab.php');
		}
	</script>
			
            <!-- /.box-header -->
            <div class="box-body">
					<div class="table-responsive abc" style="padding:20px;" id="section-to-print">
					<label id="lablshow" style="visibility:hidden"><b>Promotion Details</b></label>
				<table border="1" class="table table-bordered"  style="width:100%;border-collapse:collapse">
					<tbody>
						<tr> 
							<td><label class="control-label labelhed " >PF Number</label></td>
							<td> <label class="control-label labelhdata"> <?php echo $pro_pf_no ?> </label></td>
							<td><label class="control-label labelhed" >Order Type</label></td>
							<td><label class="labelhdata labelhdata"><?php echo $pro_order_type ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Letter Number<span class=""></span></label></td>
							<td><label class="labelhdata"><?php  echo $pro_letter_no ?></label></td>
							<td><label class="control-label labelhed" >Letter Date</label></td>
							<td><label class="labelhdata"><?php echo date('d/m/Y', strtotime($pro_letter_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td colspan="4"><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($pro_wef)); ?></label></td>
							
							
						</tr>
						<tr>
							<td colspan="2" ><label class="control-label labelhed"style="font-size:20px" ><b>Promotion From</b></label></td>
							
							<td colspan="3" ><label class="control-label labelhed" style="font-size:20px"><b>Promotion To</b></label></td>
							
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_dept ?></label></td>
							
							<td><label class="control-label labelhed" >Department</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_dept ?></label></td>
						</tr>
							
						<tr>
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_desig ?></label></td>
							
							<td><label class="control-label labelhed" >Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_desig ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_othr_desig ?></label></td>
							
							<td><label class="control-label labelhed" >Other Designation</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_othr_desig ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_scale ?></label></td>
							
							<td><label class="control-label labelhed" > Scale</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_scale ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_level ?></label></td>
							
							<td><label class="control-label labelhed" >Level</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_level ?></label></td>
							
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_group ?></label></td>
							<td><label class="control-label labelhed" >Group</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_group ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_station ?></label></td>
							
							<td><label class="control-label labelhed" >Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_station ?></label></td>
							</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_othr_station ?></label></td>
							
							<td><label class="control-label labelhed" >Other Station</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_othr_station ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_rop ?></label></td>
							
							<td><label class="control-label labelhed" >Rate Of Pay</label></td>
							<td><label class="control-label labelhdata"><?php echo $rop_to ?></label></td>
							</tr>
						<tr>	
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_billunit ?></label></td>
							<td><label class="control-label labelhed" >Bill Unit</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_billunit ?></label></td>
						</tr>
						<tr>
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_frm_depot ?></label></td>
							
							<td><label class="control-label labelhed" >Depot</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_to_depot ?></label></td>
							</tr>
							
							<tr>
							<td><label class="control-label labelhed" >Carried Out Type</label></td>
							<td colspan="5"><label class="control-label labelhdata"><?php echo $pro_carried_out_type ?></label></td>
						</tr>
						<?php if($pro_carried_out_type=='Yes'){?>
						<tr>
							<td><label class="control-label labelhed" >W.E.F Date</label></td>
							<td><label class="control-label labelhdata"><?php  echo date('d/m/Y', strtotime($pro_carri_wef)); ?></label></td>
						<td><label class="control-label labelhed" >Date Of Increment</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($pro_carri_date_of_incr)); ?></label></td>
						</tr>
						<?php }if($pro_carried_out_type=='No'){?>
						<tr>
							<td><label class="control-label labelhed" >Acceptance Letter Number</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_car_re_accept_ltr_no; ?></label></td>
							
							<td><label class="control-label labelhed" >Acceptance Letter Date</label></td>
							<td><label class="control-label labelhdata"><?php echo  date('d/m/Y', strtotime($pro_car_re_accept_ltr_date)); ?></label></td>
						</tr>
						
						<tr>
							<td><label class="control-label labelhed" >WEF Date</label></td>
							<td><label class="control-label labelhdata"><?php echo date('d/m/Y', strtotime($pro_car_re_wef_date)); ?></label></td>
							<td><label class="control-label labelhed" >Remarks</label></td>
							<td><label class="control-label labelhdata"><?php echo $pro_car_re_remark; ?></label></td>
						</tr>
						<?php }?>
					</tbody>		
				</table>
			</div>
			<!--div class="pull-right col-md-7 col-sm-12 col-xs-12">
				<a href="display_sr_tab.php?pf=<?php //echo $_GET['pf_no']; ?>" class="btn btn-primary">Back</a>
			</div-->	
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
   <?php
 include_once('../global/footer.php');
 
 ?> 
 <script>
	$("#p1").click(function(){
	 var tab="print_codepro";
	 var pf='<?php echo $pf;?>';
	  // alert(tab);
	 $.ajax({
			type:'POST'	,
			url:'log_display_case.php',
			data:'action=create_log&tab='+tab+'&pf='+pf,
			success:function(html){
			// $("#pincode_2").html(html);
			alert(html);
			}
		});
	});
 </script>