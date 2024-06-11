<?php 
$_GLOBALS['a'] ='nominee';
  include_once('../global/header_update.php');?>
 <!--Bio Tab Start -->
	<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
		<div class="row" style="background:#67809f;margin:0px"><span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		</div>
		<div style="border:1px solid #67809f;padding:30px;">	    
			<div class="box-header with-border">
				<ul class="nav nav-tabs" style="border-bottom: 0px solid #ddd;">
					<li class=" active in" ><a href="#tab1" data-toggle="tab"><b>Nominee Details</b></a></li>
					<!--li class=""><a href="#tab2" data-toggle="tab"><b>GIS Nominee </b></a></li>
					<li class=""><a href="#tab3" data-toggle="tab"><b>Gratuty Nominee </b></a></li-->
				</ul>
			</div>
			<div class="tab-content">
				<div id="tab1" class="tab-pane active in">
					<div class="tab-pane city" id="pf_nominee">
						<div class="box-header with-border">
							 <button type="button" id="pf_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>  
						</div><br>
						<form  action="process_main.php?action=update_pf_nominee" method="POST" class="apply_readonly">
						<div class="row">
                        	
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="nom_pf1" name="nom_pf1" readonly   /> 
                                    </div>
                                </div>
                            </div>
							<div class="col-md-5 col-sm-12 col-xs-12">
								
							</div>
                        </div><br>
						<div id="append_PFdata">
                        </div>
					<?php 
						dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."'");
						//echo "select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='PF'".mysql_error();
						$result=mysql_num_rows($sql);
						$pf_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql);
					?>
                    <div class="modal-body">
                    	
                        <div class="row">
                        	<div class='box-header'><h3 class='box-title'><i class='fa fa-book'></i><?php echo $i;?> Nominee</h3><hr/></div>
                            <!--div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="nom_pf1" name="nom_pf1" readonly   /> 
                                    </div>
                                </div>
                            </div--> 
							
							<div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Type</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
											<select class="form-control select2" id="nom_type<?php echo $i;?>" name="nom_type<?php echo $i;?>">	
											<?php 
											//echo "<script>alert('".$result2['nom_type']."');</script>";
												echo get_all_nom_type($result2['nom_type']) ;
											?>								
										</select>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="update_id<?php echo $i;?>" value="<?php echo $result2['id']; ?>">
										<select class="form-control primary select2 nom_name" id="nom_name<?php echo $i;?>" name="nom_name<?php echo $i;?>" style="width:100%;" num="<?php echo $i;?>" short="pf">
											<?php 
												echo get_family_member($result2['nom_name'],$_SESSION['set_update_pf']);  	
											?>
										</select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="nomn_rel<?php echo $i;?>" name="nomn_rel<?php echo $i;?>" style="width:100%;"   >
										 <?php echo get_all_relation($result2['nom_rel']);?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="nom_otherrel<?php echo $i;?>" name="nom_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="nom_perc<?php echo $i;?>" name="nom_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>"  maxlength="3" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="nom_status<?php echo $i;?>" name="nom_status<?php echo $i;?>" style="width:100%;"   >
                                            <option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text"  class="form-control primary onlyNumber" id="nom_age<?php echo $i;?>" name="nom_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" maxlength="3"  readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary calender_picker" id="nom_dob<?php echo $i;?>" name="nom_dob<?php echo $i;?>" value="<?php echo date('d-m-Y', strtotime($result2['nom_dob']));?>"   />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="nom_pan<?php echo $i;?>" name="nom_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10" pattern=".{10,10}"title="Please Enter Ten Digits"> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="nom_adhr<?php echo $i;?>" name="nom_adhr<?php echo $i;?>" value="<?php echo $result2['nom_aadhar'];?>" maxlength="12" pattern=".{12,12}"title="Please Enter Twelve Digits"> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="nom_address<?php echo $i;?>" name="nom_address<?php echo $i;?>" placeholder="Enter Address of Nominee"   ><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="nom_conting<?php echo $i;?>" name="nom_conting<?php echo $i;?>"   ><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="nom_subsciber<?php echo $i;?>" name="nom_subsciber<?php echo $i;?>" placeholder="Enter Name"   > <?php echo $result2['nom_subscriber'];?> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div></br>
						
						
                        <br>          
                        
                    </div>
					<?php }?>
					<input type="hidden" id="nominee_type" value="PF">
                        <input type="hidden" id="pf_counter" name="pf_counter"/>
					<div class="form-group">
                            <div class="col-sm-2 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <!--a href="#witness" style="display:none;" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->
                                <br><br><br>
                            </div>
							<br>
                        </div>
                </form>
					</div>
				</div>
				<div id="tab2" class="tab-pane">
					<div class="tab-pane city active" id="gis_nominee">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;GIS Nominee</h3><button type="button" id="gis_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>
						</div><br>  
						<div class="modal-body">
				<form  action="process_main.php?action=update_gis_nominee" method="POST" class="apply_readonly">
                    <div class="modal-body">
					 <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gis_pf1" name="gis_pf1" readonly   /> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
 						<div id="append_GISdata">
                        </div><br/>
						<?php 
						dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='GIS'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$gis_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql)
					?>
						<div class='box-header'><h3 class='box-title'><i class='fa fa-book'></i><?php echo $i;?> GIS Nominee</h3><hr/></div>
                       
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="gis_update_id<?php echo $i;?>" value="<?php echo $result2['id']; ?>">
										<select name="gis_name1" id="gis_name1" class="form-control select2 nom_name" style="margin-top:0px; width:100%;" num="1" short="gis">
											<!--option selected value="blank">--Select Nominee--</option-->
											<?php 
												echo get_family_member($result2['nom_name'],$_SESSION['set_update_pf']);  	
											?>
										</select>
                                        <!--input type="text" class="form-control primary" id="gis_name<?php //echo $i;?>" name="gis_name<?php //echo $i;?>" value="<?php //echo $result2['nom_name'];?>"/--> 
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="gis_rel<?php echo $i;?>" name="gis_rel<?php echo $i;?>" style="width:100%;"   >
                                            <option value="<?php echo $result2['nom_rel'];?>" selected><?php echo get_relation($result2['nom_rel']);?></option>
                                            <?php
                                            $sqlDept=mysql_query("select * from relation where id <> '".$result2['nom_rel']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gis_otherrel<?php echo $i;?>" name="gis_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gis_perc<?php echo $i;?>" name="gis_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>" maxlength="3"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="gis_status<?php echo $i;?>" name="gis_status<?php echo $i;?>" style="width:100%;"   >
										<option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status where id<>'".$result2['nom_status']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary " id="gis_age<?php echo $i;?>" name="gis_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary calender_picker" id="gis_dob<?php echo $i;?>" name="gis_dob<?php echo $i;?>" value="<?php echo date('d-m-Y', strtotime($result2['nom_dob']));?>"   />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="gis_pan<?php echo $i;?>" name="gis_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10" pattern=".{10,10}"title="Please Enter Ten Digits"  /> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gis_adhr<?php echo $i;?>" name="gis_adhr<?php echo $i;?>"     value="<?php echo $result2['nom_aadhar'];?>" maxlength="12" pattern=".{12,12}"title="Please Enter Twelve Digits"> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="gis_address<?php echo $i;?>" name="gis_address<?php echo $i;?>"   ><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="gis_conting<?php echo $i;?>" name="gis_conting<?php echo $i;?>"   ><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="gis_subsciber<?php echo $i;?>" name="gis_subsciber<?php echo $i;?>"   ><?php echo $result2['nom_subscriber'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php }?>
					<input type="hidden" id="nominee_type_gis" name="nominee_type_gis" value="GIS">
                        <input type="hidden" id="gis_counter" name="gis_counter"/>
                       <br> 
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <br><br><br>
                            </div>
                        </div>
				</form>
						</div>
					</div>        
				</div>
				</div>
				<div id="tab3" class="tab-pane">
					<div class="tab-pane city" id="gra_nominee">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Gratuty Nominee</h3><button type="button" id="gra_counter_btn" class="btn btn-success pull-right">Add New Nominee</button>
						</div><br>
						<div class="modal-body">
							<form  action="process_main.php?action=update_gra_nominee" method="POST" class="apply_readonly">
							<div class="row">
								
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >PF No</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
                                        <input type="text" class="form-control primary TextNumber common_pf_number" id="gra_pf1" name="gra_pf1" readonly   /> 
                                    </div>
                                </div>
                            </div>
                            
                        </div><hr>
                    	<div id="append_GRAdata">
                        </div>
						<?php 
						 dbcon1();
						$sql=mysql_query("select * from nominee_temp where nom_pf_number='".$_SESSION['set_update_pf']."' and nom_type='GRA'");
						$result=mysql_num_rows($sql);
						//echo "<script>alert('$result');</script>";
						$gra_fetch_count=$result;
						for($i=1;$i<=$result;$i++)
						{
							$result2=mysql_fetch_array($sql);
						
						?>
                        
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Name of Nominee(s)</label>
                                    <div class="col-md-8 col-sm-8 col-xs-12" >
									<input type="hidden" name="gra_update_id<?php echo $i;?>" value="<?php echo $result2['id'];?>">
											<select name="gra_name1" id="gra_name1" num="1" short="gra" class="form-control select2 nom_name" style="margin-top:0px; width:100%;">
											<?php 
												echo get_family_member($result2['nom_name'],$_SESSION['set_update_pf']);  	
											?>
										</select>
                                        <!--input type="text" class="form-control primary" id="gra_name<?php //echo $i;?>" name="gra_name<?php //echo $i;?>" value="<?php //echo $result2['nom_name'];?>"/--> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="gra_rel<?php echo $i;?>" name="gra_rel<?php echo $i;?>" style="width:100%;"   >
                                            <option value="<?php echo $result2['nom_rel'];?>" selected><?php echo get_relation($result2['nom_rel']);?></option>
                                            <?php
                                            $sqlDept=mysql_query("select * from relation where id <> '".$result2['nom_rel']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>"><?php echo $rwDept["longdesc"]; ?></option>
                                            <?php
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Other Relationship<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gra_otherrel<?php echo $i;?>" name="gra_otherrel<?php echo $i;?>" value="<?php echo $result2['nom_otherrel'];?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Percentage<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gra_perc<?php echo $i;?>" name="gra_perc<?php echo $i;?>" value="<?php echo $result2['nom_per'];?>" maxlength="3"   />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Marital Status<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <select class="form-control primary select2" id="gra_status<?php echo $i;?>" name="gra_status<?php echo $i;?>" style="width:100%;"   >
                                            <option value="<?php echo $result2['nom_status'];?>" selected><?php echo got_mr($result2['nom_status']);?></option>
                                            <?php
											dbcon();
                                            $sqlDept=mysql_query("select * from marital_status where id<>'".$result2['nom_status']."'");
                                            while($rwDept=mysql_fetch_array($sqlDept))
                                            {
                                            ?>
                                            <option value="<?php echo $rwDept["id"]; ?>">
                                            <?php echo $rwDept["shortdesc"]; ?>
                                            </option>
                                            <?php
                                            }

                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Age<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary" id="gra_age<?php echo $i;?>" name="gra_age<?php echo $i;?>" value="<?php echo $result2['nom_age'];?>" readonly  />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">DOB<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary calender_picker" id="gra_dob<?php echo $i;?>" name="gra_dob<?php echo $i;?>" value="<?php echo date('d-m-Y', strtotime($result2['nom_dob']));?>"   />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" >Nominee PAN No<span class=""></span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary TextNumber" id="gra_pan<?php echo $i;?>" name="gra_pan<?php echo $i;?>" value="<?php echo $result2['nom_panno'];?>" maxlength="10"  pattern=".{10,10}"title="Please Enter Ten Digits"/> 
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" >Nominee Aadhar<span class=""></span></label>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                        <input type="text" class="form-control primary onlyNumber" id="gra_adhr<?php echo $i;?>" name="gra_adhr<?php echo $i;?>" value="<?php echo $result2['nom_aadhar'];?>" maxlength="12" pattern='.{12,12}'title='Please Enter Twelve Digits'  /> 
                                    </div>  
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Address of Nominee</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2" style="resize:none;"  class="form-control primary description" id="gra_address<?php echo $i;?>" name="gra_address<?php echo $i;?>"placeholder="Enter Address of Nominee"   ><?php echo $result2['nom_address'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Contingencies</label>
                                    <div class="col-md-10">
                                        <textarea  rows="2"style="resize:none;" class="form-control primary description" id="gra_conting<?php echo $i;?>" name="gra_conting<?php echo $i;?>"  placeholder="Enter Contingencies"   ><?php echo $result2['nom_conti'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label class="control-label col-md-2 ">Name, Address & Relation of person predeceasing the subscriber</label>
                                    <div class="col-md-10">
                                        <textarea  rows="3" style="resize:none;" class="form-control primary description" id="gra_subsciber<?php echo $i;?>" name="gra_subsciber<?php echo $i;?>"placeholder="Enter Name"   ><?php echo $result2['nom_subscriber'];?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php }?>
						<input type="hidden" id="nominee_type_gra" name="nominee_type_gra" value="GRA">
						<input type="hidden" id="gra_counter" name="gra_counter"/>
                        <br>              
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-12 pull-right">
                                <input type="hidden" id="txtsession" name="txtsession"  class="form-control" value="<?php echo $_SESSION['SESS_MEMBER_NAME']; ?>"/>
                                <input type="submit" id="btnSave" name="btnSave" value="Save"  class="btn btn-success" />
                                <input type="reset" id="btnreset" name="btnreset" value="Close" class="btn btn-danger" />
                                <!--a href="#witness" data-toggle="modal" class="btn btn-fit-height btn-info">Witness</a-->
                                <br><br><br>
                            </div>
                        </div>
						
                    </div>
				</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
				<!--nominee Tab End -->
				<?php include('modal_js_header.php');?>
<script>
var x = '';
	var y = '';
	var z='';
jQuery(document).ready(function() {
	
    jQuery('.tab .tab-links a').on('click', function(e)  {
        var currentAttrValue = jQuery(this).attr('href');
 
        // Show/Hide Tabs
        jQuery('.tab ' + currentAttrValue).show().siblings().hide();
 
        // Change/remove current tab to active
        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
 
        e.preventDefault();
    });
});
</script>
<script>
$(document).on("change",".nom_name", function(){
	
	var nom_short=$(this).attr("short");
	var val=$(this).val();
	var nom_cnt=$(this).attr("num");
	
	$.ajax({
		type:"post",
		url:"process.php",
		data:"action=get_nom_value&val="+val,
		success:function(data){
		  var html=JSON.parse(data);
			if(nom_short=='pf'){
				
				$("#nomn_rel"+nom_cnt).html(html['fmy_rel']);
				$("#nom_dob"+nom_cnt).val(html['fmy_dob']);
				var year=html['fmy_dob'].slice(-4);
				var d = new Date();
				var n = d.getFullYear();
				var dob=n-year;
				$("#nom_age"+nom_cnt).val(dob);
				
			}else if(nom_short=='gis'){
			
				$("#gis_rel"+nom_cnt).html(html['fmy_rel']);
				$("#gis_dob"+nom_cnt).val(html['fmy_dob']);
				var year=html['fmy_dob'].slice(-4);
				var d = new Date();
				var n = d.getFullYear();
				var dob=n-year;
				$("#gis_age"+nom_cnt).val(dob);
				
			}else if(nom_short=='gra'){
				
				$("#gra_rel"+nom_cnt).html(html['fmy_rel']);
				$("#gra_dob"+nom_cnt).val(html['fmy_dob']);
				var year=html['fmy_dob'].slice(-4);
				var d = new Date();
				var n = d.getFullYear();
				var dob=n-year;
				$("#gra_age"+nom_cnt).val(dob);
			}
		  
		  }
	});	
});
</script>
<script>
var pf_counter_id = <?php echo $pf_fetch_count+1;?>;
var gis_counter_id = <?php echo $gis_fetch_count+1;?>;
var gra_counter_id = <?php echo $gra_fetch_count+1;?>;

  $("#pf_counter_btn").on("click", function(){debugger;
	$("#pf_counter").val(pf_counter_id);
	var pf_counter = pf_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_pf&pf_counter="+pf_counter,
		success:function(data){
			$("#append_PFdata").prepend(data);
			$("#pf_counter").val(pf_counter_id);
			pf_counter_id++;
		}
	});
});

 $("#gis_counter_btn").on("click", function(){debugger;
	$("#gis_counter").val(gis_counter_id);
	var gis_counter = gis_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gis&gis_counter="+gis_counter,
		success:function(data){
			$("#append_GISdata").prepend(data);
			$("#gis_counter").val(gis_counter_id);
			gis_counter_id++;
		}
	});
});

 $("#gra_counter_btn").on("click", function(){debugger;
	$("#gra_counter").val(gra_counter_id);
	var gra_counter = gra_counter_id;
	$.ajax({
		type:"GET",
		url:"process.php",
		data:"action=get_gra&gra_counter="+gra_counter,
		success:function(data){
			$("#append_GRAdata").prepend(data);
			$("#gra_counter").val(gra_counter_id);
			gra_counter_id++;
		}
	});
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