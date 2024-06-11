<script>
jQuery(document).ready(function() {    
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   FormSamples.init();
   //TableAdvanced.init();
    ComponentsPickers.init();
    $('#sample_1').dataTable();
	$('#sample_2').dataTable(); 
	$('#sample_3').dataTable(); 
	$('#sample_4').dataTable(); 
	$('#sample_5').dataTable(); 
	$('#sample_6').dataTable(); 
	$('#sample_7').dataTable(); 
	
	//reload form
	function reload(form)
{
var val=form.cat.options[form.cat.options.selectedIndex].value;
self.location='dd.php?cat=' + val ;
}
	// Code For Select Gradepay wise 
	$("#scalecode").change(function(event)
	{	
			$("option:selected", $(this)).each(function(){
				var scale = document.getElementById('scalecode').value;
				//alert(scale);
				var clean_dept = encodeURIComponent(scale);
				  $.ajax({
					  type:"post",
					  url:"process.php",
					  data:"action=get_gradepaywise&scale="+clean_dept,
					  success:function(data){
						//alert(data);
						 $("#gradepay_id").html(data);
					  }

				  });
			});
	});
	
	
	//code For Select Station Wise 
	 $("#station").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('station').value;
			//alert(dept);
			var clean_dept = encodeURIComponent(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_stationwise&dept="+clean_dept,
						  success:function(data){
							$("#station_id").html(data);
						  }
					  });
		});
	});
	
	// Code For getting username from there designation in personnel emp tab 
	$("#level").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('level').value;
			//alert(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_assignto_username&dept="+dept,
						  success:function(data){
						   //alert(data);
							$("#divid_assign").html(data);
						  }
					  });
		});
	});
	
	// Code For getting username from there designation in Serving emp tab 
	$("#level_ser").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('level_ser').value;
			//alert(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_assignto_username_ser&dept="+dept,
						  success:function(data){
						   //alert(data);
							$("#divid_assign_ser").html(data);
						  }
					  });
		});
	});
	
	// Code For getting username from there designation in Transfferd emp tab 
	$("#level_tran").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('level_tran').value;
			//alert(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_assignto_username_tran&dept="+dept,
						  success:function(data){
						   //alert(data);
							$("#divid_assign_tran").html(data);
						  }
					  });
		});
	});
	
	// Code For getting username from there designation in Station wise emp tab 
	$("#level_stn").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('level_stn').value;
			//alert(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_assignto_username_stn&dept="+dept,
						  success:function(data){
						   //alert(data);
							$("#divid_assign_stn").html(data);
						  }
					  });
		});
	});
	
	// Code For getting username from there designation in Gredepay wise emp tab 
	$("#level_grade").change(function(event)
	 {
		$("option:selected", $(this)).each(function(){
			var dept = document.getElementById('level_grade').value;
			//alert(dept);
					  $.ajax({
						  type:"post",
						  url:"process.php",
						  data:"action=get_assignto_username_grade&dept="+dept,
						  success:function(data){
						   //alert(data);
							$("#divid_assign_grade").html(data);
						  }
					  });
		});
	});
	
	
	// validation for mobile no. in personnel tab
		 $('#mobile_per').change(function(event) { 
			var IndianNumber = document.getElementById('mobile_per').value;
			 var message = document.getElementById('message_per');
			//alert(IndianNumber);
					var IndNum = /^\d{10}$/;
					if(IndNum.test(IndianNumber))
						   { message.innerHTML = ""; }
						   else
						   {
								message.innerHTML = "Your Mobile Number Is not Valid.";
								IndianNumber.value = ""
								IndianNumber.focus()
							}
		   });
		   
		   
	// validation for mobile no. in Serving tab
		 $('#mobile_ser').change(function(event) { 
			var IndianNumber = document.getElementById('mobile_ser').value;
			 var message = document.getElementById('message_ser');
			//alert(IndianNumber);
					var IndNum = /^\d{10}$/;
					if(IndNum.test(IndianNumber))
						   { message.innerHTML = ""; }
						   else
						   {
								message.innerHTML = "Your Mobile Number Is not Valid.";
								IndianNumber.value = ""
								IndianNumber.focus()
							}
		   });
		   
		   
	// validation for mobile no. in Transferred tab
		 $('#mobile_tran').change(function(event) { 
			var IndianNumber = document.getElementById('mobile_tran').value;
			 var message = document.getElementById('message_tran');
			//alert(IndianNumber);
					var IndNum = /^\d{10}$/;
					if(IndNum.test(IndianNumber))
						   { message.innerHTML = ""; }
						   else
						   {
								message.innerHTML = "Your Mobile Number Is not Valid.";
								IndianNumber.value = ""
								IndianNumber.focus()
							}
		   });
		   
	// validation for mobile no. in Station tab
		 $('#mobile_stn').change(function(event) { 
			var IndianNumber = document.getElementById('mobile_stn').value;
			 var message = document.getElementById('message_stn');
			//alert(IndianNumber);
					var IndNum = /^\d{10}$/;
					if(IndNum.test(IndianNumber))
						   { message.innerHTML = ""; }
						   else
						   {
								message.innerHTML = "Your Mobile Number Is not Valid.";
								IndianNumber.value = ""
								IndianNumber.focus()
							}
		   });
		   
	// validation for mobile no. in Grade pay wise  tab
		 $('#mobile_grade').change(function(event) { 
			var IndianNumber = document.getElementById('mobile_grade').value;
			 var message = document.getElementById('message_grade');
			//alert(IndianNumber);
					var IndNum = /^\d{10}$/;
					if(IndNum.test(IndianNumber))
						   { message.innerHTML = ""; }
						   else
						   {
								message.innerHTML = "Your Mobile Number Is not Valid.";
								IndianNumber.value = ""
								IndianNumber.focus()
							}
		   });
	

});
</script>