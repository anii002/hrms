<?php
// session_start();
// if(!isset($_SESSION['SESS_MEMBER_NAME']))
// {
// echo "<script>window.location='http://localhost/E_APR_FINAL/index.php';</script>";
// }
// include_once('../dbconfig/dbcon.php');
$GLOBALS['a'] = 'sr_entry';
include_once('../global/header.php');
include_once('../global/topbar.php');
include('mini_function.php');
include('fetch_all_column.php');
// echo 'test';exit;

?>

<style>
  /* .nav-tabs > li > a {
   margin-right: 2px;
   line-height: 1.42857143;
   border: 1px solid transparent;
   border-radius: 4px 4px 0 0;
}

.lbl_reg{
 display:none;
} 

.lbl_oth{
 display:none;
}
.lbl_oth1{
 display:none;
}
*/

  /*----- Tabs -----*/
  .tab {
    width: 100%;
    display: inline-block;
  }

  /*----- Tab Links -----*/
  /* Clearfix */
  .tab-links:after {
    display: block;
    clear: both;
    content: '';
  }

  .tab-links li {
    margin: 0px 5px;
    float: left;
    list-style: none;
  }

  .tab-links a {
    padding: 9px 15px;
    display: inline-block;
    border-radius: 3px 3px 0px 0px;
    background: #7FB5DA;
    font-size: 16px;
    font-weight: 600;
    color: #4c4c4c;
    transition: all linear 0.15s;
  }

  .tab-links a:hover {
    background: #a7cce5;
    text-decoration: none;
  }

  li.active a,
  li.active a:hover {
    background: #fff;
    color: #4c4c4c;
  }

  /*----- Content of Tabs -----*/
  .tab-content {
    padding: 15px;
    border-radius: 3px;
    box-shadow: -1px 1px 1px rgba(0, 0, 0, 0.15);
    background: #fff;
  }

  .tab {
    display: none;
  }

  .tab.active {
    display: block;
  }

  .nav-tabs>li>a {
    margin-right: 2px;
    line-height: 1.42857143;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
  }

  .lbl_reg {
    display: none;
  }

  .lbl_oth {
    display: none;
  }

  .lbl_oth1 {
    display: none;
  }


  #bio_email {
    text-transform: none;
  }

  input {
    text-transform: uppercase;
  }

  textarea {
    text-transform: uppercase;
  }

  /*Nav bar code*/
  /*
Code snippet by maridlcrmn for Bootsnipp.com
Follow me on Twitter @maridlcrmn
*/

  .navbar-brand {
    position: relative;
    z-index: 2;
  }

  .navbar-nav.navbar-right .btn {
    position: relative;
    z-index: 2;
    padding: 4px 20px;
    margin: 10px auto;
    transition: transform 0.3s;
  }

  .navbar .navbar-collapse {
    position: relative;
    overflow: hidden !important;
  }

  .navbar .navbar-collapse .navbar-right>li:last-child {
    padding-left: 22px;
  }

  .navbar .nav-collapse {
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: 0;
    padding-right: 120px;
    padding-left: 80px;
    width: 100%;
  }

  .navbar.navbar-default .nav-collapse {
    background-color: #f8f8f8;
  }

  .navbar.navbar-inverse .nav-collapse {
    background-color: pink;
  }

  .navbar .nav-collapse .navbar-form {
    border-width: 0;
    box-shadow: none;
  }

  .nav-collapse>li {
    float: right;
  }

  .btn.btn-circle {
    border-radius: 50px;
  }

  .btn.btn-outline {
    background-color: transparent;
  }

  .navbar-nav.navbar-right .btn:not(.collapsed) {
    background-color: rgb(111, 84, 153);
    border-color: rgb(111, 84, 153);
    color: rgb(255, 255, 255);
  }

  .navbar.navbar-default .nav-collapse,
  .navbar.navbar-inverse .nav-collapse {
    height: auto !important;
    transition: transform 0.3s;
    transform: translate(0px, -50px);
  }

  .navbar.navbar-default .nav-collapse.in,
  .navbar.navbar-inverse .nav-collapse.in {
    transform: translate(0px, 0px);
  }

  .navbar-inverse .navbar-nav>.active>a,
  .navbar-inverse .navbar-nav>.active>a:hover,
  .navbar-inverse .navbar-nav>.active>a:focus {
    color: #fff;
    background-color: #617aa980;
  }

  @media screen and (max-width: 767px) {
    .navbar .navbar-collapse .navbar-right>li:last-child {
      padding-left: 15px;
      padding-right: 15px;
    }

    .navbar .nav-collapse {
      margin: 7.5px auto;
      padding: 0;
    }

    .navbar .nav-collapse .navbar-form {
      margin: 0;
    }

    .nav-collapse>li {
      float: none;
    }

    .navbar.navbar-default .nav-collapse,
    .navbar.navbar-inverse .nav-collapse {
      transform: translate(-100%, 0px);
    }

    .navbar.navbar-default .nav-collapse.in,
    .navbar.navbar-inverse .nav-collapse.in {
      transform: translate(0px, 0px);
    }

    .navbar.navbar-default .nav-collapse.slide-down,
    .navbar.navbar-inverse .nav-collapse.slide-down {
      transform: translate(0px, -100%);
    }

    .navbar.navbar-default .nav-collapse.in.slide-down,
    .navbar.navbar-inverse .nav-collapse.in.slide-down {
      transform: translate(0px, 0px);
    }
  }

  #set_width {
    width: 1375px;
  }

  .nav>li>a {
    position: relative;
    display: block;
    padding: 10px 12px;
  }

  .navbar {
    border-radius: 0px;
  }
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
  //paste this code under head tag or in a seperate js file.
  // Wait for window load
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;
  });
