<!-- /.content-wrapper -->



</div>

<footer class="main-footer text-right">

    <!--  <div class="pull-right hidden-xs">

          <b>Version</b> 2.3.0

        </div> -->

    <h5>&copy; Copyright 2024, All rights

        reserved.<a href="http://www.infoigy.com/" target="_blank">Infoigy Tech Pvt Ltd.</a></h5>

</footer>

<!--<div class="control-sidebar-bg"></div>-->

</div><!-- ./wrapper -->



<!-- jQuery 2.1.4 -->



<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.5 -->

<script src="bootstrap/js/bootstrap.min.js"></script>

<!--  <script>

      $.widget.bridge('uibutton', $.ui.button);

    </script> -->



<!-- Morris.js charts -->

<!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

    <script src="plugins/morris/morris.min.js"></script> -->

<!-- Sparkline -->

<!--  <script src="plugins/sparkline/jquery.sparkline.min.js"></script> -->

<!-- jvectormap -->

<!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->

<!-- jQuery Knob Chart -->

<!-- <script src="plugins/knob/jquery.knob.js"></script> -->

<!-- daterangepicker -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>



<!-- datepicker -->



<!-- Bootstrap WYSIHTML5 -->

<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->

<!-- Slimscroll -->

<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->

<!-- <script src="plugins/fastclick/fastclick.min.js"></script> -->



<!-- AdminLTE App -->

<script src="dist/js/app.min.js"></script>



<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- <script src="dist/js/pages/dashboard.js"></script> -->

<!-- AdminLTE for demo purposes -->

<script src="dist/js/demo.js"></script>



<link href="bootstrap/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />

<link href="bootstrap/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />

<script src="bootstrap/js/bootstrap-modalmanager.js" type="text/javascript"></script>

<script src="bootstrap/js/bootstrap-modal.js" type="text/javascript"></script>



<script type="text/javascript" src="bootstrap/js/jquery.validate.min.js"></script>





<script type="text/javascript">
    $(document).ready(function() {



        'use strict';

        $(window).on('load', function() {

            if ($(".pre-loader").length > 0)

            {

                $(".pre-loader").fadeOut(1500);

                // $(".pre-loader").fadeOut("slow");

            }

        });

    });
</script>



<script type="text/javascript">
    $(function() {



        $("form[name='pro_form']").validate({

            rules: {

                password: {

                    required: true

                },

                conf_password: {

                    required: true,

                    equalTo: password

                }

            },





            messages: {

                password: {

                    required: "Please Enter New Password"

                },

                conf_password: {

                    required: "Please Enter Confirm Password",

                    equalTo: "Password does not Match"

                }

            },



            submitHandler: function(form) {

                form.submit();

            }

        });



    });
</script>



<script type="text/javascript">
    $(document).ready(function() {

        $('#image').change(function() {

            var file = $('#image').val();

            var exts = ['jpg', 'gpeg', 'png'];

            if (file)

            {

                var get_ext = file.split('.');

                get_ext = get_ext.reverse();



                if ($.inArray(get_ext[0].toLowerCase(), exts) > -1)

                {

                    //alert('Allowed extension!');

                } else

                {

                    alert('Invalid file!');

                    $('#image').val("");

                }

            }

        });

    });
</script>



</body>



</html>