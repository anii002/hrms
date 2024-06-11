
<!-- iCheck -->
<script src="main/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<script src="main/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="main/plugins/jGrowl/jquery.jgrowl.js"></script>   
<meta name="author" content="Prathmesh Gardas,Shreya Aland,Himbindu Bharat">
<script>
	$(function() {
		$('.tooltip').tooltip();	
		$('.tooltip-left').tooltip({ placement: 'left' });	
		$('.tooltip-right').tooltip({ placement: 'right' });	
		$('.tooltip-top').tooltip({ placement: 'top' });	
		$('.tooltip-bottom').tooltip({ placement: 'bottom' });
		$('.popover-left').popover({placement: 'left', trigger: 'hover'});
		$('.popover-right').popover({placement: 'right', trigger: 'hover'});
		$('.popover-top').popover({placement: 'top', trigger: 'hover'});
		$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
		$('.notification').click(function() {
			var $id = $(this).attr('id');
			switch($id) {
				case 'notification-sticky':
					$.jGrowl("Stick this!", { sticky: true });
				break;
				case 'notification-header':
					$.jGrowl("A message with a header", { header: 'Important' });
				break;
				default:
					$.jGrowl("Hello world!");
				break;
			}
		});
	});
</script>

	