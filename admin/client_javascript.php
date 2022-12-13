<script>

var count=0;
var count_1=1;
var count1;
//Add more fields dynamically.
function addField() {
	var newcount = parseInt(count)+1;
	var newadd = '<hr><div class="form-group"><label for="firstname" class="control-label col-sm-3">Full Name</label><div class="col-sm-6"><input type="text" name="fname_'+newcount+'" id="fname_'+newcount+'" class="form-control" placeholder="Full Name"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Phone No</label><div class="col-sm-6"><input type="text" name="phoneno_'+newcount+'" id="phoneno_'+newcount+'" class="form-control" placeholder="Phone No"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Mobile No</label><div class="col-sm-6"><input type="text" name="mobileno_'+newcount+'" id="mobileno_'+newcount+'" class="form-control" placeholder="Mobile No"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Email ID</label><div class="col-sm-6"><input type="text" name="emailid_'+newcount+'" id="emailid_'+newcount+'" class="form-control" placeholder="emailid"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Birth :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="dob_'+newcount+'" id="dob_'+newcount+'" placeholder="dd-mm-yyyy" type="text" /></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Anniversary :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="doa_'+newcount+'" id="doa_'+newcount+'" placeholder="dd-mm-yyyy" type="text" /></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Passport No :</label><div class="col-md-6 col-xs-11"><input class="form-control" name="pass_no_'+newcount+'" id="pass_no_'+newcount+'" placeholder="Passport No" type="text"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Place of Issue :</label><div class="col-md-6 col-xs-11"><input class="form-control" name="pass_poi_'+newcount+'" id="pass_poi_'+newcount+'" placeholder="Place of Issue" type="text"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Issue :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="pass_doi_'+newcount+'" id="pass_doi_'+newcount+'" placeholder="dd-mm-yyyy" type="text"></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Expired :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="pass_doe_'+newcount+'" id="pass_doe_'+newcount+'" placeholder="dd-mm-yyyy" type="text"></div></div></div><div id="client_details_'+ newcount +'"></div>';
	
	document.getElementById('client_details_'+count).innerHTML = newadd ;
	count++;
	document.getElementById('client_details').value = count;
	
	$('.default-date-picker1').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
    });
	
}
function addField1(count1) {
	count_1 = count1;	
	var newcount = parseInt(count1)+1;
	var newadd = '<hr><div class="form-group"><label for="firstname" class="control-label col-sm-3">Full Name</label><div class="col-sm-6"><input type="text" name="fname_'+newcount+'" id="fname_'+newcount+'" class="form-control" placeholder="Full Name"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Phone No</label><div class="col-sm-6"><input type="text" name="phoneno_'+newcount+'" id="phoneno_'+newcount+'" class="form-control" placeholder="Phone No"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Mobile No</label><div class="col-sm-6"><input type="text" name="mobileno_'+newcount+'" id="mobileno_'+newcount+'" class="form-control" placeholder="Mobile No"></div></div><div class="form-group"><label for="firstname" class="control-label col-sm-3">Email ID</label><div class="col-sm-6"><input type="text" name="emailid_'+newcount+'" id="emailid_'+newcount+'" class="form-control" placeholder="emailid"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Birth :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="dob_'+newcount+'" id="dob_'+newcount+'" placeholder="dd-mm-yyyy" type="text" /></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Anniversary :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="doa_'+newcount+'" id="doa_'+newcount+'" placeholder="dd-mm-yyyy" type="text" /></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Passport No :</label><div class="col-md-6 col-xs-11"><input class="form-control" name="pass_no_'+newcount+'" id="pass_no_'+newcount+'" placeholder="Passport No" type="text"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Place of Issue :</label><div class="col-md-6 col-xs-11"><input class="form-control" name="pass_poi_'+newcount+'" id="pass_poi_'+newcount+'" placeholder="Place of Issue" type="text"></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Issue :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="pass_doi_'+newcount+'" id="pass_doi_'+newcount+'" placeholder="dd-mm-yyyy" type="text"></div></div></div><div class="form-group clearfix"><label class="col-md-3 control-label " for="password"> Date of Expired :</label><div class="col-md-6 col-xs-11"><div class="iconic-input"><i class="fa fa-calendar"></i><input class="form-control form-control-inline input-medium default-date-picker1" name="pass_doe_'+newcount+'" id="pass_doe_'+newcount+'" placeholder="dd-mm-yyyy" type="text"></div></div></div><div id="client_details_'+ newcount +'"></div>';
	
	document.getElementById('client_details_'+count1).innerHTML = newadd ;
	count1++;
	document.getElementById('client_details').value = count1;
	
	$('.default-date-picker1').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true
    });
	
}
function remove_client_detail(str,rid)
{
	xmlhttp=GetXmlHttpObject();
	if(xmlhttp==null)
	{
		alert("Your browser does not support AJAX!");
		return;
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4)
		{
			var s = xmlhttp.responseText;
			document.getElementById("client_details_"+str).style.display = "none";
		}
	}
												
	xmlhttp.open("GET","remove_client_detail.php?rid="+rid,true);
	xmlhttp.send(null);
}

</script>