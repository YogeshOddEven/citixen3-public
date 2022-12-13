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
<body class="login-body">
<div id="cover"> </div>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-5">
				<form class="login100-pic validate-form" method="post" action="process/check_login.php">
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
						Login
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="login_username" placeholder="Email/User Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="login_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn btn-primary" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include("js.php"); ?>
</body>
</html>