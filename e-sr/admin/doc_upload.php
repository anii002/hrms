<?php
$_GLOBALS['a'] = 'doc_upload';
include_once('../global/header_update.php');

include('create_log.php');

$action = "Visited Scanned Document page";
$action_on = $_SESSION['set_update_pf'];
create_log($action, $action_on);

?>
<link href="demo/css/lightgallery.css" rel="stylesheet">
<style type="text/css">
  body {
    background-color: #152836
  }

  .demo-gallery>ul {
    margin-bottom: 0;
  }

  .demo-gallery>ul>li {
    float: left;
    margin-bottom: 15px;
    margin-right: 20px;
    width: 200px;
  }

  .demo-gallery>ul>li a {
    border: 3px solid #FFF;
    border-radius: 3px;
    display: block;
    overflow: hidden;
    position: relative;
    float: left;
  }

  .demo-gallery>ul>li a>img {
    -webkit-transition: -webkit-transform 0.15s ease 0s;
    -moz-transition: -moz-transform 0.15s ease 0s;
    -o-transition: -o-transform 0.15s ease 0s;
    transition: transform 0.15s ease 0s;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    height: 100%;
    width: 100%;
  }

  .demo-gallery>ul>li a:hover>img {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  .demo-gallery>ul>li a:hover .demo-gallery-poster>img {
    opacity: 1;
  }

  .demo-gallery>ul>li a .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.1);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background-color 0.15s ease 0s;
    -o-transition: background-color 0.15s ease 0s;
    transition: background-color 0.15s ease 0s;
  }

  .demo-gallery>ul>li a .demo-gallery-poster>img {
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    opacity: 0;
    position: absolute;
    top: 50%;
    -webkit-transition: opacity 0.3s ease 0s;
    -o-transition: opacity 0.3s ease 0s;
    transition: opacity 0.3s ease 0s;
  }

  .demo-gallery>ul>li a:hover .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.5);
  }

  .demo-gallery .justified-gallery>a>img {
    -webkit-transition: -webkit-transform 0.15s ease 0s;
    -moz-transition: -moz-transform 0.15s ease 0s;
    -o-transition: -o-transform 0.15s ease 0s;
    transition: transform 0.15s ease 0s;
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
    height: 100%;
    width: 100%;
  }

  .demo-gallery .justified-gallery>a:hover>img {
    -webkit-transform: scale3d(1.1, 1.1, 1.1);
    transform: scale3d(1.1, 1.1, 1.1);
  }

  .demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
    opacity: 1;
  }

  .demo-gallery .justified-gallery>a .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.1);
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-transition: background-color 0.15s ease 0s;
    -o-transition: background-color 0.15s ease 0s;
    transition: background-color 0.15s ease 0s;
  }

  .demo-gallery .justified-gallery>a .demo-gallery-poster>img {
    left: 50%;
    margin-left: -10px;
    margin-top: -10px;
    opacity: 0;
    position: absolute;
    top: 50%;
    -webkit-transition: opacity 0.3s ease 0s;
    -o-transition: opacity 0.3s ease 0s;
    transition: opacity 0.3s ease 0s;
  }

  .demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
    background-color: rgba(0, 0, 0, 0.5);
  }

  .demo-gallery .video .demo-gallery-poster img {
    height: 48px;
    margin-left: -24px;
    margin-top: -24px;
    opacity: 0.8;
    width: 48px;
  }

  .demo-gallery.dark>ul>li a {
    border: 3px solid #04070a;
  }

  .home .demo-gallery {
    padding-bottom: 80px;
  }
