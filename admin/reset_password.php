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

	if(isset($_REQUEST['token']) && $_REQUEST['type'])

	{

		$token=$_REQUEST['token'];

		$type=$_REQUEST['type'];

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

					

					<?php 

						if($_REQUEST['is_success'] && $_REQUEST['is_success']=="1" && !isset($_REQUEST['token']))

						{

							// echo "<div class='col-sm-12 text-center'><h4> Your ".$type." Account Password Reset Succesfully</h4></div>";

						}else

						{

					?>
						<span class="login100-form-title">

							Reset <?php echo $type; ?> Account Password

						</span>
					<div class="wrap-input100 validate-input" >

						<input class="input100" type="password" name="password" placeholder="New Password" requried>

						<span class="focus-input100"></span>

						<span class="symbol-input100">

							<i class="fa fa-lock" aria-hidden="true"></i>

						</span>

					</div>



					<div class="wrap-input100 validate-input" data-validate = "Password is required">

						<input class="input100" type="password" name="confirm_password" placeholder="Confirm New Password" required>

						<span class="focus-input100"></span>

						<span class="symbol-input100">

							<i class="fa fa-lock" aria-hidden="true"></i>

						</span>

					</div>

					<div class="container-login100-form-btn">

						<input type="submit" class="login100-form-btn btn-primary" value="Reset Password">

					</div>

					<?php } ?>

				</form>

			</div>

		</div>

	</div>

	<?php include("js.php"); ?>

</body>

</html>