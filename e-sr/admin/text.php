							<!-- tabular section code -->
						
							<!----Medical Details------>
							<div class="tab-pane" id="medical">
							    <h3>&nbsp;&nbsp;Medical Details</h3>
							    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							    <div class="table-responsive" style="padding:20px;">
							        <table id="example1" class="table table-bordered table-striped">
							            <thead>
							                <tr>
							                    <th>Sr No</th>
							                    <th>Type Of Medical</th>
							                    <th>Medical Class</th>
							                    <th>Letter No</th>
							                    <th>Letter Date</th>
							                    <th>View</th>
							                </tr>
							            </thead>
							            <tbody>
							                <?php
                                            // dbcon1();
                                            $sql = mysqli_query($conn, "select * from medical_temp where medi_pf_number='$pf_no'");
                                            $cnt = 1;
                                            while ($result = mysqli_fetch_array($sql)) {
                                                echo "<tr>";
                                                echo "<td>$cnt</td>";
                                                echo "<td>" . $result['medi_examtype'] . "</td>";
                                                echo "<td>" . $result['medi_class'] . "</td>";
                                                echo "<td>" . $result['medi_certino'] . "</td>";
                                                echo "<td>" . date('d/m/Y', strtotime($result['medi_certidate'])) . "</td>";
                                                echo "<td> <a target='_blank' value='" . $result['id'] . "' class='btn btn-primary update_btn' href='medical_detail.php?pf=$pf_no&page=display'>View </a> </td>";
                                                echo "</tr>";
                                                $cnt++;
                                            }
                                            ?>
							            </tbody>
							            <tfoot>

							            </tfoot>
							        </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>

							<div class="tab-pane" id="appointment">
							    <h3>&nbsp;&nbsp;Initial Appointment</h3>
							    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							    <div class="table-responsive" style="padding:20px;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <tr>
							                    <td><label class="control-label labelhed ">PF Number</label></td>
							                    <td> <label class="control-label labelhdata"> <?php echo $app_pf_number; ?> </label></td>
							                    <td><label class="control-label labelhed">Department</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Type of Initial Appointment</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $app_type; ?></label></td>
							                    <td><label class="control-label labelhed">Designation<span class=""></span></label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $app_designation; ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Appointment Date</label></td>
							                    <td><label class="control-label labelhdata"><?php
                                                                                            $date = date_create($app_date);
                                                                                            echo date_format($date, "d/m/Y"); ?></label></td>
							                    <td><label class="control-label labelhed">Regularisation Date</label></td>
							                    <td><label class="control-label labelhdata"><?php
                                                                                            $date = date_create($app_regul_date);
                                                                                            echo date_format($app_regul_date, "d/m/Y"); ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Pay Scale type</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_payscale; ?></label></td>
							                    <td><label class="control-label labelhed">Scale</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_scale; ?></label></td>

							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Level</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_level; ?></label></td>
							                    <td><label class="control-label labelhed">Group</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_group; ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Station</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
							                    <td><label class="control-label labelhed">ROP</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Workplace</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
							                    <td><label class="control-label labelhed">Appointment Reference Number</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Appointment Letter Date</label></td>
							                    <td><label class="control-label labelhdata"><?php
                                                                                            $date = date_create($app_letter_date);
                                                                                            echo date_format($date, "d/m/Y"); ?></label></td>
							                    <td><label class="control-label labelhed">Remark</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
							                </tr>
							            </tbody>
							        </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="present_appointment">
							    <div class="table-responsive" style="padding:20px;" id="sgd_ogd_no_mul">
							        <h3>&nbsp;&nbsp;Present Working Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <tr>
							                    <td><label class="control-label labelhed ">PF Number</label></td>
							                    <td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number; ?> </label></td>
							                    <td><label class="control-label labelhed">Department</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Weather Employee is officiating in
							                            higher<br> grade than substantive grade?<span class=""></span></label></td>
							                    <td><label class="labelhdata"><?php echo $sgd_dropdwn_value ?></label></td>
							                    <td><label class="control-label labelhed">Designation</label></td>
							                    <td><label class="labelhdata"><?php echo  $pre_app_designation ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
							                    <td><label class="control-label labelhed">Scale</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Level</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
							                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_billunit  ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Depot/Workplace</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
							                    <td><label class="control-label labelhed">Group</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>

							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Station</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_other ?></label></td>
							                    <td><label class="control-label labelhed">Rate Of Pay</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $pre_app_rop ?></label></td>
							                </tr>
							            </tbody>
							        </table>
							    </div>

							    <div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes_mul">
							        <h3>&nbsp;&nbsp;Present Working Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <tr>
							                    <td><label class="control-label labelhed ">PF Number</label></td>
							                    <td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number ?> </label></td>
							                    <td><label class="control-label labelhed">Department</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Weather Employee is Officiating in
							                            higher<br> grade than substantive grade?<span class=""></span></label></td>
							                    <td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>
							                </tr>

							                <tr>
							                    <td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Substancive Grade Details</b></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Designation</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
							                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>

							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Scale</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
							                    <td><label class="control-label labelhed">Level</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>

							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
							                    <td><label class="control-label labelhed">Depot</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>

							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Station</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
							                    <td><label class="control-label labelhed">Group</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>
							                </tr>

							                <tr>
							                    <td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Officiating Grade Details</b></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Designation</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
							                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Scale</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
							                    <td><label class="control-label labelhed">Level</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>

							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
							                    <td><label class="control-label labelhed">Depot</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Station</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
							                    <td><label class="control-label labelhed">Group</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Rate Of Pay</label></td>
							                    <td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>
							                </tr>

							            </tbody>
							        </table>
							    </div>


							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="prft">

							    <div class="tab-pane" id="prft" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
							                <li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
							                <li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
							                <li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
							            </ul>

							        </div>
							        <div class="box-body">
							            <div class="modal-body">
							                <h3>Promotion</h3>
							                <hr>
							                <div class="row">
							                    <section class="content">
							                        <div class="row">
							                            <div class="col-xs-12">
							                                <div class="box">
							                                    <div class="box-header">
							                                        <h3 class="box-title">Employee List</h3>
							                                    </div>
							                                    <!-- /.box-header -->
							                                    <div class="box-body">
							                                        <table id="example2" class="table table-striped">
							                                            <thead>
							                                                <tr>
							                                                    <th>Sr No</th>
							                                                    <th>PF Number</th>
							                                                    <th>Order Type</th>
							                                                    <th>Transion Id</th>
							                                                    <th>View</th>
							                                                </tr>
							                                            </thead>
							                                            <tbody>

							                                                <?php
                                                                            $pf_no = $_GET['pf'];
                                                                            $cnt_pr = 1;
                                                                            $sql = mysqli_query($conn, "select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
                                                                            while ($result = mysqli_fetch_array($sql)) {
                                                                                echo "<tr>";
                                                                                echo "<td>$cnt_pr</td>";
                                                                                echo "<td>" . $result['pro_pf_no'] . "</td>";
                                                                                echo "<td>" . $result['pro_order_type'] . "</td>";
                                                                                echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                echo "<td><a target='_blank' href='prft_show_promotion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                echo "</tr>";
                                                                                $cnt_pr++;
                                                                            }
                                                                            ?>
							                                            </tbody>
							                                            <tfoot>
							                                            </tfoot>
							                                        </table>
							                                    </div>
							                                    <!-- /.box-body -->
							                                </div>
							                                <!-- /.box -->
							                            </div>
							                            <!-- /.col -->
							                        </div>
							                        <!-- /.row -->
							                    </section>
							                    <script>
							                        $(function() {
							                            $('#example2').DataTable()
							                        })
							                    </script>
							                </div>
							            </div>

							        </div>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="rever">

							    <div class="tab-pane" id="rever" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
							                <li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
							                <li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
							                <li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
							            </ul>

							        </div>
							        <div class="box-body">

							            <div class="modal-body">
							                <h3>Reversion</h3>
							                <hr>
							                <div class="row">
							                    <section class="content">
							                        <div class="row">
							                            <div class="col-xs-12">
							                                <div class="box">
							                                    <div class="box-header">
							                                        <h3 class="box-title">Employee List</h3>
							                                    </div>
							                                    <!-- /.box-header -->
							                                    <div class="box-body">
							                                        <table id="example3" class="table table-striped">
							                                            <thead>
							                                                <tr>
							                                                    <th>Sr No</th>
							                                                    <th>PF Number</th>
							                                                    <th>Order Type</th>
							                                                    <th>Transion Id</th>
							                                                    <th>View</th>
							                                                </tr>
							                                            </thead>
							                                            <tbody>
							                                                <?php
                                                                            $pf_no = $_GET['pf'];
                                                                            $cnt_rv = 1;
                                                                            $sql = mysqli_query($conn, "select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
                                                                            while ($result = mysqli_fetch_array($sql)) {
                                                                                echo "<tr>";
                                                                                echo "<td>$cnt_rv</td>";
                                                                                echo "<td>" . $result['rev_pf_no'] . "</td>";
                                                                                echo "<td>" . $result['rev_order_type'] . "</td>";
                                                                                echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                echo "<td><a target='_blank' href='prft_show_reversion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                echo "</tr>";
                                                                                $cnt_rv++;
                                                                            }
                                                                            ?>
							                                            </tbody>
							                                            <tfoot>

							                                            </tfoot>
							                                        </table>
							                                    </div>
							                                    <!-- /.box-body -->
							                                </div>
							                                <!-- /.box -->
							                            </div>
							                            <!-- /.col -->
							                        </div>
							                        <!-- /.row -->
							                    </section>
							                    <script>
							                        $(function() {
							                            $('#example3').DataTable()

							                        })
							                    </script>
							                </div>
							            </div>

							        </div>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="trans">

							    <div class="tab-pane" id="trans" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
							                <li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
							                <li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
							                <li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
							            </ul>

							        </div>
							        <div class="box-body">

							            <div class="modal-body">
							                <h3>Transfer</h3>
							                <hr>
							                <div class="row">
							                    <section class="content">
							                        <div class="row">
							                            <div class="col-xs-12">
							                                <div class="box">
							                                    <div class="box-header">
							                                        <h3 class="box-title">Employee List</h3>
							                                    </div>
							                                    <!-- /.box-header -->
							                                    <div class="box-body">
							                                        <table id="example4" class="table table-striped">
							                                            <thead>
							                                                <tr>
							                                                    <th>Sr No</th>
							                                                    <th>PF Number</th>
							                                                    <th>Order Type</th>
							                                                    <th>Transion Id</th>
							                                                    <th>View</th>
							                                                </tr>
							                                            </thead>
							                                            <tbody>
							                                                <?php
                                                                            $pf_no = $_GET['pf'];
                                                                            $cnt_tr = 1;
                                                                            $sql = mysqli_query($conn, "select * from prft_transfer_temp where trans_pf_no='$pf_no'");
                                                                            while ($result = mysqli_fetch_array($sql)) {
                                                                                echo "<tr>";
                                                                                echo "<td>$cnt_tr</td>";
                                                                                echo "<td>" . $result['trans_pf_no'] . "</td>";
                                                                                echo "<td>" . get_order_type_transfer($result['trans_order_type']) . "</td>";
                                                                                echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                echo "<td><a target='_blank' href='prft_show_transfer.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                echo "</tr>";
                                                                                $cnt_tr++;
                                                                            }
                                                                            ?>

							                                            </tbody>
							                                            <tfoot>

							                                            </tfoot>
							                                        </table>
							                                    </div>
							                                    <!-- /.box-body -->
							                                </div>
							                                <!-- /.box -->
							                            </div>
							                            <!-- /.col -->
							                        </div>
							                        <!-- /.row -->
							                    </section>
							                    <script>
							                        $(function() {
							                            $('#example4').DataTable()

							                        })
							                    </script>
							                </div>
							            </div>

							        </div>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="fix">

							    <div class="tab-pane" id="rever" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#prft" data-toggle="tab"><b>Promotion</b></a></li>
							                <li class=""><a href="#rever" data-toggle="tab"><b>Reversion</b></a></li>
							                <li class=""><a href="#trans" data-toggle="tab"><b>Transfer</b></a></li>
							                <li class=""><a href="#fix" data-toggle="tab"><b>Fixation</b></a></li>
							            </ul>

							        </div>
							        <div class="box-body">

							            <div class="modal-body">
							                <h3>Fixation</h3>
							                <hr>
							                <div class="row">
							                    <section class="content">
							                        <div class="row">
							                            <div class="col-xs-12">
							                                <div class="box">
							                                    <div class="box-header">
							                                        <h3 class="box-title">Employee List</h3>
							                                    </div>
							                                    <!-- /.box-header -->
							                                    <div class="box-body">
							                                        <table id="example5" class="table table-striped">
							                                            <thead>
							                                                <tr>
							                                                    <th>Sr No</th>
							                                                    <th>PF Number</th>
							                                                    <th>Order Type</th>
							                                                    <th>Transion Id</th>
							                                                    <th>View</th>
							                                                </tr>
							                                            </thead>
							                                            <tbody>

							                                                <?php
                                                                            // dbcon1();
                                                                            $pf_no = $_GET['pf'];
                                                                            $cnt_fx = 1;
                                                                            $sql1 = mysqli_query($conn, "select * from prft_fixation_temp where fix_pf_no='$pf_no'");
                                                                            $cnt = mysqli_num_rows($sql1);


                                                                            while ($result = mysqli_fetch_array($sql1)) {
                                                                                //echo "<script>alert(".$result['id'].")</script>";
                                                                                echo "<tr>";
                                                                                echo "<td>$cnt_fx</td>";
                                                                                echo "<td>" . $result['fix_pf_no'] . "</td>";
                                                                                echo "<td>" . get_order_type_fixation($result['fix_order_type']) . "</td>";
                                                                                echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                echo "<td><a target='_blank' href='prft_show_fixaction.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                echo "</tr>";
                                                                                $cnt_fx++;
                                                                            }
                                                                            ?>

							                                            </tbody>
							                                            <tfoot>

							                                            </tfoot>
							                                        </table>
							                                    </div>
							                                    <!-- /.box-body -->
							                                </div>
							                                <!-- /.box -->
							                            </div>
							                            <!-- /.col -->
							                        </div>
							                        <!-- /.row -->
							                    </section>
							                    <script>
							                        $(function() {
							                            $('#example5').DataTable()

							                        })
							                    </script>
							                </div>
							            </div>

							        </div>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							    </div>
							</div>

							<!--Penalty Tab Start -->
							<div class="tab-pane" id="penalty">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Penalty Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <?php
                                    //penalty 
                                    // dbcon1();
                                    $pf_no = $_GET['pf'];
                                    //echo "<script>alert('$pf_no');</script>";
                                    $cnt = 1;
                                    $query = mysqli_query($conn, "Select * from penalty_temp where pen_pf_number='$pf_no'");
                                    //echo "Select * from penalty_temp where pen_pf_number='$pf_no'".mysql_error();
                                    while ($result = mysqli_fetch_assoc($query)) {

                                    ?>

							            <table border="1" class="table table-bordered" style="width:100%">
							                <tbody>
							                    <tr>
							                        <td colspan="5" style="background-color:grey;color:white;"><b><?php echo $cnt; ?> Penalty</b></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed ">PF No</label></td>
							                        <td> <label class="control-label labelhdata"><?php echo $result['pen_pf_number']; ?></label></td>
							                        <td><label class="control-label labelhed">Penalty Type</label></td>
							                        <td><label class="labelhdata labelhdata"><?php echo get_penalty_type($result['pen_type']); ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">Penalty Issued</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                echo  date('d-m-Y', strtotime($result['pen_issued'])); ?></label></td>
							                        <td><label class="control-label labelhed">Penalty Effected</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                if ($result['pen_effetcted'] == '1970-01-01') {
                                                                                                    $peef = '-';
                                                                                                } else {
                                                                                                    $peef = date('d-m-Y', strtotime($result['pen_effetcted']));
                                                                                                }


                                                                                                echo $peef; ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">Letter No</label></td>
							                        <td><label class="control-label labelhdata"><?php echo $result['pen_letterno']; ?></label></td>
							                        <td><label class="control-label labelhed">Letter Date</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">ChargeSheet Status</label></td>
							                        <td><label class="control-label labelhdata"><?php echo get_charge_sheet_status($result['pen_chargestatus']); ?></label></td>
							                        <td><label class="control-label labelhed">ChargeSheet Reference Number </label></td>
							                        <td><label class="control-label labelhdata"><?php echo $result['pen_chargeref']; ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">From Date</label></td>
							                        <td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($result['pen_from'])); ?></label></td>
							                        <td><label class="control-label labelhed">To Date</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                echo date('d-m-Y', strtotime($result['pen_to'])); ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">Remarks</label></td>
							                        <td colspan="5"><label class="control-label labelhdata"><?php echo $result['pen_remark'];  ?></label></td>

							                    </tr>
							                    <?php $cnt++; ?>
							                <?php
                                        }
                                            ?>
							                </tbody>
							            </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<!--Penalty Tab End -->
							<!--Increment tab begins -->
							<?php
                            // dbcon1();
                            $sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
                            $sql_fetch = mysqli_fetch_array($sql);
                            ?>
							<div class="tab-pane" id="increment">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Increment Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border='1' class='table table-bordered' style='width:100%'>
							            <tr>
							                <td>Pf Number</td>
							                <td><?php echo $sql_fetch['incr_pf_number']; ?></td>
							            </tr>
							        </table>
							        <table border='1' class='table table-bordered' style='width:100%'>
							            <tbody>
							                <tr>
							                    <th>Sr No</th>
							                    <th>Increment type</th>
							                    <th>Pay Scale type</th>
							                    <th>Pay Scale/level</th>
							                    <th>rate of pay</th>
							                    <th>increment date</th>
							                    <th>reason</th>
							                </tr>
							                <?php
                                            // dbcon1();
                                            $sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
                                            $cnt = "1";
                                            while ($result = mysqli_fetch_array($sql)) {

                                                $incr_scale = "";
                                                $incr_level = "";
                                                $ps_type = get_pay_scale_type($result['ps_type']);
                                                if ($result['ps_type'] == '2' || $result['ps_type'] == '3' || $result['ps_type'] == '4') {
                                                    $incr_scale = $result['incr_scale'];
                                                    $incr_level = "";
                                                } else if ($result['ps_type'] == '5') {
                                                    $incr_level = $result['incr_level'];
                                                    $incr_scale = "";
                                                }

                                                echo "<tr>";
                                                echo "<td>$cnt</td>";
                                                echo "<td>" . get_increment_type($result['incr_type']) . "</td>";
                                                echo "<td>" . get_pay_scale_type($result['ps_type']) . "</td>";
                                                echo "<td>$incr_scale $incr_level </td>";
                                                echo "<td>" . $result['incr_rop'] . "</td>";
                                                echo "<td>" . date('d/m/Y', strtotime($result['incr_date'])) . "</td>";
                                                echo "<td>" . $result['incr_remark'] . "</td>";
                                                echo "</tr>";
                                                $cnt++;
                                            }
                                            ?>
							            </tbody>
							        </table>

							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">

							    </div>
							</div>
							<!-- advance details -->
							<div class="tab-pane" id="advance">
							    <h3>&nbsp;&nbsp;Adavance Details</h3>
							    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							    <div class="table-responsive" style="padding:20px;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <?php
                                            // dbcon1();
                                            $sql = mysqli_query($conn, "select * from  advance_temp where adv_pf_number='$pf_no'");
                                            if ($sql) {
                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                    $pf_no = $fetch_sql['adv_pf_number'];
                                                    $advance_type = $fetch_sql['adv_type'];
                                                    $letter_number = $fetch_sql['adv_letterno'];
                                                    $letter_date = $fetch_sql['adv_letterdate'];
                                                    $wef_date = $fetch_sql['adv_wefdate'];
                                                    $amount = $fetch_sql['adv_amount'];
                                                    $tot_amt = $fetch_sql['adv_principle'];
                                                    $interest = $fetch_sql['adv_interest'];
                                                    $date_frm = $fetch_sql['adv_from'];
                                                    $date_to = $fetch_sql['adv_to'];
                                                    $remark = $fetch_sql['adv_remark'];

                                            ?>
							                        <tr>
							                            <td><label class="control-label labelhed ">PF No</label></td>
							                            <td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
							                            <td><label class="control-label labelhed">Advances Type</label></td>
							                            <td><label class="labelhdata labelhdata"><?php echo $advance_type; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Letter No</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
							                            <td><label class="control-label labelhed">Letter Date</label></td>
							                            <td><label class="control-label labelhdata"><?php
                                                                                                    $date = date_create($letter_date);
                                                                                                    $letter_date = date_format($date, "d/m/Y");
                                                                                                    echo $letter_date; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">WEF Date</label></td>
							                            <td><label class="control-label labelhdata"><?php
                                                                                                    $date = date_create($wef_date);
                                                                                                    $wef_date = date_format($date, "d/m/Y");
                                                                                                    echo $wef_date ?></label></td>
							                            <td><label class="control-label labelhed">Amount</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
							                        </tr>

							                        <tr>
							                            <td colspan="6"><label class="control-label labelhed"><b>Recovery Details</b></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Total Principle Amount</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
							                            <td><label class="control-label labelhed">Total Interest</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">From Date</label></td>
							                            <td><label class="control-label labelhdata"><?php $date = date_create($date_frm);
                                                                                                    $date_frm = date_format($date, "d/m/Y");
                                                                                                    echo $date_frm ?></label></td>
							                            <td><label class="control-label labelhed">To Date</label></td>
							                            <td><label class="control-label labelhdata"><?php $date = date_create($date_to);
                                                                                                    $date_to = date_format($date, "d/m/Y");
                                                                                                    echo $date_to ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Remarks</label></td>
							                            <td colspan="6"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td colspan="5" style="background-color:gray"></td>
							                        </tr>

							                <?php
                                                }
                                            }
                                            ?>
							            </tbody>
							        </table>
							    </div><br><br>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<!-- Property tab -->
							<div class="tab-pane" id="property">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Property Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>

							                <?php
                                            //property query
                                            $sql = mysqli_query($conn, "select * from  property_temp where pro_pf_number='$pf_no'");
                                            if ($sql) {
                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                    $pf_no = $fetch_sql['pro_pf_number'];
                                                    $property_type = get_property_type($fetch_sql['pro_type']);
                                                    $item = get_property_item($fetch_sql['pro_item']);
                                                    $other_item = $fetch_sql['pro_otheritem'];
                                                    $make_modal = $fetch_sql['pro_make'];
                                                    $dop = $fetch_sql['pro_dop'];
                                                    $location = $fetch_sql['pro_location'];
                                                    $reg_no = $fetch_sql['pro_regno'];
                                                    $area = $fetch_sql['pro_area'];
                                                    $survey_number = $fetch_sql['pro_surveyno'];
                                                    $tot_cost = $fetch_sql['pro_cost'];
                                                    $source = $fetch_sql['pro_source'];
                                                    $source_type = get_source_typ($fetch_sql['pro_sourcetype']);
                                                    $amount = $fetch_sql['pro_amount'];
                                                    $letter_number = $fetch_sql['pro_letterno'];
                                                    $letter_date = $fetch_sql['pro_letterdate'];
                                                    $remark = $fetch_sql['pro_remark'];

                                            ?>
							                        <tr>
							                            <td><label class="control-label labelhed ">PF No</label></td>
							                            <td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
							                            <td><label class="control-label labelhed">Property Type</label></td>
							                            <td><label class="labelhdata labelhdata"><?php echo $property_type; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Item</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $item; ?></label></td>
							                            <td><label class="control-label labelhed">Other Item</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $other_item; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Make/Model</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $make_modal; ?></label></td>
							                            <td><label class="control-label labelhed">Date Of Purchase</label></td>
							                            <td><label class="control-label labelhdata"><?php
                                                                                                    $date = date_create($dop);
                                                                                                    $dop = date_format($date, "d/m/Y");
                                                                                                    echo $dop; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Location</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $location; ?></label></td>
							                            <td><label class="control-label labelhed">Registration No</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Area</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $area; ?></label></td>
							                            <td><label class="control-label labelhed">Survey Number</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $survey_number; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Total Cost</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $tot_cost; ?></label></td>
							                            <td><label class="control-label labelhed">Source</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $source; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Source type</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $source_type; ?></label></td>
							                            <td><label class="control-label labelhed">Amount</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $amount; ?></label></td>
							                        </tr>

							                        <tr>
							                            <td><label class="control-label labelhed">Letter No</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
							                            <td><label class="control-label labelhed">Letter Date</label></td>
							                            <td><label class="control-label labelhdata"><?php
                                                                                                    $date = date_create($letter_date);
                                                                                                    $letter_date = date_format($date, "d/m/Y");
                                                                                                    echo $letter_date; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Remarks</label></td>
							                            <td colspan="3"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td colspan="5" style="background-color:gray"></td>
							                        </tr>
							                <?php
                                                }
                                            }
                                            ?>
							            </tbody>
							        </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<!-- family composition -->
							<div class="tab-pane" id="family">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Family Composition Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <?php
                                    // dbcon1();
                                    $sql = mysqli_query($conn, "select * from  family_temp where emp_pf='$pf_no'");

                                    while ($result = mysqli_fetch_array($sql)) {

                                        $fmy_pf_number = $result['fmy_pf_number'];
                                        $fmy_updatedate = $result['fmy_updatedate'];
                                        $date = date_create($fmy_updatedate);
                                        $fmy_updatedate = date_format($date, "d/m/Y");
                                        $fmy_member = $result['fmy_member'];
                                        $fmy_rel = get_relation($result['fmy_rel']);
                                        $fmy_gender = get_gender($result['fmy_gender']);
                                        $fmy_dob = $result['fmy_dob'];
                                        $date = date_create($fmy_dob);
                                        $fmy_dob = date_format($date, "d/m/Y");
                                        echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                        echo "<tbody>";
                                        echo "<tr>";

                                        // echo "<td><label class='control-label labelhed ' >Relative ID</label></td>";		
                                        // echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
                                        echo "<td ><label class='control-label labelhed' >Date Of Updation</label></td>";
                                        echo "<td colspan='3'><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";
                                        echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";
                                        echo "<td><label class='control-label labelhed' >Member Relation</label></td>";
                                        echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";
                                        echo "</tr>";
                                        echo "<tr>";
                                        echo "<td><label class='control-label labelhed' >Gender</label></td>";
                                        echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";
                                        echo "<td><label class='control-label labelhed' >DOB</label></td>";
                                        echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";
                                        echo "</tr>";
                                        echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                        echo "</tbody>";
                                        echo "</table>";
                                    }
                                    ?>


							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<!--awards-->
							<div class="tab-pane" id="awards">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Award Details</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <?php
                                            // dbcon1();
                                            $sql = mysqli_query($conn, "select * from  award_temp where awd_pf_number='$pf_no'");
                                            if ($sql) {
                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                    $awd_pf_number = $fetch_sql['awd_pf_number'];
                                                    $awd_award_date     = $fetch_sql['awd_date'];
                                                    $date = date_create($awd_award_date);
                                                    $awd_award_date = date_format($date, "d/m/Y");
                                                    $awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
                                                    $awd_award_type = got_award($fetch_sql['awd_type']);
                                                    $awd_other_award = $fetch_sql['awd_other'];
                                                    $awd_award_detail = $fetch_sql['awd_detail'];

                                            ?>
							                        <tr>
							                            <td><label class="control-label labelhed ">PF No</label></td>
							                            <td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
							                            <td><label class="control-label labelhed">Date Of Award</label></td>
							                            <td><label class="labelhdata labelhdata"><?php echo $awd_award_date; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Awarded By</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $awd_awarded_by; ?></label></td>
							                            <td><label class="control-label labelhed">Type Of Award</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $awd_award_type; ?></label></td>
							                        </tr>
							                        <tr>
							                            <td><label class="control-label labelhed">Other Award</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $awd_other_award; ?></label></td>
							                            <td><label class="control-label labelhed">Award Details</label></td>
							                            <td><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
							                        </tr>
							                        <tr>
							                        <tr>
							                            <td colspan="5" style="background-color:gray"></td>
							                        </tr>
							                        </tr>
							                <?php
                                                }
                                            }
                                            ?>
							            </tbody>
							        </table>
							    </div>

							</div>
							<!-- nominee -->
							<div class="tab-pane" id="nominee">
							    <div class="tab-pane" id="nominee" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#nominee" data-toggle="tab"><b>Nominee</b></a></li>
							                <!--li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
						                      <li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li-->

							            </ul>

							        </div>
							        <div class="box-body">
							            <form class="">
							                <div class="modal-body">
							                    <h3>Nominee Details</h3>
							                    <hr>
							                    <div class="row">

							                        <div class="row">
							                            <div class="col-xs-12">
							                                <div class="box">
							                                    <div class="table-responsive">
							                                        <?php
                                                                    // dbcon1();
                                                                    $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no'");
                                                                    while ($result = mysqli_fetch_array($sql)) {

                                                                        echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                        echo "<tbody>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                        echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                        echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                        echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                        echo "</tr>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                        echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                        echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                        echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                        echo "</td>";
                                                                        echo "</tr>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                        echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                        echo "</tr>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                        echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                        echo "</tr>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                        $date = date_create($result['nom_dob']);
                                                                        echo "<td><label class='control-label labelhdata'>" .
                                                                            date_format($date, "d/m/Y");
                                                                        "</label></td>";
                                                                        echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                        echo "</tr>	";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                        echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                        echo "</tr>";
                                                                        echo "<tr>";
                                                                        echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                        echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                        echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                        echo "</tr>";
                                                                        echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                        echo "</tbody>";
                                                                        echo "</table>";
                                                                    }
                                                                    ?>
							                                    </div>
							                                    <!-- /.box-body -->
							                                </div>
							                                <!-- /.box -->
							                            </div>
							                            <!-- /.col -->
							                        </div>
							                        <!-- /.row -->

							                        <script>
							                            $(function() {
							                                $('#example2').DataTable()

							                            })
							                        </script>
							                    </div>
							                </div>
							            </form>
							        </div>
							    </div>

							</div>
							<div class="tab-pane" id="gis">
							    <div class="tab-pane" id="gis" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details </h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
							                <li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
							                <li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>

							            </ul>

							        </div>
							        <div class="box-body">
							            <form class="">
							                <div class="modal-body">
							                    <h3>GIS Nominee</h3>
							                    <hr>
							                    <div class="row">
							                        <section class="content">
							                            <div class="row">
							                                <div class="col-xs-12">
							                                    <div class="box">
							                                        <div class="table-responsive">
							                                            <?php
                                                                        // dbcon1();
                                                                        $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GIS'");
                                                                        while ($result = mysqli_fetch_array($sql)) {

                                                                            echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                            echo "<tbody>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                            echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                            echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                            echo "</td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                            $date = date_create($result['nom_dob']);
                                                                            $dob = date_format($date, "d/m/Y");
                                                                            echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                            echo "</tr>	";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                            echo "</tbody>";
                                                                            echo "</table>";
                                                                        }
                                                                        ?>
							                                        </div>
							                                        <!-- /.box-body -->
							                                    </div>
							                                    <!-- /.box -->
							                                </div>
							                                <!-- /.col -->
							                            </div>
							                            <!-- /.row -->
							                        </section>
							                        <script>
							                            $(function() {
							                                $('#example3').DataTable()

							                            })
							                        </script>
							                    </div>
							                </div>
							            </form>
							        </div>
							    </div>

							</div>
							<div class="tab-pane" id="gratuity">
							    <div class="tab-pane" id="gratuity" style="padding:10px;">
							        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee</h3>
							        <div class="box-header with-border">
							            <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                <li class=""><a href="#nominee" data-toggle="tab"><b>PF Nominee</b></a></li>
							                <li class=""><a href="#gis" data-toggle="tab"><b>GIS Nominee</b></a></li>
							                <li class=""><a href="#gratuity" data-toggle="tab"><b>Gratuity Nominee</b></a></li>

							            </ul>

							        </div>
							        <div class="box-body">
							            <form class="">
							                <div class="modal-body">
							                    <h3>Gratuity Nominee</h3>
							                    <hr>
							                    <div class="row">
							                        <section class="content">
							                            <div class="row">
							                                <div class="col-xs-12">
							                                    <div class="box">
							                                        <div class="table-responsive">
							                                            <?php
                                                                        // dbcon1();
                                                                        $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GRA'");
                                                                        while ($result = mysqli_fetch_array($sql)) {

                                                                            echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                            echo "<tbody>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                            echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                            echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                            echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                            echo "</td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                            $date = date_create($result['nom_dob']);
                                                                            $dob = date_format($date, "d/m/Y");
                                                                            echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                            echo "</tr>	";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr>";
                                                                            echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                            echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                            echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                            echo "</tr>";
                                                                            echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                            echo "</tbody>";
                                                                            echo "</table>";
                                                                        }
                                                                        ?>
							                                        </div>
							                                        <!-- /.box-body -->
							                                    </div>
							                                    <!-- /.box -->
							                                </div>
							                                <!-- /.col -->
							                            </div>
							                            <!-- /.row -->
							                        </section>
							                        <script>
							                            $(function() {
							                                $('#example4').DataTable()

							                            })
							                        </script>
							                    </div>
							                </div>
							            </form>
							        </div>
							    </div>

							</div>
							<!-- training tab -->
							<div class="tab-pane" id="training">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp; Training</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <?php
                                            // dbcon1();
                                            $nominee = mysqli_query($conn, "select * from  training_temp where pf_number='$pf_no'");
                                            while ($fetch_nominee = mysqli_fetch_array($nominee)) {

                                                $tra_pf_number = $fetch_nominee['pf_number'];
                                                $tra_training_status = get_training_type($fetch_nominee['training_type']);
                                                $tra_last_date     = $fetch_nominee['last_date'];
                                                $tra_due_date = $fetch_nominee['due_date'];
                                                $tra_training_from = $fetch_nominee['training_from'];
                                                $tra_training_to = $fetch_nominee['training_to'];
                                                $tra_description  = $fetch_nominee['description'];
                                                $tra_letter_number  = $fetch_nominee['letter_no'];
                                                $tra_letter_date  = $fetch_nominee['letter_date'];
                                                $tra_remark = $fetch_nominee['remarks'];
                                            ?>
							                    <tr>
							                        <td><label class="control-label labelhed ">PF No</label></td>
							                        <td> <label class="control-label labelhdata"><?php echo $tra_pf_number ?></label></td>
							                        <td><label class="control-label labelhed">Training Type</label></td>
							                        <td><label class="labelhdata labelhdata"><?php echo $tra_training_status ?></label></td>
							                    </tr>

							                    <tr>
							                        <td><label class="control-label labelhed">Last Date</label></td>
							                        <td><label class="labelhdata labelhdata"><?php
                                                                                                $date = date_create($tra_last_date);
                                                                                                $tra_last_date = date_format($date, "d/m/Y");
                                                                                                echo $tra_last_date; ?></label>
							                        </td>
							                        <td><label class="control-label labelhed">Due Date</label></td>
							                        <td><label class="labelhdata labelhdata"><?php
                                                                                                $date = date_create($tra_due_date);
                                                                                                $tra_due_date = date_format($date, "d/m/Y");
                                                                                                echo $tra_due_date; ?></label>
							                        </td>
							                    </tr>


							                    <tr>
							                        <td><label class="control-label labelhed">Training From</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                $date = date_create($tra_training_from);
                                                                                                $tra_training_from = date_format($date, "d/m/Y");
                                                                                                echo $tra_training_from ?></label></td>
							                        <td><label class="control-label labelhed">Training To</label></td>
							                        <td><label class="control-label labelhdata"><?php $date = date_create($tra_training_to);
                                                                                                $tra_training_to = date_format($date, "d/m/Y");
                                                                                                echo $tra_training_to ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">Letter No</label></td>
							                        <td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
							                        <td><label class="control-label labelhed">Letter Date</label></td>
							                        <td><label class="control-label labelhdata"><?php
                                                                                                $date = date_create($tra_letter_date);
                                                                                                $tra_letter_date = date_format($date, "d/m/Y");
                                                                                                echo $tra_letter_date ?></label></td>
							                    </tr>
							                    <tr>
							                        <td><label class="control-label labelhed">Description</label></td>
							                        <td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
							                        <td><label class="control-label labelhed">remark</label></td>
							                        <td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
							                    </tr>
							                    <tr>
							                        <td colspan="5" style="background-color:gray"></td>
							                    </tr>
							                <?php
                                            }
                                            ?>
							            </tbody>
							        </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							        <!--a href="#" class="btn btn-primary back_btn">Back</a-->
							    </div>
							</div>
							<div class="tab-pane" id="extra_entry">
							    <div class="table-responsive" style="padding:20px;">
							        <h3>&nbsp;&nbsp;Personal Info</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <tr>
							                    <td><label class="control-label labelhed ">PF Number</label></td>
							                    <td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
							                    <td><label class="control-label labelhed "> Date Of Joining</label></td>
							                    <td> <label class="control-label labelhdata"> <?php echo $doj ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Retirement type</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $retire_type ?></label></td>
							                    <td><label class="control-label labelhed">Date Of Retirement</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $dor; ?></label></td>
							                </tr>

							                <tr>
							                    <td><label class="control-label labelhed">Designation on Retirement</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $desig_or ?></label></td>
							                    <td><label class="control-label labelhed">Department</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $dept ?></label></td>
							                </tr>
							                <tr>

							                    <td><label class="control-label labelhed">Station</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $station ?></label></td>
							                    <td><label class="control-label labelhed">ROP</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $rop ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $bill_unit ?></label></td>
							                    <td><label class="control-label labelhed">Scale/Level</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $scale_lvl ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Depot</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $depot ?></td>
							                    <td><label class="control-label labelhed">Employee Category</label></td>
							                    <td><label class="control-label labelhdata"><?php echo $emp_cat; ?></label></td>
							                </tr>
							                <tr>

							                    <td><label class="control-label labelhed">Total Service</label></td>
							                    <td colspan="3"><label class="control-label labelhdata"><?php echo $tot_years, "  Years  ", $tot_months, "  Months  ", $tot_days, "  Days  "; ?></label></td>

							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">No. of Qualification Service</label></td>
							                    <td colspan="3"><label class="control-label labelhdata"><?php echo $no_years, "  Years  ", $no_months, "  Months  ", $no_days, "  Days  "; ?></label></td>
							                </tr>
							            </tbody>
							        </table>
							        <h3>&nbsp;&nbsp;Leave Balance</h3>
							        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							        <table border="1" class="table table-bordered" style="width:100%">
							            <tbody>
							                <tr>
							                    <td><label class="control-label labelhed ">LAP</label></td>
							                    <td> <label class="control-label labelhdata"><?php echo $lap; ?></label></td>
							                    <td><label class="control-label labelhed">LHAP</label></td>
							                    <td><label class="labelhdata labelhdata"><?php echo $lhap; ?></label></td>
							                </tr>
							                <tr>
							                    <td><label class="control-label labelhed">Advance Leaves</label></td>
							                    <td colspan="5"><label class="control-label labelhdata"><?php echo $ad_leaves; ?></label></td>
							                </tr>

							            </tbody>
							        </table>
							    </div>
							    <div class="pull-right col-md-7 col-sm-12 col-xs-12">

							    </div>
							</div>






