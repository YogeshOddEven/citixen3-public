<?php
@ob_start();
@session_start();

require_once("process/config.php");
$API_Call_Method="POST";$crime_type_list=array();
include("admin/functions.php");

if(isset($_REQUEST['action'])  && $_REQUEST['action']!="")
{
	
	
	
	
	if($_REQUEST['action']=="SetCrimeTypeFields")
	{
		$return_data=array();
		if(isset($_REQUEST['crime_type']) && $_REQUEST['crime_type']!="" )
		{
			$crime_type_field_request_data=array();
    
    
			$crime_type_field_request_data['crime_type']=$_REQUEST['crime_type'];
			$crime_type_field_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
						
			$CrimeTypeAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_type_fields_list.php", $crime_type_field_request_data);
			$CrimeTypeAPIReturnDataArr=json_decode($CrimeTypeAPIReturnDataJSON, true);
			$crime_fields_html="<div class='row'>";
			// print_r($CrimeTypeAPIReturnDataArr);
			if(isset($CrimeTypeAPIReturnDataArr['returnCode']) && $CrimeTypeAPIReturnDataArr['returnCode']=="1")
			{
				$crime_type_field_list=$CrimeTypeAPIReturnDataArr['data']['crime_field_list'];
				for ($ctflc=0; $ctflc < count($crime_type_field_list); $ctflc++) 
				{ 
					$current_field=$crime_type_field_list[$ctflc];
					$field_id=$current_field['id'];
					$field_name=$current_field['field_name'];
					$display_name=$current_field['display_name'];
					$field_type=$current_field['field_type'];
					
					$value_type=$current_field['value_type'];
					$default_value=$current_field['default_value'];
					$option_value=$current_field['option_value'];

					$main_wrapper_id=str_replace(" ","-",$field_name)."-wrapper";$main_wrapper_style="";
					if($field_name=="Vehicle Make" || $field_name=="Vehicle Modal" || $field_name=="Vehicle Color" || $field_name=="Vehicle License Plate")
					{
						
						$main_wrapper_style="display:none;";
					}
					$change_function="";
					if($field_name=="Vehicle Involved")
					{
						$change_function=" onchange='ChangeVehicleOptionDisplay(this)' ";
					}
					// $field_type=$current_field['field_type'];
					// $field_type_list=array("text","textarea","radio","checkbox","dropdown","file_upload");
					
					if($field_type=="text")
					{
						$crime_fields_html.="
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title'>
									$display_name
								</label>
								<input type='text' value='$default_value' name='crime_type_fields[$field_name]' id='$field_name' class='input-group' placeholder='$display_name'>
							</div>
						</div>";						
					}
					elseif($field_type=="textarea")
					{
						$crime_fields_html.="
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title'>
									$display_name
								</label>
								<textarea  name='crime_type_fields[$field_name]' id='$field_name' class='input-group' placeholder='$display_name'>$default_value</textarea>
							</div>
						</div>";
					}
					elseif($field_type=="radio")
					{
						$crime_fields_html.="
						
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title' style='margin-bottom: 0!important;'>
								$display_name
								</label>
							</div>
							<div>";    
								
								
						if($option_value!="")
						{
							$option_value_arr=array();
							if(strpos($option_value,",")!==false)
							{
								$option_value_arr=explode(",",$option_value);
							}else
							{
								$option_value_arr[]=$option_value;
							}
							for ($avci=0; $avci < count($option_value_arr); $avci++) 
							{ 
								$checked_attr="";
								if($option_value_arr[$avci]==$default_value){ $checked_attr="checked"; }
								$crime_fields_html.="
									<label for='".$field_name."_".$option_value_arr[$avci]."'><input $change_function type='radio' $checked_attr  name='crime_type_fields[".$field_name."]' id='".$field_name."_".$option_value_arr[$avci]."' value='$option_value_arr[$avci]'/> $option_value_arr[$avci]</label>
								";
							}
						}
						$crime_fields_html.="
							</div>
						</div>";
					}
					elseif($field_type=="checkbox")
					{
						$crime_fields_html.="
						
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title' style='margin-bottom: 0!important;'>
								$display_name
								</label>
							</div>
							<div>";    
								
								
						if($option_value!="")
						{
							$option_value_arr=array();
							if(strpos($option_value,",")!==false)
							{
								$option_value_arr=explode(",",$option_value);
							}else
							{
								$option_value_arr[]=$option_value;
							}
							for ($avci=0; $avci < count($option_value_arr); $avci++) 
							{ 
								$checked_attr="";
								
								$crime_fields_html.="
									<label for='".$field_name."_".$option_value_arr[$avci]."'><input type='checkbox' $checked_attr  name='crime_type_fields[".$field_name."][]' id='".$field_name."_".$option_value_arr[$avci]."' value='$option_value_arr[$avci]'/> $option_value_arr[$avci]</label>
								";
							}
						}
						$crime_fields_html.="
							</div>
						</div>";
					}
					elseif($field_type=="dropdown")
					{
						if($value_type!="manual")
						{
							$option_value_arr=array();
							
							$crime_type_field_val_request_data['crime_type']=$_REQUEST['crime_type'];
							$crime_type_field_val_request_data['crime_type_field']=$field_id;
							$crime_type_field_val_request_data['logged_in_user']=$_SESSION['cz_user_login_id'];
							$CrimeTypeValuesAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_type_dropdown_list.php", $crime_type_field_val_request_data);
							$CrimeTypeValuesAPIReturnDataArr=json_decode($CrimeTypeValuesAPIReturnDataJSON, true);
							if(isset($CrimeTypeValuesAPIReturnDataArr['returnCode']) && $CrimeTypeValuesAPIReturnDataArr['returnCode']=="1")
							{
								$crime_type_field_values_list=$CrimeTypeValuesAPIReturnDataArr['data']['crime_type_list'];
								for ($ctfvc=0; $ctfvc < count($crime_type_field_values_list); $ctfvc++) 
								{
									$option_value_arr[]=$crime_type_field_values_list[$ctfvc]['name'];
								}
							}
							$option_value=implode(", ",$option_value_arr);
							$crime_type_field_list[$ctflc]['option_value']=$option_value;
						}else
						{
							if(strpos($crime_type_field_list[$ctflc]['option_value'],",")!==false)
							{
								$sel_option_value_arr=explode(",",$crime_type_field_list[$ctflc]['option_value']);
							}else
							{
								$sel_option_value_arr[]=$crime_type_field_list[$ctflc]['option_value'];
							}
						}

						// $sel_option_value_arr=array();
						$option_val_html="";	
						
						for ($sovc=0; $sovc < count($option_value_arr); $sovc++) 
						{ 
							$option_val_html.="<option value='".$option_value_arr[$sovc]."'>".$option_value_arr[$sovc]."</option>";		
						}
						
						$fire_type_disp="";		$aditional_option="";
						if($field_name=="Type of Property" && $_REQUEST['crime_type']=="3")
						{
							$fire_type_disp="onchange='HideShowFireTypeVehicle(this);'";
							$aditional_option="<option value=''>Select Option</option>";
						}	
						$crime_fields_html.="
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title'>
									$display_name
								</label>
								<select $fire_type_disp name='crime_type_fields[$field_name]' id='$field_name' class='input-group' >
								$aditional_option
								$option_val_html
								</select>
							</div>
						</div>";
					}
					elseif($field_type=="file_upload")
					{
						$crime_fields_html.="
						<div class='col-md-4 col-sm-6 mb-25' style='".$main_wrapper_style."' id='".$main_wrapper_id."'>
							<div class='form-group'>
								<label class='form-title'>
									$display_name
								</label>
								<input type='file' value='' name='crime_type_fields[$field_name]' id='$field_name' class='input-group' >
							</div>
						</div>";
					}
				}
			$crime_fields_html.="</div>";

			}

			
			if(count($crime_type_field_list)>0)
			{
				//$product_name_option='<option value="">Select Subcategory</option>';
				
				$return_data['error_code']="1";
				$return_data['error_message']="";
				$return_data['reuest_params']=$crime_type_field_request_data;
				$return_data['crime_type_field_list']=$crime_type_field_list;
				$return_data['data']=$crime_fields_html;
			}else
			{
				$return_data['error_code']="2";
				$return_data['error_message']="No Details Available for this type";
				$return_data['data']='';
			}
		}else
		{
			
			$return_data['error_code']="0";
			$return_data['error_message']="Please Select Valid Type.";
			$return_data['data']="";
		}
		echo json_encode($return_data);
	}
	
	if($_REQUEST['action']=="UpdateCurrentLocation")
	{
		$_SESSION['cz_user_current_location']=array();
		$_SESSION['cz_user_current_location']['lat']=$_REQUEST['lat'];
		$_SESSION['cz_user_current_location']['lng']=$_REQUEST['lng'];
		$_SESSION['cz_user_current_location']['address']=$_REQUEST['address'];

		$return_data['error_code']="1";
		$return_data['error_message']="";
		$return_data['data']=$_SESSION['cz_user_current_location'];
	}
	if($_REQUEST['action']=="GetNearByCrimes")
	{
		$return_data=array();
		if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['current_lat_lng']) && $_REQUEST['current_lat_lng']!="" )
		{
			$crime_request_data=array();
    
    
			$crime_request_data['logged_in_user']=$_REQUEST['logged_in_user'];
			$crime_request_data['current_lat_lng']=$_REQUEST['current_lat_lng'];
			$CrimeTypeAPIReturnDataJSON=CallAPI($API_Call_Method, API_ROOT."/crime_alert_list.php", $crime_request_data);
			$CrimeTypeAPIReturnDataArr=json_decode($CrimeTypeAPIReturnDataJSON, true);
			// print_r($CrimeTypeAPIReturnDataArr);
			if(isset($CrimeTypeAPIReturnDataArr['returnCode']) && $CrimeTypeAPIReturnDataArr['returnCode']=="1")
			{
				$crime_type_list=$CrimeTypeAPIReturnDataArr['data']['crime_list'];
				
			}

			
			if(count($crime_type_list)>0)
			{
				//$product_name_option='<option value="">Select Subcategory</option>';
				$crime_list_html="";
				for ($cthc=0; $cthc < count($crime_type_list); $cthc++) 
				{ 
					$current_crime=$crime_type_list[$cthc];
					if($current_crime['crime_full_address']!=""){$crime_title=$current_crime['crime_full_address'];}else{$crime_title=$current_crime['crime_type_name'];}
					
					if($current_crime['crime_date']!="0000-00-00 00:00:00"){$crime_date=date('d/m/Y',strtotime($current_crime['crime_date']));}else{$crime_date="";}

					if($current_crime['crime_date']!="0000-00-00 00:00:00"){$crime_time=date('h:i A',strtotime($current_crime['crime_date']));}else{$crime_time="";}

					$crime_type_name=$current_crime['crime_type_name'];
					$crime_id=$current_crime['id'];
					$crime_list_html.="
						<li class='crime-list'>
							<div class='user-icon'>
								<img src='image/user-circle.svg' alt='#'>
							</div>
							<div class='user-detail'>
								<h4 class='user-title'>$crime_title</h4>
								<ul class='date-time-contet'>
									<li class='date-contetn'>
										$crime_date
									</li>
									<li class='time-contetn'>
										$crime_time
									</li>
								</ul>
							</div>
							<div class='btn-action'>
								<a href='crime-tip-details.php?id=$crime_id' class='btn btn-primary btn-small'>$crime_type_name</a>
							</div>
						</li>
					";
				}
				$return_data['error_code']="1";
				$return_data['error_message']="";
				$return_data['data']=$crime_type_list;
				$return_data['crime_list_html']=$crime_list_html;
			}else
			{
				$return_data['error_code']="2";
				$return_data['error_message']="No Details Available for this type";
				$return_data['data']='';
				$return_data['crime_list_html']="";
			}
		}else
		{
			
			$return_data['error_code']="0";
			$return_data['error_message']="Please Select Valid Type.";
			$return_data['data']="";
		}
		echo json_encode($return_data);
	}
	
	if($_REQUEST['action']=="GetPlaceIdFromLatLng")
	{
		$return_data=array();
		if(isset($_REQUEST['google_key']) && $_REQUEST['google_key']!="" && isset($_REQUEST['lat_lng']) && $_REQUEST['lat_lng']!="" )
		{
			$geo_location_return_data=GetPlaceIdFromLatLng($_REQUEST['lat_lng'],$_REQUEST['google_key']);
			$return_data['error_code']="1";
			$return_data['error_message']="Data Available.";
			$return_data['data']=$geo_location_return_data;
		}else
		{
			
			$return_data['error_code']="0";
			$return_data['error_message']="Invalid Parameters.";
			$return_data['data']="";
		}
		echo json_encode($return_data);
	}
		
}else
{
	
}
?>