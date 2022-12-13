var xmlhttp;

function add_new_user()
{
	var error = 0;
	
	var fname = $('#fname').val();
	if(fname == "")
	{
		error = 1;
		$('#fname').css('border','1px solid red');
		$('#msg1').text('First name is required.');
    } else {
		$('#fname').css('border','1px solid #ccc');
		$('#msg1').text('');
	}
	var lname = $('#lname').val();
	if(lname == "")
	{
		error = 1;
		$('#lname').css('border','1px solid red');
		$('#msg2').text('Last name is required.');
    } else {
		$('#lname').css('border','1px solid #ccc');
		$('#msg2').text('');
	}
	var design = $('#design').val();
	if(design == "")
	{
		error = 1;
		$('#design').css('border','1px solid red');
		$('#msg3').text('Designation is required.');
    } else {
		$('#design').css('border','1px solid #ccc');
		$('#msg3').text('');
	}
	var mobile = $("#mobile").val();
	if(mobile == "") {
		error = 1;
		$('#mobile').css('border','1px solid red');
		$('#msg4').text('Mobile no is required.');
	} else if(!mobile.match(/^[1-9]{1}[0-9]{9}$/)) {
		error = 1;
		$('#mobile').css('border','1px solid red');
		$('#msg4').text('Input only digit and 10 digit.');
	} else {
		$('#mobile').css('border','1px solid #ccc');
		$('#msg4').text('');
	}
	if(!($("#emailid").val())) {
		error = 1;
		$('#emailid').css('border','1px solid red');
		$('#msg5').text('Email ID is required.');
	} else if(!$("#emailid").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		error = 1;
		$('#emailid').css('border','1px solid red');
		$('#msg5').text('Input valid email address');
	} else {
		$('#emailid').css('border','1px solid #ccc');
		$('#msg5').text('');
	}
	var password = $('#password').val();
	if(password == "")
	{
		error = 1;
		$('#password').css('border','1px solid red');
		$('#msg6').text('Password is required.');
    } else {
		$('#password').css('border','1px solid #ccc');
		$('#msg6').text('');
	}
	var city = $('#city').val();
	if(city == "")
	{
		error = 1;
		$('#city').css('border','1px solid red');
		$('#msg7').text('City is required.');
    } else {
		$('#city').css('border','1px solid #ccc');
		$('#msg7').text('');
	}
	var branch = $('#branch').val();
	if(branch == "")
	{
		error = 1;
		$('#branch').css('border','1px solid red');
		$('#msg8').text('Branch is required.');
    } else {
		$('#branch').css('border','1px solid #ccc');
		$('#msg8').text('');
	}
	var role = $('#role').val();
	if(role == "")
	{
		error = 1;
		$('#role').css('border','1px solid red');
		$('#msg10').text('Role is required.');
    } else {
		$('#role').css('border','1px solid #ccc');
		$('#msg10').text('');
	}
	var photo = $('#photo').val();
	if(photo != "")
	{
		var ext = photo.substr(photo.lastIndexOf('.'));
		if(ext != ".jpg" && ext != ".JPG" && ext != ".jpeg" && ext != ".JPEG" && ext != ".gif" && ext != ".GIF" && ext != ".png" && ext != ".PNG"){
			error = 1;
			$('#photo').css("border","1px solid red");
			$("#msg11").text("Photo Allow Only JPG, GIF,PNG Files.");
		} else {
			$('#photo').css("border","1px solid #ccc");
			$("#msg11").text("");
		}
	}
	
	if(error == 1)return false; else return true;
}
function add_client()
{
	var error = 0;
	
	var fname = $('#fname').val();
	if(fname == "")
	{
		error = 1;
		$('#fname').css('border','1px solid red');
		$('#msg1').text('Full name is required.');
    } else {
		$('#fname').css('border','1px solid #ccc');
		$('#msg1').text('');
	}
	var mobile = $("#mobileno").val();
	if(mobile == "") {
		error = 1;
		$('#mobileno').css('border','1px solid red');
		$('#msg2').text('Mobile no is required.');
	} else if(!mobile.match(/^[1-9]{1}[0-9]{9}$/)) {
		error = 1;
		$('#mobileno').css('border','1px solid red');
		$('#msg2').text('Input only digit and 10 digit.');
	} else {
		$('#mobileno').css('border','1px solid #ccc');
		$('#msg2').text('');
	}
	
	if(error == 1)return false; else return true;
}
function add_inquiry()
{
	var error = 0;
	
	var exname = $('#exname').val();
	if(exname == "")
	{
		error = 1;
		$('#exname').css('border','1px solid red');
		$('#msg3').text('Sales person is required.');
    } else {
		$('#exname').css('border','1px solid #ccc');
		$('#msg3').text('');
	}
	
	if(error == 1)return false; else return true;
}
function check_followup_date()
{
	var error = 0;
	
	var remarks = $('#remarks').val();
	if(remarks == "")
	{
		error = 1;
		$('#remarks').css('border','1px solid red');
		$('#msg2').text('Remarks is required.');
    } else {
		$('#remarks').css('border','1px solid #ccc');
		$('#msg2').text('');
	}
	if(error == 1)return false; else return true;
}
function check_followup_date1()
{
	var error = 0;
	
	var fdate1 = $('#fdate1').val();
	var fdate2 = $('#fdate2').val();
	if(fdate1 == "")
	{
		error = 1;
		$('#fdate1').css('border','1px solid red');
		$('#msg11').text('Followup date is required.');
	} else {
		var fdate1_1 = fdate1.split('-');
		var fdate1_1_1 = fdate1_1[1]+"-"+fdate1_1[0]+"-"+fdate1_1[2];
		
		var fdate2_2 = fdate2.split('-');
		var fdate2_2_1 = fdate2_2[1]+"-"+fdate2_2[0]+"-"+fdate2_2[2];
		
		var new_date = new Date(fdate1_1_1);
		var old_date = new Date(fdate2_2_1);
		//console.log(new_date+" "+old_date);
		if(new_date <= old_date)
		{
			error = 1;
			$('#fdate1').css('border','1px solid red');
			$('#msg11').text('Followup date required greater than to last followup date.');
		} else {
			$('#fdate1').css('border','1px solid #ccc');
			$('#msg11').text('');
		}
	}
	var remarks1 = $('#remarks1').val();
	if(remarks1 == "")
	{
		error = 1;
		$('#remarks1').css('border','1px solid red');
		$('#msg22').text('Followup action plan is required.');
    } else {
		$('#remarks1').css('border','1px solid #ccc');
		$('#msg22').text('');
	}
	if(error == 1)return false; else return true;
}
function add_new_customer()
{
	var error = 0;
	
	var fname = $('#fname').val();
	if(fname == "")
	{
		error = 1;
		$('#fname').css('border','1px solid red');
		$('#msg1').text('First name is required.');
    } else {
		$('#fname').css('border','1px solid #ccc');
		$('#msg1').text('');
	}
	var lname = $('#lname').val();
	if(lname == "")
	{
		error = 1;
		$('#lname').css('border','1px solid red');
		$('#msg2').text('Last name is required.');
    } else {
		$('#lname').css('border','1px solid #ccc');
		$('#msg2').text('');
	}
	var mobile = $("#mobile").val();
	if(mobile == "") {
		error = 1;
		$('#mobile').css('border','1px solid red');
		$('#msg3').text('Mobile no is required.');
	} else if(!mobile.match(/^[1-9]{1}[0-9]{9}$/)) {
		error = 1;
		$('#mobile').css('border','1px solid red');
		$('#msg3').text('Input only digit and 10 digit.');
	} else {
		$('#mobile').css('border','1px solid #ccc');
		$('#msg3').text('');
	}
	
	if(error == 1)return false; else return true;
}
function add_proposal()
{
	var error = 0;
	
	var to_name = $('#to_name').val();
	if(to_name == "")
	{
		error = 1;
		$('#to_name').css('border','1px solid red');
		$('#msg1').text('To name is required.');
    } else {
		$('#to_name').css('border','1px solid #ccc');
		$('#msg1').text('');
	}
	
	if(error == 1)return false; else return true;
}
function add_invoice()
{
	var error = 0;
	
	var to_party = $('#to_party').val();
	if(to_party == "")
	{
		error = 1;
		$('#to_party').css('border','1px solid red');
		$('#msg1').text('To party is required.');
    } else {
		$('#to_party').css('border','1px solid #ccc');
		$('#msg1').text('');
	}
	
	if(error == 1)return false; else return true;
}

