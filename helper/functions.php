<?php
	header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header('Content-Type: application/json');
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization, apitoken");
    header("HTTP/1.1 200 OK");
    die();
    }
	use Carbon\Carbon;

	function prepared_query($mysqli, $sql, $params, $types = ""){
	    $types = $types ?: str_repeat("s", count($params));
	    $stmt = $mysqli->prepare($sql);
	    $stmt->bind_param($types, ...$params);
	    $stmt->execute();
	    return $stmt;
	}

	function prepared_select($mysqli, $sql, $params = [], $types = "") {
	    return prepared_query($mysqli, $sql, $params, $types)->get_result();
	}

	function checkToken($conn, $api_token){
		$expired_at = Carbon::now();
		$user_detail_qry = "SELECT * FROM apitokens WHERE apitoken = ? AND expired_at >= ? limit 1";
		$user_data_result = prepared_select($conn, $user_detail_qry, [$api_token, $expired_at]);
		if($user_data_result->num_rows){
			$user_data = $user_data_result->fetch_assoc();
			return $user_data['user_id'];	
		}else{
			return false;
		}
	}

	function getFirmFromUserId($conn, $user_id){
		// $user_detail_qry = "SELECT id,firm_id FROM cz_users WHERE id = ? limit 1";
		// $user_data_result = prepared_select($conn, $user_detail_qry, [$user_id]);
		// if($user_data_result->num_rows){
		// 	$user_data = $user_data_result->fetch_assoc();
		// 	return $user_data['firm_id'];	
		// }else{
			return false;
		// }
	}

	function getFirmUserName($conn, $user_id){
		$user_detail_qry = "SELECT * FROM cz_users WHERE id = ? limit 1";
		$user_data_result = prepared_select($conn, $user_detail_qry, [$user_id]);
		if($user_data_result->num_rows){
			$user_data = $user_data_result->fetch_assoc();
			return $user_data['fname'];	
		}else{
			return false;
		}
	}
	function getActivityCategoryName($conn, $cat_id){
		$user_detail_qry = "SELECT * FROM activity_categories WHERE id = ? limit 1";
		$user_data_result = prepared_select($conn, $user_detail_qry, [$cat_id]);
		if($user_data_result->num_rows){
			$user_data = $user_data_result->fetch_assoc();
			return $user_data['fname'];	
		}else{
			return false;
		}
	}

	function getTableFieldName($conn, $table_name,$condition,$get_field="name"){
		$user_detail_qry = "SELECT * FROM $table_name WHERE $condition limit ?";
		$user_data_result = prepared_select($conn, $user_detail_qry, ['1']);
		if($user_data_result->num_rows){
			$user_data = $user_data_result->fetch_assoc();
			if(isset($user_data[$get_field]))
			{
				return $user_data[$get_field];	
			}else
			{
				return "";
			}
		}else{
			return "";
		}
	}

	function getCountTableField($conn, $table_name,$condition,$get_field="name"){
		$total=0;
		$table_detail_qry = "SELECT * FROM $table_name WHERE $condition limit ?";
		$table_data_result = prepared_select($conn, $table_detail_qry, ['1']);
		if($table_data_result->num_rows){
			
			while($table_data = $table_data_result->fetch_assoc())
			{
				if(isset($table_data[$get_field]))
				{
					$total+=$table_data[$get_field];
				}
					
			}
		}
		return $total;
	}
	function GetMatterTotalBilling($conn,$matter_id)
	{
		$get_billable_activities = "SELECT * FROM activities WHERE is_non_billable=? AND is_deleted=? AND matter_id=?";
		$get_billable_activities_result = prepared_select($conn, $get_billable_activities, ['0', '0', $matter_id]);
		$matter_unbilled_amount = 0;
		$matter_unbilled_hours = 0;
		$amount_in_trust = 0;
		$return_data=array();
		if($get_billable_activities_result->num_rows)
		{
			while ($get_billable_activity_row = $get_billable_activities_result->fetch_assoc())
			{
				if($get_billable_activity_row['type'] == 'time_entry'){
					$matter_unbilled_hours += $get_billable_activity_row['qty'] ?: 0;	
				}
				$matter_unbilled_amount += ($get_billable_activity_row['qty'] ?: 0) * ($get_billable_activity_row['rate'] ?: 0);
			}
		}

		$return_data['total_amount']=$matter_unbilled_amount;
		$return_data['total_hours']=$matter_unbilled_hours;
		return json_encode($return_data);
	}

	function checkRole($conn, $api_token){
		$expired_at = Carbon::now();
		$user_detail_qry = "SELECT * FROM apitokens WHERE apitoken = ? AND expired_at >= ? limit 1";
		$user_data_result = prepared_select($conn, $user_detail_qry, [$api_token, $expired_at]);
		if($user_data_result->num_rows){
			$user_data = $user_data_result->fetch_assoc();
			return $user_data['user_id'];	
		}else{
			return false;
		}
	}

	function apiResponse($code="", $message="", $page_no="", $total_page="", $data=[], $status_code=200, $errors=[]){
		http_response_code($status_code);
		echo json_encode(
	        array(
	        	"code" => $code,
	        	"message" => $message,
	        	"errors" => $errors,
	        	"page_no" => strval($page_no),
	        	"total_page" => strval($total_page),
	        	"data" => $data
	        )
	    );
	}

	function registerMail($user_id)
	{
		global $conn, $mail, $project_url, $front_url;
		$user_detail_qry = "SELECT * FROM cz_users WHERE cid='$user_id' limit 1";
		$user_data_result = mysqli_query($conn, $user_detail_qry)or die(mysqli_error($conn));
		$user_data = mysqli_fetch_assoc($user_data_result);

        $mail->addAddress($user_data['emailid']);
        // $mail->addCC('testcc@gmail.com');
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = 'Confirm Email | Citizen3';

        $body = "<div>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:13px 12px 0px 12px'>
			            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
			                <tbody><tr>
			                <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td style='line-height:33px'>&nbsp;</td>
			                            <td>
			                                <div style='width:100%'>
			                                    <br>
			                                    <div style='font-size:20px;font-family:arial;line-height:30px; color:#fff;'><img src='".$front_url."assets/img/brand/logo.png' width='200' title='Logo'></div>
			                                </div>
			                            </td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table>
			            <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
			                <tbody><tr>
			                <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                            <tbody>
			                            <tr>
			                            	<td style='padding-top:5px;color:#313131; font-size:15px;'>
			                            		<br>
		                            			<h2>Welcome to Citizen3, ".$user_data['fname']."!</h2>
		                            			<p>Please activate your account.</p>
												<p>Activate Your Account by clicking given below button.</p>
			                            		<p><a target='_blank' class='btn btn-primary' style='border: 1px solid #3D5A80!important;background-color: #3D5A80!important;    text-decoration: unset!important;color: #fff!important;letter-spacing: 0.8px!important;border-radius: 5px!important;padding: 10px 20px!important;font-size: 14px!important;font-weight: 600!important;' href='".$front_url."account_verification.php?t=".$user_data['email_verifiy_token']."'>Activate Your Account</a></p>
			                            		<br><br>
				                            	<p>If you have trouble with the link above, copy and paste this link into your browser:</p>
				                            	<p><a target='_blank' href='".$front_url."account_verification.php?t=".$user_data['email_verifiy_token']."'>".$front_url."account_verification?t=".$user_data['email_verifiy_token']."</a></p>
			                            		<br>
			                            	</td>                
			                            </tr>
			                            <tr>
			                            	<td></td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table></td>
			            </tr>
			        </tbody></table>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody>
			            <tr>
			                <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
			                    <tbody><tr>
			                    <td style='padding:0px 14px 0px;border-bottom:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>&nbsp;</td>
			                    </tr>
			                    <tr>
			                    <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
			                        &nbsp;
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody>
			        </table>
			        <div class='yj6qo'></div>
			        <div class='adL'>
			        </div>
			    </div>";
        $mail->Body = $body;
        // $mail->send();
		$to=$user_data['emailid'];
		$subject= 'Confirm Email | Citizen3';
		$headers = "From: no-reply@citizen3.com";	
		$headers .= "\r\n"."Content-Type: text/html; charset=UTF-8\r\n";
		mail ($to,$subject,$body, $headers);
	}

	function changeLoginEmailMail($id){
		global $conn, $mail, $project_url, $front_url;
		$get_email_qry = "SELECT * FROM change_login_email_tokens WHERE id=? limit 1";
		
		$get_email_result = prepared_query($conn, $get_email_qry, [$id]);
		$email_data = $get_email_result->get_result()->fetch_assoc();

        $mail->addAddress($email_data['new_email']);
        // $mail->addCC('testcc@gmail.com');
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = 'Please confirm your login email change | Citizen3';

        $body = "<div>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:13px 12px 0px 12px'>
			            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
			                <tbody><tr>
			                <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td style='line-height:33px'>&nbsp;</td>
			                            <td>
			                                <div style='width:100%'>
			                                    <br>
			                                    <div style='font-size:20px;font-family:arial;line-height:30px; color:#fff;'><img src='".$front_url."assets/img/brand/logo.png' width='200' title='Logo'></div>
			                                </div>
			                            </td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table>
			            <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
			                <tbody><tr>
			                <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                            <tbody>
			                            <tr>
			                            	<td style='padding-top:5px;color:#313131; font-size:15px;'>
			                            		<br>
		                            			<h2>Dear User,</h2>
		                            			<p>This is to confirm your login email change.</p>
		                            			<p>Click the button below to confirm your login email change, or <a target='_blank' href='".$front_url."change_email/confirm?t=".$email_data['verifiy_token']."'>click here</a> . Once confirmed, you will no longer be able to login to Citizen3 with your old email (".$email_data['old_email'].").</p>
			                            		<p><b>Note:</b> If you feel you received this in error, or you do not want to change your email, you can simply ignore this message. Please contact us if you have any concerns, we're here to help!</p>
			                            		<p><a target='_blank' class='btn btn-primary' style='border: 1px solid #3D5A80!important;background-color: #3D5A80!important;    text-decoration: unset!mportant;color: #fff!important;letter-spacing: 0.8px!important;border-radius: 5px!important;padding: 10px 20px!important;font-size: 14px!important;font-weight: 600!important;' href='".$front_url."change_email/confirm?t=".$email_data['verifiy_token']."'>Confirm email change</a></p>
			                            	</td>                
			                            </tr>
			                            <tr>
			                            	<td></td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table></td>
			            </tr>
			        </tbody></table>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody>
			            <tr>
			                <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
			                    <tbody><tr>
			                    <td style='padding:0px 14px 0px;border-bottom:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>&nbsp;</td>
			                    </tr>
			                    <tr>
			                    <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
			                        &nbsp;
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody>
			        </table>
			        <div class='yj6qo'></div>
			        <div class='adL'>
			        </div>
			    </div>";
        $mail->Body = $body;
        $mail->send();
	}

	function forgotPasswordMail($email, $token){
		global $conn, $mail, $project_url, $front_url;
		$user_detail_qry = "SELECT * FROM cz_users WHERE emailid='$email' limit 1";
		// $user_data_result = prepared_query($conn, $user_detail_qry, [$email]);
		// $user_data = $user_data_result->get_result()->fetch_assoc();

		$user_data_result = mysqli_query($conn, $user_detail_qry)or die(mysqli_error($conn));
		$user_data = mysqli_fetch_assoc($user_data_result);

        $mail->addAddress($user_data['emailid']);
        $mail->isHTML(true); // Set email format to HTML

        $mail->Subject = 'Reset password Email | Citizen3';

        $body = "<div>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:13px 12px 0px 12px'>
			            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
			                <tbody><tr>
			                <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td style='line-height:33px'>&nbsp;</td>
			                            <td>
			                                <div style='width:100%'>
			                                    <br>
			                                    <div style='font-size:20px;font-family:arial;line-height:30px; color:#fff;'><img src='".$front_url."assets/img/brand/logo.png' width='200' title='Logo'></div>
			                                </div>
			                            </td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table>
			            <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
			                <tbody><tr>
			                <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                            <tbody>
			                            <tr>
			                            <td style='padding-top:5px;color:#313131; font-size:15px;'>
			                            <br>
			                            <h2>Dear ".$user_data['fname'].",</h2>
			                            <p>We recieved request for password reset. If you did not make this request, you may simply ignore this email.</p>
			                            <p>To complete the password reset process, please visit</p>
			                            <p><a target='_blank' class='btn btn-primary' style='border: 1px solid #3D5A80!important;background-color: #3D5A80!important;    text-decoration: unset!important;color: #fff!important;letter-spacing: 0.8px!important;border-radius: 5px!important;padding: 10px 20px!important;font-size: 14px!important;font-weight: 600!important;' href='".$front_url."reset_password_validate.php?token=".$token."'>Validate & Reset Password</a></p>
			                            <br><br>
				                        <p>If you have trouble with the link above, copy and paste this link into your browser:</p>
				                        <p><a target='_blank' href='".$front_url."reset_password_validate.php?token=".$token."'>".$front_url."reset_password_validate.php?token=".$token."</a></p>
			                            <br>
			                            <p>If you have any difficulties resetting your password, please don't hesitate to contact us.</p>
			                            <br>
			                            <br>
			                            <p><strong>Administration Team,</strong></p>
			                            <p><strong>Citizen3</strong></p>
			                            <br>
			                            </td>                
			                            </tr>
			                            <tr>
			                            <td></td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table></td>
			            </tr>
			        </tbody></table>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody>
			            <tr>
			                <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
			                    <tbody><tr>
			                    <td style='padding:0px 14px 0px;border-bottom:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>&nbsp;</td>
			                    </tr>
			                    <tr>
			                    <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
			                        &nbsp;
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody>
			        </table>
			        <div class='yj6qo'></div>
			        <div class='adL'>
			        </div>
			    </div>";
        $mail->Body = $body;
        // $mail->send();
		$to=$user_data['emailid'];
		$subject= 'Reset password Email | Citizen3';
		$headers = "From: no-reply@citizen3.com";	
		$headers .= "\r\n"."Content-Type: text/html; charset=UTF-8\r\n";
		mail ($to,$subject,$body, $headers);
	}

	function SendShareCrimeEmail($crime_id,$user_email,$user_name)
	{
		global $conn, $mail, $project_url, $front_url,$web_url;
		
		if($user_email!="")
		{
			// $mail_users=array();
			// if(strpos($user_email,",")!==false)
			// {
			// 	$mail_users[]=explode(",", $user_email);
			// }else
			// {
			// 	$mail_users[]=$user_email;
			// }
			// for ($mul=0; $mul < count($mail_users); $mul++) 
			// { 
			// 	$mail->addAddress($mail_users[$mul]);	
			// }
				$mail->addAddress($user_email);	
			
			
			// $mail->addCC('testcc@gmail.com');
			$mail->isHTML(true); // Set email format to HTML

			$mail->Subject = 'Shared Crime Email | Citizen3';

			$body = "<div>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:13px 12px 0px 12px'>
			            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
			                <tbody><tr>
			                <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td style='line-height:33px'>&nbsp;</td>
			                            <td>
			                                <div style='width:100%'>
			                                    <br>
			                                    <div style='font-size:20px;font-family:arial;line-height:30px; color:#fff;'><img src='".$front_url."assets/img/brand/logo.png' width='200' title='Logo'></div>
			                                </div>
			                            </td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table>
			            <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody><tr>
			            <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
			                <tbody><tr>
			                <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                    <tbody><tr>
			                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                        <tbody><tr>
			                        <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
			                            <tbody>
			                            <tr>
			                            <td style='padding-top:5px;color:#313131; font-size:15px;'>
			                            <br>
			                            <h2>Hello,</h2>
			                            <p><b>\"$user_name\"</b>  just shared crime with you, you can check crime detail by clicking given below link</p>
			                            <p><a target='_blank' class='btn btn-primary' style='border: 1px solid #3D5A80!important;background-color: #3D5A80!important;    text-decoration: unset!important;color: #fff!important;letter-spacing: 0.8px!important;border-radius: 5px!important;padding: 10px 20px!important;font-size: 14px!important;font-weight: 600!important;' href='".$web_url."crime-tip-details.php?id=".$crime_id."'>View Crime Details</a></p>
			                            <br><br>
				                        <p>If you have trouble with the link above, copy and paste this link into your browser:</p>
				                        <p><a target='_blank' href='".$web_url."crime-tip-details.php?id=".$crime_id."'>".$web_url."crime-tip-details.php?id=".$crime_id."</a></p>
			                            <br>
			                            <p>If you have any difficulties resetting your password, please don't hesitate to contact us.</p>
			                            <br>
			                            <br>
			                            <p><strong>Administration Team,</strong></p>
			                            <p><strong>Citizen3</strong></p>
			                            <br>
			                            </td>                
			                            </tr>
			                            <tr>
			                            <td></td>
			                            </tr>
			                        </tbody></table></td>
			                        </tr>
			                    </tbody></table></td>
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody></table></td>
			            </tr>
			        </tbody></table>
			        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
			            <tbody>
			            <tr>
			                <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
			                    <tbody><tr>
			                    <td style='padding:0px 14px 0px;border-bottom:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>&nbsp;</td>
			                    </tr>
			                    <tr>
			                    <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
			                        &nbsp;
			                    </tr>
			                </tbody></table></td>
			                </tr>
			            </tbody>
			        </table>
			        <div class='yj6qo'></div>
			        <div class='adL'>
			        </div>
			    </div>";
			$mail->Body = $body;
			// $mail->send();
				$to=$user_email;
				$subject= 'Shared Crime Email | Citizen3';
				$headers = "From: no-reply@citizen3.com";	
				$headers .= "\r\n"."Content-Type: text/html; charset=UTF-8\r\n";
				mail ($to,$subject,$body, $headers);
		}
	}

	function convertTimeToSecond(string $time): int
	{
	    $d = explode(':', $time);
	    return ($d[0] * 3600) + ($d[1] * 60) + $d[2];
	}

	function convertSecondsToHMS($seconds)
	{
		$seconds = round($seconds);
  		$output = sprintf('%02d:%02d:%02d', ($seconds/ 3600),($seconds/ 60 % 60), $seconds% 60);
	    return $output;
	}
	function convertTimeToDecimal($time) {
	    $timeArr = explode(':', $time);
	    $decTime = ($timeArr[0]) + ($timeArr[1]/60) + ($timeArr[2]/3600);
	    return round($decTime, 2);
	}
	function convertDecimalToTime($decimal) {
	    $hours = floor($decimal / 60);
	    $minutes = floor($decimal % 60);
	    $seconds = $decimal - (int)$decimal;
	    $seconds = round($seconds * 60);
	    return str_pad($hours, 2, "0", STR_PAD_LEFT) . ":" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . ":" . str_pad($seconds, 2, "0", STR_PAD_LEFT);
	}

	function saveLog($conn, $firm_id=0, $user_id=0, $user_action="", $ref_id=0, $ref_id_for="", $type="", $description=""){
		$insert_log_qry = "INSERT INTO log_feeds (firm_id, user_id, user_action, ref_id, ref_id_for, type, description) VALUES (?,?,?,?,?,?,?)";
		
		// $insert_log_id = prepared_query($conn, $insert_log_qry, [$firm_id, $user_id, $user_action, $ref_id, $ref_id_for, $type, $description]);
		// echo '<pre>'; print_r($insert_log_id);die((__FILE__).'-->'.(__FUNCTION__).'--Line-->'.(__LINE__));

		$insert_log_id = prepared_query($conn, $insert_log_qry, [$firm_id, $user_id, $user_action, $ref_id, $ref_id_for, $type, $description])->insert_id;
		return $insert_log_id;
	}

	function billApprovalMail($bill_id, $notify_user_id, $note=""){
		global $conn, $mail, $project_url, $front_url;
		$get_email_qry = "SELECT * FROM cz_users WHERE cid=? limit 1";
		$get_email_result = prepared_query($conn, $get_email_qry, [$notify_user_id]);
		$email_data = $get_email_result->get_result()->fetch_assoc();
		if($email_data['email']){
	        $mail->addAddress($email_data['email']);
	        // $mail->addCC('testcc@gmail.com');
	        $mail->isHTML(true); // Set email format to HTML

	        $mail->Subject = '1 Bill Submitted for Approval | Citizen3';

	        $body = "<div>
				        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
				            <tbody><tr>
				            <td style='padding:13px 12px 0px 12px'>
				            <table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
				                <tbody><tr>
				                <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                    <tbody><tr>
				                    <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                        <tbody><tr>
				                        <td style='line-height:33px'>&nbsp;</td>
				                            <td>
				                                <div style='width:100%'>
				                                    <br>
				                                    <div style='font-size:20px;font-family:arial;line-height:30px; color:#fff;'><img src='".$front_url."assets/img/brand/logo.png' width='200' title='Logo'></div>
				                                </div>
				                            </td>
				                            </tr>
				                        </tbody></table></td>
				                        </tr>
				                    </tbody></table></td>
				                    </tr>
				                </tbody></table></td>
				                </tr>
				            </tbody></table>
				            <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
				            <tbody><tr>
				            <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
				                <tbody><tr>
				                <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                    <tbody><tr>
				                    <td><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                        <tbody><tr>
				                        <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
				                            <tbody>
				                            <tr>
				                            	<td style='padding-top:5px;color:#313131; font-size:15px;'>
				                            		<br>
			                            			<h2>Dear User,</h2>
			                            			<p>1 bill is waiting to be approved.</p>
				                            		<p><b>Note:</b> ".$note."</p>
				                            		<p><b>Bill No:</b> ".$bill_id."</p>
				                            	</td>                
				                            </tr>
				                            <tr>
				                            	<td></td>
				                            </tr>
				                        </tbody></table></td>
				                        </tr>
				                    </tbody></table></td>
				                    </tr>
				                </tbody></table></td>
				                </tr>
				            </tbody></table></td>
				            </tr>
				        </tbody></table>
				        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
				            <tbody>
				            <tr>
				                <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF'>
				                    <tbody><tr>
				                    <td style='padding:0px 14px 0px;border-bottom:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>&nbsp;</td>
				                    </tr>
				                    <tr>
				                    <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
				                        &nbsp;
				                    </tr>
				                </tbody></table></td>
				                </tr>
				            </tbody>
				        </table>
				        <div class='yj6qo'></div>
				        <div class='adL'>
				        </div>
				    </div>";
	        $mail->Body = $body;
	        $mail->send();
	    }
	}
?>