</style>
<script src="demo/jquery-2.2.3.min.js"></script>
<!--Bio Tab Start -->
<div style="padding:10px;margin:5px;padding-top:0px;margin-top:-15px;">
  <div class="row" style="background:#67809f;margin:0px">
    <span style="color:white;font-size:22px;font-weight:200">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-address-card" style="font-size:22px;font-weight:200"></i>&nbsp;&nbsp;&nbsp;&nbsp;Upload Document</span>
  </div>
  <div style="border:1px solid #67809f;padding:30px;">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-book"></i> &nbsp;&nbsp;Upload Document</h3>
    </div>

    <form method="POST" action="process_main.php?action=upload_doc" class="apply_readonly" enctype="multipart/form-data">
      <?php
      $conn1 = dbcon1();
      $sql = mysqli_query($conn1, "select * from biodata_temp where pf_number='" . $_SESSION['set_update_pf'] . "'");
      $result = mysqli_fetch_array($sql);
      ?>
      <div class="modal-body">
        <div class="row" style="margin-top:10px;margin-bottom:10px;">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">PF No</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="doc_pf_no" name="doc_pf_no" class="form-control TextNumber common_pf_number" readonly value="<?php echo $result['pf_number']; ?>">
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Name</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="text" id="doc_emp_name" name="doc_emp_name" class="form-control TextNumber " value="<?php echo $result['emp_name']; ?>" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-top:10px;margin-bottom:10px;">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Upload Scanned Document</label>
              <div class="col-md-8 col-sm-8 col-xs-12">
                <input type="file" id="doc_file" name="doc_file[]" class="form-control" multiple accept="image/*">
              </div>
            </div>
          </div>
        </div>
      </div><br>
      <div class="clearfix"></div>
      <br>
      <div class="col-sm-2 col-xs-12 pull-right">
        <button type="submit" class="btn btn-info source">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      <br>
    </form>
  </div>
</div>
<h3>Document Details</h3>
<!--div class="row text-center">
		
		<div class="col-md-4" style="padding:20px;">
		<figure>
			<img src="upload_scanned_doc/<?php //echo $pf_number."/".$doc_name;
                                    ?>" alt="" class="img_responsive" width="350" height="275">
			<figcaption></figcaption>
		</figure>
		</div>
		<?php // } 
    ?>
	</div-->

<div class="row" id="show_multiple">
</div>
<!--div class="clearfix"></div><br>
			<label class="col-md-4"></label>
			<div class="clearfix"></div><br>
					<div class="col-md-8">
					<div class='demo-gallery'>
						<ul id='lightgallery' class='list-unstyled row'>
					
					<?php
          /* $sql = "select * from `sr_doc` where pf_number='".$_SESSION['set_update_pf']."'";
			$path = mysqli_query($sql);

			while($row = mysqli_fetch_assoc($path)) {
				
			$pf_number=$row['pf_number'];
			$doc_name=$row['doc_name'];*/
          ?> 
						
			<?php
      /* echo"<li class='col-xs-6 col-sm-4 col-md-3' data-responsive='upload_scanned_doc/$pf_number/$doc_name' data-src='upload_scanned_doc/$pf_number/$doc_name'>
							<a href='upload_scanned_doc/$pf_number/$doc_name'>
							<img src='upload_scanned_doc/$pf_number/$doc_name' style='width:250px;height:250px;' alt=''>
							</a></li>";  */

      ?>
		   
					  
				 <?php
          //}
          ?>
				
						 </ul>
					   </div>
					<br>
					</div>
		</div-->


<!--family Tab End -->
<?php include('modal_js_header.php'); ?>
<?php
if (isset($_SESSION['set_update_pf'])) {
  echo "<script>$('.common_pf_number').val('" . $_SESSION['set_update_pf'] . "'); </script>";
}
?>
<?php include_once('../global/footer.php'); ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('#lightgallery').lightGallery();
  });
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="demo/js/lightgallery.js"></script>
<script src="demo/js/lg-fullscreen.js"></script>
<script src="demo/js/lg-thumbnail.js"></script>
<script src="demo/js/lg-video.js"></script>
<script src="demo/js/lg-autoplay.js"></script>
<script src="demo/js/lg-zoom.js"></script>
<script src="demo/js/lg-hash.js"></script>
<script src="demo/js/lg-pager.js"></script>
<script src="demo/js/jquery.mousewheel.min.js">
</script>
<script>
  var empcode = <?php echo $_SESSION['set_update_pf']; ?>;
  var btnshow = 'none'
  $("#show_multiple").html("");
  //if (txtyear.length > 0 ) 
  //{
  $.ajax({
    type: "POST",
    url: "fetch_multiple.php",
    data: "btnshow=" + btnshow + "&empcode=" + empcode,
    cache: false,
    beforeSend: function() {
      $('#show_multiple').html('<img src="loader.gif" alt="" width="24" height="24">');
    },
    success: function(html) {
      //alert(html);
      $("#show_multiple").html(html);
      $('#output1').hide();
    }
  });

  //}
</script>