function GetXmlHttpObject()
{
	if(window.XMLHttpRequest)
	{
		return new XMLHttpRequest();
	}
	if(window.ActiveXObject)
	{
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
		return null;
}
function show_more_tr(str)
{
	$('#show_more_tr_td_'+str).toggle(1000);
	$('#show_tr_'+str).hide();
	$('#hide_tr_'+str).show();
}
function hide_more_tr(str)
{
	$('#show_more_tr_td_'+str).hide(100);
	$('#show_tr_'+str).show();
	$('#hide_tr_'+str).hide();
}
function check_q_grandtotal()
{
	var q_qty = document.getElementsByName('qqty[]');
	var qrate = document.getElementsByName('qrate[]');
	var qtotal = document.getElementsByName('qtotal[]');
	var qftotal = document.getElementsByName('qftotal[]');
	var sub_total = 0;
	var grand_total = 0;
	var discount =0;
	for (var i = 0; i < q_qty.length; i++) 
	{
		var q_qty_1 = q_qty[i].value;
		var qrate_1 = qrate[i].value;
		if(q_qty_1 != "" && qrate_1 != "")
		{
			//Total
			var qtotal_1 = (parseInt(q_qty_1) * parseInt(qrate_1));
	    	qtotal[i].value = parseInt(qtotal_1);
			
			//Discount
			discount = 0;

			var qftotal_1 = (parseInt(qtotal_1) - parseInt(discount));
	    	sub_total = parseInt(sub_total) + parseInt(qftotal_1); 
		}
	}
	var grand_total = parseInt(sub_total);
	document.getElementById("grand_total").innerHTML = grand_total;
}
function check_inv_grandtotal()
{
	var i_gstrate = document.getElementsByName('i_gstrate[]');
	var q_qty = document.getElementsByName('i_qty[]');
	var qrate = document.getElementsByName('i_rate[]');
	var i_cgst = document.getElementsByName('i_cgst[]');
	var i_sgst = document.getElementsByName('i_sgst[]');
	var qtotal = document.getElementsByName('i_amount[]');
	var inv_less = document.getElementById("inv_less").value;
	var sub_total = 0;
	var t_cgst = 0; 
	var t_sgst = 0;
	var grand_total = 0;
	var discount =0;
	
	for (var i = 0; i < q_qty.length; i++) 
	{
		var q_qty_1 = q_qty[i].value;
		var qrate_1 = qrate[i].value;
		if(q_qty_1 != "" && qrate_1 != "")
		{
			//Total
			var qtotal_1 = parseFloat(q_qty_1 * qrate_1).toFixed( 2 );
	    	
			
			var gst_rate = i_gstrate[i].value / 2;
			var i_cgst_a = parseFloat((qtotal_1 * gst_rate)/100).toFixed( 2 );
			var i_sgst_a = parseFloat((qtotal_1 * gst_rate)/100).toFixed( 2 );
			
			i_cgst[i].value = Math.ceil(i_cgst_a);
			i_sgst[i].value = Math.ceil(i_sgst_a);
			
			var tot_gst = parseFloat(i_cgst_a) + parseFloat(i_sgst_a);
			
			var qtotal_a = parseFloat(qtotal_1); //parseFloat(qtotal_1) + parseFloat(tot_gst);
			qtotal[i].value = Math.ceil(qtotal_a);
			
			sub_total = sub_total + Math.ceil(qtotal_a);
			t_cgst = t_cgst + Math.ceil(i_cgst_a);
			t_sgst = t_sgst + Math.ceil(i_sgst_a);
		}
	}
	document.getElementById("sub_total").innerHTML = Math.ceil(sub_total);
	document.getElementById("c_gst_t").innerHTML = Math.ceil(t_cgst);
	document.getElementById("s_gst_t").innerHTML = Math.ceil(t_sgst);
	
	grand_total = ((sub_total + t_cgst + t_sgst) - inv_less);
	document.getElementById("grand_total").innerHTML = Math.ceil(grand_total);
}
function check_i_grandtotal()
{
	var q_qty = document.getElementsByName('qqty[]');
	var qrate = document.getElementsByName('qrate[]');
	var qtotal = document.getElementsByName('qtotal[]');
	var qftotal = document.getElementsByName('qftotal[]');
	var sub_total = 0;
	var grand_total = 0;
	var discount =0;
	for (var i = 0; i < q_qty.length; i++) 
	{
		var q_qty_1 = q_qty[i].value;
		var qrate_1 = qrate[i].value;
		if(q_qty_1 != "" && qrate_1 != "")
		{
			//Total
			var qtotal_1 = (parseInt(q_qty_1) * parseInt(qrate_1));
	    	qtotal[i].value = parseInt(qtotal_1);
			
			//Discount
			discount = 0;

			var qftotal_1 = (parseInt(qtotal_1) - parseInt(discount));
	    	sub_total = parseInt(sub_total) + parseInt(qftotal_1); 
		}
	}
	var grand_total = parseInt(sub_total);
	document.getElementById("grand_total").innerHTML = grand_total;
}
var y_count=1;
var m_count=1;
function addField_q_item()
{
  var html = '';
  html = '<tr><td><label for="form-field-1-1" class="p-t-10">Location</label><input type="text" id="i_location[]" name="i_location[]" class="form-control"><label for="form-field-1-1" class="p-t-10">Product</label><input type="text" id="i_product[]" name="i_product[]" class="form-control"></td><td><label for="form-field-1-1" class="p-t-10">Width</label><input type="text" id="i_width[]" name="i_width[]" class="form-control text-center"><label for="form-field-1-1" class="p-t-10">Height</label><input type="text" id="i_height[]" name="i_height[]" class="form-control text-center"></td><td><label for="form-field-1-1" class="p-t-10">Shade</label><input type="text" id="i_shade[]" name="i_shade[]" class="form-control text-center"><label for="form-field-1-1" class="p-t-10">Area Sq.Ft./Pcs</label><input type="text" id="qqty[]" name="qqty[]" onkeyup="check_q_grandtotal()" class="decimal form-control text-center"></td><td><label for="form-field-1-1" class="p-t-10">Rate</label><input type="text" id="qrate[]" name="qrate[]" onkeyup="check_q_grandtotal()" class="decimal form-control text-center"><label for="form-field-1-1" class="p-t-10">Amount</label><input type="text" id="qtotal[]" name="qtotal[]" onkeyup="check_q_grandtotal()" class="decimal form-control text-center"></td><td class="v_inherit"><a href="javascript:;" class="btn btn-sm btn-default pmbutton removeitem"><i class="fas fa-minus-square"></i></a></td></tr>';
  $('#item_table').append(html);;
	
  $('.decimal').keyup(function(){
	var val = $(this).val();
	if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
	if(val.split('.').length>2) 
	 val =val.replace(/\.+$/,"");
	}
	$(this).val(val); 
  });	
}
function addField_inv_item()
{
  var html = '';
  html = '<tr><td><label for="form-field-1-1" class="p-t-10">Description of Goods</label><textarea id="i_desc[]" name="i_desc[]" rows="5" class="form-control"></textarea></td><td><label for="form-field-1-1" class="p-t-10">HSN/SAC</label><input type="text" id="i_hsn[]" name="i_hsn[]" class="form-control text-center"><label for="form-field-1-1" class="p-t-10">GST Rate (%)</label><select id="i_gstrate[]" name="i_gstrate[]" onChange="check_inv_grandtotal()" class="form-control text-center"><option value="0">0%</option><option value="5">5%</option><option value="12">12%</option><option value="18">18%</option></select></td><td><label for="form-field-1-1" class="p-t-10">Quantity</label><input type="text" id="i_qty[]" name="i_qty[]" onkeyup="check_inv_grandtotal()" class="decimal form-control text-center"><label for="form-field-1-1" class="p-t-10">Rate</label><div class="input-group input-large"><input type="text" id="i_rate[]" name="i_rate[]" onkeyup="check_inv_grandtotal()" class="decimal form-control text-center"><div class="input-group-prepend"><span class="input-group-text" id="">Per</span></div><select id="i_rtype[]" name="i_rtype[]" class="form-control text-center"><option value="SQFT">SQFT</option><option value="Pieces">Pieces</option></select></div></td><td><label for="form-field-1-1" class="p-t-10">CGST</label><input type="text" id="i_cgst[]" name="i_cgst[]" readonly class="decimal form-control text-center"><label for="form-field-1-1" class="p-t-10">SGST</label><input type="text" id="i_sgst[]" name="i_sgst[]" readonly class="decimal form-control text-center"></td><td><label for="form-field-1-1" class="p-t-10">Amount</label><input type="text" id="i_amount[]" name="i_amount[]" readonly onkeyup="check_inv_grandtotal()" class="decimal form-control text-center"></td><td class="v_inherit"><a href="javascript:;" class="btn btn-sm btn-default pmbutton removeitem"><i class="fas fa-minus-square"></i></a></td></tr>';
  
  $('#item_table').append(html);;
	
  $('.decimal').keyup(function(){
	var val = $(this).val();
	if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
	if(val.split('.').length>2) 
	 val =val.replace(/\.+$/,"");
	}
	$(this).val(val); 
  });	
}
function addField_i_item()
{
  var html = '';
  html = '<tr><td><label for="form-field-1-1" class="p-t-10">Location</label><input type="text" id="i_location[]" name="i_location[]" class="form-control"><label for="form-field-1-1" class="p-t-10">Product</label><input type="text" id="i_product[]" name="i_product[]" class="form-control"></td><td><label for="form-field-1-1" class="p-t-10">Width</label><input type="text" id="i_width[]" name="i_width[]" class="form-control text-center"><label for="form-field-1-1" class="p-t-10">Height</label><input type="text" id="i_height[]" name="i_height[]" class="form-control text-center"></td><td><label for="form-field-1-1" class="p-t-10">Shade</label><input type="text" id="i_shade[]" name="i_shade[]" class="form-control text-center"><label for="form-field-1-1" class="p-t-10">Area Sq.Ft./Pcs</label><input type="text" id="qqty[]" name="qqty[]" onkeyup="check_i_grandtotal()" class="decimal form-control text-center"></td><td><label for="form-field-1-1" class="p-t-10">Rate</label><input type="text" id="qrate[]" name="qrate[]" onkeyup="check_i_grandtotal()" class="decimal form-control text-center"><label for="form-field-1-1" class="p-t-10">Amount</label><input type="text" id="qtotal[]" name="qtotal[]" onkeyup="check_i_grandtotal()" class="decimal form-control text-center"></td><td class="v_inherit"><a href="javascript:;" class="btn btn-sm btn-default pmbutton removeitem"><i class="fas fa-minus-square"></i></a></td></tr>';
  $('#item_table').append(html);;
	
  $('.decimal').keyup(function(){
	var val = $(this).val();
	if(isNaN(val)){
    val = val.replace(/[^0-9\.]/g,'');
	if(val.split('.').length>2) 
	 val =val.replace(/\.+$/,"");
	}
	$(this).val(val); 
  });	
}
function jsUcfirst(string) 
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}
function CheckUnique(e,unique="")
{
	var check_val=$(e).val();
	var check_field=$(e).data('chk');
	var old_val=$(e).data('old_ele');
	//var msg_field=$(e).data('msg-field');
	if($(e).data('msg-field'))
	{
		var placeholder=jsUcfirst($(e).data('msg-field'));
	}else
	{
		var placeholder=jsUcfirst($(e).attr('name'));	
	}
	
	$.ajax({
		type: 'post',
		url: 'process/ajax_check_unique_details.php',
		data: {check_val:check_val,check_field:check_field,old_val:old_val},
		success: function (data) {
			if(data!="")
			{
				data=$.parseJSON(data);
				//console.log(data);
				if(data.stat=="1")
				{
					
					$(e).css("border","");
					$(e).nextAll('.help').html('');
					if(unique!='')
					{
						$(unique).val('1');
					}
					
				}else
				{
					if(data.stat!="0")
					{
						$(e).nextAll('.help').html('Please refresh page or try agin later');
					}else
					{
						$(e).nextAll('.help').html(' '+placeholder+' '+data.msg);
					}
					
					$(e).css("border","1px solid red");
					$(unique).val('0');
				}
				return data.stat;
			}
		}
	  });
}