<?php
header('Content-Type: application/json');
include("config.php");
use Rakit\Validation\Validator;
	use Carbon\Carbon;
$table_name="cz_users";
$order_by="cid";
$order_type="DESC";
$select_fields="";
$page="";
$limit="";
$is_multiple="0";

//user_roles

if(isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!=""  )
{
	$user_language=GetSingleFieldDataFromTable("cz_users",$field="language_code"," cid='".$_REQUEST['logged_in_user']."' ",$is_stat_chk="0");
}else
{
	$user_language="";
}

$file_field=array("chk_file_path" => "../uploads/User/","file_path" => ROOT_W."/uploads/User/","default_file" => ROOT."/uploads/User/user.png","file_field_col" => "photo");

$data=array();
// $data['otp']="";
if(isset($_REQUEST['user_name']) && $_REQUEST['user_name']!="" && isset($_REQUEST['password']) && $_REQUEST['password']!="")
{
	$user_name=$_REQUEST['user_name'];
	$password=md5($_REQUEST['password']);
	$condition=" (emailid='$user_name') AND pass='$password' ";

	$user_details=get_ConditionalDetailsFromTable($table_name,$is_stat_chk="0",$file_field,$condition,$is_multiple,$select_fields,$page,$limit,"","","1");

	//$user_details="";
	if($user_details!="")
	{
		/*$otp=GenerateOTP($n="4");
		$otp_valid_till=date("Y-m-d H:i:s",strtotime("+15 Minutes"));
		$update = "UPDATE pns_customers SET otp='".$otp."',otp_valid_till='".$otp_valid_till."' WHERE cid='".$user_details['cid']."'";
		$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		if($query)
		{
			$customer_mobile=$user_details['mobile'];
			$recipients=$customer_mobile;
			$sms_message="Kindly Enter Below OTP for your Login verification. This is otp will be valid for next 15 minutes only.\r\n Mobile Verification OTP:".$otp;
			// SendSMS($recipients,$sms_message);
			
			$data['otp']=$otp;
		}*/
		if(isset($user_details['status']) && $user_details['status']=="1")
		{

		
			if(isset($_REQUEST['mobile_token']) && $_REQUEST['mobile_token']!="")
			{
				$reg_token_ids=$_REQUEST['mobile_token'];
				$updte_mobile_token=mysqli_query($conn,"UPDATE cz_users SET reg_token_ids='$reg_token_ids' WHERE cid='".$user_details['cid']."'");

			}
			$alert_min_range="";
			$alert_max_range="";
			if($user_details['user_type']=="paid")
			{
				$alert_min_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_start_range' ",$is_stat_chk="0");
				$alert_max_range_default=GetSingleFieldDataFromTable("cz_settings",$field="svalue"," sname='paid_user_alert_end_range' ",$is_stat_chk="0");
			}else
			{
				$alert_min_range_default=0;
				$alert_max_range_default=0;
			}
			$user_alert_details=get_ConditionalDetailsFromTable("cz_user_alert","0",""," user_id='".$user_details['cid']."' ","0");
			if($user_alert_details!="")
			{
				$alert_min_range=$user_alert_details['min_range'];
				$alert_max_range=$user_alert_details['max_range'];
			}else
			{
				$alert_min_range=$alert_min_range_default;
				$alert_max_range=$alert_max_range_default;

			}
			$user_details['alert_min_range']=$alert_min_range;
			$user_details['alert_max_range']=$alert_max_range;
			if(isset($user_details['zipcode']) && $user_details['zipcode']!="")
			{


				$zipcode=$user_details['zipcode'];
				
				$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zipcode)."&sensor=false&key=AIzaSyBNPYL3NNFFg9Bd1QZ66hAMUwXV3LFl54g";
				// $result_string = file_get_contents($url);
				// $result = json_decode($result_string, true);
				
				$APIReturnDataJSON=CallAPI("GET", $url, array());
				$APIReturnDataArr=json_decode($APIReturnDataJSON, true);
				if(!empty($result['results']))
				{
					$zipLat = $result['results'][0]['geometry']['location']['lat'];
					$ziplng = $result['results'][0]['geometry']['location']['lng'];
					$user_details['default_lat_lng']=$zipLat.", ".$ziplng;
					
				}
				$user_details['other_zip_details']=$APIReturnDataArr;
			}
			
			if(isset($user_details['fname']) && $user_details['fname']!="")
			{
				$user_details['username']=$user_details['fname']." ".$user_details['lname'];
			}
			
			$apitoken = bin2hex(random_bytes(30));
			$created_at = Carbon::now();
			$expired_at = Carbon::now()->addDays(5);

			$generate_token = $conn->prepare("INSERT INTO apitokens (user_id, apitoken, created_at, expired_at) VALUES (?, ?, ?, ?)");
			$generate_token->bind_param("isss", $user_data['id'], $apitoken, $created_at, $expired_at);
			$generate_token->execute();
			if($generate_token->affected_rows)
			{
				$user_data['apitoken'] = $apitoken;
				unset($user_data['password']);
				unset($user_data['pass']);
			}
			$data=$user_details;
			$message="Iniciado sesión con éxito";
			// $message="Logged In Successfully";
			$returnCode=true;														
		}else
		{
			if(isset($user_details['status']) && $user_details['status']=="0")
			{
				$data['user_details']=null;
				$message="La verificación de tu cuenta está pendiente. Por favor, revisa tu correo electrónico para activar tu cuenta.";
				// $message="Account verification is pending";
				$returnCode=false;
			}else
			{
				$data['user_details']=null;
				$message="La cuenta está bloqueada por el administrador";
				// $message="Account is blocked by admin";
				$returnCode=false;
			}
			
			
		}											
	}else
	{
		$data['user_details']=null;
		$message="Ingresa correctamente tus datos para poder iniciar sesión.";
		// $message="Invalid Credentials";
		
		$returnCode=false;
	}
}else
{
	if(!isset($_REQUEST['user_name']) || $_REQUEST['user_name']=="" && isset($_REQUEST['password']) && $_REQUEST['password']!="")
	{
		// $data=null;
		$message="El correo electrónico debe ser requerido";
		// $message="Email must be required";
		$returnCode=false;
	}elseif(!isset($_REQUEST['password']) || $_REQUEST['password']==""  && isset($_REQUEST['user_name']) && $_REQUEST['user_name']!="") 
	{
		// $data['user_details']=null;
		$message="La contraseña debe ser requerida";
		// $message="Password must be required";
		$returnCode=false;
	}else
	{
		// $data['user_details']=null;
		$message="Los detalles de inicio de sesión deben ser requeridos";
		// $message="Login Details must be required";
		$returnCode=false;
	}	
	
}
SendAPIResponse($returnCode,$message,$data);
?>