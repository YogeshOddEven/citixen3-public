var start_date = document.getElementById("start_date").value;
var end_date = document.getElementById("end_date").value;
$.ajax({
      type: "POST",
      url: "getdata.php",
     // data: "{'section':'dashboard_section_1', 'data2':'" + value2+ "', 'data3':'" + value3+ "'}",
	  data: {'section':'dashboard_section_1','start_date':start_date,'end_date':end_date},
      success: function (result) 
	  {
		  var result = JSON.parse(result)
          $("#ds_1_total_member").html(result['total_member']);   
		  
		  $("#ds_1_total_complaint").html(result['total_complain']);   
		  $("#ds_1_total_complaint_amount").html(result['total_complain_amount']);    
		  
		  $("#ds_1_total_cform_complaint").html(result['total_cform_complain']);    
		  $("#ds_1_total_cform_complaint_amount").html(result['total_cform_complain_amount']);  
		  
		  $("#ds_1_total_hform_complaint").html(result['total_hform_complain']);    
		  $("#ds_1_total_hform_complaint_amount").html(result['total_hform_complain_amount']);    
		  
		  $("#ds_1_total_gstpayment_complaint").html(result['total_gstpayment_complain']);    
		  $("#ds_1_total_gstpayment_complaint_amount").html(result['total_gstpayment_complain_amount']);    
		  
		  $("#ds_1_total_payment_complaint").html(result['total_payment_complain']);    
		  $("#ds_1_total_payment_complaint_amount").html(result['total_payment_complain_amount']);   
		  
		  $("#ds_2_total_cash_transaction_complain").html(result['total_cash_transaction_complain']);    
		  $("#ds_2_total_cash_transaction_complain_amount").html(result['total_cash_transaction_complain_amount']);  
		  
		  $("#ds_2_total_wrong_number_complain").html(result['total_wrong_number_complain']);    
		  $("#ds_2_total_wrong_number_complain_amount").html(result['total_wrong_number_complain_amount']);    
		  
		  $("#ds_2_total_switch_off_complain").html(result['total_switch_off_complain']);    
		  $("#ds_2_total_switch_off_complain_amount").html(result['total_switch_off_complain_amount']);    
		  
		  $("#ds_2_total_not_connected_complain").html(result['total_not_connected_complain']);    
		  $("#ds_2_total_not_connected_complain_amount").html(result['total_not_connected_complain_amount']);    
		  
		  $("#ds_2_total_close_complain").html(result['total_close_complain']);    
		  $("#ds_2_total_close_complain_amount").html(result['total_close_complain_amount']); 
		  
		  $("#ds_2_total_received_complain").html(result['total_received_complain']);    
		  $("#ds_2_total_received_complain_amount").html(result['total_received_complain_amount']);    
		  
		  $("#ds_2_total_underprocess_complain").html(result['total_underprocess_complain']);    
		  $("#ds_2_total_underprocess_complain_amount").html(result['total_underprocess_complain_amount']);    
		  
		  $("#ds_2_total_settlements_complain").html(result['total_settlements_complain']);    
		  $("#ds_2_total_settlements_complain_amount").html(result['total_settlements_complain_amount']);    
		  
		  $("#ds_2_total_blacklisted_complain").html(result['total_blacklisted_complain']);    
		  $("#ds_2_total_blacklisted_complain_amount").html(result['total_blacklisted_complain_amount']);    
		  
		  $("#ds_2_total_fraud_complain").html(result['total_fraud_complain']);    
		  $("#ds_2_total_fraud_complain_amount").html(result['total_fraud_complain_amount']);    
		  
		  $("#ds_3_total_cc_cform_complain").html(result['total_cc_cform_complain']);    
		  $("#ds_3_total_cc_cform_complain_amount").html(result['total_cc_cform_complain_amount']);    
		  $("#ds_3_total_cc_cform_complain_amount_received").html(result['total_cc_cform_complain_amount_received']);    
		  $("#ds_3_total_cc_cform_complain_amount_pending").html(result['total_cc_cform_complain_amount_pending']);    
		  
		  $("#ds_3_total_cc_hform_complain").html(result['total_cc_hform_complain']);    
		  $("#ds_3_total_cc_hform_complain_amount").html(result['total_cc_hform_complain_amount']);    
		  $("#ds_3_total_cc_hform_complain_amount_received").html(result['total_cc_hform_complain_amount_received']);    
		  $("#ds_3_total_cc_hform_complain_amount_pending").html(result['total_cc_hform_complain_amount_pending']); 
		  
		  $("#ds_3_total_cc_gstpayment_complain").html(result['total_cc_gstpayment_complain']);    
		  $("#ds_3_total_cc_gstpayment_complain_amount").html(result['total_cc_gstpayment_complain_amount']);    
		  $("#ds_3_total_cc_gstpayment_complain_amount_received").html(result['total_cc_gstpayment_complain_amount_received']);    
		  $("#ds_3_total_cc_gstpayment_complain_amount_pending").html(result['total_cc_gstpayment_complain_amount_pending']);  
		  
		  $("#ds_3_total_cc_payment_complain").html(result['total_cc_payment_complain']);    
		  $("#ds_3_total_cc_payment_complain_amount").html(result['total_cc_payment_complain_amount']);    
		  $("#ds_3_total_cc_payment_complain_amount_received").html(result['total_cc_payment_complain_amount_received']);    
		  $("#ds_3_total_cc_payment_complain_amount_pending").html(result['total_cc_payment_complain_amount_pending']);    
		  
		  $('#ajax_loader').hide();
      }
});

