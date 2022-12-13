<?php 
ob_start();
session_start();
include("process/config.php");include("functions.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<?php include("css.php"); ?>
</head>
<?php 
	if(isset($_REQUEST['t']) )
	{
		$token=$_REQUEST['t'];
	}else
	{
		$token="";
		$type="";
	}
?>
<body class="login-body">
<div id="cover"> </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-5">
				<form class="login100-pic validate-form" method="post" action="process/check_reset_password.php">
					<input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
					<input type="hidden" name="type" id="type" value="<?php echo $type; ?>" />
					<?php 
                            $clogo = get_admin_settings('clogo'); 
                            $default="assets/img/brand/logo.png";
                            $logo="";
                            if($clogo!="" && file_exists("img/".$clogo))
                            {
                                $logo="img/".$clogo;
                            }else
                            {
                                $logo=$default;
                            }
                        ?>
					<img src="<?php echo $logo; ?>" style="width: 100%;height: auto">
					<?php include("message.php") ?>
					<span class="login100-form-title">
						Cuenta verificada
					</span>
					<?php
						$is_valid_token=0;
						if($token!="")
						{
							$sel_token_user_details=mysqli_query($conn,"SELECT * from cz_users WHERE email_verifiy_token='$token' AND status='0' ");
							if(mysqli_num_rows($sel_token_user_details)>0)
							{
								$is_valid_token=1;
								$token_user_details=mysqli_fetch_assoc($sel_token_user_details);
								$user_id=$token_user_details['cid'];
								mysqli_query($conn,"UPDATE cz_users SET status='1',email_verifiy_token='' WHERE cid='$user_id' ");
							}
						}

						if(isset($is_valid_token) && $is_valid_token=="1" )
						{
							echo "<div class='col-sm-12 text-center text-success'><h4> Su cuenta fue verificada con éxito. Inicie sesión a través de su aplicación o sitio web</h4></div>";
						}else
						{
							echo "<div class='col-sm-12 text-center text-danger'><h4> Invalid Token, please signup again or contact admin.</h4></div>";
						}
						?>
				</form>
			</div>
		</div>
	</div>
	<?php include("js.php"); ?>
</body>
</html>