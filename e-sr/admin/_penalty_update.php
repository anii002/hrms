 <?php 
$_GLOBALS['a'] ='penalty';
  include_once('../global/header_update.php');
  
  include('create_log.php');
  
	$action="Visited Penalty page";
	$action_on=$_SESSION['set_update_pf'];
	create_log($action,$action_on);
  
  ?>
 <div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
     <div class="row" style="background:#67809f;margin:0px"><span
             style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card"
                 style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Penalty Update</span>
     </div>
     <div style="border:1px solid #67809f;padding:30px;">
         <div class="box-header with-border">
             <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Penalty</h3>

         </div>
         <br>
         <form method="post" action="process_main.php?action=update_penalty" class="apply_readonly">
             <div class="clearfix"></div>
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">PF No</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="penalty_pf_no" name="penalty_pf_no"
                                 class="form-control TextNumber common_pf_number" readonly required>
                             <input type="hidden" id="penalty_count" name="penalty_count">
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12 ">
                     <div class="row pull-right" style="margin-right:20px;">
                         <a class="btn btn-primary" href="#" id="add_mul_penalty" name="add_mul_penalty">+Add
                             Penalty</a>
                     </div>
                 </div>
             </div>
             <br>

             <div id="add_penalty">
             </div>
             <?php
						$conn=dbcon1();
						$sql=mysqli_query($conn,"select * from penalty_temp where pen_pf_number='".$_SESSION['set_update_pf']."'");
						$count_pe=mysqli_num_rows($sql);	
                        if($count_pe==0)
						{
							echo "<label class='control-label col-md-4 col-sm-3 col-xs-12' style='font-size:15px;color:red;'>Penalty for This Employee Is Not Available</label>";
						}						
						for($i=1;$i<=$count_pe;$i++){
							
							$result=mysqli_fetch_array($sql);
		
					?>
             <h3><?php echo $i;?> Penalty</h3>
             <hr style='height:1px;border:none;color:#f39c12;background-color:#f39c12;'>
             <div class="row">
                 <input type="hidden" id="hidden_penalty_id<?php echo $i;?>" name="hidden_penalty_id<?php echo $i;?>"
                     value="<?php echo $result['id']?>">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Type</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <select name="p_type<?php echo $i;?>" id="p_type<?php echo $i;?>"
                                 class="form-control select2" style="margin-top:0px; width:100%;" readonly
                                 <?php if($result['status']==1){ echo 'readonly'; } else { echo 'required';}?>>
                                 <?php echo get_all_penalty_type($result['pen_type']);?>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <button type='button' class='btn btn-danger pull-right revise_penalty' data-toggle='modal'
                         data-target='#revise_penalty' id="btn_revise_penalty" penalty_id="<?php echo $result['id']; ?>"
                         <?php if($result['status']==1){ echo 'readonly'; }?>
                         <?php if($result['status']==1){echo 'disabled';} ?>>Revise Penalty</button>
                 </div>
             </div>
             <br>
             <div class="clearfix"></div>
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Issued</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="pen_awarded<?php echo $i;?>" name="pen_awarded<?php echo $i;?>"
                                 class="form-control calender_picker"
                                 value="<?php echo date('d-m-Y', strtotime($result['pen_issued'])); ?>"
                                 <?php if($result['status']==1){echo 'readonly';}?>>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">Penalty Effected</label>
                         <?php if($result['pen_effetcted']=='1970-01-01'){
$peef='-';
}
else
{
$peef=date('d-m-Y', strtotime($result['pen_effetcted']));
}?>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="pen_eff<?php echo $i;?>" name="pen_eff<?php echo $i;?>"
                                 class="form-control calender_picker" value="<?php echo $peef; ?>"
                                 <?php if($result['status']==1){ echo 'readonly'; }?>>
                         </div>
                     </div>
                 </div>

             </div><br>
             <div class="clearfix"></div>
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">Letter No</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="l_no<?php echo $i;?>" name="l_no<?php echo $i;?>"
                                 class="form-control " placeholder="Enter Letter No"
                                 value="<?php echo $result['pen_letterno'];?>"
                                 <?php if($result['status']==1){echo 'readonly';}?>>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">Letter Date</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="ltr_date<?php echo $i;?>" name="ltr_date<?php echo $i;?>"
                                 class="form-control calender_picker" placeholder="Enter Date"
                                 value="<?php echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?>"
                                 <?php if($result['status']==1){echo 'readonly';}?>>
                         </div>
                     </div>
                 </div>
             </div><br>
             <div class="clearfix"></div>
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Status</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <select name="chrg_stat<?php echo $i;?>" id="chrg_stat<?php echo $i;?>"
                                 class="form-control select2" style="margin-top:0px; width:100%;"
                                 <?php if($result['status']==1){echo 'disabled';}?>>
                                 <?php echo get_chargesheet($result['pen_chargestatus']);?>
                             </select>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">ChargeSheet Reference</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="pen_chrg_ref_no<?php echo $i;?>"
                                 name="pen_chrg_ref_no<?php echo $i;?>" class="form-control"
                                 value="<?php echo $result['pen_chargeref'];?>"
                                 <?php if($result['status']==1){echo 'readonly';}?>>
                         </div>
                     </div>
                 </div>
             </div><br>
             <div class="row">
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">From Date</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="f_date<?php echo $i;?>" name="f_date<?php echo $i;?>"
                                 class="form-control calender_picker" placeholder="Enter Letter No"
                                 value="<?php echo date('d-m-Y', strtotime($result['pen_from'])); ?>"
                                 <?php if($result['status']==1){echo 'readonly';} else {echo 'required'; }?>>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-4 col-sm-3 col-xs-12">To Date</label>
                         <div class="col-md-8 col-sm-8 col-xs-12">
                             <input type="text" id="t_date<?php echo $i;?>" name="t_date<?php echo $i;?>"
                                 class="form-control calender_picker" placeholder="Enter Letter No"
                                 value="<?php echo date('d-m-Y', strtotime($result['pen_to'])); ?>"
                                 <?php if($result['status']==1){echo 'readonly';} else {echo 'required'; }?>>
                         </div>
                     </div>
                 </div>
             </div><br>
             <div class="row"></div>

             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="form-group">
                         <label class="control-label col-md-2 ">Remark</label>
                         <div class="col-md-10">
                             <textarea style="resize:none" rows="4" cols="20" class="form-control primary description"
                                 id="penalty_remark<?php echo $i;?>" name="penalty_remark<?php echo $i;?>"
                                 <?php if($result['status']==1){echo 'readonly';} else {echo 'required'; }?>><?php echo $result['pen_remark'];?></textarea>
                         </div>
                     </div>
                 </div>
             </div>
             <hr>
             <?php if($result['status']==1)  {?>
             <div class="row">
                 <center>
                     <label>Revised Penalty</label>
                     <table width='70%' border='1'>
                         <tr>
                             <td width='20%' style='padding:5px'>Revised Letter Number</td>
                             <td style='padding:5px'><?php echo $result['revised_letter_no'];?></td>
                             <td width='20%' style='padding:5px'>Revised Letter Date</td>
                             <td style='padding:5px'><?php echo $result['revised_letter_date'];?></td>
                         </tr>
                         <tr>
                             <td style='padding:5px'>Revised Date From</td>
                             <td style='padding:5px'><?php echo $result['revised_from_Date'];?></td>
                             <td style='padding:5px'>Revised Date To</td>
                             <td style='padding:5px'><?php echo $result['revised_to_date'];?></td>
                         </tr>
                         <tr>
                             <td style='padding:5px'>Remark</td>
                             <td colspan='3' style='padding:5px'> <?php echo $result['revised_remark'];?></td>
                         </tr>
                     </table>
                 </center>
             </div>
             <?php }?>
             <br>
             <?php }?>
             <div class="col-sm-2 col-xs-12 pull-right">
                 <button type="submit" class="btn btn-info source">Save</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
             <br>
         </form>
     </div>
 </div>
 <!--Penalty Tab End -->
 <!-- revise penalty modal start-->
 <div id="revise_penalty" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg">
         <!-- Modal content-->
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Revise Penalty</h4>
             </div>
             <div class="modal-body">
                 <form action="process_main.php?action=revise_penalty" method="POST">
                     <input type="hidden" id="hidden_penalty_row_id" name="hidden_penalty_row_id">
                     <div class="row">
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12">Revised Penalty Letter
                                     Number<span class=""></span></label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">
                                     <input type="text" class="form-control primary" id="rev_pen_ltr_no"
                                         name="rev_pen_ltr_no" />
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12">Revised Penalty Letter
                                     Date</label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">
                                     <input type="text" class="form-control primary calender_picker"
                                         id="rev_pen_ltr_date" name="rev_pen_ltr_date" />
                                 </div>
                             </div>
                         </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12">Revised From Date</label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">

                                     <input type="text" name="rev_pen_from_date" id="rev_pen_from_date"
                                         class="form-control calender_picker">

                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12">Revised To Date</label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">

                                     <input type="text" name="rev_pen_to_date" id="rev_pen_to_date"
                                         class="form-control calender_picker">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col-md-6 col-sm-12 col-xs-12">
                             <div class="form-group">
                                 <label class="control-label col-md-4 col-sm-3 col-xs-12">Remark</label>
                                 <div class="col-md-8 col-sm-8 col-xs-12">
                                     <textarea style="resize:none;" rows="3" class="form-control primary description"
                                         name="revise_remark" id="revise_remark"></textarea>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <br>
             </div>
             <div class="modal-footer">
                 <button type="submit" class="btn btn-success">ADD</button>
                 <button type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger"
                     data-dismiss="modal">Close</button>
             </div>
         </div>
         </form>
     </div>
 </div>
 <!-- revise penalty ends----------->
 <?php include('modal_js_header.php');?>
 <script>
// penalty form
var penalty_count = <?php echo $count_pe+1;?>;
$("#add_mul_penalty").click(function() {
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=get_penalty&penalty_count=' + penalty_count,
        success: function(html) {
            $("#add_penalty").prepend(html);
            $("#penalty_count").val(penalty_count);
            penalty_count++;
        }
    });
});


$(document).on('click', '.revise_penalty', function() {

    //	alert($(this).attr('penalty_id'));
    $("#hidden_penalty_row_id").val($(this).attr('penalty_id'));
});
 </script>
 <?php
	 if(isset($_SESSION['set_update_pf']))
	{
		echo "<script>$('.common_pf_number').val('".$_SESSION['set_update_pf']."'); </script>";
		//echo "<script>alert('".$_SESSION['same_pf_no']."'); </script>";
	} 
?>
 <?php include_once('../global/footer.php');?>