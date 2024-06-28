<?php
include('../global/header.php');
include('../global/topbar.php');
include('../global/sidebaradmin.php');
?>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			APAR Grading Reprot
		</h1>

		<a data-toggle='modal' data-id='someid' class='open-AddBookDailog btn btn-primary' href='#addBookDailog'>test</a>

		Modal
		<div class='modal fade' id='addBookDailog' tabindex="-3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class='modal header'>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><b>×</b></span></button>
						<h3>Modal Header</h3>
					</div>
					<div class='modal-body'>
						<p>SOme content</p>
						<input type='text' name='bookId' id='bookId' value='' />
					</div>
				</div>
			</div>
		</div>

		<br>
	</section>
</div>


<script>
	$(document).on("click", ".open-AddBookDailog", function() {
		var myBookId = $(this).data('id');
		$(".modal-body #bookId").val(myBookId);
		$('#addBookDailog').modal('show');
	});
</script>
<?php
include('../global/footer.php');
?>