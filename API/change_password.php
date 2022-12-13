<?php
header('Content-Type: application/json');
include("config.php");


//$srno = $_REQUEST['srno'];

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

	
	if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" && isset($_REQUEST['password']) && $_REQUEST['password']!="")
	{
		$logged_in_user=$_REQUEST['logged_in_user'];
		$password=$_REQUEST['password'];
		// if(isset($_REQUEST['mobile'])){  $req_mobile=$_REQUEST['mobile'];  }

		

		$customer_id=GetSingleFieldDataFromTable($table_name="pns_customers",$field="fname",$condition=" cid='".$logged_in_user."' ",$is_stat_chk="0");
		if($customer_id!="0")
		{
			$password=$_REQUEST['password'];
			$pass=md5($_REQUEST['password']);

			//send mail to user	
			$update_password=mysqli_query($conn," UPDATE pns_customers set pass='$pass' , password='$password' WHERE cid='".$logged_in_user."' ");
			if($update_password)
			{
				
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Password Updated Successfully";
				}
				else
				{
					$message = "Contraseña actualizada exitosamente";
				}
				$returnCode=true;		
			}else
			{
				
				if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
				{
					$message = "Error in updating password.";
				}
				else
				{
					$message = "Error al actualizar la contraseña.";
				}
				$returnCode=false;				
			}
			// SendSMS($recipients,$sms_message);
			
		}else
		{
			
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "No User Account Availbale.";
			}
			else
			{
				$message = "No hay cuenta de usuario disponible.";
			}
			$returnCode=false;		
		}

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

SendAPIResponse($returnCode,$message,$data="",$is_nodata="1");
?>