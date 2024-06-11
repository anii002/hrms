<!DOCTYPE html>
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->

<?php include_once('global/header.php');
include_once('global/model.php');
include("fun.php");
?>

<!-- Start: Header Section ================================ -->
<section class="header-section-1 bg-image-1 header-js" id="search">
    <div class="overlay-color img-responsive">
        <div class="container img-responsive responsive ">
            <div class="row section-separator" style="padding-top:80px;">
                <div class="col-md-10 col-md-offset-1 col-sm-10">
                    <form class="single-form" id='frmSearch' method="POST">
                        <div class="col-xs-12 text-center">
                            <h3 class="text-heading">Grievance Status</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <input class="contact-first-name form-control" name="griv_ref_no" id="griv_ref_no"
                                    type="text" placeholder="Enter 6 Digit Number" required="">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="btn btn-success btn_search" name="search" id="search"
                                    value='Submit'>
                            </div>
                        </div>
                    </form>
                </div> <!-- End: .part-1 -->
            </div> <!-- End: .row --><br>
            <div id="fetch_record">
            </div>
        </div> <!-- End: .container -->
    </div> <!-- End: .overlay-color -->
</section>
<!-- End: Header Section
        ================================ -->

<!-- Start: Features Section 1
        ====================================== -->
<section class="features-section-1 relative "
    style='background-image: url("images/small1.png");background-repeat:repeat;'>
    <div class="container">
        <div class="row section-separator">



        </div> <!-- End: .row -->
    </div> <!-- End: .container -->
    <!--<center><a href="index.php" onclick='index.php'style="text-decoration: underline;color:red">Click here to go Home Page</a><center>	-->
</section>
<!-- Start: Footer Section 1
        ================================== -->
<!-- <footer class="footer-section background-dark">
            <div class="container">
                <div class="row">
                    <div class="footer-header">
                        <div class="section-separator">
                            <div class="each-section col-sm-5 col-xs-12">
								<p>Copyright:SALGEM Infoigy Tech Pvt Ltd, All rights reserved.</p>
                            </div> 
                            <div class="each-section col-sm-1 col-xs-12">
                                <ul class="nav">
                                    <li>
                                        <div class="li-inner">
                                            <ul class="nav social-icon">
                                                <li><a href="#"><i class="icon icons8-facebook"></i></a></li>
                                                <li><a href="#"><i class="icon icons8-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                </div>
            </div> 
        </footer>-->
<!-- SCRIPTS 
        ========================================-->
<!--<script src="js/plagin-js/jquery-1.11.3.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/plagin-js/plagin.js"></script>
        <-- Custom Script 
        ==========================================-->
<!--<script src="js/custom-scripts.js"></script>
    </body>
</html>-->
<?php include('global/footer.php'); ?>
<script>
$(document).ready(function() {
    // $()
    $('.nav-menu .menu-active').removeClass('menu-active');
    // $(container).closest('li').addClass('menu-active');
    $('#grivance_status').addClass('menu-active');
    var docHeight = $(window).height();
    var footerHeight = $('footer').height();
    var footerTop = $('footer').position().top + footerHeight;
    if (footerTop < docHeight) {
        $('footer').css('margin-top', 10 + (docHeight - footerTop) + 'px');
    }
});

$("#frmSearch").submit(function(e) {
    e.preventDefault();
    var gri_ref_no = $('#griv_ref_no').val();
    // alert(gri_ref_no);
    $.ajax({
        type: 'POST',
        url: 'process.php',
        data: 'action=search_griv_ref&gri_ref_no=' + gri_ref_no,
        success: function(data) {
            // alert(data);
            // console.log(data);
            var Response = JSON.parse(data);
            // console.log(Response);
            if (Response.res == "success") {
                $("#fetch_record").html(Response.data);
                $('footer').css('margin-top', 0);
            } else {
                $("#fetch_record").html(Response.data);
            }
            // $("#award_count").val(award_count);
            // award_count++;
        }
    });
});
</script>