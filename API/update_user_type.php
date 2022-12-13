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
	
	if( isset($_REQUEST['logged_in_user'])  && $_REQUEST['logged_in_user']!="" &&  isset($_REQUEST['user_type'])  && $_REQUEST['user_type']!="" )
	{
		
		// $amount_from_wallet  =  mysqli_real_escape_string($conn,$_REQUEST['amount_from_wallet']);
		// $amount_from_payment  =  mysqli_real_escape_string($conn,$_REQUEST['amount_from_payment']);
		// $total_amount=$amount_from_wallet+$amount_from_payment;
		$logged_in_user=$_REQUEST['logged_in_user'];
		$user_type=$_REQUEST['user_type'];
		if($user_type=="free")
		{
			$is_active_membership=0;
		}else
		{
			$is_active_membership=1;
		}
		$condition="";
		
		$condition=" cid='".$logged_in_user."' ";
		
		// $transaction_type="Debit";$transaction_category="Membership Renewal";
	
		// $transaction_arr=array("id_category" => $logged_in_user,"tansaction_type" => $transaction_type,"transaction_category" => $transaction_category,"transaction_for" => $logged_in_user,"transaction_by" => $logged_in_user,"wallet_amount" => $amount_from_wallet,"other_amount" => $amount_from_payment,"transaction_amount" => $total_amount,"transaction_currancy" => "INR","tax_amount" => $tax_amount,"gateway_fees" => $gateway_fees,"transaction_fees" => $transaction_fees,"payement_gateway" => $payement_gateway,"transaction_ref_id" => $payment_refrence_id,"transaction_date" => date('Y-m-d H:i:s'),"transaction_status" => "1","payment_status" => "1","utype"=>"0");

		// $membership_details=get_ConditionalDetailsFromTable("pns_membership_detail","0",""," status='1' ","0");
		
		// $start_date=date('Y-m-d');$end_date=date('Y-m-d',strtotime('+'.$validity." Months"));
		$update_membership_stat=mysqli_query($conn,"UPDATE cz_users SET user_type='$user_type' WHERE ".$condition)or die(mysqli_error($conn));
		if($update_membership_stat)
		{
			// if($amount_from_wallet>0)
			// {

			// 	$is_add_money=SubtractWalletBalance($logged_in_user,$amount_from_wallet,"0");	 
				
			// }
			// CreateTransaction($transaction_arr);
			
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "User type updated successfully";
			}
			else
			{
				$message = "Tipo de usuario actualizado correctamente";
			}

			$returnCode=true;
		}else
		{
			if($user_language=="" || $user_language=="en" || $user_language=="EN" || $user_language=="ENG")
			{
				$message = "Error in updating user type";
			}
			else
			{
				$message = "Error al actualizar el tipo de usuario";
			}
			//$message = "Error in updating user type";
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

SendAPIResponse($returnCode,$message,$data);
?>