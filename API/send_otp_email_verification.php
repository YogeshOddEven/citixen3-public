<?php
header('Content-Type: application/json');
include("config.php");
require("class.phpmailer.php");
$data=array();
if( isset($_REQUEST['logged_in_user']) && $_REQUEST['logged_in_user']!="" )
{
	
	$logged_in_user=$_REQUEST['logged_in_user'];
	$condition=" cid='".$logged_in_user."' ";
	
	
	$ride_details=get_ConditionalDetailsFromTable($table_name="pns_customers",$is_stat_chk="0",$file_field="",$condition,$is_multiple="0");
	if($ride_details!="")
	{
		$otp=GenerateOTP($n="4");
		$otp_valid_till=date("Y-m-d H:i:s",strtotime("+15 Minutes"));
		$update = "UPDATE pns_customers SET email_otp='".$otp."',email_otp_valid_till='".$otp_valid_till."' WHERE ".$condition;
		$query = mysqli_query($conn,$update) or die(mysqli_error($conn));
		if($query)
		{
			
			//$customer=$ride_details['customer'];
			$customer_emailid=GetSingleFieldDataFromTable($table_name="pns_customers",$field="emailid","cid='".$logged_in_user."'",$is_stat_chk="0");
			//$recipients=array($customer_emailid);
			//$recipients=$customer_emailid;
			$sms_message="Kindly Enter Below OTP for your Email verification. This is otp will be valid for next 15 minutes only.<br> Email Verification OTP:".$otp;

			$to1= $customer_emailid;
                  $mail = new PHPMailer();
                  $mail->IsSMTP(); // send via SMTP
                  $mail->Host =HOST ;
                  $mail->Port = PORT;
                  $mail->Username = USERNAME; // SMTP username;
                  $mail->Password = PASSWORD; // SMTP password
                  $mail->SMTPAuth = true; // turn on SMTP authentication
                  $mail->From = FROMEMAIL;
                  //$mail->From = $email; //Reply to this email ID
                  $mail->FromName = FROMNAME;
                  $mail->AddAddress($to1," "); // Recipient's email and name
                  $mail->WordWrap = 50; // set word wrap
                  $mail->IsHTML(true); // send as HTML
                  $mail->Subject = "Email Verification  ".date('d F, Y',time());
                  $mailmsg = "<div>
        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
          <tbody>
            <tr>
              <td style='padding:13px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style=' border-top:1px solid #d5d8d9;border-right:1px solid #d5d8d9;;border-left:1px solid #d5d8d9;background:#FFFFFF;border-bottom: 1px solid #D5D8D9;'>
                  <tbody>
                    <tr>
                      <td style='padding:7px'><table width='100%' border='0' cellspacing='0' cellpadding='0' style=' background:#fff;'>
                          <tbody>
                            <tr>
                              <td style='color:#000;padding-bottom:5px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                  <tbody>
                                    <tr>
                                      <td style='line-height:33px'>&nbsp;</td>
                                      <td><div style='width:100%'>
                                          <div class='text-center' style='text-align:center;'>
                                            <h2 class='main_logo' style='padding-top: 30px; color: #fff;text-align: left;padding-left: 13px;padding-top: 20px;font-family:'Cookie', cursive;font-size: 35px;color: #fff;width: 136px;height: 135px;ext-transform: none;line-height: 130px;text-align: center;display: block; margin: 0 auto;float: none;padding: 0; letter-spacing: 10px;color:#fff;background-color:#fff'><img src='".ROOT."/assets/img/brand/logo.png' width='200'  alt='".FROMNAME."'></h2>
                                          </div>
                                        </div></td>
                                      <td><div style='width:100%'>
                                          <div style='text-align: right;font-size:17px;font-family:serif;line-height:30px;padding-left:5px;padding-right:5px; color:#000;'>".date('d F, Y',time())."</div>
                                        </div></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
          <tbody>
            <tr>
              <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#FFFFFF' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9'>
                  <tbody>
                    <tr>
                      <td style='padding:0px 14px'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                          <tbody>
                            <tr>
                              <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='margin-top: 10px;'>
                                  <tbody>
                                    <tr>
                                      <td valign='top'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                          <tbody>
                                            <tr>
                                              <td style='font-family: unset;font-size: 18px;font-weight: 700;padding: 10px;background: #f5f5f5;'>Email Verification </td>
                                            </tr>
                                            <tr>
                                              <td style='padding-top:5px;color:#313131; font-size:12px;'><br>
                                                <p>".stripslashes($sms_message)."</p>
                                                
                                                <br>
                                                </br>
                                                <p>Regards,</p>
                                                <p>".FROMNAME."</p>
                                                <img src='".ROOT."/assets/img/brand/logo.png' width='100' alt='".FROMNAME."'> </td>
                                            </tr>
                                            <tr>
                                              <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td></td>
                                            </tr>
                                          </tbody>
                                        </table></td>
                                    </tr>
                                  </tbody>
                                </table></td>
                            </tr>
                          </tbody>
                        </table></td>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <table width='620' border='0' cellspacing='0' cellpadding='0' align='center' bgcolor='#eff2f3' style='border-right:1px solid #d5d8d9;border-left:1px solid #d5d8d9;border-bottom:1px solid #d5d8d9;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000'>
          <tbody>
            <tr>
              <td style='padding:0px 12px 0px 12px'><table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eff2f3'>
                  <tbody>
                    <tr>
                      <td style='padding:0px 14px 0px;border-top:1px solid #d5d8d9;'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td bgcolor='#eff2f3' style='font-size:11px;color:#727272;'>
                    </tr>
                  </tbody>
                </table></td>
            </tr>
          </tbody>
        </table>
        <div class='yj6qo'></div>
        <div class='adL'> </div>
      </div>
      ";
      $mail->Body = $mailmsg; //HTML Body
			//SendSMS($recipients,$sms_message);
			if($mail->Send())
			{
				$data['otp']=$otp;
				$message = "OTP for Email Verification Sent Successfully";
				$returnCode=true;	
			}else
			{
				$message = "Error in Sending Authentication Code";
				$returnCode=false;				
			}
			
		}else
		{
			$message = "Error in Sending Authentication Code";
			$returnCode=false;		
		}
		
	}else
	{
		$message = "No User available for these credentials";
		$returnCode=false;		
	}	
}else
{
	$message = "Please enter all required values";
	$returnCode=false;
}
SendAPIResponse($returnCode,$message,$data);
?>