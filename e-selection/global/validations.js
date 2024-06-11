$(function(){
	$(".onlyText").on("input change paste", function() {debugger;
	    var newVal = $(this).val().replace(/[^a-zA-Z\s]/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".onlyNumber", function() {
	    var newVal = $(this).val().replace(/[^0-9]*$/g, '');
	    $(this).val(newVal);
 	});

 	$(document).on("input change paste", ".TextNumber", function() {debugger;
	    var newVal = $(this).val().replace(/[^a-zA-Z0-9\s,-.]/g, '');
	    $(this).val(newVal);
 	});
});;