</script>
<div class="col-xs-12">
  <div class="content-wrapper">
    <section class="">
      <div class="row">
        <div class="box">
          <style>
            .navbar-inverse {
              background-color: #3c8dbcbd;
              border-color: blue;
            }

            .navbar-inverse .navbar-nav>li>a {
              color: #000;
            }
          </style>
          <nav class="navbar navbar-inverse">
            <div class="container" id="set_width">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-3">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="#">Brand</a-->
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="navbar-collapse-3">
                <ul class="nav navbar-nav navbar-left">
                  <li <?php if ($_GLOBALS['a'] == 'biodata') {
                        echo 'class="active"';
                      } ?>><a href="biodata_update.php">BIO-DATA</a></li>

                  <?php //echo "<script>alert('$GLOBALS['a']');</script>";
                  ?>
                  <li <?php if ($_GLOBALS['a'] == 'initial') {
                        echo 'class="active"';
                      } ?>><a href="init_appo_update.php">INITIAL APPOINTMENT</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'medical') {
                        echo 'class="active"';
                      } ?>><a href="medical_update.php">MEDICAL DETAILS</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'pwd') {
                        echo 'class="active"';
                      } ?>><a href="present_work_update.php">PRESENT WORKING DETAILS</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'prft') {
                        echo 'class="active"';
                      } ?>><a href="prft_update.php">PRFT</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'increment') {
                        echo 'class="active"';
                      } ?>><a href="increment_update.php">INCREMENT</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'penalty') {
                        echo 'class="active"';
                      } ?>><a href="penalty_update.php">PENALTY</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'award') {
                        echo 'class="active"';
                      } ?>><a href="award_update.php">AWARDS</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'fam_comp') {
                        echo 'class="active"';
                      } ?>><a href="family_update.php">FAMILY COMPOSITION</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'nominee') {
                        echo 'class="active"';
                      } ?>><a href="nominee_update.php">NOMINEE</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'advance') {
                        echo 'class="active"';
                      } ?>><a href="advance_update.php">ADVANCE</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'property') {
                        echo 'class="active"';
                      } ?>><a href="property_update.php">PROPERTY</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'training') {
                        echo 'class="active"';
                      } ?>><a href="training_update.php">TRAINING</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'last_entry') {
                        echo 'class="active"';
                      } ?>><a href="last_update.php">LAST ENTRY</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'doc_upload') {
                        echo 'class="active"';
                      } ?>><a href="doc_upload.php" target="_blank">SCANNED SR DOCUMENT</a></li>
                  <li <?php if ($_GLOBALS['a'] == 'leave_acc') {
                        echo 'class="active"';
                      } ?>><a href="leave_upload.php" target="_blank">LEAVE ACCOUNT</a></li>
                  <li>
                    <!--a class="btn btn-default btn-outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a-->
                  </li>
                </ul>
                <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse3">
                  <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search" />
                    </div>
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                  </form>
                </div>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
          </nav><!-- /.navbar -->
          <?php

          $pay_scale_type = "";

          $sqlDept = mysqli_query($conn, "select * from pay_scale_type where id='6'");
          while ($rwDept = mysqli_fetch_array($sqlDept)) {
            $pay_scale_type .= "<option value='" . $rwDept["id"] . "'>" . $rwDept["type"] . "</option>";
          }


          $sqlDept = mysqli_query($conn, "select * from pay_scale_type where id!='6'");
          while ($rwDept = mysqli_fetch_array($sqlDept)) {
            $pay_scale_type .= "<option value='" . $rwDept["id"] . "'>" . $rwDept["type"] . "</option>";
          }

          $dept = "";
          $sqlDept = mysqli_query($conn, "select * from department");
          if (!$sqlDept) {
            echo 'Database error: ' . mysqli_error($conn);
          }
          while ($rwDept = mysqli_fetch_array($sqlDept)) {
            $dept .= "<option value='" . $rwDept["id"] . "'>" . $rwDept["DEPTDESC"] . "</option>";
          }

          $alldesignations = "";
          $sqlDept = mysqli_query($conn, "select * from designation");
          while ($rwDept = mysqli_fetch_array($sqlDept)) {
            $alldesignations .= "<option value=" . $rwDept["id"] . ">(" . $rwDept["desigshortdesc"] . ")" . $rwDept["desiglongdesc"] . "</option>";
          }

          $appo_type = "";
          $sqlDept = mysqli_query($conn, "select * from appointment_type");
          while ($rwDept = mysqli_fetch_array($sqlDept)) {
            $appo_type .= "<option value='" . $rwDept["id"] . "'>" . $rwDept["type"] . "</option>";
          }

          $group = "";
          $group = "<option value='' selected disabled>Select Group</option>";
          $group_col = mysqli_query($conn, "select * from group_col");
          while ($group_colre = mysqli_fetch_array($group_col)) {
            $group .= "<option value='" . $group_colre["id"] . "'>" . $group_colre["group_col"] . "</option>";
          }
          ?>