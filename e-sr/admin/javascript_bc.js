$(document).ready(function(){
	// officiating and substansive drop down Type hide show code
	$('#preapp_subtype1').on('change', function () {
		// alert ('sdsdadasda');
			if (this.value == '1') {
				$("#show1").show();
				$("#show2").show();
				$("#pwd").hide();
				}
				else {
				$("#show1").hide();
				$("#show2").hide();
				$("#pwd").show();
											
					}
			});
		// officiating and substansive drop down Type hide show code end
	
		$("#preapp_desig").change( function(){ 
			var x2 = $(this).val();
			//alert(x2);
			if(x2 == '2031'){	
				 $("#lbl_oth2").show();
			}else{
				 $("#lbl_oth2").hide();
			}	
		 });
	
		$(".lbl_reg").show();
		
		$('.ps_type').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale_"+got_type).show();
		  }else{
			  $("#scale_"+got_type).hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level_"+got_type).show();
		  }else{
			  $("#level_"+got_type).hide();
		  }
		});
		
		<!------------------------------------------------SGD Code start--------------------------------------------------->
		$('.ps_type1').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale").show();
		  }else{
			  $("#scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level").show();
		  }else{
			  $("#level").hide();
		  }
		});
		<!------------------------------------------SGD Code End-------------------------------------------------------->
		
		<!-----------------------------------------OGD Code start------------------------------------------------------->
		$('.ps_type2').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#scale2").show();
		  }else{
			  $("#scale2").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#level2").show();
		  }else{
			  $("#level2").hide();
		  }
		});
		<!----------------------------------- OGD Code End ---------------------------------------------------------->
		
		<!------------------------------promotion to Code start--------------------------------------------->
		$('#pm_to_ps_type_3').on('change', function() {
			 
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
 
		  if ($(this).val() != '5')
		  {
			$("#pro_to_scale").show();
		  }else{
			  $("#pro_to_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#pro_to_level").show();
		  }else{
			  $("#pro_to_level").hide();
		  }
		});
		<!----------------------------------- promotion Code End ---------------------------------------------------------->
		
		<!------------------------------deputation from Code start--------------------------------------------->
		$('#dp_frm_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#depu_from_scale").show();
		  }else{
			  $("#depu_from_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#depu_from_level").show();
		  }else{
			  $("#depu_from_level").hide();
		  }
		});
		<!----------------------------------- promotion Code End ---------------------------------------------------------->
		<!------------------------------Repatrition from Code start--------------------------------------------->
		$('#re_frm_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#repa_scale").show();
		  }else{
			  $("#repa_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#repa_level").show();
		  }else{
			  $("#repa_level").hide();
		  }
		});
		<!----------------------------------- promotion Code End ---------------------------------------------------------->
				
		<!------------------------------reversion from Code start--------------------------------------------->
		
		$('#rev_frm_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
		//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#rev_frm_scale1").show();
		  }else{
			  $("#rev_frm_scale1").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#rev_frm_level1").show();
		  }else{
			  $("#rev_frm_level1").hide();
		  }
		});
		
		$('#rev_to_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#rev_scale").show();
		  }else{
			  $("#rev_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#rev_level").show();
		  }else{
			  $("#rev_level").hide();
		  }
		});
		
		$('#re_de_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			 //alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#rev_dep_scale_3").show();
		  }else{
			  $("#rev_dep_scale_3").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#rev_dep_level_3").show();
		  }else{
			  $("#rev_dep_level_3").hide();
		  }
		});
		$('#rep_from_ps_type_3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			 //alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#rev_rep_scale_3").show();
		  }else{
			  $("#rev_rep_scale_3").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#rev_rep_level_3").show();
		  }else{
			  $("#rev_rep_level_3").hide();
		  }
		});
		<!----------------------------------- reversion Code End ---------------------------------------------------------->
		
		
		
		<!------------------------------transfer to Code start--------------------------------------------->
		$('#tf_ps_type_3').on('change', function() {
			// alert('asdsad');
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#trans_scale").show();
		  }else{
			  $("#trans_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#trans_level").show();
		  }else{
			  $("#trans_level").hide();
		  }
		});
		<!----------------------------------- transfer Code End ---------------------------------------------------------->
	
	<!------------------------------Fixaction to Code start--------------------------------------------->
		$('#fx_ps_type_3').on('change', function() {
			// alert('asdsad');
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4')
		  {
			$("#fix_scale").show();
		  }else{
			  $("#fix_scale").hide();
		  }
		  if($(this).val() == '5')
		  {
			$("#fix_level").show();
		  }else{
			  $("#fix_level").hide();
		  }
		});
		<!----------------------------------- transfer Code End ---------------------------------------------------------->
		
		<!----------------------------------- Return carried out Code start ------------------------------------------>
			$('.return1').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'No')
		  {
			$("#return").show();
			$("#notreturn").hide();
		  }else{
			  $("#return").hide();
			  $("#notreturn").show();
		  }
		  
		});
		$('.return2').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'No')
		  {
			$("#return2").show();
			$("#notreturn2").hide();
		  }else{
			  $("#return2").hide();
			  $("#notreturn2").show();
		  }
		  
		});
		
		$('.return3').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'No')
		  {
			$("#return3").show();
			$("#notreturn3").hide();
		  }else{
			  $("#return3").hide();
			  $("#notreturn3").show();
		  }
		  
		});
		$('.return4').on('change', function() {
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'No')
		  {
			$("#return4").show();
			$("#notreturn4").hide();
		  }else{
			  $("#return4").hide();
			  $("#notreturn4").show();
		  }
		  
		});
		<!---------------------- Return carried out Code End ------------------------------------------------>
		
		<!----------------------------------- promotion type Code start ------------------------------------------>
			$('.odrtype').on('change', function() {
				debugger;
				//alert("here");
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'officiating' || $(this).val() == 'regular' || $(this).val() == 'dept' || $(this).val() == 'rest' ) 		
		  {
			$("#promoform").show();
			// $("#notreturn").hide();
		  }else{
			  $("#promoform").hide();
			  // $("#notreturn").show();
		  }
		  if($(this).val () == 'adhoc')
		  {		
			$("#promoform").show();
			  $("#to").show();
			  $("#from").show();
			  $("#to1").hide();
			  $("#from1").hide();
		  }else
		  {
			 $("#to").hide();
			  $("#from").hide();
			  $("#to1").show();
			  $("#from1").show(); 
			  
		  }
		  if($(this). val ()== 'deputation'){
			  $("#deputation_tb").show();
		  }else
		  {
			   $("#deputation_tb").hide();
		  }
		  if($(this). val ()== 'reparation'){
			  $("#reparation_tb").show();
		  }else
		  {
			   $("#reparation_tb").hide();
		  }
		});
		
		<!---------------------- promotion type Code End ------------------------------------------------>
	
	<!---------------------- Reversion Code Start ------------------------------------------------>
				$('.odrtype1').on('change', function() {
					
			var type=$(this).attr("id");
			var got_type=type.slice(-1);
			//alert($(this).val());
		  if ($(this).val() == 'officiating' || $(this).val() == 'regular') 		
		  {
			$("#revform").show();
			// $("#notreturn").hide();
		  }else{
			  $("#revform").hide();
			  // $("#notreturn").show();
		  }
		  if($(this).val () == 'adhoc')
		  {		
			$("#revform").show();
			  $("#to3").show();
			  $("#from3").show();
			  $("#to2").hide();
			  $("#from2").hide();
		  }else
		  {
			 $("#to3").hide();
			  $("#from3").hide();
			  $("#to2").show();
			  $("#from2").show(); 
			  
		  }
		  if($(this).val ()== 'deputation'){
			  $("#deputation_tb1").show();
		  }else
		  {
			   $("#deputation_tb1").hide();
		  }
		  if($(this).val ()== 'reparation'){
			  $("#reparation_tb1").show();
		  }else
		  {
			   $("#reparation_tb1").hide();
		  }
		});
		
		
		
		<!---------------------- Reversion Code End ------------------------------------------------>
	});
;;