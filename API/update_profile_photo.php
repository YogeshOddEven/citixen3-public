<?php
header('Content-Type: application/json');
include("config.php");


if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

//$srno = $_REQUEST['srno'];
$data=array();
$data['profile_photo']="";

	
	if(isset($_REQUEST['logged_in_user']) &&  isset($_FILES['profile_photo']) && $_REQUEST['logged_in_user']!=""  )
	{
		//$photo_name=array();
		$cid= $_REQUEST['logged_in_user'];
		
		
		$is_kyc_approved="0";
		$is_photo_approved="0";
		
		$profile_photo_name="";
		$kyc_document_name="";
		if(isset($_FILES['profile_photo']['name']) && count($_FILES['profile_photo']['name'])>0 )
		{
			//$photo_name=GenrateUploadFileName("profile_photo",$pre_tag="",$is_pretag_use="0",$i,$is_encoded="0");
			$profile_photo_name="User_".rand(999,9999)."_".$_FILES['profile_photo']['name'];	
			$is_photo_approved="1";
		}
		/*if(isset($_FILES['kyc_document']['name']) && count($_FILES['kyc_document']['name'])>0 )
		{
			$is_kyc_approved="1";
			//$photo_name=GenrateUploadFileName("kyc_document",$pre_tag="",$is_pretag_use="0",$i,$is_encoded="0");
			$kyc_document_name="KYC_".rand(999,9999)."_".$_FILES['kyc_document']['name'];	
			
		}*/
		$condition="";
		
			$condition=" cid='".$cid."' ";
		

		$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");
		$executive_details=get_ConditionalDetailsFromTable("pns_customers",$is_stat_chk="1",$file_field,$condition,"0","cid,fname,lname,uname as username,mobile,emailid,photo");
		if($executive_details=="" || !isset($executive_details['cid']))
		{
			$message = "No Account Available Or Account is closed";
			$returnCode=false;	
		}else
		{	
			//kyc_proof,is_kyc_approved
			$add_user_registration=mysqli_query($conn,"UPDATE pns_customers SET photo='$profile_photo_name',is_photo_approved='$is_photo_approved' WHERE ".$condition) or die(mysqli_error($conn));
			if($add_user_registration)
			{
				if($profile_photo_name!="")
				{
					UploadFile("profile_photo",$folder_name="../uploads/User/",$profile_photo_name);			
					if(file_exists("../uploads/User/".$profile_photo_name))
					{
						$data['profile_photo']=ROOT."/uploads/User/".$profile_photo_name;
					}
				}
				/*if($kyc_document_name!="")
				{
					UploadFile("kyc_document",$folder_name="../uploads/KYC/",$kyc_document_name);
				}*/
				//$message = "Photo Updated Successfully";
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Photo Updated Successfully";
				}
				else
				{
					$message = "Foto actualizada con éxito";
				}
				$returnCode=true;		
			}else
			{
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Error in Updation, Please try again later.";
				}
				else
				{
					$message = "Error en la actualización, inténtalo de nuevo más tarde.";
				}

				$returnCode=true;
			}
		}
		/*$message = "Photos Uploaded Successfully";
			$returnCode=true;*/
		
		
		//$message=$message.json_encode($_FILES);
	}else
	{
		if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
		{
			$message = "PLease enter all required values";
		}
		else
		{
			$message = "Por favor ingrese todos los valores requeridos";
		}
		$returnCode=false;
	}

SendAPIResponse($returnCode,$message,$data);
?>