<!-- single section code -->



							<div id="single" class="tab-pane fade">
							    <div class="box box-warning box-solid">
							        <div class="modal-body">
							            <div class="row">
							                <div class="box-body">
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Bio-Data</h3>
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td colspan="5"></td>
							                                    <td style="width:10%"> <img id="blah" src="upload_doc/<?php echo $imagefile; ?>" width="200px" height="200px" /></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed ">PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $pf_number_bio; ?></label></td>
							                                    <td><label class="control-label labelhed "> Old PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $oldpf_number ?></label></td>
							                                    <td><label class="control-label labelhed">SR NO</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $sr_no ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Date Of Birth<span class=""></span></label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $dob; ?></label></td>
							                                    <td><label class="control-label labelhed">ID Card Number<span class=""></span></label></td>
							                                    <td><label class="control-label labelhdata"></label></td>
							                                    <td><label class="control-label labelhed">Aadhar Number<span class=""></span></label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $aadhar_number ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Employee Name</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $emp_name ?></label></td>
							                                    <td><label class="control-label labelhed">Employee Old Name</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $emp_old_name ?></label></td>
							                                    <td><label class="control-label labelhed">Gender</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $gender ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Marital Status</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $marrital_status ?></label></td>
							                                    <td><label class="control-label labelhed">Father/Husband Name</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $f_h_name ?></label></td>
							                                    <td><label class="control-label labelhed">CUG Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $cug ?></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Personal Mobile Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $mobile_number; ?></label></td>
							                                    <td><label class="control-label labelhed">PAN No</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pan_number; ?></label></td>
							                                    <td><label class="control-label labelhed">PRAN Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $nps_no; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">RUID Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ruid_no; ?></label></td>
							                                    <td><label class="control-label labelhed">E-mail Id</label></td>
							                                    <td colspan="3"><label class="control-label labelhdata"><?php echo $email; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Persent Address</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $present_address; ?></label></td>
							                                    <td><label class="control-label labelhed">State Code</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_statecode; ?></label></td>
							                                    <td><label class="control-label labelhed">Pincode</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_pincode; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Permanent Address</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $permanent_address; ?></label></td>
							                                    <td><label class="control-label labelhed">State Code</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $per_statecode; ?></label></td>
							                                    <td><label class="control-label labelhed">Pincode</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $per_pincode; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Identification Mark</label></td>
							                                    <td colspan="5"><label class="control-label labelhdata"><?php echo $identification_mark; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Religion</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $religion; ?></label></td>
							                                    <td><label class="control-label labelhed">Community</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $community; ?></label></td>
							                                    <td><label class="control-label labelhed">Caste</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $caste; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Recruitment Code/<br>Appointment Type</label></td>
							                                    <td colspan="1"><label class="control-label labelhdata"><?php echo $recruit_code; ?></label></td>
							                                    <td><label class="control-label labelhed">Group</label></td>
							                                    <td colspan="3"><label class="control-label labelhdata"><?php echo $group_col; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Education Qualification at the time of Initial Appointment</label></td>
							                                    <td colspan="1"><label class="control-label labelhdata"><?php echo $education_ini; ?></label></td>
							                                    <td><label class="control-label labelhed">Education Qualification at the time of Subsequent</label></td>
							                                    <td colspan="3"><label class="control-label labelhdata"><?php echo $education_sub; ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>

							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">Bank Name</label></td>
							                                    <td> <label class="control-label labelhdata"><?php echo $bank_name; ?></label></td>
							                                    <td><label class="control-label labelhed">Account No</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $account_number; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">MICR Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $micr_number; ?></label></td>
							                                    <td><label class="control-label labelhed">IFSC No</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ifsc_code; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Bank Address</label></td>
							                                    <td colspan="5"><label class="control-label labelhdata"><?php echo $bank_address; ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>
							                    </div>

							                    <h3>&nbsp;&nbsp;Medical Details</h3>
							                    <div class="table-responsive" style="padding:20px;">
							                        <table id="example1" class="table table-bordered table-striped">
							                            <thead>
							                                <tr>
							                                    <th>Sr No</th>
							                                    <th>Type Of Medical</th>
							                                    <th>Medical Class</th>
							                                    <th>Letter No</th>
							                                    <th>Letter Date</th>
							                                    <th>View</th>
							                                </tr>
							                            </thead>
							                            <tbody>
							                                <?php
                                                            // dbcon1();
                                                            $sql = mysqli_query($conn, "select * from medical_temp where medi_pf_number='$pf_no'");
                                                            $cnt = 1;
                                                            while ($result = mysqli_fetch_array($sql)) {
                                                                echo "<tr>";
                                                                echo "<td>$cnt</td>";
                                                                echo "<td>" . $result['medi_examtype'] . "</td>";
                                                                echo "<td>" . $result['medi_class'] . "</td>";
                                                                echo "<td>" . $result['medi_certino'] . "</td>";
                                                                echo "<td>" . $result['medi_certidate'] . "</td>";
                                                                echo '<td>
								<a value="' . $result['id'] . '" target="_blank" class="btn btn-primary update_btn" href="medical_detail.php?pf=$pf_no&page=display" >View</a>
							</td>';
                                                                echo "</tr>";
                                                                $cnt++;
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>
							                    </div>

							                    <h3>&nbsp;&nbsp;Initial Appointment</h3>
							                    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                    <div class="table-responsive" style="padding:20px;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $app_pf_number; ?> </label></td>
							                                    <td><label class="control-label labelhed">Department</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Type of Initial Appointment</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $app_type; ?></label></td>
							                                    <td><label class="control-label labelhed">Designation<span class=""></span></label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $app_designation; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Appointment Date</label></td>
							                                    <td><label class="control-label labelhdata"><?php
                                                                                                            $date = date_create($app_date);
                                                                                                            echo date_format($date, "d/m/Y"); ?></label></td>
							                                    <td><label class="control-label labelhed">Regularisation Date</label></td>
							                                    <td><label class="control-label labelhdata"><?php
                                                                                                            $date = date_create($app_regul_date);
                                                                                                            echo date_format($date, "d/m/Y"); ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Pay Scale type</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_payscale; ?></label></td>
							                                    <td><label class="control-label labelhed">Scale</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_scale; ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Level</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_level; ?></label></td>
							                                    <td><label class="control-label labelhed">Group</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_group; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Station</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
							                                    <td><label class="control-label labelhed">ROP</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>

							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Workplace</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
							                                    <td><label class="control-label labelhed">Appointment Reference Number</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Appointment Letter Date</label></td>
							                                    <td><label class="control-label labelhdata"><?php
                                                                                                            $date = date_create($app_letter_date);
                                                                                                            echo date_format($date, "d/m/Y"); ?></label></td>
							                                    <td><label class="control-label labelhed">Remark</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>
							                    </div>
							                    <div class="table-responsive" style="padding:20px;" id="sgd_ogd_no">
							                        <h3>&nbsp;&nbsp;Present Working Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number; ?> </label></td>
							                                    <td><label class="control-label labelhed">Department</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Weather Employee is officiating in
							                                            higher<br> grade than substantive grade?<span class=""></span></label></td>
							                                    <td><label class="labelhdata"><?php echo $sgd_dropdwn_value ?></label></td>
							                                    <td><label class="control-label labelhed">Designation</label></td>
							                                    <td><label class="labelhdata"><?php echo  $pre_app_designation ?></label></td>
							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
							                                    <td><label class="control-label labelhed">Scale</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Level</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
							                                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_billunit  ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Depot/Workplace</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
							                                    <td><label class="control-label labelhed">Group</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>

							                                </tr>
							                                <tr>

							                                    <td><label class="control-label labelhed">Station</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_other ?></label></td>
							                                    <td><label class="control-label labelhed">Rate Of Pay</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $pre_app_rop ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>
							                    </div>

							                    <div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes">
							                        <h3>&nbsp;&nbsp;Present Working Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number ?> </label></td>
							                                    <td><label class="control-label labelhed">Department</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Weather Employee is Officiating in
							                                            higher<br> grade than substantive grade?<span class=""></span></label></td>
							                                    <td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>

							                                </tr>

							                                <tr>
							                                    <td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Substancive Grade Details</b></label></td>
							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Designation</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
							                                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Scale</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
							                                    <td><label class="control-label labelhed">Level</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
							                                    <td><label class="control-label labelhed">Depot</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>

							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Station</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
							                                    <td><label class="control-label labelhed">Group</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>

							                                </tr>


							                                <tr>
							                                    <td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Officiating Grade Details</b></label></td>
							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Designation</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
							                                    <td><label class="control-label labelhed">Pay Scale Type</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Scale</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
							                                    <td><label class="control-label labelhed">Level</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
							                                    <td><label class="control-label labelhed">Depot</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>

							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Station</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
							                                    <td><label class="control-label labelhed">Group</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Rate Of Pay</label></td>
							                                    <td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>
							                                </tr>

							                            </tbody>
							                        </table>
							                    </div>


							                    <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                        <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							                        <li class="active"><a href="#prfts" data-toggle="tab"><b>Promotion</b></a></li>
							                        <li class=""><a href="#revers" data-toggle="tab"><b>Reversion</b></a></li>
							                        <li class=""><a href="#transs" data-toggle="tab"><b>Transfer</b></a></li>
							                        <li class=""><a href="#fixs" data-toggle="tab"><b>Fixation</b></a></li>
							                    </ul>

							                    <div class="tab-content">
							                        <div class="tab-pane active in" id="prfts">
							                            <div class="tab-pane" id="prfts" style="padding:10px;">
							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Promotion</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="box-header">
							                                                                    <h3 class="box-title">Employee List</h3>
							                                                                </div>
							                                                                <!-- /.box-header -->
							                                                                <div class="box-body">
							                                                                    <table id="example2" class="table table-striped">
							                                                                        <thead>
							                                                                            <tr>
							                                                                                <th>Sr No</th>
							                                                                                <th>PF Number</th>
							                                                                                <th>Order Type</th>
							                                                                                <th>Transion Id</th>
							                                                                                <th>View</th>
							                                                                            </tr>
							                                                                        </thead>
							                                                                        <tbody>

							                                                                            <?php
                                                                                                        $pf_no = $_GET['pf'];
                                                                                                        $cnt_pr = 1;
                                                                                                        $sql = mysqli_query($conn, "select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
                                                                                                        while ($result = mysqli_fetch_array($sql)) {
                                                                                                            echo "<tr>";
                                                                                                            echo "<td>$cnt_pr</td>";
                                                                                                            echo "<td>" . $result['pro_pf_no'] . "</td>";
                                                                                                            echo "<td>" . $result['pro_order_type'] . "</td>";
                                                                                                            echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                                            echo "<td><a target='_blank' href='prft_show_promotion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                                            echo "</tr>";
                                                                                                            $cnt_pr++;
                                                                                                        }
                                                                                                        ?>

							                                                                        </tbody>
							                                                                        <tfoot>
							                                                                        </tfoot>
							                                                                    </table>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example2').DataTable()

							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                        </div>

							                        <div class="tab-pane" id="revers">

							                            <div class="tab-pane" id="revers" style="padding:10px;">
							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Reversion</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="box-header">
							                                                                    <h3 class="box-title">Employee List</h3>
							                                                                </div>
							                                                                <!-- /.box-header -->
							                                                                <div class="box-body">
							                                                                    <table id="example3" class="table table-striped">
							                                                                        <thead>
							                                                                            <tr>
							                                                                                <th>Sr No</th>
							                                                                                <th>PF Number</th>
							                                                                                <th>Order Type</th>
							                                                                                <th>Transion Id</th>
							                                                                                <th>View</th>
							                                                                            </tr>
							                                                                        </thead>
							                                                                        <tbody>
							                                                                            <?php
                                                                                                        $pf_no = $_GET['pf'];
                                                                                                        $cnt_rv = 1;
                                                                                                        $sql = mysqli_query($conn, "select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
                                                                                                        while ($result = mysqli_fetch_array($sql)) {
                                                                                                            echo "<tr>";
                                                                                                            echo "<td>$cnt_rv</td>";
                                                                                                            echo "<td>" . $result['rev_pf_no'] . "</td>";
                                                                                                            echo "<td>" . $result['rev_order_type'] . "</td>";
                                                                                                            echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                                            echo "<td><a target='_blank' href='prft_show_reversion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                                            echo "</tr>";
                                                                                                            $cnt_rv++;
                                                                                                        }
                                                                                                        ?>


							                                                                        </tbody>
							                                                                        <tfoot>

							                                                                        </tfoot>
							                                                                    </table>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example3').DataTable()

							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>

							                        </div>

							                        <div class="tab-pane" id="transs">
							                            <div class="tab-pane" id="transs" style="padding:10px;">
							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Transfer</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="box-header">
							                                                                    <h3 class="box-title">Employee List</h3>
							                                                                </div>
							                                                                <!-- /.box-header -->
							                                                                <div class="box-body">
							                                                                    <table id="example4" class="table table-striped">
							                                                                        <thead>
							                                                                            <tr>
							                                                                                <th>Sr No</th>
							                                                                                <th>PF Number</th>
							                                                                                <th>Order Type</th>
							                                                                                <th>Transion Id</th>
							                                                                                <th>View</th>
							                                                                            </tr>
							                                                                        </thead>
							                                                                        <tbody>
							                                                                            <?php
                                                                                                        $pf_no = $_GET['pf'];
                                                                                                        $cnt_tr = 1;
                                                                                                        $sql = mysqli_query($conn, "select * from prft_transfer_temp where trans_pf_no='$pf_no'");
                                                                                                        while ($result = mysqli_fetch_array($sql)) {
                                                                                                            echo "<tr>";
                                                                                                            echo "<td>$cnt_tr</td>";
                                                                                                            echo "<td>" . $result['trans_pf_no'] . "</td>";
                                                                                                            echo "<td>" . get_order_type_transfer($result['trans_order_type']) . "</td>";
                                                                                                            echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                                            echo "<td><a target='_blank' href='prft_show_transfer.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                                            echo "</tr>";
                                                                                                            $cnt_tr++;
                                                                                                        }
                                                                                                        ?>

							                                                                        </tbody>
							                                                                        <tfoot>

							                                                                        </tfoot>
							                                                                    </table>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example4').DataTable()

							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                            <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							                                <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							                            </div>
							                        </div>

							                        <div class="tab-pane" id="fixs">

							                            <div class="tab-pane" id="fixs" style="padding:10px;">

							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Fixation</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="box-header">
							                                                                    <h3 class="box-title">Employee List</h3>
							                                                                </div>
							                                                                <!-- /.box-header -->
							                                                                <div class="box-body">
							                                                                    <table id="example5" class="table table-striped">
							                                                                        <thead>
							                                                                            <tr>
							                                                                                <th>Sr No</th>
							                                                                                <th>PF Number</th>
							                                                                                <th>Order Type</th>
							                                                                                <th>Transion Id</th>
							                                                                                <th>View</th>
							                                                                            </tr>
							                                                                        </thead>
							                                                                        <tbody>

							                                                                            <?php
                                                                                                        // dbcon1();
                                                                                                        $pf_no = $_GET['pf'];
                                                                                                        $cnt_fx = 1;
                                                                                                        $sql1 = mysqli_query($conn, "select * from prft_fixation_temp where fix_pf_no='$pf_no'");
                                                                                                        $cnt = mysqli_num_rows($sql1);


                                                                                                        while ($result = mysqli_fetch_array($sql1)) {
                                                                                                            //echo "<script>alert(".$result['id'].")</script>";
                                                                                                            echo "<tr>";
                                                                                                            echo "<td>$cnt_fx</td>";
                                                                                                            echo "<td>" . $result['fix_pf_no'] . "</td>";
                                                                                                            echo "<td>" . get_order_type_fixation($result['fix_order_type']) . "</td>";
                                                                                                            echo "<td>" . $result['temp_transaction_id'] . "</td>";
                                                                                                            echo "<td><a target='_blank' href='prft_show_fixaction.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
                                                                                                            echo "</tr>";
                                                                                                            $cnt_fx++;
                                                                                                        }
                                                                                                        ?>

							                                                                        </tbody>
							                                                                        <tfoot>

							                                                                        </tfoot>
							                                                                    </table>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example5').DataTable()

							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                            <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							                                <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							                            </div>
							                        </div>
							                    </div>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Penalty Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <?php
                                                    //penalty 
                                                    // dbcon1();
                                                    $pf_no = $_GET['pf'];
                                                    //echo "<script>alert('$pf_no');</script>";
                                                    $cnt = 1;
                                                    $query = mysqli_query($conn, "Select * from penalty_temp where pen_pf_number='$pf_no'");
                                                    //echo "Select * from penalty_temp where pen_pf_number='$pf_no'".mysql_error();
                                                    while ($result = mysqli_fetch_assoc($query)) {

                                                    ?>

							                            <table border="1" class="table table-bordered" style="width:100%">
							                                <tbody>
							                                    <tr>
							                                        <td colspan="5" style="background-color:grey;color:white;"><b><?php echo $cnt; ?> Penalty</b></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed ">PF No</label></td>
							                                        <td> <label class="control-label labelhdata"><?php echo $result['pen_pf_number']; ?></label></td>
							                                        <td><label class="control-label labelhed">Penalty Type</label></td>
							                                        <td><label class="labelhdata labelhdata"><?php echo get_penalty_type($result['pen_type']); ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">Penalty Issued</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                echo  date('d-m-Y', strtotime($result['pen_issued'])); ?></label></td>
							                                        <td><label class="control-label labelhed">Penalty Effected</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                echo  date('d-m-Y', strtotime($result['pen_effetcted'])); ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">Letter No</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo $result['pen_letterno']; ?></label></td>
							                                        <td><label class="control-label labelhed">Letter Date</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">ChargeSheet Status</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo get_charge_sheet_status($result['pen_chargestatus']); ?></label></td>
							                                        <td><label class="control-label labelhed">ChargeSheet Reference Number </label></td>
							                                        <td><label class="control-label labelhdata"><?php echo $result['pen_chargeref']; ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">From Date</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($result['pen_from'])); ?></label></td>
							                                        <td><label class="control-label labelhed">To Date</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                echo date('d-m-Y', strtotime($result['pen_to'])); ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">Remarks</label></td>
							                                        <td colspan="5"><label class="control-label labelhdata"><?php echo $result['pen_remark'];  ?></label></td>

							                                    </tr>
							                                    <?php $cnt++; ?>
							                                <?php
                                                        }
                                                            ?>
							                                </tbody>
							                            </table>
							                    </div>
							                    <?php
                                                // dbcon1();
                                                $sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
                                                $sql_fetch = mysqli_fetch_array($sql);
                                                ?>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Increment Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border='1' class='table table-bordered' style='width:100%'>
							                            <tr>
							                                <td>Pf Number</td>
							                                <td><?php echo $sql_fetch['incr_pf_number']; ?></td>
							                            </tr>
							                        </table>
							                        <table border='1' class='table table-bordered' style='width:100%'>
							                            <tbody>
							                                <tr>
							                                    <th>Sr No</th>
							                                    <th>Increment type</th>
							                                    <th>Pay Scale type</th>
							                                    <th>Pay Scale/level</th>
							                                    <th>rate of pay</th>
							                                    <th>increment date</th>
							                                    <th>reason</th>
							                                </tr>
							                                <?php
                                                            // dbcon1();
                                                            $sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
                                                            $cnt = "1";
                                                            while ($result = mysqli_fetch_array($sql)) {

                                                                $incr_scale = "";
                                                                $incr_level = "";
                                                                $ps_type = get_pay_scale_type($result['ps_type']);
                                                                if ($result['ps_type'] == '2' || $result['ps_type'] == '3' || $result['ps_type'] == '4') {
                                                                    $incr_scale = $result['incr_scale'];
                                                                    $incr_level = "";
                                                                } else if ($result['ps_type'] == '5') {
                                                                    $incr_level = $result['incr_level'];
                                                                    $incr_scale = "";
                                                                }

                                                                echo "<tr>";
                                                                echo "<td>$cnt</td>";
                                                                echo "<td>" . get_increment_type($result['incr_type']) . "</td>";
                                                                echo "<td>" . get_pay_scale_type($result['ps_type']) . "</td>";
                                                                echo "<td>$incr_scale $incr_level </td>";
                                                                echo "<td>" . $result['incr_rop'] . "</td>";
                                                                echo "<td>" . date('d/m/Y', strtotime($result['incr_date'])) . "</td>";
                                                                echo "<td>" . $result['incr_remark'] . "</td>";
                                                                echo "</tr>";
                                                                $cnt++;
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>

							                    </div>

							                    <h3>&nbsp;&nbsp;Adavance Details</h3>
							                    <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                    <div class="table-responsive" style="padding:20px;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <?php
                                                            // dbcon1();
                                                            $sql = mysqli_query($conn, "select * from  advance_temp where adv_pf_number='$pf_no'");
                                                            if ($sql) {
                                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                                    $pf_no = $fetch_sql['adv_pf_number'];
                                                                    $advance_type = $fetch_sql['adv_type'];
                                                                    $letter_number = $fetch_sql['adv_letterno'];
                                                                    $letter_date = $fetch_sql['adv_letterdate'];
                                                                    $wef_date = $fetch_sql['adv_wefdate'];
                                                                    $amount = $fetch_sql['adv_amount'];
                                                                    $tot_amt = $fetch_sql['adv_principle'];
                                                                    $interest = $fetch_sql['adv_interest'];
                                                                    $date_frm = $fetch_sql['adv_from'];
                                                                    $date_to = $fetch_sql['adv_to'];
                                                                    $remark = $fetch_sql['adv_remark'];

                                                            ?>
							                                        <tr>
							                                            <td><label class="control-label labelhed ">PF No</label></td>
							                                            <td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
							                                            <td><label class="control-label labelhed">Advances Type</label></td>
							                                            <td><label class="labelhdata labelhdata"><?php echo $advance_type; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Letter No</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
							                                            <td><label class="control-label labelhed">Letter Date</label></td>
							                                            <td><label class="control-label labelhdata"><?php
                                                                                                                    $date = date_create($letter_date);
                                                                                                                    $letter_date = date_format($date, "d/m/Y");
                                                                                                                    echo $letter_date; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">WEF Date</label></td>
							                                            <td><label class="control-label labelhdata"><?php
                                                                                                                    $date = date_create($wef_date);
                                                                                                                    $wef_date = date_format($date, "d/m/Y");
                                                                                                                    echo $wef_date ?></label></td>
							                                            <td><label class="control-label labelhed">Amount</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
							                                        </tr>

							                                        <tr>
							                                            <td colspan="6"><label class="control-label labelhed"><b>Recovery Details</b></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Total Principle Amount</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
							                                            <td><label class="control-label labelhed">Total Interest</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">From Date</label></td>
							                                            <td><label class="control-label labelhdata"><?php $date = date_create($date_frm);
                                                                                                                    $date_frm = date_format($date, "d/m/Y");
                                                                                                                    echo $date_frm ?></label></td>
							                                            <td><label class="control-label labelhed">To Date</label></td>
							                                            <td><label class="control-label labelhdata"><?php $date = date_create($date_to);
                                                                                                                    $date_to = date_format($date, "d/m/Y");
                                                                                                                    echo $date_to ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Remarks</label></td>
							                                            <td colspan="6"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td colspan="5" style="background-color:gray"></td>
							                                        </tr>

							                                <?php
                                                                }
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>
							                    </div><br><br>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Property Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <?php
                                                            //property query
                                                            $sql = mysqli_query($conn, "select * from  property_temp where pro_pf_number='$pf_no'");
                                                            if ($sql) {
                                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                                    $pf_no = $fetch_sql['pro_pf_number'];
                                                                    $property_type = get_property_type($fetch_sql['pro_type']);
                                                                    $item = get_property_item($fetch_sql['pro_item']);
                                                                    $other_item = $fetch_sql['pro_otheritem'];
                                                                    $make_modal = $fetch_sql['pro_make'];
                                                                    $dop = $fetch_sql['pro_dop'];
                                                                    $location = $fetch_sql['pro_location'];
                                                                    $reg_no = $fetch_sql['pro_regno'];
                                                                    $area = $fetch_sql['pro_area'];
                                                                    $survey_number = $fetch_sql['pro_surveyno'];
                                                                    $tot_cost = $fetch_sql['pro_cost'];
                                                                    $source = $fetch_sql['pro_source'];
                                                                    $source_type = get_source_typ($fetch_sql['pro_sourcetype']);
                                                                    $amount = $fetch_sql['pro_amount'];
                                                                    $letter_number = $fetch_sql['pro_letterno'];
                                                                    $letter_date = $fetch_sql['pro_letterdate'];
                                                                    $remark = $fetch_sql['pro_remark'];

                                                            ?>
							                                        <tr>
							                                            <td><label class="control-label labelhed ">PF No</label></td>
							                                            <td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
							                                            <td><label class="control-label labelhed">Property Type</label></td>
							                                            <td><label class="labelhdata labelhdata"><?php echo $property_type; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Item</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $item; ?></label></td>
							                                            <td><label class="control-label labelhed">Other Item</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $other_item; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Make/Model</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $make_modal; ?></label></td>
							                                            <td><label class="control-label labelhed">Date Of Purchase</label></td>
							                                            <td><label class="control-label labelhdata"><?php
                                                                                                                    $date = date_create($dop);
                                                                                                                    $dop = date_format($date, "d/m/Y");
                                                                                                                    echo $dop; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Location</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $location; ?></label></td>
							                                            <td><label class="control-label labelhed">Registration No</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Area</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $area; ?></label></td>
							                                            <td><label class="control-label labelhed">Survey Number</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $survey_number; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Total Cost</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $tot_cost; ?></label></td>
							                                            <td><label class="control-label labelhed">Source</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $source; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Source type</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $source_type; ?></label></td>
							                                            <td><label class="control-label labelhed">Amount</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $amount; ?></label></td>
							                                        </tr>

							                                        <tr>
							                                            <td><label class="control-label labelhed">Letter No</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
							                                            <td><label class="control-label labelhed">Letter Date</label></td>
							                                            <td><label class="control-label labelhdata"><?php
                                                                                                                    $date = date_create($letter_date);
                                                                                                                    $letter_date = date_format($date, "d/m/Y");
                                                                                                                    echo $letter_date; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Remarks</label></td>
							                                            <td colspan="3"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td colspan="5" style="background-color:gray"></td>
							                                        </tr>
							                                <?php
                                                                }
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>
							                    </div>

							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Family Composition Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <?php
                                                    // dbcon1();
                                                    $sql = mysqli_query($conn, "select * from  family_temp where emp_pf='$pf_no'");

                                                    while ($result = mysqli_fetch_array($sql)) {

                                                        $fmy_pf_number = $result['fmy_pf_number'];
                                                        $fmy_updatedate = $result['fmy_updatedate'];
                                                        $date = date_create($fmy_updatedate);
                                                        $fmy_updatedate = date_format($date, "d/m/Y");
                                                        $fmy_member = $result['fmy_member'];
                                                        $fmy_rel = get_relation($result['fmy_rel']);
                                                        $fmy_gender = get_gender($result['fmy_gender']);
                                                        $fmy_dob = $result['fmy_dob'];
                                                        $date = date_create($fmy_dob);
                                                        $fmy_dob = date_format($date, "d/m/Y");
                                                        echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                        echo "<tbody>";
                                                        echo "<tr>";

                                                        // echo "<td><label class='control-label labelhed ' >Relative ID</label></td>";		
                                                        // echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
                                                        echo "<td ><label class='control-label labelhed' >Date Of Updation</label></td>";
                                                        echo "<td colspan='3'><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";
                                                        echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";
                                                        echo "<td><label class='control-label labelhed' >Member Relation</label></td>";
                                                        echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";
                                                        echo "</tr>";
                                                        echo "<tr>";
                                                        echo "<td><label class='control-label labelhed' >Gender</label></td>";
                                                        echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";
                                                        echo "<td><label class='control-label labelhed' >DOB</label></td>";
                                                        echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";
                                                        echo "</tr>";
                                                        echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                        echo "</tbody>";
                                                        echo "</table>";
                                                    }
                                                    ?>


							                    </div>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Award Details</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <?php
                                                            // dbcon1();
                                                            $sql = mysqli_query($conn, "select * from  award_temp where awd_pf_number='$pf_no'");
                                                            if ($sql) {
                                                                while ($fetch_sql = mysqli_fetch_array($sql)) {
                                                                    $awd_pf_number = $fetch_sql['awd_pf_number'];
                                                                    $awd_award_date     = $fetch_sql['awd_date'];
                                                                    $date = date_create($awd_award_date);
                                                                    $awd_award_date = date_format($date, "d/m/Y");
                                                                    $awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
                                                                    $awd_award_type = got_award($fetch_sql['awd_type']);
                                                                    $awd_other_award = $fetch_sql['awd_other'];
                                                                    $awd_award_detail = $fetch_sql['awd_detail'];

                                                            ?>
							                                        <tr>
							                                            <td><label class="control-label labelhed ">PF No</label></td>
							                                            <td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
							                                            <td><label class="control-label labelhed">Date Of Award</label></td>
							                                            <td><label class="labelhdata labelhdata"><?php echo $awd_award_date; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Awarded By</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $awd_awarded_by; ?></label></td>
							                                            <td><label class="control-label labelhed">Type Of Award</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $awd_award_type; ?></label></td>
							                                        </tr>
							                                        <tr>
							                                            <td><label class="control-label labelhed">Other Award</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $awd_other_award; ?></label></td>
							                                            <td><label class="control-label labelhed">Award Details</label></td>
							                                            <td><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
							                                        </tr>
							                                        <tr>
							                                        <tr>
							                                            <td colspan="5" style="background-color:gray"></td>
							                                        </tr>
							                                        </tr>
							                                <?php
                                                                }
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>
							                    </div>

							                    <h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
							                    <div class="box-header with-border">
							                        <ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							                            <li class="active"><a href="#nominees" data-toggle="tab"><b>Nominee</b></a></li>
							                            <!--li class=""><a href="#giss" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuitys" data-toggle="tab"><b>Gratuity Nominee</b></a></li-->

							                        </ul>

							                    </div>
							                    <div class="tab-content">
							                        <div class="tab-pane active in" id="nominees">

							                            <div class="tab-pane" id="nominees" style="padding:10px;">
							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Nominee</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="table-responsive">
							                                                                    <?php
                                                                                                // dbcon1();
                                                                                                $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no'");
                                                                                                while ($result = mysqli_fetch_array($sql)) {

                                                                                                    echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                                                    echo "<tbody>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                                                    echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                                                    echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                                                    echo "</td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                                                    $date = date_create($result['nom_dob']);
                                                                                                    echo "<td><label class='control-label labelhdata'>" .
                                                                                                        date_format($date, "d/m/Y");
                                                                                                    "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                                                    echo "</tr>	";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                                                    echo "</tbody>";
                                                                                                    echo "</table>";
                                                                                                }
                                                                                                ?>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example2').DataTable()
							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                        </div>
							                        <div class="tab-pane" id="giss">
							                            <div class="tab-pane" id="giss" style="padding:10px;">
							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>GIS Nominee</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="table-responsive">
							                                                                    <?php
                                                                                                // dbcon1();
                                                                                                $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GIS'");
                                                                                                while ($result = mysqli_fetch_array($sql)) {

                                                                                                    echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                                                    echo "<tbody>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                                                    echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                                                    echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                                                    echo "</td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                                                    $date = date_create($result['nom_dob']);
                                                                                                    $dob = date_format($date, "d/m/Y");
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                                                    echo "</tr>	";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                                                    echo "</tbody>";
                                                                                                    echo "</table>";
                                                                                                }
                                                                                                ?>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example3').DataTable()
							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                            <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							                                <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							                            </div>
							                        </div>
							                        <div class="tab-pane" id="gratuitys">

							                            <div class="tab-pane" id="gratuitys" style="padding:10px;">

							                                <div class="box-body">
							                                    <form class="">
							                                        <div class="modal-body">
							                                            <h3>Gratuity Nominee</h3>
							                                            <hr>
							                                            <div class="row">
							                                                <section class="content">
							                                                    <div class="row">
							                                                        <div class="col-xs-12">
							                                                            <div class="box">
							                                                                <div class="table-responsive">
							                                                                    <?php
                                                                                                // dbcon1();
                                                                                                $sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GRA'");
                                                                                                while ($result = mysqli_fetch_array($sql)) {

                                                                                                    echo "<table border='1' class='table table-bordered'  style='width:100%'>";
                                                                                                    echo "<tbody>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>PF No</label></td>";
                                                                                                    echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
                                                                                                    echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
                                                                                                    echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
                                                                                                    echo "</td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Percentage</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Age</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
                                                                                                    $date = date_create($result['nom_dob']);
                                                                                                    $dob = date_format($date, "d/m/Y");
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
                                                                                                    echo "</tr>	";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr>";
                                                                                                    echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
                                                                                                    echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
                                                                                                    echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
                                                                                                    echo "</tr>";
                                                                                                    echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
                                                                                                    echo "</tbody>";
                                                                                                    echo "</table>";
                                                                                                }
                                                                                                ?>
							                                                                </div>
							                                                                <!-- /.box-body -->
							                                                            </div>
							                                                            <!-- /.box -->
							                                                        </div>
							                                                        <!-- /.col -->
							                                                    </div>
							                                                    <!-- /.row -->
							                                                </section>
							                                                <script>
							                                                    $(function() {
							                                                        $('#example4').DataTable()
							                                                    })
							                                                </script>
							                                            </div>
							                                        </div>
							                                    </form>
							                                </div>
							                            </div>
							                            <div class="pull-right col-md-7 col-sm-12 col-xs-12">
							                                <!--a href="sr_view.php" class="btn btn-primary">Back</a-->
							                            </div>
							                        </div>
							                    </div>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp; Training</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <?php
                                                            // dbcon1();
                                                            $nominee = mysqli_query($conn, "select * from  training_temp where pf_number='$pf_no'");
                                                            while ($fetch_nominee = mysqli_fetch_array($nominee)) {

                                                                $tra_pf_number = $fetch_nominee['pf_number'];
                                                                $tra_training_status = get_training_type($fetch_nominee['training_type']);
                                                                $tra_last_date     = $fetch_nominee['last_date'];
                                                                $tra_due_date = $fetch_nominee['due_date'];
                                                                $tra_training_from = $fetch_nominee['training_from'];
                                                                $tra_training_to = $fetch_nominee['letter_date'];
                                                                $tra_description  = $fetch_nominee['description'];
                                                                $tra_letter_number  = $fetch_nominee['letter_no'];
                                                                $tra_letter_date  = $fetch_nominee['letter_date'];
                                                                $tra_remark = $fetch_nominee['remarks'];
                                                            ?>
							                                    <tr>
							                                        <td><label class="control-label labelhed ">PF No</label></td>
							                                        <td> <label class="control-label labelhdata"><?php echo $tra_pf_number ?></label></td>
							                                        <td><label class="control-label labelhed">Training Type</label></td>
							                                        <td><label class="labelhdata labelhdata"><?php echo $tra_training_status ?></label></td>
							                                    </tr>

							                                    <tr>
							                                        <td><label class="control-label labelhed">Last Date</label></td>
							                                        <td><label class="labelhdata labelhdata"><?php
                                                                                                                $date = date_create($tra_last_date);
                                                                                                                $tra_last_date = date_format($date, "d/m/Y");
                                                                                                                echo $tra_last_date; ?></label>
							                                        </td>
							                                        <td><label class="control-label labelhed">Due Date</label></td>
							                                        <td><label class="labelhdata labelhdata"><?php
                                                                                                                $date = date_create($tra_due_date);
                                                                                                                $tra_due_date = date_format($date, "d/m/Y");
                                                                                                                echo $tra_due_date; ?></label>
							                                        </td>
							                                    </tr>


							                                    <tr>
							                                        <td><label class="control-label labelhed">Training From</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                $date = date_create($tra_training_from);
                                                                                                                $tra_training_from = date_format($date, "d/m/Y");
                                                                                                                echo $tra_training_from ?></label></td>
							                                        <td><label class="control-label labelhed">Training To</label></td>
							                                        <td><label class="control-label labelhdata"><?php $date = date_create($tra_training_to);
                                                                                                                $tra_training_to = date_format($date, "d/m/Y");
                                                                                                                echo $tra_training_to ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">Letter No</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
							                                        <td><label class="control-label labelhed">Letter Date</label></td>
							                                        <td><label class="control-label labelhdata"><?php
                                                                                                                $date = date_create($tra_letter_date);
                                                                                                                $tra_letter_date = date_format($date, "d/m/Y");
                                                                                                                echo $tra_letter_date ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td><label class="control-label labelhed">Description</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
							                                        <td><label class="control-label labelhed">remark</label></td>
							                                        <td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
							                                    </tr>
							                                    <tr>
							                                        <td colspan="5" style="background-color:gray"></td>
							                                    </tr>
							                                <?php
                                                            }
                                                            ?>
							                            </tbody>
							                        </table>
							                    </div>
							                    <div class="table-responsive" style="padding:20px;">
							                        <h3>&nbsp;&nbsp;Last Entry</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">PF Number</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
							                                    <td><label class="control-label labelhed "> Date Of Joining</label></td>
							                                    <td> <label class="control-label labelhdata"> <?php echo $doj ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Retirement type</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $retire_type ?></label></td>
							                                    <td><label class="control-label labelhed">Date Of Retirement</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $dor; ?></label></td>
							                                </tr>

							                                <tr>
							                                    <td><label class="control-label labelhed">Designation on Retirement</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $desig_or ?></label></td>
							                                    <td><label class="control-label labelhed">Department</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $dept ?></label></td>
							                                </tr>
							                                <tr>

							                                    <td><label class="control-label labelhed">Station</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $station ?></label></td>
							                                    <td><label class="control-label labelhed">ROP</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $rop ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Bill Unit</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $bill_unit ?></label></td>
							                                    <td><label class="control-label labelhed">Scale/Level</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $scale_lvl ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Depot</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $depot ?></td>
							                                    <td><label class="control-label labelhed">Employee Category</label></td>
							                                    <td><label class="control-label labelhdata"><?php echo $emp_cat; ?></label></td>
							                                </tr>
							                                <tr>

							                                    <td><label class="control-label labelhed">Total Service</label></td>
							                                    <td colspan="3"><label class="control-label labelhdata"><?php echo $tot_years, "  Years  ", $tot_months, "  Months  ", $tot_days, "  Days  "; ?></label></td>

							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">No. of Qualification Service</label></td>
							                                    <td colspan="3"><label class="control-label labelhdata"><?php echo $no_years, "  Years  ", $no_months, "  Months  ", $no_days, "  Days  "; ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>
							                        <h3>&nbsp;&nbsp;Leave Balance</h3>
							                        <hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							                        <table border="1" class="table table-bordered" style="width:100%">
							                            <tbody>
							                                <tr>
							                                    <td><label class="control-label labelhed ">LAP</label></td>
							                                    <td> <label class="control-label labelhdata"><?php echo $lap; ?></label></td>
							                                    <td><label class="control-label labelhed">LHAP</label></td>
							                                    <td><label class="labelhdata labelhdata"><?php echo $lhap; ?></label></td>
							                                </tr>
							                                <tr>
							                                    <td><label class="control-label labelhed">Advance Leaves</label></td>
							                                    <td colspan="5"><label class="control-label labelhdata"><?php echo $ad_leaves; ?></label></td>
							                                </tr>
							                            </tbody>
							                        </table>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>






							<h3>&nbsp;&nbsp;Medical Details</h3>
						<div class="table-responsive" style="padding:20px;">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Sr No</th>
										<th>Type Of Medical</th>
										<th>Medical Class</th>
										<th>Letter No</th>
										<th>Letter Date</th>
										<th>View</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// dbcon1();
									$sql = mysqli_query($conn, "select * from medical_temp where medi_pf_number='$pf_no'");
									$cnt = 1;
									while ($result = mysqli_fetch_array($sql)) {
										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>" . $result['medi_examtype'] . "</td>";
										echo "<td>" . $result['medi_class'] . "</td>";
										echo "<td>" . $result['medi_certino'] . "</td>";
										echo "<td>" . $result['medi_certidate'] . "</td>";
										echo '<td>
								<a value="' . $result['id'] . '" target="_blank" class="btn btn-primary update_btn" href="medical_detail.php?pf=$pf_no&page=display" >View</a>
							</td>';
										echo "</tr>";
										$cnt++;
									}
									?>
								</tbody>
							</table>
						</div>

						<h3>&nbsp;&nbsp;Initial Appointment</h3>
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="table-responsive" style="padding:20px;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $app_pf_number; ?> </label></td>
										<td><label class="control-label labelhed">Department</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $app_department; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Type of Initial Appointment</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $app_type; ?></label></td>
										<td><label class="control-label labelhed">Designation<span class=""></span></label></td>
										<td><label class="labelhdata labelhdata"><?php echo $app_designation; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Appointment Date</label></td>
										<td><label class="control-label labelhdata"><?php
																					$date = date_create($app_date);
																					echo date_format($date, "d/m/Y"); ?></label></td>
										<td><label class="control-label labelhed">Regularisation Date</label></td>
										<td><label class="control-label labelhdata"><?php
																					$date = date_create($app_regul_date);
																					echo date_format($date, "d/m/Y"); ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Pay Scale type</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_payscale; ?></label></td>
										<td><label class="control-label labelhed">Scale</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_scale; ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Level</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_level; ?></label></td>
										<td><label class="control-label labelhed">Group</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_group; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Station</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_station; ?></label></td>
										<td><label class="control-label labelhed">ROP</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_rop; ?></label></td>

									</tr>

									<tr>
										<td><label class="control-label labelhed">Workplace</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_depot; ?></label></td>
										<td><label class="control-label labelhed">Appointment Reference Number</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_refno; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Appointment Letter Date</label></td>
										<td><label class="control-label labelhdata"><?php
																					$date = date_create($app_letter_date);
																					echo date_format($date, "d/m/Y"); ?></label></td>
										<td><label class="control-label labelhed">Remark</label></td>
										<td><label class="control-label labelhdata"><?php echo $app_remark; ?></label></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="table-responsive" style="padding:20px;" id="sgd_ogd_no">
							<h3>&nbsp;&nbsp;Present Working Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number; ?> </label></td>
										<td><label class="control-label labelhed">Department</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Weather Employee is officiating in
												higher<br> grade than substantive grade?<span class=""></span></label></td>
										<td><label class="labelhdata"><?php echo $sgd_dropdwn_value ?></label></td>
										<td><label class="control-label labelhed">Designation</label></td>
										<td><label class="labelhdata"><?php echo  $pre_app_designation ?></label></td>
									</tr>

									<tr>
										<td><label class="control-label labelhed">Pay Scale Type</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_scale_type ?></label></td>
										<td><label class="control-label labelhed">Scale</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_scale ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Level</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_level ?></label></td>
										<td><label class="control-label labelhed">Bill Unit</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_billunit  ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Depot/Workplace</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_depot ?></label></td>
										<td><label class="control-label labelhed">Group</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_group_col ?></label></td>

									</tr>
									<tr>

										<td><label class="control-label labelhed">Station</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_other ?></label></td>
										<td><label class="control-label labelhed">Rate Of Pay</label></td>
										<td><label class="control-label labelhdata"><?php echo $pre_app_rop ?></label></td>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="table-responsive" style="padding:20px;" id="sgd_ogd_yes">
							<h3>&nbsp;&nbsp;Present Working Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $preapp_pf_number ?> </label></td>
										<td><label class="control-label labelhed">Department</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $pre_app_department ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Weather Employee is Officiating in
												higher<br> grade than substantive grade?<span class=""></span></label></td>
										<td colspan="5"><label class="labelhdata"><?php echo $sgd_dropdwn_value; ?></label></td>

									</tr>

									<tr>
										<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Substancive Grade Details</b></label></td>
									</tr>

									<tr>
										<td><label class="control-label labelhed">Designation</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_designation ?></label></td>
										<td><label class="control-label labelhed">Pay Scale Type</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_pst ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Scale</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_scale ?></label></td>
										<td><label class="control-label labelhed">Level</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_level ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Bill Unit</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_billunit ?></label></td>
										<td><label class="control-label labelhed">Depot</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_depot ?></label></td>

									</tr>

									<tr>
										<td><label class="control-label labelhed">Station</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_station ?></label></td>
										<td><label class="control-label labelhed">Group</label></td>
										<td><label class="control-label labelhdata"><?php echo $sgd_group ?></label></td>

									</tr>


									<tr>
										<td colspan="4"> <label class="control-label labelhed" style="font-size:18px;"><b>Officiating Grade Details</b></label></td>
									</tr>

									<tr>
										<td><label class="control-label labelhed">Designation</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_desig ?></label></td>
										<td><label class="control-label labelhed">Pay Scale Type</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_pst ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Scale</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_scale ?></label></td>
										<td><label class="control-label labelhed">Level</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_level ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Bill Unit</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_billunit ?></label></td>
										<td><label class="control-label labelhed">Depot</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_depot ?></label></td>

									</tr>

									<tr>
										<td><label class="control-label labelhed">Station</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_station ?></label></td>
										<td><label class="control-label labelhed">Group</label></td>
										<td><label class="control-label labelhdata"><?php echo $ogd_group ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">Rate Of Pay</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $ogd_rop ?></label></td>
									</tr>

								</tbody>
							</table>
						</div>


						<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
							<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Promotion/Reversion/Transfer/Fixation</h3>
							<li class="active"><a href="#prfts" data-toggle="tab"><b>Promotion</b></a></li>
							<li class=""><a href="#revers" data-toggle="tab"><b>Reversion</b></a></li>
							<li class=""><a href="#transs" data-toggle="tab"><b>Transfer</b></a></li>
							<li class=""><a href="#fixs" data-toggle="tab"><b>Fixation</b></a></li>
						</ul>

						<div class="tab-content">
							<div class="tab-pane active in" id="prfts">
								<div class="tab-pane" id="prfts" style="padding:10px;">
									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Promotion</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="box-header">
																		<h3 class="box-title">Employee List</h3>
																	</div>
																	<!-- /.box-header -->
																	<div class="box-body">
																		<table id="example2" class="table table-striped">
																			<thead>
																				<tr>
																					<th>Sr No</th>
																					<th>PF Number</th>
																					<th>Order Type</th>
																					<th>Transion Id</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>

																				<?php
																				$pf_no = $_GET['pf'];
																				$cnt_pr = 1;
																				$sql = mysqli_query($conn, "select * from  prft_promotion_temp where pro_pf_no='$pf_no'");
																				while ($result = mysqli_fetch_array($sql)) {
																					echo "<tr>";
																					echo "<td>$cnt_pr</td>";
																					echo "<td>" . $result['pro_pf_no'] . "</td>";
																					echo "<td>" . $result['pro_order_type'] . "</td>";
																					echo "<td>" . $result['temp_transaction_id'] . "</td>";
																					echo "<td><a target='_blank' href='prft_show_promotion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
																					echo "</tr>";
																					$cnt_pr++;
																				}
																				?>

																			</tbody>
																			<tfoot>
																			</tfoot>
																		</table>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example2').DataTable()

														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="revers">

								<div class="tab-pane" id="revers" style="padding:10px;">
									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Reversion</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="box-header">
																		<h3 class="box-title">Employee List</h3>
																	</div>
																	<!-- /.box-header -->
																	<div class="box-body">
																		<table id="example3" class="table table-striped">
																			<thead>
																				<tr>
																					<th>Sr No</th>
																					<th>PF Number</th>
																					<th>Order Type</th>
																					<th>Transion Id</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php
																				$pf_no = $_GET['pf'];
																				$cnt_rv = 1;
																				$sql = mysqli_query($conn, "select * from   prft_reversion_temp where rev_pf_no='$pf_no'");
																				while ($result = mysqli_fetch_array($sql)) {
																					echo "<tr>";
																					echo "<td>$cnt_rv</td>";
																					echo "<td>" . $result['rev_pf_no'] . "</td>";
																					echo "<td>" . $result['rev_order_type'] . "</td>";
																					echo "<td>" . $result['temp_transaction_id'] . "</td>";
																					echo "<td><a target='_blank' href='prft_show_reversion.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
																					echo "</tr>";
																					$cnt_rv++;
																				}
																				?>


																			</tbody>
																			<tfoot>

																			</tfoot>
																		</table>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example3').DataTable()

														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>

							</div>

							<div class="tab-pane" id="transs">
								<div class="tab-pane" id="transs" style="padding:10px;">
									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Transfer</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="box-header">
																		<h3 class="box-title">Employee List</h3>
																	</div>
																	<!-- /.box-header -->
																	<div class="box-body">
																		<table id="example4" class="table table-striped">
																			<thead>
																				<tr>
																					<th>Sr No</th>
																					<th>PF Number</th>
																					<th>Order Type</th>
																					<th>Transion Id</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>
																				<?php
																				$pf_no = $_GET['pf'];
																				$cnt_tr = 1;
																				$sql = mysqli_query($conn, "select * from prft_transfer_temp where trans_pf_no='$pf_no'");
																				while ($result = mysqli_fetch_array($sql)) {
																					echo "<tr>";
																					echo "<td>$cnt_tr</td>";
																					echo "<td>" . $result['trans_pf_no'] . "</td>";
																					echo "<td>" . get_order_type_transfer($result['trans_order_type']) . "</td>";
																					echo "<td>" . $result['temp_transaction_id'] . "</td>";
																					echo "<td><a target='_blank' href='prft_show_transfer.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
																					echo "</tr>";
																					$cnt_tr++;
																				}
																				?>

																			</tbody>
																			<tfoot>

																			</tfoot>
																		</table>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example4').DataTable()

														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
								</div>
							</div>

							<div class="tab-pane" id="fixs">

								<div class="tab-pane" id="fixs" style="padding:10px;">

									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Fixation</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="box-header">
																		<h3 class="box-title">Employee List</h3>
																	</div>
																	<!-- /.box-header -->
																	<div class="box-body">
																		<table id="example5" class="table table-striped">
																			<thead>
																				<tr>
																					<th>Sr No</th>
																					<th>PF Number</th>
																					<th>Order Type</th>
																					<th>Transion Id</th>
																					<th>View</th>
																				</tr>
																			</thead>
																			<tbody>

																				<?php
																				// dbcon1();
																				$pf_no = $_GET['pf'];
																				$cnt_fx = 1;
																				$sql1 = mysqli_query($conn, "select * from prft_fixation_temp where fix_pf_no='$pf_no'");
																				$cnt = mysqli_num_rows($sql1);


																				while ($result = mysqli_fetch_array($sql1)) {
																					//echo "<script>alert(".$result['id'].")</script>";
																					echo "<tr>";
																					echo "<td>$cnt_fx</td>";
																					echo "<td>" . $result['fix_pf_no'] . "</td>";
																					echo "<td>" . get_order_type_fixation($result['fix_order_type']) . "</td>";
																					echo "<td>" . $result['temp_transaction_id'] . "</td>";
																					echo "<td><a target='_blank' href='prft_show_fixaction.php?pf_no=$pf_no&id=" . $result['id'] . "' class='btn btn-primary'><i class='fa fa-eye' aria-hidden='true'>&nbsp;<b>View</b></i></a></td>";
																					echo "</tr>";
																					$cnt_fx++;
																				}
																				?>

																			</tbody>
																			<tfoot>

																			</tfoot>
																		</table>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example5').DataTable()

														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
								</div>
							</div>
						</div>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Penalty Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<?php
							//penalty 
							// dbcon1();
							$pf_no = $_GET['pf'];
							//echo "<script>alert('$pf_no');</script>";
							$cnt = 1;
							$query = mysqli_query($conn, "Select * from penalty_temp where pen_pf_number='$pf_no'");
							//echo "Select * from penalty_temp where pen_pf_number='$pf_no'".mysql_error();
							while ($result = mysqli_fetch_assoc($query)) {

							?>

								<table border="1" class="table table-bordered" style="width:100%">
									<tbody>
										<tr>
											<td colspan="5" style="background-color:grey;color:white;"><b><?php echo $cnt; ?> Penalty</b></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed ">PF No</label></td>
											<td> <label class="control-label labelhdata"><?php echo $result['pen_pf_number']; ?></label></td>
											<td><label class="control-label labelhed">Penalty Type</label></td>
											<td><label class="labelhdata labelhdata"><?php echo get_penalty_type($result['pen_type']); ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">Penalty Issued</label></td>
											<td><label class="control-label labelhdata"><?php
																						echo  date('d-m-Y', strtotime($result['pen_issued'])); ?></label></td>
											<td><label class="control-label labelhed">Penalty Effected</label></td>
											<td><label class="control-label labelhdata"><?php
																						echo  date('d-m-Y', strtotime($result['pen_effetcted'])); ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">Letter No</label></td>
											<td><label class="control-label labelhdata"><?php echo $result['pen_letterno']; ?></label></td>
											<td><label class="control-label labelhed">Letter Date</label></td>
											<td><label class="control-label labelhdata"><?php
																						echo date('d-m-Y', strtotime($result['pen_letterdate'])); ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">ChargeSheet Status</label></td>
											<td><label class="control-label labelhdata"><?php echo get_charge_sheet_status($result['pen_chargestatus']); ?></label></td>
											<td><label class="control-label labelhed">ChargeSheet Reference Number </label></td>
											<td><label class="control-label labelhdata"><?php echo $result['pen_chargeref']; ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">From Date</label></td>
											<td><label class="control-label labelhdata"><?php echo date('d-m-Y', strtotime($result['pen_from'])); ?></label></td>
											<td><label class="control-label labelhed">To Date</label></td>
											<td><label class="control-label labelhdata"><?php
																						echo date('d-m-Y', strtotime($result['pen_to'])); ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">Remarks</label></td>
											<td colspan="5"><label class="control-label labelhdata"><?php echo $result['pen_remark'];  ?></label></td>

										</tr>
										<?php $cnt++; ?>
									<?php
								}
									?>
									</tbody>
								</table>
						</div>
						<?php
						// dbcon1();
						$sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
						$sql_fetch = mysqli_fetch_array($sql);
						?>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Increment Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border='1' class='table table-bordered' style='width:100%'>
								<tr>
									<td>Pf Number</td>
									<td><?php echo $sql_fetch['incr_pf_number']; ?></td>
								</tr>
							</table>
							<table border='1' class='table table-bordered' style='width:100%'>
								<tbody>
									<tr>
										<th>Sr No</th>
										<th>Increment type</th>
										<th>Pay Scale type</th>
										<th>Pay Scale/level</th>
										<th>rate of pay</th>
										<th>increment date</th>
										<th>reason</th>
									</tr>
									<?php
									// dbcon1();
									$sql = mysqli_query($conn, "select * from  increment_temp where incr_pf_number='$pf_no'");
									$cnt = "1";
									while ($result = mysqli_fetch_array($sql)) {

										$incr_scale = "";
										$incr_level = "";
										$ps_type = get_pay_scale_type($result['ps_type']);
										if ($result['ps_type'] == '2' || $result['ps_type'] == '3' || $result['ps_type'] == '4') {
											$incr_scale = $result['incr_scale'];
											$incr_level = "";
										} else if ($result['ps_type'] == '5') {
											$incr_level = $result['incr_level'];
											$incr_scale = "";
										}

										echo "<tr>";
										echo "<td>$cnt</td>";
										echo "<td>" . get_increment_type($result['incr_type']) . "</td>";
										echo "<td>" . get_pay_scale_type($result['ps_type']) . "</td>";
										echo "<td>$incr_scale $incr_level </td>";
										echo "<td>" . $result['incr_rop'] . "</td>";
										echo "<td>" . date('d/m/Y', strtotime($result['incr_date'])) . "</td>";
										echo "<td>" . $result['incr_remark'] . "</td>";
										echo "</tr>";
										$cnt++;
									}
									?>
								</tbody>
							</table>

						</div>

						<h3>&nbsp;&nbsp;Adavance Details</h3>
						<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
						<div class="table-responsive" style="padding:20px;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<?php
									// dbcon1();
									$sql = mysqli_query($conn, "select * from  advance_temp where adv_pf_number='$pf_no'");
									if ($sql) {
										while ($fetch_sql = mysqli_fetch_array($sql)) {
											$pf_no = $fetch_sql['adv_pf_number'];
											$advance_type = $fetch_sql['adv_type'];
											$letter_number = $fetch_sql['adv_letterno'];
											$letter_date = $fetch_sql['adv_letterdate'];
											$wef_date = $fetch_sql['adv_wefdate'];
											$amount = $fetch_sql['adv_amount'];
											$tot_amt = $fetch_sql['adv_principle'];
											$interest = $fetch_sql['adv_interest'];
											$date_frm = $fetch_sql['adv_from'];
											$date_to = $fetch_sql['adv_to'];
											$remark = $fetch_sql['adv_remark'];

									?>
											<tr>
												<td><label class="control-label labelhed ">PF No</label></td>
												<td> <label class="control-label labelhdata"><?php echo $pf_no; ?></label></td>
												<td><label class="control-label labelhed">Advances Type</label></td>
												<td><label class="labelhdata labelhdata"><?php echo $advance_type; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Letter No</label></td>
												<td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
												<td><label class="control-label labelhed">Letter Date</label></td>
												<td><label class="control-label labelhdata"><?php
																							$date = date_create($letter_date);
																							$letter_date = date_format($date, "d/m/Y");
																							echo $letter_date; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">WEF Date</label></td>
												<td><label class="control-label labelhdata"><?php
																							$date = date_create($wef_date);
																							$wef_date = date_format($date, "d/m/Y");
																							echo $wef_date ?></label></td>
												<td><label class="control-label labelhed">Amount</label></td>
												<td><label class="control-label labelhdata"><?php echo $amount ?></label></td>
											</tr>

											<tr>
												<td colspan="6"><label class="control-label labelhed"><b>Recovery Details</b></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Total Principle Amount</label></td>
												<td><label class="control-label labelhdata"><?php echo $tot_amt ?></label></td>
												<td><label class="control-label labelhed">Total Interest</label></td>
												<td><label class="control-label labelhdata"><?php echo $interest ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">From Date</label></td>
												<td><label class="control-label labelhdata"><?php $date = date_create($date_frm);
																							$date_frm = date_format($date, "d/m/Y");
																							echo $date_frm ?></label></td>
												<td><label class="control-label labelhed">To Date</label></td>
												<td><label class="control-label labelhdata"><?php $date = date_create($date_to);
																							$date_to = date_format($date, "d/m/Y");
																							echo $date_to ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Remarks</label></td>
												<td colspan="6"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
											</tr>
											<tr>
												<td colspan="5" style="background-color:gray"></td>
											</tr>

									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div><br><br>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Property Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<?php
									//property query
									$sql = mysqli_query($conn, "select * from  property_temp where pro_pf_number='$pf_no'");
									if ($sql) {
										while ($fetch_sql = mysqli_fetch_array($sql)) {
											$pf_no = $fetch_sql['pro_pf_number'];
											$property_type = get_property_type($fetch_sql['pro_type']);
											$item = get_property_item($fetch_sql['pro_item']);
											$other_item = $fetch_sql['pro_otheritem'];
											$make_modal = $fetch_sql['pro_make'];
											$dop = $fetch_sql['pro_dop'];
											$location = $fetch_sql['pro_location'];
											$reg_no = $fetch_sql['pro_regno'];
											$area = $fetch_sql['pro_area'];
											$survey_number = $fetch_sql['pro_surveyno'];
											$tot_cost = $fetch_sql['pro_cost'];
											$source = $fetch_sql['pro_source'];
											$source_type = get_source_typ($fetch_sql['pro_sourcetype']);
											$amount = $fetch_sql['pro_amount'];
											$letter_number = $fetch_sql['pro_letterno'];
											$letter_date = $fetch_sql['pro_letterdate'];
											$remark = $fetch_sql['pro_remark'];

									?>
											<tr>
												<td><label class="control-label labelhed ">PF No</label></td>
												<td> <label class="control-label labelhdata"><?php echo $pf_no ?></label></td>
												<td><label class="control-label labelhed">Property Type</label></td>
												<td><label class="labelhdata labelhdata"><?php echo $property_type; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Item</label></td>
												<td><label class="control-label labelhdata"><?php echo $item; ?></label></td>
												<td><label class="control-label labelhed">Other Item</label></td>
												<td><label class="control-label labelhdata"><?php echo $other_item; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Make/Model</label></td>
												<td><label class="control-label labelhdata"><?php echo $make_modal; ?></label></td>
												<td><label class="control-label labelhed">Date Of Purchase</label></td>
												<td><label class="control-label labelhdata"><?php
																							$date = date_create($dop);
																							$dop = date_format($date, "d/m/Y");
																							echo $dop; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Location</label></td>
												<td><label class="control-label labelhdata"><?php echo $location; ?></label></td>
												<td><label class="control-label labelhed">Registration No</label></td>
												<td><label class="control-label labelhdata"><?php echo $reg_no ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Area</label></td>
												<td><label class="control-label labelhdata"><?php echo $area; ?></label></td>
												<td><label class="control-label labelhed">Survey Number</label></td>
												<td><label class="control-label labelhdata"><?php echo $survey_number; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Total Cost</label></td>
												<td><label class="control-label labelhdata"><?php echo $tot_cost; ?></label></td>
												<td><label class="control-label labelhed">Source</label></td>
												<td><label class="control-label labelhdata"><?php echo $source; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Source type</label></td>
												<td><label class="control-label labelhdata"><?php echo $source_type; ?></label></td>
												<td><label class="control-label labelhed">Amount</label></td>
												<td><label class="control-label labelhdata"><?php echo $amount; ?></label></td>
											</tr>

											<tr>
												<td><label class="control-label labelhed">Letter No</label></td>
												<td><label class="control-label labelhdata"><?php echo $letter_number; ?></label></td>
												<td><label class="control-label labelhed">Letter Date</label></td>
												<td><label class="control-label labelhdata"><?php
																							$date = date_create($letter_date);
																							$letter_date = date_format($date, "d/m/Y");
																							echo $letter_date; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Remarks</label></td>
												<td colspan="3"><label class="control-label labelhdata"><?php echo $remark; ?></label></td>
											</tr>
											<tr>
												<td colspan="5" style="background-color:gray"></td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>

						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Family Composition Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<?php
							// dbcon1();
							$sql = mysqli_query($conn, "select * from  family_temp where emp_pf='$pf_no'");

							while ($result = mysqli_fetch_array($sql)) {

								$fmy_pf_number = $result['fmy_pf_number'];
								$fmy_updatedate = $result['fmy_updatedate'];
								$date = date_create($fmy_updatedate);
								$fmy_updatedate = date_format($date, "d/m/Y");
								$fmy_member = $result['fmy_member'];
								$fmy_rel = get_relation($result['fmy_rel']);
								$fmy_gender = get_gender($result['fmy_gender']);
								$fmy_dob = $result['fmy_dob'];
								$date = date_create($fmy_dob);
								$fmy_dob = date_format($date, "d/m/Y");
								echo "<table border='1' class='table table-bordered'  style='width:100%'>";
								echo "<tbody>";
								echo "<tr>";

								// echo "<td><label class='control-label labelhed ' >Relative ID</label></td>";		
								// echo "<td> <label class='control-label labelhdata'>$fmy_pf_number</label></td>";	
								echo "<td ><label class='control-label labelhed' >Date Of Updation</label></td>";
								echo "<td colspan='3'><label class='labelhdata labelhdata'>$fmy_updatedate</label></td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td><label class='control-label labelhed' >Family Member Name</label></td>";
								echo "<td><label class='control-label labelhdata'>$fmy_member</label></td>";
								echo "<td><label class='control-label labelhed' >Member Relation</label></td>";
								echo "<td><label class='control-label labelhdata'>$fmy_rel</label></td>";
								echo "</tr>";
								echo "<tr>";
								echo "<td><label class='control-label labelhed' >Gender</label></td>";
								echo "<td><label class='control-label labelhdata'>$fmy_gender</label></td>";
								echo "<td><label class='control-label labelhed' >DOB</label></td>";
								echo "<td><label class='control-label labelhdata'>$fmy_dob</label></td>";
								echo "</tr>";
								echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
								echo "</tbody>";
								echo "</table>";
							}
							?>


						</div>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Award Details</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<?php
									// dbcon1();
									$sql = mysqli_query($conn, "select * from  award_temp where awd_pf_number='$pf_no'");
									if ($sql) {
										while ($fetch_sql = mysqli_fetch_array($sql)) {
											$awd_pf_number = $fetch_sql['awd_pf_number'];
											$awd_award_date	 = $fetch_sql['awd_date'];
											$date = date_create($awd_award_date);
											$awd_award_date = date_format($date, "d/m/Y");
											$awd_awarded_by = get_awarded_by($fetch_sql['awd_by']);
											$awd_award_type = got_award($fetch_sql['awd_type']);
											$awd_other_award = $fetch_sql['awd_other'];
											$awd_award_detail = $fetch_sql['awd_detail'];

									?>
											<tr>
												<td><label class="control-label labelhed ">PF No</label></td>
												<td> <label class="control-label labelhdata"><?php echo $awd_pf_number ?></label></td>
												<td><label class="control-label labelhed">Date Of Award</label></td>
												<td><label class="labelhdata labelhdata"><?php echo $awd_award_date; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Awarded By</label></td>
												<td><label class="control-label labelhdata"><?php echo $awd_awarded_by; ?></label></td>
												<td><label class="control-label labelhed">Type Of Award</label></td>
												<td><label class="control-label labelhdata"><?php echo $awd_award_type; ?></label></td>
											</tr>
											<tr>
												<td><label class="control-label labelhed">Other Award</label></td>
												<td><label class="control-label labelhdata"><?php echo $awd_other_award; ?></label></td>
												<td><label class="control-label labelhed">Award Details</label></td>
												<td><label class="control-label labelhdata"><?php echo $awd_award_detail ?></label></td>
											</tr>
											<tr>
											<tr>
												<td colspan="5" style="background-color:gray"></td>
											</tr>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
						<h3 class="box-title"><i class="fa fa-book"></i>&nbsp;&nbsp;Nominee Details</h3>
						<div class="box-header with-border">
							<ul class="nav nav-tabs" style="border-bottom: 1px solid #ddd;">
								<li class="active"><a href="#nominees" data-toggle="tab"><b>Nominee</b></a></li>
								<!--li class=""><a href="#giss" data-toggle="tab"><b>GIS Nominee</b></a></li>
						<li class=""><a href="#gratuitys" data-toggle="tab"><b>Gratuity Nominee</b></a></li-->

							</ul>

						</div>
						<div class="tab-content">
							<div class="tab-pane active in" id="nominees">

								<div class="tab-pane" id="nominees" style="padding:10px;">
									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Nominee</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="table-responsive">
																		<?php
																		// dbcon1();
																		$sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no'");
																		while ($result = mysqli_fetch_array($sql)) {

																			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
																			echo "<tbody>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>PF No</label></td>";
																			echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
																			echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
																			echo "</td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Percentage</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Age</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
																			$date = date_create($result['nom_dob']);
																			echo "<td><label class='control-label labelhdata'>" .
																				date_format($date, "d/m/Y");
																			"</label></td>";
																			echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
																			echo "</tr>	";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
																			echo "</tbody>";
																			echo "</table>";
																		}
																		?>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example2').DataTable()
														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="giss">

								<div class="tab-pane" id="giss" style="padding:10px;">

									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>GIS Nominee</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="table-responsive">
																		<?php
																		// dbcon1();
																		$sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GIS'");
																		while ($result = mysqli_fetch_array($sql)) {

																			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
																			echo "<tbody>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>PF No</label></td>";
																			echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
																			echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
																			echo "</td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Percentage</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Age</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
																			$date = date_create($result['nom_dob']);
																			$dob = date_format($date, "d/m/Y");
																			echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
																			echo "</tr>	";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
																			echo "</tbody>";
																			echo "</table>";
																		}
																		?>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example3').DataTable()
														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
								</div>
							</div>
							<div class="tab-pane" id="gratuitys">

								<div class="tab-pane" id="gratuitys" style="padding:10px;">

									<div class="box-body">
										<form class="">
											<div class="modal-body">
												<h3>Gratuity Nominee</h3>
												<hr>
												<div class="row">
													<section class="content">
														<div class="row">
															<div class="col-xs-12">
																<div class="box">
																	<div class="table-responsive">
																		<?php
																		// dbcon1();
																		$sql = mysqli_query($conn, "select * from  nominee_temp where nom_pf_number='$pf_no' and nom_type='GRA'");
																		while ($result = mysqli_fetch_array($sql)) {

																			echo "<table border='1' class='table table-bordered'  style='width:100%'>";
																			echo "<tbody>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>PF No</label></td>";
																			echo "<td> <label class='control-label labelhdata'>" . $result['nom_pf_number'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Nomination Type</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_type'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Name of Nominee</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . $result['nom_name'] . "</label>";
																			echo "</td><td><label class='control-label labelhed' >Nomination Relationship</label></td>";
																			echo "<td><label class='labelhdata labelhdata'>" . get_relation($result['nom_rel']) . "</label>";
																			echo "</td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Other Relationship</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_otherrel'] . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Percentage</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_per'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Marital Status</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . got_mr($result['nom_status']) . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Age</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_age'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Date Of Birth</label></td>";
																			$date = date_create($result['nom_dob']);
																			$dob = date_format($date, "d/m/Y");
																			echo "<td><label class='control-label labelhdata'>" . $dob . "</label></td>";
																			echo "<td><label class='control-label labelhed' >Nominee PAN Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_panno'] . "</label></td>";
																			echo "</tr>	";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed' >Nominee Aadhar Number</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_aadhar'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Address Of Nominee</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_address'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr>";
																			echo "<td><label class='control-label labelhed'>Contigencies</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_conti'] . "</label></td>";
																			echo "<td><label class='control-label labelhed'>Name, Address & Relation of person predeceasing the subscriber</label></td>";
																			echo "<td><label class='control-label labelhdata'>" . $result['nom_subscriber'] . "</label></td>";
																			echo "</tr>";
																			echo "<tr><td colspan='5' style='background-color:gray'></td></tr>";
																			echo "</tbody>";
																			echo "</table>";
																		}
																		?>
																	</div>
																	<!-- /.box-body -->
																</div>
																<!-- /.box -->
															</div>
															<!-- /.col -->
														</div>
														<!-- /.row -->
													</section>
													<script>
														$(function() {
															$('#example4').DataTable()
														})
													</script>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="pull-right col-md-7 col-sm-12 col-xs-12">
									<!--a href="sr_view.php" class="btn btn-primary">Back</a-->
								</div>
							</div>
						</div>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp; Training</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<?php
									// dbcon1();
									$nominee = mysqli_query($conn, "select * from  training_temp where pf_number='$pf_no'");
									while ($fetch_nominee = mysqli_fetch_array($nominee)) {

										$tra_pf_number = $fetch_nominee['pf_number'];
										$tra_training_status = get_training_type($fetch_nominee['training_type']);
										$tra_last_date	 = $fetch_nominee['last_date'];
										$tra_due_date = $fetch_nominee['due_date'];
										$tra_training_from = $fetch_nominee['training_from'];
										$tra_training_to = $fetch_nominee['letter_date'];
										$tra_description  = $fetch_nominee['description'];
										$tra_letter_number  = $fetch_nominee['letter_no'];
										$tra_letter_date  = $fetch_nominee['letter_date'];
										$tra_remark = $fetch_nominee['remarks'];
									?>
										<tr>
											<td><label class="control-label labelhed ">PF No</label></td>
											<td> <label class="control-label labelhdata"><?php echo $tra_pf_number ?></label></td>
											<td><label class="control-label labelhed">Training Type</label></td>
											<td><label class="labelhdata labelhdata"><?php echo $tra_training_status ?></label></td>
										</tr>

										<tr>
											<td><label class="control-label labelhed">Last Date</label></td>
											<td><label class="labelhdata labelhdata"><?php
																						$date = date_create($tra_last_date);
																						$tra_last_date = date_format($date, "d/m/Y");
																						echo $tra_last_date; ?></label>
											</td>
											<td><label class="control-label labelhed">Due Date</label></td>
											<td><label class="labelhdata labelhdata"><?php
																						$date = date_create($tra_due_date);
																						$tra_due_date = date_format($date, "d/m/Y");
																						echo $tra_due_date; ?></label>
											</td>
										</tr>


										<tr>
											<td><label class="control-label labelhed">Training From</label></td>
											<td><label class="control-label labelhdata"><?php
																						$date = date_create($tra_training_from);
																						$tra_training_from = date_format($date, "d/m/Y");
																						echo $tra_training_from ?></label></td>
											<td><label class="control-label labelhed">Training To</label></td>
											<td><label class="control-label labelhdata"><?php $date = date_create($tra_training_to);
																						$tra_training_to = date_format($date, "d/m/Y");
																						echo $tra_training_to ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">Letter No</label></td>
											<td><label class="control-label labelhdata"><?php echo $tra_letter_number ?></label></td>
											<td><label class="control-label labelhed">Letter Date</label></td>
											<td><label class="control-label labelhdata"><?php
																						$date = date_create($tra_letter_date);
																						$tra_letter_date = date_format($date, "d/m/Y");
																						echo $tra_letter_date ?></label></td>
										</tr>
										<tr>
											<td><label class="control-label labelhed">Description</label></td>
											<td><label class="control-label labelhdata"><?php echo $tra_description ?></label></td>
											<td><label class="control-label labelhed">remark</label></td>
											<td><label class="control-label labelhdata"><?php echo $tra_remark ?></label></td>
										</tr>
										<tr>
											<td colspan="5" style="background-color:gray"></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="table-responsive" style="padding:20px;">
							<h3>&nbsp;&nbsp;Last Entry</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">PF Number</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $pf_number ?></label></td>
										<td><label class="control-label labelhed "> Date Of Joining</label></td>
										<td> <label class="control-label labelhdata"> <?php echo $doj ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Retirement type</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $retire_type ?></label></td>
										<td><label class="control-label labelhed">Date Of Retirement</label></td>
										<td><label class="control-label labelhdata"><?php echo $dor; ?></label></td>
									</tr>

									<tr>
										<td><label class="control-label labelhed">Designation on Retirement</label></td>
										<td><label class="control-label labelhdata"><?php echo $desig_or ?></label></td>
										<td><label class="control-label labelhed">Department</label></td>
										<td><label class="control-label labelhdata"><?php echo $dept ?></label></td>
									</tr>
									<tr>

										<td><label class="control-label labelhed">Station</label></td>
										<td><label class="control-label labelhdata"><?php echo $station ?></label></td>
										<td><label class="control-label labelhed">ROP</label></td>
										<td><label class="control-label labelhdata"><?php echo $rop ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Bill Unit</label></td>
										<td><label class="control-label labelhdata"><?php echo $bill_unit ?></label></td>
										<td><label class="control-label labelhed">Scale/Level</label></td>
										<td><label class="control-label labelhdata"><?php echo $scale_lvl ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Depot</label></td>
										<td><label class="control-label labelhdata"><?php echo $depot ?></td>
										<td><label class="control-label labelhed">Employee Category</label></td>
										<td><label class="control-label labelhdata"><?php echo $emp_cat; ?></label></td>
									</tr>
									<tr>

										<td><label class="control-label labelhed">Total Service</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $tot_years, "  Years  ", $tot_months, "  Months  ", $tot_days, "  Days  "; ?></label></td>

									</tr>
									<tr>
										<td><label class="control-label labelhed">No. of Qualification Service</label></td>
										<td colspan="3"><label class="control-label labelhdata"><?php echo $no_years, "  Years  ", $no_months, "  Months  ", $no_days, "  Days  "; ?></label></td>
									</tr>
								</tbody>
							</table>
							<h3>&nbsp;&nbsp;Leave Balance</h3>
							<hr style="height:1px;border:none;color:#f39c12;background-color:#f39c12;">
							<table border="1" class="table table-bordered" style="width:100%">
								<tbody>
									<tr>
										<td><label class="control-label labelhed ">LAP</label></td>
										<td> <label class="control-label labelhdata"><?php echo $lap; ?></label></td>
										<td><label class="control-label labelhed">LHAP</label></td>
										<td><label class="labelhdata labelhdata"><?php echo $lhap; ?></label></td>
									</tr>
									<tr>
										<td><label class="control-label labelhed">Advance Leaves</label></td>
										<td colspan="5"><label class="control-label labelhdata"><?php echo $ad_leaves; ?></label></td>
									</tr>
								</tbody>
							</table>
						</div>